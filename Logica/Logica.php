<?php
    require_once("../Model/ProductoModel.php");

    $data = json_decode(file_get_contents("php://input"));

    switch ($data->operacion) {
        case "Guardar":
            $ProductoModel = new ProductoModel();
            $ProductoModel->setNombre($data->nombre);
            $ProductoModel->setPrecio($data->precio);
            $ProductoModel->setMarca($data->marca);
            $ProductoModel->setFoto($data->foto);
            $ProductoModel->insertarProducto();
            echo "Guardado";
            break;

        case "BuscarTodos":
            $ProductoModel = new ProductoModel();
            $resultado = $ProductoModel->BuscarTodos();
            foreach($resultado as $fila) {
                //print_r($fila);
                echo "<tr align='center'><td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td>
                <td><button class='btn btn-dark' onclick='Eliminar($fila[0]);'>Eliminar</button>
                <button class='btn btn-info' onclick='Editar($fila[0]);'>Editar</button></td></tr>";
            }
            break;

        case "Eliminar":
            $ProductoModel = new ProductoModel();
            $ProductoModel->setId($data->id);
            $ProductoModel->eliminarProducto();
            echo "Eliminado";
            break;

        case "Editar":
            $ProductoModel = new ProductoModel();
            $ProductoModel->setId($data->id);
            $resultado = $ProductoModel->BuscarProducto();            
            foreach($resultado as $fila) {
                echo '<form onsubmit="return false;" class="row g-3" id="formulario">
                    <div class="col-md-6">                        
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" value="'.$fila[1].'">
                    </div>
                    <div class="col-md-6">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" class="form-control" id="precio" value="'.$fila[2].'">
                    </div>
                    <div class="col-md-6">
                        <label for="marca" class="form-label">Marca</label>
                        <select id="marca" class="form-select">';
                            if($fila[3] == "Dell") {
                                echo '<option value="'.$fila[3].'" selected>'.$fila[3].'</option>
                                <option value="View Sonic">View Sonic</option>
                                <option value="Toshiba">Toshiba</option>';
                            } elseif($fila[3] == "View Sonic") {
                                echo '<option value="'.$fila[3].'" selected>'.$fila[3].'</option>
                                <option value="Dell">Dell</option>
                                <option value="Toshiba">Toshiba</option>';
                            } else {
                                echo '<option value="'.$fila[3].'" selected>'.$fila[3].'</option>
                                <option value="View Sonic">View Sonic</option>
                                <option value="Dell">Dell</option>';
                            }
                echo '</select>
                    </div>
                    <div class="col-6">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="text" class="form-control" id="foto" value="'.$fila[4].'">
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-dark btn-lg" onclick="Actualizar('.$fila[0].');">Guardar</button>
                    </div>
                </form>';
            }
            break;

        case "Actualizar":
            $ProductoModel = new ProductoModel();
            $ProductoModel->setId($data->id);
            $ProductoModel->setNombre($data->nombre);
            $ProductoModel->setPrecio($data->precio);
            $ProductoModel->setMarca($data->marca);
            $ProductoModel->setFoto($data->foto);
            $ProductoModel->actualizarProducto();
            echo "Actualizado";
            break;
    }    
?>
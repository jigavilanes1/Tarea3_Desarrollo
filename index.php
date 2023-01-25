<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <title>Productos</title>
</head>

<body onload="BuscarTodos();">
    <div class="container">
        <div class="row">
            <form onsubmit="return false;" class="row g-3" id="formulario">
                <div class="col-md-6">
                    <input type="hidden" id="id">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre">
                </div>
                <div class="col-md-6">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio">
                </div>
                <div class="col-md-6">
                    <label for="marca" class="form-label">Marca</label>
                    <select id="marca" class="form-select">
                        <option selected>Seleccione...</option>
                        <option value="View Sonic">View Sonic</option>
                        <option value="Dell">Dell</option>
                        <option value="Toshiba">Toshiba</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="text" class="form-control" id="foto">
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-dark btn-lg"" onclick="Guardar();">Guardar</button>
                </div>
                <div class="col-6">
                </div>
            </form>         
        </div>
        <br>
        <div class="row">
        <div class="alert alert-info" role="alert" id="res">
        ... ANIMO Animo animo :3
      </div>
    </div>
    <div class="row">
    <table class="table table-striped">
        <thead class="table-dark">
          <tr align="center">
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">PRECIO</th>
            <th scope="col">MARCA</th>
            <th scope="col">FOTO</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody id="datos">

        </tbody>
      </table>
        </div>
    </div>
</body>

</html>
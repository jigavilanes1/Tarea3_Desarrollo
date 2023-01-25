<?php
    include("../Config/Database.php");

    class ProductoModel {
        private $id;
        private $nombre;
        private $precio;
        private $marca;
        private $foto;

        public function __construct()
        {            
        }

        public function setId($_ID) {
            $this->id = $_ID;
        }
        
        public function getId() {
            return $this->id;
        }
        
        public function setNombre($_nombre) {
            $this->nombre = $_nombre;
        }
        
        public function getNombre() {
            return $this->nombre;
        }        

        public function setPrecio($_precio) {
            $this->precio = $_precio;
        }
        
        public function getPrecio() {
            return $this->precio;
        }
        
        public function setMarca($_marca) {
            $this->marca = $_marca;
        }

        public function getMarca() {
            return $this->marca;
        }

        public function setFoto($_foto) {
            $this->foto = $_foto;
        }

        public function getFoto() {
            return $this->foto;
        }

        public function insertarProducto() {            
            $conn = new DataBase();

            $sql = "insert into productos(id,nombre,precio,marca,foto) values (null,?,?,?,?);";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("sdss",$this->nombre,$this->precio,$this->marca,$this->foto);
            $stmt->execute();
            $id = $stmt->insert_id;
            return ($id);
        }

        public function actualizarProducto() {
            $conn = new DataBase();
            
            $sql = "update productos set nombre = ?,precio = ?,marca = ?,foto = ? where id = ?;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("sdssi",$this->nombre,$this->precio,$this->marca,$this->foto,$this->id);
            $stmt->execute();            
        }

        public function eliminarProducto() {
            $conn = new DataBase();
            
            $sql = "delete from productos where id = ?;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("i",$this->id);
            $stmt->execute();
        }

        public function BuscarTodos() {
            $conn = new DataBase();

            $sql = "select * from productos;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all();
        }

        public function BuscarProducto() {
            $conn = new DataBase();
            $sql = "select * from productos where id = ?;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("i",$this->id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all();
        }
    }

            /*Para Guardados
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return json_encode($data);*/

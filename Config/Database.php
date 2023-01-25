<?php
    class DataBase {
        private $dbHost = "localhost";
        private $dbUser = "root";
        private $dbPWD = "";
        private $dbName = "test";

        public function __construct()
        {
            $this->ms = new mysqli($this->dbHost, $this->dbUser, $this->dbPWD, $this->dbName);
            return $this->ms;
        }

        public function __destruct()
        {
            $this->ms->close();
        }

    }
?>
<?php

require_once 'config/database.php';

class Juegos_categoriaDAO{
    private $pdo;

    public function __construct(){
        $conexion= new Conexion();
        $this->pdo= $conexion->getConexion();
    }
}


?>
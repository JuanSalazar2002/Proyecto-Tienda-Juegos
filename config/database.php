<?php

class Conexion{
    private $server= "localhost";
    private $user= "juan";
    private $pass= "admin123";
    private $conexion;

    public function __construct()
    {
        try {
            $this->conexion= new PDO("mysql:host=$this->server;dbname=Tienda_Juegos",$this->user, $this->pass);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // echo "Conexion Exitosa Todo Salio Bien";
        } catch (PDOException $pd) {
            echo "Ocurrio un error".$pd->getMessage();
        }
    }

    public function getConexion(){ return $this->conexion; }
}

?>
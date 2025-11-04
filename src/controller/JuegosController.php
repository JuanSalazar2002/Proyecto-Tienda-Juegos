<?php

require_once __DIR__ . '/../models/dao/JuegosDAO.php';

class JuegosController{
    private $JuegosDAO;

    public function __construct(){
        $this->JuegosDAO= new JuegosDAO();
    }

    public function crearJuego($nombre, $costo, $creador){
        try{
            $crearJuego= $this->JuegosDAO->nuevoJuego($nombre, $costo, $creador);
            return $crearJuego;
        }catch(PDOException $pdo_error){
            error_log("[crearJuego] Error al crear el juego por controlador ".$pdo_error->getMessage());
        }
    }
    
}



?>
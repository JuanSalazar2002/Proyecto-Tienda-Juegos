<?php

require_once __DIR__ . '/../models/dao/ImagenesDAO.php';

class ImagenesController{
    private $ImagenesDAO;

    public function __construct(){
        $this->ImagenesDAO= new ImagenesDAO();
    }

    public function agregarImagenes($id_juego, $url){
        try{
            $agregarImagenes= $this->ImagenesDAO->nuevaImagen($id_juego, $url);
            return $agregarImagenes;
        }catch(PDOException $pdo_error){
            error_log("[agregarImagenes] Error al agregar imagenes ".$pdo_error->getMessage());
            return false;
        }
    }
}

?>
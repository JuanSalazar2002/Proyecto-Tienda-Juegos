<?php

require_once __DIR__ . '/../models/dao/Juegos_categoriaDAO.php';

class Juegos_categoriaController{
    private $Juegos_categoriaDAO;

    public function __construct(){
        $this->Juegos_categoriaDAO= new Juegos_categoriaDAO();
    }

    public function agregarCategoria($id_juego, $array_categorias){
        try{
            $agregarCategoria= $this->Juegos_categoriaDAO->agregarCategoriasPorJuego($id_juego, $array_categorias);
            return $agregarCategoria;
        }catch(PDOException $pdo_error){
            error_log('[agregarCategoria] Error al agregar categoria por juego '.$pdo_error->getMessage());
            return false;
        }
    }
}

?>
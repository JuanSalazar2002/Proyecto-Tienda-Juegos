<?php

require_once __DIR__.'/../models/dao/CategoriaDAO.php';

class CategoriaController{
    private $categoriaDAO;

    public function __construct(){
        $this->categoriaDAO= new CategoriaDAO;
    }

    public function listarCategorias(){
        try{
            $listadoCategorias= $this->categoriaDAO->listarCategorias();
            return $listadoCategorias;
        }catch(PDOException $pdo_error){
            error_log('[listarCategorias] Error en el listado '.$pdo_error->getMessage());
            return null;
        }
    }

    public function crearCategoria($nombre){
        try{
            $nuevaCategoria= $this->categoriaDAO->nuevaCategoria($nombre);
            return $nuevaCategoria;
        }catch(PDOException $pdo_error){
            error_log('[crearCategoria] Error en la insercion '.$pdo_error->getMessage());
            return false;
        }
    }

    public function actualizarCategoria(Categoria $categoria){
        try{
            $actualizacionCategoria= $this->categoriaDAO->actualizarCategoria($categoria);
            return $actualizacionCategoria;
        }catch(PDOException $pdo_error){
            error_log("[actualizarCategoria] Error en la actualización ".$pdo_error->getMessage());
            return null;
        }
    }

    public function eliminarCategoria($id){
        try{
            $categoriaEliminar= $this->categoriaDAO->eliminarCategoria($id);
            return $categoriaEliminar;
        }catch(PDOException $pdo_error){
            error_log("[eliminarCategoria] Error en la eliminacion de la categoria ".$pdo_error->getMessage());
            return false;
        }
    }
}

?>
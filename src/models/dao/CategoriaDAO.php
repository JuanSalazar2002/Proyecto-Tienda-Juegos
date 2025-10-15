<?php

require_once 'config/database.php';
require_once __DIR__ . '/../entities/Categoria.php';

class CategoriaDAO{
    private $pdo;

    public function __construct(){
        $conexion= new Conexion();
        $this->pdo= $conexion->getConexion();
    }

    private function generarId(){
        $query= "SELECT MAX(id) FROM Categoria";
        $stmt= $this->pdo->query($query);
        $valor= $stmt->fetchColumn();

        if($valor){
            $ultimo= (int)substr($valor, 1);
            $ultimo++;
            return "C".str_pad((string)$ultimo,3,STR_PAD_LEFT);
        }else{
            return "C001";
        }
    }

    private function listarCategorias(){
        $query= "SELECT * FROM Categoria";
        $stmt= $this->pdo->query($query);
        $listaCategorias= [];

        while($fila= $stmt->fetch(PDO::FETCH_ASSOC)){
            $categoria= new Categoria(
                $fila['id'],
                $fila['nombre']
            );
            $listaCategorias[]= $categoria;
        }

        return $listaCategorias;
    }

}

?>
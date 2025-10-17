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
            return "C".str_pad((string)$ultimo,3, "0",STR_PAD_LEFT);
        }else{
            return "C001";
        }
    }

    public function listarCategorias(){
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

    public function consultarCategoria($id){
        $query= "SELECT * FROM Categoria WHERE id= :id";
        $stmt= $this->pdo->prepare($query);
        $stmt->execute([':id' => $id]);
        $valor= $stmt->fetch(PDO::FETCH_ASSOC);

        if($valor){
            $categoria= new Categoria(
                $valor['id'],
                $valor['nombre']
            );

            return $categoria;
        }

        return null;
    }

    public function nuevaCategoria($nombre){
        try{
            $query= "INSERT INTO Categoria(id, nombre) VALUES (:id, :nombre)";
            $id= $this->generarId();
            $stmt= $this->pdo->prepare($query);
            $stmt->execute([
                ':id'=>$id,
                ':nombre'=>$nombre
            ]);
            return true;
        }catch(PDOException $pdo_error){
            error_log("Oh no ocurrio un error ".$pdo_error->getMessage());
            return false;
        }
    }

    public function actualizarCategoria(Categoria $categoria){
        try{
            $query= "UPDATE Categoria SET nombre= :nombre WHERE id= :id";
            $stmt=$this->pdo->prepare($query);
            $stmt->execute([
                ':id'=>$categoria->getId(),
                ':nombre'=>$categoria->getNombre()
            ]);
            return $stmt->rowCount() > 0;
        }catch(PDOException $pdo_error){
            error_log("Oh no ocrrurio un error al actualizar una categoria ".$pdo_error->getMessage());
            return false;
        }
    }

    public function eliminarCategoria($id){
        try{
            $query= "DELETE FROM Categoria WHERE id= :id";
            $stmt=$this->pdo->prepare($query);
            $stmt->execute([
                ':id'=>$id
            ]);
            return $stmt->rowCount() > 0;
        }catch(PDOException $pdo_error){
            error_log("Oh no ocurrio un error al eliminar una categoria ".$pdo_error->getMessage());
            return false;
        }
    }
}

?>
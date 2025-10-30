<?php

require_once 'config/database.php';
require_once __DIR__.'/../entities/Imagenes.php';

class ImagenesDAO{
    private $pdo;

    public function __construct(){
        $conexion= new Conexion();
        $this->pdo= $conexion->getConexion();
    }

    private function generarId(){
        $query= "SELECT MAX(id) FROM Imagenes";
        $stmt= $this->pdo->query($query);
        $valor= $stmt->fetchColumn();

        if($valor){
            $ultimo= (int)substr($valor,1);
            $ultimo++;
            return "I".str_pad((string)$ultimo,3,"0",STR_PAD_LEFT);
        }else{
            return 'I001';
        }
    }

    public function nuevaImagen($id_juego, $url){
        try{
            $query= "INSERT INTO Imagenes VALUES (:id, :id_juego, :url)";
            $id= $this->generarId();
            $stmt= $this->pdo->prepare($query);
            $stmt->execute([
                ':id'=> $id,
                ':id_juego'=>$id_juego,
                ':url'=>$url
            ]);
            return true;
        }catch(PDOException $pdo_error){
            error_log("[nuevaImagen] Error en la creacion de una nueva imagen ".$pdo_error->getMessage());
            return false;
        }
    }

    // aca estaremos listando todas las imagenes
    public function listarImagenes(){
        try{
            $query= "SELECT * FROM Imagenes";
            $stmt= $this->pdo->query($query);
            $listaImagenes= [];
            while($fila= $stmt->fetch(PDO::FETCH_ASSOC)){
                $imagen= new Imagenes(
                    $fila['id'],
                    $fila['id_juego'],
                    $fila['url']
                );
                $listaImagenes[]= $imagen;
            }
            return $listaImagenes;
        }catch(PDOException $pdo_error){
            error_log("[listarImagenes] Error al listar todas las imagenes ".$pdo_error->getMessage());
            return [];
        }
    }

    // aca estaremos listando imagenes por juego
    public function listarImagenesPorJuego($id_juego){
        try{
            $query= "SELECT * FROM Imagenes WHERE id_juego=:id_juego";
            $listaImagenes= [];
            $stmt= $this->pdo->prepare($query);
            $stmt->execute([
                ':id_juego'=>$id_juego
            ]);
            while($fila=$stmt->fetch(PDO::FETCH_ASSOC)){
                $imagen= new Imagenes(
                    $fila['id'],
                    $fila['id_juego'],
                    $fila['url']
                );
                $listaImagenes[] = $imagen;
            }
            return $listaImagenes;
        }catch(PDOException $pdo_error){
            error_log("[listarImagenesPorJuego] Error al listar todos las imagenes por juego ".$pdo_error->getMessage());
            return [];
        }
    }

    public function eliminarImagen($id){
        try{
            $query= "DELETE FROM Imagenes WHERE id=:id";
            $stmt= $this->pdo->prepare($query);
            $stmt->execute([
                ':id'=>$id
            ]);
            return $stmt->rowCount() > 0;
        }catch(PDOException $pdo_error){
            error_log("[eliminarImagen] Error al eliminar una imagen ".$pdo_error->getMessage());
            return false;
        }
    }
}

?>
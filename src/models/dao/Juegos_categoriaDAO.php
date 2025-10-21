<?php

require_once 'config/database.php';
require_once __DIR__ . '/../entities/Juegos.php';

class Juegos_categoriaDAO{
    private $pdo;

    public function __construct(){
        $conexion= new Conexion();
        $this->pdo= $conexion->getConexion();
    }

    public function agregarCategoriasPorJuego($id_juego, $array_categorias){
        // Para hacer esto tenemos que partir que primero se tiene que crear el juego, despues de eso podremos elegir las categorias que tendrá.
        // Vamos a tener ejecutar la misma query, para insertar los registros a la tabla, las veces necesarias, esto dependerá de cuantas categorias se eligieron.
        // si se eligieron solamente 2 categorias, la query se tendrá que ejecutar 2 veces.
        // Para el foreach se ejecuta la query en donde el $id_juego siempre será el mismo, lo único que variará sera el $id_categoria.
        try{
            $query="INSERT INTO Juegos_categoria(id_juego, id_categoria) VALUES (:id_juego, :id_categoria)";
            $stmt= $this->pdo->prepare($query);
            foreach($array_categorias as $id_categoria){
                $stmt->execute([
                    ':id_juego'=>$id_juego,
                    ':id_categoria'=>$id_categoria
                ]);
            }
            return true;
        }catch(PDOException $pdo_error){
            error_log("Error en la inserccion de datos ".$pdo_error->getMessage());
            return false;
        }
        // sacamos el query y el prepare del foreach porque este siempre será lo mismo, lo unico que variará será en el execute
    }

    public function obtenerCategoriasPorJuego($id_categoria){
        // osea que seleccionando un categoria podemos ver todos los juegos asociados a una categoria en especifico.
        $sql= "SELECT Juegos.id, Juegos.nombre, Juegos.costo, Juegos.creador FROM Juegos_categoria 
            INNER JOIN Juegos ON Juegos_categoria.id_juego = Juegos.id WHERE Juegos_categoria.id_categoria= :id_categoria";
        $lista_juegos_por_categoria= [];
        try{
            $stmt=$this->pdo->prepare($sql);
            $stmt->execute([
                ':id_categoria'=>$id_categoria
            ]);
            while($fila= $stmt->fetch(PDO::FETCH_ASSOC)){
                $juego= new Juegos(
                    $fila['id'],
                    $fila['nombre'],
                    $fila['costo'],
                    $fila['creador']
                );
                $lista_juegos_por_categoria[]= $juego;
            }
            return $lista_juegos_por_categoria;
        }catch(PDOException $pdo_error){
            error_log("Oh no ocurrio un error en mostrar los juegos por categoria ".$pdo_error->getMessage());
            return [];
        }
    }



}

?>
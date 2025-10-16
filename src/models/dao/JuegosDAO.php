<?php

require_once 'config/database.php';
require_once __DIR__ . '/../entities/Juegos.php';

class JuegosDAO{
    private $pdo;

    public function __construct(){
        $conexion= new Conexion();
        $this->pdo= $conexion->getConexion();
    }

    private function generarId(){
        $query= "SELECT MAX(id) FROM Juegos";
        // Preparamos la consulta   -   $stmt devuelve un objeto PDOStatement
        $stmt= $this->pdo->query($query);
        // acá recien obtenemos el valor
        $valor= $stmt->fetchColumn();

        if($valor){
            // acá extraemos la parte numerica del texto, empezara a contar desde la posicion 1. Despues convertira todo a int
            $ultimo= (int)substr($valor,1);
            $ultimo++;
            // retornamos
            return "J".str_pad((string)$ultimo,3,0,STR_PAD_LEFT);
        }else{
            return 'J001';
        }
    }

    public function listarProductos(){
        $query= "SELECT * FROM Juegos";
        $stmt= $this->pdo->query($query);
        $listarJuegos= [];
        
        // fetch -> muestra un dato cada vez que es llamado
        // fetchAll -> muestra todo de golpe
        // ambos devuelve 2 arrays, uno donde las keys son numeros, y otras donde son los nombre de las columnas. 
        // Si solo queremos la ultima utilizamos PDO::FETCH_ASSOC
        // cada producto es una fila, pero en array (  ['id' => 1, 'nombre' => 'Zelda', ...]  )
        while($fila= $stmt->fetch(PDO::FETCH_ASSOC)){
            $juego= new Juegos(
                $fila['id'],
                $fila['nombre'],
                $fila['costo'],
                $fila['creador']
            );
            // añadimos el juego a la fila
            $listarJuegos[]= $juego;
        }
        // devolvemos una lista de objetos Juegos
        return $listarJuegos;
    }

    public function consultarJuego($id){
        $query="SELECT * FROM Juegos WHERE id= :id";
        // preparamos la sentencia pero no la ejecutamos
        $stmt= $this->pdo->prepare($query);
        // ejecutamos la sentencia, pero antes sustituimos :id por el $id. Esto es para evitar inyeccion de datos
        $stmt->execute([':id'=>$id]);
        
        // almacenos el valor que obtenemos
        $valor= $stmt->fetch(PDO::FETCH_ASSOC);

        if($valor){
            $juego= new Juegos(
                $valor['id'],
                $valor['nombre'],
                $valor['costo'],
                $valor['creador']
            );

            return $juego;
        }

        // si en caso no encuentr nada
        return null;
    }

    public function nuevoJuego($nombre, $costo, $creador){
        try{
            $query= "INSERT INTO Juegos(id, nombre, costo, creador) values (:id, :nombre, :costo, :creador)";
            $id= $this->generarId();
            $stmt= $this->pdo->prepare($query);
            $stmt->execute([
                ':id' => $id,
                ':nombre' => $nombre,
                ':costo' => $costo,
                ':creador' => $creador
            ]);
            return true;
        }catch (PDOException $pdo_error){
            error_log("Oh no ocurrio un error ".$pdo_error->getMessage());
            return false; 
        }
    }
}

?>
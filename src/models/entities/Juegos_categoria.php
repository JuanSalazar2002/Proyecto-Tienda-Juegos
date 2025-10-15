<?php

class Juegos_categoria{
    private $id_juegos;
    private $id_categoria;

    public function __construct($id_juegos, $id_categoria){
        $this->id_juegos= $id_juegos;
        $this->id_categoria= $id_categoria;
    }

    // getters
    public function getId_Juego() { return $this->id_juegos; }
    public function getId_Categoria() { return $this->id_categoria; }
}

?>
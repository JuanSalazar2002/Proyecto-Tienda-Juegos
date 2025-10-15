<?php

class Categoria{
    private $id;
    private $nombre;

    public function __construct($id, $nombre){
        $this->id= $id;
        $this->nombre= $nombre;
    }

    // getters
    public function getId(){ return $this->id; }
    public function getNombre() { return $this->nombre; }

    // setters
    public function setNombre($nombre) { return $this->nombre= $nombre; }
}

?>
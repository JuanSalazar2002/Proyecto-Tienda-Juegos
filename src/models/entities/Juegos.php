<?php

class Juegos{
    private $id;
    private $nombre;
    private $costo;
    private $creador;

    public function __construct($id, $nombre, $costo, $creador){
        $this->id= $id;
        $this->nombre= $nombre;
        $this->costo= $costo;
        $this->creador= $creador;
    }

    // getters
    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }
    public function getCosto() { return $this->costo; }
    public function getCreador() { return $this->creador; }

    // setters
    public function setNombre($nombre){ $this->nombre= $nombre; }
    public function setCosto($costo){ $this->costo= $costo; }
    public function setCreador($creador) { $this->creador= $creador; }
}

?>
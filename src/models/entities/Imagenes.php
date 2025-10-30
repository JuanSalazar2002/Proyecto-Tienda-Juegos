<?php

class Imagenes{
    private $id;
    private $id_juego;
    private $url;

    public function __construct($id, $id_juego ,$url){
        $this->id= $id;
        $this->id_juego= $id_juego;
        $this->url= $url;
    }

    public function getId(){ return $this->id; }

    public function getUrl(){ return $this->url; }

    public function getId_Juego(){ return $this->id_juego; }

    public function setUrl($url){ $this->url= $url; }
}

?>
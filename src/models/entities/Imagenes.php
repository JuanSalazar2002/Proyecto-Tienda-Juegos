<?php

class Imagenes{
    private $id;
    private $id_juego;
    private $url;

    function __construct($id, $id_juego ,$url){
        $this->id= $id;
        $this->id_juego= $id_juego;
        $this->url= $url;
    }

    function getId(){ return $this->id; }

    function getUrl(){ return $this->url; }

    function getId_Juego(){ return $this->id_juego; }

    function setUrl($url){ $this->url= $url; }
}

?>
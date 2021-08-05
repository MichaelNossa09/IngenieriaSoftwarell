<?php

//Esta clase POJO sirve para guardar los datos de un Usuario
//Por ejemplo, un objeto creado a partir de esta clase
//tendrá guardado los datos de un usuario de la tabla bicicleta de la
//base de datos

class Pelicula
{
    public $id;
    public $nombre;
    public $genero;
    public $imagen;
    public $sipnosis;
    public $precio;
    public $destino;
    
    public function __construct($id, $nombre, $genero ,$imagen, $sipnosis, $precio,$destino){

        $this->id = $id;
        $this->nombre = $nombre;
        $this->genero = $genero;
        $this->imagen = $imagen;
        $this->sipnosis = $sipnosis;
        $this->precio = $precio;
        $this->destino = $destino;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getGenero()
    {
        return $this->genero;
    }
    public function getImagen()
    {
        return $this->imagen;
    }
    public function getSipnosis()
    {
        return $this->sipnosis;
    }
    public function getPrecio()
    {
        return $this->precio;
    }
    public function getDestino()
    {
        return $this->destino;
    }
}
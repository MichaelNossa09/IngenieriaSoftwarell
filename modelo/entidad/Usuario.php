<?php

//Esta clase POJO sirve para guardar los datos de un Usuario
//Por ejemplo, un objeto creado a partir de esta clase
//tendrá guardado los datos de un usuario de la tabla Usuarios de la
//base de datos

class Usuario
{
    public $idUsuario;
    public $nombre;
    public $apellido;
    public $correo;
    public $password;
    public $telefono;
    public $nroCedula;
    public $avatar;
    
    public function __construct($idUsuario, $nombre, $apellido ,$correo, $password,$telefono,$nroCedula,$avatar){

        $this->idUsuario = $idUsuario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
		$this->password = $password;
        $this->telefono = $telefono;
        $this->nroCedula = $nroCedula;
        $this->avatar = $avatar;
    }
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    public function getCorreo()
    {
        return $this->correo;
    }
    
     public function getPassword()
    {
        return $this->password;
    }

	 public function getTelefono()
    {
        return $this->telefono;
    }

    public function getNroCedula(){
        return $this->nroCedula;
    }
    public function getAvatar(){
        return $this->avatar;
    }
}
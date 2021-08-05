<?php

//Esta clase POJO sirve para guardar los datos de un Usuario
//Por ejemplo, un objeto creado a partir de esta clase
//tendrá guardado los datos de un usuario de la tabla bicicleta de la
//base de datos

class Venta
{
    public $ID;
    public $ClaveTransaccion;
    public $PaypalDatos;
    public $Fecha;
    public $Correo;
    public $Total;
    public $status;

    public function __construct($ID, $ClaveTransaccion, $PaypalDatos ,$Fecha, $Correo, $Total,$status){

        $this->ID = $ID;
        $this->ClaveTransaccion = $ClaveTransaccion;
        $this->PaypalDatos = $PaypalDatos;
        $this->Fecha = $Fecha;
        $this->Correo = $Correo;
        $this->Total = $Total;
        $this->status = $status;
    } 

    public function getID()
    {
        return $this->ID;
    }
    public function getClaveTransaccion()
    {
        return $this->ClaveTransaccion;
    }
    public function getPaypalDatos()
    {
        return $this->PaypalDatos;
    }
    public function getFecha()
    {
        return $this->Fecha;
    }
    public function getCorreo()
    {
        return $this->Correo;
    }
    public function getTotal()
    {
        return $this->Total;
    }
    public function getStatus()
    {
        return $this->status;
    }
}
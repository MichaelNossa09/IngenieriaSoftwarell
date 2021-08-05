<?php

    require_once (__DIR__."/../mdb/mdbVentas.php");
    require_once (__DIR__."/../../modelo/entidad/Ventas.php");

        $ClaveTransaccion = $_POST['ClaveTransaccion'];
        $PaypalDatos = $_POST['PaypalDatos'];
        $Fecha = $_POST['Fecha'];
        $Correo = $_POST['Correo'];  
        $Total = $_POST['Total'];
        $status = $_POST['status'];

        $venta = new Venta(NULL, $ClaveTransaccion, $PaypalDatos, $Fecha, $Correo,$Total, $status);
        registrarVenta($venta); 
        header("Location: ../../vista/paginas/micarrito.php");
?>

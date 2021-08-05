<?php
//Con require_once se incluye el archivo UsuarioDAO.php
require_once(__DIR__."/../../modelo/dao/VentasDAO.php");
        
function registrarVenta(Venta $venta){
    
    $dao=new VentasDAO();

    $venta = $dao->registrarVenta($venta);

    return $venta;
}

function verVentas(){
    $dao=new VentasDAO();

    $ventas = $dao->verVentas();

    return $ventas;
} 

function eliminarVenta($id){
    $dao=new VentasDAO();
    $dao->eliminarVenta($id);
}

function verVentaPorId($id){
    $dao=new VentasDAO();
    $venta = $dao->verVentaPorId($id);
    return $venta;
}

function editarVenta($venta){
    $dao=new VentasDAO();
    $dao->editarVenta($venta);
}

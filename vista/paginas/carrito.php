<?php 

session_start();
$usuario = $_SESSION['ID_USUARIO'];
if(!isset($usuario)){
    header("location: ../../index.html");
}
$mensaje="";
$mensajeError="";
$mensajeEliminar="";
$mensajeExitoso="";

if(isset($_POST['btnAccion'])){

    switch($_POST['btnAccion']){
        case "Agregar":

            if(is_numeric(openssl_decrypt($_POST['id'],"AES-128-ECB",""))){
                $Id = openssl_decrypt($_POST['id'],"AES-128-ECB","");
                
            }else{
                $mensaje.= "Upps ID Incorrecto.".$Id."<br>";
            }

            if(is_string(openssl_decrypt($_POST['nombre'],"AES-128-ECB",""))){
                $Nombre = openssl_decrypt($_POST['nombre'],"AES-128-ECB","");
            }else{
                $mensaje.= "Upps nombre Incorrecto.".$Nombre."<br>";
            }

            if(is_numeric(openssl_decrypt($_POST['precio'],"AES-128-ECB",""))){
                $Precio = openssl_decrypt($_POST['precio'],"AES-128-ECB","");
            }else{
                $mensaje.= "Upps Precio Incorrecto.".$Precio."<br>";
            }

            if(is_numeric(openssl_decrypt($_POST['cantidad'],"AES-128-ECB",""))){
                $Cantidad = openssl_decrypt($_POST['cantidad'],"AES-128-ECB","");
            }else{
                $mensaje.= "Upps ID Incorrecto.".$Cantidad."<br>";
            }

            if(!isset($_SESSION['CARRITO'])){
                $producto=array(
                    'Id'=>$Id,
                    'Nombre'=>$Nombre,
                    'Precio'=>$Precio,
                    'Cantidad'=>$Cantidad
                );
                $_SESSION['CARRITO'][0]=$producto;   
                $mensaje= "Producto agregado al Carrito";
            }else{
                $idProductos = array_column($_SESSION['CARRITO'], "Id");
                if(in_array($Id, $idProductos)){
                    $mensajeError="Este producto ya existe en el carrito";
                }else{
                    $NumeroProductos=count($_SESSION['CARRITO']);
                    $producto=array(
                    'Id'=>$Id,
                    'Nombre'=>$Nombre,
                    'Precio'=>$Precio,
                    'Cantidad'=>$Cantidad
                     );
                    $_SESSION['CARRITO'][$NumeroProductos]=$producto;
                    $mensaje= "Producto agregado al Carrito";
                }
                
            }

            break;

        case "Eliminar":
            
            if(is_numeric(openssl_decrypt($_POST['id'],"AES-128-ECB",""))){
                $Id = openssl_decrypt($_POST['id'],"AES-128-ECB","");
                
                foreach($_SESSION['CARRITO'] as $indice=>$producto){
                    if($producto['Id']==$Id){
                        unset($_SESSION['CARRITO'][$indice]);
                        $mensajeEliminar="Producto eliminado exitosamente";
                    }
                }
            }else{
                $mensaje.= "Upps ID Incorrecto.".$Id."<br>";
            }

            break;
        
        case "RegistrarVenta":
            require_once (__DIR__."/../../controlador/mdb/mdbVentas.php");
            require_once (__DIR__."/../../modelo/entidad/Ventas.php");
            $ClaveTransaccion = $_POST['ClaveTransaccion'];
            $PaypalDatos = $_POST['PaypalDatos'];
            $Fecha = $_POST['Fecha'];
            $Correo = $_POST['Correo'];  
            $Total = $_POST['Total'];
            $status = $_POST['status'];
            $mensajeExitoso="Se ha efectuado el pago correctamente";

            $venta = new Venta(NULL, $ClaveTransaccion, $PaypalDatos, $Fecha, $Correo,$Total, $status);
            registrarVenta($venta); 
            unset($_SESSION['CARRITO']);
            header("Location: logeado.php");
        break;
    }






}













?>
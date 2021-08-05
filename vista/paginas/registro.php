<?php 

$mensaje="";

if(isset($_POST['btnRegistro'])){

    require_once (__DIR__."/../../controlador/mdb/mdbUsuario.php");
    require_once (__DIR__."/../../modelo/entidad/Usuario.php");

    $usuarios = verUsuarios();
    $max = sizeof($usuarios);

    for($i=1;$i<=$max;$i++){
        $user = verUsuarioPorId($i);
        $correo = $user->getCorreo();
        $nroCedula = $user->getNroCedula();
        if($correo == $_POST['correo'] || $nroCedula == $_POST['nroCedula']){
            $mensaje="ERROR";
            break;
        }   
    }

    if($mensaje==""){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $password = $_POST['password'];  
        $telefono = $_POST['telefono'];
        $nroCedula = $_POST['nroCedula'];
        $avatar = "0.jpg";
        $usuario = new Usuario(NULL, $nombre, $apellido, $correo, $password,  $telefono, $nroCedula,$avatar);
        registrarUsuario($usuario);
        $mensaje="EXITO";
    }
   }
?>
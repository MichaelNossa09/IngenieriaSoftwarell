<?php
    
    session_start();

    require_once (__DIR__.'/../mdb/mdbUsuario.php');
    $idUsuario = $_SESSION['ID_USUARIO'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_SESSION['CORREO_USUARIO'];
    $password = $_POST['password'];
    $telefono = $_POST['telefono'];
    $nroCedula = $_SESSION['NROCEDULA'];
    $nombreImage = $_FILES['avatar']['name']; 
    $typeImage = $_FILES['avatar']['type'];
    $tamañoImage = $_FILES['avatar']['size'];
    $nombreImage = $idUsuario;
    if($tamañoImage<=1000000 && $typeImage != NULL){
        if($typeImage=="image/jpg"){
            $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/trabajosoftware/vista/perfiles/';
            move_uploaded_file($_FILES['avatar']['tmp_name'], $carpeta_destino.$nombreImage.'.jpg');
            $avatar = $nombreImage.'.jpg';
            $usuario = new Usuario($idUsuario, $nombre, $apellido, $correo, $password, $telefono,$nroCedula,$avatar);
            editarUsuario($usuario);
            header("Location: ../../vista/paginas/perfil.php");
        }else if($typeImage=="image/jpeg"){
            $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/trabajosoftware/vista/perfiles/';
            move_uploaded_file($_FILES['avatar']['tmp_name'], $carpeta_destino.$nombreImage.'.jpeg');
            $avatar = $nombreImage.'.jpeg';
            $usuario = new Usuario($idUsuario, $nombre, $apellido, $correo, $password, $telefono,$nroCedula,$avatar);
            editarUsuario($usuario);
            header("Location: ../../vista/paginas/perfil.php");
        }else if($typeImage=="image/png"){
            $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/trabajosoftware/vista/perfiles/';
            move_uploaded_file($_FILES['avatar']['tmp_name'], $carpeta_destino.$nombreImage.'.png');
            $avatar = $nombreImage.'.png';
            $usuario = new Usuario($idUsuario, $nombre, $apellido, $correo, $password, $telefono,$nroCedula,$avatar);
            editarUsuario($usuario);
            header("Location: ../../vista/paginas/perfil.php");
        }else{
            echo "Error, solo se pueden subir imagenes JPG, JPEG Y PNG";
        }
    }else if($typeImage==NULL){
        $user = verUsuarioPorId($idUsuario);
        $image =  $user->getAvatar();
        $usuario = new Usuario($idUsuario, $nombre, $apellido, $correo, $password, $telefono,$nroCedula,$image);
        editarUsuario($usuario);
        header("Location: ../../vista/paginas/perfil.php");
    }else{
        echo "El tamaño de la imagen es  demasiado grande";
    }    
?>
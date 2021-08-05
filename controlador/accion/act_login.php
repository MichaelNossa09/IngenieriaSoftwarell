<?php
    //Con session_start() se puede iniciar una nueva sesión 
    //o reanudar la sesión existente
    session_start();
    $mensaje="";
    //Con require_once se incluye el archivo mdbUsuario.php
    require_once (__DIR__."/../mdb/mdbUsuario.php");
        
        //Se obtiene el correo y password del formulario del login,
        //los datos son recibidos por el método POST
        
            $correo = $_POST['correo'];
            $password = $_POST['password']; 
            //Se llama a la funcion autenticarUsuario() que esta en mdbUsuario.php
            $user = autenticarUsuario($correo,$password);
            
            if($user != null){
                //Si el usuario fue encontrado, se guarda su ID en una sesión con $_SESSION
                $_SESSION['ID_USUARIO'] = $user->getIdUsuario();
                $_SESSION['CORREO_USUARIO'] = $user->getCorreo();
                $_SESSION['PASSWORD'] = $user->getPassword();
                $_SESSION['NOMBRE'] = $user->getNombre();
                $_SESSION['APELLIDO'] = $user->getApellido();         
                $_SESSION['TELEFONO'] = $user->getTelefono();
                $_SESSION['NROCEDULA'] = $user->getNroCedula();
                $_SESSION['AVATAR'] = $user->getAvatar();
                header("Location: ../../vista/paginas/logeado.php");
            }else{
               $mensaje="Incorrecto";
            }
         
?>



<?php
    
    session_start();

    require_once (__DIR__.'/../mdb/mdbPelicula.php');

    $nombre = $_POST['nombre'];
    $genero = $_POST['genero'];
    $nombreImage = $_FILES['imagen']['name']; 
    $typeImage = $_FILES['imagen']['type'];
    $tamañoImage = $_FILES['imagen']['size'];
    $nombreImage = $id;
    $sipnosis = $_POST['sipnosis'];  
    $precio = $_POST['precio'];
    $destino = $_POST['destino'];
    if($tamañoImage<=1000000){
        if($typeImage=="image/jpg"){
            $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/pelicula/vista/Peliculas/';
            move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino.$nombreImage.'.jpg');
            $imagen = $nombreImage.'.jpg';
            $peliculas = new Pelicula(NULL, $nombre, $genero, $imagen, $sipnosis,$precio,$destino);
            editarPelicula($peliculas);
            header("Location: ../../vista/paginas/logeado.php");
        }else if($typeImage=="image/jpeg"){
            $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/pelicula/vista/Peliculas/';
            move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino.$nombreImage.'.jpg');
            $imagen = $nombreImage.'.jpeg';
            $peliculas = new Pelicula(NULL, $nombre, $genero, $imagen, $sipnosis,$precio,$destino);
            editarPelicula($peliculas);
            header("Location: ../../vista/paginas/logeado.php");
        }else if($typeImage=="image/png"){
            $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/pelicula/vista/Peliculas/';
            move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino.$nombreImage.'.jpg');
            $imagen = $nombreImage.'.png';
            $peliculas = new Pelicula(NULL, $nombre, $genero, $imagen, $sipnosis,$precio,$destino);
            editarPelicula($peliculas);
            header("Location: ../../vista/paginas/logeado.php");
        }
        else{
            echo "Error, solo se pueden subir imagenes JPG JPEG Y PNG.";
        }
    }else{
        echo "El tamaño de la imagen es  demasiado grande";
    }  
?>
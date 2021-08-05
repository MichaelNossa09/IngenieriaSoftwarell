<?php
//Con require_once se incluye el archivo UsuarioDAO.php
require_once(__DIR__."/../../modelo/dao/PeliculasDAO.php");
        
function registrarPelicula(Pelicula $pelicula){
    
    $dao=new PeliculasDAO();

    $pelicula = $dao->registrarPelicula($pelicula);

    return $pelicula;
}

function verPeliculas(){
    $dao=new PeliculasDAO();

    $peliculas = $dao->verPeliculas();

    return $peliculas;
} 

function eliminarPelicula($id){
    $dao=new PeliculasDAO();
    $dao->eliminarPelicula($id);
}

function verPeliculaPorId($id){
    $dao=new PeliculasDAO();
    $pelicula = $dao->verPeliculaPorId($id);
    return $pelicula;
}

function editarPelicula($pelicula){
    $dao=new PeliculasDAO();
    $dao->editarPelicula($pelicula);
}

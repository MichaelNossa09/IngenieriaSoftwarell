<?php
//En esta clase se implementa el patron de diseño DAO, para separar la capa de acceso
//a datos de la lógica de la aplicación. Aqui se crea una instancia de la clase de la 
//conexión para realizar las consultas pertinentes a la base de datos.
//Tambien se llama a las clases planas para guardar la informacion, por ejemplo 
//la clase Usuario


//Con require_once se incluye el archivo especificado, en este caso DataSource.php y 
//Usuario.php
require_once ("DataSource.php");
require_once (__DIR__."/../entidad/Peliculas.php");

class PeliculasDAO {
     
    public function registrarPelicula(Pelicula $pelicula){
        $data_source = new DataSource();
        
        $stmt1 = "INSERT INTO peliculas VALUES (NULL,:nombre,:genero,:imagen,:sipnosis,:precio,:destino)";
        
        $resultado = $data_source->ejecutarActualizacion($stmt1, array(
            ':nombre' => $pelicula->getNombre(),
            ':genero' => $pelicula->getGenero(),
            ':imagen' => $pelicula->getImagen(),
            ':sipnosis' => $pelicula->getSipnosis(),
            ':precio' => $pelicula->getPrecio(),
            ':destino' => $pelicula->getDestino()
        )
        );

      return $resultado;
    }

    public function verPeliculas(){
        $data_source = new DataSource();
        
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM peliculas", NULL);

        $pelicula=null;
        $peliculas=array();

        foreach($data_table as $indice => $valor){
            $pelicula = new Pelicula(
                    $data_table[$indice]["id"],
                    $data_table[$indice]["nombre"],
                    $data_table[$indice]["genero"],
                    $data_table[$indice]["imagen"],
                    $data_table[$indice]["sipnosis"],
                    $data_table[$indice]["precio"],
                    $data_table[$indice]["destino"], 
                    );
            array_push($peliculas,$pelicula);
        }
        
    return $peliculas;
    }

    public function eliminarPelicula($id){
        $data_source = new DataSource();
        
        $stmt1 = "DELETE FROM peliculas WHERE id = :id"; 
        
        $resultado = $data_source->ejecutarActualizacion($stmt1, array(
            ':id' => $id
            )
        ); 

    return $resultado;
    }

    public function verPeliculaPorId($id){
        $data_source = new DataSource();
        
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM peliculas WHERE id = :id", array(':id'=>$id));

        $pelicula=null;
        //Si $data_table retornó una fila, quiere decir que se encontro el usuario en la base de datos
        if(count($data_table)==1){
            $pelicula = new Pelicula(
                $data_table[0]["id"],
                $data_table[0]["nombre"],
                $data_table[0]["genero"],
                $data_table[0]["imagen"],
                $data_table[0]["sipnosis"],
                $data_table[0]["precio"], 
                $data_table[0]["destino"],
            );
        }

        
    return $pelicula;
    }

    public function editarPelicula($pelicula){
        $data_source = new DataSource();
        
        $stmt1 = "UPDATE peliculas SET nombre = :nombre, genero = :genero, imagen = :imagen, sipnosis = :sipnosis, precio = :precio, destino = :destino, WHERE id = :id"; 
        
        $resultado = $data_source->ejecutarActualizacion($stmt1, array(
            ':nombre' => $pelicula->getNombre(),
            ':genero' => $pelicula->getGenero(),
            ':imagen' => $pelicula->getImagen(),
            ':sipnosis' => $pelicula->getSipnosis(),
            ':precio' => $pelicula->getPrecio(),
            ':destino' => $pelicula->getDestino(),
            ':id'=> $pelicula->getId()
            )
        ); 

      return $resultado;
    }

}




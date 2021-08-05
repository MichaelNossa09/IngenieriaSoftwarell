<?php
//En esta clase se implementa el patron de diseño DAO, para separar la capa de acceso
//a datos de la lógica de la aplicación. Aqui se crea una instancia de la clase de la 
//conexión para realizar las consultas pertinentes a la base de datos.
//Tambien se llama a las clases planas para guardar la informacion, por ejemplo 



//Con require_once se incluye el archivo especificado, en este caso DataSource.php y 
//Usuario.php
require_once ("DataSource.php");
require_once (__DIR__."/../entidad/Ventas.php");

class VentasDAO {
     
    public function registrarVenta(Venta $venta){
        $data_source = new DataSource();
        
        $stmt1 = "INSERT INTO tblventas VALUES (NULL,:ClaveTransaccion,:PaypalDatos,:Fecha,:Correo,:Total,:status)";
        
        $resultado = $data_source->ejecutarActualizacion($stmt1, array(
            ':ClaveTransaccion' => $venta->getClaveTransaccion(),
            ':PaypalDatos' => $venta->getPaypalDatos(),
            ':Fecha' => $venta->getFecha(),
            ':Correo' => $venta->getCorreo(),
            ':Total' => $venta->getTotal(),
            ':status' => $venta->getStatus()
        )
        );

      return $resultado;
    }

    public function verVentas(){
        $data_source = new DataSource();
        
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM tblventas", NULL);

        $venta=null;
        $ventas=array();

        foreach($data_table as $indice => $valor){
            $venta = new Venta(
                    $data_table[$indice]["ID"],
                    $data_table[$indice]["ClaveTransaccion"],
                    $data_table[$indice]["PaypalDatos"],
                    $data_table[$indice]["Fecha"],
                    $data_table[$indice]["Correo"],
                    $data_table[$indice]["Total"],
                    $data_table[$indice]["status"], 
                    );
            array_push($ventas,$venta);
        }
        
    return $ventas;
    }

    public function eliminarVenta($id){
        $data_source = new DataSource();
        
        $stmt1 = "DELETE FROM tblventas WHERE id = :ID"; 
        
        $resultado = $data_source->ejecutarActualizacion($stmt1, array(
            ':ID' => $id
            )
        ); 

    return $resultado;
    }

    public function verVentaPorId($id){
        $data_source = new DataSource();
        
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM tblventas WHERE id = :ID", array(':ID'=>$id));

        $venta=null;
        //Si $data_table retornó una fila, quiere decir que se encontro el usuario en la base de datos
        if(count($data_table)==1){
            $venta = new Venta(
                $data_table[0]["ID"],
                $data_table[0]["ClaveTransaccion"],
                $data_table[0]["PaypalDatos"],
                $data_table[0]["Fecha"],
                $data_table[0]["Correo"],
                $data_table[0]["Total"],
                $data_table[0]["status"],
            );
        }

        
    return $venta;
    }

    public function editarVenta($venta){
        $data_source = new DataSource();
        
        $stmt1 = "UPDATE tblventas SET ClaveTransaccion = :ClaveTransaccion, PaypalDatos = :PaypalDatos, Fecha = :Fecha, Correo = :Correo, Total = :Total, status = :status, WHERE id = :ID"; 
        
        $resultado = $data_source->ejecutarActualizacion($stmt1, array(
            ':ClaveTransaccion' => $venta->getClaveTransaccion(),
            ':PaypalDatos' => $venta->getPaypalDatos(),
            ':Fecha' => $venta->getFecha(),
            ':Correo' => $venta->getCorreo(),
            ':Total' => $venta->getTotal(),
            ':status' => $venta->getStatus(),
            ':ID'=> $venta->getID()
            )
        ); 

      return $resultado;
    }

}


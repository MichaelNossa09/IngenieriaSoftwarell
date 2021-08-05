<?php 

include 'carrito.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPELIS</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/pelicula-icon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container text-center pt-5">

        <h3>Ya puedes descargar los siguientes archivos!</h3>
        <hr>
        <div class="row">
            <?php $total = 0;?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){ ?>
            <?php $total = $total+($producto['Cantidad']*$producto['Precio']);?>    
            <?php $link = $producto['Nombre'].'.jpg'?>
            <div class="col-4 ">
                <div class="card">
                <p><?php echo $producto['Nombre']?></p>
                <img 
                    title="<?php echo $link?>"
                    src="../peliculas/<?php echo $link?>"
                >
                </div>
                <div class="pb-3 pt-3">
                <a class="link-info" href="../peliculasventa/<?php echo $producto['Nombre'].'.avi'?>" download>
                    Descargar
                </a> 
                </div>
            </div>   
        <?php } ?>  
        <div class="text-center pb-3">
        <form action="" method="post" >
                    <?php $SID = session_id();
                    date_default_timezone_set('America/Bogota');
                    $date = date('Y-m-d h:i:s a', time());
                    ?>
                    <input type="hidden" id="email" name="ClaveTransaccion" value="<?php echo $SID?>">
                    <input type="hidden" id="PaypalDatos" name="PaypalDatos" value="">
                    <input type="hidden" id="Fecha" name="Fecha" value="<?php echo $date?>">
                    <input type="hidden" id="Correo" name="Correo" value="<?php echo $_SESSION['CORREO_USUARIO']?>">
                    <input type="hidden" id="Total" name="Total" value="<?php echo number_format($total,2); ?>">
                    <input type="hidden" id="status" name="status" value="pagado">
                    <button class="btn btn-info"
                    type="submit"
                    name="btnAccion"
                    value="RegistrarVenta">IR A LA PAGINA PRINCIPAL
                    </button>
                </form>  
        </div>
        </div>
    </div>
</body>
</html>
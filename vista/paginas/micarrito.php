<?php 
require_once(__DIR__."/../../controlador/mdb/mdbPeliculas.php");
require_once(__DIR__."/../../controlador/mdb/mdbUsuario.php");


include 'carrito.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>IPELIS</title>
        <link rel="icon" type="image/x-icon" href="../assets/img/pelicula-icon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="pelisventa.php"><h1 class="display text-danger">IPELIS</h1></a>
                <button class="navbar-toggler navbar-toggler-right bg-danger" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contáctenos</a></li>
                        <li class="nav-item">
                            <div class="dropdown show">
                                <a class="btn btn-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i>
                                </a>
                                <div class="dropdown-menu bg-danger" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item bg-danger" href="perfil.php">Perfil</a>
                                    <a class="dropdown-item bg-danger" href="#">Configuraciones</a>
                                    <a class="dropdown-item bg-danger" href="../../controlador/accion/act_logout.php">Cerrar Sesión</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="page-section" id="pagos">
            <div class="container">

            <br><br><br>
            <h3>Lista del Carrito</h3>
            <hr>
            <?php if($mensajeEliminar!="" && $_SESSION['CARRITO']){ ?>
                <div class="alert alert-success">
                        <?php echo $mensajeEliminar ?>
                </div>
            <?php } ?>
            <?php if($mensajeExitoso!=""){ ?>
                <div class="alert alert-success">
                        <?php echo $mensajeExitoso ?>
                </div>
            <?php }else if(empty($_SESSION['CARRITO'])){ ?>
                <div class="alert alert-success">
                        <?php echo "No hay productos en el carrito." ?>
                </div>
            <?php }?>
            <?php if(!empty($_SESSION['CARRITO'])){ ?>
                <table class="table table-withe table-bordered">
                <tbody>
                    <tr>
                        <th width="40%">Producto</th>
                        <th width="15%" class="text-center">Cantidad</th>
                        <th width="20%" class="text-center">Precio</th>
                        <th width="20%" class="text-center">Total</th>
                        <th width="5">--</th>
                    </tr>
                    <?php $total=0; ?>
                    <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){ ?>
                    <tr>
                        <td width="40%"><?php echo $producto['Nombre']?></td>
                        <td width="15%" class="text-center"><?php echo $producto['Cantidad']?></td>
                        <td width="20%" class="text-center">$<?php echo $producto['Precio']?></td>
                        <td width="20%" class="text-center">$<?php echo number_format($producto['Cantidad']*$producto['Precio'], 2)?></td>
                        <td width="5">
                        <form action="" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['Id'],"AES-128-ECB","");?>">
                            <button class="btn btn-danger" type="submit"
                            name="btnAccion"
                            value="Eliminar"
                            >Eliminar</button></td>
                        </form>    
                        
                    </tr>
                    <?php $total = $total+($producto['Cantidad']*$producto['Precio']);?>
                    <?php } ?>
                    <tr>
                    <tr>
                        <td colspan="3" align="right"><h4>Total</h4></td>
                        <td align="right"><h4>$<?php echo number_format($total,2); ?></h4></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <form action="pagar.php" method="post">
                                <?php $SID = session_id();
                                date_default_timezone_set('America/Bogota');
                                $date = date('Y-m-d h:i:s a', time());
                                ?>

                                <input type="hidden" id="email" name="ClaveTransaccion" value="<?php echo $SID?>">
                                <input type="hidden" id="PaypalDatos" name="PaypalDatos" value="">
                                <input type="hidden" id="Fecha" name="Fecha" value="<?php echo $date?>">
                                <input type="hidden" id="Correo" name="Correo" value="<?php echo $_SESSION['CORREO_USUARIO']?>">
                                <input type="hidden" id="Total" name="Total" value="<?php echo number_format($total,2); ?>">
                                <input type="hidden" id="status" name="status" value="pendiente">
                                <button class="btn btn-outline-info btn-lg btn-block"
                                    name="btnAccion"
                                    value="proceder">COMPRAR AHORA
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>   
            <?php } ?>
          </div>

        </section>
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contáctenos</h2>
                </div>
                <form id="contactForm" name="sentMessage" novalidate="novalidate">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group mb-md-0">
                                <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div id="success"></div>
                        <button class="btn btn-danger btn-xl text-uppercase" id="sendMessageButton" type="submit">Send Message</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">Copyright © IPELIS 2021</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-right">
                        <a class="mr-3 text-danger" href="#!">Politica de privacidad</a>
                        <a class="mr-3 text-danger" href="#!">Condiciones</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="../js/jquery.easing.min.js"></script>
        <script src="../js/sweetalert.min.js"></script>
        <!-- Contact form JS-->
        <script src="../assets/mail/jqBootstrapValidation.js"></script>
        <script src="../assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
    </body>
</html>

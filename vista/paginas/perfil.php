<?php 
include 'carrito.php';
$usuario = $_SESSION['CORREO_USUARIO'];
if(!isset($usuario)){
    header("location: ../../index.html");
}
require_once(__DIR__."/../../controlador/mdb/mdbUsuario.php");

$id = $_SESSION['ID_USUARIO'];
$user = verUsuarioPorId($id);
$nombre = $user->getNombre();
$apellido = $user->getApellido();
$telefono = $user->getTelefono();
$password = $user->getPassword();
$avatar = $user->getAvatar();
$nroCedula = $user->getNroCedula();
$correo = $user->getCorreo();
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
                <a class="navbar-brand js-scroll-trigger" href="logeado.php"><h1 class="display text-danger">IPELIS</h1></a>
                <button class="navbar-toggler navbar-toggler-right bg-danger" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#pagos">Perfil</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contáctenos</a></li>
                        <li class="nav-item">
                            <div class="dropdown show">
                                <a class="btn btn-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i>
                                </a>
                                <div class="dropdown-menu bg-danger" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item bg-danger" href="#">Perfil</a>
                                    <a class="dropdown-item bg-danger" href="#">Configuraciones</a>
                                    <a class="dropdown-item bg-danger" href="../../controlador/accion/act_logout.php">Cerrar Sesión</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="page-section" id="perfil">
            <div class="container">
                <div class="text-center pt-5">
                    <h2 class="section-heading text-uppercase">MI PERFIL</h2><br>
                </div>
                <form action="../../controlador/accion/act_editarUsuario.php" id="imagen-envia" enctype="multipart/form-data" method="POST">
                    <div class="row">
                        <div class="col-lg-5 team-member">
                            <img src="../perfiles/2.jpeg" alt="" class="img rounded-circle">
                            <input type="file" style="display:none" name="avatar" class="btn btn-danger mt-4" id="imagenPerfil">
                        </div>
                        <div class="col-lg-7">
                            <div class="row">
                                <div class="col-6 mb-4">
                                    <label>Nombre</label>
                                    <br>
                                    <input type="text" disabled id="btn1" name="nombre" value="<?php echo $nombre?>" required>
                                </div>
                                <div class="col-6 mb-4">
                                    <label>Apellido</label>
                                    <br>
                                    <input type="text" disabled id="btn2" name="apellido" value="<?php echo $apellido?>" required>
                                </div>
                                <div class="col-6 mb-4">
                                    <label>Correo</label>
                                    <br>
                                    <input type="text" disabled id="Correo" value="<?php echo $correo?>" required>
                                </div>
                                <div class="col-6 mb-4">
                                    <label>Contraseña</label>
                                    <br>
                                    <input type="password" disabled id="btn3" name="password" value="<?php echo $password?>" required>
                                </div>
                                <div class="col-6 mb-4">
                                    <label>Telefono</label>
                                    <br>
                                    <input type="text" disabled id="btn4" name="telefono" value="<?php echo $telefono?>" required>
                                </div>
                                <div class="col-6 mb-4">
                                    <label>Cédula </label>
                                    <br>
                                    <input type="password" id="CC" disabled value="<?php echo $nroCedula ?>" required>
                                </div>
                                <div class="col-6 mb-4">
                                    <input type="button" class="btn btn-danger" id="EP" onclick="editarPerfil()" value="Editar Perfil">
                                    <input type="button" class="btn btn-danger" id="cancelar" style="display:none" onclick="cancelar()" value="Cancelar">
                                    <br>
                                </div>
                                <div class="col-6 mb-4">
                                    <input type="submit" class="btn btn-danger" id="GC" style="display:none" value="Guardar">
                                </div> 
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!--Contact-->
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
        <!-- Contact form JS-->
        <script src="../assets/mail/jqBootstrapValidation.js"></script>
        <script src="../assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
        <script src="../js/editarperfil.js"></script>
    </body>
</html> 

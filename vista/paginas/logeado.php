<?php 
session_start();
$usuario = $_SESSION['CORREO_USUARIO'];
if(!isset($usuario)){
    header("location: ../../index.html");
}
require_once(__DIR__."/../../controlador/mdb/mdbUsuario.php");

$id = $_SESSION['ID_USUARIO'];
$user = verUsuarioPorId($id);
$nombre = $user->getNombre();
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>iPelis</title>
        <link rel="icon" type="image/x-icon" href="../assets/img/pelicula-icon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../../vista/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><h1 class="display text-danger">iPelis</h1></a>
                <button class="navbar-toggler navbar-toggler-right bg-info" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-info ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Peliculas</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#team">Quiénes Somos</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contáctenos</a></li>
                        <li class="nav-item">
                            <div class="dropdown show">
                                <a class="btn btn-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-alt"></i>
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
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading text-danger">Bienvenido!</div>
                <div class="masthead-subheading text-danger">Disfruta de las mejores peliculas en</div>
                <div class="masthead-subheading text-danger">IPELIS</div>
                <a class="btn btn-dark btn-xl masthead-subheading text-danger js-scroll-trigger" href="#portfolio">Ver Peliculas </a>
            </div>
        </header>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="masthead-subheading">Hola,<?php echo "
                    <span class='text-danger'>$nombre</span>
                    "?>
                    </h3>
                    </h2>
                    <h3 class="section-subheading text-muted">Acá podrás encontrar todas las peliculas que te gustan!</h3>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" href="pelisventa.php">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="../../vista/assets/img/portfolio/pelisventa.jpg" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-subheading">Peliculas en venta!</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" href="pelisgratis.php">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="../../vista/assets/img/portfolio/free.jpg" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-subheading text-muted">Peliculas totalmente gratuitas!</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Team-->
        <section class="page-section bg-dark" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase text-danger">Quiénes Somos</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" alt="" />
                            <h4 class="text-danger">Michael Nossa</h4>
                            <p class="text-light">Cargo</p>
                            <a class="btn btn-danger btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-danger btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-danger btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" alt="" />
                            <h4 class="text-danger">Luis Large</h4>
                            <p class="text-light">Cargo</p>
                            <a class="btn btn-danger btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-danger btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-danger btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" alt="" />
                            <h4 class="text-danger">Fabio Grisales</h4>
                            <p class="text-light">Cargo</p>
                            <a class="btn btn-danger btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-danger btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-danger btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-light">Somos una empresa encargada en brindar un servicio de venta de peliculas.</p></div>
                </div>
            </div>
        </section>
        <!-- Iniciar Sesión-->
        <!-- Contact-->
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
        <!-- Portfolio Modals-->
        <!-- Bootstrap core JS-->
        <script src="../../vista/js/jquery.min.js"></script>
        <script src="../../vista/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="../../vista/js/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="vista/assets/mail/jqBootstrapValidation.js"></script>
        <script src="../../vista/assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="../../vista/js/scripts.js"></script>
    </body>
</html>
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
        <section class="page-section" id="pagos">
            <div class="container">
                <?php $total=0; ?>
            <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){ ?>
                <?php $total = $total+($producto['Cantidad']*$producto['Precio']);?>
             <?php } ?>
            <div class="text-center">
                    <h1 class="masthead-subheading">Confirmación</h1>
                    <hr>
                    <p class="lead"> Estás a punto de pagar la cantidad de: 
                        <h4>$<?php echo number_format($total,2); ?> USD</h4>
                    </p>
                    <div id="paypal-button-container">
                        <script src="https://www.paypal.com/sdk/js?client-id=test"></script>
                        <script>paypal.Buttons({
                            createOrder: function(data, actions) {
                                // This function sets up the details of the transaction, including the amount and line item details.
                                return actions.order.create({
                                    purchase_units: [{
                                        amount: {
                                            value: '<?php echo $total?>'
                                        }
                                    }]
                                });
                            },
                            onApprove: function(data, actions) {
                                return actions.order.capture().then(function(details) {
                                    // Show a success message to the buyer
                                    window.location="archivos.php"
                                });
                            },
                            style: {
                                color:  'blue',
                                shape:  'pill',
                                label:  'pay',
                                height: 40
                            }}).render('#paypal-button-container')</script>     
                    </div>
            </div>
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
    </body>
</html>

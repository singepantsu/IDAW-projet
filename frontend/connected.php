<?php
require "starting.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>IMangerMieux</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Jquery and Tables-->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://d3js.org/d3.v7.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <svg class="navbar-brand"height="35" width="250">
                    <text x="3" y="15" fill="orange" style="font-family: Roboto;" id="user_session">Welcome <?php echo $_SESSION['login']?>!</text>
                </svg> 
                <!--a class="navbar-brand" href="#page-top"><img src="assets/img/navbar-logo.svg" alt="..." /></a-->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#accueil">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#connexion">Disconnexion</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead" id="accueil">
            <div class="container">
                <div class="masthead-subheading">Welcome, dear user on</div>
                <div class="masthead-heading text-uppercase">IMangerMieux</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#services">All Services</a>
            </div>
        </header>
        <!-- Disconnexion-->
        <section id="connexion">
            <div class="container">
                <div class="text-center">
                    <br>
                        <?php
                            $user=$_SESSION["login"];
                            echo "<h2 class=\"section-heading text-uppercase\">How are You doing, $user?</h2>";
                            echo "<input class=\"btn btn-primary btn-xl\" type=\"button\" id=\"Disconnect_button\"value=\"Disconnect\">";
                        ?>
                    <br>
                </div>
            </div>
    </section>
        <!-- services Grid-->
        <section class="page-section bg-light" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">services</h2>
                    <h3 class="section-subheading text-muted">"Prenez soin de votre ligne en ligne." Mekki B.</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- services item 1-->
                        <div class="services-item">
                            <a class="services-link" data-bs-toggle="modal" href="#servicesModal1">
                                <div class="services-hover">
                                    <div class="services-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/services/1.png" alt="..." />
                            </a>
                            <div class="services-caption">
                                <div class="services-caption-heading">My Profil</div>
                                <div class="services-caption-subheading text-muted">Display and modify your profil</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- services item 2-->
                        <div class="services-item">
                            <a class="services-link" data-bs-toggle="modal" href="#servicesModal2">
                                <div class="services-hover">
                                    <div class="services-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/services/2.jpg" alt="..." />
                            </a>
                            <div class="services-caption">
                                <div class="services-caption-heading">My logs</div>
                                <div class="services-caption-subheading text-muted">Remember your last meals</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- services item 3-->
                        <div class="services-item">
                            <a class="services-link" data-bs-toggle="modal" href="#servicesModal3">
                                <div class="services-hover" id="load_meals">
                                    <div class="services-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/services/3.jpg" alt="..." />
                            </a>
                            <div class="services-caption">
                                <div class="services-caption-heading">Info Meals</div>
                                <div class="services-caption-subheading text-muted">Check nutriments (lag on first click)</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                        <!-- services item 4-->
                        <div class="services-item">
                            <a class="services-link" data-bs-toggle="modal" href="#servicesModal4">
                                <div class="services-hover">
                                    <div class="services-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/services/4.jpg" alt="..." />
                            </a>
                            <div class="services-caption">
                                <div class="services-caption-heading">Your Sports</div>
                                <div class="services-caption-subheading text-muted">Time to work!</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                        <!-- services item 5-->
                        <div class="services-item">
                            <a class="services-link" data-bs-toggle="modal" href="#servicesModal5">
                                <div class="services-hover">
                                    <div class="services-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/services/5.jpg" alt="..." />
                            </a>
                            <div class="services-caption">
                                <div class="services-caption-heading">Your Next Meal</div>
                                <div class="services-caption-subheading text-muted">Let us choose!</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <!-- services item 6-->
                        <div class="services-item">
                            <a class="services-link" data-bs-toggle="modal" href="#servicesModal6">
                                <div class="services-hover">
                                    <div class="services-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/services/6.jpg" alt="..." />
                            </a>
                            <div class="services-caption">
                                <div class="services-caption-heading">Where To Eat</div>
                                <div class="services-caption-subheading text-muted">Our choices to eat sainly</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Clients-->
        <div class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="https://corndog.io/"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/microsoft.svg" alt="..." aria-label="Microsoft Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="https://longdogechallenge.com/"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/google.svg" alt="..." aria-label="Google Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="https://onesquareminesweeper.com/"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/facebook.svg" alt="..." aria-label="Facebook Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="https://eelslap.com/"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/ibm.svg" alt="..." aria-label="IBM Logo" /></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; IMangerMieux 2022</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="https://www.everydayim.com/" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="https://chrismckenzie.com/" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="https://checkboxolympics.com/" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="https://github.com/singepantsu/IDAW-projet">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="https://github.com/singepantsu/IDAW-projet">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- services Modals-->
        <!-- services item 1 modal popup-->
        <?php
            require_once("displayprofil.php");
        ?>
        <!-- services item 2 modal popup-->
        <?php
            require_once("logsmeal.php");
        ?>
        <!-- services item 3 modal popup-->
        <?php
            require_once("infomeal.php");
        ?>
        <!-- services item 4 modal popup-->
        <?php
            require_once("sports.php");
        ?>
        <!-- services item 5 modal popup-->
        <?php
            require_once("chosemeal.php");
        ?>
        <!-- services item 6 modal popup-->
        <?php
            require_once("wheretoeat.php");
        ?>
        <!--disconnect-->
        <script>
            $('#Disconnect_button').click(function(){
                $.ajax({
                    url: "../backend/disconnect.php",
                    type: 'GET',
                    success: function(){
                        window.location.replace("index.php");
                    }})
            });
        </script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>

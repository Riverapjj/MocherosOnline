<?php
class Public_page{

    public static function header($title){
        print('
            <!DOCTYPE html>
			<html lang="es">
			<head>
				<meta charset="utf-8">
				<title>Mocheros SV - '.$title.'</title>
                <link href="../../resources/css/material_icons.css" rel="stylesheet">
                <!--importando el css materialize.css-->
                <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css" media="screen,projection" />
                <!-- Importando el style.css -->
                <link type="text/css" rel="stylesheet" href="../../resources/css/style.css" media="screen,projection" />
                <link rel="stylesheet" href="../../resources/css/animate.css">
                <link rel="shortcut icon" href="../../resources/img/mocheros-logo.jpg">
                <!--Le hacemos saber al navegador que esté optimizable para moviles-->
                <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
            </head>
            <body>
                <header>
                    <div class="header">
                        <div class="row">
                            <div class="col s12 l12 orange darken-2">
                                <img class="col s4 l2" src="../../resources/img/marca-mochilas.jpg">
                                <h1 class="blue-text text-darken-4"> Mocheros </h1>
                                <h4 class="yellow-text text-accent-2"> Tus compañeros en tus aventuras </h4>
                            </div>
                        </div>
                    </div>
                </header>
                <nav class="amber accent-3">
                    <div class="nav-wrapper">
                        <a href="#" class="brand-logo"></a>
                        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                        <ul id="nav-mobile" class="left hide-on-med-and-down">
                            <li><a href="index.php"><i class="material-icons left">home</i>Inicio</a></li>
                            <li><a href="mochilas.php"><i class="material-icons left">work</i>Mochilas</a></li>
                            <li><a href="loncheras.php"><i class="material-icons left">work</i>Loncheras</a></li>
                            <li><a href="accesorios.php"><i class="material-icons left">watch</i>Accesorios</a></li>
                            <li><a href="carrito.php"><i class="material-icons left">shopping_cart</i>Carrito</a></li>
                            <li><a class="modal-trigger" href="#modal1"><i class="material-icons left">person</i>Iniciar sesión</a></li>
                            <li><a class="modal-trigger" href="#modal2"><i class="material-icons left">person_add</i>Registrarse</a></li>
                        </ul>
                    </div>
                </nav>
                <ul class="sidenav" id="mobile-demo">
                    <li><a href="index.php">Mocheros</a></li>
                    <hr>
                    <li><a href="accesorios.php">Inicio</a></li>
                    <li><a href="mochilas.php">Mochilas</a></li>
                    <li><a href="loncheras.php">Loncheras</a></li>
                    <li><a href="accesorios.php">Accesorios</a></li>
                    <li><a href="carrito.php">Carrito</a></li>
                    <li><a class="modal-trigger" href="#modal1">Iniciar sesión</a></li>
                    <li><a class="modal-trigger" href="#modal2">Registrarse</a></li>
                </ul>
            ');
        }

    public static function footer(){
        print('
        <footer class="page-footer orange darken-2">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Contáctanos</h5>
                        <p class="grey-text text-lighten-4"><b>Técnicos de mantenimiento</b></p>
                        <blockquote>
                            <p class="grey-text text-lighten-4">Carlos Ramírez - Correo electrónico: federamirez_outlook.com</p>
                            <p class="grey-text text-lighten-4">Josué Rivera - Correo electrónico: riverapj@gmail.com</p>
                        </blockquote>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <p class="grey-text text-lighten-4"><b>Dirección</b></p>
                        <blockquote>
                            <p class="grey-text text-lighten-4">CALLE SIEMENS, URB. INDUSTRIAL SANTA ELENA, #54, ANTIGUO
                                CUSCATLAN, LA LIBERTAD, Antiguo Cuscatlan CP 1503</p>
                        </blockquote>
                        <p class="grey-text text-lighten-4"><b>Correo eléctronico</b></p>
                        <blockquote>
                            <p class="grey-text text-lighten-4">contacto@mocheros.com</p>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    © 2019 Derechos reservados a Mocheros S.A. de C.V.
                </div>
            </div>
        </footer>
        
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="../../resources/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
        <script type="text/javascript" src="../../resources/js/main.js"></script>
        <script type="text/javascript" src="../../resources/js/public.js"></script>
        <script type="text/javascript" src="../../resources/js/Chart.js"></script>
        
        </body>
        
        </html>');
    }

    public static function slider(){
        print('<!--Comienza a crearse slider-->
        <div class="slider">
            <ul class="slides">
                <li>
                    <img src="../../resources/img/banner-mochilas3.jpeg"> <!-- random image -->
                    <div class="caption center-align">
                        <h1 class="indigo-text text-darken-4 center-align">MOCHILAS</h1>
                        <h5 class="orange-text text-darken-3"><a href="mochilas.php">Ver más</a></h5>
                    </div>
                </li>
                <li>
                    <img src="../../resources/img/banner-mochilas2.jpeg"> <!-- random image -->
                    <div class="caption center-align">
                        <h3 class="indigo-text text-darken-4 flow-text">¡Bienvenido a Mocheros!</h3>
                        <h5 class="orange-text text-darken-3 flow-text">Somos tus compañeros en tus aventuras del día a
                            día</h5>
                        <a href="mochilas.php" class="orange-text text-darken-3 flow-text">Haz click
                            aquí para ver nuestras mochilas</a>
                    </div>
                </li>
                <li>
                    <img src="../../resources/img/banner-mochilas.png"> <!-- random image -->
                    <div class="caption center-align">
                        <h3 class="indigo-text text-darken-4 flow-text">Febrero, el mes de la amistad</h3>
                        <h5 class="orange-text text-darken-3 flow-text">¡Regala alguno de nuestros productos para tus
                            seres queridos!</h5>
                        <a href="mochilas.php" class="orange-text text-darken-3 flow-text">Haz click
                            aquí para ver nuestras mochilas</a>
                    </div>
                </li>
                <li>
                    <img src="../../resources/img/mochilas-8.jpg"> <!-- random image -->
                    <div class="caption center-align">
                        <h3 class="indigo-text text-darken-4 flow-text">Las mejores mochilas a tu alcance</h3>
                        <h5 class="orange-text text-darken-3 flow-text">Mochilas que puedes utilizar en cualquier
                            momento</h5>
                        <a href="mochilas.php" class="orange-text text-darken-3 flow-text">Haz click
                            aquí para ver nuestras mochilas</a>
                    </div>
                </li>
            </ul>
        </div>

        <div class="slider">
            <ul class="slides">
                <li>
                    <img src="../../resources/img/mochilas-8.jpg"> <!-- random image -->
                    <div class="caption center-align">
                        <h1 class="indigo-text text-darken-4 center-align">LONCHERAS</h1>
                        <h5 class="orange-text text-darken-3"><a href="loncheras.php">Ver más</a></h5>
                    </div>
                </li>
                <li>
                    <img src="../../resources/img/banner-mochilas3.jpeg"> <!-- random image -->
                    <div class="caption center-align">
                        <h3 class="indigo-text text-darken-4 flow-text">Nuestras loncheras destacan por sus diseños y
                            calidad</h3>
                        <h5 class="orange-text text-darken-3 flow-text">Nuestras loncheras poseen los mejores diseños en
                            el mercado</h5>
                        <a href="loncheras.php" class="orange-text text-darken-3 flow-text">Haz click
                            aquí para ver nuestras loncheras</a>
                    </div>
                </li>
                <li>
                    <img src="../../resources/img/banner-mochilas.png"> <!-- random image -->
                    <div class="caption center-align">
                        <h3 class="indigo-text text-darken-4 flow-text">Febrero, el mes del amor y la amistad</h3>
                        <h5 class="orange-text text-darken-3 flow-text">Este es el mes para demostrarle cuánto quieres a
                            tus familiares y amigos con una lonchera</h5>
                        <a href="loncheras.php" class="orange-text text-darken-3 flow-text">Haz click
                            aquí para ver nuestras loncheras</a>
                    </div>
                </li>
                <li>
                    <img src="../../resources/img/banner-mochilas2.jpeg"> <!-- random image -->
                    <div class="caption center-align">
                        <h3 class="indigo-text text-darken-4 flow-text">¡Las mejores loncheras para ti!</h3>
                        <h5 class="orange-text text-darken-3 flow-text">Loncheras con diseños irresistibles</h5>
                        <a href="loncheras.php" class="orange-text text-darken-3 flow-text">Haz click
                            aquí para ver nuestras loncheras</a>
                    </div>
                </li>
            </ul>
        </div>

        <div class="slider">
            <ul class="slides">
                <li class="flow-text">
                    <img src="../../resources/img/banner-accesorios.jpeg"> <!-- random image -->
                    <div class="caption center-align">
                        <h1 class="indigo-text text-darken-4">ACCESORIOS</h1>
                        <h5 class="orange-text text-darken-3"><a href="accesorios.php">Ver más</a></h5>
                    </div>
                </li>
                <li>
                    <img src="../../resources/img/banner-mochilas3.jpeg"> <!-- random image -->
                    <div class="caption center-align">
                        <h3 class="indigo-text text-darken-4 flow-text">Los mejores accesorios para toda ocasión que
                            podrás encontrar</h3>
                        <h5 class="orange-text text-darken-3 flow-text">Perfecto para la escuela, la universidad, el
                            trabajo y muchas cosas más</h5>
                        <a href="accesorios.php" class="orange-text text-darken-3 flow-text">Haz click
                            aquí para ver nuestros accesorios</a>
                    </div>
                </li>
                <li>
                    <img src="../../resources/img/banner-mochilas.png"> <!-- random image -->
                    <div class="caption center-align">
                        <h3 class="indigo-text text-darken-4 flow-text">Regala nuestros accesorios para sorprender a tus
                            seres queridos</h3>
                        <h5 class="orange-text text-darken-3 flow-text">En febrero, la época perfecta para regalar
                            nuestros productos</h5>
                        <a href="accesorios.php" class="orange-text text-darken-3 flow-text">Haz click
                            aquí para ver nuestros accesorios</a>
                    </div>
                </li>
                <li>
                    <img src="../../resources/img/mochilas-8.jpg"> <!-- random image -->
                    <div class="caption center-align">
                        <h3 class="indigo-text text-darken-4 flow-text">¡Todos nuestros accesorios son elaborados para
                            ti!</h3>
                        <h5 class="orange-text text-darken-3 flow-text">Ponemos empeño y dedicación en cada producto que
                            realizamos</h5>
                        <a href="accesorios.php" class="orange-text text-darken-3 flow-text">Haz click
                            aquí para ver nuestros accesorios</a>
                    </div>
                </li>
            </ul>
        </div>');
    }
}
?>
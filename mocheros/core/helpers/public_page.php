<?php
class Public_page{
    public static function header($title){
        print('
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <link type="text/css" rel="stylesheet" href="../../resources/css/bootstrap.css">
                <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css">
                <link href="../../resources/css/material_icons.css" rel="stylesheet">
                <title>'.$title.'</title>
            </head>
            <body>
                <header>
                    <div class="header">
                            <div class="row">
                            <div class="col col-sm-12 col-lg-12 orange darken-2">
                                <img class="col col-sm-3" src="../../resources/img/marca-mochilas.jpg">
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
                        <li><a href="../../views/public/index.php">Inicio</a></li>
                        <li><a href="../../views/public/mochilas.php">Mochilas</a></li>
                        <li><a href="../../views/public/loncheras.php">Locheras</a></li>
                        <li><a href="../../views/public/accesorios.php">Accesorios</a></li>
                        <!--<li><a class="text modal-trigger" href="#modal1">Iniciar sesión</a></li>-->
                        <li><a href="../../dashboard/dashboard.php">Iniciar sesión</a></li>
                    </ul>
                    </div>
                </nav>
                <ul class="sidenav" id="mobile-demo">
                    <li><a href="../../views/public/index.php">Mocheros</a></li>
                    <hr>
                    <li><a href="../../views/public/index.php">Inicio</a></li>
                    <li><a href="../../views/public/mochilas.php">Mochilas</a></li>
                    <li><a href="../../views/public/loncheras.php">Loncheras</a></li>
                    <li><a href="../../views/public/accesorios.php">Accesorios</a></li>
                    <li><a id="dashboard" href="../../dashboard/dashboard.php">Iniciar sesión</a></li>
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
                            <p class="grey-text text-lighten-4">CALLE SIEMENS, URB. INDUSTRIAL SANTA ELENA, #54, ANTIGUO CUSCATLAN, LA LIBERTAD, Antiguo Cuscatlan CP 1503</p>
                        </blockquote>
                        <p class="grey-text text-lighten-4"><b>Correo eléctronico</b></p>
                        <blockquote>
                            <p class="grey-text text-lighten-4">mocheros@gmail.com</p>
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
                <script type="text/javascript" src="../../resources/js/jquery-3.3.1.min.js"></script>
                <script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
                <script type="text/javascript" src="../../resources/js/public.js"></script>
            </body>
            </html>
        ');
    }
}
?>
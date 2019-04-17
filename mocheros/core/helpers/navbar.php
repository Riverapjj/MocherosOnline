<?php
class Navbar{ 

public static function dashNav(){
      print('<div class="navbar-fixed">  
        <nav>
          <div class="nav-wrapper orange darken-2">
          <a href="Dashboard.php" class="brand-logo logok"><img src="../../resources/img/mocheros.jpeg" height="50"></a>
          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
              <li><a href="priv_usuarios.php" class="waves-effect waves-orange">Gestión de usuarios</a></li>
              <li><a href="priv_productos.php" class="waves-effect waves-orange">Administración productos</a></li>
              <li><a href="priv_estados.php" class="waves-effect waves-orange">Gestión de pedidos</a></li>
              <li><a href="../public/index.php" class="waves-effect waves-orange">Cerrar sesión</a></li>
            </ul>
          </div>
        </nav>        
      </div>
        <!--Declaración del modelo del navbar para moviles-->
        <ul class="sidenav orange darken-2" id="mobile-demo">
            <li><a class="white-text">Mocheros</a></li>
                    <hr color="white">
            <li><a href="priv_usuarios.php" class="waves-effect waves-orange white-text">Gestión de usuarios</a></li>
            <li><a href="priv_productos.php" class="waves-effect waves-orange white-text">Administración productos</a></li>
            <li><a href="priv_estados.php" class="waves-effect waves-orange white-text">Gestión de pedidos</a></li>
            <li><a href="../public/index.php" class="waves-effect waves-orange white-text">Cerrar sesión</a></li>
        </ul>');
      }

      public static function indexDashNav(){
        print('<div class="navbar-fixed">  
                    <nav>
                        <div class="nav-wrapper orange darken-2">
                        <a href="" class="brand-logo logok"><img src="../../resources/img/mocheros.jpeg" height="50"></a>
                        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                            <ul id="nav-mobile" class="right hide-on-med-and-down">
                                <li><a href="#modal1" class="waves-effect waves-orange modal-trigger">Iniciar sesión</a></li>
                            </ul>
                        </div>
                    </nav>        
                </div>
                <ul class="sidenav orange darken-2" id="mobile-demo">
                     <li><a class="white-text">Mocheros</a></li>
                      <hr color="white">
                        <li><a class="waves-effect waves-orange modal-trigger" href="#modal1">Iniciar sesión</a></li>
                 </ul>');
        }

        public static function header($title){
            print('<!DOCTYPE html>
            <html lang="en">
              <head>
                      <title>Dashboard - '.$title.'</title>
                      <!--Importando los iconos de google materialize-->
                      <link href="../../resources/css/material_icons.css" rel="stylesheet">
                      <meta charset="utf-8">
                      <!--importando el css materialize.css-->
                      <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css" media="screen,projection" />
                      <!-- Importando el style.css -->
                      <link type="text/css" rel="stylesheet" href="../../resources/css/style.css" media="screen,projection" />
                      <link rel="stylesheet" href="../../resources/css/animate.css">
                      <!--Le hacemos saber al navegador que esté optimizable para moviles-->
                      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
              </head>
              <body>
            ');

        }

        public static function footer(){
            print('
            <!--Estructura del footer-->
            <footer class="page-footer orange darken-2">
                <div class="container">
                    <div class="row">
                        <div class="col s12 l6">
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
                                <p class="grey-text text-lighten-4">Calle El Mirador, Colonia Escalón, World Trade Center San Salvador San Salvador, El Salvador</p>
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
                        © 2018 Derechos reservados a Mocheros S.A. de C.V.    
                    </div>
                    <div class="container">
                        <a class="grey-text text-lighten-4 right" href="https://www.facebook.com"><i class="material-icons">language</i> Facebook&nbsp;&nbsp;&nbsp;</a>
                        <a class="grey-text text-lighten-4 right" href="https://www.twitter.com"><i class="material-icons">favorite</i> Twitter&nbsp;&nbsp;&nbsp;</a>
                        <a class="grey-text text-lighten-4 right" href="https://www.instagram.com"><i class="material-icons">photo_camera</i> Instagram&nbsp;&nbsp;&nbsp;</a>
                        <a class="grey-text text-lighten-4 right" href="https://www.plus.google.com"><i class="material-icons">add</i> Google+&nbsp;&nbsp;&nbsp;</a>
                    </div>
                </div>
                </footer>
                <!--Import jQuery before materialize.js-->
                <script type="text/javascript" src="../../resources/js/jquery-3.3.1.min.js"></script>
                <script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
                <script type="text/javascript" src="../../resources/js/main.js"></script>
                <script type="text/javascript" src="../../resources/js/Chart.bundle.js"></script>
                <script type="text/javascript" src="../../resources/js/Chart.bundle.min.js"></script>
                <script type="text/javascript" src="../../resources/js/Chart.js"></script>
                <script type="text/javascript" src="../../resources/js/Chart.min.js"></script>
            </body>
            </html>

            ');
        }

        public static function indexDashFooter(){
            print('
            <!--Estructura del footer-->
            <footer class="page-footer orange darken-2">
                <div class="container">
                <div class="footer-copyright">
                    <div class="container col s12 l6">
                        © 2018 Derechos reservados a Mocheros S.A. de C.V.    
                    </div>
                    <div class="container">
                        <a class="grey-text text-lighten-4 right col s12 l2" href="https://www.facebook.com"><i class="material-icons">language</i> Facebook&nbsp;&nbsp;&nbsp;</a>
                        <a class="grey-text text-lighten-4 right col s12 l2" href="https://www.twitter.com"><i class="material-icons">favorite</i> Twitter&nbsp;&nbsp;&nbsp;</a>
                        <a class="grey-text text-lighten-4 right col s12 l2" href="https://www.instagram.com"><i class="material-icons">photo_camera</i> Instagram&nbsp;&nbsp;&nbsp;</a>
                        <a class="grey-text text-lighten-4 right col s12 l2" href="https://www.plus.google.com"><i class="material-icons">add</i> Google+&nbsp;&nbsp;&nbsp;</a>
                    </div>
                </div>
                </footer>
                <!--Import jQuery before materialize.js-->
                <script type="text/javascript" src="../../resources/js/jquery-3.3.1.min.js"></script>
                <script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
                <script type="text/javascript" src="../../resources/js/main.js"></script>
            </body>
            </html>
            ');
        }

        public static function slider(){
            print('<div class="slider">
                    <ul class="slides">
                        <li>
                            <img class="responsive-img" src="../../resources/img/mochilas-1.jpg">
                        </li>
                        <li>
                            <img class="responsive-img" src="../../resources/img/mochilas-2.jpg">
                        </li>
                        <li>
                            <img class="responsive-img" src="../../resources/img/mochilas-4.jpg">
                        </li>
                        <li>
                            <img class="responsive-img" src="../../resources/img/mochilas-5.jpg">
                        </li>
                    </ul>
                </div>');
        }

        

  
    }
?>
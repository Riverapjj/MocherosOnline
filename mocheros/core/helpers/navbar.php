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
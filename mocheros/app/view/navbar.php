<?php
class Navbar{ 

public static function dashNav(){
      print('<div class="navbar-fixed">  
        <nav>
          <div class="nav-wrapper orange darken-2">
          <a href="Dashboard.php" class="brand-logo logok"><img src="../resources/img/mocheros.jpeg" height="50"></a>
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
            <a href="" class="brand-logo logok"><img src="../resources/img/mocheros.jpeg" height="50"></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="#modal1" class="waves-effect waves-orange modal-trigger">Iniciar sesión</a></li>
              </ul>
            </div>
          </nav>        
        </div>
          <!--Declaración del modelo del navbar para moviles-->
          <ul class="sidenav orange darken-2" id="mobile-demo">
              <li><a class="white-text">Mocheros</a></li>
                      <hr color="white">
                      <li><a class="waves-effect waves-orange modal-trigger" href="#modal1">Iniciar sesión</a></li>
          </ul>');
        }

  
    }
?>
<?php
class dashboardHelper{ 

    

/* public static function dashNav(){
      print('      <div class="navbar-fixed">
                        <nav class="orange darken-2">
                            <div class="nav-wrapper">
                            <a href="dashboard.php" class="brand-logo logok"><img src="../../resources/img/mocheros.jpeg" height="50"></a>
                                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                                <ul id="nav-mobile" class="right hide-on-med-and-down">
                                    <li><a href="priv_usuarios.php"><i class="material-icons left"></i>Gestión de usuarios</a></li>
                                    <li><a href="priv_productos.php"><i class="material-icons left"></i>Gestión de productos</a></li>
                                    <li><a href="priv_estados.php"><i class="material-icons left"></i>Gestión de pedidos</a></li>
                                    <li><a href="#" class="dropdown-trigger" data-target="dropdown"><i class="material-icons left">person</i>Mi cuenta -<i class="material-icons right">arrow_drop_down</i></a></li>
                                    
                                </ul>
                                <ul id="dropdown" class="dropdown-content">
                                    <li><a href="#" onclick="modalProfile()" class="orange-text text-darken-4"><i class="material-icons">person</i>Ver mi cuenta</a></li>
                                    <li><a href="#modal-password" class="modal-trigger orange-text text-darken-4"><i class="material-icons">lock</i>Cambiar mi contraseña</a></li>
                                    <li><a href="#" onclick="signOff()" class="orange-text text-darken-4"><i class="material-icons">exit_to_app</i>Cerrar sesión</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <ul class="sidenav orange darken-2" id="mobile-demo">
                        <li><a class="white-text" href="#">Mocheros</a></li>
                        <hr color="white">
                        <li><a href="dashboard.php" class="waves-effect waves white-text">Inicio</a></li>
                        <li><a href="#" onclick="modalprofile()" class="waves-effect waves white-text" data-target="dropdown" data-activates="menu_escrow_accounts" data-beloworigin="true">Mi cuenta</a></li>
                        
                        <li><a href="priv_usuarios.php" class="waves-effect waves white-text">Gestión de usuarios</a></li>
                        <li><a href="priv_productos.php" class="waves-effect waves white-text">Administración de productos</a></li>                        
                        <li><a href="priv_estados.php" class="waves-effect waves white-text">Gestión de pedidos</a></li>
                        <hr color="white">
                        <li><a href="#" onclick="signOff()" class="waves-effect waves white-text">Cerrar sesión</a></li>
                    </ul>  
      ');
      } */

/*       public static function indexDashNav(){
        print('<div class="navbar-fixed">  
                    <nav>
                        <div class="nav-wrapper orange darken-2">
                        <a href="" class="brand-logo logok"><img src="../../resources/img/mocheros.jpeg" height="50"></a>
                        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                            <!--<ul id="nav-mobile" class="right hide-on-med-and-down">
                                <li><a href="#modal1" class="waves-effect waves-orange modal-trigger">Iniciar sesión</a></li>
                            </ul>-->
                        </div>
                    </nav>        
                </div>
                <ul class="sidenav orange darken-2" id="mobile-demo">
                     <li><a class="white-text">Mocheros</a></li>
                      <!--<hr color="white">
                        <li><a class="waves-effect waves-orange modal-trigger" href="#modal1">Iniciar sesión</a></li>-->
                 </ul>');
        } */

        //Función para validar el inicio de sesión antes de cargar recursos de las páginas dentro del dashboard
        public static function headerTemplate($title){
		session_start();
		//ini_set('date.timezone', 'America/El_Salvador');
		print('
        <!DOCTYPE html>
        <html lang="es">
          <head>
          <!--Le hacemos saber al navegador que esté optimizable para moviles-->
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                  <title>Dashboard - '.$title.'</title>
                  <!--Importando los iconos de google materialize-->
                  <link href="../../resources/css/material_icons.css" rel="stylesheet">
                  <meta charset="utf-8">
                  <!--importando el css materialize.css-->
                  <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css" media="screen,projection"/>
                  <!-- Importando el style.css -->
                  <link type="text/css" rel="stylesheet" href="../../resources/css/style.css" media="screen,projection"/>
                  <link type="text/css" rel="stylesheet" href="../../resources/css/dataTables.material.min.css"/>
                  <link type="text/css" rel="stylesheet" href="../../resources/css/responsive.jqueryui.min.css"/>
                  <link rel="stylesheet" href="../../resources/css/animate.css">

          </head>
				<body>
		');
		if (isset($_SESSION['idUsuario'])) {
			$filename = basename($_SERVER['PHP_SELF']);
			if ($filename != 'index.php') {
				self::modals();
				print('
					<header>
                    <div class="navbar-fixed">
                    <nav class="orange darken-2">
                        <div class="nav-wrapper">
                        <a href="dashboard.php" class="brand-logo logok"><img src="../../resources/img/mocheros.jpeg" height="50"></a>
                            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                            <ul id="nav-mobile" class="right hide-on-med-and-down">
                                <li><a href="#modal-reports" class="modal-trigger"><i class="material-icons left"></i>Reportes</a></li>
                                <li><a href="priv_usuarios.php"><i class="material-icons left"></i>Gestión de usuarios</a></li>
                                <li><a href="priv_productos.php"><i class="material-icons left"></i>Gestión de productos</a></li>
                                <li><a href="priv_estados.php"><i class="material-icons left"></i>Gestión de pedidos</a></li>
                                <li><a href="#" class="dropdown-trigger" data-target="dropdown"><i class="material-icons left">person</i>Mi cuenta - <b>'.$_SESSION['NomUsuario'].'</b><i class="material-icons right">arrow_drop_down</i></a></li>
                                
                            </ul>
                            <ul id="dropdown" class="dropdown-content">
                                <li><a href="#" onclick="modalProfile()" class="orange-text text-darken-4"><i class="material-icons">person</i>Ver mi cuenta</a></li>
                                <li><a href="#modal-password" class="modal-trigger orange-text text-darken-4"><i class="material-icons">lock</i>Cambiar mi contraseña</a></li>
                                <li><a href="#" onclick="signOff()" class="orange-text text-darken-4"><i class="material-icons">exit_to_app</i>Cerrar sesión</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <ul class="sidenav orange darken-2" id="mobile-demo">
                    <li><a class="white-text" href="#">Mocheros</a></li>
                    <hr color="white">
                    <li><a href="dashboard.php" class="waves-effect waves white-text">Inicio</a></li>
                    <li><a href="#" onclick="modalprofile()" class="waves-effect waves white-text" data-target="dropdown" data-activates="menu_escrow_accounts" data-beloworigin="true">Mi cuenta</a></li>
                    
                    
                    <li><a href="priv_usuarios.php" class="waves-effect waves white-text">Gestión de usuarios</a></li>
                    <li><a href="priv_productos.php" class="waves-effect waves white-text">Administración de productos</a></li>                        
                    <li><a href="priv_estados.php" class="waves-effect waves white-text">Gestión de pedidos</a></li>
                    <hr color="white">
                    <li><a href="#" onclick="signOff()" class="waves-effect waves white-text">Cerrar sesión</a></li>
                </ul>
                <div class="slider">
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
                </div>
                    </header>

                    
                    <!-- Modal para visualizar reportes disponibles --!>
                    <div id="modal-reports" class="modal"> 
                        <div class="modal-content">               
                            <ul class="collapsible">
                                <li>
                                    <div class="collapsible-header">
                                        <i class="material-icons">filter_drama</i>Gestión de usuarios
                                    </div>
                                    <div class="collapsible-body">
                                        <span>
                                            <table class="centered">
                                                <thead>
                                                    <tr>                                                        
                                                        <th>Mayor consumidor<br>
                                                            <a href="../../core/reportes/dashboard/reporteMayoresConsumidor.php" class="btn-floating pulse">
                                                            <i class="material-icons">menu</i>
                                                            </a>
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="collapsible-header">
                                        <i class="material-icons">place</i>Gestión de productos
                                    </div>
                                    <div class="collapsible-body">
                                        <span>
                                            <table class="centered">
                                                <thead>
                                                    <tr>                                                        
                                                        <th>Productos por categorías<br>
                                                            <a href="../../core/reportes/dashboard/reporteProductos.php" class="btn-floating pulse">
                                                            <i class="material-icons">menu</i>
                                                            </a>
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="collapsible-header">
                                        <i class="material-icons">place</i>Gestión de pedidos
                                    </div>
                                    <div class="collapsible-body">
                                        <span>
                                            <table class="centered">
                                                <thead>
                                                    <tr>                                                        
                                                        <th>Mayor venta<br>
                                                            <a href="../../core/reportes/dashboard/reporteMayoresVentas.php" class="btn-floating pulse">
                                                            <i class="material-icons">menu</i>
                                                            </a>
                                                        </th>
                                                    </tr>
                                                    <tr>                                                        
                                                        <th>Pedidos por fechas<br>
                                                            <a href="#modal-parametros-fecha" class="btn-floating pulse modal-trigger">
                                                            <i class="material-icons">menu</i>
                                                            </a>
                                                        </th>
                                                    </tr>
                                                    <tr>                                                        
                                                        <th>Pedidos por estado<br>
                                                            <a href="#modal-parametros-estado" class="btn-floating pulse modal-trigger">
                                                            <i class="material-icons">menu</i>
                                                            </a>
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </span>
                                    </div>
                                </li>
                            </ul>   
                        </div>     
                    </div>

                    <!-- Modal para visualizar parametros de fechas --!>
                    <div id="modal-parametros-fecha" class="modal">
                        <div class="modal-content">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="fecha1">Fecha inicio</label>
                                    <input type="date" class="form-control" id="fecha1" placeholder="Fecha Inicio">
                                    <small class="form-text text-muted">Ej. 19/05/2019</small>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="fecha2">Fecha final</label>
                                    <input type="date" class="form-control" id="fecha2" placeholder="Fecha Inicio">
                                    <small class="form-text text-muted">Ej. 19/05/2019</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-center my-4 ml-5">
                            <button type="button" onclick="enviarReporteFechas()" class="btn waves-effect blue">Generar Reporte
                                <i class="material-icons">insert_drive_file</i>
                            </button>   
                        </div>
                    </div>

                    <!-- Modal para visualizar parametro por estado --!>
                    <div id="modal-parametros-estado" class="modal">
                        <div class="modal-content">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="fecha1">Estados</label>
                                    <select id="estado-pedidosreport">
                                        <option value="" disabled selected>Seleccione un estado</option>
                                    </select>
                                    <br><br>
                                    <div class="col-12 d-flex justify-content-center my-4 ml-5">
                                        <button type="button" onclick="enviarReporteEstados()" class="btn waves-effect blue">Generar Reporte
                                            <i class="material-icons">insert_drive_file</i>
                                        </button>   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				');
			} else {
				header('location: dashboard.php');
			}
		} else {
			$filename = basename($_SERVER['PHP_SELF']);
			if ($filename != 'index.php' && $filename != 'register.php') {
				header('location: index.php');
			} else {
				print('
					<header>
                    <div class="navbar-fixed">  
                    <nav>
                        <div class="nav-wrapper orange darken-2">
                        <a href="" class="brand-logo logok"><img src="../../resources/img/mocheros.jpeg" height="50"></a>
                        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                            <!--<ul id="nav-mobile" class="right hide-on-med-and-down">
                                <li><a href="#modal1" class="waves-effect waves-orange modal-trigger">Iniciar sesión</a></li>
                            </ul>-->
                        </div>
                    </nav>        
                </div>
                <ul class="sidenav orange darken-2" id="mobile-demo">
                     <li><a class="white-text">Mocheros</a></li>
                      <!--<hr color="white">
                        <li><a class="waves-effect waves-orange modal-trigger" href="#modal1">Iniciar sesión</a></li>-->
                 </ul>
					</header>
				');
			}
		}
	}

        /* public static function header($title){
            print('
            <!DOCTYPE html>
            <html lang="es">
              <head>
              <!--Le hacemos saber al navegador que esté optimizable para moviles-->
              <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                      <title>Dashboard - '.$title.'</title>
                      <!--Importando los iconos de google materialize-->
                      <link href="../../resources/css/material_icons.css" rel="stylesheet">
                      <meta charset="utf-8">
                      <!--importando el css materialize.css-->
                      <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css" media="screen,projection"/>
                      <!-- Importando el style.css -->
                      <link type="text/css" rel="stylesheet" href="../../resources/css/style.css" media="screen,projection"/>
                      <link type="text/css" rel="stylesheet" href="../../resources/css/dataTables.material.min.css"/>
                      <link type="text/css" rel="stylesheet" href="../../resources/css/responsive.jqueryui.min.css"/>
                      <link rel="stylesheet" href="../../resources/css/animate.css">

              </head>
            ');

        } */


        //Función para el pie de página del dashboard, recibe 2 controladores
        public static function footer($firstcontroller, $secondcontroller){
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
                <script type="text/javascript" src="../../resources/js/dataTables.min.js"></script>  
                <script type="text/javascript" src="../../resources/js/dataTable.js"></script> 
                <script type="text/javascript" src="../../resources/js/dataTables.material.min.js"></script>
                <script type="text/javascript" src="../../resources/js/dataTables.responsive.min.js"></script>       
                <script type="text/javascript" src="../../resources/js/main.js"></script>
                <script type="text/javascript" src="../../resources/js/Chart.bundle.min.js"></script>
                <script type="text/javascript" src="../../resources/js/Chart.bundle.js"></script>
                <script type="text/javascript" src="../../resources/js/Chart.min.js"></script>
                <script type="text/javascript" src="../../resources/js/Chart.js"></script>
                <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
                <script type="text/javascript" src="../../core/helpers/functions.js"></script>
                <script type="text/javascript" src="../../core/helpers/componentes.js"></script>                
                <script type="text/javascript" src="../../core/controllers/dashboard/account.js"></script>              
                <script type="text/javascript" src="../../core/controllers/dashboard/'.$firstcontroller.'"></script>
                <script type="text/javascript" src="../../core/controllers/dashboard/'.$secondcontroller.'"></script>
            </body>
            </html>

            ');
        }

        //Función para el pie de página index de nuestro dashboard, es decir, el inicio de sesión
        public static function indexDashFooter($controller){
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
                <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
                <script type="text/javascript" src="../../core/helpers/functions.js"></script>
                <script type="text/javascript" src="../../core/controllers/dashboard/'.$controller.'"></script>
            </body>
            </html>
            ');
        }

        /* public static function slider(){
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
        } */

    //Función para abrir modals de perfil y de recuperar contraseña
    private function modals()
	{
		print('
        <div id="modal-profile" class="modal">
                <div class="modal-content">
                    <h3 class="center-align">Mi cuenta</h3>
                    <form method="post" id="form-profile">
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">assignment_ind</i>
                            <input id="profile_usuario" type="text" name="profile_usuario" class="validate" required/>
                            <label for="profile_usuario">Nombre de usuario</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">person</i>
                            <input id="profile_nombre" type="text" name="profile_nombre" class="validate" required/>
                            <label for="profile_nombre">Nombres</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">person</i>
                            <input id="profile_apellido" type="text" name="profile_apellido" class="validate" required/>
                            <label for="profile_apellido">Apellidos</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">person</i>
                            <textarea id="profile_direccion" name="profile_direccion" class="materialize-textarea validate" required></textarea>
                            <label for="profile_direccion">Dirección</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">person</i>
                            <input id="profile_telefono" type="text" name="profile_telefono" class="validate" required/>
                            <label for="profile_telefono">Teléfono</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">person</i>
                            <input id="profile_correo" type="text" name="profile_correo" class="validate" required/>
                            <label for="profile_correo">Correo electrónico</label>
                        </div>
                        <div class="col s12">
                            <button type="submit" class="btn waves-effect orange tooltipped" data-tooltip="Guardar"><i class="material-icons left">edit</i>Editar perfil</button>
                        </div>
                    </form>
                </div>
            </div>
        <div id="modal-password" class="modal">
            <div class="modal-content">
                <h4 class="center-align">Cambiar contraseña</h4>
                <form method="post" id="form-password">
                    <div class="row center-align">
                        <label>Contraseña actual</label>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">security</i>
                            <input id="clave_actual_1" type="password" name="clave_actual_1" class="validate" required/>
                            <label for="clave_actual_1">Clave</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">security</i>
                            <input id="clave_actual_2" type="password" name="clave_actual_2" class="validate" required/>
                            <label for="clave_actual_2">Confirmar clave</label>
                        </div>
                    </div>
                    <div class="row center-align">
                        <label>CLAVE NUEVA</label>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">security</i>
                            <input id="clave_nueva_1" type="password" name="clave_nueva_1" class="validate" required/>
                            <label for="clave_nueva_1">Clave</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">security</i>
                            <input id="clave_nueva_2" type="password" name="clave_nueva_2" class="validate" required/>
                            <label for="clave_nueva_2">Confirmar clave</label>
                        </div>
                    </div>
                    <div class="row center-align">
                        <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                        <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Cambiar"><i class="material-icons">save</i></button>
                    </div>
                </form>
            </div>
        </div>
    ');
    }
    
}
?>
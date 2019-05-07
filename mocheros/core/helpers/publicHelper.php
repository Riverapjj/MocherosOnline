<?php
class publicHelper{

    public static function header($title){
        session_start();
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
            ');
            if (isset($_SESSION['idUsuario'])) {
                $filename = basename($_SERVER['PHP_SELF']);
                if ($filename != 'login.php') {
                    self::modals();
                    print('
                    <header>
                        <div class="header">
                            <!--<div class="row">
                                <div class="col s12 l12 orange darken-2">
                                    <img class="col s4 l2" src="../../resources/img/marca-mochilas.jpg">
                                    <h1 class="blue-text text-darken-4"> Mocheros </h1>
                                    <h4 class="yellow-text text-accent-2"> Tus compañeros en tus aventuras </h4>
                                </div>
                            </div>-->
                        </div>
                    </header>
                    <div class="navbar-fixed">
                        <nav class="orange darken-2">
                            <div class="nav-wrapper">
                                <a href="index.php" class="brand-logo"><img src="../../resources/img/mocheros-mini.jpg"></a>
                                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                                <ul id="nav-mobile" class="right hide-on-med-and-down">
                                    <li><a href="index.php"><i class="material-icons left">home</i>Inicio</a></li>
                                    <li><a href="mochilas.php"><i class="material-icons left">work</i>Productos</a></li>
                                    <li><a href="#" class="dropdown-trigger" data-target="dropdown"><i class="material-icons left">person</i>Mi cuenta - '.$_SESSION['nombreUsuario'].'<i class="material-icons right">arrow_drop_down</i></a></li>
                                    <!--<li><a href="registrarse.php"><i class="material-icons left">person_add</i>Registrarse</a></li>-->
                                    <li><a href="carrito.php"><i class="material-icons left">shopping_cart</i>Carrito</a></li>
                                </ul>
                                <ul id="dropdown" class="dropdown-content">
                                    <li><a href="#" onclick="modalProfile()" class="orange-text text-darken-4"><i class="material-icons">person</i>Ver mi cuenta</a></li>
                                    <li><a href="#modal-password" class="orange-text text-darken-4"><i class="material-icons">lock</i>Cambiar mi contraseña</a></li>
                                    <li><a href="#" onclick="signOff()" class="orange-text text-darken-4"><i class="material-icons">exit_to_app</i>Cerrar sesión</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <ul class="sidenav" id="mobile-demo">
                        <li><a href="index.php">Mocheros</a></li>
                        <hr>
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="mochilas.php">Productos</a></li>
                        <li><a href="carrito.php">Carrito</a></li>
                        <li><a href="login.php">Mi cuenta</a></li>
                        <li><a href="registrarse.php">Registrarse</a></li>
                        <hr>
                        <li><a href="#" onclick="signOff()">Cerrar sesión</a></li>
                    </ul>
                    ');
                } else {
                    header('location: mochilas.php');
                }
            } else {
                $filename = basename($_SERVER['PHP_SELF']);
                if ($filename != 'index.php' && $filename != 'login.php' && $filename != 'registrarse.php' && $filename != 'mochilas.php') {
                    header('location: index.php');
                } else {
                    print('
                    <header>
                        <div class="header">
                            <!--<div class="row">
                                <div class="col s12 l12 orange darken-2">
                                    <img class="col s4 l2" src="../../resources/img/marca-mochilas.jpg">
                                    <h1 class="blue-text text-darken-4"> Mocheros </h1>
                                    <h4 class="yellow-text text-accent-2"> Tus compañeros en tus aventuras </h4>
                                </div>
                            </div>-->
                        </div>
                    </header>
                    <div class="navbar-fixed">
                        <nav class="orange darken-2">
                            <div class="nav-wrapper">
                                <a href="index.php" class="brand-logo"><img src="../../resources/img/mocheros-mini.jpg"></a>
                                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                                <ul id="nav-mobile" class="right hide-on-med-and-down">
                                    <li><a href="index.php"><i class="material-icons left">home</i>Inicio</a></li>
                                    <li><a href="mochilas.php"><i class="material-icons left">work</i>Productos</a></li>
                                    <li><a href="login.php"><i class="material-icons left">person</i>Iniciar sesión</a></li>
                                    <li><a href="registrarse.php"><i class="material-icons left">person_add</i>Registrarse</a></li>
                                </ul>
                                <!--<ul id="dropdown" class="dropdown-content">
                                    <li><a href="login.php" class="orange-text text-darken-4"><i class="material-icons">person</i>Iniciar sesión</a></li>
                                    <li><a href="#" onclick="s" class="orange-text text-darken-4"><i class="material-icons">clear</i>Cerrar sesión</a></li>
                                </ul>-->
                            </div>
                        </nav>
                    </div>
                    <ul class="sidenav" id="mobile-demo">
                        <li><a href="index.php">Mocheros</a></li>
                        <hr>
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="mochilas.php">Productos</a></li>
                        <li><a href="login.php">Iniciar sesión</a></li>
                        <li><a href="registrarse.php">Registrarse</a></li>
                    </ul>
                    ');
                }
            }
        }

    public static function footer($controller){
        print('
        <footer class="page-footer orange darken-2">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text"><b>Contáctanos</b></h5>
                        <p class="grey-text text-lighten-4"><b>Correo electrónico</b></p>
                        <blockquote>
                            <p class="grey-text text-lighten-4">contacto@mocheros.com</p>
                        </blockquote>
                        <p class="grey-text text-lighten-4"><b>Teléfono</b></p>
                        <blockquote>
                            <p class="grey-text text-lighten-4">(503) 2245-5455</p>
                        </blockquote>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <p class="grey-text text-lighten-4"><b>Dirección</b></p>
                        <blockquote>
                            <p class="grey-text text-lighten-4">CALLE SIEMENS, URB. INDUSTRIAL SANTA ELENA, #54, ANTIGUO
                                CUSCATLAN, LA LIBERTAD, Antiguo Cuscatlan CP 1503</p>
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
        <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
        <script type="text/javascript" src="../../resources/js/main.js"></script>
        <script type="text/javascript" src="../../resources/js/public.js"></script>
        <script type="text/javascript" src="../../resources/js/Chart.js"></script>
        <script type="text/javascript" src="../../resources/js/functions.js"></script>
        <script type="text/javascript" src="../../core/controllers/public/logout.js"></script>
        <script type="text/javascript" src="../../core/controllers/public/'.$controller.'"></script>
        </body>
        
        </html>');
    }

    public static function slider(){
        print('<!--Comienza a crearse slider-->
        <div class="slider">
            <ul class="slides">
                <li>
                    <img src="../../resources/img/banner-mochilas3.jpeg"> 
                    <div class="caption center-align">
                        <h1 class="yellow-text text-darken-1 center-align">MOCHILAS</h1>
                    </div>
                </li>
                <li>
                    <img src="../../resources/img/banner-mochilas2.jpeg"> 
                    <div class="caption center-align">
                        <h3 class="yellow-text text-darken-1 flow-text"><b>¡Bienvenido a Mocheros!</b></h3>
                        <h5 class="orange-text text-darken-3 flow-text"><b>Somos tus compañeros en tus aventuras del día a día</b></h5>
                    </div>
                </li>
                <li>
                    <img src="../../resources/img/mochilas-8.jpg"> 
                    <div class="caption center-align">
                        <h3 class="yellow-text text-darken-1 flow-text">Las mejores mochilas a tu alcance</h3>
                        <h5 class="orange-text text-darken-3 flow-text">Mochilas que puedes utilizar en cualquier momento</h5>
                    </div>
                </li>
                <li>
                    <img src="../../resources/img/mochilas-8.jpg"> 
                    <div class="caption center-align">
                        <h1 class="yellow-text text-darken-1 center-align">LONCHERAS</h1>
                    </div>
                </li>
                <li>
                    <img src="../../resources/img/banner-mochilas3.jpeg"> 
                    <div class="caption center-align">
                        <h3 class="yellow-text text-darken-1 flow-text">Nuestras loncheras destacan por sus diseños y
                            calidad</h3>
                        <h5 class="orange-text text-darken-3 flow-text">Nuestras loncheras poseen los mejores diseños en el mercado</h5>
                    </div>
                </li>
                <li>
                    <img src="../../resources/img/banner-mochilas2.jpeg"> 
                    <div class="caption center-align">
                        <h3 class="yellow-text text-darken-1 flow-text">¡Las mejores loncheras para ti!</h3>
                        <h5 class="orange-text text-darken-3 flow-text">Loncheras con diseños irresistibles</h5>
                    </div>
                </li>
                <li class="flow-text">
                    <img src="../../resources/img/banner-accesorios.jpeg"> 
                    <div class="caption center-align">
                        <h1 class="yellow-text text-darken-1">ACCESORIOS</h1>
                    </div>
                </li>
                <li>
                    <img src="../../resources/img/banner-mochilas3.jpeg"> 
                    <div class="caption center-align">
                        <h3 class="yellow-text text-darken-1 flow-text">Los mejores accesorios para toda ocasión que
                            podrás encontrar</h3>
                        <h5 class="orange-text text-darken-3 flow-text">Perfecto para la escuela, la universidad, el
                            trabajo y muchas cosas más</h5>
                    </div>
                </li>
                <li>
                    <img src="../../resources/img/mochilas-8.jpg"> 
                    <div class="caption center-align">
                        <h3 class="yellow-text text-darken-1 flow-text">¡Todos nuestros accesorios son elaborados para
                            ti!</h3>
                        <h5 class="orange-text text-darken-3 flow-text">Ponemos empeño y dedicación en cada producto que
                            realizamos</h5>
                    </div>
                </li>
            </ul>
        </div>');
    }

    public function modals(){
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
        <div id="terminos" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4>Términos y condiciones</h4>
                <p>Los siguientes términos y condiciones (los "Términos y Condiciones") rigen el uso que usted le dé a
                    este sitio web y a cualquiera de los contenidos disponibles por o a través de este sitio web,
                    incluyendo
                    cualquier contenido derivado del mismo (el "Sitio Web"). Mocheros S.A de C.V ("Mocheros S.A de C.V" o "nosotros") ha
                    puesto a su disposición el Sitio Web. Podemos cambiar los Términos y Condiciones de vez en cuando,
                    en cualquier momento sin ninguna notificación, sólo publicando los cambios en el Sitio Web. <b> AL USAR
                    EL SITIO WEB, USTED ACEPTA Y ESTE DE ACUERDO CON ESTOS TÉRMINOS Y CONDICIONES EN LO QUE SE REFIERE
                    A SU USO DEL SITIO WEB. </b> Si usted no está de acuerdo con estos Términos y Condiciones, no puede tener
                    acceso al mismo ni usar el Sitio Web de ninguna otra manera.
                    <br>
                    1. Derechos de Propiedad. Entre usted y Mocheros S.A de C.V, Mocheros S.A de C.V es dueño único y exclusivo, de todos
                    los derechos, título e intereses en y del Sitio Web, de todo el contenido (incluyendo, por ejemplo,
                    audio, fotografías, ilustraciones, gráficos, otros medios visuales, videos, copias, textos,
                    software, títulos, archivos de Onda de choque, etc.), códigos, datos y materiales del mismo,
                    el aspecto y el ambiente, el diseño y la organización del Sitio Web y la compilación de los
                    contenidos, códigos, datos y los materiales en el Sitio Web, incluyendo pero no limitado a,
                    cualesquiera derechos de autor, derechos de marca, derechos de patente, derechos de base de datos,
                    derechos morales, derechos sui generis y otras propiedades intelectuales y derechos patrimoniales
                    del mismo. Su uso del Sitio Web no le otorga propiedad de ninguno de los contenidos, códigos, datos
                    o materiales a los que pueda acceder en o a través del Sitio Web.</p>
            </div>
            <div class="modal-footer">
                <a href="#modal2" class=" modal-trigger modal-action modal-close waves-effect waves-cyan btn-flat ">Aceptar</a>
            </div>
        </div>
        ');
    }
}

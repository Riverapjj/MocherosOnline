<!DOCTYPE html>
<html>
<head>
<?php
    require('../app/view/head.php');
    ?>
<title> Login </title>
</head>

    <body>
      <header>
        <!--Estructura del navbar-->
          <div class="navbar-fixed">
            <nav class="grey lighten-5">
                <div class="nav-wrapper">
                    <a href="index.php" class="brand-logo logok"> <img src="../resources/img/logo.png " height="50"></a>
                    <a href="#" data-activates="mobile-demo" class="button-collapse cyan-text"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                      <li><a class="modal-trigger cyan-text" href="#modal1">Iniciar sesión</a></li>
                      <li><a class="modal-trigger cyan-text" href="#modal2"> Registrarse</a></li>
                      
                    </ul>
                </div> 
            </nav>
          </div> 
          <!--Estructura del navbar para dispositivos moviles-->
          <ul class="side-nav" id="mobile-demo">
            <li><a class="modal-trigger cyan-text" href="#modal1">Iniciar sesión</a></li>
            <li><a class="modal-trigger cyan-text" href="#modal2"> Registrarse</a></li>
           
          </ul>
    </header>
    <main>
        <!-- Estructura de modal iniciar sesión -->
        <div id="modal1" class="modal ">
              <div class="modal-content">
                  <h4 class="cyan-text">Iniciar sesión</h4>
                  <div class="row">
                    <form >
                      <div class="input-field col s12 ">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="icon_prefix" type="text" class="validate">
                        <label for="icon_prefix">Usuario</label>
                      </div>
                      <div class="input-field col s12">
                          <i class="material-icons prefix">vpn_key</i>
                          <input id="icon_password" type="password" class="validate">
                          <label for="icon_password">Contraseña</label>
                      </div>                   
                   </form>
                  </div>
              </div>
              <div class="modal-footer">
                  <a href="inicio.php" class="modal-action modal-close waves-effect waves-cyan btn-flat">Iniciar sesión</a>
              </div>
        </div>
        <!--Estructura de modal para términos y condiciones -->
        <div id="modal3" class="modal modal-fixed-footer">
            <div class="modal-content">
              <h4>Términos y condiciones</h4>
              <p>Los siguientes términos y condiciones (los "Términos y Condiciones") rigen el uso que usted le dé a este sitio web y a cualquiera de los contenidos disponibles por o a través de este sitio web, incluyendo
                 cualquier contenido derivado del mismo (el "Sitio Web"). Time Inc. ("Time Inc." o "nosotros") ha puesto a su disposición el Sitio Web. Podemos cambiar los Términos y Condiciones de vez en cuando,
                 en cualquier momento sin ninguna notificación, sólo publicando los cambios en el Sitio Web. AL USAR EL SITIO WEB, USTED ACEPTA Y ESTÉ DE ACUERDO CON ESTOS TÉRMINOS Y CONDICIONES EN LO QUE SE REFIERE
                 A SU USO DEL SITIO WEB. Si usted no está de acuerdo con estos Términos y Condiciones, no puede tener acceso al mismo ni usar el Sitio Web de ninguna otra manera.
                 1. Derechos de Propiedad. Entre usted y Time Inc., Time Inc. es dueño único y exclusivo, de todos los derechos, título e intereses en y del Sitio Web, de todo el contenido (incluyendo, por ejemplo, 
                 audio, fotografías, ilustraciones, gráficos, otros medios visuales, videos, copias, textos, software, títulos, archivos de Onda de choque, etc.), códigos, datos y materiales del mismo,
                 el aspecto y el ambiente, el diseño y la organización del Sitio Web y la compilación de los contenidos, códigos, datos y los materiales en el Sitio Web, incluyendo pero no limitado a, 
                 cualesquiera derechos de autor, derechos de marca, derechos de patente, derechos de base de datos, derechos morales, derechos sui generis y otras propiedades intelectuales y derechos patrimoniales
                del mismo. Su uso del Sitio Web no le otorga propiedad de ninguno de los contenidos, códigos, datos o materiales a los que pueda acceder en o a través del Sitio Web.</p>
            </div>
            <div class="modal-footer">
              <a href="#modal2" class=" modal-trigger modal-action modal-close waves-effect waves-cyan btn-flat ">Aceptar</a>     
            </div>
        </div>
        <!--Estructura de modal para registrarse-->
        <div id="modal2" class="modal  modal-fixed-footer">
            <div class="modal-content">
                <h4 class="cyan-text">Registrarse</h4>
                <div class="row">
                  <form class="col s12">
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="icon_prefix" type="text" class="validate">
                        <label for="icon_prefix">Nombre</label>
                      </div>
                      <div class="input-field col s12">
                          <i class="material-icons prefix">call</i>
                          <input id="icon_prefix" type="text" class="validate">
                          <label for="icon_prefix">Teléfono</label>
                      </div>
                      <div class="input-field col s12 ">
                            <i class="material-icons prefix">contact_mail</i>
                            <input id="icon_prefix" type="text" class="validate">
                            <label for="icon_prefix">Correo electrónico</label>
                      </div>
                      <div class="input-field col s12 ">
                          <i class="material-icons prefix">vpn_key</i>
                          <input id="icon_password" type="password" class="validate">
                          <label for="icon_password">Contraseña</label>
                      </div>
                      <div class="input-field col s12 ">
                          <i class="material-icons prefix">vpn_key</i>
                          <input id="icon_password" type="password" class="validate">
                          <label for="icon_password">Confirmacion Contraseña</label>
                          <a class=" modal-trigger modal-action modal-close " href="#modal3">Al darle registrse acepto términos y condiciones de kidszone</a>                       
                        </div>                           
                    </div>
                  </form>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class=" modal-trigger modal-action modal-close waves-effect waves-cyan btn-flat">Registrarse</a>
            </div>
      </div>
        <!--video de fondo, el cual no tiene sonido, y siempre se repite-->
        <video  controls autoplay loop muted>
           <source src="../web/video/video.mp4" type="video/mp4">
        </video>    
        <div class= "text row animated slideInLeft">
            <div class="col s12 ">
              <h1 class= "white-text black-font">KIDSZONE</h1>
              <h5 class="white-text">"It's all about imagination" </h5>
            </div>    	
         </div>          
    </main>       
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../web/js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="../web/js/materialize.min.js"></script>
      <script type="text/javascript" src="../web/js/main.js"></script>
    </body>
</html>
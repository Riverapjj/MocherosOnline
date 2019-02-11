<?php
include "../../core/helpers/public_page.php";
public_page::header("Principal");
?>
<!-- Estructura de modal iniciar sesión -->
    <div id="modal1" class="modal modal-fixed-footer">
              <div class="modal-content">
                  <h4 class="cyan-text">Iniciar sesión</h4>
                  <div class="row">
                    <form >
                      <div class="input-field col s12 ">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="user" type="text" class="validate">
                        <label for="user">Usuario</label>
                      </div>
                      <div class="input-field col s12">
                          <i class="material-icons prefix">vpn_key</i>
                          <input id="passwordon" type="password" class="validate">
                          <label for="passwordon">Contraseña</label>
                      </div>                   
                   </form>
                  </div>
              </div>
              <div class="modal-footer">
                  <a href="../../dashboard/dashboard.php" class="modal-action modal-close waves-effect waves-cyan btn-flat">Iniciar sesión</a>
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
                        <input id="name" type="text" class="validate">
                        <label for="name">Nombre</label>
                      </div>
                      <div class="input-field col s12">
                          <i class="material-icons prefix">call</i>
                          <input id="number" type="text" class="validate">
                          <label for="number">Teléfono</label>
                      </div>
                      <div class="input-field col s12 ">
                            <i class="material-icons prefix">contact_mail</i>
                            <input id="email" type="text" class="validate">
                            <label for="email">Correo electrónico</label>
                      </div>
                      <div class="input-field col s12 ">
                          <i class="material-icons prefix">vpn_key</i>
                          <input id="password" type="password" class="validate">
                          <label for="password">Contraseña</label>
                      </div>
                      <div class="input-field col s12 ">
                          <i class="material-icons prefix">vpn_key</i>
                          <input id="confirmpass" type="password" class="validate">
                          <label for="confirmpass">Confirmacion Contraseña</label>
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
<div class="slider">
    <ul class="slides">
        <li>
            <img src="../../resources/img/banner-mochilas3.jpeg"> <!-- random image -->
            <div class="caption center-align">
                <h1 class="indigo-text text-darken-4">MOCHILAS</h1>
                <h5 class="orange-text text-darken-3"><a href="../../views/public/mochilas.php">Ver más</a></h5>
            </div>
        </li>
        <li>
            <img src="../../resources/img/banner-mochilas2.jpeg"> <!-- random image -->
            <div class="caption left-align">
                <h3 class="indigo-text text-darken-4">¡Bienvenido a Mocheros!</h3>
                <h5 class="orange-text text-darken-3">Somos tus compañeros en tus aventuras del día a día</h5>
                <a href="../../views/public/mochilas.php" class="orange-text text-darken-3">Haz click aquí para ver nuestras mochilas</a>
            </div>
        </li>
        <li>
            <img src="../../resources/img/banner-mochilas.png"> <!-- random image -->
            <div class="caption left-align">
                <h3 class="indigo-text text-darken-4">Febrero, el mes de la amistad</h3>
                <h5 class="orange-text text-darken-3">¡Regala alguno de nuestros productos para tus seres queridos!</h5>
                <a href="../../views/public/mochilas.php" class="orange-text text-darken-3">Haz click aquí para ver nuestras mochilas</a>
            </div>
        </li>
        <li>
            <img src="../../resources/img/mochilas-8.jpg"> <!-- random image -->
            <div class="caption center-align">
                <h3 class="indigo-text text-darken-4">Las mejores mochilas a tu alcance</h3>
                <h5 class="orange-text text-darken-3">Mochilas que puedes utilizar en cualquier momento</h5>
                <a href="../../views/public/mochilas.php" class="orange-text text-darken-3">Haz click aquí para ver nuestras mochilas</a>
            </div>
        </li>
    </ul>
</div>

<div class="slider">
    <ul class="slides">
        <li>
            <img src="../../resources/img/mochilas-8.jpg"> <!-- random image -->
            <div class="caption center-align">
                <h1 class="indigo-text text-darken-4">LONCHERAS</h1>
                <h5 class="orange-text text-darken-3"><a href="../../views/public/loncheras.php">Ver más</a></h5>
            </div>
        </li>
        <li>
            <img src="../../resources/img/banner-mochilas3.jpeg"> <!-- random image -->
            <div class="caption left-align">
                <h3 class="indigo-text text-darken-4">Nuestras loncheras destacan por sus diseños y calidad</h3>
                <h5 class="orange-text text-darken-3">Nuestras loncheras poseen los mejores diseños en el mercado</h5>
                <a href="../../views/public/loncheras.php" class="orange-text text-darken-3">Haz click aquí para ver nuestras loncheras</a>
            </div>
        </li>
        <li>
            <img src="../../resources/img/banner-mochilas.png"> <!-- random image -->
            <div class="caption left-align">
                <h3 class="indigo-text text-darken-4">Febrero, el mes del amor y la amistad</h3>
                <h5 class="orange-text text-darken-3">Este es el mes para demostrarle cuánto quieres a tus familiares y amigos con una lonchera</h5>
                <a href="../../views/public/loncheras.php" class="orange-text text-darken-3">Haz click aquí para ver nuestras loncheras</a>
            </div>
        </li>
        <li>
            <img src="../../resources/img/banner-mochilas2.jpeg"> <!-- random image -->
            <div class="caption center-align">
                <h3 class="indigo-text text-darken-4">¡Las mejores loncheras para ti!</h3>
                <h5 class="orange-text text-darken-3">Loncheras con diseños irresistibles</h5>
                <a href="../../views/public/loncheras.php" class="orange-text text-darken-3">Haz click aquí para ver nuestras loncheras</a>
            </div>
        </li>
    </ul>
</div>

<div class="slider">
    <ul class="slides">
        <li>
            <img src="../../resources/img/banner-accesorios.jpeg"> <!-- random image -->
            <div class="caption center-align">
                <h1 class="indigo-text text-darken-4">ACCESORIOS</h1>
                <h5 class="orange-text text-darken-3"><a href="../../views/public/accesorios.php">Ver más</a></h5>
            </div>
        </li>
        <li>
            <img src="../../resources/img/banner-mochilas3.jpeg"> <!-- random image -->
            <div class="caption left-align">
                <h3 class="indigo-text text-darken-4">Los mejores accesorios para toda ocasión que podrás encontrar</h3>
                <h5 class="orange-text text-darken-3">Perfecto para la escuela, la universidad, el trabajo y muchas cosas más</h5>
                <a href="../../views/public/accesorios.php" class="orange-text text-darken-3">Haz click aquí para ver nuestros accesorios</a>
            </div>
        </li>
        <li>
            <img src="../../resources/img/banner-mochilas.png"> <!-- random image -->
            <div class="caption left-align">
                <h3 class="indigo-text text-darken-4">Regala nuestros accesorios para sorprender a tus seres queridos</h3>
                <h5 class="orange-text text-darken-3">En febrero, la época perfecta para regalar nuestros productos</h5>
                <a href="../../views/public/accesorios.php" class="orange-text text-darken-3">Haz click aquí para ver nuestros accesorios</a>
            </div>
        </li>
        <li>
            <img src="../../resources/img/mochilas-8.jpg"> <!-- random image -->
            <div class="caption center-align">
                <h3 class="indigo-text text-darken-4">¡Todos nuestros accesorios son elaborados para ti!</h3>
                <h5 class="orange-text text-darken-3">Ponemos empeño y dedicación en cada producto que realizamos</h5>
                <a href="../../views/public/accesorios.php" class="orange-text text-darken-3">Haz click aquí para ver nuestros accesorios</a>
            </div>
        </li>
    </ul>
</div>

<div class="blue lightned-2 container-fluid">
    <div class="row">
        <div class="col col-sm-12">
            <h1 class="caption center-align">PERSONALIZAMOS TUS PRODUCTOS</h1>
        </div>
        <div class="col col-sm-12 col-lg-6">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos repellendus sapiente incidunt, voluptate quis possimus, nostrum minus optio error facilis consectetur? Est, error perspiciatis cumque obcaecati sint reprehenderit et hic?
        </div>
        <div class="caption center-align col col-sm-12 col-lg-6">
            <img class="col col-sm-4" src="../../resources/img/banner-accesorios.jpeg">
            <img class="col col-sm-4" src="../../resources/img/banner-mochilas3.jpeg">
            <img class="col col-sm-4" src="../../resources/img/mochila5.jpg">
        </div>
    </div>
</div>

<?php
Public_page::footer();
?>
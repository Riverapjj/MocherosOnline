<?php
    require('../../core/helpers/publicHelper.php');
    publicHelper::header('Inicio');
?>
<!-- Estructura de modal iniciar sesión -->
<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4 class="cyan-text">Iniciar sesión</h4>
        <div class="row">
            <form>
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
        <a href="../dashboard/index_dashboard.php"
            class="modal-action modal-close waves-effect waves-cyan btn-flat">Iniciar sesión</a>
    </div>
</div>
<!--Estructura de modal para términos y condiciones -->
<div id="modal3" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Términos y condiciones</h4>
        <p>Los siguientes términos y condiciones (los "Términos y Condiciones") rigen el uso que usted le dé a
            este sitio web y a cualquiera de los contenidos disponibles por o a través de este sitio web,
            incluyendo
            cualquier contenido derivado del mismo (el "Sitio Web"). Time Inc. ("Time Inc." o "nosotros") ha
            puesto a su disposición el Sitio Web. Podemos cambiar los Términos y Condiciones de vez en cuando,
            en cualquier momento sin ninguna notificación, sólo publicando los cambios en el Sitio Web. AL USAR
            EL SITIO WEB, USTED ACEPTA Y ESTÉ DE ACUERDO CON ESTOS TÉRMINOS Y CONDICIONES EN LO QUE SE REFIERE
            A SU USO DEL SITIO WEB. Si usted no está de acuerdo con estos Términos y Condiciones, no puede tener
            acceso al mismo ni usar el Sitio Web de ninguna otra manera.
            1. Derechos de Propiedad. Entre usted y Time Inc., Time Inc. es dueño único y exclusivo, de todos
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
                        <a class=" modal-trigger modal-action modal-close " href="#modal3">Al darle registrse
                            acepto términos y condiciones de kidszone</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#" class=" modal-trigger modal-action modal-close waves-effect waves-cyan btn-flat">Registrarse</a>
    </div>
</div>

<?php
            publicHelper::slider();
        ?>

<div class="container-fluid">
    <h1 class="center indigo-text" id="title"></h1>
    <div class="row" id="catalogo"></div>
</div>
<div class="blue lightned-2 container-fluid">
    <div class="row">
        <div class="col s12">
            <h3 class="caption center-align">PERSONALIZAMOS TUS PRODUCTOS</h3>
        </div>
        <div class="col s12 l6">
            <p class="flow-text">Personalizamos nuestros productos a tu gusto, solo envianos tus diseños a
                nuestro correo <u>contacto@mocheros.com</u> y nosotros te responderemos lo más pronto posible
            </p>
        </div>
        <div class="caption center-align col s12 l6">
            <img class="col s12 l4" src="../../resources/img/banner-accesorios.jpeg">
            <img class="col s12 l4" src="../../resources/img/banner-mochilas3.jpeg">
            <img class="col s12 l4" src="../../resources/img/mochila5.jpg">
        </div>
    </div>
</div>
<?php
    publicHelper::footer('catalogo.js');
?>
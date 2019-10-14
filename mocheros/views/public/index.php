<?php
require('../../core/helpers/publicHelper.php');
publicHelper::header('Inicio');
?>
<!--Estructura de modal para registrarse-->
<div id="modal2" class="modal  modal-fixed-footer">
    <div class="modal-content">
        <h4 class="cyan-text">Registrarse</h4>
        <div class="row">
            <form class="col s12" autocomplete="off">
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
</div>
<div class="blue lightned-2 container-fluid">
    <div class="row">
        <div class="col s12">
            <h3 class="caption center-align grey-text text-lighten-2 lang" key="personalizamos">PERSONALIZAMOS TUS PRODUCTOS</h3>
        </div>
        <div class="col s12 l6">
            <p class="flow-text lang" key="personalizado">Personalizamos nuestros productos a tu gusto, solo envianos tus diseños a
                nuestro correo <u>contacto@mocheros.com</u> y nosotros te responderemos lo más pronto posible.
            </p>
        </div>
        <div class="caption center-align col s12 l6">
            <!--<img class="col s12 l4" src="../../resources/img/banner-accesorios.jpeg">
            <img class="col s12 l4" src="../../resources/img/banner-mochilas3.jpeg">
            <img class="col s12 l4" src="../../resources/img/mochila5.jpg">-->
            <div class="slider">
                <ul class="slides">
                    <li>
                        <img src="../../resources/img/banner-accesorios.jpeg">
                        <!--<div class="caption center-align">
                            <h1 class="indigo-text text-darken-4 center-align">MOCHILAS</h1>
                            <h5 class="orange-text text-darken-3"><a href="mochilas.php">Ver más</a></h5>
                        </div>-->
                    </li>
                    <li>
                        <img src="../../resources/img/banner-mochilas3.jpeg">
                        <!--<div class="caption center-align">
                            <h3 class="indigo-text text-darken-4 flow-text">¡Bienvenido a Mocheros!</h3>
                            <h5 class="orange-text text-darken-3 flow-text">Somos tus compañeros en tus aventuras del día a
                                día</h5>
                            <a href="mochilas.php" class="orange-text text-darken-3 flow-text">Haz click
                                aquí para ver nuestras mochilas</a>
                        </div>-->
                    </li>
                    <li>
                        <img src="../../resources/img/mochila5.jpg">
                        <!--<div class="caption center-align">
                            <h3 class="indigo-text text-darken-4 flow-text">Febrero, el mes de la amistad</h3>
                            <h5 class="orange-text text-darken-3 flow-text">¡Regala alguno de nuestros productos para tus
                                seres queridos!</h5>
                            <a href="mochilas.php" class="orange-text text-darken-3 flow-text">Haz click
                                aquí para ver nuestras mochilas</a>
                        </div>-->
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
publicHelper::footer('catalogo.js');
?>
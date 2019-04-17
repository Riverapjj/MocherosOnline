<?php
    require('../../core/helpers/dashboardHelper.php');
    DashboardHelper::header('Iniciar sesión');
?>
<?php
    DashboardHelper::indexDashNav();
?>
<!--Creanción del modal para ejecutarse al momento de querer iniciar sesión-->
<div id="modal1" class="modal">
    <div class="modal-content">
        <!--Creando el contenido del modal-->
        <h5 class="cyan-text darker-2 center-align"><b>Iniciar sesión</b></h5>
        <form>
            <!--Creando los campos necesarios para inciar sesión-->
            <div class="input-field col s12 m6 offset-m3 l4 offset-l4">
                <i class="material-icons prefix">account_circle</i>
                <input id="icon_username" type="text" class="validate">
                <label for="icon_username">Usuario</label>
            </div>
            <div class="input-field col s12 m6 offset-m3 l4 offset-l4">
                <i class="material-icons prefix">vpn_key</i>
                <input id="icon_password" type="password" class="validate">
                <label for="icon_password">Contraseña</label>
            </div>
        </form>
    </div>
    <!--Declarando como se desea el footer del modal-->
    <div class="modal-footer">
        <a href="dashboard.php" class="modal-action modal-close waves-effect waves-green btn-flat">Iniciar
            sesión</a>
    </div>
</div>
<!--Creando un espacio para un video con la etiqueta de video, definiendo que el video estará en loop y sin audio-->
<video controls autoplay loop muted>
    <!--importando el video-->
    <source src="../../resources/img/call-me-maybe.mp4" type="video/mp4">
</video>
<!--Creando un div para poner un texto-->
<div class="text row animated slideInLeft">
    <div class="col s12">
        <h1 class="white-text black-font">MOCHEROS</h1>
        <h5 class="white-text">Tus compañeros en tus aventuras</h5>
    </div>
</div>
<?php
    DashboardHelper::indexDashFooter();
?>
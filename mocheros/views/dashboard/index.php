<?php
    require('../../core/helpers/dashboardHelper.php');
    DashboardHelper::header('Iniciar sesión');
?>
<?php
    DashboardHelper::indexDashNav();
?>
<!--Creanción del modal para ejecutarse al momento de querer iniciar sesión-->
<!--<div id="modal1" class="modal">
    <div class="modal-content">-->
<!--Creando el contenido del modal-->
<!--<h5 class="cyan-text darker-2 center-align"><b>Iniciar sesión</b></h5>
        <form>-->
<!--Creando los campos necesarios para inciar sesión-->
<!--<div class="input-field col s12 m6 offset-m3 l4 offset-l4">
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
    </div>-->
<!--Declarando como se desea el footer del modal
    <div class="modal-footer">
        <a href="dashboard.php" class="modal-action modal-close waves-effect waves-green btn-flat">Iniciar
            sesión</a>
    </div>
</div>-->
<main>
    <!-- Formulario para iniciar sesión -->
    <div class="container">
        <div class="row">
            <form method="post" id="form-sesion">
                <div class="input-field col s12 m6 offset-m3">
                    <i class="material-icons prefix">person_pin</i>
                    <input id="alias" type="text" name="alias" class="validate" required />
                    <label for="alias">Usuario</label>
                </div>
                <div class="input-field col s12 m6 offset-m3">
                    <i class="material-icons prefix">security</i>
                    <input id="clave" type="password" name="clave" class="validate" required />
                    <label for="clave">Contraseña</label>
                </div>
                <div class="col s12 center-align">
                    <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Ingresar"><i
                            class="material-icons">send</i></button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
    DashboardHelper::indexDashFooter('index.js');
?>
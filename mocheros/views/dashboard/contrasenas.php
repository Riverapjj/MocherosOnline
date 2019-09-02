<!-- Función de encabezado  -->
<?php
    require('../../core/helpers/dashboardHelper.php');
    DashboardHelper::headerTemplate('Recuperar contraseña');
?>
<main>
    <!-- Formulario para iniciar sesión -->
    <div class="container">
        <div class="row">
            <form method="post" id="form-recover">
                <div class="input-field col s12 m6 offset-m3">
                    <i class="material-icons prefix">security</i>
                    <input id="recov-pass" type="password" name="recov-pass-name" class="validate" autocomplete="off" required/>
                    <label for="recov-pass">Nueva contraseña</label>
                </div>
                <div class="input-field col s12 m6 offset-m3">
                    <i class="material-icons prefix">security</i>
                    <input id="recov-pass2" type="password" name="recov-pass2-name" class="validate" autocomplete="off" required/>
                    <label for="recov-pass2">Confirme contraseña</label>
                </div>
                <div class="col s12 center-align">
                    <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Confirmar"><i
                            class="material-icons">send</i></button>
                </div>
            </form>
        </div>
    </div>
</main>
<!-- Función de pie de página -->
<?php
    DashboardHelper::indexDashFooter('index.js');
?>
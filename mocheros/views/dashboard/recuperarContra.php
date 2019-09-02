<!-- Función de encabezado  -->
<?php
    require('../../core/helpers/dashboardHelper.php');
    DashboardHelper::headerTemplate('Recuperar contraseña');
?>
<main>
    <!-- Formulario para iniciar sesión -->
    <div class="container">
        <div class="row">
            <form method="post" id="form-email">
                <div class="input-field col s12 m6 offset-m3">
                    <i class="material-icons prefix">person_pin</i>
                    <input id="email" type="text" name="email-name" class="validate" autocomplete="off" required/>
                    <label for="email">E-mail</label>
                </div>
                <div class="col s12 center-align">
                    <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Enviar"><i
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
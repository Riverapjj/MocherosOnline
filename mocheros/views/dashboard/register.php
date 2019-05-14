<?php
require_once('../../core/helpers/dashboardHelper.php');
DashboardHelper::headerTemplate('Registrar primer usuario');
?>
<main>
<form method="post" id="form-register">
    <div class="row">
        <div class="input-field col s12 m6">
          	<i class="material-icons prefix">person</i>
          	<input id="register-name" type="text" name="register-name-name" class="validate" required/>
          	<label for="register-name">Nombres</label>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">person</i>
            <input id="register-lastname" type="text" name="register-lastname-name" class="validate" required/>
            <label for="register-lastname">Apellidos</label>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">email</i>
            <input id="register-email" type="email" name="register-email-name" class="validate" required/>
            <label for="register-email">Correo</label>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">person_pin</i>
            <input id="register-user" type="text" name="register-user-name" class="validate" required/>
            <label for="register-user">Alias</label>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">security</i>
            <input id="register-pass" type="password" name="register-pass-name" class="validate" required/>
            <label for="register-pass">Clave</label>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">security</i>
            <input id="register-pass2" type="password" name="register-pass2-name" class="validate" required/>
            <label for="register-pass2">Confirmar clave</label>
        </div>
    </div>
    <div class="row center-align">
 	    <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Registrar"><i class="material-icons">send</i></button>
    </div>
</form>
</main>
<!-- Función de pie de página -->
<?php
DashboardHelper::footer('register.js', null);
?>

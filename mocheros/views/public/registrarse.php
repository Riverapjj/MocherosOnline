<?php
require_once('../../core/helpers/publicHelper.php');
publicHelper::header('Registrate');
?>
<main class="grey lighten-2">
    <div class="container">
        <div class="row center-align">
            <h3 class="center-align indigo-text lang" key="registrate">Registrate</h3>
            <form method="post" id="form-register" autocomplete="off">
                <div class="input-field col s11 m6">
                    <i class="material-icons prefix">assignment_ind</i>
                    <input id="usuario" type="text" name="usuario" class="validate" maxlength="30" required />
                    <label for="usuario" class="lang" key="usuario">Nombre de usuario</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="nombre" type="text" name="nombre" class="validate" maxlength="25" required />
                    <label for="nombre" class="lang" key="nombres">Nombres</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="apellido" type="text" name="apellido" class="validate" maxlength="30" required />
                    <label for="apellido" class="lang" key="apellidos">Apellidos</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">home</i>
                    <textarea id="direccion" name="direccion" class="materialize-textarea validate" maxlength="300" required></textarea>
                    <label for="direccion" class="lang" key="direccion">Dirección</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">phone</i>
                    <input id="telefono" type="text" name="telefono" class="validate" minlength="8"maxlength="8" required />
                    <label for="telefono" class="lang" key="telefono">Teléfono</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">email</i>
                    <input id="correo" type="text" name="correo" class="validate" maxlength="150"required />
                    <label for="correo" class="lang" key="correo">Correo electrónico</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">lock</i>
                    <input id="clave1" type="password" name="clave1" class="validate" minlength="8" required />
                    <label for="clave1" class="lang" key="contrasena">Contraseña</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">lock</i>
                    <input id="clave2" type="password" name="clave2" class="validate" minlength="8" required />
                    <label for="clave2" class="lang" key="confirmar">Confirmar contraseña</label>
                </div>
                <label class="center-align col s12">
                    <input id="condicion" type="checkbox" name="condicion" required />
                    <span class="black-text"><a href="#terminos" class="modal-trigger orange-text text-darken-3 lang" key="terminos"> términos y condiciones</a></span>
                </label>
                <div class="col s12 offset-m4">
                    <div class="g-recaptcha" data-sitekey="6LfnzrQUAAAAAOOuNJrf5pYJQIcMHy-YIDwQMQFw"></div>
                </div>
                <div class="center-align col s12">
                    <button type="submit" class="btn waves-effect blue lang" key="registrate"><i class="material-icons left">send</i>Registrarse</button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
publicHelper::footer('registrar.js', null);
?>
<?php
    require_once('../../core/helpers/publicHelper.php');
    publicHelper::header('Registrate');
?>
<main class="grey lighten-2">
    <div class="container">
        <div class="row center-align">
            <h3 class="center-align">Registrate</h3>
            <form method="post" id="form-register">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">assignment_ind</i>
                    <input id="usuario" type="text" name="usuario" class="validate" required/>
                    <label for="usuario">Nombre de usuario</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">person</i>
                    <input id="nombre" type="text" name="nombre" class="validate" required/>
                    <label for="nombre">Nombres</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">person</i>
                    <input id="apellido" type="text" name="apellido" class="validate" required/>
                    <label for="apellido">Apellidos</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">person</i>
                    <textarea id="direccion" name="direccion" class="materialize-textarea validate" required></textarea>
                    <label for="direccion">Dirección</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="telefono" type="text" name="telefono" class="validate" required/>
                    <label for="telefono">Teléfono</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="correo" type="text" name="correo" class="validate" required/>
                    <label for="correo">Correo electrónico</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="clave1" type="password" name="clave1" class="validate" required/>
                    <label for="clave1">Contraseña</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="clave2" type="password" name="clave2" class="validate" required/>
                    <label for="clave2">Confirmar contraseña</label>
                </div>
                <label class="center-align col s12">
					<input id="condicion" type="checkbox" name="condicion" required/>
					<span class="black-text">Acepto los <a href="#terminos" class="modal-trigger orange-text text-darken-3">términos y condiciones</a></span>
				</label>
                <div class="col s12">
                    <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Registrar"><i class="material-icons left">send</i>Registrarse</button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
    publicHelper::footer('registrar.js');
?>
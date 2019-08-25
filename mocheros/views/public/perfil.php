<?php
    require_once('../../core/helpers/publicHelper.php');
    publicHelper::header('Mi cuenta');
?>
<main class="grey lighten-2">
    <div class="container">
        <div class="row center-align">
            <h3 class="center-align">Mis datos</h3>
            <form method="post" id="form-profile" autocomplete="off">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">assignment_ind</i>
                    <input id="profile_usuario" type="text" name="profile_usuario" class="validate" required/>
                    <label for="profile_usuario">Nombre de usuario</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">person</i>
                    <input id="profile_nombre" type="text" name="profile_nombre" class="validate" required/>
                    <label for="profile_nombre">Nombres</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">person</i>
                    <input id="profile_apellido" type="text" name="profile_apellido" class="validate" required/>
                    <label for="profile_apellido">Apellidos</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">person</i>
                    <textarea id="profile_direccion" name="profile_direccion" class="materialize-textarea validate" required></textarea>
                    <label for="profile_direccion">Dirección</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="profile_telefono" type="text" name="profile_telefono" class="validate" required/>
                    <label for="profile_telefono">Teléfono</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="profile_correo" type="text" name="profile_correo" class="validate" required/>
                    <label for="profile_correo">Correo electrónico</label>
                </div>
                <div class="col s12">
                    <button type="submit" class="btn waves-effect orange tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
    publicHelper::footer('login.js');
?>
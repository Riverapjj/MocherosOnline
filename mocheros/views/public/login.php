<?php
    require_once('../../core/helpers/publicHelper.php');
    publicHelper::header('Inicia sesión');
?>
<main class="grey lighten-2">
    <div class="container">
        <div class="row">
            <form method="post" id="form-session" autocomplete="off">
                <h2 class="center lang" key="login">Iniciar sesión</h2>
                <div class="input-field col s12 m6 offset-m3">
                    <i class="material-icons prefix">person</i>
                    <input id="usuario" type="text" name="usuario" class="validate" required />
                    <label for="usuario" class="lang" key="usuario">Nombre de usuario</label>
                </div>
                <div class="input-field col s12 m6 offset-m3">
                    <i class="material-icons prefix">vpn_key</i>
                    <input id="clave" type="password" name="clave" class="validate" required />
                    <label for="clave" class="lang" key="contrasena">Contraseña</label>
                </div>
                <div class="col s12 center-align">
                    <button type="submit" class="btn waves-effect blue lang" key="login"><i class="material-icons left">check</i>Iniciar sesión</button>
                </div>
                <div class="col s12 center-align">
                    <p class="center-align"><a href=""></a></p>
                    <p class="center-align lang" key="sin-cuenta">¿No tienes una cuenta?</p>
                    <a href="registrarse.php" class="orange-text text-darken-4 lang" key="registrate">Registrate</a>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
    publicHelper::footer('login.js');
?>

        <!--Declaración de la clse "navbar-fixed" para tenerla fija siempre, asignando el color deseado al navbar-->
        <div class="navbar-fixed">
            <nav class="grey lighten-5">
                <!--Declaración del estilo de nuestro navbar y con sus subsecciones para cada apartado de la página web-->
                <div class="nav-wrapper">
                        <a href="Dashboard.php" class="brand-logo logok"><img src="../resources/img/logo.png" height="50"></a>
                        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons cyan-text darken-2">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="priv_usuarios.php"  class="cyan-text darken-2">Gestión de administradores</a></li>
                        <li><a href="priv_productos.php" class="cyan-text darken-2">Administración productos</a></li>
                        <li><a href="priv_estado.php" class="cyan-text darken-2">Administración estados</a></li>
                        <li><a href="index_dashboard.php" class="cyan-text darken-2">Cerrar sesión</a></li>
                    </ul>
                </div> 
            </nav>
        </div> 
        <!--Declaración del modelo del navbar para moviles-->
        <ul class="side-nav" id="mobile-demo">
            <li><a href="priv_usuarios.php">Gestión de administradores</a></li>
            <li><a href="priv_productos.php">Administración productos</a></li>
            <li><a href="priv_estado.php">Administración estados</a></li>
            <li><a href="index_dashboard.php">Cerrar sesión</a></li>
        </ul>
  
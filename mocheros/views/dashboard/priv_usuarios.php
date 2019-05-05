<?php
    require('../../core/helpers/dashboardHelper.php');
    DashboardHelper::header('Usuarios');
?>
<!--Creación de nuestra barra de navegación-->
<?php
    DashboardHelper::dashNav();
?>

<body>
    <!--Creación de un slider con sus respectivas imagenes responsivas para el inicio del apartado de usuarios-->
    <?php
    DashboardHelper::slider();
?>
    <main class="container">
        <!--Creando una columna para la tabla de usuarios-->
        <div class="row">
            <div class="col s12">
                <!--Creando un "tab" para elegir entre gestionar admins o los detalles de permisos necesarios-->
                <ul class="tabs">
                    <li class="tab col s4"><a class="active cyan-text darken-2" href="#test1">Administradores</a></li>
                    <li class="tab col s4"><a class="cyan-text darken-2" href="#test2">Permisos </a></li>
                    <li class="tab col s4"><a href="#test3" class="cyan-text darken-2">Detalles del permiso</a></li>

                    </li>
                </ul>
            </div> <br><br><br>
            <!--Creando una barra de búsqueda para facilitar el acceso a los registros-->
            <form>
                <div class="input-field">
                    <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                    <input id="search" type="search" required>
                    <i class="material-icons">close</i>
                </div>
            </form>
            <!--Creando un div con su id="test1" para que se muestre al momento de elegir la opción previamente construida en el "tab"-->
            <div id="test1" class="col s12">
                <!--Declarando que sea una tabla responsiva-->
                <table class="responsive-table" id="admin-table">
                    <thead>
                        <!--Agregando los campos fijos a la tabla-->
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Rol</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <!--Agregando registros a la tabla-->
                    <tbody id="tbody-read-admin">
                    </tbody>
                </table>
                <br><br>
                <div class="col-md-12 center text-center" id="pagination">
                </div>

                <!-- Creando el efecto modal para cada accion a realizar (agregar, modificar y eliminar) -->
                <div id="modal-create-admin" class="modal">
                    <div class="modal-content">
                        <h5 class="cyan-text darker-2 center-align"><b>Agregar un nuevo administrador</b></h5>
                        <form method="post" id="form-create-admin">
                            <div class="row">
                                <!--Creando los campos requeridos para agregar un usuario-->
                                <div class="input-field col s12 m6">
                                    <input id="create-username" type="text" name="create-username" class="validate"
                                        required>
                                    <label for="create-username">Nombre de usuario</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="create-name" type="text" name="create-name" class="validate" required>
                                    <label for="create-name">Nombres</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="create-lastname" type="text" name="create-lastname" class="validate"
                                        required>
                                    <label for="create-lastname">Apellidos</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <select id="create-rol" name="create-rol-name">
                                    </select>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="create-telf" type="text" name="create-telf" class="validate" required>
                                    <label for="create-telf">Teléfono</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="create-email" type="text" name="create-email" class="validate" required>
                                    <label for="create-email">Correo eléctronico</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="create-pass" type="text" name="create-pass-name" class="validate"
                                        required>
                                    <label for="create-pass">Contraseña</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="create-confirm-pass" type="text" name="create-confirm-pass-name"
                                        class="validate" required>
                                    <label for="create-confirm-pass">Confirmar contraseña</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="create-address" type="text" name="create-address-name" class="validate"
                                        required>
                                    <label for="create-address">Dirección</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <!--Creación de un select para definir las opciones predeterminadas para cada tipo de usuario-->
                                    <p>
                                        <div class="switch">
                                            <span>Estado:</span>
                                            <label>
                                                <i class="material-icons">visibility_off</i>
                                                <input id="create-status" type="checkbox" name="create-status-name"
                                                    checked />
                                                <span class="lever"></span>
                                                <i class="material-icons">visibility</i>
                                            </label>
                                        </div>
                                    </p>
                                </div>
                            </div>
                            <div class="row center-align">
                                <a href="#" class="btn waves-effect grey tooltipped modal-close"
                                    data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Crear"><i
                                        class="material-icons">save</i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Creando modal-create-admin para opcion agregar 
                <div id="modal-create-admin" class="modal modal-fixed-footer">-->
                <!--Creando el contenido de nuestro modal
                    <div class="modal-content">
                        <h5 class="cyan-text darker-2 center-align"><b>Agregar un nuevo administrador</b></h5>
                        <form class="col s12" id="form-create-admin">
                            <div class="row">-->
                <!--Creando los campos requeridos para agregar un usuario
                                <div class="input-field col s12 m6">
                                    <input id="create-username" type="text" name="create-username" class="validate"
                                        required>
                                    <label for="create-username">Nombre de usuario</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="create-name" type="text" name="create-name" class="validate" required>
                                    <label for="create-name">Nombres</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="create-lastname" type="text" name="create-lastname" class="validate"
                                        required>
                                    <label for="create-lastname">Apellidos</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <select id="create-rol" name="create-rol">
                                    </select>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="create-telf" type="text" name="create-telf" class="validate" required>
                                    <label for="create-telf">Teléfono</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="create-email" type="text" name="create-email" class="validate" required>
                                    <label for="create-email">Correo eléctronico</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="create-pass" type="text" name="create-pass" class="validate" required>
                                    <label for="create-pass">Contraseña</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="create-confirm-pass" type="text" name="create-confirm-pass"
                                        class="validate" required>
                                    <label for="create-confirm-pass">Confirmar contraseña</label>
                                </div>
                                <div class="input-field col s12 m6">-->
                <!--Creación de un select para definir las opciones predeterminadas para cada tipo de usuario
                                    <p>
                                        <div class="switch">
                                            <span>Estado:</span>
                                            <label>
                                                <i class="material-icons">visibility_off</i>
                                                <input id="create-status" type="checkbox" name="create-status"
                                                    checked />
                                                <span class="lever"></span>
                                                <i class="material-icons">visibility</i>
                                            </label>
                                        </div>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>-->
                <!--Declarando el contenido que lleva el footer del modal
                    <div class="modal-footer">
                        <a href="#!" class="modal-action waves-effect waves-green btn-flat">Agregar</a>
                    </div>
                </div>-->
                <!-- Creando modal-update-admin para opcion modificar -->
                <div id="modal-update-admin" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <h5 class="cyan-text darker-2 center-align"><b>Modificar un administrador</b></h5>
                        <form class="col s12" id="form-update-admin" method="post">
                        <input type="hidden" id="IdUsuario" name="id_producto"/>
                            <div class="row">
                                <!--Creando los campos requeridos para modificar un usuario-->
                                <div class="input-field col s12 m6">
                                    <input id="update-username" type="text" name="update-username-name" class="validate"
                                        required>
                                    <label for="update-username">Nombre de usuario</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="update-name" type="text" name="update-name-name" class="validate" required>
                                    <label for="update-name">Nombres</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="update-lastname" type="text" name="update-lastname-name" class="validate"
                                        required>
                                    <label for="update-lastname">Apellidos</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <select id="update-rol" name="update-rol-name">
                                    </select>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="update-telf" type="text" name="update-telf-name" class="validate" required>
                                    <label for="update-telf">Teléfono</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="update-email" type="text" name="update-mail-name" class="validate" required>
                                    <label for="update-email">Correo eléctronico</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="update-address" type="text" name="update-address-name" class="validate"
                                        required>
                                    <label for="update-address">Dirección</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <!--Creación de un select para definir las opciones predeterminadas para cada tipo de usuario-->
                                    <p>
                                        <div class="switch">
                                            <span>Estado:</span>
                                            <label>
                                                <i class="material-icons">visibility_off</i>
                                                <input id="update-status" type="checkbox" name="update-status-name"
                                                    checked />
                                                <span class="lever"></span>
                                                <i class="material-icons">visibility</i>
                                            </label>
                                        </div>
                                    </p>
                                </div>
                            </div>
                            <div class="row center-align">
                                <a href="#" class="btn waves-effect grey tooltipped modal-close"
                                    data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Crear"><i
                                        class="material-icons">save</i></button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Declarando que el botón para agregar y modificar esté fijo en una esquina de la página -->
                <div class="fixed-action-btn toolbar">
                    <a class="btn-floating btn-large cyan darken-2 modal-trigger" href="#modal-create-admin"><i
                            class="large material-icons">add</i></a>
                    <ul>
                        <!-- Declarando los iconos deseados para cada acción, definiendo que modal activará cada botón -->
                        <li class="waves-effect waves-light"><a class="modal-trigger" href="#modal-create-admin"><i
                                    class="material-icons">add_circle</i></a></li>
                    </ul>
                </div>
            </div>
            <!-- creando un segundo div con id "test2" para la sección a elegir en el tab -->
            <div id="test2" class="col s12">
                <!-- declarando que sea responsiva -->
                <table class="striped responsive-table">
                    <thead>
                        <!-- declarando que sea responsiva -->
                        <tr>
                            <th>Código</th>
                            <th>Permiso</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- Agregando registros  -->
                        <tr>
                            <td>1</td>
                            <td>Agregar productos</td>
                            <td><i class="material-icons"><a class="modal-trigger"
                                        href="#modal-update-perm">border_color</a></i></td>
                            <td><i class="material-icons"><a class="modal-trigger" href="#modal-delete">delete</a></i>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Modificar productos</td>
                            <td><i class="material-icons"><a class="modal-trigger"
                                        href="#modal-update-perm">border_color</a></i></td>
                            <td><i class="material-icons"><a class="modal-trigger" href="#modal-delete">delete</a></i>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Eliminar productos</td>
                            <td><i class="material-icons"><a class="modal-trigger"
                                        href="#modal-update-perm">border_color</a></i></td>
                            <td><i class="material-icons"><a class="modal-trigger" href="#modal-delete">delete</a></i>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Agregar administradores</td>
                            <td><i class="material-icons"><a class="modal-trigger"
                                        href="#modal-update-perm">border_color</a></i></td>
                            <td><i class="material-icons"><a class="modal-trigger" href="#modal-delete">delete</a></i>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Modificar administradores</td>
                            <td><i class="material-icons"><a class="modal-trigger"
                                        href="#modal-update-perm">border_color</a></i></td>
                            <td><i class="material-icons"><a class="modal-trigger" href="#modal-delete">delete</a></i>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Eliminar administradores</td>
                            <td><i class="material-icons"><a class="modal-trigger"
                                        href="#modal-update-perm">border_color</a></i></td>
                            <td><i class="material-icons"><a class="modal-trigger" href="#modal-delete">delete</a></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- Creando el efecto modal para cada accion a realizar (agregar, modificar y eliminar) -->
                <!-- Crendo modal-create-perm para opcion agregar-->
                <div id="modal-create-perm" class="modal">
                    <div class="modal-content">
                        <h5 class="cyan-text darker-2 center-align"><b>Agregar un nuevo permiso</b></h5>
                        <form class="col s12">
                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <input disabled value="Codigo autonúmerico" id="disabled" type="text"
                                        class="validate">
                                    <label for="disabled">Código del permiso</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="perm" type="text" class="validate">
                                    <label for="perm">Nombre del permiso</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agregar</a>
                    </div>
                </div>
                <!-- Creando modal-update-perm para opcion modificar-->
                <div id="modal-update-perm" class="modal">
                    <div class="modal-content">
                        <h5 class="cyan-text darker-2 center-align"><b>Modificar un permiso</b></h5>
                        <form class="col s12">
                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <input disabled value="Codigo autonúmerico" id="disabled" type="text"
                                        class="validate">
                                    <label for="disabled">Código del permiso</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="perm" type="text" class="validate">
                                    <label for="perm">Nombre del permiso</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Declarando como es el estilo del footer del modal -->
                    <div class="modal-footer">
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Modificar</a>
                    </div>
                </div>
                <!-- Declarando el boton siempre fijo para agregar y modificar tipo de usuarios con su respectivo icono y modal a ejecutar -->
                <div class="fixed-action-btn toolbar">
                    <a class="btn-floating btn-large cyan darken-2 modal-trigger" href="#modal-create-perm"><i
                            class="large material-icons">add</i></a>
                    <ul>
                        <!-- Declarando los iconos deseados para cada acción, definiendo que modal activará cada botón -->
                        <li class="waves-effect waves-light"><a class="modal-trigger" href="#modal-create-perm"><i
                                    class="material-icons">add_circle</i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="test3" class="col s12">
            <!-- declarando que sea responsiva -->
            <table class="striped responsive-table">
                <thead>
                    <!-- declarando que sea responsiva -->
                    <tr>
                        <th>Código</th>
                        <th>Administrador</th>
                        <th>Tipo de permiso</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- Agregando registros  -->
                    <tr>
                        <td>1</td>
                        <td>Josué Rivera</td>
                        <td>Agregar productos</td>
                        <td><i class="material-icons"><a class="modal-trigger"
                                    href="#modal-update-detperm">border_color</a></i></td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal-delete">delete</a></i></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Josué Rivera</td>
                        <td>Modificar productos</td>
                        <td><i class="material-icons"><a class="modal-trigger"
                                    href="#modal-update-detperm">border_color</a></i></td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal-delete">delete</a></i></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Josué Rivera</td>
                        <td>Eliminar productos</td>
                        <td><i class="material-icons"><a class="modal-trigger"
                                    href="#modal-update-detperm">border_color</a></i></td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal-delete">delete</a></i></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Carlos Ramírez</td>
                        <td>Agregar administradores</td>
                        <td><i class="material-icons"><a class="modal-trigger"
                                    href="#modal-update-detperm">border_color</a></i></td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal-delete">delete</a></i></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Carlos Ramírez</td>
                        <td>Modificar administradores</td>
                        <td><i class="material-icons"><a class="modal-trigger"
                                    href="#modal-update-detperm">border_color</a></i></td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal-delete">delete</a></i></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Carlos Ramírez</td>
                        <td>Eliminar administradores</td>
                        <td><i class="material-icons"><a class="modal-trigger"
                                    href="#modal-update-detperm">border_color</a></i></td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal-delete">delete</a></i></td>
                    </tr>
                </tbody>
            </table>
            <!-- Creando el efecto modal para cada accion a realizar (agregar, modificar y eliminar) -->
            <!-- Creando modal-create-detperm para opcion agregar -->
            <div id="modal-create-detperm" class="modal">
                <div class="modal-content">
                    <h5 class="cyan-text darker-2 center-align"><b>Agregar un nuevo detalle de permisos</b></h5>
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input disabled value="Codigo autonúmerico" id="disabled" type="text" class="validate">
                                <label for="disabled">Código detalle de permisos </label>
                            </div>
                            <div class="input-field col s12 m6">
                                <select>
                                    <option value="" disabled selected>Escoge una opción</option>
                                    <option value="1">Josué Rivera</option>
                                    <option value="2">Carlos Ramírez</option>
                                    <option value="3">Issela Guadalupe</option>
                                </select>
                                <label>Administrador</label>
                            </div>
                            <div class="input-field col s12">
                                <select>
                                    <option value="" disabled selected>Escoge una opción</option>
                                    <option value="1">Agregar productos</option>
                                    <option value="2">Modificar productos</option>
                                    <option value="3">Eliminar productos</option>
                                    <option value="4">Agregar administradores</option>
                                    <option value="5">Modificar administradores</option>
                                    <option value="6">Eliminar administradores</option>
                                </select>
                                <label>Permisos</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agregar</a>
                </div>
            </div>
            <!-- Creando modal-update-detperm para opcion modificar -->
            <div id="modal-update-detperm" class="modal">
                <div class="modal-content">
                    <h5 class="cyan-text darker-2 center-align"><b>Modificar un detalle de permisos</b></h5>
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input disabled value="Codigo autonúmerico" id="disabled" type="text" class="validate">
                                <label for="disabled">Código detalle de permisos </label>
                            </div>
                            <div class="input-field col s12 m6">
                                <select>
                                    <option value="" disabled selected>Escoge una opción</option>
                                    <option value="1">Luis Hernandez</option>
                                    <option value="2">Fátima Aguilar</option>
                                    <option value="3">Jonathan Olmedo</option>
                                    <option value="4">Alexandra Castillo</option>
                                </select>
                                <label>Administrador</label>
                            </div>
                            <div class="input-field col s12">
                                <select>
                                    <option value="" disabled selected>Escoge una opción</option>
                                    <option value="1">Agregar productos</option>
                                    <option value="2">Modificar productos</option>
                                    <option value="3">Eliminar productos</option>
                                    <option value="4">Agregar administradores</option>
                                    <option value="5">Modificar administradores</option>
                                    <option value="6">Eliminar administradores</option>
                                </select>
                                <label>Permisos</label>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Declarando como es el estilo del footer del modal -->
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Modificar</a>
                </div>
            </div>
            <!-- Declarando el boton siempre fijo para agregar y modificar tipo de usuarios con su respectivo icono y modal a ejecutar -->
            <div class="fixed-action-btn toolbar">
                <a href="#modal-create-detperm" class="btn-floating btn-large cyan darken-2 modal-trigger"><i
                        class="large material-icons">add</i></a>
                <ul>
                    <li class="waves-effect waves-light"><a class="modal-trigger" href="#modal-create-detperm"><i
                                class="material-icons">add_circle</i></a></li>
                </ul>
            </div>
        </div>
        <!-- Modal creado para ser ejecutado cada vez que se desea eliminar un registro -->
        <div id="modal-delete" class="modal">
            <div class="modal-content">
                <h5 class="cyan-text darker-2 center-align"><b>¿Estás seguro que deseas eliminar el registro?</b></h5>
            </div>
            <!-- Creando las opciones para el modal -->
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Sí</a>
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">No</a>
            </div>
        </div>
        </div>
    </main>
    <?php
    DashboardHelper::footer('usuarios.js');
?>
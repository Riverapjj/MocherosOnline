<!-- Función de encabezado  -->
<?php
    require('../../core/helpers/dashboardHelper.php');
    DashboardHelper::headerTemplate('Usuarios');
?>
    <main class="container">
        <!--Creando una columna para la tabla de usuarios-->
        <div class="row">
            <div class="col s12">
                <!--Creando un "tab" para elegir entre gestionar admins o los detalles de permisos necesarios-->
                <ul class="tabs">
                    <li class="tab col s12"><a class="active cyan-text darken-2" href="#test1">Administradores</a></li>

                    </li>
                </ul>
            </div> <br><br><br>
            <!--Creando un div con su id="test1" para que se muestre al momento de elegir la opción previamente construida en el "tab"-->
            <div id="test1" class="col s12">
                <!--Declarando que sea una tabla responsiva-->
                <table  id="admin-table">
                    <thead>
                        <!--Agregando los campos fijos a la tabla-->
                        <tr>
                            <th>Nombre</th>
                            <th>Rol</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Estado</th>
                            <th>Acciones</th>
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
                                    <input id="create-username" type="text" name="create-username" class="validate" autocomplete="off"
                                        required>
                                    <label for="create-username">Nombre de usuario</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="create-name" type="text" name="create-name" class="validate" autocomplete="off"required>
                                    <label for="create-name">Nombres</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="create-lastname" type="text" name="create-lastname" class="validate" autocomplete="off"
                                        required>
                                    <label for="create-lastname">Apellidos</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <select id="create-rol" name="create-rol-name">
                                    </select>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="create-telf" type="text" name="create-telf" class="validate" autocomplete="off" required>
                                    <label for="create-telf">Teléfono</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="create-email" type="text" name="create-email" class="validate" autocomplete="off" required>
                                    <label for="create-email">Correo eléctronico</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="create-pass" type="password" name="create-pass-name" class="validate" autocomplete="off"
                                        required>
                                    <label for="create-pass">Contraseña</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="create-confirm-pass" type="password" name="create-confirm-pass-name" autocomplete="off"
                                        class="validate" required>
                                    <label for="create-confirm-pass">Confirmar contraseña</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="create-address" type="text" name="create-address-name" class="validate" autocomplete="off"
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
                                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Crear"  id="reload"><i
                                        class="material-icons">save</i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Creando modal-update-admin para opcion modificar -->
                <div id="modal-update-admin" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <h5 class="cyan-text darker-2 center-align"><b>Modificar un administrador</b></h5>
                        <form class="col s12" id="form-update-admin" method="post">
                        <input type="hidden" id="IdUsuario" name="id-user-name"/>
                            <div class="row">
                                <!--Creando los campos requeridos para modificar un usuario-->
                                <div class="input-field col s12 m6">
                                    <input id="update-username" type="text" name="update-username-name" class="validate" autocomplete="off"
                                        required>
                                    <label for="update-username">Nombre de usuario</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="update-name" type="text" name="update-name-name" class="validate" autocomplete="off" required>
                                    <label for="update-name">Nombre</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="update-lastname" type="text" name="update-lastname-name" class="validate" autocomplete="off" required>
                                    <label for="update-lastname">Apellido</label>
                                </div>                                
                                <div class="input-field col s12 m6">
                                    <select id="update-rol" name="update-rol-name">
                                    </select>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="update-telf" type="text" name="update-telf-name" class="validate" autocomplete="off" required>
                                    <label for="update-telf">Teléfono</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="update-email" type="text" name="update-email-name" class="validate" autocomplete="off" required>
                                    <label for="update-email">Correo eléctronico</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="update-address" type="text" name="update-address-name" class="validate" autocomplete="off"s
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
                            <div>
                                <div class="row center-align">
                                    <a href="#" class="btn waves-effect grey tooltipped modal-close"
                                        data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                                    <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Crear"><i
                                            class="material-icons">save</i></button>
                                </div>
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
        </div>
        </div>
    </main>
<!-- Función de pie de página -->
<?php
    DashboardHelper::footer('usuarios.js', null);
?>
<?php
    require('../../core/helpers/navbar.php');
    Navbar::header('Usuarios');
?>
<!--Creación de nuestra barra de navegación-->
<?php
    Navbar::dashNav();
?>
<!--Creación de un slider con sus respectivas imagenes responsivas para el inicio del apartado de usuarios-->
<?php
    Navbar::slider();
?>
<!--Creando una columna para la tabla de usuarios-->
<div class="row">
    <div class="col s12">
        <!--Creando un "tab" para elegir entre gestionar admins o los detalles de permisos necesarios-->
        <ul class="tabs">
            <li class="tab col s3"><a class="active cyan-text darken-2" href="#test1">Administradores</a></li>
            <li class="tab col s3"><a class="cyan-text darken-2" href="#test2">Permisos </a></li>
            <li class="tab col s3"><a href="#test3" class="cyan-text darken-2">Detalles del permiso</a></li>
            <li class="tab col s3 disabled"><a href="#test5" class="white-text">D</a></li>
            <li class="tab col s3 disabled"><a href="#test6" class="white-text">Disabled sdsdzssdsdfasdasfTab</a>
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
        <table class="striped responsive-table">
            <thead>
                <!--Agregando los campos fijos a la tabla-->
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Estado</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Contraseña</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <!--Agregando registros a la tabla-->
            <tbody>
                <tr>
                    <td>Carlos Federico</td>
                    <td>Ramírez Soriano</td>
                    <td>Activo</td>
                    <td>7528-0267</td>
                    <td>fede.h@gmail.com</td>
                    <td>**********</td>
                    <!--Declarando que al interactuar con el icono "delete" activará un modal que sirve para borrar o uno un registro-->
                    <td><i class="material-icons"><a class="modal-trigger" href="#modal11">border_color</a></i></td>
                    <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                </tr>
                <tr>
                    <td>Josué Alexander</td>
                    <td>Rivera Palacios</td>
                    <td>Activo</td>
                    <td>7418-9835</td>
                    <td>josue@gmail.com</td>
                    <td>**********</td>
                    <td><i class="material-icons"><a class="modal-trigger" href="#modal11">border_color</a></i></td>
                    <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                </tr>
                <tr>
                    <td>Issela Guadalupe</td>
                    <td>Mejía Beltrán</td>
                    <td>Inactivo</td>
                    <td>7925-4865</td>
                    <td>iss.159@gmail.com</td>
                    <td>**********</td>
                    <td><i class="material-icons"><a class="modal-trigger" href="#modal11">border_color</a></i></td>
                    <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                </tr>
            </tbody>
        </table>

        <!-- Creando el efecto modal para cada accion a realizar (agregar, modificar y eliminar) -->
        <!-- Creando modal10 para opcion agregar -->
        <div id="modal10" class="modal modal-fixed-footer">
            <!--Creando el contenido de nuestro modal-->
            <div class="modal-content">
                <h5 class="cyan-text darker-2 center-align"><b>Agregar un nuevo administrador</b></h5>
                <form class="col s12">
                    <div class="row">
                        <!--Creando los campos requeridos para agregar un usuario-->
                        <div class="input-field col s12 m6">
                            <input id="name" type="text" class="validate">
                            <label for="name">Nombre</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="last_name" type="text" class="validate">
                            <label for="last_name">Apellido</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <!--Creación de un select para definir las opciones predeterminadas para cada tipo de usuario-->
                            <select>
                                <option value="estado">Escoge una opción</option>
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>
                            <label>Estado</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="tel" type="text" class="validate">
                            <label for="tel">Teléfono</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="email" type="text" class="validate">
                            <label for="email">Correo eléctronico</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="pass" type="text" class="validate">
                            <label for="pass">Contraseña</label>
                        </div>
                    </div>
                </form>
            </div>
            <!--Declarando el contenido que lleva el footer del modal-->
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agregar</a>
            </div>
        </div>
        <!-- Creando modal11 para opcion modificar -->
        <div id="modal11" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h5 class="cyan-text darker-2 center-align"><b>Modificar un administrador</b></h5>
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input id="name" type="text" class="validate">
                            <label for="name">Nombre</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="last_name" type="text" class="validate">
                            <label for="last_name">Apellido</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <select>
                                <option value="estado">Escoge una opción</option>
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>
                            <label>Estado</label>
                            <input id="state" type="text" class="validate">
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="tel" type="text" class="validate">
                            <label for="tel">Teléfono</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="email" type="text" class="validate">
                            <label for="email">Correo eléctronico</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="pass" type="text" class="validate">
                            <label for="pass">Contraseña</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Modificar</a>
            </div>
        </div>
        <!-- Creando modal12 para opcion agregar -->
        <div id="modal12" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h5 class="cyan-text darker-2 center-align"><b>Agregar un administrador</b></h5>
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input id="name" type="text" class="validate">
                            <label for="name">Nombre</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="last_name" type="text" class="validate">
                            <label for="last_name">Apellido</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <select>
                                <option value="estado">Escoge una opción</option>
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>
                            <label>Estado</label>
                            <input id="state" type="text" class="validate">
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="tel" type="text" class="validate">
                            <label for="tel">Teléfono</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="email" type="text" class="validate">
                            <label for="email">Correo eléctronico</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="pass" type="text" class="validate">
                            <label for="pass">Contraseña</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agregar</a>
            </div>
        </div>
        <!-- Declarando que el botón para agregar y modificar esté fijo en una esquina de la página -->
        <div class="fixed-action-btn toolbar">
            <a class="btn-floating btn-large cyan darken-2 modal-trigger" href="#modal10"><i
                    class="large material-icons">add</i></a>
            <ul>
                <!-- Declarando los iconos deseados para cada acción, definiendo que modal activará cada botón -->
                <li class="waves-effect waves-light"><a class="modal-trigger" href="#modal10"><i
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
                    <td><i class="material-icons"><a class="modal-trigger" href="#modal14">border_color</a></i></td>
                    <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Modificar productos</td>
                    <td><i class="material-icons"><a class="modal-trigger" href="#modal14">border_color</a></i></td>
                    <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Eliminar productos</td>
                    <td><i class="material-icons"><a class="modal-trigger" href="#modal14">border_color</a></i></td>
                    <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Agregar administradores</td>
                    <td><i class="material-icons"><a class="modal-trigger" href="#modal14">border_color</a></i></td>
                    <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Modificar administradores</td>
                    <td><i class="material-icons"><a class="modal-trigger" href="#modal14">border_color</a></i></td>
                    <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Eliminar administradores</td>
                    <td><i class="material-icons"><a class="modal-trigger" href="#modal14">border_color</a></i></td>
                    <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                </tr>
            </tbody>
        </table>
        <!-- Creando el efecto modal para cada accion a realizar (agregar, modificar y eliminar) -->

        <div id="modal13" class="modal">
            <div class="modal-content">
                <h5 class="cyan-text darker-2 center-align"><b>Agregar un nuevo permiso</b></h5>
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input disabled value="Codigo autonúmerico" id="disabled" type="text" class="validate">
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
        <!-- Creando modal14 para opcion modificar-->
        <div id="modal14" class="modal">
            <div class="modal-content">
                <h5 class="cyan-text darker-2 center-align"><b>Modificar un permiso</b></h5>
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input disabled value="Codigo autonúmerico" id="disabled" type="text" class="validate">
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
            <a class="btn-floating btn-large cyan darken-2 modal-trigger" data-target="modal10"><i
                    class="large material-icons">add</i></a>
            <ul>
                <!-- Declarando los iconos deseados para cada acción, definiendo que modal activará cada botón -->
                <li class="waves-effect waves-light"><a class="modal-trigger" href="modal10"><i
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
                <td><i class="material-icons"><a class="modal-trigger" href="#modal21">border_color</a></i></td>
                <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Josué Rivera</td>
                <td>Modificar productos</td>
                <td><i class="material-icons"><a class="modal-trigger" href="#modal22">border_color</a></i></td>
                <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Josué Rivera</td>
                <td>Eliminar productos</td>
                <td><i class="material-icons"><a class="modal-trigger" href="#modal22">border_color</a></i></td>
                <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Carlos Ramírez</td>
                <td>Agregar administradores</td>
                <td><i class="material-icons"><a class="modal-trigger" href="#modal22">border_color</a></i></td>
                <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Carlos Ramírez</td>
                <td>Modificar administradores</td>
                <td><i class="material-icons"><a class="modal-trigger" href="#modal22">border_color</a></i></td>
                <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
            </tr>
            <tr>
                <td>6</td>
                <td>Carlos Ramírez</td>
                <td>Eliminar administradores</td>
                <td><i class="material-icons"><a class="modal-trigger" href="#modal22">border_color</a></i></td>
                <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
            </tr>
        </tbody>
    </table>
    <!-- Creando el efecto modal para cada accion a realizar (agregar, modificar y eliminar) -->
    <!-- Creando modal21 para opcion agregar -->
    <div id="modal21" class="modal">
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
    <!-- Creando modal22 para opcion modificar -->
    <div id="modal22" class="modal">
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
        <a href="#modal12" class="btn-floating btn-large cyan darken-2 modal-trigger"><i
                class="large material-icons">add</i></a>
        <ul>
            <li class="waves-effect waves-light"><a class="modal-trigger" href="#modal21"><i
                        class="material-icons">add_circle</i></a></li>
        </ul>
    </div>
</div>
<!-- Modal creado para ser ejecutado cada vez que se desea eliminar un registro -->
<div id="modal15" class="modal">
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
<?php
    Navbar::footer();
?>
<?php
    require('../../core/helpers/dashboardHelper.php');
    DashboardHelper::header('Estados');
?>
<!--Creación de nuestra barra de navegación-->
<?php
    DashboardHelper::dashNav();
?>
<!--Creación de un slider con sus respectivas imagenes responsivas para el inicio del apartado de usuarios-->
<?php
    DashboardHelper::slider();
?>
<main>
    <!--Creando una columna para la tabla de estado-->
    <div class="row">
        <div class="col s12">
            <!--Creando un "tab" para elegir entre administrar estados o el tipo de estado necesarios-->
            <ul class="tabs">
                <li class="tab col s6"><a class="active cyan-text darken-2" href="#test1">Pedidos</a></li>
                <li class="tab col s6"><a class="active cyan-text darken-2" href="#test2">Estado</a></li>
                <li class="tab col s3 disabled"><a href="#test5" class="white-text">Disabled sdsdzssdsdfasdasfTab</a>
                </li>
                <li class="tab col s3 disabled"><a href="#test5" class="white-text">Disabled sdsdzssdsdfasdasfTab</a>
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
                        <th>Código del pedido</th>
                        <th>Nombre de cliente</th>
                        <th>Contacto</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <!--Agregando registros a la tabla-->
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Juan Pérez</td>
                        <td>juan@gmail.com</td>
                        <td>24/05/16</td>
                        <td>Entregado</td>
                        <!--Declarando que al interactuar con el icono "delete" activará un modal que sirve para borrar o uno un registro-->
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal18">border_color</a></i></td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Alberto Laínez</td>
                        <td>alberto@gmail.com</td>
                        <td>02/11/18</td>
                        <td>Entregado</td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal18">border_color</a></i></td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Pedro Andrade</td>
                        <td>pedro@gmail.com</td>
                        <td>07/02/19</td>
                        <td>En proceso</td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal18">border_color</a></i></td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Benjamin Contreras</td>
                        <td>benja@gmail.com</td>
                        <td>09/02/19</td>
                        <td>En proceso</td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal18">border_color</a></i></td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                    </tr>
                </tbody>
            </table>

            <!-- Creando el efecto modal para cada accion a realizar (agregar, modificar y eliminar) -->
            <!-- Creando modal17 para opcion agregar -->
            <div id="modal17" class="modal modal-fixed-footer">
                <!--Creando el contenido de nuestro modal-->
                <div class="modal-content">
                    <h5 class="cyan-text darker-2 center-align"><b>Agregar un estado</b></h5>
                    <form class="col s12">
                        <div class="row">
                            <!--Creando los campos requeridos para agregar un usuario-->
                            <div class="input-field col s12 m6">
                                <input disabled value="Codigo autonumerico" id="disabled" type="text" class="validate">
                                <label for="disabled">Código del pedido</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="name" type="text" class="validate">
                                <label for="name">Nombre</label>
                            </div>
                            <div class="input-field col s12">
                                <!--Creación de un select para definir las opciones predeterminadas para cada tipo de usuario-->
                                <select>
                                    <option value="" disabled selected>Escoge una opción</option>
                                    <option value="1">Compra</option>
                                    <option value="2">Usuario</option>
                                </select>
                                <label>Tipo de estado</label>
                            </div>
                        </div>
                    </form>
                </div>
                <!--Declarando el contenido que lleva el footer del modal-->
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agregar</a>
                </div>
            </div>
            <!-- Creando modal18 para opcion modificar -->
            <div id="modal18" class="modal modal-fixed-footer">
                <div class="modal-content">
                    <h5 class="cyan-text darker-2 center-align"><b>Modificar un pedido</b></h5>
                    <form class="col s12">
                        <div class="row">
                            <!--Creando los campos requeridos para agregar un usuario-->
                            <div class="input-field col s12 m6">
                                <input disabled value="Codigo autonumerico" id="disabled" type="text" class="validate">
                                <label for="disabled">Código del pedido</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="name" type="text" class="validate">
                                <label for="name">Nombre del cliente</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="contact" type="text" class="validate">
                                <label for="contact">Contacto</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="date" type="text" class="datepicker">
                                <label for="date">Fecha</label>
                            </div>
                            <div class="input-field col s12">
                                <!--Creación de un select para definir las opciones predeterminadas para cada tipo de usuario-->
                                <select>
                                    <option value="" disabled selected>Escoge una opción</option>
                                    <option value="1">Entregado</option>
                                    <option value="2">En proceso</option>
                                </select>
                                <label>Tipo de estado</label>
                                <input id="state" type="text" class="validate">
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Modificar</a>
                </div>
            </div>
            <!-- Creando modal19 para opcion agregar -->
            <div id="modal19" class="modal modal-fixed-footer">
                <div class="modal-content">
                    <h5 class="cyan-text darker-2 center-align"><b>Agregar pedido</b></h5>
                    <form class="col s12">
                        <div class="row">
                            <!--Creando los campos requeridos para agregar un usuario-->
                            <div class="input-field col s12 m6">
                                <input disabled value="Codigo autonumerico" id="disabled" type="text" class="validate">
                                <label for="disabled">Código del estado</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="name" type="text" class="validate">
                                <label for="name">Nombre del cliente</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="contact" type="text" class="validate">
                                <label for="contact">Contacto</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="date" type="text" class="validate">
                                <label for="date">Fecha</label>
                            </div>
                            <div class="input-field col s12">
                                <!--Creación de un select para definir las opciones predeterminadas para cada tipo de usuario-->
                                <select>
                                    <option value="" disabled selected>Escoge una opción</option>
                                    <option value="1">Compra</option>
                                    <option value="2">Usuario</option>
                                </select>
                                <label>Tipo de estado</label>
                                <input id="state" type="text" class="validate">
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
                <a class="btn-floating btn-large cyan darken-2 modal-trigger" href="#modal19"><i
                        class="large material-icons">add</i></a>
                <ul>
                    <!-- Declarando los iconos deseados para cada acción, definiendo que modal activará cada botón -->
                    <li class="waves-effect waves-light"><a class="modal-trigger" href="#modal17"><i
                                class="material-icons">add_circle</i></a></li>
                </ul>
            </div>
        </div>
        <!-- Creando test2 para estados -->
        <div id="test2" class="col s12">
            <table class="striped responsive-table">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Tipo de estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Entregado</td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal20">border_color</a></i></td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>En proceso</td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal20">border_color</a></i></td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                    </tr>
                </tbody>
            </table>

            <!-- Creando el efecto modal para cada accion a realizar (agregar, modificar y eliminar) -->
            <!-- Creando modal19 para opcion agregar -->
            <div id="modal19" class="modal">
                <div class="modal-content">
                    <h5 class="cyan-text darker-2 center-align"><b>Agregar un nuevo tipo de estado</b></h5>
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input disabled value="Codigo autonúmerico" id="disabled" type="text" class="validate">
                                <label for="disabled">Código del tipo de estado</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="name" type="text" class="validate">
                                <label for="name">Nombre del tipo de estado</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agregar</a>
                </div>
            </div>
            <!-- Creando modal20 para opcion modificar -->
            <div id="modal20" class="modal">
                <div class="modal-content">
                    <h5 class="cyan-text darker-2 center-align"><b>Modificar un tipo de estado</b></h5>
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input disabled value="Codigo autonúmerico" id="disabled" type="text" class="validate">
                                <label for="disabled">Código del tipo de estado</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="name" type="text" class="validate">
                                <label for="name">Nombre del tipo de estado</label>
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
                <a class="btn-floating btn-large cyan darken-2 modal-trigger" href="#modal19"><i
                        class="large material-icons">add</i></a>
                <ul>
                    <li class="waves-effect waves-light"><a class="modal-trigger" href="#modal19"><i
                                class="material-icons">add_circle</i></a></li>
                </ul>
            </div>
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
</main>
<?php
    DashboardHelper::footer();
?>
<!-- Función de encabezado  -->
<?php
    require('../../core/helpers/dashboardHelper.php');
    DashboardHelper::headerTemplate('Estados');
?>
<main class="container">
    <!--Creando una columna para la tabla de estado-->
    <div class="row">
        <div class="col s12">
            <!--Creando un "tab" para elegir entre administrar estados o el tipo de estado necesarios-->
            <ul class="tabs">
                <li class="tab col s6"><a class="active cyan-text darken-2" href="#test1">Pedidos</a></li>
                <li class="tab col s6"><a class="active cyan-text darken-2" href="#test2">Estado</a></li>
            </ul>
        </div>
        <!--Creando un div con su id="test1" para que se muestre al momento de elegir la opción previamente construida en el "tab"-->
        <div id="test1" class="col s12">
            <!--Declarando que sea una tabla responsiva-->
            <table id="pedidos-table">
                <thead>
                    <!--Agregando los campos fijos a la tabla-->
                    <tr>
                        <th>Nombre de cliente</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <!--Agregando registros a la tabla-->
                <tbody id="tbody-read-pedidos">
                </tbody>
            </table>

            <!-- Creando el efecto modal para cada accion a realizar (agregar, modificar y eliminar) -->

            <!-- Creando update-pedido para opcion modificar -->
            <div id="update-pedido" class="modal modal-fixed-footer">
                <div class="modal-content">
                    <h5 class="cyan-text darker-2 center-align"><b>Modificar un pedido</b></h5>
                    <form class="col s12">
                        <div class="row">
                            <!--Creando los campos requeridos para agregar un usuario-->
                            <div class="input-field col s12 m6">
                                <input id="name" type="text" class="validate">
                                <label for="name">Cliente</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="contact" type="text" class="validate">
                                <label for="contact">Fecha</label>
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
    </div>
</main>
</body>
<!-- Función de pie de página -->
<?php
    DashboardHelper::footer('pedidos.js', null);
?>
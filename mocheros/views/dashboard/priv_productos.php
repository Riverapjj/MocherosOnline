
<?php
    require('../../core/helpers/dashboardHelper.php');
    DashboardHelper::headerTemplate('Productos');
?>
<main class="container">
    <!--Creando una columna para la tabla de juguetes-->
    <div class="row">
        <div class="col s12">
            <!--Creando un "tab" para elegir entre administrar juguetes, tipo de juguetes y su categorias necesarias-->
            <ul class="tabs">
                <li class="tab col s6 m6 l6"><a class="cyan-text darken-2" href="#test1"
                        id="tabs-products">Productos</a></li>
                <li class="tab col s6 m6 l6"><a class="cyan-text darken-2" href="#test4"
                        id="tabs-category">Categorías</a></li>
                </li>
            </ul>
        </div>
        <!--Creando un div con su id="test1" para que se muestre al momento de elegir la opción previamente construida en el "tab"-->
        <div id="test1" class="col s12">
            <!--Declarando que sea una tabla responsiva-->
            <table id="products-table">
                <thead>
                    <!--Agregando los campos fijos a la tabla-->
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Existencias</th>
                        <th>Categoria</th>
                        <th>Precio</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbody-products">
                </tbody>
            </table>
            <!-- Creando el efecto modal para cada accion a realizar (agregar, modificar y eliminar) -->
            <!-- Creando modal-update-products para opcion modificar -->
            <div id="modal-update-products" class="modal modal-fixed-footer">
                <div class="modal-content">
                    <h5 class="cyan-text darker-2 center-align"><b>Modificar un producto</b></h5>
                    <form class="col s12" id="form-update-products">
                    <input type="hidden" id="IdArticulos" name="IdArticulos"/>
                    <input type="hidden" id="image-product" name="image-product-name"/> 
                        <div class="row">
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="update-name" name="update-name-name" type="text" class="validate" required>
                                <label for="update-name">Nombre del producto</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <select id="update-category" name="update-category-name" required>
                                </select>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="update-exist" name="update-exist-name" type="number" class="validate" required>
                                <label for="update-exist">Existencias</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="update-price" name="update-price-name" type="number" class="validate" required>
                                <label for="update-price">Precio</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="update-descrip" name="update-descrip-name" type="text" class="validate" required>
                                <label for="update-descrip">Descripción</label>
                            </div>
                            <br>
                            <div class="file-field input-field col s12 m6">
                                <div class="btn-large waves-effect waves-orange">
                                    <span><i class="material-icons">image</i></span>
                                    <input id="update-file" type="file" name="update-file-name"/>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text"
                                        placeholder="Seleccione una imagen de 500x500" required/>
                                </div>
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
                        <div class="modal-footer">
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
            <!-- Creando modal-create-products para opcion agregar -->
            <div id="modal-create-products" class="modal modal-fixed-footer">
                <div class="modal-content">
                    <h5 class="cyan-text darker-2 center-align"><b>Agregar un producto</b></h5>
                    <form class="col s12" id="form-create-products">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="create-name" name="create-name-name" type="text" class="validate" required>
                                <label for="create-name">Nombre del producto</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <select id="create-category" name="create-category-name">
                                </select>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="create-exist" name="create-exist-name" type="number" class="validate" required>
                                <label for="create-exist">Existencias</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="create-price" name="create-price-name" type="number" class="validate" required>
                                <label for="create-price">Precio</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="create-descrip" name="create-descrip-name" type="text" class="validate" required>
                                <label for="create-descrip">Descripción</label>
                            </div>
                            <br>
                            <div class="file-field input-field col s12 m6">
                                <div class="btn-large waves-effect waves-orange">
                                    <span><i class="material-icons">image</i></span>
                                    <input id="create-file" type="file" name="create-file-name" />
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text"
                                        placeholder="Seleccione una imagen de 500x500" required/>
                                </div>
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
                </div>
                <div class="modal-footer">
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
                <a class="btn-floating btn-large cyan darken-2 modal-trigger" href="#modal-create-products"><i
                        class="large material-icons">add</i></a>
                <ul>
                    <!-- Declarando los iconos deseados para cada acción, definiendo que modal activará cada botón -->
                    <li class="waves-effect waves-light"><a class="modal-trigger" href="#modal-create-products"><i
                                class="material-icons">add_circle</i></a></li>
                </ul>
            </div>
        </div>
        <!-- creando un segundo div con id "test4" para la sección a elegir en el tab -->
        <div id="test4" class="col s12">
            <!-- declarando que sea responsiva -->
            <table id="category-table">
                <thead class="col s12 m12 l12">
                    <!-- declarando que sea responsiva -->
                    <tr>
                        <th>Categoria</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody id="tbody-category" class="col s12 m12 l12">
                </tbody>
            </table>
            <!-- Creando el efecto modal para cada accion a realizar (agregar, modificar y eliminar) -->
            
            <!-- Creando modal-create-category para opcion agregar -->
            <div id="modal-create-category" class="modal">
                <div class="modal-content">
                    <h5 class="cyan-text darker-2 center-align"><b>Agregar una nueva categoria</b></h5>
                    <form class="col s12" id="form-create-category">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="name" type="text" name="create-name-name" class="validate" require>
                                <label for="name">Nombre de la categoria</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="descrip" type="text" name="create-descrip-name" class="validate" require>
                                <label for="descrip">Descripción</label>
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
                </div>
                <!-- Declarando como es el estilo del footer del modal -->
                <div class="modal-footer">
                    <div class="row center-align">
                            <a href="#" class="btn waves-effect grey tooltipped modal-close"
                                data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                            <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Crear"><i
                                    class="material-icons">save</i></button>
                    </div>
                </div>
                    </form>
            </div>
            <!-- Creando modal-update-category para opcion modificar -->
            <div id="modal-update-category" class="modal">
                <div class="modal-content">
                    <h5 class="cyan-text darker-2 center-align"><b>Modificar una categoria</b></h5>
                    <form class="col s12" id="form-update-category">
                            <input type="hidden" id="IdCategoria" name="IdCategoria"/>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="name-category-update" name="name-category-update" type="text" class="validate">
                                <label for="name">Nombre de la categoria</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="update-descrip-category" type="text" name="update-descrip-category" class="validate" require>
                                <label for="descrip">Descripción</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <!--Creación de un select para definir las opciones predeterminadas para cada tipo de usuario-->
                                <p>
                                    <div class="switch">
                                        <span>Estado:</span>
                                        <label>
                                            <i class="material-icons">visibility_off</i>
                                            <input id="c" type="checkbox" name="update-statuscat-name"
                                                checked />
                                            <span class="lever"></span>
                                            <i class="material-icons">visibility</i>
                                        </label>
                                    </div>
                                </p>
                            </div>
                        </div>
                        <!-- Declarando como es el estilo del footer del modal -->
                        <div class="modal-footer">
                        <div class="row center-align">
                                    <a href="#" class="btn waves-effect grey tooltipped modal-close"
                                        data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                                    <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Modificar"><i
                                            class="material-icons">save</i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Declarando el boton siempre fijo para agregar y modificar tipo de usuarios con su respectivo icono y modal a ejecutar -->
            <div class="fixed-action-btn toolbar">
                <a class="btn-floating btn-large cyan darken-2 modal-trigger" href="#modal-create-category"><i
                        class="large material-icons">add</i></a>
                <ul>
                    <!-- Declarando los iconos deseados para cada acción, definiendo que modal activará cada botón -->
                    <li class="waves-effect waves-light"><a class="modal-trigger" href="#modal-create-category"><i
                                class="material-icons">add_circle</i></a></li>
                </ul>
            </div>
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
<!-- Función de pie de página -->
<?php
    DashboardHelper::footer('categorias.js', 'productos.js');
?>
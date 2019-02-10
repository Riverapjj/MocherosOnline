<!DOCTYPE html>
<html lang="en">
<head>
<?php
    require('../app/view/head.php');
    ?>
<title> Estados  </title>

</head>
  
<body>
<header>
    <!--Creación de nuestra barra de navegación-->
    <?php
        require('../app/view/navbar.php');
        ?>
    </header>
    
        <!--Creación de un slider con sus respectivas imagenes responsivas para el inicio del apartado de usuarios-->
        <div class="slider">
                <ul class="slides">
                  <li>
                    <img class="responsive-img" src="../resources/img/slider3.jpg"> 
                  </li>
                  <li>
                    <img class="responsive-img" src="../resources/img/slider6.jpg"> 
                  </li>
                  <li>
                    <img class="responsive-img" src="../resources/img/slider4.jpg"> 
                  </li>
                  <li>
                    <img class="responsive-img" src="../resources/img/slider1.jpg"> 
                  </li>
                </ul>
        </div>
        <!--Creando una columna para la tabla de estado-->
    <div class="row">
            <div class="col s12">
                <!--Creando un "tab" para elegir entre administrar estados o el tipo de estado necesarios-->
                <ul class="tabs">
                <li class="tab col s3 disabled"><a href="#test5" class="white-text">Disabled sdsdzssdsdfasdasf</a></li>
                <li class="tab col s3"><a class="active cyan-text darken-2" href="#test1">Estado</a></li>
                <li class="tab col s3"><a class="cyan-text darken-2" href="#test2">Tipo </a></li>
                <li class="tab col s3 disabled"><a href="#test5" class="white-text">Disabled sdsdzssdsdfasdasfTab</a></li>
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
                        <th>Código del estado</th>
                        <th>Tipo de estado</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <!--Agregando registros a la tabla-->
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Compra</td>
                        <td>En proceso</td>  
                        <!--Declarando que al interactuar con el icono "delete" activará un modal que sirve para borrar o uno un registro-->
                        <td><i class="material-icons"><a class = "modal-trigger"href="#modal18">border_color</a></i></td>
                        <td><i class="material-icons"><a class= "modal-trigger" href="#modal15">delete</a></i></td>           
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Compra</td>
                        <td>Finalizada</td> 
                        <td><i class="material-icons"><a class = "modal-trigger"href="#modal18">border_color</a></i></td>
                        <td><i class="material-icons"><a class = "modal-trigger" href="#modal15">delete</a></i></td> 
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Usuario</td>
                        <td>Activo</td>
                        <td><i class="material-icons"><a class = "modal-trigger"href="#modal18">border_color</a></i></td>
                        <td><i class="material-icons"><a class = "modal-trigger" href="#modal15">delete</a></i></td> 
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Usuario</td>
                        <td>Inactivo</td> 
                        <td><i class="material-icons"><a class = "modal-trigger"href="#modal18">border_color</a></i></td>
                        <td><i class="material-icons"><a class = "modal-trigger" href="#modal15">delete</a></i></td>      
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
                                <input disabled value= "Codigo autonumerico" id="disabled" type="text" class="validate">
                                <label for="disabled">Código del estado</label>
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
                    <h5 class="cyan-text darker-2 center-align"><b>Modificar un estado</b></h5>
                    <form class="col s12">
                        <div class="row">
                            <!--Creando los campos requeridos para agregar un usuario-->
                            <div class="input-field col s12 m6">
                                <input disabled value= "Codigo autonumerico" id="disabled" type="text" class="validate">
                                <label for="disabled">Código del estado</label>
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
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Modificar</a>
                </div>
            </div>
            <!-- Declarando que el botón para agregar y modificar esté fijo en una esquina de la página -->
            <div class="fixed-action-btn toolbar">
                <a class="btn-floating btn-large cyan darken-2"><i class="large material-icons">mode_edit</i></a>
                <ul>  
                    <!-- Declarando los iconos deseados para cada acción, definiendo que modal activará cada botón -->
                    <li class="waves-effect waves-light"><a class="modal-trigger" href="#modal17"><i class="material-icons">add_circle</i></a></li>
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
                            <th>Tipo de estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
            
                    <tbody>
                        <!-- Agregando registros  -->
                        <tr>
                            <td>1</td>
                            <td>Compra</td> 
                            <td><i class="material-icons"><a class = "modal-trigger"href="#modal20">border_color</a></i></td>
                            <td><i class="material-icons"><a class = "modal-trigger"href="#modal15">delete</a></i></td>           
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Usuario</td>
                            <td><i class="material-icons"><a class = "modal-trigger"href="#modal20">border_color</a></i></td>
                            <td><i class="material-icons"><a class = "modal-trigger"href="#modal15">delete</a></i></td> 
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
                                    <input disabled value= "Codigo autonúmerico" id="disabled" type="text" class="validate">
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
                                        <input disabled value= "Codigo autonúmerico" id="disabled" type="text" class="validate">
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
                    <a class="btn-floating btn-large cyan darken-2"><i class="large material-icons">mode_edit</i></a>
                    <ul>  
                        <li class="waves-effect waves-light"><a class="modal-trigger" href="#modal19"><i class="material-icons">add_circle</i></a></li>
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
        <?php
        require('../app/view/footer_priv.php');
        ?>
</body>
</html>
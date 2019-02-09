﻿<!DOCTYPE html>
<html lang="en">
<head>
<?php
    require('../app/view/head.php');
    ?>
<title> Productos  </title>

</head>
<body>
    <!--Creación de nuestra barra de navegación-->
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
                    <img class="responsive-img" src="../web/images/slider/slider1.jpg"> 
                  </li>
                  <li>
                    <img class="responsive-img" src="../web/images/slider/slider2.jpg"> 
                  </li>
                  <li>
                    <img class="responsive-img" src="../web/images/slider/slider3.jpg"> 
                  </li>
                  <li>
                    <img class="responsive-img" src="../web/images/slider/slider4.jpg"> 
                  </li>
                </ul>
        </div>
        <!--Creando una columna para la tabla de juguetes-->
    <div class="row">
            <div class="col s12">
                <!--Creando un "tab" para elegir entre administrar juguetes, tipo de juguetes y su categorias necesarias-->
                <ul class="tabs">
                <li class="tab col s3"><a class="active cyan-text darken-2" href="#test1">Juguetes</a></li>
                <li class="tab col s3"><a class="cyan-text darken-2" href="#test2">Tipo </a></li>
                <li class="tab col s3"><a class="cyan-text darken-2" href="#test4">Categoria</a></li>
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
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Tipo de juguete</th>
                        <th>Existencias</th>
                        <th>Categoria</th>
                        <th>Rango de edad</th>
                        <th>Precio</th>
                        <th>Calificación</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
        
                <tbody>
                    <tr>
                         <!--Agregando una imagen para cada juguete en la tabla-->
                        <td>
                            <div class="row">
                                <div class="col s12 m7">
                                    <div class="card">
                                         <!--Definiendo que la imagen sea responsiva-->
                                        <div class="card-image">
                                            <img class="responsive-img z-depth-3" src="../web/images/productos/toys.jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                         <!--Agregando registros a la tabla-->
                        <td>Carro aerodinamico</td>
                        <td>Acción</td>
                        <td>Niños</td>
                        <td>100 existencias</td>
                        <td>5 a 10 años</td>
                        <td>$7.99</td>
                        <td>4.5 Estrellas</td>
                        <td>Carro aerodinamico a escala</td>  
                        <!--Declarando que al interactuar con el icono "delete" activará un modal que sirve para borrar o uno un registro-->
                        <td><i class="material-icons"><a class = "modal-trigger"href="#modal3">border_color</a></i></td> 
                        <td><i class="material-icons"><a class = "modal-trigger"href="#modal16">delete</a></i></td>            
                    </tr>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col s12 m7">
                                    <div class="card">
                                        <div class="card-image ">
                                            <img class="responsive-img z-depth-3"  src="../web/images/productos/cot.jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>Maquinaria de construcción</td>
                        <td>Construcción</td>
                        <td>Niños</td>
                        <td>20 existencias</td>
                        <td>7 a 11 años</td>
                        <td>$8.99</td>
                        <td>2.5 Estrellas</td>
                        <td>Color amarillo con accesorios como la tierra incluidos</td> 
                        <td><i class="material-icons"><a class = "modal-trigger"href="#modal3">border_color</a></i></td> 
                        <td><i class="material-icons"><a class = "modal-trigger"href="#modal16">delete</a></i></td> 
                    </tr>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col s12 m7">
                                    <div class="card ">
                                        <div class="card-image">
                                            <img class="responsive-img z-depth-3" src="../web/images/productos/duck.jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>Pato de goma</td>
                        <td>Baño</td>
                        <td>Todas las categorias</td>
                        <td>Sin existencias</td>
                        <td>Todas las edades</td>
                        <td>$1.99</td>
                        <td>5 Estrellas</td>
                        <td>Color amarillo de 10cm de ancho por 20 de ancho hecho de goma</td>
                        <td><i class="material-icons"><a class = "modal-trigger"href="#modal3">border_color</a></i></td> 
                        <td><i class="material-icons"><a class = "modal-trigger"href="#modal16">delete</a></i></td> 
                    </tr>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col s12 m7">
                                    <div class="card">
                                        <div class="card-image">
                                            <img class="responsive-img z-depth-3" src="../web/images/productos/car.jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>Carro electrico</td>
                        <td>Acción</td>
                        <td>Niños</td>
                        <td>200 existencias</td>
                        <td>6 a 11 años</td>
                        <td>$20.00</td>
                        <td>0 Estrellas</td>
                        <td>Color amarillo capacidad para 2 personas</td> 
                        <td><i class="material-icons"><a class = "modal-trigger"href="#modal3">border_color</a></i></td>
                        <td><i class="material-icons"><a class = "modal-trigger"href="#modal16">delete</a></i></td>       
                    </tr>
                </tbody>
            </table> 
    <!-- Creando el efecto modal para cada accion a realizar (agregar, modificar y eliminar) -->
            <!-- Creando modal2 para opcion agregar -->
            <div id="modal2" class="modal modal-fixed-footer">
                <!--Creando el contenido de nuestro modal-->
                <div class="modal-content">
                    <h5 class="cyan-text darker-2 center-align"><b>Agregar un nuevo juguete</b></h5>
                    <form class="col s12">
                        <!--Creando los campos requeridos para agregar un juguete-->
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="name" type="text" class="validate">
                                <label for="name">Nombre del juguete</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <!--Creación de un select para definir las opciones predeterminadas para cada tipo de usuario-->
                                <select>
                                    <option value="" disabled selected>Escoge una opción</option>
                                    <option value="1">Acción</option>
                                    <option value="2">Construcción</option>
                                    <option value="3">Baño</option>
                                </select>
                                <label>Tipo de juguete</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <select>
                                    <option value="" disabled selected>Escoge una opción</option>
                                    <option value="1">Niños</option>
                                    <option value="2">Niñas</option>
                                    <option value="3">Todas las categorias</option>
                                </select>
                                <label>Categoria</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="exist" type="text" class="validate">
                                <label for="exist">Existencias</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="age" type="text" class="validate">
                                <label for="age">Rango de edad</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="price" type="text" class="validate">
                                <label for="price">Precio</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="cal" type="text" class="validate">
                                <label for="cal">Calificación</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="desc" type="text" class="validate">
                                <label for="desc">Descripción</label>
                            </div>
                            <!--Creando un "card" para colocar la imagen deseada para cada juguete-->
                            <div class="col s12 m6">
                                <div class="card card small">
                                    <div class="card-image">
                                        <!--Hacemos la imagen responsiva-->
                                        <img class="responsive-img z-depth-3" src="../web/images/productos/image2.jpg"> 
                                    </div>
                                </div>
                            </div>
                            <div class="input-field col s12 m6"><br><br><br><br><br><br><br><br><br><br><br>
                                <a class="waves-effect waves-light btn card-panel cyan darken-2"><i class="material-icons left">attach_file</i>Subir archivo</a>
                            </div>
                        </div>
                    </form>
                </div>
                <!--Declarando el contenido que lleva el footer del modal-->
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agregar</a>
                </div>
            </div>
            <!-- Creando modal3 para opcion modificar -->
            <div id="modal3" class="modal modal-fixed-footer">
                <div class="modal-content">
                    <h5 class="cyan-text darker-2 center-align"><b>Modificar un juguete</b></h5>
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="name" type="text" class="validate">
                                <label for="name">Nombre del juguete</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <select>
                                    <option value="" disabled selected>Escoge una opción</option>
                                    <option value="1">Acción</option>
                                    <option value="2">Construcción</option>
                                    <option value="3">Baño</option>
                                </select>
                                <label>Tipo de juguete</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <select>
                                    <option value="" disabled selected>Escoge una opción</option>
                                    <option value="1">Niños</option>
                                    <option value="2">Niñas</option>
                                    <option value="3">Todas las categorias</option>
                                </select>
                                <label>Categoria</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="exist" type="text" class="validate">
                                <label for="exist">Existencias</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="age" type="text" class="validate">
                                <label for="age">Rango de edad</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="price" type="text" class="validate">
                                <label for="price">Precio</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="cal" type="text" class="validate">
                                <label for="cal">Calificación</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="desc" type="text" class="validate">
                                <label for="desc">Descripción</label>
                            </div>
                            <div class="col s12 m6">
                                <div class="card card small">
                                    <div class="card-image">
                                        <img class="responsive-img z-depth-3" src="../web/images/productos/image2.jpg"> 
                                    </div>
                                </div>
                            </div>
                            <div class="input-field col s12 m6"><br><br><br><br><br><br><br><br><br><br><br>
                                <a class="waves-effect waves-light btn card-panel cyan darken-2"><i class="material-icons left">attach_file</i>Subir archivo</a>
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
                    <li class="waves-effect waves-light"><a class="modal-trigger" href="#modal2"><i class="material-icons">add_circle</i></a></li>
                </ul>
            </div>                    
        </div>
        <!-- creando un segundo div con id "test2" para la sección a elegir en el tab -->
        <div id="test2" class="col s12">
             <!-- declarando que sea responsiva -->
                <table class="striped responsive-table">
                    <thead>
                        <!-- Definiendo los campos para la tabla -->
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
            
                    <tbody>
                        <!-- Agregando registros  -->
                        <tr>
                            <td>1</td>
                            <td>Acción</td> 
                            <td><i class="material-icons"><a class = "modal-trigger"href="#modal6">border_color</a></i></td>  
                            <td><i class="material-icons"><a class = "modal-trigger"href="#modal16">delete</a></i></td>                           
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Construcción</td>
                            <td><i class="material-icons"><a class = "modal-trigger"href="#modal6">border_color</a></i></td> 
                            <td><i class="material-icons"><a class = "modal-trigger"href="#modal16">delete</a></i></td>   
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Baño</td>
                            <td><i class="material-icons"><a class = "modal-trigger"href="#modal6">border_color</a></i></td> 
                            <td><i class="material-icons"><a class = "modal-trigger"href="#modal16">delete</a></i></td>   
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Cocina</td>
                            <td><i class="material-icons"><a class = "modal-trigger"href="#modal6">border_color</a></i></td>
                            <td><i class="material-icons"><a class = "modal-trigger"href="#modal16">delete</a></i></td>                                   
                        </tr>
                    </tbody>
                </table> 
        <!-- Creando el efecto modal para cada accion a realizar (agregar, modificar y eliminar) -->
                <!-- Creando modal5 para opcion agregar -->
                <div id="modal5" class="modal">
                    <div class="modal-content">
                        <h5 class="cyan-text darker-2 center-align"><b>Agregar un nuevo tipo de juguete</b></h5>
                        <form class="col s12">
                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <input disabled value= "Codigo autonúmerico" id="disabled" type="text" class="validate">
                                    <label for="disabled">Código del tipo de juguete</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="name" type="text" class="validate">
                                    <label for="name">Nombre del tipo de juguete</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agregar</a>
                    </div>
                </div>
                <!-- Creando modal6 para opcion modificar -->
                <div id="modal6" class="modal">
                    <div class="modal-content">
                            <h5 class="cyan-text darker-2 center-align"><b>Modificar un tipo de juguete</b></h5>
                            <form class="col s12">
                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <input disabled value= "Codigo autonúmerico" id="disabled" type="text" class="validate">
                                        <label for="disabled">Código del tipo de juguete</label>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <input id="name" type="text" class="validate">
                                        <label for="name">Nombre del tipo de juguete</label>
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
                        <li class="waves-effect waves-light"><a class="modal-trigger" href="#modal5"><i class="material-icons">add_circle</i></a></li>
                    </ul>
                </div>                    
            </div>
            <!-- creando un segundo div con id "test4" para la sección a elegir en el tab -->
        <div id="test4" class="col s12">
            <!-- declarando que sea responsiva -->
                <table class="striped responsive-table">
                    <thead>
                        <!-- declarando que sea responsiva -->
                        <tr>
                            <th>Código</th>
                            <th>Categoria</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
            
                    <tbody>
                         <!-- Agregando registros  -->
                        <tr>
                            <td>1</td>
                            <td>Niños</td> 
                            <td><i class="material-icons"><a class = "modal-trigger"href="#modal9">border_color</a></i></td>   
                            <td><i class="material-icons"><a class = "modal-trigger"href="#modal16">delete</a></i></td>                              
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Niñas</td>
                            <td><i class="material-icons"><a class = "modal-trigger"href="#modal9">border_color</a></i></td> 
                            <td><i class="material-icons"><a class = "modal-trigger"href="#modal16">delete</a></i></td>                          
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Bebés</td>
                            <td><i class="material-icons"><a class = "modal-trigger"href="#modal9">border_color</a></i></td>  
                            <td><i class="material-icons"><a class = "modal-trigger"href="#modal16">delete</a></i></td> 
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Todas las categorias</td>
                            <td><i class="material-icons"><a class = "modal-trigger"href="#modal9">border_color</a></i></td> 
                            <td><i class="material-icons"><a class = "modal-trigger"href="#modal16">delete</a></i></td>       
                        </tr>
                    </tbody>
                </table> 
        <!-- Creando el efecto modal para cada accion a realizar (agregar, modificar y eliminar) -->
                <!-- Creando modal8 para opcion agregar -->
                <div id="modal8" class="modal">
                    <div class="modal-content">
                        <h5 class="cyan-text darker-2 center-align"><b>Agregar una nueva categoria</b></h5>
                        <form class="col s12">
                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <input disabled value= "Codigo autonúmerico" id="disabled" type="text" class="validate">
                                    <label for="disabled">Código de la categoria</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="name" type="text" class="validate">
                                    <label for="name">Nombre de la categoria</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Declarando como es el estilo del footer del modal -->
                    <div class="modal-footer">
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agregar</a>
                    </div>
                </div>
                <!-- Creando modal9 para opcion modificar -->
                <div id="modal9" class="modal">
                    <div class="modal-content">
                            <h5 class="cyan-text darker-2 center-align"><b>Modificar una categoria</b></h5>
                            <form class="col s12">
                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <input disabled value= "Codigo autonúmerico" id="disabled" type="text" class="validate">
                                        <label for="disabled">Código de la categoria</label>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <input id="name" type="text" class="validate">
                                        <label for="name">Nombre de la categoria</label>
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
                        <li class="waves-effect waves-light"><a class="modal-trigger" href="#modal8"><i class="material-icons">add_circle</i></a></li>
                    </ul>
                </div>                    
            </div>
        </div>
        <!-- Modal creado para ser ejecutado cada vez que se desea eliminar un registro -->
        <div id="modal16" class="modal">
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
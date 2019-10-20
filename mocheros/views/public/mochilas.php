<?php
require_once('../../core/helpers/publichelper.php');
publicHelper::header('Mochilas');
?>
<!--buscador-->
<div class="container-fluid grey lighten-2">
    <h1 class="center indigo-text" id="title"></h1>
    <form class="col s12" method="post" id="form-search" autocomplete="off">
        <div class="row">
            <div class="input-field col s6 m4">
                <i class="material-icons prefix">search</i>
                <input id="buscar" type="text" name="busqueda" />
                <label class="lang" key="buscar" for="buscar">Buscar</label>
            </div>
            <div class="input-field col s6 m4">
                <button type="submit" class="btn waves-effect green tooltipped" data-tooltip="Buscar producto"><i class="material-icons">check_circle</i></button>
            </div>
            <!--<a href="../../core/reportes/dashboard/reporteMaxVendidos.php"> Hola </a>-->
        </div>
    </form>
    <!--apartado para mostrar los resultados de la busqueda a partir de catalogo.js-->
    <h4 class="center indigo-text lang" id="titulo" key="productos"></h4>
    <div class="row" id="resultado"></div>
    <!--apartado para mostrar los productos a partir de catalogo.js-->
    <div class="row" id="catalogo"></div>
</div>
<div id="modalPuntuacion" class="modal modalprod">
    <div class="modal-content">
        <h4 class="center">Agregar Valoracion</h4>
        <div class="container">
            <form class="col s12" method="post" id="form-valoracion">
                <div class='row'>
                    <div class='col s12'>
                    </div>
                </div>
                <!--Creacion de filas y columnas para cada elemento del formulario de registro-->
                <div class='row'>
                    <div class='input-field col s12 l12 m6'>
                        <input class='validate' type='hidden' name='IdArticulos' id='IdArticulos' />
                        <select name="puntuacion" id="puntuacion">
                            <option value="" disabled selected>Seleccione una opcion</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
                <div class="row center-align">
                    <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                    <button type="submit" class="btn waves-effect green tooltipped" data-tooltip="Crear"><i class="material-icons">check</i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="modalP" class="modal modals">
    <div class="modal-content" id="modal-content">
    </div>
    <div class="row center">
        <a href="#" class="btn waves-effect red tooltipped modal-close" data-tooltip="Cancelar">Cerrar<i class="material-icons"></i></a>
    </div>
</div>
<?php
publicHelper::footer('catalogo.js');
?>
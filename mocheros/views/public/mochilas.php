<?php
    require_once('../../core/helpers/publichelper.php');
    publicHelper::header('Mochilas');
?>
<!--buscador-->
<div class="container-fluid grey lighten-2">
    <form class="col s12" method="post" id="form-search">
      <div class="row">
        <div class="input-field col s6 m4">
            <i class="material-icons prefix">search</i>
            <input id="buscar" type="text" name="busqueda"/>
            <label for="buscar">Buscar</label>
        </div>
        <div class="input-field col s6 m4">
            <button type="submit" class="btn waves-effect green tooltipped" data-tooltip="Buscar producto"><i class="material-icons">check_circle</i></button>
        </div>
      </div>
    </form>
    <h1 class="center indigo-text" id="title"></h1>
    <!--apartado para mostrar los resultados de la busqueda a partir de catalogo.js-->
    <h4 class="center indigo-text" id="titulo"></h4>
    <div class="row" id="resultado"></div>
    <!--apartado para mostrar los productos a partir de catalogo.js-->
    <div class="row" id="catalogo"></div>
</div>
<?php
    publicHelper::footer('catalogo.js');
?>
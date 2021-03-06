<?php
require('../../core/helpers/publicHelper.php');
publicHelper::header('Carrito de compras');
?>
<main class="grey lighten-2">
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l9">
                <div class="container-fluid">
                    <div id="detalleVenta"></div>
                </div>
            </div>
            <div id="total"></div>
            <!--<div><a class="waves-effect waves-light btn green" href='../../core/reportes/public/factura.php'><i class="material-icons">check</i></a></div>-->
        </div>
    </div>
    <div id="modal-factura" class="modal">
        <div class="modal-content">
            <h4 class="center">Aviso</h4>
            <div class="container">
                <form class="col s12" method="post" id="form-create" enctype="multipart/form-data">
                    <h6>La venta ha sido realizada con éxito. La factura será realizada en un momento.</h6>                    
                    <div class="row center">                     
                    <a class="waves-effect waves-light btn green" href='../../core/reportes/public/factura.php'><i class="material-icons">check</i></a>           
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
publicHelper::footer('carrito.js');
?>
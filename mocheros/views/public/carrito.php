<?php
require('../../core/helpers/publicHelper.php');
publicHelper::header('Carrito de compras');
?>
<main class="grey lighten-2">
    <div class="container">
        <table class="responsive-table">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Artículo</th>
                    <th>Cantidad</th>
                    <th>Precio unitario</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <tbody id="detalleVenta"></tbody>
        </table>
    </div>
    <!--Apartado donde aparece el total a apagar y la opción para pagar-->
    <div class="container monto">
        <div class="row">
            <div class="col s12 m6 l12">
                <div id="total"></div>
            </div>
        </div>
    </div>
</main>
<?php
publicHelper::footer('carrito.js');
?>
<?php
require('../../core/helpers/publicHelper.php');
publicHelper::header('Carrito');
?>
<main class="grey lighten-2">
    <div class="container">
        <h1 class="center indigo-text">Carrito de compras (<span id="cart-items-count">
                <?PHP if (isset($_SESSION["products"])) {
                    echo count($_SESSION["products"]);
                } ?></span>)</h1>
        <?php
        if (isset($_SESSION["products"]) && count($_SESSION["products"]) > 0) {
            ?>
            <table class="highlight" id="shopping-cart-results">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $cart_box = '<ul class="cart-products-loaded">';
                    $total = 0;
                    foreach ($_SESSION["products"] as $product) {
                        $product_name = $product["product_name"];
                        $product_price = $product["product_price"];
                        $product_code = $product["product_code"];
                        $product_qty = $product["product_qty"];
                        $product_color = $product["product_color"];
                        $subtotal = ($product_price * $product_qty);
                        $total = ($total + $subtotal);
                        ?>
                        <tr>
                            <td><?php echo $product_name;
                                echo "—";
                                echo $product_color; ?></td>
                            <td><?php echo $product_price; ?></td>
                            <td><input type="number" data-code="<?php echo $product_code; ?>" class="form-control text-center quantity" value="<?php echo $product_qty; ?>"></td>
                            <td><?php echo $currency;
                                echo sprintf("%01.2f", ($product_price * $product_qty)); ?></td>
                            <td>
                                <a href="#" class="btn btn-danger remove-item" data-code="<?php echo $product_code; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                <tfoot>
                    <br>
                    <br>
                    <tr>
                        <td><a href="index.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a></td>
                        <td colspan="2"></td>
                        <?php
                        if (isset($total)) {
                            ?>
                            <td class="text-center cart-products-total"><strong>Total <?php echo $currency . sprintf("%01.2f", $total); ?></strong></td>
                            <td><a href="checkout.php" class="btn btn-success btn-block">Checkout <i class="glyphicon glyphicon-menu-right"></i></a></td>
                        <?php } ?>
                    </tr>
                </tfoot>
            <?php
        } else {
            echo "Your Cart is empty";
            ?>
                <tfoot>
                    <br>
                    <br>
                    <tr>
                        <td><a href="index.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a></td>
                        <td colspan="2"></td>
                    </tr>
                </tfoot>
            <?php } ?>
            </tbody>
        </table>
    </div>
    </div>
    <td><img class="responsive-img" src="../../resources/img/mochila3.jpg"></td>
    <td>Mochila 1</td>
    <td>
        <div class="row">
            <div class="input-field col s6 m4 l4">
                <input type="number" id="stepper1" min="1" max="10 " value="1">
            </div>
        </div>
    </td>
    <td>$45.00</td>
    </tr>
    <tr>
        <td><img class="responsive-img" src="../../resources/img/accesorios1.jpg"></td>
        <td>Accesorio 1</td>
        <td>
            <div class="row">
                <div class="input-field col s6 m4 l4">
                    <!--Se agrega un numeric steppper para seleccionar la catidad del producto que desea-->
                    <input type="number" id="stepper1" min="1" max="10 " value="1">
                </div>
            </div>
        </td>
        <td>$22.50</td>
    </tr>
    </table>
    </div>
    <!--Apartado donde aparece el total a apagar y la opción para pagar-->
    <div class="container monto">
        <div class="row">
            <div class="col s12 m6 l12">
                <div class="card  grey lighten-3 ">
                    <div class="card-content black-text">
                        <p><b>SUBTOTAL</b> $67.50 </p>
                        <br><b>TOTAL </b> $67.50
                    </div>
                </div>
                <a href="#modal1" class="modal-trigger waves-effect waves-light btn-large amber darken-2">Realizar
                    compra</a>
            </div>
        </div>
    </div>
</main>
<?php
publicHelper::footer('carrito.js');
?>
<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/articulos.php');

/*if (isset($_GET['site']) && isset($_GET['action']) {
    session_start();
})*/

if (isset($_POST['IdArticulos'])) {
    foreach ($_POST as $key => $value) {
        $product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
    }
    $statement = $conn->prepare('SELECT Foto, NomArticulo, PrecioUnitario FROM articulos WHERE IdArticulos = ? LIMIT 1');
    $statement->bind_param('s', $product['IdArticulos']);
    $statement->execute();
    $statement->bind_result($product_name, $product_price);
    while ($statement->fetch()) {
        $product['NomArticulo'] = $product_name;
        $product['PrecioUnitario'] = $product_price;
        if (isset($_SESSION["products"])) {
            if (isset($_SESSION["products"][$product['IdArticulos']])) {
                $_SESSION["products"][$product['IdArticulos']]["product_qty"] = $_SESSION["products"][$product['IdArticulos']]["product_qty"] + $_POST["product_qty"];
            } else {
                $_SESSION["products"][$product['IdArticulos']] = $product;
            }
        } else {
            $_SESSION["products"][$product['IdArticulos']] = $product;
        }
    }
    $total_product = count($_SESSION["products"]);
    die(json_encode(array('products' => $total_product)));
}

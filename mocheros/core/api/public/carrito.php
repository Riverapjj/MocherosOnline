<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/articulos.php');

if (isset($_POST["product_code"])) {
    foreach ($_POST as $key => $value) {
        $product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
    }
    $statement = $conn->prepare("SELECT detallepedidos.IdEncabezado, encabezadopedidos.Fecha, usuarios.Nombre, usuarios.Apellido, articulos.NomArticulo, articulos.PrecioUnitario, detallepedidos.CantidadArticulo, detallepedidos.PrecioDetalle FROM detallepedidos INNER JOIN articulos ON articulos.IdArticulos = detallepedidos.IdArticulo INNER JOIN encabezadopedidos ON encabezadopedidos.IdEncabezado = detallepedidos.IdEncabezado INNER JOIN usuarios ON usuarios.IdUsuario = encabezadopedidos.IdUsuario");
    $statement->bind_param('s', $product['IdArticulos']);
    $statement->execute();
    $statement->bind_result($product_photo, $product_name, $product_price);
    while ($statement->fetch()) {
        $product["Foto"] = $product_photo;
        $product["NomArticulo"] = $product_name;
        $product["PrecioUnitario"] = $product_price;
        if (isset($_SESSION["products"])) {
            if (isset($_SESSION["products"][$product['IdArticulos']])) {
                $_SESSION["products"][$product['IdArticulos']]["NomArticulo"] = $_SESSION["products"][$product['IdArticulos']];
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
?>
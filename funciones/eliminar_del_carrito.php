<?php
include_once "./index.php";
if (!isset($_POST["id_producto"])) {
    exit("No hay id_producto");
}
quitarProductoDelCarrito($_POST["id_producto"]);
# Saber si redireccionamos a tienda o al carrito, esto es porque
# llamamos a este archivo desde la tienda y desde el carrito
if (isset($_POST["redireccionar_carrito"])) {
    header("Location: ../ecommerce.php#carrito");
} else {
    header("Location: ../ecommerce.php#carrito");
}

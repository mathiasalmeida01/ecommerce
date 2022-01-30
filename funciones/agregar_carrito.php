<?php
  require "index.php";
  if (!isset($_POST["id_producto"])) {
      exit("No hay id_producto");
  }
  agregarProductoAlCarrito($_POST["id_producto"]);
  header("Location: ../ecommerce.php#carrito");


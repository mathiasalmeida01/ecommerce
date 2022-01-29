<?php
require_once("./clases/Carrito.php");

$carrito = new Carrito();
?>

<section id="carrito" class="pt-4">
  <h2 class="text-center text-white pt-4">CARRITO DE COMPRAS</h2>
  <div class="container">
    <div class="row align-items-center">
      <table class="table text-light">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Producto</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Cantidad</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td><?php get_cantidad()?></td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>

    </div>
    </main>
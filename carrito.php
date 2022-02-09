<?php
ob_start();
?>
<?php
include_once "./funciones/index.php";
$productos = obtenerProductosEnCarrito();
if (count($productos) <= 0) {
?>
  <section id='carrito' class="container text-light">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
          Todavía no hay productos
        </h1>
        <h2 class="subtitle">
          Selecciona los productos para agregarlos a tu carrito
        </h2>
        <a href="ecommerce.php#productos" class="btn btn-warning d-block">Ver productos</a>
      </div>
    </div>
  </section>
<?php } else { ?>
  <section id='carrito' class="container text-light">
    <div class="column">
      <h2 class="is-size-2">Mi carrito de compras</h2>
      <table class="table table-dark">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Quitar</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $total = 0;
          foreach ($productos as $producto) {
            $total += $producto->precio;
          ?>
            <tr>
              <td><?php echo $producto->nombre ?></td>
              <td>$<?php echo number_format($producto->precio, 2) ?></td>
              <td>
                <form action="./funciones/eliminar_del_carrito.php" method="post">
                  <input type="hidden" name="id_producto" value="<?php echo $producto->id ?>">
                  <input type="hidden" name="redireccionar_carrito">
                  <button class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                  </button>
                </form>
              </td>
            <?php } ?>
            </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2" class="is-size-4 has-text-right"><strong>Total</strong></td>
            <td colspan="2" class="is-size-4">
              $<?php echo number_format($total, 2) ?>
            </td>
          </tr>
        </tfoot>
      </table>
      <form action="./ecommerce.php" method="post">
        <button type="submit" class="btn btn-success d-block w-100" name="comprar"><i class="fa fa-check"></i>&nbsp;Terminar compra</button>
      </form>
    </div>
  </section>
<?php } ?>
<?php
ob_end_flush();
?>
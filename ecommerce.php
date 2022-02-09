<?php include_once "menu.php" ?>
<?php
include_once("./clases/Productos.php");
include_once "./funciones/index.php";
$productos = new Productos();
$array_productos = $productos->get_productos();
if (isset($_REQUEST['comprar'])) {
  echo '<script>alert("Compra realizada exitosamente!")</script>';
}
?>
<section id="productos" class="pt-4">
  <h2 class="text-center text-white pt-4">LISTA DE PRODUCTOS</h2>
  <div class="container">
    <div class="row align-items-center">
      <?php
      foreach ($array_productos as $producto) { ?>
        <div class="col py-4">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="<?= $producto['imagen']; ?>" alt="<?= $producto['nombre']; ?>" />
            <div class="card-body">
              <h6 class="card-title"><?= $producto['nombre']; ?><?= $producto['nombre']; ?></h6>
              <p class="card-text">Precio: $ <?= $producto['precio']; ?></p>
              <?php if (productoYaEstaEnCarrito($producto['id'])) { ?>
                <form action="./funciones/eliminar_del_carrito.php" method="post">
                  <input type="hidden" name="id_producto" value="<?php echo $producto['id'] ?>">
                  <span class="btn btn-success">
                    <i class="fa fa-check"></i>&nbsp;En el carrito
                  </span>
                  <button class="btn btn-danger">
                    <i class="fas fa-trash"></i>&nbsp;Quitar
                    </button>
                </form>
              <?php } else { ?>
                <form action="./funciones/agregar_carrito.php" method="post">
                  <input type="hidden" name="id_producto" value="<?php echo $producto['id'] ?>">
                  <button class="btn btn-primary">
                    <i class="fa fa-cart-plus"></i>&nbsp;Agregar al carrito
                  </button>
                </form>
              <?php } ?>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>
<?php include_once "carrito.php" ?>

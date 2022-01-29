<!DOCTYPE html>
<html lang="en">

<head>
  <title>MAMCORP ECOMMERCE</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
</head>

<body class="bg-dark">
  <nav class="navbar navbar-expand sticky-top navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#inicio">MAMCORP</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#inicio">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#productos">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#carrito">Carrito</a>
          </li>
        </ul>
        <form class="d-flex">
          <a class="btn btn-success" href="login.php">Login</a>
        </form>
      </div>
    </div>
  </nav>
  <main>
    <section id="inicio">
      <img class="img-fluid" src="http://mamcorpgroup.com/imagenes/producto0.jpg" alt="" />
    </section>
    <br />
    <?php
    include_once("./productos.php");
    ?>
    <br />
    <?php
    include_once("./carrito.php");
    ?>

  </main>
</body>

</html>
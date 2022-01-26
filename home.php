<?php

    
    $con = mysqli_connect('localhost','root');
    mysqli_select_db($con,'ecommerce');
    $sql = "SELECT * FROM productos";
    $featured = $con->query($sql);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title> MAMCORP ECOMMERCE </title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <script src="https://ajax.com.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/login.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">MAMCORP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-2">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Products
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="product-laptops.php">Laptops</a></li>
          <li><hr class="dropdown-divider"> </li>
          <li><a class="dropdown-item" href="product-phones.php">Phones</a></li>
        </div>
      </li>
    </ul>
  </div>
</nav>
    
<div class="col-md-2"></div>

    <div class="col-md-8">
        <div class="row>"
            <h2 class="text-center">Lista de productos.</h2> <br> <br>
            <?php 
                while($product = mysqli_fetch_assoc($featured)):
            
            ?>
            <div class="col-md-5">

                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?= $product['image'];?>" alt="<?= $product['nombre']; ?>"/>
                <div class="card-body">
                <h5 class="card-title"><?= $product['nombre'];?><?= $product['nombre'];?></h5>
                <p class="card-text">Precio: $ <?= $product['precio'];?></p>
                <a href="details.php">
                    <button type="button" class="btn-success" data-toggle="modal" data-target="#details-1">Seleccionar</button>
                </a>
                
  </div>
</div>
                
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>
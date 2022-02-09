<?php
ob_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MAMCORP ECOMMERCE</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/login.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <b>MAMCORP</b>ECOMMERCE
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Logueate</p>
        <?php
        if (isset($_REQUEST['login'])) {
          $email = $_REQUEST['email'] ?? '';
          $pasword = $_REQUEST['pass'] ?? '';
          $pasword = md5($pasword);


          // require_once "./base-de-datos/abrir_conexion.php";
          // $query = "SELECT id,email,nombre,rol from usuarios where email='" . $email . "' and pass='" . $pasword . "';  ";
          // $res = mysqli_query($conexion, $query);
          // $row = mysqli_fetch_assoc($res);

          include_once("./clases/Usuarios.php");
          $usuario = new Usuarios();
          $row = $usuario->get_usuario($email, $pasword);


          if ($row) {
            if ($row[0]['rol'] == "administrador") {
              header("location: administracion.php ");
              exit;
            } else {
              header("location: ecommerce.php");
              exit;
            }
          } else {
        ?>
            <div class="alert alert-danger" role="alert">
              Error de usuario o contraseña incorretos
            </div>
        <?php
          }
        }
        ?>
        <form method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="pass">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block" name="login">Sign In</button>
            </div>
          </div>
        </form>

      </div>
    </div>
</body>

</html>
<?php
ob_end_flush();
?>
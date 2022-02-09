<html>

<head>
	<meta charset="UTF-8">
	<title>ADMINISTRACION</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body class="bg-dark">
	<div align="center" class="text-light pt-4">

		<center>
			<h1>ADMINISTRACION DE USUARIOS</h1>
		</center>


		<form method="POST" action="administracion.php">
			<div class="container">
				<div class="row align-items-start">
					<div class="col">
						<div class="mb-3">
							<label for="id" class="form-label">ID de usuario</label>
							<p><input type="text" name="id" size="90%" required></p>
						</div>
						<div class="mb-3">
							<label for="nombre" class="form-label">Nombre</label>
							<p><input type="text" name="nombre" size="90%"></p>
						</div>
						<div class="mb-3">
							<label for="pass" class="form-label">Contraseña</label>
							<p><input type="password" name="pass" size="90%"></p>
						</div>
						<div class="mb-3">
							<label for="correo" class="form-label">Correo</label>
							<p><input type="text" name="correo" size="90%"></p>
						</div>
					</div>
					<center>
						<input type="submit" value="Crear" name="btn_registrar" class="btn btn-primary">
						<input type="submit" value="Actualizar" name="btn_actualizar" class="btn btn-primary">
					</center>
				</div>
			</div>
		</form>

		<?php if (isset($_POST['btn_mostrar'])) { ?>
			<div class="container text-light pt-4">
				<table class="table table-dark"" border=" 1">
					<thead>
						<tr>
							<th> Id </th>
							<th> Nombre </th>
							<th> Correo </th>
							<th> Tipo </th>
						</tr>
					</thead>
					<tbody>
						<?php
						include_once("./clases/Usuarios.php");
						$usuario = new Usuarios();
						$query = $usuario->get_usuarios();

						foreach ($query as $row) { ?>
							<tr>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['nombre']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['rol']; ?></td>
							</tr>
					</tbody>
				<?php } ?>
			<?php } ?>



			<?php
			if (isset($_POST['btn_registrar'])) {

				$id = $_POST['id'];
				$nombre = $_POST['nombre'];
				$correo = $_POST['correo'];
				$pass = md5($_POST['pass']);

				if ($id == "") {
					echo "El campo ID es obligatorio";
				} else {
					include_once("./clases/Usuarios.php");
					$usuario = new Usuarios();
					$conexion = $usuario->get_conexion();
					mysqli_query($conexion, "INSERT INTO usuarios (id,email,pass,nombre,rol) values ('$id','$correo','$pass','$nombre','cliente')");
					echo "Usuario almacenado";
				}
			}

			if (isset($_POST['btn_actualizar'])) {

				$id = $_POST['id'];
				$nombre = $_POST['nombre'];
				$correo = $_POST['correo'];
				$pass = md5($_POST['pass']);

				if ($id == "") {
					echo "El campo es obligatorio";
				} else {
					$existe = 0;
					include_once("./clases/Usuarios.php");
					$usuario = new Usuarios();
					$conexion = $usuario->get_conexion();
					$resultados = mysqli_query($conexion, "SELECT * FROM usuarios WHERE id ='$id'");
					while ($consulta = mysqli_fetch_array($resultados)) {
						$existe++;
					}
					if ($existe == 0) {
						echo "Los datos para actualizar no constan en la base de datos";
					} else {
						//ACTUALIZAR 

						mysqli_query($conexion, "UPDATE usuarios Set email='$correo', pass='$pass', nombre='$nombre', rol='cliente' WHERE id ='$id'");

						echo "Registro actualizado";
					}
				}
			}

			$doc = "";
			if (isset($_POST['btn_eliminar'])) {
				$existe = 0;
				$doc = $_POST['doc'];
				if ($doc == "") {
					echo "Ingrese el ID del usuario para eliminarlo";
				} else {
					//------------------------------------------------
					//CONSULTAR

					include_once("./clases/Usuarios.php");
					$usuario = new Usuarios();
					$conexion = $usuario->get_conexion();

					$resultados = mysqli_query($conexion, "SELECT * FROM usuarios WHERE id ='$doc'");

					while ($consulta = mysqli_fetch_array($resultados)) {

						$existe++;
					}
					if ($existe == 0) {
						echo "El usuario que busca no existe";
					} else {
						//ELIMINAR
						$_DELETE_SQL = "DELETE FROM usuarios WHERE id = '$doc'";
						mysqli_query($conexion, $_DELETE_SQL);
						echo "Registro eliminado";
					}
				}
			}

			?>

				</table>
			</div>

			<div class="container text-light pt-4">
				<form method="POST" action="administracion.php">
					<div class="mb-3 text-center">
						<label for="doc" class="form-label">ID de usuario</label>
						<br />
						<input type="text" name="doc" size="90%">
					</div>
					<center>
						<input type="submit" value="Eliminar" name="btn_eliminar" class="btn btn-primary">
						<input type="submit" value="Mostrar todos" name="btn_mostrar" class="btn btn-primary">
					</center>
				</form>
			</div>

	</div>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>

</html>
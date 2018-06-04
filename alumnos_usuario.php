<?php
	require 'conexion.php';
	$sql = "SELECT tbl_alumno.Nombres, tbl_alumno.Apellido_paterno, tbl_alumno.Apellido_materno, tbl_usuario_alumno.IDAlumno, tbl_usuario_alumno.Clave, tbl_alumno.Email FROM tbl_alumno INNER JOIN tbl_usuario_alumno ON tbl_alumno.IDAlumno=tbl_usuario_alumno.IDAlumno";
	$resultado = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.css" rel="stylesheet">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>	
    <title>Alumno_Usuario</title>
</head>
<body>
    <div class="container">
		<div class="row">
			<h2 style="text-align:center">Formulario Alumnos_Usuario</h2>
		</div>
		<br>
		<div class="row table-responsive">
	    <!-- tabla de profesores -->
			<table class="display" id="mitabla">
				<thead>
					<tr>
						<th>NOMBRE</th>
						<th>APELLIDO_P</th>
						<th>APELLIDO_M</th>
						<th>USUARIO</th>
						<th>CLAVE</th>
						<th>EMAIL</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
					<tr>
						<td><?php echo $row['Nombres']; ?></td>
						<td><?php echo $row['Apellido_paterno']; ?></td>
						<td><?php echo $row['Apellido_materno']; ?></td>
						<td><?php echo $row['IDAlumno']; ?></td>
						<td><?php echo $row['Clave']; ?></td>
                        <td><?php echo $row['Email'];?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>	
</body>
</html>
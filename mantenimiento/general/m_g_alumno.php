<?php
	session_start(); //Inicia una nueva sesión o reanuda la existente
	require '../../conexion.php';
	//Evaluamos si existe la variable de sesión id_usuario, si no existe redirigimos al index
	if(!isset($_SESSION["id_usuario"])){
    	header("Location: ../../index.php");
	}
	$sql = "SELECT * FROM tbl_alumno";
	$resultado = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="universidad, peruana, investigación, investigacion, negocios, upein, UPEIN">
  	<meta name="description" content="UPEIN! - Universidad Peruana de Invesitgacion y Negocios da la bienvenida a sus nuevos estudiantes">
	<title>Intranet</title>
    <link href="../../img/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/bootstrap-theme.css" rel="stylesheet">
	<script src="../../js/jquery-3.3.1.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>	
	<link href="../../css/jquery.dataTables.min.css" rel="stylesheet">	
	<script src="../../js/jquery.dataTables.min.js"></script>

	<link rel="stylesheet" href="../../css/estilos.css">
	
	<link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ultra" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Black+Ops+One|Great+Vibes|Press+Start+2P|Shrikhand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Homemade+Apple" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Shrikhand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<script>
		$(document).ready(function(){
			$('#mitabla').DataTable({
				"order": [[1, "asc"]],
				"language":{
					"lengthMenu": "Mostrar _MENU_ registros por pagina",
					"info": "Mostrando pagina _PAGE_ de _PAGES_",
					"infoEmpty": "No hay registros disponibles",
					"infoFiltered": "(filtrada de _MAX_ registros)",
					"loadingRecords": "Cargando...",
					"processing":     "Procesando...",
					"search": "Buscar:",
					"zeroRecords":    "No se encontraron registros coincidentes",
					"paginate": {
						"next":       "Siguiente",
						"previous":   "Anterior"
					},					
				}
			});	
		});	
	</script>
</head>
<body>
	<div class="contenedor">
		<?php include "../../banneru.html";?>
		<div class="cuerpo" style="display:flex;">
			<div class="lado1"><?php include '../../nav.php'?></div>
			<div class="lado2">
				<div class="container">
					<div class="row" style="background:#FF6C60;border-radius:.8vw .8vw 0 0;">
							<h2 style="text-align:center;color:#ffff;">Formulario de Alumnos</h2>
					</div>
					<br>
					<div class="row">
						<a href="m_g_a_nuevo.php" class="btn btn-primary">Nuevo Registro</a>
					</div>
					<br>
					<div class="row table-responsive">
						<!-- tabla de profesores -->
						<table class="display" id="mitabla">
							<thead>
								<tr>
									<th>ID_Alumno</th>
									<th>Nombres</th>
									<th>Apellido_P</th>
									<th>Apellido_M</th>
									<th>Telefono</th>
									<th>Email</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
									<tr>
										<td><?php echo $row['IDAlumno']; ?></td>
										<td><?php echo $row['Nombres']; ?></td>
										<td><?php echo $row['Apellido_paterno']; ?></td>
										<td><?php echo $row['Apellido_materno']; ?></td>
										<td><?php echo $row['Telf_celular']; ?></td>
										<td><?php echo $row['Email']; ?></td>
										<td><a href="m_g_a_modificar.php?IDAlumno=<?php echo $row['IDAlumno']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>	
			</div>
		</div>
		<?php include "../../footer.html";?>
	</div>
</body>
</html>
<?php
    require '../../conexion.php';
    $ciclo=$_GET['ciclo'];
    $carrera=$_GET['carrera'];
    $sql = "SELECT * FROM tbl_cursos1 as c INNER JOIN tbl_curso_carrera1 as cc ON c.IDCursos=cc.IDCursos WHERE c.IDCiclo='$ciclo' AND cc.IDCarrera='$carrera'";
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
	<title>Intranet Alumnos</title>
    <link href="../../img/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/bootstrap-theme.css" rel="stylesheet">
	<script src="../../js/jquery-3.3.1.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>	
	<link href="../../css/jquery.dataTables.min.css" rel="stylesheet">	
	<script src="../../js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="../../css/estilos.css">
	<link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ultra" rel="stylesheet">
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
        <?php include '../../nav.php'?>
		<div class="container">
				<div class="row">
					<h2 style="text-align:center">MATRICULA CURSOS</h2>
				</div>
				<a href="p_m_consulta.php">regresar</a>
				<br>
				<div class="row table-responsive">
					<table class="display" id="mitabla">
						<thead>
							<tr>
								<th>IDCARRERA</th>
								<th>IDCICLO</th>
                                <th>DESCRIPCION</th>
                                <th>CREDITOS</th>
							</tr>
						</thead>
						<tbody>
							<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
								<tr>
									<td><?php echo $row['IDCarrera']; ?></td>
									<td><?php echo $row['IDCiclo']; ?></td>
									<td><?php echo $row['Descripcion']; ?></td>
                                    <td><?php echo $row['Creditos']; ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>	
		<footer>
			<div class="arriba"><a href="#header">arriba</a></div>
			<div class="p_footer">
				<p>UNIVERSIDAD PERUANA DE INVESTIGACIÓN Y NEGOCIOS</p>
				<p>Av. Salaverry 1810, Jesús María, Lima - Perú, Telf.:470 1687 / 265 5412 / 956 392 143</p>
			</div>
		</footer>
	</div>
</body>
</html>
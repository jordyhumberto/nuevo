<?php
    require '../../conexion.php';
	$id = $_GET['IDDocente'];
	$nombre=$_GET['Nombres'];
	$apellidos=$_GET['Apellidos'];
	$sql = "SELECT tbl_curso_docente1.IDDocente,tbl_curso_docente1.IDCursos,tbl_cursos1.Descripcion,tbl_curso_docente1.Estado FROM tbl_curso_docente1 INNER JOIN tbl_cursos1 ON tbl_curso_docente1.IDCursos=tbl_cursos1.IDCursos WHERE tbl_curso_docente1.IDDocente='$id'";
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
	<title>Intranet Cursos</title>
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
					<h2 style="text-align:center">Formulario de Curso-Docente</h2>
				</div>
				<div class="row">
					<h3 style="text-align:center"><?php echo $nombre.' '.$apellidos;?></h3>
				</div>
				<br>
				<div class="row table-responsive">
				<!-- tabla de profesores -->
				<table class="display" id="mitabla">
						<thead>
							<tr>
								<th>ID_Docente</th>
                                <th>ID_Cursos</th>
                                <th>Descripcion</th>
                                <th>Estado</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
								<tr>
									<td><?php echo $row['IDDocente']; ?></td>
                                    <td><?php echo $row['IDCursos']; ?></td>
                                    <td><?php echo $row['Descripcion']; ?></td>
                                    <td><?php echo $row['Estado']; ?></td>
									<td><a href="m_a_c_d_m_modificar.php?IDDocente=<?php echo $row['IDDocente']; ?>&IDCursos=<?php echo $row['IDCursos']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
                <div class="col-sm-offset-2 col-sm-10">
                    <a href="m_a_curso_docente.php" class="btn btn-default">Regresar</a>
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
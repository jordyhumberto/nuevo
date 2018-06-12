<?php
	require '../../conexion.php';
	$sql = "SELECT * FROM ((tbl_notas_alumno INNER JOIN tbl_curso_operativo ON tbl_notas_alumno.IDCO=tbl_curso_operativo.IDCO) INNER JOIN tbl_docente1 ON tbl_curso_operativo.IDDocente=tbl_docente1.IDDocente) WHERE ";
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
	<title>Intranet Consultas</title>
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
					<h2 style="text-align:center">CONSULTA TIPO DE PAGO</h2>
				</div>
				<br>
				<div class="row table-responsive">
					<table class="display" id="mitabla">
						<thead>
							<tr>
								<th>ID_MATRICULA</th>
                                <th>IDSE</th>
                                <th>IDCU</th>
								<th>IDDO</th>
                                <th>IDDO</th>
                                <th>IDCO</th>
                                <th>PPRACTICAS</th>
                                <th>EPARCIAL</th>
								<th>EFINAL</th>
								<th>ESUSTI</th>
								<th>PROMEDIO</th>
								<th>ESTADO</th>
                                <th></th>
							</tr>
						</thead>
						<tbody>
							<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
								<tr>
									<td><?php echo $row['IDMatricula']; ?></td>
                                    <td><?php echo $row['IDSemestre']; ?></td>
                                    <td><?php echo $row['IDCursos']; ?></td>
                                    <td><?php echo $row['IDDocente']; ?></td>
                                    <td><?php echo $row['Nombres']; ?></td>
									<td><?php echo $row['IDCO']; ?></td>
									<td><?php echo $row['PPracticas']; ?></td>
                                    <td><?php echo $row['ExamenParcial']; ?></td>
                                    <td><?php echo $row['ExamenFinal']; ?></td>
									<td><?php echo $row['ExamenSusti']; ?></td>
                                    <td><?php echo $row['Promedio']; ?></td>
									<td><?php echo $row['Estado']; ?></td>
									<td><a href=""><span class="glyphicon glyphicon-search"></span></a></td>
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
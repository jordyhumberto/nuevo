<?php
require '../../conexion.php';
$id=$_GET['IDAlumno'];
$sql = "SELECT tbl_matricula_carrera1.IDMatricula as matricula,
tbl_matricula_carrera1.IDAlumno,
tbl_compromiso_pago1.Nro_compromiso as compromiso,
tbl_compromiso_pago1.Pago as pagos,
tbl_compromiso_pago1.Estado as estado
FROM tbl_compromiso_pago1 INNER JOIN tbl_matricula_carrera1 ON tbl_compromiso_pago1.IDMatricula=tbl_matricula_carrera1.IDMatricula 
WHERE tbl_matricula_carrera1.IDAlumno='$id' ORDER BY tbl_matricula_carrera1.IDAlumno";
$resultado=$mysqli->query($sql);

$sql1="SELECT * FROM tbl_alumno1 WHERE IDAlumno='$id'";
$resultado1=$mysqli->query($sql1);
$fila=$resultado1->fetch_array(MYSQLI_ASSOC);
$nombre=$fila['Nombres'].' '.$fila['Apellido_paterno'].' '.$fila['Apellido_materno'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="universidad, peruana, investigación, investigacion, negocios, upein, UPEIN">
  	<meta name="description" content="UPEIN! - Universidad Peruana de Invesitgacion y Negocios da la bienvenida a sus nuevos estudiantes">
	<title>Intranet Aula</title>
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
					<h2 style="text-align:center">CONSULTA PAGOS-ALUMNOS</h2>
				</div>
                <div class="row">
					<h3 style="text-align:center"><?php echo $nombre;?></h3>
				</div>
                <div class="row">
					<h2 style="text-align:center;"><a href="prueba.php?consulta=<?php echo $sql;?>&nombre=<?php echo $nombre?>"><span class="glyphicon glyphicon-print"></span></a></h2>
				</div>
				<br>
				<div class="row table-responsive">
				<!-- tabla de profesores -->
				<table class="display" id="mitabla">
						<thead>
							<tr>
								<th>IDMATRICULA</th>
								<th>NROCOMPROMISO</th>
								<th>PAGO</th>
                                <th>ESTADO</th>
							</tr>
						</thead>
						<tbody>
							<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
								<tr>
									<td><?php echo $row['matricula']; ?></td>
									<td><?php echo $row['compromiso']?></td>
                                    <td><?php echo $row['pagos']?></td>
									<td><?php echo $row['estado']; ?></td>
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
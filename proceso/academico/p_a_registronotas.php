<?php
	session_start(); //Inicia una nueva sesión o reanuda la existente
	require '../../conexion.php'; //Agregamos el script de Conexión
	if(!isset($_SESSION["id_usuario"])){
		header("Location: ../../index.php");
    }
    
	$sql = "SELECT co.IDCO AS id, c.Descripcion AS curso, d.Apellidos AS profe, s.Descripcion AS semestre,s.Fecha_Inicio AS inicio,s.Fecha_Fin AS fin, a.Descripcion AS aula, co.Estado AS estado,ca.Descripcion AS carrera"; 
    $sql.=" FROM (((((tbl_curso_operativo AS co INNER JOIN tbl_cursos AS c ON co.IDCursos=c.IDCursos) INNER JOIN tbl_docente AS d ON co.IDDocente=d.IDDocente) INNER JOIN tbl_semestre AS s ON co.IDSemestre=s.IDSemestre) LEFT JOIN tbl_aula AS a ON co.IDAula=a.IDAula) INNER JOIN tbl_carrera AS ca ON c.IDCarrera=ca.IDCarrera)";
	$resultado = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
        <?php include '../../nav.php';?>
		<div class="container">
				<div class="row">
					<h2 style="text-align:center">REGISTRO NOTAS</h2>
				</div>
                <div class="row">
					<a href="p_a_co_nuevo.php" class="btn btn-primary">Nuevo Registro</a>
				</div>
				<br>
				<div class="row table-responsive">
					<table class="display" id="mitabla">
						<thead>
							<tr>
								<th>IDCO</th>
								<th>CARRERA</th>
								<th>CURSO</th>
                                <th>DOCENTE</th>
                                <th>SEMESTRE</th>
								<th>INICIO</th>
								<th>FIN</th>
                                <th>AULA</th>
								<th>ESTADO</th>
                                <th></th>
							</tr>
						</thead>
						<tbody>
							<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
								<tr>
									<td><?php echo $row['id'];?></td>
									<td><?php echo $row['carrera'];?></td>
									<td><?php echo $row['curso'];?></td>
									<td><?php echo $row['profe'];?></td>
                                    <td><?php echo $row['semestre'];?></td>
									<td><?php echo $row['inicio'];?></td>
									<td><?php echo $row['fin'];?></td>
                                    <td><?php echo $row['aula'];?></td>
                                    <td><?php echo $row['estado'];?></td>
									<td><a href="p_a_rn_alumno.php?IDCO=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-plus"></span></a></td>
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
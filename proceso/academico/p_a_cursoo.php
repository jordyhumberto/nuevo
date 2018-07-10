<?php
	session_start(); //Inicia una nueva sesión o reanuda la existente
	require '../../conexion.php'; //Agregamos el script de Conexión
	if(!isset($_SESSION["id_usuario"])){
		header("Location: ../../index.php");
	}
	$sql1="SELECT co.IDCO AS id,s.Fecha_Fin AS fin,co.Estado AS estado FROM tbl_curso_operativo AS co INNER JOIN tbl_semestre AS s ON co.IDSemestre=s.IDSemestre";
	$resultado1=$mysqli->query($sql1);
	$fechafin="";
	$fechahoy=date('Y-m-d');
	$fechahoy=substr($fechahoy,0,4).substr($fechahoy,5,2).substr($fechahoy,8,2);

	while($fila=$resultado1->fetch_array(MYSQLI_ASSOC)){
		$IDS=$fila['id'];
		$fechafin=$fila['fin'];
		$fechafin=substr($fechafin,0,4).substr($fechafin,5,2).substr($fechafin,8,2);
		/* echo $fechafin;echo '<br>'; */
		if($fechahoy>$fechafin){
			/* echo 'si se puede'; */
			$sql3="UPDATE tbl_curso_operativo SET Estado='00' WHERE IDCO='$IDS'";
			$resultado3=$mysqli->query($sql3);
		}
	}

	$sql = "SELECT co.IDCO AS id, c.Descripcion AS curso, d.Apellidos AS profe,c.IDCiclo as ciclo, s.Descripcion AS semestre,s.Fecha_Inicio AS inicio,s.Fecha_Fin AS fin, a.Descripcion AS aula, co.Estado AS estado,ca.Descripcion AS carrera"; 
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
	<link href="https://fonts.googleapis.com/css?family=Black+Ops+One|Great+Vibes|Press+Start+2P|Shrikhand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Homemade+Apple" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Shrikhand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
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
	<?php include "../../banneru.html";?>
		<div class="cuerpo" style="display:flex;">
			<div class="lado1"><?php include '../../nav.php'?></div>
			<div class="lado2">
			<div class="container">
			<div class="row" style="background:#FF6C60;border-radius:.8vw .8vw 0 0;">
					<h2 style="text-align:center;color:#ffff;">FORMULARIO CURSO OPERATIVO</h2>
				</div>
				<br>
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
								<th>CICLO</th>
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
									<td><?php echo $row['ciclo']; ?></td>
                                    <td><?php echo $row['semestre'];?></td>
									<td><?php echo $row['inicio'];?></td>
									<td><?php echo $row['fin'];?></td>
                                    <td><?php echo $row['aula'];?></td>
                                    <td><?php echo $row['estado'];?></td>
									<td><a href="#"><span class="glyphicon glyphicon-pencil"></span></a></td>
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
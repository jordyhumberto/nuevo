<?php
	session_start();
	require '../../conexion.php';
	if(!isset($_SESSION["id_usuario"])){
		header("Location: ../../index.php");
	}
	$id=$_GET['IDAlumno'];
	$carrera=$_GET['IDCarrera'];
	$ciclo=$_GET['IDCiclo'];
	$semestre=$_GET['IDSemestre'];
	$estado=$_GET['Estado'];

	$error="";
	if(!empty($_GET["error"])){
		$error=$_GET["error"];
	}
	$sql1="SELECT * FROM tbl_carrera WHERE IDCarrera='$carrera'";
	$resultado1=$mysqli->query($sql1);
	$fila=$resultado1->fetch_array(MYSQLI_ASSOC);
	$sql = "SELECT co.IDCO AS id, c.Descripcion AS curso,cc.Descripcion AS pre,c.Creditos as creditos, d.Apellidos AS profe, s.Descripcion AS semestre,s.Fecha_Inicio AS inicio,s.Fecha_Fin AS fin, a.Descripcion AS aula,c.IDCiclo AS ciclo, co.Estado AS estado"; 
	$sql.=" FROM (((((tbl_curso_operativo AS co INNER JOIN tbl_cursos AS c ON co.IDCursos=c.IDCursos) INNER JOIN tbl_docente AS d ON co.IDDocente=d.IDDocente) INNER JOIN tbl_semestre AS s ON co.IDSemestre=s.IDSemestre) LEFT JOIN tbl_aula AS a ON co.IDAula=a.IDAula)LEFT JOIN tbl_notas_alumno AS na ON co.IDCO=na.IDCO) LEFT JOIN tbl_cursos AS cc ON c.IDPrerequisito=cc.IDCursos";
	$sql.=" WHERE (c.IDCarrera='$carrera' AND c.IDCiclo='$ciclo' AND co.IDSemestre='$semestre' AND c.IDPrerequisito='') OR (c.IDCarrera='$carrera' AND na.IDAlumno=$id AND na.Estado='00') OR (c.IDCarrera='$carrera' AND c.IDCiclo='$ciclo' AND co.IDSemestre='$semestre' AND c.IDPrerequisito<>'')";	
	$resultado=$mysqli->query($sql);

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
	<title>INTRANET</title>
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
					<h2 style="text-align:center;color:#ffff;">MATRICULA CURSOS</h2>
				</div>
				<div class="row">
					<h3 style="text-align:center"><?php echo $fila['Descripcion'];?></h3>
				</div>
				<div class="row">
					<p style="text-align:center;color:#FE0000;"><?php echo $error;?></p>
				</div>
				<br>
				<form action="p_m_guardar.php?IDAlumno=<?php echo $id;?>&IDCarrera=<?php echo $carrera;?>&IDSemestre=<?php echo $semestre;?>&Estado=<?php echo $estado;?>" method="post">
					<input type="hidden" name="ciclo" value="<?php echo $ciclo;?>">
					<div class="row table-responsive">
						<table class="display" id="mitabla">
							<thead>
								<tr>
									<th>IDCO</th>
									<th>CURSO</th>
									<th>PREREQUISITO</th>
									<th>DOCENTE</th>
									<th>SEMESTRE</th>
									<th>CICLO</th>
									<th>INICIO</th>
									<th>FIN</th>
									<th>AULA</th>
									<th>CREDITOS</th>
									<th>ESTADO</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								
								<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>	
									<?php 
										$x=$row['id'];
										$s="SELECT * FROM tbl_curso_operativo";?>
									<?php if($x>$y){?>
										<tr>
											<td><?php echo $row['id'];?></td>
											<td><?php echo $row['curso'];?></td>
											<td><?php echo $row['pre'];?></td>
											<td><?php echo $row['profe'];?></td>
											<td><?php echo $row['semestre'];?></td>
											<td><?php echo $row['ciclo'];?></td>
											<td><?php echo $row['inicio'];?></td>
											<td><?php echo $row['fin'];?></td>
											<td><?php echo $row['aula'];?></td>
											<td><?php echo $row['creditos'];?></td>
											<td><?php echo $row['estado'];?></td>
											<td><input type="checkbox" name="check[]" value="<?php echo $row['id'];?>"></td>
										</tr>
									<?php } ?>
								<?php } ?>

							</tbody>
						</table>
					</div>
					<br>
					<a class="btn btn-default" href="p_m_ciclos.php?IDAlumno=<?php echo $id;?>&IDCarrera=<?php echo $carrera;?>&IDSemestre=<?php echo $semestre;?>&Estado=<?php echo $estado;?>">regresar</a>
					<input type="submit" class="btn btn-primary">
				</form>
			</div>	
	</div>
	</div>
	<?php include "../../footer.html";?>
	</div>
</body>
</html>
<?php
	session_start();
	require '../../conexion.php';
	if(!isset($_SESSION["id_usuario"])){
		header("Location: ../../index.php");
	}
	$id=$_GET['IDAlumno'];
	$sql="SELECT * FROM tbl_alumno1 WHERE IDAlumno='$id'";
	$sql1="SELECT * FROM tbl_carrera1";
	$sql2="SELECT * FROM tbl_semestre1";
	$resultado=$mysqli->query($sql);
	$fila=$resultado->fetch_array(MYSQLI_ASSOC);
	$nombre=$fila['Nombres'].' '.$fila['Apellido_paterno'].' '.$fila['Apellido_materno'];
	$resultado1=$mysqli->query($sql1);
	$resultado2=$mysqli->query($sql2);
?>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="keywords" content="universidad, peruana, investigación, investigacion, negocios, upein, UPEIN">
		<meta name="description" content="UPEIN! - Universidad Peruana de Invesitgacion y Negocios da la bienvenida a sus nuevos estudiantes">
		<title>Intranet Matricula</title>
		<link href="../../img/favicon.ico" rel="shortcut icon" type="image/x-icon">
		<link href="../../css/bootstrap.min.css" rel="stylesheet">
		<link href="../../css/bootstrap-theme.css" rel="stylesheet">
		<script src="../../js/jquery-3.3.1.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>	
		<link rel="stylesheet" href="../../css/estilos.css">
		<link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ultra" rel="stylesheet">
	</head>
	<body>
		<div class="contenedor">
			<?php include '../../nav.php';?>
			<div class="container">
				<div class="row">
					<h2 style="text-align:center">MATRICULA</h2>
				</div>
				<div class="row">
					<h3 style="text-align:center"><?php echo $nombre;?></h3>
				</div>
				<form class="form-horizontal" method="POST" action="#" autocomplete="off">
					<div class="form-group">
						<label for="año" class="col-sm-2 control-label"><?php echo date('Y');?></label>
					</div>
					<div class="form-group">
						<label for="semestre" class="col-sm-2 control-label">SEMESTRE</label>
						<div class="col-sm-10">
							<select class="form-control" id="semestre" name="semestre">
								<?php while($row = $resultado2->fetch_array(MYSQLI_ASSOC)) { ?>
									<option value="<?php echo $row['IDSemestre']; ?>"><?php echo $row['Descripcion']; ?></option>	
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="carrera" class="col-sm-2 control-label">CARRERA</label>
						<div class="col-sm-10">
							<select class="form-control" id="carrera" name="carrera">
								<?php while($row = $resultado1->fetch_array(MYSQLI_ASSOC)) { ?>
									<option value="<?php echo $row['IDCarrera']; ?>">
									<?php echo $row['Descripcion'].' / '.'PENSION: '.$row['Pension']; ?>
									</option>	
								<?php } ?>	
							</select>
						</div>
						
					</div>
					<div class="form-group">
						<label for="estado" class="col-sm-2 control-label">Estado</label>
						<div class="col-sm-10">
							<select class="form-control" id="estado" name="estado">
								<option value="01">ACTIVO</option>
								<option value="00">INACTIVO</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<a href="m_a_aula.php" class="btn btn-default">Regresar</a>
							<button type="submit" class="btn btn-primary">Guardar</button>
						</div>
					</div>
				</form>
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
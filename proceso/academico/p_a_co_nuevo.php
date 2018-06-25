<?php
    session_start(); //Inicia una nueva sesión o reanuda la existente
	require '../../conexion.php'; //Agregamos el script de Conexión
	if(!isset($_SESSION["id_usuario"])){
		header("Location: ../../index.php");
	}
	$sql1 = "SELECT * FROM tbl_cursos ORDER BY Descripcion";
    $resultado1 = $mysqli->query($sql1);
    $sql2 = "SELECT * FROM tbl_docente ORDER BY Apellidos";
    $resultado2 = $mysqli->query($sql2);
    $sql3= "SELECT * FROM tbl_semestre ORDER BY IDSemestre DESC";
    $resultado3=$mysqli->query($sql3);
    $sql4= "SELECT * FROM tbl_aula ORDER BY Descripcion";
    $resultado4=$mysqli->query($sql4);
?>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
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
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<h3 style="text-align:center">NUEVO REGISTRO</h3>
			</div>
			<form class="form-horizontal" method="POST" action="#" autocomplete="off">
				<div class="form-group">
					<label for="curso" class="col-sm-2 control-label">CURSO</label>
					<div class="col-sm-10">
						<select class="form-control" id="curso" name="curso">
							<?php while($row = $resultado1->fetch_array(MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $row['IDCursos']; ?>"><?php echo $row['Descripcion']; ?></option>	
							<?php } ?>
						</select>
					</div>
				</div>
                <div class="form-group">
					<label for="docente" class="col-sm-2 control-label">DOCENTE</label>
					<div class="col-sm-10">
						<select class="form-control" id="docente" name="docente">
							<?php while($row = $resultado2->fetch_array(MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $row['IDDocente']; ?>"><?php echo $row['Nombres'].' '.$row['Apellidos']; ?></option>	
							<?php } ?>
						</select>
					</div>
				</div>
                <div class="form-group">
					<label for="semestre" class="col-sm-2 control-label">SEMESTRE</label>
					<div class="col-sm-10">
						<select class="form-control" id="semestre" name="semestre">
							<?php while($row = $resultado3->fetch_array(MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $row['IDSemestre']; ?>"><?php echo $row['Descripcion']; ?></option>	
							<?php } ?>
						</select>
					</div>
				</div>
                <div class="form-group">
					<label for="aula" class="col-sm-2 control-label">AULA</label>
					<div class="col-sm-10">
						<select class="form-control" id="aula" name="aula">
                            <option value="">SIN ESPECIFICAR</option>
							<?php while($row = $resultado4->fetch_array(MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $row['IDAula']; ?>"><?php echo $row['Descripcion']; ?></option>	
							<?php } ?>
						</select>
					</div>
				</div>
                <div class="form-group">
					<label for="fechap" class="col-sm-2 control-label">EXAMEN PARCIAL</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="fechap" name="fechap">
					</div>
				</div>
                <div class="form-group">
					<label for="fechaf" class="col-sm-2 control-label">EXAMEN FINAL</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="fechaf" name="fechaf">
					</div>
				</div>
                <div class="form-group">
					<label for="fechas" class="col-sm-2 control-label">EXAMEN SUSTITUTORIO</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="fechas" name="fechas">
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
						<a href="p_a_cursoo.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
			
		</div>
	</body>
</html>
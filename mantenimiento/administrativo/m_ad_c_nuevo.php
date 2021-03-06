<?php
    session_start(); //Inicia una nueva sesión o reanuda la existente
	require '../../conexion.php'; //Agregamos el script de Conexión
	if(!isset($_SESSION["id_usuario"])){
		header("Location: ../../index.php");
	}
	$sql = "SELECT * FROM tbl_facultad ORDER BY IDFacultad";
	$resultado = $mysqli->query($sql);
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
			
			<form class="form-horizontal" method="POST" action="m_ad_c_guardar.php" autocomplete="off">
				
				<div class="form-group">
					<label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="descripcion" required>
					</div>
				</div>
                <div class="form-group">
					<label for="duracion" class="col-sm-2 control-label">Duracion</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="duracion" name="duracion" placeholder="Duracion" min="0" required>
					</div>
				</div>
                <div class="form-group">
					<label for="creditos" class="col-sm-2 control-label">Cantidad creditos</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="creditos" name="creditos" placeholder="creditos" min="0" required>
					</div>
				</div>
                <div class="form-group">
					<label for="pension" class="col-sm-2 control-label">Pension</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="pension" name="pension" placeholder="Pension" min="0" required>
					</div>
				</div>
                <div class="form-group">
					<label for="pensionn" class="col-sm-2 control-label">Nro de pensiones</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="pensionn" name="pensionn" placeholder="Nro de pensiones" min="0" required>
					</div>
				</div>
                <div class="form-group">
					<label for="matricula" class="col-sm-2 control-label">Matricula</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="matricula" name="matricula" placeholder="Costo matricula" min="0" required>
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
					<label for="facultad" class="col-sm-2 control-label">Facultad</label>
					<div class="col-sm-10">
						<select class="form-control" id="facultad" name="facultad">
							<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $row['IDFacultad']; ?>"><?php echo $row['Descripcion']; ?></option>	
							<?php } ?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="m_ad_carrera.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
			
		</div>
	</body>
</html>
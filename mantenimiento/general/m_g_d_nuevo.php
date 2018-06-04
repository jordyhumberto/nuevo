<?php
	require '../../conexion.php';
	$where = "";
	$sql7 = "SELECT * FROM tbl_semestre1 $where ORDER BY IDSemestre DESC";
	$resultado7 = $mysqli->query($sql7);
	
?>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="keywords" content="universidad, peruana, investigación, investigacion, negocios, upein, UPEIN">
		<meta name="description" content="UPEIN! - Universidad Peruana de Invesitgacion y Negocios da la bienvenida a sus nuevos estudiantes">
		<title>Intranet Detalle</title>
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
			
			<form class="form-horizontal" method="POST" action="m_g_d_guardar.php" autocomplete="off">

				<div class="form-group">
					<label for="id" class="col-sm-2 control-label">Semestre</label>
					<div class="col-sm-10">
						<select class="form-control" id="id" name="id">
							<?php while($row = $resultado7->fetch_array(MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $row['IDSemestre']; ?>"><?php echo $row['Descripcion']; ?></option>	
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="npago" class="col-sm-2 control-label">Nro de Pago</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="npago" name="npago" placeholder="Nro de pago" min="0">
					</div>
				</div>
                <div class="form-group">
					<label for="fpago" class="col-sm-2 control-label">Fecha de Pago</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="fpago" name="fpago" placeholder="Fecha de pago" required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="m_g_detalle.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
			
		</div>
	</body>
</html>
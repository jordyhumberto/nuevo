<?php
	require '../../conexion.php';
	$id = $_GET['IDPadmision'];
	$fecha = $_GET['Fecha_creacion'];
	$yyyy=substr($fecha,-4);
	$mm=substr($fecha,3,2);
	$dd=substr($fecha,0,2);
	$nfecha=$yyyy.'-'.$mm.'-'.$dd;
	$sql = "SELECT * FROM tbl_proceso_admision1 WHERE IDPadmision = '$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
?>
<html lang="es">
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="keywords" content="universidad, peruana, investigación, investigacion, negocios, upein, UPEIN">
        <meta name="description" content="UPEIN! - Universidad Peruana de Invesitgacion y Negocios da la bienvenida a sus nuevos estudiantes">
        <title>Intranet Admision</title>
        <link href="../../img/favicon.ico" rel="shortcut icon" type="image/x-icon">
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/bootstrap-theme.css" rel="stylesheet">
        <script src="../../js/jquery-3.3.1.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<h3 style="text-align:center">MODIFICAR REGISTRO</h3>
			</div>
			<form class="form-horizontal" method="POST" action="m_ad_p_update.php" autocomplete="off">
				<input type="hidden" id="id" name="id" value="<?php echo $row['IDPadmision']; ?>" />
                <div class="form-group">
					<label for="fecha" class="col-sm-2 control-label">Fecha creación</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="fecha" name="fecha" placeholder="fecha" 
                        value='<?php echo $nfecha;?>'
                        required>
					</div>
				</div>
				<div class="form-group">
					<label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="descripcion" 
                        value="<?php echo $row['Descripcion'];?>"
                        required>
					</div>
				</div>
				<div class="form-group">
					<label for="estado_civil" class="col-sm-2 control-label">Estado</label>
					<div class="col-sm-10">
						<select class="form-control" id="estado" name="estado">
							<option value="01" <?php if($row['Estado']=='01') echo 'selected'; ?>>ACTIVO</option>
							<option value="00" <?php if($row['Estado']=='00') echo 'selected'; ?>>INACTIVO</option>
						</select>
					</div>
				</div>
				<!--///////////////////////////////////////////////////////////////////////////////////-->
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="m_ad_proceso.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
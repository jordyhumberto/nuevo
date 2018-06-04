<?php
	require '../../conexion.php';
    $id = $_GET['IDCarrera'];
    $sql = "SELECT * FROM tbl_facultad1 ORDER BY IDFacultad";
    $resultado = $mysqli->query($sql);
    
	$sql1 = "SELECT * FROM tbl_carrera1 WHERE IDCarrera = '$id'";
	$resultado1 = $mysqli->query($sql1);
	$fila = $resultado1->fetch_array(MYSQLI_ASSOC);
?>
<html lang="es">
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="keywords" content="universidad, peruana, investigación, investigacion, negocios, upein, UPEIN">
        <meta name="description" content="UPEIN! - Universidad Peruana de Invesitgacion y Negocios da la bienvenida a sus nuevos estudiantes">
        <title>Intranet Carrera</title>
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
			<form class="form-horizontal" method="POST" action="m_ad_c_update.php" autocomplete="off">
				<input type="hidden" id="id" name="id" value="<?php echo $fila['IDCarrera']; ?>" />

                <div class="form-group">
					<label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="descripcion" 
                        value="<?php echo $fila['Descripcion'];?>"
                        required>
					</div>
				</div>
                <div class="form-group">
					<label for="duracion" class="col-sm-2 control-label">Duracion</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="duracion" name="duracion" placeholder="Duracion" min="0" 
                        value="<?php echo $fila['Duracion'];?>"
                        required>
					</div>
				</div>
                <div class="form-group">
					<label for="creditos" class="col-sm-2 control-label">Cantidad creditos</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="creditos" name="creditos" placeholder="creditos" min="0" 
                        value="<?php echo $fila['Cant_creditos'];?>"
                        required>
					</div>
				</div>
                <div class="form-group">
					<label for="pension" class="col-sm-2 control-label">Pension</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="pension" name="pension" placeholder="Pension" min="0" 
                        value="<?php echo $fila['Pension'];?>"
                        required>
					</div>
				</div>
                <div class="form-group">
					<label for="pensionn" class="col-sm-2 control-label">Nro de pensiones</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="pensionn" name="pensionn" placeholder="Nro de pensiones" min="0" 
                        value="<?php echo $fila['Nro_pensiones'];?>"
                        required>
					</div>
				</div>
                <div class="form-group">
					<label for="matricula" class="col-sm-2 control-label">Matricula</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="matricula" name="matricula" placeholder="Costo matricula" min="0" 
                        value="<?php echo $fila['Costo_matricula'];?>"
                        required>
					</div>
				</div>
				<div class="form-group">
					<label for="estado_civil" class="col-sm-2 control-label">Estado</label>
					<div class="col-sm-10">
						<select class="form-control" id="estado" name="estado">
							<option value="01" <?php if($fila['Estado']=='01') echo 'selected'; ?>>ACTIVO</option>
							<option value="00" <?php if($fila['Estado']=='00') echo 'selected'; ?>>INACTIVO</option>
						</select>
					</div>
				</div>
                <div class="form-group">
					<label for="facultad" class="col-sm-2 control-label">Facultad</label>
					<div class="col-sm-10">
						<select class="form-control" id="facultad" name="facultad">
							<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $row['IDFacultad']; ?>"
                                <?php if($fila['IDFacultad']==$row['IDFacultad']) echo 'selected';?>
                                ><?php echo $row['Descripcion']; ?></option>	
							<?php } ?>
						</select>
					</div>
				</div>
				<!--///////////////////////////////////////////////////////////////////////////////////-->
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
<?php
    require '../../conexion.php';
    $id = $_GET['IDcolegio'];
    $where = "";
    $sql = "SELECT * FROM tbl_colegio1 WHERE IDcolegio = '$id'";
	$resultado = $mysqli->query($sql);
    $fila = $resultado->fetch_array(MYSQLI_ASSOC);
	$sql7 = "SELECT * FROM distrito $where ORDER BY Cod_dis";
	$resultado7 = $mysqli->query($sql7);

?>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="keywords" content="universidad, peruana, investigación, investigacion, negocios, upein, UPEIN">
		<meta name="description" content="UPEIN! - Universidad Peruana de Invesitgacion y Negocios da la bienvenida a sus nuevos estudiantes">
		<title>Intranet Colegios</title>
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
			
			<form class="form-horizontal" method="POST" action="m_g_c_update.php" autocomplete="off">
                <input type="hidden" id="id" name="id" value="<?php echo $fila['IDcolegio']; ?>" />
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $fila['Nombre'];?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="direccion" class="col-sm-2 control-label">Dirección</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" 
                        value="<?php echo $fila['Direccion'];?>"
                        required>
					</div>
				</div>
				<div class="form-group">
					<label for="Distrito" class="col-sm-2 control-label">Distrito</label>
					<div class="col-sm-10">
						<select class="form-control" id="distrito" name="distrito">
							<?php while($row = $resultado7->fetch_array(MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $row['Cod_dis']; ?>"
                                <?php if($row['Cod_dis']==$fila['Cod_Dist'])echo 'selected';?>
                                ><?php echo $row['Nom_dis']; ?></option>	
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Telefono</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Telefono"
                        value="<?php echo $fila['Telefono'];?>"
                        >
					</div>
				</div>
				<div class="form-group">
					<label for="gestion" class="col-sm-2 control-label">Gestión</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="gestion" name="gestion" placeholder="Gestión" 
                        value="<?php echo $fila['Gestion'];?>"
                        required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="m_g_colegio.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
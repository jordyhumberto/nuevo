<?php
	header('Content-Type: text/html; charset=UTF-8');
	require '../../conexion.php';
	/*
		
		if(!empty($_POST))
		{
			$valor = $_POST['campo'];
			if(!empty($valor)){
				$where = "WHERE nombre LIKE '%$valor'";
			}
		}
	*/
	$where = "";
	$sql = "SELECT * FROM distrito $where ORDER BY Cod_dis";
	$resultado = $mysqli->query($sql);
?>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="keywords" content="universidad, peruana, investigación, investigacion, negocios, upein, UPEIN">
		<meta name="description" content="UPEIN! - Universidad Peruana de Invesitgacion y Negocios da la bienvenida a sus nuevos estudiantes">
		<title>Intranet Docentes</title>
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
			
			<form class="form-horizontal" method="POST" action="m_a_d_guardar.php" autocomplete="off">
				<div class="form-group">
					<label for="tipo" class="col-sm-2 control-label">Tipo de documento</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="tipo" name="tipo" placeholder="Tipo de documento" required>
					</div>
				</div>
				<div class="form-group">
					<label for="documento" class="col-sm-2 control-label"># de documento</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="documento" name="documento" placeholder="# de documento" required>
					</div>
				</div>
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
					</div>
				</div>
				<div class="form-group">
					<label for="Apellido" class="col-sm-2 control-label">Apellido</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" required>
					</div>
				</div>
				<div class="form-group">
					<label for="fecha" class="col-sm-2 control-label">Fecha de nacimiento</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="fecha" name="fecha" required>
					</div>
				</div>
				<div class="form-group">
					<label for="direccion" class="col-sm-2 control-label">Dirección</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="distrito" class="col-sm-2 control-label">Distrito</label>
					<div class="col-sm-10">
						<select class="form-control" id="distrito" name="distrito">
							<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $row['Cod_dis']; ?>"><?php echo $row['Nom_dis']; ?></option>	
							<?php } ?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Telefono</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
					</div>
				</div>
				<div class="form-group">
					<label for="celular" class="col-sm-2 control-label">Celular</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" id="celular" name="celular" placeholder="Celular">
					</div>
				</div>	
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
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
					<label for="categoria" class="col-sm-2 control-label">Categoría</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="categoria" name="categoria" placeholder="Categoría" required>
					</div>
				</div>
				<div class="form-group">
					<label for="regimen" class="col-sm-2 control-label">Régimen</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="regimen" name="regimen" placeholder="Régimen de dedicación" required>
					</div>
				</div>
				<div class="form-group">
					<label for="tiempo" class="col-sm-2 control-label">Tiempo de labores</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="tiempo" name="tiempo" min="0" placeholder="horas al mes" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="m_a_docente.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
			
		</div>
	</body>
</html>
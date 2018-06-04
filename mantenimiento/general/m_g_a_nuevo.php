<?php
	require '../../conexion.php';
	$where = "";
	$sql1 = "SELECT * FROM tbl_modalidad_ingreso1 $where ORDER BY IDMingreso";
	$resultado1 = $mysqli->query($sql1);
	$sql2 = "SELECT * FROM tbl_categoria $where ORDER BY IDCategoria";
	$resultado2 = $mysqli->query($sql2);
	$sql3 = "SELECT * FROM tbl_carrera $where ORDER BY IDCarrera";
	$resultado3 = $mysqli->query($sql3);
	$sql4 = "SELECT * FROM tbl_becas $where ORDER BY IDBeca";
	$resultado4 = $mysqli->query($sql4);
	$sql5 = "SELECT * FROM tbl_colegio $where ORDER BY IDcolegio";
	$resultado5 = $mysqli->query($sql5);
	$sql6 = "SELECT * FROM tbl_proceso_admision $where ORDER BY IDPadmision DESC";
	$resultado6 = $mysqli->query($sql6);
	$sql7 = "SELECT * FROM distrito $where ORDER BY Cod_dis";
	$resultado7 = $mysqli->query($sql7);
	$sql8 = "SELECT * FROM provincias $where ORDER BY Cod_Prov";
	$resultado8 = $mysqli->query($sql8);
	$sql9 = "SELECT * FROM departamentos $where ORDER BY Cod_Dep";
	$resultado9 = $mysqli->query($sql9);
	$sql10 = "SELECT * FROM provincias $where ORDER BY Cod_Prov";
	$resultado10 = $mysqli->query($sql10);
	$sql11 = "SELECT * FROM departamentos $where ORDER BY Cod_Dep";
	$resultado11 = $mysqli->query($sql11);
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
				<h3 style="text-align:center">NUEVO REGISTRO</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="m_g_a_guardar.php" autocomplete="off">
				<div class="form-group">
					<label for="Proceso" class="col-sm-2 control-label">Proceso de Admisión</label>
					<div class="col-sm-10">
						<select class="form-control" id="proceso" name="proceso">
							<?php while($row = $resultado6->fetch_array(MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $row['IDPadmision']; ?>"><?php echo $row['Descripcion']; ?></option>	
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="Carrera" class="col-sm-2 control-label">Carrera</label>
					<div class="col-sm-10">
						<select class="form-control" id="carrera" name="carrera">
							<?php while($row = $resultado3->fetch_array(MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $row['IDCarrera']; ?>"><?php echo $row['Descripcion']; ?></option>	
							<?php } ?>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
					</div>
				</div>
				<div class="form-group">
					<label for="Apellidop" class="col-sm-2 control-label">Apellido Paterno</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="apellidop" name="apellidop" placeholder="Apellido Paterno" required>
					</div>
                </div>
                <div class="form-group">
					<label for="Apellidom" class="col-sm-2 control-label">Apellido Materno</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="apellidom" name="apellidom" placeholder="Apellido Materno" required>
					</div>
				</div>
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
					<label for="direccion" class="col-sm-2 control-label">Dirección</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="Departamento" class="col-sm-2 control-label">Departamento</label>
					<div class="col-sm-10">
						<select class="form-control" id="departamento" name="departamento">
							<?php while($row = $resultado9->fetch_array(MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $row['Cod_Dep']; ?>"><?php echo $row['Nom_Dep']; ?></option>	
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="Provincia" class="col-sm-2 control-label">Provincia</label>
					<div class="col-sm-10">
						<select class="form-control" id="provincia" name="provincia">
							<?php while($row = $resultado8->fetch_array(MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $row['Cod_Prov']; ?>"><?php echo $row['Nom_Prov']; ?></option>	
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="Distrito" class="col-sm-2 control-label">Distrito</label>
					<div class="col-sm-10">
						<select class="form-control" id="distrito" name="distrito">
							<?php while($row = $resultado7->fetch_array(MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $row['Cod_dis']; ?>"><?php echo $row['Nom_dis']; ?></option>	
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="Sexo" class="col-sm-2 control-label">Sexo</label>
					<div class="col-sm-10">
						<select class="form-control" id="sexo" name="sexo">
							<option value="01">MALE</option>
							<option value="00">FEMALE</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="Estadoc" class="col-sm-2 control-label">Estado Civil</label>
					<div class="col-sm-10">
						<select class="form-control" id="estadoc" name="estadoc">
							<option value="00">SOLTERO</option>
							<option value="01">CASADO</option>
							<option value="02">VIUDO</option>
							<option value="03">DIVORSIADO</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="fecha" class="col-sm-2 control-label">Fecha de nacimiento</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="fecha" name="fecha" required>
					</div>
				</div>
				<div class="form-group">
					<label for="Departamenton" class="col-sm-2 control-label">Departamento Nacimiento</label>
					<div class="col-sm-10">
						<select class="form-control" id="departamenton" name="departamenton">
							<?php while($row = $resultado11->fetch_array(MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $row['Cod_Dep']; ?>"><?php echo $row['Nom_Dep']; ?></option>	
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="Provincian" class="col-sm-2 control-label">Provincia Nacimiento</label>
					<div class="col-sm-10">
						<select class="form-control" id="provincian" name="provincian">
							<?php while($row = $resultado10->fetch_array(MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $row['Cod_Prov']; ?>"><?php echo $row['Nom_Prov']; ?></option>	
							<?php } ?>
						</select>
					</div>
				</div>
				<!--aca///////////////////////////-->
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
					<label for="colegio" class="col-sm-2 control-label">Colegio</label>
					<div class="col-sm-10">
						<select class="form-control" id="colegio" name="colegio">
							<?php while($row = $resultado5->fetch_array(MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $row['IDcolegio']; ?>"><?php echo $row['Nombre']; ?></option>	
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="fechae" class="col-sm-2 control-label">Fecha de egreso</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="fechae" name="fechae" required>
					</div>
				</div>
				<div class="form-group">
					<label for="Pension" class="col-sm-2 control-label">Pensión Colegio</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="pension" name="pension" min="0" placeholder="Pension Colegio" required>
					</div>
				</div>
				<div class="form-group">
					<label for="mingreso" class="col-sm-2 control-label">Modalidad de Ingreso</label>
					<div class="col-sm-10">
						<select class="form-control" id="mingreso" name="mingreso">
							<?php while($row = $resultado1->fetch_array(MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $row['IDMingreso']; ?>"><?php echo $row['Descripcion']; ?></option>	
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="alergia" class="col-sm-2 control-label">Alergia</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="alergia" name="alergia" placeholder="Alergia" required>
					</div>
				</div>
				<div class="form-group">
					<label for="sangre" class="col-sm-2 control-label">Tipo de Sangre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="sangre" name="sangre" placeholder="Tipo de Sangre" required>
					</div>
				</div>
				<div class="form-group">
					<label for="discapacidad" class="col-sm-2 control-label">Discapacidad</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="discapacidad" name="discapacidad" placeholder="Discapacidad" required>
					</div>
				</div>
				<div class="form-group">
					<label for="comentario" class="col-sm-2 control-label">Comentario</label>
					<div class="col-sm-10">
						<textarea name="comentario" id="comentario" Style="width:100%;height:5vw;;resize:none;"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="nombret" class="col-sm-2 control-label">Nombre del Tutor</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombret" name="nombret" placeholder="Tutor" required>
					</div>
				</div>
				<div class="form-group">
					<label for="emailt" class="col-sm-2 control-label">Email del Tutor</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="emailt" name="emailt" placeholder="Email del tutor" required>
					</div>
                </div>
				<div class="form-group">
					<label for="direcciont" class="col-sm-2 control-label">Dirección del Tutor</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="direcciont" name="direcciont" placeholder="Direccion del tutor" required>
					</div>
				</div>
				<div class="form-group">
					<label for="telefonot" class="col-sm-2 control-label">Telefono del Tutor</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="telefonot" name="telefonot" placeholder="Telefono del tutor" required>
					</div>
				</div>
				<div class="form-group">
					<label for="Parentesco" class="col-sm-2 control-label">Nivel de Parentesco</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="parentesco" name="parentesco" placeholder="Parentesco" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="categoria" class="col-sm-2 control-label">Categoria</label>
					<div class="col-sm-10">
						<select class="form-control" id="categoria" name="categoria">
							<?php while($row = $resultado2->fetch_array(MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $row['IDCategoria']; ?>"><?php echo $row['Descripcion']; ?></option>	
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="Beca" class="col-sm-2 control-label">Beca</label>
					<div class="col-sm-10">
						<select class="form-control" id="beca" name="beca">
							<?php while($row = $resultado4->fetch_array(MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $row['IDBeca']; ?>"><?php echo $row['Descripcion']; ?></option>	
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="Estado" class="col-sm-2 control-label">Estado</label>
					<div class="col-sm-10">
						<select class="form-control" id="estado" name="estado">
								<option value="01">ACTIVO</option>
								<option value="00">INACTIVO</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="m_g_alumno.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
			
		</div>
	</body>
</html>
<?php
    session_start(); //Inicia una nueva sesión o reanuda la existente
	require '../../conexion.php'; //Agregamos el script de Conexión
	if(!isset($_SESSION["id_usuario"])){
		header("Location: ../../index.php");
	}
    $id = $_GET['IDSemestre'];
    $where = "";
    $sql = "SELECT * FROM tbl_semestre WHERE IDSemestre = '$id'";
	$resultado = $mysqli->query($sql);
    $fila = $resultado->fetch_array(MYSQLI_ASSOC);
?>
<html lang="es">
	<head>
		<meta charset="UTF-8">
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
            <h3 style="text-align:center">MODIFICAR REGISTRO</h3>
			</div>
			<form class="form-horizontal" method="POST" action="m_g_s_update.php" autocomplete="off">
                <input type="hidden" id="id" name="id" value="<?php echo $fila['IDSemestre']; ?>" />
				<div class="form-group">
					<label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" 
                        value="<?php echo $fila['Descripcion'];?>"
                        required>
					</div>
				</div>
				<div class="form-group">
					<label for="pagos" class="col-sm-2 control-label">Nro de Pagos</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="pagos" name="pagos" min="0" placeholder="Nro de pagos" 
                        value="<?php echo $fila['Nro_pagos'];?>"
                        required>
					</div>
				</div>
                <div class="form-group">
					<label for="fechai" class="col-sm-2 control-label">Fecha de Inicio</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="fechai" name="fechai" 
                        value="<?php echo $fila['Fecha_Inicio'];?>"
                        required>
					</div>
				</div>
                <div class="form-group">
					<label for="fechaf" class="col-sm-2 control-label">Fecha de Fin</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="fechaf" name="fechaf" 
                        value="<?php echo $fila['Fecha_Fin'];?>"
                        required>
					</div>
				</div>
                <div class="form-group">
					<label for="detalle" class="col-sm-2 control-label">Detalle</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="detalle" name="detalle" placeholder="Detalle" 
                        value="<?php echo $fila['Detalle'];?>"
                        required>
					</div>
				</div>
                <div class="form-group">
					<label for="notas" class="col-sm-2 control-label">Nro de Notas</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="notas" name="notas" min="0" placeholder="Nro de notas" 
                        value="<?php echo $fila['nro_notas'];?>"
                        required>
					</div>
				</div>
				<div class="form-group">
					<label for="Estado" class="col-sm-2 control-label">Estado</label>
					<div class="col-sm-10">
						<select class="form-control" id="estado" name="estado">
								<option value="01"
                                <?php if($fila['Estado']=='01')echo 'selected';?>
                                >ACTIVO</option>
								<option value="00"
                                <?php if($fila['Estado']=='00')echo 'selected';?>
                                >INACTIVO</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="m_g_semestre.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
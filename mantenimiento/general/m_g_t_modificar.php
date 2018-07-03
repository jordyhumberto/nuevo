<?php
    session_start(); //Inicia una nueva sesión o reanuda la existente
	require '../../conexion.php'; //Agregamos el script de Conexión
	if(!isset($_SESSION["id_usuario"])){
		header("Location: ../../index.php");
	}
    $id = $_GET['IDTipo'];
    $where = "";
    $sql = "SELECT * FROM tbl_tipo_pago WHERE IDTipo = '$id'";
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
			
			<form class="form-horizontal" method="POST" action="m_g_t_update.php" autocomplete="off">
                <input type="hidden" id="id" name="id" value="<?php echo $fila['IDTipo']; ?>" />
                <div class="form-group">
					<label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" 
                        value="<?php echo $fila['Descripcion'];?>"
                        required>
					</div>
				</div>
				<div class="form-group">
					<label for="Monto" class="col-sm-2 control-label">Monto</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="monto" name="monto" min="0" placeholder="Monto" 
                        value='<?php echo $fila['Monto'];?>'
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
					<label for="imp" class="col-sm-2 control-label">Estado</label>
					<div class="col-sm-10">
						<select class="form-control" id="imp" name="imp">
								<option value="01"
                                <?php if($fila['IMP']=='01')echo 'selected';?>
                                >SI</option>
								<option value="00"
                                <?php if($fila['IMP']=='00')echo 'selected';?>
                                >NO</option>
						</select>
					</div>
				</div>
	
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="m_g_tipo.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
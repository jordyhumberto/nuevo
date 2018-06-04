<?php
    require '../../conexion.php';
    $id = $_GET['IDAula'];
	$sql1 = "SELECT * FROM tbl_local ORDER BY IDLocal";
    $resultado1 = $mysqli->query($sql1);
    $sql2 = "SELECT * FROM tbl_tipo_aula1 ORDER BY IDTA";
    $resultado2 = $mysqli->query($sql2);
    
	$sql3 = "SELECT * FROM tbl_aula1 WHERE IDAula='$id'";
    $resultado3 = $mysqli->query($sql3);
    $fila = $resultado3->fetch_array(MYSQLI_ASSOC);
?>
<html lang="es">
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="keywords" content="universidad, peruana, investigación, investigacion, negocios, upein, UPEIN">
        <meta name="description" content="UPEIN! - Universidad Peruana de Invesitgacion y Negocios da la bienvenida a sus nuevos estudiantes">
        <title>Intranet Aula</title>
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
			
			<form class="form-horizontal" method="POST" action="m_a_a_update.php" autocomplete="off">
				<input type="hidden" id="id" name="id" value="<?php echo $row['IDAula']; ?>" />
                <div class="form-group">
					<label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="descripcion"
                        value="<?php echo $fila['Descripcion']?>"
                         required>
					</div>
				</div>
				<div class="form-group">
					<label for="local" class="col-sm-2 control-label">Local</label>
					<div class="col-sm-10">
						<select class="form-control" id="local" name="local">
							<?php while($row = $resultado1->fetch_array(MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $row['IDLocal']; ?>"
                                <?php if($row['IDLocal']==$fila['IDLocal']) echo 'selected';?>
                                ><?php echo $row['Descripcion']; ?></option>	
							<?php } ?>
						</select>
					</div>
				</div>
                <div class="form-group">
					<label for="aforo" class="col-sm-2 control-label">Aforo</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="aforo" name="aforo" placeholder="descripcion" 
                        value="<?php echo $fila['Aforo'];?>"
                        required>
					</div>
				</div>
                <!--hora-->
                <div class="form-group">
					<label for="horaa" class="col-sm-2 control-label">Hora Apertura</label>
					<div class="col-sm-10">
						<input type="time" class="form-control" id="horaa" name="horaa" 
                        value="<?php echo $fila['Hora_Apertura'];?>"
                        required>
					</div>
				</div>
                <div class="form-group">
					<label for="horac" class="col-sm-2 control-label">Hora Cierre</label>
					<div class="col-sm-10">
						<input type="time" class="form-control" id="horac" name="horac" 
                        value="<?php echo $fila['Hora_Cierre'];?>"
                        required>
					</div>
				</div>
                <div class="form-group">
					<label for="tipoa" class="col-sm-2 control-label">Tipo Aula</label>
					<div class="col-sm-10">
						<select class="form-control" id="tipoa" name="tipoa">
							<?php while($row = $resultado2->fetch_array(MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $row['IDTA']; ?>"
                                <?php if($row['IDTA']==$fila['IDTA'])echo 'selected';?>
                                ><?php echo $row['Descripcion']; ?></option>	
							<?php } ?>
						</select>
					</div>
				</div>	
				
				<div class="form-group">
					<label for="estado" class="col-sm-2 control-label">Estado</label>
					<div class="col-sm-10">
						<select class="form-control" id="estado" name="estado">
							<option value="01" <?php if($fila['Estado']=='01') echo 'selected'; ?>>ACTIVO</option>
							<option value="00" <?php if($fila['Estado']=='00') echo 'selected'; ?>>INACTIVO</option>
						</select>
					</div>
				</div>
				<!--///////////////////////////////////////////////////////////////////////////////////-->
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="m_a_aula.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
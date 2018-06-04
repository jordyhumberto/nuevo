<?php
	require '../../conexion.php';
	$id = $_GET['IDCursos'];
	$sql3 = "SELECT * FROM tbl_cursos1";
    $resultado3 = $mysqli->query($sql3);
    $sql4 = "SELECT * FROM tbl_carrera1";
    $resultado4 = $mysqli->query($sql4);
    
    $sql1 = "SELECT * FROM tbl_curso_carrera1  WHERE IDCursos = '$id'";
	$resultado = $mysqli->query($sql1);
	$fila = $resultado->fetch_array(MYSQLI_ASSOC);
	
?>
<html lang="es">
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="keywords" content="universidad, peruana, investigación, investigacion, negocios, upein, UPEIN">
        <meta name="description" content="UPEIN! - Universidad Peruana de Invesitgacion y Negocios da la bienvenida a sus nuevos estudiantes">
        <title>Intranet Cursos</title>
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
			
			<form class="form-horizontal" method="POST" action="m_a_cu_c_update.php" autocomplete="off">
				<input type="hidden" id="id" name="id" value="<?php echo $fila['IDCursos']; ?>" />

                <div class="form-group">
                    <label for="curso" class="col-sm-2 control-label">Curso</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="curso" name="curso">
                            <?php while($row = $resultado3->fetch_array(MYSQLI_ASSOC)) { ?>
                                <option value="<?php echo $row['IDCursos']; ?>"
                                <?php if($row['IDCursos']==$fila['IDCursos'])echo 'selected';?>
                                 ><?php echo $row['Descripcion']; ?></option>	
                             <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="carrera" class="col-sm-2 control-label">Carrera</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="carrera" name="carrera">
                            <?php while($row = $resultado4->fetch_array(MYSQLI_ASSOC)) { ?>
                                <option value="<?php echo $row['IDCarrera']; ?>"
                                <?php if($row['IDCarrera']==$fila['IDCarrera'])echo 'selected';?>
                                ><?php echo $row['Descripcion']; ?></option>	
                            <?php } ?>
                        </select>
                    </div>
                </div>

				<!--///////////////////////////////////////////////////////////////////////////////////-->
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="m_a_curso_car.php?IDCursos=<?php echo $fila['IDCursos'];?>" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
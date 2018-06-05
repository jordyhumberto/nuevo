<?php
    require '../../conexion.php';
    $id = $_GET['IDDocente'];
    $idd=$_GET['IDCursos'];
  
	$sql3 = "SELECT * FROM tbl_docente1";
    $resultado3 = $mysqli->query($sql3);
    $sql4 = "SELECT * FROM tbl_cursos1";
    $resultado4 = $mysqli->query($sql4);
    
	$sql = "SELECT * FROM tbl_curso_docente1 WHERE IDDocente='$id' AND IDCursos='$idd'";
    $resultado = $mysqli->query($sql);
    $fila = $resultado->fetch_array(MYSQLI_ASSOC);

    $sql2 = "SELECT * FROM tbl_docente1 WHERE IDDocente='$id'";
    $resultado2 = $mysqli->query($sql2);
    $row2 = $resultado2->fetch_array(MYSQLI_ASSOC);
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
			
			<form class="form-horizontal" method="POST" action="m_a_c_d_update.php" autocomplete="off">
				<input type="hidden" id="id" name="id" value="<?php echo $fila['IDDocente']; ?>" />
                <input type="hidden" id="idd" name="idd" value="<?php echo $fila['IDCursos']; ?>" />
                <div class="form-group">
                    <label for="docente" class="col-sm-2 control-label">Docente</label>
                    <div class="col-sm-10">
                    
                        <select class="form-control" id="docente" name="docente">
                            <?php while($row = $resultado3->fetch_array(MYSQLI_ASSOC)) { ?>
                                <option value="<?php echo $row['IDDocente']; ?>"
                                <?php if($row['IDDocente']==$fila['IDDocente'])echo 'selected';?>
                                 ><?php echo $row['Nombres'].' '.$row['Apellidos']; ?></option>	
                             <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="curso" class="col-sm-2 control-label">Curso</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="curso" name="curso">
                            <?php while($row = $resultado4->fetch_array(MYSQLI_ASSOC)) { ?>
                                <option value="<?php echo $row['IDCursos']; ?>"
                                <?php if($row['IDCursos']==$fila['IDCursos'])echo 'selected';?>
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
						<a href="m_a_c_d_modificar.php?IDDocente=<?php echo $row2['IDDocente'];?>&Nombres=<?php echo $row2['Nombres'];?>&Apellidos=<?php echo $row2['Apellidos'];?>" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
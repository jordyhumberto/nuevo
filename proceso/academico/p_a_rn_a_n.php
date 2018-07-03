<?php
    session_start(); //Inicia una nueva sesión o reanuda la existente
    require '../../conexion.php'; //Agregamos el script de Conexión
    if(!isset($_SESSION["id_usuario"])){
        header("Location: ../../index.php");
    }
    $idma=$_GET['IDMA'];
    $idco=$_GET['IDCO'];
    $sql="SELECT * FROM tbl_notas_alumno WHERE IDMatricula='$idma' AND IDCO='$idco'";
    $resultado=$mysqli->query($sql);
    $row=$resultado->fetch_array(MYSQLI_ASSOC);
?>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
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
				<h3 style="text-align:center">NOTAS</h3>
			</div>
			<form class="form-horizontal" method="POST" action="p_a_rn_a_n_guardar.php" autocomplete="off">
                <input type="hidden" id="idma" name="idma" value="<?php echo $row['IDMatricula']; ?>" />
                <input type="hidden" id="idco" name="idco" value="<?php echo $row['IDCO']; ?>" />

                <div class="form-group">
					<label for="nota1" class="col-sm-2 control-label">nota1</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="nota1" name="nota1" placeholder="PROMEDIO PRACTICAS"
                        value="<?php echo $row['PPracticas']?>">
					</div>
				</div>
                <div class="form-group">
					<label for="nota2" class="col-sm-2 control-label">nota2</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="nota2" name="nota2" placeholder="EXAMEN PARCIAL"
                        value="<?php echo $row['ExamenParcial'];?>">
					</div>
				</div>
                <div class="form-group">
					<label for="nota3" class="col-sm-2 control-label">nota3</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="nota3" name="nota3" placeholder="EXAMEN FINAL"
                        value="<?php echo $row['ExamenFinal'];?>">
					</div>
				</div>
                <div class="form-group">
					<label for="nota4" class="col-sm-2 control-label">nota4</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="nota4" name="nota4" placeholder="EXAMEN SUSTITUTORIO"
                        value="<?php echo $row['ExamenSusti']?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="p_a_rn_alumno.php?IDCO=<?php echo $idco;?>" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
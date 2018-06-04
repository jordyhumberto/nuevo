<?php
	require '../../conexion.php';
	$id=$_POST['id'];
    $descripcion=$_POST['descripcion'];
    $duracion=$_POST['duracion'];
    $creditos=$_POST['creditos'];
    $pension=$_POST['pension'];
    $pensionn=$_POST['pensionn'];
    $matricula=$_POST['matricula'];
    $estado=$_POST['estado']; 
    $facultad=$_POST['facultad'];

	$sql = "UPDATE tbl_carrera1 SET 
    Descripcion='$descripcion',
    Duracion='$duracion',
    Cant_creditos='$creditos',
    Pension='$pension',
    Nro_pensiones='$pensionn',
    Costo_matricula='$matricula',
    Estado='$estado',
    IDFacultad='$facultad'
    WHERE IDCarrera = '$id'";
	$resultado = $mysqli->query($sql);
	
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
				<div class="row" style="text-align:center">
					<?php if($resultado) { ?>
						<h3>REGISTRO MODIFICADO</h3>
						<?php } else { ?>
						<h3>ERROR AL MODIFICAR</h3>
					<?php } ?>
					
					<a href="m_ad_carrera.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
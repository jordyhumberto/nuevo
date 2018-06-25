<?php
	session_start(); //Inicia una nueva sesión o reanuda la existente
	require '../../conexion.php'; //Agregamos el script de Conexión
	if(!isset($_SESSION["id_usuario"])){
		header("Location: ../../index.php");
	}
	$id=$_POST['id'];
    $descripcion=$_POST['descripcion'];
    $local=$_POST['local'];
    $aforo=$_POST['aforo'];
    $horaa=$_POST['horaa'];
    $horac=$_POST['horac'];
    $tipoa=$_POST['tipoa'];
    $estado=$_POST['estado'];
	$sql = "UPDATE tbl_aula SET 
    Descripcion='$descripcion',
    IDLocal='$local',
    Aforo='$aforo',
    Hora_Apertura='$horaa',
    Hora_Cierre='$horac',
    IDTA='$tipoa',
    Estado='$estado'
    WHERE IDAula = '$id'";
	$resultado = $mysqli->query($sql);
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
				<div class="row" style="text-align:center">
					<?php if($resultado) { ?>
						<h3>REGISTRO MODIFICADO</h3>
						<?php } else { ?>
						<h3>ERROR AL MODIFICAR</h3>
					<?php } ?>	
					<a href="m_a_aula.php" class="btn btn-primary">Regresar</a>
				</div>
			</div>
		</div>
	</body>
</html>
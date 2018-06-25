<?php
	session_start(); //Inicia una nueva sesión o reanuda la existente
	require '../../conexion.php';
	//Evaluamos si existe la variable de sesión id_usuario, si no existe redirigimos al index
	if(!isset($_SESSION["id_usuario"])){
    	header("Location: ../../index.php");
	}
    $id=$_POST['id'];
    $fecha=$_POST['fecha'];
    /*
    $dd=substr($fecha,-2);
    $mm=substr($fecha,-5,2);
    $yyyy=substr($fecha,0,4);
    $nfecha=$dd.'/'.$mm.'/'.$yyyy;
    */
    $descripcion=$_POST['descripcion'];
    $estado=$_POST['estado'];
	$sql = "UPDATE tbl_proceso_admision SET 
    Fecha_creacion='$fecha',
    Descripcion='$descripcion',
    Estado='$estado'
    WHERE IDPadmision = '$id'";
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
					
					<a href="m_ad_proceso.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
<?php
	session_start(); //Inicia una nueva sesión o reanuda la existente
	require '../../conexion.php'; //Agregamos el script de Conexión
	if(!isset($_SESSION["id_usuario"])){
		header("Location: ../../index.php");
	}
    $id=$_POST['id'];
    $descripcion=$_POST['descripcion'];
    $pagos=$_POST['pagos'];
    $estado=$_POST['estado'];
    $fechai=$_POST['fechai'];
    $fechaf=$_POST['fechaf'];
    $detalle=$_POST['detalle'];
    $notas=$_POST['notas'];
	
	$sql = "UPDATE tbl_semestre SET 
    Descripcion='$descripcion',
    Nro_pagos='$pagos',
    Estado='$estado',
    Fecha_Inicio ='$fechai',
    Fecha_Fin ='$fechaf',
    Detalle='$detalle',
    nro_notas='$notas' WHERE 
    IDSemestre = '$id' ";
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
					<a href="m_g_semestre.php" class="btn btn-primary">Regresar</a>
				</div>
			</div>
		</div>
	</body>
</html>
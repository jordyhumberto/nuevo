<?php
	require '../../conexion.php';
    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $direccion=$_POST['direccion'];
    $distrito=$_POST['distrito'];
    $telefono=$_POST['telefono'];
    $gestion=$_POST['gestion'];
	
	$sql = "UPDATE tbl_colegio1 SET 
    Nombre='$nombre',
    Direccion='$direccion',
    Cod_Dist='$distrito',
    Telefono ='$telefono',
    Gestion='$gestion' WHERE 
    IDcolegio = '$id' ";
	$resultado = $mysqli->query($sql);
	
?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="keywords" content="universidad, peruana, investigación, investigacion, negocios, upein, UPEIN">
        <meta name="description" content="UPEIN! - Universidad Peruana de Invesitgacion y Negocios da la bienvenida a sus nuevos estudiantes">
        <title>Intranet Colegios</title>
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
					
					<a href="m_g_colegio.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
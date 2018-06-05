<?php
    require '../../conexion.php';
?>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="keywords" content="universidad, peruana, investigación, investigacion, negocios, upein, UPEIN">
		<meta name="description" content="UPEIN! - Universidad Peruana de Invesitgacion y Negocios da la bienvenida a sus nuevos estudiantes">
		<title>Intranet Matricula</title>
		<link href="../../img/favicon.ico" rel="shortcut icon" type="image/x-icon">
		<link href="../../css/bootstrap.min.css" rel="stylesheet">
		<link href="../../css/bootstrap-theme.css" rel="stylesheet">
		<script src="../../js/jquery-3.3.1.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>	
		<link rel="stylesheet" href="../../css/estilos.css">
		<link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ultra" rel="stylesheet">
	</head>
	
	<body>
		<div class="contenedor">
			<?php include '../../nav.php';?>
			<div class="container">
				<div class="row">
					<h2 style="text-align:center">MATRICULA</h2>
				</div>
				<div class="row">
					<h3 style="text-align:center">NUEVO REGISTRO</h3>
				</div>
				
				<form class="form-horizontal" method="POST" action="" autocomplete="off">
					
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-primary">Guardar</button>
						</div>
					</div>
				</form>
				
			</div>
			<footer>
				<div class="arriba"><a href="#header">arriba</a></div>
				<div class="p_footer">
					<p>UNIVERSIDAD PERUANA DE INVESTIGACIÓN Y NEGOCIOS</p>
					<p>Av. Salaverry 1810, Jesús María, Lima - Perú, Telf.:470 1687 / 265 5412 / 956 392 143</p>
				</div>
			</footer>
		</div>
	</body>
</html>
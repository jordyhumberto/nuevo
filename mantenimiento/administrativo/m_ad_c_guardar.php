<?php
    require '../../conexion.php';
    //Método con str_shuffle() 
    function generarId($length = 3) { 
        return substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
    }
    $id=generarId();
    $sql = "SELECT IDCarrera FROM tbl_carrera1";
	$resultado = $mysqli->query($sql);
    while($row = $resultado->fetch_array(MYSQLI_ASSOC)) {
        if($id==$row['IDCarrera']){
            $id=generarId();
            $sql = "SELECT IDCarrera FROM tbl_carrera1";
	        $resultado = $mysqli->query($sql);
            $row = $resultado->fetch_array(MYSQLI_ASSOC);
        }
    }
    
    $descripcion=$_POST['descripcion'];
    $duracion=$_POST['duracion'];
    $creditos=$_POST['creditos'];
    $pension=$_POST['pension'];
    $pensionn=$_POST['pensionn'];
    $matricula=$_POST['matricula'];
    $estado=$_POST['estado']; 
    $facultad=$_POST['facultad'];

	$sql1 = "INSERT INTO tbl_carrera1(IDCarrera,Descripcion,Duracion,Cant_creditos,Pension,Nro_pensiones,Costo_matricula,Estado,IDFacultad) VALUES ('$id','$descripcion','$duracion','$creditos','$pension','$pensionn','$matricula','$estado','$facultad')";
	$resultado1 = $mysqli->query($sql1);
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
                    <?php 
                    
                        if($resultado1) { 
						    echo '<h3>REGISTRO GUARDADO</h3>';
						} else { 
						    echo '<h3>ERROR AL GUARDAR</h3>';
                        }  
                      
                    ?>
					<a href="m_ad_carrera.php" class="btn btn-primary">Regresar</a>
				</div>
			</div>
		</div>
	</body>
</html>
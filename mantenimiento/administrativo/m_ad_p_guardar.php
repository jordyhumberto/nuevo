<?php
    require '../../conexion.php';
    $id=$_POST['id'];
    $n='';
    $sql1='SELECT IDPadmision FROM tbl_proceso_admision1';
    $resultado=$mysqli->query($sql1);
    if($id==date('Y')){
        $id=$id.'33';
        while($row=$resultado->fetch_array(MYSQLI_ASSOC)){
            if($id==$row['IDPadmision']){
                $id++;
            }
        }
    }
    $fecha=$_POST['fecha'];
    /*
    $dd=substr($fecha,-2);
    $mm=substr($fecha,-5,2);
    $yyyy=substr($fecha,0,4);
    $nfecha=$dd.'/'.$mm.'/'.$yyyy;
    */
    
    $descripcion=$_POST['descripcion'];
    $estado=$_POST['estado']; 
	$sql = "INSERT INTO tbl_proceso_admision1(IDPadmision,Fecha_creacion,Descripcion,Estado) VALUES ('$id','$fecha','$descripcion','$estado')";
	$resultado = $mysqli->query($sql);
?>
<html lang="es">
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="keywords" content="universidad, peruana, investigación, investigacion, negocios, upein, UPEIN">
		<meta name="description" content="UPEIN! - Universidad Peruana de Invesitgacion y Negocios da la bienvenida a sus nuevos estudiantes">
		<title>Intranet Admision</title>
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
                        if($resultado) { 
						    echo '<h3>REGISTRO GUARDADO</h3>';
						} else { 
						    echo '<h3>ERROR AL GUARDAR</h3>';
                        } 
                    ?>
					<a href="m_ad_proceso.php" class="btn btn-primary">Regresar</a>
				</div>
			</div>
		</div>
	</body>
</html>
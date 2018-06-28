<?php
    session_start(); //Inicia una nueva sesión o reanuda la existente
	require '../../conexion.php'; //Agregamos el script de Conexión
	if(!isset($_SESSION["id_usuario"])){
		header("Location: ../../index.php");
    }
    $sql1="SELECT IDCO FROM tbl_curso_operativo";
    $resultado1=$mysqli->query($sql1);
    $x='000';
    $id=date('Y').$x;
    while($row=$resultado1->fetch_array(MYSQLI_ASSOC)){
        if ($id==$row['IDCO']) {
            $x=intval($x)+1;
            if ($x<10) {
                $x='00'.$x;
            }else if($x<100 && $x>=10){
                $x='0'.$x;
            }
            $id=date('Y').$x;
        }
    }
    $curso=$_POST['curso'];
    $docente=$_POST['docente'];
    $semestre=$_POST['semestre'];
    $aula=$_POST['aula'];
    $fechap=$_POST['fechap'];
    $fechaf=$_POST['fechaf'];
    $fechas=$_POST['fechas'];
    $estado=$_POST['estado'];
	$sql = "INSERT INTO tbl_curso_operativo(IDCO,IDCursos,IDDocente,IDSemestre,IDAula,F_exParcial,F_exFinal,F_exSusti,Estado) VALUES ('$id','$curso','$docente','$semestre','$aula','$fechap','$fechaf','$fechas','$estado')";
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
                    <?php 
                        if($resultado) { 
						    echo '<h3>REGISTRO GUARDADO</h3>';
						} else { 
						    echo '<h3>ERROR AL GUARDAR</h3>';
                        } 
                    ?>
					<a href="p_a_cursoo.php" class="btn btn-primary">Regresar</a>
				</div>
			</div>
		</div>
	</body>
</html>
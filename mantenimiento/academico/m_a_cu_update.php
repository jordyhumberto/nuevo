<?php
	session_start(); //Inicia una nueva sesión o reanuda la existente
	require '../../conexion.php';
	//Evaluamos si existe la variable de sesión id_usuario, si no existe redirigimos al index
	if(!isset($_SESSION["id_usuario"])){
    	header("Location: ../../index.php");
	}
    $año=$_POST['año'];
    $semestre=$_POST['semestre'];
    $id=$_POST['id'];
    $carrera=$_POST['carrera'];
    $tipoc=$_POST['tipoc'];
    $ciclo=$_POST['ciclo'];
    $descripcion=$_POST['descripcion'];
    $creditos=$_POST['creditos'];
    $creditosr=$_POST['creditosr'];
    $tipoa=$_POST['tipoa'];
    $horast=$_POST['horast'];
    $horasp=$_POST['horasp'];
    $estado=$_POST['estado'];
    $tipo=$_POST['tipo'];
    $pre=$_POST['pre'];
    $plan=$_POST['plan'];

	$sql = "UPDATE tbl_cursos SET
    Año='$año',
    Semestre='$semestre',
    IDCursos='$id', 
    IDCarrera='$carrera',
    Tipo_Curso='$tipoc',
    IDCiclo='$ciclo',
    Descripcion='$descripcion',
    Creditos='$creditos',
    Rcreditos='$creditosr',
    IDTA='$tipoa',
    HorasTeoricas='$horast',
    HorasPractica='$horasp',
    Estado='$estado',
    Tipo='$tipo',
    IDPrerequisito='$pre',
    Plan_estudio='$plan'
    WHERE IDCursos = '$id'";
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
					<a href="m_a_curso.php" class="btn btn-primary">Regresar</a>
				</div>
			</div>
		</div>
	</body>
</html>
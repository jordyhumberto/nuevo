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
    /* if($ciclo<10){
        $cad='0'.$ciclo;
    }else{
        $cad=$ciclo;
    }
     */
 
    /* $cadd=$carrera.$tipoc.$cad;
    $num='01';
    $co='';
    $id=$cadd.$num;

    $sql1 = "SELECT IDCursos FROM tbl_cursos1";
    $resultado1 = $mysqli->query($sql1);

	
	while($row = $resultado1->fetch_array(MYSQLI_ASSOC)) { 
        if($id==$row['IDCursos']){

            $co= intval($co)+1;
            
            if ($co<10){
                $co='0'.$co;
            }
            
            $id=$cadd.$co;
            $resultado1 = $mysqli->query($sql1);
        }
    } */ 
    $sql ="INSERT INTO tbl_cursos(Año,Semestre,IDCursos,Descripcion,IDCarrera,Tipo_Curso,IDCiclo,IDPrerequisito,Creditos,Rcreditos,HorasTeoricas,HorasPractica,Tipo,IDTA,Plan_estudio,Estado)";
    $sql.=" VALUES('$año','$semestre','$id','$descripcion','$carrera','$tipoc','$ciclo','$pre','$creditos','$creditosr','$horast','$horasp','$tipo','$tipoa','$plan','$estado')";
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
					<a href="m_a_curso.php" class="btn btn-primary">Regresar</a>
				</div>
			</div>
		</div>
	</body>
</html>
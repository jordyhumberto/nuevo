<?php
    require '../../conexion.php';
    $año=date('Y');
    $mes=date('n');
    if ($mes>=1 && $mes<=6){
        $proceso='01';
    }else if($mes>=7 && $mes<=12){
        $proceso='02';
    }
    $cad=$año.$proceso;
    $num='0000';
    $id=$cad.$num;
    $sql = "SELECT IDAlumno FROM tbl_alumno";
    $resultado = $mysqli->query($sql);
    
    while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { 
        if($id==$row['IDAlumno']){
            $id=intval($id)+1;
            $sql = "SELECT IDAlumno FROM tbl_alumno";
	        $resultado = $mysqli->query($sql);
            $row = $resultado->fetch_array(MYSQLI_ASSOC);
        }
    }
    #$id=date("YmdGis");//Ymd
    //echo $id;
    $proceso=$_POST['proceso'];
    $carrera=$_POST['carrera'];
    $nombre = $_POST['nombre'];
    $apellidop=$_POST['apellidop'];
    $apellidom=$_POST['apellidom'];
    $tipo=$_POST['tipo'];
    $documento=$_POST['documento'];
    $direccion=$_POST['direccion'];
    $departamento=$_POST['departamento'];
    $provincia=$_POST['provincia'];
    $distrito=$_POST['distrito'];
    $sexo=$_POST['sexo'];
    $estadoc=$_POST['estadoc'];
    $fecha=$_POST['fecha'];
    $departamenton=$_POST['departamenton'];
    $provincian=$_POST['provincian'];
    $telefono = $_POST['telefono'];
    $celular=$_POST['celular'];
    $email = $_POST['email'];
    $colegio=$_POST['colegio'];
    $fechae=$_POST['fechae'];
    $pension=$_POST['pension'];
    $mingreso=$_POST['mingreso'];
    $alergia=$_POST['alergia'];
    $sangre=$_POST['sangre'];
    $discapacidad=$_POST['discapacidad'];
    $comentario=$_POST['comentario'];
    $nombret=$_POST['nombret'];
    $emailt=$_POST['emailt'];
    $direcciont=$_POST['direcciont'];
    $telefonot=$_POST['telefonot'];
    $parentesco=$_POST['parentesco'];
    $estado=$_POST['estado'];
	$sql1 = "INSERT INTO tbl_alumno (IDAlumno, IDPadmision, IDCarrera, Nombres, Apellido_paterno, Apellido_materno, Tipo_doc, N_documento, Direccion, Cod_Dep, Cod_Prov, Cod_Dist, Sexo, Estado_civil, Fecha_nac, Cod_Depn, Cod_Provn, Telf_fijo, Telf_celular, Email, IDcolegio, Fecha_egreso, Pension_c, IDMingreso, Alergia, T_sangre, Discapacidad, Comentarios, Nombre_tutor, Email_tutor, Direc_tutor, fono_tutor, Parentesco, Estado) VALUES ('$id', '$proceso', '$carrera', '$nombre', '$apellidop', '$apellidom', '$tipo', '$documento', '$direccion', '$departamento', '$provincia', '$distrito', '$sexo', '$estadoc', '$fecha', '$departamenton', '$provincian', '$telefono', '$celular', '$email', '$colegio', '$fechae', '$pension', '$mingreso', '$alergia', '$sangre', '$discapacidad', '$comentario', '$nombret', '$emailt', '$direcciont', '$telefonot', '$parentesco', '$estado')";
    $resultado1 = $mysqli->query($sql1);
?>
<html lang="es">
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="keywords" content="universidad, peruana, investigación, investigacion, negocios, upein, UPEIN">
		<meta name="description" content="UPEIN! - Universidad Peruana de Invesitgacion y Negocios da la bienvenida a sus nuevos estudiantes">
		<title>Intranet Alumnos</title>
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
					<a href="m_g_alumno.php" class="btn btn-primary">Regresar</a>
				</div>
			</div>
		</div>
	</body>
</html>
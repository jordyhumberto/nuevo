<?php
	session_start(); //Inicia una nueva sesión o reanuda la existente
	require '../../conexion.php';
	//Evaluamos si existe la variable de sesión id_usuario, si no existe redirigimos al index
	if(!isset($_SESSION["id_usuario"])){
    	header("Location: ../../index.php");
	}
    $id=$_POST['id'];
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
    
	
	$sql = "UPDATE tbl_alumno SET 
    IDPadmision='$proceso',
    IDCarrera='$carrera',
    Nombres='$nombre',
    Apellido_paterno='$apellidop',
    Apellido_materno='$apellidom',
    Tipo_doc='$tipo',
    N_documento='$documento',
    Direccion='$direccion',
    Cod_dep ='$departamento',
    Cod_prov='$provincia',
    Cod_dist='$distrito',
    Sexo='$sexo',
    Estado_civil='$estadoc',
    Fecha_nac='$fecha',
    Cod_depn='$departamenton',
    Cod_provn='$provincian',
    Telf_fijo='$telefono',
    Telf_celular='$celular',
    Email='$email',
    IDColegio='$colegio', 
    Fecha_egreso='$fechae',
    Pension_c='$pension', 
    IDMingreso='$mingreso', 
    Alergia='$alergia', 
    T_sangre='$sangre', 
    Discapacidad='$discapacidad',
    Comentarios='$comentario', 
    Nombre_tutor='$nombret', 
    Email_tutor='$emailt', 
    Direc_tutor='$direcciont',
    fono_tutor='$telefonot', 
    Parentesco='$parentesco', 
    Estado='$estado' WHERE 
    IDAlumno = '$id' ";
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
					<a href="m_g_alumno.php" class="btn btn-primary">Regresar</a>	
				</div>
			</div>
		</div>
	</body>
</html>
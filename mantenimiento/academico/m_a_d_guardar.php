<?php
	session_start(); //Inicia una nueva sesión o reanuda la existente
	require '../../conexion.php'; //Agregamos el script de Conexión
	//Evaluamos si existe la variable de sesión id_usuario, si no existe redirigimos al index
	if(!isset($_SESSION["id_usuario"])){
		header("Location: ../../index.php");
	}
	$cad='OCAD';
	$año=date('Y');
	$num='00';
	$id=$cad.$año.$num;
	$sql1 = "SELECT IDDocente FROM tbl_docente";
    $resultado1 = $mysqli->query($sql1);
	while($row = $resultado1->fetch_array(MYSQLI_ASSOC)) { 
        if($id==$row['IDDocente']){
			$con= intval(substr($id,-2))+1;
			if($con<10){
				$num='0'.$con;
			}else{
				$num=$con;
			}
			$id=$cad.$año.$num;
	        $resultado1 = $mysqli->query($sql1);
        }
	}
	$tipo=$_POST['tipo'];
    $documento=$_POST['documento'];
    $nombre = $_POST['nombre'];
    $apellido=$_POST['apellido'];
    $fecha=$_POST['fecha'];
    $direccion=$_POST['direccion'];
    $distrito=$_POST['distrito'];
    $telefono = $_POST['telefono'];
    $celular=$_POST['celular'];
    $email = $_POST['email'];
    $categoria=$_POST['categoria'];
    $regimen=$_POST['regimen'];
	$tiempo=$_POST['tiempo'];
	$estado=$_POST['estado'];
	$sql = "INSERT INTO tbl_docente(IDDocente,Tipo_doc,N_documento,Nombres,Apellidos,Fecha_nac,Direccion,Cod_Dist,Telf_fijo,Telf_celular,Email,Categoria,Regi_dedicacion,Tiem_labores,Estado) VALUES ('$id','$tipo','$documento','$nombre','$apellido','$fecha','$direccion','$distrito','$telefono','$celular','$email','$categoria','$regimen','$tiempo','$estado')";
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
					<a href="m_a_docente.php" class="btn btn-primary">Regresar</a>
				</div>
			</div>
		</div>
	</body>
</html>
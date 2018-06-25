<?php
	session_start();
	require '../../conexion.php';
	if(!isset($_SESSION["id_usuario"])){
		header("Location: ../../index.php");
	}
	$id=$_GET['IDAlumno'];
	$sql="SELECT * FROM tbl_alumno WHERE IDAlumno='$id'";
	$sql1="SELECT * FROM tbl_carrera";
	$sql2="SELECT * FROM tbl_semestre ORDER BY IDSemestre DESC";
	$sql3="SELECT * FROM tbl_tipo_matricula";
	$sql4="SELECT * FROM tbl_ciclos";
	$sql5="SELECT * FROM tbl_cursos";
	$resultado=$mysqli->query($sql);
	$fila=$resultado->fetch_array(MYSQLI_ASSOC);
	$nombre=$fila['Nombres'].' '.$fila['Apellido_paterno'].' '.$fila['Apellido_materno'];
	$resultado1=$mysqli->query($sql1);
	$resultado2=$mysqli->query($sql2);
	$resultado3=$mysqli->query($sql3);
	$resultado4=$mysqli->query($sql4);
	/*calcular la matricula*/
	$idm="";
	$ida="";
	$idc="";
	$ids="";
	$idt="";
	$ide="";
	$idca="";
	$creditos="";
	$pension="";
	$local="";
	$fechai="";
	if(!empty($_POST)){
		$ida=$id;
		$idc=$_POST['carrera'];
		$ids=$_POST['semestre'];
		$idt=$_POST['tipo'];
		$ide=$_POST['estado'];
		$idca=$_POST['ciclo'];
		$s="SELECT * FROM tbl_carrera WHERE IDCarrera='$idc'";
		$c=$mysqli->query($s);
		$r=$c->fetch_array(MYSQLI_ASSOC);
		$ss="SELECT * FROM tbl_semestre WHERE IDSemestre='$ids'";
		$cc=$mysqli->query($ss);
		$rr=$cc->fetch_array(MYSQLI_ASSOC);
		$fechai=$rr['Fecha_Inicio'];
		$pos=strpos($fechai,'/');
		if($pos!==false){
			$fechai=substr($fechai,-4).'-'.substr($fechai,-7,2).'-'.substr($fechai,0,2);
		}
		$idm=date('Y').substr($idc,0,2);
		$local=date("Y-m-d H:i:s");
	}
?>
<html lang="es">
	<head>
	
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
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
					<h3 style="text-align:center"><?php echo $nombre;?></h3>
				</div>
				<form class="form-horizontal" method="POST" action="<?php $_SERVER['PHP_SELF'];?>" autocomplete="off">
					<div class="form-group">
						<label for="año" class="col-sm-2 control-label"><?php echo date('Y');?></label>
					</div>
					<div class="form-group">
						<label for="semestre" class="col-sm-2 control-label">SEMESTRE</label>
						<div class="col-sm-10">
							<select class="form-control" id="semestre" name="semestre">
								<?php while($row = $resultado2->fetch_array(MYSQLI_ASSOC)) { ?>
									<option value="<?php echo $row['IDSemestre']; ?>"><?php echo $row['Descripcion']; ?></option>	
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="carrera" class="col-sm-2 control-label">CARRERA</label>
						<div class="col-sm-10">
							<select class="form-control" id="carrera" name="carrera">
								<?php while($row = $resultado1->fetch_array(MYSQLI_ASSOC)) { ?>
									<option value="<?php echo $row['IDCarrera']; ?>">
									<?php echo $row['Descripcion'].' / '.'PENSION: '.$row['Pension']; ?>
									</option>	
								<?php } ?>	
							</select>
						</div>	
					</div>
					<div class="form-group">
						<label for="tipo" class="col-sm-2 control-label">MATRICULA</label>
						<div class="col-sm-10">
							<select class="form-control" id="tipo" name="tipo">
								<?php while($row = $resultado3->fetch_array(MYSQLI_ASSOC)) { ?>
									<option value="<?php echo $row['IDTipoM']; ?>">
									<?php echo $row['Descripcion']; ?>
									</option>	
								<?php } ?>	
							</select>
						</div>	
					</div>
					<div class="form-group">
						<label for="ciclo" class="col-sm-2 control-label">CICLO</label>
						<div class="col-sm-10">
							<select class="form-control" id="ciclo" name="ciclo">
								<?php while($row = $resultado4->fetch_array(MYSQLI_ASSOC)) { ?>
									<option value="<?php echo $row['IDCiclo']; ?>">
									<?php echo $row['Descripcion']; ?>
									</option>	
								<?php } ?>	
							</select>
						</div>	
					</div>
					<div class="form-group">
						<label for="estado" class="col-sm-2 control-label">Estado</label>
						<div class="col-sm-10">
							<select class="form-control" id="estado" name="estado">
								<option value="01">ACTIVO</option>
								<option value="00">INACTIVO</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<a href="p_m_matricula.php" class="btn btn-default">Regresar</a>
							<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
						</div>
					</div>
				</form>
				<div class="row">
				<h2 style="text-align:center"><a href="p_m_cursos.php?id=<?php echo $id;?>&ciclo=<?php echo $idca?>&carrera=<?php echo $idc?>&semestre=<?php echo $ids;?>"><span class="glyphicon glyphicon-book"></span></a></h2>
				</div>
			</div>
			<div class="matricula">
				<label for=""><?php echo $idm;?></label><br>
				<label for=""><?php echo $ida;?></label><br>
				<label for=""><?php echo $idc;?></label><br>
				<label for=""><?php echo $ids;?></label><br>
				<label for=""><?php echo $idt;?></label><br>
				<label for=""><?php echo $ide;?></label><br>
				<label for=""><?php echo $idca;?></label><br>
				<label for=""><?php echo $creditos;?></label><br>
				<label for=""><?php echo $pension;?></label><br>
				<label for=""><?php echo $local;?></label><br>
				<label for=""><?php echo $fechai;?></label>
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
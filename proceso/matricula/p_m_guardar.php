<?php
session_start(); //Inicia una nueva sesión o reanuda la existente
require '../../conexion.php'; //Agregamos el script de Conexión
if(!isset($_SESSION["id_usuario"])){
    header("Location: ../../index.php");
}

$error="";
$alerta="";//agregar una alerta sobre los creditos
$IDA=$_GET['IDAlumno'];
$IDC=$_GET['IDCarrera'];
$IDCC=$_POST['ciclo'];
$semestre=$_GET['IDSemestre'];
$estado=$_GET['Estado'];

if(!isset($_POST['check'])){
	$error="NO PRESIONÓ NINGÚN CHECKBOX";
	header("Location: p_m_cursos.php?IDAlumno=$IDA&IDCarrera=$IDC&IDCiclo=$IDCC&error=$error&IDSemestre=$semestre&Estado=$estado");
	return;
}
$id=$_POST['check'];
$N=count($id);
 
$suma=0;
for($i=0; $i < $N; $i++)
{
    $sql="SELECT * FROM tbl_curso_operativo as co INNER JOIN tbl_cursos as c ON co.IDCursos=c.IDCursos WHERE co.IDCO='$id[$i]'";
    $resultado=$mysqli->query($sql);
    $row=$resultado->fetch_array(MYSQLI_ASSOC);
    $credito=$row['Creditos'];
    $suma=$suma+$credito;
}
/* echo $suma; */
if($suma>26){
    $error="*DEBE TENER COMO MÁXIMO 26 CRÉDITOS";
	header("Location: p_m_cursos.php?IDAlumno=$IDA&IDCarrera=$IDC&IDCiclo=$IDCC&error=$error&IDSemestre=$semestre&Estado=$estado");
	return;
}else if($suma<20){
    $alerta="*ESTAS MATRICULANDO MENOS DE 20 CURSOS";
}
$sql1="SELECT * FROM tbl_semestre WHERE Estado='01'";
$resultado1=$mysqli->query($sql1);
$row1=$resultado1->fetch_array(MYSQLI_ASSOC);
$IDS=$row1['IDSemestre'];
$inicio=$row1['Fecha_Inicio'];
$fechahoy=date('Y-m-d');

$numerom="0000";
$carreram=substr($IDC,0,2);
$IDM=date('Y').$carreram.$numerom;
$sql3="SELECT * FROM tbl_matricula";
$resultado3=$mysqli->query($sql3);
while($fila3=$resultado3->fetch_array(MYSQLI_ASSOC)){
	if ($fila3['IDMatricula']==$IDM) {
		$numerom=$numerom+1;
		if($numerom<10){
			$numerom='000'.$numerom;
		}else if($numerom>=10 && $numerom<100){
			$numerom='00'.$numerom;
		}else if($numerom>=100 && $numerom<1000){
			$numerom='0'.$numerom;
		}
		$IDM=date('Y').$carreram.$numerom;
	}
}
$sql4="SELECT * FROM tbl_carrera WHERE IDCarrera='$IDC'";
$resultado4=$mysqli->query($sql4);
$fila4=$resultado4->fetch_array(MYSQLI_ASSOC);
$pensionn=$fila4['Pension'];//la pension normal de la carrera sin descuentos

$matricula=200;//matricula estandar
$pension=0;
if($suma<12){
	$pension=($suma*100)/5;
}else if($suma<=19 && $suma>=12){
	$pension=$pensionn;
}else if($suma==20){
	$pension=$pensionn;
}else if($suma<=24 && $suma>=21){
	$pension=$pensionn+($suma-20)*(100/5);
}
/* if(){
	;
} */
$sql2="INSERT INTO tbl_matricula(IDMatricula,IDSemestre,IDAlumno,Fecha_registro,Matricula,Pension,Cant_creditos,Estado) VALUES ('$IDM','$IDS','$IDA','$fechahoy','$matricula','$pension','$suma','01')";
$resultado2=$mysqli->query($sql2);

$fecham = strtotime ( '-7 day' , strtotime ( $inicio ) ) ;
$fecham = date ( 'Y-m-d' , $fecham );
$pago1=substr($inicio,0,4).'-'.substr($inicio,5,2).'-'.'10';
$pago2=strtotime ( '+1 month' , strtotime ( $pago1 ) ) ;
$pago2 = date ( 'Y-m-d' , $pago2 );
$pago3=strtotime ( '+1 month' , strtotime ( $pago2 ) ) ;
$pago3 = date ( 'Y-m-d' , $pago3 );
$pago4=strtotime ( '+1 month' , strtotime ( $pago3 ) ) ;
$pago4 = date ( 'Y-m-d' , $pago4 );
$pago5=strtotime ( '+1 month' , strtotime ( $pago4 ) ) ;
$pago5 = date ( 'Y-m-d' , $pago5 );
/* echo $fecham;echo $pago1;echo $pago2;echo $pago3;echo $pago4;echo $pago5;
 */

 //los compromisos de pago ya estan
$sqlm="INSERT INTO tbl_compromiso_pago(IDMatricula,Nro_compromiso,Pago_F,Descuento,Pago,Fecha,Estado) VALUES ('$IDM',0,'$matricula',0,'$matricula','$fecham','01')";
$resultadom=$mysqli->query($sqlm);
$sqlp1="INSERT INTO tbl_compromiso_pago(IDMatricula,Nro_compromiso,Pago_F,Descuento,Pago,Fecha,Estado) VALUES ('$IDM',1,'$pension',0,'$pension','$pago1','01')";
$resultadop1=$mysqli->query($sqlp1);
$sqlp2="INSERT INTO tbl_compromiso_pago(IDMatricula,Nro_compromiso,Pago_F,Descuento,Pago,Fecha,Estado) VALUES ('$IDM',2,'$pension',0,'$pension','$pago2','01')";
$resultadop2=$mysqli->query($sqlp2);
$sqlp3="INSERT INTO tbl_compromiso_pago(IDMatricula,Nro_compromiso,Pago_F,Descuento,Pago,Fecha,Estado) VALUES ('$IDM',3,'$pension',0,'$pension','$pago3','01')";
$resultadop3=$mysqli->query($sqlp3);
$sqlp4="INSERT INTO tbl_compromiso_pago(IDMatricula,Nro_compromiso,Pago_F,Descuento,Pago,Fecha,Estado) VALUES ('$IDM',4,'$pension',0,'$pension','$pago4','01')";
$resultadop4=$mysqli->query($sqlp4);
$sqlp5="INSERT INTO tbl_compromiso_pago(IDMatricula,Nro_compromiso,Pago_F,Descuento,Pago,Fecha,Estado) VALUES ('$IDM',5,'$pension',0,'$pension','$pago5','01')";
$resultadop5=$mysqli->query($sqlp5);
//los cursos operativos con alumnos y con notas
foreach ($id as $s) {
	$sql5="INSERT INTO tbl_notas_alumno(IDMatricula,IDAlumno,IDCO) VALUES ('$IDM','$IDA','$s')";
	$resultado5=$mysqli->query($sql5);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="universidad, peruana, investigación, investigacion, negocios, upein, UPEIN">
  	<meta name="description" content="UPEIN! - Universidad Peruana de Invesitgacion y Negocios da la bienvenida a sus nuevos estudiantes">
	<title>INTRANET</title>
    <link href="../../img/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/bootstrap-theme.css" rel="stylesheet">
	<script src="../../js/jquery-3.3.1.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>	
	<link href="../../css/jquery.dataTables.min.css" rel="stylesheet">	
	<script src="../../js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="../../css/estilos.css">
	<link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ultra" rel="stylesheet">
	<script>
		$(document).ready(function(){
			$('#mitabla').DataTable({
				"order": [[1, "asc"]],
				"language":{
					"lengthMenu": "Mostrar _MENU_ registros por pagina",
					"info": "Mostrando pagina _PAGE_ de _PAGES_",
					"infoEmpty": "No hay registros disponibles",
					"infoFiltered": "(filtrada de _MAX_ registros)",
					"loadingRecords": "Cargando...",
					"processing":     "Procesando...",
					"search": "Buscar:",
					"zeroRecords":    "No se encontraron registros coincidentes",
					"paginate": {
						"next":       "Siguiente",
						"previous":   "Anterior"
					},					
				}
			});	
		});	
	</script>
</head>
<body>
    <div class="contenedor">
        <div class="container">
            <div class="row">
				<h2 style="text-align:center">MATRICULA CURSOS</h2>
            </div>
            <div class="row">
				<h3 style="text-align:center;color:#FE0000;"><?php echo $alerta;?></h3>
            </div>
            <div class="row">
                <a class="btn btn-default" href="p_m_cursos.php?IDAlumno=<?php echo $IDA;?>&IDCarrera=<?php echo $IDC;?>&error=<?php echo $error;?>">CURSOS</a>			
			</div>
			
			<div class="row">
				<div class="row" style="text-align:center">
                    <?php 
                    
                    if($resultado2 && $resultadop1 && $resultadop2 && $resultadop3 && $resultadop4 && $resultadop5) { 
						    echo '<h3>REGISTRO GUARDADO</h3>';
						} else { 
						    echo '<h3>ERROR AL GUARDAR</h3>';
                        } 
                    
                    ?>
					<a href="p_m_matricula.php" class="btn btn-primary">Regresar</a>
				</div>
			</div>
        </div>
    </div>    
</body>
</html>
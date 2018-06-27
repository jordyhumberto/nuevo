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
if(!isset($_POST['check'])){
    $error="NO PRESIONÓ NINGÚN CHECKBOX";
    header("Location: p_m_cursos.php?IDAlumno=$IDA&IDCarrera=$IDC&error=$error");
}
$id=$_POST['check'];
$N=count($id);
/* echo $N;echo '<br>'; */ 
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
if($suma>24){
    $error="*DEBE TENER COMO MÁXIMO 24 CRÉDITOS";
    header("Location: p_m_cursos.php?IDAlumno=$IDA&IDCarrera=$IDC&error=$error");
}else if($suma<20){
    $alerta="*ESTAS MATRICULANDO MENOS DE 20 CURSOS";
}
$sql1="SELECT * FROM tbl_semestre WHERE Estado='01'";
$resultado1=$mysqli->query($sql1);
$row1=$resultado1->fetch_array(MYSQLI_ASSOC);

for($j=0; $j < $N; $j++)
{

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
                <a class="btn btn-default" href="p_m_cursos.php?IDAlumno=<?php echo $IDA;?>&IDCarrera=<?php echo $IDC;?>&error=<?php echo $error;?>">regresar</a>			
			</div>
        </div>
    </div>    
</body>
</html>
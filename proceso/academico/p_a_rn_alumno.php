<?php
	session_start(); //Inicia una nueva sesión o reanuda la existente
	require '../../conexion.php'; //Agregamos el script de Conexión
	if(!isset($_SESSION["id_usuario"])){
		header("Location: ../../index.php");
    }
    $id=$_GET['IDCO'];
	$sql = "SELECT na.IDMatricula as matricula,na.IDCO as operativo,concat(a.Apellido_paterno,' ',a.Apellido_materno,' ',a.Nombres) as alumno,c.Descripcion as curso,na.PPracticas as practica,na.ExamenParcial as parcial,na.ExamenFinal as final,na.ExamenSusti as susti,na.Promedio as promedio,na.Estado as estado FROM (((tbl_notas_alumno as na inner join tbl_alumno as a on na.IDAlumno=a.IDAlumno)inner join tbl_curso_operativo as co on na.IDCO=co.IDCO)inner join tbl_cursos as c on co.IDCursos=c.IDCursos) WHERE na.IDCO='$id'"; 
	$resultado = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
        <?php include '../../nav.php';?>
		<div class="container">
				<div class="row">
					<h2 style="text-align:center">NOTAS ALUMNOS</h2>
				</div>
                <div class="row">
                    <a href="p_a_registronotas.php" class="btn btn-primary">Regresar</a>
				</div>
				<br>
				<div class="row table-responsive">
					<table class="display" id="mitabla">
						<thead>
							<tr>
								<th>ALUMNO</th>
								<th>CURSO</th>
								<th>PP</th>
                                <th>EP</th>
                                <th>EF</th>
								<th>ES</th>
								<th>PF</th>
								<th>ESTADO</th>
                                <th></th>
							</tr>
						</thead>
						<tbody>
							<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
								<tr>
									<td><?php echo $row['alumno'];?></td>
									<td><?php echo $row['curso'];?></td>
									<td><?php echo $row['practica'];?></td>
									<td><?php echo $row['parcial'];?></td>
                                    <td><?php echo $row['final'];?></td>
									<td><?php echo $row['susti'];?></td>
									<td><?php echo $row['promedio'];?></td>
									<td><?php if($row['estado']=='01'){
											echo "APROBADO";
										}elseif($row['estado']=='00'){
											echo "DESAPROBADO";
										}
									?></td>
									<td><a href="p_a_rn_a_n.php?IDMA=<?php echo $row['matricula'];?>&IDCO=<?php echo $row['operativo'];?>"><span class="glyphicon glyphicon-plus"></a></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
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
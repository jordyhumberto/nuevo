<?php
    session_start(); //Inicia una nueva sesión o reanuda la existente
	require '../../conexion.php'; //Agregamos el script de Conexión
	if(!isset($_SESSION["id_usuario"])){
		header("Location: ../../index.php");
	}
    $where = "";
	$valor='';
	if(!empty($_POST))
	{
		$valor = $_POST['admision'];
		if(!empty($valor)){
            $where = "WHERE tbl_alumno.IDAlumno LIKE '$valor%'";
		}
	}
	$sql = "SELECT tbl_alumno.*,distritos.Nom_Dist,tbl_colegio.Nombre FROM ((tbl_alumno INNER JOIN distritos ON tbl_alumno.Cod_Dist=distritos.Cod_Dist) INNER JOIN tbl_colegio ON tbl_alumno.IDcolegio=tbl_colegio.IDcolegio) $where ORDER BY tbl_alumno.IDAlumno";
	$resultado = $mysqli->query($sql);

    $sql1 = "SELECT * FROM tbl_proceso_admision";
	$resultado1 = $mysqli->query($sql1);
	$sql2 = "SELECT * FROM tbl_proceso_admision WHERE IDPadmision='$valor'";
	$resultado2 = $mysqli->query($sql2);
	$fila=$resultado2->fetch_array(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
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
		<?php include '../../nav.php'?>
		<div class="container">
				<div class="row">
					<h2 style="text-align:center">CONSULTA ALUMNOS</h2>
				</div>
				<div class="row">
					<h3 style="text-align:center"><?php echo $fila['Descripcion'];?></h2>
				</div>
				<form class="form-horizontal" method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                    <div class="form-group">
                        <label for="admision" class="col-sm-2 control-label">PROCESO ADMISION</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="admision" name="admision">
								<option value="">TODOS</option>
                                <?php while($row = $resultado1->fetch_array(MYSQLI_ASSOC)) { ?>
                                    <option value="<?php echo $row['IDPadmision']; ?>"><?php echo $row['Descripcion']; ?></option>	
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                        </div>
                    </div>
                </form>
				<div class="row">
					<h2 style="text-align:center;"><a href="reporte.php?consulta=<?php echo $sql;?>&valor=<?php echo $fila['Descripcion'];?>"><span class="glyphicon glyphicon-print"></span></a></h2>
				</div>
				<br>
				<div class="row table-responsive">
				<!-- tabla de profesores -->
				<table class="display" id="mitabla">
						<thead>
							<tr>
								<th>ID_ALUMNO</th>
								<th>N_DOCUMENTO</th>
								<th>NOMBRES</th>
                                <th>ESTADO</th>
							</tr>
						</thead>
						<tbody>
							<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
								<tr>
									<td><?php echo $row['IDAlumno']; ?></td>
									<td><?php echo $row['N_documento']; ?></td>
									<td><?php echo $row['Nombres'].' '.$row['Apellido_paterno'].' '.$row['Apellido_materno']; ?></td>
                                    <td><?php if ($row['Estado']=='01'){
										echo 'ACTIVO';
									}else if($row['Estado']=='02'){
										echo 'INACTIVO';
									} ?></td>
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
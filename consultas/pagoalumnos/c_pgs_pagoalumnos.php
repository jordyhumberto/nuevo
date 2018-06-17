<?php
    require '../../conexion.php';
    $where = "";
	/*
	if(!empty($_POST))
	{
		$valor = $_POST['admision'];
		if(!empty($valor)){
            $where = "WHERE IDPadmision LIKE '%$valor'";
		}
	}
	*/
	
	$sql = "SELECT tbl_matricula_carrera1.IDAlumno as alumno,
	CONCAT(tbl_alumno1.Nombres,' ',tbl_alumno1.Apellido_paterno,' ',tbl_alumno1.Apellido_materno) as nombre,
	tbl_compromiso_pago1.*,
	SUM(tbl_compromiso_pago1.Pago) as pagos 
	FROM (tbl_compromiso_pago1 INNER JOIN tbl_matricula_carrera1 ON tbl_compromiso_pago1.IDMatricula=tbl_matricula_carrera1.IDMatricula) INNER JOIN tbl_alumno1 ON tbl_matricula_carrera1.IDAlumno=tbl_alumno1.IDAlumno GROUP BY tbl_matricula_carrera1.IDAlumno";
	$resultado = $mysqli->query($sql);
    $sql1 = "SELECT * FROM tbl_proceso_admision1";
	$resultado1 = $mysqli->query($sql1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="universidad, peruana, investigación, investigacion, negocios, upein, UPEIN">
  	<meta name="description" content="UPEIN! - Universidad Peruana de Invesitgacion y Negocios da la bienvenida a sus nuevos estudiantes">
	<title>Intranet Aula</title>
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
					<h2 style="text-align:center">CONSULTA PAGOS-ALUMNOS</h2>
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

				<br>
				<div class="row table-responsive">
				<!-- tabla de profesores -->
				<table class="display" id="mitabla">
						<thead>
							<tr>
								<th>IDALUMNO</th>
								<th>NOMBRE</th>
								<th>SUMA</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
								<tr>
									<td><?php echo $row['alumno']; ?></td>
									<td><?php echo $row['nombre']?></td>
									<td><?php echo $row['pagos']; ?></td>
									<td><a href=""><span class="glyphicon glyphicon-eye-open"></span></a></td>
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
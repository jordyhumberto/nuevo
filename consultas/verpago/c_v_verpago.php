<?php
	require '../../conexion.php';
	$where = "";
    $valor1 = '';
    $valor2 = '';
    $valor3 = '';
	$sql = "SELECT * FROM tbl_pago1 INNER JOIN tbl_alumno1 ON tbl_pago1.IDAlumno=tbl_alumno1.IDAlumno WHERE tbl_pago1.IDAlumno='2017010011'";
	$sql1="SELECT * FROM tbl_semestre1";
	$resultado1=$mysqli->query($sql1);

	$resultado = $mysqli->query($sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="universidad, peruana, investigación, investigacion, negocios, upein, UPEIN">
  	<meta name="description" content="UPEIN! - Universidad Peruana de Invesitgacion y Negocios da la bienvenida a sus nuevos estudiantes">
	<title>Intranet Consultas</title>

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
					<h2 style="text-align:center">VER PAGO</h2>
				</div>
				<br>
                <form class="form-horizontal" method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                    <div class="form-group"><!--devolver el required-->
                        <label for="fechad" class="col-sm-2 control-label">FECHA DESDE</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="fechad" name="fechad">
                        </div>
                    </div>
                    <div class="form-group"><!--devolver el required-->
                        <label for="fechah" class="col-sm-2 control-label">FECHA HASTA</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="fechah" name="fechah">
                        </div>
                    </div>
					<div class="form-group">
                        <label for="admision" class="col-sm-2 control-label">PROCESO ADMISION</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="admision" name="admision">
								<option value="">TODOS</option>
                                <?php while($row = $resultado1->fetch_array(MYSQLI_ASSOC)) { ?>
                                    <option value="<?php echo $row['IDSemestre']; ?>"><?php echo $row['Descripcion']; ?></option>	
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
				<div class="row table-responsive">
					<table class="display" id="mitabla">
						<thead>
							<tr>
                                <th>IDALUMNO</th>
                                <th>FECHAPAGO</th>
								<th>NROPAGO</th>
								<th>TIPOPAGO</th>
								<th>MONTO</th>
							</tr>
						</thead>
						<tbody>
							<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
								<tr>
									<td><?php echo $row['Nombres'].' '.$row['Apellido_paterno'].' '.$row['Apellido_materno']; ?></td>
									<td><?php echo $row['Fecha_pago']; ?></td>
                                    <td><?php echo $row['Nro_pago']; ?></td>
                                    <td><?php echo $row['Tipo_Pago']; ?></td>
									<td><?php echo $row['Total_pago']; ?></td>
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
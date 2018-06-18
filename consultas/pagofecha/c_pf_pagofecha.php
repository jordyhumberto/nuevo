<?php
    require '../../conexion.php';
    
    $where = "";
    $valor1 = '';
	$valor2 = '';
	$con=0;
    if(!empty($_POST))
	{
        $valor1 = $_POST['fechad'];
        $valor2 = $_POST['fechah'];
        
        if(!empty($valor1) && !empty($valor2))//solo fechas
        {
            $where = "AND tbl_pago1.Fecha_pago BETWEEN '$valor1' AND '$valor2'";
        }else if(!empty($valor1) && empty($valor2))//solo la primer fecha
        {
            $where = "AND tbl_pago1.Fecha_pago>'$valor1'";
        }else if(empty($valor1) && !empty($valor2))//solo la segunda fecha
        {
            $where = "AND tbl_pago1.Fecha_pago<'$valor2'";
        }
    }
	$sql = "SELECT tbl_pago1.Nro_pago,tbl_pago1.IDAlumno,tbl_pago1.Fecha_pago,tbl_pago1.Fecha_anulacion,tbl_pago1.Total_pago,tbl_pago1.Tipo_Pago,tbl_alumno1.IDAlumno,tbl_alumno1.Nombres,tbl_alumno1.Apellido_paterno,tbl_alumno1.Apellido_materno FROM tbl_pago1 INNER JOIN tbl_alumno1 ON tbl_pago1.IDAlumno=tbl_alumno1.IDAlumno $where AND tbl_pago1.Fecha_anulacion IS NULL";
	$resultado = $mysqli->query($sql);
	$valor=$valor1.' '.$valor2;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="universidad, peruana, investigación, investigacion, negocios, upein, UPEIN">
  	<meta name="description" content="UPEIN! - Universidad Peruana de Invesitgacion y Negocios da la bienvenida a sus nuevos estudiantes">
	<title>Intranet PagoFecha</title>

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
					<h2 style="text-align:center">CONSULTA PAGO-FECHAS</h2>
				</div>
                <div class="row">
					<h4 style="text-align:center"><?php echo $valor1.' '.$valor2;?></h2>
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
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                        </div>
                    </div>
                </form>
				<div class="row">
					<h2 style="text-align:center;"><a href="reporte.php?consulta=<?php echo $sql;?>&valor=<?php echo $con;?>&"><span class="glyphicon glyphicon-print"></span></a></h2>
				</div>
                <br>
				<div class="row table-responsive">
				
					<table class="display" id="mitabla">
						<thead>
							<tr>
								<th>NRO_PAGO</th>
                                <th>NOMBRES</th>
								<th>APATERNO</th>
								<th>AMATERNO</th>
								<th>TIPO_PAGO</th>
								<th>TOTAL_PAGO</th>
								<th>FECHA_PAGO</th>
							</tr>
						</thead>
						<tbody>
							<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
								<tr>
									
									<td><?php echo $row['Nro_pago']; ?></td>
									<td><?php echo $row['Nombres']; ?></td>
									<td><?php echo $row['Apellido_paterno']; ?></td>
									<td><?php echo $row['Apellido_materno']; ?></td>
									<td><?php echo $row['Tipo_Pago']; ?></td>
									<td>
									<?php echo $row['Total_pago'];
										$con=$con+$row['Total_pago'];
									?></td>		
									<td><?php echo $row['Fecha_pago']; ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				
				<div class="row">
					<h5 style="text-align:center;">*no incluye pagos anulados</h2>
				</div>
                <div class="row">
					<h4 style="text-align:right;"><?php echo 'TOTAL PAGOS : '.$con;?></h2>
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
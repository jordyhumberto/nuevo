<?php
    require '../../conexion.php';  
    $where = "";
    $valor1 = '';
    $valor2 = '';
    $valor3 = '';
    $valor4 = '';
    if(!empty($_POST))
	{
        $valor1 = $_POST['fechad'];
        $valor2 = $_POST['fechah'];
        $valor3 = $_POST['carrera'];
        $valor4 = $_POST['semestre'];
        if(!empty($valor3)&& !empty($valor4) && !empty($valor1) && !empty($valor2))//todos los valores
        {
            $where = "WHERE tbl_matricula_carrera1.Fecha_matricula1 BETWEEN '$valor1' AND '$valor2'
            AND tbl_matricula_carrera1.IDCarrera LIKE '%$valor3' 
            AND tbl_matricula_carrera1.IDSemestre LIKE '%$valor4'    
            ";
        }else if(!empty($valor1) && !empty($valor2) && empty($valor3) && empty($valor4))//solo fechas
        {
            $where = "WHERE tbl_matricula_carrera1.Fecha_matricula1 BETWEEN '$valor1' AND '$valor2'    
            ";
        }else if(!empty($valor1) && empty($valor2) && empty($valor3) && empty($valor4))//solo la primera fecha
        {
            $where = "WHERE tbl_matricula_carrera1.Fecha_matricula1 >= '$valor1'    
            ";
        }else if(!empty($valor2) && empty($valor1) && empty($valor3) && empty($valor4))//solo la segunda fecha
        {
            $where = "WHERE tbl_matricula_carrera1.Fecha_matricula1 <= '$valor2'    
            ";
        }else if(!empty($valor3) && empty($valor4) && empty($valor1) && empty($valor2))//solo carrera
        {
            $where = "WHERE tbl_matricula_carrera1.IDCarrera LIKE '%$valor3'    
            ";
        }else if(!empty($valor4) && empty($valor3) && empty($valor1) && empty($valor2))//solo semestre
        {
            $where = "WHERE tbl_matricula_carrera1.IDSemestre LIKE '%$valor4'    
            ";
        }else if(!empty($valor3) && !empty($valor4) && empty($valor1) && empty($valor2))//carrera y semestre
        {
            $where = "WHERE tbl_matricula_carrera1.IDCarrera LIKE '%$valor3'
            AND tbl_matricula_carrera1.IDSemestre LIKE '%$valor4'    
            ";
        }else if(!empty($valor3) && empty($valor4) && !empty($valor1) && !empty($valor2))//carrera y fechas
        {
            $where = "WHERE tbl_matricula_carrera1.Fecha_matricula1 BETWEEN '$valor1' AND '$valor2'
            AND tbl_matricula_carrera1.IDCarrera LIKE '%$valor3'    
            ";
        }else if(empty($valor3) && !empty($valor4) && !empty($valor1) && !empty($valor2))//semestre y fechas
        {
            $where = "WHERE tbl_matricula_carrera1.Fecha_matricula1 BETWEEN '$valor1' AND '$valor2'
            AND tbl_matricula_carrera1.IDSemestre LIKE '%$valor4'
            ";
        }
    }
	$sql = "SELECT tbl_matricula_carrera1.IDMatricula AS matricula,
    tbl_matricula_carrera1.IDSemestre AS semestre,
    tbl_matricula_carrera1.IDCarrera AS carrera,
    tbl_alumno1.Nombres AS nombre,
    tbl_alumno1.Apellido_paterno AS paterno,
    tbl_alumno1.Apellido_materno AS materno,
    tbl_matricula_carrera1.Fecha_matricula1 AS fecha
    FROM tbl_matricula_carrera1 INNER JOIN tbl_alumno1 
    ON tbl_matricula_carrera1.IDAlumno=tbl_alumno1.IDAlumno $where";
    $resultado = $mysqli->query($sql);
    $sql1 = "SELECT * FROM tbl_carrera1";
    $resultado1 = $mysqli->query($sql1);
    $sql2 = "SELECT * FROM tbl_semestre1";
	$resultado2 = $mysqli->query($sql2);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="universidad, peruana, investigación, investigacion, negocios, upein, UPEIN">
  	<meta name="description" content="UPEIN! - Universidad Peruana de Invesitgacion y Negocios da la bienvenida a sus nuevos estudiantes">
	<title>Intranet Matricula</title>
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
					<h2 style="text-align:center">CONSULTA MATRICULA</h2>
				</div>
                <div class="row">
					<h3 style="text-align:center"><?php echo $valor1.' '.$valor2.' '.$valor3.' '.$valor4 ;?></h2>
				</div>
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
                        <label for="carrera" class="col-sm-2 control-label">CARRERA</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="carrera" name="carrera">
								<option value="">TODOS</option>
                                <?php while($row = $resultado1->fetch_array(MYSQLI_ASSOC)) { ?>
                                    <option value="<?php echo $row['IDCarrera']; ?>"><?php echo $row['Descripcion']; ?></option>	
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="semestre" class="col-sm-2 control-label">SEMESTRE</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="semestre" name="semestre">
								<option value="">TODOS</option>
                                <?php while($row = $resultado2->fetch_array(MYSQLI_ASSOC)) { ?>
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
				
				<br>
				<div class="row table-responsive">
				<!-- tabla de profesores -->
				<table class="display" id="mitabla">
						<thead>
							<tr>
								<th>COD_MATRICULA</th>
                                <th>COD_SEMESTRE</th>
								<th>COD_CARRERA</th>
								<th>NOMBRES</th>
                                <th>FECHA_MATRICULA</th>
							</tr>
						</thead>
						<tbody>
							<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
								<tr>
									<td><?php echo $row['matricula']; ?></td>
                                    <td><?php echo $row['semestre']; ?></td>
									<td><?php echo $row['carrera']; ?></td>
									<td><?php echo $row['nombre'].' '.$row['paterno'].' '.$row['materno']; ?></td>
                                    <td><?php echo $row['fecha'];?></td>
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
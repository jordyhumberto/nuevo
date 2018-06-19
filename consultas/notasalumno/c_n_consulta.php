<?php
	require '../../conexion.php';
	$id=$_GET['IDAlumno'];
	$sql1="SELECT * FROM tbl_alumno1 WHERE IDAlumno='$id'";
	$resultado1=$mysqli->query($sql1);
	$fila=$resultado1->fetch_array(MYSQLI_ASSOC);
	$sql2="SELECT * FROM tbl_semestre1";
	$resultado2=$mysqli->query($sql2);
	$where = "";
	$valor='';
	if(!empty($_POST))
	{
		$valor = $_POST['semestre'];
		if(!empty($valor)){
            $where = " AND tbl_semestre1.IDSemestre LIKE '%$valor'";
		}
	}
	$sql = "SELECT tbl_notas_alumno.IDMatricula as matricula,tbl_matricula_carrera1.IDAlumno as alumno,tbl_semestre1.Descripcion as semestre,tbl_cursos1.IDCiclo as ciclo,tbl_cursos1.Descripcion as curso,tbl_docente1.Nombres as nombre,tbl_docente1.Apellidos as apellido,tbl_notas_alumno.PPracticas as practicas,tbl_notas_alumno.ExamenParcial as parcial,tbl_notas_alumno.ExamenFinal as final,tbl_notas_alumno.ExamenSusti as susti,tbl_notas_alumno.Promedio as promedio FROM (((((tbl_notas_alumno INNER JOIN tbl_curso_operativo ON tbl_notas_alumno.IDCO=tbl_curso_operativo.IDCO) INNER JOIN tbl_docente1 ON tbl_curso_operativo.IDDocente=tbl_docente1.IDDocente) INNER JOIN tbl_cursos1 ON tbl_curso_operativo.IDCursos=tbl_cursos1.IDCursos ) INNER JOIN tbl_semestre1 ON tbl_curso_operativo.IDSemestre=tbl_semestre1.IDSemestre) INNER JOIN tbl_matricula_carrera1 ON tbl_notas_alumno.IDMatricula=tbl_matricula_carrera1.IDMatricula) WHERE tbl_matricula_carrera1.IDAlumno='$id' $where";
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
					<h2 style="text-align:center">CONSULTA NOTAS ALUMNO</h2>
				</div>
				
				<div class="row">
					<h3 style="text-align:center"><?php echo $fila['Nombres'].' '.$fila['Apellido_paterno'].' '.$fila['Apellido_materno'];?></h2>
				</div>
				<form class="form-horizontal" method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
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
				<a href="c_n_notasalumno.php" class="btn btn-primary">Regresar</a>
				<br>
				<br>
				<div class="row table-responsive">
					<table class="display" id="mitabla">
						<thead>
							<tr>
								<th>IDMAT</th>
                                <th>IDSE</th>
								<th>CICLO</th>
                                <th>CURSO</th>
                                <th>DOCENTE</th>
                                <th>PP</th>
                                <th>EP</th>
								<th>EF</th>
								<th>ES</th>
								<th>PRO</th>
								<th>ESTADO</th>
							</tr>
						</thead>
						<tbody>
							<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
								<tr>
									<td><?php echo $row['matricula']; ?></td>
                                    <td><?php echo $row['semestre']; ?></td>
									<td><?php echo $row['ciclo']; ?></td>
                                    <td><?php echo $row['curso']; ?></td>
                                    <td><?php echo $row['nombre'].' '.$row['apellido']; ?></td>
									<td><?php echo $row['practicas']; ?></td>
                                    <td><?php echo $row['parcial']; ?></td>
                                    <td><?php echo $row['final']; ?></td>
									<td><?php echo $row['susti']; ?></td>
                                    <td><?php echo $row['promedio']; ?></td>
									<td><?php if($row['promedio']>=11){
										echo 'APROBADO';
									}else{
										echo 'DESAPROBADO';
									}
										; ?></td>
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
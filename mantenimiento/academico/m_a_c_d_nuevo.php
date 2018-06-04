<?php
    require '../../conexion.php';
    
    $sql3 = "SELECT * FROM tbl_docente1";
    $resultado3 = $mysqli->query($sql3);
    $sql4 = "SELECT * FROM tbl_cursos1";
    $resultado4 = $mysqli->query($sql4);

?>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="keywords" content="universidad, peruana, investigación, investigacion, negocios, upein, UPEIN">
		<meta name="description" content="UPEIN! - Universidad Peruana de Invesitgacion y Negocios da la bienvenida a sus nuevos estudiantes">
		<title>Intranet Cursos</title>
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
        
        <div class="container">
            <div class="row">
                <h2 style="text-align:center">Formulario de Docente-Cursos</h2>
            </div>
                
            <form class="form-horizontal" method="POST" action="m_a_c_d_guardar.php" autocomplete="off">

                <input type="hidden" id="id" name="id" value="<?php echo $fila['IDDocente']; ?>" />

                <div class="form-group">
                    <label for="docente" class="col-sm-2 control-label">Docente</label>
                    <div class="col-sm-10">
                    
                        <select class="form-control" id="docente" name="docente">
                            <?php while($row = $resultado3->fetch_array(MYSQLI_ASSOC)) { ?>
                                <option value="<?php echo $row['IDDocente']; ?>"
                                 ><?php echo $row['Nombres'].' '.$row['Apellidos']; ?></option>	
                             <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="curso" class="col-sm-2 control-label">Curso</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="curso" name="curso">
                            <?php while($row = $resultado4->fetch_array(MYSQLI_ASSOC)) { ?>
                                <option value="<?php echo $row['IDCursos']; ?>"
                                ><?php echo $row['Descripcion']; ?></option>	
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
                        <a href="m_a_curso_docente.php" class="btn btn-default">Regresar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
                
        </div>
	</body>
</html>
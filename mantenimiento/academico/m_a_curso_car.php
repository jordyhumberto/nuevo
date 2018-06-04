<?php
    require '../../conexion.php';
    $id = $_GET['IDCursos'];

    #$sql1 = "SELECT * FROM tbl_curso_prerequisito1 WHERE IDCursos='$id'";
    $sql1="SELECT * FROM tbl_curso_carrera1 WHERE IDCursos='$id'";
    $resultado = $mysqli->query($sql1);

    $sql2 = "SELECT * FROM tbl_cursos1  WHERE IDCursos='$id'";
    $resultado2 = $mysqli->query($sql2);
    $fila = $resultado2->fetch_array(MYSQLI_ASSOC);
    
    $sql3 = "SELECT * FROM tbl_cursos1";
    $resultado3 = $mysqli->query($sql3);
    $sql4 = "SELECT * FROM tbl_carrera1";
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
                <h2 style="text-align:center">Formulario de Pre_Req</h2>
            </div>
                
            <form class="form-horizontal" method="POST" action="m_a_cu_c_guardar.php" autocomplete="off">

                <input type="hidden" id="id" name="id" value="<?php echo $fila['IDCursos']; ?>" />

                <div class="form-group">
                    <label for="curso" class="col-sm-2 control-label">Curso</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="curso" name="curso">
                            <?php while($row = $resultado3->fetch_array(MYSQLI_ASSOC)) { ?>
                                <option value="<?php echo $row['IDCursos']; ?>"
                                <?php if($row['IDCursos']==$fila['IDCursos'])echo 'selected';?>
                                 ><?php echo $row['Descripcion']; ?></option>	
                             <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="carrera" class="col-sm-2 control-label">Carrera</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="carrera" name="carrera">
                            <?php while($row = $resultado4->fetch_array(MYSQLI_ASSOC)) { ?>
                                <option value="<?php echo $row['IDCarrera']; ?>"
                                ><?php echo $row['Descripcion']; ?></option>	
                            <?php } ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <a href="m_a_curso.php" class="btn btn-default">Regresar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
                
            <div class="row table-responsive">
                <!-- tabla de profesores -->
                <table class="display" id="mitabla">
                    <thead>
                        <tr>
                            <th>ID_Curso</th>
                            <th>ID_Carrera</th>	
                            <th></th>	
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                            <tr>
                            <td><?php echo $row['IDCursos'];?></td>
                                <td><?php echo $row['IDCarrera']; ?></td>
                                <td><a href="m_a_cu_c_modificar.php?IDCursos=<?php echo $row['IDCursos']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
	</body>
</html>
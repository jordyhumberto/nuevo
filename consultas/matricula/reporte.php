<?php
	//Incluimos librería y archivo de conexión
	require '../../Classes/PHPExcel.php';
    require '../../conexion.php';
	$sql=$_GET['consulta'];
	$where=$_GET['where'];
	//Consulta
	//$sql="SELECT * FROM tbl_alumno1";
	$resultado = $mysqli->query($sql);
	$fila = 11; //Establecemos en que fila inciara a imprimir los datos
	
	$gdImage = imagecreatefrompng('../../img/logo_upein.png');//Logotipo
	
	//Objeto de PHPExcel
	$objPHPExcel  = new PHPExcel();
	
	//Propiedades de Documento
	$objPHPExcel->getProperties()->setCreator("Jordy")->setDescription("Reporte de Matricula");
	
	//Establecemos la pestaña activa y nombre a la pestaña
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("alumnos");
	
	$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
	$objDrawing->setName('Logotipo');
	$objDrawing->setDescription('Logotipo');
	$objDrawing->setImageResource($gdImage);
	$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
	$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
	$objDrawing->setHeight(100);
	$objDrawing->setCoordinates('A1');
	$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
	
	$estiloTituloReporte = array(
    'font' => array(
	'name'      => 'calibri',
	'bold'      => true,
	'italic'    => false,
	'strike'    => false,
    'size' =>15,
    'color' => array(
    'rgb' => '7a0b0c'
    )
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_NONE
	)
    ),
    'alignment' => array(
	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
	'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);
	
	$estiloTituloColumnas = array(
    'font' => array(
	'name'  => 'calibri',
	'bold'  => true,
	'size' =>11,
	'color' => array(
	'rgb' => 'FFFFFF'
	)
    ),
    'fill' => array(
	'type' => PHPExcel_Style_Fill::FILL_SOLID,
	'color' => array('rgb' => '7a0b0c')
    ),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
    'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);
	
	$estiloInformacion = new PHPExcel_Style();
	$estiloInformacion->applyFromArray( array(
    'font' => array(
	'name'  => 'calibri',
	'color' => array(
	'rgb' => '000000'
	)
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
	'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	));


	//ESTILOS DE LEYENDA
	$estiloLeyenda = array(
		'font' => array(
		'name'  => 'calibri',
		'bold'  => true,
		'size' =>11,
		'color' => array(
		'rgb' => '000000'
		)
		),
		'fill' => array(
		'type' => PHPExcel_Style_Fill::FILL_SOLID,
		'color' => array('rgb' => 'F3F30E')
		),
		'borders' => array(
		'allborders' => array(
		'style' => PHPExcel_Style_Border::BORDER_THIN
		)
		),
		'alignment' =>  array(
		'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
		)
		);

	
	//AGREGAR ESTILOS
	$objPHPExcel->getActiveSheet()->getStyle('A1:D4')->applyFromArray($estiloTituloReporte);
	$objPHPExcel->getActiveSheet()->getStyle('A10:Q10')->applyFromArray($estiloTituloColumnas);
	
	$objPHPExcel->getActiveSheet()->getStyle('A5:B8')->applyFromArray($estiloLeyenda);

	$objPHPExcel->getActiveSheet()->setCellValue('B1', 'REPORTE DE MATRICULA');
	$objPHPExcel->getActiveSheet()->mergeCells('B1:D1');
	$objPHPExcel->getActiveSheet()->setCellValue('B2', $where);
	$objPHPExcel->getActiveSheet()->mergeCells('B2:D2');
	$objPHPExcel->getActiveSheet()->setCellValue('B3', date('d').'/'.date('m').'/'.date('Y'));
	$objPHPExcel->getActiveSheet()->mergeCells('B3:D3');

	//AGREGAR LEYENDA TABLA AMARILLA
	$objPHPExcel->getActiveSheet()->setCellValue('A5', 'LEYENDA');
	$objPHPExcel->getActiveSheet()->mergeCells('A5:B5');
	$objPHPExcel->getActiveSheet()->setCellValue('A6', 'CAMPO: ESTADO');
	$objPHPExcel->getActiveSheet()->mergeCells('A6:B6');
	$objPHPExcel->getActiveSheet()->setCellValue('A7', 'ACTIVO');
	$objPHPExcel->getActiveSheet()->mergeCells('A7:A7');
	$objPHPExcel->getActiveSheet()->setCellValue('B7', '01');
	$objPHPExcel->getActiveSheet()->mergeCells('B7:B7');
	$objPHPExcel->getActiveSheet()->setCellValue('A8', 'INACTIVO');
	$objPHPExcel->getActiveSheet()->mergeCells('A8:A8');
	$objPHPExcel->getActiveSheet()->setCellValue('B8', '02');
	$objPHPExcel->getActiveSheet()->mergeCells('B8:B8');
    ////////////////////////LAS COLUMNAS//////////////////////////
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
	$objPHPExcel->getActiveSheet()->setCellValue('A10', 'IDMATRICULA');
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
    $objPHPExcel->getActiveSheet()->setCellValue('B10', 'IDALUMNO');
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('C10', 'FECHAMATRICULA');
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
	$objPHPExcel->getActiveSheet()->setCellValue('D10', 'SEMESTRE');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('E10', 'NOMBRES');
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('F10', 'APELLIDO_P');
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('G10', 'APELLIDO_M');
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('H10', 'FECHANACIMIENTO');
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(40);
    $objPHPExcel->getActiveSheet()->setCellValue('I10', 'CODCARRERA');
    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
	$objPHPExcel->getActiveSheet()->setCellValue('J10', 'NROCREDITOS');
    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
    $objPHPExcel->getActiveSheet()->setCellValue('K10', 'TELF_F');
    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
    $objPHPExcel->getActiveSheet()->setCellValue('L10', 'TELF_C');
    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(70);
    $objPHPExcel->getActiveSheet()->setCellValue('M10', 'DIRECCION');
    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
    $objPHPExcel->getActiveSheet()->setCellValue('N10', 'DISTRITO');
    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('O10', 'NRODOCUMENTO');
    $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
    $objPHPExcel->getActiveSheet()->setCellValue('P10', 'EMAIL');
    $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(10);
    $objPHPExcel->getActiveSheet()->setCellValue('Q10', 'ESTADO');	
	//Recorremos los resultados de la consulta y los imprimimos
	while($rows = $resultado->fetch_array(MYSQLI_ASSOC)){////////////////////////////////<--------------cambio
		
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $rows['IDMatricula']);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $rows['IDAlumno']);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $rows['Fecha_matricula1']);
        //$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $rows['IDSemestre']);//cambiar
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $rows['semestre']);//cambiar
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $rows['Nombres']);
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $rows['Apellido_paterno']);
        $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $rows['Apellido_materno']);
        $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $rows['Fecha_nac']);
        //$objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, $rows['IDCarrera']);//cambiar
        $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, $rows['Descripcion']);//cambiar
        $objPHPExcel->getActiveSheet()->setCellValue('J'.$fila, $rows['Cant_creditos']);
        $objPHPExcel->getActiveSheet()->setCellValue('K'.$fila, $rows['Telf_fijo']);
        $objPHPExcel->getActiveSheet()->setCellValue('L'.$fila, $rows['Telf_celular']);
        $objPHPExcel->getActiveSheet()->setCellValue('M'.$fila, $rows['Direccion']);
        //$objPHPExcel->getActiveSheet()->setCellValue('N'.$fila, $rows['Cod_Dist']);//cambiar
        $objPHPExcel->getActiveSheet()->setCellValue('N'.$fila, $rows['Nom_Dist']);//cambiar
        $objPHPExcel->getActiveSheet()->setCellValue('O'.$fila, $rows['N_documento']);
        $objPHPExcel->getActiveSheet()->setCellValue('P'.$fila, $rows['Email']);
        $objPHPExcel->getActiveSheet()->setCellValue('Q'.$fila, $rows['Estado']);
        
        $fila++; //Sumamos 1 para pasar a la siguiente fila
	}
	
	$fila = $fila-1;
	
	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A11:Q".$fila);//tamaño de la tabla
	
	
	//$filaGrafica = $fila+2;
	
	// definir origen de los valores
	$values = new PHPExcel_Chart_DataSeriesValues('Number', 'alumnos!$D$11:$D$'.$fila);
	
	// definir origen de los rotulos
	$categories = new PHPExcel_Chart_DataSeriesValues('String', 'alumnos!$B$11:$B$'.$fila);
	
	$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="matricula.xlsx"');
	header('Cache-Control: max-age=0');
	
	$writer->save('php://output');
?>
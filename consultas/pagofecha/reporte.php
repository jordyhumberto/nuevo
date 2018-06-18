<?php
	//Incluimos librería y archivo de conexión
	require '../../Classes/PHPExcel.php';
    require '../../conexion.php';
	$sql=$_GET['consulta'];
	$valor=$_GET['valor'];
	$fecha=$_GET['fecha'];
	if($sql==''){
		header("location:c_pf_pagofecha.php");
	}
	//Consulta
	//$sql="SELECT * FROM tbl_alumno1";
	$resultado = $mysqli->query($sql);
	$fila = 11; //Establecemos en que fila inciara a imprimir los datos
	
	$gdImage = imagecreatefrompng('../../img/logo_upein.png');//Logotipo
	
	//Objeto de PHPExcel
	$objPHPExcel  = new PHPExcel();
	
	//Propiedades de Documento
	$objPHPExcel->getProperties()->setCreator("Jordy")->setDescription("Reporte de alumno");
	
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
	$objPHPExcel->getActiveSheet()->getStyle('A10:G10')->applyFromArray($estiloTituloColumnas);
	
	$objPHPExcel->getActiveSheet()->getStyle('A5:B8')->applyFromArray($estiloLeyenda);

	$objPHPExcel->getActiveSheet()->setCellValue('B1', 'REPORTE DE PAGOSXFECHA');
	$objPHPExcel->getActiveSheet()->mergeCells('B1:D1');
	$objPHPExcel->getActiveSheet()->setCellValue('B2', 'PAGOS :');
	$objPHPExcel->getActiveSheet()->mergeCells('B2:C2');
	$objPHPExcel->getActiveSheet()->setCellValue('D2', $valor);
	$objPHPExcel->getActiveSheet()->mergeCells('D2:D2');
	$objPHPExcel->getActiveSheet()->setCellValue('B3', $fecha);
	$objPHPExcel->getActiveSheet()->mergeCells('B3:D3');
	$objPHPExcel->getActiveSheet()->setCellValue('B4', date('d').'/'.date('m').'/'.date('Y'));
	$objPHPExcel->getActiveSheet()->mergeCells('B4:D4');

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
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('A10', 'NROPAGO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('B10', 'NOMBRES');
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('C10', 'APELLIDO_P');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('D10', 'APELLIDO_M');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('E10', 'TPAGO');
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('F10', 'PAGO');
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('G10', 'FECHA');
    
	//Recorremos los resultados de la consulta y los imprimimos
	while($rows = $resultado->fetch_array(MYSQLI_ASSOC)){////////////////////////////////<--------------cambio
		
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $rows['Nro_pago']);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $rows['Nombres']);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $rows['Apellido_paterno']);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $rows['Apellido_materno']);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $rows['Tipo_Pago']);
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $rows['Total_pago']);
        $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $rows['Fecha_pago']);
        
        $fila++; //Sumamos 1 para pasar a la siguiente fila
	}
	
	$fila = $fila-1;
	
	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A11:G".$fila);//tamaño de la tabla
	
	
	//$filaGrafica = $fila+2;
	
	// definir origen de los valores
	$values = new PHPExcel_Chart_DataSeriesValues('Number', 'alumnos!$D$11:$D$'.$fila);
	
	// definir origen de los rotulos
	$categories = new PHPExcel_Chart_DataSeriesValues('String', 'alumnos!$B$11:$B$'.$fila);
	
	$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="fechapago.xlsx"');
	header('Cache-Control: max-age=0');
	
	$writer->save('php://output');
?>
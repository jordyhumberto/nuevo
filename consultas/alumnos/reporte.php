<?php
	//Incluimos librería y archivo de conexión
	require '../../Classes/PHPExcel.php';
    require '../../conexion.php';
    $where=$_GET['consulta'];
	//Consulta
	$sql = "SELECT * FROM tbl_alumno1 $where ORDER BY IDAlumno ";
	$resultado = $mysqli->query($sql);
	$fila = 7; //Establecemos en que fila inciara a imprimir los datos
	
	$gdImage = imagecreatefrompng('../../img/logo_upein.png');//Logotipo
	
	//Objeto de PHPExcel
	$objPHPExcel  = new PHPExcel();
	
	//Propiedades de Documento
	$objPHPExcel->getProperties()->setCreator("Jordy")->setDescription("Reporte de Alumnos");
	
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
	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);
	
	$estiloTituloColumnas = array(
    'font' => array(
	'name'  => 'calibri',
	'bold'  => true,
	'size' =>10,
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
	
	$objPHPExcel->getActiveSheet()->getStyle('A1:V4')->applyFromArray($estiloTituloReporte);
	$objPHPExcel->getActiveSheet()->getStyle('A6:V6')->applyFromArray($estiloTituloColumnas);
	
	$objPHPExcel->getActiveSheet()->setCellValue('B3', 'REPORTE DE ALUMNOS');
    $objPHPExcel->getActiveSheet()->mergeCells('B3:D3');
    
	////////////////////////LAS COLUMNAS//////////////////////////
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('A6', 'IDALUMNO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('B6', 'NOMBRES');
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('C6', 'APELLIDO_P');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('D6', 'APELLIDO_M');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
    $objPHPExcel->getActiveSheet()->setCellValue('E6', 'TIPO_D');
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
    $objPHPExcel->getActiveSheet()->setCellValue('F6', 'N_DOCUM');
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(70);
    $objPHPExcel->getActiveSheet()->setCellValue('G6', 'DIRECCION');
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('H6', 'DISTRITO');
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
    $objPHPExcel->getActiveSheet()->setCellValue('I6', 'TELF_F');
    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
    $objPHPExcel->getActiveSheet()->setCellValue('J6', 'TELF_C');
    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
    $objPHPExcel->getActiveSheet()->setCellValue('K6', 'EMAIL');
    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
    $objPHPExcel->getActiveSheet()->setCellValue('L6', 'ESTADO_C');
    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(10);
    $objPHPExcel->getActiveSheet()->setCellValue('M6', 'ALERGIA');
    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(10);
    $objPHPExcel->getActiveSheet()->setCellValue('N6', 'T_SANGRE');
    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('O6', 'DISCAPACIDAD');
    $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(10);
    $objPHPExcel->getActiveSheet()->setCellValue('P6', 'FECHA_E');
    $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
    $objPHPExcel->getActiveSheet()->setCellValue('Q6', 'COLEGIO');
    $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
    $objPHPExcel->getActiveSheet()->setCellValue('R6', 'NOMBRE_T');
    $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(10);
    $objPHPExcel->getActiveSheet()->setCellValue('S6', 'PARENTESCO');
    $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('T6', 'DIRECCION_T');
    $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(10);
    $objPHPExcel->getActiveSheet()->setCellValue('U6', 'TELF_T');
    $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(10);
    $objPHPExcel->getActiveSheet()->setCellValue('V6', 'ESTADO');	
	//Recorremos los resultados de la consulta y los imprimimos
	while($rows = $resultado->fetch_assoc()){
		
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $rows['IDAlumno']);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $rows['Nombres']);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $rows['Apellido_paterno']);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $rows['Apellido_materno']);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $rows['Tipo_doc']);
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $rows['N_documento']);
        $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $rows['Direccion']);
        $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $rows['Cod_Dist']);
        $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, $rows['Telf_fijo']);
        $objPHPExcel->getActiveSheet()->setCellValue('J'.$fila, $rows['Telf_celular']);
        $objPHPExcel->getActiveSheet()->setCellValue('K'.$fila, $rows['Email']);
        $objPHPExcel->getActiveSheet()->setCellValue('L'.$fila, $rows['Estado_civil']);
        $objPHPExcel->getActiveSheet()->setCellValue('M'.$fila, $rows['Alergia']);
        $objPHPExcel->getActiveSheet()->setCellValue('N'.$fila, $rows['T_sangre']);
        $objPHPExcel->getActiveSheet()->setCellValue('O'.$fila, $rows['Discapacidad']);
        $objPHPExcel->getActiveSheet()->setCellValue('P'.$fila, $rows['Fecha_egreso']);
        $objPHPExcel->getActiveSheet()->setCellValue('Q'.$fila, $rows['IDcolegio']);
        $objPHPExcel->getActiveSheet()->setCellValue('R'.$fila, $rows['Nombre_tutor']);
        $objPHPExcel->getActiveSheet()->setCellValue('S'.$fila, $rows['Parentesco']);
        $objPHPExcel->getActiveSheet()->setCellValue('T'.$fila, $rows['Direc_tutor']);
        $objPHPExcel->getActiveSheet()->setCellValue('U'.$fila, $rows['fono_tutor']);
        $objPHPExcel->getActiveSheet()->setCellValue('V'.$fila, $rows['Estado']);

        $fila++; //Sumamos 1 para pasar a la siguiente fila
	}
	
	$fila = $fila-1;
	
	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A7:V".$fila);//tamaño de la tabla
	
	$filaGrafica = $fila+2;
	
	// definir origen de los valores
	$values = new PHPExcel_Chart_DataSeriesValues('Number', 'alumnos!$D$7:$D$'.$fila);
	
	// definir origen de los rotulos
	$categories = new PHPExcel_Chart_DataSeriesValues('String', 'alumnos!$B$7:$B$'.$fila);
	
	// definir  gráfico
	$series = new PHPExcel_Chart_DataSeries(
	PHPExcel_Chart_DataSeries::TYPE_BARCHART, // tipo de gráfico
	PHPExcel_Chart_DataSeries::GROUPING_CLUSTERED,
	array(0),
	array(),
	array($categories), // rótulos das columnas
	array($values) // valores
	);
	$series->setPlotDirection(PHPExcel_Chart_DataSeries::DIRECTION_COL);
	
	// inicializar gráfico
	$layout = new PHPExcel_Chart_Layout();
	$plotarea = new PHPExcel_Chart_PlotArea($layout, array($series));
	
	// inicializar o gráfico
	$chart = new PHPExcel_Chart('exemplo', null, null, $plotarea);
	
	// definir título do gráfico
	$title = new PHPExcel_Chart_Title(null, $layout);
	$title->setCaption('Gráfico PHPExcel Chart Class');
	
	// definir posiciondo gráfico y título
	$chart->setTopLeftPosition('B'.$filaGrafica);
	$filaFinal = $filaGrafica + 10;
	$chart->setBottomRightPosition('E'.$filaFinal);
	$chart->setTitle($title);
	
	// adicionar o gráfico à folha
	$objPHPExcel->getActiveSheet()->addChart($chart);
	
	$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	
	// incluir gráfico
	$writer->setIncludeCharts(TRUE);
	
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="Alumno.xlsx"');
	header('Cache-Control: max-age=0');
	
	$writer->save('php://output');
?>
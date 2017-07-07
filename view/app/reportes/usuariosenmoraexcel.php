<?php
header('Content-Type: application/vdn.ms-excel');
header('Content-Disposition: attachment; filename=reporte.xls');

require('../../../lib/PHPExcel-1.8/Classes/PHPExcel.php');

$excel = new PHPExcel();

$excel->getProperties()->setCreator('Apartamentos-cool')->setLastModifiedBy('SMEGS')->setTitle('en mora');

$excel->setActiveSheetIndex(0);

$pagina = $excel->getActiveSheet();

$pagina->setTitle('en mora');

$conn =new mysqli('localhost','root','','altavista');
$conn->set_charset('utf8');


$statement = $conn->prepare("SELECT * FROM `pagos` WHERE estado = 'en mora'");

$statement->execute();

$result = $statement->get_result();

while ($row = $result->fetch_array()) $morosos[] = $row ;
  

$pagina->setCellValue('A1','ID PAGO');
$pagina->setCellValue('B1','APARTAMENTO');
$pagina->setCellValue('C1','TIPO PAGO');
$pagina->setCellValue('D1','REFERENCIA');
$pagina->setCellValue('E1','VALOR');
$pagina->setCellValue('F1','FECHA');
$pagina->setCellValue('G1','ESTADO');
$pagina->setCellValue('H1','URL FOTO');

$pagina->getStyle('A1:H1')->getFont()->setBold(true);
$pagina->getStyle('A1:H1')->getFont()->setSize(12);

for ($i = 0; $i < count($morosos); $i++) {
    $pagina->setCellValue('A'. ($i+2), $morosos[$i]['id_pagos']);
    $pagina->setCellValue('B'. ($i+2), $morosos[$i]['id_apartamento']);
    $pagina->setCellValue('C'. ($i+2), $morosos[$i]['tipo_pago']);
    $pagina->setCellValue('D'. ($i+2), $morosos[$i]['referencia']);
    $pagina->setCellValue('E'. ($i+2), $morosos[$i]['valor']);
    $pagina->setCellValue('F'. ($i+2), $morosos[$i]['fecha']);
    $pagina->setCellValue('G'. ($i+2), $morosos[$i]['estado']);
    $pagina->setCellValue('H'. ($i+2), $morosos[$i]['url_documento']);
    
}

foreach (range('A','H')as $colum){
    $pagina->getColumnDimension($colum)->setAutoSize(TRUE);
}
$objWriter = PHPExcel_IOFactory::createWriter($excel,'Excel5');

$objWriter->save('php://output');
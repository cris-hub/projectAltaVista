<?php
header('Content-Type: application/vdn.ms-excel');
header('Content-Disposition: attachment; filename=reporte.xls');

require('../lib/PHPExcel-1.8/Classes/PHPExcel.php');

$excel = new PHPExcel();

$excel->getProperties()->setCreator('Apartamentos-cool')->setLastModifiedBy('SMEGS')->setTitle('Parqueadero');

$excel->setActiveSheetIndex(0);

$pagina = $excel->getActiveSheet();

$pagina->setTitle('parqueaderos');

$conn =new mysqli('localhost','root','','altavista');
$conn->set_charset('utf8');


$statement = $conn->prepare("SELECT * FROM `parqueaderos` ORDER BY `id_parqueadero` DESC");

$statement->execute();

$result = $statement->get_result();

while ($row = $result->fetch_array()) $parqueaderos [] = $row ;
  

$pagina->setCellValue('A1','ID');
$pagina->setCellValue('B1','ESTADO');

$pagina->getStyle('A1:B1')->getFont()->setBold(true);
$pagina->getStyle('A1:B1')->getFont()->setSize(12);

for ($i = 0; $i < count($parqueaderos); $i++) {
    $pagina->setCellValue('A'. ($i+2), $parqueaderos[$i]['id_parqueadero']);
    $pagina->setCellValue('B'. ($i+2), $parqueaderos[$i]['estado']);
    
}

foreach (range('A','B')as $colum){
    $pagina->getColumnDimension($colum)->setAutoSize(TRUE);
}
$objWriter = PHPExcel_IOFactory::createWriter($excel,'Excel5');

$objWriter->save('php://output');
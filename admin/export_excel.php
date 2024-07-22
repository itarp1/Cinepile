<?php
require '../vendor/autoload.php'; // 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Font;

require_once "db.php";



$sql = "SELECT * FROM signup "; // Start with a base condition

$result = $con->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'User Data');

$sheet->mergeCells('A1:E1'); 

$sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

$sheet->getStyle('A1')
      ->getFont()
      ->setBold(true)
      ->setSize(16); // Make text bold and set font size


$sheet->setCellValue('A2', '');

$sheet->setCellValue('A3', 'Id')
    ->setCellValue('B3', 'FirstName')
      ->setCellValue('C3', 'Lastname')
      ->setCellValue('D3', 'Address')
      ->setCellValue('E3', 'Email');

$rowNum = 4;
foreach ($rows as $row) {
    $sheet->setCellValue('A' . $rowNum, $row['id'])
            ->setCellValue('B' . $rowNum, $row['Firstname'])
          ->setCellValue('C' . $rowNum, $row['Lastname'])
          ->setCellValue('D' . $rowNum, $row['Address'])
          ->setCellValue('E' . $rowNum, $row['Email'])
         
          ; // Format the date
    $rowNum++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="UserData.xlsx"');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
?>

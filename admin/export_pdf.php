<?php
require('../fpdf/fpdf.php');
require_once "db.php";



$sql = "SELECT * FROM signup";

$result = $con->query($sql);

// PDF class definition
class PDF extends FPDF {
    // Page header
    function Header() {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'User Data', 0, 1, 'C');
        $this->Ln(10);
    }

    // Page footer
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }

    // Table
    function Table($header, $data) {
        // Header
        $this->SetFont('Arial', 'B', 10);
        foreach ($header as $col) {
            $this->Cell(45, 7, $col, 1);
        }
        $this->Ln();
        // Data
        $this->SetFont('Arial', '', 10);
        foreach ($data as $row) {
            foreach ($row as $col) {
                $this->Cell(45, 6, $col, 1);
            }
            $this->Ln();
        }
    }
}

// Create PDF instance
$pdf = new PDF();
$pdf->AddPage();

// Define column headings
$header = array('FirstName', 'Lastname', 'Address', 'Email');

// Prepare data for the table
$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = array(
            $row['Firstname'],
            $row['Lastname'],
            $row['Address'],
            $row['Email'],
           
        );
    }
}

// Generate the table in PDF
$pdf->Table($header, $data);

// Output the PDF
$pdf->Output();
?>

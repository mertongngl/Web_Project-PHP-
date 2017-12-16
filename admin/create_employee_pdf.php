<?php
    require('fpdf.php');
    include "connection.php";

class employee_list extends FPDF
{
    function header()
    {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(400, 5, 'CALISAN LISTESI', 0, 0, 'C');
        $this->Ln(20);
    }
    function footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', '', 6);
        $this->Cell(0, 10, 'SAYFA' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
    function headerTable()
    {
        $this->SetFont('Times', 'B', 12);
        $this->Cell(70, 10, 'T.C. KIMLIK NUMARASI', 1, 0, 'C');
        $this->Cell(40, 10, 'AD', 1, 0, 'C');
        $this->Cell(50, 10, 'SOYAD', 1, 0, 'C');
        $this->Cell(60, 10, 'DOGUM GUNU', 1, 0, 'C');
        $this->Cell(40, 10, 'CINSIYET', 1, 0, 'C');
        $this->Cell(40, 10, 'TELEFON', 1, 0, 'C');
        $this->Cell(60, 10, 'E_POSTA', 1, 0, 'C');
        $this->Cell(40, 10, 'YETKI', 1, 0, 'C');
        $this->Ln();

    }
    function viewTable($db)
    {
        $request = mysqli_query($db, "SELECT * FROM empView");
        while ($response = mysqli_fetch_assoc($request)) {
            $this->Cell(70, 10, $response['emp_identity'], 1, 0, 'C');
            $this->Cell(40, 10, $response['emp_name'], 1, 0, 'C');
            $this->Cell(50, 10, $response['emp_surname'], 1, 0, 'C');
            $this->Cell(60, 10, $response['emp_birthdate'], 1, 0, 'C');
            $this->Cell(40, 10, $response['emp_gender'], 1, 0, 'C');
            $this->Cell(40, 10, $response['emp_phone'], 1, 0, 'C');
            $this->Cell(60, 10, $response['emp_mail'], 1, 0, 'C');
            $this->Cell(40, 10, $response['authority_info'], 1, 0, 'C');
            $this->Ln();
        }
    }
}
    $pdf = new employee_list();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A3',0);
    $pdf->headerTable();
    $pdf->viewTable($db);

    $pdf->Output();
?>
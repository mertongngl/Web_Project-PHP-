<?php
    require('fpdf.php');
    include "connection.php";
class contract_list extends FPDF
{
    function header()
    {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(260, 5, 'KONTRAT LISTESI', 0, 0, 'C');
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
        $this->Cell(70, 10, 'UYE NUMARASI', 1, 0, 'C');
        $this->Cell(40, 10, 'BASLAMA TARIHI', 1, 0, 'C');
        $this->Cell(50, 10, 'BITIS TARIHI', 1, 0, 'C');
        $this->Cell(60, 10, 'TOPLAM BORC', 1, 0, 'C');
        $this->Cell(40, 10, 'TAKSIT SAYISI', 1, 0, 'C');
        $this->Ln();
    }
    function viewTable($db)
    {
        $request = mysqli_query($db, "SELECT * FROM contracts_tbl");
        while ($response = mysqli_fetch_assoc($request)) {
            $this->Cell(70, 10, $response['mem_id'], 1, 0, 'C');
            $this->Cell(40, 10, $response['cont_start'], 1, 0, 'C');
            $this->Cell(50, 10, $response['cont_finish'], 1, 0, 'C');
            $this->Cell(60, 10, $response['cont_price'], 1, 0, 'C');
            $this->Cell(40, 10, $response['cont_ins_quantity'], 1, 0, 'C');
            $this->Ln();
        }
    }
}

    $pdf = new contract_list();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A4',0);
    $pdf->headerTable();
    $pdf->viewTable($db);

    $pdf->Output();
?>
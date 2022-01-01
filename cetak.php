<?php 
include 'config/koneksi.php';
define ('FPDF_FONTPATH','fpdf17/font');
require_once 'fpdf17/fpdf.php';
require_once 'tfpdf/tfpdf.php';


$id=$_GET['id'];
$data=$conn->query("SELECT * FROM maintenance LEFT JOIN users ON maintenance.id_pelanggan=users.id_user WHERE id='$id'");
$row=$data->fetch_assoc();




// $pdf=new FPDF();
$pdf = new tFPDF();
$pdf->AddPage();


$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,5, 'Laporan Hasil Kerja','0','1','C',false);
$pdf->Cell(0,5,'Revijaya Maintenance','0','1','C',false);
$pdf->Ln(5);
$pdf->SetFont('Arial','i',8);
$pdf->Cell(0,2,'Alamat : Jl.Jend.','0','1','L',false);
$pdf->Cell(0,2, 'No.Telp ,Kode Pos','0','1','R',false);
$pdf->Ln(2);
$pdf->Cell(190,0.6,'','0','1','C',true);
$pdf->Ln(10);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 7,'Pada surat ini kami informasikan bahwa pekerjaan pada :', 0, 1, 'L', false );
$pdf->Cell(0, 7,'Instansi               : '.$row['instansi'], 0, 1, 'L', false );
$pdf->Cell(0, 7, 'Keterangan         : '.$row['keterangan'], 0, 1, 'L', false );
$pdf->Cell(0, 7, 'Keluhan              : '.$row['keluhan'], 0, 1, 'L', false);
$pdf->Cell(0, 7, 'Jenis Pekerjaan  : '.$row['jenis_pekerjaan'], 0, 1, 'L', false);
$pdf->Ln(4);
$pdf->Cell(0, 7,'Atas permintaan pelanggan dibawah ini pada '.$row['tgl_masuk'].',', 0, 1, 'L', false );
$pdf->Cell(0, 7,'Nama                : '.$row['nama'], 0, 1, 'L', false );
$pdf->Cell(0, 7, 'Alamat              : '.$row['alamat'], 0, 1, 'L', false );
$pdf->Cell(0, 7, 'No Telp.           : '.$row['no_telp'], 0, 1, 'L', false);
$pdf->Cell(0, 7, 'Jenis Kelamin  : '.$row['jk'], 0, 1, 'L', false);
$pdf->Ln(4);
$pdf->Cell(0, 7,'Yang dilaksanakan pada tanggal '.$row['tgl_mulai'].' hingga '.$row['tgl_selesai'], 0, 1, 'L', false );
$pdf->Cell(0, 7,'dinyatakan telah selesai.', 0, 1, 'L', false );
$pdf->Ln(10);
$pdf->Cell(0, 7,'Demikian kami sampaikan atas perhatian dan kerjasamanya kami', 0, 1, 'L', false );
$pdf->Cell(0, 7,'ucapkan terimakasih.', 0, 1, 'L', false );

$pdf->ln(16);
$pdf->Cell(160, 4, "Jambi  . . . , . . . . . . , . . . ", 0, 0, 'R');

$pdf->ln(25);
$pdf->Cell(148, 4, "Direktur", 0, 0, 'R');
$pdf->ln(4);
$pdf->Cell(130, 0.0, '', 0, 0, 'R');
$pdf->Cell(20, 0.2, '', 1, 0, 'R', true);




$pdf->Output();

 ?>
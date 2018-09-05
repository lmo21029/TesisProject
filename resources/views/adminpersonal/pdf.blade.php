<?php
include('fpdf/fpdf.php');

$pdf = new FPDF('P','mm','Letter');
$pdf->SetMargins(8,18);
$pdf->AliasNbPages();
$pdf->AddPage();

//Conexion
define('DB_SERVER','localhost');
define('DB_NAME','trabajodegrado');
define('DB_USER','tesistas');
define('DB_PASS','1234');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS) or die (mysqli_error($con));
mysqli_select_db($con,DB_NAME) or die (mysqli_error($con));

//Titulo
$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(0,5,'Usuarios del Sistema', 0, 1, 'C');

//Establecer Tabla
$pdf->Ln();

//Usuarios
$sql2 = 'SELECT * FROM users' or die (mysqli_error($con));
$rec = mysqli_query($con,$sql2);
while($f = mysqli_fetch_array($rec)){

    $pdf->Cell(40,5,$f['id'],1,0,'C');
    $pdf->Cell(40,5,$f['name'],1,0,'C');
    $pdf->Cell(45,5,$f['apellido'],1,0,'C');
    $pdf->Cell(40,5,$f['email'],1,0,'C');
    $pdf->Cell(40,5,$f['cedula'],1,1,'C');
    $pdf->Cell(40,5,$f['id_rol'],1,1,'C');
    $pdf->Cell(40,5,$f['direccion'],1,1,'C');
    $pdf->Cell(40,5,$f['password'],1,1,'C');
    $pdf->Cell(40,5,$f['telefono'],1,2,'C');
    $pdf->Cell(40,5,$f['remember_token'],1,2,'C');
    $pdf->Cell(40,5,$f['created_at'],1,2,'C');
    $pdf->Cell(40,5,$f['updated_at'],1,2,'C');
    //$pdf->Cell(40,5,$f['Estado'],1,1,'C');
}
//$pdf->Cell(0,5,'', 0, 1, 'C');
//$pdf->Cell(0,5,'', 0, 1, 'C');
//$pdf->Cell(0,5,'Armeria', 0, 1, 'C');

$pdf->Ln();
//Armeria
/*$sql2 = 'SELECT * FROM armeria' or die (mysqli_error($con));
$rec = mysqli_query($sql2);
while($f = mysqli_fetch_array($rec)){

    $pdf->Cell(45,5,$f['Correo'],1,0,'C');
    $pdf->Cell(40,5,$f['Arma'],1,1,'C');
}

$pdf->Cell(0,5,'', 0, 1, 'C');
$pdf->Cell(0,5,'', 0, 1, 'C');
$pdf->Cell(0,5,'Partidas', 0, 1, 'C');

$pdf->Ln();
//Partidas
$sql2 = 'SELECT * FROM partida' or die (mysqli_error($con));
$rec = mysqli_query($sql2);
while($f = mysqli_fetch_array($rec)){

    $pdf->Cell(10,5,$f['IdPartidas'],1,0,'C');
    $pdf->Cell(45,5,$f['Correo'],1,0,'C');
    $pdf->Cell(40,5,$f['Partidas'],1,1,'C');
}

$pdf->Cell(0,5,'', 0, 1, 'C');
$pdf->Cell(0,5,'', 0, 1, 'C');
$pdf->Cell(0,5,'Juegos', 0, 1, 'C');

$pdf->Ln();
//Juegos
$sql2 = 'SELECT * FROM juegos' or die (mysqli_error($con));
$rec = mysqli_query($sql2);
while($f = mysqli_fetch_array($rec)){

    $pdf->Cell(10,5,$f['IdJuego'],1,0,'C');
    $pdf->Cell(45,5,$f['correo'],1,0,'C');
    $pdf->Cell(40,5,$f['Juegos'],1,1,'C');
}*/
$pdf->Output();

?>
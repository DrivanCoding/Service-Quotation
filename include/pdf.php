
<?php

require("fpdf/fpdf.php");


if(isset($_POST['teleharger'])){
class PDF extends FPDF
{
// En-tête
function Header()
{
    // Logo
   $this->Image('../assets/img/logo.png',10,6);
    // Police Arial gras 15
    $this->SetFont('Arial','B',15);
    // Décalage à droite
    $this->Cell (80);
    $this->Cell (50);
    // Titre
    $this->Cell(100,10,'BY Gajelabs Solution');
    // Saut de ligne
    $this->Ln(20);
}

// Pied de page
function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    // Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
function title(){
$this->SetFont('Arial','B',25);
$this->Ln(20);
$this->Cell (50);
$this->Cell(10,10,'Service Quotation');
}
function content(){
    $this->Ln(40);
    $this->SetFont('Arial','B',15);
    $this->Cell(10,10,'Nom Client: ');
    $this->Cell(70);
    $this->Cell(10,10,'IVAN');
    
    $this->Ln(20);
    $this->SetFont('Arial','B',15);
    $this->Cell(10,10,'Nom Service:  ');
     $this->Cell(70);
    $this->Cell(10,10,$_POST['nomService']);
    
    $this->Ln(20);
    $this->SetFont('Arial','B',15);
    $this->Cell(10,10,'Categorie Service  :  ');
     $this->Cell(70);
    $this->Cell(10,10, $_POST['categorieService']);
    
    $this->Ln(20);
    $this->SetFont('Arial','B',15);
    $this->Cell(10,10,'Nom de Domaine:  ');
     $this->Cell(70);
    $this->Cell(10,10,$_POST["nomDomain"]);
    
    $this->Ln(20);
    $this->SetFont('Arial','B',15);
    $this->Cell(10,10,'Mode d\' Hebergement :  ');
     $this->Cell(70);
    $this->Cell(10,10,$_POST["ModeHeber"]);

}
}


// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf-> title();

$pdf-> content();
$pdf->Output();
}else{
    echo'e n est pas bon';
}
?>
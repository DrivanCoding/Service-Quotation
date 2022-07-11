
<?php

require("fpdf/fpdf.php");

// Cote administrateur

if(isset($_POST['submitAdmin'])){
   
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
    $nomClient=$_POST['nomclient'];
    $detaille=explode("<br>",$_POST['detaille']);
    $categorie=explode(":",$detaille[1]);
    $nomDomain=explode(":",$detaille[2]);
    $modeHeber=explode(":",$detaille[3]);

    $this->Ln(40);
    $this->SetFont('Arial','B',15);
    $this->Cell(10,10,'Nom Client: ');
    $this->Cell(70);
    $this->Cell(10,10,$nomClient);
    
    $this->Ln(20);
    $this->SetFont('Arial','B',15);
    $this->Cell(10,10,'Nom Service:  ');
     $this->Cell(70);
    $this->Cell(10,10,$_POST['nomService']);
    
    $this->Ln(20);
    $this->SetFont('Arial','B',15);
    $this->Cell(10,10,'Categorie Service  :  ');
     $this->Cell(70);
    $this->Cell(10,10,$categorie[1] );
    
    $this->Ln(20);
    $this->SetFont('Arial','B',15);
    $this->Cell(10,10,'Nom de Domaine:  ');
     $this->Cell(70);
    $this->Cell(10,10,$nomDomain[1]);
    
    $this->Ln(20);
    $this->SetFont('Arial','B',15);
    $this->Cell(10,10,'Mode d\' Hebergement :  ');
     $this->Cell(70);
    $this->Cell(10,10,$modeHeber[1]);

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

}

// cote clients
if(isset($_POST['teleharger'])){
    session_start();
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
       $this->Cell(10,10,$_SESSION['nomclient']);
       
       $this->Ln(20);
       $this->SetFont('Arial','B',15);
       $this->Cell(10,10,'Nom Service:  ');
        $this->Cell(70);
       $this->Cell(10,10,$_SESSION['nomService']);
       
       $this->Ln(20);
       $this->SetFont('Arial','B',15);
       $this->Cell(10,10,'Categorie Service  :  ');
        $this->Cell(70);
       $this->Cell(10,10, $_SESSION['categorieService']);
       
       $this->Ln(20);
       $this->SetFont('Arial','B',15);
       $this->Cell(10,10,'Nom de Domaine:  ');
        $this->Cell(70);
       $this->Cell(10,10,$_SESSION["nomDomain"]);
       
       $this->Ln(20);
       $this->SetFont('Arial','B',15);
       $this->Cell(10,10,'Mode d\' Hebergement :  ');
        $this->Cell(70);
       $this->Cell(10,10,$_SESSION["ModeHeber"]);
   
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
   
   }
?>
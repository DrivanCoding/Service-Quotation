<?php

include "create_quotation_table.php";
//insere les quotation des clients
if(isset($_POST['submit'])){
    session_start();

    global $wpdb;
    // recuperation des information du formulaire 
    $nomService= htmlspecialchars( $_POST['nomService']);
    $categorieService= htmlspecialchars( $_POST['categorieService']);
    $nomDomain= htmlspecialchars( $_POST['nomDomain']);
    $nomHebergeur= htmlspecialchars( $_POST['nomHebergeur']);
    $modeHeber= htmlspecialchars( $_POST['ModeHeber']);
    $statut="En cours";
    $detaille="<br> categorie de Service:".$categorieService."<br> nom de Hebergeur:".$nomHebergeur."<br> Mode Herbergement:".$modeHeber;
    $_SESSION["nomService"]=$nomService;
    $_SESSION["categorieService"]=$categorieService;
    $_SESSION["nomDomain"]=$nomDomain;
    $_SESSION["nomHebergeur"]=$nomHebergeur;
    $_SESSION["modeHeber"]=$modeHeber;
    echo'dqsdqsq';
    var_dump($_SESSION["nomService"]);
 var_dump($_SESSION["categorieService"]);
 var_dump($_SESSION["nomDomain"]);
 var_dump($_SESSION["ModeHeber"]);die;
    $wpdb->insert(
      "wp_quotation",
      array(
          "service_names"=>$nomService,
          "status_quotation"=>$statut,
          "detaille"=>$detaille,
      ),array(
          '%s',
          '%s',
          '%s'
      )
    );
     
   
    $insert_cotation=true;


}
?>

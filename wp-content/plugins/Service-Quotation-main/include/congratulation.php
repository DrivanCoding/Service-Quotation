<?php

include "create_quotation_table.php";
//insere les quotation des clients
if(isset($_POST['submit'])){
    global $wpdb;
    // recuperation des information du formulaire 
    $nomclient= htmlspecialchars( $_POST['nomclient']);
    $email= htmlspecialchars( $_POST['email']);
    $nomService= htmlspecialchars( $_POST['nomService']);
    $categorieService= htmlspecialchars( $_POST['categorieService']);
    $nomDomain= htmlspecialchars( $_POST['nomDomain']);
    $nomHebergeur= htmlspecialchars( $_POST['nomHebergeur']);
    $modeHeber= htmlspecialchars( $_POST['ModeHeber']);
    $statut="En cours";
    $detaille="<br> categorie de Service:".$categorieService."<br> nom de Hebergeur:".$nomHebergeur."<br> Mode Herbergement:".$modeHeber;
    $wpdb->insert(
      "wp_quotation",
      array(
          "service_names"=>$nomService,
          "status_quotation"=>$statut,
          "nomClient"=>$nomclient,
          "email"=>$email,
          "detaille"=>$detaille,
      ),array(
          '%s',
          '%s',
          '%s',
          '%s',
          '%s'
      )
    );
}
    if(isset($_POST['submit'])){
        session_start();
        global $wpdb;
        // recuperation des information du formulaire 
        $nomclient= htmlspecialchars( $_POST['nomclient']);
        $nomService= htmlspecialchars( $_POST['nomService']);
        $categorieService= htmlspecialchars( $_POST['categorieService']);
        $nomDomain= htmlspecialchars( $_POST['nomDomain']);
        $nomHebergeur= htmlspecialchars( $_POST['nomHebergeur']);
        $modeHeber= htmlspecialchars( $_POST['ModeHeber']);
        $_SESSION['nomclient']=$nomclient;
        $_SESSION['nomService']=$nomService;
        $_SESSION['categorieService']= $categorieService;
        $_SESSION['nomDomain']=$nomDomain;
        $_SESSION['nomHebergeur']=$nomHebergeur;
       $_SESSION['ModeHeber']= $modeHeber;

}
?>

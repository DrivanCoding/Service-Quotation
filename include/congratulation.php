<?php
//insere les quotation des clients
if(isset($_POST['submit'])){
    global $wpbd;
    $nomService=$_POST['nomService'];
    $statut="En cours";
    $detaille=" sa cotation";
  $wpbd->insert(
    "wp_quotation",
    array(
        "service_names"=>$nomService,
        "service_names"=>$statut,
        "statut_cotation"=>$detaille,
    )
  );  
}
?>
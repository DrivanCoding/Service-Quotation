
<!-- Les reglage sur les cotation -->
 <!-- <div class="wrap"> -->

 <!-- stoker les option  -->
 <?php 
if(isset($_POST['enregistre']) ){
    // update_option( 'nomDomaine1',$_POST['nomDomaine1']);
    // update_option( 'nomDomaine2',$_POST['nomDomaine2']);
    // update_option( 'nomDomaine3',$_POST['nomDomaine3']);
    // update_option( 'nomDomaine4',$_POST['nomDomaine4']);
    // update_option( 'modeHebergement1',$_POST['modeHebergement1']);
    // update_option( 'modeHebergement2',$_POST['modeHebergement2']);
    // update_option( 'modeHebergement3',$_POST['modeHebergement3']);
    // update_option( 'modeHebergement4',$_POST['modeHebergement4']);
 
    // echo'<div id="message" class="updated">'..'</div>';
    global $wpdb;
    $prop=$_POST['prop'];
    $table_prop = $wpdb->prefix . 'proprieter_quotation';
    $table_value = $wpdb->prefix . 'value_quotation';
    $idp=$wpdb->get_results( "SELECT MAX(id_property) as maxid FROM `".$table_prop."`");
    var_dump($idp);
    empty($idp)?$idp=0:$idp=$idp[0]->maxid;
 
 
    foreach ($prop as $key => $value) {  
        $wpdb->insert(
            $table_prop,
            array(
                "nom_property"  =>$value,
                "id_service" =>1,
            ),array(
                '%s',
                '%d'
            )
          );
      $valeurnom=array($_POST["nomVal".$key+1]);
      $valeurprix=array($_POST["montantVal".$key+1]);
      $valeurdetaille=array($_POST["detailleVal".$key+1]);
      for ($i=0; $i < 4; $i++) { 
        if(!(empty($valeurnom[$key][$i]) && empty($valeurprix[$key][$i]) && empty($valeurdetaille[$key][$i])) ){
            echo $idp;
            $wpdb->insert(
                $table_value,
                array(
                    "nomValeur"=>$valeurnom[$key][$i],
                    "PrixV" =>$valeurprix[$key][$i],
                   "detaille" =>$valeurdetaille[$key][$i],
                   "id_property" =>$idp+1
                ),array(
                    '%s',
                    '%d',
                    '%s',
                    '%d'
                )
              );
        }
      }
     
      $idp++;
    }
}
?>

 <!-- <h1>Reglage de la Cotation</h1>

 <form action="<?php echo str_replace('%7E','~', $_SERVER['REQUEST_URI']) ?>" name="quotation" method="post">
 -->

 <!-- bloc pour selectioner les service  -->
<!-- <div class="">
<h2>Nom de service </h2>
<select name="NomServiceSetting" id="NomServiceSetting">
    <option value="">Site web</option>
</select><br>
<span>Nom de Domaine</span><br><br>
            <label for="100">.com</label>
            <input type="number" id="nomDomaine" value="<?php echo get_option( 'nomDomaine1'); ?>" placeholder="montant($)" class="input" name="nomDomaine1"><br><br>
            <label for="100">.fr</label>
            <input type="number" id="nomDomaine"  value="<?php echo get_option( 'nomDomaine2'); ?>"   placeholder="montant($)" class="input" name="nomDomaine2"><br><br>
            <label for="100">.io</label>
            <input type="number" id="nomDomaine"  value="<?php echo get_option( 'nomDomaine3'); ?>"   placeholder="montant($)" class="input" name="nomDomaine3"><br><br>
            <label for="100">.org</label>
            <input type="number" id="nomDomaine"  value="<?php echo get_option( 'nomDomaine4'); ?>"   placeholder="montant($)" class="input" name="nomDomaine4"><br><br>
           
</div> -->


<!-- Donne les reglage de chaque service -->
<!-- <div class="serviceSetting">
    <div class="webpageSetting">
        <h3>Hebergement</h3> -->


        <!-- prix des mode d' hebergement --> 
    <!-- <div>
            <span>Capciter de stockage</span><br><br>
            <label for="100">Personnel</label>
            <input type="number" id="modeHebergement"  value="<?php echo get_option( 'modeHebergement1'); ?>"   placeholder="montant($)" class="input" name="modeHebergement1"><br><br>
            <label for="100">Standard</label>
            <input type="number" id="modeHebergement"  value="<?php echo get_option( 'modeHebergement2'); ?>"   placeholder="montant($)" class="input" name="modeHebergement2"><br><br>
            <label for="100">Premium</label>
            <input type="number" id="modeHebergement"  value="<?php echo get_option( 'modeHebergement3'); ?>"   placeholder="montant($)" class="input" name="modeHebergement3"><br><br>
            <label for="100">Expert</label>
            <input type="number" id="modeHebergement"  value="<?php echo get_option( 'modeHebergement4'); ?>"   placeholder="montant($)" class="input" name="modeHebergement4"><br><br>
            
        </div>

    </div>
</div>

<input type="submit" value="Enregistre" name="enregistre" id="save">
</form>
</div> -->

<div class="wrap">

<form action="<?php echo str_replace('%7E','~', $_SERVER['REQUEST_URI']) ?>" method="post">
    <div class="service">
    <h2>Service</h2>
        <fieldset>
            <legend>Nom</legend>
            <input type="text" name="nomService" id="">
        </fieldset>
    </div>
    <div class="prop">
        <h2>proprieter</h2>
        <div class="prop_item">
            <div class="element">
               
             <input type="text" placeholder="Nom de la propriete" name="prop[]" id="">
               
            </div>
            <div class="valeur1" id="valeur1">
                <h2>Valeur</h2>
                <div class="valeur_item">
                    
                    <input type="text" placeholder="Nom"  name="nomVal1[]" class="input">
                    <input type="number" placeholder="Montant($)" name="montantVal1[]" class="input">
                    <textarea name="detailleVal1[]" id="" ></textarea>
            </div>
            <div class="valeur_item">
                    
                    <input type="text" placeholder="Nom"  name="nomVal1[]" class="input">
                    <input type="number" placeholder="Montant($)" name="montantVal1[]" class="input">
                    <textarea name="detailleVal1[]" id="" ></textarea>
            </div>
            <div class="valeur_item">
                    
                    <input type="text" placeholder="Nom"  name="nomVal1[]" class="input">
                    <input type="number" placeholder="Montant($)" name="montantVal1[]" class="input">
                    <textarea name="detailleVal1[]" id="" ></textarea>
            </div>
            <div class="valeur_item">
                    
                    <input type="text" placeholder="Nom"  name="nomVal1[]" class="input">
                    <input type="number" placeholder="Montant($)" name="montantVal1[]" class="input">
                    <textarea name="detailleVal1[]" id="" ></textarea>
            </div>
            </div>

            <!-- <div class="btnajouteVal">
                    <button type="button" class="btnajout" id="btnajouteVal1">+</button>
                </div>
         -->

        </div>
        <hr>
    </div>
    <div class="ajouter">
                    <button type="button" class="btnajout" id="btnajouteProp">+</button>
         </div>

    <input type="submit" value="Enregistre" name="enregistre" id="save">
</form>

</div>

<!-- Les reglage sur les cotation -->
 <div class="wrap">

 <!-- stoker les option  -->
 <?php 
if(isset($_POST['enregistre']) ){
    update_option( 'nomDomaine1',$_POST['nomDomaine1']);
    update_option( 'nomDomaine2',$_POST['nomDomaine2']);
    update_option( 'nomDomaine3',$_POST['nomDomaine3']);
    update_option( 'modeHebergement1',$_POST['modeHebergement1']);
    update_option( 'modeHebergement2',$_POST['modeHebergement2']);
    update_option( 'modeHebergement3',$_POST['modeHebergement3']);
    update_option( 'modeHebergement4',$_POST['modeHebergement4']);
 
    echo'<div id="message" class="updated">'."enregistre avec succes".'</div>';
}
?>

 <h1>Reglage de la Cotation</h1>

 <form action="<?php echo str_replace('%7E','~', $_SERVER['REQUEST_URI']) ?>" name="quotation" method="post">


 <!-- bloc pour selectioner les service  -->
<div class="">
<h2>Nom de service </h2>
<select name="NomServiceSetting" id="NomServiceSetting">
    <option value="">Site web</option>
</select><br>
<span>Nom de Domaine</span><br><br>
            <label for="100">.com</label>
            <input type="number" id="nomDomaine"  placeholder="montant($)" class="input" name="nomDomaine1"><br><br>
            <label for="100">.fr</label>
            <input type="number" id="nomDomaine"  placeholder="montant($)" class="input" name="nomDomaine2"><br><br>
            <label for="100">.io</label>
            <input type="number" id="nomDomaine"  placeholder="montant($)" class="input" name="nomDomaine3"><br><br>
           
</div>


<!-- Donne les reglage de chaque service -->
<div class="serviceSetting">
    <div class="webpageSetting">
        <h3>Hebergement</h3>


        <!-- prix des mode d' hebergement --> 
    <div>
            <span>Capciter de stockage</span><br><br>
            <label for="100">Personnel</label>
            <input type="number" id="modeHebergement"  placeholder="montant($)" class="input" name="modeHebergement1"><br><br>
            <label for="100">Standard</label>
            <input type="number" id="modeHebergement"  placeholder="montant($)" class="input" name="modeHebergement2"><br><br>
            <label for="100">Premium</label>
            <input type="number" id="modeHebergement"  placeholder="montant($)" class="input" name="modeHebergement3"><br><br>
            <label for="100">Expert</label>
            <input type="number" id="modeHebergement"  placeholder="montant($)" class="input" name="modeHebergement4"><br><br>
            
        </div>

    </div>
</div>

<input type="submit" value="Enregistre" name="enregistre" id="save">
</form>
</div>
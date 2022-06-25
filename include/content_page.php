<?php
$content='
<body>
<form action="../wp-content/plugins/Service-Quotation/include/pdf.php" method="post">
<section class="cotation">   
   <div class="img"></div>  
<div class="allblog">
    <h3>INFORMATION SUR LE SERVICE </h3>
  <div class="content_item">  
  <div class="label">
    <label for="nomService">Nom de Servicee</label>
    <label for="categorieService">categorie du Servicee</label>
  </div>
  <div class="option">
    <select name="nomService" id="nomService">
        <option value="web">Site web</option>
    </select>

    <select name="categorieService" id="categorieService">
        <option value="">E-commerce</option>
        <option value="">Maket-place</option>
        <option value="">E-learning</option>
        <option value="">Chat</option>
        <option value="">Documentation</option>
    </select> 
  </div>
</div>
<h3>Type de site</h3>     
<div class="content_item ">  
    <div class="label">
        <label for="typesite">Type de site</label>
        <label for="typesite">Nom de Dommaine</label>
    </div>
    <div class="option">
        <select  name="typeSite" id="typeSite">
            <option value="">Statique</option>
            <option value="">Dynamique</option>
        </select>  

        <select  name="nomDomain" id=nomDomain">
        <option value="">.com</option>
        <option value="">.fr</option>
        <option value="">.io</option>
        <option value="">.org</option>
        </select>  

    </div>
</div>
    <h3>Hebergement</h3>     
<div class="content_item ">  
    <div class="label">
        <label for="nomHebergement">Nom de Hebergeur</label>
        <label for="categorieHerb">Mode d\' Hebergement</label>
    </div>
    <div class="option">
        <select  name="nomHebergement" id="nomHebergement">
            <option value="">Wordpress</option>
            <option value="">Broostrape</option>
            <option value="">GitHub</option>
        </select>  
         
        <select name="ModeHeber" id="ModeHeber">
            <option value="">Personnel</option>
            <option value="">Standard</option> 
            <option value="">Prenum</option> 
            <option value="">Expert</option> 
        </select>
    </div>
</div>
  

<div class="content_item " id="option_detaille">  
    <div class="labelOption">
        <label for="Capaciter">Capacite de stokage</label>
        <label for="ram">Capaciter de la RAM</label>
        <label for="ram">Nombre de VCPU partager</label>
        <label for="ram">Nombre de Base de donnée</label>
        <label for="ram">Nombre d\' adresse E-mail</label>
        <label for="ram">Nombre de site a Heberger</label>
        <label for="ram">Securite SSL</label>
    </div>
    <div class="option">
      <span class="option_value" id="capaciter" name="capaciter"> </span>             
      <span class="option_value" id="ram" name="ram"> </span>             
      <span class="option_value" id="nbrVcpu" name="nbrVcpu"> </span>             
      <span class="option_value" id="nbrBd" name="nbrBd"> </span>             
      <span class="option_value" id="nbremail" name="nbremail"> </span>             
      <span class="option_value" id="nbrsite" name="nbrsite"> </span>             
      <span class="option_value" id="securiter" name="securiter"> </span>             
</div>
    </div>
        <div class="content_item "> 
            <div class="submite">
            <input type="button" class="submit" value="Request quotation">
            </div>
   
       </div>
       <div class="request">
       <div class="request_item"><h2 id="devis"></h2> </div>
           <div class="request_item">
           <button type="submit"  name="request"><span class="dashicons dashicons-media-document" width=4></span>Telecharger Votre cotation</button>
     
           </div>
       </div>
   </div>
    </div>
</section>
</form>

';?>

<?php
$args=array(
    'sort_order' =>'asc',
    'sort_column' => 'post_title',
    'post_type' =>'page',
    'post_status' =>'publish'
        );
    $pages=get_pages( $args );
    $link_page="#";
    foreach ($pages as $key => $value) {
        $id=$value->ID;
        $post_title=$value->post_title;
        if($post_title=='congratulation_quotation'){
              $link_page= get_permalink($id);
         break;
        }
    }
   
// Contenue de la page crée par le plugin
$content='
<body>
<form action="'.$link_page.'" method="post">
<section class="cotation">    
<div class="allblog">
    <h3>INFORMATION SUR LE SERVICE </h3>
  <div class="content_item">  
  <div class="label">
    <label for="nomService">Nom de Servicee</label>
    <label for="categorieService">categorie du Servicee</label>
  </div>
  <div class="option">
    <select name="nomService" id="nomService">
        <option value="Site web">Site web</option>
    </select>

    <select name="categorieService" id="categorieService">
        <option value="E-commerce" >E-commerce</option>
        <option value="Maket-place" >Maket-place</option>
        <option value="E-learning" >E-learning</option>
        <option value="Chat" >Chat</option>
        <option value="Documentation" >Documentation</option>
    </select> 
  </div>
</div>
<h3>Domaine</h3>     
<div class="content_item ">  
    <div class="label">
        <label for="typesite">Nom de Dommaine</label>
    </div>
    <div class="option">
        <select  name="nomDomain" id="nomDomain">
        <option value=".com">.com</option>
        <option value=".fr">.fr</option>
        <option value=".io">.io</option>
        <option value=".org">.org</option>
        </select>  

    </div>
</div>
    <h3>Hebergement</h3>     
<div class="content_item ">  
    <div class="label">
        <label for="nomHebergeur">Nom de Hebergeur</label>
        <label for="categorieHerb">Mode d\' Hebergement</label>
    </div>
    <div class="option">
        <select  name="nomHebergeur" id="nomHebergeur">
            <option value="Wordpress">Wordpress</option>
            <option value="Broostrape">Broostrape</option>
            <option value="GitHub">GitHub</option>
        </select>  
         
        <select name="ModeHeber" id="ModeHeber">
            <option value="Personnel">Personnel</option>
            <option value="Personnel">Standard</option> 
            <option value="Prenum">Prenum</option> 
            <option value="Expert">Expert</opExperttion> 
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
        <div class="request_item"><h2 id="devis"></h2> </div><br>
       </div>
       <div class="content_item "> 
           <div class="submite">
           <input type="submit" class="submit" id="request" name="submit" value="Request quotation">
           </div>
      </div>
   </div>
    </div>
</section>

</form>

';?>

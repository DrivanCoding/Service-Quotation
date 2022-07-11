<?php

   
// Contenue de la page crée par le plugin
$content='
<body>
    <form action="'.$link_page.'" method="post">
        <section class="cotation">
            <div class="imgquotation">

            </div>    
        <div class="allblog">
            <div class="titre">
            <h3>INFORMATION SUR LE SERVICE </h3>
            </div>
          <div class="content_item">  
       <fieldset>
        <legend>Nom service</legend>
            <select name="nomService" id="nomService">
                <option value="Site web">Site web</option>
            </select>
        </fieldset>
        <fieldset>
            <legend> Categorie service</legend>
            <select name="categorieService" id="categorieService">
                <option value="E-commerce" >E-commerce</option>
                <option value="Maket-place" >Maket-place</option>
                <option value="E-learning" >E-learning</option>
                <option value="Chat" >Chat</option>
                <option value="Documentation" >Documentation</option>
            </select> 
        </fieldset>
        </div>
        
        <div class="content_item ">  
           <fieldset>
            <legend>Nom de Domaine</legend>
                <select  name="nomDomain" id="nomDomain">
                <option value=".com">.com</option>
                <option value=".fr">.fr</option>
                <option value=".io">.io</option>
                <option value=".org">.org</option>
                </select>  
            </fieldset>
            
        </div>   
        <div class="content_item ">  
       
            <fieldset>
                <legend>Nom Hebergeur</legend>è
                <select  name="nomHebergeur" id="nomHebergeur">
                    <option value="Wordpress">Wordpress</option>
                    <option value="Broostrape">Broostrape</option>
                    <option value="GitHub">GitHub</option>
                </select>  
            </fieldset>
                <fieldset>
                    <legend>Mode d\' Hebergement</legend> 
                <select name="ModeHeber" id="ModeHeber">
                    <option value="Personnel">Personnel</option>
                    <option value="Standard">Standard</option> 
                    <option value="Prenum">Prenum</option> 
                    <option value="Expert">Expert</opExperttion> 
                </select>
            </fieldset>
        </div>
          
        <div class="detaille_mode">
        <div class="" id="option_detaille"> 
            <div class="titre">
            <h3 id="titre_detaille"> TITRE</h3>
            </div>
            <div class="content_item "> 
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
        </div>
            </div>
                <div class="content_item "> 
                <div class="request_item"><h2 id="devis">Mon devis</h2> </div><br>
               </div>
              <div class="client">
               <div class="infosClient">
                <div class="titre">
                    <h2>Renseignier nous sur vous</h2>
                </div>
                <div class="content_item">
                    <fieldset>
                        <legend>Nom <font color="red">*</font></legend>
                        <input class="input" type="text" placeholder="Nom" name="" id="">
                    </fieldset>
                    <fieldset>
                        <legend>E-mail <font color="red">*</font></legend>
                        <input class="input" type="email" placeholder="E-mail" name="" id="">
                    </fieldset>
                </div>
             </div>
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

<?php
/*
plugin Name:service quotation
Description: permet de ressortir la cotation des different client a 
plugin URL:http://wordpress.com
Author:Gajelabs
Author URL:http://wordpress.com
*/
function quotation_page(){
    add_menu_page('Quotation','Quotation','administrator','quotation','quotation_function','dashicons-media-text',40);
    //add_submenu_page('options-general.php','plugin de popup | Reglage','Reglage de la popup','administrator','popup_jb','popup_jb_function');
    

    $page = array( 'post_title' => 'Service Quotation', 'post_content' => '
    <body>
    <form action="" method="post">
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
          <span class="option_value" id="capaciter"> </span>             
          <span class="option_value" id="ram"> </span>             
          <span class="option_value" id="nbrVcpu"> </span>             
          <span class="option_value" id="nbrBd"> </span>             
          <span class="option_value" id="nbremail"> </span>             
          <span class="option_value" id="nbrsite"> </span>             
          <span class="option_value" id="securiter"> </span>             
    </div>
</div>
    <div class="content_item ">  
      <input type="submit" value="Request quotation">
    
  </div>
</div>
</section>
</form>
<div class="request">
</div>

    ', 'post_status' => 'publish', 'post_author' => 1, 'post_type' => 'page'
   
); 
 
    $args=array(
        'sort_order' =>'asc',
        'sort_column' => 'post_title',
        'post_type' =>'page',
        'post_status' =>'publish'
            );
        $pages=get_pages( $args );
        foreach ($pages as $key => $value) {
            $id=$value->ID;
            $post_title=$value->post_title;
            if($post_title=='Service Quotation'){
                wp_delete_post($id,true);
                $post_title="";
             break;
            }
        }
        if($post_title!='Service Quotation'){
            wp_insert_post( $page );
        }
}
add_action('admin_menu','quotation_page');
//Inclure la page admind.php
function quotation_function(){
    include_once "include/admin.php";
}

//charge le js et le css du cote des administrateurs
function style_setting(){
    wp_enqueue_script('jb_popup',plugins_url('assets/js/settingcotation.js',__FILE__),array('jquery'),'1.0',false);
    wp_enqueue_style('jb_popup',plugins_url('assets/css/setting.css',__FILE__));
}
add_action('admin_menu','style_setting');

// charge le js et le css du cote client 
function style_quotation(){
   
    wp_enqueue_style('jb_popup',plugins_url('assets/css/formulaire.css',__FILE__));
}
function script_quotation(){
    wp_enqueue_script('jb_popup',plugins_url('assets/js/serviceClient.js',__FILE__),array('jquery'),'1.0',false);
}
add_action('wp_head','style_quotation');
add_action('wp_footer','script_quotation');
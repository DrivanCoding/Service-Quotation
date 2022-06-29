<?php
/*
plugin Name:service quotation
Description: permet de ressortir la cotation des different client a 
plugin URL:http://wordpress.com
Author:Gajelabs
Author URL:http://wordpress.com
*/
session_start();
function load_quotation(){
    include_once "include/create_quotation_table.php";
}

register_activation_hook(__FILE__,'load_quotation' );


function quotation_page(){
    add_menu_page('Quotation','Quotation','administrator','quotation','quotation_function','dashicons-media-text',40);
    //add_submenu_page('options-general.php','plugin de popup | Reglage','Reglage de la popup','administrator','popup_jb','popup_jb_function');
    
    include_once "include/content_page.php";
    include_once "include/create_page.php";
    
   
}
add_action('admin_menu','quotation_page');


//Inclure la page admind.php
function quotation_function(){
    include_once "include/admin.php";
}



//charge le js et le css du cote des administrateurs
function style_setting(){
    wp_enqueue_script('gj_qoutation',plugins_url('assets/js/settingcotation.js',__FILE__),array('jquery'),'1.0',false);
    wp_enqueue_style('gj_qoutation',plugins_url('assets/css/setting.css',__FILE__));
}
add_action('admin_menu','style_setting');



// charge le js et le css du cote client 
function style_quotation(){
   
    wp_enqueue_style('gj_qoutation',plugins_url('assets/css/formulaire.css',__FILE__));
    //   inclure les insersion des données dans la bd
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
  
}
function script_quotation(){

    // charger le sccripe dans le footer pour affiher la devise estimative
    wp_enqueue_script('gj_qoutation',plugins_url('assets/js/serviceClient.js',__FILE__),array('jquery'),'1.0',false);
    $prix_quotation= array( get_option( 'nomDomaine1'),
   get_option( 'nomDomaine2'),
   get_option( 'nomDomaine3'),
   get_option( 'nomDomaine4'),
   get_option( 'modeHebergement1'),
   get_option( 'modeHebergement2'),
   get_option( 'modeHebergement3'),
   get_option( 'modeHebergement4'));
    echo"<span id='prix_quotation' style='display:none;'>  ";
   for ($i=0; $i <count($prix_quotation); $i++) { 
     if($i==3){
       echo $prix_quotation[$i]."|"; 
     }
     else{
        if( $i==count($prix_quotation)-1 ){
            echo $prix_quotation[$i];
        }else{
        echo $prix_quotation[$i].",";
     }
    }
    
   }
   echo "</span>";
   include_once "include/congratulation.php";

    
}
add_action('wp_head','style_quotation');
add_action('wp_footer','script_quotation');

function congratulation(){
    return'
    <section class="congratulation_all" style="    display:none;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100vh;" >
    
    <div class="congratulation_item" style="background-color: aliceblue;
    width: 50%;
    height: 50%;
    display: flex;
    flex-direction: column;
    align-items: center;
    box-shadow: 0PX 0PX 8PX 0PX gray;">

    <div class="text">
        <h1>Congratulation</h1>
    </div>
    <div class="boutton">
       
         <button type="submit" name="teleharger">Telecharger la Cotation</button>
       
    </div>
</div>
</section>

    ';
}
 add_shortcode('congratulation','congratulation');
<?php
/*
plugin Name:service quotation
Description: permet de ressortir la cotation des different client a 
plugin URL:http://wordpress.com
Author:Gajelabs
Author URL:http://wordpress.com
*/

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
}
function script_quotation(){
    wp_enqueue_script('gj_qoutation',plugins_url('assets/js/serviceClient.js',__FILE__),array('jquery'),'1.0',false);
    $prix_quotation= array( get_option( 'nomDomaine1'),
   get_option( 'nomDomaine2'),
   get_option( 'nomDomaine3'),
   get_option( 'nomDomaine4'),
   get_option( 'modeHebergement1'),
   get_option( 'modeHebergement2'),
   get_option( 'modeHebergement3'),
   get_option( 'modeHebergement4'));
    echo"sqdq".$prix_quotation[0]."<span id='prix_quotation'>  ";
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
}
add_action('wp_head','style_quotation');
add_action('wp_footer','script_quotation');

// function hello(){
//     return"";
// }
// add_shortcode('hellos','hello');
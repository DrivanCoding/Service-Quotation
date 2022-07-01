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
    include_once "include/content_page.php";
    include_once "include/create_page.php";
}
function out_quotation(){
    include_once "include/delete.php";
}

register_activation_hook(__FILE__,'load_quotation' );
register_deactivation_hook(__FILE__,'out_quotation' );


function quotation_page(){
    add_menu_page('Quotation','Quotation','administrator','quotation','quotation_function','dashicons-media-text',40);
    add_submenu_page('quotation',' conslutation| Reglage cotation','All quotation','administrator','quotation_conslute','consutation_quotation');
   
}

add_action('admin_menu','quotation_page');

function consutation_quotation(){   
    include_once("include/all_quotation.php");
      
  }
//Inclure la page admin.php
function quotation_function(){
    include_once "include/admin.php";
}



//charge le js et le css du cote des administrateurs
function style_setting(){
    wp_enqueue_script('gj_qoutation',plugins_url('assets/js/settingcotation.js',__FILE__),array('jquery'),'1.0',false);
    wp_enqueue_script('gj_qoutation',plugins_url('assets/js/setting_allcotation.js',__FILE__),array('jquery'),'1.0',false);
    wp_enqueue_style('gj_qoutation',plugins_url('assets/css/setting.css',__FILE__));
}
add_action('admin_menu','style_setting');



// charge le js et le css du cote client dans le header 
function style_quotation(){
   
    wp_enqueue_style('gj_qoutation',plugins_url('assets/css/formulaire.css',__FILE__));
   
}
// charger les element dans le footer 
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

    //   inclure les insersion des données dans la bd
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
   include_once "include/congratulation.php";
   
   //contenu de la page congratulation

   $args=array(
    'sort_order' =>'asc',
    'sort_column' => 'post_title',
    'post_type' =>'page',
    'post_status' =>'publish'
        );
    $pages=get_pages( $args );
    $id_page=get_the_ID();
    foreach ($pages as $key => $value) {
        $id=$value->ID;
        $post_title=$value->post_title;
        if($post_title=='congratulation_quotation'){
            if($id==$id_page){
            echo'   
            <section class="congratulation_all" style="background: linear-gradient(rgba(255, 255, 255, 0.53),rgba(128, 128, 128, 0.585)),url('.plugins_url("assets/img/cotation.png",__FILE__).');">
              
                <div class="congratulation_item">
                <div class="text">
                    <h1>Congratulation</h1>
                </div>
                <div class="boutton">
                    <form action="'.plugins_url("include/pdf.php",__FILE__).'" target="_blank "  method="post">
                     <button type="submit" name="teleharger"> <span class="dashicons dashicons-media-document"></span>Telecharger la Cotation</button>
                    </form>
                </div>
            </div>
        </section>';
    }
         break;
        }
    }
   
    
}
add_action('wp_head','style_quotation');
add_action('wp_footer','script_quotation');


// function congratulation(){
//     return'
//     <section class="congratulation_all" style=" 
//     position:fixed;
//     top:0px;
//     background:Gray;
//     display:flex;
//     justify-content: center;
//     align-items: center;
//     width: 100%;
//     height: 100vh;" >
    
//     <div class="congratulation_item" style="background-color: aliceblue;
//     width: 50%;
//     height: 50%;
//     display: flex;
//     flex-direction: column;
//     align-items: center;
//     box-shadow: 0PX 0PX 8PX 0PX gray;">

//     <div class="text">
//         <h1>Congratulation</h1>
//     </div>
//     <div class="boutton">
       
//          <button type="submit" name="teleharger">Telecharger la Cotation</button>
       
//     </div>
// </div>
// </section>

//     ';
// }
//  add_shortcode('congratulation','congratulation');
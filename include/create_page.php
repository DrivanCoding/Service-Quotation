<?php
   $page = array( 'post_title' => 'Service Quotation', 'post_content' => $content, 'post_status' => 'publish', 'post_author' => 1, 'post_type' => 'page'
   
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
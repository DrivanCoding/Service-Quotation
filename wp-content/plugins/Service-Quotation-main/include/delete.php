<?php
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
        
        }
        if($post_title=='congratulation_quotation'){
            wp_delete_post($id,true);
        
        }
    }
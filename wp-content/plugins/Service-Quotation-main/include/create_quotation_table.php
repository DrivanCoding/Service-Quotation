<?php

     global $wpdb;

     $nomService="site web";
     $statut="En cours";
     $detaille=" sa cotation";
     $table_name = $wpdb->prefix . 'quotation';
     $wpdb_collate = $wpdb->collate;
     $sql =
         "CREATE TABLE {$table_name} (
         id int  auto_increment ,
         service_names varchar(55) ,
         status_quotation varchar(15) ,
         nomClient varchar(15) ,
         email varchar(15) ,
         detaille TEXT,
         PRIMARY KEY  (id)
         )
         COLLATE {$wpdb_collate}";

  
     require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
     dbDelta( $sql );
   
     

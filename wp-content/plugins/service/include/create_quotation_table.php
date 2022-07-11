<?php

     global $wpdb;

   
     $table_service = $wpdb->prefix . 'service_quotation';
     $wpdb_collate = $wpdb->collate;
     $sqlm =
         "CREATE TABLE {$table_service} (
        id_service int  auto_increment ,
        nomService varchar(55), 
        PRIMARY KEY(id_service)
       
         )
         COLLATE {$wpdb_collate}";

  
     require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
     dbDelta( $sqlm );
   
     
        
     $table_prop = $wpdb->prefix . 'proprieter_quotation';
     $wpdb_collate = $wpdb->collate;
     $sqlp =
         "CREATE TABLE {$table_prop} (
        id_property  int  auto_increment PRIMARY KEY,
        nom_property varchar(55) ,
        id_service int,
        CONSTRAINT
        FOREIGN KEY(id_service) REFERENCES ".$table_service." (id_service)
            
         )
         COLLATE {$wpdb_collate}";

  
     require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
     dbDelta( $sqlp );
   


         
     $table_value = $wpdb->prefix . 'value_quotation';
     $wpdb_collate = $wpdb->collate;
     $sqlv =
         "CREATE TABLE {$table_value} (
            id int  auto_increment PRIMARY KEY,
            nomValeur varchar(55) ,
            PrixV varchar(55) ,
            detaille TEXT ,
            id_property int,
            CONSTRAINT
            FOREIGN KEY(id_property) REFERENCES ".$table_prop." (id_property)
            
         )
         COLLATE {$wpdb_collate}";

  
     require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
     dbDelta( $sqlv );




            
     $table_quotation = $wpdb->prefix . 'quotation';
     $wpdb_collate = $wpdb->collate;
     $sqlq =
         "CREATE TABLE {$table_quotation} (
            id_quotation int  auto_increment PRIMARY KEY,
            nomClient varchar(55) ,
            emailClient varchar(55) ,
            status_quotation varchar(15) ,
            id_service int,
            CONSTRAINT
            FOREIGN KEY(id_service) REFERENCES ".$table_service." (id_service)
            
         )
         COLLATE {$wpdb_collate}";

  
     require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
     dbDelta( $sqlq );

<?php
if (isset($_POST["teleharge"])){
   
}
?>
<h1>ALL QUOTATION</h1>
<div class="wrap">
<table>
 <tr>
    <th>Id</th>
    <th>Id</th>
    <th>Nom service</th>
    <th>Status</th>
    <th>Pdf</th>
    <th>Detaille</th>
 </tr>   
<?php

global $wpdb;
        $mylink = $wpdb->get_results( "SELECT * FROM `wp_quotation`");
      foreach ($mylink as  $value) { ?>
          <form action="<?php echo plugins_url("pdf.php",__FILE__) ?>" method="post">
        <tr class="simple_display">
       
            <td > 

           <input class="display_input"  type="text" value="<?php echo $value->id ?>">
            <?php echo $value->id ?> 

            </td>
            <td > 

        <input class="display_input"  type="text" value="<?php echo $value->nomClient ?>" name="nomclient">
        <?php echo $value->nomClient ?> 

 </td>
            <td > 

            <input class="display_input" type="text" value="<?php echo $value->service_names?> " name="nomService">
            <?php echo $value->service_names?> 

            </td>
            <td > 

            <input class="display_input" type="text" value="<?php echo $value->status_quotation?> " >
            <?php echo $value->status_quotation?> 

            </td>
            
            <td><button type="submit" name="submitAdmin" class="pdf">PDF</button> </td>
            <td><button type="button"  class="more"> more ... </button></td>
           
        </tr>
        <tr class="detailles">
    <td class="detaille" colspan="5" id="<?php echo $value->id ?>">
    <div class="fermer_item"><button type="button" class="fermer" >x</button></div>
   <div> <?php echo $value->detaille ?>
   <input class="display_input" type="text" value="<?php echo $value->detaille?> " name="detaille">
</div> </td>
</tr>
</form>   

     
<?php
        
      }
      ?>      
  </div>
  


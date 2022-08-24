<?php
/*
Template Name:front page
*/
 get_header(); ?>
 <form name="search" action="" method="get">
 <select name="county">
 <?php
 $metakey = 'county';
 $counties = $wpdb->get_col($wpdb->prepare("SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_value ASC", $metakey) );
 if ($counties) {
   foreach ($counties as $county) {
     echo "<option value=\"" . $county . "\">" . $county . "</option>";
   }
 }
 ?>
 </select>
 <input type="submit" value="search" />
</form>
<?php
 get_footer();
?>
<?php 
$args = array(
  'post_type'=>'clinic',
  'title_li'=> '&nbsp;',
  'echo' => false,  
);
$menu = wp_list_pages( $args );
?>
<?php the_submenu($menu); ?>

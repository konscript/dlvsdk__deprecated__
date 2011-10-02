<?php 
// Safety first.
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'functions.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly!');

// load up jQuery from Google CDN
if( !is_admin()){
   wp_deregister_script('jquery'); 
   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"), false, '1.6.2'); 
   wp_enqueue_script('jquery');
}

wp_register_script('jquery', ("http://ajax.goosgleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"), false, '1.6.2'); 
wp_enqueue_script('jquery');

// Remove useless the_generator meta tag - whoops
add_filter( 'the_generator', create_function('$a', "return null;") );

// Custom Logo
function custom_logo() { ?> 
	<style type="text/css">
		h1 a { background-image: url(
			<?php get_bloginfo('template_directory'); ?>/img/logo-login.gif
		) !important; }
    </style>
<?php }

add_action('login_head', 'custom_logo');

// Admin Footer
function remove_footer_admin () {
	echo 'Powered by Konscript';
}

add_filter('admin_footer_text', 'remove_footer_admin');

/**
 * Frontpage widgets
 ***************************************************************************************/
	if (function_exists('register_sidebar')) {
		register_sidebar(array(
			'name' => 'Left Column',
			'id'   => 'left_column',
			'description'   => 'Widget area for left column on front page',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		));
		register_sidebar(array(
			'name' => 'Center Column',
			'id'   => 'center_column',
			'description'   => 'Widget area for center column on front page',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		));
		register_sidebar(array(
			'name' => 'Right Column',
			'id'   => 'right_column',
			'description'   => 'Widget area for right column on front page',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>'
		));
	}

/**
 * Show specific widget on frontpage
 ***************************************************************************************/
class SpecificPost extends WP_Widget {
	/** constructor */
	function SpecificPost() {
		parent::WP_Widget( 'specificpost', $name = 'Specific Post' );
	}

	/** @see WP_Widget::widget */
	function widget( $args, $instance ) {
		extract( $args );
		$id = apply_filters( 'widget_id', $instance['id'] );		
		$post =  wp_get_single_post( $id );
		
		$title = $post->post_title;
		
		// if no excerpt is made, take the first 200 characters from the content
		$content = empty($post->post_excerpt) ? konscript_excerpt(200, $post->post_content) : $post->post_excerpt;
		$permalink = ' <a class="readmore" href="'.$post->post_name.'">Read more</a>';
		echo $before_widget;
		echo $before_title . $title . $after_title . $content . $permalink; 
		echo $after_widget;
	}

	/** @see WP_Widget::update */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['id'] = strip_tags($new_instance['id']);
		return $instance;
	}

	/** @see WP_Widget::form */
	function form( $instance ) {
		if ( $instance ) {
			$id = esc_attr( $instance[ 'id' ] );
		}
		else {
			$id = __( 'New id', 'text_domain' );
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id('id'); ?>"><?php _e('id:'); ?></label> 
			<select name="<?php echo $this->get_field_name('id'); ?>">
				<?php foreach(query_posts('order=year') as $post): ?>
					<option <?php echo $id == $post->ID ? "selected" : ""; ?> value="<?php echo $post->ID; ?>"><?php echo $post->post_title; ?></option>
				<?php endforeach;	?>		
			</select>		
		</p>
		<?php 
	}

} // class SpecificPost

// register SpecificPost widget
add_action( 'widgets_init', create_function( '', 'return register_widget("SpecificPost");' ) );


/**
 * submenus
 ***************************************************************************************/
function sidebar_page() {
	include("submenu-page.php");
}
function sidebar_cat() {
	include("submenu-cat.php");
}

/*
 * meta box with dynamic menus
 ****************/
require_once 'functions/meta-box/meta-box.class.php';
include 'functions/DynamicMenus.php';

/**
##########################################
# INCLUDE AND REGISTER CUSTOM POST TYPES #
##########################################
**/

// Include custom post type scripts.
require_once('functions/post-type-faq.php');
require_once('functions/post-type-vaccination.php');

/**
#############################
# REGISTER NAVIGATION AREAS #
#############################
**/
function theme_addmenus() {
	register_nav_menus(
		array('main' => 'Main Menu')
	);
}
add_action( 'init', 'theme_addmenus' );

// primary menu with search
function primary_menu(){

	/****
	 * custom post type menu ancestor fix
	 * NB. Remember to add slug as title attribute in menu manager!
	 * http://wordpress.stackexchange.com/questions/3014/highlighting-wp-nav-menu-ancestor-class-w-o-children-in-nav-structure
	 ******/
	add_filter('nav_menu_css_class', 'current_type_nav_class', 10, 2 );
	function current_type_nav_class($classes, $item) {
		$post_type = get_query_var('post_type');
		
		// if current menu item is of the same post type
		if ($item->attr_title != '' && $item->attr_title == $post_type) {
		    array_push($classes, 'current-menu-item');
		    array_push($classes, 'dlvs-custom-post-type');		    
		};
		return $classes;
	}			
	
    $menu = wp_nav_menu(array(
		'theme_location' 	=> 'main',
		'container'=> false,
		'echo'            => true,

	));
	
	get_search_form(); 
}

/**
#############################
# SHORTEN EXCERPT			#
#############################
**/
function konscript_excerpt($length, $str) {
   if(strlen($str)>$length) {
       $subex = substr($str,0,$length-5);
       $exwords = explode(" ",$subex);
       $excut = -(strlen($exwords[count($exwords)-1]));
       if($excut<0) {
            $res = substr($subex,0,$excut);
       } else {
       	    $res = $subex;
       }
       $res .= "[...]";
   } else {
	   $res = $str;
   }
   
   return $res;
}

require_once( get_template_directory() . '/lib/admin/theme-options.php' );

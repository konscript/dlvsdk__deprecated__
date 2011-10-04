<?php
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
	
?>

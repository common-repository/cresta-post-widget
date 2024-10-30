<?php
/*
Plugin Name: Cresta Post Widget FREE
Plugin URI: http://crestaproject.com/downloads/cresta-post-widget/
Description: Widget for show all posts or filter by category. Many options available including show thumbnail, excerpt, date and comments count.
Author URI: http://crestaproject.com
Author: CrestaProject - Rizzo Andrea
Version: 1.0
*/

/**
 * Widget Post: Cresta Post Widget FREE
 * CrestaPostWidget Class
 */
class CrestaPostWidget extends WP_Widget {
    
    function CrestaPostWidget() {
        parent::WP_Widget(false, $name = 'Cresta Post Widget FREE', array('description' =>__( 'Cresta Post Widget FREE, show your posts with thumbnail and more options.','cresta-post-widget')));
    }

function widget($args, $instance) {
    extract( $args );
    $title = apply_filters('widget_title', $instance['title']);
    $number_post = $instance['number_post'];
	$title_header = $instance['title_header'];
	$show_date = $instance['show_date'];
	$show_comments = $instance['show_comments'];
	$show_thumb = $instance['show_thumb'];
	$thumb_size = $instance['thumb_size'];
	$thumb_no_image = $instance['thumb_no_image'];
	$order_by = $instance['order_by'];
	$order_mode = $instance['order_mode'];
	$show_excerpt = $instance['show_excerpt'];
	$length_excerpt = $instance['length_excerpt'];
	$more_excerpt = $instance['more_excerpt'];
	$category_filter = $instance['category_filter'];
	$category_choose = $instance['category_choose'];
		
		
    ?> 
      <?php echo $before_widget; ?>
         <?php if ( $title )
            echo $before_title . $title . $after_title; ?>
 
                 <ul class="cresta-post-widget">
					<?php
						global $post;
						if ( $category_filter ) {
							$args = array( 'numberposts' => $number_post, 'orderby'=> $order_by, 'order'=> $order_mode, 'post_type'=> 'post', 'post_status'=> 'publish', 'category' => $category_choose );
						} else {
							$args = array( 'numberposts' => $number_post, 'orderby'=> $order_by, 'order'=> $order_mode, 'post_type'=> 'post', 'post_status'=> 'publish' );
						}
						$myposts = get_posts( $args );
						foreach( $myposts as $post ) : setup_postdata($post); ?>
						<li>
						<?php if ($show_thumb): ?>
							<div class="cresta-post-widget-thumbnail <?php echo $thumb_align ?>">
							<a href="<?php the_permalink(); ?>">
								<?php 
									if ( '' != get_the_post_thumbnail() ) {
										the_post_thumbnail($thumb_size);
									} else {
										echo '<img src="' . $thumb_no_image. '" alt="'. __( 'No image', 'cresta-post-widget' ) .'" />';
									}
								?>
							</a>
							</div>
						<?php endif; ?>
							<div class="cresta-post-widget-caption">
								<?php if ($show_date): ?>
								<div class="cresta-post-widget-date"><?php the_time(get_option('date_format')); ?></div>
								<?php endif; ?>
								<<?php echo $title_header ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></<?php echo $title_header ?>>
								<?php if ($show_comments): ?>
								<div class="cresta-post-widget-comments"><?php comments_popup_link( __( '0 Comments', 'cresta-post-widget' ), __( '1 Comment', 'cresta-post-widget' ), __( '% Comments', 'cresta-post-widget' ) ); ?></div>
								<?php endif; ?>
								<?php if ($show_excerpt): ?>
									<div class="cresta-post-widget-excerpt"><?php echo cresta_excerpt($length_excerpt); echo '&nbsp;' . $more_excerpt ?></div>
								<?php endif; ?>
							</div>
						</li>
						<?php endforeach; ?>
				</ul>
 
         <?php echo $after_widget; ?>
<?php
}

function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => __('Cresta Post Widget FREE', 'cresta-post-widget'), 'number_post' => '3', 'title_header' => 'h3', 'show_date' => '1','show_comments' => '0', 'show_thumb' => '0', 'thumb_size' => 'thumbnail','thumb_no_image' => plugins_url('/images/no-image-default.png',__FILE__ ), 'order_by' => 'date', 'order_mode' => 'DESC', 'show_excerpt' => '0', 'length_excerpt' => '15', 'more_excerpt' => '[...]', 'category_filter' => '0', 'category_choose' => '' ));
		$title = esc_attr($instance['title']);
		$number_post = esc_attr($instance['number_post']);
		$title_header = esc_attr($instance['title_header']);
		$show_date = esc_attr($instance['show_date']);
		$show_comments = esc_attr($instance['show_comments']);
		$show_thumb = esc_attr($instance['show_thumb']);
		$thumb_size = esc_attr($instance['thumb_size']);
		$thumb_no_image = esc_attr($instance['thumb_no_image']);
		$order_by = esc_attr($instance['order_by']);
		$order_mode = esc_attr($instance['order_mode']);
		$show_excerpt = esc_attr($instance['show_excerpt']);
		$length_excerpt = esc_attr($instance['length_excerpt']);
		$more_excerpt = esc_attr($instance['more_excerpt']);
		$category_filter = esc_attr($instance['category_filter']);
		$category_choose = esc_attr($instance['category_choose']);
		$swt = 'swt-'.rand(1, 200);
		$swe = 'swe-'.rand(1, 200);
		$swc = 'swc-'.rand(1, 200);
		?>
		
		<script type="text/javascript">
		
			jQuery(document).ready(function(){
			
				if ( jQuery('input.cresta_show_excerpt.checkbox.<?php echo $swe ?>').hasClass('active') ) {
					jQuery('.lenght-excerpt.<?php echo $swe ?>').show();
					jQuery('.more-excerpt.<?php echo $swe ?>').show();
				} else {
					jQuery('.lenght-excerpt.<?php echo $swe ?>').hide();
					jQuery('.more-excerpt.<?php echo $swe ?>').hide();
				}
				
				if ( jQuery('input.cresta_show_thumb.checkbox.<?php echo $swt ?>').hasClass('active') ) {
					jQuery('.thumb-size.<?php echo $swt ?>').show();
					jQuery('.thumb-no-image.<?php echo $swt ?>').show();
				} else {
					jQuery('.thumb-size.<?php echo $swt ?>').hide();
					jQuery('.thumb-no-image.<?php echo $swt ?>').hide();
				}
				
				if ( jQuery('input.cresta_category_filter.checkbox.<?php echo $swc ?>').hasClass('active') ) {
					jQuery('.category_choose.<?php echo $swc ?>').show();
				} else {
					jQuery('.category_choose.<?php echo $swc ?>').hide();
				}

			
			jQuery('input.cresta_show_excerpt.checkbox.<?php echo $swe ?>').on('click', function(){
				if ( jQuery(this).is(':checked') ) {
					jQuery('.lenght-excerpt.<?php echo $swe ?>').fadeIn();
					jQuery('.more-excerpt.<?php echo $swe ?>').fadeIn();
				} else {
					jQuery('.lenght-excerpt.<?php echo $swe ?>').fadeOut();
					jQuery('.more-excerpt.<?php echo $swe ?>').fadeOut();
				}
			});
			
			jQuery('input.cresta_show_thumb.checkbox.<?php echo $swt ?>').on('click', function(){
				if ( jQuery(this).is(':checked') ) {
					jQuery('.thumb-size.<?php echo $swt ?>').fadeIn();
					jQuery('.thumb-no-image.<?php echo $swt ?>').fadeIn();
				} else {
					jQuery('.thumb-size.<?php echo $swt ?>').fadeOut();
					jQuery('.thumb-no-image.<?php echo $swt ?>').fadeOut();
				}
			});
			
			jQuery('input.cresta_category_filter.checkbox.<?php echo $swc ?>').on('click', function(){
				if ( jQuery(this).is(':checked') ) {
					jQuery('.category_choose.<?php echo $swc ?>').fadeIn();
				} else {
					jQuery('.category_choose.<?php echo $swc ?>').fadeOut();
				}
			});
			
			});

		</script>
		<div class="crestaProject-post-widget">
		<img class="crestaPostWidgetLogo" src="<?php echo plugins_url('/images/cresta-post-widget-free-logo.png',__FILE__ ) ?>" alt="Cresta Post Widget FREE"/>
		<!-- Widget Title -->
		<div class="crestaBox">
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'cresta-post-widget'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
		</div>
		<!-- Posts To Display -->
		<div class="crestaBox">
			<p><label for="<?php echo $this->get_field_id('number_post'); ?>"><?php _e('Posts to display:', 'cresta-post-widget'); ?> <input class="widefat" id="<?php echo $this->get_field_id('number_post'); ?>" name="<?php echo $this->get_field_name('number_post'); ?>" type="text" value="<?php echo $number_post; ?>" /></label></p>
		</div>
		<!-- Post Title Header -->
		<div class="crestaBox">
			<p><label for="<?php echo $this->get_field_id('title_header'); ?>"><?php _e('Post Title Heading Tag:', 'cresta-post-widget'); ?></label>
				<select id="<?php echo $this->get_field_id('title_header'); ?>" name="<?php echo $this->get_field_name('title_header'); ?>" class="widefat">
					<option value="h1" <?php if( $instance['title_header'] == 'h1' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e('H1', 'cresta-post-widget'); ?></option>
					<option value="h2" <?php if( $instance['title_header'] == 'h2' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e('H2', 'cresta-post-widget'); ?></option>
					<option value="h3" <?php if( $instance['title_header'] == 'h3' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e('H3', 'cresta-post-widget'); ?></option>
					<option value="h4" <?php if( $instance['title_header'] == 'h4' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e('H4', 'cresta-post-widget'); ?></option>
					<option value="h5" <?php if( $instance['title_header'] == 'h5' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e('H5', 'cresta-post-widget'); ?></option>
					<option value="h6" <?php if( $instance['title_header'] == 'h6' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e('H6', 'cresta-post-widget'); ?></option>
				</select>
			</p>
		</div>
		<!-- The Date -->
		<div class="crestaBox">
			<p>
				<input id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" value="true" <?php if( !empty( $instance['show_date'] ) ) echo 'checked="checked"'; ?> class="checkbox" type="checkbox" />
				<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e('Show Date:', 'cresta-post-widget'); ?> </label>
			</p>
		</div>
		<!-- The Comments -->
		<div class="crestaBox">
			<p>
				<input id="<?php echo $this->get_field_id( 'show_comments' ); ?>" name="<?php echo $this->get_field_name( 'show_comments' ); ?>" value="true" <?php if( !empty( $instance['show_comments'] ) ) echo 'checked="checked"'; ?> class="checkbox" type="checkbox" />
				<label for="<?php echo $this->get_field_id( 'show_comments' ); ?>"><?php _e('Show Comments Count:', 'cresta-post-widget'); ?> </label>
			</p>
		</div>
		<!-- The Thumbnail -->
		<div class="crestaBox">
			<p>
				<input id="<?php echo $this->get_field_id( 'show_thumb' ); ?>" name="<?php echo $this->get_field_name( 'show_thumb' ); ?>" value="true" <?php if( !empty( $instance['show_thumb'] ) ) echo 'checked="checked"'; ?> class="cresta_show_thumb checkbox <?php if( !empty( $instance['show_thumb'] ) ) echo 'active'; ?> <?php echo $swt ?>" type="checkbox" />
				<label for="<?php echo $this->get_field_id( 'show_thumb' ); ?>"><?php _e('Show Thumbnail:', 'cresta-post-widget'); ?> </label>
			</p>
			<p class="thumb-size <?php echo $swt ?>"><label for="<?php echo $this->get_field_id('thumb_size'); ?>"><?php _e('Thumbnail Size:', 'cresta-post-widget'); ?></label>
				<select id="<?php echo $this->get_field_id('thumb_size'); ?>" name="<?php echo $this->get_field_name('thumb_size'); ?>" class="widefat">
					<option value="thumbnail" <?php if( $instance['thumb_size'] == 'thumbnail' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e('Thumbnail', 'cresta-post-widget'); ?></option>
					<option value="medium" <?php if( $instance['thumb_size'] == 'medium' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e('Medium', 'cresta-post-widget'); ?></option>
					<option value="large" <?php if( $instance['thumb_size'] == 'large' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e('Large', 'cresta-post-widget'); ?></option>
				</select>
			</p>
			<p class="thumb-no-image <?php echo $swt ?>"><label for="<?php echo $this->get_field_id('thumb_no_image'); ?>"><?php _e('No-Posts Image Placeholder (enter the absolute URL):', 'cresta-post-widget'); ?> <input class="widefat" id="<?php echo $this->get_field_id('thumb_no_image'); ?>" name="<?php echo $this->get_field_name('thumb_no_image'); ?>" type="text" value="<?php echo $thumb_no_image; ?>" /></label></p>
		</div>
		<!-- Order By -->
		<div class="crestaBox">
			<p><label for="<?php echo $this->get_field_id('order_by'); ?>"><?php _e('Order by:', 'cresta-post-widget'); ?></label>
				<select id="<?php echo $this->get_field_id('order_by'); ?>" name="<?php echo $this->get_field_name('order_by'); ?>" class="widefat">
					<option value="date" <?php if( $instance['order_by'] == 'date' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e('Date', 'cresta-post-widget'); ?></option>
					<option value="rand" <?php if( $instance['order_by'] == 'rand' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e('Random', 'cresta-post-widget'); ?></option>
					<option value="comment_count" <?php if( $instance['order_by'] == 'comment_count' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e('Comment Count', 'cresta-post-widget'); ?></option>
					<option value="title" <?php if( $instance['order_by'] == 'title' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e('Title', 'cresta-post-widget'); ?></option>
				</select>
			</p>
		</div>
		<!-- Order Mode -->
		<div class="crestaBox">
			<p><label for="<?php echo $this->get_field_id('order_mode'); ?>"><?php _e('Order mode:', 'cresta-post-widget'); ?></label>
				<select id="<?php echo $this->get_field_id('order_mode'); ?>" name="<?php echo $this->get_field_name('order_mode'); ?>" class="widefat">
					<option value="ASC" <?php if( $instance['order_mode'] == 'ASC' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e('Ascending order', 'cresta-post-widget'); ?></option>
					<option value="DESC" <?php if( $instance['order_mode'] == 'DESC' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e('Descending order', 'cresta-post-widget'); ?></option>
				</select>
			</p>
		</div>
		<!-- The Excerpt -->
		<div class="crestaBox">
			<p>
				<input id="<?php echo $this->get_field_id( 'show_excerpt' ); ?>" name="<?php echo $this->get_field_name( 'show_excerpt' ); ?>" value="true" <?php if( !empty( $instance['show_excerpt'] ) ) echo 'checked="checked"'; ?> class="cresta_show_excerpt checkbox <?php if( !empty( $instance['show_excerpt'] ) ) echo 'active'; ?> <?php echo $swe ?>" type="checkbox" />
				<label for="<?php echo $this->get_field_id( 'show_excerpt' ); ?>"><?php _e('Show Excerpt:', 'cresta-post-widget'); ?> </label>
			</p>
			<p class="lenght-excerpt <?php echo $swe ?>"><label for="<?php echo $this->get_field_id('length_excerpt'); ?>"><?php _e('Excerpt Lenght (words):', 'cresta-post-widget'); ?> <input class="widefat" id="<?php echo $this->get_field_id('length_excerpt'); ?>" name="<?php echo $this->get_field_name('length_excerpt'); ?>" type="text" value="<?php echo $length_excerpt; ?>" /></label></p>
			<p class="more-excerpt <?php echo $swe ?>"><label for="<?php echo $this->get_field_id('more_excerpt'); ?>"><?php _e('Post string break:', 'cresta-post-widget'); ?> <input class="widefat" id="<?php echo $this->get_field_id('more_excerpt'); ?>" name="<?php echo $this->get_field_name('more_excerpt'); ?>" type="text" value="<?php echo $more_excerpt; ?>" /></label></p>
		</div>
		<!-- The Category -->
		<div class="crestaBox">
			<p>
				<input id="<?php echo $this->get_field_id( 'category_filter' ); ?>" name="<?php echo $this->get_field_name( 'category_filter' ); ?>" value="true" <?php if( !empty( $instance['category_filter'] ) ) echo 'checked="checked"'; ?> class="cresta_category_filter checkbox <?php if( !empty( $instance['category_filter'] ) ) echo 'active'; ?> <?php echo $swc ?>" type="checkbox" />
				<label for="<?php echo $this->get_field_id( 'category_filter' ); ?>"><?php _e('Filter by Category:', 'cresta-post-widget'); ?> </label>
			</p>
			<p class="category_choose <?php echo $swc ?>">
				<label for="<?php echo $this->get_field_id('category_choose'); ?>"><?php _e('Choose Category:','cresta-post-widget'); ?> </label>
					<?php wp_dropdown_categories(array(
						'class' =>      'widefat',
						'id' =>         $this->get_field_id('category_choose'),
						'name' =>       $this->get_field_name('category_choose'),
						'selected' =>   $category_choose,
						'hide_empty' => 0,
						'hierarchical' => 1
					)); ?>
			</p> 
		</div>
		</div>
		<?php
}

function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number_post'] = trim(strip_tags($new_instance['number_post']));
		$instance['title_header'] = trim(strip_tags($new_instance['title_header']));
		$instance['show_date'] = trim(strip_tags($new_instance['show_date']));
		$instance['show_comments'] = trim(strip_tags($new_instance['show_comments']));
		$instance['show_thumb'] = trim(strip_tags($new_instance['show_thumb']));
		$instance['thumb_size'] = trim(strip_tags($new_instance['thumb_size']));
		$instance['thumb_no_image'] = trim(strip_tags($new_instance['thumb_no_image']));
		$instance['order_by'] = trim(strip_tags($new_instance['order_by']));
		$instance['order_mode'] = trim(strip_tags($new_instance['order_mode']));
		$instance['show_excerpt'] = trim(strip_tags($new_instance['show_excerpt']));
		$instance['length_excerpt'] = trim(strip_tags($new_instance['length_excerpt']));
		$instance['more_excerpt'] = trim(strip_tags($new_instance['more_excerpt']));
		$instance['category_filter'] = trim(strip_tags($new_instance['category_filter']));
		$instance['category_choose'] = trim(strip_tags($new_instance['category_choose']));
		return $instance;
}

}

/**
 * Custom excerpt
 */
function cresta_excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
		array_pop($excerpt);
        $excerpt = implode(" ",$excerpt);
    } else {
        $excerpt = implode(" ",$excerpt);
    } 
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}

/**
 * Register CSS
 */
function cresta_widget_css() {
	wp_register_style('cresta-post-widget-style_admin', plugins_url('/css/cresta_widget_css_admin.css',__FILE__ ));
	wp_enqueue_style('cresta-post-widget-style_admin');
}

add_action('widgets_init', create_function('', 'return register_widget("CrestaPostWidget");'));
add_action('admin_init', 'cresta_widget_css');
$plugin_dir = basename(dirname(__FILE__));
load_plugin_textdomain( 'cresta-post-widget', null, $plugin_dir . '/languages/' );
?>

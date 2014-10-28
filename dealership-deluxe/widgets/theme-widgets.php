<?php
	add_action("widgets_init", "theme_widgets_init");	
function theme_widgets_init() {
	  register_widget("Contact_Sales_Consultant");
	  register_widget("Top_Deals");
 	  register_widget("Welcome_Widget");   
	  register_widget('Footer1_Widget');
	  register_widget('Footer2_Widget');
	  register_widget('Footer3_Widget');
	  register_widget('Facebook_Widget');
	  register_widget('GTCD_Widget'); 
	  register_widget('Similar_Widget');
	  register_widget('Carousel_Widget');   
	  }
class Top_Deals extends WP_Widget{
	function Top_Deals() {
	parent::WP_Widget(false, 'Dealership Top Deals');
	}
	function widget($args, $instance) {			
		$dealstitle = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$numdeals = apply_filters( 'widget_num', empty( $instance['num'] ) ? '' : $instance['num'], $instance, $this->id_base );
	?>
<div class="right-block">
  <div class="right-white-block mobile top-deals-mobile-wrapper">
    <h3>
      <?php if ( !empty( $dealstitle ) ) { echo  $dealstitle; }?>
    </h3>
    <ul class="deal-rates">
      <?php  wp_reset_query();	$query = new WP_Query(array(
							'post_type' => array('gtcd','user_listing'),
							'meta_key' => '_topdeal',
							'meta_value' => 'Yes',
							'posts_per_page' => $numdeals,
							));
							if ( $query->have_posts() ) while ( $query->have_posts() ) : $query->the_post();global $post,$field, $fields, $fields2, $fields3; $fields = get_post_meta($post->ID, 'mod1', true); $fields3 = get_post_meta($post->ID, 'mod3', true); $fields2 = get_post_meta($post->ID, 'mod2', true);  $symbols = get_option('gorilla_symbols'); $options = get_option('gorilla_fields');include(TEMPLATEPATH."/functions/var/default-box-one.php");include(TEMPLATEPATH."/functions/var/default-box-two.php");include(TEMPLATEPATH."/functions/var/default-box-three.php");	?>
      <li class="new-arrivals-list"> <a class="arrivals-link" href="<?php the_permalink();?>">
        <div class="image-container">
          <?php gorilla_img($post->ID,'thumbnail');?>
        </div>
        <div class="arrivals-details">   
       <p class="vehicle-name"><?php echo $post->post_title ?></p>
<p class="vehicle-info"><span class="show-for-small"><?php if ( $fields['year']){ echo $fields['year'];}else {  echo ''; }?> | </span><span class="price"><?php if (is_numeric( $fields['price'])){ echo $symbols['currency'].number_format($fields['price']).'</span>'; } else  { echo '<span class="price">'.$fields['price'].'</span>' ; } ?><br/>
<?php if ( is_numeric($fields['miles'])){echo number_format($fields['miles'],0,'.',',').' '.$options['milestext']; }else  {echo $fields['miles']; };?></strong></p>      
               </div>    
          </a> 
        <div class="clear"></div>
        </li>
      <?php endwhile; wp_reset_query(); ?>
    </ul>
  </div>
</div>
<?php }
			function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$dealstitle = strip_tags($instance['title']);
		$numdeals = strip_tags($instance['num']);
?>
<p>
  <label for="<?php echo $this->get_field_id('title'); ?>">
    <?php _e('Widget Title:','language'); ?>
  </label>
  <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($dealstitle); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('num'); ?>">
    <?php _e('Number of listings:','language'); ?>
  </label>
  <input style="width: 30px;" id="<?php echo $this->get_field_id('num'); ?>" name="<?php echo $this->get_field_name('num'); ?>"  type="text" value="<?php echo esc_attr($numdeals); ?>" />
</p>
<?php
	}
			function update($new_instance, $old_instance) {$instance['title'] = strip_tags($new_instance['title']);$instance['num'] = strip_tags($new_instance['num']);	return $new_instance; 
			}
}
class Welcome_Widget extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_text', 'description' => __('Welcome Legend on Home Page','language'));
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('Welcome', __('Dealership Welcome Widget','language'), $widget_ops, $control_ops);}
		function widget( $args, $instance ) {
		extract($args);
		echo '';
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$text = apply_filters( 'widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . '<h1>'.$title.'</h1>' . $after_title; } ?>
<div class="textwidget"><?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?></div>
<?php
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = strip_tags($instance['title']);
		$text = esc_textarea($instance['text']);
?>
<p>
  <label for="<?php echo $this->get_field_id('title'); ?>">
    <?php _e('Title:','language'); ?>
  </label>
  <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
</p>
<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
<p>
  <input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />
  &nbsp;
  <label for="<?php echo $this->get_field_id('filter'); ?>">
    <?php _e('Automatically add paragraphs','language'); ?>
  </label>
</p>
<?php
	}
}	
class GTCD_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'gtcd_widget', 
			__('Dealership Search', 'language'), 
			array( 'description' => __( 'Dealership Search Module', 'language' ), ) 
		);
	}
	         public function widget( $args, $instance ) {
			$title = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
		if ( ! empty( $title ) )		
		  ?>	    
		 <?php  
		 echo '<div class="cpsAjaxLoaderWidget" style="margin-top:40px;height:5000px;">
		 <div style="text-align:center;margin-top:60px;">';	
         	_e('Searching','language');
		 	echo '</div> <img alt="loader" src="'.get_bloginfo('template_url').'/images/common/loader.gif" />   	
</div>';
		?><div class="right-white-block innerSearchPopup hideonSearch">
		<ul class='side-nav'> 
         <?php echo '<h3 class="search-title">'.$title.'</h3>';?>
         <div class="advSearchHome">
     <?php cps_search_form(); ?>    
      </div>   
 </ul>  </div>  
<div style="clear:both"></div> 		  
		  <?php		
	}
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Title', 'language' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','language' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}
	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;	
	}

}
class Carousel_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'slider_widget', 
			__('Dealership Carousel', 'language'), 
			array( 'description' => __( 'Dealership Carousel', 'language' ), ) 
		);
	}
	         public function widget( $args, $instance ) {
			$numbers = isset( $instance['numbers'] ) ? apply_filters( 'widget_numbers', $instance['numbers'] ) : '';
		if ( ! empty( $numbers ) )
			
		?><div class="mobile-slider hide">
<h2><?php _e('Featured','language');?></h2>
     <?php
    $query = new WP_Query(array(
               'post_type' => array('gtcd','user_listing'),
               'meta_key' => '_featured',
               'meta_value' => 'Yes',
               'orderby' => 'rand',
               'posts_per_page' => '1'
               ));
                  if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
               ?>
               <?php global $post,$field, $fields, $fields2, $fields3; $fields = get_post_meta($post->ID, 'mod1', true); $fields3 = get_post_meta($post->ID, 'mod3', true); $fields2 = get_post_meta($post->ID, 'mod2', true);  $symbols = get_option('gorilla_symbols'); $options = get_option('gorilla_fields');?>                             
                       <a class="mobile-slider-link" href="<?php the_permalink(); ?>">
                                            <?php if ( has_post_thumbnail() ) { $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); $url = $thumb['0'];echo '<img src="'.$url.'" />';} elseif ( 'user_listing' == get_post_type($post->ID) ){						
$args = array('order'          => 'ASC','orderby'=> 'menu_order','post_type'=> 'attachment','post_parent'    => $post->ID,'post_mime_type' => 'image','post_status'    =>null,'numberposts'    => 1,);
						$attachments = get_posts($args);
						if ($attachments) {
						   foreach ($attachments as $attachment) {
						arrivals_img ($post->ID,'large');
						}
						}
						} elseif( 'gtcd' == get_post_type($post->ID) ) {
						gorilla_img ($post->ID,'large');
						
						} ?>
                        <div class="mobile-slider-title">
                       <p><?php if (isset( $fields['year'])){ echo $fields['year'].' ';} else {  echo ''; } ?>   
                       <?php if ($post->post_type == "gtcd") { the_title();if (isset( $fields['price'])){ echo ' | <span class="price_slider">'.'  '.$symbols['currency']; echo number_format($fields['price']).'</span> ';}else {  echo ''; }
}else { the_title();}?></p>
                        </div>
                        <div class="clear"></div>
                        </a>
                        <?php endwhile; wp_reset_query();?>  
                        		<?php else: ?>   				
				<div class="post-wrap rounds">	                              
	            	<div class="post rounds">
	            		<p><?php _e('Sorry, no posts matched your criteria.','language'); ?></p> 
					</div>
				</div>   
				<?php endif; ?> 
</div>
<div class="slider-wrapper hideonSearch">
    <div class="<?php echo is_front_page()?"search-form-wrapper":"";?> ">
        
         <?php if ( ! dynamic_sidebar('Search Module')) : ?>
				<?php endif; ?>  
   </div>
   <div class="cpsAjaxLoader">
      <div style="text-align:center;margin-top:80px;">
         <?php _e('Searching Inventory','language');?>
      </div>
      <img src="<?php bloginfo('template_url')?>/images/common/loader.gif" alt="searching" />
      <div style="text-align:center;margin-top:10px"><?php _e('Please wait','language');?></div>           
   </div>     
   <div id="slides" class="hide-for-small" > <div class="cpsAjaxLoaderSlider">  </div> 
      <div class="slides_container">             
              <?php   $query = new WP_Query(array(
               'post_type' => array('post','gtcd','user_listing'),
               'meta_key' => '_featured',
               'meta_value' => 'Yes',               
               'orderby' => 'date',               
               'order' => 'DESC' ,
               'posts_per_page' => $numbers,
               ));
                  if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
               ?>                   
               <?php global $post,$field, $fields, $fields2, $fields3; $fields = get_post_meta($post->ID, 'mod1', true); $fields3 = get_post_meta($post->ID, 'mod3', true); $fields2 = get_post_meta($post->ID, 'mod2', true);  $symbols = get_option('gorilla_symbols'); $options = get_option('gorilla_fields');include(TEMPLATEPATH."/functions/var/default-box-one.php");include(TEMPLATEPATH."/functions/var/default-box-two.php");include(TEMPLATEPATH."/functions/var/default-box-three.php");?>                   
                  <a href="<?php the_permalink(); ?>">
                  <h2><?php if (isset( $fields['year'])){ echo $fields['year'].' ';} else {  echo ''; } ?>   
                       <?php if ($post->post_type == "gtcd") { the_title();if (isset( $fields['price'])){ echo ' | <span class="price_slider">'.'  '.$symbols['currency']; echo number_format($fields['price']).'</span> ';}else {  echo ''; }
}else { the_title();}?></h2>
                  <div class="title-detail-tag"></div>
                                         <?php if ( has_post_thumbnail() ) { $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); $url = $thumb['0'];echo '<img src="'.$url.'" />';} elseif ( 'user_listing' == get_post_type($post->ID) ){						
$args = array('order'          => 'ASC','orderby'=> 'menu_order','post_type'=> 'attachment','post_parent'    => $post->ID,'post_mime_type' => 'image','post_status'    => null,'numberposts'    => 1,);
$attachments = get_posts($args);
if ($attachments) {
   foreach ($attachments as $attachment) {
arrivals_img ($post->ID,'large');
}
}
} elseif( 'gtcd' == get_post_type($post->ID) ) {
gorilla_img ($post->ID,'large');
} ?>
                  </a><?php endwhile; wp_reset_query();?>  
                        		<?php else: ?>   				
				<img src="<?php echo get_template_directory_uri();?>/images/common/dummy/slide.jpg" alt="slideshow" width="738" height="300" />
				<?php endif; ?> </div></div>
</div>		
	<?php
	}

	public function form( $instance ) {
		if ( isset( $instance[ 'numbers' ] ) ) {
			$numbers = $instance[ 'numbers' ];
		}
		else {
			$number = __( 'Title', 'language' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'numbers' ); ?>"><?php _e( 'Number of Listings:','language' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'numbers' ); ?>" name="<?php echo $this->get_field_name( 'numbers' ); ?>" type="text" value="<?php echo esc_attr( $numbers ); ?>">
		</p>
		<?php 
	}
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['numbers'] = ( ! empty( $new_instance['numbers'] ) ) ? strip_tags( $new_instance['numbers'] ) : '';

		return $instance;
	}

} 
class Similar_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'simil_widget', 
			__('Dealership Similar Cars', 'language'), 
			array( 'description' => __( 'Dealership Similar Cars by tag', 'language' ), ) 
		);
	}
	         public function widget( $args, $instance ) {
			$title = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
			$number = isset( $instance['number'] ) ? apply_filters( 'widget_number', $instance['number'] ) : '';
		if ( ! empty( $title ) )
		  ?><div id="product-list-wrapper-similar" class="hide-for-small">
	<?php  echo $args['before_title'] .'<h2>'.$title .'</h2>'. $args['after_title'];?>
		<ul class="tricol-product-list-similar detail-page-product-list">
		<?php 
				global $post;  wp_reset_query();
				$terms = get_the_terms( $post->ID , 'features');
				$do_not_duplicate[] = $post->ID;
 				if(!empty($terms)){
    			foreach ($terms as $term) {
        		query_posts( array(
        		'features' => $term->slug,
        		'post__not_in' => $do_not_duplicate ) );
        		if(have_posts()){ while ( have_posts() ) : the_post(); $do_not_duplicate[] = $post->ID; ?>
        		<?php if($count<$number): ?>
        		<?php require_once(TEMPLATEPATH."/functions/var/default-box-one.php");
			  require_once(TEMPLATEPATH."/functions/var/default-box-two.php");
			  require_once(TEMPLATEPATH."/functions/var/default-box-three.php");
			  global $options;$fields;$options2;$options3;$symbols;
			  $fields = get_post_meta($post->ID, 'mod1', true);
			  $options2 = get_post_meta($post->ID, 'mod2', true);
			  $options3 = get_post_meta($post->ID, 'mod3', true);
			  $symbols = get_option('gorilla_symbols');
			  $options = get_option('gorilla_fields');
			  ?>
				<li>
				<div class="image-container">
					<a href="<?php the_permalink();?>">
						<span class="<?php echo $fields['statustag'];?>"></span>
					</a>
					<a href="<?php the_permalink();?>">		
					<?php
						if ( 'user_listing' == get_post_type($post->ID) ) {
						$args = array(
						'order'          => 'ASC',
						'orderby'        => 'menu_order',
						'post_type'      => 'attachment',
						'post_parent'    => $post->ID,
						'post_mime_type' => 'image',
						'post_status'    => null,
						'numberposts'    => 1,
						);
						$attachments = get_posts($args);						
						if ($attachments) {						
						   foreach ($attachments as $attachment) {												
						arrivals_img ($post->ID,'medium');
						}
						
						}						
						} elseif ( 'gtcd' == get_post_type($post->ID) ) {					
						gorilla_img ($post->ID,'medium');					
						}?>

					</a>

				</div>
				 <div>
					<strong><?php the_title();?></strong>
					<div class="meta-style"><?php if ( $fields['year']){ echo $fields['year'].' | ';} else {  echo ''; } ?> <?php	 if ( $fields['miles']){ echo $fields['miles'].' '.$options['milestext'];} elseif ($fields['miles'] == '0' ){ echo _e('0','language').' '.$options['milestext'];} else {echo '';}  ?></div>
					<div class="price-style"><?php  if ( $fields['price']){ echo $symbols['currency']; echo number_format($fields['price']);}else {  echo ''; } ?></div>
						<p><a class="detail-btn" href="<?php the_permalink();?>"><?php _e('View','language');?></a></p>
                     </div>   
				</li>
				
				<?php $count++; endif; ?>

			<?php endwhile; wp_reset_query();

        	}
    	}
} 	?>
		</ul>
	</div><!--end of content div--><?php		
		echo $args['after_widget'];
	}
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Title', 'language' );
		}
		if ( isset( $instance[ 'number' ] ) ) {
			$number = $instance[ 'number' ];
		}
		else {
			$number = __( 'Number of vehicles', 'language' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','language' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of Vehicles:','language' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>">
		</p>

		<?php 
	}
		public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['number'] = ( ! empty( $new_instance['number'] ) ) ? strip_tags( $new_instance['number'] ) : '';

		return $instance;
		
	}

} 
class Contact_Sales_Consultant extends WP_Widget {
	function Contact_Sales_Consultant() {
		$widget_ops = array( 'description' => (__('Contact Form in The Sidebar','language' )));
		$this->WP_Widget('contact_form_widget', 'Dealership Contact Form', $widget_ops);
	}
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);					  				 
		include_once(TEMPLATEPATH."/includes/form.php");
	}
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'profile_id' => '' ) );
		$title = strip_tags($instance['title']);
?>
<p>
  <label for="<?php echo $this->get_field_id('title'); ?>">
    <?php _e("Legend: ","language");?>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
  </label>
</p>
<?php
	}
}
class Facebook_Widget extends WP_Widget {
	function Facebook_Widget() {
		$widget_ops = array( 'description' => (__('Your Facebook Fan Box, add your Facebook Fan Page ID and place this widget in your Sidebar to display your followers.','language')));
		$this->WP_Widget('facebook_widget', 'Dealership Facebook Widget', $widget_ops);
	}
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		$profile_id = empty($instance['profile_id']) ? ' ' : apply_filters('widget_profile_id', $instance['profile_id']);					
		include_once(TEMPLATEPATH . '/facebook.php');
	}
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['profile_id'] = strip_tags($new_instance['profile_id']);
		return $instance;
	}
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'profile_id' => '' ) );
		$title = strip_tags($instance['title']);
		$profile_id = strip_tags($instance['profile_id']);
?>
<p>
  <label for="<?php echo $this->get_field_id('title'); ?>">
    <?php _e("Title: ","language");?>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
  </label>
</p>
<p>
  <label for="<?php echo $this->get_field_id('profile_id'); ?>">
    <?php _e("Facebook Page Name: ","language");?>
    <input class="widefat" id="<?php echo $this->get_field_id('profile_id'); ?>" name="<?php echo $this->get_field_name('profile_id'); ?>" type="text" value="<?php echo esc_attr($profile_id); ?>" />
  </label>
</p>
<?php

	}
}
class Footer1_Widget extends WP_Widget {
	function Footer1_Widget() {
		$widget_ops = array( 'description' => (__('Footer 1 Widget' ,'language')));
		$this->WP_Widget('Footer1widget', 'Footer 1 Module Widget', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);	
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		$text = empty($instance['text']) ? ' ' : apply_filters('widget_text', $instance['text']);	
		$pagelink = empty($instance['pagelink']) ? ' ' : apply_filters('widget_pagelink', $instance['pagelink']);
		$blogurl = get_bloginfo('template_url');								
		?>
<div class=" footer-col footer-col1">
  <h3 class="search-title"><?php echo $title;?></h3>
  <p><?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?></p>
  <p><a class="learn-more" href='<?php echo $pagelink; ?>'><?php _e('Learn more','language');?></a></p>
</div>
<?php }
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['text'] = strip_tags($new_instance['text']);
		$instance['pagelink'] = strip_tags($new_instance['pagelink']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) );
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
		}	
		function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '','pagelink' => '' ) );
		$title = strip_tags($instance['title']);
		$text = $instance['text'];
		$pagelink = strip_tags($instance['pagelink']);
		?>
<p>
  <label for="<?php echo $this->get_field_id('title'); ?>">
    <?php _e("Title: ","language");?>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
  </label>
</p>
<p>
  <label for="<?php echo $this->get_field_id('pagelink'); ?>">
    <?php _e("URL for full page : ","language");?>
    <input class="widefat" id="<?php echo $this->get_field_id('pagelink'); ?>" name="<?php echo $this->get_field_name('pagelink'); ?>" type="text" value="<?php echo esc_attr($pagelink); ?>" />
  </label>
</p>
<textarea id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" rows="10" cols="30" ><?php echo $text; ?></textarea>
<p>
  <input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />
  &nbsp;
  <label for="<?php echo $this->get_field_id('filter'); ?>">
    <?php _e('Automatically add paragraphs','language'); ?>
  </label>
</p>
<?php
	}
}
class Footer2_Widget extends WP_Widget {
	function Footer2_Widget() {
		$widget_ops = array( 'description' => (__('Footer 2 Widget' ,'language')));
		$this->WP_Widget('Footer2widget', 'Footer 2 Module Widget', $widget_ops);
	}
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		$text = empty($instance['text']) ? ' ' : apply_filters('widget_text', $instance['text']); ?>
<div class="footer-col footer-col2">
  <h3><?php echo $title;?></h3>
  </p><?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?> </p></div>
<?php	
		}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['text'] = strip_tags($new_instance['text']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
		$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
		}
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = strip_tags($instance['title']);
		$text = $instance['text']; ?>
<p>
  <label for="<?php echo $this->get_field_id('title'); ?>">
    <?php _e("Title: ","language");?>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
  </label>
</p>
<textarea id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" rows="10" cols="30" ><?php echo $text; ?></textarea>
<p>
  <input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />
  &nbsp;
  <label for="<?php echo $this->get_field_id('filter'); ?>">
    <?php _e('Automatically add paragraphs','language'); ?>
  </label>
</p>
<?php
	}
}
class Footer3_Widget extends WP_Widget {
	function Footer3_Widget() {
		$widget_ops = array( 'description' => (__('Footer 3 Widget (Map)' ,'language')));
		$this->WP_Widget('Footer3widget', 'Footer 3 Module (Map)', $widget_ops);
		}
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);	
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		$address = empty($instance['address']) ? ' ' : apply_filters('widget_title', $instance['address']);?>
<div class="footer-col footer-col3">
  <h3><?php echo $title;?></h3>
 <single-address><?php echo $address;?></single-address>
                        <script type="text/javascript">
	$(document).ready(function(){
   $("single-address").each(function(){                         
      var embed ="<div class='map'><iframe frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='https://maps.google.com/maps?f=q&amp;z=13&amp;source=s_q&amp;hl=en&amp;geocode=&amp;iwloc=near&amp;q="+ encodeURIComponent( $(this).text() ) +";&amp;output=embed'></iframe></div>";
      $(this).html(embed);                      
   });
});
	</script>
</div>
<?php	
		}
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['address'] = strip_tags($new_instance['address']);
		return $instance;
		}
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '','address' => '') );
		$title = strip_tags($instance['title']);
		$address = strip_tags($instance['address']);
		?>
<p>
  <label for="<?php echo $this->get_field_id('title'); ?>">
    <?php _e("Title: ","language");?>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
      </label>
   <label for="<?php echo $this->get_field_id('address'); ?>">
    <?php _e("Address: ","language");?>
    <input class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo esc_attr($address); ?>" />
  </label>
</p>
<?php }
}
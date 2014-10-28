<?php
function wpb_widgets_init() {
	register_sidebar( array(
		'name' =>__( 'homepage sidebar', 'wpb'),
		'id' => 'sidebar-home-left',
		'description' => __( 'Appears on the static front page template', 'wpb' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s tabbed">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	}

add_action( 'widgets_init', 'wpb_widgets_init' );


?>
<?php
$CarsGallery = get_option('CarsGallery_mode');
if($CarsGallery != 'New'){
$args = array('post_type'=> array('gtcd','user_listing') ,'posts_per_page'=>-1 );
	$myposts = get_posts( $args );
	foreach( $myposts as $post ){
		if ( $images = get_children(array(
			'post_parent' => $post->ID,
			'post_type' => 'attachment',
			'order' => 'ASC',
			'orderby' => 'menu_order',
			'post_mime_type' => 'image',
			)))
		{
			$Gallery = array();
			foreach( $images as $image ) {
				$Gallery[] = $image->ID;
			}
			$Gallery = implode(',',$Gallery);
			if($Gallery!=''){
				update_post_meta($post->ID, 'CarsGallery', $Gallery);
			}
		}
	}
	
	add_option('CarsGallery_mode', 'New', '', 'yes' );
}		
function implement_ajax_name()
		{
			if ( isset($_POST[ 'main_catid' ]) ) {
				$categories = get_categories('child_of=' . $_POST[ 'main_catid' ] . '&hide_empty=0&taxonomy=makemodel');
				foreach ( $categories as $cat ) {
					$option .= '<option value="' . $cat->name . '" data-value="' . $cat->term_id . '">';
					$option .= $cat->cat_name;
					$option .= ' (' . $cat->category_count . ')';
					$option .= '</option>';
				}
				echo '<option value="" selected="selected" data-value="-1">Select Model</option>' . $option;
				die();
			} // end if

		}

		add_action('wp_ajax_my_special_ajax_name_call' , 'implement_ajax_name');
		add_action('wp_ajax_nopriv_my_special_ajax_name_call' , 'implement_ajax_name'); //for users that are not logged in.


function wp_dropdown_categories_custom($args = '')
		{
			$defaults = array(
				'show_option_all' => '' , 'show_option_none' => '' ,
				'orderby' => 'id' , 'order' => 'ASC' ,
				'show_last_update' => 0 , 'show_count' => 0 ,
				'hide_empty' => 1 , 'child_of' => 0 ,
				'exclude' => '' , 'echo' => 1 ,
				'selected' => 0 , 'hierarchical' => 0 ,
				'name' => 'cat' , 'id' => '' ,
				'class' => 'postform' , 'depth' => 0 ,
				'tab_index' => 0 , 'taxonomy' => 'category' ,
				'hide_if_empty' => false
			);

			$defaults[ 'selected' ] = ( is_category() ) ? get_query_var('cat') : 0;

			// Back compat.
			if ( isset($args[ 'type' ]) && 'link' == $args[ 'type' ] ) {
				_deprecated_argument(__FUNCTION__ , '3.0' , '');
				$args[ 'taxonomy' ] = 'link_category';
			}

			$r = wp_parse_args($args , $defaults);

			if ( !isset($r[ 'pad_counts' ]) && $r[ 'show_count' ] && $r[ 'hierarchical' ] ) {
				$r[ 'pad_counts' ] = true;
			}

			$r[ 'include_last_update_time' ] = $r[ 'show_last_update' ];
			extract($r);

			$tab_index_attribute = '';
			if ( ( int ) $tab_index > 0 ) $tab_index_attribute = " tabindex=\"$tab_index\"";

			$categories = get_terms($taxonomy , $r);
			$name = esc_attr($name);
			$class = esc_attr($class);
			$id = $id ? esc_attr($id) : $name;

			if ( !$r[ 'hide_if_empty' ] || !empty($categories) ) $output = "<select name='$name' id='$id' class='$class' $tab_index_attribute>\n";
			else $output = '';

			if ( empty($categories) && !$r[ 'hide_if_empty' ] && !empty($show_option_none) ) {
				$show_option_none = apply_filters('list_cats' , $show_option_none);
				$output .= "\t<option value='' selected='selected' data-value='-1'>$show_option_none</option>\n";
			}

			if ( !empty($categories) ) {

				if ( $show_option_all ) {
					$show_option_all = apply_filters('list_cats' , $show_option_all);
					$selected = ( '0' === strval($r[ 'selected' ]) ) ? " selected='selected'" : '';
					$output .= "\t<option value='0'$selected data-value='0'>$show_option_all</option>\n";
				}

				if ( $show_option_none ) {
					$show_option_none = apply_filters('list_cats' , $show_option_none);
					$selected = ( '-1' === strval($r[ 'selected' ]) ) ? " selected='selected'" : '';
					$output .= "\t<option value='' $selected  data-value='-1'>$show_option_none</option>\n";
				}

				if ( $hierarchical ) $depth = $r[ 'depth' ];  // Walk the full depth.
				else $depth = -1; // Flat.

				$output .= walk_category_dropdown_tree($categories , $depth , $r);
			}
			if ( !$r[ 'hide_if_empty' ] || !empty($categories) ) $output .= "</select>\n";


			$output = apply_filters('wp_dropdown_cats' , $output);

			if ( $echo ) echo $output;

			return $output;

		}
class Walker_CategoryDropdown_Custom extends Walker_CategoryDropdown
        {
            function start_el(&$output , $category , $depth , $args)
            {
                $pad = str_repeat(' ' , $depth * 3);

                $cat_name = apply_filters('list_cats' , $category->name , $category);
                $output .= "\t<option class=\"level-$depth\" value=\"" . $category->name . "\" data-value=\"" . $category->term_id . "\"";
                if ( $category->term_id == $args[ 'selected' ] ) $output .= ' selected="selected"';
                $output .= '>';
                $output .= $pad . $cat_name;
                if ( $args[ 'show_count' ] ) $output .= '  (' . $category->count . ')';
                if ( array_key_exists('show_last_update', $args) && $args[ 'show_last_update' ] ) {
                    $format = 'Y-m-d';
                    $output .= '  ' . gmdate($format , $category->last_update_timestamp);
                }
                $output .= "</option>\n";

            }

        }
add_filter( 'request', 'mi_request_filter' );
function mi_request_filter( $query_vars ) {
    if( isset( $_GET['s'] ) && empty( $_GET['s'] ) ) {
        $query_vars['s'] = " ";
    }
    return $query_vars;
}
		define('AUTODEALER_INCLUDES', get_template_directory() . '/includes/');
		define('THEME_FUNCTIONS', get_template_directory() . '/functions/');
		define('THEME_WIDGETS', get_template_directory() . '/widgets/');	
		define('THEME_NAME', 'CARDEALER');
		define('THEME_DIR', get_bloginfo('template_directory'));	
		require_once(THEME_FUNCTIONS.'basic-theme-setup.php');
		require_once(THEME_FUNCTIONS . 'file/functions.php' );
		require_once(get_template_directory().'/includes/meta-box.php');
		require_once(THEME_FUNCTIONS.'gtcd-post-type.php');
		require_once(THEME_FUNCTIONS.'user-post-type.php');
		require_once(THEME_FUNCTIONS.'menu-and-settings-page.php');
		require_once(THEME_FUNCTIONS.'validate-fields.php');
		require_once(THEME_FUNCTIONS.'meta-boxes-code.php');
		require_once(THEME_FUNCTIONS.'custom-taxonomies.php');
		require_once(THEME_FUNCTIONS.'dashboard-widgets.php');	
		require_once(THEME_WIDGETS.'register-sidebars.php');
		require_once(THEME_FUNCTIONS.'search-code.php');
		require_once(get_template_directory(). '/widgets/theme-widgets.php');
	
if (!function_exists('load_theme_scripts')) {
	function load_theme_scripts() {
	if (!is_admin() && is_page_template( 'cdform.php' ) ) 
	{
	$mjscriptURL = get_template_directory_uri().'/responsive/javascripts/';
	$jscriptURL = get_template_directory_uri().'/js/';
	wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js');
    wp_enqueue_script( 'jquery' );	
	wp_register_script('myScript', ($jscriptURL.'scripts-form.js'), array('jquery'), NULL, true );
	wp_enqueue_script('myScript');
	wp_register_script('jselectBox', ($jscriptURL.'jquery.selectBox.js'), array('jquery'), NULL, true );
	wp_enqueue_script('jselectBox');
	wp_register_script('jvalidate', ($jscriptURL.'jquery.validate.min.js'), array('jquery'), NULL, true );
	wp_enqueue_script('jvalidate');
	wp_register_script('mediaQueryToggle', ($mjscriptURL.'jquery.foundation.mediaQueryToggle.js'), array('jquery'), NULL, true );
	wp_enqueue_script('mediaQueryToggle');	
	wp_register_script('navigation', ($mjscriptURL.'jquery.foundation.navigation.js'), array('jquery'), NULL, true );
	wp_enqueue_script('navigation');	
	wp_register_script('topbar', ($mjscriptURL.'jquery.foundation.topbar.js'), array('jquery'), NULL, true );
	wp_enqueue_script('topbar');	
	wp_register_script('reveal', ($mjscriptURL.'jquery.foundation.reveal.js'), array('jquery'), NULL, true );
	wp_enqueue_script('reveal');	
	wp_register_script('app', ($mjscriptURL.'app.js'), array('jquery'), NULL, true );
	wp_enqueue_script('app');	
	wp_register_script('mobileScript', ($mjscriptURL.'mobileScript.js'), array('jquery'), NULL, true );
	wp_enqueue_script('mobileScript');	
	wp_register_script('modernizr', ($mjscriptURL.'touch_slider/modernizr.custom.17475.js'), array('jquery'), NULL, true );
	wp_enqueue_script('modernizr');
	wp_register_script('elastislide', ($mjscriptURL.'touch_slider/jquery.elastislide.js'), array('jquery'), NULL, true );
	wp_enqueue_script('elastislide');	
	wp_register_script('jquerypp', ($mjscriptURL.'touch_slider/jquerypp.custom.js'), array('jquery'), NULL, true );
	wp_enqueue_script('jquerypp');	
	
		
	} else {
	$mjscriptURL = get_template_directory_uri().'/responsive/javascripts/';	
	$jscriptURL = get_template_directory_uri().'/js/';
	wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js');
    wp_enqueue_script( 'jquery' );
	wp_register_script('jsEasing', ($jscriptURL.'jquery.easing.1.3.js'), array('jquery'), NULL, true );
	wp_enqueue_script('jsEasing');			
	wp_register_script('jImageLightbox', ($jscriptURL.'imagelightbox.min.js'), array('jquery'), NULL, true );
	wp_enqueue_script('jImageLightbox');		
	wp_register_script('myScript', ($jscriptURL.'script.js'), array('jquery'), NULL, true );
	wp_enqueue_script('myScript');
	wp_register_script('mySlides', ($jscriptURL.'slides.min.jquery.js'), array('jquery'), NULL, true );
	wp_enqueue_script('mySlides');
	wp_register_script('myCycle', ($jscriptURL.'jquery.cycle.min.js'), array('jquery'), NULL, true );
	wp_enqueue_script('myCycle');
	wp_register_script('jselectBox', ($jscriptURL.'jquery.selectBox.js'), array('jquery'), NULL, true );
	wp_enqueue_script('jselectBox');
	wp_register_script('jvalidate', ($jscriptURL.'jquery.validate.min.js'), array('jquery'), NULL, true );
	wp_enqueue_script('jvalidate');
	wp_register_script('janimate', ($jscriptURL.'jquery.animate.js'), array('jquery'), NULL, true );
	wp_enqueue_script('janimate');
	wp_register_script('janchorScroll', ($jscriptURL.'jquery.anchorScroll.js'), array('jquery'), NULL, true );
	wp_enqueue_script('janchorScroll');
	wp_register_script('mediaQueryToggle', ($mjscriptURL.'jquery.foundation.mediaQueryToggle.js'), array('jquery'), NULL, true );
	wp_enqueue_script('mediaQueryToggle');	
	wp_register_script('navigation', ($mjscriptURL.'jquery.foundation.navigation.js'), array('jquery'), NULL, true );
	wp_enqueue_script('navigation');	
	wp_register_script('topbar', ($mjscriptURL.'jquery.foundation.topbar.js'), array('jquery'), NULL, true );
	wp_enqueue_script('topbar');	
	wp_register_script('reveal', ($mjscriptURL.'jquery.foundation.reveal.js'), array('jquery'), NULL, true );
	wp_enqueue_script('reveal');	
	wp_register_script('app', ($mjscriptURL.'app.js'), array('jquery'), NULL, true );
	wp_enqueue_script('app');	
	wp_register_script('mobileScript', ($mjscriptURL.'mobileScript.js'), array('jquery'), NULL, true );
	wp_enqueue_script('mobileScript');	
	wp_register_script('modernizr', ($mjscriptURL.'touch_slider/modernizr.custom.17475.js'), array('jquery'), NULL, true );
	wp_enqueue_script('modernizr');	
	wp_register_script('elastislide', ($mjscriptURL.'touch_slider/jquery.elastislide.js'), array('jquery'), NULL, true );
	wp_enqueue_script('elastislide');	
	wp_register_script('jquerypp', ($mjscriptURL.'touch_slider/jquerypp.custom.js'), array('jquery'), NULL, true );
	wp_enqueue_script('jquerypp');	
	}
	}
}
add_action('wp_enqueue_scripts', 'load_theme_scripts');


function add_menu_icons_styles(){
?>

<style>
#adminmenu .menu-icon-events div.wp-menu-image:before {
  content: "\f226";
}
</style>

<?php
}
add_action( 'admin_head', 'add_menu_icons_styles' );
function top_deals_img($post_id,$size) {

   if ( $images = get_children(array(
      'post_parent' => get_the_ID(),
      'post_type' => 'attachment',
      'post_mime_type' => 'image',
      'posts_per_page' => 1,
      )))
   {         foreach( $images as $image ) {
         $attachmenturl=wp_get_attachment_url($image->ID);
         $attachmentlink=wp_get_attachment_url($image->ID);
         $attachmentimage= wp_get_attachment_image($image->ID, $size );
         $bigp = wp_get_attachment_image($image->ID, 'full' );
         $img_title = $image->post_title;
         $img_desc = $image->post_excerpt;
         
            ?><?php echo $attachmentimage; ?><?php         
         
                  
      }
   } else {
      echo "";
   }
}
// custom menu support
	add_theme_support( 'menus' );
	if ( function_exists( 'register_nav_menus' ) ) {
	  	register_nav_menus(
	  		array(
	  		  'header-menu' => 'Header Menu'
	  		)
	  	);
	}
	// post thumbnail support
	add_theme_support( 'post-thumbnails' );		
	// theme pagination method
	function theme_pagination($pages = ''){
		global $paged;		
		if(empty($paged))$paged = 1;		
		$prev = $paged - 1;							
		$next = $paged + 1;	
		$range = 3; // only change it to show more links
		$showitems = ($range * 2)+1;		
		if($pages == '')
		{	
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if(!$pages)
			{
				$pages = 1;
			}
		}		
		if(1 != $pages){
			echo "<div id='pagination'>";
			echo ($paged > 2 && $paged > $range+1 && $showitems < $pages)? "<a href='".get_pagenum_link(1)."' class='btn'>&laquo; First</a> ":"";
			echo ($paged > 1 && $showitems < $pages)? "<a href='".get_pagenum_link($prev)."' class='btn'>&laquo; Previous</a> ":"";				
			for ($i=1; $i <= $pages; $i++){
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
					echo ($paged == $i)? "<a href='".get_pagenum_link($i)."' class='btn current'>".$i."</a> ":"<a href='".get_pagenum_link($i)."' class='btn'>".$i."</a> "; 
				}
			}			
			echo ($paged < $pages && $showitems < $pages) ? "<a href='".get_pagenum_link($next)."' class='btn'>Next &raquo;</a> " :"";
			echo ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) ? "<a href='".get_pagenum_link($pages)."' class='btn'>Last &raquo;</a> ":"";
			echo "</div>";
			}
	}	
	function render_ie_pie() {
		echo '<!--[if lte IE 8]>
				<style type="text/css" media="screen">
					.search-form-wrapper,
					.search-form-wrapper .find-btn:hover,
					#slides,
					#slides img,
					.image-container img,
					.tricol-product-list li .image-container img,
					.tricol-product-list li a:hover,
					.find-wrapper,
					.find-nav li a,
					.cars-list li a img:hover,
					.right-white-block,
					.right-white-block .side-block-btn:hover,
					.side-lift-block .search-btn:hover,
					.detail-page-content .big-view img,
					.thumbnails li img,
					.thumbnails li img:hover,
					.side-product-wrapper .image-container img,
					.side-product-wrapper  a:hover,
					.result-car,
					.result-car img,
					.learn-more-btn:hover,
					.more-news:hover,
					.footer-bubmit-btn:hover,
					#pagination a.btn
					{
						behavior: url('.trailingslashit(get_bloginfo('template_url')).'js/PIE.php);
					}
				</style>
			<![endif]-->';
	}		
	add_action('wp_head', 'render_ie_pie' );	
	function gorilla_img ($post_id,$size) {		
	$saved = get_post_custom_values('CarsGallery', $post_id);
	$saved = explode(',',$saved[0]);
	if ( count($saved)>0){
	 $image = $saved[0];
			$attachmenturl=wp_get_attachment_url($image);
			$attachmentimage= wp_get_attachment_image($image, $size );
			$bigp = wp_get_attachment_image($image, $size );
				?><?php echo $attachmentimage; ?><?php
		
	} else {
		echo "";
	}
?>

  <?php 
	}
	function arrivals_img ($post_id,$size) {		
	if ( $images = get_children(array(
		'post_parent' => get_the_ID(),
		'post_type' => 'attachment',
		'order' => 'ASC',
		'posts_per_page' => 1,
		'orderby' => 'menu_order',
		'post_mime_type' => 'image',
		)))
	{			foreach( $images as $image ) {
			$attachmenturl=wp_get_attachment_url($image->ID);
			$attachmentlink=wp_get_attachment_url($image->ID);
			$attachmentimage= wp_get_attachment_image($image->ID, $size );
			$img_title = $image->post_title;
			$img_desc = $image->post_excerpt;
			
				?><?php echo $attachmentimage; ?><?php						
		}
	} else {
		echo "";
	}
}
	function gallery_img ($size) {		
	global $post;
	$tmp_post = $post;			
	$args = array(
   'post_type' => 'attachment',
	'numberposts' => 1,
   'orderby' => 'menu_order',
   'order' => 'ASC',
   'post_parent' => $post->ID
  );
  $attachments = get_posts( $args );
     if ( $attachments ) {
        foreach ( $attachments as $attachment ): setup_postdata($post);  
       
        $img_title = $attachment->post_title;		
		$img_desc = $attachment->post_excerpt;
		$attachmentlink=wp_get_attachment_url($attachment->ID);
		$imageUrl = wp_get_attachment_image_src( $attachment->ID, $size );
		?>


<a href ="<?php echo $imageUrl[0];?> "><img src="<?php echo $imageUrl[0]; ?>"/></a>
  <?php endforeach; $post = $tmp_post;
	}
}
	
if(!get_option("medium_crop"))
    add_option("medium_crop", "1");
	else
    update_option("medium_crop", "1");
	if(!get_option("large_crop"))
    add_option("large_crop", "1");
	else
    update_option("large_crop", "1");	
    if( FALSE === get_option("thumbnail_large_size_w") )
	{	

	add_option("admin_size_w", "132");
	add_option("admin_size_h", "100");
	add_option("admin_crop", "1");			
	}
	else
	{			
	update_option("admin_size_w", "132");
	update_option("admin_size_h", "100");
	update_option("admin_crop", "1");					
	}

function additional_image_sizes( $sizes ){
	$sizes[] = "admin";
	return $sizes;
	}
add_filter( 'intermediate_image_sizes', 'additional_image_sizes' );
	function remove_quick_edit( $actions ) {
	unset($actions['inline hide-if-no-js']);
	return $actions;
	}
	add_filter('post_row_actions','remove_quick_edit',10,1);
function cps_show_title(){
	global $CPS_OPTIONS;	
	$i = 0;
	// Taxonomies:
	if( isset($CPS_OPTIONS['taxonomies']) && !empty($CPS_OPTIONS['taxonomies']) ){
		foreach($CPS_OPTIONS['taxonomies'] as $taxonomy){
			if(isset($_GET[$taxonomy]) && trim($_GET[$taxonomy] != '')){
				$separator = $i ? '/': ' ';
				echo $separator . $taxonomy .'-'.$_GET[$taxonomy];
	// echo $separator . $_GET[$taxonomy];
				$i++;
			}
		}
	}
	foreach($CPS_OPTIONS['meta_boxes_vars'] as $meta_boxes){
		
		foreach($meta_boxes as $metaBox){
			if(isset($_GET[$metaBox['name']]) && trim($_GET[$metaBox['name']]) != ''){
				$separator = $i ? '/': ' ';
				echo $separator. $metaBox['name'] .'-'.  $_GET[$metaBox['name']];
				$i++;
				
			}
		}
	}
}
function get_hierarchical_terms($taxonomy, $parent = 0, $level = 0) 
	{
		$sPadding = '';
		
		for ($i = 0; $i <= $level; $i++) 
		{
			$sPadding .= '&nbsp;';
		}		
		$aTerms = get_terms($taxonomy, 'orderby=name&hide_empty=0&parent=' . (int)$parent);
		if($aTerms)
		{
			$aResults = array();
			foreach($aTerms as $oTerm) 
			{
				
				$oTerm->title = $sPadding . $oTerm->name;
				
				$aResults[] = $oTerm;
				
				$aChildren = get_hierarchical_terms($taxonomy, $oTerm->term_id, ((int)$level)+3);
				
				if ($aChildren) 
				{
					$aResults[] = $aChildren;
				}
			}
			return $aResults;
		}
		
		return false;
	}

add_action( 'show_user_profile', 'email_notification' );
add_action( 'edit_user_profile', 'email_notification' );

function email_notification( $user ) { ?>

	<h3><?php _e('E-mail Notification of New Listings Submitted for Approval','language');?></h3>
	<table class="form-table">
		<tr>
			<th>
				<label FOR="checktest"><?php _e('I want to be notified by e-mail','language');?></label>
			</th>
			<td>
			<?php $status = get_the_author_meta( 'emailmsg', $user->ID ); ?>
			<input type="hidden" name="emailmsg" value="0"/>		
			<input TYPE="checkbox" name="emailmsg" value="1" <?php checked( $status, 1 ); ?> /><br />
			</td>
		</tr>
	</table>	
<?php //if( !get_the_author_meta( 'emailmsg', $user->ID ) )  { 
//echo ''; 
//} else {
//echo get_the_author_meta( 'user_email', $user->ID );
//};
?>
<?php }
add_action( 'personal_options_update', 'save_email_option' );
add_action( 'edit_user_profile_update', 'save_email_option' );

function save_email_option( $user_id ) {

		if ( !current_user_can( 'edit_user', $user_id ) )
		
		{ return false; } else {if (isset($_POST['emailmsg'])) {
    update_user_meta( $user_id, 'emailmsg', $_POST['emailmsg'] );
}
	
	
}}
function is_post_type($type){
    global $wp_query;
    if($type == get_post_type($wp_query->post->ID)) return true;
    return false;
}
function remove_post_custom_fields() {
		remove_meta_box( 'postcustom' , 'gtcd' , 'normal' ); 
		}
		add_action( 'admin_menu' , 'remove_post_custom_fields' );
		function extended_contact_info($user_contactmethods) {  
		$user_contactmethods = array(
		'phone' => __('Phone','language'),
		'skype' => __('Skype','language'),
		'gtalk' => __('Gtalk','language')
		);  
		return $user_contactmethods;
	}  
	
	add_filter('user_contactmethods', 'extended_contact_info');
	
function custom_title_text( $title ){
      $screen = get_current_screen();
      if ( 'gtcd' == $screen->post_type ) {
      $title = __('Enter Vehicle Make & Model Here','language');
      }
		return $title;
	}
	add_filter( 'enter_title_here', 'custom_title_text' );

function admin_del_options() {
	   global $_wp_admin_css_colors;
	   $_wp_admin_css_colors = 0;
	}
	add_action('admin_head', 'admin_del_options');
	
	remove_filter('pre_user_description', 'wp_filter_kses');
function new_excerpt_more($more) {
		 global $post;
		return '...<a  class="more" href="'. get_permalink($post->ID) . '">'.__('more','language').'</a>';
	}
	add_filter('excerpt_more', 'new_excerpt_more');
	
function new_excerpt_length($length) {
		return 34;
	}


	add_filter('excerpt_length', 'new_excerpt_length');

function remove_menus () {
		global $current_user;
			 get_currentuserinfo();
		     if ($current_user->user_level < 8){
			global $menu;
			$restricted = array(__('Dashboard','language'), __('Media','language'), __('Links','language'), __('Pages','language'), __('Appearance','language'), __('Tools','language'), __('Users','language'), __('Settings','language'), __('Comments','language'), __('Plugins','language'));
			end ($menu);
			while (prev($menu)){
				$value = explode(' ',$menu[key($menu)][0]);
				if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
		}}
	}
	add_action('admin_menu', 'remove_menus');
function gt_restrict_manage_authors() {
		  if (isset($_GET['post_type']) && post_type_exists($_GET['post_type']) && in_array(strtolower($_GET['post_type']), array('your_custom_post_types', 'here'))) {
			    wp_dropdown_users(array(
					'show_option_all'       => 'Show all Authors',
					'show_option_none'      => false,
					'name'                  => 'author',
					'selected'              => !empty($_GET['author']) ? $_GET['author'] : 0,
					'include_selected'      => false
			    ));
		  }
	}
	add_action('restrict_manage_posts', 'gt_restrict_manage_authors');
function custom_feed_request( $vars ) {
	 if (isset($vars['feed']) && !isset($vars['post_type']))
	  $vars['post_type'] = array( 'post', 'gtcd' );
	 return $vars;
	}
	add_filter( 'request', 'custom_feed_request' );


function prefix_filter_gettext( $translated, $original, $domain ) {
 

    $strings = array(
        'View all posts filed under %s' => 'See all articles filed under %s',
        'Howdy, %1$s' => 'Greetings, %1$s!',
     
    );

    if ( isset( $strings[$original] ) ) {
        $translations = &get_translations_for_domain( $domain );
        $translated = $translations->translate( $strings[$original] );
    }
 
    return $translated;
}
 
add_filter( 'gettext', 'prefix_filter_gettext', 10, 3 );
add_action('admin_init','my_init_method');
add_action( 'add_meta_boxes', 'video_meta_box_add' );	
	function video_meta_box_add()
   {
      add_meta_box( 'video-meta-box-id', 'Video Meta Box', 'video_meta_box_cb', 'gtcd', 'side', 'core' );
      add_meta_box( 'video-meta-box-id', 'Video Meta Box', 'video_meta_box_cb', 'user_listing', 'side', 'core' );
   }
	function video_meta_box_cb( $post )
	{
		$values = get_post_custom( $post->ID );
		
		$videoid = isset( $values['video_meta_box_videoid'] ) ? esc_attr( $values['video_meta_box_videoid'][0] ) : '';
		$source = isset( $values['video_meta_box_source'] ) ? esc_attr( $values['video_meta_box_source'][0] ) : '';
		
		wp_nonce_field( 'video_meta_box_nonce', 'meta_box_nonce' );
		?>
		<p>
			<label for="video_meta_box_videoid"><?php _e('Video ID','language')?></label>
			<input type="text" name="video_meta_box_videoid" id="video_meta_box_videoid" value="<?php echo $videoid; ?>" />
		</p>		
		<p>
			<label for="video_meta_box_source"><?php _e('Video Source','language')?></label>
			<select name="video_meta_box_source" id="video_meta_box_source">
				<option value="youtube" <?php selected( $source, 'youtube' ); ?>><?php _e('YouTube','language')?></option>
				<option value="vimeo" <?php selected( $source, 'vimeo' ); ?>><?php _e('Vimeo','language')?></option>
			</select>
		</p>		
		<?php	
	}	
	add_action( 'save_post', 'video_meta_box_save' );	
	function video_meta_box_save( $post_id )
	{


		if( isset( $_POST['video_meta_box_videoid'] ) )
			update_post_meta( $post_id, 'video_meta_box_videoid', wp_kses( $_POST['video_meta_box_videoid'], $allowed ) );
			
		if( isset( $_POST['video_meta_box_source'] ) )
			update_post_meta( $post_id, 'video_meta_box_source', esc_attr( $_POST['video_meta_box_source'] ) );	
} ?>
<?php function my_query_post_type($query) {
    if ( is_category() && false == $query->query_vars['suppress_filters'] )
        $query->set( 'post_type', array( 'post', 'gtcd', ) );
    return $query;
}
add_filter('pre_get_posts', 'my_query_post_type');

add_action( 'restrict_manage_posts', 'my_restrict_manage_posts' );
function my_restrict_manage_posts()
{
    // only display these taxonomy filters on desired custom post_type listings
    global $typenow;
    if ($typenow == 'gtcd')
   {
      $filters = get_taxonomies();
   
        foreach ($filters as $tax_slug)
      {
         //creates drop down menu only for makemodel and features
         if($tax_slug == 'makemodel')
         {
            // retrieve the taxonomy object
            $tax_obj = get_taxonomy($tax_slug);
            $tax_name = $tax_obj->labels->name;
            // retrieve array of term objects per taxonomy
            $terms = get_terms($tax_slug, array( 'parent' => 0 ) );
            
   
            // output html for taxonomy dropdown filter
            echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
            echo "<option value=''>View  $tax_name</option>";
            foreach ($terms as $term)
            {
               // output each select option line, check against the last $_GET to show the current option selected
               echo '<option value='. $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>';
            }
            echo "</select>";
         }//end if
      }//end foreach
      
    }//end if
   
}//end function
// add conditional statements
function is_ipad() { // if the user is on an iPad
	$is_ipad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
	if ($is_ipad)
		return true;
	else return false;
}
function is_iphone() { // if the user is on an iPhone
	$cn_is_iphone = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPhone');
	if ($cn_is_iphone)
		return true;
	else return false;
}
function is_ipod() { // if the user is on an iPod Touch
	$cn_is_iphone = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPod');
	if ($cn_is_iphone)
		return true;
	else return false;
}
function is_ios() { // if the user is on any iOS Device
	if (is_iphone() || is_ipad() || is_ipod())
		return true;
	else return false;
}
function is_android() { // detect ALL android devices
	$is_android = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'Android');
	if ($is_android)
		return true;
	else return false;
}
function is_android_mobile() { // detect only Android phones
	$is_android   = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'Android');
	$is_android_m = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'Mobile');
	if ($is_android && $is_android_m)
		return true;
	else return false;
}
function is_android_tablet() { // detect only Android tablets
	if (is_android() && !is_android_mobile())
		return true;
	else return false;
}
function is_mobile_device() { // detect Android Phones, iPhone or iPod
	if (is_android_mobile() || is_iphone() || is_ipod())
		return true;
	else return false;
}
function is_tablet() { // detect Android Tablets and iPads
	if ((is_android() && !is_android_mobile()) || is_ipad())
		return true;
	else return false;
}
add_action('admin_head', 'edmunds_javascript');
function edmunds_javascript() {
?>
<script type="text/javascript" > 
function get_api_data(){
		if (jQuery("#VIN_Code").val()==''){
			jQuery("#API_message").html('<div class="error"><p>Please type your vehicle VIN code first!</p></div>');
			jQuery("#API_message").show();
			return;
		}

		if (jQuery("#VIN_Code").val().length != 17){
			jQuery("#API_message").html('<div class="error"><p>Please type correct vehicle VIN code first!</p></div>');
			jQuery("#API_message").show();		
			return;
		}

		jQuery('#API_message').hide();		
		
		jQuery("#poststuff :input").attr("disabled", true);
		jQuery("#MyLoading").css({'display': 'inline'});
		jQuery("#GetData").hide();
		jQuery.ajax({
				type: "POST",
				data: ({action : 'rw_api_data', vin : jQuery("#VIN_Code").val()}),
				url: ajaxurl,				
				success: function(data)
				{
					jQuery("#poststuff :input").attr("disabled", false);
					var result = jQuery.parseJSON(data);
					jQuery.each(result, function(k, v) {
						if (k != 'makemodel-all'){
							if(jQuery('[name="' + k + '"]').is("select")) {
								//alert(k + ':' + v);
							}					
							if (k!='post_title'){
								jQuery('[name="' + k + '"]').val(v)								
							}else{
								if (jQuery('[name="post_title"]').val() == ''){
									jQuery('[name="post_title"]').val(v)
									jQuery("#title-prompt-text").hide()																								
								}
							}
						}else{
							jQuery('#' + k ).html(v)
						}
					});
						
					jQuery("#VIN_Code").val('');					
					jQuery("#MyLoading").css({'display': 'none'});					
					jQuery("#GetData").show();

				}
			});					
}

function messagebox(txt){
	jQuery("#messageBox").removeClass().addClass("confirmbox").html(txt).fadeIn(1000).fadeOut(1000);
}
function alertbox(txt){
	jQuery("#messageBox").removeClass().addClass("errorbox").html(txt).fadeIn(1000).fadeOut(1000);
}
// Delete image
function deletePost(id){
	var post_id = jQuery('#post_ID').val();		
    jQuery.ajax({
      url: ajaxurl,
      type: "post",
      data: ({action : 'rw_delete_file',postid: post_id, image_id: id, nonce: "<?php echo wp_create_nonce("DelGalImage");?>"}),
      success: function(data){
		  if (data=='0'){
			 messagebox('Image has been removed!');
			jQuery("#item_"+id).remove();

			var str = jQuery('#tgm-new-media-image').val();
			var exploded = str.split(',');
			jQuery.each(exploded, function (key, value) {
				if(value==id){
					exploded.splice(key,1)
				}
			});
			jQuery('#tgm-new-media-image').val(exploded.join(','));

		  }else{
			 alertbox('Image removal failed!');
		  }
		  
      },
      error:function(){
			 alertbox('Connection failed. please try again later!');
      }   
	});
}

// Save image gallery
function update_gallery(){
	jQuery('#rw-images-').empty();	
	var IDs = jQuery('#tgm-new-media-image').val();
	var id = jQuery('#post_ID').val();	
    jQuery.ajax({
      url: ajaxurl,
      type: "post",
      data: ({action : 'rw_save_gallery',post_id: id, Gallery_IDs: IDs, nonce: "<?php echo wp_create_nonce("AddGalImage");?>"}),
      success: function(data){
			messagebox("Gallery updated!");
			jQuery('#rw-images-').append(data);
      },
      error:function(){
			 alertbox('Connection failed. Gallery update didn\'t completed!');
      }   
	});
}	
jQuery(document).ready(function($) {
	// reorder images
	$('.rw-images').each(function(){
		var $this = $(this),
			order, data;
		$this.sortable({
			placeholder: 'ui-state-highlight',
			update: function (){
				order = $this.sortable('serialize');
				data = order + '|' + $('.rw-images-data').val();			
				$.post(ajaxurl, {action: 'rw_reorder_images', data: data}, function(response){																					
					if (response == '0'){
						messagebox("Images have been reordered");
					}else{
						alertmessage("You don't have permission to reorder images.");
					}
				});
			}
		});
	});

});
</script>
<?php
}
add_action( 'save_post', 'save_mademodel_meta');
function save_mademodel_meta(){
	if (isset($_POST['Vehicle_Make']) AND isset($_POST['Vehicle_model'])){
		$ID = $_POST['ID'];
		
		//Add new Made
		$term = term_exists($_POST['Vehicle_Make'], 'makemodel');
		
		if ($term !== 0 && $term !== null) {
			$Vehicle_Make_Id = intval($term['term_id']);
		}else{
			$term = wp_insert_term(
			  $_POST['Vehicle_Make'], // the term 
			  'makemodel', // the taxonomy
			  array(
				'parent'=> 0
			  )
			  );
			$Vehicle_Make_Id = $term['term_id'];
		}
		$term = term_exists($_POST['Vehicle_model'], 'makemodel');
		
		if ($term !== 0 && $term !== null) {
			$Vehicle_model_Id = intval($term['term_id']);
		}else{
			$term = wp_insert_term(
			  $_POST['Vehicle_model'], // the term 
			  'makemodel', // the taxonomy
			  array(
				'parent'=> $Vehicle_Make_Id
			  )
			  );
			$Vehicle_model_Id = $term['term_id'];
		}

		force_flush_term_cache('makemodel');
		$cat_ids = array($Vehicle_Make_Id,$Vehicle_model_Id);
		wp_set_object_terms($ID, $cat_ids, 'makemodel');
	}
	
}

function force_flush_term_cache( $taxonomy = 'category' ) {
	if ( !taxonomy_exists( $taxonomy ) ) return FALSE;

	wp_cache_set( 'last_changed', time( ) - 1800, 'terms' );
	wp_cache_delete( 'all_ids', $taxonomy );
	wp_cache_delete( 'get', $taxonomy );
	delete_option( "{$taxonomy}_children" );
	_get_term_hierarchy( $taxonomy );
	return TRUE;
}
<div id="product-list-wrapper-similar" class="hide-for-small">

	<h2><?php _e('Browse Similar cars by features','language');?></h2>

		<ul class="tricol-product-list-similar detail-page-product-list">

		<?php 

				global $post;

				$terms = get_the_terms( $post->ID , 'features');

				$do_not_duplicate[] = $post->ID;

 				if(!empty($terms)){

    			foreach ($terms as $term) {

        		query_posts( array(

        		'features' => $term->slug,

        		'posts_per_page' => 1,

        		'ignore_sticky_posts' => 1,

        		'post__not_in' => $do_not_duplicate ) );

        		if(have_posts()){ while ( have_posts() ) : the_post(); $do_not_duplicate[] = $post->ID; ?>

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


arrivals_img ($post->ID,'arrivals');
}

}


} elseif ( 'gtcd' == get_post_type($post->ID) ) {

gorilla_img ($post->ID,'arrivals');

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

			<?php endwhile; wp_reset_query();

        	}

    	}

} 	?>

		</ul>

	</div><!--end of content div-->
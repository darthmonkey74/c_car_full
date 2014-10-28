<?php $query = new WP_Query(array('post_type' => array('gtcd'),'posts_per_page' => '1' )); if ( $query->have_posts() ) while ( $query->have_posts() ) : $query->the_post(); ?>

<?php global $output,$findmake,$post,$field, $fields, $fields2, $fields3; $fields = get_post_meta($post->ID, 'mod1', true); $fields3 = get_post_meta($post->ID, 'mod3', true); $fields2 = get_post_meta($post->ID, 'mod2', true);  $symbols = get_option('gorilla_symbols'); $options = get_option('gorilla_fields');include(TEMPLATEPATH."/functions/var/default-box-one.php");include(TEMPLATEPATH."/functions/var/default-box-two.php");include(TEMPLATEPATH."/functions/var/default-box-three.php");?>
	<div  class="full-width find-wrapper">
		<ul class="find-nav">
			<li><a class="active one" href="#" style="width:auto;"><?php _e('Find cars by Vehicle Type','language')?></a></li>
			<li><a class="two" href="#" style="width:auto;"><?php _e('Find cars by Features','language');?></a></li>
			<li class="last-child"><a class="three" href="#" style="width:auto;"><?php _e('Find cars by Make','language');?></a></li>
		</ul>
			<div id="cars-container">
				<ul class="cars-list list-one">
					<li><a  id="link" href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", vehicletype)); ?>-<?php echo str_replace(' ', '+', $options['vehicletype1']);?>/"><img src="<?php bloginfo('template_url'); ?>/images/product-images/convertible.jpg" alt="<?php echo $options['vehicletype1'];?>" /></a>

	                    <a  id="link" href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", vehicletype)); ?>-<?php echo str_replace(' ', '+', $options['vehicletype1']);?>/"><strong><?php	 if ( $fields['vehicletype']){ echo $options['vehicletype1'];}else {  echo ''; }?></strong></a>
					</li>
					<li><a id="link" href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", vehicletype)); ?>-<?php echo str_replace(' ', '+', $options['vehicletype2']);?>/"><img src="<?php bloginfo('template_url'); ?>/images/product-images/crossover.jpg" alt="<?php echo $options['vehicletype2'];?>" /></a>
						<a id="link" href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", vehicletype)); ?>-<?php echo str_replace(' ', '+', $options['vehicletype2']);?>/"><strong><?php	 if ( $fields['vehicletype']){ echo $options['vehicletype2'];}else {  echo ''; }?></strong></a>
					</li>
					<li><a id="link" href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", vehicletype)); ?>-<?php echo str_replace(' ', '+', $options['vehicletype3']);?>/"><img src="<?php bloginfo('template_url'); ?>/images/product-images/luxury.jpg" alt="<?php echo $options['vehicletype3'];?>" /></a>
						<a id="link" href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", vehicletype)); ?>-<?php echo str_replace(' ', '+', $options['vehicletype3']);?>/"><strong><?php	 if ( $fields['vehicletype']){ echo $options['vehicletype3'];}else {  echo ''; }?></strong></a>
					</li>
					<li><a id="link" href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", vehicletype)); ?>-<?php echo str_replace(' ', '+', $options['vehicletype4']);?>/"><img src="<?php bloginfo('template_url'); ?>/images/product-images/hybrid.jpg" alt="<?php echo $options['vehicletype4'];?>" /></a>
						<a id="link" href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", vehicletype)); ?>-<?php echo str_replace(' ', '+', $options['vehicletype4']);?>/"><strong><?php	 if ( $fields['vehicletype']){ echo $options['vehicletype4'];}else {  echo ''; }?></strong></a>
					</li>
					<li><a id="link" href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", vehicletype)); ?>-<?php echo str_replace(' ', '+', $options['vehicletype5']);?>/"><img src="<?php bloginfo('template_url'); ?>/images/product-images/minivans.jpg" alt="<?php echo $options['vehicletype5'];?>" /></a>
						<a id="link" href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", vehicletype)); ?>-<?php echo str_replace(' ', '+', $options['vehicletype5']);?>/"><strong><?php	 if ( $fields['vehicletype']){ echo $options['vehicletype5'];}else {  echo ''; }?></strong></a>
					</li>
					<li><a id="link" href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", vehicletype)); ?>-<?php echo str_replace(' ', '+', $options['vehicletype6']);?>/"><img src="<?php bloginfo('template_url'); ?>/images/product-images/pickuptrucks.jpg" alt="<?php echo $options['vehicletype6'];?>" /></a>
						<a id="link" href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", vehicletype)); ?>-<?php echo str_replace(' ', '+', $options['vehicletype6']);?>/"><strong><?php	 if ( $fields['vehicletype']){ echo $options['vehicletype6'];}else {  echo ''; }?></strong></a>                       </li>
					<li><a id="link" href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", vehicletype)); ?>-<?php echo str_replace(' ', '+', $options['vehicletype7']);?>/"><img src="<?php bloginfo('template_url'); ?>/images/product-images/sedanscoupes.jpg" alt="<?php echo $options['vehicletype7'];?>" /></a>
						<a id="link" href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", vehicletype)); ?>-<?php echo str_replace(' ', '+', $options['vehicletype7']);?>/"><strong><?php	 if ( $fields['vehicletype']){ echo $options['vehicletype7'];}else {  echo ''; }?></strong></a>
					</li>
					<li><a id="link" href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", vehicletype)); ?>-<?php echo str_replace(' ', '+', $options['vehicletype8']);?>/"><img src="<?php bloginfo('template_url'); ?>/images/product-images/diesel.jpg" alt="<?php echo $options['vehicletype8'];?>" /></a>
						<a id="link" href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", vehicletype)); ?>-<?php echo str_replace(' ', '+', $options['vehicletype8']);?>/"><strong><?php	 if ( $fields['vehicletype']){ echo $options['vehicletype8'];}else {  echo ''; }?></strong></a>
					</li>
					<li><a id="link" href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", vehicletype)); ?>-<?php echo str_replace(' ', '+', $options['vehicletype9']);?>/"><img src="<?php bloginfo('template_url'); ?>/images/product-images/sportutilities.jpg" alt="<?php echo $options['vehicletype9'];?>" /></a>
						<a id="link" href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", vehicletype)); ?>-<?php echo str_replace(' ', '+', $options['vehicletype9']);?>/"><strong><?php	 if ( $fields['vehicletype']){ echo $options['vehicletype9'];}else {  echo ''; }?></strong></a>
					</li>
					<li><a id="link" href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", vehicletype)); ?>-<?php echo str_replace(' ', '+', $options['vehicletype10']);?>/"><img src="<?php bloginfo('template_url'); ?>/images/product-images/sportscars.jpg" alt="<?php echo $options['vehicletype10'];?>" /></a>
						<a id="link" href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", vehicletype)); ?>-<?php echo str_replace(' ', '+', $options['vehicletype10']);?>/"><strong><?php	 if ( $fields['vehicletype']){ echo $options['vehicletype10'];}else {  echo ''; }?></strong></a>
					</li>
					<li><a id="link" href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", vehicletype)); ?>-<?php echo str_replace(' ', '+', $options['vehicletype11']);?>/"><img src="<?php bloginfo('template_url'); ?>/images/product-images/wagons.jpg" alt="<?php echo $options['vehicletype11'];?>" /></a>
						<a id="link" href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", vehicletype)); ?>-<?php echo str_replace(' ', '+', $options['vehicletype11']);?>/"><strong><?php	 if ( $fields['vehicletype']){ echo $options['vehicletype11'];}else {  echo ''; }?></strong></a>
					</li>
					<li><a  id="link" href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", vehicletype)); ?>-<?php echo str_replace(' ', '+', $options['vehicletype12']);?>/"><img src="<?php bloginfo('template_url'); ?>/images/product-images/4WD-AWD.jpg" alt="<?php echo $options['vehicletype12'];?>" /></a>
						<a id="link" href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", vehicletype)); ?>-<?php echo str_replace(' ', '+', $options['vehicletype12']);?>/"><strong><?php	 if ( $fields['vehicletype']){ echo $options['vehicletype12'];}else {  echo ''; }?></strong></a>
					</li>
				</ul>
				<ul class="cars-list list-two">
				<?php if (get_terms('features')) { $taxonomy = get_terms( 'features', array('number'    => '50','orderby'=>'count') );
				foreach ($taxonomy as $taxonomy_term) {
    								$output .= '<li><a id="link" href="'.get_bloginfo('url').'/#search/'.strtolower(str_replace(" ", "", features)).'-'.str_replace(' ', '+', $taxonomy_term->name).'/">'. $taxonomy_term->name .'</a></li>';}
									echo $output;									
									}
								?>
				</ul>
				<ul class="cars-list list-three">
				<?php if (get_terms('makemodel')) { $makemodel = get_terms( 'makemodel', array( 'orderby'    => 'ASC', 'hide_empty' => 0, 'parent' => 0) );
				foreach ($makemodel as $makemodel_term) {							
						$findmake.= '<li><a id="link" href="'.get_bloginfo('url').'/#search/'.strtolower(str_replace(" & ", '', makemodel)).'-'.str_replace(' ', '+', $makemodel_term->name).'/">'. $makemodel_term->name .'</a></li>';
						} echo $findmake; }	 ?>
				</ul>
		</div><!--end of cars container div-->
	</div>
<br/>
<?php endwhile; wp_reset_query(); ?> 
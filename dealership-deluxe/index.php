<?php get_header('home'); ?>
		<div id="content">
			<span id="results"></span>
			<?php cps_ajax_search_results(); ?>				 
				<div class="tri-col-span hideOnSearch mini-hide">
					<?php if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar('Welcome Widget') ) : ?>
					<?php endif; ?>
				</div>
<div><?php require_once( AUTODEALER_INCLUDES.'arrivals.php'); ?></div>	
		</div><!--end of content div-->	
		<div id="sidebar" class="home" >
			<?php if ( ! dynamic_sidebar('Sidebar')) : ?>
			<?php endif; ?>
		</div><!--end of sidebar div-->
		<?php if (is_home()) : ?><!--Tabbed content -->
 <h1> This is homepage template </h1>
<?php endif; ?><!--Tabbed content -->
		<div style="clear:both"></div>
<div class="hide-for-small">
		<?php require_once( AUTODEALER_INCLUDES.'find-cars.php'); ?>
</div>
	</div><!--end of container div-->  
	<div style="clear:both"></div>    
<?php get_footer(); ?>
<?php
/*
Template Name: Full Inventory
*/
?>
<?php get_header(); ?>
<div class="top-single-bar hide">
            <div class="backToInventory show-for-small"><a href="javascript: history.go(-1)">< Back</a></div>
            <div class="show-for-small refine-search-single"><a id="searchBoxPop2" href="#"></a></div>
            <div class="clear"></div>
            </div>
            <div id="sidebar-search" > 
		<?php if ( ! dynamic_sidebar( 'Search Module' )) : ?>
				<?php endif; ?>
				</div>
	<div id="content-single">
		<div class="tri-col-span" ><div class="detail-page-content-fix">
		<?php cps_ajax_search_results(); ?>
<div class="cpsAjaxLoaderResults" ></div> 
			</div>			
		</div></div>
		<div id="sidebar" class="common"> 
            	<?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?>
				<?php endif; ?>
			</div>
            </div><!--end of container div--> 
			<div class="clearfix"></div>
		<div style="clear:both"></div>
<?php get_footer(); ?>
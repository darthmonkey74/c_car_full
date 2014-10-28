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
		<?php cps_ajax_search_results(); ?>
			<div class="cpsAjaxLoaderCenter"></div> 
		<div class="tri-col-span hideOnSearch">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<div class="blog-post">
				<h1><a href="<?php the_permalink() ?>"><?php the_title();?></a></h1>
					<?php the_content();?>
			</div>
				<?php endwhile; ?>				
			</div>			
		</div>

		<div id="sidebar" class="common"> 
            	<?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?>
				<?php endif; ?>
			</div>
			<div class="clearfix"></div>
		<div style="clear:both"></div>
<?php get_footer(); ?>
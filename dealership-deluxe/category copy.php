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
		<?php cps_ajax_search_results(); ?>
	<div id="content-single">
		<div class="cpsAjaxLoaderCenter"></div> 
			<div class="tri-col-span hideOnSearch">
				<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
                  	<div class="blog-post">
					<h1><a href="<?php the_permalink() ?>"><?php the_title();?></a></h1>
					<?php if(has_post_thumbnail()) {  the_post_thumbnail('featured');} ?>
                    	<?php the_content();?>
					</div>
				<?php  endwhile; else: ?>
					<div class="no-post">
						<h3><?php _e('No, Results Found','language');?></h3>
						<p><?php _e('Sorry, No Posts found!','language');?></p>
					</div>
				<?php endif;?>
				<?php theme_pagination( $wp_query->max_num_pages); ?>
			</div>			
		</div><!--end of content div-->
		<div id="sidebar" class="common">
            	<?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?>
				<?php endif; ?>
		</div>	
		<div class="clearfix"></div>
	</div><!--end of container div-->
<?php get_footer(); ?>
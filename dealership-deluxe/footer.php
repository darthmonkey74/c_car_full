<div class="footer-wrapper">
	<div id="footer">
		<?php if ( ! dynamic_sidebar( 'Footer' )) : ?>
		<?php endif; ?>
	</div><!--end of footer div-->
	</div><!--end of footer-wrapper div-->	
	<div class="bottom-bar-wrapper hide-for-small">
	<div class="bottom-bar">
		<p><?php _e('Dealership by ','language');?>
			<a href="http://gorillathemes.com"><?php echo('Gorilla Themes');?></a> - <?php _e('Powered by ','language');?>
			<a href="http://wordpress.org"><?php _e('WordPress','language');?></a>
		</p>
	</div>
</div>
<footer id="footerMob" class="row show-for-small">
            <div style="width:100%; height:48px;">
            <div class="twelve columns">            
                <div class="footer_links"><?php _e('Dealership by','language');?>
					<a href="http://gorillathemes.com" class="footer-gorilla-link"></a> - <?php _e('Powered by','language');?>
					<a href="http://wordpress.org" class="footer-wp-link"></a>
				</div>              
            </div>                      
            </div>
            <div class="eight columns">
          		<ul class="inline-list left" style="margin-top:12px;">                  
                   <li>                  
                   <!-- Get Contact page ID -->
					<?php
                    $pages = get_pages(array(
                    'meta_key' => '_wp_page_template',
                    'meta_value' => 'contact-us.php',
                    'hierarchical' => 0
                    ));
                    foreach($pages as $page){
                    echo '<a href="'.get_site_url().'?p='.$page->ID.'">Contact Us</a>';
					break;
                    }
                    ?>                                     
                    </li>
                </ul>
                <ul class="inline-list right" style="margin-top:12px;">
                  <li><a class="to-top scrollup" href="#">Go To Top</a></li>                  
                </ul>
            </div>         
</footer>               
<?php wp_footer(); ?>	
</body>
</html>
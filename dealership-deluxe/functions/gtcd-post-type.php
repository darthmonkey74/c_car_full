<?php

	add_action('init', 'gtcd');
function gtcd()
	{ 
		register_post_type( 
				'gtcd', 
				array(
					'labels' => array(
						'name' => __('Inventory','language'),
						'add_new' => __('Add New Vehicle','language'),
						'add_new_item' => __('Add New Vehicle','language'),
						'edit_item' => __('Edit Vehicle','language'),
						'new_item' => __('Add New Vehicle','language'),
						'view_item' => __('View Vehicle','language'),
						'search_items' => __('Search Vehicles','language'),
						'not_found' => __('No Vehicles Found','language'),
						'not_found_in_trash' => __('No Vehicles Found In Trash','language')
					),
					'query_var' => true,
					'rewrite' => array('slug' => __('inventory','language')),
					'singular_name' => __('Inventory','language'),
					'public' => true,
					'can_export' => true,
					'menu_position' => 8,
					'_edit_link' => 'post.php?post=%d',
					'capability_type' => 'post',
					'menu_icon' => 'dashicons-list-view',
					'hierarchical' => false,
					'supports' => array('author','custom-fields','title') ,
					'taxonomies' => array('category')
				));
	} 	
	add_filter('manage_edit-gtcd_columns', 'gtcd_edit_columns');
	add_action('manage_gtcd_posts_custom_column', 'gtcd_custom_columns');
	
function gtcd_edit_columns($columns)
	{
			$columns = array(
				'cb' => '<input type="checkbox" />',
				'title' => __('Make & Model','language'),
				'pinfo' => __('Vehicle Information','language'),
				'image' => __('Vehicle Photo','language'),		
			);
			
			return $columns;
	}
function gtcd_custom_columns($column)
	{
		global $post;
	
		switch ($column)
		{
			case 'image':
			// get new galley images
				$saved = get_post_custom_values('CarsGallery', get_the_ID());
				$saved = explode(',',$saved[0]);
				if ( count($saved)>0 ){ 				
			?>					
				<style type="text/css" media="screen">
				img{ background:#eee; padding:10px;border: 1px solid #ddd;margin-bottom: 14px;}				
				</style>

					<a href="<?php the_permalink(); ?>">
						<div style="padding-top:16px!important;">
						<?php
                        	//gorilla_img('admin_photo');
							$attachmentimage=wp_get_attachment_image($saved[0], 'medium');							
							echo $attachmentimage;
							
						?>
                        </div>
					</a>
					<?php
				}
			break;
			case 'pinfo':	
				global $fields, $fields2, $fields3, $agent; 
				$fields = get_post_meta($post->ID, 'mod1', true); 
				$fields3 = get_post_meta($post->ID, 'mod2', true); 
				$fields2 = get_post_meta($post->ID, 'mod3', true); 
				$field = get_option('gorilla_fields');
				$symbols = get_option('gorilla_symbols');
				if(isset($fields['price'])){
					if(empty($fields['price']))
					{
						$fields['price'];
						}
						}				
				if(empty($symbols['currency'])) 
				{ 
					$symbols['currency'] = '$'; 
				} 
				
				if(empty($symbols['metric'])) 
				{ 
					$symbols['metric'] = 'miles'; 
				}
				echo '<div style="color:#132b3a;margin:10px 0!important;font-weight:bold;font-size:18px;">'.get_the_title().'</div>';

				if(!empty($fields['price']))
				{  
				 
					echo '<div style="font-weight:bold;font-size:16px;color:#c41111!important;margin:5px 0!important;">'.$symbols['currency'].number_format($fields['price']). '</div>';   
				} 			
				if(empty($fields['milestext']))
				{
					$fields['milestext'] = __('Miles','language');
				}	
				if(!empty($fields['miles']))
				{  
					echo '<div style="color:#454d51;margin-bottom:3px;font-size:12px"><strong>'.$field['milestext'].'</strong>: '.$fields['miles'].'</div>';   
				} 
				else 
				{
					echo''; 
				}					
				if(empty($fields['vehicletypetext']))
				{
					$fields['vehicletypetext'] = __('Body Type','language');
				}	
				if(!empty($fields['vehicletype']))
				{  
					echo '<div style="color:#000;margin-bottom:3px;font-size:12px"><strong>'.$field['vehicletypetext'].'</strong>: '.$fields['vehicletype'].'</div>';   
				} 
				else 
				{
					echo''; 
				}
				if(empty($fields['exteriortext']))
				{
					$fields['exteriortext'] = __('Exterior','language');
				}	
				if(!empty($fields['exterior']))
				{  
					echo '<div style="color:#000;margin:0 5px 3px 0;float:left;font-size:12px"><strong>'.$field['exteriortext'].'</strong>: '.$fields['exterior'].'</div>';   
				} 
				else 
				{
					echo''; 
				}				
				if(empty($fields['interiortext']))
				{
					$fields['interiortext'] = __('Interior','language');
				}	
				if(!empty($fields['interior']))
				{  
					echo '<div style="color:#000;margin:0 5px 3px 0;font-size:12px"> | <strong>'.$field['interiortext'].'</strong>: '.$fields['interior'].'</div>';   
				} 
				else 
				{
					echo''; 
				}
					if(empty($fields['vintext']))
				{
					$fields['vintext'] = __('VIN:','language');
				}	
				if(!empty($fields['vin']))
				{  
					echo '<div style="color:#000;font-size:12px;margin:0 5px 3px 0;"><strong>'.$field['vintext'].'</strong>: '.$fields['vin'].'</div>';   
				} 
				else 
				{
					echo''; 
				}
				if(empty($fields['stocktext']))
				{
					$fields['stocktext'] = __('Stock Number:','language');
				}	
				if(!empty($fields['stock']))
				{  
					echo '<div style="color:#000;font-size:12px"><strong>'.$field['stocktext'].'</strong>: '.$fields['stock'].'</div>';   
				} 
				else 
				{
					echo''; 
				}
							
								break;
				} 
	} 
?>
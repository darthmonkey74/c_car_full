<?php
	add_action( 'init', 'create_makemodel' );	
function create_makemodel() 
	{
		$options = get_option('gorilla_fields');		
		if(empty($options['makemodeltext']))
		{
		   $options['makemodeltext'] = 'Make';
		}		
		$labels = array(
				'name' => ucfirst($options['makemodeltext']), 'taxonomy general name' ,
				'singular_name' =>  ucfirst($options['makemodeltext']), 'taxonomy singular name' ,
				'search_items' =>  __('Search ','language').ucfirst($options['makemodeltext']),
				'all_items' => __( 'All ','language').ucfirst($options['makemodeltext']),
				'parent_item' => __( 'Parent ','language').ucfirst($options['makemodeltext']),
				'parent_item_colon' => __( 'Parent ','language').ucfirst($options['makemodeltext']) .':' ,
				'edit_item' => __( 'Edit ','language').ucfirst($options['makemodeltext']),
				'update_item' => __( 'Update ','language').ucfirst($options['makemodeltext']),
				'add_new_item' => __( 'Add New ','language').ucfirst($options['makemodeltext']),
				'new_item_name' => __( 'New ','language').ucfirst($options['makemodeltext']) .' Name',		
				);		
		register_taxonomy(
				'makemodel',
				array( 'gtcd','user_listing' ),
				array(		
					'hierarchical' => true,
					'label' => ucfirst($options['makemodeltext']),
					'public'	   => true,
					'can_export'   => true,
					'labels' => $labels
				));
	}
add_action( 'init', 'features' );	 
function features() 
	 {	   
		$options = get_option('gorilla_fields');
		
		if(empty($options['featurestext']))
		{
			$options['featurestext'] = 'features';
		}		
		$labels = array(
			'name' =>  ucfirst($options['featurestext']), 'taxonomy general name' ,
			'singular_name' =>  ucfirst($options['featurestext']), 'taxonomy singular name',
			'search_items' =>  __('Search ','language').ucfirst($options['featurestext']),
			'all_items' => __( 'All ','language').ucfirst($options['featurestext']),
			'parent_item' => __( 'Parent','language').ucfirst($options['featurestext']),
			'parent_item_colon' => __( 'Parent ','language').ucfirst($options['featurestext']) .':' ,
			'edit_item' => __( 'Edit ','language').ucfirst($options['featurestext'] ),
			'update_item' => __( 'Update ','language').ucfirst($options['featurestext']),
			'add_new_item' => __( 'Add New ','language').ucfirst($options['featurestext']),
			'new_item_name' => __( 'New ','language').ucfirst($options['featurestext']) .' Name'
		); 			
		register_taxonomy(
			'features',
			array( 'gtcd','user_listing' ),
			array(
				'hierarchical' => false,
				'label' => ucfirst($options['featurestext']),
				'public' => true,
				'can_export' => true,
				'show_tagcloud' => true,
				'labels' => $labels
			));
	}
function custom_tag_cloud_widget($args) {
		$args['number'] = 0; 
		$args['largest'] = 18;
		$args['smallest'] = 10;
		$args['unit'] = 'px'; 
		$args['taxonomy'] = array('features'); 
		return $args;
	}
	add_filter( 'widget_tag_cloud_args', 'custom_tag_cloud_widget' );
?>
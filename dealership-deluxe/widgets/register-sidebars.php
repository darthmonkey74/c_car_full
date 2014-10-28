<?php
	register_sidebar(array('name'=>'Sidebar',
		'before_widget' => "<div class='right-block'><div class='right-white-block'><ul class='side-nav'>",
		'after_widget' => '</ul></div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	register_sidebar(array('name'=>'Carousel Cars',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	));	
	register_sidebar(array('name'=>'Welcome Widget',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	));	
	register_sidebar(array('name'=>'Search Module',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	));	
	register_sidebar(array('name'=>'Similar Cars',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	));	
	register_sidebar(array('name'=>'Footer ',
		'before_widget' => '<div class="footer_widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title"><h4>',
		'after_title' => '</h4></div>',
	));
?>
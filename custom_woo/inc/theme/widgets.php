<?php

// Show Widgets Sidebar
if (!function_exists('widgets_sidebar')) :
	function widgets_sidebar()
	{
		register_sidebar(array(
			'name'          => __('Footer 1', 'cavesroadolives'),
			'id'            => 'footer-1',
			'description'   => __('This is First Footer Widget', 'cavesroadolives'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		));
		register_sidebar(array(
			'name'          => __('Footer 2', 'cavesroadolives'),
			'id'            => 'footer-2',
			'description'   => __('This is First Footer Widget', 'cavesroadolives'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		));
		register_sidebar(array(
			'name'          => __('Footer 3', 'cavesroadolives'),
			'id'            => 'footer-3',
			'description'   => __('This is First Footer Widget', 'cavesroadolives'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		));
		register_sidebar(array(
			'name'          => __('Footer 4', 'cavesroadolives'),
			'id'            => 'footer-4',
			'description'   => __('This is First Footer Widget', 'cavesroadolives'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		));
		register_sidebar(array(
			'name'          => __('Footer Logo', 'cavesroadolives'),
			'id'            => 'footer-logo',
			'description'   => __('This is First Footer Widget', 'cavesroadolives'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		));
	}
	add_action('widgets_init', 'widgets_sidebar');
endif;

<?php
//turn on sleeping WP features
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', array('gallery', 'link', 'image', 'quote', 
	'video', 'audio', 'chat', 'status') );
add_theme_support( 'custom-background' );
add_theme_support( 'automatic-feed-links' );
//add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'comment-list', 'comment-form' ) );

//gives your theme the ability to use editor-style.css for the post editor
add_editor_style();

//additional image sizes
//				  name, width, height, crop?
add_image_size( 'banner', 1100, 330, true );

/**
 * Improve excerpts and make them more user friendly
 * @since 0.1
 */
function awesome_excerpt_length(){
	return 70; //words
}
add_filter( 'excerpt_length', 'awesome_excerpt_length' );

//change the [...]
function awesome_read_more(){
	return '&hellip; <a href="'. get_permalink() .'" class="readmore">Read More</a>';
}
add_filter( 'excerpt_more', 'awesome_read_more' );


/**
 * Make commenting more user friendly
 * @since 0.1
 */
function awesome_comment_reply(){
	if( !is_admin() AND is_singular() AND comments_open() AND get_option('thread_comments')  ){
		wp_enqueue_script('comment-reply');
	}
}
add_action( 'wp_print_scripts', 'awesome_comment_reply' );


/**
 * Activate Menu Areas
 * @since 0.1
 */
function awesome_menu_areas(){
	register_nav_menus( array(
		'main_menu' => 'Main Nav at the top of the page',
		'utilities' => 'Utility and Social menu',
		//more menu areas go here
	) );
}
add_action( 'init', 'awesome_menu_areas' );

/**
 * Set Up Widget Areas
 * @since 0.1
 */
add_action( 'widgets_init', 'awesome_widget_areas' );
function awesome_widget_areas(){
	register_sidebar( array(
		'name' 			=> 'Blog Sidebar',
		'id' 			=> 'blog_sidebar',
		'description' 	=> 'Appears alongside all blog archives and posts',
		'before_widget' => '<section id="%1$s" class="widget clearfix %2$s">',
		'after_widget' 	=> '</section>',
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name' 			=> 'Footer Area',
		'id' 			=> 'footer_area',
		'description' 	=> 'Appears at the bottom of every view',
		'before_widget' => '<section id="%1$s" class="widget clearfix %2$s">',
		'after_widget' 	=> '</section>',
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name' 			=> 'Home Page Area',
		'id' 			=> 'home_page_area',
		'description' 	=> 'Appears in the middle of the front page',
		'before_widget' => '<section id="%1$s" class="widget clearfix %2$s">',
		'after_widget' 	=> '</section>',
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
} //end awesome_widget_areas function

//no close php

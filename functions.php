<?php

if ( function_exists('register_nav_menus') ) {
        register_nav_menus( array('header-menu' => __('Header Menu') ) );
}

if ( function_exists('add_theme_support') ) {
    add_theme_support('post-thumbnails', array('post'));
    add_image_size('category-thumb', 100, 100, true);
    add_image_size('featured-banner', 800, 400, false);
    add_image_size('blog-banner', 800, 300, false);
    set_post_thumbnail_size(100, 100, true);
}

function urs_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-autocomplete');
	wp_enqueue_script('wp-mediaelement');
	wp_enqueue_script('foundation', get_template_directory_uri().'/js/foundation.min.js');
	wp_enqueue_script('moderniser', get_template_directory_uri().'/js/vendor/modernizr.js');
	wp_enqueue_script('urs-site-function', get_template_directory_uri().'/js/site-functions.js');
}
add_action( 'wp_enqueue_scripts', 'urs_scripts' );

function urs_init() {
	register_sidebars(3, array(
				'name:' => "URS Footer: %d",
				'before_widget' => "\n\t\t\t".'<li id="%1$s" class="widget %2$s">',
				'after_widget' => "\n\t\t\t</li>\n",
				'before_title' => "\n\t\t\t\t".'<h3 class="widgettitle">',
				'after_title' => "</h3>\n"
	));
}
add_action( 'init', 'urs_init' );

add_action('loop_start', 'urs_int_title_filter');
add_action('loop_end', 'urs_kill_title_filter');
//add_action('rss_head', 'urs_kill_title_filter');
//add_action('rss2_head', 'urs_kill_title_filter');
add_action('rss_tag_pre', 'urs_kill_title_filter');
add_action('dynamic_sidebar_before', 'urs_kill_title_filter');
function urs_int_title_filter() {
        add_filter('the_title', 'urs_title_mod', 10);
}

function urs_kill_title_filter() {
        remove_filter('the_title', 'urs_title_mod', 10);
}

function urs_title_mod($content) {
        $id = get_the_ID();
        if (is_single() || is_category('blog') || is_category('story') || is_category('podcast')) return $content;
	if (is_feed()) return $content;
        if (!$id) return $content;

        $post = get_post($id);
        if ($post->post_type == 'post' || $post->post_type == 'urs_blog') {
                $categories = get_the_category($id);
                $title = $content;
                foreach ($categories as $cat) {
                        if ($cat->cat_name == 'News') $content = 'News: '.$title;
                        if ($cat->cat_name == 'Story') $content = 'Story: '.$title;
                        if ($cat->cat_name == 'Blog') $content =  'Blog: '.$title;
			//if ($cat->cat_name == 'Podcast') $content =  'Podcast: '.$title;
                }
        }
        return $content;
}

function urs_featured_excerpt() {
	$content = apply_filters('the_content', get_the_content());
	//echo($content);
	preg_match_all("/<p>(.*?)<\/p>/is", $content, $matches);
	echo $matches[0][0];
	echo $matches[0][1];
	echo $matches[0][2];
}

function nav_menu_item_parent_classing( $classes, $item ) {
	global $wpdb;

	//print_r($item);
	//$newItem = wp_get_nav_menu_object($item);
	//print_r($newItem);
    
	if ( !property_exists( $item, 'classes' ) || !is_array( $item->classes )) {
		return $classes;
	}

	$has_children = in_array( 'menu-item-has-children', $item->classes );

	if ( $has_children ) {
		array_push( $classes, "has-dropdown" );
	}

	return $classes;
}

add_filter( 'wp_nav_menu_objects', 'urs_add_has_children_to_nav_items' );

function urs_add_has_children_to_nav_items( $items ) {
    $parents = wp_list_pluck( $items, 'menu_item_parent');

    foreach ( $items as $item )
        in_array( $item->ID, $parents ) && $item->classes[] = 'has-dropdown';

    return $items;
}
 
add_filter( "nav_menu_css_class", "nav_menu_item_parent_classing", 10, 2 );

//Deletes empty classes and changes the sub menu class name
function change_submenu_class($menu) {
	$menu = preg_replace('/ class="sub-menu"/',' class="dropdown"',$menu);
	return $menu;
}
add_filter ('wp_nav_menu','change_submenu_class');


//Use the active class of the ZURB Foundation for the current menu item. (From: https://github.com/milohuang/reverie/blob/master/functions.php)
function required_active_nav_class( $classes, $item ) {
    if ( $item->current == 1 || $item->current_item_ancestor == true ) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'required_active_nav_class', 10, 2 );

function urs_disable_self_ping( &$links ) {
    foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, get_option( 'home' ) ) )
            unset($links[$l]);
}
add_action( 'pre_ping', 'urs_disable_self_ping' );

function urs_custom_login_logo() {
    echo '<style type="text/css">
	body.login #login h1 a {
		background-image:url(/wp-content/themes/new-urs-theme/img/urs-login.png) !important;
		background-size: 274px 63px;
		overflow: visible !important;
		padding-left: 100px;
		padding-right: 100px;
	}
    </style>';
}
add_action('login_head', 'urs_custom_login_logo');

?>

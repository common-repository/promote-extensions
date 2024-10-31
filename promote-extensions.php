<?php
/*
Plugin Name: Promote extensions
Plugin URI:
Description: Add support for special content types in your website, such as service Block, client, and team member,counter.
Version: 1.0.3
Author: themezwp
Author URI: http://themezwp.com
Text Domain: promote-extensions
Domain Path: /languages
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

define( 'PROMOTE_EXTEN_VERSION',  '1.0.3' );
define( 'PROMOTE_EXTEN_PATH',  plugin_dir_path( __FILE__ ) );
define( 'PROMOTE_EXTEN_URL',  plugin_dir_url( __FILE__ ) );

if ( ! function_exists( 'add_action' ) ) {
	die('Nothing to do...');
}

if ( function_exists( 'promote_setup' ) ) {
// programmatically create some basic pages, and then set Home and Blog
// setup a function to check if these pages exist
function the_slug_exists($post_name) {
	global $wpdb;
	if($wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_name = '" . $post_name . "'", 'ARRAY_A')) {
		return true;
	} else {
		return false;
	}
}
// create the blog page

    $blog_page_title = 'Blog';
    $blog_page_content = 'This is blog page placeholder. Anything you enter here will not appear in the front end, except for search results pages.';
    $blog_page_check = get_page_by_title($blog_page_title);
    $blog_page = array(
	    'post_type' => 'page',
	    'post_title' => $blog_page_title,
	    'post_content' => $blog_page_content,
	    'post_status' => 'publish',
	    'post_author' => 1,
	    'post_slug' => 'blog'
    );
    if(!the_slug_exists('blog')){
         wp_insert_post($blog_page);
    }


// change the Sample page to the home page

    $home_page_title = 'Home';
    $home_page_content = '';
    $home_page_check = get_page_by_title($home_page_title);
    $home_page = array(
	    'post_type' => 'page',
	    'post_title' => $home_page_title,
	    'post_content' => $home_page_content,
	    'post_status' => 'publish',
	    'post_author' => 1,
	    'post_slug' => 'home'
    );
    if(!the_slug_exists('home')){
        wp_insert_post($home_page);
    }


	// Set the blog page
	$blog = get_page_by_path( 'blog' );
	update_option( 'page_for_posts', $blog->ID );

	// Use a static front page
	$front_page = get_page_by_path( 'home' ); // this is the default page created by WordPress
	update_option( 'page_on_front', $front_page->ID );
	update_option( 'show_on_front', 'page' );

}
/**
 * Populate frontpage widgets areas with default widgets
 */
function promote_populate_with_default_widgets() {

	$promote_sidebars = array ( 'sidebar-service' => 'sidebar-service','sidebar-team' => 'sidebar-team','sidebar-counter' => 'sidebar-counter','sidebar-clients' => 'sidebar-clients' );

	$active_widgets = get_option( 'sidebars_widgets' );


		if ( empty ( $active_widgets[ $promote_sidebars['sidebar-service'] ] ) ) {



		$active_widgets['sidebar-service'][0] = 'promote-service-widget-1' ;


			$service_content[ 1 ] = array(
				'main_title'      => 'Our Service',
				'sub_title'      => 'Add Service widgets from customizer',

				'icon1'      => 'fa-binoculars',
				'title1' => 'Excellent Quality',
				'text1'      => 'Praesent turpis mauris, aliquet id dolor Gravida adipiscing lectus ut rutrum Aenean at posuere risus.',

				'icon2'      => 'fa-check-square-o',
				'title2' => 'Strategic Vision',
				'text2'      => 'Praesent turpis mauris, aliquet id dolor Gravida adipiscing lectus ut rutrum Aenean at posuere risus.',

				'icon3'      => 'fa-television',
				'title3' => 'Design Startup',
				'text3'      => 'Praesent turpis mauris, aliquet id dolor Gravida adipiscing lectus ut rutrum Aenean at posuere risus.',

			);


		update_option( 'widget_promote-service-widget', $service_content );



		update_option( 'sidebars_widgets', $active_widgets );

	}

	if ( empty ( $active_widgets[ $promote_sidebars['sidebar-team'] ] ) ) {



		$active_widgets['sidebar-team'][0] = 'promote-team-widget-1' ;


			$team_content[ 1 ] = array(
				'main_title'      => 'TALENTED PEOPLE ',
				'sub_title'      => 'Add Team widgets from customizer',

				'icon1'      => 'Michael Doe',
				'title1' => 'Co-Founder & CEO',
				'image_uri1'      =>  PROMOTE_EXTEN_URL . "/images/team1.jpg",
				'box_uri1'=> '',

				'icon2'      => 'Eliza Roma',
				'title2' => 'Designer',
				'box_uri2'=> '',
				'image_uri2'      =>  PROMOTE_EXTEN_URL . "/images/team3.jpg",

				'icon3'      => 'Barak Stuart',
				'title3' => 'Co-Founder & CEO',
				'box_uri3'=> '',
				'image_uri3'      =>  PROMOTE_EXTEN_URL . "/images/team2.jpg",

				'icon4'      => 'Anya Siennadia',
				'title4' => 'Marketing Manager',
				'box_uri4'=> '',
				'image_uri4'      =>  PROMOTE_EXTEN_URL . "/images/team4.jpg",


			);


		update_option( 'widget_promote-team-widget', $team_content );



		update_option( 'sidebars_widgets', $active_widgets );

	}

	if ( empty ( $active_widgets[ $promote_sidebars['sidebar-counter'] ] ) ) {



		$active_widgets['sidebar-counter'][0] = 'promote-counter-widget-1' ;


			$counter_content[ 1 ] = array(

				'sub_title'      => 'Better Solution for Web HTML5 Template',

				'title1' => 'Excellent Quality',
				'number1'=>'540',

				'title2' => 'Strategic Vision',
				'number2'=>'346',

			'image_uri' => PROMOTE_EXTEN_URL . "/images/counter.png",

				'title3' => 'Design Startup',
				'number3'=>'46',

				'title4' => 'Design Startup',
				'number4'=>'984',

			);


		update_option( 'widget_promote-counter-widget', $counter_content );



		update_option( 'sidebars_widgets', $active_widgets );

	}

	if ( empty ( $active_widgets[ $promote_sidebars['sidebar-clients'] ] ) ) {

		/* clients */

		$active_widgets['sidebar-clients'][0] = 'promote-client-widget-1' ;


			$clients_content[ 1 ] = array(
				'main_title'      => 'Our clients',
				'sub_title'      => 'Add clients widgets from customizer',
				'client_uri1'      => '#',
				'image_uri1' => PROMOTE_EXTEN_URL . "/images/logo1.jpg",
				'client_uri2'      => '#',
				'image_uri2' => PROMOTE_EXTEN_URL . "/images/logo1.jpg",
				'client_uri3'      => '#',
				'image_uri3' => PROMOTE_EXTEN_URL . "/images/logo1.jpg",
				'client_uri4'      => '#',
				'image_uri4' => PROMOTE_EXTEN_URL . "/images/logo1.jpg",
				'client_uri5'      => '#',
				'image_uri5' => PROMOTE_EXTEN_URL . "/images/logo1.jpg"
			);


		update_option( 'widget_promote-client-widget', $clients_content );



		update_option( 'sidebars_widgets', $active_widgets );

	}

	update_option( 'promote_companion_flag','installed' );

}

/**
 * Register Widgets
 */
function promote_register_widgets() {

	register_widget('promote_client_widget');
	register_widget('promote_service_widget');
	register_widget('promote_counter_widget');
	register_widget('promote_team_widget');
	register_widget('promote_ribbon_widget');


	$promote_companion_flag = get_option( 'promote_companion_flag' );
	if ( empty( $promote_companion_flag ) && function_exists( 'promote_populate_with_default_widgets' ) ) {
		promote_populate_with_default_widgets();
	}

}

add_action('widgets_init', 'promote_register_widgets');

require_once PROMOTE_EXTEN_PATH . 'inc/widget-clients.php';
require_once PROMOTE_EXTEN_PATH . 'inc/widget-service.php';
require_once PROMOTE_EXTEN_PATH . 'inc/widget-counter.php';
require_once PROMOTE_EXTEN_PATH . 'inc/widget-team.php';
require_once PROMOTE_EXTEN_PATH . 'inc/widget-ribbon.php';

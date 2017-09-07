<?php
define('STEED_THEME_ID', 'steed-hotel');

add_action( 'after_setup_theme', 'motel_setup');
function motel_setup(){

	add_action( 'widgets_init', 'motel_widgets_init' );
	
}

add_image_size('motel_400', 400, 400, true);
add_filter('tallythemesetup_load_v2', '__return_true');


add_filter('image_size_names_choose','motel_image_size_names',10,1);
function motel_image_size_names($sizes){
    // Give them a name, and presto!

    $sizes['motel_400']= 'Motel 400x300';

    // Don't forget to return the array of sizes.
    return $sizes;
}


function motel_modify_theme_intro_page($data){
	$data['menu_name'] = 'About Motel';
	$data['page_name'] = 'About Motel';
	$data['welcome_title'] = sprintf( __( 'Welcome to %s! - Version ', 'motel' ), 'Motel' );
	$data['welcome_content'] = esc_html__( 'Free Responsive Multi-Purpose WordPress Theme Motel Lite is best for making any kind  of business website. Motel lite can be used for any site purpose; one page, health, restaurant, agency, business, blogs and much more. This theme is fully responsive, Retina ready. It has video background and parallax effect and It is built on html5 and css3 with parallax support. It is a clean, responsive, modern, flat and minimal design.', 'motel' );
	$data['support_content']['second']['button_link'] = '#'; //Documentation Link
	$data['support_content']['sixth']['button_link'] = '#'; //Documentation Link
	$data['getting_started']['second']['button_link'] = '#'; //Documentation Link
	$data['free_pro']['free_theme_name'] = 'Motel';
	$data['free_pro']['pro_theme_name'] = 'Motel PRO';
	$data['free_pro']['pro_theme_link'] = '#'; // PRO Theme Link
	
	return $data;
}
add_filter('steed_about_page_array', 'motel_modify_theme_intro_page');



add_filter('tallythemesetup_demo_data', 'motel_demo_data');
function motel_demo_data(){
	if(function_exists('SteedCOM_load')){
		return  array(
			'xml' => STEEDCOM_DRI.'/demo-data/motel/content.xml', //xml file path or false to disable
			'widget' => STEEDCOM_DRI.'/demo-data/motel/widgets.wie', //wie file path or false to disable
			'home' => 'Home',  //Name or false to disable
			'blog' => 'Blog', //Name or false to disable
			'menus' => array(/*array or false to disable*/
				array('title' => 'Primary P', 'location' => 'header_menu'),
			),
			'revolution_sliders' => false, //array or false to disable
			'plugins' => array(/*array or false to disable*/
				'instagram-slider-widget/instaram_slider.php',
				'wc-responsive-video/wc-responsive-video.php',

				'contact-form-7/wp-contact-form-7.php',
				'steed-companion/steed-companion.php',
			),
			'demo_url' => esc_url('http://wp4.tallythemesdemo.com'), //Extranal Demo URL
			'demo_image' => esc_url(get_stylesheet_directory().'/screenshot.png'), //Extranal Demo image URL
			'doc_url' => esc_url('http://tallythemes.com/doc-item/steed-theme-documentation/'), //Documentation URL
		);
	}
}


add_filter('steed_tgm_plugins', 'motel_tgm_plugins');
function motel_tgm_plugins($plugins){
	$plugins = array(
		array(
			'name'      => 'Tally Theme Setup',
			'slug'      => 'tally-theme-setup',
			'required'  => false,
		),
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		array(
			'name'      => 'Instagram Slider Widget',
			'slug'      => 'instagram-slider-widget',
			'required'  => false,
		),
		array(
			'name'      => 'WC Responsive Video',
			'slug'      => 'wc-responsive-video',
			'required'  => false,
		),
		array(
			'name'               => 'Steed Companion',
			'slug'               => 'steed-companion',
			'source'             => esc_url('http://update-server.tallythemesdemo.com/api/?action=download&slug=steed-companion'),
			'required'           => true, 
			'version'            => '', 
			'force_activation'   => false, 
			'force_deactivation' => false,
			'external_url'       => '', 
			'is_callable'        => '', 
		),
	);
	
	return $plugins;
}

include(get_stylesheet_directory().'/includes/php/home-content.php');


function motel_widgets_init() {
	if(!function_exists('motel_theme_extended')){
		register_sidebar( array(
			'name'          => 'Home Sider Section',
			'id'            => 'steed_pc_home_page_slider',
			'description'   => '',
			'before_widget' => '<li id="%1$s" class="pcswl_li"><div class="pcswl_item"><div class="pcswl_item_in %2$s">',
			'after_widget'  => '</div></div></li>',
			'before_title'  => '<h4 class="pcswl_item_title">',
			'after_title'   => '</h4>',
		));
		register_sidebar( array(
			'name'          => 'Home Services Section',
			'id'            => 'steed_pc_home_page_services',
			'description'   => '',
			'before_widget' => '<li id="%1$s" class="pcswl_li"><div class="pcswl_item"><div class="pcswl_item_in %2$s">',
			'after_widget'  => '</div></div></li>',
			'before_title'  => '<h4 class="pcswl_item_title">',
			'after_title'   => '</h4>',
		));
		register_sidebar( array(
			'name'          => 'Home Testimonials Section',
			'id'            => 'steed_pc_home_page_testimonials',
			'description'   => '',
			'before_widget' => '<li id="%1$s" class="pcswl_li"><div class="pcswl_item"><div class="pcswl_item_in %2$s">',
			'after_widget'  => '</div></div></li>',
			'before_title'  => '<h4 class="pcswl_item_title">',
			'after_title'   => '</h4>',
		));
	}
}

add_filter('steedpro_enable_section_editor', '__return_true');
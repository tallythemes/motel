<?php
add_action( 'after_setup_theme', 'motel_home_content_setup');
function motel_home_content_setup(){
	
if((apply_filters('steedpro_enable_section_editor', false) == false) || !function_exists('steedPRO_init')){
	new steed_pc_builder(array (
	  'title' => '**Home Page Sections**',
	  'description' => '',
	  'slug' => 'home_page',
	  'sections' => 
	  array (
		1 => 
		array (
		  'uid' => 'cta',
		  'title' => 'Call to Action',
		  'name' => 'steed_pc_section_page_content',
		  'settings' => 
		  array (
			'content' => 'full',
			'image' => 'none',
			'image_size' => 'full',
			'title' => true,
			'title_tag' => 'h2',
			'button' => true,
			'button_text' => 'Read More',
			'css_class' => ' ',
		  ),
		),

		3 => 
		array (
		  'uid' => 'about',
		  'title' => 'About Us',
		  'name' => 'steed_pc_section_page_content',
		  'settings' => 
		  array (
			'content' => 'full',
			'image' => 'none',
			'image_size' => 'full',
			'title' => true,
			'title_tag' => 'h2',
			'button' => true,
			'button_text' => 'Read More',
			'css_class' => ' ',
		  ),
		),
		4 => 
		array (
		  'uid' => 'gallery',
		  'title' => 'Gallery',
		  'name' => 'steed_pc_section_page_content',
		  'settings' => 
		  array (
			'content' => 'full',
			'image' => 'none',
			'image_size' => 'full',
			'title' => true,
			'title_tag' => 'h2',
			'button' => true,
			'button_text' => 'Read More',
			'css_class' => ' ',
		  ),
		),

		6 => 
		array (
		  'uid' => 'contact',
		  'title' => 'Quick Contact',
		  'name' => 'steed_pc_section_page_content',
		  'settings' => 
		  array (
			'content' => 'full',
			'image' => 'none',
			'image_size' => 'full',
			'title' => true,
			'title_tag' => 'h2',
			'button' => true,
			'button_text' => 'Read More',
			'css_class' => ' ',
		  ),
		),
	  ),
	));
}
}
<?php

//Regsiter Settings
function admin_init_gallerify() {
	register_setting('gallerify', 'replace_wordpress_gallerify');
	register_setting('gallerify', 'gallerify_accent');
	register_setting('gallerify', 'gallerify_fullscreen');
	register_setting('gallerify', 'gallerify_thumb_nav');
	register_setting('gallerify', 'gallerify_keys');
	register_setting('gallerify', 'gallerify_autoplay');
	register_setting('gallerify', 'gallerify_trackpad');
	register_setting('gallerify', 'gallerify_change_accent_admin');
	register_setting('gallerify', 'gallerify_accent_title');
}

//Add Options Page
function admin_menu_gallerify() {
  add_options_page(
		'Gallerify',
		'Gallerify Settings',
		'manage_options',
		'gallerify',
		'options_page_gallerify');
}

//Include gallerify options
function options_page_gallerify() {
  include( 'gallerify_options.php' );  
}

//Check if its admin
if (is_admin()) {
  add_action('admin_init', 'admin_init_gallerify');
  add_action('admin_menu', 'admin_menu_gallerify');
}

?>
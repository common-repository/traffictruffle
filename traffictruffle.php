<?php
/*
Plugin Name: Traffic Truffle
Plugin URI: http://www.traffictruffle.com
Description: Start sending your data to Traffic Truffle. Once you activate this plugin then go to Settings -> Traffic Truffle and enter your 32 character Traffic Truffle code. You can then log into <a href="https://my.traffictruffle.com">https://my.traffictruffle.com</a> and see your business leads.
Version: 2.0.0
Author: Traffic Truffle
Author URI: http://www.traffictruffle.com
*/

if ( ! defined( 'ABSPATH' ) ) exit;

function activate_traffictruffle() {
  add_option('truffleID', 'enter your Traffic Truffle 32 character code here');
}

function deactive_traffictruffle() {
  delete_option('truffleID');
}

function admin_init_traffictruffle() {
  register_setting('traffictruffle', 'truffleID');
}

function admin_menu_traffictruffle() {
  add_options_page('Traffic Truffle', 'Traffic Truffle', 'manage_options', 'traffictruffle', 'options_page_traffictruffle');
}

function options_page_traffictruffle() {
  include( 'traffictruffle_options.php' );
}

function traffictruffle_load_js() {
  wp_enqueue_script( 'traffictruffle-js', 'https://app.tt-247.com/js/track_v2.js', array('jquery') );	
}

function traffictruffle_init_js() {
  $truffleID = esc_html(get_option('truffleID'));

  if(strlen($truffleID) == 32) { ?>
	<script type="text/javascript">
	  tt247('<?php echo $truffleID; ?>');
	</script><?php 
  }
}

register_activation_hook(__FILE__, 'activate_traffictruffle');
register_deactivation_hook(__FILE__, 'deactive_traffictruffle');

if (is_admin()) {
  add_action('admin_init', 'admin_init_traffictruffle');
  add_action('admin_menu', 'admin_menu_traffictruffle');
}

if (!is_admin()) {
  	add_action('wp_enqueue_scripts', 'traffictruffle_load_js');
	add_action('wp_footer', 'traffictruffle_init_js'); 
}

?>
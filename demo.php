<?php
/*
Plugin Name: Factory Women
Version: 0.1-alpha
Description: A Wordpress's plugin to setting up posts as test data
Author: Julio Lopez Montalvo
Author URI: http://codalot.com/
Plugin URI: https://github.com/TheBlasfem/factory-women
Text Domain: Factory Women
Domain Path: /languages
*/


// Only create an instance of the plugin if it doesn't already exists in GLOBALS
if( ! array_key_exists( 'factory-women', $GLOBALS ) ) { 
 
    class FactoryWomen {
          
        function __construct() {
             
        } // end constructor

        public function add_welcome_message( $content ) {
		         return 'TEST CONTENT' . $content;
		    } // end add_welcome_message


       
    } // end class
     
    // Store a reference to the plugin in GLOBALS so that our unit tests can access it
    $GLOBALS['factory-women'] = new FactoryWomen();
     
} // end if


function factory_index(){
	include('template/index.html');			
	global $wpdb; 
	$numberposts = $_POST['numberposts'];
	$posttitle = $_POST['posttitle'];
	if(isset($numberposts)){
		for ($i=1; $i<=$numberposts; $i++){
			$post = array(
				'post_title' => "$posttitle $i",
				'post_type' => "post",
				'post_status' => "publish"
			);
			wp_insert_post( $post );
		}
	}
}

function factory_add_menu(){	
	if (function_exists('add_options_page')) {
		//add_menu_page
		add_options_page('Factory', 'Factory', 8, basename(__FILE__), 'factory_index');
	}
}
if (function_exists('add_action')) {
	add_action('admin_menu', 'factory_add_menu'); 
}
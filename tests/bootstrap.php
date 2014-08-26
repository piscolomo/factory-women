<?php

$_tests_dir = getenv('WP_TESTS_DIR');
//if ( !$_tests_dir ) $_tests_dir = '/tmp/wordpress-tests-lib';
if ( !$_tests_dir ) $_tests_dir = '/../../../../wordpress-develop/tests/phpunit';

require_once $_tests_dir . '/includes/functions.php';

function _manually_load_plugin() {
	require dirname( __FILE__ ) . '/../factorywomen.php';
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

require $_tests_dir . '/includes/bootstrap.php';


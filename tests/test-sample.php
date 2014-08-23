<?php

class FactoryWomen_Tests extends WP_UnitTestCase {
 
    private $plugin;
 
    function setUp() {     
        parent::setUp();
        $this->plugin = $GLOBALS['factory-women'];
    } // end setup
     
    function testPluginInitialization() {
        $this->assertFalse( null == $this->plugin );
    } // end testPluginInitialization

    function testInsertPosts() {
        $this->plugin->insert_posts(5,"prueba");
        $this->assertEquals( 5, wp_count_posts()->publish, 'there has been created your posts' );   
    } 
     
} // end class
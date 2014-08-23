<?php

class FactoryWomen_Tests extends WP_UnitTestCase {
 
    private $plugin;
 
    function setUp() {     
        parent::setUp();
        $this->plugin = $GLOBALS['factory-women'];
        $this->plugin->insert_posts(5,"prueba");
    }
     
    function testPluginInitialization() {
        $this->assertFalse( null == $this->plugin );
    }

    function testInsertPosts() {
        $this->assertEquals( 5, wp_count_posts()->publish);   
    }

    function testLastPostContainsTitle() {
        $lastpost = wp_get_recent_posts(array( 'numberposts' => '1', 'order' => 'DESC'));
        $this->assertContains("prueba", $lastpost[0]["post_title"]);
    } 
     
}
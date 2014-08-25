<?php

class FactoryWomen_Tests extends WP_UnitTestCase {
 
    private $plugin;
 
    function setUp() {     
        parent::setUp();
        $this->plugin = $GLOBALS['factory-women'];
    }
     
    function testPluginInitialization() {
        $this->assertFalse( null == $this->plugin );
    }

    function testInsertPosts() {
        $this->plugin->insert_posts(5,"post","prueba", "");
        $this->assertEquals( 5, wp_count_posts()->publish);   
    }

    function testInsertPages() {
        $this->plugin->insert_posts(5,"page","prueba", "");
        $this->assertEquals( 5, wp_count_posts('page')->publish);   
    }

    function testLastPostContainsTitle() {
        $this->plugin->insert_posts(5,"post","prueba", "");
        $lastpost = wp_get_recent_posts(array( 'numberposts' => '1', 'order' => 'DESC'));
        $this->assertContains("prueba", $lastpost[0]["post_title"]);
    }

    function testLastPostContainsContentLipsum(){
        $this->plugin->insert_posts(5,"post","prueba", "");
        $lastpost = wp_get_recent_posts(array( 'numberposts' => '1', 'order' => 'DESC'));
        $this->assertContains("Lorem ipsum dolor", $lastpost[0]["post_content"]);
    }

    function testLastPostContainsRightContent(){
        $this->plugin->insert_posts(5,"post","prueba", "Este es el contenido de prueba");
        $lastpost = wp_get_recent_posts(array( 'numberposts' => '1', 'order' => 'DESC'));
        $this->assertContains("Este es el contenido de prueba", $lastpost[0]["post_content"]);
    }
     
}
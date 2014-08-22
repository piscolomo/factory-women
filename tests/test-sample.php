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

    function testAddWelcomeMessage() {
        $this->assertContains( 'TEST CONTENT', $this->plugin->add_welcome_message( 'This is example post content. This simulates that WordPress would return when viewing a blog post.' ), 'add_welcome_message() appends welcome message to the post content.' );   
    } // end testAddWelcomeMessage
     
} // end class
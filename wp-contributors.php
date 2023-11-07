<?php
/**
 * Plugin Name: WP Contributors
 * Description: A basic contributors plugin for WordPress.
 * Version: 1.0.0
 * Author: Saroar Hossain
 * Author URI: https://saroar.me
 * Text Domain: wp-contributors
 * Domain Path: /languages
 * License: GPLv2+
 * Requires at least: 5.5
 * Requires PHP: 7.4
 * 
 * @file wp-contributors.php
 * @package WP Contributors
 * Description: A basic contributors plugin for WordPress.
 */

 defined( 'ABSPATH' ) || exit;

require_once __DIR__ . '/vendor/autoload.php';


class WPContributors {

    private static $instance;

    /**
     * Initializes the function.
     *
     * @return void
     */
    public function init() {
        
        add_action('admin_init', [$this, 'admin_init']);

        // Load the plugin
        add_action('init', [$this, 'load_plugin']);
        
    }

    /**
     * Initializes the admin functionality.
     *
     * This function is responsible for performing any initializations specific to the admin area.
     *
     * @return void
     */
    public function admin_init(){
        
        // Only admin initializations
        new \WPContributors\Admin\MetaBox();

    }

    /**
     * Loads the plugin.
     *
     * @return void
     */
    public function load_plugin(){
        
    }

    public function get(){
        return $this;
    }

    public static function instance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}

// Run the plugin
add_action('plugins_loaded', function () {
    WPContributors::instance()->init();
});
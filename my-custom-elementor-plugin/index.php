<?php
/**
     * Plugin Name: Custom Elementor Addons
     * Description: Custom element added to Elementor
     * Plugin URI: 
     * Version: 0.0.1 
     * Author: Mouadh Aouiti
     * Author URI: 
     * Text Domain: custom-elementor-plugin
*/
namespace mouadh;
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
    require_once('main.php');
    $mouadh_object = new E_mouadh();
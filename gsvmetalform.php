<?php

/**
 * Plugin Name:     GSV - Metal Form
 * Plugin URI:      https://www.smp-digital.it
 * Description:     Plugin per bloccare il prezzo dei metalli preziosi basato su MetalPriceAPI
 * Author:          Riccardo Ronconi
 * Author URI:      https://www.smp-digital.it
 * Text Domain:     gsvmetalform
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         GSV - Metal Form
 */


if (!defined('ABSPATH')) {
    die('Non puoi accedere a questo file');
}

if (!class_exists('GsvMetal')) {
    class GsvMetal
    {


        public function __construct()
        {
            define('PLUGIN_PATH', plugin_dir_path(__FILE__));

            define('PLUGIN_URL', plugin_dir_url(__FILE__));
            require_once(PLUGIN_PATH . '/vendor/autoload.php');
        }

        public function inizialize()
        {
            include_once PLUGIN_PATH . 'includes/utilities.php';
            include_once PLUGIN_PATH . 'includes/options-page.php';
            include_once PLUGIN_PATH . 'includes/blocco-oro.php';
            include_once PLUGIN_PATH . 'includes/blocco-argento.php';
            include_once PLUGIN_PATH . 'includes/blocco-monete.php';
        }
    }

    $metal = new GsvMetal;
    $metal->inizialize();
}

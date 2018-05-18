<?php

namespace Kulturkortet\Theme;

class Enqueue
{
    public function __construct()
    {
        // Enqueue scripts and styles
        add_action('wp_enqueue_scripts', array($this, 'style'));
        add_action('wp_enqueue_scripts', array($this, 'script'));
    }

    /**
     * Enqueue styles
     * @return void
     */
    public function style()
    {
        if(\Municipio\Helper\CacheBust::name('css/app.css', true, true)) {
            wp_enqueue_style('kulturkortet', get_stylesheet_directory_uri(). '/assets/dist/' . \Municipio\Helper\CacheBust::name('css/app.css', true, true));
        }
    }

    /**
     * Enqueue scripts
     * @return void
     */
    public function script()
    {
        if(\Municipio\Helper\CacheBust::name('js/app.js', true, true)) {
            wp_enqueue_script('kulturkortet', get_stylesheet_directory_uri(). '/assets/dist/' . \Municipio\Helper\CacheBust::name('js/app.js', true, true));
        }
    }
}

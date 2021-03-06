<?php

define('KULTURKORTET_PATH', get_stylesheet_directory() . '/');

load_theme_textdomain('kulturkortet', KULTURKORTET_PATH . 'languages');

//Include vendor files
if (file_exists(dirname(ABSPATH) . '/vendor/autoload.php')) {
    require_once dirname(ABSPATH) . '/vendor/autoload.php';
}

require_once KULTURKORTET_PATH . 'library/Vendor/Psr4ClassLoader.php';
$loader = new KULTURKORTET\Vendor\Psr4ClassLoader();
$loader->addPrefix('Kulturkortet', KULTURKORTET_PATH . 'library');
$loader->addPrefix('Kulturkortet', KULTURKORTET_PATH . 'source/php/');
$loader->register();

new Kulturkortet\App();

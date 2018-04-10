<?php

/**
 * Tell WordPress to save the cookie on the domain
 * @var bool
 */

if (strpos($_SERVER['HTTP_HOST'], "kulturkortet.se") !== false) {
    define('COOKIE_DOMAIN', ".kulturkortet.se");
} else {
    define('COOKIE_DOMAIN', $_SERVER['HTTP_HOST']);
}

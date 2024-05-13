<?php
/**
 * Template Functions
 *
 * This file provides template specific custom functions that are
 * not provided by the DokuWiki core.
 * It is common practice to start each function with an underscore
 * to make sure it won't interfere with future core functions.
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

set_include_path(__DIR__);
include_once(__DIR__ .'/classes/kiwiki_page_menu.php'); 
include_once(__DIR__ .'/classes/kiwiki_edit.php'); 
include_once(__DIR__ .'/classes/kiwiki_edit_icon.php'); 
include_once(__DIR__ .'/classes/kiwiki_go.php'); 
include_once(__DIR__ .'/classes/kiwiki_go_bottom.php'); 
require_once(__DIR__ .'/classes/kiwiki_functions.php'); 

$https = isset($_SERVER['HTTPS']) ? "https://" : "http://";
define( 'KIWIKI_IMAGES_URL', $https . $_SERVER["SERVER_NAME"] . "/lib/tpl/kiwiki/images/");
define( 'KIWIKI_IMAGES_PATH', __DIR__ . "/images/");

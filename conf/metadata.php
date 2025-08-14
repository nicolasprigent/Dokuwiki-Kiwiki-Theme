<?php
/*
 * configuration metadata
 *
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

$meta['MainMenu']     = array('string');
$meta['SidebarMaxHeight'] = array('numeric');
$meta['SidebarRight'] = array('onoff');
$meta['TocMaxHeight'] = array('numeric');
$meta['TocRight'] = array('onoff');
$meta['GoBottomBtn']    = array('onoff');
$meta['ContentMaxWidth'] = array('string');
$meta['FullScreenBtn']    = array('onoff');
$meta['ShowUserFooter']    = array('onoff');
$meta['ShowACLFooter']    = array('onoff');
$meta['DefaultTheme']    = array('multichoice','_choices' => array('system-color','darkmode','lightmode'));
$meta['ForceTheme']    = array('onoff');

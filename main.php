<?php
/**
 * Kiwiki Template
 *
 * @link     http://dokuwiki.org/template:kiwiki
 * @author   Anika Henke <anika@selfthinker.org>
 * @author   Nicolas Prigent
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */
@require_once(dirname(__FILE__).'/tpl_functions.php'); /* include hook for template functions */

$showTools = !tpl_getConf('hideTools') || ( tpl_getConf('hideTools') && !empty($_SERVER['REMOTE_USER']) );
$showSidebar = page_findnearest($conf['sidebar']) && ($ACT=='show');
$sidebar = $conf['sidebar'];
$sidebarElement = tpl_getConf('sidebarIsNav') ? 'nav' : 'aside';
$sidebarMaxHeight = tpl_getConf('SidebarMaxHeight');
$sidebar_right = tpl_getConf('SidebarRight');
$toc = tpl_toc(true);
$tocMaxHeight = tpl_getConf('TocMaxHeight');
$toc_right = tpl_getConf('TocRight');
$contentMaxWidth = tpl_getConf('ContentMaxWidth');
$themeMode = tpl_getConf('DefaultTheme');
$forceTheme = tpl_getConf('ForceTheme');
$contentWidth = '100%';
$asideWidth = '20%';
if(($toc!='' || ($ACT == 'show' && page_exists($sidebar))) && $sidebar_right == $toc_right){
    $contentWidth = '80%';
}
if($sidebar_right != $toc_right ){
    $contentWidth = '68%';
    $asideWidth = '16%';
}

if (!empty($_COOKIE['theme'])){
    if(!$forceTheme){
        $themeMode = in_array($_COOKIE['theme'], ['darkmode', 'lightmode', 'system-color']) ? $_COOKIE['theme'] : $themeMode;
    }else{
        setcookie("theme",$themeMode);
    }
}
if (!isset($_COOKIE['theme']) || empty($_COOKIE['theme'] || !in_array($_COOKIE['theme'], ['darkmode', 'lightmode', 'system-color']))){ 
    setcookie("theme",$themeMode);
}

$logoSize = array();

$logodark = tpl_getMediaFile(array(':wiki:logo-dark.png', ':logo-dark.png', 'images/logo-dark.png'), true, $logoSize, false);
$logolight = tpl_getMediaFile(array(':wiki:logo-light.png', ':logo-light.png', 'images/logo-light.png'), true, $logoSize, false);
$logo = tpl_getMediaFile(array(':wiki:logo.png', ':logo.png', 'images/logo.png'), true, $logoSize);


?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang'] ?>"
  lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>" class="no-js">
<head>
    <meta charset="UTF-8" />
    <title><?php tpl_pagetitle() ?> [<?php echo strip_tags($conf['title']) ?>]</title>
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    <?php tpl_metaheaders() ?>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
    <?php tpl_includeFile('meta.html')?>
    <style>body{
        --kiwiki-sidebar-max-height:<?php echo $sidebarMaxHeight; ?>px;
        --kiwiki-toc-max-height:<?php echo $tocMaxHeight; ?>px;
        --kiwiki-content-max-width:<?php echo $contentMaxWidth; ?>;
        --kiwiki-content-width:<?php echo $contentWidth; ?>;
        --kiwiki-aside-width:<?php echo $asideWidth; ?>;
        --kiwiki-logo-url:url(<?php echo $logo; ?>);
        --kiwiki-logo-light-url:url(<?php echo $logolight ? $logolight : $logo; ?>);
        --kiwiki-logo-dark-url:url(<?php echo $logodark ? $logodark : $logo; ?>);
        
    }
    
    label[for="tpl____KIWIKI_DARK__"], label[for="tpl____KIWIKI_LIGHT__"] {
    font-weight: 700;
    padding: 20px 0 10px;
        display: block;
        font-size: 30px;
    }

    #tpl____KIWIKI_LIGHT__,
    #tpl____KIWIKI_DARK__ {
    display: none !important;
    }
    </style>
</head>


<body id="kiwiki" class="<?php echo $themeMode; ?>">
    <?php    /* the "dokuwiki__top" id is needed somewhere at the top, because that's where the "back to top" button/link links to */ ?>
    <?php /* tpl_classes() provides useful CSS classes; if you choose not to use it, the 'dokuwiki' class at least
             should always be in one of the surrounding elements (e.g. plugins and templates depend on it) */ ?>
    <?php $admin_page = (($ACT == "admin") && (isset($_REQUEST['page']))) ? explode("#",$_REQUEST['page'])[0]: "" ;?>
    <div id="dokuwiki__site">
        <div id="dokuwiki__top" class="site <?php echo tpl_classes() ." " . $admin_page; ?>">
        <!-- ********** HEADER ********** -->
        <?php include('partial/header.php');?>
        
        <?php include('partial/before_content.php'); ?>

        <?php include('partial/content.php');?>        

        </div>
        <!-- ********** FOOTER ********** -->
    <?php include('partial/footer.php'); ?>
    <!-- GO TOP -->
    <div id="go">
    <?php

    $items = (new \dokuwiki\Menu\KiwikiGo())->getItems();
    foreach ($items as $item){
        if ($item -> getType() == 'bottom' && !tpl_getConf('GoBottomBtn')){
            continue;
        }else{
            echo '<a href="'.$item->getLink().'" title="'.$item->getTitle().'">'
            .'<span class="icon">'.inlineSVG($item->getSvg()).'</span>'
            . '<span class="a11y">'.$item->getLabel().'</span>'
            . '</a>';
        }
    }
    ?>
    </div>
    </div><!-- /site -->
    <div id="dokuwiki__bottom"></div>
    <div class="no"><?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?></div>
</body>
</html>

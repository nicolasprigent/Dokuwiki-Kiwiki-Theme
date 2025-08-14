<?php
/**
 * Inline css to get variables and force styling on some elements
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

?>

<style>
body{
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

#tpl____KIWIKI_LIGHT__, #tpl____KIWIKI_DARK__ {
    display: none !important;
}
</style>
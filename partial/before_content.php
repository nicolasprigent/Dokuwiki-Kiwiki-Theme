<?php
/**
 * Before content template for Dokuwiki Kiwiki Theme
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

/* disable breadcrumb on login and denied pages */
if(($ACT!="login") && ($ACT!="denied")){
    ?><div class="before-content"><?php
    /* BREADCRUMBS */
        if($conf['breadcrumbs']){?>
            <div class="breadcrumbs">
            <?php tpl_breadcrumbs() ;?>
            </div>
        <?php }
        if($conf['youarehere']){?>
            <div class="youarehere">
            <?php tpl_youarehere() ;?>
            </div>
        <?php }

        ?>
        <div id="dokuwiki__right_before">
        <?php
        // TRANSLATION SWITCHER
        $translation = plugin_load('helper','translation');
        if ($translation){
            echo '<div class="translation-switcher">' . $translation->showTranslations() . '</div>';
        }
        // PAGE TOOLS
        ?>
            
        </div>
        <?php
        // PAGE TOOLS
        if($ACT == 'show'){?>
        <div id="dokuwiki__pagetools" role="button" aria-label="<?php echo tpl_getLang('page-tools') ?>">
                <strong><?php echo inlineSVG(KIWIKI_IMAGES_PATH . 'preferences.svg') ?></strong>
                <ul>
                <!-- SITE TOOLS -->
                <li id="sitemenu">
                <?php
                $items = (new \dokuwiki\Menu\SiteMenu())->getItems();
                foreach($items as $item) {
                    echo '<a href="'.$item->getLink().'" title="'.$item->getTitle().'">'
                .'<span class="icon">'.inlineSVG($item->getSvg()).'</span>'
                . '<span class="a11y">'.$item->getLabel().'</span>'
                . '</a>';
                }
                ?>
                </li>
                <!-- PAGE TOOLS -->
                <?php echo (new \dokuwiki\Menu\KiwikiPageMenu())->getListItems('action ', false); ?>
                </ul>
        </div>
        <?php } ?>
    </div>
<?php } ?>

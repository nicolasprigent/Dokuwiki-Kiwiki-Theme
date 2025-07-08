<?php
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
            <div id="dokuwiki__pagetools">
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
        </div>
    </div>
<?php } ?>

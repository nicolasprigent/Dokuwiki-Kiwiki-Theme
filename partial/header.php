<header id="dokuwiki__header">
    <?php
    
    /*** disable header on login or denied pages ***/
    if(($ACT!="login") && ($ACT!="denied")){
    ?>
    
    <div class="dokuwiki__header__wrapper">
        <div class="group">

            <a href="<?php echo wl(); ?>" class="wikilogo">
                <?php
                $logoSize = array();
                $logo = tpl_getMediaFile(array(':wiki:logo.png', ':logo.png', 'images/logo.png'), false, $logoSize);
                ?>
                <img src=<?php echo $logo; ?> class="media" loading="lazy" alt="" width="80">
                <div>
                    <?php echo $conf['title']; ?>
                    <?php if ($conf['tagline']): ?>
                    <div class="claim"><?php echo $conf['tagline'] ?></div>
                    <?php endif ?>
                </div>
            </a>
        </div>

        <?php
        
        tpl_searchform();

        ?> 
        <nav class="tools" aria-label="<?php echo $lang['tools'] ?>">
            <div id="open-search">
                <strong><?php echo inlineSVG(KIWIKI_IMAGES_PATH . 'search.svg') ?></strong>
            </div>
            <div id="theme-mode">
                <strong><?php echo inlineSVG(KIWIKI_IMAGES_PATH . 'theme_mode.svg') ?></strong>
            </div>
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
            
            
            <!-- USER TOOLS -->
            <?php if ($conf['useacl']): ?>
            <div id="dokuwiki__usertools">
                <strong><?php echo inlineSVG(KIWIKI_IMAGES_PATH . 'user_icon.svg') ?></strong>
                
                <ul>
                    <?php
                            if (!empty($_SERVER['REMOTE_USER'])) {
                                echo '<li class="user">';
                                tpl_userinfo();
                                echo '</li>';
                            }
                        ?>
                    <?php echo (new \dokuwiki\Menu\UserMenu())->getListItems('action ', false); ?>
                </ul>
            </div>
            <?php endif ?>
        </nav>
    </div>
    <?php 
    html_msgarea();
    
} ?>
</header><!-- /header -->

<?php
/**
 * Header template for Dokuwiki Kiwiki Theme
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

?>
<header id="dokuwiki__header">
    <?php
    
    $mainmenu = tpl_getConf('MainMenu');

    /*** disable header on login or denied pages ***/
    if(($ACT!="login") && ($ACT!="denied")){
    ?>
    
    <div class="dokuwiki__header__wrapper" role="banner">
        <div class="group">

            <a href="<?php echo wl(); ?>" class="wikilogo">
                <?php


                ?>
                <span class="logo-img"><img src=<?php echo $logo; ?> class="media" loading="lazy" alt="" width="80"></span>
                
                <div>
                    <?php echo $conf['title']; ?>
                    <?php if ($conf['tagline']){ ?>
                    <div class="claim"><?php echo $conf['tagline'] ?></div>
                    <?php } ?>
                </div>
            </a>
        </div>

        <?php
        
        tpl_searchform();

        ?> 
        <nav class="tools" aria-label="<?php echo $lang['tools'] ?>">
            <div id="open-search" role="button" aria-label="<?php echo tpl_getLang('search') ?>">
                <strong><?php echo inlineSVG(KIWIKI_IMAGES_PATH . 'search.svg') ?></strong>
            </div>
            <?php if (tpl_getConf('FullScreenBtn')){?>
            <div id="full-screen" role="button" aria-label="<?php echo tpl_getLang('full-screen') ?>">
                <strong><?php echo inlineSVG(KIWIKI_IMAGES_PATH . 'full_screen.svg') ?></strong>
            </div>
            <?php } ?>
            
            <?php if (!tpl_getConf('ForceTheme')){?>
            <div id="theme-mode" role="button" aria-label="<?php echo tpl_getLang('theme-mode') ?>">
                <strong><?php echo inlineSVG(KIWIKI_IMAGES_PATH . 'theme_mode.svg') ?></strong>
            </div>
            <?php } ?>

            
            <!-- USER TOOLS -->
            <?php if ($conf['useacl']){ ?>
            <div id="dokuwiki__usertools" role="button" aria-label="<?php echo tpl_getLang('user-tools') ?>">
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
            <?php }
            
            if (!empty($mainmenu)) {?>
            <div id="kiwiki-main-menu__open" role="button" aria-label="<?php echo tpl_getLang('main-menu') ?>">
                <strong><?php echo inlineSVG(KIWIKI_IMAGES_PATH . 'burger.svg') ?></strong>
            </div>
            <?php } ?>
        </nav>
    </div>
    <?php
    /*mainmenu*/
    if (!empty($mainmenu)) {
        $translation = plugin_load('helper','translation');
        $currentlng = "";
        if ($translation){
            $currentlng = (explode(":",$INFO['namespace']))[0] . ":";
        }
        $mainmenu = $currentlng . $mainmenu;      
            ?>
        <div class="kiwiki-main-menu__wrapper">
            <div class="kiwiki-main-menu-overlay"></div>
            <div class="kiwiki-main-menu">
                <button id="kiwiki-main-menu__close">
                    <span class="icon"><?php echo inlineSVG(KIWIKI_IMAGES_PATH . 'close.svg') ?></span>
                    <span class="a11y"><?php echo tpl_getLang('close') ?></span>
                </button>
                <div class="menu-content">
                <?php tpl_include_page($mainmenu);
                echo Kiwiki_Functions::_edit_icon($mainmenu);
                ?>
                </div>
            </div>
        </div>
        <?php
    }
    html_msgarea();
    
} ?>
</header><!-- /header -->

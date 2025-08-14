<?php
/**
 * Footer template for Dokuwiki Kiwiki Theme
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

?>
<footer id="dokuwiki__footer">
    <div class="meta">
        
        <?php if (tpl_getConf('ShowUserFooter')){
            echo '<div class="user">';
            tpl_userinfo();
            echo '</div>';
        }
        ?>

        <?php if (tpl_getConf('ShowACLFooter') && ($INFO['editable'])){
            echo '<div class="acl">';
            Kiwiki_Functions::tpl_aclinfo();
            echo '</div>';
        }
        ?>
        
        <div class="doc"><?php tpl_pageinfo() ?></div>
    </div>
    <?php tpl_license('button') ?>
    <?php tpl_includeFile('footer.html') ?>
</footer>

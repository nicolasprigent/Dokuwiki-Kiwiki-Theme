<footer id="dokuwiki__footer">
    <div class="meta">
        
        <?php if (tpl_getConf('ShowUserFooter')){
        echo '<div class="user">';
        tpl_userinfo();
        echo '</div>';
        }
        ?>

        <?php if (tpl_getConf('ShowACLFooter'))
        echo '<div class="acl">' . Kiwiki_Functions::tpl_aclinfo() . '</div>'?>
        
        <div class="doc"><?php tpl_pageinfo() ?></div>
    </div>
    <?php tpl_license('button') ?>
    <?php tpl_includeFile('footer.html') ?>
</footer>

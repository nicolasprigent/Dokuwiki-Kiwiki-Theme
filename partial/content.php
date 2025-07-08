<?php
if (!empty($sidebar)) {
    $sidebar = $INFO['namespace'] ? $INFO['namespace'] . ':' . $sidebar : $sidebar;
}
?>

<div id="dokuwiki__content__wrapper">

    <!-- ********** ASIDE LEFT ********** -->

    <?php
    
    if(($ACT!="login") && ($ACT!="denied")){
        if( $sidebar_right == 0 || $toc_right  == 0 ){
            $right = 0;
            include('partial/sidebar_toc.php');
        }
    }
    ?>  

    <!-- ********** CONTENT ********** -->    
    <main id="dokuwiki__content">
        
        <div class="group">
            <?php tpl_flush() ?>
            <?php tpl_includeFile('pageheader.html') ?>
            <div class="page group">
                <!-- wikipage start -->
                <?php tpl_content(false);
                echo Kiwiki_Functions::_edit_icon('');
                ?>
                <!-- wikipage stop -->
            </div>
            <?php tpl_flush();
            if(($ACT=="login") || ($ACT=="denied")){
                html_msgarea();
                echo '<a href="'.DOKU_BASE.'" class="back-home">' . tpl_getLang('Back to homepage') . '</a>';
            }
            if (isset($_REQUEST['do']) && $_REQUEST['do'] == 'profile'){
                echo '<div class="user_groups_info">' . tpl_getLang('User is in group');
                echo join(', ',$INFO['userinfo']['grps']);
                echo '</div>';
            } ?>
        </div>
    </main><!-- /content -->

    <!-- ********** ASIDE RIGHT ********** -->
    <?php
    
    if(($ACT!="login") && ($ACT!="denied")){
        if( $sidebar_right == 1 || $toc_right  == 1 ){
            $right = 1;
             include('partial/sidebar_toc.php');
        }
    }
    ?>  

</div><!-- /wrapper -->
<?php
/* mobile sidebar */
if (($ACT == 'show') && page_exists($sidebar)) {
    
        ?>
        <div class="kiwiki-sidebar-mobile">
            <div class="sidebar-content">
            <?php
            tpl_include_page($sidebar, true, true);
            echo Kiwiki_Functions::_edit_icon($sidebar);
            ?>
            </div>
        </div>

    <?php
}
?>
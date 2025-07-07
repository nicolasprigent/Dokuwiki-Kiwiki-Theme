<div id="dokuwiki__content__wrapper">
    <!-- ********** ASIDE ********** -->
    
    <?php 

    /* disable sidemenu on login and some pages */
    $toc = tpl_toc(true);
    if(($ACT!="login") && ($ACT!="denied")){
        if (($ACT == 'show')||(isset($_REQUEST['page']) && $ACT=='admin' && $toc!="")){
    ?>
    
    
    <div id="dokuwiki__aside">
        <div class="dokuwiki__aside_wrapper">
        <?php
            /* sidebar */
            $sidebar = $conf['sidebar'];
            if (!empty($sidebar)) {
                $translation = plugin_load('helper','translation');
                $currentlng = "";
                if ($translation){
                    $currentlng = (explode(":",$INFO['namespace']))[0] . ":";
                }
                $sidebar = $currentlng . $sidebar;      
                    ?>
                    <div class="kiwiki-sidebar">
                        <div class="sidebar-content">
                        <?php tpl_include_page($sidebar, true, true);
                        echo Kiwiki_Functions::_edit_icon($sidebar);
                        ?>
                        </div>
                    </div>

                <?php
            }
            /*toc*/
            if ($toc!=""){
                echo tpl_toc() ;
            }
            ?>
        </div>
    </div>
    <?php 
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
</div><!-- /wrapper -->

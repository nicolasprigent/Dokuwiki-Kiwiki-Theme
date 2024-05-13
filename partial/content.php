<div id="dokuwiki__content__wrapper">
    <!-- ********** ASIDE ********** -->
    
    <?php 

    /* disable sidemenu on login and some pages */
    if(($ACT!="login") && ($ACT!="denied")){
        if (($ACT == 'show')||(isset($_REQUEST['page']) && $ACT=='admin' && $_REQUEST['page'] == 'config')){
    ?>
    
    
    <div id="dokuwiki__aside">
        <div class="dokuwiki__aside_wrapper">
        <?php
            /*mainmenu*/
            if ($ACT=='show'){
                $mainmenu = tpl_getConf('MainMenu');
               $translation = plugin_load('helper','translation');
                $currentlng = "";
                if ($translation){
                    $currentlng = (explode(":",$INFO['namespace']))[0] . ":";
                }
                $mainmenu = $currentlng . $mainmenu;      
                    ?>
                    <div class="kiwiki-main-menu dokuwiki__aside__block">
                        <h3><?php echo tpl_getLang('Menu'); ?></h3>
                        <div class="menu-content">
                        <?php tpl_include_page($mainmenu); 
                        echo Kiwiki_Functions::_edit_icon($mainmenu);
                        ?>
                        </div>
                    </div>
            
                <?php
            }    
            /*toc*/
            $toc = tpl_toc(true);
            if ((isset($toc))){
                echo tpl_toc() ;
            }
            ?>
        </div>
    </div>
    <?php 
        }
    } ?>
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
                echo '<a href="/" class="back-home">' . tpl_getLang('Back to homepage') . '</a>';
            }
            if (isset($_REQUEST['do']) && $_REQUEST['do'] == 'profile'){
                echo '<div class="user_groups_info">' . tpl_getLang('User is in group');
                echo join(', ',$INFO['userinfo']['grps']);
                echo '</div>';
            } ?>
        </div>
    </main><!-- /content -->
</div><!-- /wrapper -->

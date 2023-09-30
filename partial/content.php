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
                if ($INFO['namespace']){
                    $mainmenu = $INFO['namespace'] . ":" . $mainmenu;
                }                
                    ?>
                    <div class="kiwiki-main-menu dokuwiki__aside__block">
                        <h3><?php echo tpl_getLang('Menu'); ?></h3>
                        <?php tpl_include_page($mainmenu); 
                        if (isset($USERINFO['grps']))
                        echo Kiwiki_Functions::_edit_icon($mainmenu,$USERINFO['grps'], $ACT);
                        
                        ?>
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
                if (isset($USERINFO['grps']))
                echo Kiwiki_Functions::_edit_icon($INFO['id'],$USERINFO['grps'], $ACT);
                ?>
                <!-- wikipage stop -->
            </div>
            <?php tpl_flush();
            if(($ACT=="login") || ($ACT=="denied")){?>
                <a href="/" class="back-home"><?php echo tpl_getLang('Back to homepage'); ?></a>
            <?php } ?>
        </div>
    </main><!-- /content -->
</div><!-- /wrapper -->

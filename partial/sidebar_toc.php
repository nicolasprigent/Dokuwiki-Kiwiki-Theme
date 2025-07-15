<?php
/* disable sidemenu on login and some pages */
    
    //var_dump($ACT);
    if ((page_exists($sidebar) && $ACT == 'show' && $sidebar_right == $right) || ($toc!="" && $toc_right == $right)){
    ?>
    <div class="kiwiki_aside <?php echo ($right == 1) ? 'right' : 'left'; ?>" role="navigation">
            <div class="dokuwiki__aside_wrapper">
            <?php
            /* sidebar */
            if ($ACT == 'show' && page_exists($sidebar) && $sidebar_right == $right) {
                
                ?>
                <div class="kiwiki-sidebar">
                    <div class="sidebar-content">
                    <?php
                    tpl_include_page($sidebar, true, true);
                    echo Kiwiki_Functions::_edit_icon($sidebar);
                    ?>
                    </div>
                </div>

            <?php
            }
            /*toc*/
            if ($toc!="" && $toc_right == $right){
                echo tpl_toc() ;
            }
            ?>
            </div>
    </div>
    <?php
    } 
    ?>
<?php
/**
 * Conditional display of sidebar and toc
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

if ((page_exists($sidebar) && $ACT == 'show' && $sidebar_right == $right) || ($toc!="" && $toc_right == $right)){
?>
<div class="kiwiki_aside <?php echo ($right == 1) ? 'right' : 'left'; ?>">
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
            // Capture the TOC output
            ob_start();
            echo tpl_toc();
            $toc_html = ob_get_clean();

            // Add role="button" to the first <h3> tag
            $toc_html = preg_replace('/<h3([^>]*)>/', '<h3$1 role="button">', $toc_html, 1);

            echo $toc_html;
        }
        ?>
        </div>
</div>
<?php
} 
?>
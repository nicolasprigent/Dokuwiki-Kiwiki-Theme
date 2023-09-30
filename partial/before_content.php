<?php
/* disable breadcrumb on login and denied pages */
if(($ACT!="login") && ($ACT!="denied")){
    ?><div class="before-content"><?php
    /* BREADCRUMBS */
        if($conf['breadcrumbs']){?>
            <div class="breadcrumbs">
            <?php tpl_breadcrumbs() ;?>
            </div>
        <?php }
        if($conf['youarehere']){?>
            <div class="youarehere">
            <?php tpl_youarehere() ;?>
            </div>
        <?php }
        $translation = plugin_load('helper','translation');
        if ($translation){
            echo '<div class="translation-switcher">' . $translation->showTranslations() . '</div>';
        }
    ?>
    </div>
<?php } ?>

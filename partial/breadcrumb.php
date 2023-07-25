<!-- BREADCRUMBS -->
<?php
/* disable breadcrumb on login and denied pages */
if(($ACT!="login") && ($ACT!="denied")){
        if($conf['breadcrumbs']){ ?>
    <div class="breadcrumbs"><?php tpl_breadcrumbs() ?></div>
    <?php } ?>
    <?php if($conf['youarehere']){ ?>
    <div class="breadcrumbs"><?php tpl_youarehere() ?></div>
    <?php }
} ?>

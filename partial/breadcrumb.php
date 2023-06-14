<!-- BREADCRUMBS -->
<?php
if(isset($_SERVER['REMOTE_USER'])) {
        if($conf['breadcrumbs']){ ?>
    <div class="breadcrumbs"><?php tpl_breadcrumbs() ?></div>
    <?php } ?>
    <?php if($conf['youarehere']){ ?>
    <div class="breadcrumbs"><?php tpl_youarehere() ?></div>
    <?php }
} ?>
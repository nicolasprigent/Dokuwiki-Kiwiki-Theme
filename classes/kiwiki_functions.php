<?php

class Kiwiki_Functions {

    public static function _edit_icon($what, $usergroup, $action){
        $output = "";
        if (isset($usergroup)){
            if (in_array('admin',$usergroup) && $action == 'show'){                        
                $output = '<a class="edit-this" href="doku.php?id=' . $what . '&do=edit">' . inlineSVG(KIWIKI_IMAGES_PATH . 'edit.svg') .'</a>';
            }
        }
        return $output;
    }

}
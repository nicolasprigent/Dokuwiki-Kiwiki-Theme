<?php

namespace dokuwiki\Menu\Item;

/**
 * Class Edit Icon
 *
 */

class EditIcon extends AbstractItem {

    /** @inheritdoc */
    public function __construct() {
        parent::__construct();
        $this->type = 'edit';
        $this->svg = KIWIKI_IMAGES_PATH . 'edit.svg';
        $this->params = array('do' => 'edit');
        $this->context = self::CTX_ALL;
    }
    
    
}

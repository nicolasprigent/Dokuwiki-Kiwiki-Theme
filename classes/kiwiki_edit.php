<?php

namespace dokuwiki\Menu;

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

/**
 * Class KiwikiEdit
 *
 * Edit icon button
 */
class KiwikiEdit extends AbstractMenu {
    
    public $types = array(
        'EditIcon'
    );

    /**
     * Generate HTML list items for this menu
    */
    public function getListItems($classprefix = 'edit-this', $svg = true)
    {
        $html = '';
        foreach ($this->getItems() as $item) {
            $html .= $item->asHtmlLink($classprefix , $svg);
        }
        return $html;
    }
}

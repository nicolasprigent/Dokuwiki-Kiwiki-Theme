<?php

namespace dokuwiki\Menu;

/**
 * Class KiwikiEdit
 *
 * Edit icon button
 */
class KiwikiEdit extends AbstractMenu {
    
    protected $view = 'page';

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

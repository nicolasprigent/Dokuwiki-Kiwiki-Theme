<?php

namespace dokuwiki\Menu\Item;

/**
 * Class Bottom
 *
 * Scroll to the bottom. Uses a hash as $id which is handled special in getLink().
 */
class Bottom extends AbstractItem {

    /** @inheritdoc */
    public function __construct() {
        parent::__construct();

        $this->svg = DOKU_INC . 'lib/images/menu/10-top_arrow-up.svg';
        $this->accesskey = 't';
        $this->params = array('do' => '');
        $this->id = '#dokuwiki__bottom';
        $this->context = self::CTX_DESKTOP;
    }
    /**
     * Convenience method to create a <button> element
     *
     * Uses html_topbtn()
     *
     * @todo this does currently not support the SVG icon
     * @return string
     */
    public function asHtmlButton() {
        return Kiwiki_Functions::html_bottombtn();
    }

}

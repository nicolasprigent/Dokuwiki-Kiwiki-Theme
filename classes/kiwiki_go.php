<?php

namespace dokuwiki\Menu;

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

/**
 * Class KiwikiGo
 *
 * Go to top button
 */
class KiwikiGo extends AbstractMenu {

    public $types = array(
        'Top',
        'Bottom'
    );

}

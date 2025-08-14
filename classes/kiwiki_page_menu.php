<?php

namespace dokuwiki\Menu;

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

/**
 * Class KiwikiPageMenu
 *
 * Actions manipulating the current page. Shown as a floating menu in the dokuwiki template
 */
class KiwikiPageMenu extends AbstractMenu {

    protected $view = 'page';

    protected $types = array(
        'Edit',
        'Revert',
        'Revisions',
        'Backlink',
        'Subscribe',
    );

}
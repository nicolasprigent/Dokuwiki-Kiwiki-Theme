<?php

namespace dokuwiki\Menu;

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
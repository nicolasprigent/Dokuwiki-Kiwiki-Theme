<?php

class Kiwiki_Functions {

    
    /**
     * Edit icon button
     */
    public static function _edit_icon($what){
        global $ACT;
        if ($ACT == 'show'){
            $editicon = (new \dokuwiki\Menu\KiwikiEdit())->getListItems('kiwiki-',true);
            
            if (!empty($what)){
                $editicon = preg_replace('/<a(.*)href="([^"]*)"(.*)>/','<a$1href='.$DOKU_BASE.'"/doku.php?id='.$what.'&do=edit"$3>',$editicon);
            }
            return $editicon;
        }
    }

    
    /**
     * Go bottom button
     */

    public static function html_bottombtn() {
        global $lang;

        return '<a class="nolink" href="#dokuwiki__bottom">'
            .'<button class="button" onclick="window.scrollTo(0, 0)" title="'. $lang['btn_bottom'] .'">'
            . $lang['btn_bottom']
            .'</button></a>';
    }

    /**
     * Custom ACL Informations in footer
     * Original code from Chris75
     * https://forum.dokuwiki.org/d/21636-acl-deny-a-user-group-to-a-namespace/13
     */

     public static function tpl_aclinfo() {
        global $ID, $AUTH_ACL, $INFO;
        
        if ((auth_quickaclcheck($ID) == 0) ||(!$INFO['editable']))
            return; // no rights to view, no rights to get this info
        
        $page_acls = array();
        $namespaces = array();
        
        $ns = getNS($ID);
        while ($ns) {
        array_unshift($namespaces,$ns . ':*');
        $ns = getNS($ns);  
        }
        array_unshift($namespaces,'*'); // root
        
        $namespaces[] = $ID;
        
        // check matches
        foreach ($namespaces as $level) {
            $matches = preg_grep('/^'.preg_quote($level,'/').'\s+\S+\s+\d+\s*$/',$AUTH_ACL);
            $this_acls = array();
            foreach($matches as $match){
            $match = preg_replace('/#.*$/','',$match); //ignore comments
            $acl   = preg_split('/\s+/',$match);
            $this_acls[urldecode($acl[1])] = $acl[2];
            if ($acl[1] == "@ALL")  // overwrites stuff from upper level
                $page_acls = array();
            }
            $page_acls =  array_merge($page_acls,$this_acls);
        }
        
        // check if visible to everyone:
        /*if (($page_acls['@ALL'] !== false) && $page_acls['@ALL'] > 0) 
        return; // page is visible to everyone*/
        
        $list = array();	
        foreach ($page_acls as $user => $right) {
            if ($right > 0 && $user != "@admin" ) // admins can see everything
                array_push($list,$user);
        }
        if (count($list)) {
            sort($list);
            print tpl_getLang('Visible to');
            print join(', ',$list);
        }
        
        // Uncomment this, if you want to display users/groups who cannot access this page, too:
        $list = array();
        foreach ($page_acls as $user => $right) {
            if ($right == 0)
                array_push($list,$user);
        }
        if (count($list)) {
            sort($list);
            print " • ";
            print tpl_getLang('Hidden to');
            print join(', ',$list);
        }
    }
}

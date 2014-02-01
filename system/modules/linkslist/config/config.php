<?php

/**
 * Back end modules
 */
$GLOBALS['BE_MOD']['content']['linkslist'] = array(
	'tables' => array('tl_linkslist_list', 'tl_linkslist_link'),
	'icon'   => 'system/modules/linkslist/assets/images/linkslist.png');

        
/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['linkslist'] = array
(
	'linkslist_list'     => 'ModuleLinkslistList',
);
?>

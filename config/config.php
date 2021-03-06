<?php

/**
 *
 * Copyright (c) 2014 gfg-development
 *
 * @link    http://www.gfg-development.de
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Add content element
 */
$GLOBALS['TL_CTE']['includes']['linkslist_list'] = 'ContentLinkslist';

/**
 * Back end modules
 */
$GLOBALS['BE_MOD']['content']['linkslist'] = array(
	'tables' => array('tl_linkslist_list', 'tl_linkslist_link', 'tl_content'),
	'icon'   => 'system/modules/linkslist/assets/images/linkslist.png');


/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['linkslist'] = array
(
	'linkslist_list'     => 'ModuleLinksListList',
);
?>

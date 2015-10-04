<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Linkslist
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Modules
	'ModuleLinksListList' => 'system/modules/linkslist/modules/ModuleLinksListList.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_linkslist_list' => 'system/modules/linkslist/templates',
));

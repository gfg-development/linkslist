<?php

/**
 *
 * Copyright (c) 2014 gfg-development
 *
 * @link    http://www.gfg-development.de
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

require_once(__DIR__.'/../classes/LinksList.php');

class ModuleLinksListList extends Module
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_linkslist_list';

	/**
	 * Compile the current element
	 */
	protected function compile()
	{
        $linksList = NEW LinksList();
        $t = $linksList->getVars(unserialize($this->linkslist_id), $this->linkslist_sorting, $this->linkslist_use_subtitles);
        $this->Template->data = $t['data'];
        $this->Template->subtitles = $t['subtitles'];
	}
}

?>

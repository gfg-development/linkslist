<?php
 
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
		/** @var \Contao\Database\Result $rs */
		$rs = Database::getInstance()
			->query('SELECT * FROM tl_linkslist_link ORDER BY name');
 
		$this->Template->links = $rs->fetchAllAssoc();
	}
}

?>
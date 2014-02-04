<?php

/**
 *
 * Copyright (c) 2014 gfg-development
 *
 * @link    http://www.gfg-development.de
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */
 
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
            $moduleParams = Database::getInstance()->prepare("SELECT * FROM tl_module WHERE id=?") 
                    ->limit(1) 
                    ->execute($this->id);
            $lists = unserialize($moduleParams->linkslist_id);
            $where = 'WHERE ';
            $first = true;
            foreach($lists as $list_id)
            {
                if(!$first)
                {
                    $where .= ' OR ';
                }
                $where .= 'pid = '.$list_id;
                $first = false;
            }
            
            switch($moduleParams->linkslist_sorting)
            {
                case 'A':
                    $order = 'name';
                    break;
                case 'B':
                    $order = 'url';
                    break;
                case 'C':
                    $order = 'tstamp DESC';
                    break;
                case 'D':
                    $order = 'tstamp';
                    break;
                default:
                    $order = 'name';
            }
            
            $sql = 'SELECT * FROM tl_linkslist_link '.$where.' ORDER BY '.$order;
	    /** @var \Contao\Database\Result $rs */
            $rs = Database::getInstance()
		    ->query($sql);
	    $this->Template->links = $rs->fetchAllAssoc();
	}
}

?>
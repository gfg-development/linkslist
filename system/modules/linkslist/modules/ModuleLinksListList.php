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
	 * Create the Link from the information
	 */
	 
	private function getLinks($data)
	{
		$links = array();
		foreach($data as $key => $d)
		{
			for($i = 0; $i < count($d); $i++)
			{
				if($d[$i]['linksource'] == 'local')
				{
					$file = FilesModel::findById($d[$i]['file']);
					$d[$i]['url'] = Environment::get('uri') . $file->path;
				}
			}
			$links[$key] = $d;
		}
		return $links;
	}
 
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
            $order = '';
            
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
            
            if($moduleParams->linkslist_use_subtitles == 0)
            {
                $first = true;
                foreach($lists as $listId)
                {
                    if(!$first)
                    {
                        $where .= ' OR ';
                    }
                    $where .= 'pid = '.$listId;
                    $first = false;
                }
                
                $sql = 'SELECT * FROM tl_linkslist_link '.$where.' ORDER BY '.$order;               
                /** @var \Contao\Database\Result $rs */
                $rs = Database::getInstance()
                    ->query($sql);
                $data[''] = $rs->fetchAllAssoc();
                $this->Template->data = $this->getLinks($data);
                $this->Template->subtitles = false;
            }
            else
            {
                $links = array();
                foreach($lists as $listId)
                {
                    $rs = Database::getInstance()
                        ->query('SELECT * FROM tl_linkslist_link WHERE pid = '.$listId.' ORDER BY '.$order);
                    $data = $rs->fetchAllAssoc();
                    
                    $listParams = Database::getInstance()->prepare("SELECT * FROM tl_linkslist_list WHERE id=?") 
                        ->limit(1) 
                        ->execute($listId);
                    $links[$listParams->name] = $data;
                }
                $this->Template->data = $this->getLinks($links);
                $this->Template->subtitles = true;
            }
	}
}

?>
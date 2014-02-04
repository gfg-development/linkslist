<?php

/**
 *
 * Copyright (c) 2014 gfg-development
 *
 * @link    http://www.gfg-development.de
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Module config
 */

$GLOBALS['TL_DCA']['tl_module']['palettes']['linkslist_list'] = '{title_legend},name,headline,type;{config_legend},linkslist_id;{sort_legend},linkslist_sorting;
{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['fields']['linkslist_id'] = array 
( 
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['linkslist_id'],  
    'exclude'                 => true, 
    'inputType'               => 'checkbox',
    'foreignKey'              => 'tl_linkslist_list.name',
    'eval'                    => array('mandatory'=>true, 'multiple'=>true),
    'sql'                     => "varchar(256) NOT NULL"
); 
$GLOBALS['TL_DCA']['tl_module']['fields']['linkslist_sorting'] = array 
( 
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['linkslist_sorting'], 
    'default'                 => 'A', 
    'exclude'                 => true, 
    'inputType'               => 'select', 
    'options'                 => array('A', 'B', 'C', 'D'), 
    'reference'               => &$GLOBALS['TL_LANG']['tl_module']['linkslist_sortings'], 
    'eval'                    => array('mandatory'=>true),
    'sql'                     => "varchar(1) NOT NULL default 'A'"
);

?>
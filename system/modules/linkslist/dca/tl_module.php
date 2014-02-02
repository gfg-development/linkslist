<?php

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
    'options_callback'        => 
    //'foreignKey'              => 'tl_linkslist_list.id',
    //'reference'               => &$GLOBALS['TL_LANG']['tl_module']['linkslist_ids'], 
    'eval'                    => array('mandatory'=>true, 'multiple'=>true),
    'sql'                     => "int(10) unsigned NOT NULL"
); 
$GLOBALS['TL_DCA']['tl_module']['fields']['linkslist_sorting'] = array 
( 
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['linkslist_sorting'], 
    'default'                 => 'A', 
    'exclude'                 => true, 
    'inputType'               => 'select', 
    'options'                 => array('A','C'), 
    'reference'               => &$GLOBALS['TL_LANG']['tl_module']['linkslist_sortings'], 
    'eval'                    => array('mandatory'=>true),
    'sql'                     => "varchar(1) NOT NULL default 'B'"
);

?>
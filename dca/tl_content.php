<?php
/**
 *
 * Copyright (c) 2015 gfg-development
 *
 * @link    http://www.gfg-development.de
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Add palette to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['linkslist_list'] = '{type_legend},type,headline;{config_legend},linkslist_id, linkslist_use_subtitles;{sort_legend},linkslist_sorting;
{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';

/**
 * Add fields to tl_content
 */
 $GLOBALS['TL_DCA']['tl_content']['fields']['linkslist_id'] = array
 (
     'label'                   => &$GLOBALS['TL_LANG']['tl_content']['linkslist_id'],
     'exclude'                 => true,
     'inputType'               => 'checkboxWizard',
     'foreignKey'              => 'tl_linkslist_list.name',
     'eval'                    => array('mandatory'=>true, 'multiple'=>true),
     'sql'                     => "varchar(256) NOT NULL default ''"
 );

 $GLOBALS['TL_DCA']['tl_content']['fields']['linkslist_use_subtitles'] = array
 (
     'label'                   => &$GLOBALS['TL_LANG']['tl_content']['linkslist_use_subtitles'],
     'exclude'                 => true,
     'inputType'               => 'checkbox',
     'sql'                     => "char(1) NOT NULL default ''"
 );

 $GLOBALS['TL_DCA']['tl_content']['fields']['linkslist_sorting'] = array
 (
     'label'                   => &$GLOBALS['TL_LANG']['tl_content']['linkslist_sorting'],
     'default'                 => 'A',
     'exclude'                 => true,
     'inputType'               => 'select',
     'options'                 => array('A', 'B', 'C', 'D'),
     'reference'               => &$GLOBALS['TL_LANG']['tl_content']['linkslist_sortings'],
     'eval'                    => array('mandatory'=>true),
     'sql'                     => "varchar(1) NOT NULL default 'A'"
 );

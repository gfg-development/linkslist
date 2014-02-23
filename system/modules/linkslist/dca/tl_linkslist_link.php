<?php

/**
*
* Copyright (c) 2014 gfg-development
*
* @link    http://www.gfg-development.de
* @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
*/

/**
* Table tl_linkslist_list
*/
$GLOBALS['TL_DCA']['tl_linkslist_link'] = array
(

	// Config
	'config'   => array
	(
		'dataContainer'    => 'Table',
				'ptable'           => 'tl_linkslist_list',
		'enableVersioning' => true,
				'switchToEdit'     => true,
		'sql'              => array
		(
			'keys' => array
			(
				'id' => 'primary',
								'pid' => 'index'
			)
		),
	),
		// List
	'list'     => array
	(
		'sorting'           => array
		(
			'mode'        => 2,
			'fields'      => array('name'),
			'flag'        => 1,
			'panelLayout' => 'filter;sort,search,limit'
		),
				'label'             => array
		(
			'fields' => array('name'),
			'format' => '%s',
		),
				'global_operations' => array
		(
			'all' => array
			(
				'label'      => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'       => 'act=select',
				'class'      => 'header_edit_all',
				'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"'
			)
		),
				'operations'        => array
		(
						'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_linkslist_link']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_linkslist_link']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif',
			),
			'delete' => array
			(
				'label'      => &$GLOBALS['TL_LANG']['tl_linkslist_link']['delete'],
				'href'       => 'act=delete',
				'icon'       => 'delete.gif',
				'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'show'   => array
			(
				'label'      => &$GLOBALS['TL_LANG']['tl_linkslist_link']['show'],
				'href'       => 'act=show',
				'icon'       => 'show.gif',
				'attributes' => 'style="margin-right:3px"'
			),
		)
	),
		// Palettes
	'palettes' => array
	(
		'__selector__'  => array('linksource'),
		'default'       => '{title_legend},name;{link_legend},linksource,linksource_local,linksource_external,linksource_page,target,description,info'
	),
	'subpalettes' => array
	(
		'linksource_local'              => 'file',
		'linksource_external'           => 'url',
		'linksource_page'           => 'page'
	),
// Fields
	'fields'   => array
	(
		'id'     => array
		(
			'sql' => "int(10) unsigned NOT NULL auto_increment"
		),
		'pid'     => array
		(
			'foreignKey'              => 'tl_linkslist_list.name',
			'sql'                     => "int(10) unsigned NOT NULL default '0'",
			'relation'                => array('type'=>'belongsTo', 'load'=>'eager')
		),
		'tstamp' => array
		(
			'sql' => "int(10) unsigned NOT NULL default '0'"
		),
		'linksource'    => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_linkslist_link']['linksource'],
			'inputType' => 'select',
			'exclude'   => true,
			'options'   => array('external', 'local', 'page'),
			'reference' => &$GLOBALS['TL_LANG']['tl_linkslist_link']['linksources'],
			'eval'      => array(
				'includeBlankOption' => true,
				'submitOnChange'     => true,
				'mandatory'          => true
			),
			'sql'       => "varchar(10) NOT NULL default ''"
		),
		'url'    => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_linkslist_link']['url'],
			'default'	=> 'http://www.',
			'inputType' => 'text',
			'exclude'   => true,
			'eval'      => array(
				'mandatory' => true,     
			),
			'sql'            => "text NOT NULL"
		),
		'file'    => array
		(
			'label'         => &$GLOBALS['TL_LANG']['tl_linkslist_link']['file'],
			'inputType' => 'fileTree',
			'exclude'     => true,
						'eval'      => array(
							'mandatory' => true,
							'fieldType'=>'radio',
							'files' => true,
							'filesOnly' => true,     
						),
			'sql'            => "binary(16) NULL"
		),
		'page'	=> array
		(
			'label' => &$GLOBALS['TL_LANG']['tl_linkslist_link']['page'],
			'inputType' => 'pageTree',
			'exclude'     => true,
						'eval'      => array(
							'mandatory' => true,
							'fieldType'=>'radio'     
						),
			'sql'            => "int(10) unsigned NULL"
		),
		'description'    => array
		(
			'label'         => &$GLOBALS['TL_LANG']['tl_linkslist_link']['description'],
			'inputType' => 'text',
			'exclude'     => true,
			'sql'            => "text NULL"
		),
		'info'    => array
		(
			'label'         => &$GLOBALS['TL_LANG']['tl_linkslist_link']['info'],
			'inputType' => 'text',
			'exclude'     => true,
			'sql'            => "text NULL"
		),
		'name'  => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_linkslist_link']['name'],
			'inputType' => 'text',
			'exclude'   => true,
			'sorting'   => true,
			'flag'      => 1,
			'search'    => true,
			'eval'      => array(
			'mandatory'   => true,
								'unique'         => true,
								'maxlength'   => 255,
				'tl_class'        => 'w50',

			),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
		'target'    => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_linkslist_link']['target'],
			'inputType' => 'select',
			'exclude'   => true,
			'options'   => array('self', 'blank'),
			'reference' => &$GLOBALS['TL_LANG']['tl_linkslist_link']['targets'],
			'eval'      => array(
				'includeBlankOption' => true,
			),
			'sql'       => "varchar(10) NOT NULL default ''"
		),
	)
);
		
?>
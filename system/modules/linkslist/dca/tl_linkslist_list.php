<?php
/**
 * Table tl_linkslist_list
 */
$GLOBALS['TL_DCA']['tl_linkslist_list'] = array
(
 
	// Config
	'config'   => array
	(
		'dataContainer'    => 'Table',
                'ctable'           => array('tl_linkslist_link'),
		'enableVersioning' => true,
                'switchToEdit'     => true,
		'sql'              => array
		(
			'keys' => array
			(
				'id' => 'primary'
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
				'label'               => &$GLOBALS['TL_LANG']['tl_linkslist_list']['edit'],
				'href'                => 'table=tl_linkslist_link',
				'icon'                => 'edit.gif'
			),
			'editheader' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_linkslist_list']['editheader'],
				'href'                => 'act=edit',
				'icon'                => 'header.gif',
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_linkslist_list']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif',
			),
			'delete' => array
			(
				'label'      => &$GLOBALS['TL_LANG']['tl_linkslist_list']['delete'],
				'href'       => 'act=delete',
				'icon'       => 'delete.gif',
				'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'show'   => array
			(
				'label'      => &$GLOBALS['TL_LANG']['tl_linkslist_list']['show'],
				'href'       => 'act=show',
				'icon'       => 'show.gif',
				'attributes' => 'style="margin-right:3px"'
			),
		)
	),
        // Palettes
	'palettes' => array
	(
		'default'       => '{title_legend},name'
),
// Fields
	'fields'   => array
	(
		'id'     => array
		(
			'sql' => "int(10) unsigned NOT NULL auto_increment"
		),
                'tstamp' => array
		(
			'sql' => "int(10) unsigned NOT NULL default '0'"
		),
		'name'  => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_linkslist_list']['name'],
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
		)
       )
);
        
?>
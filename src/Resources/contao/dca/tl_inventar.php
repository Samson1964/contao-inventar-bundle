<?php

/**
 * Tabelle tl_inventar
 */
$GLOBALS['TL_DCA']['tl_inventar'] = array
(

	// Konfiguration
	'config' => array
	(
		'dataContainer'               => Contao\DC_Table::class,
		'enableVersioning'            => true,
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		),
	),

	// Datensätze auflisten
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 2,
			'fields'                  => array('title'),
			'flag'                    => 1,
			'panelLayout'             => 'filter;sort,search,limit',
		),
		'label' => array
		(
			'fields'                  => array('title', 'room'),
			'showColumns'             => true,
			'format'                  => '%s',
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset()" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_inventar']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_inventar']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif',
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_inventar']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'toggle' => array
			(
				'label'                => &$GLOBALS['TL_LANG']['tl_inventar']['toggle'],
				'attributes'           => 'onclick="Backend.getScrollOffset()"',
				'haste_ajax_operation' => array
				(
					'field'            => 'published',
					'options'          => array
					(
						array('value' => '', 'icon' => 'invisible.svg'),
						array('value' => '1', 'icon' => 'visible.svg'),
					),
				),
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_inventar']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif',
				'attributes'          => 'style="margin-right:3px"'
			),
		)
	),

	// Paletten
	'palettes' => array
	(
		'default'                     => '{title_legend},title;{category_legend},room,group,costCenter,category,condition;{publish_legend},published'
	),

	// Felder
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_inventar']['tstamp'],
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_inventar']['title'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'filter'                  => true,
			'search'                  => true,
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'room' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_inventar']['room'],
			'inputType'               => 'select',
			'foreignKey'              => 'tl_inventar_orte.title',
			'eval'                    => array
			(
				'includeBlankOption'  => true,
				'chosen'              => true,
				'tl_class'            => 'long clr'
			),
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'group' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_inventar']['group'],
			'inputType'               => 'select',
			'foreignKey'              => 'tl_inventar_gruppen.title',
			'eval'                    => array
			(
				'includeBlankOption'  => true,
				'chosen'              => true,
				'tl_class'            => 'long clr'
			),
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'costCenter' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_inventar']['costCenter'],
			'inputType'               => 'select',
			'foreignKey'              => 'tl_inventar_kostenstellen.title',
			'eval'                    => array
			(
				'includeBlankOption'  => true,
				'chosen'              => true,
				'tl_class'            => 'long clr'
			),
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'category' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_inventar']['category'],
			'inputType'               => 'select',
			'foreignKey'              => 'tl_inventar_kategorien.title',
			'eval'                    => array
			(
				'includeBlankOption'  => true,
				'chosen'              => true,
				'tl_class'            => 'long clr'
			),
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'condition' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_inventar']['condition'],
			'inputType'               => 'select',
			'foreignKey'              => 'tl_inventar_zustaende.title',
			'eval'                    => array
			(
				'includeBlankOption'  => true,
				'chosen'              => true,
				'tl_class'            => 'long clr'
			),
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'published' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_inventar']['published'],
			'exclude'                 => true,
			'filter'                  => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('doNotCopy'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),
	)
);

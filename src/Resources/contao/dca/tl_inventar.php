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
			'fields'                  => array('inventarnummer', 'title', 'purchaseValue', 'documentDate', 'room', 'remarks'),
			'showColumns'             => true,
			'format'                  => '%s %s %s %s %s %s',
			'label_callback'          => array('tl_inventar', 'modifyList')
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
		'default'                     => '{inventar_legend},inventarnummer,inventarnummer_geklebt;{title_legend},title,number;{category_legend},room,employees,group,costCenter,category,manufacturer,condition;{acquisition_legend:hide},dealer,purchaseValue,documentDate;{device_legend},plantNumber,serialNumber,deviceNumber,manufactureYear;{images_legend},multiSRC;{detail_legend:hide},usefulLifeYears,remarks,info;{publish_legend},published'
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
		'inventarnummer' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_inventar']['inventarnummer'],
			'input_field_callback'    => array('tl_inventar', 'getInventarnummer'),
		),
		'inventarnummer_geklebt' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_inventar']['inventarnummer_geklebt'],
			'exclude'                 => true,
			'filter'                  => true,
			'default'                 => false,
			'inputType'               => 'checkbox',
			'eval'                    => array('mandatory'=>false, 'tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
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
			'filter'                  => true,
			'foreignKey'              => 'tl_inventar_orte.title',
			'eval'                    => array
			(
				'includeBlankOption'  => true,
				'chosen'              => true,
				'tl_class'            => 'w50'
			),
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'employees' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_inventar']['employees'],
			'inputType'               => 'select',
			'filter'                  => true,
			'foreignKey'              => 'tl_inventar_mitarbeiter.title',
			'eval'                    => array
			(
				'includeBlankOption'  => true,
				'chosen'              => true,
				'tl_class'            => 'w50'
			),
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'group' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_inventar']['group'],
			'inputType'               => 'select',
			'filter'                  => true,
			'foreignKey'              => 'tl_inventar_gruppen.title',
			'eval'                    => array
			(
				'includeBlankOption'  => true,
				'chosen'              => true,
				'tl_class'            => 'w50'
			),
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'costCenter' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_inventar']['costCenter'],
			'inputType'               => 'select',
			'filter'                  => true,
			'foreignKey'              => 'tl_inventar_kostenstellen.title',
			'eval'                    => array
			(
				'includeBlankOption'  => true,
				'chosen'              => true,
				'tl_class'            => 'w50'
			),
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'category' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_inventar']['category'],
			'inputType'               => 'select',
			'filter'                  => true,
			'foreignKey'              => 'tl_inventar_kategorien.title',
			'eval'                    => array
			(
				'includeBlankOption'  => true,
				'chosen'              => true,
				'tl_class'            => 'w50'
			),
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'condition' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_inventar']['condition'],
			'inputType'               => 'select',
			'filter'                  => true,
			'foreignKey'              => 'tl_inventar_zustaende.title',
			'eval'                    => array
			(
				'includeBlankOption'  => true,
				'chosen'              => true,
				'tl_class'            => 'w50'
			),
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'manufacturer' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_inventar']['manufacturer'],
			'filter'                  => true,
			'inputType'               => 'select',
			'foreignKey'              => 'tl_inventar_hersteller.title',
			'eval'                    => array
			(
				'includeBlankOption'  => true,
				'chosen'              => true,
				'tl_class'            => 'w50'
			),
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'number' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_inventar']['number'],
			'inputType'               => 'text',
			'default'                 => '1',
			'eval'                    => array
			(
				'rgxp'                => 'natural',
				'maxlength'           => 5,
				'tl_class'            => 'w50'
			),
			'sql'                     => "smallint(5) unsigned NOT NULL default 1"
		),
		'dealer' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_inventar']['dealer'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'eval'                    => array
			(
				'mandatory'           => false, 
				'maxlength'           => 128, 
				'tl_class'            => 'w50'
			),
			'sql'                     => "varchar(128) NOT NULL default ''"
		),
		'purchaseValue' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_inventar']['purchaseValue'],
			'inputType'               => 'text',
			'default'                 => '0',
			'eval'                    => array
			(
				'mandatory'           => false, 
				'rgxp'                => 'digit', 
				'maxlength'           => 255, 
				'tl_class'            => 'w50'
			),
			'load_callback' => array
			(
				array('tl_inventar', 'loadPurchase')
			),
			'sql'                     => "float NOT NULL default '0'"
		),
		'documentDate' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_inventar']['documentDate'],
			'default'                 => 0,
			'filter'                  => true,
			'sorting'                 => true,
			'flag'                    => 5,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'rgxp'                => 'date', 
				'mandatory'           => false, 
				'doNotCopy'           => false, 
				'datepicker'          => true, 
				'tl_class'            =>'w50 wizard'
			),
			'load_callback' => array
			(
				array('tl_inventar', 'loadDate')
			),
			'sql'                     => "int(10) unsigned NOT NULL default 0"
		),
		'usefulLifeYears' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_inventar']['usefulLifeYears'],
			'inputType'               => 'text',
			'default'                 => '0',
			'eval'                    => array
			(
				'rgxp'                => 'natural',
				'maxlength'           => 3,
				'tl_class'            => 'w50'
			),
			'load_callback' => array
			(
				array('tl_inventar', 'loadYears')
			),
			'sql'                     => "smallint(3) unsigned NOT NULL default 0"
		),
		'remarks' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_inventar']['remarks'],
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array
			(
				'style'               => 'height:400px', 
				'decodeEntities'      => true, 
				'tl_class'            => 'clr'
			),
			'sql'                     => "text NULL"
		),
		'multiSRC' => array
		(
			'inputType'               => 'fileTree',
			'eval'                    => array
			(
				'multiple'            => true, 
				'isGallery'           => true,
				'extensions'          => '%contao.image.valid_extensions%',
				'fieldType'           => 'checkbox', 
				'isSortable'          => true, 
				'files'               => true
			),
			'sql'                     => "blob NULL",
		),
		// Anlagennummer
		'plantNumber' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_inventar']['plantNumber'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'eval'                    => array
			(
				'mandatory'           => false, 
				'maxlength'           => 128, 
				'tl_class'            => 'w50'
			),
			'sql'                     => "varchar(128) NOT NULL default ''"
		),
		// Seriennummer
		'serialNumber' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_inventar']['serialNumber'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'eval'                    => array
			(
				'mandatory'           => false, 
				'maxlength'           => 128, 
				'tl_class'            => 'w50'
			),
			'sql'                     => "varchar(128) NOT NULL default ''"
		),
		// Gerätenummer
		'deviceNumber' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_inventar']['deviceNumber'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'eval'                    => array
			(
				'mandatory'           => false, 
				'maxlength'           => 128, 
				'tl_class'            => 'w50'
			),
			'sql'                     => "varchar(128) NOT NULL default ''"
		),
		// Baujahr
		'manufactureYear' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_inventar']['manufactureYear'],
			'inputType'               => 'text',
			'default'                 => '0',
			'eval'                    => array
			(
				'rgxp'                => 'natural',
				'maxlength'           => 4,
				'tl_class'            => 'w50'
			),
			'load_callback' => array
			(
				array('tl_inventar', 'loadYears')
			),
			'sql'                     => "smallint(4) unsigned NOT NULL default 0"
		),
		'info' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_inventar']['info'],
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array
			(
				'style'               => 'height:400px', 
				'decodeEntities'      => true, 
				'tl_class'            => 'clr'
			),
			'sql'                     => "text NULL"
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

class tl_inventar extends Contao\Backend
{
	public function getInventarnummer(Contao\DataContainer $dc)
	{
		$inventarnummer = self::Inventarnummer($dc->id);
		$text =
		'<div class="long widget">
		<div class="tl_text" style="border:0;"><span>'.$GLOBALS['TL_LANG']['tl_inventar']['inventarnummer'][0].': <b style="font-size:16px;">'.$inventarnummer.'</b></span></div>
		</div>';

		return $text;
	}

	public function Inventarnummer($id)
	{
		// Inventarnummer aus ID des Datensatzes bilden
		return sprintf('%06d', $id);
	}

	public function modifyList($row, $label, Contao\DataContainer $dc, $args)
	{
		// Inventarnummer formatieren
		$args[0] = self::Inventarnummer($row['id']);
		// Kaufsumme formatieren
		if($args[2]) $args[2] = str_replace('.', ',', sprintf('%2.2f', $args[2])).'&nbsp;€';
		else $args[2] = '-';

		return $args;
	}

	/**
	 * Set the timestamp to 00:00:00 (see #26)
	 *
	 * @param integer $value
	 *
	 * @return integer
	 */
	public function loadDate($value)
	{
		if($value == 0) return '';
		return strtotime(date('d.m.Y', $value) . ' 00:00:00');
	}

	public function loadYears($value)
	{
		if($value == 0) return '';
		else return $value;
	}

	public function loadPurchase($value)
	{
		// Kaufsumme formatieren
		if($value) $value = str_replace('.', ',', sprintf('%2.2f', $value));
		else $value = '';

		return $value;
	}

}

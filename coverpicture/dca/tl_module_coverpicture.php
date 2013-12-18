<?php

/**
 * CoverPicture
 * 
 * Copyright (C) 2009-2014 Christian Barkowsky
 * 
 * @package CoverPicture
 * @author  Christian Barkowsky <http://christianbarkowsky.de>
 * @license LGPL
 */


/**
 * Load tl_style language file
 */
$this->loadLanguageFile('tl_style');


/**
 * Table tl_module_coverpicture
 */
$GLOBALS['TL_DCA']['tl_module_coverpicture'] = array
(
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => true,
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		)
	),

	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('title'),
			'flag'                    => 1,
			'panelLayout'             => 'search,limit'
		),
		'label' => array
		(
			'fields'                  => array('title', 'standard'),
			'format'                  => '%s <span style="color:#b3b3b3; padding-left:3px;">[%s]</span>'
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	'palettes' => array
	(
		'__selector__'                => array('resize_image', 'use_as_background'),
		'default'                     => '{title_legend},title;{config_legend},singleSRC,jumpTo;{image_legend:hide},resize_image;{imagemap_legend:hide},imageMap;{background_legend:hide},use_as_background;{extended_config_legend:hide},no_inheritance,standard'
	),

	'subpalettes' => array
	(
		'resize_image' => 'size',
		'use_as_background' => 'bgposition,bgrepeat,bgCssID,bgcolor,abgposition',
	),

	'fields' => array
	(
		'id' => array
		(
			'label'                   => array('ID'),
			'search'                  => true,
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['title'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'search'                  => true,
			'eval'                    => array('mandatory'=>true, 'maxlength'=>128),
			'sql'                     => "varchar(128) NOT NULL default ''"
		),
		'singleSRC' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['singleSRC'],
			'exclude'                 => true,
			'inputType'               => 'fileTree',
			'eval'                    => array('fieldType'=>'radio', 'files'=>true, 'mandatory'=>true),
			'sql'                     => (version_compare(VERSION, '3.2', '<')) ? "varchar(255) NOT NULL default ''" : "binary(16) NULL",
		),
		'jumpTo' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['jumpTo'],
			'exclude'                 => true,
			'inputType'               => 'pageTree',
			'foreignKey'              => 'tl_page.title',
			'eval'                    => array('fieldType'=>'radio', 'helpwizard'=>true),
			'explanation'             => 'jumpTo',
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'resize_image' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['resize_image'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default '0'"
		),
		'size' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['size'],
			'exclude'                 => true,
			'inputType'               => 'imageSize',
			'options'                 => version_compare(VERSION, '2.11', '>=') ? $GLOBALS['TL_CROP'] : array('proportional', 'crop', 'box'),
			'reference'               => &$GLOBALS['TL_LANG']['MSC'],
			'eval'                    => array('rgxp'=>'digit', 'nospace'=>true, 'helpwizard'=>true, 'tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'no_inheritance' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['no_inheritance'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'sql'                     => "char(1) NOT NULL default '0'"
		),
		'standard' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['standard'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'					  => array('unique' => true),
			'sql'                     => "char(1) NOT NULL default '0'"
		),
		'imageMap' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['imageMap'],
			'exclude'                 => true,
			'inputType'               => 'textarea',
			'eval'                    => array('allowHtml'=>true,'decodeEntities'=>true,'tl_class'=>'clr'),
			'sql'                     => "blob NULL"
		),
		'use_as_background' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['use_as_background'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default '0'"
		),
		'bgposition' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_style']['bgposition'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('left top', 'left center', 'left bottom', 'center top', 'center center', 'center bottom', 'right top', 'right center', 'right bottom'),
			'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'bgrepeat' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_style']['bgrepeat'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('repeat', 'repeat-x', 'repeat-y', 'no-repeat'),
			'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'bgCssID' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['bgCssID'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'bgcolor' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['bgcolor'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>6, 'multiple'=>false, 'size'=>1, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 wizard'),
			'wizard' => array
			(
				array('tl_module_coverpicture', 'colorPicker')
			),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'abgposition' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['abgposition'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>64),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
	)
);


/**
 * Class tl_module_coverpicture
 */
class tl_module_coverpicture extends Backend
{
	/**
	 * Return the color picker wizard
	 * @param DataContainer
	 * @return string
	 */
	public function colorPicker(DataContainer $dc)
	{
		return ' ' . $this->generateImage('pickcolor.gif', $GLOBALS['TL_LANG']['MSC']['colorpicker'], 'style="vertical-align:top;cursor:pointer" id="moo_'.$dc->field.'"') . '
  <script>
  new MooRainbow("moo_'.$dc->field.'", {
    id:"ctrl_' . $dc->field . '",
    startColor:((cl = $("ctrl_' . $dc->field . '").value.hexToRgb(true)) ? cl : [255, 0, 0]),
    imgPath:"plugins/colorpicker/images/",
    onComplete: function(color) {
      $("ctrl_' . $dc->field . '").value = color.hex.replace("#", "");
    }
  });
  </script>';
	}
}

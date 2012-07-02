<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
* Contao Open Source CMS
*
* Copyright (C) 2005-2012 Leo Feyer
*
* @package Faq
* @link http://www.contao.org
* @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
*/

/**
* CoverPicture
*
* @package CoverPicture
* @author Christian Barkowsky <http://www.christianbarkowsky.de>
* @copyright Christian Barkowsky 2009-2012
* @license    LGPL
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

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => true
	),

	// List
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

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array('resize_image', 'use_as_background'),
		'default'                     => '{title_legend},title;{config_legend},singleSRC,jumpTo,multiPages;{image_legend:hide},resize_image;{imagemap_legend:hide},imageMap;{background_legend:hide},use_as_background;{extended_config_legend:hide},no_inheritance,standard'
	),

	// Subpalettes
	'subpalettes' => array
	(
		'resize_image' => 'size',
		'use_as_background' => 'bgposition,bgrepeat,bgCssID,bgcolor',
	),

	// Fields
	'fields' => array
	(
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['title'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'search'                  => true,
			'eval'                    => array('mandatory'=>true, 'maxlength'=>128)
		),
		'singleSRC' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['singleSRC'],
			'exclude'                 => true,
			'inputType'               => 'fileTree',
			'eval'                    => array('fieldType'=>'radio', 'files'=>true, 'mandatory'=>true)
		),
		'jumpTo' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['jumpTo'],
			'exclude'                 => true,
			'inputType'               => 'pageTree',
			'eval'                    => array('fieldType'=>'radio', 'helpwizard'=>true),
			'explanation'             => 'jumpTo'
		),
		
		/**/
		'multiPages' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['jumpTo'],
			'exclude'                 => true,
			'inputType'               => 'pageTree',
			'eval'                    => array('fieldType'=>'checkbox', 'files'=>false, 'mandatory'=>true)
		),
		/**/
		
		'resize_image' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['resize_image'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'size' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['size'],
			'exclude'                 => true,
			'inputType'               => 'imageSize',
			'options'                 => version_compare(VERSION, '2.11', '>=') ? $GLOBALS['TL_CROP'] : array('proportional', 'crop', 'box'),
			'reference'               => &$GLOBALS['TL_LANG']['MSC'],
			'eval'                    => array('rgxp'=>'digit', 'nospace'=>true, 'helpwizard'=>true, 'tl_class'=>'w50')
		),
		'no_inheritance' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['no_inheritance'],
			'exclude'                 => true,
			'inputType'               => 'checkbox'
		),
		'standard' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['standard'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'					  => array('unique' => true)
		),
		'imageMap' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['imageMap'],
			'exclude'                 => true,
			'inputType'               => 'textarea',
			'eval'                    => array('allowHtml'=>true,'decodeEntities'=>true,'tl_class'=>'clr'),
		),
		'use_as_background' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['use_as_background'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'bgposition' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_style']['bgposition'],
			'inputType'               => 'select',
			'options'                 => array('left top', 'left center', 'left bottom', 'center top', 'center center', 'center bottom', 'right top', 'right center', 'right bottom'),
			'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50')
		),
		'bgrepeat' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_style']['bgrepeat'],
			'inputType'               => 'select',
			'options'                 => array('repeat', 'repeat-x', 'repeat-y', 'no-repeat'),
			'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50')
		),
		'bgCssID' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['bgCssID'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50')
		),
		'bgcolor' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['bgcolor'],
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>6, 'multiple'=>false, 'size'=>1, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 wizard'),
			'wizard' => array
			(
				array('tl_module_coverpicture', 'colorPicker')
			)
		)
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

?>
<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Christian Barkowsky 2009-2011
 * @author     Christian Barkowsky <http://www.97media.de>
 * @package    CoverPicture
 * @license    LGPL
 */


/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_module_coverpicture']['title'] = array('Title', 'Please enter a title.');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['singleSRC'] = array('Cover picture', 'Please select a picture from the files directory.');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['jumpTo'] = array('Page', 'Please select the content page from the page tree.');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['resize_image'] = array('Image Resizing', 'Do you want to resize the image size?');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['size'] = array('Image width and height', 'Enter either width or height to resize the image, or both values to crop it.');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['no_inheritance'] = array('Not inherit', 'Please select if this picture should not be inherited.');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['standard'] = array('Standard picture', 'Please select if this picture used as default.');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['imageMap'] = array('Image map area tags', 'To add an image map to your cover picture, just enter all area tags for the image map here.');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['use_as_background'] = array('Use as background image', 'Would you like to use the picture in background?');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['bgCssID'] = array('Container Name', 'Would you like to use the picture in background?');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['bgcolor'] = array('Background color', 'Here you can enter a hexadecimal background color (e.g. ff0000 for red).');


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_module_coverpicture']['new'] = array('New cover picture', 'Add a new cover picture');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['edit'] = array('Edit cover picture', 'Edit cover picture ID %s');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['copy'] = array('Copy cover picture', 'Copy cover picture ID %s');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['delete'] = array('Delete cover picture', 'Delete cover picture ID %s');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['show'] = array('Cover picture details', 'Show details of cover picture ID %s');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_module_coverpicture']['title_legend'] = 'Titel';
$GLOBALS['TL_LANG']['tl_module_coverpicture']['config_legend'] = 'Picture and site';
$GLOBALS['TL_LANG']['tl_module_coverpicture']['image_legend'] = 'Image settings';
$GLOBALS['TL_LANG']['tl_module_coverpicture']['imagemap_legend'] = 'Image-Map settings';
$GLOBALS['TL_LANG']['tl_module_coverpicture']['background_legend'] = 'Background settings';
$GLOBALS['TL_LANG']['tl_module_coverpicture']['extended_config_legend'] = 'Extended konfiguration';

?>
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
$GLOBALS['TL_LANG']['tl_module_coverpicture']['title'] = array('Titel', 'Bitte geben Sie deinen Titel ein.');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['singleSRC'] = array('Titelbild', 'Bitte w&auml;hlen Sie ein Bild aus.');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['jumpTo'] = array('Seite', 'Bitte w&auml;hlen Sie die Inhaltsseite aus.');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['resize_image'] = array('Bildgröße anpassen', 'Soll die Bildgröße angepasst werden?');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['size'] = array('Bildbreite und Bildhöhe', 'Geben Sie entweder Breite oder Höhe ein, um das Bild zu skalieren, oder beide Werte, um es zu beschneiden.');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['no_inheritance'] = array('Bild nicht vererben', 'Nur markieren, wenn dieses Bild nicht vererbt werden soll.');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['standard'] = array('Standardbild', 'Nur markieren, wenn dieses Bild als Standardbild genutzt werden soll.');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['imageMap'] = array('Image Map Area Tags', 'Durch eingabe der "area" Tags einer Image Map, kann diese auf das Titelbild angewendet werden.');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['use_as_background'] = array('Als Hintergrundbild verwenden', 'Soll das Bild als Hintergrundgrafik verwendet werden?');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['bgCssID'] = array('Container Name', 'In welchem Container soll das Hintergrundbild angezeigt werden? Standard: body. Bsp. #main');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['bgcolor'] = array('Hintergrund', 'Hier können Sie eine hexadezimale Hintergrundfarbe (z.B. ff0000 für rot) eingeben.');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['abgposition'] = array('Alternativ-Hintergrundposition', 'Hier können Sie eine Alternativ-Hintergrundposition eingeben (z.B. centern 50px).');


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_module_coverpicture']['new'] = array('Neues Titelbild', 'Add a new cover picture');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['edit'] = array('Titelbild bearbeiten', 'Edit cover picture ID %s');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['copy'] = array('Titelbild kopieren', 'Copy cover picture ID %s');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['delete'] = array('Titelbild löschen', 'Delete cover picture ID %s');
$GLOBALS['TL_LANG']['tl_module_coverpicture']['show'] = array('Titelbild-Details', 'Show details of cover picture ID %s');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_module_coverpicture']['title_legend'] = 'Titel';
$GLOBALS['TL_LANG']['tl_module_coverpicture']['config_legend'] = 'Bild und Seite';
$GLOBALS['TL_LANG']['tl_module_coverpicture']['image_legend'] = 'Bild Einstellungen';
$GLOBALS['TL_LANG']['tl_module_coverpicture']['imagemap_legend'] = 'Image-Map Einstellungen';
$GLOBALS['TL_LANG']['tl_module_coverpicture']['background_legend'] = 'Hintergrund Einstellungen';
$GLOBALS['TL_LANG']['tl_module_coverpicture']['extended_config_legend'] = 'Erweiterte Konfiguration';

?>
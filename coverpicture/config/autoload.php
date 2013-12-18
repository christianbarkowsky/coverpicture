<?php

/**
 * CoverPicture
 * 
 * Copyright (C) 2009-2013 Christian Barkowsky
 * 
 * @package CoverPicture
 * @author  Christian Barkowsky <http://www.christianbarkowsky.de>
 * @license LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'Contao\ModuleCoverPicture' => 'system/modules/coverpicture/modules/ModuleCoverPicture.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_coverpicture' => 'system/modules/coverpicture/templates',
));

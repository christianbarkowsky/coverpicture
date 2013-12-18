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
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Models
	'Contao\CoverpictureModel' => 'system/modules/coverpicture/models/CoverpictureModel.php',

	// Modules
	'Contao\ModuleCoverPicture' => 'system/modules/coverpicture/modules/ModuleCoverPicture.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_coverpicture' => 'system/modules/coverpicture/templates',
));

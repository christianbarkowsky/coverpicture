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
	// Classes
	'Contao\CoverpictureUpdateHandler' => 'system/modules/coverpicture/classes/CoverpictureUpdateHandler.php',
	
	// Models
	'Contao\ModuleCoverpictureModel' => 'system/modules/coverpicture/models/ModuleCoverpictureModel.php',

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

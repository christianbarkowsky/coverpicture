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


array_insert($GLOBALS['BE_MOD']['content'], 6, array
(
	'coverpicture' => array
	(
		'tables'     => array('tl_module_coverpicture'),
		'icon'       => 'system/modules/coverpicture/assets/icon.png'
	)
));


array_insert($GLOBALS['FE_MOD'], 5, array
(
	'coverpicture' => array
	(
		'coverpicture' => 'ModuleCoverPicture'
	)
));

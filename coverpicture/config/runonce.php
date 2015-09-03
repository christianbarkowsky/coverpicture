<?php

/**
 * CoverPicture
 * 
 * Copyright (C) 2009-2015 Christian Barkowsky
 * 
 * @package CoverPicture
 * @author  Christian Barkowsky <http://christianbarkowsky.de>
 * @license LGPL
 */


class CoverpictureUpgrade extends Controller
{

    /**
     * Initialize the object
     */
    public function __construct()
    {
        parent::__construct();
        $this->import('Database');
    }


    /**
     * Run the controller
     */
    public static function run()
    {
        $objDatabase = \Database::getInstance();

        $strTable = 'tl_module_coverpicture';
        $arrNames = array('singleSRC');

        if (version_compare(VERSION, '3.2', '>=') && $objDatabase->tableExists($strTable)) {
            foreach ($objDatabase->listFields($strTable) as $arrField) {
                foreach($arrNames as $strName) {
                    if ($arrField['name'] == $strName && $arrField['type'] != 'binary') {
                        \Database\Updater::convertSingleField($strTable, $strName);
                    }
                }
            }
        }

        return;
    }
}


$objCoverpictureUpgrade = new CoverpictureUpgrade();
$objCoverpictureUpgrade->run();

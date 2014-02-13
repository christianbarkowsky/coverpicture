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
 

namespace Contao;


class CoverpictureUpdateHandler
{
    public static function run()
    {
        $objDatabase = \Database::getInstance();

        $strTable = 'tl_module_coverpicture';
        $arrNames = array('singleSRC');

        if (version_compare(VERSION, '3.2', '>=') && $objDatabase->tableExists($strTable))
        {
            foreach ($objDatabase->listFields($strTable) as $arrField)
            {
                foreach($arrNames as $strName)
                {
                    if ($arrField['name'] == $strName && $arrField['type'] != 'binary')
                    {
                        \Database\Updater::convertSingleField($strTable, $strName);
                    }
                }
            }
        }

        return;
    }
}

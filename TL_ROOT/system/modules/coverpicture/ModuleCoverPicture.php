<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

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
 * @author     Christian Barkowsky <http://www.christianbarkowsky.de>
 * @package    CoverPicture
 * @license    LGPL
 */


class ModuleCoverPicture extends Module
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'mod_coverpicture';

    /**
     * Display a wildcard in the back end
     * @return string
     */
    public function generate ()
    {
        if ( TL_MODE == 'BE' )
        {
            $objTemplate = new BackendTemplate ('be_wildcard');

            $objTemplate->wildcard = '### COVER PICTURE ###';
            $objTemplate->title = $this->headline;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->href = 'typolight/main.php?do=modules&amp;act=edit&amp;id=' . $this->id;

            return $objTemplate->parse ();
        }

        return parent::generate();
    }

    /**
     * Generate module
     */
    protected function compile ()
    {
        global $objPage;

        $this->Template->imagepath = '';

        $query = "SELECT singleSRC, jumpTo, resize_image, size, no_inheritance, imageMap, use_as_background, bgposition, bgrepeat, bgCssID FROM tl_module_coverpicture WHERE jumpTo=?";
        $query_tl_page = "SELECT id, pid, type FROM tl_page WHERE id=?";

        $objCoverPicture = $this->Database->prepare ($query)->execute ($objPage->id)->fetchAssoc ();

        if ( $objCoverPicture['singleSRC'] == '' )
        {
            //get parent page
            $objParentPage = $this->Database->prepare ($query_tl_page)->execute ($objPage->id)->fetchAssoc ();

            while ((($objCoverPicture['singleSRC'] == '') || ($objCoverPicture['no_inheritance'] == 1)) && ($objParentPage['type'] != 'root') )
            {
                $objCoverPicture = $this->Database->prepare ($query)->execute ($objParentPage['pid'])->fetchAssoc ();
                // next parent ...
                if ( $objParentPage['pid'] )
                {
                    $objParentPage = $this->Database->prepare ($query_tl_page)->execute ($objParentPage['pid'])->fetchAssoc ();
                }
            }
        }

        // no Picture found -> default
        if ( !$objCoverPicture )
        {
            $objCoverPicture = $this->GetStandardCoverPicture ();
        }

        // Templatevars
        $this->Template->imagepath = $objCoverPicture['singleSRC'];

        /**
         * Use as background image
         */
        if ( $objCoverPicture['use_as_background'] == false )
        {
            $this->Template->imagepath = $objCoverPicture['singleSRC'];

            /**
             * Resize image
             */
            if ( $objCoverPicture['resize_image'] )
            {
                $size = deserialize ($objCoverPicture['size']);
                $this->Template->imagepath = $this->getImage ($this->urlEncode ($objCoverPicture['singleSRC']), $size[0], $size[1], $size[2]);
            }

            /**
             * Image map (thanks to Felix Pfeiffer)
             */
            if ( $objCoverPicture['imageMap'] != "" )
            {
                $imgMapID = uniqid ('imap_');

                $this->Template->imgMapID = $imgMapID;

                $text = '<map name="%s" id="%s">%s</map>';

                $this->Template->imgMap = sprintf ($text, $imgMapID, $imgMapID, $objCoverPicture['imageMap']);
            }

            $this->Template->pagetitle = $objPage->pageTitle;
        }
        else
        {
            $this->Template->use_as_background = true;
            $this->generateBackgroundImage ($objCoverPicture);
        }
    }

    /**
     * get the standard piture
     */
    protected function GetStandardCoverPicture ()
    {
        return $this->Database->execute ("SELECT singleSRC, jumpTo, resize_image, size, no_inheritance, imageMap, use_as_background, bgposition, bgrepeat, bgCssID FROM tl_module_coverpicture WHERE standard=1")->fetchAssoc ();
    }

    /**
     * Generate background image
     */
    protected function generateBackgroundImage ($objCoverPicture)
    {
        if ( $objCoverPicture['bgCssID'] == '' )
        {
            $sector = 'body';
        }
        else
        {
            $sector = html_entity_decode ($objCoverPicture['bgCssID']);
        }

        $GLOBALS['TL_HEAD'][] = '<style type="text/css" media="screen"><!--/*--><![CDATA[/*><!--*/ ' . $sector . ' { background: url("' . $objCoverPicture['singleSRC'] . '") ' . $objCoverPicture['bgposition'] . ' ' . $objCoverPicture['bgrepeat'] . '} /*]]>*/--></style>';
    }

}

?>
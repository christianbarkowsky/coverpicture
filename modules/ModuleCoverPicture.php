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
 * Run in a custom namespace, so the class can be replaced
 */
namespace Contao;


class ModuleCoverPicture extends Module
{
    /**
     * Template
     */
    protected $strTemplate = 'mod_coverpicture';


    /**
     * Display a wildcard in the back end
     */
    public function generate ()
    {
        if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### COVER PICTURE ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
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

        $query = "SELECT singleSRC, jumpTo, resize_image, size, no_inheritance, imageMap, use_as_background, bgposition, abgposition, bgrepeat, bgCssID, bgcolor FROM tl_module_coverpicture WHERE jumpTo=?";
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
        return $this->Database->execute ("SELECT singleSRC, jumpTo, resize_image, size, no_inheritance, imageMap, use_as_background, bgposition, abgposition, bgrepeat, bgCssID, bgcolor FROM tl_module_coverpicture WHERE standard=1")->fetchAssoc ();
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
        
        $backgroundPosition = ($objCoverPicture['abgposition'] != '') ? $objCoverPicture['abgposition'] : $objCoverPicture['bgposition'];

        $GLOBALS['TL_HEAD'][] = '<style type="text/css" media="screen"><!--/*--><![CDATA[/*><!--*/ ' . $sector . ' { background: '.($objCoverPicture['bgcolor'] ? '#' .  $objCoverPicture['bgcolor'] : '').' url("' . $objCoverPicture['singleSRC'] . '") ' . $backgroundPosition . ' ' . $objCoverPicture['bgrepeat'] . '} /*]]>*/--></style>';
    }
}

?>
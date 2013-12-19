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


class ModuleCoverPicture extends \Module
{
    /**
     * Template
     */
    protected $strTemplate = 'mod_coverpicture';


    /**
     * Display a wildcard in the back end
     */
    public function generate()
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
    protected function compile()
    {
        global $objPage;
        
        $this->Template->imagepath = '';

        $objCoverPicture = \ModuleCoverpictureModel::findOneBy('jumpTo', $objPage->id);

        if($objCoverPicture->singleSRC == '')
        {
            //get parent page
            $objParentPage = \PageModel::findOneBy('id', $objPage->id);
           
            while((($objCoverPicture->singleSRC == '') || ($objCoverPicture->no_inheritance == 1)) && ($objParentPage->type != 'root'))
            {
				$objCoverPicture = \ModuleCoverpictureModel::findOneBy('jumpTo', $objParentPage->id);
				
                // next parent ...
                if($objParentPage->pid)
                {
                    $objParentPage = \PageModel::findOneBy('id', $objParentPage->pid);
                    $objCoverPicture = \ModuleCoverpictureModel::findOneBy('jumpTo', $objParentPage->id);
                }
            }
        }

        // no Picture found -> default
        if(!$objCoverPicture)
        {
            $objCoverPicture = \ModuleCoverpictureModel::findByStandard(1);
        }

        $objFile = $this->getCoverpictureImageObjFile($objCoverPicture->singleSRC);

		if($objFile === null || !is_file(TL_ROOT . '/' . $objFile->path))
		{
			$this->Template->imagepath = '';
		}
		
        // Use as background image
        if($objCoverPicture->use_as_background == false)
        {
            $this->Template->imagepath = $objFile->path;

            // Resize image
            if ($objCoverPicture->resize_image)
            {
                $size = deserialize($objCoverPicture->size);
                $this->Template->imagepath = $this->getImage ($this->urlEncode($objFile->path), $size[0], $size[1], $size[2]);
            }

            // Image map (thanks to Felix Pfeiffer)
            if($objCoverPicture->imageMap != "" )
            {
                $imgMapID = uniqid ('imap_');

                $this->Template->imgMapID = $imgMapID;

                $text = '<map name="%s" id="%s">%s</map>';

                $this->Template->imgMap = sprintf ($text, $imgMapID, $imgMapID, $objCoverPicture->imageMap);
            }

            $this->Template->pagetitle = $objPage->pageTitle;
        }
        else
        {
            $this->Template->use_as_background = true;
            $this->generateBackgroundImage($objCoverPicture);
        }
    }
    

    /**
     * Generate background image
     */
    protected function generateBackgroundImage($objCoverPicture)
    {
    	$objFile = $this->getCoverpictureImageObjFile($objCoverPicture->singleSRC);

		if ($objFile == null || is_file(TL_ROOT . '/' . $objFile->path))
		{
			if ( $objCoverPicture->bgCssID == '' )
			{
            	$sector = 'body';
			}
			else
			{
            	$sector = html_entity_decode ($objCoverPicture->bgCssID);
			}
        
			$backgroundPosition = ($objCoverPicture->abgposition != '') ? $objCoverPicture->abgposition : $objCoverPicture->bgposition;

			$GLOBALS['TL_HEAD'][] = '<style type="text/css" media="screen"><!--/*--><![CDATA[/*><!--*/ ' . $sector . ' { background: '.($objCoverPicture->bgcolor ? '#' .  $objCoverPicture->bgcolor : '').' url("' . $objFile->path . '") ' . $backgroundPosition . ' ' . $objCoverPicture->bgrepeat . '} /*]]>*/--></style>';
		}
    }
    
    
    /**
     * Get image object by version
     */
    private function getCoverpictureImageObjFile($strSingleSRC)
    {
	    if(version_compare(VERSION, '3.2', '<'))
		{
			return \FilesModel::findByPk($strSingleSRC);
		}
		
		return \FilesModel::findByUuid($strSingleSRC);
    }
    
    
	/**
	* Check for memberlist extension
	*/
	private function checkForEasyBGStretcher()
	{
		foreach($this->Config->getActiveModules() as $moduleKey => $moduleName)
		{
			if($moduleName == 'easy_bg_stretcher')
				return true;
		}
	
		return false;
	}
}

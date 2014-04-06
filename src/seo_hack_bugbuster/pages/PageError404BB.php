<?php

/**
 * Contao Open Source CMS, Copyright (C) 2005-2014 Leo Feyer
 *
 * SEO Hack for PageError404
 *
 *
 * @copyright  Glen Langer 2014 <http://www.contao.glen-langer.de>
 * @author     Glen Langer (BugBuster)
 * @package    Seo_hack_bugbuster
 * @license    LGPL
 * @filesource
 * @see	       https://github.com/BugBuster1701/seo_hack_bugbuster
 */

/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace BugBuster;


/**
 * Class PageError404BB
 *
 */
class PageError404BB extends \PageError404
{

	/**
	 * Generate an error 404 page
	 * @param integer
	 * @param string
	 * @param string
	 */
	public function generate($pageId, $strDomain=null, $strHost=null)
	{
	    // ANTI-SEO-HACK
	    if ($GLOBALS['TL_CONFIG']['rewriteURL'] && strncmp(\Environment::get('request'), 'index.php/', 10) === 0)
	    {
	        $newRequest = str_replace('index.php/', '', \Environment::get('request'));
	        $this->log('New page for page ID "' . $pageId . '", host "' . \Environment::get('host') . '" and languages "' . implode(', ', \Environment::get('httpAcceptLanguage')) . '" (' . \Environment::get('base') . $newRequest . ')', 'PageError404 ANTI-SEO-Hack', TL_CONFIGURATION);
	        $this->redirect(\Environment::get('base') . $newRequest, 301);
	        exit();
	    }
	    // ANTI-SEO-HACK for index.php?page=2 (GitHub #1)
	    if ($GLOBALS['TL_CONFIG']['rewriteURL'] && strncmp(\Environment::get('request'), 'index.php', 9) === 0)
	    {
	        $newRequest = str_replace('index.php', '', \Environment::get('request'));
	        $this->log('New page for page ID "' . $pageId . '", host "' . \Environment::get('host') . '" and languages "' . implode(', ', \Environment::get('httpAcceptLanguage')) . '" (' . \Environment::get('base') . $newRequest . ')', 'PageError404 ANTI-SEO-Hack', TL_CONFIGURATION);
	        $this->redirect(\Environment::get('base') . $newRequest, 301);
	        exit();
	    }
	    parent::generate($pageId, $strDomain, $strHost);
	}


}

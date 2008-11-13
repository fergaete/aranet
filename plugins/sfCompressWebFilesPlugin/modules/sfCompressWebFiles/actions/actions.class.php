<?php

/**
 * mytask actions.
 *
 * @package    ad
 * @subpackage mytask
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class mytaskActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
  	$args    = array();
  	//$args[0] = '';
  	$args[0] = 'css';
  	//$args[0] = 'js';
  	
    $web_dir = sfConfig::get('sf_web_dir');
		$css_dir = $web_dir.DIRECTORY_SEPARATOR.'css';
		$js_dir  = $web_dir.DIRECTORY_SEPARATOR.'js';
		
		$cwf = new CompressWebFiles();
		
		if (empty($args[0]))
		{
			$cwf->compressCssFiles($css_dir);
			$cwf->compressJsFiles($js_dir);
		}
		elseif ($args[0] == 'css')
		{
			$cwf->compressCssFiles($css_dir);
		}
		elseif ($args[0] == 'js')
		{
			$cwf->compressJsFiles($js_dir);
		}
		
		$this->setVar('cwf', $cwf);
  }
}

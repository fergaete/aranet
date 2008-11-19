<?php

/**
 * sfNifty Class Helpers 
 *
 * This file is part of the sfNifty package.
 * (c) 2006-2007 Alban Creton <acreton@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * 
 * File containing nifty helper functions
 * 
 * @category    Plugins
 * @package     sfNifty
 * @author      Alban Creton <acreton@gmail.com>
 * @license     See LICENSE that came packaged with this software
 * @version     1.1.0
 */


/**
 * Get Js string to round an element's corners.
 *
 * @param   string  id of the html element
 * @param   string  rounding options
 *
 * @return  string  Js string to round the elements corner
 */  
function nifty_round_elements($elements, $options = "")
{
  $response = sfContext::getInstance()->getResponse();
  $response->addJavascript(sfConfig::get('sf_prototype_web_dir').'/js/prototype');
  $response->addJavascript('/sfNiftyPlugin/js/niftycube');
  $response->addStylesheet('/sfNiftyPlugin/css/niftyCorners');
  
  if(sfNifty::addId($elements))
  {
    return "Event.observe(window, 'load', function(){Rounded('" . $elements . "','" . $options . "');}, false);";
  }
  else 
  {
    return "";
  }
}


// Compatibility
function nifty_round_div($elements, $options = "")
{
  return nifty_round_elements( $elements, $options );
}

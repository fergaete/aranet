<?php

/**
 * tag actions.
 *
 * @package    aranet
 * @subpackage tag
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class tagActions extends sfActions
{

  /**
   * executes autocomplete action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeAutocomplete()
  {
    sfConfig::set('sf_web_debug', false);
    if ($this->hasRequestParameter('filters[tag_name]')) {
      $tag_name = $this->hasRequestParameter('filters[tag_name]');
    } else {
      $tag_name = $request->getParameter('tags');
    }
    $this->tags = TagPeer::getTagsLike($tag_name);
    return sfView::SUCCESS;
  }
}

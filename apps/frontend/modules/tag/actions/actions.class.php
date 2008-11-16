<?php

/**
 * tag actions.
 *
 * @package    ARANet
 * @subpackage tag
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */
class tagActions extends sfActions
{
    public function executeAutocomplete($request)
    {
        sfConfig::set('sf_web_debug', false);
        $this->setLayout(false);
        $tag_name = $request->getParameter('query');
        $this->tags = TagPeer::getTagsLike($tag_name);
        return sfView::SUCCESS;
    }
}

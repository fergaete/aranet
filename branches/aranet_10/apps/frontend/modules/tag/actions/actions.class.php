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
    public function executeAutocomplete()
    {
        sfConfig::set('sf_web_debug', false);
        $tag_name = $this->getRequestParameter('filters[tag_name]');
        if (!$tag_name) {
            $tag_name = $this->getRequestParameter('tags');
        }
        $this->tags = TagPeer::getTagsLike($tag_name);
    }
}

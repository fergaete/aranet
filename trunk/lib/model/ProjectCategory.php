<?php

/**
 * Subclass for representing a row from the 'aranet_project_category' table.
 *
 * @package    ARANet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */

class ProjectCategory extends BaseProjectCategory
{
  
    public function __construct()
	  {
			  parent::__construct();
	  }

    public function __toString()
    {
      return $this->getCategoryTitle();
    }
}

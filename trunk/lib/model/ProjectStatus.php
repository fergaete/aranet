<?php

/**
 * Subclass for representing a row from the 'aranet_project_status' table.
 *
 * @package    ARANet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */

class ProjectStatus extends BaseProjectStatus
{
  
    public function __construct()
	  {
			  parent::__construct();
	  }

    public function __toString() {
        return $this->getProjectStatusTitle();
    }

}

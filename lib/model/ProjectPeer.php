<?php

/**
 * Subclass for performing query and update operations on the 'aranet_project' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: ProjectPeer.php 3 2008-08-06 07:48:19Z pablo $
 */

class ProjectPeer extends BaseProjectPeer
{

    public static function getProjectsLike($name, $max = 10)
    {
        $c = new Criteria();
        $criterion = $c->getNewCriterion(ProjectPeer::PROJECT_NUMBER, "%${name}%", Criteria::LIKE);
        $criterion->addOr($c->getNewCriterion(ProjectPeer::PROJECT_NAME, "%${name}%", Criteria::LIKE));
        $c->add($criterion);
        $c->setLimit($max);
        $projects = ProjectPeer::doSelect($c);
        return $projects;
    }
}

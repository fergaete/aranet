<?php

/**
 * Subclass for representing a row from the 'aranet_project' table.
 *
 * @package    ARANet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */

class Project extends BaseProject
{

    public function __construct()
    {
        parent::__construct();
    }

    public function __toString() {
        $name = ($this->getProjectPrefix()) ? $this->getProjectPrefix() : '';
        $name .= ($this->getProjectNumber()) ? $this->getProjectNumber() . ' - ': '';
        return $name . $this->getProjectName();
    }

    public function getFullNumber() {
        $number = ($this->getProjectPrefix()) ? $this->getProjectPrefix() : '';
        $number .= ($this->getProjectNumber()) ? $this->getProjectNumber(): '';
        return $number;
    }

    public function getFullStatus() {
        switch ($this->getProjectStatusId()) {
            case 3:
                $content = $this->getProjectStatus() . ": " . format_date($this->getProjectFinishDate());
                break;
            default:
                $content = $this->getProjectStatus();
        }
        return $content;
    }

    public function getBudgetsOrderedByDate($criteria = null)
    {
        if ($criteria === null) {
            $criteria = new Criteria();
        }
        elseif ($criteria instanceof Criteria)
        {
            $criteria = clone $criteria;
        }
        $criteria->addAscendingOrderByColumn(BudgetPeer::BUDGET_DATE);
        return parent::getBudgets($criteria);
    }

    public function getLastBudgetsOrderedByDate($criteria = null)
    {
        if ($criteria === null) {
            $criteria = new Criteria();
        }
        elseif ($criteria instanceof Criteria)
        {
            $criteria = clone $criteria;
        }
        $criteria->add(BudgetPeer::BUDGET_IS_LAST, true);
        return $this->getBudgetsOrderedByDate($criteria);
    }

    public function getProjectMilestones()
    {
        $c = new Criteria();
        $c->addJoin(ProjectPeer::ID, MilestonePeer::MILESTONE_PROJECT_ID);
        $c->add(MilestonePeer::MILESTONE_PROJECT_ID, $this->getId());
        $milestones = MilestonePeer::doSelect($c);
        return $milestones;
    }

    public function getMilestonesAndTasks()
    {
        $c = new Criteria();
        $c->add(MilestonePeer::MILESTONE_PROJECT_ID, $this->getId());
        $c->addAscendingOrderByColumn(MilestonePeer::MILESTONE_TITLE);
        $milestones = MilestonePeer::doSelect($c);
        $tasks = $this->getTasks();
        $mandt = array();
        foreach ($milestones as $milestone) {
            array_push($mandt, $milestone);
            foreach ($tasks as $task) {
                if ($task->getTaskMilestoneId() == $milestone->getId()) {
                    array_push($mandt, $task);
                }
            }
        }
        return $mandt;
    }
}

sfPropelBehavior::add('Project', array('arPropelContactableBehavior', 'sfPropelActAsTaggableBehavior', 'paranoid' => array('column' => 'deleted_at')));

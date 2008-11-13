<?php

/**
 * Subclass for representing a row from the 'aranet_project' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: Project.php 3 2008-08-06 07:48:19Z pablo $
 */

class Project extends BaseProject
{

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

    public function postSave($v) {
        if ($v->collObjectContacts) {
            foreach($v->collObjectContacts as $ocontact) {
                $ocontact->setObjectcontactObjectId($v->getId());
                $ocontact->save();
            }
            if ($v->getProjectClientId()) {
                $client = $v->getClient();
                foreach($v->collContacts as $contact) {
                    // Save to client
                    $client->addContact($contact, false, false);
                    //$contact->saveTo('Client', $v->getProjectClientId(), $contact->getContactRol()); // Duplica info
                }
                $client->save();
            }
        }
    }

    public function getMilestones()
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
sfMixer::register('BaseProject:delete:post', array('Project', 'postDelete'));
sfMixer::register('BaseProject:save:post', array('Project', 'postSave'));

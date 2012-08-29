<?php


abstract class BaseTask extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $task_title;


	
	protected $task_description;


	
	protected $task_start_date;


	
	protected $task_finish_date;


	
	protected $task_total_duration = 0;


	
	protected $task_priority_id;


	
	protected $task_project_id;


	
	protected $task_milestone_id = 0;


	
	protected $task_budget_id = 0;


	
	protected $task_estimated_hours = 0;


	
	protected $task_total_hours = 0;


	
	protected $task_total_hour_costs = 0;


	
	protected $created_at;


	
	protected $created_by = 0;


	
	protected $updated_at;


	
	protected $updated_by = 0;


	
	protected $deleted_at;


	
	protected $deleted_by = 0;

	
	protected $asfGuardUserRelatedByCreatedBy;

	
	protected $asfGuardUserRelatedByUpdatedBy;

	
	protected $asfGuardUserRelatedByDeletedBy;

	
	protected $aBudget;

	
	protected $aTaskPriority;

	
	protected $aMilestone;

	
	protected $aProject;

	
	protected $collTimesheets;

	
	protected $lastTimesheetCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getTaskTitle()
	{

		return $this->task_title;
	}

	
	public function getTaskDescription()
	{

		return $this->task_description;
	}

	
	public function getTaskStartDate($format = 'Y-m-d')
	{

		if ($this->task_start_date === null || $this->task_start_date === '') {
			return null;
		} elseif (!is_int($this->task_start_date)) {
						$ts = strtotime($this->task_start_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [task_start_date] as date/time value: " . var_export($this->task_start_date, true));
			}
		} else {
			$ts = $this->task_start_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getTaskFinishDate($format = 'Y-m-d')
	{

		if ($this->task_finish_date === null || $this->task_finish_date === '') {
			return null;
		} elseif (!is_int($this->task_finish_date)) {
						$ts = strtotime($this->task_finish_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [task_finish_date] as date/time value: " . var_export($this->task_finish_date, true));
			}
		} else {
			$ts = $this->task_finish_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getTaskTotalDuration()
	{

		return $this->task_total_duration;
	}

	
	public function getTaskPriorityId()
	{

		return $this->task_priority_id;
	}

	
	public function getTaskProjectId()
	{

		return $this->task_project_id;
	}

	
	public function getTaskMilestoneId()
	{

		return $this->task_milestone_id;
	}

	
	public function getTaskBudgetId()
	{

		return $this->task_budget_id;
	}

	
	public function getTaskEstimatedHours()
	{

		return $this->task_estimated_hours;
	}

	
	public function getTaskTotalHours()
	{

		return $this->task_total_hours;
	}

	
	public function getTaskTotalHourCosts()
	{

		return $this->task_total_hour_costs;
	}

	
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->created_at === null || $this->created_at === '') {
			return null;
		} elseif (!is_int($this->created_at)) {
						$ts = strtotime($this->created_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
			}
		} else {
			$ts = $this->created_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getCreatedBy()
	{

		return $this->created_by;
	}

	
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->updated_at === null || $this->updated_at === '') {
			return null;
		} elseif (!is_int($this->updated_at)) {
						$ts = strtotime($this->updated_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [updated_at] as date/time value: " . var_export($this->updated_at, true));
			}
		} else {
			$ts = $this->updated_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getUpdatedBy()
	{

		return $this->updated_by;
	}

	
	public function getDeletedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->deleted_at === null || $this->deleted_at === '') {
			return null;
		} elseif (!is_int($this->deleted_at)) {
						$ts = strtotime($this->deleted_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [deleted_at] as date/time value: " . var_export($this->deleted_at, true));
			}
		} else {
			$ts = $this->deleted_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDeletedBy()
	{

		return $this->deleted_by;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TaskPeer::ID;
		}

	} 
	
	public function setTaskTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->task_title !== $v) {
			$this->task_title = $v;
			$this->modifiedColumns[] = TaskPeer::TASK_TITLE;
		}

	} 
	
	public function setTaskDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->task_description !== $v) {
			$this->task_description = $v;
			$this->modifiedColumns[] = TaskPeer::TASK_DESCRIPTION;
		}

	} 
	
	public function setTaskStartDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [task_start_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->task_start_date !== $ts) {
			$this->task_start_date = $ts;
			$this->modifiedColumns[] = TaskPeer::TASK_START_DATE;
		}

	} 
	
	public function setTaskFinishDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [task_finish_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->task_finish_date !== $ts) {
			$this->task_finish_date = $ts;
			$this->modifiedColumns[] = TaskPeer::TASK_FINISH_DATE;
		}

	} 
	
	public function setTaskTotalDuration($v)
	{

		if ($this->task_total_duration !== $v || $v === 0) {
			$this->task_total_duration = $v;
			$this->modifiedColumns[] = TaskPeer::TASK_TOTAL_DURATION;
		}

	} 
	
	public function setTaskPriorityId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->task_priority_id !== $v) {
			$this->task_priority_id = $v;
			$this->modifiedColumns[] = TaskPeer::TASK_PRIORITY_ID;
		}

		if ($this->aTaskPriority !== null && $this->aTaskPriority->getId() !== $v) {
			$this->aTaskPriority = null;
		}

	} 
	
	public function setTaskProjectId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->task_project_id !== $v) {
			$this->task_project_id = $v;
			$this->modifiedColumns[] = TaskPeer::TASK_PROJECT_ID;
		}

		if ($this->aProject !== null && $this->aProject->getId() !== $v) {
			$this->aProject = null;
		}

	} 
	
	public function setTaskMilestoneId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->task_milestone_id !== $v || $v === 0) {
			$this->task_milestone_id = $v;
			$this->modifiedColumns[] = TaskPeer::TASK_MILESTONE_ID;
		}

		if ($this->aMilestone !== null && $this->aMilestone->getId() !== $v) {
			$this->aMilestone = null;
		}

	} 
	
	public function setTaskBudgetId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->task_budget_id !== $v || $v === 0) {
			$this->task_budget_id = $v;
			$this->modifiedColumns[] = TaskPeer::TASK_BUDGET_ID;
		}

		if ($this->aBudget !== null && $this->aBudget->getId() !== $v) {
			$this->aBudget = null;
		}

	} 
	
	public function setTaskEstimatedHours($v)
	{

		if ($this->task_estimated_hours !== $v || $v === 0) {
			$this->task_estimated_hours = $v;
			$this->modifiedColumns[] = TaskPeer::TASK_ESTIMATED_HOURS;
		}

	} 
	
	public function setTaskTotalHours($v)
	{

		if ($this->task_total_hours !== $v || $v === 0) {
			$this->task_total_hours = $v;
			$this->modifiedColumns[] = TaskPeer::TASK_TOTAL_HOURS;
		}

	} 
	
	public function setTaskTotalHourCosts($v)
	{

		if ($this->task_total_hour_costs !== $v || $v === 0) {
			$this->task_total_hour_costs = $v;
			$this->modifiedColumns[] = TaskPeer::TASK_TOTAL_HOUR_COSTS;
		}

	} 
	
	public function setCreatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->created_at !== $ts) {
			$this->created_at = $ts;
			$this->modifiedColumns[] = TaskPeer::CREATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v || $v === 0) {
			$this->created_by = $v;
			$this->modifiedColumns[] = TaskPeer::CREATED_BY;
		}

		if ($this->asfGuardUserRelatedByCreatedBy !== null && $this->asfGuardUserRelatedByCreatedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByCreatedBy = null;
		}

	} 
	
	public function setUpdatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [updated_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->updated_at !== $ts) {
			$this->updated_at = $ts;
			$this->modifiedColumns[] = TaskPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v || $v === 0) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = TaskPeer::UPDATED_BY;
		}

		if ($this->asfGuardUserRelatedByUpdatedBy !== null && $this->asfGuardUserRelatedByUpdatedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByUpdatedBy = null;
		}

	} 
	
	public function setDeletedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [deleted_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->deleted_at !== $ts) {
			$this->deleted_at = $ts;
			$this->modifiedColumns[] = TaskPeer::DELETED_AT;
		}

	} 
	
	public function setDeletedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->deleted_by !== $v || $v === 0) {
			$this->deleted_by = $v;
			$this->modifiedColumns[] = TaskPeer::DELETED_BY;
		}

		if ($this->asfGuardUserRelatedByDeletedBy !== null && $this->asfGuardUserRelatedByDeletedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByDeletedBy = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->task_title = $rs->getString($startcol + 1);

			$this->task_description = $rs->getString($startcol + 2);

			$this->task_start_date = $rs->getDate($startcol + 3, null);

			$this->task_finish_date = $rs->getDate($startcol + 4, null);

			$this->task_total_duration = $rs->getFloat($startcol + 5);

			$this->task_priority_id = $rs->getInt($startcol + 6);

			$this->task_project_id = $rs->getInt($startcol + 7);

			$this->task_milestone_id = $rs->getInt($startcol + 8);

			$this->task_budget_id = $rs->getInt($startcol + 9);

			$this->task_estimated_hours = $rs->getFloat($startcol + 10);

			$this->task_total_hours = $rs->getFloat($startcol + 11);

			$this->task_total_hour_costs = $rs->getFloat($startcol + 12);

			$this->created_at = $rs->getTimestamp($startcol + 13, null);

			$this->created_by = $rs->getInt($startcol + 14);

			$this->updated_at = $rs->getTimestamp($startcol + 15, null);

			$this->updated_by = $rs->getInt($startcol + 16);

			$this->deleted_at = $rs->getTimestamp($startcol + 17, null);

			$this->deleted_by = $rs->getInt($startcol + 18);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 19; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Task object", $e);
		}
	}

	
	public function delete($con = null)
	{
                    if (!$this->isColumnModified('deleted_by'))
                    {
                        $user = sfContext::getInstance()->getUser();
                        if ($user instanceof sfGuardSecurityUser)
                        {
                            if ($user->getGuardUser() instanceof sfGuardUser)
                                $this->setDeletedBy($user->getGuardUser()->getId());
                            else
                                $this->setDeletedBy(null);
                        }
                    }
                

    foreach (sfMixer::getCallables('BaseTask:delete:pre') as $callable)
    {
      $ret = call_user_func($callable, $this, $con);
      if ($ret)
      {
        return;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TaskPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TaskPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseTask:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{
                    if ($this->isNew() && !$this->isColumnModified('created_by'))
                    {
                        $user = sfContext::getInstance()->getUser();
                        if ($user instanceof sfGuardSecurityUser)
                        {
                            if ($user->getGuardUser() instanceof sfGuardUser)
                                $this->setCreatedBy($user->getGuardUser()->getId());
                            else
                                $this->setCreatedBy(null);
                        }
                    }
                
                    if ($this->isModified() && !$this->isColumnModified('updated_by'))
                    {
                        $user = sfContext::getInstance()->getUser();
                        if ($user instanceof sfGuardSecurityUser)
                        {
                            if ($user->getGuardUser() instanceof sfGuardUser)
                                $this->setUpdatedBy($user->getGuardUser()->getId());
                            else
                                $this->setUpdatedBy(null);
                        }
                    }
                

    foreach (sfMixer::getCallables('BaseTask:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(TaskPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(TaskPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TaskPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseTask:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


												
			if ($this->asfGuardUserRelatedByCreatedBy !== null) {
				if ($this->asfGuardUserRelatedByCreatedBy->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByCreatedBy->save($con);
				}
				$this->setsfGuardUserRelatedByCreatedBy($this->asfGuardUserRelatedByCreatedBy);
			}

			if ($this->asfGuardUserRelatedByUpdatedBy !== null) {
				if ($this->asfGuardUserRelatedByUpdatedBy->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByUpdatedBy->save($con);
				}
				$this->setsfGuardUserRelatedByUpdatedBy($this->asfGuardUserRelatedByUpdatedBy);
			}

			if ($this->asfGuardUserRelatedByDeletedBy !== null) {
				if ($this->asfGuardUserRelatedByDeletedBy->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByDeletedBy->save($con);
				}
				$this->setsfGuardUserRelatedByDeletedBy($this->asfGuardUserRelatedByDeletedBy);
			}

			if ($this->aBudget !== null) {
				if ($this->aBudget->isModified()) {
					$affectedRows += $this->aBudget->save($con);
				}
				$this->setBudget($this->aBudget);
			}

			if ($this->aTaskPriority !== null) {
				if ($this->aTaskPriority->isModified()) {
					$affectedRows += $this->aTaskPriority->save($con);
				}
				$this->setTaskPriority($this->aTaskPriority);
			}

			if ($this->aMilestone !== null) {
				if ($this->aMilestone->isModified()) {
					$affectedRows += $this->aMilestone->save($con);
				}
				$this->setMilestone($this->aMilestone);
			}

			if ($this->aProject !== null) {
				if ($this->aProject->isModified()) {
					$affectedRows += $this->aProject->save($con);
				}
				$this->setProject($this->aProject);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = TaskPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TaskPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collTimesheets !== null) {
				foreach($this->collTimesheets as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->asfGuardUserRelatedByCreatedBy !== null) {
				if (!$this->asfGuardUserRelatedByCreatedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByCreatedBy->getValidationFailures());
				}
			}

			if ($this->asfGuardUserRelatedByUpdatedBy !== null) {
				if (!$this->asfGuardUserRelatedByUpdatedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByUpdatedBy->getValidationFailures());
				}
			}

			if ($this->asfGuardUserRelatedByDeletedBy !== null) {
				if (!$this->asfGuardUserRelatedByDeletedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByDeletedBy->getValidationFailures());
				}
			}

			if ($this->aBudget !== null) {
				if (!$this->aBudget->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aBudget->getValidationFailures());
				}
			}

			if ($this->aTaskPriority !== null) {
				if (!$this->aTaskPriority->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTaskPriority->getValidationFailures());
				}
			}

			if ($this->aMilestone !== null) {
				if (!$this->aMilestone->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aMilestone->getValidationFailures());
				}
			}

			if ($this->aProject !== null) {
				if (!$this->aProject->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProject->getValidationFailures());
				}
			}


			if (($retval = TaskPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collTimesheets !== null) {
					foreach($this->collTimesheets as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TaskPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getTaskTitle();
				break;
			case 2:
				return $this->getTaskDescription();
				break;
			case 3:
				return $this->getTaskStartDate();
				break;
			case 4:
				return $this->getTaskFinishDate();
				break;
			case 5:
				return $this->getTaskTotalDuration();
				break;
			case 6:
				return $this->getTaskPriorityId();
				break;
			case 7:
				return $this->getTaskProjectId();
				break;
			case 8:
				return $this->getTaskMilestoneId();
				break;
			case 9:
				return $this->getTaskBudgetId();
				break;
			case 10:
				return $this->getTaskEstimatedHours();
				break;
			case 11:
				return $this->getTaskTotalHours();
				break;
			case 12:
				return $this->getTaskTotalHourCosts();
				break;
			case 13:
				return $this->getCreatedAt();
				break;
			case 14:
				return $this->getCreatedBy();
				break;
			case 15:
				return $this->getUpdatedAt();
				break;
			case 16:
				return $this->getUpdatedBy();
				break;
			case 17:
				return $this->getDeletedAt();
				break;
			case 18:
				return $this->getDeletedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TaskPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTaskTitle(),
			$keys[2] => $this->getTaskDescription(),
			$keys[3] => $this->getTaskStartDate(),
			$keys[4] => $this->getTaskFinishDate(),
			$keys[5] => $this->getTaskTotalDuration(),
			$keys[6] => $this->getTaskPriorityId(),
			$keys[7] => $this->getTaskProjectId(),
			$keys[8] => $this->getTaskMilestoneId(),
			$keys[9] => $this->getTaskBudgetId(),
			$keys[10] => $this->getTaskEstimatedHours(),
			$keys[11] => $this->getTaskTotalHours(),
			$keys[12] => $this->getTaskTotalHourCosts(),
			$keys[13] => $this->getCreatedAt(),
			$keys[14] => $this->getCreatedBy(),
			$keys[15] => $this->getUpdatedAt(),
			$keys[16] => $this->getUpdatedBy(),
			$keys[17] => $this->getDeletedAt(),
			$keys[18] => $this->getDeletedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TaskPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setTaskTitle($value);
				break;
			case 2:
				$this->setTaskDescription($value);
				break;
			case 3:
				$this->setTaskStartDate($value);
				break;
			case 4:
				$this->setTaskFinishDate($value);
				break;
			case 5:
				$this->setTaskTotalDuration($value);
				break;
			case 6:
				$this->setTaskPriorityId($value);
				break;
			case 7:
				$this->setTaskProjectId($value);
				break;
			case 8:
				$this->setTaskMilestoneId($value);
				break;
			case 9:
				$this->setTaskBudgetId($value);
				break;
			case 10:
				$this->setTaskEstimatedHours($value);
				break;
			case 11:
				$this->setTaskTotalHours($value);
				break;
			case 12:
				$this->setTaskTotalHourCosts($value);
				break;
			case 13:
				$this->setCreatedAt($value);
				break;
			case 14:
				$this->setCreatedBy($value);
				break;
			case 15:
				$this->setUpdatedAt($value);
				break;
			case 16:
				$this->setUpdatedBy($value);
				break;
			case 17:
				$this->setDeletedAt($value);
				break;
			case 18:
				$this->setDeletedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TaskPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTaskTitle($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTaskDescription($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTaskStartDate($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTaskFinishDate($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTaskTotalDuration($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTaskPriorityId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTaskProjectId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTaskMilestoneId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTaskBudgetId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setTaskEstimatedHours($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTaskTotalHours($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setTaskTotalHourCosts($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCreatedAt($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCreatedBy($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setUpdatedAt($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setUpdatedBy($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setDeletedAt($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setDeletedBy($arr[$keys[18]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TaskPeer::DATABASE_NAME);

		if ($this->isColumnModified(TaskPeer::ID)) $criteria->add(TaskPeer::ID, $this->id);
		if ($this->isColumnModified(TaskPeer::TASK_TITLE)) $criteria->add(TaskPeer::TASK_TITLE, $this->task_title);
		if ($this->isColumnModified(TaskPeer::TASK_DESCRIPTION)) $criteria->add(TaskPeer::TASK_DESCRIPTION, $this->task_description);
		if ($this->isColumnModified(TaskPeer::TASK_START_DATE)) $criteria->add(TaskPeer::TASK_START_DATE, $this->task_start_date);
		if ($this->isColumnModified(TaskPeer::TASK_FINISH_DATE)) $criteria->add(TaskPeer::TASK_FINISH_DATE, $this->task_finish_date);
		if ($this->isColumnModified(TaskPeer::TASK_TOTAL_DURATION)) $criteria->add(TaskPeer::TASK_TOTAL_DURATION, $this->task_total_duration);
		if ($this->isColumnModified(TaskPeer::TASK_PRIORITY_ID)) $criteria->add(TaskPeer::TASK_PRIORITY_ID, $this->task_priority_id);
		if ($this->isColumnModified(TaskPeer::TASK_PROJECT_ID)) $criteria->add(TaskPeer::TASK_PROJECT_ID, $this->task_project_id);
		if ($this->isColumnModified(TaskPeer::TASK_MILESTONE_ID)) $criteria->add(TaskPeer::TASK_MILESTONE_ID, $this->task_milestone_id);
		if ($this->isColumnModified(TaskPeer::TASK_BUDGET_ID)) $criteria->add(TaskPeer::TASK_BUDGET_ID, $this->task_budget_id);
		if ($this->isColumnModified(TaskPeer::TASK_ESTIMATED_HOURS)) $criteria->add(TaskPeer::TASK_ESTIMATED_HOURS, $this->task_estimated_hours);
		if ($this->isColumnModified(TaskPeer::TASK_TOTAL_HOURS)) $criteria->add(TaskPeer::TASK_TOTAL_HOURS, $this->task_total_hours);
		if ($this->isColumnModified(TaskPeer::TASK_TOTAL_HOUR_COSTS)) $criteria->add(TaskPeer::TASK_TOTAL_HOUR_COSTS, $this->task_total_hour_costs);
		if ($this->isColumnModified(TaskPeer::CREATED_AT)) $criteria->add(TaskPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(TaskPeer::CREATED_BY)) $criteria->add(TaskPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(TaskPeer::UPDATED_AT)) $criteria->add(TaskPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(TaskPeer::UPDATED_BY)) $criteria->add(TaskPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(TaskPeer::DELETED_AT)) $criteria->add(TaskPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(TaskPeer::DELETED_BY)) $criteria->add(TaskPeer::DELETED_BY, $this->deleted_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TaskPeer::DATABASE_NAME);

		$criteria->add(TaskPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setTaskTitle($this->task_title);

		$copyObj->setTaskDescription($this->task_description);

		$copyObj->setTaskStartDate($this->task_start_date);

		$copyObj->setTaskFinishDate($this->task_finish_date);

		$copyObj->setTaskTotalDuration($this->task_total_duration);

		$copyObj->setTaskPriorityId($this->task_priority_id);

		$copyObj->setTaskProjectId($this->task_project_id);

		$copyObj->setTaskMilestoneId($this->task_milestone_id);

		$copyObj->setTaskBudgetId($this->task_budget_id);

		$copyObj->setTaskEstimatedHours($this->task_estimated_hours);

		$copyObj->setTaskTotalHours($this->task_total_hours);

		$copyObj->setTaskTotalHourCosts($this->task_total_hour_costs);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setDeletedAt($this->deleted_at);

		$copyObj->setDeletedBy($this->deleted_by);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getTimesheets() as $relObj) {
				$copyObj->addTimesheet($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new TaskPeer();
		}
		return self::$peer;
	}

	
	public function setsfGuardUserRelatedByCreatedBy($v)
	{


		if ($v === null) {
			$this->setCreatedBy('null');
		} else {
			$this->setCreatedBy($v->getId());
		}


		$this->asfGuardUserRelatedByCreatedBy = $v;
	}


	
	public function getsfGuardUserRelatedByCreatedBy($con = null)
	{
		if ($this->asfGuardUserRelatedByCreatedBy === null && ($this->created_by !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUserRelatedByCreatedBy = sfGuardUserPeer::retrieveByPK($this->created_by, $con);

			
		}
		return $this->asfGuardUserRelatedByCreatedBy;
	}

	
	public function setsfGuardUserRelatedByUpdatedBy($v)
	{


		if ($v === null) {
			$this->setUpdatedBy('null');
		} else {
			$this->setUpdatedBy($v->getId());
		}


		$this->asfGuardUserRelatedByUpdatedBy = $v;
	}


	
	public function getsfGuardUserRelatedByUpdatedBy($con = null)
	{
		if ($this->asfGuardUserRelatedByUpdatedBy === null && ($this->updated_by !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUserRelatedByUpdatedBy = sfGuardUserPeer::retrieveByPK($this->updated_by, $con);

			
		}
		return $this->asfGuardUserRelatedByUpdatedBy;
	}

	
	public function setsfGuardUserRelatedByDeletedBy($v)
	{


		if ($v === null) {
			$this->setDeletedBy('null');
		} else {
			$this->setDeletedBy($v->getId());
		}


		$this->asfGuardUserRelatedByDeletedBy = $v;
	}


	
	public function getsfGuardUserRelatedByDeletedBy($con = null)
	{
		if ($this->asfGuardUserRelatedByDeletedBy === null && ($this->deleted_by !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUserRelatedByDeletedBy = sfGuardUserPeer::retrieveByPK($this->deleted_by, $con);

			
		}
		return $this->asfGuardUserRelatedByDeletedBy;
	}

	
	public function setBudget($v)
	{


		if ($v === null) {
			$this->setTaskBudgetId('null');
		} else {
			$this->setTaskBudgetId($v->getId());
		}


		$this->aBudget = $v;
	}


	
	public function getBudget($con = null)
	{
		if ($this->aBudget === null && ($this->task_budget_id !== null)) {
						include_once 'lib/model/om/BaseBudgetPeer.php';

			$this->aBudget = BudgetPeer::retrieveByPK($this->task_budget_id, $con);

			
		}
		return $this->aBudget;
	}

	
	public function setTaskPriority($v)
	{


		if ($v === null) {
			$this->setTaskPriorityId(NULL);
		} else {
			$this->setTaskPriorityId($v->getId());
		}


		$this->aTaskPriority = $v;
	}


	
	public function getTaskPriority($con = null)
	{
		if ($this->aTaskPriority === null && ($this->task_priority_id !== null)) {
						include_once 'lib/model/om/BaseTaskPriorityPeer.php';

			$this->aTaskPriority = TaskPriorityPeer::retrieveByPK($this->task_priority_id, $con);

			
		}
		return $this->aTaskPriority;
	}

	
	public function setMilestone($v)
	{


		if ($v === null) {
			$this->setTaskMilestoneId('null');
		} else {
			$this->setTaskMilestoneId($v->getId());
		}


		$this->aMilestone = $v;
	}


	
	public function getMilestone($con = null)
	{
		if ($this->aMilestone === null && ($this->task_milestone_id !== null)) {
						include_once 'lib/model/om/BaseMilestonePeer.php';

			$this->aMilestone = MilestonePeer::retrieveByPK($this->task_milestone_id, $con);

			
		}
		return $this->aMilestone;
	}

	
	public function setProject($v)
	{


		if ($v === null) {
			$this->setTaskProjectId(NULL);
		} else {
			$this->setTaskProjectId($v->getId());
		}


		$this->aProject = $v;
	}


	
	public function getProject($con = null)
	{
		if ($this->aProject === null && ($this->task_project_id !== null)) {
						include_once 'lib/model/om/BaseProjectPeer.php';

			$this->aProject = ProjectPeer::retrieveByPK($this->task_project_id, $con);

			
		}
		return $this->aProject;
	}

	
	public function initTimesheets()
	{
		if ($this->collTimesheets === null) {
			$this->collTimesheets = array();
		}
	}

	
	public function getTimesheets($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTimesheetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTimesheets === null) {
			if ($this->isNew()) {
			   $this->collTimesheets = array();
			} else {

				$criteria->add(TimesheetPeer::TIMESHEET_TASK_ID, $this->getId());

				TimesheetPeer::addSelectColumns($criteria);
				$this->collTimesheets = TimesheetPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TimesheetPeer::TIMESHEET_TASK_ID, $this->getId());

				TimesheetPeer::addSelectColumns($criteria);
				if (!isset($this->lastTimesheetCriteria) || !$this->lastTimesheetCriteria->equals($criteria)) {
					$this->collTimesheets = TimesheetPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastTimesheetCriteria = $criteria;
		return $this->collTimesheets;
	}

	
	public function countTimesheets($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseTimesheetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(TimesheetPeer::TIMESHEET_TASK_ID, $this->getId());

		return TimesheetPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTimesheet(Timesheet $l)
	{
		$this->collTimesheets[] = $l;
		$l->setTask($this);
	}


	
	public function getTimesheetsJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTimesheetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTimesheets === null) {
			if ($this->isNew()) {
				$this->collTimesheets = array();
			} else {

				$criteria->add(TimesheetPeer::TIMESHEET_TASK_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_TASK_ID, $this->getId());

			if (!isset($this->lastTimesheetCriteria) || !$this->lastTimesheetCriteria->equals($criteria)) {
				$this->collTimesheets = TimesheetPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastTimesheetCriteria = $criteria;

		return $this->collTimesheets;
	}


	
	public function getTimesheetsJoinMilestone($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTimesheetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTimesheets === null) {
			if ($this->isNew()) {
				$this->collTimesheets = array();
			} else {

				$criteria->add(TimesheetPeer::TIMESHEET_TASK_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinMilestone($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_TASK_ID, $this->getId());

			if (!isset($this->lastTimesheetCriteria) || !$this->lastTimesheetCriteria->equals($criteria)) {
				$this->collTimesheets = TimesheetPeer::doSelectJoinMilestone($criteria, $con);
			}
		}
		$this->lastTimesheetCriteria = $criteria;

		return $this->collTimesheets;
	}


	
	public function getTimesheetsJoinBudget($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTimesheetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTimesheets === null) {
			if ($this->isNew()) {
				$this->collTimesheets = array();
			} else {

				$criteria->add(TimesheetPeer::TIMESHEET_TASK_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_TASK_ID, $this->getId());

			if (!isset($this->lastTimesheetCriteria) || !$this->lastTimesheetCriteria->equals($criteria)) {
				$this->collTimesheets = TimesheetPeer::doSelectJoinBudget($criteria, $con);
			}
		}
		$this->lastTimesheetCriteria = $criteria;

		return $this->collTimesheets;
	}


	
	public function getTimesheetsJoinsfGuardUser($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTimesheetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTimesheets === null) {
			if ($this->isNew()) {
				$this->collTimesheets = array();
			} else {

				$criteria->add(TimesheetPeer::TIMESHEET_TASK_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_TASK_ID, $this->getId());

			if (!isset($this->lastTimesheetCriteria) || !$this->lastTimesheetCriteria->equals($criteria)) {
				$this->collTimesheets = TimesheetPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		}
		$this->lastTimesheetCriteria = $criteria;

		return $this->collTimesheets;
	}


	
	public function getTimesheetsJoinTypeOfHour($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTimesheetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTimesheets === null) {
			if ($this->isNew()) {
				$this->collTimesheets = array();
			} else {

				$criteria->add(TimesheetPeer::TIMESHEET_TASK_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinTypeOfHour($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_TASK_ID, $this->getId());

			if (!isset($this->lastTimesheetCriteria) || !$this->lastTimesheetCriteria->equals($criteria)) {
				$this->collTimesheets = TimesheetPeer::doSelectJoinTypeOfHour($criteria, $con);
			}
		}
		$this->lastTimesheetCriteria = $criteria;

		return $this->collTimesheets;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseTask:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseTask::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
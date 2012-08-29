<?php


abstract class BaseMilestone extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $milestone_title;


	
	protected $milestone_description;


	
	protected $milestone_start_date;


	
	protected $milestone_finish_date;


	
	protected $milestone_project_id;


	
	protected $milestone_budget_id = 0;


	
	protected $milestone_estimated_hours = 0;


	
	protected $milestone_total_hours = 0;


	
	protected $milestone_total_hour_costs = 0;


	
	protected $created_at;


	
	protected $created_by = 0;


	
	protected $updated_at;


	
	protected $updated_by = 0;


	
	protected $deleted_at;


	
	protected $deleted_by = 0;

	
	protected $aBudgetRelatedByMilestoneProjectId;

	
	protected $aBudgetRelatedByMilestoneBudgetId;

	
	protected $asfGuardUserRelatedByCreatedBy;

	
	protected $asfGuardUserRelatedByUpdatedBy;

	
	protected $asfGuardUserRelatedByDeletedBy;

	
	protected $collTimesheets;

	
	protected $lastTimesheetCriteria = null;

	
	protected $collTasks;

	
	protected $lastTaskCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getMilestoneTitle()
	{

		return $this->milestone_title;
	}

	
	public function getMilestoneDescription()
	{

		return $this->milestone_description;
	}

	
	public function getMilestoneStartDate($format = 'Y-m-d')
	{

		if ($this->milestone_start_date === null || $this->milestone_start_date === '') {
			return null;
		} elseif (!is_int($this->milestone_start_date)) {
						$ts = strtotime($this->milestone_start_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [milestone_start_date] as date/time value: " . var_export($this->milestone_start_date, true));
			}
		} else {
			$ts = $this->milestone_start_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getMilestoneFinishDate($format = 'Y-m-d')
	{

		if ($this->milestone_finish_date === null || $this->milestone_finish_date === '') {
			return null;
		} elseif (!is_int($this->milestone_finish_date)) {
						$ts = strtotime($this->milestone_finish_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [milestone_finish_date] as date/time value: " . var_export($this->milestone_finish_date, true));
			}
		} else {
			$ts = $this->milestone_finish_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getMilestoneProjectId()
	{

		return $this->milestone_project_id;
	}

	
	public function getMilestoneBudgetId()
	{

		return $this->milestone_budget_id;
	}

	
	public function getMilestoneEstimatedHours()
	{

		return $this->milestone_estimated_hours;
	}

	
	public function getMilestoneTotalHours()
	{

		return $this->milestone_total_hours;
	}

	
	public function getMilestoneTotalHourCosts()
	{

		return $this->milestone_total_hour_costs;
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
			$this->modifiedColumns[] = MilestonePeer::ID;
		}

	} 
	
	public function setMilestoneTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->milestone_title !== $v) {
			$this->milestone_title = $v;
			$this->modifiedColumns[] = MilestonePeer::MILESTONE_TITLE;
		}

	} 
	
	public function setMilestoneDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->milestone_description !== $v) {
			$this->milestone_description = $v;
			$this->modifiedColumns[] = MilestonePeer::MILESTONE_DESCRIPTION;
		}

	} 
	
	public function setMilestoneStartDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [milestone_start_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->milestone_start_date !== $ts) {
			$this->milestone_start_date = $ts;
			$this->modifiedColumns[] = MilestonePeer::MILESTONE_START_DATE;
		}

	} 
	
	public function setMilestoneFinishDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [milestone_finish_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->milestone_finish_date !== $ts) {
			$this->milestone_finish_date = $ts;
			$this->modifiedColumns[] = MilestonePeer::MILESTONE_FINISH_DATE;
		}

	} 
	
	public function setMilestoneProjectId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->milestone_project_id !== $v) {
			$this->milestone_project_id = $v;
			$this->modifiedColumns[] = MilestonePeer::MILESTONE_PROJECT_ID;
		}

		if ($this->aBudgetRelatedByMilestoneProjectId !== null && $this->aBudgetRelatedByMilestoneProjectId->getId() !== $v) {
			$this->aBudgetRelatedByMilestoneProjectId = null;
		}

	} 
	
	public function setMilestoneBudgetId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->milestone_budget_id !== $v || $v === 0) {
			$this->milestone_budget_id = $v;
			$this->modifiedColumns[] = MilestonePeer::MILESTONE_BUDGET_ID;
		}

		if ($this->aBudgetRelatedByMilestoneBudgetId !== null && $this->aBudgetRelatedByMilestoneBudgetId->getId() !== $v) {
			$this->aBudgetRelatedByMilestoneBudgetId = null;
		}

	} 
	
	public function setMilestoneEstimatedHours($v)
	{

		if ($this->milestone_estimated_hours !== $v || $v === 0) {
			$this->milestone_estimated_hours = $v;
			$this->modifiedColumns[] = MilestonePeer::MILESTONE_ESTIMATED_HOURS;
		}

	} 
	
	public function setMilestoneTotalHours($v)
	{

		if ($this->milestone_total_hours !== $v || $v === 0) {
			$this->milestone_total_hours = $v;
			$this->modifiedColumns[] = MilestonePeer::MILESTONE_TOTAL_HOURS;
		}

	} 
	
	public function setMilestoneTotalHourCosts($v)
	{

		if ($this->milestone_total_hour_costs !== $v || $v === 0) {
			$this->milestone_total_hour_costs = $v;
			$this->modifiedColumns[] = MilestonePeer::MILESTONE_TOTAL_HOUR_COSTS;
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
			$this->modifiedColumns[] = MilestonePeer::CREATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v || $v === 0) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MilestonePeer::CREATED_BY;
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
			$this->modifiedColumns[] = MilestonePeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v || $v === 0) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MilestonePeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MilestonePeer::DELETED_AT;
		}

	} 
	
	public function setDeletedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->deleted_by !== $v || $v === 0) {
			$this->deleted_by = $v;
			$this->modifiedColumns[] = MilestonePeer::DELETED_BY;
		}

		if ($this->asfGuardUserRelatedByDeletedBy !== null && $this->asfGuardUserRelatedByDeletedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByDeletedBy = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->milestone_title = $rs->getString($startcol + 1);

			$this->milestone_description = $rs->getString($startcol + 2);

			$this->milestone_start_date = $rs->getDate($startcol + 3, null);

			$this->milestone_finish_date = $rs->getDate($startcol + 4, null);

			$this->milestone_project_id = $rs->getInt($startcol + 5);

			$this->milestone_budget_id = $rs->getInt($startcol + 6);

			$this->milestone_estimated_hours = $rs->getFloat($startcol + 7);

			$this->milestone_total_hours = $rs->getFloat($startcol + 8);

			$this->milestone_total_hour_costs = $rs->getFloat($startcol + 9);

			$this->created_at = $rs->getTimestamp($startcol + 10, null);

			$this->created_by = $rs->getInt($startcol + 11);

			$this->updated_at = $rs->getTimestamp($startcol + 12, null);

			$this->updated_by = $rs->getInt($startcol + 13);

			$this->deleted_at = $rs->getTimestamp($startcol + 14, null);

			$this->deleted_by = $rs->getInt($startcol + 15);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 16; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Milestone object", $e);
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
                

    foreach (sfMixer::getCallables('BaseMilestone:delete:pre') as $callable)
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
			$con = Propel::getConnection(MilestonePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MilestonePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseMilestone:delete:post') as $callable)
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
                

    foreach (sfMixer::getCallables('BaseMilestone:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(MilestonePeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MilestonePeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MilestonePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseMilestone:save:post') as $callable)
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


												
			if ($this->aBudgetRelatedByMilestoneProjectId !== null) {
				if ($this->aBudgetRelatedByMilestoneProjectId->isModified()) {
					$affectedRows += $this->aBudgetRelatedByMilestoneProjectId->save($con);
				}
				$this->setBudgetRelatedByMilestoneProjectId($this->aBudgetRelatedByMilestoneProjectId);
			}

			if ($this->aBudgetRelatedByMilestoneBudgetId !== null) {
				if ($this->aBudgetRelatedByMilestoneBudgetId->isModified()) {
					$affectedRows += $this->aBudgetRelatedByMilestoneBudgetId->save($con);
				}
				$this->setBudgetRelatedByMilestoneBudgetId($this->aBudgetRelatedByMilestoneBudgetId);
			}

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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = MilestonePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MilestonePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collTimesheets !== null) {
				foreach($this->collTimesheets as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collTasks !== null) {
				foreach($this->collTasks as $referrerFK) {
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


												
			if ($this->aBudgetRelatedByMilestoneProjectId !== null) {
				if (!$this->aBudgetRelatedByMilestoneProjectId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aBudgetRelatedByMilestoneProjectId->getValidationFailures());
				}
			}

			if ($this->aBudgetRelatedByMilestoneBudgetId !== null) {
				if (!$this->aBudgetRelatedByMilestoneBudgetId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aBudgetRelatedByMilestoneBudgetId->getValidationFailures());
				}
			}

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


			if (($retval = MilestonePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collTimesheets !== null) {
					foreach($this->collTimesheets as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collTasks !== null) {
					foreach($this->collTasks as $referrerFK) {
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
		$pos = MilestonePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getMilestoneTitle();
				break;
			case 2:
				return $this->getMilestoneDescription();
				break;
			case 3:
				return $this->getMilestoneStartDate();
				break;
			case 4:
				return $this->getMilestoneFinishDate();
				break;
			case 5:
				return $this->getMilestoneProjectId();
				break;
			case 6:
				return $this->getMilestoneBudgetId();
				break;
			case 7:
				return $this->getMilestoneEstimatedHours();
				break;
			case 8:
				return $this->getMilestoneTotalHours();
				break;
			case 9:
				return $this->getMilestoneTotalHourCosts();
				break;
			case 10:
				return $this->getCreatedAt();
				break;
			case 11:
				return $this->getCreatedBy();
				break;
			case 12:
				return $this->getUpdatedAt();
				break;
			case 13:
				return $this->getUpdatedBy();
				break;
			case 14:
				return $this->getDeletedAt();
				break;
			case 15:
				return $this->getDeletedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MilestonePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getMilestoneTitle(),
			$keys[2] => $this->getMilestoneDescription(),
			$keys[3] => $this->getMilestoneStartDate(),
			$keys[4] => $this->getMilestoneFinishDate(),
			$keys[5] => $this->getMilestoneProjectId(),
			$keys[6] => $this->getMilestoneBudgetId(),
			$keys[7] => $this->getMilestoneEstimatedHours(),
			$keys[8] => $this->getMilestoneTotalHours(),
			$keys[9] => $this->getMilestoneTotalHourCosts(),
			$keys[10] => $this->getCreatedAt(),
			$keys[11] => $this->getCreatedBy(),
			$keys[12] => $this->getUpdatedAt(),
			$keys[13] => $this->getUpdatedBy(),
			$keys[14] => $this->getDeletedAt(),
			$keys[15] => $this->getDeletedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MilestonePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setMilestoneTitle($value);
				break;
			case 2:
				$this->setMilestoneDescription($value);
				break;
			case 3:
				$this->setMilestoneStartDate($value);
				break;
			case 4:
				$this->setMilestoneFinishDate($value);
				break;
			case 5:
				$this->setMilestoneProjectId($value);
				break;
			case 6:
				$this->setMilestoneBudgetId($value);
				break;
			case 7:
				$this->setMilestoneEstimatedHours($value);
				break;
			case 8:
				$this->setMilestoneTotalHours($value);
				break;
			case 9:
				$this->setMilestoneTotalHourCosts($value);
				break;
			case 10:
				$this->setCreatedAt($value);
				break;
			case 11:
				$this->setCreatedBy($value);
				break;
			case 12:
				$this->setUpdatedAt($value);
				break;
			case 13:
				$this->setUpdatedBy($value);
				break;
			case 14:
				$this->setDeletedAt($value);
				break;
			case 15:
				$this->setDeletedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MilestonePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMilestoneTitle($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMilestoneDescription($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMilestoneStartDate($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMilestoneFinishDate($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMilestoneProjectId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMilestoneBudgetId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMilestoneEstimatedHours($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMilestoneTotalHours($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMilestoneTotalHourCosts($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCreatedAt($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCreatedBy($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setUpdatedAt($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setUpdatedBy($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDeletedAt($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDeletedBy($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MilestonePeer::DATABASE_NAME);

		if ($this->isColumnModified(MilestonePeer::ID)) $criteria->add(MilestonePeer::ID, $this->id);
		if ($this->isColumnModified(MilestonePeer::MILESTONE_TITLE)) $criteria->add(MilestonePeer::MILESTONE_TITLE, $this->milestone_title);
		if ($this->isColumnModified(MilestonePeer::MILESTONE_DESCRIPTION)) $criteria->add(MilestonePeer::MILESTONE_DESCRIPTION, $this->milestone_description);
		if ($this->isColumnModified(MilestonePeer::MILESTONE_START_DATE)) $criteria->add(MilestonePeer::MILESTONE_START_DATE, $this->milestone_start_date);
		if ($this->isColumnModified(MilestonePeer::MILESTONE_FINISH_DATE)) $criteria->add(MilestonePeer::MILESTONE_FINISH_DATE, $this->milestone_finish_date);
		if ($this->isColumnModified(MilestonePeer::MILESTONE_PROJECT_ID)) $criteria->add(MilestonePeer::MILESTONE_PROJECT_ID, $this->milestone_project_id);
		if ($this->isColumnModified(MilestonePeer::MILESTONE_BUDGET_ID)) $criteria->add(MilestonePeer::MILESTONE_BUDGET_ID, $this->milestone_budget_id);
		if ($this->isColumnModified(MilestonePeer::MILESTONE_ESTIMATED_HOURS)) $criteria->add(MilestonePeer::MILESTONE_ESTIMATED_HOURS, $this->milestone_estimated_hours);
		if ($this->isColumnModified(MilestonePeer::MILESTONE_TOTAL_HOURS)) $criteria->add(MilestonePeer::MILESTONE_TOTAL_HOURS, $this->milestone_total_hours);
		if ($this->isColumnModified(MilestonePeer::MILESTONE_TOTAL_HOUR_COSTS)) $criteria->add(MilestonePeer::MILESTONE_TOTAL_HOUR_COSTS, $this->milestone_total_hour_costs);
		if ($this->isColumnModified(MilestonePeer::CREATED_AT)) $criteria->add(MilestonePeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(MilestonePeer::CREATED_BY)) $criteria->add(MilestonePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MilestonePeer::UPDATED_AT)) $criteria->add(MilestonePeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(MilestonePeer::UPDATED_BY)) $criteria->add(MilestonePeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MilestonePeer::DELETED_AT)) $criteria->add(MilestonePeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(MilestonePeer::DELETED_BY)) $criteria->add(MilestonePeer::DELETED_BY, $this->deleted_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MilestonePeer::DATABASE_NAME);

		$criteria->add(MilestonePeer::ID, $this->id);

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

		$copyObj->setMilestoneTitle($this->milestone_title);

		$copyObj->setMilestoneDescription($this->milestone_description);

		$copyObj->setMilestoneStartDate($this->milestone_start_date);

		$copyObj->setMilestoneFinishDate($this->milestone_finish_date);

		$copyObj->setMilestoneProjectId($this->milestone_project_id);

		$copyObj->setMilestoneBudgetId($this->milestone_budget_id);

		$copyObj->setMilestoneEstimatedHours($this->milestone_estimated_hours);

		$copyObj->setMilestoneTotalHours($this->milestone_total_hours);

		$copyObj->setMilestoneTotalHourCosts($this->milestone_total_hour_costs);

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

			foreach($this->getTasks() as $relObj) {
				$copyObj->addTask($relObj->copy($deepCopy));
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
			self::$peer = new MilestonePeer();
		}
		return self::$peer;
	}

	
	public function setBudgetRelatedByMilestoneProjectId($v)
	{


		if ($v === null) {
			$this->setMilestoneProjectId(NULL);
		} else {
			$this->setMilestoneProjectId($v->getId());
		}


		$this->aBudgetRelatedByMilestoneProjectId = $v;
	}


	
	public function getBudgetRelatedByMilestoneProjectId($con = null)
	{
		if ($this->aBudgetRelatedByMilestoneProjectId === null && ($this->milestone_project_id !== null)) {
						include_once 'lib/model/om/BaseBudgetPeer.php';

			$this->aBudgetRelatedByMilestoneProjectId = BudgetPeer::retrieveByPK($this->milestone_project_id, $con);

			
		}
		return $this->aBudgetRelatedByMilestoneProjectId;
	}

	
	public function setBudgetRelatedByMilestoneBudgetId($v)
	{


		if ($v === null) {
			$this->setMilestoneBudgetId('null');
		} else {
			$this->setMilestoneBudgetId($v->getId());
		}


		$this->aBudgetRelatedByMilestoneBudgetId = $v;
	}


	
	public function getBudgetRelatedByMilestoneBudgetId($con = null)
	{
		if ($this->aBudgetRelatedByMilestoneBudgetId === null && ($this->milestone_budget_id !== null)) {
						include_once 'lib/model/om/BaseBudgetPeer.php';

			$this->aBudgetRelatedByMilestoneBudgetId = BudgetPeer::retrieveByPK($this->milestone_budget_id, $con);

			
		}
		return $this->aBudgetRelatedByMilestoneBudgetId;
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

				$criteria->add(TimesheetPeer::TIMESHEET_MILESTONE_ID, $this->getId());

				TimesheetPeer::addSelectColumns($criteria);
				$this->collTimesheets = TimesheetPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TimesheetPeer::TIMESHEET_MILESTONE_ID, $this->getId());

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

		$criteria->add(TimesheetPeer::TIMESHEET_MILESTONE_ID, $this->getId());

		return TimesheetPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTimesheet(Timesheet $l)
	{
		$this->collTimesheets[] = $l;
		$l->setMilestone($this);
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

				$criteria->add(TimesheetPeer::TIMESHEET_MILESTONE_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_MILESTONE_ID, $this->getId());

			if (!isset($this->lastTimesheetCriteria) || !$this->lastTimesheetCriteria->equals($criteria)) {
				$this->collTimesheets = TimesheetPeer::doSelectJoinProject($criteria, $con);
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

				$criteria->add(TimesheetPeer::TIMESHEET_MILESTONE_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_MILESTONE_ID, $this->getId());

			if (!isset($this->lastTimesheetCriteria) || !$this->lastTimesheetCriteria->equals($criteria)) {
				$this->collTimesheets = TimesheetPeer::doSelectJoinBudget($criteria, $con);
			}
		}
		$this->lastTimesheetCriteria = $criteria;

		return $this->collTimesheets;
	}


	
	public function getTimesheetsJoinTask($criteria = null, $con = null)
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

				$criteria->add(TimesheetPeer::TIMESHEET_MILESTONE_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinTask($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_MILESTONE_ID, $this->getId());

			if (!isset($this->lastTimesheetCriteria) || !$this->lastTimesheetCriteria->equals($criteria)) {
				$this->collTimesheets = TimesheetPeer::doSelectJoinTask($criteria, $con);
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

				$criteria->add(TimesheetPeer::TIMESHEET_MILESTONE_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_MILESTONE_ID, $this->getId());

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

				$criteria->add(TimesheetPeer::TIMESHEET_MILESTONE_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinTypeOfHour($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_MILESTONE_ID, $this->getId());

			if (!isset($this->lastTimesheetCriteria) || !$this->lastTimesheetCriteria->equals($criteria)) {
				$this->collTimesheets = TimesheetPeer::doSelectJoinTypeOfHour($criteria, $con);
			}
		}
		$this->lastTimesheetCriteria = $criteria;

		return $this->collTimesheets;
	}

	
	public function initTasks()
	{
		if ($this->collTasks === null) {
			$this->collTasks = array();
		}
	}

	
	public function getTasks($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasks === null) {
			if ($this->isNew()) {
			   $this->collTasks = array();
			} else {

				$criteria->add(TaskPeer::TASK_MILESTONE_ID, $this->getId());

				TaskPeer::addSelectColumns($criteria);
				$this->collTasks = TaskPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TaskPeer::TASK_MILESTONE_ID, $this->getId());

				TaskPeer::addSelectColumns($criteria);
				if (!isset($this->lastTaskCriteria) || !$this->lastTaskCriteria->equals($criteria)) {
					$this->collTasks = TaskPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastTaskCriteria = $criteria;
		return $this->collTasks;
	}

	
	public function countTasks($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(TaskPeer::TASK_MILESTONE_ID, $this->getId());

		return TaskPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTask(Task $l)
	{
		$this->collTasks[] = $l;
		$l->setMilestone($this);
	}


	
	public function getTasksJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasks === null) {
			if ($this->isNew()) {
				$this->collTasks = array();
			} else {

				$criteria->add(TaskPeer::TASK_MILESTONE_ID, $this->getId());

				$this->collTasks = TaskPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::TASK_MILESTONE_ID, $this->getId());

			if (!isset($this->lastTaskCriteria) || !$this->lastTaskCriteria->equals($criteria)) {
				$this->collTasks = TaskPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		}
		$this->lastTaskCriteria = $criteria;

		return $this->collTasks;
	}


	
	public function getTasksJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasks === null) {
			if ($this->isNew()) {
				$this->collTasks = array();
			} else {

				$criteria->add(TaskPeer::TASK_MILESTONE_ID, $this->getId());

				$this->collTasks = TaskPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::TASK_MILESTONE_ID, $this->getId());

			if (!isset($this->lastTaskCriteria) || !$this->lastTaskCriteria->equals($criteria)) {
				$this->collTasks = TaskPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		}
		$this->lastTaskCriteria = $criteria;

		return $this->collTasks;
	}


	
	public function getTasksJoinsfGuardUserRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasks === null) {
			if ($this->isNew()) {
				$this->collTasks = array();
			} else {

				$criteria->add(TaskPeer::TASK_MILESTONE_ID, $this->getId());

				$this->collTasks = TaskPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::TASK_MILESTONE_ID, $this->getId());

			if (!isset($this->lastTaskCriteria) || !$this->lastTaskCriteria->equals($criteria)) {
				$this->collTasks = TaskPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		}
		$this->lastTaskCriteria = $criteria;

		return $this->collTasks;
	}


	
	public function getTasksJoinBudget($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasks === null) {
			if ($this->isNew()) {
				$this->collTasks = array();
			} else {

				$criteria->add(TaskPeer::TASK_MILESTONE_ID, $this->getId());

				$this->collTasks = TaskPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::TASK_MILESTONE_ID, $this->getId());

			if (!isset($this->lastTaskCriteria) || !$this->lastTaskCriteria->equals($criteria)) {
				$this->collTasks = TaskPeer::doSelectJoinBudget($criteria, $con);
			}
		}
		$this->lastTaskCriteria = $criteria;

		return $this->collTasks;
	}


	
	public function getTasksJoinTaskPriority($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasks === null) {
			if ($this->isNew()) {
				$this->collTasks = array();
			} else {

				$criteria->add(TaskPeer::TASK_MILESTONE_ID, $this->getId());

				$this->collTasks = TaskPeer::doSelectJoinTaskPriority($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::TASK_MILESTONE_ID, $this->getId());

			if (!isset($this->lastTaskCriteria) || !$this->lastTaskCriteria->equals($criteria)) {
				$this->collTasks = TaskPeer::doSelectJoinTaskPriority($criteria, $con);
			}
		}
		$this->lastTaskCriteria = $criteria;

		return $this->collTasks;
	}


	
	public function getTasksJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasks === null) {
			if ($this->isNew()) {
				$this->collTasks = array();
			} else {

				$criteria->add(TaskPeer::TASK_MILESTONE_ID, $this->getId());

				$this->collTasks = TaskPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::TASK_MILESTONE_ID, $this->getId());

			if (!isset($this->lastTaskCriteria) || !$this->lastTaskCriteria->equals($criteria)) {
				$this->collTasks = TaskPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastTaskCriteria = $criteria;

		return $this->collTasks;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseMilestone:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseMilestone::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
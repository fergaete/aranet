<?php


abstract class BaseTimesheet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $timesheet_description;


	
	protected $timesheet_hours = 0;


	
	protected $timesheet_user_id;


	
	protected $timesheet_project_id;


	
	protected $timesheet_budget_id = 0;


	
	protected $timesheet_milestone_id = 0;


	
	protected $timesheet_task_id = 0;


	
	protected $timesheet_is_billable = true;


	
	protected $timesheet_type_id;


	
	protected $timesheet_date;

	
	protected $aProject;

	
	protected $aMilestone;

	
	protected $aBudget;

	
	protected $aTask;

	
	protected $asfGuardUser;

	
	protected $aTypeOfHour;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getTimesheetDescription()
	{

		return $this->timesheet_description;
	}

	
	public function getTimesheetHours()
	{

		return $this->timesheet_hours;
	}

	
	public function getTimesheetUserId()
	{

		return $this->timesheet_user_id;
	}

	
	public function getTimesheetProjectId()
	{

		return $this->timesheet_project_id;
	}

	
	public function getTimesheetBudgetId()
	{

		return $this->timesheet_budget_id;
	}

	
	public function getTimesheetMilestoneId()
	{

		return $this->timesheet_milestone_id;
	}

	
	public function getTimesheetTaskId()
	{

		return $this->timesheet_task_id;
	}

	
	public function getTimesheetIsBillable()
	{

		return $this->timesheet_is_billable;
	}

	
	public function getTimesheetTypeId()
	{

		return $this->timesheet_type_id;
	}

	
	public function getTimesheetDate($format = 'Y-m-d')
	{

		if ($this->timesheet_date === null || $this->timesheet_date === '') {
			return null;
		} elseif (!is_int($this->timesheet_date)) {
						$ts = strtotime($this->timesheet_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [timesheet_date] as date/time value: " . var_export($this->timesheet_date, true));
			}
		} else {
			$ts = $this->timesheet_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TimesheetPeer::ID;
		}

	} 
	
	public function setTimesheetDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->timesheet_description !== $v) {
			$this->timesheet_description = $v;
			$this->modifiedColumns[] = TimesheetPeer::TIMESHEET_DESCRIPTION;
		}

	} 
	
	public function setTimesheetHours($v)
	{

		if ($this->timesheet_hours !== $v || $v === 0) {
			$this->timesheet_hours = $v;
			$this->modifiedColumns[] = TimesheetPeer::TIMESHEET_HOURS;
		}

	} 
	
	public function setTimesheetUserId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->timesheet_user_id !== $v) {
			$this->timesheet_user_id = $v;
			$this->modifiedColumns[] = TimesheetPeer::TIMESHEET_USER_ID;
		}

		if ($this->asfGuardUser !== null && $this->asfGuardUser->getId() !== $v) {
			$this->asfGuardUser = null;
		}

	} 
	
	public function setTimesheetProjectId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->timesheet_project_id !== $v) {
			$this->timesheet_project_id = $v;
			$this->modifiedColumns[] = TimesheetPeer::TIMESHEET_PROJECT_ID;
		}

		if ($this->aProject !== null && $this->aProject->getId() !== $v) {
			$this->aProject = null;
		}

	} 
	
	public function setTimesheetBudgetId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->timesheet_budget_id !== $v || $v === 0) {
			$this->timesheet_budget_id = $v;
			$this->modifiedColumns[] = TimesheetPeer::TIMESHEET_BUDGET_ID;
		}

		if ($this->aBudget !== null && $this->aBudget->getId() !== $v) {
			$this->aBudget = null;
		}

	} 
	
	public function setTimesheetMilestoneId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->timesheet_milestone_id !== $v || $v === 0) {
			$this->timesheet_milestone_id = $v;
			$this->modifiedColumns[] = TimesheetPeer::TIMESHEET_MILESTONE_ID;
		}

		if ($this->aMilestone !== null && $this->aMilestone->getId() !== $v) {
			$this->aMilestone = null;
		}

	} 
	
	public function setTimesheetTaskId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->timesheet_task_id !== $v || $v === 0) {
			$this->timesheet_task_id = $v;
			$this->modifiedColumns[] = TimesheetPeer::TIMESHEET_TASK_ID;
		}

		if ($this->aTask !== null && $this->aTask->getId() !== $v) {
			$this->aTask = null;
		}

	} 
	
	public function setTimesheetIsBillable($v)
	{

		if ($this->timesheet_is_billable !== $v || $v === true) {
			$this->timesheet_is_billable = $v;
			$this->modifiedColumns[] = TimesheetPeer::TIMESHEET_IS_BILLABLE;
		}

	} 
	
	public function setTimesheetTypeId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->timesheet_type_id !== $v) {
			$this->timesheet_type_id = $v;
			$this->modifiedColumns[] = TimesheetPeer::TIMESHEET_TYPE_ID;
		}

		if ($this->aTypeOfHour !== null && $this->aTypeOfHour->getId() !== $v) {
			$this->aTypeOfHour = null;
		}

	} 
	
	public function setTimesheetDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [timesheet_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->timesheet_date !== $ts) {
			$this->timesheet_date = $ts;
			$this->modifiedColumns[] = TimesheetPeer::TIMESHEET_DATE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->timesheet_description = $rs->getString($startcol + 1);

			$this->timesheet_hours = $rs->getFloat($startcol + 2);

			$this->timesheet_user_id = $rs->getInt($startcol + 3);

			$this->timesheet_project_id = $rs->getInt($startcol + 4);

			$this->timesheet_budget_id = $rs->getInt($startcol + 5);

			$this->timesheet_milestone_id = $rs->getInt($startcol + 6);

			$this->timesheet_task_id = $rs->getInt($startcol + 7);

			$this->timesheet_is_billable = $rs->getBoolean($startcol + 8);

			$this->timesheet_type_id = $rs->getInt($startcol + 9);

			$this->timesheet_date = $rs->getDate($startcol + 10, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Timesheet object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseTimesheet:delete:pre') as $callable)
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
			$con = Propel::getConnection(TimesheetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TimesheetPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseTimesheet:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseTimesheet:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TimesheetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseTimesheet:save:post') as $callable)
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


												
			if ($this->aProject !== null) {
				if ($this->aProject->isModified()) {
					$affectedRows += $this->aProject->save($con);
				}
				$this->setProject($this->aProject);
			}

			if ($this->aMilestone !== null) {
				if ($this->aMilestone->isModified()) {
					$affectedRows += $this->aMilestone->save($con);
				}
				$this->setMilestone($this->aMilestone);
			}

			if ($this->aBudget !== null) {
				if ($this->aBudget->isModified()) {
					$affectedRows += $this->aBudget->save($con);
				}
				$this->setBudget($this->aBudget);
			}

			if ($this->aTask !== null) {
				if ($this->aTask->isModified()) {
					$affectedRows += $this->aTask->save($con);
				}
				$this->setTask($this->aTask);
			}

			if ($this->asfGuardUser !== null) {
				if ($this->asfGuardUser->isModified()) {
					$affectedRows += $this->asfGuardUser->save($con);
				}
				$this->setsfGuardUser($this->asfGuardUser);
			}

			if ($this->aTypeOfHour !== null) {
				if ($this->aTypeOfHour->isModified()) {
					$affectedRows += $this->aTypeOfHour->save($con);
				}
				$this->setTypeOfHour($this->aTypeOfHour);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = TimesheetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TimesheetPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


												
			if ($this->aProject !== null) {
				if (!$this->aProject->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProject->getValidationFailures());
				}
			}

			if ($this->aMilestone !== null) {
				if (!$this->aMilestone->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aMilestone->getValidationFailures());
				}
			}

			if ($this->aBudget !== null) {
				if (!$this->aBudget->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aBudget->getValidationFailures());
				}
			}

			if ($this->aTask !== null) {
				if (!$this->aTask->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTask->getValidationFailures());
				}
			}

			if ($this->asfGuardUser !== null) {
				if (!$this->asfGuardUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUser->getValidationFailures());
				}
			}

			if ($this->aTypeOfHour !== null) {
				if (!$this->aTypeOfHour->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTypeOfHour->getValidationFailures());
				}
			}


			if (($retval = TimesheetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TimesheetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getTimesheetDescription();
				break;
			case 2:
				return $this->getTimesheetHours();
				break;
			case 3:
				return $this->getTimesheetUserId();
				break;
			case 4:
				return $this->getTimesheetProjectId();
				break;
			case 5:
				return $this->getTimesheetBudgetId();
				break;
			case 6:
				return $this->getTimesheetMilestoneId();
				break;
			case 7:
				return $this->getTimesheetTaskId();
				break;
			case 8:
				return $this->getTimesheetIsBillable();
				break;
			case 9:
				return $this->getTimesheetTypeId();
				break;
			case 10:
				return $this->getTimesheetDate();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TimesheetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTimesheetDescription(),
			$keys[2] => $this->getTimesheetHours(),
			$keys[3] => $this->getTimesheetUserId(),
			$keys[4] => $this->getTimesheetProjectId(),
			$keys[5] => $this->getTimesheetBudgetId(),
			$keys[6] => $this->getTimesheetMilestoneId(),
			$keys[7] => $this->getTimesheetTaskId(),
			$keys[8] => $this->getTimesheetIsBillable(),
			$keys[9] => $this->getTimesheetTypeId(),
			$keys[10] => $this->getTimesheetDate(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TimesheetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setTimesheetDescription($value);
				break;
			case 2:
				$this->setTimesheetHours($value);
				break;
			case 3:
				$this->setTimesheetUserId($value);
				break;
			case 4:
				$this->setTimesheetProjectId($value);
				break;
			case 5:
				$this->setTimesheetBudgetId($value);
				break;
			case 6:
				$this->setTimesheetMilestoneId($value);
				break;
			case 7:
				$this->setTimesheetTaskId($value);
				break;
			case 8:
				$this->setTimesheetIsBillable($value);
				break;
			case 9:
				$this->setTimesheetTypeId($value);
				break;
			case 10:
				$this->setTimesheetDate($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TimesheetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTimesheetDescription($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTimesheetHours($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTimesheetUserId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTimesheetProjectId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTimesheetBudgetId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTimesheetMilestoneId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTimesheetTaskId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTimesheetIsBillable($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTimesheetTypeId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setTimesheetDate($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TimesheetPeer::DATABASE_NAME);

		if ($this->isColumnModified(TimesheetPeer::ID)) $criteria->add(TimesheetPeer::ID, $this->id);
		if ($this->isColumnModified(TimesheetPeer::TIMESHEET_DESCRIPTION)) $criteria->add(TimesheetPeer::TIMESHEET_DESCRIPTION, $this->timesheet_description);
		if ($this->isColumnModified(TimesheetPeer::TIMESHEET_HOURS)) $criteria->add(TimesheetPeer::TIMESHEET_HOURS, $this->timesheet_hours);
		if ($this->isColumnModified(TimesheetPeer::TIMESHEET_USER_ID)) $criteria->add(TimesheetPeer::TIMESHEET_USER_ID, $this->timesheet_user_id);
		if ($this->isColumnModified(TimesheetPeer::TIMESHEET_PROJECT_ID)) $criteria->add(TimesheetPeer::TIMESHEET_PROJECT_ID, $this->timesheet_project_id);
		if ($this->isColumnModified(TimesheetPeer::TIMESHEET_BUDGET_ID)) $criteria->add(TimesheetPeer::TIMESHEET_BUDGET_ID, $this->timesheet_budget_id);
		if ($this->isColumnModified(TimesheetPeer::TIMESHEET_MILESTONE_ID)) $criteria->add(TimesheetPeer::TIMESHEET_MILESTONE_ID, $this->timesheet_milestone_id);
		if ($this->isColumnModified(TimesheetPeer::TIMESHEET_TASK_ID)) $criteria->add(TimesheetPeer::TIMESHEET_TASK_ID, $this->timesheet_task_id);
		if ($this->isColumnModified(TimesheetPeer::TIMESHEET_IS_BILLABLE)) $criteria->add(TimesheetPeer::TIMESHEET_IS_BILLABLE, $this->timesheet_is_billable);
		if ($this->isColumnModified(TimesheetPeer::TIMESHEET_TYPE_ID)) $criteria->add(TimesheetPeer::TIMESHEET_TYPE_ID, $this->timesheet_type_id);
		if ($this->isColumnModified(TimesheetPeer::TIMESHEET_DATE)) $criteria->add(TimesheetPeer::TIMESHEET_DATE, $this->timesheet_date);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TimesheetPeer::DATABASE_NAME);

		$criteria->add(TimesheetPeer::ID, $this->id);

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

		$copyObj->setTimesheetDescription($this->timesheet_description);

		$copyObj->setTimesheetHours($this->timesheet_hours);

		$copyObj->setTimesheetUserId($this->timesheet_user_id);

		$copyObj->setTimesheetProjectId($this->timesheet_project_id);

		$copyObj->setTimesheetBudgetId($this->timesheet_budget_id);

		$copyObj->setTimesheetMilestoneId($this->timesheet_milestone_id);

		$copyObj->setTimesheetTaskId($this->timesheet_task_id);

		$copyObj->setTimesheetIsBillable($this->timesheet_is_billable);

		$copyObj->setTimesheetTypeId($this->timesheet_type_id);

		$copyObj->setTimesheetDate($this->timesheet_date);


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
			self::$peer = new TimesheetPeer();
		}
		return self::$peer;
	}

	
	public function setProject($v)
	{


		if ($v === null) {
			$this->setTimesheetProjectId(NULL);
		} else {
			$this->setTimesheetProjectId($v->getId());
		}


		$this->aProject = $v;
	}


	
	public function getProject($con = null)
	{
		if ($this->aProject === null && ($this->timesheet_project_id !== null)) {
						include_once 'lib/model/om/BaseProjectPeer.php';

			$this->aProject = ProjectPeer::retrieveByPK($this->timesheet_project_id, $con);

			
		}
		return $this->aProject;
	}

	
	public function setMilestone($v)
	{


		if ($v === null) {
			$this->setTimesheetMilestoneId('null');
		} else {
			$this->setTimesheetMilestoneId($v->getId());
		}


		$this->aMilestone = $v;
	}


	
	public function getMilestone($con = null)
	{
		if ($this->aMilestone === null && ($this->timesheet_milestone_id !== null)) {
						include_once 'lib/model/om/BaseMilestonePeer.php';

			$this->aMilestone = MilestonePeer::retrieveByPK($this->timesheet_milestone_id, $con);

			
		}
		return $this->aMilestone;
	}

	
	public function setBudget($v)
	{


		if ($v === null) {
			$this->setTimesheetBudgetId('null');
		} else {
			$this->setTimesheetBudgetId($v->getId());
		}


		$this->aBudget = $v;
	}


	
	public function getBudget($con = null)
	{
		if ($this->aBudget === null && ($this->timesheet_budget_id !== null)) {
						include_once 'lib/model/om/BaseBudgetPeer.php';

			$this->aBudget = BudgetPeer::retrieveByPK($this->timesheet_budget_id, $con);

			
		}
		return $this->aBudget;
	}

	
	public function setTask($v)
	{


		if ($v === null) {
			$this->setTimesheetTaskId('null');
		} else {
			$this->setTimesheetTaskId($v->getId());
		}


		$this->aTask = $v;
	}


	
	public function getTask($con = null)
	{
		if ($this->aTask === null && ($this->timesheet_task_id !== null)) {
						include_once 'lib/model/om/BaseTaskPeer.php';

			$this->aTask = TaskPeer::retrieveByPK($this->timesheet_task_id, $con);

			
		}
		return $this->aTask;
	}

	
	public function setsfGuardUser($v)
	{


		if ($v === null) {
			$this->setTimesheetUserId(NULL);
		} else {
			$this->setTimesheetUserId($v->getId());
		}


		$this->asfGuardUser = $v;
	}


	
	public function getsfGuardUser($con = null)
	{
		if ($this->asfGuardUser === null && ($this->timesheet_user_id !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUser = sfGuardUserPeer::retrieveByPK($this->timesheet_user_id, $con);

			
		}
		return $this->asfGuardUser;
	}

	
	public function setTypeOfHour($v)
	{


		if ($v === null) {
			$this->setTimesheetTypeId(NULL);
		} else {
			$this->setTimesheetTypeId($v->getId());
		}


		$this->aTypeOfHour = $v;
	}


	
	public function getTypeOfHour($con = null)
	{
		if ($this->aTypeOfHour === null && ($this->timesheet_type_id !== null)) {
						include_once 'lib/model/om/BaseTypeOfHourPeer.php';

			$this->aTypeOfHour = TypeOfHourPeer::retrieveByPK($this->timesheet_type_id, $con);

			
		}
		return $this->aTypeOfHour;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseTimesheet:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseTimesheet::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
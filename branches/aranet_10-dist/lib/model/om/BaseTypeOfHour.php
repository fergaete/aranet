<?php


abstract class BaseTypeOfHour extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $type_of_hour_title;


	
	protected $type_of_hour_description;


	
	protected $type_of_hour_cost = 0;

	
	protected $collTimesheets;

	
	protected $lastTimesheetCriteria = null;

	
	protected $collBudgetItems;

	
	protected $lastBudgetItemCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getTypeOfHourTitle()
	{

		return $this->type_of_hour_title;
	}

	
	public function getTypeOfHourDescription()
	{

		return $this->type_of_hour_description;
	}

	
	public function getTypeOfHourCost()
	{

		return $this->type_of_hour_cost;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TypeOfHourPeer::ID;
		}

	} 
	
	public function setTypeOfHourTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->type_of_hour_title !== $v) {
			$this->type_of_hour_title = $v;
			$this->modifiedColumns[] = TypeOfHourPeer::TYPE_OF_HOUR_TITLE;
		}

	} 
	
	public function setTypeOfHourDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->type_of_hour_description !== $v) {
			$this->type_of_hour_description = $v;
			$this->modifiedColumns[] = TypeOfHourPeer::TYPE_OF_HOUR_DESCRIPTION;
		}

	} 
	
	public function setTypeOfHourCost($v)
	{

		if ($this->type_of_hour_cost !== $v || $v === 0) {
			$this->type_of_hour_cost = $v;
			$this->modifiedColumns[] = TypeOfHourPeer::TYPE_OF_HOUR_COST;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->type_of_hour_title = $rs->getString($startcol + 1);

			$this->type_of_hour_description = $rs->getString($startcol + 2);

			$this->type_of_hour_cost = $rs->getFloat($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating TypeOfHour object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseTypeOfHour:delete:pre') as $callable)
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
			$con = Propel::getConnection(TypeOfHourPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TypeOfHourPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseTypeOfHour:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseTypeOfHour:save:pre') as $callable)
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
			$con = Propel::getConnection(TypeOfHourPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseTypeOfHour:save:post') as $callable)
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = TypeOfHourPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TypeOfHourPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collTimesheets !== null) {
				foreach($this->collTimesheets as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collBudgetItems !== null) {
				foreach($this->collBudgetItems as $referrerFK) {
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


			if (($retval = TypeOfHourPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collTimesheets !== null) {
					foreach($this->collTimesheets as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collBudgetItems !== null) {
					foreach($this->collBudgetItems as $referrerFK) {
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
		$pos = TypeOfHourPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getTypeOfHourTitle();
				break;
			case 2:
				return $this->getTypeOfHourDescription();
				break;
			case 3:
				return $this->getTypeOfHourCost();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TypeOfHourPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTypeOfHourTitle(),
			$keys[2] => $this->getTypeOfHourDescription(),
			$keys[3] => $this->getTypeOfHourCost(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TypeOfHourPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setTypeOfHourTitle($value);
				break;
			case 2:
				$this->setTypeOfHourDescription($value);
				break;
			case 3:
				$this->setTypeOfHourCost($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TypeOfHourPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTypeOfHourTitle($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTypeOfHourDescription($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTypeOfHourCost($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TypeOfHourPeer::DATABASE_NAME);

		if ($this->isColumnModified(TypeOfHourPeer::ID)) $criteria->add(TypeOfHourPeer::ID, $this->id);
		if ($this->isColumnModified(TypeOfHourPeer::TYPE_OF_HOUR_TITLE)) $criteria->add(TypeOfHourPeer::TYPE_OF_HOUR_TITLE, $this->type_of_hour_title);
		if ($this->isColumnModified(TypeOfHourPeer::TYPE_OF_HOUR_DESCRIPTION)) $criteria->add(TypeOfHourPeer::TYPE_OF_HOUR_DESCRIPTION, $this->type_of_hour_description);
		if ($this->isColumnModified(TypeOfHourPeer::TYPE_OF_HOUR_COST)) $criteria->add(TypeOfHourPeer::TYPE_OF_HOUR_COST, $this->type_of_hour_cost);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TypeOfHourPeer::DATABASE_NAME);

		$criteria->add(TypeOfHourPeer::ID, $this->id);

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

		$copyObj->setTypeOfHourTitle($this->type_of_hour_title);

		$copyObj->setTypeOfHourDescription($this->type_of_hour_description);

		$copyObj->setTypeOfHourCost($this->type_of_hour_cost);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getTimesheets() as $relObj) {
				$copyObj->addTimesheet($relObj->copy($deepCopy));
			}

			foreach($this->getBudgetItems() as $relObj) {
				$copyObj->addBudgetItem($relObj->copy($deepCopy));
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
			self::$peer = new TypeOfHourPeer();
		}
		return self::$peer;
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

				$criteria->add(TimesheetPeer::TIMESHEET_TYPE_ID, $this->getId());

				TimesheetPeer::addSelectColumns($criteria);
				$this->collTimesheets = TimesheetPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TimesheetPeer::TIMESHEET_TYPE_ID, $this->getId());

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

		$criteria->add(TimesheetPeer::TIMESHEET_TYPE_ID, $this->getId());

		return TimesheetPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTimesheet(Timesheet $l)
	{
		$this->collTimesheets[] = $l;
		$l->setTypeOfHour($this);
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

				$criteria->add(TimesheetPeer::TIMESHEET_TYPE_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_TYPE_ID, $this->getId());

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

				$criteria->add(TimesheetPeer::TIMESHEET_TYPE_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinMilestone($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_TYPE_ID, $this->getId());

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

				$criteria->add(TimesheetPeer::TIMESHEET_TYPE_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_TYPE_ID, $this->getId());

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

				$criteria->add(TimesheetPeer::TIMESHEET_TYPE_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinTask($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_TYPE_ID, $this->getId());

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

				$criteria->add(TimesheetPeer::TIMESHEET_TYPE_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_TYPE_ID, $this->getId());

			if (!isset($this->lastTimesheetCriteria) || !$this->lastTimesheetCriteria->equals($criteria)) {
				$this->collTimesheets = TimesheetPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		}
		$this->lastTimesheetCriteria = $criteria;

		return $this->collTimesheets;
	}

	
	public function initBudgetItems()
	{
		if ($this->collBudgetItems === null) {
			$this->collBudgetItems = array();
		}
	}

	
	public function getBudgetItems($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgetItems === null) {
			if ($this->isNew()) {
			   $this->collBudgetItems = array();
			} else {

				$criteria->add(BudgetItemPeer::ITEM_BUDGET_TYPE_ID, $this->getId());

				BudgetItemPeer::addSelectColumns($criteria);
				$this->collBudgetItems = BudgetItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(BudgetItemPeer::ITEM_BUDGET_TYPE_ID, $this->getId());

				BudgetItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastBudgetItemCriteria) || !$this->lastBudgetItemCriteria->equals($criteria)) {
					$this->collBudgetItems = BudgetItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastBudgetItemCriteria = $criteria;
		return $this->collBudgetItems;
	}

	
	public function countBudgetItems($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(BudgetItemPeer::ITEM_BUDGET_TYPE_ID, $this->getId());

		return BudgetItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addBudgetItem(BudgetItem $l)
	{
		$this->collBudgetItems[] = $l;
		$l->setTypeOfHour($this);
	}


	
	public function getBudgetItemsJoinTypeOfInvoiceItem($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgetItems === null) {
			if ($this->isNew()) {
				$this->collBudgetItems = array();
			} else {

				$criteria->add(BudgetItemPeer::ITEM_BUDGET_TYPE_ID, $this->getId());

				$this->collBudgetItems = BudgetItemPeer::doSelectJoinTypeOfInvoiceItem($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetItemPeer::ITEM_BUDGET_TYPE_ID, $this->getId());

			if (!isset($this->lastBudgetItemCriteria) || !$this->lastBudgetItemCriteria->equals($criteria)) {
				$this->collBudgetItems = BudgetItemPeer::doSelectJoinTypeOfInvoiceItem($criteria, $con);
			}
		}
		$this->lastBudgetItemCriteria = $criteria;

		return $this->collBudgetItems;
	}


	
	public function getBudgetItemsJoinBudget($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgetItems === null) {
			if ($this->isNew()) {
				$this->collBudgetItems = array();
			} else {

				$criteria->add(BudgetItemPeer::ITEM_BUDGET_TYPE_ID, $this->getId());

				$this->collBudgetItems = BudgetItemPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetItemPeer::ITEM_BUDGET_TYPE_ID, $this->getId());

			if (!isset($this->lastBudgetItemCriteria) || !$this->lastBudgetItemCriteria->equals($criteria)) {
				$this->collBudgetItems = BudgetItemPeer::doSelectJoinBudget($criteria, $con);
			}
		}
		$this->lastBudgetItemCriteria = $criteria;

		return $this->collBudgetItems;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseTypeOfHour:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseTypeOfHour::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
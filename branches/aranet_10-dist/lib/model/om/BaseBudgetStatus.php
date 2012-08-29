<?php


abstract class BaseBudgetStatus extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $budget_status_title;

	
	protected $collBudgets;

	
	protected $lastBudgetCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getBudgetStatusTitle()
	{

		return $this->budget_status_title;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = BudgetStatusPeer::ID;
		}

	} 
	
	public function setBudgetStatusTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->budget_status_title !== $v) {
			$this->budget_status_title = $v;
			$this->modifiedColumns[] = BudgetStatusPeer::BUDGET_STATUS_TITLE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->budget_status_title = $rs->getString($startcol + 1);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating BudgetStatus object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseBudgetStatus:delete:pre') as $callable)
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
			$con = Propel::getConnection(BudgetStatusPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BudgetStatusPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseBudgetStatus:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseBudgetStatus:save:pre') as $callable)
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
			$con = Propel::getConnection(BudgetStatusPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseBudgetStatus:save:post') as $callable)
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
					$pk = BudgetStatusPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += BudgetStatusPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collBudgets !== null) {
				foreach($this->collBudgets as $referrerFK) {
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


			if (($retval = BudgetStatusPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collBudgets !== null) {
					foreach($this->collBudgets as $referrerFK) {
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
		$pos = BudgetStatusPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getBudgetStatusTitle();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BudgetStatusPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getBudgetStatusTitle(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BudgetStatusPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setBudgetStatusTitle($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BudgetStatusPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setBudgetStatusTitle($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BudgetStatusPeer::DATABASE_NAME);

		if ($this->isColumnModified(BudgetStatusPeer::ID)) $criteria->add(BudgetStatusPeer::ID, $this->id);
		if ($this->isColumnModified(BudgetStatusPeer::BUDGET_STATUS_TITLE)) $criteria->add(BudgetStatusPeer::BUDGET_STATUS_TITLE, $this->budget_status_title);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BudgetStatusPeer::DATABASE_NAME);

		$criteria->add(BudgetStatusPeer::ID, $this->id);

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

		$copyObj->setBudgetStatusTitle($this->budget_status_title);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getBudgets() as $relObj) {
				$copyObj->addBudget($relObj->copy($deepCopy));
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
			self::$peer = new BudgetStatusPeer();
		}
		return self::$peer;
	}

	
	public function initBudgets()
	{
		if ($this->collBudgets === null) {
			$this->collBudgets = array();
		}
	}

	
	public function getBudgets($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgets === null) {
			if ($this->isNew()) {
			   $this->collBudgets = array();
			} else {

				$criteria->add(BudgetPeer::BUDGET_STATUS_ID, $this->getId());

				BudgetPeer::addSelectColumns($criteria);
				$this->collBudgets = BudgetPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(BudgetPeer::BUDGET_STATUS_ID, $this->getId());

				BudgetPeer::addSelectColumns($criteria);
				if (!isset($this->lastBudgetCriteria) || !$this->lastBudgetCriteria->equals($criteria)) {
					$this->collBudgets = BudgetPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastBudgetCriteria = $criteria;
		return $this->collBudgets;
	}

	
	public function countBudgets($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(BudgetPeer::BUDGET_STATUS_ID, $this->getId());

		return BudgetPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addBudget(Budget $l)
	{
		$this->collBudgets[] = $l;
		$l->setBudgetStatus($this);
	}


	
	public function getBudgetsJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgets === null) {
			if ($this->isNew()) {
				$this->collBudgets = array();
			} else {

				$criteria->add(BudgetPeer::BUDGET_STATUS_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_STATUS_ID, $this->getId());

			if (!isset($this->lastBudgetCriteria) || !$this->lastBudgetCriteria->equals($criteria)) {
				$this->collBudgets = BudgetPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		}
		$this->lastBudgetCriteria = $criteria;

		return $this->collBudgets;
	}


	
	public function getBudgetsJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgets === null) {
			if ($this->isNew()) {
				$this->collBudgets = array();
			} else {

				$criteria->add(BudgetPeer::BUDGET_STATUS_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_STATUS_ID, $this->getId());

			if (!isset($this->lastBudgetCriteria) || !$this->lastBudgetCriteria->equals($criteria)) {
				$this->collBudgets = BudgetPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		}
		$this->lastBudgetCriteria = $criteria;

		return $this->collBudgets;
	}


	
	public function getBudgetsJoinsfGuardUserRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgets === null) {
			if ($this->isNew()) {
				$this->collBudgets = array();
			} else {

				$criteria->add(BudgetPeer::BUDGET_STATUS_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_STATUS_ID, $this->getId());

			if (!isset($this->lastBudgetCriteria) || !$this->lastBudgetCriteria->equals($criteria)) {
				$this->collBudgets = BudgetPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		}
		$this->lastBudgetCriteria = $criteria;

		return $this->collBudgets;
	}


	
	public function getBudgetsJoinPaymentCondition($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgets === null) {
			if ($this->isNew()) {
				$this->collBudgets = array();
			} else {

				$criteria->add(BudgetPeer::BUDGET_STATUS_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinPaymentCondition($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_STATUS_ID, $this->getId());

			if (!isset($this->lastBudgetCriteria) || !$this->lastBudgetCriteria->equals($criteria)) {
				$this->collBudgets = BudgetPeer::doSelectJoinPaymentCondition($criteria, $con);
			}
		}
		$this->lastBudgetCriteria = $criteria;

		return $this->collBudgets;
	}


	
	public function getBudgetsJoinInvoiceCategory($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgets === null) {
			if ($this->isNew()) {
				$this->collBudgets = array();
			} else {

				$criteria->add(BudgetPeer::BUDGET_STATUS_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinInvoiceCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_STATUS_ID, $this->getId());

			if (!isset($this->lastBudgetCriteria) || !$this->lastBudgetCriteria->equals($criteria)) {
				$this->collBudgets = BudgetPeer::doSelectJoinInvoiceCategory($criteria, $con);
			}
		}
		$this->lastBudgetCriteria = $criteria;

		return $this->collBudgets;
	}


	
	public function getBudgetsJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgets === null) {
			if ($this->isNew()) {
				$this->collBudgets = array();
			} else {

				$criteria->add(BudgetPeer::BUDGET_STATUS_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_STATUS_ID, $this->getId());

			if (!isset($this->lastBudgetCriteria) || !$this->lastBudgetCriteria->equals($criteria)) {
				$this->collBudgets = BudgetPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastBudgetCriteria = $criteria;

		return $this->collBudgets;
	}


	
	public function getBudgetsJoinClient($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgets === null) {
			if ($this->isNew()) {
				$this->collBudgets = array();
			} else {

				$criteria->add(BudgetPeer::BUDGET_STATUS_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinClient($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_STATUS_ID, $this->getId());

			if (!isset($this->lastBudgetCriteria) || !$this->lastBudgetCriteria->equals($criteria)) {
				$this->collBudgets = BudgetPeer::doSelectJoinClient($criteria, $con);
			}
		}
		$this->lastBudgetCriteria = $criteria;

		return $this->collBudgets;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseBudgetStatus:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseBudgetStatus::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
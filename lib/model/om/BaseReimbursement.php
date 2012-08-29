<?php


abstract class BaseReimbursement extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $reimbursement_title;

	
	protected $collExpenseItems;

	
	protected $lastExpenseItemCriteria = null;

	
	protected $collIncomeItems;

	
	protected $lastIncomeItemCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getReimbursementTitle()
	{

		return $this->reimbursement_title;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ReimbursementPeer::ID;
		}

	} 
	
	public function setReimbursementTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->reimbursement_title !== $v) {
			$this->reimbursement_title = $v;
			$this->modifiedColumns[] = ReimbursementPeer::REIMBURSEMENT_TITLE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->reimbursement_title = $rs->getString($startcol + 1);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Reimbursement object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseReimbursement:delete:pre') as $callable)
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
			$con = Propel::getConnection(ReimbursementPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ReimbursementPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseReimbursement:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseReimbursement:save:pre') as $callable)
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
			$con = Propel::getConnection(ReimbursementPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseReimbursement:save:post') as $callable)
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
					$pk = ReimbursementPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ReimbursementPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collExpenseItems !== null) {
				foreach($this->collExpenseItems as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collIncomeItems !== null) {
				foreach($this->collIncomeItems as $referrerFK) {
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


			if (($retval = ReimbursementPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collExpenseItems !== null) {
					foreach($this->collExpenseItems as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collIncomeItems !== null) {
					foreach($this->collIncomeItems as $referrerFK) {
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
		$pos = ReimbursementPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getReimbursementTitle();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ReimbursementPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getReimbursementTitle(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ReimbursementPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setReimbursementTitle($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ReimbursementPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setReimbursementTitle($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ReimbursementPeer::DATABASE_NAME);

		if ($this->isColumnModified(ReimbursementPeer::ID)) $criteria->add(ReimbursementPeer::ID, $this->id);
		if ($this->isColumnModified(ReimbursementPeer::REIMBURSEMENT_TITLE)) $criteria->add(ReimbursementPeer::REIMBURSEMENT_TITLE, $this->reimbursement_title);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ReimbursementPeer::DATABASE_NAME);

		$criteria->add(ReimbursementPeer::ID, $this->id);

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

		$copyObj->setReimbursementTitle($this->reimbursement_title);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getExpenseItems() as $relObj) {
				$copyObj->addExpenseItem($relObj->copy($deepCopy));
			}

			foreach($this->getIncomeItems() as $relObj) {
				$copyObj->addIncomeItem($relObj->copy($deepCopy));
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
			self::$peer = new ReimbursementPeer();
		}
		return self::$peer;
	}

	
	public function initExpenseItems()
	{
		if ($this->collExpenseItems === null) {
			$this->collExpenseItems = array();
		}
	}

	
	public function getExpenseItems($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItems === null) {
			if ($this->isNew()) {
			   $this->collExpenseItems = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, $this->getId());

				ExpenseItemPeer::addSelectColumns($criteria);
				$this->collExpenseItems = ExpenseItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, $this->getId());

				ExpenseItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
					$this->collExpenseItems = ExpenseItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastExpenseItemCriteria = $criteria;
		return $this->collExpenseItems;
	}

	
	public function countExpenseItems($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, $this->getId());

		return ExpenseItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addExpenseItem(ExpenseItem $l)
	{
		$this->collExpenseItems[] = $l;
		$l->setReimbursement($this);
	}


	
	public function getExpenseItemsJoinsfGuardUserRelatedByExpensePurchaseBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItems === null) {
			if ($this->isNew()) {
				$this->collExpenseItems = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByExpensePurchaseBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByExpensePurchaseBy($criteria, $con);
			}
		}
		$this->lastExpenseItemCriteria = $criteria;

		return $this->collExpenseItems;
	}


	
	public function getExpenseItemsJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItems === null) {
			if ($this->isNew()) {
				$this->collExpenseItems = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastExpenseItemCriteria = $criteria;

		return $this->collExpenseItems;
	}


	
	public function getExpenseItemsJoinVendor($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItems === null) {
			if ($this->isNew()) {
				$this->collExpenseItems = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinVendor($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinVendor($criteria, $con);
			}
		}
		$this->lastExpenseItemCriteria = $criteria;

		return $this->collExpenseItems;
	}


	
	public function getExpenseItemsJoinsfGuardUserRelatedByExpenseValidateBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItems === null) {
			if ($this->isNew()) {
				$this->collExpenseItems = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByExpenseValidateBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByExpenseValidateBy($criteria, $con);
			}
		}
		$this->lastExpenseItemCriteria = $criteria;

		return $this->collExpenseItems;
	}


	
	public function getExpenseItemsJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItems === null) {
			if ($this->isNew()) {
				$this->collExpenseItems = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		}
		$this->lastExpenseItemCriteria = $criteria;

		return $this->collExpenseItems;
	}


	
	public function getExpenseItemsJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItems === null) {
			if ($this->isNew()) {
				$this->collExpenseItems = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		}
		$this->lastExpenseItemCriteria = $criteria;

		return $this->collExpenseItems;
	}


	
	public function getExpenseItemsJoinsfGuardUserRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItems === null) {
			if ($this->isNew()) {
				$this->collExpenseItems = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		}
		$this->lastExpenseItemCriteria = $criteria;

		return $this->collExpenseItems;
	}


	
	public function getExpenseItemsJoinExpenseCategory($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItems === null) {
			if ($this->isNew()) {
				$this->collExpenseItems = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinExpenseCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinExpenseCategory($criteria, $con);
			}
		}
		$this->lastExpenseItemCriteria = $criteria;

		return $this->collExpenseItems;
	}


	
	public function getExpenseItemsJoinPaymentMethod($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItems === null) {
			if ($this->isNew()) {
				$this->collExpenseItems = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		}
		$this->lastExpenseItemCriteria = $criteria;

		return $this->collExpenseItems;
	}


	
	public function getExpenseItemsJoinBudget($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItems === null) {
			if ($this->isNew()) {
				$this->collExpenseItems = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinBudget($criteria, $con);
			}
		}
		$this->lastExpenseItemCriteria = $criteria;

		return $this->collExpenseItems;
	}

	
	public function initIncomeItems()
	{
		if ($this->collIncomeItems === null) {
			$this->collIncomeItems = array();
		}
	}

	
	public function getIncomeItems($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItems === null) {
			if ($this->isNew()) {
			   $this->collIncomeItems = array();
			} else {

				$criteria->add(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, $this->getId());

				IncomeItemPeer::addSelectColumns($criteria);
				$this->collIncomeItems = IncomeItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, $this->getId());

				IncomeItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastIncomeItemCriteria) || !$this->lastIncomeItemCriteria->equals($criteria)) {
					$this->collIncomeItems = IncomeItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastIncomeItemCriteria = $criteria;
		return $this->collIncomeItems;
	}

	
	public function countIncomeItems($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, $this->getId());

		return IncomeItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addIncomeItem(IncomeItem $l)
	{
		$this->collIncomeItems[] = $l;
		$l->setReimbursement($this);
	}


	
	public function getIncomeItemsJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItems === null) {
			if ($this->isNew()) {
				$this->collIncomeItems = array();
			} else {

				$criteria->add(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, $this->getId());

			if (!isset($this->lastIncomeItemCriteria) || !$this->lastIncomeItemCriteria->equals($criteria)) {
				$this->collIncomeItems = IncomeItemPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		}
		$this->lastIncomeItemCriteria = $criteria;

		return $this->collIncomeItems;
	}


	
	public function getIncomeItemsJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItems === null) {
			if ($this->isNew()) {
				$this->collIncomeItems = array();
			} else {

				$criteria->add(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, $this->getId());

			if (!isset($this->lastIncomeItemCriteria) || !$this->lastIncomeItemCriteria->equals($criteria)) {
				$this->collIncomeItems = IncomeItemPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		}
		$this->lastIncomeItemCriteria = $criteria;

		return $this->collIncomeItems;
	}


	
	public function getIncomeItemsJoinsfGuardUserRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItems === null) {
			if ($this->isNew()) {
				$this->collIncomeItems = array();
			} else {

				$criteria->add(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, $this->getId());

			if (!isset($this->lastIncomeItemCriteria) || !$this->lastIncomeItemCriteria->equals($criteria)) {
				$this->collIncomeItems = IncomeItemPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		}
		$this->lastIncomeItemCriteria = $criteria;

		return $this->collIncomeItems;
	}


	
	public function getIncomeItemsJoinIncomeCategory($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItems === null) {
			if ($this->isNew()) {
				$this->collIncomeItems = array();
			} else {

				$criteria->add(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinIncomeCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, $this->getId());

			if (!isset($this->lastIncomeItemCriteria) || !$this->lastIncomeItemCriteria->equals($criteria)) {
				$this->collIncomeItems = IncomeItemPeer::doSelectJoinIncomeCategory($criteria, $con);
			}
		}
		$this->lastIncomeItemCriteria = $criteria;

		return $this->collIncomeItems;
	}


	
	public function getIncomeItemsJoinPaymentMethod($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItems === null) {
			if ($this->isNew()) {
				$this->collIncomeItems = array();
			} else {

				$criteria->add(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, $this->getId());

			if (!isset($this->lastIncomeItemCriteria) || !$this->lastIncomeItemCriteria->equals($criteria)) {
				$this->collIncomeItems = IncomeItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		}
		$this->lastIncomeItemCriteria = $criteria;

		return $this->collIncomeItems;
	}


	
	public function getIncomeItemsJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItems === null) {
			if ($this->isNew()) {
				$this->collIncomeItems = array();
			} else {

				$criteria->add(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, $this->getId());

			if (!isset($this->lastIncomeItemCriteria) || !$this->lastIncomeItemCriteria->equals($criteria)) {
				$this->collIncomeItems = IncomeItemPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastIncomeItemCriteria = $criteria;

		return $this->collIncomeItems;
	}


	
	public function getIncomeItemsJoinBudget($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItems === null) {
			if ($this->isNew()) {
				$this->collIncomeItems = array();
			} else {

				$criteria->add(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, $this->getId());

			if (!isset($this->lastIncomeItemCriteria) || !$this->lastIncomeItemCriteria->equals($criteria)) {
				$this->collIncomeItems = IncomeItemPeer::doSelectJoinBudget($criteria, $con);
			}
		}
		$this->lastIncomeItemCriteria = $criteria;

		return $this->collIncomeItems;
	}


	
	public function getIncomeItemsJoinVendor($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItems === null) {
			if ($this->isNew()) {
				$this->collIncomeItems = array();
			} else {

				$criteria->add(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinVendor($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, $this->getId());

			if (!isset($this->lastIncomeItemCriteria) || !$this->lastIncomeItemCriteria->equals($criteria)) {
				$this->collIncomeItems = IncomeItemPeer::doSelectJoinVendor($criteria, $con);
			}
		}
		$this->lastIncomeItemCriteria = $criteria;

		return $this->collIncomeItems;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseReimbursement:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseReimbursement::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
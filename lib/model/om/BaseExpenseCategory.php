<?php


abstract class BaseExpenseCategory extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $category_title;

	
	protected $collExpenseItems;

	
	protected $lastExpenseItemCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getCategoryTitle()
	{

		return $this->category_title;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ExpenseCategoryPeer::ID;
		}

	} 
	
	public function setCategoryTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->category_title !== $v) {
			$this->category_title = $v;
			$this->modifiedColumns[] = ExpenseCategoryPeer::CATEGORY_TITLE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->category_title = $rs->getString($startcol + 1);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ExpenseCategory object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseExpenseCategory:delete:pre') as $callable)
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
			$con = Propel::getConnection(ExpenseCategoryPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ExpenseCategoryPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseExpenseCategory:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseExpenseCategory:save:pre') as $callable)
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
			$con = Propel::getConnection(ExpenseCategoryPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseExpenseCategory:save:post') as $callable)
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
					$pk = ExpenseCategoryPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ExpenseCategoryPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collExpenseItems !== null) {
				foreach($this->collExpenseItems as $referrerFK) {
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


			if (($retval = ExpenseCategoryPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collExpenseItems !== null) {
					foreach($this->collExpenseItems as $referrerFK) {
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
		$pos = ExpenseCategoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCategoryTitle();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ExpenseCategoryPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCategoryTitle(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ExpenseCategoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCategoryTitle($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ExpenseCategoryPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCategoryTitle($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ExpenseCategoryPeer::DATABASE_NAME);

		if ($this->isColumnModified(ExpenseCategoryPeer::ID)) $criteria->add(ExpenseCategoryPeer::ID, $this->id);
		if ($this->isColumnModified(ExpenseCategoryPeer::CATEGORY_TITLE)) $criteria->add(ExpenseCategoryPeer::CATEGORY_TITLE, $this->category_title);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ExpenseCategoryPeer::DATABASE_NAME);

		$criteria->add(ExpenseCategoryPeer::ID, $this->id);

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

		$copyObj->setCategoryTitle($this->category_title);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getExpenseItems() as $relObj) {
				$copyObj->addExpenseItem($relObj->copy($deepCopy));
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
			self::$peer = new ExpenseCategoryPeer();
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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, $this->getId());

				ExpenseItemPeer::addSelectColumns($criteria);
				$this->collExpenseItems = ExpenseItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, $this->getId());

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

		$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, $this->getId());

		return ExpenseItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addExpenseItem(ExpenseItem $l)
	{
		$this->collExpenseItems[] = $l;
		$l->setExpenseCategory($this);
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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByExpensePurchaseBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, $this->getId());

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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, $this->getId());

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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinVendor($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, $this->getId());

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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByExpenseValidateBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, $this->getId());

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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, $this->getId());

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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, $this->getId());

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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		}
		$this->lastExpenseItemCriteria = $criteria;

		return $this->collExpenseItems;
	}


	
	public function getExpenseItemsJoinReimbursement($criteria = null, $con = null)
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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinReimbursement($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinReimbursement($criteria, $con);
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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinBudget($criteria, $con);
			}
		}
		$this->lastExpenseItemCriteria = $criteria;

		return $this->collExpenseItems;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseExpenseCategory:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseExpenseCategory::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
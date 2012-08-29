<?php


abstract class BaseTypeOfInvoiceItem extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $type_of_item_title;

	
	protected $collInvoiceItems;

	
	protected $lastInvoiceItemCriteria = null;

	
	protected $collBudgetItems;

	
	protected $lastBudgetItemCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getTypeOfItemTitle()
	{

		return $this->type_of_item_title;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TypeOfInvoiceItemPeer::ID;
		}

	} 
	
	public function setTypeOfItemTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->type_of_item_title !== $v) {
			$this->type_of_item_title = $v;
			$this->modifiedColumns[] = TypeOfInvoiceItemPeer::TYPE_OF_ITEM_TITLE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->type_of_item_title = $rs->getString($startcol + 1);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating TypeOfInvoiceItem object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseTypeOfInvoiceItem:delete:pre') as $callable)
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
			$con = Propel::getConnection(TypeOfInvoiceItemPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TypeOfInvoiceItemPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseTypeOfInvoiceItem:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseTypeOfInvoiceItem:save:pre') as $callable)
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
			$con = Propel::getConnection(TypeOfInvoiceItemPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseTypeOfInvoiceItem:save:post') as $callable)
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
					$pk = TypeOfInvoiceItemPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += TypeOfInvoiceItemPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collInvoiceItems !== null) {
				foreach($this->collInvoiceItems as $referrerFK) {
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


			if (($retval = TypeOfInvoiceItemPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collInvoiceItems !== null) {
					foreach($this->collInvoiceItems as $referrerFK) {
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
		$pos = TypeOfInvoiceItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getTypeOfItemTitle();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TypeOfInvoiceItemPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTypeOfItemTitle(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TypeOfInvoiceItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setTypeOfItemTitle($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TypeOfInvoiceItemPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTypeOfItemTitle($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TypeOfInvoiceItemPeer::DATABASE_NAME);

		if ($this->isColumnModified(TypeOfInvoiceItemPeer::ID)) $criteria->add(TypeOfInvoiceItemPeer::ID, $this->id);
		if ($this->isColumnModified(TypeOfInvoiceItemPeer::TYPE_OF_ITEM_TITLE)) $criteria->add(TypeOfInvoiceItemPeer::TYPE_OF_ITEM_TITLE, $this->type_of_item_title);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TypeOfInvoiceItemPeer::DATABASE_NAME);

		$criteria->add(TypeOfInvoiceItemPeer::ID, $this->id);

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

		$copyObj->setTypeOfItemTitle($this->type_of_item_title);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getInvoiceItems() as $relObj) {
				$copyObj->addInvoiceItem($relObj->copy($deepCopy));
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
			self::$peer = new TypeOfInvoiceItemPeer();
		}
		return self::$peer;
	}

	
	public function initInvoiceItems()
	{
		if ($this->collInvoiceItems === null) {
			$this->collInvoiceItems = array();
		}
	}

	
	public function getInvoiceItems($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoiceItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoiceItems === null) {
			if ($this->isNew()) {
			   $this->collInvoiceItems = array();
			} else {

				$criteria->add(InvoiceItemPeer::ITEM_TYPE_ID, $this->getId());

				InvoiceItemPeer::addSelectColumns($criteria);
				$this->collInvoiceItems = InvoiceItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InvoiceItemPeer::ITEM_TYPE_ID, $this->getId());

				InvoiceItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastInvoiceItemCriteria) || !$this->lastInvoiceItemCriteria->equals($criteria)) {
					$this->collInvoiceItems = InvoiceItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastInvoiceItemCriteria = $criteria;
		return $this->collInvoiceItems;
	}

	
	public function countInvoiceItems($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseInvoiceItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(InvoiceItemPeer::ITEM_TYPE_ID, $this->getId());

		return InvoiceItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInvoiceItem(InvoiceItem $l)
	{
		$this->collInvoiceItems[] = $l;
		$l->setTypeOfInvoiceItem($this);
	}


	
	public function getInvoiceItemsJoinInvoice($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoiceItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoiceItems === null) {
			if ($this->isNew()) {
				$this->collInvoiceItems = array();
			} else {

				$criteria->add(InvoiceItemPeer::ITEM_TYPE_ID, $this->getId());

				$this->collInvoiceItems = InvoiceItemPeer::doSelectJoinInvoice($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoiceItemPeer::ITEM_TYPE_ID, $this->getId());

			if (!isset($this->lastInvoiceItemCriteria) || !$this->lastInvoiceItemCriteria->equals($criteria)) {
				$this->collInvoiceItems = InvoiceItemPeer::doSelectJoinInvoice($criteria, $con);
			}
		}
		$this->lastInvoiceItemCriteria = $criteria;

		return $this->collInvoiceItems;
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

				$criteria->add(BudgetItemPeer::ITEM_TYPE_ID, $this->getId());

				BudgetItemPeer::addSelectColumns($criteria);
				$this->collBudgetItems = BudgetItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(BudgetItemPeer::ITEM_TYPE_ID, $this->getId());

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

		$criteria->add(BudgetItemPeer::ITEM_TYPE_ID, $this->getId());

		return BudgetItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addBudgetItem(BudgetItem $l)
	{
		$this->collBudgetItems[] = $l;
		$l->setTypeOfInvoiceItem($this);
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

				$criteria->add(BudgetItemPeer::ITEM_TYPE_ID, $this->getId());

				$this->collBudgetItems = BudgetItemPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetItemPeer::ITEM_TYPE_ID, $this->getId());

			if (!isset($this->lastBudgetItemCriteria) || !$this->lastBudgetItemCriteria->equals($criteria)) {
				$this->collBudgetItems = BudgetItemPeer::doSelectJoinBudget($criteria, $con);
			}
		}
		$this->lastBudgetItemCriteria = $criteria;

		return $this->collBudgetItems;
	}


	
	public function getBudgetItemsJoinTypeOfHour($criteria = null, $con = null)
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

				$criteria->add(BudgetItemPeer::ITEM_TYPE_ID, $this->getId());

				$this->collBudgetItems = BudgetItemPeer::doSelectJoinTypeOfHour($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetItemPeer::ITEM_TYPE_ID, $this->getId());

			if (!isset($this->lastBudgetItemCriteria) || !$this->lastBudgetItemCriteria->equals($criteria)) {
				$this->collBudgetItems = BudgetItemPeer::doSelectJoinTypeOfHour($criteria, $con);
			}
		}
		$this->lastBudgetItemCriteria = $criteria;

		return $this->collBudgetItems;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseTypeOfInvoiceItem:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseTypeOfInvoiceItem::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
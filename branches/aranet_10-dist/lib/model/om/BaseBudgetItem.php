<?php


abstract class BaseBudgetItem extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $item_order = 0;


	
	protected $item_type_id = 0;


	
	protected $item_is_optional = false;


	
	protected $item_description;


	
	protected $item_quantity = 0;


	
	protected $milestone_task_id = 0;


	
	protected $item_task_id = 0;


	
	protected $item_cost = 0;


	
	protected $item_margin = 0;


	
	protected $item_retail_price = 0;


	
	protected $item_tax_rate = 0;


	
	protected $item_budget_id;


	
	protected $item_budget_type_id = 0;

	
	protected $aTypeOfInvoiceItem;

	
	protected $aBudget;

	
	protected $aTypeOfHour;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getItemOrder()
	{

		return $this->item_order;
	}

	
	public function getItemTypeId()
	{

		return $this->item_type_id;
	}

	
	public function getItemIsOptional()
	{

		return $this->item_is_optional;
	}

	
	public function getItemDescription()
	{

		return $this->item_description;
	}

	
	public function getItemQuantity()
	{

		return $this->item_quantity;
	}

	
	public function getMilestoneTaskId()
	{

		return $this->milestone_task_id;
	}

	
	public function getItemTaskId()
	{

		return $this->item_task_id;
	}

	
	public function getItemCost()
	{

		return $this->item_cost;
	}

	
	public function getItemMargin()
	{

		return $this->item_margin;
	}

	
	public function getItemRetailPrice()
	{

		return $this->item_retail_price;
	}

	
	public function getItemTaxRate()
	{

		return $this->item_tax_rate;
	}

	
	public function getItemBudgetId()
	{

		return $this->item_budget_id;
	}

	
	public function getItemBudgetTypeId()
	{

		return $this->item_budget_type_id;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = BudgetItemPeer::ID;
		}

	} 
	
	public function setItemOrder($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->item_order !== $v || $v === 0) {
			$this->item_order = $v;
			$this->modifiedColumns[] = BudgetItemPeer::ITEM_ORDER;
		}

	} 
	
	public function setItemTypeId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->item_type_id !== $v || $v === 0) {
			$this->item_type_id = $v;
			$this->modifiedColumns[] = BudgetItemPeer::ITEM_TYPE_ID;
		}

		if ($this->aTypeOfInvoiceItem !== null && $this->aTypeOfInvoiceItem->getId() !== $v) {
			$this->aTypeOfInvoiceItem = null;
		}

	} 
	
	public function setItemIsOptional($v)
	{

		if ($this->item_is_optional !== $v || $v === false) {
			$this->item_is_optional = $v;
			$this->modifiedColumns[] = BudgetItemPeer::ITEM_IS_OPTIONAL;
		}

	} 
	
	public function setItemDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->item_description !== $v) {
			$this->item_description = $v;
			$this->modifiedColumns[] = BudgetItemPeer::ITEM_DESCRIPTION;
		}

	} 
	
	public function setItemQuantity($v)
	{

		if ($this->item_quantity !== $v || $v === 0) {
			$this->item_quantity = $v;
			$this->modifiedColumns[] = BudgetItemPeer::ITEM_QUANTITY;
		}

	} 
	
	public function setMilestoneTaskId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->milestone_task_id !== $v || $v === 0) {
			$this->milestone_task_id = $v;
			$this->modifiedColumns[] = BudgetItemPeer::MILESTONE_TASK_ID;
		}

	} 
	
	public function setItemTaskId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->item_task_id !== $v || $v === 0) {
			$this->item_task_id = $v;
			$this->modifiedColumns[] = BudgetItemPeer::ITEM_TASK_ID;
		}

	} 
	
	public function setItemCost($v)
	{

		if ($this->item_cost !== $v || $v === 0) {
			$this->item_cost = $v;
			$this->modifiedColumns[] = BudgetItemPeer::ITEM_COST;
		}

	} 
	
	public function setItemMargin($v)
	{

		if ($this->item_margin !== $v || $v === 0) {
			$this->item_margin = $v;
			$this->modifiedColumns[] = BudgetItemPeer::ITEM_MARGIN;
		}

	} 
	
	public function setItemRetailPrice($v)
	{

		if ($this->item_retail_price !== $v || $v === 0) {
			$this->item_retail_price = $v;
			$this->modifiedColumns[] = BudgetItemPeer::ITEM_RETAIL_PRICE;
		}

	} 
	
	public function setItemTaxRate($v)
	{

		if ($this->item_tax_rate !== $v || $v === 0) {
			$this->item_tax_rate = $v;
			$this->modifiedColumns[] = BudgetItemPeer::ITEM_TAX_RATE;
		}

	} 
	
	public function setItemBudgetId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->item_budget_id !== $v) {
			$this->item_budget_id = $v;
			$this->modifiedColumns[] = BudgetItemPeer::ITEM_BUDGET_ID;
		}

		if ($this->aBudget !== null && $this->aBudget->getId() !== $v) {
			$this->aBudget = null;
		}

	} 
	
	public function setItemBudgetTypeId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->item_budget_type_id !== $v || $v === 0) {
			$this->item_budget_type_id = $v;
			$this->modifiedColumns[] = BudgetItemPeer::ITEM_BUDGET_TYPE_ID;
		}

		if ($this->aTypeOfHour !== null && $this->aTypeOfHour->getId() !== $v) {
			$this->aTypeOfHour = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->item_order = $rs->getInt($startcol + 1);

			$this->item_type_id = $rs->getInt($startcol + 2);

			$this->item_is_optional = $rs->getBoolean($startcol + 3);

			$this->item_description = $rs->getString($startcol + 4);

			$this->item_quantity = $rs->getFloat($startcol + 5);

			$this->milestone_task_id = $rs->getInt($startcol + 6);

			$this->item_task_id = $rs->getInt($startcol + 7);

			$this->item_cost = $rs->getFloat($startcol + 8);

			$this->item_margin = $rs->getFloat($startcol + 9);

			$this->item_retail_price = $rs->getFloat($startcol + 10);

			$this->item_tax_rate = $rs->getFloat($startcol + 11);

			$this->item_budget_id = $rs->getInt($startcol + 12);

			$this->item_budget_type_id = $rs->getInt($startcol + 13);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 14; 
		} catch (Exception $e) {
			throw new PropelException("Error populating BudgetItem object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseBudgetItem:delete:pre') as $callable)
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
			$con = Propel::getConnection(BudgetItemPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BudgetItemPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseBudgetItem:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseBudgetItem:save:pre') as $callable)
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
			$con = Propel::getConnection(BudgetItemPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseBudgetItem:save:post') as $callable)
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


												
			if ($this->aTypeOfInvoiceItem !== null) {
				if ($this->aTypeOfInvoiceItem->isModified()) {
					$affectedRows += $this->aTypeOfInvoiceItem->save($con);
				}
				$this->setTypeOfInvoiceItem($this->aTypeOfInvoiceItem);
			}

			if ($this->aBudget !== null) {
				if ($this->aBudget->isModified()) {
					$affectedRows += $this->aBudget->save($con);
				}
				$this->setBudget($this->aBudget);
			}

			if ($this->aTypeOfHour !== null) {
				if ($this->aTypeOfHour->isModified()) {
					$affectedRows += $this->aTypeOfHour->save($con);
				}
				$this->setTypeOfHour($this->aTypeOfHour);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = BudgetItemPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += BudgetItemPeer::doUpdate($this, $con);
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


												
			if ($this->aTypeOfInvoiceItem !== null) {
				if (!$this->aTypeOfInvoiceItem->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTypeOfInvoiceItem->getValidationFailures());
				}
			}

			if ($this->aBudget !== null) {
				if (!$this->aBudget->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aBudget->getValidationFailures());
				}
			}

			if ($this->aTypeOfHour !== null) {
				if (!$this->aTypeOfHour->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTypeOfHour->getValidationFailures());
				}
			}


			if (($retval = BudgetItemPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BudgetItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getItemOrder();
				break;
			case 2:
				return $this->getItemTypeId();
				break;
			case 3:
				return $this->getItemIsOptional();
				break;
			case 4:
				return $this->getItemDescription();
				break;
			case 5:
				return $this->getItemQuantity();
				break;
			case 6:
				return $this->getMilestoneTaskId();
				break;
			case 7:
				return $this->getItemTaskId();
				break;
			case 8:
				return $this->getItemCost();
				break;
			case 9:
				return $this->getItemMargin();
				break;
			case 10:
				return $this->getItemRetailPrice();
				break;
			case 11:
				return $this->getItemTaxRate();
				break;
			case 12:
				return $this->getItemBudgetId();
				break;
			case 13:
				return $this->getItemBudgetTypeId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BudgetItemPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getItemOrder(),
			$keys[2] => $this->getItemTypeId(),
			$keys[3] => $this->getItemIsOptional(),
			$keys[4] => $this->getItemDescription(),
			$keys[5] => $this->getItemQuantity(),
			$keys[6] => $this->getMilestoneTaskId(),
			$keys[7] => $this->getItemTaskId(),
			$keys[8] => $this->getItemCost(),
			$keys[9] => $this->getItemMargin(),
			$keys[10] => $this->getItemRetailPrice(),
			$keys[11] => $this->getItemTaxRate(),
			$keys[12] => $this->getItemBudgetId(),
			$keys[13] => $this->getItemBudgetTypeId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BudgetItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setItemOrder($value);
				break;
			case 2:
				$this->setItemTypeId($value);
				break;
			case 3:
				$this->setItemIsOptional($value);
				break;
			case 4:
				$this->setItemDescription($value);
				break;
			case 5:
				$this->setItemQuantity($value);
				break;
			case 6:
				$this->setMilestoneTaskId($value);
				break;
			case 7:
				$this->setItemTaskId($value);
				break;
			case 8:
				$this->setItemCost($value);
				break;
			case 9:
				$this->setItemMargin($value);
				break;
			case 10:
				$this->setItemRetailPrice($value);
				break;
			case 11:
				$this->setItemTaxRate($value);
				break;
			case 12:
				$this->setItemBudgetId($value);
				break;
			case 13:
				$this->setItemBudgetTypeId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BudgetItemPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setItemOrder($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setItemTypeId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setItemIsOptional($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setItemDescription($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setItemQuantity($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMilestoneTaskId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setItemTaskId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setItemCost($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setItemMargin($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setItemRetailPrice($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setItemTaxRate($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setItemBudgetId($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setItemBudgetTypeId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BudgetItemPeer::DATABASE_NAME);

		if ($this->isColumnModified(BudgetItemPeer::ID)) $criteria->add(BudgetItemPeer::ID, $this->id);
		if ($this->isColumnModified(BudgetItemPeer::ITEM_ORDER)) $criteria->add(BudgetItemPeer::ITEM_ORDER, $this->item_order);
		if ($this->isColumnModified(BudgetItemPeer::ITEM_TYPE_ID)) $criteria->add(BudgetItemPeer::ITEM_TYPE_ID, $this->item_type_id);
		if ($this->isColumnModified(BudgetItemPeer::ITEM_IS_OPTIONAL)) $criteria->add(BudgetItemPeer::ITEM_IS_OPTIONAL, $this->item_is_optional);
		if ($this->isColumnModified(BudgetItemPeer::ITEM_DESCRIPTION)) $criteria->add(BudgetItemPeer::ITEM_DESCRIPTION, $this->item_description);
		if ($this->isColumnModified(BudgetItemPeer::ITEM_QUANTITY)) $criteria->add(BudgetItemPeer::ITEM_QUANTITY, $this->item_quantity);
		if ($this->isColumnModified(BudgetItemPeer::MILESTONE_TASK_ID)) $criteria->add(BudgetItemPeer::MILESTONE_TASK_ID, $this->milestone_task_id);
		if ($this->isColumnModified(BudgetItemPeer::ITEM_TASK_ID)) $criteria->add(BudgetItemPeer::ITEM_TASK_ID, $this->item_task_id);
		if ($this->isColumnModified(BudgetItemPeer::ITEM_COST)) $criteria->add(BudgetItemPeer::ITEM_COST, $this->item_cost);
		if ($this->isColumnModified(BudgetItemPeer::ITEM_MARGIN)) $criteria->add(BudgetItemPeer::ITEM_MARGIN, $this->item_margin);
		if ($this->isColumnModified(BudgetItemPeer::ITEM_RETAIL_PRICE)) $criteria->add(BudgetItemPeer::ITEM_RETAIL_PRICE, $this->item_retail_price);
		if ($this->isColumnModified(BudgetItemPeer::ITEM_TAX_RATE)) $criteria->add(BudgetItemPeer::ITEM_TAX_RATE, $this->item_tax_rate);
		if ($this->isColumnModified(BudgetItemPeer::ITEM_BUDGET_ID)) $criteria->add(BudgetItemPeer::ITEM_BUDGET_ID, $this->item_budget_id);
		if ($this->isColumnModified(BudgetItemPeer::ITEM_BUDGET_TYPE_ID)) $criteria->add(BudgetItemPeer::ITEM_BUDGET_TYPE_ID, $this->item_budget_type_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BudgetItemPeer::DATABASE_NAME);

		$criteria->add(BudgetItemPeer::ID, $this->id);

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

		$copyObj->setItemOrder($this->item_order);

		$copyObj->setItemTypeId($this->item_type_id);

		$copyObj->setItemIsOptional($this->item_is_optional);

		$copyObj->setItemDescription($this->item_description);

		$copyObj->setItemQuantity($this->item_quantity);

		$copyObj->setMilestoneTaskId($this->milestone_task_id);

		$copyObj->setItemTaskId($this->item_task_id);

		$copyObj->setItemCost($this->item_cost);

		$copyObj->setItemMargin($this->item_margin);

		$copyObj->setItemRetailPrice($this->item_retail_price);

		$copyObj->setItemTaxRate($this->item_tax_rate);

		$copyObj->setItemBudgetId($this->item_budget_id);

		$copyObj->setItemBudgetTypeId($this->item_budget_type_id);


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
			self::$peer = new BudgetItemPeer();
		}
		return self::$peer;
	}

	
	public function setTypeOfInvoiceItem($v)
	{


		if ($v === null) {
			$this->setItemTypeId('null');
		} else {
			$this->setItemTypeId($v->getId());
		}


		$this->aTypeOfInvoiceItem = $v;
	}


	
	public function getTypeOfInvoiceItem($con = null)
	{
		if ($this->aTypeOfInvoiceItem === null && ($this->item_type_id !== null)) {
						include_once 'lib/model/om/BaseTypeOfInvoiceItemPeer.php';

			$this->aTypeOfInvoiceItem = TypeOfInvoiceItemPeer::retrieveByPK($this->item_type_id, $con);

			
		}
		return $this->aTypeOfInvoiceItem;
	}

	
	public function setBudget($v)
	{


		if ($v === null) {
			$this->setItemBudgetId(NULL);
		} else {
			$this->setItemBudgetId($v->getId());
		}


		$this->aBudget = $v;
	}


	
	public function getBudget($con = null)
	{
		if ($this->aBudget === null && ($this->item_budget_id !== null)) {
						include_once 'lib/model/om/BaseBudgetPeer.php';

			$this->aBudget = BudgetPeer::retrieveByPK($this->item_budget_id, $con);

			
		}
		return $this->aBudget;
	}

	
	public function setTypeOfHour($v)
	{


		if ($v === null) {
			$this->setItemBudgetTypeId('null');
		} else {
			$this->setItemBudgetTypeId($v->getId());
		}


		$this->aTypeOfHour = $v;
	}


	
	public function getTypeOfHour($con = null)
	{
		if ($this->aTypeOfHour === null && ($this->item_budget_type_id !== null)) {
						include_once 'lib/model/om/BaseTypeOfHourPeer.php';

			$this->aTypeOfHour = TypeOfHourPeer::retrieveByPK($this->item_budget_type_id, $con);

			
		}
		return $this->aTypeOfHour;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseBudgetItem:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseBudgetItem::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
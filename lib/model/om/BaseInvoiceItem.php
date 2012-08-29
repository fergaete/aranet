<?php


abstract class BaseInvoiceItem extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $item_type_id;


	
	protected $item_description;


	
	protected $item_quantity = 0;


	
	protected $item_cost = 0;


	
	protected $item_tax_rate = 0;


	
	protected $item_invoice_id;

	
	protected $aTypeOfInvoiceItem;

	
	protected $aInvoice;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getItemTypeId()
	{

		return $this->item_type_id;
	}

	
	public function getItemDescription()
	{

		return $this->item_description;
	}

	
	public function getItemQuantity()
	{

		return $this->item_quantity;
	}

	
	public function getItemCost()
	{

		return $this->item_cost;
	}

	
	public function getItemTaxRate()
	{

		return $this->item_tax_rate;
	}

	
	public function getItemInvoiceId()
	{

		return $this->item_invoice_id;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = InvoiceItemPeer::ID;
		}

	} 
	
	public function setItemTypeId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->item_type_id !== $v) {
			$this->item_type_id = $v;
			$this->modifiedColumns[] = InvoiceItemPeer::ITEM_TYPE_ID;
		}

		if ($this->aTypeOfInvoiceItem !== null && $this->aTypeOfInvoiceItem->getId() !== $v) {
			$this->aTypeOfInvoiceItem = null;
		}

	} 
	
	public function setItemDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->item_description !== $v) {
			$this->item_description = $v;
			$this->modifiedColumns[] = InvoiceItemPeer::ITEM_DESCRIPTION;
		}

	} 
	
	public function setItemQuantity($v)
	{

		if ($this->item_quantity !== $v || $v === 0) {
			$this->item_quantity = $v;
			$this->modifiedColumns[] = InvoiceItemPeer::ITEM_QUANTITY;
		}

	} 
	
	public function setItemCost($v)
	{

		if ($this->item_cost !== $v || $v === 0) {
			$this->item_cost = $v;
			$this->modifiedColumns[] = InvoiceItemPeer::ITEM_COST;
		}

	} 
	
	public function setItemTaxRate($v)
	{

		if ($this->item_tax_rate !== $v || $v === 0) {
			$this->item_tax_rate = $v;
			$this->modifiedColumns[] = InvoiceItemPeer::ITEM_TAX_RATE;
		}

	} 
	
	public function setItemInvoiceId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->item_invoice_id !== $v) {
			$this->item_invoice_id = $v;
			$this->modifiedColumns[] = InvoiceItemPeer::ITEM_INVOICE_ID;
		}

		if ($this->aInvoice !== null && $this->aInvoice->getId() !== $v) {
			$this->aInvoice = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->item_type_id = $rs->getInt($startcol + 1);

			$this->item_description = $rs->getString($startcol + 2);

			$this->item_quantity = $rs->getFloat($startcol + 3);

			$this->item_cost = $rs->getFloat($startcol + 4);

			$this->item_tax_rate = $rs->getFloat($startcol + 5);

			$this->item_invoice_id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating InvoiceItem object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseInvoiceItem:delete:pre') as $callable)
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
			$con = Propel::getConnection(InvoiceItemPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			InvoiceItemPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseInvoiceItem:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseInvoiceItem:save:pre') as $callable)
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
			$con = Propel::getConnection(InvoiceItemPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseInvoiceItem:save:post') as $callable)
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

			if ($this->aInvoice !== null) {
				if ($this->aInvoice->isModified()) {
					$affectedRows += $this->aInvoice->save($con);
				}
				$this->setInvoice($this->aInvoice);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = InvoiceItemPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += InvoiceItemPeer::doUpdate($this, $con);
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

			if ($this->aInvoice !== null) {
				if (!$this->aInvoice->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aInvoice->getValidationFailures());
				}
			}


			if (($retval = InvoiceItemPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InvoiceItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getItemTypeId();
				break;
			case 2:
				return $this->getItemDescription();
				break;
			case 3:
				return $this->getItemQuantity();
				break;
			case 4:
				return $this->getItemCost();
				break;
			case 5:
				return $this->getItemTaxRate();
				break;
			case 6:
				return $this->getItemInvoiceId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InvoiceItemPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getItemTypeId(),
			$keys[2] => $this->getItemDescription(),
			$keys[3] => $this->getItemQuantity(),
			$keys[4] => $this->getItemCost(),
			$keys[5] => $this->getItemTaxRate(),
			$keys[6] => $this->getItemInvoiceId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InvoiceItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setItemTypeId($value);
				break;
			case 2:
				$this->setItemDescription($value);
				break;
			case 3:
				$this->setItemQuantity($value);
				break;
			case 4:
				$this->setItemCost($value);
				break;
			case 5:
				$this->setItemTaxRate($value);
				break;
			case 6:
				$this->setItemInvoiceId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InvoiceItemPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setItemTypeId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setItemDescription($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setItemQuantity($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setItemCost($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setItemTaxRate($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setItemInvoiceId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(InvoiceItemPeer::DATABASE_NAME);

		if ($this->isColumnModified(InvoiceItemPeer::ID)) $criteria->add(InvoiceItemPeer::ID, $this->id);
		if ($this->isColumnModified(InvoiceItemPeer::ITEM_TYPE_ID)) $criteria->add(InvoiceItemPeer::ITEM_TYPE_ID, $this->item_type_id);
		if ($this->isColumnModified(InvoiceItemPeer::ITEM_DESCRIPTION)) $criteria->add(InvoiceItemPeer::ITEM_DESCRIPTION, $this->item_description);
		if ($this->isColumnModified(InvoiceItemPeer::ITEM_QUANTITY)) $criteria->add(InvoiceItemPeer::ITEM_QUANTITY, $this->item_quantity);
		if ($this->isColumnModified(InvoiceItemPeer::ITEM_COST)) $criteria->add(InvoiceItemPeer::ITEM_COST, $this->item_cost);
		if ($this->isColumnModified(InvoiceItemPeer::ITEM_TAX_RATE)) $criteria->add(InvoiceItemPeer::ITEM_TAX_RATE, $this->item_tax_rate);
		if ($this->isColumnModified(InvoiceItemPeer::ITEM_INVOICE_ID)) $criteria->add(InvoiceItemPeer::ITEM_INVOICE_ID, $this->item_invoice_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(InvoiceItemPeer::DATABASE_NAME);

		$criteria->add(InvoiceItemPeer::ID, $this->id);

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

		$copyObj->setItemTypeId($this->item_type_id);

		$copyObj->setItemDescription($this->item_description);

		$copyObj->setItemQuantity($this->item_quantity);

		$copyObj->setItemCost($this->item_cost);

		$copyObj->setItemTaxRate($this->item_tax_rate);

		$copyObj->setItemInvoiceId($this->item_invoice_id);


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
			self::$peer = new InvoiceItemPeer();
		}
		return self::$peer;
	}

	
	public function setTypeOfInvoiceItem($v)
	{


		if ($v === null) {
			$this->setItemTypeId(NULL);
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

	
	public function setInvoice($v)
	{


		if ($v === null) {
			$this->setItemInvoiceId(NULL);
		} else {
			$this->setItemInvoiceId($v->getId());
		}


		$this->aInvoice = $v;
	}


	
	public function getInvoice($con = null)
	{
		if ($this->aInvoice === null && ($this->item_invoice_id !== null)) {
						include_once 'lib/model/om/BaseInvoicePeer.php';

			$this->aInvoice = InvoicePeer::retrieveByPK($this->item_invoice_id, $con);

			
		}
		return $this->aInvoice;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseInvoiceItem:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseInvoiceItem::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
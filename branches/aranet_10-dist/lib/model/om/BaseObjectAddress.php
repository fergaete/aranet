<?php


abstract class BaseObjectAddress extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $objectaddress_name;


	
	protected $objectaddress_address_id;


	
	protected $objectaddress_object_id;


	
	protected $objectaddress_object_class;


	
	protected $objectaddress_type;


	
	protected $objectaddress_is_default = false;

	
	protected $aAddress;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getObjectaddressName()
	{

		return $this->objectaddress_name;
	}

	
	public function getObjectaddressAddressId()
	{

		return $this->objectaddress_address_id;
	}

	
	public function getObjectaddressObjectId()
	{

		return $this->objectaddress_object_id;
	}

	
	public function getObjectaddressObjectClass()
	{

		return $this->objectaddress_object_class;
	}

	
	public function getObjectaddressType()
	{

		return $this->objectaddress_type;
	}

	
	public function getObjectaddressIsDefault()
	{

		return $this->objectaddress_is_default;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ObjectAddressPeer::ID;
		}

	} 
	
	public function setObjectaddressName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->objectaddress_name !== $v) {
			$this->objectaddress_name = $v;
			$this->modifiedColumns[] = ObjectAddressPeer::OBJECTADDRESS_NAME;
		}

	} 
	
	public function setObjectaddressAddressId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->objectaddress_address_id !== $v) {
			$this->objectaddress_address_id = $v;
			$this->modifiedColumns[] = ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID;
		}

		if ($this->aAddress !== null && $this->aAddress->getId() !== $v) {
			$this->aAddress = null;
		}

	} 
	
	public function setObjectaddressObjectId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->objectaddress_object_id !== $v) {
			$this->objectaddress_object_id = $v;
			$this->modifiedColumns[] = ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID;
		}

	} 
	
	public function setObjectaddressObjectClass($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->objectaddress_object_class !== $v) {
			$this->objectaddress_object_class = $v;
			$this->modifiedColumns[] = ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS;
		}

	} 
	
	public function setObjectaddressType($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->objectaddress_type !== $v) {
			$this->objectaddress_type = $v;
			$this->modifiedColumns[] = ObjectAddressPeer::OBJECTADDRESS_TYPE;
		}

	} 
	
	public function setObjectaddressIsDefault($v)
	{

		if ($this->objectaddress_is_default !== $v || $v === false) {
			$this->objectaddress_is_default = $v;
			$this->modifiedColumns[] = ObjectAddressPeer::OBJECTADDRESS_IS_DEFAULT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->objectaddress_name = $rs->getString($startcol + 1);

			$this->objectaddress_address_id = $rs->getInt($startcol + 2);

			$this->objectaddress_object_id = $rs->getInt($startcol + 3);

			$this->objectaddress_object_class = $rs->getString($startcol + 4);

			$this->objectaddress_type = $rs->getString($startcol + 5);

			$this->objectaddress_is_default = $rs->getBoolean($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ObjectAddress object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseObjectAddress:delete:pre') as $callable)
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
			$con = Propel::getConnection(ObjectAddressPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ObjectAddressPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseObjectAddress:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseObjectAddress:save:pre') as $callable)
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
			$con = Propel::getConnection(ObjectAddressPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseObjectAddress:save:post') as $callable)
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


												
			if ($this->aAddress !== null) {
				if ($this->aAddress->isModified()) {
					$affectedRows += $this->aAddress->save($con);
				}
				$this->setAddress($this->aAddress);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ObjectAddressPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ObjectAddressPeer::doUpdate($this, $con);
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


												
			if ($this->aAddress !== null) {
				if (!$this->aAddress->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAddress->getValidationFailures());
				}
			}


			if (($retval = ObjectAddressPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ObjectAddressPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getObjectaddressName();
				break;
			case 2:
				return $this->getObjectaddressAddressId();
				break;
			case 3:
				return $this->getObjectaddressObjectId();
				break;
			case 4:
				return $this->getObjectaddressObjectClass();
				break;
			case 5:
				return $this->getObjectaddressType();
				break;
			case 6:
				return $this->getObjectaddressIsDefault();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ObjectAddressPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getObjectaddressName(),
			$keys[2] => $this->getObjectaddressAddressId(),
			$keys[3] => $this->getObjectaddressObjectId(),
			$keys[4] => $this->getObjectaddressObjectClass(),
			$keys[5] => $this->getObjectaddressType(),
			$keys[6] => $this->getObjectaddressIsDefault(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ObjectAddressPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setObjectaddressName($value);
				break;
			case 2:
				$this->setObjectaddressAddressId($value);
				break;
			case 3:
				$this->setObjectaddressObjectId($value);
				break;
			case 4:
				$this->setObjectaddressObjectClass($value);
				break;
			case 5:
				$this->setObjectaddressType($value);
				break;
			case 6:
				$this->setObjectaddressIsDefault($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ObjectAddressPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setObjectaddressName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setObjectaddressAddressId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setObjectaddressObjectId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setObjectaddressObjectClass($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setObjectaddressType($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setObjectaddressIsDefault($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ObjectAddressPeer::DATABASE_NAME);

		if ($this->isColumnModified(ObjectAddressPeer::ID)) $criteria->add(ObjectAddressPeer::ID, $this->id);
		if ($this->isColumnModified(ObjectAddressPeer::OBJECTADDRESS_NAME)) $criteria->add(ObjectAddressPeer::OBJECTADDRESS_NAME, $this->objectaddress_name);
		if ($this->isColumnModified(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID)) $criteria->add(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID, $this->objectaddress_address_id);
		if ($this->isColumnModified(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID)) $criteria->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, $this->objectaddress_object_id);
		if ($this->isColumnModified(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS)) $criteria->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, $this->objectaddress_object_class);
		if ($this->isColumnModified(ObjectAddressPeer::OBJECTADDRESS_TYPE)) $criteria->add(ObjectAddressPeer::OBJECTADDRESS_TYPE, $this->objectaddress_type);
		if ($this->isColumnModified(ObjectAddressPeer::OBJECTADDRESS_IS_DEFAULT)) $criteria->add(ObjectAddressPeer::OBJECTADDRESS_IS_DEFAULT, $this->objectaddress_is_default);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ObjectAddressPeer::DATABASE_NAME);

		$criteria->add(ObjectAddressPeer::ID, $this->id);

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

		$copyObj->setObjectaddressName($this->objectaddress_name);

		$copyObj->setObjectaddressAddressId($this->objectaddress_address_id);

		$copyObj->setObjectaddressObjectId($this->objectaddress_object_id);

		$copyObj->setObjectaddressObjectClass($this->objectaddress_object_class);

		$copyObj->setObjectaddressType($this->objectaddress_type);

		$copyObj->setObjectaddressIsDefault($this->objectaddress_is_default);


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
			self::$peer = new ObjectAddressPeer();
		}
		return self::$peer;
	}

	
	public function setAddress($v)
	{


		if ($v === null) {
			$this->setObjectaddressAddressId(NULL);
		} else {
			$this->setObjectaddressAddressId($v->getId());
		}


		$this->aAddress = $v;
	}


	
	public function getAddress($con = null)
	{
		if ($this->aAddress === null && ($this->objectaddress_address_id !== null)) {
						include_once 'lib/model/om/BaseAddressPeer.php';

			$this->aAddress = AddressPeer::retrieveByPK($this->objectaddress_address_id, $con);

			
		}
		return $this->aAddress;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseObjectAddress:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseObjectAddress::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
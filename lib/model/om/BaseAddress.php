<?php


abstract class BaseAddress extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $address_line1;


	
	protected $address_line2;


	
	protected $address_location;


	
	protected $address_state;


	
	protected $address_postal_code;


	
	protected $address_country;

	
	protected $collObjectAddresss;

	
	protected $lastObjectAddressCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getAddressLine1()
	{

		return $this->address_line1;
	}

	
	public function getAddressLine2()
	{

		return $this->address_line2;
	}

	
	public function getAddressLocation()
	{

		return $this->address_location;
	}

	
	public function getAddressState()
	{

		return $this->address_state;
	}

	
	public function getAddressPostalCode()
	{

		return $this->address_postal_code;
	}

	
	public function getAddressCountry()
	{

		return $this->address_country;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AddressPeer::ID;
		}

	} 
	
	public function setAddressLine1($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->address_line1 !== $v) {
			$this->address_line1 = $v;
			$this->modifiedColumns[] = AddressPeer::ADDRESS_LINE1;
		}

	} 
	
	public function setAddressLine2($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->address_line2 !== $v) {
			$this->address_line2 = $v;
			$this->modifiedColumns[] = AddressPeer::ADDRESS_LINE2;
		}

	} 
	
	public function setAddressLocation($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->address_location !== $v) {
			$this->address_location = $v;
			$this->modifiedColumns[] = AddressPeer::ADDRESS_LOCATION;
		}

	} 
	
	public function setAddressState($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->address_state !== $v) {
			$this->address_state = $v;
			$this->modifiedColumns[] = AddressPeer::ADDRESS_STATE;
		}

	} 
	
	public function setAddressPostalCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->address_postal_code !== $v) {
			$this->address_postal_code = $v;
			$this->modifiedColumns[] = AddressPeer::ADDRESS_POSTAL_CODE;
		}

	} 
	
	public function setAddressCountry($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->address_country !== $v) {
			$this->address_country = $v;
			$this->modifiedColumns[] = AddressPeer::ADDRESS_COUNTRY;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->address_line1 = $rs->getString($startcol + 1);

			$this->address_line2 = $rs->getString($startcol + 2);

			$this->address_location = $rs->getString($startcol + 3);

			$this->address_state = $rs->getString($startcol + 4);

			$this->address_postal_code = $rs->getString($startcol + 5);

			$this->address_country = $rs->getString($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Address object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseAddress:delete:pre') as $callable)
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
			$con = Propel::getConnection(AddressPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AddressPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseAddress:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseAddress:save:pre') as $callable)
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
			$con = Propel::getConnection(AddressPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseAddress:save:post') as $callable)
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
					$pk = AddressPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AddressPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collObjectAddresss !== null) {
				foreach($this->collObjectAddresss as $referrerFK) {
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


			if (($retval = AddressPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collObjectAddresss !== null) {
					foreach($this->collObjectAddresss as $referrerFK) {
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
		$pos = AddressPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getAddressLine1();
				break;
			case 2:
				return $this->getAddressLine2();
				break;
			case 3:
				return $this->getAddressLocation();
				break;
			case 4:
				return $this->getAddressState();
				break;
			case 5:
				return $this->getAddressPostalCode();
				break;
			case 6:
				return $this->getAddressCountry();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AddressPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getAddressLine1(),
			$keys[2] => $this->getAddressLine2(),
			$keys[3] => $this->getAddressLocation(),
			$keys[4] => $this->getAddressState(),
			$keys[5] => $this->getAddressPostalCode(),
			$keys[6] => $this->getAddressCountry(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AddressPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setAddressLine1($value);
				break;
			case 2:
				$this->setAddressLine2($value);
				break;
			case 3:
				$this->setAddressLocation($value);
				break;
			case 4:
				$this->setAddressState($value);
				break;
			case 5:
				$this->setAddressPostalCode($value);
				break;
			case 6:
				$this->setAddressCountry($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AddressPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAddressLine1($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAddressLine2($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAddressLocation($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAddressState($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAddressPostalCode($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAddressCountry($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AddressPeer::DATABASE_NAME);

		if ($this->isColumnModified(AddressPeer::ID)) $criteria->add(AddressPeer::ID, $this->id);
		if ($this->isColumnModified(AddressPeer::ADDRESS_LINE1)) $criteria->add(AddressPeer::ADDRESS_LINE1, $this->address_line1);
		if ($this->isColumnModified(AddressPeer::ADDRESS_LINE2)) $criteria->add(AddressPeer::ADDRESS_LINE2, $this->address_line2);
		if ($this->isColumnModified(AddressPeer::ADDRESS_LOCATION)) $criteria->add(AddressPeer::ADDRESS_LOCATION, $this->address_location);
		if ($this->isColumnModified(AddressPeer::ADDRESS_STATE)) $criteria->add(AddressPeer::ADDRESS_STATE, $this->address_state);
		if ($this->isColumnModified(AddressPeer::ADDRESS_POSTAL_CODE)) $criteria->add(AddressPeer::ADDRESS_POSTAL_CODE, $this->address_postal_code);
		if ($this->isColumnModified(AddressPeer::ADDRESS_COUNTRY)) $criteria->add(AddressPeer::ADDRESS_COUNTRY, $this->address_country);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AddressPeer::DATABASE_NAME);

		$criteria->add(AddressPeer::ID, $this->id);

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

		$copyObj->setAddressLine1($this->address_line1);

		$copyObj->setAddressLine2($this->address_line2);

		$copyObj->setAddressLocation($this->address_location);

		$copyObj->setAddressState($this->address_state);

		$copyObj->setAddressPostalCode($this->address_postal_code);

		$copyObj->setAddressCountry($this->address_country);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getObjectAddresss() as $relObj) {
				$copyObj->addObjectAddress($relObj->copy($deepCopy));
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
			self::$peer = new AddressPeer();
		}
		return self::$peer;
	}

	
	public function initObjectAddresss()
	{
		if ($this->collObjectAddresss === null) {
			$this->collObjectAddresss = array();
		}
	}

	
	public function getObjectAddresss($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseObjectAddressPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collObjectAddresss === null) {
			if ($this->isNew()) {
			   $this->collObjectAddresss = array();
			} else {

				$criteria->add(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID, $this->getId());

				ObjectAddressPeer::addSelectColumns($criteria);
				$this->collObjectAddresss = ObjectAddressPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID, $this->getId());

				ObjectAddressPeer::addSelectColumns($criteria);
				if (!isset($this->lastObjectAddressCriteria) || !$this->lastObjectAddressCriteria->equals($criteria)) {
					$this->collObjectAddresss = ObjectAddressPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastObjectAddressCriteria = $criteria;
		return $this->collObjectAddresss;
	}

	
	public function countObjectAddresss($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseObjectAddressPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID, $this->getId());

		return ObjectAddressPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addObjectAddress(ObjectAddress $l)
	{
		$this->collObjectAddresss[] = $l;
		$l->setAddress($this);
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseAddress:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseAddress::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
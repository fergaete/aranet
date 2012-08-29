<?php


abstract class BasesfAudit extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $remote_ip_address;


	
	protected $object;


	
	protected $object_key;


	
	protected $object_changes;


	
	protected $query;


	
	protected $user;


	
	protected $type;


	
	protected $created_at;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getID()
	{

		return $this->id;
	}

	
	public function getRemoteIpAddress()
	{

		return $this->remote_ip_address;
	}

	
	public function getObject()
	{

		return $this->object;
	}

	
	public function getObjectKey()
	{

		return $this->object_key;
	}

	
	public function getObjectChanges()
	{

		return $this->object_changes;
	}

	
	public function getQuery()
	{

		return $this->query;
	}

	
	public function getUser()
	{

		return $this->user;
	}

	
	public function getType()
	{

		return $this->type;
	}

	
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->created_at === null || $this->created_at === '') {
			return null;
		} elseif (!is_int($this->created_at)) {
						$ts = strtotime($this->created_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
			}
		} else {
			$ts = $this->created_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function setID($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = sfAuditPeer::ID;
		}

	} 
	
	public function setRemoteIpAddress($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remote_ip_address !== $v) {
			$this->remote_ip_address = $v;
			$this->modifiedColumns[] = sfAuditPeer::REMOTE_IP_ADDRESS;
		}

	} 
	
	public function setObject($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->object !== $v) {
			$this->object = $v;
			$this->modifiedColumns[] = sfAuditPeer::OBJECT;
		}

	} 
	
	public function setObjectKey($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->object_key !== $v) {
			$this->object_key = $v;
			$this->modifiedColumns[] = sfAuditPeer::OBJECT_KEY;
		}

	} 
	
	public function setObjectChanges($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->object_changes !== $v) {
			$this->object_changes = $v;
			$this->modifiedColumns[] = sfAuditPeer::OBJECT_CHANGES;
		}

	} 
	
	public function setQuery($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->query !== $v) {
			$this->query = $v;
			$this->modifiedColumns[] = sfAuditPeer::QUERY;
		}

	} 
	
	public function setUser($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->user !== $v) {
			$this->user = $v;
			$this->modifiedColumns[] = sfAuditPeer::USER;
		}

	} 
	
	public function setType($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = sfAuditPeer::TYPE;
		}

	} 
	
	public function setCreatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->created_at !== $ts) {
			$this->created_at = $ts;
			$this->modifiedColumns[] = sfAuditPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->remote_ip_address = $rs->getString($startcol + 1);

			$this->object = $rs->getString($startcol + 2);

			$this->object_key = $rs->getString($startcol + 3);

			$this->object_changes = $rs->getString($startcol + 4);

			$this->query = $rs->getString($startcol + 5);

			$this->user = $rs->getString($startcol + 6);

			$this->type = $rs->getString($startcol + 7);

			$this->created_at = $rs->getTimestamp($startcol + 8, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating sfAudit object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BasesfAudit:delete:pre') as $callable)
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
			$con = Propel::getConnection(sfAuditPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			sfAuditPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasesfAudit:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BasesfAudit:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(sfAuditPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(sfAuditPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasesfAudit:save:post') as $callable)
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
					$pk = sfAuditPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setID($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += sfAuditPeer::doUpdate($this, $con);
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


			if (($retval = sfAuditPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfAuditPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getID();
				break;
			case 1:
				return $this->getRemoteIpAddress();
				break;
			case 2:
				return $this->getObject();
				break;
			case 3:
				return $this->getObjectKey();
				break;
			case 4:
				return $this->getObjectChanges();
				break;
			case 5:
				return $this->getQuery();
				break;
			case 6:
				return $this->getUser();
				break;
			case 7:
				return $this->getType();
				break;
			case 8:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfAuditPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getID(),
			$keys[1] => $this->getRemoteIpAddress(),
			$keys[2] => $this->getObject(),
			$keys[3] => $this->getObjectKey(),
			$keys[4] => $this->getObjectChanges(),
			$keys[5] => $this->getQuery(),
			$keys[6] => $this->getUser(),
			$keys[7] => $this->getType(),
			$keys[8] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfAuditPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setID($value);
				break;
			case 1:
				$this->setRemoteIpAddress($value);
				break;
			case 2:
				$this->setObject($value);
				break;
			case 3:
				$this->setObjectKey($value);
				break;
			case 4:
				$this->setObjectChanges($value);
				break;
			case 5:
				$this->setQuery($value);
				break;
			case 6:
				$this->setUser($value);
				break;
			case 7:
				$this->setType($value);
				break;
			case 8:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfAuditPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setID($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRemoteIpAddress($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setObject($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setObjectKey($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setObjectChanges($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setQuery($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUser($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setType($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCreatedAt($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(sfAuditPeer::DATABASE_NAME);

		if ($this->isColumnModified(sfAuditPeer::ID)) $criteria->add(sfAuditPeer::ID, $this->id);
		if ($this->isColumnModified(sfAuditPeer::REMOTE_IP_ADDRESS)) $criteria->add(sfAuditPeer::REMOTE_IP_ADDRESS, $this->remote_ip_address);
		if ($this->isColumnModified(sfAuditPeer::OBJECT)) $criteria->add(sfAuditPeer::OBJECT, $this->object);
		if ($this->isColumnModified(sfAuditPeer::OBJECT_KEY)) $criteria->add(sfAuditPeer::OBJECT_KEY, $this->object_key);
		if ($this->isColumnModified(sfAuditPeer::OBJECT_CHANGES)) $criteria->add(sfAuditPeer::OBJECT_CHANGES, $this->object_changes);
		if ($this->isColumnModified(sfAuditPeer::QUERY)) $criteria->add(sfAuditPeer::QUERY, $this->query);
		if ($this->isColumnModified(sfAuditPeer::USER)) $criteria->add(sfAuditPeer::USER, $this->user);
		if ($this->isColumnModified(sfAuditPeer::TYPE)) $criteria->add(sfAuditPeer::TYPE, $this->type);
		if ($this->isColumnModified(sfAuditPeer::CREATED_AT)) $criteria->add(sfAuditPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(sfAuditPeer::DATABASE_NAME);

		$criteria->add(sfAuditPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getID();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setID($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setRemoteIpAddress($this->remote_ip_address);

		$copyObj->setObject($this->object);

		$copyObj->setObjectKey($this->object_key);

		$copyObj->setObjectChanges($this->object_changes);

		$copyObj->setQuery($this->query);

		$copyObj->setUser($this->user);

		$copyObj->setType($this->type);

		$copyObj->setCreatedAt($this->created_at);


		$copyObj->setNew(true);

		$copyObj->setID(NULL); 
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
			self::$peer = new sfAuditPeer();
		}
		return self::$peer;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BasesfAudit:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasesfAudit::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
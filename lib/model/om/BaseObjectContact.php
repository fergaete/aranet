<?php


abstract class BaseObjectContact extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $objectcontact_contact_id;


	
	protected $objectcontact_object_id;


	
	protected $objectcontact_object_class;


	
	protected $objectcontact_rol;


	
	protected $objectcontact_is_default = false;


	
	protected $created_at;


	
	protected $created_by = 0;


	
	protected $updated_at;


	
	protected $updated_by = 0;

	
	protected $aContact;

	
	protected $asfGuardUserRelatedByCreatedBy;

	
	protected $asfGuardUserRelatedByUpdatedBy;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getObjectcontactContactId()
	{

		return $this->objectcontact_contact_id;
	}

	
	public function getObjectcontactObjectId()
	{

		return $this->objectcontact_object_id;
	}

	
	public function getObjectcontactObjectClass()
	{

		return $this->objectcontact_object_class;
	}

	
	public function getObjectcontactRol()
	{

		return $this->objectcontact_rol;
	}

	
	public function getObjectcontactIsDefault()
	{

		return $this->objectcontact_is_default;
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

	
	public function getCreatedBy()
	{

		return $this->created_by;
	}

	
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->updated_at === null || $this->updated_at === '') {
			return null;
		} elseif (!is_int($this->updated_at)) {
						$ts = strtotime($this->updated_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [updated_at] as date/time value: " . var_export($this->updated_at, true));
			}
		} else {
			$ts = $this->updated_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getUpdatedBy()
	{

		return $this->updated_by;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ObjectContactPeer::ID;
		}

	} 
	
	public function setObjectcontactContactId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->objectcontact_contact_id !== $v) {
			$this->objectcontact_contact_id = $v;
			$this->modifiedColumns[] = ObjectContactPeer::OBJECTCONTACT_CONTACT_ID;
		}

		if ($this->aContact !== null && $this->aContact->getId() !== $v) {
			$this->aContact = null;
		}

	} 
	
	public function setObjectcontactObjectId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->objectcontact_object_id !== $v) {
			$this->objectcontact_object_id = $v;
			$this->modifiedColumns[] = ObjectContactPeer::OBJECTCONTACT_OBJECT_ID;
		}

	} 
	
	public function setObjectcontactObjectClass($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->objectcontact_object_class !== $v) {
			$this->objectcontact_object_class = $v;
			$this->modifiedColumns[] = ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS;
		}

	} 
	
	public function setObjectcontactRol($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->objectcontact_rol !== $v) {
			$this->objectcontact_rol = $v;
			$this->modifiedColumns[] = ObjectContactPeer::OBJECTCONTACT_ROL;
		}

	} 
	
	public function setObjectcontactIsDefault($v)
	{

		if ($this->objectcontact_is_default !== $v || $v === false) {
			$this->objectcontact_is_default = $v;
			$this->modifiedColumns[] = ObjectContactPeer::OBJECTCONTACT_IS_DEFAULT;
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
			$this->modifiedColumns[] = ObjectContactPeer::CREATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v || $v === 0) {
			$this->created_by = $v;
			$this->modifiedColumns[] = ObjectContactPeer::CREATED_BY;
		}

		if ($this->asfGuardUserRelatedByCreatedBy !== null && $this->asfGuardUserRelatedByCreatedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByCreatedBy = null;
		}

	} 
	
	public function setUpdatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [updated_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->updated_at !== $ts) {
			$this->updated_at = $ts;
			$this->modifiedColumns[] = ObjectContactPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v || $v === 0) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = ObjectContactPeer::UPDATED_BY;
		}

		if ($this->asfGuardUserRelatedByUpdatedBy !== null && $this->asfGuardUserRelatedByUpdatedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByUpdatedBy = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->objectcontact_contact_id = $rs->getInt($startcol + 1);

			$this->objectcontact_object_id = $rs->getInt($startcol + 2);

			$this->objectcontact_object_class = $rs->getString($startcol + 3);

			$this->objectcontact_rol = $rs->getString($startcol + 4);

			$this->objectcontact_is_default = $rs->getBoolean($startcol + 5);

			$this->created_at = $rs->getTimestamp($startcol + 6, null);

			$this->created_by = $rs->getInt($startcol + 7);

			$this->updated_at = $rs->getTimestamp($startcol + 8, null);

			$this->updated_by = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ObjectContact object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseObjectContact:delete:pre') as $callable)
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
			$con = Propel::getConnection(ObjectContactPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ObjectContactPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseObjectContact:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{
                    if ($this->isNew() && !$this->isColumnModified('created_by'))
                    {
                        $user = sfContext::getInstance()->getUser();
                        if ($user instanceof sfGuardSecurityUser)
                        {
                            if ($user->getGuardUser() instanceof sfGuardUser)
                                $this->setCreatedBy($user->getGuardUser()->getId());
                            else
                                $this->setCreatedBy(null);
                        }
                    }
                
                    if ($this->isModified() && !$this->isColumnModified('updated_by'))
                    {
                        $user = sfContext::getInstance()->getUser();
                        if ($user instanceof sfGuardSecurityUser)
                        {
                            if ($user->getGuardUser() instanceof sfGuardUser)
                                $this->setUpdatedBy($user->getGuardUser()->getId());
                            else
                                $this->setUpdatedBy(null);
                        }
                    }
                

    foreach (sfMixer::getCallables('BaseObjectContact:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(ObjectContactPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(ObjectContactPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ObjectContactPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseObjectContact:save:post') as $callable)
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


												
			if ($this->aContact !== null) {
				if ($this->aContact->isModified()) {
					$affectedRows += $this->aContact->save($con);
				}
				$this->setContact($this->aContact);
			}

			if ($this->asfGuardUserRelatedByCreatedBy !== null) {
				if ($this->asfGuardUserRelatedByCreatedBy->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByCreatedBy->save($con);
				}
				$this->setsfGuardUserRelatedByCreatedBy($this->asfGuardUserRelatedByCreatedBy);
			}

			if ($this->asfGuardUserRelatedByUpdatedBy !== null) {
				if ($this->asfGuardUserRelatedByUpdatedBy->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByUpdatedBy->save($con);
				}
				$this->setsfGuardUserRelatedByUpdatedBy($this->asfGuardUserRelatedByUpdatedBy);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ObjectContactPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ObjectContactPeer::doUpdate($this, $con);
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


												
			if ($this->aContact !== null) {
				if (!$this->aContact->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aContact->getValidationFailures());
				}
			}

			if ($this->asfGuardUserRelatedByCreatedBy !== null) {
				if (!$this->asfGuardUserRelatedByCreatedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByCreatedBy->getValidationFailures());
				}
			}

			if ($this->asfGuardUserRelatedByUpdatedBy !== null) {
				if (!$this->asfGuardUserRelatedByUpdatedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByUpdatedBy->getValidationFailures());
				}
			}


			if (($retval = ObjectContactPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ObjectContactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getObjectcontactContactId();
				break;
			case 2:
				return $this->getObjectcontactObjectId();
				break;
			case 3:
				return $this->getObjectcontactObjectClass();
				break;
			case 4:
				return $this->getObjectcontactRol();
				break;
			case 5:
				return $this->getObjectcontactIsDefault();
				break;
			case 6:
				return $this->getCreatedAt();
				break;
			case 7:
				return $this->getCreatedBy();
				break;
			case 8:
				return $this->getUpdatedAt();
				break;
			case 9:
				return $this->getUpdatedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ObjectContactPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getObjectcontactContactId(),
			$keys[2] => $this->getObjectcontactObjectId(),
			$keys[3] => $this->getObjectcontactObjectClass(),
			$keys[4] => $this->getObjectcontactRol(),
			$keys[5] => $this->getObjectcontactIsDefault(),
			$keys[6] => $this->getCreatedAt(),
			$keys[7] => $this->getCreatedBy(),
			$keys[8] => $this->getUpdatedAt(),
			$keys[9] => $this->getUpdatedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ObjectContactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setObjectcontactContactId($value);
				break;
			case 2:
				$this->setObjectcontactObjectId($value);
				break;
			case 3:
				$this->setObjectcontactObjectClass($value);
				break;
			case 4:
				$this->setObjectcontactRol($value);
				break;
			case 5:
				$this->setObjectcontactIsDefault($value);
				break;
			case 6:
				$this->setCreatedAt($value);
				break;
			case 7:
				$this->setCreatedBy($value);
				break;
			case 8:
				$this->setUpdatedAt($value);
				break;
			case 9:
				$this->setUpdatedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ObjectContactPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setObjectcontactContactId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setObjectcontactObjectId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setObjectcontactObjectClass($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setObjectcontactRol($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setObjectcontactIsDefault($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedBy($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUpdatedAt($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUpdatedBy($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ObjectContactPeer::DATABASE_NAME);

		if ($this->isColumnModified(ObjectContactPeer::ID)) $criteria->add(ObjectContactPeer::ID, $this->id);
		if ($this->isColumnModified(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID)) $criteria->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $this->objectcontact_contact_id);
		if ($this->isColumnModified(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID)) $criteria->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, $this->objectcontact_object_id);
		if ($this->isColumnModified(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS)) $criteria->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, $this->objectcontact_object_class);
		if ($this->isColumnModified(ObjectContactPeer::OBJECTCONTACT_ROL)) $criteria->add(ObjectContactPeer::OBJECTCONTACT_ROL, $this->objectcontact_rol);
		if ($this->isColumnModified(ObjectContactPeer::OBJECTCONTACT_IS_DEFAULT)) $criteria->add(ObjectContactPeer::OBJECTCONTACT_IS_DEFAULT, $this->objectcontact_is_default);
		if ($this->isColumnModified(ObjectContactPeer::CREATED_AT)) $criteria->add(ObjectContactPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(ObjectContactPeer::CREATED_BY)) $criteria->add(ObjectContactPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(ObjectContactPeer::UPDATED_AT)) $criteria->add(ObjectContactPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(ObjectContactPeer::UPDATED_BY)) $criteria->add(ObjectContactPeer::UPDATED_BY, $this->updated_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ObjectContactPeer::DATABASE_NAME);

		$criteria->add(ObjectContactPeer::ID, $this->id);

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

		$copyObj->setObjectcontactContactId($this->objectcontact_contact_id);

		$copyObj->setObjectcontactObjectId($this->objectcontact_object_id);

		$copyObj->setObjectcontactObjectClass($this->objectcontact_object_class);

		$copyObj->setObjectcontactRol($this->objectcontact_rol);

		$copyObj->setObjectcontactIsDefault($this->objectcontact_is_default);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);


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
			self::$peer = new ObjectContactPeer();
		}
		return self::$peer;
	}

	
	public function setContact($v)
	{


		if ($v === null) {
			$this->setObjectcontactContactId(NULL);
		} else {
			$this->setObjectcontactContactId($v->getId());
		}


		$this->aContact = $v;
	}


	
	public function getContact($con = null)
	{
		if ($this->aContact === null && ($this->objectcontact_contact_id !== null)) {
						include_once 'lib/model/om/BaseContactPeer.php';

			$this->aContact = ContactPeer::retrieveByPK($this->objectcontact_contact_id, $con);

			
		}
		return $this->aContact;
	}

	
	public function setsfGuardUserRelatedByCreatedBy($v)
	{


		if ($v === null) {
			$this->setCreatedBy('null');
		} else {
			$this->setCreatedBy($v->getId());
		}


		$this->asfGuardUserRelatedByCreatedBy = $v;
	}


	
	public function getsfGuardUserRelatedByCreatedBy($con = null)
	{
		if ($this->asfGuardUserRelatedByCreatedBy === null && ($this->created_by !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUserRelatedByCreatedBy = sfGuardUserPeer::retrieveByPK($this->created_by, $con);

			
		}
		return $this->asfGuardUserRelatedByCreatedBy;
	}

	
	public function setsfGuardUserRelatedByUpdatedBy($v)
	{


		if ($v === null) {
			$this->setUpdatedBy('null');
		} else {
			$this->setUpdatedBy($v->getId());
		}


		$this->asfGuardUserRelatedByUpdatedBy = $v;
	}


	
	public function getsfGuardUserRelatedByUpdatedBy($con = null)
	{
		if ($this->asfGuardUserRelatedByUpdatedBy === null && ($this->updated_by !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUserRelatedByUpdatedBy = sfGuardUserPeer::retrieveByPK($this->updated_by, $con);

			
		}
		return $this->asfGuardUserRelatedByUpdatedBy;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseObjectContact:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseObjectContact::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
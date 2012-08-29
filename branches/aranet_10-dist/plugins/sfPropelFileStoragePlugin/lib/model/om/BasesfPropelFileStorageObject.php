<?php


abstract class BasesfPropelFileStorageObject extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $file_object_id;


	
	protected $file_object_class;


	
	protected $file_info_id;


	
	protected $created_at;


	
	protected $created_by = 0;


	
	protected $updated_at;


	
	protected $updated_by = 0;


	
	protected $deleted_at;


	
	protected $deleted_by = 0;

	
	protected $asfPropelFileStorageInfo;

	
	protected $asfGuardUserProfileRelatedByCreatedBy;

	
	protected $asfGuardUserProfileRelatedByUpdatedBy;

	
	protected $asfGuardUserProfileRelatedByDeletedBy;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getFileObjectId()
	{

		return $this->file_object_id;
	}

	
	public function getFileObjectClass()
	{

		return $this->file_object_class;
	}

	
	public function getFileInfoId()
	{

		return $this->file_info_id;
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

	
	public function getDeletedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->deleted_at === null || $this->deleted_at === '') {
			return null;
		} elseif (!is_int($this->deleted_at)) {
						$ts = strtotime($this->deleted_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [deleted_at] as date/time value: " . var_export($this->deleted_at, true));
			}
		} else {
			$ts = $this->deleted_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDeletedBy()
	{

		return $this->deleted_by;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = sfPropelFileStorageObjectPeer::ID;
		}

	} 
	
	public function setFileObjectId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->file_object_id !== $v) {
			$this->file_object_id = $v;
			$this->modifiedColumns[] = sfPropelFileStorageObjectPeer::FILE_OBJECT_ID;
		}

	} 
	
	public function setFileObjectClass($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->file_object_class !== $v) {
			$this->file_object_class = $v;
			$this->modifiedColumns[] = sfPropelFileStorageObjectPeer::FILE_OBJECT_CLASS;
		}

	} 
	
	public function setFileInfoId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->file_info_id !== $v) {
			$this->file_info_id = $v;
			$this->modifiedColumns[] = sfPropelFileStorageObjectPeer::FILE_INFO_ID;
		}

		if ($this->asfPropelFileStorageInfo !== null && $this->asfPropelFileStorageInfo->getFileId() !== $v) {
			$this->asfPropelFileStorageInfo = null;
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
			$this->modifiedColumns[] = sfPropelFileStorageObjectPeer::CREATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v || $v === 0) {
			$this->created_by = $v;
			$this->modifiedColumns[] = sfPropelFileStorageObjectPeer::CREATED_BY;
		}

		if ($this->asfGuardUserProfileRelatedByCreatedBy !== null && $this->asfGuardUserProfileRelatedByCreatedBy->getUserId() !== $v) {
			$this->asfGuardUserProfileRelatedByCreatedBy = null;
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
			$this->modifiedColumns[] = sfPropelFileStorageObjectPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v || $v === 0) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = sfPropelFileStorageObjectPeer::UPDATED_BY;
		}

		if ($this->asfGuardUserProfileRelatedByUpdatedBy !== null && $this->asfGuardUserProfileRelatedByUpdatedBy->getUserId() !== $v) {
			$this->asfGuardUserProfileRelatedByUpdatedBy = null;
		}

	} 
	
	public function setDeletedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [deleted_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->deleted_at !== $ts) {
			$this->deleted_at = $ts;
			$this->modifiedColumns[] = sfPropelFileStorageObjectPeer::DELETED_AT;
		}

	} 
	
	public function setDeletedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->deleted_by !== $v || $v === 0) {
			$this->deleted_by = $v;
			$this->modifiedColumns[] = sfPropelFileStorageObjectPeer::DELETED_BY;
		}

		if ($this->asfGuardUserProfileRelatedByDeletedBy !== null && $this->asfGuardUserProfileRelatedByDeletedBy->getUserId() !== $v) {
			$this->asfGuardUserProfileRelatedByDeletedBy = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->file_object_id = $rs->getInt($startcol + 1);

			$this->file_object_class = $rs->getString($startcol + 2);

			$this->file_info_id = $rs->getInt($startcol + 3);

			$this->created_at = $rs->getTimestamp($startcol + 4, null);

			$this->created_by = $rs->getInt($startcol + 5);

			$this->updated_at = $rs->getTimestamp($startcol + 6, null);

			$this->updated_by = $rs->getInt($startcol + 7);

			$this->deleted_at = $rs->getTimestamp($startcol + 8, null);

			$this->deleted_by = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating sfPropelFileStorageObject object", $e);
		}
	}

	
	public function delete($con = null)
	{
                    if (!$this->isColumnModified('deleted_by'))
                    {
                        $user = sfContext::getInstance()->getUser();
                        if ($user instanceof sfGuardSecurityUser)
                        {
                            if ($user->getGuardUser() instanceof sfGuardUser)
                                $this->setDeletedBy($user->getGuardUser()->getId());
                            else
                                $this->setDeletedBy(null);
                        }
                    }
                

    foreach (sfMixer::getCallables('BasesfPropelFileStorageObject:delete:pre') as $callable)
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
			$con = Propel::getConnection(sfPropelFileStorageObjectPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			sfPropelFileStorageObjectPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasesfPropelFileStorageObject:delete:post') as $callable)
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
                

    foreach (sfMixer::getCallables('BasesfPropelFileStorageObject:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(sfPropelFileStorageObjectPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(sfPropelFileStorageObjectPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(sfPropelFileStorageObjectPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasesfPropelFileStorageObject:save:post') as $callable)
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


												
			if ($this->asfPropelFileStorageInfo !== null) {
				if ($this->asfPropelFileStorageInfo->isModified()) {
					$affectedRows += $this->asfPropelFileStorageInfo->save($con);
				}
				$this->setsfPropelFileStorageInfo($this->asfPropelFileStorageInfo);
			}

			if ($this->asfGuardUserProfileRelatedByCreatedBy !== null) {
				if ($this->asfGuardUserProfileRelatedByCreatedBy->isModified()) {
					$affectedRows += $this->asfGuardUserProfileRelatedByCreatedBy->save($con);
				}
				$this->setsfGuardUserProfileRelatedByCreatedBy($this->asfGuardUserProfileRelatedByCreatedBy);
			}

			if ($this->asfGuardUserProfileRelatedByUpdatedBy !== null) {
				if ($this->asfGuardUserProfileRelatedByUpdatedBy->isModified()) {
					$affectedRows += $this->asfGuardUserProfileRelatedByUpdatedBy->save($con);
				}
				$this->setsfGuardUserProfileRelatedByUpdatedBy($this->asfGuardUserProfileRelatedByUpdatedBy);
			}

			if ($this->asfGuardUserProfileRelatedByDeletedBy !== null) {
				if ($this->asfGuardUserProfileRelatedByDeletedBy->isModified()) {
					$affectedRows += $this->asfGuardUserProfileRelatedByDeletedBy->save($con);
				}
				$this->setsfGuardUserProfileRelatedByDeletedBy($this->asfGuardUserProfileRelatedByDeletedBy);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = sfPropelFileStorageObjectPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += sfPropelFileStorageObjectPeer::doUpdate($this, $con);
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


												
			if ($this->asfPropelFileStorageInfo !== null) {
				if (!$this->asfPropelFileStorageInfo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfPropelFileStorageInfo->getValidationFailures());
				}
			}

			if ($this->asfGuardUserProfileRelatedByCreatedBy !== null) {
				if (!$this->asfGuardUserProfileRelatedByCreatedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserProfileRelatedByCreatedBy->getValidationFailures());
				}
			}

			if ($this->asfGuardUserProfileRelatedByUpdatedBy !== null) {
				if (!$this->asfGuardUserProfileRelatedByUpdatedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserProfileRelatedByUpdatedBy->getValidationFailures());
				}
			}

			if ($this->asfGuardUserProfileRelatedByDeletedBy !== null) {
				if (!$this->asfGuardUserProfileRelatedByDeletedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserProfileRelatedByDeletedBy->getValidationFailures());
				}
			}


			if (($retval = sfPropelFileStorageObjectPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfPropelFileStorageObjectPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFileObjectId();
				break;
			case 2:
				return $this->getFileObjectClass();
				break;
			case 3:
				return $this->getFileInfoId();
				break;
			case 4:
				return $this->getCreatedAt();
				break;
			case 5:
				return $this->getCreatedBy();
				break;
			case 6:
				return $this->getUpdatedAt();
				break;
			case 7:
				return $this->getUpdatedBy();
				break;
			case 8:
				return $this->getDeletedAt();
				break;
			case 9:
				return $this->getDeletedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfPropelFileStorageObjectPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFileObjectId(),
			$keys[2] => $this->getFileObjectClass(),
			$keys[3] => $this->getFileInfoId(),
			$keys[4] => $this->getCreatedAt(),
			$keys[5] => $this->getCreatedBy(),
			$keys[6] => $this->getUpdatedAt(),
			$keys[7] => $this->getUpdatedBy(),
			$keys[8] => $this->getDeletedAt(),
			$keys[9] => $this->getDeletedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfPropelFileStorageObjectPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFileObjectId($value);
				break;
			case 2:
				$this->setFileObjectClass($value);
				break;
			case 3:
				$this->setFileInfoId($value);
				break;
			case 4:
				$this->setCreatedAt($value);
				break;
			case 5:
				$this->setCreatedBy($value);
				break;
			case 6:
				$this->setUpdatedAt($value);
				break;
			case 7:
				$this->setUpdatedBy($value);
				break;
			case 8:
				$this->setDeletedAt($value);
				break;
			case 9:
				$this->setDeletedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfPropelFileStorageObjectPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFileObjectId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFileObjectClass($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFileInfoId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedBy($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedBy($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDeletedAt($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDeletedBy($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(sfPropelFileStorageObjectPeer::DATABASE_NAME);

		if ($this->isColumnModified(sfPropelFileStorageObjectPeer::ID)) $criteria->add(sfPropelFileStorageObjectPeer::ID, $this->id);
		if ($this->isColumnModified(sfPropelFileStorageObjectPeer::FILE_OBJECT_ID)) $criteria->add(sfPropelFileStorageObjectPeer::FILE_OBJECT_ID, $this->file_object_id);
		if ($this->isColumnModified(sfPropelFileStorageObjectPeer::FILE_OBJECT_CLASS)) $criteria->add(sfPropelFileStorageObjectPeer::FILE_OBJECT_CLASS, $this->file_object_class);
		if ($this->isColumnModified(sfPropelFileStorageObjectPeer::FILE_INFO_ID)) $criteria->add(sfPropelFileStorageObjectPeer::FILE_INFO_ID, $this->file_info_id);
		if ($this->isColumnModified(sfPropelFileStorageObjectPeer::CREATED_AT)) $criteria->add(sfPropelFileStorageObjectPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(sfPropelFileStorageObjectPeer::CREATED_BY)) $criteria->add(sfPropelFileStorageObjectPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(sfPropelFileStorageObjectPeer::UPDATED_AT)) $criteria->add(sfPropelFileStorageObjectPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(sfPropelFileStorageObjectPeer::UPDATED_BY)) $criteria->add(sfPropelFileStorageObjectPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(sfPropelFileStorageObjectPeer::DELETED_AT)) $criteria->add(sfPropelFileStorageObjectPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(sfPropelFileStorageObjectPeer::DELETED_BY)) $criteria->add(sfPropelFileStorageObjectPeer::DELETED_BY, $this->deleted_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(sfPropelFileStorageObjectPeer::DATABASE_NAME);

		$criteria->add(sfPropelFileStorageObjectPeer::ID, $this->id);

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

		$copyObj->setFileObjectId($this->file_object_id);

		$copyObj->setFileObjectClass($this->file_object_class);

		$copyObj->setFileInfoId($this->file_info_id);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setDeletedAt($this->deleted_at);

		$copyObj->setDeletedBy($this->deleted_by);


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
			self::$peer = new sfPropelFileStorageObjectPeer();
		}
		return self::$peer;
	}

	
	public function setsfPropelFileStorageInfo($v)
	{


		if ($v === null) {
			$this->setFileInfoId(NULL);
		} else {
			$this->setFileInfoId($v->getFileId());
		}


		$this->asfPropelFileStorageInfo = $v;
	}


	
	public function getsfPropelFileStorageInfo($con = null)
	{
		if ($this->asfPropelFileStorageInfo === null && ($this->file_info_id !== null)) {
						include_once 'plugins/sfPropelFileStoragePlugin/lib/model/om/BasesfPropelFileStorageInfoPeer.php';

			$this->asfPropelFileStorageInfo = sfPropelFileStorageInfoPeer::retrieveByPK($this->file_info_id, $con);

			
		}
		return $this->asfPropelFileStorageInfo;
	}

	
	public function setsfGuardUserProfileRelatedByCreatedBy($v)
	{


		if ($v === null) {
			$this->setCreatedBy('null');
		} else {
			$this->setCreatedBy($v->getUserId());
		}


		$this->asfGuardUserProfileRelatedByCreatedBy = $v;
	}


	
	public function getsfGuardUserProfileRelatedByCreatedBy($con = null)
	{
		if ($this->asfGuardUserProfileRelatedByCreatedBy === null && ($this->created_by !== null)) {
						include_once 'lib/model/om/BasesfGuardUserProfilePeer.php';

			$this->asfGuardUserProfileRelatedByCreatedBy = sfGuardUserProfilePeer::retrieveByPK($this->created_by, $con);

			
		}
		return $this->asfGuardUserProfileRelatedByCreatedBy;
	}

	
	public function setsfGuardUserProfileRelatedByUpdatedBy($v)
	{


		if ($v === null) {
			$this->setUpdatedBy('null');
		} else {
			$this->setUpdatedBy($v->getUserId());
		}


		$this->asfGuardUserProfileRelatedByUpdatedBy = $v;
	}


	
	public function getsfGuardUserProfileRelatedByUpdatedBy($con = null)
	{
		if ($this->asfGuardUserProfileRelatedByUpdatedBy === null && ($this->updated_by !== null)) {
						include_once 'lib/model/om/BasesfGuardUserProfilePeer.php';

			$this->asfGuardUserProfileRelatedByUpdatedBy = sfGuardUserProfilePeer::retrieveByPK($this->updated_by, $con);

			
		}
		return $this->asfGuardUserProfileRelatedByUpdatedBy;
	}

	
	public function setsfGuardUserProfileRelatedByDeletedBy($v)
	{


		if ($v === null) {
			$this->setDeletedBy('null');
		} else {
			$this->setDeletedBy($v->getUserId());
		}


		$this->asfGuardUserProfileRelatedByDeletedBy = $v;
	}


	
	public function getsfGuardUserProfileRelatedByDeletedBy($con = null)
	{
		if ($this->asfGuardUserProfileRelatedByDeletedBy === null && ($this->deleted_by !== null)) {
						include_once 'lib/model/om/BasesfGuardUserProfilePeer.php';

			$this->asfGuardUserProfileRelatedByDeletedBy = sfGuardUserProfilePeer::retrieveByPK($this->deleted_by, $con);

			
		}
		return $this->asfGuardUserProfileRelatedByDeletedBy;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BasesfPropelFileStorageObject:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasesfPropelFileStorageObject::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
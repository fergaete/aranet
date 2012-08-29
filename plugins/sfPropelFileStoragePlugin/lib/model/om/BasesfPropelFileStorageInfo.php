<?php


abstract class BasesfPropelFileStorageInfo extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $file_id;


	
	protected $file_name;


	
	protected $file_title;


	
	protected $file_size;


	
	protected $file_mime_type;


	
	protected $file_width;


	
	protected $file_height;


	
	protected $file_is_cached;


	
	protected $created_at;


	
	protected $created_by = 0;


	
	protected $updated_at;


	
	protected $updated_by = 0;


	
	protected $deleted_at;


	
	protected $deleted_by = 0;

	
	protected $asfGuardUserProfileRelatedByCreatedBy;

	
	protected $asfGuardUserProfileRelatedByUpdatedBy;

	
	protected $asfGuardUserProfileRelatedByDeletedBy;

	
	protected $collsfPropelFileStorageDatas;

	
	protected $lastsfPropelFileStorageDataCriteria = null;

	
	protected $collsfPropelFileStorageObjects;

	
	protected $lastsfPropelFileStorageObjectCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getFileId()
	{

		return $this->file_id;
	}

	
	public function getFileName()
	{

		return $this->file_name;
	}

	
	public function getFileTitle()
	{

		return $this->file_title;
	}

	
	public function getFileSize()
	{

		return $this->file_size;
	}

	
	public function getFileMimeType()
	{

		return $this->file_mime_type;
	}

	
	public function getFileWidth()
	{

		return $this->file_width;
	}

	
	public function getFileHeight()
	{

		return $this->file_height;
	}

	
	public function getFileIsCached()
	{

		return $this->file_is_cached;
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

	
	public function setFileId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->file_id !== $v) {
			$this->file_id = $v;
			$this->modifiedColumns[] = sfPropelFileStorageInfoPeer::FILE_ID;
		}

	} 
	
	public function setFileName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->file_name !== $v) {
			$this->file_name = $v;
			$this->modifiedColumns[] = sfPropelFileStorageInfoPeer::FILE_NAME;
		}

	} 
	
	public function setFileTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->file_title !== $v) {
			$this->file_title = $v;
			$this->modifiedColumns[] = sfPropelFileStorageInfoPeer::FILE_TITLE;
		}

	} 
	
	public function setFileSize($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->file_size !== $v) {
			$this->file_size = $v;
			$this->modifiedColumns[] = sfPropelFileStorageInfoPeer::FILE_SIZE;
		}

	} 
	
	public function setFileMimeType($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->file_mime_type !== $v) {
			$this->file_mime_type = $v;
			$this->modifiedColumns[] = sfPropelFileStorageInfoPeer::FILE_MIME_TYPE;
		}

	} 
	
	public function setFileWidth($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->file_width !== $v) {
			$this->file_width = $v;
			$this->modifiedColumns[] = sfPropelFileStorageInfoPeer::FILE_WIDTH;
		}

	} 
	
	public function setFileHeight($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->file_height !== $v) {
			$this->file_height = $v;
			$this->modifiedColumns[] = sfPropelFileStorageInfoPeer::FILE_HEIGHT;
		}

	} 
	
	public function setFileIsCached($v)
	{

		if ($this->file_is_cached !== $v) {
			$this->file_is_cached = $v;
			$this->modifiedColumns[] = sfPropelFileStorageInfoPeer::FILE_IS_CACHED;
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
			$this->modifiedColumns[] = sfPropelFileStorageInfoPeer::CREATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v || $v === 0) {
			$this->created_by = $v;
			$this->modifiedColumns[] = sfPropelFileStorageInfoPeer::CREATED_BY;
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
			$this->modifiedColumns[] = sfPropelFileStorageInfoPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v || $v === 0) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = sfPropelFileStorageInfoPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = sfPropelFileStorageInfoPeer::DELETED_AT;
		}

	} 
	
	public function setDeletedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->deleted_by !== $v || $v === 0) {
			$this->deleted_by = $v;
			$this->modifiedColumns[] = sfPropelFileStorageInfoPeer::DELETED_BY;
		}

		if ($this->asfGuardUserProfileRelatedByDeletedBy !== null && $this->asfGuardUserProfileRelatedByDeletedBy->getUserId() !== $v) {
			$this->asfGuardUserProfileRelatedByDeletedBy = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->file_id = $rs->getInt($startcol + 0);

			$this->file_name = $rs->getString($startcol + 1);

			$this->file_title = $rs->getString($startcol + 2);

			$this->file_size = $rs->getInt($startcol + 3);

			$this->file_mime_type = $rs->getString($startcol + 4);

			$this->file_width = $rs->getInt($startcol + 5);

			$this->file_height = $rs->getInt($startcol + 6);

			$this->file_is_cached = $rs->getBoolean($startcol + 7);

			$this->created_at = $rs->getTimestamp($startcol + 8, null);

			$this->created_by = $rs->getInt($startcol + 9);

			$this->updated_at = $rs->getTimestamp($startcol + 10, null);

			$this->updated_by = $rs->getInt($startcol + 11);

			$this->deleted_at = $rs->getTimestamp($startcol + 12, null);

			$this->deleted_by = $rs->getInt($startcol + 13);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 14; 
		} catch (Exception $e) {
			throw new PropelException("Error populating sfPropelFileStorageInfo object", $e);
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
                

    foreach (sfMixer::getCallables('BasesfPropelFileStorageInfo:delete:pre') as $callable)
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
			$con = Propel::getConnection(sfPropelFileStorageInfoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			sfPropelFileStorageInfoPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasesfPropelFileStorageInfo:delete:post') as $callable)
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
                

    foreach (sfMixer::getCallables('BasesfPropelFileStorageInfo:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(sfPropelFileStorageInfoPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(sfPropelFileStorageInfoPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(sfPropelFileStorageInfoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasesfPropelFileStorageInfo:save:post') as $callable)
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
					$pk = sfPropelFileStorageInfoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setFileId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += sfPropelFileStorageInfoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collsfPropelFileStorageDatas !== null) {
				foreach($this->collsfPropelFileStorageDatas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfPropelFileStorageObjects !== null) {
				foreach($this->collsfPropelFileStorageObjects as $referrerFK) {
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


			if (($retval = sfPropelFileStorageInfoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collsfPropelFileStorageDatas !== null) {
					foreach($this->collsfPropelFileStorageDatas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfPropelFileStorageObjects !== null) {
					foreach($this->collsfPropelFileStorageObjects as $referrerFK) {
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
		$pos = sfPropelFileStorageInfoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFileId();
				break;
			case 1:
				return $this->getFileName();
				break;
			case 2:
				return $this->getFileTitle();
				break;
			case 3:
				return $this->getFileSize();
				break;
			case 4:
				return $this->getFileMimeType();
				break;
			case 5:
				return $this->getFileWidth();
				break;
			case 6:
				return $this->getFileHeight();
				break;
			case 7:
				return $this->getFileIsCached();
				break;
			case 8:
				return $this->getCreatedAt();
				break;
			case 9:
				return $this->getCreatedBy();
				break;
			case 10:
				return $this->getUpdatedAt();
				break;
			case 11:
				return $this->getUpdatedBy();
				break;
			case 12:
				return $this->getDeletedAt();
				break;
			case 13:
				return $this->getDeletedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfPropelFileStorageInfoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFileId(),
			$keys[1] => $this->getFileName(),
			$keys[2] => $this->getFileTitle(),
			$keys[3] => $this->getFileSize(),
			$keys[4] => $this->getFileMimeType(),
			$keys[5] => $this->getFileWidth(),
			$keys[6] => $this->getFileHeight(),
			$keys[7] => $this->getFileIsCached(),
			$keys[8] => $this->getCreatedAt(),
			$keys[9] => $this->getCreatedBy(),
			$keys[10] => $this->getUpdatedAt(),
			$keys[11] => $this->getUpdatedBy(),
			$keys[12] => $this->getDeletedAt(),
			$keys[13] => $this->getDeletedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfPropelFileStorageInfoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFileId($value);
				break;
			case 1:
				$this->setFileName($value);
				break;
			case 2:
				$this->setFileTitle($value);
				break;
			case 3:
				$this->setFileSize($value);
				break;
			case 4:
				$this->setFileMimeType($value);
				break;
			case 5:
				$this->setFileWidth($value);
				break;
			case 6:
				$this->setFileHeight($value);
				break;
			case 7:
				$this->setFileIsCached($value);
				break;
			case 8:
				$this->setCreatedAt($value);
				break;
			case 9:
				$this->setCreatedBy($value);
				break;
			case 10:
				$this->setUpdatedAt($value);
				break;
			case 11:
				$this->setUpdatedBy($value);
				break;
			case 12:
				$this->setDeletedAt($value);
				break;
			case 13:
				$this->setDeletedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfPropelFileStorageInfoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFileId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFileName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFileTitle($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFileSize($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFileMimeType($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFileWidth($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFileHeight($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFileIsCached($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCreatedAt($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedBy($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUpdatedAt($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUpdatedBy($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDeletedAt($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDeletedBy($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(sfPropelFileStorageInfoPeer::DATABASE_NAME);

		if ($this->isColumnModified(sfPropelFileStorageInfoPeer::FILE_ID)) $criteria->add(sfPropelFileStorageInfoPeer::FILE_ID, $this->file_id);
		if ($this->isColumnModified(sfPropelFileStorageInfoPeer::FILE_NAME)) $criteria->add(sfPropelFileStorageInfoPeer::FILE_NAME, $this->file_name);
		if ($this->isColumnModified(sfPropelFileStorageInfoPeer::FILE_TITLE)) $criteria->add(sfPropelFileStorageInfoPeer::FILE_TITLE, $this->file_title);
		if ($this->isColumnModified(sfPropelFileStorageInfoPeer::FILE_SIZE)) $criteria->add(sfPropelFileStorageInfoPeer::FILE_SIZE, $this->file_size);
		if ($this->isColumnModified(sfPropelFileStorageInfoPeer::FILE_MIME_TYPE)) $criteria->add(sfPropelFileStorageInfoPeer::FILE_MIME_TYPE, $this->file_mime_type);
		if ($this->isColumnModified(sfPropelFileStorageInfoPeer::FILE_WIDTH)) $criteria->add(sfPropelFileStorageInfoPeer::FILE_WIDTH, $this->file_width);
		if ($this->isColumnModified(sfPropelFileStorageInfoPeer::FILE_HEIGHT)) $criteria->add(sfPropelFileStorageInfoPeer::FILE_HEIGHT, $this->file_height);
		if ($this->isColumnModified(sfPropelFileStorageInfoPeer::FILE_IS_CACHED)) $criteria->add(sfPropelFileStorageInfoPeer::FILE_IS_CACHED, $this->file_is_cached);
		if ($this->isColumnModified(sfPropelFileStorageInfoPeer::CREATED_AT)) $criteria->add(sfPropelFileStorageInfoPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(sfPropelFileStorageInfoPeer::CREATED_BY)) $criteria->add(sfPropelFileStorageInfoPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(sfPropelFileStorageInfoPeer::UPDATED_AT)) $criteria->add(sfPropelFileStorageInfoPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(sfPropelFileStorageInfoPeer::UPDATED_BY)) $criteria->add(sfPropelFileStorageInfoPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(sfPropelFileStorageInfoPeer::DELETED_AT)) $criteria->add(sfPropelFileStorageInfoPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(sfPropelFileStorageInfoPeer::DELETED_BY)) $criteria->add(sfPropelFileStorageInfoPeer::DELETED_BY, $this->deleted_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(sfPropelFileStorageInfoPeer::DATABASE_NAME);

		$criteria->add(sfPropelFileStorageInfoPeer::FILE_ID, $this->file_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getFileId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setFileId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setFileName($this->file_name);

		$copyObj->setFileTitle($this->file_title);

		$copyObj->setFileSize($this->file_size);

		$copyObj->setFileMimeType($this->file_mime_type);

		$copyObj->setFileWidth($this->file_width);

		$copyObj->setFileHeight($this->file_height);

		$copyObj->setFileIsCached($this->file_is_cached);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setDeletedAt($this->deleted_at);

		$copyObj->setDeletedBy($this->deleted_by);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getsfPropelFileStorageDatas() as $relObj) {
				$copyObj->addsfPropelFileStorageData($relObj->copy($deepCopy));
			}

			foreach($this->getsfPropelFileStorageObjects() as $relObj) {
				$copyObj->addsfPropelFileStorageObject($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setFileId(NULL); 
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
			self::$peer = new sfPropelFileStorageInfoPeer();
		}
		return self::$peer;
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

	
	public function initsfPropelFileStorageDatas()
	{
		if ($this->collsfPropelFileStorageDatas === null) {
			$this->collsfPropelFileStorageDatas = array();
		}
	}

	
	public function getsfPropelFileStorageDatas($criteria = null, $con = null)
	{
				include_once 'plugins/sfPropelFileStoragePlugin/lib/model/om/BasesfPropelFileStorageDataPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfPropelFileStorageDatas === null) {
			if ($this->isNew()) {
			   $this->collsfPropelFileStorageDatas = array();
			} else {

				$criteria->add(sfPropelFileStorageDataPeer::FILE_INFO_ID, $this->getFileId());

				sfPropelFileStorageDataPeer::addSelectColumns($criteria);
				$this->collsfPropelFileStorageDatas = sfPropelFileStorageDataPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfPropelFileStorageDataPeer::FILE_INFO_ID, $this->getFileId());

				sfPropelFileStorageDataPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfPropelFileStorageDataCriteria) || !$this->lastsfPropelFileStorageDataCriteria->equals($criteria)) {
					$this->collsfPropelFileStorageDatas = sfPropelFileStorageDataPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfPropelFileStorageDataCriteria = $criteria;
		return $this->collsfPropelFileStorageDatas;
	}

	
	public function countsfPropelFileStorageDatas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/sfPropelFileStoragePlugin/lib/model/om/BasesfPropelFileStorageDataPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfPropelFileStorageDataPeer::FILE_INFO_ID, $this->getFileId());

		return sfPropelFileStorageDataPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfPropelFileStorageData(sfPropelFileStorageData $l)
	{
		$this->collsfPropelFileStorageDatas[] = $l;
		$l->setsfPropelFileStorageInfo($this);
	}

	
	public function initsfPropelFileStorageObjects()
	{
		if ($this->collsfPropelFileStorageObjects === null) {
			$this->collsfPropelFileStorageObjects = array();
		}
	}

	
	public function getsfPropelFileStorageObjects($criteria = null, $con = null)
	{
				include_once 'plugins/sfPropelFileStoragePlugin/lib/model/om/BasesfPropelFileStorageObjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfPropelFileStorageObjects === null) {
			if ($this->isNew()) {
			   $this->collsfPropelFileStorageObjects = array();
			} else {

				$criteria->add(sfPropelFileStorageObjectPeer::FILE_INFO_ID, $this->getFileId());

				sfPropelFileStorageObjectPeer::addSelectColumns($criteria);
				$this->collsfPropelFileStorageObjects = sfPropelFileStorageObjectPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfPropelFileStorageObjectPeer::FILE_INFO_ID, $this->getFileId());

				sfPropelFileStorageObjectPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfPropelFileStorageObjectCriteria) || !$this->lastsfPropelFileStorageObjectCriteria->equals($criteria)) {
					$this->collsfPropelFileStorageObjects = sfPropelFileStorageObjectPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfPropelFileStorageObjectCriteria = $criteria;
		return $this->collsfPropelFileStorageObjects;
	}

	
	public function countsfPropelFileStorageObjects($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/sfPropelFileStoragePlugin/lib/model/om/BasesfPropelFileStorageObjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfPropelFileStorageObjectPeer::FILE_INFO_ID, $this->getFileId());

		return sfPropelFileStorageObjectPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfPropelFileStorageObject(sfPropelFileStorageObject $l)
	{
		$this->collsfPropelFileStorageObjects[] = $l;
		$l->setsfPropelFileStorageInfo($this);
	}


	
	public function getsfPropelFileStorageObjectsJoinsfGuardUserProfileRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'plugins/sfPropelFileStoragePlugin/lib/model/om/BasesfPropelFileStorageObjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfPropelFileStorageObjects === null) {
			if ($this->isNew()) {
				$this->collsfPropelFileStorageObjects = array();
			} else {

				$criteria->add(sfPropelFileStorageObjectPeer::FILE_INFO_ID, $this->getFileId());

				$this->collsfPropelFileStorageObjects = sfPropelFileStorageObjectPeer::doSelectJoinsfGuardUserProfileRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(sfPropelFileStorageObjectPeer::FILE_INFO_ID, $this->getFileId());

			if (!isset($this->lastsfPropelFileStorageObjectCriteria) || !$this->lastsfPropelFileStorageObjectCriteria->equals($criteria)) {
				$this->collsfPropelFileStorageObjects = sfPropelFileStorageObjectPeer::doSelectJoinsfGuardUserProfileRelatedByCreatedBy($criteria, $con);
			}
		}
		$this->lastsfPropelFileStorageObjectCriteria = $criteria;

		return $this->collsfPropelFileStorageObjects;
	}


	
	public function getsfPropelFileStorageObjectsJoinsfGuardUserProfileRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'plugins/sfPropelFileStoragePlugin/lib/model/om/BasesfPropelFileStorageObjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfPropelFileStorageObjects === null) {
			if ($this->isNew()) {
				$this->collsfPropelFileStorageObjects = array();
			} else {

				$criteria->add(sfPropelFileStorageObjectPeer::FILE_INFO_ID, $this->getFileId());

				$this->collsfPropelFileStorageObjects = sfPropelFileStorageObjectPeer::doSelectJoinsfGuardUserProfileRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(sfPropelFileStorageObjectPeer::FILE_INFO_ID, $this->getFileId());

			if (!isset($this->lastsfPropelFileStorageObjectCriteria) || !$this->lastsfPropelFileStorageObjectCriteria->equals($criteria)) {
				$this->collsfPropelFileStorageObjects = sfPropelFileStorageObjectPeer::doSelectJoinsfGuardUserProfileRelatedByUpdatedBy($criteria, $con);
			}
		}
		$this->lastsfPropelFileStorageObjectCriteria = $criteria;

		return $this->collsfPropelFileStorageObjects;
	}


	
	public function getsfPropelFileStorageObjectsJoinsfGuardUserProfileRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'plugins/sfPropelFileStoragePlugin/lib/model/om/BasesfPropelFileStorageObjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfPropelFileStorageObjects === null) {
			if ($this->isNew()) {
				$this->collsfPropelFileStorageObjects = array();
			} else {

				$criteria->add(sfPropelFileStorageObjectPeer::FILE_INFO_ID, $this->getFileId());

				$this->collsfPropelFileStorageObjects = sfPropelFileStorageObjectPeer::doSelectJoinsfGuardUserProfileRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(sfPropelFileStorageObjectPeer::FILE_INFO_ID, $this->getFileId());

			if (!isset($this->lastsfPropelFileStorageObjectCriteria) || !$this->lastsfPropelFileStorageObjectCriteria->equals($criteria)) {
				$this->collsfPropelFileStorageObjects = sfPropelFileStorageObjectPeer::doSelectJoinsfGuardUserProfileRelatedByDeletedBy($criteria, $con);
			}
		}
		$this->lastsfPropelFileStorageObjectCriteria = $criteria;

		return $this->collsfPropelFileStorageObjects;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BasesfPropelFileStorageInfo:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasesfPropelFileStorageInfo::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
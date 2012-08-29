<?php


abstract class BaseFrequentlyTask extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $task_title;


	
	protected $task_description;


	
	protected $task_priority_id = 0;


	
	protected $created_at;


	
	protected $created_by = 0;


	
	protected $updated_at;


	
	protected $updated_by = 0;


	
	protected $deleted_at;


	
	protected $deleted_by = 0;

	
	protected $aTaskPriority;

	
	protected $asfGuardUserRelatedByCreatedBy;

	
	protected $asfGuardUserRelatedByUpdatedBy;

	
	protected $asfGuardUserRelatedByDeletedBy;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getTaskTitle()
	{

		return $this->task_title;
	}

	
	public function getTaskDescription()
	{

		return $this->task_description;
	}

	
	public function getTaskPriorityId()
	{

		return $this->task_priority_id;
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
			$this->modifiedColumns[] = FrequentlyTaskPeer::ID;
		}

	} 
	
	public function setTaskTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->task_title !== $v) {
			$this->task_title = $v;
			$this->modifiedColumns[] = FrequentlyTaskPeer::TASK_TITLE;
		}

	} 
	
	public function setTaskDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->task_description !== $v) {
			$this->task_description = $v;
			$this->modifiedColumns[] = FrequentlyTaskPeer::TASK_DESCRIPTION;
		}

	} 
	
	public function setTaskPriorityId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->task_priority_id !== $v || $v === 0) {
			$this->task_priority_id = $v;
			$this->modifiedColumns[] = FrequentlyTaskPeer::TASK_PRIORITY_ID;
		}

		if ($this->aTaskPriority !== null && $this->aTaskPriority->getId() !== $v) {
			$this->aTaskPriority = null;
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
			$this->modifiedColumns[] = FrequentlyTaskPeer::CREATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v || $v === 0) {
			$this->created_by = $v;
			$this->modifiedColumns[] = FrequentlyTaskPeer::CREATED_BY;
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
			$this->modifiedColumns[] = FrequentlyTaskPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v || $v === 0) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = FrequentlyTaskPeer::UPDATED_BY;
		}

		if ($this->asfGuardUserRelatedByUpdatedBy !== null && $this->asfGuardUserRelatedByUpdatedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByUpdatedBy = null;
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
			$this->modifiedColumns[] = FrequentlyTaskPeer::DELETED_AT;
		}

	} 
	
	public function setDeletedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->deleted_by !== $v || $v === 0) {
			$this->deleted_by = $v;
			$this->modifiedColumns[] = FrequentlyTaskPeer::DELETED_BY;
		}

		if ($this->asfGuardUserRelatedByDeletedBy !== null && $this->asfGuardUserRelatedByDeletedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByDeletedBy = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->task_title = $rs->getString($startcol + 1);

			$this->task_description = $rs->getString($startcol + 2);

			$this->task_priority_id = $rs->getInt($startcol + 3);

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
			throw new PropelException("Error populating FrequentlyTask object", $e);
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
                

    foreach (sfMixer::getCallables('BaseFrequentlyTask:delete:pre') as $callable)
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
			$con = Propel::getConnection(FrequentlyTaskPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FrequentlyTaskPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseFrequentlyTask:delete:post') as $callable)
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
                

    foreach (sfMixer::getCallables('BaseFrequentlyTask:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(FrequentlyTaskPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(FrequentlyTaskPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FrequentlyTaskPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseFrequentlyTask:save:post') as $callable)
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


												
			if ($this->aTaskPriority !== null) {
				if ($this->aTaskPriority->isModified()) {
					$affectedRows += $this->aTaskPriority->save($con);
				}
				$this->setTaskPriority($this->aTaskPriority);
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

			if ($this->asfGuardUserRelatedByDeletedBy !== null) {
				if ($this->asfGuardUserRelatedByDeletedBy->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByDeletedBy->save($con);
				}
				$this->setsfGuardUserRelatedByDeletedBy($this->asfGuardUserRelatedByDeletedBy);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FrequentlyTaskPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FrequentlyTaskPeer::doUpdate($this, $con);
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


												
			if ($this->aTaskPriority !== null) {
				if (!$this->aTaskPriority->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTaskPriority->getValidationFailures());
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

			if ($this->asfGuardUserRelatedByDeletedBy !== null) {
				if (!$this->asfGuardUserRelatedByDeletedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByDeletedBy->getValidationFailures());
				}
			}


			if (($retval = FrequentlyTaskPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FrequentlyTaskPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getTaskTitle();
				break;
			case 2:
				return $this->getTaskDescription();
				break;
			case 3:
				return $this->getTaskPriorityId();
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
		$keys = FrequentlyTaskPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTaskTitle(),
			$keys[2] => $this->getTaskDescription(),
			$keys[3] => $this->getTaskPriorityId(),
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
		$pos = FrequentlyTaskPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setTaskTitle($value);
				break;
			case 2:
				$this->setTaskDescription($value);
				break;
			case 3:
				$this->setTaskPriorityId($value);
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
		$keys = FrequentlyTaskPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTaskTitle($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTaskDescription($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTaskPriorityId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedBy($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedBy($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDeletedAt($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDeletedBy($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FrequentlyTaskPeer::DATABASE_NAME);

		if ($this->isColumnModified(FrequentlyTaskPeer::ID)) $criteria->add(FrequentlyTaskPeer::ID, $this->id);
		if ($this->isColumnModified(FrequentlyTaskPeer::TASK_TITLE)) $criteria->add(FrequentlyTaskPeer::TASK_TITLE, $this->task_title);
		if ($this->isColumnModified(FrequentlyTaskPeer::TASK_DESCRIPTION)) $criteria->add(FrequentlyTaskPeer::TASK_DESCRIPTION, $this->task_description);
		if ($this->isColumnModified(FrequentlyTaskPeer::TASK_PRIORITY_ID)) $criteria->add(FrequentlyTaskPeer::TASK_PRIORITY_ID, $this->task_priority_id);
		if ($this->isColumnModified(FrequentlyTaskPeer::CREATED_AT)) $criteria->add(FrequentlyTaskPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(FrequentlyTaskPeer::CREATED_BY)) $criteria->add(FrequentlyTaskPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(FrequentlyTaskPeer::UPDATED_AT)) $criteria->add(FrequentlyTaskPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(FrequentlyTaskPeer::UPDATED_BY)) $criteria->add(FrequentlyTaskPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(FrequentlyTaskPeer::DELETED_AT)) $criteria->add(FrequentlyTaskPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(FrequentlyTaskPeer::DELETED_BY)) $criteria->add(FrequentlyTaskPeer::DELETED_BY, $this->deleted_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FrequentlyTaskPeer::DATABASE_NAME);

		$criteria->add(FrequentlyTaskPeer::ID, $this->id);

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

		$copyObj->setTaskTitle($this->task_title);

		$copyObj->setTaskDescription($this->task_description);

		$copyObj->setTaskPriorityId($this->task_priority_id);

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
			self::$peer = new FrequentlyTaskPeer();
		}
		return self::$peer;
	}

	
	public function setTaskPriority($v)
	{


		if ($v === null) {
			$this->setTaskPriorityId('null');
		} else {
			$this->setTaskPriorityId($v->getId());
		}


		$this->aTaskPriority = $v;
	}


	
	public function getTaskPriority($con = null)
	{
		if ($this->aTaskPriority === null && ($this->task_priority_id !== null)) {
						include_once 'lib/model/om/BaseTaskPriorityPeer.php';

			$this->aTaskPriority = TaskPriorityPeer::retrieveByPK($this->task_priority_id, $con);

			
		}
		return $this->aTaskPriority;
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

	
	public function setsfGuardUserRelatedByDeletedBy($v)
	{


		if ($v === null) {
			$this->setDeletedBy('null');
		} else {
			$this->setDeletedBy($v->getId());
		}


		$this->asfGuardUserRelatedByDeletedBy = $v;
	}


	
	public function getsfGuardUserRelatedByDeletedBy($con = null)
	{
		if ($this->asfGuardUserRelatedByDeletedBy === null && ($this->deleted_by !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUserRelatedByDeletedBy = sfGuardUserPeer::retrieveByPK($this->deleted_by, $con);

			
		}
		return $this->asfGuardUserRelatedByDeletedBy;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseFrequentlyTask:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseFrequentlyTask::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
<?php


abstract class BaseNotification extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $notification_type;


	
	protected $notification_application;


	
	protected $notification_module;


	
	protected $notification_action;


	
	protected $notification_from_address;


	
	protected $notification_to_address;


	
	protected $notification_subject;


	
	protected $notification_content;


	
	protected $notification_html_content;


	
	protected $notification_response_code;


	
	protected $notification_response;


	
	protected $notification_status = 0;


	
	protected $notification_project_id;


	
	protected $created_at;


	
	protected $created_by = 0;


	
	protected $updated_at;


	
	protected $updated_by = 0;

	
	protected $asfGuardUserRelatedByCreatedBy;

	
	protected $asfGuardUserRelatedByUpdatedBy;

	
	protected $aProject;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getNotificationType()
	{

		return $this->notification_type;
	}

	
	public function getNotificationApplication()
	{

		return $this->notification_application;
	}

	
	public function getNotificationModule()
	{

		return $this->notification_module;
	}

	
	public function getNotificationAction()
	{

		return $this->notification_action;
	}

	
	public function getNotificationFromAddress()
	{

		return $this->notification_from_address;
	}

	
	public function getNotificationToAddress()
	{

		return $this->notification_to_address;
	}

	
	public function getNotificationSubject()
	{

		return $this->notification_subject;
	}

	
	public function getNotificationContent()
	{

		return $this->notification_content;
	}

	
	public function getNotificationHtmlContent()
	{

		return $this->notification_html_content;
	}

	
	public function getNotificationResponseCode()
	{

		return $this->notification_response_code;
	}

	
	public function getNotificationResponse()
	{

		return $this->notification_response;
	}

	
	public function getNotificationStatus()
	{

		return $this->notification_status;
	}

	
	public function getNotificationProjectId()
	{

		return $this->notification_project_id;
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
			$this->modifiedColumns[] = NotificationPeer::ID;
		}

	} 
	
	public function setNotificationType($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->notification_type !== $v) {
			$this->notification_type = $v;
			$this->modifiedColumns[] = NotificationPeer::NOTIFICATION_TYPE;
		}

	} 
	
	public function setNotificationApplication($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->notification_application !== $v) {
			$this->notification_application = $v;
			$this->modifiedColumns[] = NotificationPeer::NOTIFICATION_APPLICATION;
		}

	} 
	
	public function setNotificationModule($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->notification_module !== $v) {
			$this->notification_module = $v;
			$this->modifiedColumns[] = NotificationPeer::NOTIFICATION_MODULE;
		}

	} 
	
	public function setNotificationAction($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->notification_action !== $v) {
			$this->notification_action = $v;
			$this->modifiedColumns[] = NotificationPeer::NOTIFICATION_ACTION;
		}

	} 
	
	public function setNotificationFromAddress($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->notification_from_address !== $v) {
			$this->notification_from_address = $v;
			$this->modifiedColumns[] = NotificationPeer::NOTIFICATION_FROM_ADDRESS;
		}

	} 
	
	public function setNotificationToAddress($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->notification_to_address !== $v) {
			$this->notification_to_address = $v;
			$this->modifiedColumns[] = NotificationPeer::NOTIFICATION_TO_ADDRESS;
		}

	} 
	
	public function setNotificationSubject($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->notification_subject !== $v) {
			$this->notification_subject = $v;
			$this->modifiedColumns[] = NotificationPeer::NOTIFICATION_SUBJECT;
		}

	} 
	
	public function setNotificationContent($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->notification_content !== $v) {
			$this->notification_content = $v;
			$this->modifiedColumns[] = NotificationPeer::NOTIFICATION_CONTENT;
		}

	} 
	
	public function setNotificationHtmlContent($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->notification_html_content !== $v) {
			$this->notification_html_content = $v;
			$this->modifiedColumns[] = NotificationPeer::NOTIFICATION_HTML_CONTENT;
		}

	} 
	
	public function setNotificationResponseCode($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->notification_response_code !== $v) {
			$this->notification_response_code = $v;
			$this->modifiedColumns[] = NotificationPeer::NOTIFICATION_RESPONSE_CODE;
		}

	} 
	
	public function setNotificationResponse($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->notification_response !== $v) {
			$this->notification_response = $v;
			$this->modifiedColumns[] = NotificationPeer::NOTIFICATION_RESPONSE;
		}

	} 
	
	public function setNotificationStatus($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->notification_status !== $v || $v === 0) {
			$this->notification_status = $v;
			$this->modifiedColumns[] = NotificationPeer::NOTIFICATION_STATUS;
		}

	} 
	
	public function setNotificationProjectId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->notification_project_id !== $v) {
			$this->notification_project_id = $v;
			$this->modifiedColumns[] = NotificationPeer::NOTIFICATION_PROJECT_ID;
		}

		if ($this->aProject !== null && $this->aProject->getId() !== $v) {
			$this->aProject = null;
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
			$this->modifiedColumns[] = NotificationPeer::CREATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v || $v === 0) {
			$this->created_by = $v;
			$this->modifiedColumns[] = NotificationPeer::CREATED_BY;
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
			$this->modifiedColumns[] = NotificationPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v || $v === 0) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = NotificationPeer::UPDATED_BY;
		}

		if ($this->asfGuardUserRelatedByUpdatedBy !== null && $this->asfGuardUserRelatedByUpdatedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByUpdatedBy = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->notification_type = $rs->getInt($startcol + 1);

			$this->notification_application = $rs->getString($startcol + 2);

			$this->notification_module = $rs->getString($startcol + 3);

			$this->notification_action = $rs->getString($startcol + 4);

			$this->notification_from_address = $rs->getString($startcol + 5);

			$this->notification_to_address = $rs->getString($startcol + 6);

			$this->notification_subject = $rs->getString($startcol + 7);

			$this->notification_content = $rs->getString($startcol + 8);

			$this->notification_html_content = $rs->getString($startcol + 9);

			$this->notification_response_code = $rs->getInt($startcol + 10);

			$this->notification_response = $rs->getString($startcol + 11);

			$this->notification_status = $rs->getInt($startcol + 12);

			$this->notification_project_id = $rs->getInt($startcol + 13);

			$this->created_at = $rs->getTimestamp($startcol + 14, null);

			$this->created_by = $rs->getInt($startcol + 15);

			$this->updated_at = $rs->getTimestamp($startcol + 16, null);

			$this->updated_by = $rs->getInt($startcol + 17);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 18; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Notification object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseNotification:delete:pre') as $callable)
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
			$con = Propel::getConnection(NotificationPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NotificationPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseNotification:delete:post') as $callable)
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
                

    foreach (sfMixer::getCallables('BaseNotification:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(NotificationPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(NotificationPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NotificationPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseNotification:save:post') as $callable)
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

			if ($this->aProject !== null) {
				if ($this->aProject->isModified()) {
					$affectedRows += $this->aProject->save($con);
				}
				$this->setProject($this->aProject);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = NotificationPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NotificationPeer::doUpdate($this, $con);
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

			if ($this->aProject !== null) {
				if (!$this->aProject->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProject->getValidationFailures());
				}
			}


			if (($retval = NotificationPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NotificationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNotificationType();
				break;
			case 2:
				return $this->getNotificationApplication();
				break;
			case 3:
				return $this->getNotificationModule();
				break;
			case 4:
				return $this->getNotificationAction();
				break;
			case 5:
				return $this->getNotificationFromAddress();
				break;
			case 6:
				return $this->getNotificationToAddress();
				break;
			case 7:
				return $this->getNotificationSubject();
				break;
			case 8:
				return $this->getNotificationContent();
				break;
			case 9:
				return $this->getNotificationHtmlContent();
				break;
			case 10:
				return $this->getNotificationResponseCode();
				break;
			case 11:
				return $this->getNotificationResponse();
				break;
			case 12:
				return $this->getNotificationStatus();
				break;
			case 13:
				return $this->getNotificationProjectId();
				break;
			case 14:
				return $this->getCreatedAt();
				break;
			case 15:
				return $this->getCreatedBy();
				break;
			case 16:
				return $this->getUpdatedAt();
				break;
			case 17:
				return $this->getUpdatedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NotificationPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNotificationType(),
			$keys[2] => $this->getNotificationApplication(),
			$keys[3] => $this->getNotificationModule(),
			$keys[4] => $this->getNotificationAction(),
			$keys[5] => $this->getNotificationFromAddress(),
			$keys[6] => $this->getNotificationToAddress(),
			$keys[7] => $this->getNotificationSubject(),
			$keys[8] => $this->getNotificationContent(),
			$keys[9] => $this->getNotificationHtmlContent(),
			$keys[10] => $this->getNotificationResponseCode(),
			$keys[11] => $this->getNotificationResponse(),
			$keys[12] => $this->getNotificationStatus(),
			$keys[13] => $this->getNotificationProjectId(),
			$keys[14] => $this->getCreatedAt(),
			$keys[15] => $this->getCreatedBy(),
			$keys[16] => $this->getUpdatedAt(),
			$keys[17] => $this->getUpdatedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NotificationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNotificationType($value);
				break;
			case 2:
				$this->setNotificationApplication($value);
				break;
			case 3:
				$this->setNotificationModule($value);
				break;
			case 4:
				$this->setNotificationAction($value);
				break;
			case 5:
				$this->setNotificationFromAddress($value);
				break;
			case 6:
				$this->setNotificationToAddress($value);
				break;
			case 7:
				$this->setNotificationSubject($value);
				break;
			case 8:
				$this->setNotificationContent($value);
				break;
			case 9:
				$this->setNotificationHtmlContent($value);
				break;
			case 10:
				$this->setNotificationResponseCode($value);
				break;
			case 11:
				$this->setNotificationResponse($value);
				break;
			case 12:
				$this->setNotificationStatus($value);
				break;
			case 13:
				$this->setNotificationProjectId($value);
				break;
			case 14:
				$this->setCreatedAt($value);
				break;
			case 15:
				$this->setCreatedBy($value);
				break;
			case 16:
				$this->setUpdatedAt($value);
				break;
			case 17:
				$this->setUpdatedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NotificationPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNotificationType($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNotificationApplication($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNotificationModule($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNotificationAction($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNotificationFromAddress($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNotificationToAddress($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNotificationSubject($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNotificationContent($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNotificationHtmlContent($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setNotificationResponseCode($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setNotificationResponse($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNotificationStatus($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setNotificationProjectId($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCreatedAt($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCreatedBy($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setUpdatedAt($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setUpdatedBy($arr[$keys[17]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NotificationPeer::DATABASE_NAME);

		if ($this->isColumnModified(NotificationPeer::ID)) $criteria->add(NotificationPeer::ID, $this->id);
		if ($this->isColumnModified(NotificationPeer::NOTIFICATION_TYPE)) $criteria->add(NotificationPeer::NOTIFICATION_TYPE, $this->notification_type);
		if ($this->isColumnModified(NotificationPeer::NOTIFICATION_APPLICATION)) $criteria->add(NotificationPeer::NOTIFICATION_APPLICATION, $this->notification_application);
		if ($this->isColumnModified(NotificationPeer::NOTIFICATION_MODULE)) $criteria->add(NotificationPeer::NOTIFICATION_MODULE, $this->notification_module);
		if ($this->isColumnModified(NotificationPeer::NOTIFICATION_ACTION)) $criteria->add(NotificationPeer::NOTIFICATION_ACTION, $this->notification_action);
		if ($this->isColumnModified(NotificationPeer::NOTIFICATION_FROM_ADDRESS)) $criteria->add(NotificationPeer::NOTIFICATION_FROM_ADDRESS, $this->notification_from_address);
		if ($this->isColumnModified(NotificationPeer::NOTIFICATION_TO_ADDRESS)) $criteria->add(NotificationPeer::NOTIFICATION_TO_ADDRESS, $this->notification_to_address);
		if ($this->isColumnModified(NotificationPeer::NOTIFICATION_SUBJECT)) $criteria->add(NotificationPeer::NOTIFICATION_SUBJECT, $this->notification_subject);
		if ($this->isColumnModified(NotificationPeer::NOTIFICATION_CONTENT)) $criteria->add(NotificationPeer::NOTIFICATION_CONTENT, $this->notification_content);
		if ($this->isColumnModified(NotificationPeer::NOTIFICATION_HTML_CONTENT)) $criteria->add(NotificationPeer::NOTIFICATION_HTML_CONTENT, $this->notification_html_content);
		if ($this->isColumnModified(NotificationPeer::NOTIFICATION_RESPONSE_CODE)) $criteria->add(NotificationPeer::NOTIFICATION_RESPONSE_CODE, $this->notification_response_code);
		if ($this->isColumnModified(NotificationPeer::NOTIFICATION_RESPONSE)) $criteria->add(NotificationPeer::NOTIFICATION_RESPONSE, $this->notification_response);
		if ($this->isColumnModified(NotificationPeer::NOTIFICATION_STATUS)) $criteria->add(NotificationPeer::NOTIFICATION_STATUS, $this->notification_status);
		if ($this->isColumnModified(NotificationPeer::NOTIFICATION_PROJECT_ID)) $criteria->add(NotificationPeer::NOTIFICATION_PROJECT_ID, $this->notification_project_id);
		if ($this->isColumnModified(NotificationPeer::CREATED_AT)) $criteria->add(NotificationPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(NotificationPeer::CREATED_BY)) $criteria->add(NotificationPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(NotificationPeer::UPDATED_AT)) $criteria->add(NotificationPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(NotificationPeer::UPDATED_BY)) $criteria->add(NotificationPeer::UPDATED_BY, $this->updated_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NotificationPeer::DATABASE_NAME);

		$criteria->add(NotificationPeer::ID, $this->id);

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

		$copyObj->setNotificationType($this->notification_type);

		$copyObj->setNotificationApplication($this->notification_application);

		$copyObj->setNotificationModule($this->notification_module);

		$copyObj->setNotificationAction($this->notification_action);

		$copyObj->setNotificationFromAddress($this->notification_from_address);

		$copyObj->setNotificationToAddress($this->notification_to_address);

		$copyObj->setNotificationSubject($this->notification_subject);

		$copyObj->setNotificationContent($this->notification_content);

		$copyObj->setNotificationHtmlContent($this->notification_html_content);

		$copyObj->setNotificationResponseCode($this->notification_response_code);

		$copyObj->setNotificationResponse($this->notification_response);

		$copyObj->setNotificationStatus($this->notification_status);

		$copyObj->setNotificationProjectId($this->notification_project_id);

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
			self::$peer = new NotificationPeer();
		}
		return self::$peer;
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

	
	public function setProject($v)
	{


		if ($v === null) {
			$this->setNotificationProjectId(NULL);
		} else {
			$this->setNotificationProjectId($v->getId());
		}


		$this->aProject = $v;
	}


	
	public function getProject($con = null)
	{
		if ($this->aProject === null && ($this->notification_project_id !== null)) {
						include_once 'lib/model/om/BaseProjectPeer.php';

			$this->aProject = ProjectPeer::retrieveByPK($this->notification_project_id, $con);

			
		}
		return $this->aProject;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseNotification:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseNotification::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
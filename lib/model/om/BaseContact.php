<?php


abstract class BaseContact extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $contact_salutation;


	
	protected $contact_first_name;


	
	protected $contact_last_name;


	
	protected $contact_email;


	
	protected $contact_phone;


	
	protected $contact_fax;


	
	protected $contact_mobile;


	
	protected $contact_birthday;


	
	protected $contact_org_unit;


	
	protected $created_at;


	
	protected $created_by = 0;


	
	protected $updated_at;


	
	protected $updated_by = 0;


	
	protected $deleted_at;


	
	protected $deleted_by = 0;

	
	protected $asfGuardUserRelatedByCreatedBy;

	
	protected $asfGuardUserRelatedByUpdatedBy;

	
	protected $asfGuardUserRelatedByDeletedBy;

	
	protected $collObjectContacts;

	
	protected $lastObjectContactCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  protected $collAddresses;

  
  protected $collDefaultAddress;

  
  protected $collObjectAddresses;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getContactSalutation()
	{

		return $this->contact_salutation;
	}

	
	public function getContactFirstName()
	{

		return $this->contact_first_name;
	}

	
	public function getContactLastName()
	{

		return $this->contact_last_name;
	}

	
	public function getContactEmail()
	{

		return $this->contact_email;
	}

	
	public function getContactPhone()
	{

		return $this->contact_phone;
	}

	
	public function getContactFax()
	{

		return $this->contact_fax;
	}

	
	public function getContactMobile()
	{

		return $this->contact_mobile;
	}

	
	public function getContactBirthday($format = 'Y-m-d')
	{

		if ($this->contact_birthday === null || $this->contact_birthday === '') {
			return null;
		} elseif (!is_int($this->contact_birthday)) {
						$ts = strtotime($this->contact_birthday);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [contact_birthday] as date/time value: " . var_export($this->contact_birthday, true));
			}
		} else {
			$ts = $this->contact_birthday;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getContactOrgUnit()
	{

		return $this->contact_org_unit;
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
			$this->modifiedColumns[] = ContactPeer::ID;
		}

	} 
	
	public function setContactSalutation($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->contact_salutation !== $v) {
			$this->contact_salutation = $v;
			$this->modifiedColumns[] = ContactPeer::CONTACT_SALUTATION;
		}

	} 
	
	public function setContactFirstName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->contact_first_name !== $v) {
			$this->contact_first_name = $v;
			$this->modifiedColumns[] = ContactPeer::CONTACT_FIRST_NAME;
		}

	} 
	
	public function setContactLastName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->contact_last_name !== $v) {
			$this->contact_last_name = $v;
			$this->modifiedColumns[] = ContactPeer::CONTACT_LAST_NAME;
		}

	} 
	
	public function setContactEmail($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->contact_email !== $v) {
			$this->contact_email = $v;
			$this->modifiedColumns[] = ContactPeer::CONTACT_EMAIL;
		}

	} 
	
	public function setContactPhone($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->contact_phone !== $v) {
			$this->contact_phone = $v;
			$this->modifiedColumns[] = ContactPeer::CONTACT_PHONE;
		}

	} 
	
	public function setContactFax($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->contact_fax !== $v) {
			$this->contact_fax = $v;
			$this->modifiedColumns[] = ContactPeer::CONTACT_FAX;
		}

	} 
	
	public function setContactMobile($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->contact_mobile !== $v) {
			$this->contact_mobile = $v;
			$this->modifiedColumns[] = ContactPeer::CONTACT_MOBILE;
		}

	} 
	
	public function setContactBirthday($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [contact_birthday] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->contact_birthday !== $ts) {
			$this->contact_birthday = $ts;
			$this->modifiedColumns[] = ContactPeer::CONTACT_BIRTHDAY;
		}

	} 
	
	public function setContactOrgUnit($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->contact_org_unit !== $v) {
			$this->contact_org_unit = $v;
			$this->modifiedColumns[] = ContactPeer::CONTACT_ORG_UNIT;
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
			$this->modifiedColumns[] = ContactPeer::CREATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v || $v === 0) {
			$this->created_by = $v;
			$this->modifiedColumns[] = ContactPeer::CREATED_BY;
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
			$this->modifiedColumns[] = ContactPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v || $v === 0) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = ContactPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = ContactPeer::DELETED_AT;
		}

	} 
	
	public function setDeletedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->deleted_by !== $v || $v === 0) {
			$this->deleted_by = $v;
			$this->modifiedColumns[] = ContactPeer::DELETED_BY;
		}

		if ($this->asfGuardUserRelatedByDeletedBy !== null && $this->asfGuardUserRelatedByDeletedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByDeletedBy = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->contact_salutation = $rs->getString($startcol + 1);

			$this->contact_first_name = $rs->getString($startcol + 2);

			$this->contact_last_name = $rs->getString($startcol + 3);

			$this->contact_email = $rs->getString($startcol + 4);

			$this->contact_phone = $rs->getString($startcol + 5);

			$this->contact_fax = $rs->getString($startcol + 6);

			$this->contact_mobile = $rs->getString($startcol + 7);

			$this->contact_birthday = $rs->getDate($startcol + 8, null);

			$this->contact_org_unit = $rs->getString($startcol + 9);

			$this->created_at = $rs->getTimestamp($startcol + 10, null);

			$this->created_by = $rs->getInt($startcol + 11);

			$this->updated_at = $rs->getTimestamp($startcol + 12, null);

			$this->updated_by = $rs->getInt($startcol + 13);

			$this->deleted_at = $rs->getTimestamp($startcol + 14, null);

			$this->deleted_by = $rs->getInt($startcol + 15);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 16; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Contact object", $e);
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
                

    foreach (sfMixer::getCallables('BaseContact:delete:pre') as $callable)
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
			$con = Propel::getConnection(ContactPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ContactPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseContact:delete:post') as $callable)
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
                

    foreach (sfMixer::getCallables('BaseContact:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(ContactPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(ContactPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ContactPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseContact:save:post') as $callable)
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

			if ($this->asfGuardUserRelatedByDeletedBy !== null) {
				if ($this->asfGuardUserRelatedByDeletedBy->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByDeletedBy->save($con);
				}
				$this->setsfGuardUserRelatedByDeletedBy($this->asfGuardUserRelatedByDeletedBy);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ContactPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ContactPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collObjectContacts !== null) {
				foreach($this->collObjectContacts as $referrerFK) {
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


			if (($retval = ContactPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collObjectContacts !== null) {
					foreach($this->collObjectContacts as $referrerFK) {
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
		$pos = ContactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getContactSalutation();
				break;
			case 2:
				return $this->getContactFirstName();
				break;
			case 3:
				return $this->getContactLastName();
				break;
			case 4:
				return $this->getContactEmail();
				break;
			case 5:
				return $this->getContactPhone();
				break;
			case 6:
				return $this->getContactFax();
				break;
			case 7:
				return $this->getContactMobile();
				break;
			case 8:
				return $this->getContactBirthday();
				break;
			case 9:
				return $this->getContactOrgUnit();
				break;
			case 10:
				return $this->getCreatedAt();
				break;
			case 11:
				return $this->getCreatedBy();
				break;
			case 12:
				return $this->getUpdatedAt();
				break;
			case 13:
				return $this->getUpdatedBy();
				break;
			case 14:
				return $this->getDeletedAt();
				break;
			case 15:
				return $this->getDeletedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ContactPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getContactSalutation(),
			$keys[2] => $this->getContactFirstName(),
			$keys[3] => $this->getContactLastName(),
			$keys[4] => $this->getContactEmail(),
			$keys[5] => $this->getContactPhone(),
			$keys[6] => $this->getContactFax(),
			$keys[7] => $this->getContactMobile(),
			$keys[8] => $this->getContactBirthday(),
			$keys[9] => $this->getContactOrgUnit(),
			$keys[10] => $this->getCreatedAt(),
			$keys[11] => $this->getCreatedBy(),
			$keys[12] => $this->getUpdatedAt(),
			$keys[13] => $this->getUpdatedBy(),
			$keys[14] => $this->getDeletedAt(),
			$keys[15] => $this->getDeletedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ContactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setContactSalutation($value);
				break;
			case 2:
				$this->setContactFirstName($value);
				break;
			case 3:
				$this->setContactLastName($value);
				break;
			case 4:
				$this->setContactEmail($value);
				break;
			case 5:
				$this->setContactPhone($value);
				break;
			case 6:
				$this->setContactFax($value);
				break;
			case 7:
				$this->setContactMobile($value);
				break;
			case 8:
				$this->setContactBirthday($value);
				break;
			case 9:
				$this->setContactOrgUnit($value);
				break;
			case 10:
				$this->setCreatedAt($value);
				break;
			case 11:
				$this->setCreatedBy($value);
				break;
			case 12:
				$this->setUpdatedAt($value);
				break;
			case 13:
				$this->setUpdatedBy($value);
				break;
			case 14:
				$this->setDeletedAt($value);
				break;
			case 15:
				$this->setDeletedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ContactPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setContactSalutation($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setContactFirstName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setContactLastName($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setContactEmail($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setContactPhone($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setContactFax($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setContactMobile($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setContactBirthday($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setContactOrgUnit($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCreatedAt($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCreatedBy($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setUpdatedAt($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setUpdatedBy($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDeletedAt($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDeletedBy($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ContactPeer::DATABASE_NAME);

		if ($this->isColumnModified(ContactPeer::ID)) $criteria->add(ContactPeer::ID, $this->id);
		if ($this->isColumnModified(ContactPeer::CONTACT_SALUTATION)) $criteria->add(ContactPeer::CONTACT_SALUTATION, $this->contact_salutation);
		if ($this->isColumnModified(ContactPeer::CONTACT_FIRST_NAME)) $criteria->add(ContactPeer::CONTACT_FIRST_NAME, $this->contact_first_name);
		if ($this->isColumnModified(ContactPeer::CONTACT_LAST_NAME)) $criteria->add(ContactPeer::CONTACT_LAST_NAME, $this->contact_last_name);
		if ($this->isColumnModified(ContactPeer::CONTACT_EMAIL)) $criteria->add(ContactPeer::CONTACT_EMAIL, $this->contact_email);
		if ($this->isColumnModified(ContactPeer::CONTACT_PHONE)) $criteria->add(ContactPeer::CONTACT_PHONE, $this->contact_phone);
		if ($this->isColumnModified(ContactPeer::CONTACT_FAX)) $criteria->add(ContactPeer::CONTACT_FAX, $this->contact_fax);
		if ($this->isColumnModified(ContactPeer::CONTACT_MOBILE)) $criteria->add(ContactPeer::CONTACT_MOBILE, $this->contact_mobile);
		if ($this->isColumnModified(ContactPeer::CONTACT_BIRTHDAY)) $criteria->add(ContactPeer::CONTACT_BIRTHDAY, $this->contact_birthday);
		if ($this->isColumnModified(ContactPeer::CONTACT_ORG_UNIT)) $criteria->add(ContactPeer::CONTACT_ORG_UNIT, $this->contact_org_unit);
		if ($this->isColumnModified(ContactPeer::CREATED_AT)) $criteria->add(ContactPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(ContactPeer::CREATED_BY)) $criteria->add(ContactPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(ContactPeer::UPDATED_AT)) $criteria->add(ContactPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(ContactPeer::UPDATED_BY)) $criteria->add(ContactPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(ContactPeer::DELETED_AT)) $criteria->add(ContactPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(ContactPeer::DELETED_BY)) $criteria->add(ContactPeer::DELETED_BY, $this->deleted_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ContactPeer::DATABASE_NAME);

		$criteria->add(ContactPeer::ID, $this->id);

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

		$copyObj->setContactSalutation($this->contact_salutation);

		$copyObj->setContactFirstName($this->contact_first_name);

		$copyObj->setContactLastName($this->contact_last_name);

		$copyObj->setContactEmail($this->contact_email);

		$copyObj->setContactPhone($this->contact_phone);

		$copyObj->setContactFax($this->contact_fax);

		$copyObj->setContactMobile($this->contact_mobile);

		$copyObj->setContactBirthday($this->contact_birthday);

		$copyObj->setContactOrgUnit($this->contact_org_unit);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setDeletedAt($this->deleted_at);

		$copyObj->setDeletedBy($this->deleted_by);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getObjectContacts() as $relObj) {
				$copyObj->addObjectContact($relObj->copy($deepCopy));
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
			self::$peer = new ContactPeer();
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

	
	public function initObjectContacts()
	{
		if ($this->collObjectContacts === null) {
			$this->collObjectContacts = array();
		}
	}

	
	public function getObjectContacts($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseObjectContactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collObjectContacts === null) {
			if ($this->isNew()) {
			   $this->collObjectContacts = array();
			} else {

				$criteria->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $this->getId());

				ObjectContactPeer::addSelectColumns($criteria);
				$this->collObjectContacts = ObjectContactPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $this->getId());

				ObjectContactPeer::addSelectColumns($criteria);
				if (!isset($this->lastObjectContactCriteria) || !$this->lastObjectContactCriteria->equals($criteria)) {
					$this->collObjectContacts = ObjectContactPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastObjectContactCriteria = $criteria;
		return $this->collObjectContacts;
	}

	
	public function countObjectContacts($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseObjectContactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $this->getId());

		return ObjectContactPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addObjectContact(ObjectContact $l)
	{
		$this->collObjectContacts[] = $l;
		$l->setContact($this);
	}


	
	public function getObjectContactsJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseObjectContactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collObjectContacts === null) {
			if ($this->isNew()) {
				$this->collObjectContacts = array();
			} else {

				$criteria->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $this->getId());

				$this->collObjectContacts = ObjectContactPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $this->getId());

			if (!isset($this->lastObjectContactCriteria) || !$this->lastObjectContactCriteria->equals($criteria)) {
				$this->collObjectContacts = ObjectContactPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		}
		$this->lastObjectContactCriteria = $criteria;

		return $this->collObjectContacts;
	}


	
	public function getObjectContactsJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseObjectContactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collObjectContacts === null) {
			if ($this->isNew()) {
				$this->collObjectContacts = array();
			} else {

				$criteria->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $this->getId());

				$this->collObjectContacts = ObjectContactPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $this->getId());

			if (!isset($this->lastObjectContactCriteria) || !$this->lastObjectContactCriteria->equals($criteria)) {
				$this->collObjectContacts = ObjectContactPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		}
		$this->lastObjectContactCriteria = $criteria;

		return $this->collObjectContacts;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseContact:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseContact::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


    public function getDefaultAddress() {
        if ($this->collObjectAddresses === null) {
            if ($this->isNew()) {
               $this->collDefaultAddress = null;
            } else {
                if ($oaddrs = $this->getObjectAddresses()) {
                    foreach ($oaddrs as $oadd) {
                        if ($oadd->getObjectaddressIsDefault()) {
                            $this->collDefaultAddress = $oadd->getAddress();
                            $this->collDefaultAddress->setAddressName($oadd->getObjectaddressName());
                        }
                    }
                } else {
                    $this->collDefaultAddress = null;
                }
            }
        }
        return $this->collDefaultAddress;
    }

    protected function getObjectAddresses() {
        if ($this->collObjectAddresses === null) {
            if ($this->isNew()) {
               $this->collObjectAddresses = array();
            } else {
                $c = new Criteria();
                $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, $this->getId());
                $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, 'Contact');
                $c->addDescendingOrderByColumn(ObjectAddressPeer::OBJECTADDRESS_IS_DEFAULT);
                $c->addJoin(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID, AddressPeer::ID);
                $collObjectAddresses = ObjectAddressPeer::doSelectJoinAddress($c);
                $this->collObjectAddresses = $collObjectAddresses;
            }
        }
        return $this->collObjectAddresses;
    }

    public function getAddresses() {
        if ($this->collAddresses === null) {
            if ($this->isNew()) {
               $this->collAddresses = array();
            } else {
                if ($oaddrs = $this->getObjectAddresses()) {
                    foreach ($oaddrs as $oadd) {
                        $add = $oadd->getAddress();
                        $add->setAddressType($oadd->getObjectaddressType());
                        $add->setAddressIsDefault($oadd->getObjectaddressIsDefault());
                        $add->setAddressName($oadd->getObjectaddressName());
                        $this->collAddresses[] = $add;
                    }
                }
            }
        }
        return $this->collAddresses;
    }

    public function addAddress($address, $default = false) {
        if (!$address->getId()) {
            $address->save();
        }
        if ($address->getAddressIsDefault()) {
            $default = true;
        }
                $found = false;
            $i = 0;
            foreach ($this->getObjectAddresses() as $oaddress) {
                if ($oaddress->getObjectaddressAddressId() == $address->getId()) {
                                        $found = true;
                    $this->collObjectAddresses[$i]->setObjectaddressIsDefault($default);
                    $this->collObjectAddresses[$i]->setObjectaddressName($address->getAddressName());
                }
                $i++;
            }
        if (!$found) {
            $object = new ObjectAddress();
            $object->setObjectaddressType($address->getAddressType());
            $object->setObjectaddressObjectClass('Contact');
            $object->setObjectaddressObjectId($this->getId());
            $object->setObjectaddressAddressId($address->getId());
            $object->setObjectaddressIsDefault($default);
            $object->setObjectaddressName($address->getAddressName());
            $this->collObjectAddresses[] = $object;
            $this->collAddresses[] = $address;
        }
        if ($default)
            $this->collDefaultAddress = $address;
    }

    public function setAddress($v)
    {
        if ($v !== null) {
            $this->addAddress($v, true);
        }
    }

    public function getAddress()
    {
        return $this->getDefaultAddress();
    }

    public function postSave($v) {
                if ($v->collObjectAddresses) {
            foreach($v->collObjectAddresses as $oaddress) {
                $oaddress->setObjectaddressObjectId($v->getId());
                $oaddress->save();
            }
        }
    }

    public function postDelete($v) {
        $c = new Criteria();
        $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, $v->getId());
        $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, 'Contact');
        ObjectAddressPeer::doDelete($c);
        $v->collObjectAddresses = array();
        $v->collAddresses = array();
        $v->collDefaultAddress = null;
                $c = new Criteria();
        $c->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $v->getId());
        ObjectContactPeer::doDelete($c);
    }

} 
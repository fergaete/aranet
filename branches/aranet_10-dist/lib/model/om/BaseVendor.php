<?php


abstract class BaseVendor extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $vendor_unique_name;


	
	protected $vendor_company_name;


	
	protected $vendor_cif;


	
	protected $vendor_kind_of_company_id = 0;


	
	protected $vendor_since;


	
	protected $vendor_website;


	
	protected $vendor_comments;


	
	protected $vendor_has_tags = false;


	
	protected $created_at;


	
	protected $created_by = 0;


	
	protected $updated_at;


	
	protected $updated_by = 0;


	
	protected $deleted_at;


	
	protected $deleted_by = 0;

	
	protected $aKindOfCompany;

	
	protected $asfGuardUserRelatedByCreatedBy;

	
	protected $asfGuardUserRelatedByUpdatedBy;

	
	protected $asfGuardUserRelatedByDeletedBy;

	
	protected $collExpenseItems;

	
	protected $lastExpenseItemCriteria = null;

	
	protected $collIncomeItems;

	
	protected $lastIncomeItemCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  protected $collAddresses;

  
  protected $collDefaultAddress;

  
  protected $collObjectAddresses;

  
  protected $collContacts;

  
  protected $collDefaultContact;

  
  protected $collObjectContacts;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getVendorUniqueName()
	{

		return $this->vendor_unique_name;
	}

	
	public function getVendorCompanyName()
	{

		return $this->vendor_company_name;
	}

	
	public function getVendorCif()
	{

		return $this->vendor_cif;
	}

	
	public function getVendorKindOfCompanyId()
	{

		return $this->vendor_kind_of_company_id;
	}

	
	public function getVendorSince($format = 'Y-m-d')
	{

		if ($this->vendor_since === null || $this->vendor_since === '') {
			return null;
		} elseif (!is_int($this->vendor_since)) {
						$ts = strtotime($this->vendor_since);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [vendor_since] as date/time value: " . var_export($this->vendor_since, true));
			}
		} else {
			$ts = $this->vendor_since;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getVendorWebsite()
	{

		return $this->vendor_website;
	}

	
	public function getVendorComments()
	{

		return $this->vendor_comments;
	}

	
	public function getVendorHasTags()
	{

		return $this->vendor_has_tags;
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
			$this->modifiedColumns[] = VendorPeer::ID;
		}

	} 
	
	public function setVendorUniqueName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->vendor_unique_name !== $v) {
			$this->vendor_unique_name = $v;
			$this->modifiedColumns[] = VendorPeer::VENDOR_UNIQUE_NAME;
		}

	} 
	
	public function setVendorCompanyName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->vendor_company_name !== $v) {
			$this->vendor_company_name = $v;
			$this->modifiedColumns[] = VendorPeer::VENDOR_COMPANY_NAME;
		}

	} 
	
	public function setVendorCif($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->vendor_cif !== $v) {
			$this->vendor_cif = $v;
			$this->modifiedColumns[] = VendorPeer::VENDOR_CIF;
		}

	} 
	
	public function setVendorKindOfCompanyId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->vendor_kind_of_company_id !== $v || $v === 0) {
			$this->vendor_kind_of_company_id = $v;
			$this->modifiedColumns[] = VendorPeer::VENDOR_KIND_OF_COMPANY_ID;
		}

		if ($this->aKindOfCompany !== null && $this->aKindOfCompany->getId() !== $v) {
			$this->aKindOfCompany = null;
		}

	} 
	
	public function setVendorSince($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [vendor_since] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->vendor_since !== $ts) {
			$this->vendor_since = $ts;
			$this->modifiedColumns[] = VendorPeer::VENDOR_SINCE;
		}

	} 
	
	public function setVendorWebsite($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->vendor_website !== $v) {
			$this->vendor_website = $v;
			$this->modifiedColumns[] = VendorPeer::VENDOR_WEBSITE;
		}

	} 
	
	public function setVendorComments($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->vendor_comments !== $v) {
			$this->vendor_comments = $v;
			$this->modifiedColumns[] = VendorPeer::VENDOR_COMMENTS;
		}

	} 
	
	public function setVendorHasTags($v)
	{

		if ($this->vendor_has_tags !== $v || $v === false) {
			$this->vendor_has_tags = $v;
			$this->modifiedColumns[] = VendorPeer::VENDOR_HAS_TAGS;
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
			$this->modifiedColumns[] = VendorPeer::CREATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v || $v === 0) {
			$this->created_by = $v;
			$this->modifiedColumns[] = VendorPeer::CREATED_BY;
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
			$this->modifiedColumns[] = VendorPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v || $v === 0) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = VendorPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = VendorPeer::DELETED_AT;
		}

	} 
	
	public function setDeletedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->deleted_by !== $v || $v === 0) {
			$this->deleted_by = $v;
			$this->modifiedColumns[] = VendorPeer::DELETED_BY;
		}

		if ($this->asfGuardUserRelatedByDeletedBy !== null && $this->asfGuardUserRelatedByDeletedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByDeletedBy = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->vendor_unique_name = $rs->getString($startcol + 1);

			$this->vendor_company_name = $rs->getString($startcol + 2);

			$this->vendor_cif = $rs->getString($startcol + 3);

			$this->vendor_kind_of_company_id = $rs->getInt($startcol + 4);

			$this->vendor_since = $rs->getDate($startcol + 5, null);

			$this->vendor_website = $rs->getString($startcol + 6);

			$this->vendor_comments = $rs->getString($startcol + 7);

			$this->vendor_has_tags = $rs->getBoolean($startcol + 8);

			$this->created_at = $rs->getTimestamp($startcol + 9, null);

			$this->created_by = $rs->getInt($startcol + 10);

			$this->updated_at = $rs->getTimestamp($startcol + 11, null);

			$this->updated_by = $rs->getInt($startcol + 12);

			$this->deleted_at = $rs->getTimestamp($startcol + 13, null);

			$this->deleted_by = $rs->getInt($startcol + 14);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 15; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Vendor object", $e);
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
                

    foreach (sfMixer::getCallables('BaseVendor:delete:pre') as $callable)
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
			$con = Propel::getConnection(VendorPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			VendorPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseVendor:delete:post') as $callable)
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
                

    foreach (sfMixer::getCallables('BaseVendor:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(VendorPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(VendorPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(VendorPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseVendor:save:post') as $callable)
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


												
			if ($this->aKindOfCompany !== null) {
				if ($this->aKindOfCompany->isModified()) {
					$affectedRows += $this->aKindOfCompany->save($con);
				}
				$this->setKindOfCompany($this->aKindOfCompany);
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
					$pk = VendorPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += VendorPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collExpenseItems !== null) {
				foreach($this->collExpenseItems as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collIncomeItems !== null) {
				foreach($this->collIncomeItems as $referrerFK) {
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


												
			if ($this->aKindOfCompany !== null) {
				if (!$this->aKindOfCompany->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aKindOfCompany->getValidationFailures());
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


			if (($retval = VendorPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collExpenseItems !== null) {
					foreach($this->collExpenseItems as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collIncomeItems !== null) {
					foreach($this->collIncomeItems as $referrerFK) {
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
		$pos = VendorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getVendorUniqueName();
				break;
			case 2:
				return $this->getVendorCompanyName();
				break;
			case 3:
				return $this->getVendorCif();
				break;
			case 4:
				return $this->getVendorKindOfCompanyId();
				break;
			case 5:
				return $this->getVendorSince();
				break;
			case 6:
				return $this->getVendorWebsite();
				break;
			case 7:
				return $this->getVendorComments();
				break;
			case 8:
				return $this->getVendorHasTags();
				break;
			case 9:
				return $this->getCreatedAt();
				break;
			case 10:
				return $this->getCreatedBy();
				break;
			case 11:
				return $this->getUpdatedAt();
				break;
			case 12:
				return $this->getUpdatedBy();
				break;
			case 13:
				return $this->getDeletedAt();
				break;
			case 14:
				return $this->getDeletedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = VendorPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getVendorUniqueName(),
			$keys[2] => $this->getVendorCompanyName(),
			$keys[3] => $this->getVendorCif(),
			$keys[4] => $this->getVendorKindOfCompanyId(),
			$keys[5] => $this->getVendorSince(),
			$keys[6] => $this->getVendorWebsite(),
			$keys[7] => $this->getVendorComments(),
			$keys[8] => $this->getVendorHasTags(),
			$keys[9] => $this->getCreatedAt(),
			$keys[10] => $this->getCreatedBy(),
			$keys[11] => $this->getUpdatedAt(),
			$keys[12] => $this->getUpdatedBy(),
			$keys[13] => $this->getDeletedAt(),
			$keys[14] => $this->getDeletedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = VendorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setVendorUniqueName($value);
				break;
			case 2:
				$this->setVendorCompanyName($value);
				break;
			case 3:
				$this->setVendorCif($value);
				break;
			case 4:
				$this->setVendorKindOfCompanyId($value);
				break;
			case 5:
				$this->setVendorSince($value);
				break;
			case 6:
				$this->setVendorWebsite($value);
				break;
			case 7:
				$this->setVendorComments($value);
				break;
			case 8:
				$this->setVendorHasTags($value);
				break;
			case 9:
				$this->setCreatedAt($value);
				break;
			case 10:
				$this->setCreatedBy($value);
				break;
			case 11:
				$this->setUpdatedAt($value);
				break;
			case 12:
				$this->setUpdatedBy($value);
				break;
			case 13:
				$this->setDeletedAt($value);
				break;
			case 14:
				$this->setDeletedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = VendorPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setVendorUniqueName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setVendorCompanyName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setVendorCif($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setVendorKindOfCompanyId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setVendorSince($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setVendorWebsite($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setVendorComments($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setVendorHasTags($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedAt($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCreatedBy($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUpdatedAt($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setUpdatedBy($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDeletedAt($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDeletedBy($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(VendorPeer::DATABASE_NAME);

		if ($this->isColumnModified(VendorPeer::ID)) $criteria->add(VendorPeer::ID, $this->id);
		if ($this->isColumnModified(VendorPeer::VENDOR_UNIQUE_NAME)) $criteria->add(VendorPeer::VENDOR_UNIQUE_NAME, $this->vendor_unique_name);
		if ($this->isColumnModified(VendorPeer::VENDOR_COMPANY_NAME)) $criteria->add(VendorPeer::VENDOR_COMPANY_NAME, $this->vendor_company_name);
		if ($this->isColumnModified(VendorPeer::VENDOR_CIF)) $criteria->add(VendorPeer::VENDOR_CIF, $this->vendor_cif);
		if ($this->isColumnModified(VendorPeer::VENDOR_KIND_OF_COMPANY_ID)) $criteria->add(VendorPeer::VENDOR_KIND_OF_COMPANY_ID, $this->vendor_kind_of_company_id);
		if ($this->isColumnModified(VendorPeer::VENDOR_SINCE)) $criteria->add(VendorPeer::VENDOR_SINCE, $this->vendor_since);
		if ($this->isColumnModified(VendorPeer::VENDOR_WEBSITE)) $criteria->add(VendorPeer::VENDOR_WEBSITE, $this->vendor_website);
		if ($this->isColumnModified(VendorPeer::VENDOR_COMMENTS)) $criteria->add(VendorPeer::VENDOR_COMMENTS, $this->vendor_comments);
		if ($this->isColumnModified(VendorPeer::VENDOR_HAS_TAGS)) $criteria->add(VendorPeer::VENDOR_HAS_TAGS, $this->vendor_has_tags);
		if ($this->isColumnModified(VendorPeer::CREATED_AT)) $criteria->add(VendorPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(VendorPeer::CREATED_BY)) $criteria->add(VendorPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(VendorPeer::UPDATED_AT)) $criteria->add(VendorPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(VendorPeer::UPDATED_BY)) $criteria->add(VendorPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(VendorPeer::DELETED_AT)) $criteria->add(VendorPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(VendorPeer::DELETED_BY)) $criteria->add(VendorPeer::DELETED_BY, $this->deleted_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(VendorPeer::DATABASE_NAME);

		$criteria->add(VendorPeer::ID, $this->id);

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

		$copyObj->setVendorUniqueName($this->vendor_unique_name);

		$copyObj->setVendorCompanyName($this->vendor_company_name);

		$copyObj->setVendorCif($this->vendor_cif);

		$copyObj->setVendorKindOfCompanyId($this->vendor_kind_of_company_id);

		$copyObj->setVendorSince($this->vendor_since);

		$copyObj->setVendorWebsite($this->vendor_website);

		$copyObj->setVendorComments($this->vendor_comments);

		$copyObj->setVendorHasTags($this->vendor_has_tags);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setDeletedAt($this->deleted_at);

		$copyObj->setDeletedBy($this->deleted_by);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getExpenseItems() as $relObj) {
				$copyObj->addExpenseItem($relObj->copy($deepCopy));
			}

			foreach($this->getIncomeItems() as $relObj) {
				$copyObj->addIncomeItem($relObj->copy($deepCopy));
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
			self::$peer = new VendorPeer();
		}
		return self::$peer;
	}

	
	public function setKindOfCompany($v)
	{


		if ($v === null) {
			$this->setVendorKindOfCompanyId('null');
		} else {
			$this->setVendorKindOfCompanyId($v->getId());
		}


		$this->aKindOfCompany = $v;
	}


	
	public function getKindOfCompany($con = null)
	{
		if ($this->aKindOfCompany === null && ($this->vendor_kind_of_company_id !== null)) {
						include_once 'lib/model/om/BaseKindOfCompanyPeer.php';

			$this->aKindOfCompany = KindOfCompanyPeer::retrieveByPK($this->vendor_kind_of_company_id, $con);

			
		}
		return $this->aKindOfCompany;
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

	
	public function initExpenseItems()
	{
		if ($this->collExpenseItems === null) {
			$this->collExpenseItems = array();
		}
	}

	
	public function getExpenseItems($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItems === null) {
			if ($this->isNew()) {
			   $this->collExpenseItems = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, $this->getId());

				ExpenseItemPeer::addSelectColumns($criteria);
				$this->collExpenseItems = ExpenseItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, $this->getId());

				ExpenseItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
					$this->collExpenseItems = ExpenseItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastExpenseItemCriteria = $criteria;
		return $this->collExpenseItems;
	}

	
	public function countExpenseItems($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, $this->getId());

		return ExpenseItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addExpenseItem(ExpenseItem $l)
	{
		$this->collExpenseItems[] = $l;
		$l->setVendor($this);
	}


	
	public function getExpenseItemsJoinsfGuardUserRelatedByExpensePurchaseBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItems === null) {
			if ($this->isNew()) {
				$this->collExpenseItems = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByExpensePurchaseBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByExpensePurchaseBy($criteria, $con);
			}
		}
		$this->lastExpenseItemCriteria = $criteria;

		return $this->collExpenseItems;
	}


	
	public function getExpenseItemsJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItems === null) {
			if ($this->isNew()) {
				$this->collExpenseItems = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastExpenseItemCriteria = $criteria;

		return $this->collExpenseItems;
	}


	
	public function getExpenseItemsJoinsfGuardUserRelatedByExpenseValidateBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItems === null) {
			if ($this->isNew()) {
				$this->collExpenseItems = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByExpenseValidateBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByExpenseValidateBy($criteria, $con);
			}
		}
		$this->lastExpenseItemCriteria = $criteria;

		return $this->collExpenseItems;
	}


	
	public function getExpenseItemsJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItems === null) {
			if ($this->isNew()) {
				$this->collExpenseItems = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		}
		$this->lastExpenseItemCriteria = $criteria;

		return $this->collExpenseItems;
	}


	
	public function getExpenseItemsJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItems === null) {
			if ($this->isNew()) {
				$this->collExpenseItems = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		}
		$this->lastExpenseItemCriteria = $criteria;

		return $this->collExpenseItems;
	}


	
	public function getExpenseItemsJoinsfGuardUserRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItems === null) {
			if ($this->isNew()) {
				$this->collExpenseItems = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		}
		$this->lastExpenseItemCriteria = $criteria;

		return $this->collExpenseItems;
	}


	
	public function getExpenseItemsJoinExpenseCategory($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItems === null) {
			if ($this->isNew()) {
				$this->collExpenseItems = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinExpenseCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinExpenseCategory($criteria, $con);
			}
		}
		$this->lastExpenseItemCriteria = $criteria;

		return $this->collExpenseItems;
	}


	
	public function getExpenseItemsJoinPaymentMethod($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItems === null) {
			if ($this->isNew()) {
				$this->collExpenseItems = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		}
		$this->lastExpenseItemCriteria = $criteria;

		return $this->collExpenseItems;
	}


	
	public function getExpenseItemsJoinReimbursement($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItems === null) {
			if ($this->isNew()) {
				$this->collExpenseItems = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinReimbursement($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinReimbursement($criteria, $con);
			}
		}
		$this->lastExpenseItemCriteria = $criteria;

		return $this->collExpenseItems;
	}


	
	public function getExpenseItemsJoinBudget($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItems === null) {
			if ($this->isNew()) {
				$this->collExpenseItems = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinBudget($criteria, $con);
			}
		}
		$this->lastExpenseItemCriteria = $criteria;

		return $this->collExpenseItems;
	}

	
	public function initIncomeItems()
	{
		if ($this->collIncomeItems === null) {
			$this->collIncomeItems = array();
		}
	}

	
	public function getIncomeItems($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItems === null) {
			if ($this->isNew()) {
			   $this->collIncomeItems = array();
			} else {

				$criteria->add(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, $this->getId());

				IncomeItemPeer::addSelectColumns($criteria);
				$this->collIncomeItems = IncomeItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, $this->getId());

				IncomeItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastIncomeItemCriteria) || !$this->lastIncomeItemCriteria->equals($criteria)) {
					$this->collIncomeItems = IncomeItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastIncomeItemCriteria = $criteria;
		return $this->collIncomeItems;
	}

	
	public function countIncomeItems($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, $this->getId());

		return IncomeItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addIncomeItem(IncomeItem $l)
	{
		$this->collIncomeItems[] = $l;
		$l->setVendor($this);
	}


	
	public function getIncomeItemsJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItems === null) {
			if ($this->isNew()) {
				$this->collIncomeItems = array();
			} else {

				$criteria->add(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, $this->getId());

			if (!isset($this->lastIncomeItemCriteria) || !$this->lastIncomeItemCriteria->equals($criteria)) {
				$this->collIncomeItems = IncomeItemPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		}
		$this->lastIncomeItemCriteria = $criteria;

		return $this->collIncomeItems;
	}


	
	public function getIncomeItemsJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItems === null) {
			if ($this->isNew()) {
				$this->collIncomeItems = array();
			} else {

				$criteria->add(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, $this->getId());

			if (!isset($this->lastIncomeItemCriteria) || !$this->lastIncomeItemCriteria->equals($criteria)) {
				$this->collIncomeItems = IncomeItemPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		}
		$this->lastIncomeItemCriteria = $criteria;

		return $this->collIncomeItems;
	}


	
	public function getIncomeItemsJoinsfGuardUserRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItems === null) {
			if ($this->isNew()) {
				$this->collIncomeItems = array();
			} else {

				$criteria->add(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, $this->getId());

			if (!isset($this->lastIncomeItemCriteria) || !$this->lastIncomeItemCriteria->equals($criteria)) {
				$this->collIncomeItems = IncomeItemPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		}
		$this->lastIncomeItemCriteria = $criteria;

		return $this->collIncomeItems;
	}


	
	public function getIncomeItemsJoinIncomeCategory($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItems === null) {
			if ($this->isNew()) {
				$this->collIncomeItems = array();
			} else {

				$criteria->add(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinIncomeCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, $this->getId());

			if (!isset($this->lastIncomeItemCriteria) || !$this->lastIncomeItemCriteria->equals($criteria)) {
				$this->collIncomeItems = IncomeItemPeer::doSelectJoinIncomeCategory($criteria, $con);
			}
		}
		$this->lastIncomeItemCriteria = $criteria;

		return $this->collIncomeItems;
	}


	
	public function getIncomeItemsJoinPaymentMethod($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItems === null) {
			if ($this->isNew()) {
				$this->collIncomeItems = array();
			} else {

				$criteria->add(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, $this->getId());

			if (!isset($this->lastIncomeItemCriteria) || !$this->lastIncomeItemCriteria->equals($criteria)) {
				$this->collIncomeItems = IncomeItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		}
		$this->lastIncomeItemCriteria = $criteria;

		return $this->collIncomeItems;
	}


	
	public function getIncomeItemsJoinReimbursement($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItems === null) {
			if ($this->isNew()) {
				$this->collIncomeItems = array();
			} else {

				$criteria->add(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinReimbursement($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, $this->getId());

			if (!isset($this->lastIncomeItemCriteria) || !$this->lastIncomeItemCriteria->equals($criteria)) {
				$this->collIncomeItems = IncomeItemPeer::doSelectJoinReimbursement($criteria, $con);
			}
		}
		$this->lastIncomeItemCriteria = $criteria;

		return $this->collIncomeItems;
	}


	
	public function getIncomeItemsJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItems === null) {
			if ($this->isNew()) {
				$this->collIncomeItems = array();
			} else {

				$criteria->add(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, $this->getId());

			if (!isset($this->lastIncomeItemCriteria) || !$this->lastIncomeItemCriteria->equals($criteria)) {
				$this->collIncomeItems = IncomeItemPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastIncomeItemCriteria = $criteria;

		return $this->collIncomeItems;
	}


	
	public function getIncomeItemsJoinBudget($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItems === null) {
			if ($this->isNew()) {
				$this->collIncomeItems = array();
			} else {

				$criteria->add(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, $this->getId());

			if (!isset($this->lastIncomeItemCriteria) || !$this->lastIncomeItemCriteria->equals($criteria)) {
				$this->collIncomeItems = IncomeItemPeer::doSelectJoinBudget($criteria, $con);
			}
		}
		$this->lastIncomeItemCriteria = $criteria;

		return $this->collIncomeItems;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseVendor:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseVendor::%s', $method));
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
                $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, 'Vendor');
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
            $object->setObjectaddressObjectClass('Vendor');
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
                if ($v->collObjectContacts) {
            foreach($v->collObjectContacts as $ocontact) {
                $ocontact->setObjectcontactObjectId($v->getId());
                $ocontact->save();
            }
        }
    }

    public function postDelete($v) {
        $c = new Criteria();
        $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, $v->getId());
        $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, 'Vendor');
        ObjectAddressPeer::doDelete($c);
        $v->collObjectAddresses = array();
        $v->collAddresses = array();
        $v->collDefaultAddress = null;
                $c = new Criteria();
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, $v->getId());
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, 'Vendor');
        ObjectContactPeer::doDelete($c);
        $v->collObjectContacts = array();
        $v->collContacts = array();
        $v->collDefaultContact = null;
    }

    public function getDefaultContact() {
        if ($this->collDefaultContact === null) {
            if ($this->isNew()) {
               $this->collDefaultContact = null;
            } else {
                if ($oconts = $this->getObjectContacts()) {
                    foreach ($oconts as $ocont) {
                        if ($ocont->getObjectcontactIsDefault()) {
                            $this->collDefaultContact = $ocont->getContact();
                            $this->collDefaultContact->setContactRol($ocont->getObjectcontactRol());
                        }
                    }
                } else {
                    $this->collDefaultContact = null;
                }
            }
        }
        return $this->collDefaultContact;
    }

    public function getContact() {
        return $this->getDefaultContact();
    }

    protected function getObjectContacts() {
        if ($this->collObjectContacts === null) {
            if ($this->isNew()) {
               $this->collObjectContacts = array();
            } else {
                $c = new Criteria();
                $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, $this->getId());
                $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, 'Vendor');
                $c->addDescendingOrderByColumn(ObjectContactPeer::OBJECTCONTACT_IS_DEFAULT);
                $c->addJoin(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, ContactPeer::ID);
                $collObjectContacts = ObjectContactPeer::doSelectJoinContact($c);
                $this->collObjectContacts = $collObjectContacts;
            }
        }
        return $this->collObjectContacts;
    }

    public function getContacts() {
        if ($this->collContacts === null) {
            if ($this->isNew()) {
               $this->collContacts = array();
            } else {
                if ($oconts = $this->getObjectContacts()) {
                    foreach ($oconts as $ocont) {
                        $cont = $ocont->getContact();
                        $cont->setContactRol($ocont->getObjectcontactRol());
                        $this->collContacts[] = $cont;
                    }
                }
            }
        }
        return $this->collContacts;
    }

    public function addContact($contact, $default = false) {
        if (!$contact->getId()) {
            $contact->save();
        }
                $found = false;
            $i = 0;
            foreach ($this->getObjectContacts() as $ocontact) {
                if ($ocontact->getObjectcontactContactId() == $contact->getId()) {
                    $found = true;
                    $this->collObjectContacts[$i]->setObjectcontactIsDefault($default);
                }
                $i++;
            }
        if (!$found) {
            $object = new ObjectContact();
            $object->setObjectcontactObjectClass('Vendor');
            $object->setObjectcontactObjectId($this->getId());
            $object->setObjectcontactContactId($contact->getId());
            $object->setObjectcontactIsDefault($default);
            $object->setObjectcontactRol($contact->getContactRol());
            $this->collObjectContacts[] = $object;
        }
        $this->collContacts[] = $contact;
        if ($default)
            $this->collDefaultContact = $contact;
    }

    public function setContact($v)
    {
        if ($v !== null) {
            $this->addContact($v, true);
        }
    }
    
} 
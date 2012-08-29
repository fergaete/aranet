<?php


abstract class BaseClient extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $client_unique_name;


	
	protected $client_company_name;


	
	protected $client_cif;


	
	protected $client_kind_of_company_id = 0;


	
	protected $client_since;


	
	protected $client_website;


	
	protected $client_comments;


	
	protected $client_has_tags = false;


	
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

	
	protected $collProjects;

	
	protected $lastProjectCriteria = null;

	
	protected $collInvoices;

	
	protected $lastInvoiceCriteria = null;

	
	protected $collBudgets;

	
	protected $lastBudgetCriteria = null;

	
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

	
	public function getClientUniqueName()
	{

		return $this->client_unique_name;
	}

	
	public function getClientCompanyName()
	{

		return $this->client_company_name;
	}

	
	public function getClientCif()
	{

		return $this->client_cif;
	}

	
	public function getClientKindOfCompanyId()
	{

		return $this->client_kind_of_company_id;
	}

	
	public function getClientSince($format = 'Y-m-d')
	{

		if ($this->client_since === null || $this->client_since === '') {
			return null;
		} elseif (!is_int($this->client_since)) {
						$ts = strtotime($this->client_since);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [client_since] as date/time value: " . var_export($this->client_since, true));
			}
		} else {
			$ts = $this->client_since;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getClientWebsite()
	{

		return $this->client_website;
	}

	
	public function getClientComments()
	{

		return $this->client_comments;
	}

	
	public function getClientHasTags()
	{

		return $this->client_has_tags;
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
			$this->modifiedColumns[] = ClientPeer::ID;
		}

	} 
	
	public function setClientUniqueName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->client_unique_name !== $v) {
			$this->client_unique_name = $v;
			$this->modifiedColumns[] = ClientPeer::CLIENT_UNIQUE_NAME;
		}

	} 
	
	public function setClientCompanyName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->client_company_name !== $v) {
			$this->client_company_name = $v;
			$this->modifiedColumns[] = ClientPeer::CLIENT_COMPANY_NAME;
		}

	} 
	
	public function setClientCif($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->client_cif !== $v) {
			$this->client_cif = $v;
			$this->modifiedColumns[] = ClientPeer::CLIENT_CIF;
		}

	} 
	
	public function setClientKindOfCompanyId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->client_kind_of_company_id !== $v || $v === 0) {
			$this->client_kind_of_company_id = $v;
			$this->modifiedColumns[] = ClientPeer::CLIENT_KIND_OF_COMPANY_ID;
		}

		if ($this->aKindOfCompany !== null && $this->aKindOfCompany->getId() !== $v) {
			$this->aKindOfCompany = null;
		}

	} 
	
	public function setClientSince($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [client_since] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->client_since !== $ts) {
			$this->client_since = $ts;
			$this->modifiedColumns[] = ClientPeer::CLIENT_SINCE;
		}

	} 
	
	public function setClientWebsite($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->client_website !== $v) {
			$this->client_website = $v;
			$this->modifiedColumns[] = ClientPeer::CLIENT_WEBSITE;
		}

	} 
	
	public function setClientComments($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->client_comments !== $v) {
			$this->client_comments = $v;
			$this->modifiedColumns[] = ClientPeer::CLIENT_COMMENTS;
		}

	} 
	
	public function setClientHasTags($v)
	{

		if ($this->client_has_tags !== $v || $v === false) {
			$this->client_has_tags = $v;
			$this->modifiedColumns[] = ClientPeer::CLIENT_HAS_TAGS;
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
			$this->modifiedColumns[] = ClientPeer::CREATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v || $v === 0) {
			$this->created_by = $v;
			$this->modifiedColumns[] = ClientPeer::CREATED_BY;
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
			$this->modifiedColumns[] = ClientPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v || $v === 0) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = ClientPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = ClientPeer::DELETED_AT;
		}

	} 
	
	public function setDeletedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->deleted_by !== $v || $v === 0) {
			$this->deleted_by = $v;
			$this->modifiedColumns[] = ClientPeer::DELETED_BY;
		}

		if ($this->asfGuardUserRelatedByDeletedBy !== null && $this->asfGuardUserRelatedByDeletedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByDeletedBy = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->client_unique_name = $rs->getString($startcol + 1);

			$this->client_company_name = $rs->getString($startcol + 2);

			$this->client_cif = $rs->getString($startcol + 3);

			$this->client_kind_of_company_id = $rs->getInt($startcol + 4);

			$this->client_since = $rs->getDate($startcol + 5, null);

			$this->client_website = $rs->getString($startcol + 6);

			$this->client_comments = $rs->getString($startcol + 7);

			$this->client_has_tags = $rs->getBoolean($startcol + 8);

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
			throw new PropelException("Error populating Client object", $e);
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
                

    foreach (sfMixer::getCallables('BaseClient:delete:pre') as $callable)
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
			$con = Propel::getConnection(ClientPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ClientPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseClient:delete:post') as $callable)
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
                

    foreach (sfMixer::getCallables('BaseClient:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(ClientPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(ClientPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ClientPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseClient:save:post') as $callable)
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
					$pk = ClientPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ClientPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collProjects !== null) {
				foreach($this->collProjects as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collInvoices !== null) {
				foreach($this->collInvoices as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collBudgets !== null) {
				foreach($this->collBudgets as $referrerFK) {
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


			if (($retval = ClientPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collProjects !== null) {
					foreach($this->collProjects as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collInvoices !== null) {
					foreach($this->collInvoices as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collBudgets !== null) {
					foreach($this->collBudgets as $referrerFK) {
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
		$pos = ClientPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getClientUniqueName();
				break;
			case 2:
				return $this->getClientCompanyName();
				break;
			case 3:
				return $this->getClientCif();
				break;
			case 4:
				return $this->getClientKindOfCompanyId();
				break;
			case 5:
				return $this->getClientSince();
				break;
			case 6:
				return $this->getClientWebsite();
				break;
			case 7:
				return $this->getClientComments();
				break;
			case 8:
				return $this->getClientHasTags();
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
		$keys = ClientPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getClientUniqueName(),
			$keys[2] => $this->getClientCompanyName(),
			$keys[3] => $this->getClientCif(),
			$keys[4] => $this->getClientKindOfCompanyId(),
			$keys[5] => $this->getClientSince(),
			$keys[6] => $this->getClientWebsite(),
			$keys[7] => $this->getClientComments(),
			$keys[8] => $this->getClientHasTags(),
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
		$pos = ClientPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setClientUniqueName($value);
				break;
			case 2:
				$this->setClientCompanyName($value);
				break;
			case 3:
				$this->setClientCif($value);
				break;
			case 4:
				$this->setClientKindOfCompanyId($value);
				break;
			case 5:
				$this->setClientSince($value);
				break;
			case 6:
				$this->setClientWebsite($value);
				break;
			case 7:
				$this->setClientComments($value);
				break;
			case 8:
				$this->setClientHasTags($value);
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
		$keys = ClientPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setClientUniqueName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setClientCompanyName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setClientCif($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setClientKindOfCompanyId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setClientSince($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setClientWebsite($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setClientComments($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setClientHasTags($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedAt($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCreatedBy($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUpdatedAt($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setUpdatedBy($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDeletedAt($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDeletedBy($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ClientPeer::DATABASE_NAME);

		if ($this->isColumnModified(ClientPeer::ID)) $criteria->add(ClientPeer::ID, $this->id);
		if ($this->isColumnModified(ClientPeer::CLIENT_UNIQUE_NAME)) $criteria->add(ClientPeer::CLIENT_UNIQUE_NAME, $this->client_unique_name);
		if ($this->isColumnModified(ClientPeer::CLIENT_COMPANY_NAME)) $criteria->add(ClientPeer::CLIENT_COMPANY_NAME, $this->client_company_name);
		if ($this->isColumnModified(ClientPeer::CLIENT_CIF)) $criteria->add(ClientPeer::CLIENT_CIF, $this->client_cif);
		if ($this->isColumnModified(ClientPeer::CLIENT_KIND_OF_COMPANY_ID)) $criteria->add(ClientPeer::CLIENT_KIND_OF_COMPANY_ID, $this->client_kind_of_company_id);
		if ($this->isColumnModified(ClientPeer::CLIENT_SINCE)) $criteria->add(ClientPeer::CLIENT_SINCE, $this->client_since);
		if ($this->isColumnModified(ClientPeer::CLIENT_WEBSITE)) $criteria->add(ClientPeer::CLIENT_WEBSITE, $this->client_website);
		if ($this->isColumnModified(ClientPeer::CLIENT_COMMENTS)) $criteria->add(ClientPeer::CLIENT_COMMENTS, $this->client_comments);
		if ($this->isColumnModified(ClientPeer::CLIENT_HAS_TAGS)) $criteria->add(ClientPeer::CLIENT_HAS_TAGS, $this->client_has_tags);
		if ($this->isColumnModified(ClientPeer::CREATED_AT)) $criteria->add(ClientPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(ClientPeer::CREATED_BY)) $criteria->add(ClientPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(ClientPeer::UPDATED_AT)) $criteria->add(ClientPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(ClientPeer::UPDATED_BY)) $criteria->add(ClientPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(ClientPeer::DELETED_AT)) $criteria->add(ClientPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(ClientPeer::DELETED_BY)) $criteria->add(ClientPeer::DELETED_BY, $this->deleted_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ClientPeer::DATABASE_NAME);

		$criteria->add(ClientPeer::ID, $this->id);

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

		$copyObj->setClientUniqueName($this->client_unique_name);

		$copyObj->setClientCompanyName($this->client_company_name);

		$copyObj->setClientCif($this->client_cif);

		$copyObj->setClientKindOfCompanyId($this->client_kind_of_company_id);

		$copyObj->setClientSince($this->client_since);

		$copyObj->setClientWebsite($this->client_website);

		$copyObj->setClientComments($this->client_comments);

		$copyObj->setClientHasTags($this->client_has_tags);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setDeletedAt($this->deleted_at);

		$copyObj->setDeletedBy($this->deleted_by);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getProjects() as $relObj) {
				$copyObj->addProject($relObj->copy($deepCopy));
			}

			foreach($this->getInvoices() as $relObj) {
				$copyObj->addInvoice($relObj->copy($deepCopy));
			}

			foreach($this->getBudgets() as $relObj) {
				$copyObj->addBudget($relObj->copy($deepCopy));
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
			self::$peer = new ClientPeer();
		}
		return self::$peer;
	}

	
	public function setKindOfCompany($v)
	{


		if ($v === null) {
			$this->setClientKindOfCompanyId('null');
		} else {
			$this->setClientKindOfCompanyId($v->getId());
		}


		$this->aKindOfCompany = $v;
	}


	
	public function getKindOfCompany($con = null)
	{
		if ($this->aKindOfCompany === null && ($this->client_kind_of_company_id !== null)) {
						include_once 'lib/model/om/BaseKindOfCompanyPeer.php';

			$this->aKindOfCompany = KindOfCompanyPeer::retrieveByPK($this->client_kind_of_company_id, $con);

			
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

	
	public function initProjects()
	{
		if ($this->collProjects === null) {
			$this->collProjects = array();
		}
	}

	
	public function getProjects($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjects === null) {
			if ($this->isNew()) {
			   $this->collProjects = array();
			} else {

				$criteria->add(ProjectPeer::PROJECT_CLIENT_ID, $this->getId());

				ProjectPeer::addSelectColumns($criteria);
				$this->collProjects = ProjectPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ProjectPeer::PROJECT_CLIENT_ID, $this->getId());

				ProjectPeer::addSelectColumns($criteria);
				if (!isset($this->lastProjectCriteria) || !$this->lastProjectCriteria->equals($criteria)) {
					$this->collProjects = ProjectPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProjectCriteria = $criteria;
		return $this->collProjects;
	}

	
	public function countProjects($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ProjectPeer::PROJECT_CLIENT_ID, $this->getId());

		return ProjectPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addProject(Project $l)
	{
		$this->collProjects[] = $l;
		$l->setClient($this);
	}


	
	public function getProjectsJoinProjectCategory($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjects === null) {
			if ($this->isNew()) {
				$this->collProjects = array();
			} else {

				$criteria->add(ProjectPeer::PROJECT_CLIENT_ID, $this->getId());

				$this->collProjects = ProjectPeer::doSelectJoinProjectCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::PROJECT_CLIENT_ID, $this->getId());

			if (!isset($this->lastProjectCriteria) || !$this->lastProjectCriteria->equals($criteria)) {
				$this->collProjects = ProjectPeer::doSelectJoinProjectCategory($criteria, $con);
			}
		}
		$this->lastProjectCriteria = $criteria;

		return $this->collProjects;
	}


	
	public function getProjectsJoinProjectStatus($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjects === null) {
			if ($this->isNew()) {
				$this->collProjects = array();
			} else {

				$criteria->add(ProjectPeer::PROJECT_CLIENT_ID, $this->getId());

				$this->collProjects = ProjectPeer::doSelectJoinProjectStatus($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::PROJECT_CLIENT_ID, $this->getId());

			if (!isset($this->lastProjectCriteria) || !$this->lastProjectCriteria->equals($criteria)) {
				$this->collProjects = ProjectPeer::doSelectJoinProjectStatus($criteria, $con);
			}
		}
		$this->lastProjectCriteria = $criteria;

		return $this->collProjects;
	}


	
	public function getProjectsJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjects === null) {
			if ($this->isNew()) {
				$this->collProjects = array();
			} else {

				$criteria->add(ProjectPeer::PROJECT_CLIENT_ID, $this->getId());

				$this->collProjects = ProjectPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::PROJECT_CLIENT_ID, $this->getId());

			if (!isset($this->lastProjectCriteria) || !$this->lastProjectCriteria->equals($criteria)) {
				$this->collProjects = ProjectPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		}
		$this->lastProjectCriteria = $criteria;

		return $this->collProjects;
	}


	
	public function getProjectsJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjects === null) {
			if ($this->isNew()) {
				$this->collProjects = array();
			} else {

				$criteria->add(ProjectPeer::PROJECT_CLIENT_ID, $this->getId());

				$this->collProjects = ProjectPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::PROJECT_CLIENT_ID, $this->getId());

			if (!isset($this->lastProjectCriteria) || !$this->lastProjectCriteria->equals($criteria)) {
				$this->collProjects = ProjectPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		}
		$this->lastProjectCriteria = $criteria;

		return $this->collProjects;
	}


	
	public function getProjectsJoinsfGuardUserRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjects === null) {
			if ($this->isNew()) {
				$this->collProjects = array();
			} else {

				$criteria->add(ProjectPeer::PROJECT_CLIENT_ID, $this->getId());

				$this->collProjects = ProjectPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::PROJECT_CLIENT_ID, $this->getId());

			if (!isset($this->lastProjectCriteria) || !$this->lastProjectCriteria->equals($criteria)) {
				$this->collProjects = ProjectPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		}
		$this->lastProjectCriteria = $criteria;

		return $this->collProjects;
	}

	
	public function initInvoices()
	{
		if ($this->collInvoices === null) {
			$this->collInvoices = array();
		}
	}

	
	public function getInvoices($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoices === null) {
			if ($this->isNew()) {
			   $this->collInvoices = array();
			} else {

				$criteria->add(InvoicePeer::INVOICE_CLIENT_ID, $this->getId());

				InvoicePeer::addSelectColumns($criteria);
				$this->collInvoices = InvoicePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InvoicePeer::INVOICE_CLIENT_ID, $this->getId());

				InvoicePeer::addSelectColumns($criteria);
				if (!isset($this->lastInvoiceCriteria) || !$this->lastInvoiceCriteria->equals($criteria)) {
					$this->collInvoices = InvoicePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastInvoiceCriteria = $criteria;
		return $this->collInvoices;
	}

	
	public function countInvoices($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(InvoicePeer::INVOICE_CLIENT_ID, $this->getId());

		return InvoicePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInvoice(Invoice $l)
	{
		$this->collInvoices[] = $l;
		$l->setClient($this);
	}


	
	public function getInvoicesJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoices === null) {
			if ($this->isNew()) {
				$this->collInvoices = array();
			} else {

				$criteria->add(InvoicePeer::INVOICE_CLIENT_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_CLIENT_ID, $this->getId());

			if (!isset($this->lastInvoiceCriteria) || !$this->lastInvoiceCriteria->equals($criteria)) {
				$this->collInvoices = InvoicePeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastInvoiceCriteria = $criteria;

		return $this->collInvoices;
	}


	
	public function getInvoicesJoinBudget($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoices === null) {
			if ($this->isNew()) {
				$this->collInvoices = array();
			} else {

				$criteria->add(InvoicePeer::INVOICE_CLIENT_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_CLIENT_ID, $this->getId());

			if (!isset($this->lastInvoiceCriteria) || !$this->lastInvoiceCriteria->equals($criteria)) {
				$this->collInvoices = InvoicePeer::doSelectJoinBudget($criteria, $con);
			}
		}
		$this->lastInvoiceCriteria = $criteria;

		return $this->collInvoices;
	}


	
	public function getInvoicesJoinInvoiceCategory($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoices === null) {
			if ($this->isNew()) {
				$this->collInvoices = array();
			} else {

				$criteria->add(InvoicePeer::INVOICE_CLIENT_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinInvoiceCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_CLIENT_ID, $this->getId());

			if (!isset($this->lastInvoiceCriteria) || !$this->lastInvoiceCriteria->equals($criteria)) {
				$this->collInvoices = InvoicePeer::doSelectJoinInvoiceCategory($criteria, $con);
			}
		}
		$this->lastInvoiceCriteria = $criteria;

		return $this->collInvoices;
	}


	
	public function getInvoicesJoinKindOfInvoice($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoices === null) {
			if ($this->isNew()) {
				$this->collInvoices = array();
			} else {

				$criteria->add(InvoicePeer::INVOICE_CLIENT_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinKindOfInvoice($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_CLIENT_ID, $this->getId());

			if (!isset($this->lastInvoiceCriteria) || !$this->lastInvoiceCriteria->equals($criteria)) {
				$this->collInvoices = InvoicePeer::doSelectJoinKindOfInvoice($criteria, $con);
			}
		}
		$this->lastInvoiceCriteria = $criteria;

		return $this->collInvoices;
	}


	
	public function getInvoicesJoinPaymentCondition($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoices === null) {
			if ($this->isNew()) {
				$this->collInvoices = array();
			} else {

				$criteria->add(InvoicePeer::INVOICE_CLIENT_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinPaymentCondition($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_CLIENT_ID, $this->getId());

			if (!isset($this->lastInvoiceCriteria) || !$this->lastInvoiceCriteria->equals($criteria)) {
				$this->collInvoices = InvoicePeer::doSelectJoinPaymentCondition($criteria, $con);
			}
		}
		$this->lastInvoiceCriteria = $criteria;

		return $this->collInvoices;
	}


	
	public function getInvoicesJoinPaymentMethod($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoices === null) {
			if ($this->isNew()) {
				$this->collInvoices = array();
			} else {

				$criteria->add(InvoicePeer::INVOICE_CLIENT_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_CLIENT_ID, $this->getId());

			if (!isset($this->lastInvoiceCriteria) || !$this->lastInvoiceCriteria->equals($criteria)) {
				$this->collInvoices = InvoicePeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		}
		$this->lastInvoiceCriteria = $criteria;

		return $this->collInvoices;
	}


	
	public function getInvoicesJoinPaymentStatus($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoices === null) {
			if ($this->isNew()) {
				$this->collInvoices = array();
			} else {

				$criteria->add(InvoicePeer::INVOICE_CLIENT_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinPaymentStatus($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_CLIENT_ID, $this->getId());

			if (!isset($this->lastInvoiceCriteria) || !$this->lastInvoiceCriteria->equals($criteria)) {
				$this->collInvoices = InvoicePeer::doSelectJoinPaymentStatus($criteria, $con);
			}
		}
		$this->lastInvoiceCriteria = $criteria;

		return $this->collInvoices;
	}


	
	public function getInvoicesJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoices === null) {
			if ($this->isNew()) {
				$this->collInvoices = array();
			} else {

				$criteria->add(InvoicePeer::INVOICE_CLIENT_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_CLIENT_ID, $this->getId());

			if (!isset($this->lastInvoiceCriteria) || !$this->lastInvoiceCriteria->equals($criteria)) {
				$this->collInvoices = InvoicePeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		}
		$this->lastInvoiceCriteria = $criteria;

		return $this->collInvoices;
	}


	
	public function getInvoicesJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoices === null) {
			if ($this->isNew()) {
				$this->collInvoices = array();
			} else {

				$criteria->add(InvoicePeer::INVOICE_CLIENT_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_CLIENT_ID, $this->getId());

			if (!isset($this->lastInvoiceCriteria) || !$this->lastInvoiceCriteria->equals($criteria)) {
				$this->collInvoices = InvoicePeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		}
		$this->lastInvoiceCriteria = $criteria;

		return $this->collInvoices;
	}


	
	public function getInvoicesJoinsfGuardUserRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoices === null) {
			if ($this->isNew()) {
				$this->collInvoices = array();
			} else {

				$criteria->add(InvoicePeer::INVOICE_CLIENT_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_CLIENT_ID, $this->getId());

			if (!isset($this->lastInvoiceCriteria) || !$this->lastInvoiceCriteria->equals($criteria)) {
				$this->collInvoices = InvoicePeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		}
		$this->lastInvoiceCriteria = $criteria;

		return $this->collInvoices;
	}

	
	public function initBudgets()
	{
		if ($this->collBudgets === null) {
			$this->collBudgets = array();
		}
	}

	
	public function getBudgets($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgets === null) {
			if ($this->isNew()) {
			   $this->collBudgets = array();
			} else {

				$criteria->add(BudgetPeer::BUDGET_CLIENT_ID, $this->getId());

				BudgetPeer::addSelectColumns($criteria);
				$this->collBudgets = BudgetPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(BudgetPeer::BUDGET_CLIENT_ID, $this->getId());

				BudgetPeer::addSelectColumns($criteria);
				if (!isset($this->lastBudgetCriteria) || !$this->lastBudgetCriteria->equals($criteria)) {
					$this->collBudgets = BudgetPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastBudgetCriteria = $criteria;
		return $this->collBudgets;
	}

	
	public function countBudgets($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(BudgetPeer::BUDGET_CLIENT_ID, $this->getId());

		return BudgetPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addBudget(Budget $l)
	{
		$this->collBudgets[] = $l;
		$l->setClient($this);
	}


	
	public function getBudgetsJoinBudgetStatus($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgets === null) {
			if ($this->isNew()) {
				$this->collBudgets = array();
			} else {

				$criteria->add(BudgetPeer::BUDGET_CLIENT_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinBudgetStatus($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_CLIENT_ID, $this->getId());

			if (!isset($this->lastBudgetCriteria) || !$this->lastBudgetCriteria->equals($criteria)) {
				$this->collBudgets = BudgetPeer::doSelectJoinBudgetStatus($criteria, $con);
			}
		}
		$this->lastBudgetCriteria = $criteria;

		return $this->collBudgets;
	}


	
	public function getBudgetsJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgets === null) {
			if ($this->isNew()) {
				$this->collBudgets = array();
			} else {

				$criteria->add(BudgetPeer::BUDGET_CLIENT_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_CLIENT_ID, $this->getId());

			if (!isset($this->lastBudgetCriteria) || !$this->lastBudgetCriteria->equals($criteria)) {
				$this->collBudgets = BudgetPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		}
		$this->lastBudgetCriteria = $criteria;

		return $this->collBudgets;
	}


	
	public function getBudgetsJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgets === null) {
			if ($this->isNew()) {
				$this->collBudgets = array();
			} else {

				$criteria->add(BudgetPeer::BUDGET_CLIENT_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_CLIENT_ID, $this->getId());

			if (!isset($this->lastBudgetCriteria) || !$this->lastBudgetCriteria->equals($criteria)) {
				$this->collBudgets = BudgetPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		}
		$this->lastBudgetCriteria = $criteria;

		return $this->collBudgets;
	}


	
	public function getBudgetsJoinsfGuardUserRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgets === null) {
			if ($this->isNew()) {
				$this->collBudgets = array();
			} else {

				$criteria->add(BudgetPeer::BUDGET_CLIENT_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_CLIENT_ID, $this->getId());

			if (!isset($this->lastBudgetCriteria) || !$this->lastBudgetCriteria->equals($criteria)) {
				$this->collBudgets = BudgetPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		}
		$this->lastBudgetCriteria = $criteria;

		return $this->collBudgets;
	}


	
	public function getBudgetsJoinPaymentCondition($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgets === null) {
			if ($this->isNew()) {
				$this->collBudgets = array();
			} else {

				$criteria->add(BudgetPeer::BUDGET_CLIENT_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinPaymentCondition($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_CLIENT_ID, $this->getId());

			if (!isset($this->lastBudgetCriteria) || !$this->lastBudgetCriteria->equals($criteria)) {
				$this->collBudgets = BudgetPeer::doSelectJoinPaymentCondition($criteria, $con);
			}
		}
		$this->lastBudgetCriteria = $criteria;

		return $this->collBudgets;
	}


	
	public function getBudgetsJoinInvoiceCategory($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgets === null) {
			if ($this->isNew()) {
				$this->collBudgets = array();
			} else {

				$criteria->add(BudgetPeer::BUDGET_CLIENT_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinInvoiceCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_CLIENT_ID, $this->getId());

			if (!isset($this->lastBudgetCriteria) || !$this->lastBudgetCriteria->equals($criteria)) {
				$this->collBudgets = BudgetPeer::doSelectJoinInvoiceCategory($criteria, $con);
			}
		}
		$this->lastBudgetCriteria = $criteria;

		return $this->collBudgets;
	}


	
	public function getBudgetsJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgets === null) {
			if ($this->isNew()) {
				$this->collBudgets = array();
			} else {

				$criteria->add(BudgetPeer::BUDGET_CLIENT_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_CLIENT_ID, $this->getId());

			if (!isset($this->lastBudgetCriteria) || !$this->lastBudgetCriteria->equals($criteria)) {
				$this->collBudgets = BudgetPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastBudgetCriteria = $criteria;

		return $this->collBudgets;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseClient:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseClient::%s', $method));
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
                $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, 'Client');
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
            $object->setObjectaddressObjectClass('Client');
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
        $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, 'Client');
        ObjectAddressPeer::doDelete($c);
        $v->collObjectAddresses = array();
        $v->collAddresses = array();
        $v->collDefaultAddress = null;
                $c = new Criteria();
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, $v->getId());
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, 'Client');
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
                $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, 'Client');
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
            $object->setObjectcontactObjectClass('Client');
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
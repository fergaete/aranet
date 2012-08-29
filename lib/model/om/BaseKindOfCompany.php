<?php


abstract class BaseKindOfCompany extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $kind_of_company_title;


	
	protected $kind_of_company_description;

	
	protected $collClients;

	
	protected $lastClientCriteria = null;

	
	protected $collVendors;

	
	protected $lastVendorCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getKindOfCompanyTitle()
	{

		return $this->kind_of_company_title;
	}

	
	public function getKindOfCompanyDescription()
	{

		return $this->kind_of_company_description;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = KindOfCompanyPeer::ID;
		}

	} 
	
	public function setKindOfCompanyTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->kind_of_company_title !== $v) {
			$this->kind_of_company_title = $v;
			$this->modifiedColumns[] = KindOfCompanyPeer::KIND_OF_COMPANY_TITLE;
		}

	} 
	
	public function setKindOfCompanyDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->kind_of_company_description !== $v) {
			$this->kind_of_company_description = $v;
			$this->modifiedColumns[] = KindOfCompanyPeer::KIND_OF_COMPANY_DESCRIPTION;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->kind_of_company_title = $rs->getString($startcol + 1);

			$this->kind_of_company_description = $rs->getString($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating KindOfCompany object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseKindOfCompany:delete:pre') as $callable)
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
			$con = Propel::getConnection(KindOfCompanyPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			KindOfCompanyPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseKindOfCompany:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseKindOfCompany:save:pre') as $callable)
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
			$con = Propel::getConnection(KindOfCompanyPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseKindOfCompany:save:post') as $callable)
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
					$pk = KindOfCompanyPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += KindOfCompanyPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collClients !== null) {
				foreach($this->collClients as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collVendors !== null) {
				foreach($this->collVendors as $referrerFK) {
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


			if (($retval = KindOfCompanyPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collClients !== null) {
					foreach($this->collClients as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collVendors !== null) {
					foreach($this->collVendors as $referrerFK) {
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
		$pos = KindOfCompanyPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getKindOfCompanyTitle();
				break;
			case 2:
				return $this->getKindOfCompanyDescription();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = KindOfCompanyPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getKindOfCompanyTitle(),
			$keys[2] => $this->getKindOfCompanyDescription(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = KindOfCompanyPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setKindOfCompanyTitle($value);
				break;
			case 2:
				$this->setKindOfCompanyDescription($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = KindOfCompanyPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setKindOfCompanyTitle($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setKindOfCompanyDescription($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(KindOfCompanyPeer::DATABASE_NAME);

		if ($this->isColumnModified(KindOfCompanyPeer::ID)) $criteria->add(KindOfCompanyPeer::ID, $this->id);
		if ($this->isColumnModified(KindOfCompanyPeer::KIND_OF_COMPANY_TITLE)) $criteria->add(KindOfCompanyPeer::KIND_OF_COMPANY_TITLE, $this->kind_of_company_title);
		if ($this->isColumnModified(KindOfCompanyPeer::KIND_OF_COMPANY_DESCRIPTION)) $criteria->add(KindOfCompanyPeer::KIND_OF_COMPANY_DESCRIPTION, $this->kind_of_company_description);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(KindOfCompanyPeer::DATABASE_NAME);

		$criteria->add(KindOfCompanyPeer::ID, $this->id);

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

		$copyObj->setKindOfCompanyTitle($this->kind_of_company_title);

		$copyObj->setKindOfCompanyDescription($this->kind_of_company_description);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getClients() as $relObj) {
				$copyObj->addClient($relObj->copy($deepCopy));
			}

			foreach($this->getVendors() as $relObj) {
				$copyObj->addVendor($relObj->copy($deepCopy));
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
			self::$peer = new KindOfCompanyPeer();
		}
		return self::$peer;
	}

	
	public function initClients()
	{
		if ($this->collClients === null) {
			$this->collClients = array();
		}
	}

	
	public function getClients($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseClientPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClients === null) {
			if ($this->isNew()) {
			   $this->collClients = array();
			} else {

				$criteria->add(ClientPeer::CLIENT_KIND_OF_COMPANY_ID, $this->getId());

				ClientPeer::addSelectColumns($criteria);
				$this->collClients = ClientPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ClientPeer::CLIENT_KIND_OF_COMPANY_ID, $this->getId());

				ClientPeer::addSelectColumns($criteria);
				if (!isset($this->lastClientCriteria) || !$this->lastClientCriteria->equals($criteria)) {
					$this->collClients = ClientPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastClientCriteria = $criteria;
		return $this->collClients;
	}

	
	public function countClients($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseClientPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ClientPeer::CLIENT_KIND_OF_COMPANY_ID, $this->getId());

		return ClientPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addClient(Client $l)
	{
		$this->collClients[] = $l;
		$l->setKindOfCompany($this);
	}


	
	public function getClientsJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseClientPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClients === null) {
			if ($this->isNew()) {
				$this->collClients = array();
			} else {

				$criteria->add(ClientPeer::CLIENT_KIND_OF_COMPANY_ID, $this->getId());

				$this->collClients = ClientPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ClientPeer::CLIENT_KIND_OF_COMPANY_ID, $this->getId());

			if (!isset($this->lastClientCriteria) || !$this->lastClientCriteria->equals($criteria)) {
				$this->collClients = ClientPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		}
		$this->lastClientCriteria = $criteria;

		return $this->collClients;
	}


	
	public function getClientsJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseClientPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClients === null) {
			if ($this->isNew()) {
				$this->collClients = array();
			} else {

				$criteria->add(ClientPeer::CLIENT_KIND_OF_COMPANY_ID, $this->getId());

				$this->collClients = ClientPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ClientPeer::CLIENT_KIND_OF_COMPANY_ID, $this->getId());

			if (!isset($this->lastClientCriteria) || !$this->lastClientCriteria->equals($criteria)) {
				$this->collClients = ClientPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		}
		$this->lastClientCriteria = $criteria;

		return $this->collClients;
	}


	
	public function getClientsJoinsfGuardUserRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseClientPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClients === null) {
			if ($this->isNew()) {
				$this->collClients = array();
			} else {

				$criteria->add(ClientPeer::CLIENT_KIND_OF_COMPANY_ID, $this->getId());

				$this->collClients = ClientPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ClientPeer::CLIENT_KIND_OF_COMPANY_ID, $this->getId());

			if (!isset($this->lastClientCriteria) || !$this->lastClientCriteria->equals($criteria)) {
				$this->collClients = ClientPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		}
		$this->lastClientCriteria = $criteria;

		return $this->collClients;
	}

	
	public function initVendors()
	{
		if ($this->collVendors === null) {
			$this->collVendors = array();
		}
	}

	
	public function getVendors($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseVendorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collVendors === null) {
			if ($this->isNew()) {
			   $this->collVendors = array();
			} else {

				$criteria->add(VendorPeer::VENDOR_KIND_OF_COMPANY_ID, $this->getId());

				VendorPeer::addSelectColumns($criteria);
				$this->collVendors = VendorPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(VendorPeer::VENDOR_KIND_OF_COMPANY_ID, $this->getId());

				VendorPeer::addSelectColumns($criteria);
				if (!isset($this->lastVendorCriteria) || !$this->lastVendorCriteria->equals($criteria)) {
					$this->collVendors = VendorPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastVendorCriteria = $criteria;
		return $this->collVendors;
	}

	
	public function countVendors($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseVendorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(VendorPeer::VENDOR_KIND_OF_COMPANY_ID, $this->getId());

		return VendorPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addVendor(Vendor $l)
	{
		$this->collVendors[] = $l;
		$l->setKindOfCompany($this);
	}


	
	public function getVendorsJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseVendorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collVendors === null) {
			if ($this->isNew()) {
				$this->collVendors = array();
			} else {

				$criteria->add(VendorPeer::VENDOR_KIND_OF_COMPANY_ID, $this->getId());

				$this->collVendors = VendorPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(VendorPeer::VENDOR_KIND_OF_COMPANY_ID, $this->getId());

			if (!isset($this->lastVendorCriteria) || !$this->lastVendorCriteria->equals($criteria)) {
				$this->collVendors = VendorPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		}
		$this->lastVendorCriteria = $criteria;

		return $this->collVendors;
	}


	
	public function getVendorsJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseVendorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collVendors === null) {
			if ($this->isNew()) {
				$this->collVendors = array();
			} else {

				$criteria->add(VendorPeer::VENDOR_KIND_OF_COMPANY_ID, $this->getId());

				$this->collVendors = VendorPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(VendorPeer::VENDOR_KIND_OF_COMPANY_ID, $this->getId());

			if (!isset($this->lastVendorCriteria) || !$this->lastVendorCriteria->equals($criteria)) {
				$this->collVendors = VendorPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		}
		$this->lastVendorCriteria = $criteria;

		return $this->collVendors;
	}


	
	public function getVendorsJoinsfGuardUserRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseVendorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collVendors === null) {
			if ($this->isNew()) {
				$this->collVendors = array();
			} else {

				$criteria->add(VendorPeer::VENDOR_KIND_OF_COMPANY_ID, $this->getId());

				$this->collVendors = VendorPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(VendorPeer::VENDOR_KIND_OF_COMPANY_ID, $this->getId());

			if (!isset($this->lastVendorCriteria) || !$this->lastVendorCriteria->equals($criteria)) {
				$this->collVendors = VendorPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		}
		$this->lastVendorCriteria = $criteria;

		return $this->collVendors;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseKindOfCompany:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseKindOfCompany::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
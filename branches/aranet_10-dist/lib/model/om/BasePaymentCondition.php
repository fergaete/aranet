<?php


abstract class BasePaymentCondition extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $payment_condition_days;


	
	protected $payment_condition_payment_day;


	
	protected $payment_condition_title;

	
	protected $collInvoices;

	
	protected $lastInvoiceCriteria = null;

	
	protected $collBudgets;

	
	protected $lastBudgetCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getPaymentConditionDays()
	{

		return $this->payment_condition_days;
	}

	
	public function getPaymentConditionPaymentDay()
	{

		return $this->payment_condition_payment_day;
	}

	
	public function getPaymentConditionTitle()
	{

		return $this->payment_condition_title;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PaymentConditionPeer::ID;
		}

	} 
	
	public function setPaymentConditionDays($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->payment_condition_days !== $v) {
			$this->payment_condition_days = $v;
			$this->modifiedColumns[] = PaymentConditionPeer::PAYMENT_CONDITION_DAYS;
		}

	} 
	
	public function setPaymentConditionPaymentDay($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->payment_condition_payment_day !== $v) {
			$this->payment_condition_payment_day = $v;
			$this->modifiedColumns[] = PaymentConditionPeer::PAYMENT_CONDITION_PAYMENT_DAY;
		}

	} 
	
	public function setPaymentConditionTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->payment_condition_title !== $v) {
			$this->payment_condition_title = $v;
			$this->modifiedColumns[] = PaymentConditionPeer::PAYMENT_CONDITION_TITLE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->payment_condition_days = $rs->getInt($startcol + 1);

			$this->payment_condition_payment_day = $rs->getInt($startcol + 2);

			$this->payment_condition_title = $rs->getString($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating PaymentCondition object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BasePaymentCondition:delete:pre') as $callable)
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
			$con = Propel::getConnection(PaymentConditionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PaymentConditionPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasePaymentCondition:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BasePaymentCondition:save:pre') as $callable)
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
			$con = Propel::getConnection(PaymentConditionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasePaymentCondition:save:post') as $callable)
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
					$pk = PaymentConditionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PaymentConditionPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


			if (($retval = PaymentConditionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = PaymentConditionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getPaymentConditionDays();
				break;
			case 2:
				return $this->getPaymentConditionPaymentDay();
				break;
			case 3:
				return $this->getPaymentConditionTitle();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PaymentConditionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPaymentConditionDays(),
			$keys[2] => $this->getPaymentConditionPaymentDay(),
			$keys[3] => $this->getPaymentConditionTitle(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PaymentConditionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setPaymentConditionDays($value);
				break;
			case 2:
				$this->setPaymentConditionPaymentDay($value);
				break;
			case 3:
				$this->setPaymentConditionTitle($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PaymentConditionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPaymentConditionDays($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPaymentConditionPaymentDay($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPaymentConditionTitle($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PaymentConditionPeer::DATABASE_NAME);

		if ($this->isColumnModified(PaymentConditionPeer::ID)) $criteria->add(PaymentConditionPeer::ID, $this->id);
		if ($this->isColumnModified(PaymentConditionPeer::PAYMENT_CONDITION_DAYS)) $criteria->add(PaymentConditionPeer::PAYMENT_CONDITION_DAYS, $this->payment_condition_days);
		if ($this->isColumnModified(PaymentConditionPeer::PAYMENT_CONDITION_PAYMENT_DAY)) $criteria->add(PaymentConditionPeer::PAYMENT_CONDITION_PAYMENT_DAY, $this->payment_condition_payment_day);
		if ($this->isColumnModified(PaymentConditionPeer::PAYMENT_CONDITION_TITLE)) $criteria->add(PaymentConditionPeer::PAYMENT_CONDITION_TITLE, $this->payment_condition_title);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PaymentConditionPeer::DATABASE_NAME);

		$criteria->add(PaymentConditionPeer::ID, $this->id);

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

		$copyObj->setPaymentConditionDays($this->payment_condition_days);

		$copyObj->setPaymentConditionPaymentDay($this->payment_condition_payment_day);

		$copyObj->setPaymentConditionTitle($this->payment_condition_title);


		if ($deepCopy) {
									$copyObj->setNew(false);

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
			self::$peer = new PaymentConditionPeer();
		}
		return self::$peer;
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

				$criteria->add(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, $this->getId());

				InvoicePeer::addSelectColumns($criteria);
				$this->collInvoices = InvoicePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, $this->getId());

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

		$criteria->add(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, $this->getId());

		return InvoicePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInvoice(Invoice $l)
	{
		$this->collInvoices[] = $l;
		$l->setPaymentCondition($this);
	}


	
	public function getInvoicesJoinClient($criteria = null, $con = null)
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

				$criteria->add(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinClient($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, $this->getId());

			if (!isset($this->lastInvoiceCriteria) || !$this->lastInvoiceCriteria->equals($criteria)) {
				$this->collInvoices = InvoicePeer::doSelectJoinClient($criteria, $con);
			}
		}
		$this->lastInvoiceCriteria = $criteria;

		return $this->collInvoices;
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

				$criteria->add(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, $this->getId());

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

				$criteria->add(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, $this->getId());

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

				$criteria->add(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinInvoiceCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, $this->getId());

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

				$criteria->add(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinKindOfInvoice($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, $this->getId());

			if (!isset($this->lastInvoiceCriteria) || !$this->lastInvoiceCriteria->equals($criteria)) {
				$this->collInvoices = InvoicePeer::doSelectJoinKindOfInvoice($criteria, $con);
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

				$criteria->add(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, $this->getId());

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

				$criteria->add(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinPaymentStatus($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, $this->getId());

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

				$criteria->add(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, $this->getId());

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

				$criteria->add(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, $this->getId());

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

				$criteria->add(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, $this->getId());

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

				$criteria->add(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, $this->getId());

				BudgetPeer::addSelectColumns($criteria);
				$this->collBudgets = BudgetPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, $this->getId());

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

		$criteria->add(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, $this->getId());

		return BudgetPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addBudget(Budget $l)
	{
		$this->collBudgets[] = $l;
		$l->setPaymentCondition($this);
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

				$criteria->add(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinBudgetStatus($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, $this->getId());

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

				$criteria->add(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, $this->getId());

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

				$criteria->add(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, $this->getId());

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

				$criteria->add(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, $this->getId());

			if (!isset($this->lastBudgetCriteria) || !$this->lastBudgetCriteria->equals($criteria)) {
				$this->collBudgets = BudgetPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
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

				$criteria->add(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinInvoiceCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, $this->getId());

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

				$criteria->add(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, $this->getId());

			if (!isset($this->lastBudgetCriteria) || !$this->lastBudgetCriteria->equals($criteria)) {
				$this->collBudgets = BudgetPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastBudgetCriteria = $criteria;

		return $this->collBudgets;
	}


	
	public function getBudgetsJoinClient($criteria = null, $con = null)
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

				$criteria->add(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinClient($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, $this->getId());

			if (!isset($this->lastBudgetCriteria) || !$this->lastBudgetCriteria->equals($criteria)) {
				$this->collBudgets = BudgetPeer::doSelectJoinClient($criteria, $con);
			}
		}
		$this->lastBudgetCriteria = $criteria;

		return $this->collBudgets;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BasePaymentCondition:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasePaymentCondition::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
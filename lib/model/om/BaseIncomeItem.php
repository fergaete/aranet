<?php


abstract class BaseIncomeItem extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $income_item_name;


	
	protected $income_item_comments;


	
	protected $income_date;


	
	protected $income_item_category_id;


	
	protected $income_item_payment_method_id;


	
	protected $income_item_payment_check;


	
	protected $income_item_reimbursement_id;


	
	protected $income_item_project_id = 0;


	
	protected $income_item_budget_id = 0;


	
	protected $income_item_amount = 0;


	
	protected $income_item_base = 0;


	
	protected $income_item_tax_rate = 0;


	
	protected $income_item_irpf = 0;


	
	protected $income_item_invoice_number;


	
	protected $income_item_vendor_id;


	
	protected $created_at;


	
	protected $created_by = 0;


	
	protected $updated_at;


	
	protected $updated_by = 0;


	
	protected $deleted_at;


	
	protected $deleted_by = 0;

	
	protected $asfGuardUserRelatedByCreatedBy;

	
	protected $asfGuardUserRelatedByUpdatedBy;

	
	protected $asfGuardUserRelatedByDeletedBy;

	
	protected $aIncomeCategory;

	
	protected $aPaymentMethod;

	
	protected $aReimbursement;

	
	protected $aProject;

	
	protected $aBudget;

	
	protected $aVendor;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getIncomeItemName()
	{

		return $this->income_item_name;
	}

	
	public function getIncomeItemComments()
	{

		return $this->income_item_comments;
	}

	
	public function getIncomeDate($format = 'Y-m-d')
	{

		if ($this->income_date === null || $this->income_date === '') {
			return null;
		} elseif (!is_int($this->income_date)) {
						$ts = strtotime($this->income_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [income_date] as date/time value: " . var_export($this->income_date, true));
			}
		} else {
			$ts = $this->income_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getIncomeItemCategoryId()
	{

		return $this->income_item_category_id;
	}

	
	public function getIncomeItemPaymentMethodId()
	{

		return $this->income_item_payment_method_id;
	}

	
	public function getIncomeItemPaymentCheck()
	{

		return $this->income_item_payment_check;
	}

	
	public function getIncomeItemReimbursementId()
	{

		return $this->income_item_reimbursement_id;
	}

	
	public function getIncomeItemProjectId()
	{

		return $this->income_item_project_id;
	}

	
	public function getIncomeItemBudgetId()
	{

		return $this->income_item_budget_id;
	}

	
	public function getIncomeItemAmount()
	{

		return $this->income_item_amount;
	}

	
	public function getIncomeItemBase()
	{

		return $this->income_item_base;
	}

	
	public function getIncomeItemTaxRate()
	{

		return $this->income_item_tax_rate;
	}

	
	public function getIncomeItemIrpf()
	{

		return $this->income_item_irpf;
	}

	
	public function getIncomeItemInvoiceNumber()
	{

		return $this->income_item_invoice_number;
	}

	
	public function getIncomeItemVendorId()
	{

		return $this->income_item_vendor_id;
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
			$this->modifiedColumns[] = IncomeItemPeer::ID;
		}

	} 
	
	public function setIncomeItemName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->income_item_name !== $v) {
			$this->income_item_name = $v;
			$this->modifiedColumns[] = IncomeItemPeer::INCOME_ITEM_NAME;
		}

	} 
	
	public function setIncomeItemComments($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->income_item_comments !== $v) {
			$this->income_item_comments = $v;
			$this->modifiedColumns[] = IncomeItemPeer::INCOME_ITEM_COMMENTS;
		}

	} 
	
	public function setIncomeDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [income_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->income_date !== $ts) {
			$this->income_date = $ts;
			$this->modifiedColumns[] = IncomeItemPeer::INCOME_DATE;
		}

	} 
	
	public function setIncomeItemCategoryId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->income_item_category_id !== $v) {
			$this->income_item_category_id = $v;
			$this->modifiedColumns[] = IncomeItemPeer::INCOME_ITEM_CATEGORY_ID;
		}

		if ($this->aIncomeCategory !== null && $this->aIncomeCategory->getId() !== $v) {
			$this->aIncomeCategory = null;
		}

	} 
	
	public function setIncomeItemPaymentMethodId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->income_item_payment_method_id !== $v) {
			$this->income_item_payment_method_id = $v;
			$this->modifiedColumns[] = IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID;
		}

		if ($this->aPaymentMethod !== null && $this->aPaymentMethod->getId() !== $v) {
			$this->aPaymentMethod = null;
		}

	} 
	
	public function setIncomeItemPaymentCheck($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->income_item_payment_check !== $v) {
			$this->income_item_payment_check = $v;
			$this->modifiedColumns[] = IncomeItemPeer::INCOME_ITEM_PAYMENT_CHECK;
		}

	} 
	
	public function setIncomeItemReimbursementId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->income_item_reimbursement_id !== $v) {
			$this->income_item_reimbursement_id = $v;
			$this->modifiedColumns[] = IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID;
		}

		if ($this->aReimbursement !== null && $this->aReimbursement->getId() !== $v) {
			$this->aReimbursement = null;
		}

	} 
	
	public function setIncomeItemProjectId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->income_item_project_id !== $v || $v === 0) {
			$this->income_item_project_id = $v;
			$this->modifiedColumns[] = IncomeItemPeer::INCOME_ITEM_PROJECT_ID;
		}

		if ($this->aProject !== null && $this->aProject->getId() !== $v) {
			$this->aProject = null;
		}

	} 
	
	public function setIncomeItemBudgetId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->income_item_budget_id !== $v || $v === 0) {
			$this->income_item_budget_id = $v;
			$this->modifiedColumns[] = IncomeItemPeer::INCOME_ITEM_BUDGET_ID;
		}

		if ($this->aBudget !== null && $this->aBudget->getId() !== $v) {
			$this->aBudget = null;
		}

	} 
	
	public function setIncomeItemAmount($v)
	{

		if ($this->income_item_amount !== $v || $v === 0) {
			$this->income_item_amount = $v;
			$this->modifiedColumns[] = IncomeItemPeer::INCOME_ITEM_AMOUNT;
		}

	} 
	
	public function setIncomeItemBase($v)
	{

		if ($this->income_item_base !== $v || $v === 0) {
			$this->income_item_base = $v;
			$this->modifiedColumns[] = IncomeItemPeer::INCOME_ITEM_BASE;
		}

	} 
	
	public function setIncomeItemTaxRate($v)
	{

		if ($this->income_item_tax_rate !== $v || $v === 0) {
			$this->income_item_tax_rate = $v;
			$this->modifiedColumns[] = IncomeItemPeer::INCOME_ITEM_TAX_RATE;
		}

	} 
	
	public function setIncomeItemIrpf($v)
	{

		if ($this->income_item_irpf !== $v || $v === 0) {
			$this->income_item_irpf = $v;
			$this->modifiedColumns[] = IncomeItemPeer::INCOME_ITEM_IRPF;
		}

	} 
	
	public function setIncomeItemInvoiceNumber($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->income_item_invoice_number !== $v) {
			$this->income_item_invoice_number = $v;
			$this->modifiedColumns[] = IncomeItemPeer::INCOME_ITEM_INVOICE_NUMBER;
		}

	} 
	
	public function setIncomeItemVendorId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->income_item_vendor_id !== $v) {
			$this->income_item_vendor_id = $v;
			$this->modifiedColumns[] = IncomeItemPeer::INCOME_ITEM_VENDOR_ID;
		}

		if ($this->aVendor !== null && $this->aVendor->getId() !== $v) {
			$this->aVendor = null;
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
			$this->modifiedColumns[] = IncomeItemPeer::CREATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v || $v === 0) {
			$this->created_by = $v;
			$this->modifiedColumns[] = IncomeItemPeer::CREATED_BY;
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
			$this->modifiedColumns[] = IncomeItemPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v || $v === 0) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = IncomeItemPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = IncomeItemPeer::DELETED_AT;
		}

	} 
	
	public function setDeletedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->deleted_by !== $v || $v === 0) {
			$this->deleted_by = $v;
			$this->modifiedColumns[] = IncomeItemPeer::DELETED_BY;
		}

		if ($this->asfGuardUserRelatedByDeletedBy !== null && $this->asfGuardUserRelatedByDeletedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByDeletedBy = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->income_item_name = $rs->getString($startcol + 1);

			$this->income_item_comments = $rs->getString($startcol + 2);

			$this->income_date = $rs->getDate($startcol + 3, null);

			$this->income_item_category_id = $rs->getInt($startcol + 4);

			$this->income_item_payment_method_id = $rs->getInt($startcol + 5);

			$this->income_item_payment_check = $rs->getString($startcol + 6);

			$this->income_item_reimbursement_id = $rs->getInt($startcol + 7);

			$this->income_item_project_id = $rs->getInt($startcol + 8);

			$this->income_item_budget_id = $rs->getInt($startcol + 9);

			$this->income_item_amount = $rs->getFloat($startcol + 10);

			$this->income_item_base = $rs->getFloat($startcol + 11);

			$this->income_item_tax_rate = $rs->getFloat($startcol + 12);

			$this->income_item_irpf = $rs->getFloat($startcol + 13);

			$this->income_item_invoice_number = $rs->getString($startcol + 14);

			$this->income_item_vendor_id = $rs->getInt($startcol + 15);

			$this->created_at = $rs->getTimestamp($startcol + 16, null);

			$this->created_by = $rs->getInt($startcol + 17);

			$this->updated_at = $rs->getTimestamp($startcol + 18, null);

			$this->updated_by = $rs->getInt($startcol + 19);

			$this->deleted_at = $rs->getTimestamp($startcol + 20, null);

			$this->deleted_by = $rs->getInt($startcol + 21);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 22; 
		} catch (Exception $e) {
			throw new PropelException("Error populating IncomeItem object", $e);
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
                

    foreach (sfMixer::getCallables('BaseIncomeItem:delete:pre') as $callable)
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
			$con = Propel::getConnection(IncomeItemPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			IncomeItemPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseIncomeItem:delete:post') as $callable)
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
                

    foreach (sfMixer::getCallables('BaseIncomeItem:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(IncomeItemPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(IncomeItemPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(IncomeItemPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseIncomeItem:save:post') as $callable)
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

			if ($this->aIncomeCategory !== null) {
				if ($this->aIncomeCategory->isModified()) {
					$affectedRows += $this->aIncomeCategory->save($con);
				}
				$this->setIncomeCategory($this->aIncomeCategory);
			}

			if ($this->aPaymentMethod !== null) {
				if ($this->aPaymentMethod->isModified()) {
					$affectedRows += $this->aPaymentMethod->save($con);
				}
				$this->setPaymentMethod($this->aPaymentMethod);
			}

			if ($this->aReimbursement !== null) {
				if ($this->aReimbursement->isModified()) {
					$affectedRows += $this->aReimbursement->save($con);
				}
				$this->setReimbursement($this->aReimbursement);
			}

			if ($this->aProject !== null) {
				if ($this->aProject->isModified()) {
					$affectedRows += $this->aProject->save($con);
				}
				$this->setProject($this->aProject);
			}

			if ($this->aBudget !== null) {
				if ($this->aBudget->isModified()) {
					$affectedRows += $this->aBudget->save($con);
				}
				$this->setBudget($this->aBudget);
			}

			if ($this->aVendor !== null) {
				if ($this->aVendor->isModified()) {
					$affectedRows += $this->aVendor->save($con);
				}
				$this->setVendor($this->aVendor);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = IncomeItemPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += IncomeItemPeer::doUpdate($this, $con);
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

			if ($this->asfGuardUserRelatedByDeletedBy !== null) {
				if (!$this->asfGuardUserRelatedByDeletedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByDeletedBy->getValidationFailures());
				}
			}

			if ($this->aIncomeCategory !== null) {
				if (!$this->aIncomeCategory->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aIncomeCategory->getValidationFailures());
				}
			}

			if ($this->aPaymentMethod !== null) {
				if (!$this->aPaymentMethod->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPaymentMethod->getValidationFailures());
				}
			}

			if ($this->aReimbursement !== null) {
				if (!$this->aReimbursement->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aReimbursement->getValidationFailures());
				}
			}

			if ($this->aProject !== null) {
				if (!$this->aProject->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProject->getValidationFailures());
				}
			}

			if ($this->aBudget !== null) {
				if (!$this->aBudget->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aBudget->getValidationFailures());
				}
			}

			if ($this->aVendor !== null) {
				if (!$this->aVendor->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aVendor->getValidationFailures());
				}
			}


			if (($retval = IncomeItemPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = IncomeItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getIncomeItemName();
				break;
			case 2:
				return $this->getIncomeItemComments();
				break;
			case 3:
				return $this->getIncomeDate();
				break;
			case 4:
				return $this->getIncomeItemCategoryId();
				break;
			case 5:
				return $this->getIncomeItemPaymentMethodId();
				break;
			case 6:
				return $this->getIncomeItemPaymentCheck();
				break;
			case 7:
				return $this->getIncomeItemReimbursementId();
				break;
			case 8:
				return $this->getIncomeItemProjectId();
				break;
			case 9:
				return $this->getIncomeItemBudgetId();
				break;
			case 10:
				return $this->getIncomeItemAmount();
				break;
			case 11:
				return $this->getIncomeItemBase();
				break;
			case 12:
				return $this->getIncomeItemTaxRate();
				break;
			case 13:
				return $this->getIncomeItemIrpf();
				break;
			case 14:
				return $this->getIncomeItemInvoiceNumber();
				break;
			case 15:
				return $this->getIncomeItemVendorId();
				break;
			case 16:
				return $this->getCreatedAt();
				break;
			case 17:
				return $this->getCreatedBy();
				break;
			case 18:
				return $this->getUpdatedAt();
				break;
			case 19:
				return $this->getUpdatedBy();
				break;
			case 20:
				return $this->getDeletedAt();
				break;
			case 21:
				return $this->getDeletedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = IncomeItemPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getIncomeItemName(),
			$keys[2] => $this->getIncomeItemComments(),
			$keys[3] => $this->getIncomeDate(),
			$keys[4] => $this->getIncomeItemCategoryId(),
			$keys[5] => $this->getIncomeItemPaymentMethodId(),
			$keys[6] => $this->getIncomeItemPaymentCheck(),
			$keys[7] => $this->getIncomeItemReimbursementId(),
			$keys[8] => $this->getIncomeItemProjectId(),
			$keys[9] => $this->getIncomeItemBudgetId(),
			$keys[10] => $this->getIncomeItemAmount(),
			$keys[11] => $this->getIncomeItemBase(),
			$keys[12] => $this->getIncomeItemTaxRate(),
			$keys[13] => $this->getIncomeItemIrpf(),
			$keys[14] => $this->getIncomeItemInvoiceNumber(),
			$keys[15] => $this->getIncomeItemVendorId(),
			$keys[16] => $this->getCreatedAt(),
			$keys[17] => $this->getCreatedBy(),
			$keys[18] => $this->getUpdatedAt(),
			$keys[19] => $this->getUpdatedBy(),
			$keys[20] => $this->getDeletedAt(),
			$keys[21] => $this->getDeletedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = IncomeItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setIncomeItemName($value);
				break;
			case 2:
				$this->setIncomeItemComments($value);
				break;
			case 3:
				$this->setIncomeDate($value);
				break;
			case 4:
				$this->setIncomeItemCategoryId($value);
				break;
			case 5:
				$this->setIncomeItemPaymentMethodId($value);
				break;
			case 6:
				$this->setIncomeItemPaymentCheck($value);
				break;
			case 7:
				$this->setIncomeItemReimbursementId($value);
				break;
			case 8:
				$this->setIncomeItemProjectId($value);
				break;
			case 9:
				$this->setIncomeItemBudgetId($value);
				break;
			case 10:
				$this->setIncomeItemAmount($value);
				break;
			case 11:
				$this->setIncomeItemBase($value);
				break;
			case 12:
				$this->setIncomeItemTaxRate($value);
				break;
			case 13:
				$this->setIncomeItemIrpf($value);
				break;
			case 14:
				$this->setIncomeItemInvoiceNumber($value);
				break;
			case 15:
				$this->setIncomeItemVendorId($value);
				break;
			case 16:
				$this->setCreatedAt($value);
				break;
			case 17:
				$this->setCreatedBy($value);
				break;
			case 18:
				$this->setUpdatedAt($value);
				break;
			case 19:
				$this->setUpdatedBy($value);
				break;
			case 20:
				$this->setDeletedAt($value);
				break;
			case 21:
				$this->setDeletedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = IncomeItemPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIncomeItemName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIncomeItemComments($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIncomeDate($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setIncomeItemCategoryId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setIncomeItemPaymentMethodId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setIncomeItemPaymentCheck($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setIncomeItemReimbursementId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setIncomeItemProjectId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setIncomeItemBudgetId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setIncomeItemAmount($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setIncomeItemBase($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setIncomeItemTaxRate($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setIncomeItemIrpf($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setIncomeItemInvoiceNumber($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setIncomeItemVendorId($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCreatedAt($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCreatedBy($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setUpdatedAt($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setUpdatedBy($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setDeletedAt($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setDeletedBy($arr[$keys[21]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(IncomeItemPeer::DATABASE_NAME);

		if ($this->isColumnModified(IncomeItemPeer::ID)) $criteria->add(IncomeItemPeer::ID, $this->id);
		if ($this->isColumnModified(IncomeItemPeer::INCOME_ITEM_NAME)) $criteria->add(IncomeItemPeer::INCOME_ITEM_NAME, $this->income_item_name);
		if ($this->isColumnModified(IncomeItemPeer::INCOME_ITEM_COMMENTS)) $criteria->add(IncomeItemPeer::INCOME_ITEM_COMMENTS, $this->income_item_comments);
		if ($this->isColumnModified(IncomeItemPeer::INCOME_DATE)) $criteria->add(IncomeItemPeer::INCOME_DATE, $this->income_date);
		if ($this->isColumnModified(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID)) $criteria->add(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID, $this->income_item_category_id);
		if ($this->isColumnModified(IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID)) $criteria->add(IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID, $this->income_item_payment_method_id);
		if ($this->isColumnModified(IncomeItemPeer::INCOME_ITEM_PAYMENT_CHECK)) $criteria->add(IncomeItemPeer::INCOME_ITEM_PAYMENT_CHECK, $this->income_item_payment_check);
		if ($this->isColumnModified(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID)) $criteria->add(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, $this->income_item_reimbursement_id);
		if ($this->isColumnModified(IncomeItemPeer::INCOME_ITEM_PROJECT_ID)) $criteria->add(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, $this->income_item_project_id);
		if ($this->isColumnModified(IncomeItemPeer::INCOME_ITEM_BUDGET_ID)) $criteria->add(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, $this->income_item_budget_id);
		if ($this->isColumnModified(IncomeItemPeer::INCOME_ITEM_AMOUNT)) $criteria->add(IncomeItemPeer::INCOME_ITEM_AMOUNT, $this->income_item_amount);
		if ($this->isColumnModified(IncomeItemPeer::INCOME_ITEM_BASE)) $criteria->add(IncomeItemPeer::INCOME_ITEM_BASE, $this->income_item_base);
		if ($this->isColumnModified(IncomeItemPeer::INCOME_ITEM_TAX_RATE)) $criteria->add(IncomeItemPeer::INCOME_ITEM_TAX_RATE, $this->income_item_tax_rate);
		if ($this->isColumnModified(IncomeItemPeer::INCOME_ITEM_IRPF)) $criteria->add(IncomeItemPeer::INCOME_ITEM_IRPF, $this->income_item_irpf);
		if ($this->isColumnModified(IncomeItemPeer::INCOME_ITEM_INVOICE_NUMBER)) $criteria->add(IncomeItemPeer::INCOME_ITEM_INVOICE_NUMBER, $this->income_item_invoice_number);
		if ($this->isColumnModified(IncomeItemPeer::INCOME_ITEM_VENDOR_ID)) $criteria->add(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, $this->income_item_vendor_id);
		if ($this->isColumnModified(IncomeItemPeer::CREATED_AT)) $criteria->add(IncomeItemPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(IncomeItemPeer::CREATED_BY)) $criteria->add(IncomeItemPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(IncomeItemPeer::UPDATED_AT)) $criteria->add(IncomeItemPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(IncomeItemPeer::UPDATED_BY)) $criteria->add(IncomeItemPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(IncomeItemPeer::DELETED_AT)) $criteria->add(IncomeItemPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(IncomeItemPeer::DELETED_BY)) $criteria->add(IncomeItemPeer::DELETED_BY, $this->deleted_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(IncomeItemPeer::DATABASE_NAME);

		$criteria->add(IncomeItemPeer::ID, $this->id);

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

		$copyObj->setIncomeItemName($this->income_item_name);

		$copyObj->setIncomeItemComments($this->income_item_comments);

		$copyObj->setIncomeDate($this->income_date);

		$copyObj->setIncomeItemCategoryId($this->income_item_category_id);

		$copyObj->setIncomeItemPaymentMethodId($this->income_item_payment_method_id);

		$copyObj->setIncomeItemPaymentCheck($this->income_item_payment_check);

		$copyObj->setIncomeItemReimbursementId($this->income_item_reimbursement_id);

		$copyObj->setIncomeItemProjectId($this->income_item_project_id);

		$copyObj->setIncomeItemBudgetId($this->income_item_budget_id);

		$copyObj->setIncomeItemAmount($this->income_item_amount);

		$copyObj->setIncomeItemBase($this->income_item_base);

		$copyObj->setIncomeItemTaxRate($this->income_item_tax_rate);

		$copyObj->setIncomeItemIrpf($this->income_item_irpf);

		$copyObj->setIncomeItemInvoiceNumber($this->income_item_invoice_number);

		$copyObj->setIncomeItemVendorId($this->income_item_vendor_id);

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
			self::$peer = new IncomeItemPeer();
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

	
	public function setIncomeCategory($v)
	{


		if ($v === null) {
			$this->setIncomeItemCategoryId(NULL);
		} else {
			$this->setIncomeItemCategoryId($v->getId());
		}


		$this->aIncomeCategory = $v;
	}


	
	public function getIncomeCategory($con = null)
	{
		if ($this->aIncomeCategory === null && ($this->income_item_category_id !== null)) {
						include_once 'lib/model/om/BaseIncomeCategoryPeer.php';

			$this->aIncomeCategory = IncomeCategoryPeer::retrieveByPK($this->income_item_category_id, $con);

			
		}
		return $this->aIncomeCategory;
	}

	
	public function setPaymentMethod($v)
	{


		if ($v === null) {
			$this->setIncomeItemPaymentMethodId(NULL);
		} else {
			$this->setIncomeItemPaymentMethodId($v->getId());
		}


		$this->aPaymentMethod = $v;
	}


	
	public function getPaymentMethod($con = null)
	{
		if ($this->aPaymentMethod === null && ($this->income_item_payment_method_id !== null)) {
						include_once 'lib/model/om/BasePaymentMethodPeer.php';

			$this->aPaymentMethod = PaymentMethodPeer::retrieveByPK($this->income_item_payment_method_id, $con);

			
		}
		return $this->aPaymentMethod;
	}

	
	public function setReimbursement($v)
	{


		if ($v === null) {
			$this->setIncomeItemReimbursementId(NULL);
		} else {
			$this->setIncomeItemReimbursementId($v->getId());
		}


		$this->aReimbursement = $v;
	}


	
	public function getReimbursement($con = null)
	{
		if ($this->aReimbursement === null && ($this->income_item_reimbursement_id !== null)) {
						include_once 'lib/model/om/BaseReimbursementPeer.php';

			$this->aReimbursement = ReimbursementPeer::retrieveByPK($this->income_item_reimbursement_id, $con);

			
		}
		return $this->aReimbursement;
	}

	
	public function setProject($v)
	{


		if ($v === null) {
			$this->setIncomeItemProjectId('null');
		} else {
			$this->setIncomeItemProjectId($v->getId());
		}


		$this->aProject = $v;
	}


	
	public function getProject($con = null)
	{
		if ($this->aProject === null && ($this->income_item_project_id !== null)) {
						include_once 'lib/model/om/BaseProjectPeer.php';

			$this->aProject = ProjectPeer::retrieveByPK($this->income_item_project_id, $con);

			
		}
		return $this->aProject;
	}

	
	public function setBudget($v)
	{


		if ($v === null) {
			$this->setIncomeItemBudgetId('null');
		} else {
			$this->setIncomeItemBudgetId($v->getId());
		}


		$this->aBudget = $v;
	}


	
	public function getBudget($con = null)
	{
		if ($this->aBudget === null && ($this->income_item_budget_id !== null)) {
						include_once 'lib/model/om/BaseBudgetPeer.php';

			$this->aBudget = BudgetPeer::retrieveByPK($this->income_item_budget_id, $con);

			
		}
		return $this->aBudget;
	}

	
	public function setVendor($v)
	{


		if ($v === null) {
			$this->setIncomeItemVendorId(NULL);
		} else {
			$this->setIncomeItemVendorId($v->getId());
		}


		$this->aVendor = $v;
	}


	
	public function getVendor($con = null)
	{
		if ($this->aVendor === null && ($this->income_item_vendor_id !== null)) {
						include_once 'lib/model/om/BaseVendorPeer.php';

			$this->aVendor = VendorPeer::retrieveByPK($this->income_item_vendor_id, $con);

			
		}
		return $this->aVendor;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseIncomeItem:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseIncomeItem::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
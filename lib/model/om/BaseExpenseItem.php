<?php


abstract class BaseExpenseItem extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $expense_item_name;


	
	protected $expense_item_comments;


	
	protected $expense_purchase_date;


	
	protected $expense_purchase_by;


	
	protected $expense_item_category_id;


	
	protected $expense_item_payment_method_id;


	
	protected $expense_item_payment_check;


	
	protected $expense_item_reimbursement_id;


	
	protected $expense_item_project_id = 0;


	
	protected $expense_item_budget_id = 0;


	
	protected $expense_item_amount = 0;


	
	protected $expense_item_base = 0;


	
	protected $expense_item_tax_rate = 0;


	
	protected $expense_item_irpf = 0;


	
	protected $expense_item_invoice_number;


	
	protected $expense_item_vendor_id = 0;


	
	protected $expense_validate_date;


	
	protected $expense_validate_by = 0;


	
	protected $created_at;


	
	protected $created_by = 0;


	
	protected $updated_at;


	
	protected $updated_by = 0;


	
	protected $deleted_at;


	
	protected $deleted_by = 0;

	
	protected $asfGuardUserRelatedByExpensePurchaseBy;

	
	protected $aProject;

	
	protected $aVendor;

	
	protected $asfGuardUserRelatedByExpenseValidateBy;

	
	protected $asfGuardUserRelatedByCreatedBy;

	
	protected $asfGuardUserRelatedByUpdatedBy;

	
	protected $asfGuardUserRelatedByDeletedBy;

	
	protected $aExpenseCategory;

	
	protected $aPaymentMethod;

	
	protected $aReimbursement;

	
	protected $aBudget;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getExpenseItemName()
	{

		return $this->expense_item_name;
	}

	
	public function getExpenseItemComments()
	{

		return $this->expense_item_comments;
	}

	
	public function getExpensePurchaseDate($format = 'Y-m-d')
	{

		if ($this->expense_purchase_date === null || $this->expense_purchase_date === '') {
			return null;
		} elseif (!is_int($this->expense_purchase_date)) {
						$ts = strtotime($this->expense_purchase_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [expense_purchase_date] as date/time value: " . var_export($this->expense_purchase_date, true));
			}
		} else {
			$ts = $this->expense_purchase_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getExpensePurchaseBy()
	{

		return $this->expense_purchase_by;
	}

	
	public function getExpenseItemCategoryId()
	{

		return $this->expense_item_category_id;
	}

	
	public function getExpenseItemPaymentMethodId()
	{

		return $this->expense_item_payment_method_id;
	}

	
	public function getExpenseItemPaymentCheck()
	{

		return $this->expense_item_payment_check;
	}

	
	public function getExpenseItemReimbursementId()
	{

		return $this->expense_item_reimbursement_id;
	}

	
	public function getExpenseItemProjectId()
	{

		return $this->expense_item_project_id;
	}

	
	public function getExpenseItemBudgetId()
	{

		return $this->expense_item_budget_id;
	}

	
	public function getExpenseItemAmount()
	{

		return $this->expense_item_amount;
	}

	
	public function getExpenseItemBase()
	{

		return $this->expense_item_base;
	}

	
	public function getExpenseItemTaxRate()
	{

		return $this->expense_item_tax_rate;
	}

	
	public function getExpenseItemIrpf()
	{

		return $this->expense_item_irpf;
	}

	
	public function getExpenseItemInvoiceNumber()
	{

		return $this->expense_item_invoice_number;
	}

	
	public function getExpenseItemVendorId()
	{

		return $this->expense_item_vendor_id;
	}

	
	public function getExpenseValidateDate($format = 'Y-m-d')
	{

		if ($this->expense_validate_date === null || $this->expense_validate_date === '') {
			return null;
		} elseif (!is_int($this->expense_validate_date)) {
						$ts = strtotime($this->expense_validate_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [expense_validate_date] as date/time value: " . var_export($this->expense_validate_date, true));
			}
		} else {
			$ts = $this->expense_validate_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getExpenseValidateBy()
	{

		return $this->expense_validate_by;
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
			$this->modifiedColumns[] = ExpenseItemPeer::ID;
		}

	} 
	
	public function setExpenseItemName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->expense_item_name !== $v) {
			$this->expense_item_name = $v;
			$this->modifiedColumns[] = ExpenseItemPeer::EXPENSE_ITEM_NAME;
		}

	} 
	
	public function setExpenseItemComments($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->expense_item_comments !== $v) {
			$this->expense_item_comments = $v;
			$this->modifiedColumns[] = ExpenseItemPeer::EXPENSE_ITEM_COMMENTS;
		}

	} 
	
	public function setExpensePurchaseDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [expense_purchase_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->expense_purchase_date !== $ts) {
			$this->expense_purchase_date = $ts;
			$this->modifiedColumns[] = ExpenseItemPeer::EXPENSE_PURCHASE_DATE;
		}

	} 
	
	public function setExpensePurchaseBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->expense_purchase_by !== $v) {
			$this->expense_purchase_by = $v;
			$this->modifiedColumns[] = ExpenseItemPeer::EXPENSE_PURCHASE_BY;
		}

		if ($this->asfGuardUserRelatedByExpensePurchaseBy !== null && $this->asfGuardUserRelatedByExpensePurchaseBy->getId() !== $v) {
			$this->asfGuardUserRelatedByExpensePurchaseBy = null;
		}

	} 
	
	public function setExpenseItemCategoryId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->expense_item_category_id !== $v) {
			$this->expense_item_category_id = $v;
			$this->modifiedColumns[] = ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID;
		}

		if ($this->aExpenseCategory !== null && $this->aExpenseCategory->getId() !== $v) {
			$this->aExpenseCategory = null;
		}

	} 
	
	public function setExpenseItemPaymentMethodId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->expense_item_payment_method_id !== $v) {
			$this->expense_item_payment_method_id = $v;
			$this->modifiedColumns[] = ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID;
		}

		if ($this->aPaymentMethod !== null && $this->aPaymentMethod->getId() !== $v) {
			$this->aPaymentMethod = null;
		}

	} 
	
	public function setExpenseItemPaymentCheck($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->expense_item_payment_check !== $v) {
			$this->expense_item_payment_check = $v;
			$this->modifiedColumns[] = ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_CHECK;
		}

	} 
	
	public function setExpenseItemReimbursementId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->expense_item_reimbursement_id !== $v) {
			$this->expense_item_reimbursement_id = $v;
			$this->modifiedColumns[] = ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID;
		}

		if ($this->aReimbursement !== null && $this->aReimbursement->getId() !== $v) {
			$this->aReimbursement = null;
		}

	} 
	
	public function setExpenseItemProjectId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->expense_item_project_id !== $v || $v === 0) {
			$this->expense_item_project_id = $v;
			$this->modifiedColumns[] = ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID;
		}

		if ($this->aProject !== null && $this->aProject->getId() !== $v) {
			$this->aProject = null;
		}

	} 
	
	public function setExpenseItemBudgetId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->expense_item_budget_id !== $v || $v === 0) {
			$this->expense_item_budget_id = $v;
			$this->modifiedColumns[] = ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID;
		}

		if ($this->aBudget !== null && $this->aBudget->getId() !== $v) {
			$this->aBudget = null;
		}

	} 
	
	public function setExpenseItemAmount($v)
	{

		if ($this->expense_item_amount !== $v || $v === 0) {
			$this->expense_item_amount = $v;
			$this->modifiedColumns[] = ExpenseItemPeer::EXPENSE_ITEM_AMOUNT;
		}

	} 
	
	public function setExpenseItemBase($v)
	{

		if ($this->expense_item_base !== $v || $v === 0) {
			$this->expense_item_base = $v;
			$this->modifiedColumns[] = ExpenseItemPeer::EXPENSE_ITEM_BASE;
		}

	} 
	
	public function setExpenseItemTaxRate($v)
	{

		if ($this->expense_item_tax_rate !== $v || $v === 0) {
			$this->expense_item_tax_rate = $v;
			$this->modifiedColumns[] = ExpenseItemPeer::EXPENSE_ITEM_TAX_RATE;
		}

	} 
	
	public function setExpenseItemIrpf($v)
	{

		if ($this->expense_item_irpf !== $v || $v === 0) {
			$this->expense_item_irpf = $v;
			$this->modifiedColumns[] = ExpenseItemPeer::EXPENSE_ITEM_IRPF;
		}

	} 
	
	public function setExpenseItemInvoiceNumber($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->expense_item_invoice_number !== $v) {
			$this->expense_item_invoice_number = $v;
			$this->modifiedColumns[] = ExpenseItemPeer::EXPENSE_ITEM_INVOICE_NUMBER;
		}

	} 
	
	public function setExpenseItemVendorId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->expense_item_vendor_id !== $v || $v === 0) {
			$this->expense_item_vendor_id = $v;
			$this->modifiedColumns[] = ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID;
		}

		if ($this->aVendor !== null && $this->aVendor->getId() !== $v) {
			$this->aVendor = null;
		}

	} 
	
	public function setExpenseValidateDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [expense_validate_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->expense_validate_date !== $ts) {
			$this->expense_validate_date = $ts;
			$this->modifiedColumns[] = ExpenseItemPeer::EXPENSE_VALIDATE_DATE;
		}

	} 
	
	public function setExpenseValidateBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->expense_validate_by !== $v || $v === 0) {
			$this->expense_validate_by = $v;
			$this->modifiedColumns[] = ExpenseItemPeer::EXPENSE_VALIDATE_BY;
		}

		if ($this->asfGuardUserRelatedByExpenseValidateBy !== null && $this->asfGuardUserRelatedByExpenseValidateBy->getId() !== $v) {
			$this->asfGuardUserRelatedByExpenseValidateBy = null;
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
			$this->modifiedColumns[] = ExpenseItemPeer::CREATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v || $v === 0) {
			$this->created_by = $v;
			$this->modifiedColumns[] = ExpenseItemPeer::CREATED_BY;
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
			$this->modifiedColumns[] = ExpenseItemPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v || $v === 0) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = ExpenseItemPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = ExpenseItemPeer::DELETED_AT;
		}

	} 
	
	public function setDeletedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->deleted_by !== $v || $v === 0) {
			$this->deleted_by = $v;
			$this->modifiedColumns[] = ExpenseItemPeer::DELETED_BY;
		}

		if ($this->asfGuardUserRelatedByDeletedBy !== null && $this->asfGuardUserRelatedByDeletedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByDeletedBy = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->expense_item_name = $rs->getString($startcol + 1);

			$this->expense_item_comments = $rs->getString($startcol + 2);

			$this->expense_purchase_date = $rs->getDate($startcol + 3, null);

			$this->expense_purchase_by = $rs->getInt($startcol + 4);

			$this->expense_item_category_id = $rs->getInt($startcol + 5);

			$this->expense_item_payment_method_id = $rs->getInt($startcol + 6);

			$this->expense_item_payment_check = $rs->getString($startcol + 7);

			$this->expense_item_reimbursement_id = $rs->getInt($startcol + 8);

			$this->expense_item_project_id = $rs->getInt($startcol + 9);

			$this->expense_item_budget_id = $rs->getInt($startcol + 10);

			$this->expense_item_amount = $rs->getFloat($startcol + 11);

			$this->expense_item_base = $rs->getFloat($startcol + 12);

			$this->expense_item_tax_rate = $rs->getFloat($startcol + 13);

			$this->expense_item_irpf = $rs->getFloat($startcol + 14);

			$this->expense_item_invoice_number = $rs->getString($startcol + 15);

			$this->expense_item_vendor_id = $rs->getInt($startcol + 16);

			$this->expense_validate_date = $rs->getDate($startcol + 17, null);

			$this->expense_validate_by = $rs->getInt($startcol + 18);

			$this->created_at = $rs->getTimestamp($startcol + 19, null);

			$this->created_by = $rs->getInt($startcol + 20);

			$this->updated_at = $rs->getTimestamp($startcol + 21, null);

			$this->updated_by = $rs->getInt($startcol + 22);

			$this->deleted_at = $rs->getTimestamp($startcol + 23, null);

			$this->deleted_by = $rs->getInt($startcol + 24);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 25; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ExpenseItem object", $e);
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
                

    foreach (sfMixer::getCallables('BaseExpenseItem:delete:pre') as $callable)
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
			$con = Propel::getConnection(ExpenseItemPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ExpenseItemPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseExpenseItem:delete:post') as $callable)
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
                

    foreach (sfMixer::getCallables('BaseExpenseItem:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(ExpenseItemPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(ExpenseItemPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ExpenseItemPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseExpenseItem:save:post') as $callable)
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


												
			if ($this->asfGuardUserRelatedByExpensePurchaseBy !== null) {
				if ($this->asfGuardUserRelatedByExpensePurchaseBy->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByExpensePurchaseBy->save($con);
				}
				$this->setsfGuardUserRelatedByExpensePurchaseBy($this->asfGuardUserRelatedByExpensePurchaseBy);
			}

			if ($this->aProject !== null) {
				if ($this->aProject->isModified()) {
					$affectedRows += $this->aProject->save($con);
				}
				$this->setProject($this->aProject);
			}

			if ($this->aVendor !== null) {
				if ($this->aVendor->isModified()) {
					$affectedRows += $this->aVendor->save($con);
				}
				$this->setVendor($this->aVendor);
			}

			if ($this->asfGuardUserRelatedByExpenseValidateBy !== null) {
				if ($this->asfGuardUserRelatedByExpenseValidateBy->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByExpenseValidateBy->save($con);
				}
				$this->setsfGuardUserRelatedByExpenseValidateBy($this->asfGuardUserRelatedByExpenseValidateBy);
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

			if ($this->aExpenseCategory !== null) {
				if ($this->aExpenseCategory->isModified()) {
					$affectedRows += $this->aExpenseCategory->save($con);
				}
				$this->setExpenseCategory($this->aExpenseCategory);
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

			if ($this->aBudget !== null) {
				if ($this->aBudget->isModified()) {
					$affectedRows += $this->aBudget->save($con);
				}
				$this->setBudget($this->aBudget);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ExpenseItemPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ExpenseItemPeer::doUpdate($this, $con);
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


												
			if ($this->asfGuardUserRelatedByExpensePurchaseBy !== null) {
				if (!$this->asfGuardUserRelatedByExpensePurchaseBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByExpensePurchaseBy->getValidationFailures());
				}
			}

			if ($this->aProject !== null) {
				if (!$this->aProject->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProject->getValidationFailures());
				}
			}

			if ($this->aVendor !== null) {
				if (!$this->aVendor->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aVendor->getValidationFailures());
				}
			}

			if ($this->asfGuardUserRelatedByExpenseValidateBy !== null) {
				if (!$this->asfGuardUserRelatedByExpenseValidateBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByExpenseValidateBy->getValidationFailures());
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

			if ($this->aExpenseCategory !== null) {
				if (!$this->aExpenseCategory->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aExpenseCategory->getValidationFailures());
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

			if ($this->aBudget !== null) {
				if (!$this->aBudget->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aBudget->getValidationFailures());
				}
			}


			if (($retval = ExpenseItemPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ExpenseItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getExpenseItemName();
				break;
			case 2:
				return $this->getExpenseItemComments();
				break;
			case 3:
				return $this->getExpensePurchaseDate();
				break;
			case 4:
				return $this->getExpensePurchaseBy();
				break;
			case 5:
				return $this->getExpenseItemCategoryId();
				break;
			case 6:
				return $this->getExpenseItemPaymentMethodId();
				break;
			case 7:
				return $this->getExpenseItemPaymentCheck();
				break;
			case 8:
				return $this->getExpenseItemReimbursementId();
				break;
			case 9:
				return $this->getExpenseItemProjectId();
				break;
			case 10:
				return $this->getExpenseItemBudgetId();
				break;
			case 11:
				return $this->getExpenseItemAmount();
				break;
			case 12:
				return $this->getExpenseItemBase();
				break;
			case 13:
				return $this->getExpenseItemTaxRate();
				break;
			case 14:
				return $this->getExpenseItemIrpf();
				break;
			case 15:
				return $this->getExpenseItemInvoiceNumber();
				break;
			case 16:
				return $this->getExpenseItemVendorId();
				break;
			case 17:
				return $this->getExpenseValidateDate();
				break;
			case 18:
				return $this->getExpenseValidateBy();
				break;
			case 19:
				return $this->getCreatedAt();
				break;
			case 20:
				return $this->getCreatedBy();
				break;
			case 21:
				return $this->getUpdatedAt();
				break;
			case 22:
				return $this->getUpdatedBy();
				break;
			case 23:
				return $this->getDeletedAt();
				break;
			case 24:
				return $this->getDeletedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ExpenseItemPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getExpenseItemName(),
			$keys[2] => $this->getExpenseItemComments(),
			$keys[3] => $this->getExpensePurchaseDate(),
			$keys[4] => $this->getExpensePurchaseBy(),
			$keys[5] => $this->getExpenseItemCategoryId(),
			$keys[6] => $this->getExpenseItemPaymentMethodId(),
			$keys[7] => $this->getExpenseItemPaymentCheck(),
			$keys[8] => $this->getExpenseItemReimbursementId(),
			$keys[9] => $this->getExpenseItemProjectId(),
			$keys[10] => $this->getExpenseItemBudgetId(),
			$keys[11] => $this->getExpenseItemAmount(),
			$keys[12] => $this->getExpenseItemBase(),
			$keys[13] => $this->getExpenseItemTaxRate(),
			$keys[14] => $this->getExpenseItemIrpf(),
			$keys[15] => $this->getExpenseItemInvoiceNumber(),
			$keys[16] => $this->getExpenseItemVendorId(),
			$keys[17] => $this->getExpenseValidateDate(),
			$keys[18] => $this->getExpenseValidateBy(),
			$keys[19] => $this->getCreatedAt(),
			$keys[20] => $this->getCreatedBy(),
			$keys[21] => $this->getUpdatedAt(),
			$keys[22] => $this->getUpdatedBy(),
			$keys[23] => $this->getDeletedAt(),
			$keys[24] => $this->getDeletedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ExpenseItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setExpenseItemName($value);
				break;
			case 2:
				$this->setExpenseItemComments($value);
				break;
			case 3:
				$this->setExpensePurchaseDate($value);
				break;
			case 4:
				$this->setExpensePurchaseBy($value);
				break;
			case 5:
				$this->setExpenseItemCategoryId($value);
				break;
			case 6:
				$this->setExpenseItemPaymentMethodId($value);
				break;
			case 7:
				$this->setExpenseItemPaymentCheck($value);
				break;
			case 8:
				$this->setExpenseItemReimbursementId($value);
				break;
			case 9:
				$this->setExpenseItemProjectId($value);
				break;
			case 10:
				$this->setExpenseItemBudgetId($value);
				break;
			case 11:
				$this->setExpenseItemAmount($value);
				break;
			case 12:
				$this->setExpenseItemBase($value);
				break;
			case 13:
				$this->setExpenseItemTaxRate($value);
				break;
			case 14:
				$this->setExpenseItemIrpf($value);
				break;
			case 15:
				$this->setExpenseItemInvoiceNumber($value);
				break;
			case 16:
				$this->setExpenseItemVendorId($value);
				break;
			case 17:
				$this->setExpenseValidateDate($value);
				break;
			case 18:
				$this->setExpenseValidateBy($value);
				break;
			case 19:
				$this->setCreatedAt($value);
				break;
			case 20:
				$this->setCreatedBy($value);
				break;
			case 21:
				$this->setUpdatedAt($value);
				break;
			case 22:
				$this->setUpdatedBy($value);
				break;
			case 23:
				$this->setDeletedAt($value);
				break;
			case 24:
				$this->setDeletedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ExpenseItemPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setExpenseItemName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setExpenseItemComments($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setExpensePurchaseDate($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setExpensePurchaseBy($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setExpenseItemCategoryId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setExpenseItemPaymentMethodId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setExpenseItemPaymentCheck($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setExpenseItemReimbursementId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setExpenseItemProjectId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setExpenseItemBudgetId($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setExpenseItemAmount($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setExpenseItemBase($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setExpenseItemTaxRate($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setExpenseItemIrpf($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setExpenseItemInvoiceNumber($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setExpenseItemVendorId($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setExpenseValidateDate($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setExpenseValidateBy($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCreatedAt($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCreatedBy($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setUpdatedAt($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setUpdatedBy($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setDeletedAt($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setDeletedBy($arr[$keys[24]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ExpenseItemPeer::DATABASE_NAME);

		if ($this->isColumnModified(ExpenseItemPeer::ID)) $criteria->add(ExpenseItemPeer::ID, $this->id);
		if ($this->isColumnModified(ExpenseItemPeer::EXPENSE_ITEM_NAME)) $criteria->add(ExpenseItemPeer::EXPENSE_ITEM_NAME, $this->expense_item_name);
		if ($this->isColumnModified(ExpenseItemPeer::EXPENSE_ITEM_COMMENTS)) $criteria->add(ExpenseItemPeer::EXPENSE_ITEM_COMMENTS, $this->expense_item_comments);
		if ($this->isColumnModified(ExpenseItemPeer::EXPENSE_PURCHASE_DATE)) $criteria->add(ExpenseItemPeer::EXPENSE_PURCHASE_DATE, $this->expense_purchase_date);
		if ($this->isColumnModified(ExpenseItemPeer::EXPENSE_PURCHASE_BY)) $criteria->add(ExpenseItemPeer::EXPENSE_PURCHASE_BY, $this->expense_purchase_by);
		if ($this->isColumnModified(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID)) $criteria->add(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, $this->expense_item_category_id);
		if ($this->isColumnModified(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID)) $criteria->add(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, $this->expense_item_payment_method_id);
		if ($this->isColumnModified(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_CHECK)) $criteria->add(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_CHECK, $this->expense_item_payment_check);
		if ($this->isColumnModified(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID)) $criteria->add(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, $this->expense_item_reimbursement_id);
		if ($this->isColumnModified(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID)) $criteria->add(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, $this->expense_item_project_id);
		if ($this->isColumnModified(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID)) $criteria->add(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, $this->expense_item_budget_id);
		if ($this->isColumnModified(ExpenseItemPeer::EXPENSE_ITEM_AMOUNT)) $criteria->add(ExpenseItemPeer::EXPENSE_ITEM_AMOUNT, $this->expense_item_amount);
		if ($this->isColumnModified(ExpenseItemPeer::EXPENSE_ITEM_BASE)) $criteria->add(ExpenseItemPeer::EXPENSE_ITEM_BASE, $this->expense_item_base);
		if ($this->isColumnModified(ExpenseItemPeer::EXPENSE_ITEM_TAX_RATE)) $criteria->add(ExpenseItemPeer::EXPENSE_ITEM_TAX_RATE, $this->expense_item_tax_rate);
		if ($this->isColumnModified(ExpenseItemPeer::EXPENSE_ITEM_IRPF)) $criteria->add(ExpenseItemPeer::EXPENSE_ITEM_IRPF, $this->expense_item_irpf);
		if ($this->isColumnModified(ExpenseItemPeer::EXPENSE_ITEM_INVOICE_NUMBER)) $criteria->add(ExpenseItemPeer::EXPENSE_ITEM_INVOICE_NUMBER, $this->expense_item_invoice_number);
		if ($this->isColumnModified(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID)) $criteria->add(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, $this->expense_item_vendor_id);
		if ($this->isColumnModified(ExpenseItemPeer::EXPENSE_VALIDATE_DATE)) $criteria->add(ExpenseItemPeer::EXPENSE_VALIDATE_DATE, $this->expense_validate_date);
		if ($this->isColumnModified(ExpenseItemPeer::EXPENSE_VALIDATE_BY)) $criteria->add(ExpenseItemPeer::EXPENSE_VALIDATE_BY, $this->expense_validate_by);
		if ($this->isColumnModified(ExpenseItemPeer::CREATED_AT)) $criteria->add(ExpenseItemPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(ExpenseItemPeer::CREATED_BY)) $criteria->add(ExpenseItemPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(ExpenseItemPeer::UPDATED_AT)) $criteria->add(ExpenseItemPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(ExpenseItemPeer::UPDATED_BY)) $criteria->add(ExpenseItemPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(ExpenseItemPeer::DELETED_AT)) $criteria->add(ExpenseItemPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(ExpenseItemPeer::DELETED_BY)) $criteria->add(ExpenseItemPeer::DELETED_BY, $this->deleted_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ExpenseItemPeer::DATABASE_NAME);

		$criteria->add(ExpenseItemPeer::ID, $this->id);

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

		$copyObj->setExpenseItemName($this->expense_item_name);

		$copyObj->setExpenseItemComments($this->expense_item_comments);

		$copyObj->setExpensePurchaseDate($this->expense_purchase_date);

		$copyObj->setExpensePurchaseBy($this->expense_purchase_by);

		$copyObj->setExpenseItemCategoryId($this->expense_item_category_id);

		$copyObj->setExpenseItemPaymentMethodId($this->expense_item_payment_method_id);

		$copyObj->setExpenseItemPaymentCheck($this->expense_item_payment_check);

		$copyObj->setExpenseItemReimbursementId($this->expense_item_reimbursement_id);

		$copyObj->setExpenseItemProjectId($this->expense_item_project_id);

		$copyObj->setExpenseItemBudgetId($this->expense_item_budget_id);

		$copyObj->setExpenseItemAmount($this->expense_item_amount);

		$copyObj->setExpenseItemBase($this->expense_item_base);

		$copyObj->setExpenseItemTaxRate($this->expense_item_tax_rate);

		$copyObj->setExpenseItemIrpf($this->expense_item_irpf);

		$copyObj->setExpenseItemInvoiceNumber($this->expense_item_invoice_number);

		$copyObj->setExpenseItemVendorId($this->expense_item_vendor_id);

		$copyObj->setExpenseValidateDate($this->expense_validate_date);

		$copyObj->setExpenseValidateBy($this->expense_validate_by);

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
			self::$peer = new ExpenseItemPeer();
		}
		return self::$peer;
	}

	
	public function setsfGuardUserRelatedByExpensePurchaseBy($v)
	{


		if ($v === null) {
			$this->setExpensePurchaseBy(NULL);
		} else {
			$this->setExpensePurchaseBy($v->getId());
		}


		$this->asfGuardUserRelatedByExpensePurchaseBy = $v;
	}


	
	public function getsfGuardUserRelatedByExpensePurchaseBy($con = null)
	{
		if ($this->asfGuardUserRelatedByExpensePurchaseBy === null && ($this->expense_purchase_by !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUserRelatedByExpensePurchaseBy = sfGuardUserPeer::retrieveByPK($this->expense_purchase_by, $con);

			
		}
		return $this->asfGuardUserRelatedByExpensePurchaseBy;
	}

	
	public function setProject($v)
	{


		if ($v === null) {
			$this->setExpenseItemProjectId('null');
		} else {
			$this->setExpenseItemProjectId($v->getId());
		}


		$this->aProject = $v;
	}


	
	public function getProject($con = null)
	{
		if ($this->aProject === null && ($this->expense_item_project_id !== null)) {
						include_once 'lib/model/om/BaseProjectPeer.php';

			$this->aProject = ProjectPeer::retrieveByPK($this->expense_item_project_id, $con);

			
		}
		return $this->aProject;
	}

	
	public function setVendor($v)
	{


		if ($v === null) {
			$this->setExpenseItemVendorId('null');
		} else {
			$this->setExpenseItemVendorId($v->getId());
		}


		$this->aVendor = $v;
	}


	
	public function getVendor($con = null)
	{
		if ($this->aVendor === null && ($this->expense_item_vendor_id !== null)) {
						include_once 'lib/model/om/BaseVendorPeer.php';

			$this->aVendor = VendorPeer::retrieveByPK($this->expense_item_vendor_id, $con);

			
		}
		return $this->aVendor;
	}

	
	public function setsfGuardUserRelatedByExpenseValidateBy($v)
	{


		if ($v === null) {
			$this->setExpenseValidateBy('null');
		} else {
			$this->setExpenseValidateBy($v->getId());
		}


		$this->asfGuardUserRelatedByExpenseValidateBy = $v;
	}


	
	public function getsfGuardUserRelatedByExpenseValidateBy($con = null)
	{
		if ($this->asfGuardUserRelatedByExpenseValidateBy === null && ($this->expense_validate_by !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUserRelatedByExpenseValidateBy = sfGuardUserPeer::retrieveByPK($this->expense_validate_by, $con);

			
		}
		return $this->asfGuardUserRelatedByExpenseValidateBy;
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

	
	public function setExpenseCategory($v)
	{


		if ($v === null) {
			$this->setExpenseItemCategoryId(NULL);
		} else {
			$this->setExpenseItemCategoryId($v->getId());
		}


		$this->aExpenseCategory = $v;
	}


	
	public function getExpenseCategory($con = null)
	{
		if ($this->aExpenseCategory === null && ($this->expense_item_category_id !== null)) {
						include_once 'lib/model/om/BaseExpenseCategoryPeer.php';

			$this->aExpenseCategory = ExpenseCategoryPeer::retrieveByPK($this->expense_item_category_id, $con);

			
		}
		return $this->aExpenseCategory;
	}

	
	public function setPaymentMethod($v)
	{


		if ($v === null) {
			$this->setExpenseItemPaymentMethodId(NULL);
		} else {
			$this->setExpenseItemPaymentMethodId($v->getId());
		}


		$this->aPaymentMethod = $v;
	}


	
	public function getPaymentMethod($con = null)
	{
		if ($this->aPaymentMethod === null && ($this->expense_item_payment_method_id !== null)) {
						include_once 'lib/model/om/BasePaymentMethodPeer.php';

			$this->aPaymentMethod = PaymentMethodPeer::retrieveByPK($this->expense_item_payment_method_id, $con);

			
		}
		return $this->aPaymentMethod;
	}

	
	public function setReimbursement($v)
	{


		if ($v === null) {
			$this->setExpenseItemReimbursementId(NULL);
		} else {
			$this->setExpenseItemReimbursementId($v->getId());
		}


		$this->aReimbursement = $v;
	}


	
	public function getReimbursement($con = null)
	{
		if ($this->aReimbursement === null && ($this->expense_item_reimbursement_id !== null)) {
						include_once 'lib/model/om/BaseReimbursementPeer.php';

			$this->aReimbursement = ReimbursementPeer::retrieveByPK($this->expense_item_reimbursement_id, $con);

			
		}
		return $this->aReimbursement;
	}

	
	public function setBudget($v)
	{


		if ($v === null) {
			$this->setExpenseItemBudgetId('null');
		} else {
			$this->setExpenseItemBudgetId($v->getId());
		}


		$this->aBudget = $v;
	}


	
	public function getBudget($con = null)
	{
		if ($this->aBudget === null && ($this->expense_item_budget_id !== null)) {
						include_once 'lib/model/om/BaseBudgetPeer.php';

			$this->aBudget = BudgetPeer::retrieveByPK($this->expense_item_budget_id, $con);

			
		}
		return $this->aBudget;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseExpenseItem:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseExpenseItem::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
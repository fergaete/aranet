<?php


abstract class BaseInvoice extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $invoice_prefix;


	
	protected $invoice_number;


	
	protected $invoice_date;


	
	protected $invoice_client_id = 0;


	
	protected $invoice_project_id = 0;


	
	protected $invoice_budget_id = 0;


	
	protected $invoice_category_id = 0;


	
	protected $invoice_kind_of_invoice_id = 1;


	
	protected $invoice_title;


	
	protected $invoice_comments;


	
	protected $invoice_print_comments = false;


	
	protected $invoice_tax_rate = 0;


	
	protected $invoice_freight_charge = 0;


	
	protected $invoice_payment_condition_id = 0;


	
	protected $invoice_payment_method_id = 0;


	
	protected $invoice_payment_check;


	
	protected $invoice_payment_date;


	
	protected $invoice_payment_status_id = 0;


	
	protected $invoice_late_fee_percent = 0;


	
	protected $invoice_total_amount = 0;


	
	protected $created_at;


	
	protected $created_by = 0;


	
	protected $updated_at;


	
	protected $updated_by = 0;


	
	protected $deleted_at;


	
	protected $deleted_by = 0;

	
	protected $aClient;

	
	protected $aProject;

	
	protected $aBudget;

	
	protected $aInvoiceCategory;

	
	protected $aKindOfInvoice;

	
	protected $aPaymentCondition;

	
	protected $aPaymentMethod;

	
	protected $aPaymentStatus;

	
	protected $asfGuardUserRelatedByCreatedBy;

	
	protected $asfGuardUserRelatedByUpdatedBy;

	
	protected $asfGuardUserRelatedByDeletedBy;

	
	protected $collInvoiceItems;

	
	protected $lastInvoiceItemCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  protected $collContacts;

  
  protected $collDefaultContact;

  
  protected $collObjectContacts;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getInvoicePrefix()
	{

		return $this->invoice_prefix;
	}

	
	public function getInvoiceNumber()
	{

		return $this->invoice_number;
	}

	
	public function getInvoiceDate($format = 'Y-m-d')
	{

		if ($this->invoice_date === null || $this->invoice_date === '') {
			return null;
		} elseif (!is_int($this->invoice_date)) {
						$ts = strtotime($this->invoice_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [invoice_date] as date/time value: " . var_export($this->invoice_date, true));
			}
		} else {
			$ts = $this->invoice_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getInvoiceClientId()
	{

		return $this->invoice_client_id;
	}

	
	public function getInvoiceProjectId()
	{

		return $this->invoice_project_id;
	}

	
	public function getInvoiceBudgetId()
	{

		return $this->invoice_budget_id;
	}

	
	public function getInvoiceCategoryId()
	{

		return $this->invoice_category_id;
	}

	
	public function getInvoiceKindOfInvoiceId()
	{

		return $this->invoice_kind_of_invoice_id;
	}

	
	public function getInvoiceTitle()
	{

		return $this->invoice_title;
	}

	
	public function getInvoiceComments()
	{

		return $this->invoice_comments;
	}

	
	public function getInvoicePrintComments()
	{

		return $this->invoice_print_comments;
	}

	
	public function getInvoiceTaxRate()
	{

		return $this->invoice_tax_rate;
	}

	
	public function getInvoiceFreightCharge()
	{

		return $this->invoice_freight_charge;
	}

	
	public function getInvoicePaymentConditionId()
	{

		return $this->invoice_payment_condition_id;
	}

	
	public function getInvoicePaymentMethodId()
	{

		return $this->invoice_payment_method_id;
	}

	
	public function getInvoicePaymentCheck()
	{

		return $this->invoice_payment_check;
	}

	
	public function getInvoicePaymentDate($format = 'Y-m-d')
	{

		if ($this->invoice_payment_date === null || $this->invoice_payment_date === '') {
			return null;
		} elseif (!is_int($this->invoice_payment_date)) {
						$ts = strtotime($this->invoice_payment_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [invoice_payment_date] as date/time value: " . var_export($this->invoice_payment_date, true));
			}
		} else {
			$ts = $this->invoice_payment_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getInvoicePaymentStatusId()
	{

		return $this->invoice_payment_status_id;
	}

	
	public function getInvoiceLateFeePercent()
	{

		return $this->invoice_late_fee_percent;
	}

	
	public function getInvoiceTotalAmount()
	{

		return $this->invoice_total_amount;
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
			$this->modifiedColumns[] = InvoicePeer::ID;
		}

	} 
	
	public function setInvoicePrefix($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->invoice_prefix !== $v) {
			$this->invoice_prefix = $v;
			$this->modifiedColumns[] = InvoicePeer::INVOICE_PREFIX;
		}

	} 
	
	public function setInvoiceNumber($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->invoice_number !== $v) {
			$this->invoice_number = $v;
			$this->modifiedColumns[] = InvoicePeer::INVOICE_NUMBER;
		}

	} 
	
	public function setInvoiceDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [invoice_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->invoice_date !== $ts) {
			$this->invoice_date = $ts;
			$this->modifiedColumns[] = InvoicePeer::INVOICE_DATE;
		}

	} 
	
	public function setInvoiceClientId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->invoice_client_id !== $v || $v === 0) {
			$this->invoice_client_id = $v;
			$this->modifiedColumns[] = InvoicePeer::INVOICE_CLIENT_ID;
		}

		if ($this->aClient !== null && $this->aClient->getId() !== $v) {
			$this->aClient = null;
		}

	} 
	
	public function setInvoiceProjectId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->invoice_project_id !== $v || $v === 0) {
			$this->invoice_project_id = $v;
			$this->modifiedColumns[] = InvoicePeer::INVOICE_PROJECT_ID;
		}

		if ($this->aProject !== null && $this->aProject->getId() !== $v) {
			$this->aProject = null;
		}

	} 
	
	public function setInvoiceBudgetId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->invoice_budget_id !== $v || $v === 0) {
			$this->invoice_budget_id = $v;
			$this->modifiedColumns[] = InvoicePeer::INVOICE_BUDGET_ID;
		}

		if ($this->aBudget !== null && $this->aBudget->getId() !== $v) {
			$this->aBudget = null;
		}

	} 
	
	public function setInvoiceCategoryId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->invoice_category_id !== $v || $v === 0) {
			$this->invoice_category_id = $v;
			$this->modifiedColumns[] = InvoicePeer::INVOICE_CATEGORY_ID;
		}

		if ($this->aInvoiceCategory !== null && $this->aInvoiceCategory->getId() !== $v) {
			$this->aInvoiceCategory = null;
		}

	} 
	
	public function setInvoiceKindOfInvoiceId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->invoice_kind_of_invoice_id !== $v || $v === 1) {
			$this->invoice_kind_of_invoice_id = $v;
			$this->modifiedColumns[] = InvoicePeer::INVOICE_KIND_OF_INVOICE_ID;
		}

		if ($this->aKindOfInvoice !== null && $this->aKindOfInvoice->getId() !== $v) {
			$this->aKindOfInvoice = null;
		}

	} 
	
	public function setInvoiceTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->invoice_title !== $v) {
			$this->invoice_title = $v;
			$this->modifiedColumns[] = InvoicePeer::INVOICE_TITLE;
		}

	} 
	
	public function setInvoiceComments($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->invoice_comments !== $v) {
			$this->invoice_comments = $v;
			$this->modifiedColumns[] = InvoicePeer::INVOICE_COMMENTS;
		}

	} 
	
	public function setInvoicePrintComments($v)
	{

		if ($this->invoice_print_comments !== $v || $v === false) {
			$this->invoice_print_comments = $v;
			$this->modifiedColumns[] = InvoicePeer::INVOICE_PRINT_COMMENTS;
		}

	} 
	
	public function setInvoiceTaxRate($v)
	{

		if ($this->invoice_tax_rate !== $v || $v === 0) {
			$this->invoice_tax_rate = $v;
			$this->modifiedColumns[] = InvoicePeer::INVOICE_TAX_RATE;
		}

	} 
	
	public function setInvoiceFreightCharge($v)
	{

		if ($this->invoice_freight_charge !== $v || $v === 0) {
			$this->invoice_freight_charge = $v;
			$this->modifiedColumns[] = InvoicePeer::INVOICE_FREIGHT_CHARGE;
		}

	} 
	
	public function setInvoicePaymentConditionId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->invoice_payment_condition_id !== $v || $v === 0) {
			$this->invoice_payment_condition_id = $v;
			$this->modifiedColumns[] = InvoicePeer::INVOICE_PAYMENT_CONDITION_ID;
		}

		if ($this->aPaymentCondition !== null && $this->aPaymentCondition->getId() !== $v) {
			$this->aPaymentCondition = null;
		}

	} 
	
	public function setInvoicePaymentMethodId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->invoice_payment_method_id !== $v || $v === 0) {
			$this->invoice_payment_method_id = $v;
			$this->modifiedColumns[] = InvoicePeer::INVOICE_PAYMENT_METHOD_ID;
		}

		if ($this->aPaymentMethod !== null && $this->aPaymentMethod->getId() !== $v) {
			$this->aPaymentMethod = null;
		}

	} 
	
	public function setInvoicePaymentCheck($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->invoice_payment_check !== $v) {
			$this->invoice_payment_check = $v;
			$this->modifiedColumns[] = InvoicePeer::INVOICE_PAYMENT_CHECK;
		}

	} 
	
	public function setInvoicePaymentDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [invoice_payment_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->invoice_payment_date !== $ts) {
			$this->invoice_payment_date = $ts;
			$this->modifiedColumns[] = InvoicePeer::INVOICE_PAYMENT_DATE;
		}

	} 
	
	public function setInvoicePaymentStatusId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->invoice_payment_status_id !== $v || $v === 0) {
			$this->invoice_payment_status_id = $v;
			$this->modifiedColumns[] = InvoicePeer::INVOICE_PAYMENT_STATUS_ID;
		}

		if ($this->aPaymentStatus !== null && $this->aPaymentStatus->getId() !== $v) {
			$this->aPaymentStatus = null;
		}

	} 
	
	public function setInvoiceLateFeePercent($v)
	{

		if ($this->invoice_late_fee_percent !== $v || $v === 0) {
			$this->invoice_late_fee_percent = $v;
			$this->modifiedColumns[] = InvoicePeer::INVOICE_LATE_FEE_PERCENT;
		}

	} 
	
	public function setInvoiceTotalAmount($v)
	{

		if ($this->invoice_total_amount !== $v || $v === 0) {
			$this->invoice_total_amount = $v;
			$this->modifiedColumns[] = InvoicePeer::INVOICE_TOTAL_AMOUNT;
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
			$this->modifiedColumns[] = InvoicePeer::CREATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v || $v === 0) {
			$this->created_by = $v;
			$this->modifiedColumns[] = InvoicePeer::CREATED_BY;
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
			$this->modifiedColumns[] = InvoicePeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v || $v === 0) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = InvoicePeer::UPDATED_BY;
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
			$this->modifiedColumns[] = InvoicePeer::DELETED_AT;
		}

	} 
	
	public function setDeletedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->deleted_by !== $v || $v === 0) {
			$this->deleted_by = $v;
			$this->modifiedColumns[] = InvoicePeer::DELETED_BY;
		}

		if ($this->asfGuardUserRelatedByDeletedBy !== null && $this->asfGuardUserRelatedByDeletedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByDeletedBy = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->invoice_prefix = $rs->getString($startcol + 1);

			$this->invoice_number = $rs->getString($startcol + 2);

			$this->invoice_date = $rs->getDate($startcol + 3, null);

			$this->invoice_client_id = $rs->getInt($startcol + 4);

			$this->invoice_project_id = $rs->getInt($startcol + 5);

			$this->invoice_budget_id = $rs->getInt($startcol + 6);

			$this->invoice_category_id = $rs->getInt($startcol + 7);

			$this->invoice_kind_of_invoice_id = $rs->getInt($startcol + 8);

			$this->invoice_title = $rs->getString($startcol + 9);

			$this->invoice_comments = $rs->getString($startcol + 10);

			$this->invoice_print_comments = $rs->getBoolean($startcol + 11);

			$this->invoice_tax_rate = $rs->getFloat($startcol + 12);

			$this->invoice_freight_charge = $rs->getFloat($startcol + 13);

			$this->invoice_payment_condition_id = $rs->getInt($startcol + 14);

			$this->invoice_payment_method_id = $rs->getInt($startcol + 15);

			$this->invoice_payment_check = $rs->getString($startcol + 16);

			$this->invoice_payment_date = $rs->getDate($startcol + 17, null);

			$this->invoice_payment_status_id = $rs->getInt($startcol + 18);

			$this->invoice_late_fee_percent = $rs->getFloat($startcol + 19);

			$this->invoice_total_amount = $rs->getFloat($startcol + 20);

			$this->created_at = $rs->getTimestamp($startcol + 21, null);

			$this->created_by = $rs->getInt($startcol + 22);

			$this->updated_at = $rs->getTimestamp($startcol + 23, null);

			$this->updated_by = $rs->getInt($startcol + 24);

			$this->deleted_at = $rs->getTimestamp($startcol + 25, null);

			$this->deleted_by = $rs->getInt($startcol + 26);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 27; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Invoice object", $e);
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
                

    foreach (sfMixer::getCallables('BaseInvoice:delete:pre') as $callable)
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
			$con = Propel::getConnection(InvoicePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			InvoicePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseInvoice:delete:post') as $callable)
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
                

    foreach (sfMixer::getCallables('BaseInvoice:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(InvoicePeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(InvoicePeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(InvoicePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseInvoice:save:post') as $callable)
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


												
			if ($this->aClient !== null) {
				if ($this->aClient->isModified()) {
					$affectedRows += $this->aClient->save($con);
				}
				$this->setClient($this->aClient);
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

			if ($this->aInvoiceCategory !== null) {
				if ($this->aInvoiceCategory->isModified()) {
					$affectedRows += $this->aInvoiceCategory->save($con);
				}
				$this->setInvoiceCategory($this->aInvoiceCategory);
			}

			if ($this->aKindOfInvoice !== null) {
				if ($this->aKindOfInvoice->isModified()) {
					$affectedRows += $this->aKindOfInvoice->save($con);
				}
				$this->setKindOfInvoice($this->aKindOfInvoice);
			}

			if ($this->aPaymentCondition !== null) {
				if ($this->aPaymentCondition->isModified()) {
					$affectedRows += $this->aPaymentCondition->save($con);
				}
				$this->setPaymentCondition($this->aPaymentCondition);
			}

			if ($this->aPaymentMethod !== null) {
				if ($this->aPaymentMethod->isModified()) {
					$affectedRows += $this->aPaymentMethod->save($con);
				}
				$this->setPaymentMethod($this->aPaymentMethod);
			}

			if ($this->aPaymentStatus !== null) {
				if ($this->aPaymentStatus->isModified()) {
					$affectedRows += $this->aPaymentStatus->save($con);
				}
				$this->setPaymentStatus($this->aPaymentStatus);
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
					$pk = InvoicePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += InvoicePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collInvoiceItems !== null) {
				foreach($this->collInvoiceItems as $referrerFK) {
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


												
			if ($this->aClient !== null) {
				if (!$this->aClient->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aClient->getValidationFailures());
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

			if ($this->aInvoiceCategory !== null) {
				if (!$this->aInvoiceCategory->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aInvoiceCategory->getValidationFailures());
				}
			}

			if ($this->aKindOfInvoice !== null) {
				if (!$this->aKindOfInvoice->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aKindOfInvoice->getValidationFailures());
				}
			}

			if ($this->aPaymentCondition !== null) {
				if (!$this->aPaymentCondition->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPaymentCondition->getValidationFailures());
				}
			}

			if ($this->aPaymentMethod !== null) {
				if (!$this->aPaymentMethod->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPaymentMethod->getValidationFailures());
				}
			}

			if ($this->aPaymentStatus !== null) {
				if (!$this->aPaymentStatus->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPaymentStatus->getValidationFailures());
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


			if (($retval = InvoicePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collInvoiceItems !== null) {
					foreach($this->collInvoiceItems as $referrerFK) {
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
		$pos = InvoicePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getInvoicePrefix();
				break;
			case 2:
				return $this->getInvoiceNumber();
				break;
			case 3:
				return $this->getInvoiceDate();
				break;
			case 4:
				return $this->getInvoiceClientId();
				break;
			case 5:
				return $this->getInvoiceProjectId();
				break;
			case 6:
				return $this->getInvoiceBudgetId();
				break;
			case 7:
				return $this->getInvoiceCategoryId();
				break;
			case 8:
				return $this->getInvoiceKindOfInvoiceId();
				break;
			case 9:
				return $this->getInvoiceTitle();
				break;
			case 10:
				return $this->getInvoiceComments();
				break;
			case 11:
				return $this->getInvoicePrintComments();
				break;
			case 12:
				return $this->getInvoiceTaxRate();
				break;
			case 13:
				return $this->getInvoiceFreightCharge();
				break;
			case 14:
				return $this->getInvoicePaymentConditionId();
				break;
			case 15:
				return $this->getInvoicePaymentMethodId();
				break;
			case 16:
				return $this->getInvoicePaymentCheck();
				break;
			case 17:
				return $this->getInvoicePaymentDate();
				break;
			case 18:
				return $this->getInvoicePaymentStatusId();
				break;
			case 19:
				return $this->getInvoiceLateFeePercent();
				break;
			case 20:
				return $this->getInvoiceTotalAmount();
				break;
			case 21:
				return $this->getCreatedAt();
				break;
			case 22:
				return $this->getCreatedBy();
				break;
			case 23:
				return $this->getUpdatedAt();
				break;
			case 24:
				return $this->getUpdatedBy();
				break;
			case 25:
				return $this->getDeletedAt();
				break;
			case 26:
				return $this->getDeletedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InvoicePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getInvoicePrefix(),
			$keys[2] => $this->getInvoiceNumber(),
			$keys[3] => $this->getInvoiceDate(),
			$keys[4] => $this->getInvoiceClientId(),
			$keys[5] => $this->getInvoiceProjectId(),
			$keys[6] => $this->getInvoiceBudgetId(),
			$keys[7] => $this->getInvoiceCategoryId(),
			$keys[8] => $this->getInvoiceKindOfInvoiceId(),
			$keys[9] => $this->getInvoiceTitle(),
			$keys[10] => $this->getInvoiceComments(),
			$keys[11] => $this->getInvoicePrintComments(),
			$keys[12] => $this->getInvoiceTaxRate(),
			$keys[13] => $this->getInvoiceFreightCharge(),
			$keys[14] => $this->getInvoicePaymentConditionId(),
			$keys[15] => $this->getInvoicePaymentMethodId(),
			$keys[16] => $this->getInvoicePaymentCheck(),
			$keys[17] => $this->getInvoicePaymentDate(),
			$keys[18] => $this->getInvoicePaymentStatusId(),
			$keys[19] => $this->getInvoiceLateFeePercent(),
			$keys[20] => $this->getInvoiceTotalAmount(),
			$keys[21] => $this->getCreatedAt(),
			$keys[22] => $this->getCreatedBy(),
			$keys[23] => $this->getUpdatedAt(),
			$keys[24] => $this->getUpdatedBy(),
			$keys[25] => $this->getDeletedAt(),
			$keys[26] => $this->getDeletedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InvoicePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setInvoicePrefix($value);
				break;
			case 2:
				$this->setInvoiceNumber($value);
				break;
			case 3:
				$this->setInvoiceDate($value);
				break;
			case 4:
				$this->setInvoiceClientId($value);
				break;
			case 5:
				$this->setInvoiceProjectId($value);
				break;
			case 6:
				$this->setInvoiceBudgetId($value);
				break;
			case 7:
				$this->setInvoiceCategoryId($value);
				break;
			case 8:
				$this->setInvoiceKindOfInvoiceId($value);
				break;
			case 9:
				$this->setInvoiceTitle($value);
				break;
			case 10:
				$this->setInvoiceComments($value);
				break;
			case 11:
				$this->setInvoicePrintComments($value);
				break;
			case 12:
				$this->setInvoiceTaxRate($value);
				break;
			case 13:
				$this->setInvoiceFreightCharge($value);
				break;
			case 14:
				$this->setInvoicePaymentConditionId($value);
				break;
			case 15:
				$this->setInvoicePaymentMethodId($value);
				break;
			case 16:
				$this->setInvoicePaymentCheck($value);
				break;
			case 17:
				$this->setInvoicePaymentDate($value);
				break;
			case 18:
				$this->setInvoicePaymentStatusId($value);
				break;
			case 19:
				$this->setInvoiceLateFeePercent($value);
				break;
			case 20:
				$this->setInvoiceTotalAmount($value);
				break;
			case 21:
				$this->setCreatedAt($value);
				break;
			case 22:
				$this->setCreatedBy($value);
				break;
			case 23:
				$this->setUpdatedAt($value);
				break;
			case 24:
				$this->setUpdatedBy($value);
				break;
			case 25:
				$this->setDeletedAt($value);
				break;
			case 26:
				$this->setDeletedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InvoicePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setInvoicePrefix($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setInvoiceNumber($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setInvoiceDate($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setInvoiceClientId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setInvoiceProjectId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setInvoiceBudgetId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setInvoiceCategoryId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setInvoiceKindOfInvoiceId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setInvoiceTitle($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setInvoiceComments($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setInvoicePrintComments($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setInvoiceTaxRate($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setInvoiceFreightCharge($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setInvoicePaymentConditionId($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setInvoicePaymentMethodId($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setInvoicePaymentCheck($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setInvoicePaymentDate($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setInvoicePaymentStatusId($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setInvoiceLateFeePercent($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setInvoiceTotalAmount($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCreatedAt($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setCreatedBy($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setUpdatedAt($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setUpdatedBy($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setDeletedAt($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setDeletedBy($arr[$keys[26]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(InvoicePeer::DATABASE_NAME);

		if ($this->isColumnModified(InvoicePeer::ID)) $criteria->add(InvoicePeer::ID, $this->id);
		if ($this->isColumnModified(InvoicePeer::INVOICE_PREFIX)) $criteria->add(InvoicePeer::INVOICE_PREFIX, $this->invoice_prefix);
		if ($this->isColumnModified(InvoicePeer::INVOICE_NUMBER)) $criteria->add(InvoicePeer::INVOICE_NUMBER, $this->invoice_number);
		if ($this->isColumnModified(InvoicePeer::INVOICE_DATE)) $criteria->add(InvoicePeer::INVOICE_DATE, $this->invoice_date);
		if ($this->isColumnModified(InvoicePeer::INVOICE_CLIENT_ID)) $criteria->add(InvoicePeer::INVOICE_CLIENT_ID, $this->invoice_client_id);
		if ($this->isColumnModified(InvoicePeer::INVOICE_PROJECT_ID)) $criteria->add(InvoicePeer::INVOICE_PROJECT_ID, $this->invoice_project_id);
		if ($this->isColumnModified(InvoicePeer::INVOICE_BUDGET_ID)) $criteria->add(InvoicePeer::INVOICE_BUDGET_ID, $this->invoice_budget_id);
		if ($this->isColumnModified(InvoicePeer::INVOICE_CATEGORY_ID)) $criteria->add(InvoicePeer::INVOICE_CATEGORY_ID, $this->invoice_category_id);
		if ($this->isColumnModified(InvoicePeer::INVOICE_KIND_OF_INVOICE_ID)) $criteria->add(InvoicePeer::INVOICE_KIND_OF_INVOICE_ID, $this->invoice_kind_of_invoice_id);
		if ($this->isColumnModified(InvoicePeer::INVOICE_TITLE)) $criteria->add(InvoicePeer::INVOICE_TITLE, $this->invoice_title);
		if ($this->isColumnModified(InvoicePeer::INVOICE_COMMENTS)) $criteria->add(InvoicePeer::INVOICE_COMMENTS, $this->invoice_comments);
		if ($this->isColumnModified(InvoicePeer::INVOICE_PRINT_COMMENTS)) $criteria->add(InvoicePeer::INVOICE_PRINT_COMMENTS, $this->invoice_print_comments);
		if ($this->isColumnModified(InvoicePeer::INVOICE_TAX_RATE)) $criteria->add(InvoicePeer::INVOICE_TAX_RATE, $this->invoice_tax_rate);
		if ($this->isColumnModified(InvoicePeer::INVOICE_FREIGHT_CHARGE)) $criteria->add(InvoicePeer::INVOICE_FREIGHT_CHARGE, $this->invoice_freight_charge);
		if ($this->isColumnModified(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID)) $criteria->add(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, $this->invoice_payment_condition_id);
		if ($this->isColumnModified(InvoicePeer::INVOICE_PAYMENT_METHOD_ID)) $criteria->add(InvoicePeer::INVOICE_PAYMENT_METHOD_ID, $this->invoice_payment_method_id);
		if ($this->isColumnModified(InvoicePeer::INVOICE_PAYMENT_CHECK)) $criteria->add(InvoicePeer::INVOICE_PAYMENT_CHECK, $this->invoice_payment_check);
		if ($this->isColumnModified(InvoicePeer::INVOICE_PAYMENT_DATE)) $criteria->add(InvoicePeer::INVOICE_PAYMENT_DATE, $this->invoice_payment_date);
		if ($this->isColumnModified(InvoicePeer::INVOICE_PAYMENT_STATUS_ID)) $criteria->add(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, $this->invoice_payment_status_id);
		if ($this->isColumnModified(InvoicePeer::INVOICE_LATE_FEE_PERCENT)) $criteria->add(InvoicePeer::INVOICE_LATE_FEE_PERCENT, $this->invoice_late_fee_percent);
		if ($this->isColumnModified(InvoicePeer::INVOICE_TOTAL_AMOUNT)) $criteria->add(InvoicePeer::INVOICE_TOTAL_AMOUNT, $this->invoice_total_amount);
		if ($this->isColumnModified(InvoicePeer::CREATED_AT)) $criteria->add(InvoicePeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(InvoicePeer::CREATED_BY)) $criteria->add(InvoicePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(InvoicePeer::UPDATED_AT)) $criteria->add(InvoicePeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(InvoicePeer::UPDATED_BY)) $criteria->add(InvoicePeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(InvoicePeer::DELETED_AT)) $criteria->add(InvoicePeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(InvoicePeer::DELETED_BY)) $criteria->add(InvoicePeer::DELETED_BY, $this->deleted_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(InvoicePeer::DATABASE_NAME);

		$criteria->add(InvoicePeer::ID, $this->id);

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

		$copyObj->setInvoicePrefix($this->invoice_prefix);

		$copyObj->setInvoiceNumber($this->invoice_number);

		$copyObj->setInvoiceDate($this->invoice_date);

		$copyObj->setInvoiceClientId($this->invoice_client_id);

		$copyObj->setInvoiceProjectId($this->invoice_project_id);

		$copyObj->setInvoiceBudgetId($this->invoice_budget_id);

		$copyObj->setInvoiceCategoryId($this->invoice_category_id);

		$copyObj->setInvoiceKindOfInvoiceId($this->invoice_kind_of_invoice_id);

		$copyObj->setInvoiceTitle($this->invoice_title);

		$copyObj->setInvoiceComments($this->invoice_comments);

		$copyObj->setInvoicePrintComments($this->invoice_print_comments);

		$copyObj->setInvoiceTaxRate($this->invoice_tax_rate);

		$copyObj->setInvoiceFreightCharge($this->invoice_freight_charge);

		$copyObj->setInvoicePaymentConditionId($this->invoice_payment_condition_id);

		$copyObj->setInvoicePaymentMethodId($this->invoice_payment_method_id);

		$copyObj->setInvoicePaymentCheck($this->invoice_payment_check);

		$copyObj->setInvoicePaymentDate($this->invoice_payment_date);

		$copyObj->setInvoicePaymentStatusId($this->invoice_payment_status_id);

		$copyObj->setInvoiceLateFeePercent($this->invoice_late_fee_percent);

		$copyObj->setInvoiceTotalAmount($this->invoice_total_amount);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setDeletedAt($this->deleted_at);

		$copyObj->setDeletedBy($this->deleted_by);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getInvoiceItems() as $relObj) {
				$copyObj->addInvoiceItem($relObj->copy($deepCopy));
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
			self::$peer = new InvoicePeer();
		}
		return self::$peer;
	}

	
	public function setClient($v)
	{


		if ($v === null) {
			$this->setInvoiceClientId('null');
		} else {
			$this->setInvoiceClientId($v->getId());
		}


		$this->aClient = $v;
	}


	
	public function getClient($con = null)
	{
		if ($this->aClient === null && ($this->invoice_client_id !== null)) {
						include_once 'lib/model/om/BaseClientPeer.php';

			$this->aClient = ClientPeer::retrieveByPK($this->invoice_client_id, $con);

			
		}
		return $this->aClient;
	}

	
	public function setProject($v)
	{


		if ($v === null) {
			$this->setInvoiceProjectId('null');
		} else {
			$this->setInvoiceProjectId($v->getId());
		}


		$this->aProject = $v;
	}


	
	public function getProject($con = null)
	{
		if ($this->aProject === null && ($this->invoice_project_id !== null)) {
						include_once 'lib/model/om/BaseProjectPeer.php';

			$this->aProject = ProjectPeer::retrieveByPK($this->invoice_project_id, $con);

			
		}
		return $this->aProject;
	}

	
	public function setBudget($v)
	{


		if ($v === null) {
			$this->setInvoiceBudgetId('null');
		} else {
			$this->setInvoiceBudgetId($v->getId());
		}


		$this->aBudget = $v;
	}


	
	public function getBudget($con = null)
	{
		if ($this->aBudget === null && ($this->invoice_budget_id !== null)) {
						include_once 'lib/model/om/BaseBudgetPeer.php';

			$this->aBudget = BudgetPeer::retrieveByPK($this->invoice_budget_id, $con);

			
		}
		return $this->aBudget;
	}

	
	public function setInvoiceCategory($v)
	{


		if ($v === null) {
			$this->setInvoiceCategoryId('null');
		} else {
			$this->setInvoiceCategoryId($v->getId());
		}


		$this->aInvoiceCategory = $v;
	}


	
	public function getInvoiceCategory($con = null)
	{
		if ($this->aInvoiceCategory === null && ($this->invoice_category_id !== null)) {
						include_once 'lib/model/om/BaseInvoiceCategoryPeer.php';

			$this->aInvoiceCategory = InvoiceCategoryPeer::retrieveByPK($this->invoice_category_id, $con);

			
		}
		return $this->aInvoiceCategory;
	}

	
	public function setKindOfInvoice($v)
	{


		if ($v === null) {
			$this->setInvoiceKindOfInvoiceId('1');
		} else {
			$this->setInvoiceKindOfInvoiceId($v->getId());
		}


		$this->aKindOfInvoice = $v;
	}


	
	public function getKindOfInvoice($con = null)
	{
		if ($this->aKindOfInvoice === null && ($this->invoice_kind_of_invoice_id !== null)) {
						include_once 'lib/model/om/BaseKindOfInvoicePeer.php';

			$this->aKindOfInvoice = KindOfInvoicePeer::retrieveByPK($this->invoice_kind_of_invoice_id, $con);

			
		}
		return $this->aKindOfInvoice;
	}

	
	public function setPaymentCondition($v)
	{


		if ($v === null) {
			$this->setInvoicePaymentConditionId('null');
		} else {
			$this->setInvoicePaymentConditionId($v->getId());
		}


		$this->aPaymentCondition = $v;
	}


	
	public function getPaymentCondition($con = null)
	{
		if ($this->aPaymentCondition === null && ($this->invoice_payment_condition_id !== null)) {
						include_once 'lib/model/om/BasePaymentConditionPeer.php';

			$this->aPaymentCondition = PaymentConditionPeer::retrieveByPK($this->invoice_payment_condition_id, $con);

			
		}
		return $this->aPaymentCondition;
	}

	
	public function setPaymentMethod($v)
	{


		if ($v === null) {
			$this->setInvoicePaymentMethodId('null');
		} else {
			$this->setInvoicePaymentMethodId($v->getId());
		}


		$this->aPaymentMethod = $v;
	}


	
	public function getPaymentMethod($con = null)
	{
		if ($this->aPaymentMethod === null && ($this->invoice_payment_method_id !== null)) {
						include_once 'lib/model/om/BasePaymentMethodPeer.php';

			$this->aPaymentMethod = PaymentMethodPeer::retrieveByPK($this->invoice_payment_method_id, $con);

			
		}
		return $this->aPaymentMethod;
	}

	
	public function setPaymentStatus($v)
	{


		if ($v === null) {
			$this->setInvoicePaymentStatusId('null');
		} else {
			$this->setInvoicePaymentStatusId($v->getId());
		}


		$this->aPaymentStatus = $v;
	}


	
	public function getPaymentStatus($con = null)
	{
		if ($this->aPaymentStatus === null && ($this->invoice_payment_status_id !== null)) {
						include_once 'lib/model/om/BasePaymentStatusPeer.php';

			$this->aPaymentStatus = PaymentStatusPeer::retrieveByPK($this->invoice_payment_status_id, $con);

			
		}
		return $this->aPaymentStatus;
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

	
	public function initInvoiceItems()
	{
		if ($this->collInvoiceItems === null) {
			$this->collInvoiceItems = array();
		}
	}

	
	public function getInvoiceItems($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoiceItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoiceItems === null) {
			if ($this->isNew()) {
			   $this->collInvoiceItems = array();
			} else {

				$criteria->add(InvoiceItemPeer::ITEM_INVOICE_ID, $this->getId());

				InvoiceItemPeer::addSelectColumns($criteria);
				$this->collInvoiceItems = InvoiceItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InvoiceItemPeer::ITEM_INVOICE_ID, $this->getId());

				InvoiceItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastInvoiceItemCriteria) || !$this->lastInvoiceItemCriteria->equals($criteria)) {
					$this->collInvoiceItems = InvoiceItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastInvoiceItemCriteria = $criteria;
		return $this->collInvoiceItems;
	}

	
	public function countInvoiceItems($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseInvoiceItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(InvoiceItemPeer::ITEM_INVOICE_ID, $this->getId());

		return InvoiceItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInvoiceItem(InvoiceItem $l)
	{
		$this->collInvoiceItems[] = $l;
		$l->setInvoice($this);
	}


	
	public function getInvoiceItemsJoinTypeOfInvoiceItem($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoiceItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoiceItems === null) {
			if ($this->isNew()) {
				$this->collInvoiceItems = array();
			} else {

				$criteria->add(InvoiceItemPeer::ITEM_INVOICE_ID, $this->getId());

				$this->collInvoiceItems = InvoiceItemPeer::doSelectJoinTypeOfInvoiceItem($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoiceItemPeer::ITEM_INVOICE_ID, $this->getId());

			if (!isset($this->lastInvoiceItemCriteria) || !$this->lastInvoiceItemCriteria->equals($criteria)) {
				$this->collInvoiceItems = InvoiceItemPeer::doSelectJoinTypeOfInvoiceItem($criteria, $con);
			}
		}
		$this->lastInvoiceItemCriteria = $criteria;

		return $this->collInvoiceItems;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseInvoice:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseInvoice::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


    public function postSave($v) {
                if ($v->collObjectContacts) {
            foreach($v->collObjectContacts as $ocontact) {
                $ocontact->setObjectcontactObjectId($v->getId());
                $ocontact->save();
            }
        }
    }

    public function postDelete($v) {
                $c = new Criteria();
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, $v->getId());
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, 'Invoice');
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
                $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, 'Invoice');
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
            $object->setObjectcontactObjectClass('Invoice');
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
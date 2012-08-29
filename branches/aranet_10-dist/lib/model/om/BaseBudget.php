<?php


abstract class BaseBudget extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $budget_prefix;


	
	protected $budget_number;


	
	protected $budget_revision = 0;


	
	protected $budget_date;


	
	protected $budget_valid_date;


	
	protected $budget_approved_date;


	
	protected $budget_client_id;


	
	protected $budget_project_id;


	
	protected $budget_category_id;


	
	protected $budget_title;


	
	protected $budget_comments;


	
	protected $budget_print_comments = false;


	
	protected $budget_tax_rate = 0;


	
	protected $budget_freight_charge = 0;


	
	protected $budget_total_cost = 0;


	
	protected $budget_total_amount = 0;


	
	protected $budget_payment_condition_id;


	
	protected $budget_status_id = 0;


	
	protected $budget_is_last = true;


	
	protected $created_at;


	
	protected $created_by = 0;


	
	protected $updated_at;


	
	protected $updated_by = 0;


	
	protected $deleted_at;


	
	protected $deleted_by = 0;

	
	protected $aBudgetStatus;

	
	protected $asfGuardUserRelatedByCreatedBy;

	
	protected $asfGuardUserRelatedByUpdatedBy;

	
	protected $asfGuardUserRelatedByDeletedBy;

	
	protected $aPaymentCondition;

	
	protected $aInvoiceCategory;

	
	protected $aProject;

	
	protected $aClient;

	
	protected $collTimesheets;

	
	protected $lastTimesheetCriteria = null;

	
	protected $collMilestonesRelatedByMilestoneProjectId;

	
	protected $lastMilestoneRelatedByMilestoneProjectIdCriteria = null;

	
	protected $collMilestonesRelatedByMilestoneBudgetId;

	
	protected $lastMilestoneRelatedByMilestoneBudgetIdCriteria = null;

	
	protected $collTasks;

	
	protected $lastTaskCriteria = null;

	
	protected $collInvoices;

	
	protected $lastInvoiceCriteria = null;

	
	protected $collBudgetItems;

	
	protected $lastBudgetItemCriteria = null;

	
	protected $collExpenseItems;

	
	protected $lastExpenseItemCriteria = null;

	
	protected $collIncomeItems;

	
	protected $lastIncomeItemCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  protected $collContacts;

  
  protected $collDefaultContact;

  
  protected $collObjectContacts;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getBudgetPrefix()
	{

		return $this->budget_prefix;
	}

	
	public function getBudgetNumber()
	{

		return $this->budget_number;
	}

	
	public function getBudgetRevision()
	{

		return $this->budget_revision;
	}

	
	public function getBudgetDate($format = 'Y-m-d')
	{

		if ($this->budget_date === null || $this->budget_date === '') {
			return null;
		} elseif (!is_int($this->budget_date)) {
						$ts = strtotime($this->budget_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [budget_date] as date/time value: " . var_export($this->budget_date, true));
			}
		} else {
			$ts = $this->budget_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getBudgetValidDate($format = 'Y-m-d')
	{

		if ($this->budget_valid_date === null || $this->budget_valid_date === '') {
			return null;
		} elseif (!is_int($this->budget_valid_date)) {
						$ts = strtotime($this->budget_valid_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [budget_valid_date] as date/time value: " . var_export($this->budget_valid_date, true));
			}
		} else {
			$ts = $this->budget_valid_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getBudgetApprovedDate($format = 'Y-m-d')
	{

		if ($this->budget_approved_date === null || $this->budget_approved_date === '') {
			return null;
		} elseif (!is_int($this->budget_approved_date)) {
						$ts = strtotime($this->budget_approved_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [budget_approved_date] as date/time value: " . var_export($this->budget_approved_date, true));
			}
		} else {
			$ts = $this->budget_approved_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getBudgetClientId()
	{

		return $this->budget_client_id;
	}

	
	public function getBudgetProjectId()
	{

		return $this->budget_project_id;
	}

	
	public function getBudgetCategoryId()
	{

		return $this->budget_category_id;
	}

	
	public function getBudgetTitle()
	{

		return $this->budget_title;
	}

	
	public function getBudgetComments()
	{

		return $this->budget_comments;
	}

	
	public function getBudgetPrintComments()
	{

		return $this->budget_print_comments;
	}

	
	public function getBudgetTaxRate()
	{

		return $this->budget_tax_rate;
	}

	
	public function getBudgetFreightCharge()
	{

		return $this->budget_freight_charge;
	}

	
	public function getBudgetTotalCost()
	{

		return $this->budget_total_cost;
	}

	
	public function getBudgetTotalAmount()
	{

		return $this->budget_total_amount;
	}

	
	public function getBudgetPaymentConditionId()
	{

		return $this->budget_payment_condition_id;
	}

	
	public function getBudgetStatusId()
	{

		return $this->budget_status_id;
	}

	
	public function getBudgetIsLast()
	{

		return $this->budget_is_last;
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
			$this->modifiedColumns[] = BudgetPeer::ID;
		}

	} 
	
	public function setBudgetPrefix($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->budget_prefix !== $v) {
			$this->budget_prefix = $v;
			$this->modifiedColumns[] = BudgetPeer::BUDGET_PREFIX;
		}

	} 
	
	public function setBudgetNumber($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->budget_number !== $v) {
			$this->budget_number = $v;
			$this->modifiedColumns[] = BudgetPeer::BUDGET_NUMBER;
		}

	} 
	
	public function setBudgetRevision($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->budget_revision !== $v || $v === 0) {
			$this->budget_revision = $v;
			$this->modifiedColumns[] = BudgetPeer::BUDGET_REVISION;
		}

	} 
	
	public function setBudgetDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [budget_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->budget_date !== $ts) {
			$this->budget_date = $ts;
			$this->modifiedColumns[] = BudgetPeer::BUDGET_DATE;
		}

	} 
	
	public function setBudgetValidDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [budget_valid_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->budget_valid_date !== $ts) {
			$this->budget_valid_date = $ts;
			$this->modifiedColumns[] = BudgetPeer::BUDGET_VALID_DATE;
		}

	} 
	
	public function setBudgetApprovedDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [budget_approved_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->budget_approved_date !== $ts) {
			$this->budget_approved_date = $ts;
			$this->modifiedColumns[] = BudgetPeer::BUDGET_APPROVED_DATE;
		}

	} 
	
	public function setBudgetClientId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->budget_client_id !== $v) {
			$this->budget_client_id = $v;
			$this->modifiedColumns[] = BudgetPeer::BUDGET_CLIENT_ID;
		}

		if ($this->aClient !== null && $this->aClient->getId() !== $v) {
			$this->aClient = null;
		}

	} 
	
	public function setBudgetProjectId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->budget_project_id !== $v) {
			$this->budget_project_id = $v;
			$this->modifiedColumns[] = BudgetPeer::BUDGET_PROJECT_ID;
		}

		if ($this->aProject !== null && $this->aProject->getId() !== $v) {
			$this->aProject = null;
		}

	} 
	
	public function setBudgetCategoryId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->budget_category_id !== $v) {
			$this->budget_category_id = $v;
			$this->modifiedColumns[] = BudgetPeer::BUDGET_CATEGORY_ID;
		}

		if ($this->aInvoiceCategory !== null && $this->aInvoiceCategory->getId() !== $v) {
			$this->aInvoiceCategory = null;
		}

	} 
	
	public function setBudgetTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->budget_title !== $v) {
			$this->budget_title = $v;
			$this->modifiedColumns[] = BudgetPeer::BUDGET_TITLE;
		}

	} 
	
	public function setBudgetComments($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->budget_comments !== $v) {
			$this->budget_comments = $v;
			$this->modifiedColumns[] = BudgetPeer::BUDGET_COMMENTS;
		}

	} 
	
	public function setBudgetPrintComments($v)
	{

		if ($this->budget_print_comments !== $v || $v === false) {
			$this->budget_print_comments = $v;
			$this->modifiedColumns[] = BudgetPeer::BUDGET_PRINT_COMMENTS;
		}

	} 
	
	public function setBudgetTaxRate($v)
	{

		if ($this->budget_tax_rate !== $v || $v === 0) {
			$this->budget_tax_rate = $v;
			$this->modifiedColumns[] = BudgetPeer::BUDGET_TAX_RATE;
		}

	} 
	
	public function setBudgetFreightCharge($v)
	{

		if ($this->budget_freight_charge !== $v || $v === 0) {
			$this->budget_freight_charge = $v;
			$this->modifiedColumns[] = BudgetPeer::BUDGET_FREIGHT_CHARGE;
		}

	} 
	
	public function setBudgetTotalCost($v)
	{

		if ($this->budget_total_cost !== $v || $v === 0) {
			$this->budget_total_cost = $v;
			$this->modifiedColumns[] = BudgetPeer::BUDGET_TOTAL_COST;
		}

	} 
	
	public function setBudgetTotalAmount($v)
	{

		if ($this->budget_total_amount !== $v || $v === 0) {
			$this->budget_total_amount = $v;
			$this->modifiedColumns[] = BudgetPeer::BUDGET_TOTAL_AMOUNT;
		}

	} 
	
	public function setBudgetPaymentConditionId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->budget_payment_condition_id !== $v) {
			$this->budget_payment_condition_id = $v;
			$this->modifiedColumns[] = BudgetPeer::BUDGET_PAYMENT_CONDITION_ID;
		}

		if ($this->aPaymentCondition !== null && $this->aPaymentCondition->getId() !== $v) {
			$this->aPaymentCondition = null;
		}

	} 
	
	public function setBudgetStatusId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->budget_status_id !== $v || $v === 0) {
			$this->budget_status_id = $v;
			$this->modifiedColumns[] = BudgetPeer::BUDGET_STATUS_ID;
		}

		if ($this->aBudgetStatus !== null && $this->aBudgetStatus->getId() !== $v) {
			$this->aBudgetStatus = null;
		}

	} 
	
	public function setBudgetIsLast($v)
	{

		if ($this->budget_is_last !== $v || $v === true) {
			$this->budget_is_last = $v;
			$this->modifiedColumns[] = BudgetPeer::BUDGET_IS_LAST;
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
			$this->modifiedColumns[] = BudgetPeer::CREATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v || $v === 0) {
			$this->created_by = $v;
			$this->modifiedColumns[] = BudgetPeer::CREATED_BY;
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
			$this->modifiedColumns[] = BudgetPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v || $v === 0) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = BudgetPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = BudgetPeer::DELETED_AT;
		}

	} 
	
	public function setDeletedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->deleted_by !== $v || $v === 0) {
			$this->deleted_by = $v;
			$this->modifiedColumns[] = BudgetPeer::DELETED_BY;
		}

		if ($this->asfGuardUserRelatedByDeletedBy !== null && $this->asfGuardUserRelatedByDeletedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByDeletedBy = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->budget_prefix = $rs->getString($startcol + 1);

			$this->budget_number = $rs->getString($startcol + 2);

			$this->budget_revision = $rs->getInt($startcol + 3);

			$this->budget_date = $rs->getDate($startcol + 4, null);

			$this->budget_valid_date = $rs->getDate($startcol + 5, null);

			$this->budget_approved_date = $rs->getDate($startcol + 6, null);

			$this->budget_client_id = $rs->getInt($startcol + 7);

			$this->budget_project_id = $rs->getInt($startcol + 8);

			$this->budget_category_id = $rs->getInt($startcol + 9);

			$this->budget_title = $rs->getString($startcol + 10);

			$this->budget_comments = $rs->getString($startcol + 11);

			$this->budget_print_comments = $rs->getBoolean($startcol + 12);

			$this->budget_tax_rate = $rs->getFloat($startcol + 13);

			$this->budget_freight_charge = $rs->getFloat($startcol + 14);

			$this->budget_total_cost = $rs->getFloat($startcol + 15);

			$this->budget_total_amount = $rs->getFloat($startcol + 16);

			$this->budget_payment_condition_id = $rs->getInt($startcol + 17);

			$this->budget_status_id = $rs->getInt($startcol + 18);

			$this->budget_is_last = $rs->getBoolean($startcol + 19);

			$this->created_at = $rs->getTimestamp($startcol + 20, null);

			$this->created_by = $rs->getInt($startcol + 21);

			$this->updated_at = $rs->getTimestamp($startcol + 22, null);

			$this->updated_by = $rs->getInt($startcol + 23);

			$this->deleted_at = $rs->getTimestamp($startcol + 24, null);

			$this->deleted_by = $rs->getInt($startcol + 25);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 26; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Budget object", $e);
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
                

    foreach (sfMixer::getCallables('BaseBudget:delete:pre') as $callable)
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
			$con = Propel::getConnection(BudgetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BudgetPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseBudget:delete:post') as $callable)
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
                

    foreach (sfMixer::getCallables('BaseBudget:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(BudgetPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(BudgetPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(BudgetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseBudget:save:post') as $callable)
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


												
			if ($this->aBudgetStatus !== null) {
				if ($this->aBudgetStatus->isModified()) {
					$affectedRows += $this->aBudgetStatus->save($con);
				}
				$this->setBudgetStatus($this->aBudgetStatus);
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

			if ($this->aPaymentCondition !== null) {
				if ($this->aPaymentCondition->isModified()) {
					$affectedRows += $this->aPaymentCondition->save($con);
				}
				$this->setPaymentCondition($this->aPaymentCondition);
			}

			if ($this->aInvoiceCategory !== null) {
				if ($this->aInvoiceCategory->isModified()) {
					$affectedRows += $this->aInvoiceCategory->save($con);
				}
				$this->setInvoiceCategory($this->aInvoiceCategory);
			}

			if ($this->aProject !== null) {
				if ($this->aProject->isModified()) {
					$affectedRows += $this->aProject->save($con);
				}
				$this->setProject($this->aProject);
			}

			if ($this->aClient !== null) {
				if ($this->aClient->isModified()) {
					$affectedRows += $this->aClient->save($con);
				}
				$this->setClient($this->aClient);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = BudgetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += BudgetPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collTimesheets !== null) {
				foreach($this->collTimesheets as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collMilestonesRelatedByMilestoneProjectId !== null) {
				foreach($this->collMilestonesRelatedByMilestoneProjectId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collMilestonesRelatedByMilestoneBudgetId !== null) {
				foreach($this->collMilestonesRelatedByMilestoneBudgetId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collTasks !== null) {
				foreach($this->collTasks as $referrerFK) {
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

			if ($this->collBudgetItems !== null) {
				foreach($this->collBudgetItems as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


												
			if ($this->aBudgetStatus !== null) {
				if (!$this->aBudgetStatus->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aBudgetStatus->getValidationFailures());
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

			if ($this->aPaymentCondition !== null) {
				if (!$this->aPaymentCondition->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPaymentCondition->getValidationFailures());
				}
			}

			if ($this->aInvoiceCategory !== null) {
				if (!$this->aInvoiceCategory->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aInvoiceCategory->getValidationFailures());
				}
			}

			if ($this->aProject !== null) {
				if (!$this->aProject->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProject->getValidationFailures());
				}
			}

			if ($this->aClient !== null) {
				if (!$this->aClient->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aClient->getValidationFailures());
				}
			}


			if (($retval = BudgetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collTimesheets !== null) {
					foreach($this->collTimesheets as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collMilestonesRelatedByMilestoneProjectId !== null) {
					foreach($this->collMilestonesRelatedByMilestoneProjectId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collMilestonesRelatedByMilestoneBudgetId !== null) {
					foreach($this->collMilestonesRelatedByMilestoneBudgetId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collTasks !== null) {
					foreach($this->collTasks as $referrerFK) {
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

				if ($this->collBudgetItems !== null) {
					foreach($this->collBudgetItems as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
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
		$pos = BudgetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getBudgetPrefix();
				break;
			case 2:
				return $this->getBudgetNumber();
				break;
			case 3:
				return $this->getBudgetRevision();
				break;
			case 4:
				return $this->getBudgetDate();
				break;
			case 5:
				return $this->getBudgetValidDate();
				break;
			case 6:
				return $this->getBudgetApprovedDate();
				break;
			case 7:
				return $this->getBudgetClientId();
				break;
			case 8:
				return $this->getBudgetProjectId();
				break;
			case 9:
				return $this->getBudgetCategoryId();
				break;
			case 10:
				return $this->getBudgetTitle();
				break;
			case 11:
				return $this->getBudgetComments();
				break;
			case 12:
				return $this->getBudgetPrintComments();
				break;
			case 13:
				return $this->getBudgetTaxRate();
				break;
			case 14:
				return $this->getBudgetFreightCharge();
				break;
			case 15:
				return $this->getBudgetTotalCost();
				break;
			case 16:
				return $this->getBudgetTotalAmount();
				break;
			case 17:
				return $this->getBudgetPaymentConditionId();
				break;
			case 18:
				return $this->getBudgetStatusId();
				break;
			case 19:
				return $this->getBudgetIsLast();
				break;
			case 20:
				return $this->getCreatedAt();
				break;
			case 21:
				return $this->getCreatedBy();
				break;
			case 22:
				return $this->getUpdatedAt();
				break;
			case 23:
				return $this->getUpdatedBy();
				break;
			case 24:
				return $this->getDeletedAt();
				break;
			case 25:
				return $this->getDeletedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BudgetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getBudgetPrefix(),
			$keys[2] => $this->getBudgetNumber(),
			$keys[3] => $this->getBudgetRevision(),
			$keys[4] => $this->getBudgetDate(),
			$keys[5] => $this->getBudgetValidDate(),
			$keys[6] => $this->getBudgetApprovedDate(),
			$keys[7] => $this->getBudgetClientId(),
			$keys[8] => $this->getBudgetProjectId(),
			$keys[9] => $this->getBudgetCategoryId(),
			$keys[10] => $this->getBudgetTitle(),
			$keys[11] => $this->getBudgetComments(),
			$keys[12] => $this->getBudgetPrintComments(),
			$keys[13] => $this->getBudgetTaxRate(),
			$keys[14] => $this->getBudgetFreightCharge(),
			$keys[15] => $this->getBudgetTotalCost(),
			$keys[16] => $this->getBudgetTotalAmount(),
			$keys[17] => $this->getBudgetPaymentConditionId(),
			$keys[18] => $this->getBudgetStatusId(),
			$keys[19] => $this->getBudgetIsLast(),
			$keys[20] => $this->getCreatedAt(),
			$keys[21] => $this->getCreatedBy(),
			$keys[22] => $this->getUpdatedAt(),
			$keys[23] => $this->getUpdatedBy(),
			$keys[24] => $this->getDeletedAt(),
			$keys[25] => $this->getDeletedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BudgetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setBudgetPrefix($value);
				break;
			case 2:
				$this->setBudgetNumber($value);
				break;
			case 3:
				$this->setBudgetRevision($value);
				break;
			case 4:
				$this->setBudgetDate($value);
				break;
			case 5:
				$this->setBudgetValidDate($value);
				break;
			case 6:
				$this->setBudgetApprovedDate($value);
				break;
			case 7:
				$this->setBudgetClientId($value);
				break;
			case 8:
				$this->setBudgetProjectId($value);
				break;
			case 9:
				$this->setBudgetCategoryId($value);
				break;
			case 10:
				$this->setBudgetTitle($value);
				break;
			case 11:
				$this->setBudgetComments($value);
				break;
			case 12:
				$this->setBudgetPrintComments($value);
				break;
			case 13:
				$this->setBudgetTaxRate($value);
				break;
			case 14:
				$this->setBudgetFreightCharge($value);
				break;
			case 15:
				$this->setBudgetTotalCost($value);
				break;
			case 16:
				$this->setBudgetTotalAmount($value);
				break;
			case 17:
				$this->setBudgetPaymentConditionId($value);
				break;
			case 18:
				$this->setBudgetStatusId($value);
				break;
			case 19:
				$this->setBudgetIsLast($value);
				break;
			case 20:
				$this->setCreatedAt($value);
				break;
			case 21:
				$this->setCreatedBy($value);
				break;
			case 22:
				$this->setUpdatedAt($value);
				break;
			case 23:
				$this->setUpdatedBy($value);
				break;
			case 24:
				$this->setDeletedAt($value);
				break;
			case 25:
				$this->setDeletedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BudgetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setBudgetPrefix($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setBudgetNumber($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setBudgetRevision($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setBudgetDate($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setBudgetValidDate($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setBudgetApprovedDate($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setBudgetClientId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setBudgetProjectId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setBudgetCategoryId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setBudgetTitle($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setBudgetComments($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setBudgetPrintComments($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setBudgetTaxRate($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setBudgetFreightCharge($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setBudgetTotalCost($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setBudgetTotalAmount($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setBudgetPaymentConditionId($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setBudgetStatusId($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setBudgetIsLast($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCreatedAt($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCreatedBy($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setUpdatedAt($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setUpdatedBy($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setDeletedAt($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setDeletedBy($arr[$keys[25]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BudgetPeer::DATABASE_NAME);

		if ($this->isColumnModified(BudgetPeer::ID)) $criteria->add(BudgetPeer::ID, $this->id);
		if ($this->isColumnModified(BudgetPeer::BUDGET_PREFIX)) $criteria->add(BudgetPeer::BUDGET_PREFIX, $this->budget_prefix);
		if ($this->isColumnModified(BudgetPeer::BUDGET_NUMBER)) $criteria->add(BudgetPeer::BUDGET_NUMBER, $this->budget_number);
		if ($this->isColumnModified(BudgetPeer::BUDGET_REVISION)) $criteria->add(BudgetPeer::BUDGET_REVISION, $this->budget_revision);
		if ($this->isColumnModified(BudgetPeer::BUDGET_DATE)) $criteria->add(BudgetPeer::BUDGET_DATE, $this->budget_date);
		if ($this->isColumnModified(BudgetPeer::BUDGET_VALID_DATE)) $criteria->add(BudgetPeer::BUDGET_VALID_DATE, $this->budget_valid_date);
		if ($this->isColumnModified(BudgetPeer::BUDGET_APPROVED_DATE)) $criteria->add(BudgetPeer::BUDGET_APPROVED_DATE, $this->budget_approved_date);
		if ($this->isColumnModified(BudgetPeer::BUDGET_CLIENT_ID)) $criteria->add(BudgetPeer::BUDGET_CLIENT_ID, $this->budget_client_id);
		if ($this->isColumnModified(BudgetPeer::BUDGET_PROJECT_ID)) $criteria->add(BudgetPeer::BUDGET_PROJECT_ID, $this->budget_project_id);
		if ($this->isColumnModified(BudgetPeer::BUDGET_CATEGORY_ID)) $criteria->add(BudgetPeer::BUDGET_CATEGORY_ID, $this->budget_category_id);
		if ($this->isColumnModified(BudgetPeer::BUDGET_TITLE)) $criteria->add(BudgetPeer::BUDGET_TITLE, $this->budget_title);
		if ($this->isColumnModified(BudgetPeer::BUDGET_COMMENTS)) $criteria->add(BudgetPeer::BUDGET_COMMENTS, $this->budget_comments);
		if ($this->isColumnModified(BudgetPeer::BUDGET_PRINT_COMMENTS)) $criteria->add(BudgetPeer::BUDGET_PRINT_COMMENTS, $this->budget_print_comments);
		if ($this->isColumnModified(BudgetPeer::BUDGET_TAX_RATE)) $criteria->add(BudgetPeer::BUDGET_TAX_RATE, $this->budget_tax_rate);
		if ($this->isColumnModified(BudgetPeer::BUDGET_FREIGHT_CHARGE)) $criteria->add(BudgetPeer::BUDGET_FREIGHT_CHARGE, $this->budget_freight_charge);
		if ($this->isColumnModified(BudgetPeer::BUDGET_TOTAL_COST)) $criteria->add(BudgetPeer::BUDGET_TOTAL_COST, $this->budget_total_cost);
		if ($this->isColumnModified(BudgetPeer::BUDGET_TOTAL_AMOUNT)) $criteria->add(BudgetPeer::BUDGET_TOTAL_AMOUNT, $this->budget_total_amount);
		if ($this->isColumnModified(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID)) $criteria->add(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, $this->budget_payment_condition_id);
		if ($this->isColumnModified(BudgetPeer::BUDGET_STATUS_ID)) $criteria->add(BudgetPeer::BUDGET_STATUS_ID, $this->budget_status_id);
		if ($this->isColumnModified(BudgetPeer::BUDGET_IS_LAST)) $criteria->add(BudgetPeer::BUDGET_IS_LAST, $this->budget_is_last);
		if ($this->isColumnModified(BudgetPeer::CREATED_AT)) $criteria->add(BudgetPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(BudgetPeer::CREATED_BY)) $criteria->add(BudgetPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(BudgetPeer::UPDATED_AT)) $criteria->add(BudgetPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(BudgetPeer::UPDATED_BY)) $criteria->add(BudgetPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(BudgetPeer::DELETED_AT)) $criteria->add(BudgetPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(BudgetPeer::DELETED_BY)) $criteria->add(BudgetPeer::DELETED_BY, $this->deleted_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BudgetPeer::DATABASE_NAME);

		$criteria->add(BudgetPeer::ID, $this->id);

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

		$copyObj->setBudgetPrefix($this->budget_prefix);

		$copyObj->setBudgetNumber($this->budget_number);

		$copyObj->setBudgetRevision($this->budget_revision);

		$copyObj->setBudgetDate($this->budget_date);

		$copyObj->setBudgetValidDate($this->budget_valid_date);

		$copyObj->setBudgetApprovedDate($this->budget_approved_date);

		$copyObj->setBudgetClientId($this->budget_client_id);

		$copyObj->setBudgetProjectId($this->budget_project_id);

		$copyObj->setBudgetCategoryId($this->budget_category_id);

		$copyObj->setBudgetTitle($this->budget_title);

		$copyObj->setBudgetComments($this->budget_comments);

		$copyObj->setBudgetPrintComments($this->budget_print_comments);

		$copyObj->setBudgetTaxRate($this->budget_tax_rate);

		$copyObj->setBudgetFreightCharge($this->budget_freight_charge);

		$copyObj->setBudgetTotalCost($this->budget_total_cost);

		$copyObj->setBudgetTotalAmount($this->budget_total_amount);

		$copyObj->setBudgetPaymentConditionId($this->budget_payment_condition_id);

		$copyObj->setBudgetStatusId($this->budget_status_id);

		$copyObj->setBudgetIsLast($this->budget_is_last);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setDeletedAt($this->deleted_at);

		$copyObj->setDeletedBy($this->deleted_by);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getTimesheets() as $relObj) {
				$copyObj->addTimesheet($relObj->copy($deepCopy));
			}

			foreach($this->getMilestonesRelatedByMilestoneProjectId() as $relObj) {
				$copyObj->addMilestoneRelatedByMilestoneProjectId($relObj->copy($deepCopy));
			}

			foreach($this->getMilestonesRelatedByMilestoneBudgetId() as $relObj) {
				$copyObj->addMilestoneRelatedByMilestoneBudgetId($relObj->copy($deepCopy));
			}

			foreach($this->getTasks() as $relObj) {
				$copyObj->addTask($relObj->copy($deepCopy));
			}

			foreach($this->getInvoices() as $relObj) {
				$copyObj->addInvoice($relObj->copy($deepCopy));
			}

			foreach($this->getBudgetItems() as $relObj) {
				$copyObj->addBudgetItem($relObj->copy($deepCopy));
			}

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
			self::$peer = new BudgetPeer();
		}
		return self::$peer;
	}

	
	public function setBudgetStatus($v)
	{


		if ($v === null) {
			$this->setBudgetStatusId('0');
		} else {
			$this->setBudgetStatusId($v->getId());
		}


		$this->aBudgetStatus = $v;
	}


	
	public function getBudgetStatus($con = null)
	{
		if ($this->aBudgetStatus === null && ($this->budget_status_id !== null)) {
						include_once 'lib/model/om/BaseBudgetStatusPeer.php';

			$this->aBudgetStatus = BudgetStatusPeer::retrieveByPK($this->budget_status_id, $con);

			
		}
		return $this->aBudgetStatus;
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

	
	public function setPaymentCondition($v)
	{


		if ($v === null) {
			$this->setBudgetPaymentConditionId(NULL);
		} else {
			$this->setBudgetPaymentConditionId($v->getId());
		}


		$this->aPaymentCondition = $v;
	}


	
	public function getPaymentCondition($con = null)
	{
		if ($this->aPaymentCondition === null && ($this->budget_payment_condition_id !== null)) {
						include_once 'lib/model/om/BasePaymentConditionPeer.php';

			$this->aPaymentCondition = PaymentConditionPeer::retrieveByPK($this->budget_payment_condition_id, $con);

			
		}
		return $this->aPaymentCondition;
	}

	
	public function setInvoiceCategory($v)
	{


		if ($v === null) {
			$this->setBudgetCategoryId(NULL);
		} else {
			$this->setBudgetCategoryId($v->getId());
		}


		$this->aInvoiceCategory = $v;
	}


	
	public function getInvoiceCategory($con = null)
	{
		if ($this->aInvoiceCategory === null && ($this->budget_category_id !== null)) {
						include_once 'lib/model/om/BaseInvoiceCategoryPeer.php';

			$this->aInvoiceCategory = InvoiceCategoryPeer::retrieveByPK($this->budget_category_id, $con);

			
		}
		return $this->aInvoiceCategory;
	}

	
	public function setProject($v)
	{


		if ($v === null) {
			$this->setBudgetProjectId(NULL);
		} else {
			$this->setBudgetProjectId($v->getId());
		}


		$this->aProject = $v;
	}


	
	public function getProject($con = null)
	{
		if ($this->aProject === null && ($this->budget_project_id !== null)) {
						include_once 'lib/model/om/BaseProjectPeer.php';

			$this->aProject = ProjectPeer::retrieveByPK($this->budget_project_id, $con);

			
		}
		return $this->aProject;
	}

	
	public function setClient($v)
	{


		if ($v === null) {
			$this->setBudgetClientId(NULL);
		} else {
			$this->setBudgetClientId($v->getId());
		}


		$this->aClient = $v;
	}


	
	public function getClient($con = null)
	{
		if ($this->aClient === null && ($this->budget_client_id !== null)) {
						include_once 'lib/model/om/BaseClientPeer.php';

			$this->aClient = ClientPeer::retrieveByPK($this->budget_client_id, $con);

			
		}
		return $this->aClient;
	}

	
	public function initTimesheets()
	{
		if ($this->collTimesheets === null) {
			$this->collTimesheets = array();
		}
	}

	
	public function getTimesheets($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTimesheetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTimesheets === null) {
			if ($this->isNew()) {
			   $this->collTimesheets = array();
			} else {

				$criteria->add(TimesheetPeer::TIMESHEET_BUDGET_ID, $this->getId());

				TimesheetPeer::addSelectColumns($criteria);
				$this->collTimesheets = TimesheetPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TimesheetPeer::TIMESHEET_BUDGET_ID, $this->getId());

				TimesheetPeer::addSelectColumns($criteria);
				if (!isset($this->lastTimesheetCriteria) || !$this->lastTimesheetCriteria->equals($criteria)) {
					$this->collTimesheets = TimesheetPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastTimesheetCriteria = $criteria;
		return $this->collTimesheets;
	}

	
	public function countTimesheets($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseTimesheetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(TimesheetPeer::TIMESHEET_BUDGET_ID, $this->getId());

		return TimesheetPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTimesheet(Timesheet $l)
	{
		$this->collTimesheets[] = $l;
		$l->setBudget($this);
	}


	
	public function getTimesheetsJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTimesheetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTimesheets === null) {
			if ($this->isNew()) {
				$this->collTimesheets = array();
			} else {

				$criteria->add(TimesheetPeer::TIMESHEET_BUDGET_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_BUDGET_ID, $this->getId());

			if (!isset($this->lastTimesheetCriteria) || !$this->lastTimesheetCriteria->equals($criteria)) {
				$this->collTimesheets = TimesheetPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastTimesheetCriteria = $criteria;

		return $this->collTimesheets;
	}


	
	public function getTimesheetsJoinMilestone($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTimesheetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTimesheets === null) {
			if ($this->isNew()) {
				$this->collTimesheets = array();
			} else {

				$criteria->add(TimesheetPeer::TIMESHEET_BUDGET_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinMilestone($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_BUDGET_ID, $this->getId());

			if (!isset($this->lastTimesheetCriteria) || !$this->lastTimesheetCriteria->equals($criteria)) {
				$this->collTimesheets = TimesheetPeer::doSelectJoinMilestone($criteria, $con);
			}
		}
		$this->lastTimesheetCriteria = $criteria;

		return $this->collTimesheets;
	}


	
	public function getTimesheetsJoinTask($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTimesheetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTimesheets === null) {
			if ($this->isNew()) {
				$this->collTimesheets = array();
			} else {

				$criteria->add(TimesheetPeer::TIMESHEET_BUDGET_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinTask($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_BUDGET_ID, $this->getId());

			if (!isset($this->lastTimesheetCriteria) || !$this->lastTimesheetCriteria->equals($criteria)) {
				$this->collTimesheets = TimesheetPeer::doSelectJoinTask($criteria, $con);
			}
		}
		$this->lastTimesheetCriteria = $criteria;

		return $this->collTimesheets;
	}


	
	public function getTimesheetsJoinsfGuardUser($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTimesheetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTimesheets === null) {
			if ($this->isNew()) {
				$this->collTimesheets = array();
			} else {

				$criteria->add(TimesheetPeer::TIMESHEET_BUDGET_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_BUDGET_ID, $this->getId());

			if (!isset($this->lastTimesheetCriteria) || !$this->lastTimesheetCriteria->equals($criteria)) {
				$this->collTimesheets = TimesheetPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		}
		$this->lastTimesheetCriteria = $criteria;

		return $this->collTimesheets;
	}


	
	public function getTimesheetsJoinTypeOfHour($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTimesheetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTimesheets === null) {
			if ($this->isNew()) {
				$this->collTimesheets = array();
			} else {

				$criteria->add(TimesheetPeer::TIMESHEET_BUDGET_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinTypeOfHour($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_BUDGET_ID, $this->getId());

			if (!isset($this->lastTimesheetCriteria) || !$this->lastTimesheetCriteria->equals($criteria)) {
				$this->collTimesheets = TimesheetPeer::doSelectJoinTypeOfHour($criteria, $con);
			}
		}
		$this->lastTimesheetCriteria = $criteria;

		return $this->collTimesheets;
	}

	
	public function initMilestonesRelatedByMilestoneProjectId()
	{
		if ($this->collMilestonesRelatedByMilestoneProjectId === null) {
			$this->collMilestonesRelatedByMilestoneProjectId = array();
		}
	}

	
	public function getMilestonesRelatedByMilestoneProjectId($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMilestonePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMilestonesRelatedByMilestoneProjectId === null) {
			if ($this->isNew()) {
			   $this->collMilestonesRelatedByMilestoneProjectId = array();
			} else {

				$criteria->add(MilestonePeer::MILESTONE_PROJECT_ID, $this->getId());

				MilestonePeer::addSelectColumns($criteria);
				$this->collMilestonesRelatedByMilestoneProjectId = MilestonePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MilestonePeer::MILESTONE_PROJECT_ID, $this->getId());

				MilestonePeer::addSelectColumns($criteria);
				if (!isset($this->lastMilestoneRelatedByMilestoneProjectIdCriteria) || !$this->lastMilestoneRelatedByMilestoneProjectIdCriteria->equals($criteria)) {
					$this->collMilestonesRelatedByMilestoneProjectId = MilestonePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastMilestoneRelatedByMilestoneProjectIdCriteria = $criteria;
		return $this->collMilestonesRelatedByMilestoneProjectId;
	}

	
	public function countMilestonesRelatedByMilestoneProjectId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseMilestonePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(MilestonePeer::MILESTONE_PROJECT_ID, $this->getId());

		return MilestonePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMilestoneRelatedByMilestoneProjectId(Milestone $l)
	{
		$this->collMilestonesRelatedByMilestoneProjectId[] = $l;
		$l->setBudgetRelatedByMilestoneProjectId($this);
	}


	
	public function getMilestonesRelatedByMilestoneProjectIdJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMilestonePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMilestonesRelatedByMilestoneProjectId === null) {
			if ($this->isNew()) {
				$this->collMilestonesRelatedByMilestoneProjectId = array();
			} else {

				$criteria->add(MilestonePeer::MILESTONE_PROJECT_ID, $this->getId());

				$this->collMilestonesRelatedByMilestoneProjectId = MilestonePeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(MilestonePeer::MILESTONE_PROJECT_ID, $this->getId());

			if (!isset($this->lastMilestoneRelatedByMilestoneProjectIdCriteria) || !$this->lastMilestoneRelatedByMilestoneProjectIdCriteria->equals($criteria)) {
				$this->collMilestonesRelatedByMilestoneProjectId = MilestonePeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		}
		$this->lastMilestoneRelatedByMilestoneProjectIdCriteria = $criteria;

		return $this->collMilestonesRelatedByMilestoneProjectId;
	}


	
	public function getMilestonesRelatedByMilestoneProjectIdJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMilestonePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMilestonesRelatedByMilestoneProjectId === null) {
			if ($this->isNew()) {
				$this->collMilestonesRelatedByMilestoneProjectId = array();
			} else {

				$criteria->add(MilestonePeer::MILESTONE_PROJECT_ID, $this->getId());

				$this->collMilestonesRelatedByMilestoneProjectId = MilestonePeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(MilestonePeer::MILESTONE_PROJECT_ID, $this->getId());

			if (!isset($this->lastMilestoneRelatedByMilestoneProjectIdCriteria) || !$this->lastMilestoneRelatedByMilestoneProjectIdCriteria->equals($criteria)) {
				$this->collMilestonesRelatedByMilestoneProjectId = MilestonePeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		}
		$this->lastMilestoneRelatedByMilestoneProjectIdCriteria = $criteria;

		return $this->collMilestonesRelatedByMilestoneProjectId;
	}


	
	public function getMilestonesRelatedByMilestoneProjectIdJoinsfGuardUserRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMilestonePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMilestonesRelatedByMilestoneProjectId === null) {
			if ($this->isNew()) {
				$this->collMilestonesRelatedByMilestoneProjectId = array();
			} else {

				$criteria->add(MilestonePeer::MILESTONE_PROJECT_ID, $this->getId());

				$this->collMilestonesRelatedByMilestoneProjectId = MilestonePeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(MilestonePeer::MILESTONE_PROJECT_ID, $this->getId());

			if (!isset($this->lastMilestoneRelatedByMilestoneProjectIdCriteria) || !$this->lastMilestoneRelatedByMilestoneProjectIdCriteria->equals($criteria)) {
				$this->collMilestonesRelatedByMilestoneProjectId = MilestonePeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		}
		$this->lastMilestoneRelatedByMilestoneProjectIdCriteria = $criteria;

		return $this->collMilestonesRelatedByMilestoneProjectId;
	}

	
	public function initMilestonesRelatedByMilestoneBudgetId()
	{
		if ($this->collMilestonesRelatedByMilestoneBudgetId === null) {
			$this->collMilestonesRelatedByMilestoneBudgetId = array();
		}
	}

	
	public function getMilestonesRelatedByMilestoneBudgetId($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMilestonePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMilestonesRelatedByMilestoneBudgetId === null) {
			if ($this->isNew()) {
			   $this->collMilestonesRelatedByMilestoneBudgetId = array();
			} else {

				$criteria->add(MilestonePeer::MILESTONE_BUDGET_ID, $this->getId());

				MilestonePeer::addSelectColumns($criteria);
				$this->collMilestonesRelatedByMilestoneBudgetId = MilestonePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MilestonePeer::MILESTONE_BUDGET_ID, $this->getId());

				MilestonePeer::addSelectColumns($criteria);
				if (!isset($this->lastMilestoneRelatedByMilestoneBudgetIdCriteria) || !$this->lastMilestoneRelatedByMilestoneBudgetIdCriteria->equals($criteria)) {
					$this->collMilestonesRelatedByMilestoneBudgetId = MilestonePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastMilestoneRelatedByMilestoneBudgetIdCriteria = $criteria;
		return $this->collMilestonesRelatedByMilestoneBudgetId;
	}

	
	public function countMilestonesRelatedByMilestoneBudgetId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseMilestonePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(MilestonePeer::MILESTONE_BUDGET_ID, $this->getId());

		return MilestonePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMilestoneRelatedByMilestoneBudgetId(Milestone $l)
	{
		$this->collMilestonesRelatedByMilestoneBudgetId[] = $l;
		$l->setBudgetRelatedByMilestoneBudgetId($this);
	}


	
	public function getMilestonesRelatedByMilestoneBudgetIdJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMilestonePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMilestonesRelatedByMilestoneBudgetId === null) {
			if ($this->isNew()) {
				$this->collMilestonesRelatedByMilestoneBudgetId = array();
			} else {

				$criteria->add(MilestonePeer::MILESTONE_BUDGET_ID, $this->getId());

				$this->collMilestonesRelatedByMilestoneBudgetId = MilestonePeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(MilestonePeer::MILESTONE_BUDGET_ID, $this->getId());

			if (!isset($this->lastMilestoneRelatedByMilestoneBudgetIdCriteria) || !$this->lastMilestoneRelatedByMilestoneBudgetIdCriteria->equals($criteria)) {
				$this->collMilestonesRelatedByMilestoneBudgetId = MilestonePeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		}
		$this->lastMilestoneRelatedByMilestoneBudgetIdCriteria = $criteria;

		return $this->collMilestonesRelatedByMilestoneBudgetId;
	}


	
	public function getMilestonesRelatedByMilestoneBudgetIdJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMilestonePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMilestonesRelatedByMilestoneBudgetId === null) {
			if ($this->isNew()) {
				$this->collMilestonesRelatedByMilestoneBudgetId = array();
			} else {

				$criteria->add(MilestonePeer::MILESTONE_BUDGET_ID, $this->getId());

				$this->collMilestonesRelatedByMilestoneBudgetId = MilestonePeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(MilestonePeer::MILESTONE_BUDGET_ID, $this->getId());

			if (!isset($this->lastMilestoneRelatedByMilestoneBudgetIdCriteria) || !$this->lastMilestoneRelatedByMilestoneBudgetIdCriteria->equals($criteria)) {
				$this->collMilestonesRelatedByMilestoneBudgetId = MilestonePeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		}
		$this->lastMilestoneRelatedByMilestoneBudgetIdCriteria = $criteria;

		return $this->collMilestonesRelatedByMilestoneBudgetId;
	}


	
	public function getMilestonesRelatedByMilestoneBudgetIdJoinsfGuardUserRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMilestonePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMilestonesRelatedByMilestoneBudgetId === null) {
			if ($this->isNew()) {
				$this->collMilestonesRelatedByMilestoneBudgetId = array();
			} else {

				$criteria->add(MilestonePeer::MILESTONE_BUDGET_ID, $this->getId());

				$this->collMilestonesRelatedByMilestoneBudgetId = MilestonePeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(MilestonePeer::MILESTONE_BUDGET_ID, $this->getId());

			if (!isset($this->lastMilestoneRelatedByMilestoneBudgetIdCriteria) || !$this->lastMilestoneRelatedByMilestoneBudgetIdCriteria->equals($criteria)) {
				$this->collMilestonesRelatedByMilestoneBudgetId = MilestonePeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		}
		$this->lastMilestoneRelatedByMilestoneBudgetIdCriteria = $criteria;

		return $this->collMilestonesRelatedByMilestoneBudgetId;
	}

	
	public function initTasks()
	{
		if ($this->collTasks === null) {
			$this->collTasks = array();
		}
	}

	
	public function getTasks($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasks === null) {
			if ($this->isNew()) {
			   $this->collTasks = array();
			} else {

				$criteria->add(TaskPeer::TASK_BUDGET_ID, $this->getId());

				TaskPeer::addSelectColumns($criteria);
				$this->collTasks = TaskPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TaskPeer::TASK_BUDGET_ID, $this->getId());

				TaskPeer::addSelectColumns($criteria);
				if (!isset($this->lastTaskCriteria) || !$this->lastTaskCriteria->equals($criteria)) {
					$this->collTasks = TaskPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastTaskCriteria = $criteria;
		return $this->collTasks;
	}

	
	public function countTasks($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(TaskPeer::TASK_BUDGET_ID, $this->getId());

		return TaskPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTask(Task $l)
	{
		$this->collTasks[] = $l;
		$l->setBudget($this);
	}


	
	public function getTasksJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasks === null) {
			if ($this->isNew()) {
				$this->collTasks = array();
			} else {

				$criteria->add(TaskPeer::TASK_BUDGET_ID, $this->getId());

				$this->collTasks = TaskPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::TASK_BUDGET_ID, $this->getId());

			if (!isset($this->lastTaskCriteria) || !$this->lastTaskCriteria->equals($criteria)) {
				$this->collTasks = TaskPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		}
		$this->lastTaskCriteria = $criteria;

		return $this->collTasks;
	}


	
	public function getTasksJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasks === null) {
			if ($this->isNew()) {
				$this->collTasks = array();
			} else {

				$criteria->add(TaskPeer::TASK_BUDGET_ID, $this->getId());

				$this->collTasks = TaskPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::TASK_BUDGET_ID, $this->getId());

			if (!isset($this->lastTaskCriteria) || !$this->lastTaskCriteria->equals($criteria)) {
				$this->collTasks = TaskPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		}
		$this->lastTaskCriteria = $criteria;

		return $this->collTasks;
	}


	
	public function getTasksJoinsfGuardUserRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasks === null) {
			if ($this->isNew()) {
				$this->collTasks = array();
			} else {

				$criteria->add(TaskPeer::TASK_BUDGET_ID, $this->getId());

				$this->collTasks = TaskPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::TASK_BUDGET_ID, $this->getId());

			if (!isset($this->lastTaskCriteria) || !$this->lastTaskCriteria->equals($criteria)) {
				$this->collTasks = TaskPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		}
		$this->lastTaskCriteria = $criteria;

		return $this->collTasks;
	}


	
	public function getTasksJoinTaskPriority($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasks === null) {
			if ($this->isNew()) {
				$this->collTasks = array();
			} else {

				$criteria->add(TaskPeer::TASK_BUDGET_ID, $this->getId());

				$this->collTasks = TaskPeer::doSelectJoinTaskPriority($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::TASK_BUDGET_ID, $this->getId());

			if (!isset($this->lastTaskCriteria) || !$this->lastTaskCriteria->equals($criteria)) {
				$this->collTasks = TaskPeer::doSelectJoinTaskPriority($criteria, $con);
			}
		}
		$this->lastTaskCriteria = $criteria;

		return $this->collTasks;
	}


	
	public function getTasksJoinMilestone($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasks === null) {
			if ($this->isNew()) {
				$this->collTasks = array();
			} else {

				$criteria->add(TaskPeer::TASK_BUDGET_ID, $this->getId());

				$this->collTasks = TaskPeer::doSelectJoinMilestone($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::TASK_BUDGET_ID, $this->getId());

			if (!isset($this->lastTaskCriteria) || !$this->lastTaskCriteria->equals($criteria)) {
				$this->collTasks = TaskPeer::doSelectJoinMilestone($criteria, $con);
			}
		}
		$this->lastTaskCriteria = $criteria;

		return $this->collTasks;
	}


	
	public function getTasksJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasks === null) {
			if ($this->isNew()) {
				$this->collTasks = array();
			} else {

				$criteria->add(TaskPeer::TASK_BUDGET_ID, $this->getId());

				$this->collTasks = TaskPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::TASK_BUDGET_ID, $this->getId());

			if (!isset($this->lastTaskCriteria) || !$this->lastTaskCriteria->equals($criteria)) {
				$this->collTasks = TaskPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastTaskCriteria = $criteria;

		return $this->collTasks;
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

				$criteria->add(InvoicePeer::INVOICE_BUDGET_ID, $this->getId());

				InvoicePeer::addSelectColumns($criteria);
				$this->collInvoices = InvoicePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InvoicePeer::INVOICE_BUDGET_ID, $this->getId());

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

		$criteria->add(InvoicePeer::INVOICE_BUDGET_ID, $this->getId());

		return InvoicePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInvoice(Invoice $l)
	{
		$this->collInvoices[] = $l;
		$l->setBudget($this);
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

				$criteria->add(InvoicePeer::INVOICE_BUDGET_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinClient($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_BUDGET_ID, $this->getId());

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

				$criteria->add(InvoicePeer::INVOICE_BUDGET_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_BUDGET_ID, $this->getId());

			if (!isset($this->lastInvoiceCriteria) || !$this->lastInvoiceCriteria->equals($criteria)) {
				$this->collInvoices = InvoicePeer::doSelectJoinProject($criteria, $con);
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

				$criteria->add(InvoicePeer::INVOICE_BUDGET_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinInvoiceCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_BUDGET_ID, $this->getId());

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

				$criteria->add(InvoicePeer::INVOICE_BUDGET_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinKindOfInvoice($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_BUDGET_ID, $this->getId());

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

				$criteria->add(InvoicePeer::INVOICE_BUDGET_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinPaymentCondition($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_BUDGET_ID, $this->getId());

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

				$criteria->add(InvoicePeer::INVOICE_BUDGET_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_BUDGET_ID, $this->getId());

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

				$criteria->add(InvoicePeer::INVOICE_BUDGET_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinPaymentStatus($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_BUDGET_ID, $this->getId());

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

				$criteria->add(InvoicePeer::INVOICE_BUDGET_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_BUDGET_ID, $this->getId());

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

				$criteria->add(InvoicePeer::INVOICE_BUDGET_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_BUDGET_ID, $this->getId());

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

				$criteria->add(InvoicePeer::INVOICE_BUDGET_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_BUDGET_ID, $this->getId());

			if (!isset($this->lastInvoiceCriteria) || !$this->lastInvoiceCriteria->equals($criteria)) {
				$this->collInvoices = InvoicePeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		}
		$this->lastInvoiceCriteria = $criteria;

		return $this->collInvoices;
	}

	
	public function initBudgetItems()
	{
		if ($this->collBudgetItems === null) {
			$this->collBudgetItems = array();
		}
	}

	
	public function getBudgetItems($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgetItems === null) {
			if ($this->isNew()) {
			   $this->collBudgetItems = array();
			} else {

				$criteria->add(BudgetItemPeer::ITEM_BUDGET_ID, $this->getId());

				BudgetItemPeer::addSelectColumns($criteria);
				$this->collBudgetItems = BudgetItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(BudgetItemPeer::ITEM_BUDGET_ID, $this->getId());

				BudgetItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastBudgetItemCriteria) || !$this->lastBudgetItemCriteria->equals($criteria)) {
					$this->collBudgetItems = BudgetItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastBudgetItemCriteria = $criteria;
		return $this->collBudgetItems;
	}

	
	public function countBudgetItems($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(BudgetItemPeer::ITEM_BUDGET_ID, $this->getId());

		return BudgetItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addBudgetItem(BudgetItem $l)
	{
		$this->collBudgetItems[] = $l;
		$l->setBudget($this);
	}


	
	public function getBudgetItemsJoinTypeOfInvoiceItem($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgetItems === null) {
			if ($this->isNew()) {
				$this->collBudgetItems = array();
			} else {

				$criteria->add(BudgetItemPeer::ITEM_BUDGET_ID, $this->getId());

				$this->collBudgetItems = BudgetItemPeer::doSelectJoinTypeOfInvoiceItem($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetItemPeer::ITEM_BUDGET_ID, $this->getId());

			if (!isset($this->lastBudgetItemCriteria) || !$this->lastBudgetItemCriteria->equals($criteria)) {
				$this->collBudgetItems = BudgetItemPeer::doSelectJoinTypeOfInvoiceItem($criteria, $con);
			}
		}
		$this->lastBudgetItemCriteria = $criteria;

		return $this->collBudgetItems;
	}


	
	public function getBudgetItemsJoinTypeOfHour($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgetItems === null) {
			if ($this->isNew()) {
				$this->collBudgetItems = array();
			} else {

				$criteria->add(BudgetItemPeer::ITEM_BUDGET_ID, $this->getId());

				$this->collBudgetItems = BudgetItemPeer::doSelectJoinTypeOfHour($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetItemPeer::ITEM_BUDGET_ID, $this->getId());

			if (!isset($this->lastBudgetItemCriteria) || !$this->lastBudgetItemCriteria->equals($criteria)) {
				$this->collBudgetItems = BudgetItemPeer::doSelectJoinTypeOfHour($criteria, $con);
			}
		}
		$this->lastBudgetItemCriteria = $criteria;

		return $this->collBudgetItems;
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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, $this->getId());

				ExpenseItemPeer::addSelectColumns($criteria);
				$this->collExpenseItems = ExpenseItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, $this->getId());

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

		$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, $this->getId());

		return ExpenseItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addExpenseItem(ExpenseItem $l)
	{
		$this->collExpenseItems[] = $l;
		$l->setBudget($this);
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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByExpensePurchaseBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, $this->getId());

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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastExpenseItemCriteria = $criteria;

		return $this->collExpenseItems;
	}


	
	public function getExpenseItemsJoinVendor($criteria = null, $con = null)
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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinVendor($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinVendor($criteria, $con);
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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByExpenseValidateBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, $this->getId());

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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, $this->getId());

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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, $this->getId());

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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, $this->getId());

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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinExpenseCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, $this->getId());

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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, $this->getId());

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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinReimbursement($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinReimbursement($criteria, $con);
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

				$criteria->add(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, $this->getId());

				IncomeItemPeer::addSelectColumns($criteria);
				$this->collIncomeItems = IncomeItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, $this->getId());

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

		$criteria->add(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, $this->getId());

		return IncomeItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addIncomeItem(IncomeItem $l)
	{
		$this->collIncomeItems[] = $l;
		$l->setBudget($this);
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

				$criteria->add(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, $this->getId());

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

				$criteria->add(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, $this->getId());

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

				$criteria->add(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, $this->getId());

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

				$criteria->add(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinIncomeCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, $this->getId());

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

				$criteria->add(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, $this->getId());

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

				$criteria->add(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinReimbursement($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, $this->getId());

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

				$criteria->add(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, $this->getId());

			if (!isset($this->lastIncomeItemCriteria) || !$this->lastIncomeItemCriteria->equals($criteria)) {
				$this->collIncomeItems = IncomeItemPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastIncomeItemCriteria = $criteria;

		return $this->collIncomeItems;
	}


	
	public function getIncomeItemsJoinVendor($criteria = null, $con = null)
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

				$criteria->add(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinVendor($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, $this->getId());

			if (!isset($this->lastIncomeItemCriteria) || !$this->lastIncomeItemCriteria->equals($criteria)) {
				$this->collIncomeItems = IncomeItemPeer::doSelectJoinVendor($criteria, $con);
			}
		}
		$this->lastIncomeItemCriteria = $criteria;

		return $this->collIncomeItems;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseBudget:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseBudget::%s', $method));
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
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, 'Budget');
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
                $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, 'Budget');
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
            $object->setObjectcontactObjectClass('Budget');
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
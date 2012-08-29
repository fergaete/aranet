<?php


abstract class BaseProject extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $project_prefix;


	
	protected $project_number;


	
	protected $project_name;


	
	protected $project_url;


	
	protected $project_client_id = 0;


	
	protected $project_comments;


	
	protected $project_category_id = 0;


	
	protected $project_start_date;


	
	protected $project_finish_date;


	
	protected $project_status_id = 0;


	
	protected $created_at;


	
	protected $created_by = 0;


	
	protected $updated_at;


	
	protected $updated_by = 0;


	
	protected $deleted_at;


	
	protected $deleted_by = 0;

	
	protected $aClient;

	
	protected $aProjectCategory;

	
	protected $aProjectStatus;

	
	protected $asfGuardUserRelatedByCreatedBy;

	
	protected $asfGuardUserRelatedByUpdatedBy;

	
	protected $asfGuardUserRelatedByDeletedBy;

	
	protected $collTimesheets;

	
	protected $lastTimesheetCriteria = null;

	
	protected $collTasks;

	
	protected $lastTaskCriteria = null;

	
	protected $collInvoices;

	
	protected $lastInvoiceCriteria = null;

	
	protected $collBudgets;

	
	protected $lastBudgetCriteria = null;

	
	protected $collExpenseItems;

	
	protected $lastExpenseItemCriteria = null;

	
	protected $collIncomeItems;

	
	protected $lastIncomeItemCriteria = null;

	
	protected $collNotifications;

	
	protected $lastNotificationCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  protected $collContacts;

  
  protected $collDefaultContact;

  
  protected $collObjectContacts;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getProjectPrefix()
	{

		return $this->project_prefix;
	}

	
	public function getProjectNumber()
	{

		return $this->project_number;
	}

	
	public function getProjectName()
	{

		return $this->project_name;
	}

	
	public function getProjectUrl()
	{

		return $this->project_url;
	}

	
	public function getProjectClientId()
	{

		return $this->project_client_id;
	}

	
	public function getProjectComments()
	{

		return $this->project_comments;
	}

	
	public function getProjectCategoryId()
	{

		return $this->project_category_id;
	}

	
	public function getProjectStartDate($format = 'Y-m-d')
	{

		if ($this->project_start_date === null || $this->project_start_date === '') {
			return null;
		} elseif (!is_int($this->project_start_date)) {
						$ts = strtotime($this->project_start_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [project_start_date] as date/time value: " . var_export($this->project_start_date, true));
			}
		} else {
			$ts = $this->project_start_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getProjectFinishDate($format = 'Y-m-d')
	{

		if ($this->project_finish_date === null || $this->project_finish_date === '') {
			return null;
		} elseif (!is_int($this->project_finish_date)) {
						$ts = strtotime($this->project_finish_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [project_finish_date] as date/time value: " . var_export($this->project_finish_date, true));
			}
		} else {
			$ts = $this->project_finish_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getProjectStatusId()
	{

		return $this->project_status_id;
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
			$this->modifiedColumns[] = ProjectPeer::ID;
		}

	} 
	
	public function setProjectPrefix($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->project_prefix !== $v) {
			$this->project_prefix = $v;
			$this->modifiedColumns[] = ProjectPeer::PROJECT_PREFIX;
		}

	} 
	
	public function setProjectNumber($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->project_number !== $v) {
			$this->project_number = $v;
			$this->modifiedColumns[] = ProjectPeer::PROJECT_NUMBER;
		}

	} 
	
	public function setProjectName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->project_name !== $v) {
			$this->project_name = $v;
			$this->modifiedColumns[] = ProjectPeer::PROJECT_NAME;
		}

	} 
	
	public function setProjectUrl($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->project_url !== $v) {
			$this->project_url = $v;
			$this->modifiedColumns[] = ProjectPeer::PROJECT_URL;
		}

	} 
	
	public function setProjectClientId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->project_client_id !== $v || $v === 0) {
			$this->project_client_id = $v;
			$this->modifiedColumns[] = ProjectPeer::PROJECT_CLIENT_ID;
		}

		if ($this->aClient !== null && $this->aClient->getId() !== $v) {
			$this->aClient = null;
		}

	} 
	
	public function setProjectComments($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->project_comments !== $v) {
			$this->project_comments = $v;
			$this->modifiedColumns[] = ProjectPeer::PROJECT_COMMENTS;
		}

	} 
	
	public function setProjectCategoryId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->project_category_id !== $v || $v === 0) {
			$this->project_category_id = $v;
			$this->modifiedColumns[] = ProjectPeer::PROJECT_CATEGORY_ID;
		}

		if ($this->aProjectCategory !== null && $this->aProjectCategory->getId() !== $v) {
			$this->aProjectCategory = null;
		}

	} 
	
	public function setProjectStartDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [project_start_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->project_start_date !== $ts) {
			$this->project_start_date = $ts;
			$this->modifiedColumns[] = ProjectPeer::PROJECT_START_DATE;
		}

	} 
	
	public function setProjectFinishDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [project_finish_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->project_finish_date !== $ts) {
			$this->project_finish_date = $ts;
			$this->modifiedColumns[] = ProjectPeer::PROJECT_FINISH_DATE;
		}

	} 
	
	public function setProjectStatusId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->project_status_id !== $v || $v === 0) {
			$this->project_status_id = $v;
			$this->modifiedColumns[] = ProjectPeer::PROJECT_STATUS_ID;
		}

		if ($this->aProjectStatus !== null && $this->aProjectStatus->getId() !== $v) {
			$this->aProjectStatus = null;
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
			$this->modifiedColumns[] = ProjectPeer::CREATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v || $v === 0) {
			$this->created_by = $v;
			$this->modifiedColumns[] = ProjectPeer::CREATED_BY;
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
			$this->modifiedColumns[] = ProjectPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v || $v === 0) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = ProjectPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = ProjectPeer::DELETED_AT;
		}

	} 
	
	public function setDeletedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->deleted_by !== $v || $v === 0) {
			$this->deleted_by = $v;
			$this->modifiedColumns[] = ProjectPeer::DELETED_BY;
		}

		if ($this->asfGuardUserRelatedByDeletedBy !== null && $this->asfGuardUserRelatedByDeletedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByDeletedBy = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->project_prefix = $rs->getString($startcol + 1);

			$this->project_number = $rs->getString($startcol + 2);

			$this->project_name = $rs->getString($startcol + 3);

			$this->project_url = $rs->getString($startcol + 4);

			$this->project_client_id = $rs->getInt($startcol + 5);

			$this->project_comments = $rs->getString($startcol + 6);

			$this->project_category_id = $rs->getInt($startcol + 7);

			$this->project_start_date = $rs->getDate($startcol + 8, null);

			$this->project_finish_date = $rs->getDate($startcol + 9, null);

			$this->project_status_id = $rs->getInt($startcol + 10);

			$this->created_at = $rs->getTimestamp($startcol + 11, null);

			$this->created_by = $rs->getInt($startcol + 12);

			$this->updated_at = $rs->getTimestamp($startcol + 13, null);

			$this->updated_by = $rs->getInt($startcol + 14);

			$this->deleted_at = $rs->getTimestamp($startcol + 15, null);

			$this->deleted_by = $rs->getInt($startcol + 16);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 17; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Project object", $e);
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
                

    foreach (sfMixer::getCallables('BaseProject:delete:pre') as $callable)
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
			$con = Propel::getConnection(ProjectPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ProjectPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseProject:delete:post') as $callable)
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
                

    foreach (sfMixer::getCallables('BaseProject:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(ProjectPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(ProjectPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ProjectPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseProject:save:post') as $callable)
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

			if ($this->aProjectCategory !== null) {
				if ($this->aProjectCategory->isModified()) {
					$affectedRows += $this->aProjectCategory->save($con);
				}
				$this->setProjectCategory($this->aProjectCategory);
			}

			if ($this->aProjectStatus !== null) {
				if ($this->aProjectStatus->isModified()) {
					$affectedRows += $this->aProjectStatus->save($con);
				}
				$this->setProjectStatus($this->aProjectStatus);
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
					$pk = ProjectPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ProjectPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collTimesheets !== null) {
				foreach($this->collTimesheets as $referrerFK) {
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

			if ($this->collBudgets !== null) {
				foreach($this->collBudgets as $referrerFK) {
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

			if ($this->collNotifications !== null) {
				foreach($this->collNotifications as $referrerFK) {
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

			if ($this->aProjectCategory !== null) {
				if (!$this->aProjectCategory->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProjectCategory->getValidationFailures());
				}
			}

			if ($this->aProjectStatus !== null) {
				if (!$this->aProjectStatus->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProjectStatus->getValidationFailures());
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


			if (($retval = ProjectPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collTimesheets !== null) {
					foreach($this->collTimesheets as $referrerFK) {
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

				if ($this->collBudgets !== null) {
					foreach($this->collBudgets as $referrerFK) {
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

				if ($this->collNotifications !== null) {
					foreach($this->collNotifications as $referrerFK) {
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
		$pos = ProjectPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getProjectPrefix();
				break;
			case 2:
				return $this->getProjectNumber();
				break;
			case 3:
				return $this->getProjectName();
				break;
			case 4:
				return $this->getProjectUrl();
				break;
			case 5:
				return $this->getProjectClientId();
				break;
			case 6:
				return $this->getProjectComments();
				break;
			case 7:
				return $this->getProjectCategoryId();
				break;
			case 8:
				return $this->getProjectStartDate();
				break;
			case 9:
				return $this->getProjectFinishDate();
				break;
			case 10:
				return $this->getProjectStatusId();
				break;
			case 11:
				return $this->getCreatedAt();
				break;
			case 12:
				return $this->getCreatedBy();
				break;
			case 13:
				return $this->getUpdatedAt();
				break;
			case 14:
				return $this->getUpdatedBy();
				break;
			case 15:
				return $this->getDeletedAt();
				break;
			case 16:
				return $this->getDeletedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ProjectPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getProjectPrefix(),
			$keys[2] => $this->getProjectNumber(),
			$keys[3] => $this->getProjectName(),
			$keys[4] => $this->getProjectUrl(),
			$keys[5] => $this->getProjectClientId(),
			$keys[6] => $this->getProjectComments(),
			$keys[7] => $this->getProjectCategoryId(),
			$keys[8] => $this->getProjectStartDate(),
			$keys[9] => $this->getProjectFinishDate(),
			$keys[10] => $this->getProjectStatusId(),
			$keys[11] => $this->getCreatedAt(),
			$keys[12] => $this->getCreatedBy(),
			$keys[13] => $this->getUpdatedAt(),
			$keys[14] => $this->getUpdatedBy(),
			$keys[15] => $this->getDeletedAt(),
			$keys[16] => $this->getDeletedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ProjectPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setProjectPrefix($value);
				break;
			case 2:
				$this->setProjectNumber($value);
				break;
			case 3:
				$this->setProjectName($value);
				break;
			case 4:
				$this->setProjectUrl($value);
				break;
			case 5:
				$this->setProjectClientId($value);
				break;
			case 6:
				$this->setProjectComments($value);
				break;
			case 7:
				$this->setProjectCategoryId($value);
				break;
			case 8:
				$this->setProjectStartDate($value);
				break;
			case 9:
				$this->setProjectFinishDate($value);
				break;
			case 10:
				$this->setProjectStatusId($value);
				break;
			case 11:
				$this->setCreatedAt($value);
				break;
			case 12:
				$this->setCreatedBy($value);
				break;
			case 13:
				$this->setUpdatedAt($value);
				break;
			case 14:
				$this->setUpdatedBy($value);
				break;
			case 15:
				$this->setDeletedAt($value);
				break;
			case 16:
				$this->setDeletedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ProjectPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setProjectPrefix($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setProjectNumber($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setProjectName($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setProjectUrl($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setProjectClientId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setProjectComments($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setProjectCategoryId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setProjectStartDate($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setProjectFinishDate($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setProjectStatusId($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCreatedAt($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCreatedBy($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setUpdatedAt($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setUpdatedBy($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDeletedAt($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setDeletedBy($arr[$keys[16]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ProjectPeer::DATABASE_NAME);

		if ($this->isColumnModified(ProjectPeer::ID)) $criteria->add(ProjectPeer::ID, $this->id);
		if ($this->isColumnModified(ProjectPeer::PROJECT_PREFIX)) $criteria->add(ProjectPeer::PROJECT_PREFIX, $this->project_prefix);
		if ($this->isColumnModified(ProjectPeer::PROJECT_NUMBER)) $criteria->add(ProjectPeer::PROJECT_NUMBER, $this->project_number);
		if ($this->isColumnModified(ProjectPeer::PROJECT_NAME)) $criteria->add(ProjectPeer::PROJECT_NAME, $this->project_name);
		if ($this->isColumnModified(ProjectPeer::PROJECT_URL)) $criteria->add(ProjectPeer::PROJECT_URL, $this->project_url);
		if ($this->isColumnModified(ProjectPeer::PROJECT_CLIENT_ID)) $criteria->add(ProjectPeer::PROJECT_CLIENT_ID, $this->project_client_id);
		if ($this->isColumnModified(ProjectPeer::PROJECT_COMMENTS)) $criteria->add(ProjectPeer::PROJECT_COMMENTS, $this->project_comments);
		if ($this->isColumnModified(ProjectPeer::PROJECT_CATEGORY_ID)) $criteria->add(ProjectPeer::PROJECT_CATEGORY_ID, $this->project_category_id);
		if ($this->isColumnModified(ProjectPeer::PROJECT_START_DATE)) $criteria->add(ProjectPeer::PROJECT_START_DATE, $this->project_start_date);
		if ($this->isColumnModified(ProjectPeer::PROJECT_FINISH_DATE)) $criteria->add(ProjectPeer::PROJECT_FINISH_DATE, $this->project_finish_date);
		if ($this->isColumnModified(ProjectPeer::PROJECT_STATUS_ID)) $criteria->add(ProjectPeer::PROJECT_STATUS_ID, $this->project_status_id);
		if ($this->isColumnModified(ProjectPeer::CREATED_AT)) $criteria->add(ProjectPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(ProjectPeer::CREATED_BY)) $criteria->add(ProjectPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(ProjectPeer::UPDATED_AT)) $criteria->add(ProjectPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(ProjectPeer::UPDATED_BY)) $criteria->add(ProjectPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(ProjectPeer::DELETED_AT)) $criteria->add(ProjectPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(ProjectPeer::DELETED_BY)) $criteria->add(ProjectPeer::DELETED_BY, $this->deleted_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ProjectPeer::DATABASE_NAME);

		$criteria->add(ProjectPeer::ID, $this->id);

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

		$copyObj->setProjectPrefix($this->project_prefix);

		$copyObj->setProjectNumber($this->project_number);

		$copyObj->setProjectName($this->project_name);

		$copyObj->setProjectUrl($this->project_url);

		$copyObj->setProjectClientId($this->project_client_id);

		$copyObj->setProjectComments($this->project_comments);

		$copyObj->setProjectCategoryId($this->project_category_id);

		$copyObj->setProjectStartDate($this->project_start_date);

		$copyObj->setProjectFinishDate($this->project_finish_date);

		$copyObj->setProjectStatusId($this->project_status_id);

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

			foreach($this->getTasks() as $relObj) {
				$copyObj->addTask($relObj->copy($deepCopy));
			}

			foreach($this->getInvoices() as $relObj) {
				$copyObj->addInvoice($relObj->copy($deepCopy));
			}

			foreach($this->getBudgets() as $relObj) {
				$copyObj->addBudget($relObj->copy($deepCopy));
			}

			foreach($this->getExpenseItems() as $relObj) {
				$copyObj->addExpenseItem($relObj->copy($deepCopy));
			}

			foreach($this->getIncomeItems() as $relObj) {
				$copyObj->addIncomeItem($relObj->copy($deepCopy));
			}

			foreach($this->getNotifications() as $relObj) {
				$copyObj->addNotification($relObj->copy($deepCopy));
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
			self::$peer = new ProjectPeer();
		}
		return self::$peer;
	}

	
	public function setClient($v)
	{


		if ($v === null) {
			$this->setProjectClientId('null');
		} else {
			$this->setProjectClientId($v->getId());
		}


		$this->aClient = $v;
	}


	
	public function getClient($con = null)
	{
		if ($this->aClient === null && ($this->project_client_id !== null)) {
						include_once 'lib/model/om/BaseClientPeer.php';

			$this->aClient = ClientPeer::retrieveByPK($this->project_client_id, $con);

			
		}
		return $this->aClient;
	}

	
	public function setProjectCategory($v)
	{


		if ($v === null) {
			$this->setProjectCategoryId('null');
		} else {
			$this->setProjectCategoryId($v->getId());
		}


		$this->aProjectCategory = $v;
	}


	
	public function getProjectCategory($con = null)
	{
		if ($this->aProjectCategory === null && ($this->project_category_id !== null)) {
						include_once 'lib/model/om/BaseProjectCategoryPeer.php';

			$this->aProjectCategory = ProjectCategoryPeer::retrieveByPK($this->project_category_id, $con);

			
		}
		return $this->aProjectCategory;
	}

	
	public function setProjectStatus($v)
	{


		if ($v === null) {
			$this->setProjectStatusId('null');
		} else {
			$this->setProjectStatusId($v->getId());
		}


		$this->aProjectStatus = $v;
	}


	
	public function getProjectStatus($con = null)
	{
		if ($this->aProjectStatus === null && ($this->project_status_id !== null)) {
						include_once 'lib/model/om/BaseProjectStatusPeer.php';

			$this->aProjectStatus = ProjectStatusPeer::retrieveByPK($this->project_status_id, $con);

			
		}
		return $this->aProjectStatus;
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

				$criteria->add(TimesheetPeer::TIMESHEET_PROJECT_ID, $this->getId());

				TimesheetPeer::addSelectColumns($criteria);
				$this->collTimesheets = TimesheetPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TimesheetPeer::TIMESHEET_PROJECT_ID, $this->getId());

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

		$criteria->add(TimesheetPeer::TIMESHEET_PROJECT_ID, $this->getId());

		return TimesheetPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTimesheet(Timesheet $l)
	{
		$this->collTimesheets[] = $l;
		$l->setProject($this);
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

				$criteria->add(TimesheetPeer::TIMESHEET_PROJECT_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinMilestone($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_PROJECT_ID, $this->getId());

			if (!isset($this->lastTimesheetCriteria) || !$this->lastTimesheetCriteria->equals($criteria)) {
				$this->collTimesheets = TimesheetPeer::doSelectJoinMilestone($criteria, $con);
			}
		}
		$this->lastTimesheetCriteria = $criteria;

		return $this->collTimesheets;
	}


	
	public function getTimesheetsJoinBudget($criteria = null, $con = null)
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

				$criteria->add(TimesheetPeer::TIMESHEET_PROJECT_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_PROJECT_ID, $this->getId());

			if (!isset($this->lastTimesheetCriteria) || !$this->lastTimesheetCriteria->equals($criteria)) {
				$this->collTimesheets = TimesheetPeer::doSelectJoinBudget($criteria, $con);
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

				$criteria->add(TimesheetPeer::TIMESHEET_PROJECT_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinTask($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_PROJECT_ID, $this->getId());

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

				$criteria->add(TimesheetPeer::TIMESHEET_PROJECT_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_PROJECT_ID, $this->getId());

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

				$criteria->add(TimesheetPeer::TIMESHEET_PROJECT_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinTypeOfHour($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_PROJECT_ID, $this->getId());

			if (!isset($this->lastTimesheetCriteria) || !$this->lastTimesheetCriteria->equals($criteria)) {
				$this->collTimesheets = TimesheetPeer::doSelectJoinTypeOfHour($criteria, $con);
			}
		}
		$this->lastTimesheetCriteria = $criteria;

		return $this->collTimesheets;
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

				$criteria->add(TaskPeer::TASK_PROJECT_ID, $this->getId());

				TaskPeer::addSelectColumns($criteria);
				$this->collTasks = TaskPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TaskPeer::TASK_PROJECT_ID, $this->getId());

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

		$criteria->add(TaskPeer::TASK_PROJECT_ID, $this->getId());

		return TaskPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTask(Task $l)
	{
		$this->collTasks[] = $l;
		$l->setProject($this);
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

				$criteria->add(TaskPeer::TASK_PROJECT_ID, $this->getId());

				$this->collTasks = TaskPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::TASK_PROJECT_ID, $this->getId());

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

				$criteria->add(TaskPeer::TASK_PROJECT_ID, $this->getId());

				$this->collTasks = TaskPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::TASK_PROJECT_ID, $this->getId());

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

				$criteria->add(TaskPeer::TASK_PROJECT_ID, $this->getId());

				$this->collTasks = TaskPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::TASK_PROJECT_ID, $this->getId());

			if (!isset($this->lastTaskCriteria) || !$this->lastTaskCriteria->equals($criteria)) {
				$this->collTasks = TaskPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		}
		$this->lastTaskCriteria = $criteria;

		return $this->collTasks;
	}


	
	public function getTasksJoinBudget($criteria = null, $con = null)
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

				$criteria->add(TaskPeer::TASK_PROJECT_ID, $this->getId());

				$this->collTasks = TaskPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::TASK_PROJECT_ID, $this->getId());

			if (!isset($this->lastTaskCriteria) || !$this->lastTaskCriteria->equals($criteria)) {
				$this->collTasks = TaskPeer::doSelectJoinBudget($criteria, $con);
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

				$criteria->add(TaskPeer::TASK_PROJECT_ID, $this->getId());

				$this->collTasks = TaskPeer::doSelectJoinTaskPriority($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::TASK_PROJECT_ID, $this->getId());

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

				$criteria->add(TaskPeer::TASK_PROJECT_ID, $this->getId());

				$this->collTasks = TaskPeer::doSelectJoinMilestone($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::TASK_PROJECT_ID, $this->getId());

			if (!isset($this->lastTaskCriteria) || !$this->lastTaskCriteria->equals($criteria)) {
				$this->collTasks = TaskPeer::doSelectJoinMilestone($criteria, $con);
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

				$criteria->add(InvoicePeer::INVOICE_PROJECT_ID, $this->getId());

				InvoicePeer::addSelectColumns($criteria);
				$this->collInvoices = InvoicePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InvoicePeer::INVOICE_PROJECT_ID, $this->getId());

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

		$criteria->add(InvoicePeer::INVOICE_PROJECT_ID, $this->getId());

		return InvoicePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInvoice(Invoice $l)
	{
		$this->collInvoices[] = $l;
		$l->setProject($this);
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

				$criteria->add(InvoicePeer::INVOICE_PROJECT_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinClient($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_PROJECT_ID, $this->getId());

			if (!isset($this->lastInvoiceCriteria) || !$this->lastInvoiceCriteria->equals($criteria)) {
				$this->collInvoices = InvoicePeer::doSelectJoinClient($criteria, $con);
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

				$criteria->add(InvoicePeer::INVOICE_PROJECT_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_PROJECT_ID, $this->getId());

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

				$criteria->add(InvoicePeer::INVOICE_PROJECT_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinInvoiceCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_PROJECT_ID, $this->getId());

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

				$criteria->add(InvoicePeer::INVOICE_PROJECT_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinKindOfInvoice($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_PROJECT_ID, $this->getId());

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

				$criteria->add(InvoicePeer::INVOICE_PROJECT_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinPaymentCondition($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_PROJECT_ID, $this->getId());

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

				$criteria->add(InvoicePeer::INVOICE_PROJECT_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_PROJECT_ID, $this->getId());

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

				$criteria->add(InvoicePeer::INVOICE_PROJECT_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinPaymentStatus($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_PROJECT_ID, $this->getId());

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

				$criteria->add(InvoicePeer::INVOICE_PROJECT_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_PROJECT_ID, $this->getId());

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

				$criteria->add(InvoicePeer::INVOICE_PROJECT_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_PROJECT_ID, $this->getId());

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

				$criteria->add(InvoicePeer::INVOICE_PROJECT_ID, $this->getId());

				$this->collInvoices = InvoicePeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::INVOICE_PROJECT_ID, $this->getId());

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

				$criteria->add(BudgetPeer::BUDGET_PROJECT_ID, $this->getId());

				BudgetPeer::addSelectColumns($criteria);
				$this->collBudgets = BudgetPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(BudgetPeer::BUDGET_PROJECT_ID, $this->getId());

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

		$criteria->add(BudgetPeer::BUDGET_PROJECT_ID, $this->getId());

		return BudgetPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addBudget(Budget $l)
	{
		$this->collBudgets[] = $l;
		$l->setProject($this);
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

				$criteria->add(BudgetPeer::BUDGET_PROJECT_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinBudgetStatus($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_PROJECT_ID, $this->getId());

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

				$criteria->add(BudgetPeer::BUDGET_PROJECT_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_PROJECT_ID, $this->getId());

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

				$criteria->add(BudgetPeer::BUDGET_PROJECT_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_PROJECT_ID, $this->getId());

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

				$criteria->add(BudgetPeer::BUDGET_PROJECT_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_PROJECT_ID, $this->getId());

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

				$criteria->add(BudgetPeer::BUDGET_PROJECT_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinPaymentCondition($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_PROJECT_ID, $this->getId());

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

				$criteria->add(BudgetPeer::BUDGET_PROJECT_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinInvoiceCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_PROJECT_ID, $this->getId());

			if (!isset($this->lastBudgetCriteria) || !$this->lastBudgetCriteria->equals($criteria)) {
				$this->collBudgets = BudgetPeer::doSelectJoinInvoiceCategory($criteria, $con);
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

				$criteria->add(BudgetPeer::BUDGET_PROJECT_ID, $this->getId());

				$this->collBudgets = BudgetPeer::doSelectJoinClient($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::BUDGET_PROJECT_ID, $this->getId());

			if (!isset($this->lastBudgetCriteria) || !$this->lastBudgetCriteria->equals($criteria)) {
				$this->collBudgets = BudgetPeer::doSelectJoinClient($criteria, $con);
			}
		}
		$this->lastBudgetCriteria = $criteria;

		return $this->collBudgets;
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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, $this->getId());

				ExpenseItemPeer::addSelectColumns($criteria);
				$this->collExpenseItems = ExpenseItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, $this->getId());

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

		$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, $this->getId());

		return ExpenseItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addExpenseItem(ExpenseItem $l)
	{
		$this->collExpenseItems[] = $l;
		$l->setProject($this);
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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByExpensePurchaseBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, $this->getId());

			if (!isset($this->lastExpenseItemCriteria) || !$this->lastExpenseItemCriteria->equals($criteria)) {
				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByExpensePurchaseBy($criteria, $con);
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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinVendor($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, $this->getId());

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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByExpenseValidateBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, $this->getId());

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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, $this->getId());

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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, $this->getId());

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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, $this->getId());

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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinExpenseCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, $this->getId());

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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, $this->getId());

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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinReimbursement($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, $this->getId());

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

				$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, $this->getId());

				$this->collExpenseItems = ExpenseItemPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, $this->getId());

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

				$criteria->add(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, $this->getId());

				IncomeItemPeer::addSelectColumns($criteria);
				$this->collIncomeItems = IncomeItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, $this->getId());

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

		$criteria->add(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, $this->getId());

		return IncomeItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addIncomeItem(IncomeItem $l)
	{
		$this->collIncomeItems[] = $l;
		$l->setProject($this);
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

				$criteria->add(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, $this->getId());

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

				$criteria->add(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, $this->getId());

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

				$criteria->add(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, $this->getId());

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

				$criteria->add(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinIncomeCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, $this->getId());

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

				$criteria->add(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, $this->getId());

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

				$criteria->add(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinReimbursement($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, $this->getId());

			if (!isset($this->lastIncomeItemCriteria) || !$this->lastIncomeItemCriteria->equals($criteria)) {
				$this->collIncomeItems = IncomeItemPeer::doSelectJoinReimbursement($criteria, $con);
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

				$criteria->add(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, $this->getId());

			if (!isset($this->lastIncomeItemCriteria) || !$this->lastIncomeItemCriteria->equals($criteria)) {
				$this->collIncomeItems = IncomeItemPeer::doSelectJoinBudget($criteria, $con);
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

				$criteria->add(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, $this->getId());

				$this->collIncomeItems = IncomeItemPeer::doSelectJoinVendor($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, $this->getId());

			if (!isset($this->lastIncomeItemCriteria) || !$this->lastIncomeItemCriteria->equals($criteria)) {
				$this->collIncomeItems = IncomeItemPeer::doSelectJoinVendor($criteria, $con);
			}
		}
		$this->lastIncomeItemCriteria = $criteria;

		return $this->collIncomeItems;
	}

	
	public function initNotifications()
	{
		if ($this->collNotifications === null) {
			$this->collNotifications = array();
		}
	}

	
	public function getNotifications($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseNotificationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collNotifications === null) {
			if ($this->isNew()) {
			   $this->collNotifications = array();
			} else {

				$criteria->add(NotificationPeer::NOTIFICATION_PROJECT_ID, $this->getId());

				NotificationPeer::addSelectColumns($criteria);
				$this->collNotifications = NotificationPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(NotificationPeer::NOTIFICATION_PROJECT_ID, $this->getId());

				NotificationPeer::addSelectColumns($criteria);
				if (!isset($this->lastNotificationCriteria) || !$this->lastNotificationCriteria->equals($criteria)) {
					$this->collNotifications = NotificationPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastNotificationCriteria = $criteria;
		return $this->collNotifications;
	}

	
	public function countNotifications($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseNotificationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(NotificationPeer::NOTIFICATION_PROJECT_ID, $this->getId());

		return NotificationPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addNotification(Notification $l)
	{
		$this->collNotifications[] = $l;
		$l->setProject($this);
	}


	
	public function getNotificationsJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseNotificationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collNotifications === null) {
			if ($this->isNew()) {
				$this->collNotifications = array();
			} else {

				$criteria->add(NotificationPeer::NOTIFICATION_PROJECT_ID, $this->getId());

				$this->collNotifications = NotificationPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(NotificationPeer::NOTIFICATION_PROJECT_ID, $this->getId());

			if (!isset($this->lastNotificationCriteria) || !$this->lastNotificationCriteria->equals($criteria)) {
				$this->collNotifications = NotificationPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		}
		$this->lastNotificationCriteria = $criteria;

		return $this->collNotifications;
	}


	
	public function getNotificationsJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseNotificationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collNotifications === null) {
			if ($this->isNew()) {
				$this->collNotifications = array();
			} else {

				$criteria->add(NotificationPeer::NOTIFICATION_PROJECT_ID, $this->getId());

				$this->collNotifications = NotificationPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(NotificationPeer::NOTIFICATION_PROJECT_ID, $this->getId());

			if (!isset($this->lastNotificationCriteria) || !$this->lastNotificationCriteria->equals($criteria)) {
				$this->collNotifications = NotificationPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		}
		$this->lastNotificationCriteria = $criteria;

		return $this->collNotifications;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseProject:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseProject::%s', $method));
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
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, 'Project');
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
                $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, 'Project');
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
            $object->setObjectcontactObjectClass('Project');
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
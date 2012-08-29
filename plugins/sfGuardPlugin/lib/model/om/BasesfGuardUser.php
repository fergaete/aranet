<?php


abstract class BasesfGuardUser extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $username;


	
	protected $algorithm = 'sha1';


	
	protected $salt;


	
	protected $password;


	
	protected $created_at;


	
	protected $last_login;


	
	protected $is_active = true;


	
	protected $is_super_admin = false;


	
	protected $deleted_at;


	
	protected $deleted_by = 0;

	
	protected $asfGuardUserRelatedByDeletedBy;

	
	protected $collClientsRelatedByCreatedBy;

	
	protected $lastClientRelatedByCreatedByCriteria = null;

	
	protected $collClientsRelatedByUpdatedBy;

	
	protected $lastClientRelatedByUpdatedByCriteria = null;

	
	protected $collClientsRelatedByDeletedBy;

	
	protected $lastClientRelatedByDeletedByCriteria = null;

	
	protected $collContactsRelatedByCreatedBy;

	
	protected $lastContactRelatedByCreatedByCriteria = null;

	
	protected $collContactsRelatedByUpdatedBy;

	
	protected $lastContactRelatedByUpdatedByCriteria = null;

	
	protected $collContactsRelatedByDeletedBy;

	
	protected $lastContactRelatedByDeletedByCriteria = null;

	
	protected $collObjectContactsRelatedByCreatedBy;

	
	protected $lastObjectContactRelatedByCreatedByCriteria = null;

	
	protected $collObjectContactsRelatedByUpdatedBy;

	
	protected $lastObjectContactRelatedByUpdatedByCriteria = null;

	
	protected $collProjectsRelatedByCreatedBy;

	
	protected $lastProjectRelatedByCreatedByCriteria = null;

	
	protected $collProjectsRelatedByUpdatedBy;

	
	protected $lastProjectRelatedByUpdatedByCriteria = null;

	
	protected $collProjectsRelatedByDeletedBy;

	
	protected $lastProjectRelatedByDeletedByCriteria = null;

	
	protected $collTimesheets;

	
	protected $lastTimesheetCriteria = null;

	
	protected $collMilestonesRelatedByCreatedBy;

	
	protected $lastMilestoneRelatedByCreatedByCriteria = null;

	
	protected $collMilestonesRelatedByUpdatedBy;

	
	protected $lastMilestoneRelatedByUpdatedByCriteria = null;

	
	protected $collMilestonesRelatedByDeletedBy;

	
	protected $lastMilestoneRelatedByDeletedByCriteria = null;

	
	protected $collTasksRelatedByCreatedBy;

	
	protected $lastTaskRelatedByCreatedByCriteria = null;

	
	protected $collTasksRelatedByUpdatedBy;

	
	protected $lastTaskRelatedByUpdatedByCriteria = null;

	
	protected $collTasksRelatedByDeletedBy;

	
	protected $lastTaskRelatedByDeletedByCriteria = null;

	
	protected $collFrequentlyTasksRelatedByCreatedBy;

	
	protected $lastFrequentlyTaskRelatedByCreatedByCriteria = null;

	
	protected $collFrequentlyTasksRelatedByUpdatedBy;

	
	protected $lastFrequentlyTaskRelatedByUpdatedByCriteria = null;

	
	protected $collFrequentlyTasksRelatedByDeletedBy;

	
	protected $lastFrequentlyTaskRelatedByDeletedByCriteria = null;

	
	protected $collInvoicesRelatedByCreatedBy;

	
	protected $lastInvoiceRelatedByCreatedByCriteria = null;

	
	protected $collInvoicesRelatedByUpdatedBy;

	
	protected $lastInvoiceRelatedByUpdatedByCriteria = null;

	
	protected $collInvoicesRelatedByDeletedBy;

	
	protected $lastInvoiceRelatedByDeletedByCriteria = null;

	
	protected $collBudgetsRelatedByCreatedBy;

	
	protected $lastBudgetRelatedByCreatedByCriteria = null;

	
	protected $collBudgetsRelatedByUpdatedBy;

	
	protected $lastBudgetRelatedByUpdatedByCriteria = null;

	
	protected $collBudgetsRelatedByDeletedBy;

	
	protected $lastBudgetRelatedByDeletedByCriteria = null;

	
	protected $collVendorsRelatedByCreatedBy;

	
	protected $lastVendorRelatedByCreatedByCriteria = null;

	
	protected $collVendorsRelatedByUpdatedBy;

	
	protected $lastVendorRelatedByUpdatedByCriteria = null;

	
	protected $collVendorsRelatedByDeletedBy;

	
	protected $lastVendorRelatedByDeletedByCriteria = null;

	
	protected $collExpenseItemsRelatedByExpensePurchaseBy;

	
	protected $lastExpenseItemRelatedByExpensePurchaseByCriteria = null;

	
	protected $collExpenseItemsRelatedByExpenseValidateBy;

	
	protected $lastExpenseItemRelatedByExpenseValidateByCriteria = null;

	
	protected $collExpenseItemsRelatedByCreatedBy;

	
	protected $lastExpenseItemRelatedByCreatedByCriteria = null;

	
	protected $collExpenseItemsRelatedByUpdatedBy;

	
	protected $lastExpenseItemRelatedByUpdatedByCriteria = null;

	
	protected $collExpenseItemsRelatedByDeletedBy;

	
	protected $lastExpenseItemRelatedByDeletedByCriteria = null;

	
	protected $collIncomeItemsRelatedByCreatedBy;

	
	protected $lastIncomeItemRelatedByCreatedByCriteria = null;

	
	protected $collIncomeItemsRelatedByUpdatedBy;

	
	protected $lastIncomeItemRelatedByUpdatedByCriteria = null;

	
	protected $collIncomeItemsRelatedByDeletedBy;

	
	protected $lastIncomeItemRelatedByDeletedByCriteria = null;

	
	protected $collCashItemsRelatedByCreatedBy;

	
	protected $lastCashItemRelatedByCreatedByCriteria = null;

	
	protected $collCashItemsRelatedByUpdatedBy;

	
	protected $lastCashItemRelatedByUpdatedByCriteria = null;

	
	protected $collCashItemsRelatedByDeletedBy;

	
	protected $lastCashItemRelatedByDeletedByCriteria = null;

	
	protected $collNotificationsRelatedByCreatedBy;

	
	protected $lastNotificationRelatedByCreatedByCriteria = null;

	
	protected $collNotificationsRelatedByUpdatedBy;

	
	protected $lastNotificationRelatedByUpdatedByCriteria = null;

	
	protected $collReportsRelatedByCreatedBy;

	
	protected $lastReportRelatedByCreatedByCriteria = null;

	
	protected $collReportsRelatedByUpdatedBy;

	
	protected $lastReportRelatedByUpdatedByCriteria = null;

	
	protected $collGraphicsRelatedByCreatedBy;

	
	protected $lastGraphicRelatedByCreatedByCriteria = null;

	
	protected $collGraphicsRelatedByUpdatedBy;

	
	protected $lastGraphicRelatedByUpdatedByCriteria = null;

	
	protected $collsfGuardUserProfilesRelatedByUserId;

	
	protected $lastsfGuardUserProfileRelatedByUserIdCriteria = null;

	
	protected $collsfGuardUserProfilesRelatedByOwnerUserId;

	
	protected $lastsfGuardUserProfileRelatedByOwnerUserIdCriteria = null;

	
	protected $collsfGuardUserProfilesRelatedByCreatedBy;

	
	protected $lastsfGuardUserProfileRelatedByCreatedByCriteria = null;

	
	protected $collsfGuardUserProfilesRelatedByUpdatedBy;

	
	protected $lastsfGuardUserProfileRelatedByUpdatedByCriteria = null;

	
	protected $collsfGuardUserProfilesRelatedByDeletedBy;

	
	protected $lastsfGuardUserProfileRelatedByDeletedByCriteria = null;

	
	protected $collsfGuardUsersRelatedByDeletedBy;

	
	protected $lastsfGuardUserRelatedByDeletedByCriteria = null;

	
	protected $collsfGuardUserPermissions;

	
	protected $lastsfGuardUserPermissionCriteria = null;

	
	protected $collsfGuardUserGroups;

	
	protected $lastsfGuardUserGroupCriteria = null;

	
	protected $collsfGuardRememberKeys;

	
	protected $lastsfGuardRememberKeyCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getUsername()
	{

		return $this->username;
	}

	
	public function getAlgorithm()
	{

		return $this->algorithm;
	}

	
	public function getSalt()
	{

		return $this->salt;
	}

	
	public function getPassword()
	{

		return $this->password;
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

	
	public function getLastLogin($format = 'Y-m-d H:i:s')
	{

		if ($this->last_login === null || $this->last_login === '') {
			return null;
		} elseif (!is_int($this->last_login)) {
						$ts = strtotime($this->last_login);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [last_login] as date/time value: " . var_export($this->last_login, true));
			}
		} else {
			$ts = $this->last_login;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getIsActive()
	{

		return $this->is_active;
	}

	
	public function getIsSuperAdmin()
	{

		return $this->is_super_admin;
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
			$this->modifiedColumns[] = sfGuardUserPeer::ID;
		}

	} 
	
	public function setUsername($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->username !== $v) {
			$this->username = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::USERNAME;
		}

	} 
	
	public function setAlgorithm($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->algorithm !== $v || $v === 'sha1') {
			$this->algorithm = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::ALGORITHM;
		}

	} 
	
	public function setSalt($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->salt !== $v) {
			$this->salt = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::SALT;
		}

	} 
	
	public function setPassword($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::PASSWORD;
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
			$this->modifiedColumns[] = sfGuardUserPeer::CREATED_AT;
		}

	} 
	
	public function setLastLogin($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [last_login] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->last_login !== $ts) {
			$this->last_login = $ts;
			$this->modifiedColumns[] = sfGuardUserPeer::LAST_LOGIN;
		}

	} 
	
	public function setIsActive($v)
	{

		if ($this->is_active !== $v || $v === true) {
			$this->is_active = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::IS_ACTIVE;
		}

	} 
	
	public function setIsSuperAdmin($v)
	{

		if ($this->is_super_admin !== $v || $v === false) {
			$this->is_super_admin = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::IS_SUPER_ADMIN;
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
			$this->modifiedColumns[] = sfGuardUserPeer::DELETED_AT;
		}

	} 
	
	public function setDeletedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->deleted_by !== $v || $v === 0) {
			$this->deleted_by = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::DELETED_BY;
		}

		if ($this->asfGuardUserRelatedByDeletedBy !== null && $this->asfGuardUserRelatedByDeletedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByDeletedBy = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->username = $rs->getString($startcol + 1);

			$this->algorithm = $rs->getString($startcol + 2);

			$this->salt = $rs->getString($startcol + 3);

			$this->password = $rs->getString($startcol + 4);

			$this->created_at = $rs->getTimestamp($startcol + 5, null);

			$this->last_login = $rs->getTimestamp($startcol + 6, null);

			$this->is_active = $rs->getBoolean($startcol + 7);

			$this->is_super_admin = $rs->getBoolean($startcol + 8);

			$this->deleted_at = $rs->getTimestamp($startcol + 9, null);

			$this->deleted_by = $rs->getInt($startcol + 10);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating sfGuardUser object", $e);
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
                

    foreach (sfMixer::getCallables('BasesfGuardUser:delete:pre') as $callable)
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
			$con = Propel::getConnection(sfGuardUserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			sfGuardUserPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasesfGuardUser:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardUser:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(sfGuardUserPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(sfGuardUserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasesfGuardUser:save:post') as $callable)
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


												
			if ($this->asfGuardUserRelatedByDeletedBy !== null) {
				if ($this->asfGuardUserRelatedByDeletedBy->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByDeletedBy->save($con);
				}
				$this->setsfGuardUserRelatedByDeletedBy($this->asfGuardUserRelatedByDeletedBy);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = sfGuardUserPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += sfGuardUserPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collClientsRelatedByCreatedBy !== null) {
				foreach($this->collClientsRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collClientsRelatedByUpdatedBy !== null) {
				foreach($this->collClientsRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collClientsRelatedByDeletedBy !== null) {
				foreach($this->collClientsRelatedByDeletedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collContactsRelatedByCreatedBy !== null) {
				foreach($this->collContactsRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collContactsRelatedByUpdatedBy !== null) {
				foreach($this->collContactsRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collContactsRelatedByDeletedBy !== null) {
				foreach($this->collContactsRelatedByDeletedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collObjectContactsRelatedByCreatedBy !== null) {
				foreach($this->collObjectContactsRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collObjectContactsRelatedByUpdatedBy !== null) {
				foreach($this->collObjectContactsRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProjectsRelatedByCreatedBy !== null) {
				foreach($this->collProjectsRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProjectsRelatedByUpdatedBy !== null) {
				foreach($this->collProjectsRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProjectsRelatedByDeletedBy !== null) {
				foreach($this->collProjectsRelatedByDeletedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collTimesheets !== null) {
				foreach($this->collTimesheets as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collMilestonesRelatedByCreatedBy !== null) {
				foreach($this->collMilestonesRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collMilestonesRelatedByUpdatedBy !== null) {
				foreach($this->collMilestonesRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collMilestonesRelatedByDeletedBy !== null) {
				foreach($this->collMilestonesRelatedByDeletedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collTasksRelatedByCreatedBy !== null) {
				foreach($this->collTasksRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collTasksRelatedByUpdatedBy !== null) {
				foreach($this->collTasksRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collTasksRelatedByDeletedBy !== null) {
				foreach($this->collTasksRelatedByDeletedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collFrequentlyTasksRelatedByCreatedBy !== null) {
				foreach($this->collFrequentlyTasksRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collFrequentlyTasksRelatedByUpdatedBy !== null) {
				foreach($this->collFrequentlyTasksRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collFrequentlyTasksRelatedByDeletedBy !== null) {
				foreach($this->collFrequentlyTasksRelatedByDeletedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collInvoicesRelatedByCreatedBy !== null) {
				foreach($this->collInvoicesRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collInvoicesRelatedByUpdatedBy !== null) {
				foreach($this->collInvoicesRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collInvoicesRelatedByDeletedBy !== null) {
				foreach($this->collInvoicesRelatedByDeletedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collBudgetsRelatedByCreatedBy !== null) {
				foreach($this->collBudgetsRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collBudgetsRelatedByUpdatedBy !== null) {
				foreach($this->collBudgetsRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collBudgetsRelatedByDeletedBy !== null) {
				foreach($this->collBudgetsRelatedByDeletedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collVendorsRelatedByCreatedBy !== null) {
				foreach($this->collVendorsRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collVendorsRelatedByUpdatedBy !== null) {
				foreach($this->collVendorsRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collVendorsRelatedByDeletedBy !== null) {
				foreach($this->collVendorsRelatedByDeletedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collExpenseItemsRelatedByExpensePurchaseBy !== null) {
				foreach($this->collExpenseItemsRelatedByExpensePurchaseBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collExpenseItemsRelatedByExpenseValidateBy !== null) {
				foreach($this->collExpenseItemsRelatedByExpenseValidateBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collExpenseItemsRelatedByCreatedBy !== null) {
				foreach($this->collExpenseItemsRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collExpenseItemsRelatedByUpdatedBy !== null) {
				foreach($this->collExpenseItemsRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collExpenseItemsRelatedByDeletedBy !== null) {
				foreach($this->collExpenseItemsRelatedByDeletedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collIncomeItemsRelatedByCreatedBy !== null) {
				foreach($this->collIncomeItemsRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collIncomeItemsRelatedByUpdatedBy !== null) {
				foreach($this->collIncomeItemsRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collIncomeItemsRelatedByDeletedBy !== null) {
				foreach($this->collIncomeItemsRelatedByDeletedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCashItemsRelatedByCreatedBy !== null) {
				foreach($this->collCashItemsRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCashItemsRelatedByUpdatedBy !== null) {
				foreach($this->collCashItemsRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCashItemsRelatedByDeletedBy !== null) {
				foreach($this->collCashItemsRelatedByDeletedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collNotificationsRelatedByCreatedBy !== null) {
				foreach($this->collNotificationsRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collNotificationsRelatedByUpdatedBy !== null) {
				foreach($this->collNotificationsRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collReportsRelatedByCreatedBy !== null) {
				foreach($this->collReportsRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collReportsRelatedByUpdatedBy !== null) {
				foreach($this->collReportsRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collGraphicsRelatedByCreatedBy !== null) {
				foreach($this->collGraphicsRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collGraphicsRelatedByUpdatedBy !== null) {
				foreach($this->collGraphicsRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfGuardUserProfilesRelatedByUserId !== null) {
				foreach($this->collsfGuardUserProfilesRelatedByUserId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfGuardUserProfilesRelatedByOwnerUserId !== null) {
				foreach($this->collsfGuardUserProfilesRelatedByOwnerUserId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfGuardUserProfilesRelatedByCreatedBy !== null) {
				foreach($this->collsfGuardUserProfilesRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfGuardUserProfilesRelatedByUpdatedBy !== null) {
				foreach($this->collsfGuardUserProfilesRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfGuardUserProfilesRelatedByDeletedBy !== null) {
				foreach($this->collsfGuardUserProfilesRelatedByDeletedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfGuardUsersRelatedByDeletedBy !== null) {
				foreach($this->collsfGuardUsersRelatedByDeletedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfGuardUserPermissions !== null) {
				foreach($this->collsfGuardUserPermissions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfGuardUserGroups !== null) {
				foreach($this->collsfGuardUserGroups as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfGuardRememberKeys !== null) {
				foreach($this->collsfGuardRememberKeys as $referrerFK) {
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


												
			if ($this->asfGuardUserRelatedByDeletedBy !== null) {
				if (!$this->asfGuardUserRelatedByDeletedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByDeletedBy->getValidationFailures());
				}
			}


			if (($retval = sfGuardUserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collClientsRelatedByCreatedBy !== null) {
					foreach($this->collClientsRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collClientsRelatedByUpdatedBy !== null) {
					foreach($this->collClientsRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collClientsRelatedByDeletedBy !== null) {
					foreach($this->collClientsRelatedByDeletedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collContactsRelatedByCreatedBy !== null) {
					foreach($this->collContactsRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collContactsRelatedByUpdatedBy !== null) {
					foreach($this->collContactsRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collContactsRelatedByDeletedBy !== null) {
					foreach($this->collContactsRelatedByDeletedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collObjectContactsRelatedByCreatedBy !== null) {
					foreach($this->collObjectContactsRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collObjectContactsRelatedByUpdatedBy !== null) {
					foreach($this->collObjectContactsRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProjectsRelatedByCreatedBy !== null) {
					foreach($this->collProjectsRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProjectsRelatedByUpdatedBy !== null) {
					foreach($this->collProjectsRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProjectsRelatedByDeletedBy !== null) {
					foreach($this->collProjectsRelatedByDeletedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collTimesheets !== null) {
					foreach($this->collTimesheets as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collMilestonesRelatedByCreatedBy !== null) {
					foreach($this->collMilestonesRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collMilestonesRelatedByUpdatedBy !== null) {
					foreach($this->collMilestonesRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collMilestonesRelatedByDeletedBy !== null) {
					foreach($this->collMilestonesRelatedByDeletedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collTasksRelatedByCreatedBy !== null) {
					foreach($this->collTasksRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collTasksRelatedByUpdatedBy !== null) {
					foreach($this->collTasksRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collTasksRelatedByDeletedBy !== null) {
					foreach($this->collTasksRelatedByDeletedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collFrequentlyTasksRelatedByCreatedBy !== null) {
					foreach($this->collFrequentlyTasksRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collFrequentlyTasksRelatedByUpdatedBy !== null) {
					foreach($this->collFrequentlyTasksRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collFrequentlyTasksRelatedByDeletedBy !== null) {
					foreach($this->collFrequentlyTasksRelatedByDeletedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collInvoicesRelatedByCreatedBy !== null) {
					foreach($this->collInvoicesRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collInvoicesRelatedByUpdatedBy !== null) {
					foreach($this->collInvoicesRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collInvoicesRelatedByDeletedBy !== null) {
					foreach($this->collInvoicesRelatedByDeletedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collBudgetsRelatedByCreatedBy !== null) {
					foreach($this->collBudgetsRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collBudgetsRelatedByUpdatedBy !== null) {
					foreach($this->collBudgetsRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collBudgetsRelatedByDeletedBy !== null) {
					foreach($this->collBudgetsRelatedByDeletedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collVendorsRelatedByCreatedBy !== null) {
					foreach($this->collVendorsRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collVendorsRelatedByUpdatedBy !== null) {
					foreach($this->collVendorsRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collVendorsRelatedByDeletedBy !== null) {
					foreach($this->collVendorsRelatedByDeletedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collExpenseItemsRelatedByExpensePurchaseBy !== null) {
					foreach($this->collExpenseItemsRelatedByExpensePurchaseBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collExpenseItemsRelatedByExpenseValidateBy !== null) {
					foreach($this->collExpenseItemsRelatedByExpenseValidateBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collExpenseItemsRelatedByCreatedBy !== null) {
					foreach($this->collExpenseItemsRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collExpenseItemsRelatedByUpdatedBy !== null) {
					foreach($this->collExpenseItemsRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collExpenseItemsRelatedByDeletedBy !== null) {
					foreach($this->collExpenseItemsRelatedByDeletedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collIncomeItemsRelatedByCreatedBy !== null) {
					foreach($this->collIncomeItemsRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collIncomeItemsRelatedByUpdatedBy !== null) {
					foreach($this->collIncomeItemsRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collIncomeItemsRelatedByDeletedBy !== null) {
					foreach($this->collIncomeItemsRelatedByDeletedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCashItemsRelatedByCreatedBy !== null) {
					foreach($this->collCashItemsRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCashItemsRelatedByUpdatedBy !== null) {
					foreach($this->collCashItemsRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCashItemsRelatedByDeletedBy !== null) {
					foreach($this->collCashItemsRelatedByDeletedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collNotificationsRelatedByCreatedBy !== null) {
					foreach($this->collNotificationsRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collNotificationsRelatedByUpdatedBy !== null) {
					foreach($this->collNotificationsRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collReportsRelatedByCreatedBy !== null) {
					foreach($this->collReportsRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collReportsRelatedByUpdatedBy !== null) {
					foreach($this->collReportsRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collGraphicsRelatedByCreatedBy !== null) {
					foreach($this->collGraphicsRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collGraphicsRelatedByUpdatedBy !== null) {
					foreach($this->collGraphicsRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfGuardUserProfilesRelatedByUserId !== null) {
					foreach($this->collsfGuardUserProfilesRelatedByUserId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfGuardUserProfilesRelatedByOwnerUserId !== null) {
					foreach($this->collsfGuardUserProfilesRelatedByOwnerUserId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfGuardUserProfilesRelatedByCreatedBy !== null) {
					foreach($this->collsfGuardUserProfilesRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfGuardUserProfilesRelatedByUpdatedBy !== null) {
					foreach($this->collsfGuardUserProfilesRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfGuardUserProfilesRelatedByDeletedBy !== null) {
					foreach($this->collsfGuardUserProfilesRelatedByDeletedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfGuardUserPermissions !== null) {
					foreach($this->collsfGuardUserPermissions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfGuardUserGroups !== null) {
					foreach($this->collsfGuardUserGroups as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfGuardRememberKeys !== null) {
					foreach($this->collsfGuardRememberKeys as $referrerFK) {
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
		$pos = sfGuardUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getUsername();
				break;
			case 2:
				return $this->getAlgorithm();
				break;
			case 3:
				return $this->getSalt();
				break;
			case 4:
				return $this->getPassword();
				break;
			case 5:
				return $this->getCreatedAt();
				break;
			case 6:
				return $this->getLastLogin();
				break;
			case 7:
				return $this->getIsActive();
				break;
			case 8:
				return $this->getIsSuperAdmin();
				break;
			case 9:
				return $this->getDeletedAt();
				break;
			case 10:
				return $this->getDeletedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfGuardUserPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUsername(),
			$keys[2] => $this->getAlgorithm(),
			$keys[3] => $this->getSalt(),
			$keys[4] => $this->getPassword(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getLastLogin(),
			$keys[7] => $this->getIsActive(),
			$keys[8] => $this->getIsSuperAdmin(),
			$keys[9] => $this->getDeletedAt(),
			$keys[10] => $this->getDeletedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfGuardUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setUsername($value);
				break;
			case 2:
				$this->setAlgorithm($value);
				break;
			case 3:
				$this->setSalt($value);
				break;
			case 4:
				$this->setPassword($value);
				break;
			case 5:
				$this->setCreatedAt($value);
				break;
			case 6:
				$this->setLastLogin($value);
				break;
			case 7:
				$this->setIsActive($value);
				break;
			case 8:
				$this->setIsSuperAdmin($value);
				break;
			case 9:
				$this->setDeletedAt($value);
				break;
			case 10:
				$this->setDeletedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfGuardUserPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUsername($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAlgorithm($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSalt($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPassword($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setLastLogin($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setIsActive($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setIsSuperAdmin($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDeletedAt($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDeletedBy($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);

		if ($this->isColumnModified(sfGuardUserPeer::ID)) $criteria->add(sfGuardUserPeer::ID, $this->id);
		if ($this->isColumnModified(sfGuardUserPeer::USERNAME)) $criteria->add(sfGuardUserPeer::USERNAME, $this->username);
		if ($this->isColumnModified(sfGuardUserPeer::ALGORITHM)) $criteria->add(sfGuardUserPeer::ALGORITHM, $this->algorithm);
		if ($this->isColumnModified(sfGuardUserPeer::SALT)) $criteria->add(sfGuardUserPeer::SALT, $this->salt);
		if ($this->isColumnModified(sfGuardUserPeer::PASSWORD)) $criteria->add(sfGuardUserPeer::PASSWORD, $this->password);
		if ($this->isColumnModified(sfGuardUserPeer::CREATED_AT)) $criteria->add(sfGuardUserPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(sfGuardUserPeer::LAST_LOGIN)) $criteria->add(sfGuardUserPeer::LAST_LOGIN, $this->last_login);
		if ($this->isColumnModified(sfGuardUserPeer::IS_ACTIVE)) $criteria->add(sfGuardUserPeer::IS_ACTIVE, $this->is_active);
		if ($this->isColumnModified(sfGuardUserPeer::IS_SUPER_ADMIN)) $criteria->add(sfGuardUserPeer::IS_SUPER_ADMIN, $this->is_super_admin);
		if ($this->isColumnModified(sfGuardUserPeer::DELETED_AT)) $criteria->add(sfGuardUserPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(sfGuardUserPeer::DELETED_BY)) $criteria->add(sfGuardUserPeer::DELETED_BY, $this->deleted_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);

		$criteria->add(sfGuardUserPeer::ID, $this->id);

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

		$copyObj->setUsername($this->username);

		$copyObj->setAlgorithm($this->algorithm);

		$copyObj->setSalt($this->salt);

		$copyObj->setPassword($this->password);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setLastLogin($this->last_login);

		$copyObj->setIsActive($this->is_active);

		$copyObj->setIsSuperAdmin($this->is_super_admin);

		$copyObj->setDeletedAt($this->deleted_at);

		$copyObj->setDeletedBy($this->deleted_by);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getClientsRelatedByCreatedBy() as $relObj) {
				$copyObj->addClientRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getClientsRelatedByUpdatedBy() as $relObj) {
				$copyObj->addClientRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getClientsRelatedByDeletedBy() as $relObj) {
				$copyObj->addClientRelatedByDeletedBy($relObj->copy($deepCopy));
			}

			foreach($this->getContactsRelatedByCreatedBy() as $relObj) {
				$copyObj->addContactRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getContactsRelatedByUpdatedBy() as $relObj) {
				$copyObj->addContactRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getContactsRelatedByDeletedBy() as $relObj) {
				$copyObj->addContactRelatedByDeletedBy($relObj->copy($deepCopy));
			}

			foreach($this->getObjectContactsRelatedByCreatedBy() as $relObj) {
				$copyObj->addObjectContactRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getObjectContactsRelatedByUpdatedBy() as $relObj) {
				$copyObj->addObjectContactRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getProjectsRelatedByCreatedBy() as $relObj) {
				$copyObj->addProjectRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getProjectsRelatedByUpdatedBy() as $relObj) {
				$copyObj->addProjectRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getProjectsRelatedByDeletedBy() as $relObj) {
				$copyObj->addProjectRelatedByDeletedBy($relObj->copy($deepCopy));
			}

			foreach($this->getTimesheets() as $relObj) {
				$copyObj->addTimesheet($relObj->copy($deepCopy));
			}

			foreach($this->getMilestonesRelatedByCreatedBy() as $relObj) {
				$copyObj->addMilestoneRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getMilestonesRelatedByUpdatedBy() as $relObj) {
				$copyObj->addMilestoneRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getMilestonesRelatedByDeletedBy() as $relObj) {
				$copyObj->addMilestoneRelatedByDeletedBy($relObj->copy($deepCopy));
			}

			foreach($this->getTasksRelatedByCreatedBy() as $relObj) {
				$copyObj->addTaskRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getTasksRelatedByUpdatedBy() as $relObj) {
				$copyObj->addTaskRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getTasksRelatedByDeletedBy() as $relObj) {
				$copyObj->addTaskRelatedByDeletedBy($relObj->copy($deepCopy));
			}

			foreach($this->getFrequentlyTasksRelatedByCreatedBy() as $relObj) {
				$copyObj->addFrequentlyTaskRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getFrequentlyTasksRelatedByUpdatedBy() as $relObj) {
				$copyObj->addFrequentlyTaskRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getFrequentlyTasksRelatedByDeletedBy() as $relObj) {
				$copyObj->addFrequentlyTaskRelatedByDeletedBy($relObj->copy($deepCopy));
			}

			foreach($this->getInvoicesRelatedByCreatedBy() as $relObj) {
				$copyObj->addInvoiceRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getInvoicesRelatedByUpdatedBy() as $relObj) {
				$copyObj->addInvoiceRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getInvoicesRelatedByDeletedBy() as $relObj) {
				$copyObj->addInvoiceRelatedByDeletedBy($relObj->copy($deepCopy));
			}

			foreach($this->getBudgetsRelatedByCreatedBy() as $relObj) {
				$copyObj->addBudgetRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getBudgetsRelatedByUpdatedBy() as $relObj) {
				$copyObj->addBudgetRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getBudgetsRelatedByDeletedBy() as $relObj) {
				$copyObj->addBudgetRelatedByDeletedBy($relObj->copy($deepCopy));
			}

			foreach($this->getVendorsRelatedByCreatedBy() as $relObj) {
				$copyObj->addVendorRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getVendorsRelatedByUpdatedBy() as $relObj) {
				$copyObj->addVendorRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getVendorsRelatedByDeletedBy() as $relObj) {
				$copyObj->addVendorRelatedByDeletedBy($relObj->copy($deepCopy));
			}

			foreach($this->getExpenseItemsRelatedByExpensePurchaseBy() as $relObj) {
				$copyObj->addExpenseItemRelatedByExpensePurchaseBy($relObj->copy($deepCopy));
			}

			foreach($this->getExpenseItemsRelatedByExpenseValidateBy() as $relObj) {
				$copyObj->addExpenseItemRelatedByExpenseValidateBy($relObj->copy($deepCopy));
			}

			foreach($this->getExpenseItemsRelatedByCreatedBy() as $relObj) {
				$copyObj->addExpenseItemRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getExpenseItemsRelatedByUpdatedBy() as $relObj) {
				$copyObj->addExpenseItemRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getExpenseItemsRelatedByDeletedBy() as $relObj) {
				$copyObj->addExpenseItemRelatedByDeletedBy($relObj->copy($deepCopy));
			}

			foreach($this->getIncomeItemsRelatedByCreatedBy() as $relObj) {
				$copyObj->addIncomeItemRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getIncomeItemsRelatedByUpdatedBy() as $relObj) {
				$copyObj->addIncomeItemRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getIncomeItemsRelatedByDeletedBy() as $relObj) {
				$copyObj->addIncomeItemRelatedByDeletedBy($relObj->copy($deepCopy));
			}

			foreach($this->getCashItemsRelatedByCreatedBy() as $relObj) {
				$copyObj->addCashItemRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getCashItemsRelatedByUpdatedBy() as $relObj) {
				$copyObj->addCashItemRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getCashItemsRelatedByDeletedBy() as $relObj) {
				$copyObj->addCashItemRelatedByDeletedBy($relObj->copy($deepCopy));
			}

			foreach($this->getNotificationsRelatedByCreatedBy() as $relObj) {
				$copyObj->addNotificationRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getNotificationsRelatedByUpdatedBy() as $relObj) {
				$copyObj->addNotificationRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getReportsRelatedByCreatedBy() as $relObj) {
				$copyObj->addReportRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getReportsRelatedByUpdatedBy() as $relObj) {
				$copyObj->addReportRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getGraphicsRelatedByCreatedBy() as $relObj) {
				$copyObj->addGraphicRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getGraphicsRelatedByUpdatedBy() as $relObj) {
				$copyObj->addGraphicRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getsfGuardUserProfilesRelatedByUserId() as $relObj) {
				$copyObj->addsfGuardUserProfileRelatedByUserId($relObj->copy($deepCopy));
			}

			foreach($this->getsfGuardUserProfilesRelatedByOwnerUserId() as $relObj) {
				$copyObj->addsfGuardUserProfileRelatedByOwnerUserId($relObj->copy($deepCopy));
			}

			foreach($this->getsfGuardUserProfilesRelatedByCreatedBy() as $relObj) {
				$copyObj->addsfGuardUserProfileRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getsfGuardUserProfilesRelatedByUpdatedBy() as $relObj) {
				$copyObj->addsfGuardUserProfileRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getsfGuardUserProfilesRelatedByDeletedBy() as $relObj) {
				$copyObj->addsfGuardUserProfileRelatedByDeletedBy($relObj->copy($deepCopy));
			}

			foreach($this->getsfGuardUsersRelatedByDeletedBy() as $relObj) {
				if($this->getPrimaryKey() === $relObj->getPrimaryKey()) {
						continue;
				}

				$copyObj->addsfGuardUserRelatedByDeletedBy($relObj->copy($deepCopy));
			}

			foreach($this->getsfGuardUserPermissions() as $relObj) {
				$copyObj->addsfGuardUserPermission($relObj->copy($deepCopy));
			}

			foreach($this->getsfGuardUserGroups() as $relObj) {
				$copyObj->addsfGuardUserGroup($relObj->copy($deepCopy));
			}

			foreach($this->getsfGuardRememberKeys() as $relObj) {
				$copyObj->addsfGuardRememberKey($relObj->copy($deepCopy));
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
			self::$peer = new sfGuardUserPeer();
		}
		return self::$peer;
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

	
	public function initClientsRelatedByCreatedBy()
	{
		if ($this->collClientsRelatedByCreatedBy === null) {
			$this->collClientsRelatedByCreatedBy = array();
		}
	}

	
	public function getClientsRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseClientPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collClientsRelatedByCreatedBy = array();
			} else {

				$criteria->add(ClientPeer::CREATED_BY, $this->getId());

				ClientPeer::addSelectColumns($criteria);
				$this->collClientsRelatedByCreatedBy = ClientPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ClientPeer::CREATED_BY, $this->getId());

				ClientPeer::addSelectColumns($criteria);
				if (!isset($this->lastClientRelatedByCreatedByCriteria) || !$this->lastClientRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collClientsRelatedByCreatedBy = ClientPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastClientRelatedByCreatedByCriteria = $criteria;
		return $this->collClientsRelatedByCreatedBy;
	}

	
	public function countClientsRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseClientPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ClientPeer::CREATED_BY, $this->getId());

		return ClientPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addClientRelatedByCreatedBy(Client $l)
	{
		$this->collClientsRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserRelatedByCreatedBy($this);
	}


	
	public function getClientsRelatedByCreatedByJoinKindOfCompany($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseClientPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collClientsRelatedByCreatedBy = array();
			} else {

				$criteria->add(ClientPeer::CREATED_BY, $this->getId());

				$this->collClientsRelatedByCreatedBy = ClientPeer::doSelectJoinKindOfCompany($criteria, $con);
			}
		} else {
									
			$criteria->add(ClientPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastClientRelatedByCreatedByCriteria) || !$this->lastClientRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collClientsRelatedByCreatedBy = ClientPeer::doSelectJoinKindOfCompany($criteria, $con);
			}
		}
		$this->lastClientRelatedByCreatedByCriteria = $criteria;

		return $this->collClientsRelatedByCreatedBy;
	}

	
	public function initClientsRelatedByUpdatedBy()
	{
		if ($this->collClientsRelatedByUpdatedBy === null) {
			$this->collClientsRelatedByUpdatedBy = array();
		}
	}

	
	public function getClientsRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseClientPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collClientsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(ClientPeer::UPDATED_BY, $this->getId());

				ClientPeer::addSelectColumns($criteria);
				$this->collClientsRelatedByUpdatedBy = ClientPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ClientPeer::UPDATED_BY, $this->getId());

				ClientPeer::addSelectColumns($criteria);
				if (!isset($this->lastClientRelatedByUpdatedByCriteria) || !$this->lastClientRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collClientsRelatedByUpdatedBy = ClientPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastClientRelatedByUpdatedByCriteria = $criteria;
		return $this->collClientsRelatedByUpdatedBy;
	}

	
	public function countClientsRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseClientPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ClientPeer::UPDATED_BY, $this->getId());

		return ClientPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addClientRelatedByUpdatedBy(Client $l)
	{
		$this->collClientsRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}


	
	public function getClientsRelatedByUpdatedByJoinKindOfCompany($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseClientPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collClientsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(ClientPeer::UPDATED_BY, $this->getId());

				$this->collClientsRelatedByUpdatedBy = ClientPeer::doSelectJoinKindOfCompany($criteria, $con);
			}
		} else {
									
			$criteria->add(ClientPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastClientRelatedByUpdatedByCriteria) || !$this->lastClientRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collClientsRelatedByUpdatedBy = ClientPeer::doSelectJoinKindOfCompany($criteria, $con);
			}
		}
		$this->lastClientRelatedByUpdatedByCriteria = $criteria;

		return $this->collClientsRelatedByUpdatedBy;
	}

	
	public function initClientsRelatedByDeletedBy()
	{
		if ($this->collClientsRelatedByDeletedBy === null) {
			$this->collClientsRelatedByDeletedBy = array();
		}
	}

	
	public function getClientsRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseClientPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
			   $this->collClientsRelatedByDeletedBy = array();
			} else {

				$criteria->add(ClientPeer::DELETED_BY, $this->getId());

				ClientPeer::addSelectColumns($criteria);
				$this->collClientsRelatedByDeletedBy = ClientPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ClientPeer::DELETED_BY, $this->getId());

				ClientPeer::addSelectColumns($criteria);
				if (!isset($this->lastClientRelatedByDeletedByCriteria) || !$this->lastClientRelatedByDeletedByCriteria->equals($criteria)) {
					$this->collClientsRelatedByDeletedBy = ClientPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastClientRelatedByDeletedByCriteria = $criteria;
		return $this->collClientsRelatedByDeletedBy;
	}

	
	public function countClientsRelatedByDeletedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseClientPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ClientPeer::DELETED_BY, $this->getId());

		return ClientPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addClientRelatedByDeletedBy(Client $l)
	{
		$this->collClientsRelatedByDeletedBy[] = $l;
		$l->setsfGuardUserRelatedByDeletedBy($this);
	}


	
	public function getClientsRelatedByDeletedByJoinKindOfCompany($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseClientPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collClientsRelatedByDeletedBy = array();
			} else {

				$criteria->add(ClientPeer::DELETED_BY, $this->getId());

				$this->collClientsRelatedByDeletedBy = ClientPeer::doSelectJoinKindOfCompany($criteria, $con);
			}
		} else {
									
			$criteria->add(ClientPeer::DELETED_BY, $this->getId());

			if (!isset($this->lastClientRelatedByDeletedByCriteria) || !$this->lastClientRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collClientsRelatedByDeletedBy = ClientPeer::doSelectJoinKindOfCompany($criteria, $con);
			}
		}
		$this->lastClientRelatedByDeletedByCriteria = $criteria;

		return $this->collClientsRelatedByDeletedBy;
	}

	
	public function initContactsRelatedByCreatedBy()
	{
		if ($this->collContactsRelatedByCreatedBy === null) {
			$this->collContactsRelatedByCreatedBy = array();
		}
	}

	
	public function getContactsRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseContactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContactsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collContactsRelatedByCreatedBy = array();
			} else {

				$criteria->add(ContactPeer::CREATED_BY, $this->getId());

				ContactPeer::addSelectColumns($criteria);
				$this->collContactsRelatedByCreatedBy = ContactPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ContactPeer::CREATED_BY, $this->getId());

				ContactPeer::addSelectColumns($criteria);
				if (!isset($this->lastContactRelatedByCreatedByCriteria) || !$this->lastContactRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collContactsRelatedByCreatedBy = ContactPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastContactRelatedByCreatedByCriteria = $criteria;
		return $this->collContactsRelatedByCreatedBy;
	}

	
	public function countContactsRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseContactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ContactPeer::CREATED_BY, $this->getId());

		return ContactPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addContactRelatedByCreatedBy(Contact $l)
	{
		$this->collContactsRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserRelatedByCreatedBy($this);
	}

	
	public function initContactsRelatedByUpdatedBy()
	{
		if ($this->collContactsRelatedByUpdatedBy === null) {
			$this->collContactsRelatedByUpdatedBy = array();
		}
	}

	
	public function getContactsRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseContactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContactsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collContactsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(ContactPeer::UPDATED_BY, $this->getId());

				ContactPeer::addSelectColumns($criteria);
				$this->collContactsRelatedByUpdatedBy = ContactPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ContactPeer::UPDATED_BY, $this->getId());

				ContactPeer::addSelectColumns($criteria);
				if (!isset($this->lastContactRelatedByUpdatedByCriteria) || !$this->lastContactRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collContactsRelatedByUpdatedBy = ContactPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastContactRelatedByUpdatedByCriteria = $criteria;
		return $this->collContactsRelatedByUpdatedBy;
	}

	
	public function countContactsRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseContactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ContactPeer::UPDATED_BY, $this->getId());

		return ContactPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addContactRelatedByUpdatedBy(Contact $l)
	{
		$this->collContactsRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}

	
	public function initContactsRelatedByDeletedBy()
	{
		if ($this->collContactsRelatedByDeletedBy === null) {
			$this->collContactsRelatedByDeletedBy = array();
		}
	}

	
	public function getContactsRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseContactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContactsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
			   $this->collContactsRelatedByDeletedBy = array();
			} else {

				$criteria->add(ContactPeer::DELETED_BY, $this->getId());

				ContactPeer::addSelectColumns($criteria);
				$this->collContactsRelatedByDeletedBy = ContactPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ContactPeer::DELETED_BY, $this->getId());

				ContactPeer::addSelectColumns($criteria);
				if (!isset($this->lastContactRelatedByDeletedByCriteria) || !$this->lastContactRelatedByDeletedByCriteria->equals($criteria)) {
					$this->collContactsRelatedByDeletedBy = ContactPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastContactRelatedByDeletedByCriteria = $criteria;
		return $this->collContactsRelatedByDeletedBy;
	}

	
	public function countContactsRelatedByDeletedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseContactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ContactPeer::DELETED_BY, $this->getId());

		return ContactPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addContactRelatedByDeletedBy(Contact $l)
	{
		$this->collContactsRelatedByDeletedBy[] = $l;
		$l->setsfGuardUserRelatedByDeletedBy($this);
	}

	
	public function initObjectContactsRelatedByCreatedBy()
	{
		if ($this->collObjectContactsRelatedByCreatedBy === null) {
			$this->collObjectContactsRelatedByCreatedBy = array();
		}
	}

	
	public function getObjectContactsRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseObjectContactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collObjectContactsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collObjectContactsRelatedByCreatedBy = array();
			} else {

				$criteria->add(ObjectContactPeer::CREATED_BY, $this->getId());

				ObjectContactPeer::addSelectColumns($criteria);
				$this->collObjectContactsRelatedByCreatedBy = ObjectContactPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ObjectContactPeer::CREATED_BY, $this->getId());

				ObjectContactPeer::addSelectColumns($criteria);
				if (!isset($this->lastObjectContactRelatedByCreatedByCriteria) || !$this->lastObjectContactRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collObjectContactsRelatedByCreatedBy = ObjectContactPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastObjectContactRelatedByCreatedByCriteria = $criteria;
		return $this->collObjectContactsRelatedByCreatedBy;
	}

	
	public function countObjectContactsRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseObjectContactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ObjectContactPeer::CREATED_BY, $this->getId());

		return ObjectContactPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addObjectContactRelatedByCreatedBy(ObjectContact $l)
	{
		$this->collObjectContactsRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserRelatedByCreatedBy($this);
	}


	
	public function getObjectContactsRelatedByCreatedByJoinContact($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseObjectContactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collObjectContactsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collObjectContactsRelatedByCreatedBy = array();
			} else {

				$criteria->add(ObjectContactPeer::CREATED_BY, $this->getId());

				$this->collObjectContactsRelatedByCreatedBy = ObjectContactPeer::doSelectJoinContact($criteria, $con);
			}
		} else {
									
			$criteria->add(ObjectContactPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastObjectContactRelatedByCreatedByCriteria) || !$this->lastObjectContactRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collObjectContactsRelatedByCreatedBy = ObjectContactPeer::doSelectJoinContact($criteria, $con);
			}
		}
		$this->lastObjectContactRelatedByCreatedByCriteria = $criteria;

		return $this->collObjectContactsRelatedByCreatedBy;
	}

	
	public function initObjectContactsRelatedByUpdatedBy()
	{
		if ($this->collObjectContactsRelatedByUpdatedBy === null) {
			$this->collObjectContactsRelatedByUpdatedBy = array();
		}
	}

	
	public function getObjectContactsRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseObjectContactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collObjectContactsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collObjectContactsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(ObjectContactPeer::UPDATED_BY, $this->getId());

				ObjectContactPeer::addSelectColumns($criteria);
				$this->collObjectContactsRelatedByUpdatedBy = ObjectContactPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ObjectContactPeer::UPDATED_BY, $this->getId());

				ObjectContactPeer::addSelectColumns($criteria);
				if (!isset($this->lastObjectContactRelatedByUpdatedByCriteria) || !$this->lastObjectContactRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collObjectContactsRelatedByUpdatedBy = ObjectContactPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastObjectContactRelatedByUpdatedByCriteria = $criteria;
		return $this->collObjectContactsRelatedByUpdatedBy;
	}

	
	public function countObjectContactsRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseObjectContactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ObjectContactPeer::UPDATED_BY, $this->getId());

		return ObjectContactPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addObjectContactRelatedByUpdatedBy(ObjectContact $l)
	{
		$this->collObjectContactsRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}


	
	public function getObjectContactsRelatedByUpdatedByJoinContact($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseObjectContactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collObjectContactsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collObjectContactsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(ObjectContactPeer::UPDATED_BY, $this->getId());

				$this->collObjectContactsRelatedByUpdatedBy = ObjectContactPeer::doSelectJoinContact($criteria, $con);
			}
		} else {
									
			$criteria->add(ObjectContactPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastObjectContactRelatedByUpdatedByCriteria) || !$this->lastObjectContactRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collObjectContactsRelatedByUpdatedBy = ObjectContactPeer::doSelectJoinContact($criteria, $con);
			}
		}
		$this->lastObjectContactRelatedByUpdatedByCriteria = $criteria;

		return $this->collObjectContactsRelatedByUpdatedBy;
	}

	
	public function initProjectsRelatedByCreatedBy()
	{
		if ($this->collProjectsRelatedByCreatedBy === null) {
			$this->collProjectsRelatedByCreatedBy = array();
		}
	}

	
	public function getProjectsRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collProjectsRelatedByCreatedBy = array();
			} else {

				$criteria->add(ProjectPeer::CREATED_BY, $this->getId());

				ProjectPeer::addSelectColumns($criteria);
				$this->collProjectsRelatedByCreatedBy = ProjectPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ProjectPeer::CREATED_BY, $this->getId());

				ProjectPeer::addSelectColumns($criteria);
				if (!isset($this->lastProjectRelatedByCreatedByCriteria) || !$this->lastProjectRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collProjectsRelatedByCreatedBy = ProjectPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProjectRelatedByCreatedByCriteria = $criteria;
		return $this->collProjectsRelatedByCreatedBy;
	}

	
	public function countProjectsRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ProjectPeer::CREATED_BY, $this->getId());

		return ProjectPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addProjectRelatedByCreatedBy(Project $l)
	{
		$this->collProjectsRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserRelatedByCreatedBy($this);
	}


	
	public function getProjectsRelatedByCreatedByJoinClient($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collProjectsRelatedByCreatedBy = array();
			} else {

				$criteria->add(ProjectPeer::CREATED_BY, $this->getId());

				$this->collProjectsRelatedByCreatedBy = ProjectPeer::doSelectJoinClient($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastProjectRelatedByCreatedByCriteria) || !$this->lastProjectRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collProjectsRelatedByCreatedBy = ProjectPeer::doSelectJoinClient($criteria, $con);
			}
		}
		$this->lastProjectRelatedByCreatedByCriteria = $criteria;

		return $this->collProjectsRelatedByCreatedBy;
	}


	
	public function getProjectsRelatedByCreatedByJoinProjectCategory($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collProjectsRelatedByCreatedBy = array();
			} else {

				$criteria->add(ProjectPeer::CREATED_BY, $this->getId());

				$this->collProjectsRelatedByCreatedBy = ProjectPeer::doSelectJoinProjectCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastProjectRelatedByCreatedByCriteria) || !$this->lastProjectRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collProjectsRelatedByCreatedBy = ProjectPeer::doSelectJoinProjectCategory($criteria, $con);
			}
		}
		$this->lastProjectRelatedByCreatedByCriteria = $criteria;

		return $this->collProjectsRelatedByCreatedBy;
	}


	
	public function getProjectsRelatedByCreatedByJoinProjectStatus($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collProjectsRelatedByCreatedBy = array();
			} else {

				$criteria->add(ProjectPeer::CREATED_BY, $this->getId());

				$this->collProjectsRelatedByCreatedBy = ProjectPeer::doSelectJoinProjectStatus($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastProjectRelatedByCreatedByCriteria) || !$this->lastProjectRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collProjectsRelatedByCreatedBy = ProjectPeer::doSelectJoinProjectStatus($criteria, $con);
			}
		}
		$this->lastProjectRelatedByCreatedByCriteria = $criteria;

		return $this->collProjectsRelatedByCreatedBy;
	}

	
	public function initProjectsRelatedByUpdatedBy()
	{
		if ($this->collProjectsRelatedByUpdatedBy === null) {
			$this->collProjectsRelatedByUpdatedBy = array();
		}
	}

	
	public function getProjectsRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collProjectsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(ProjectPeer::UPDATED_BY, $this->getId());

				ProjectPeer::addSelectColumns($criteria);
				$this->collProjectsRelatedByUpdatedBy = ProjectPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ProjectPeer::UPDATED_BY, $this->getId());

				ProjectPeer::addSelectColumns($criteria);
				if (!isset($this->lastProjectRelatedByUpdatedByCriteria) || !$this->lastProjectRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collProjectsRelatedByUpdatedBy = ProjectPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProjectRelatedByUpdatedByCriteria = $criteria;
		return $this->collProjectsRelatedByUpdatedBy;
	}

	
	public function countProjectsRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ProjectPeer::UPDATED_BY, $this->getId());

		return ProjectPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addProjectRelatedByUpdatedBy(Project $l)
	{
		$this->collProjectsRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}


	
	public function getProjectsRelatedByUpdatedByJoinClient($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collProjectsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(ProjectPeer::UPDATED_BY, $this->getId());

				$this->collProjectsRelatedByUpdatedBy = ProjectPeer::doSelectJoinClient($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastProjectRelatedByUpdatedByCriteria) || !$this->lastProjectRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collProjectsRelatedByUpdatedBy = ProjectPeer::doSelectJoinClient($criteria, $con);
			}
		}
		$this->lastProjectRelatedByUpdatedByCriteria = $criteria;

		return $this->collProjectsRelatedByUpdatedBy;
	}


	
	public function getProjectsRelatedByUpdatedByJoinProjectCategory($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collProjectsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(ProjectPeer::UPDATED_BY, $this->getId());

				$this->collProjectsRelatedByUpdatedBy = ProjectPeer::doSelectJoinProjectCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastProjectRelatedByUpdatedByCriteria) || !$this->lastProjectRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collProjectsRelatedByUpdatedBy = ProjectPeer::doSelectJoinProjectCategory($criteria, $con);
			}
		}
		$this->lastProjectRelatedByUpdatedByCriteria = $criteria;

		return $this->collProjectsRelatedByUpdatedBy;
	}


	
	public function getProjectsRelatedByUpdatedByJoinProjectStatus($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collProjectsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(ProjectPeer::UPDATED_BY, $this->getId());

				$this->collProjectsRelatedByUpdatedBy = ProjectPeer::doSelectJoinProjectStatus($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastProjectRelatedByUpdatedByCriteria) || !$this->lastProjectRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collProjectsRelatedByUpdatedBy = ProjectPeer::doSelectJoinProjectStatus($criteria, $con);
			}
		}
		$this->lastProjectRelatedByUpdatedByCriteria = $criteria;

		return $this->collProjectsRelatedByUpdatedBy;
	}

	
	public function initProjectsRelatedByDeletedBy()
	{
		if ($this->collProjectsRelatedByDeletedBy === null) {
			$this->collProjectsRelatedByDeletedBy = array();
		}
	}

	
	public function getProjectsRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
			   $this->collProjectsRelatedByDeletedBy = array();
			} else {

				$criteria->add(ProjectPeer::DELETED_BY, $this->getId());

				ProjectPeer::addSelectColumns($criteria);
				$this->collProjectsRelatedByDeletedBy = ProjectPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ProjectPeer::DELETED_BY, $this->getId());

				ProjectPeer::addSelectColumns($criteria);
				if (!isset($this->lastProjectRelatedByDeletedByCriteria) || !$this->lastProjectRelatedByDeletedByCriteria->equals($criteria)) {
					$this->collProjectsRelatedByDeletedBy = ProjectPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProjectRelatedByDeletedByCriteria = $criteria;
		return $this->collProjectsRelatedByDeletedBy;
	}

	
	public function countProjectsRelatedByDeletedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ProjectPeer::DELETED_BY, $this->getId());

		return ProjectPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addProjectRelatedByDeletedBy(Project $l)
	{
		$this->collProjectsRelatedByDeletedBy[] = $l;
		$l->setsfGuardUserRelatedByDeletedBy($this);
	}


	
	public function getProjectsRelatedByDeletedByJoinClient($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collProjectsRelatedByDeletedBy = array();
			} else {

				$criteria->add(ProjectPeer::DELETED_BY, $this->getId());

				$this->collProjectsRelatedByDeletedBy = ProjectPeer::doSelectJoinClient($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::DELETED_BY, $this->getId());

			if (!isset($this->lastProjectRelatedByDeletedByCriteria) || !$this->lastProjectRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collProjectsRelatedByDeletedBy = ProjectPeer::doSelectJoinClient($criteria, $con);
			}
		}
		$this->lastProjectRelatedByDeletedByCriteria = $criteria;

		return $this->collProjectsRelatedByDeletedBy;
	}


	
	public function getProjectsRelatedByDeletedByJoinProjectCategory($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collProjectsRelatedByDeletedBy = array();
			} else {

				$criteria->add(ProjectPeer::DELETED_BY, $this->getId());

				$this->collProjectsRelatedByDeletedBy = ProjectPeer::doSelectJoinProjectCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::DELETED_BY, $this->getId());

			if (!isset($this->lastProjectRelatedByDeletedByCriteria) || !$this->lastProjectRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collProjectsRelatedByDeletedBy = ProjectPeer::doSelectJoinProjectCategory($criteria, $con);
			}
		}
		$this->lastProjectRelatedByDeletedByCriteria = $criteria;

		return $this->collProjectsRelatedByDeletedBy;
	}


	
	public function getProjectsRelatedByDeletedByJoinProjectStatus($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collProjectsRelatedByDeletedBy = array();
			} else {

				$criteria->add(ProjectPeer::DELETED_BY, $this->getId());

				$this->collProjectsRelatedByDeletedBy = ProjectPeer::doSelectJoinProjectStatus($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::DELETED_BY, $this->getId());

			if (!isset($this->lastProjectRelatedByDeletedByCriteria) || !$this->lastProjectRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collProjectsRelatedByDeletedBy = ProjectPeer::doSelectJoinProjectStatus($criteria, $con);
			}
		}
		$this->lastProjectRelatedByDeletedByCriteria = $criteria;

		return $this->collProjectsRelatedByDeletedBy;
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

				$criteria->add(TimesheetPeer::TIMESHEET_USER_ID, $this->getId());

				TimesheetPeer::addSelectColumns($criteria);
				$this->collTimesheets = TimesheetPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TimesheetPeer::TIMESHEET_USER_ID, $this->getId());

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

		$criteria->add(TimesheetPeer::TIMESHEET_USER_ID, $this->getId());

		return TimesheetPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTimesheet(Timesheet $l)
	{
		$this->collTimesheets[] = $l;
		$l->setsfGuardUser($this);
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

				$criteria->add(TimesheetPeer::TIMESHEET_USER_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_USER_ID, $this->getId());

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

				$criteria->add(TimesheetPeer::TIMESHEET_USER_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinMilestone($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_USER_ID, $this->getId());

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

				$criteria->add(TimesheetPeer::TIMESHEET_USER_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_USER_ID, $this->getId());

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

				$criteria->add(TimesheetPeer::TIMESHEET_USER_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinTask($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_USER_ID, $this->getId());

			if (!isset($this->lastTimesheetCriteria) || !$this->lastTimesheetCriteria->equals($criteria)) {
				$this->collTimesheets = TimesheetPeer::doSelectJoinTask($criteria, $con);
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

				$criteria->add(TimesheetPeer::TIMESHEET_USER_ID, $this->getId());

				$this->collTimesheets = TimesheetPeer::doSelectJoinTypeOfHour($criteria, $con);
			}
		} else {
									
			$criteria->add(TimesheetPeer::TIMESHEET_USER_ID, $this->getId());

			if (!isset($this->lastTimesheetCriteria) || !$this->lastTimesheetCriteria->equals($criteria)) {
				$this->collTimesheets = TimesheetPeer::doSelectJoinTypeOfHour($criteria, $con);
			}
		}
		$this->lastTimesheetCriteria = $criteria;

		return $this->collTimesheets;
	}

	
	public function initMilestonesRelatedByCreatedBy()
	{
		if ($this->collMilestonesRelatedByCreatedBy === null) {
			$this->collMilestonesRelatedByCreatedBy = array();
		}
	}

	
	public function getMilestonesRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMilestonePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMilestonesRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collMilestonesRelatedByCreatedBy = array();
			} else {

				$criteria->add(MilestonePeer::CREATED_BY, $this->getId());

				MilestonePeer::addSelectColumns($criteria);
				$this->collMilestonesRelatedByCreatedBy = MilestonePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MilestonePeer::CREATED_BY, $this->getId());

				MilestonePeer::addSelectColumns($criteria);
				if (!isset($this->lastMilestoneRelatedByCreatedByCriteria) || !$this->lastMilestoneRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collMilestonesRelatedByCreatedBy = MilestonePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastMilestoneRelatedByCreatedByCriteria = $criteria;
		return $this->collMilestonesRelatedByCreatedBy;
	}

	
	public function countMilestonesRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseMilestonePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(MilestonePeer::CREATED_BY, $this->getId());

		return MilestonePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMilestoneRelatedByCreatedBy(Milestone $l)
	{
		$this->collMilestonesRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserRelatedByCreatedBy($this);
	}


	
	public function getMilestonesRelatedByCreatedByJoinBudgetRelatedByMilestoneProjectId($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMilestonePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMilestonesRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collMilestonesRelatedByCreatedBy = array();
			} else {

				$criteria->add(MilestonePeer::CREATED_BY, $this->getId());

				$this->collMilestonesRelatedByCreatedBy = MilestonePeer::doSelectJoinBudgetRelatedByMilestoneProjectId($criteria, $con);
			}
		} else {
									
			$criteria->add(MilestonePeer::CREATED_BY, $this->getId());

			if (!isset($this->lastMilestoneRelatedByCreatedByCriteria) || !$this->lastMilestoneRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collMilestonesRelatedByCreatedBy = MilestonePeer::doSelectJoinBudgetRelatedByMilestoneProjectId($criteria, $con);
			}
		}
		$this->lastMilestoneRelatedByCreatedByCriteria = $criteria;

		return $this->collMilestonesRelatedByCreatedBy;
	}


	
	public function getMilestonesRelatedByCreatedByJoinBudgetRelatedByMilestoneBudgetId($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMilestonePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMilestonesRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collMilestonesRelatedByCreatedBy = array();
			} else {

				$criteria->add(MilestonePeer::CREATED_BY, $this->getId());

				$this->collMilestonesRelatedByCreatedBy = MilestonePeer::doSelectJoinBudgetRelatedByMilestoneBudgetId($criteria, $con);
			}
		} else {
									
			$criteria->add(MilestonePeer::CREATED_BY, $this->getId());

			if (!isset($this->lastMilestoneRelatedByCreatedByCriteria) || !$this->lastMilestoneRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collMilestonesRelatedByCreatedBy = MilestonePeer::doSelectJoinBudgetRelatedByMilestoneBudgetId($criteria, $con);
			}
		}
		$this->lastMilestoneRelatedByCreatedByCriteria = $criteria;

		return $this->collMilestonesRelatedByCreatedBy;
	}

	
	public function initMilestonesRelatedByUpdatedBy()
	{
		if ($this->collMilestonesRelatedByUpdatedBy === null) {
			$this->collMilestonesRelatedByUpdatedBy = array();
		}
	}

	
	public function getMilestonesRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMilestonePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMilestonesRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collMilestonesRelatedByUpdatedBy = array();
			} else {

				$criteria->add(MilestonePeer::UPDATED_BY, $this->getId());

				MilestonePeer::addSelectColumns($criteria);
				$this->collMilestonesRelatedByUpdatedBy = MilestonePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MilestonePeer::UPDATED_BY, $this->getId());

				MilestonePeer::addSelectColumns($criteria);
				if (!isset($this->lastMilestoneRelatedByUpdatedByCriteria) || !$this->lastMilestoneRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collMilestonesRelatedByUpdatedBy = MilestonePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastMilestoneRelatedByUpdatedByCriteria = $criteria;
		return $this->collMilestonesRelatedByUpdatedBy;
	}

	
	public function countMilestonesRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseMilestonePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(MilestonePeer::UPDATED_BY, $this->getId());

		return MilestonePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMilestoneRelatedByUpdatedBy(Milestone $l)
	{
		$this->collMilestonesRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}


	
	public function getMilestonesRelatedByUpdatedByJoinBudgetRelatedByMilestoneProjectId($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMilestonePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMilestonesRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collMilestonesRelatedByUpdatedBy = array();
			} else {

				$criteria->add(MilestonePeer::UPDATED_BY, $this->getId());

				$this->collMilestonesRelatedByUpdatedBy = MilestonePeer::doSelectJoinBudgetRelatedByMilestoneProjectId($criteria, $con);
			}
		} else {
									
			$criteria->add(MilestonePeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastMilestoneRelatedByUpdatedByCriteria) || !$this->lastMilestoneRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collMilestonesRelatedByUpdatedBy = MilestonePeer::doSelectJoinBudgetRelatedByMilestoneProjectId($criteria, $con);
			}
		}
		$this->lastMilestoneRelatedByUpdatedByCriteria = $criteria;

		return $this->collMilestonesRelatedByUpdatedBy;
	}


	
	public function getMilestonesRelatedByUpdatedByJoinBudgetRelatedByMilestoneBudgetId($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMilestonePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMilestonesRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collMilestonesRelatedByUpdatedBy = array();
			} else {

				$criteria->add(MilestonePeer::UPDATED_BY, $this->getId());

				$this->collMilestonesRelatedByUpdatedBy = MilestonePeer::doSelectJoinBudgetRelatedByMilestoneBudgetId($criteria, $con);
			}
		} else {
									
			$criteria->add(MilestonePeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastMilestoneRelatedByUpdatedByCriteria) || !$this->lastMilestoneRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collMilestonesRelatedByUpdatedBy = MilestonePeer::doSelectJoinBudgetRelatedByMilestoneBudgetId($criteria, $con);
			}
		}
		$this->lastMilestoneRelatedByUpdatedByCriteria = $criteria;

		return $this->collMilestonesRelatedByUpdatedBy;
	}

	
	public function initMilestonesRelatedByDeletedBy()
	{
		if ($this->collMilestonesRelatedByDeletedBy === null) {
			$this->collMilestonesRelatedByDeletedBy = array();
		}
	}

	
	public function getMilestonesRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMilestonePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMilestonesRelatedByDeletedBy === null) {
			if ($this->isNew()) {
			   $this->collMilestonesRelatedByDeletedBy = array();
			} else {

				$criteria->add(MilestonePeer::DELETED_BY, $this->getId());

				MilestonePeer::addSelectColumns($criteria);
				$this->collMilestonesRelatedByDeletedBy = MilestonePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MilestonePeer::DELETED_BY, $this->getId());

				MilestonePeer::addSelectColumns($criteria);
				if (!isset($this->lastMilestoneRelatedByDeletedByCriteria) || !$this->lastMilestoneRelatedByDeletedByCriteria->equals($criteria)) {
					$this->collMilestonesRelatedByDeletedBy = MilestonePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastMilestoneRelatedByDeletedByCriteria = $criteria;
		return $this->collMilestonesRelatedByDeletedBy;
	}

	
	public function countMilestonesRelatedByDeletedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseMilestonePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(MilestonePeer::DELETED_BY, $this->getId());

		return MilestonePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMilestoneRelatedByDeletedBy(Milestone $l)
	{
		$this->collMilestonesRelatedByDeletedBy[] = $l;
		$l->setsfGuardUserRelatedByDeletedBy($this);
	}


	
	public function getMilestonesRelatedByDeletedByJoinBudgetRelatedByMilestoneProjectId($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMilestonePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMilestonesRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collMilestonesRelatedByDeletedBy = array();
			} else {

				$criteria->add(MilestonePeer::DELETED_BY, $this->getId());

				$this->collMilestonesRelatedByDeletedBy = MilestonePeer::doSelectJoinBudgetRelatedByMilestoneProjectId($criteria, $con);
			}
		} else {
									
			$criteria->add(MilestonePeer::DELETED_BY, $this->getId());

			if (!isset($this->lastMilestoneRelatedByDeletedByCriteria) || !$this->lastMilestoneRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collMilestonesRelatedByDeletedBy = MilestonePeer::doSelectJoinBudgetRelatedByMilestoneProjectId($criteria, $con);
			}
		}
		$this->lastMilestoneRelatedByDeletedByCriteria = $criteria;

		return $this->collMilestonesRelatedByDeletedBy;
	}


	
	public function getMilestonesRelatedByDeletedByJoinBudgetRelatedByMilestoneBudgetId($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMilestonePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMilestonesRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collMilestonesRelatedByDeletedBy = array();
			} else {

				$criteria->add(MilestonePeer::DELETED_BY, $this->getId());

				$this->collMilestonesRelatedByDeletedBy = MilestonePeer::doSelectJoinBudgetRelatedByMilestoneBudgetId($criteria, $con);
			}
		} else {
									
			$criteria->add(MilestonePeer::DELETED_BY, $this->getId());

			if (!isset($this->lastMilestoneRelatedByDeletedByCriteria) || !$this->lastMilestoneRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collMilestonesRelatedByDeletedBy = MilestonePeer::doSelectJoinBudgetRelatedByMilestoneBudgetId($criteria, $con);
			}
		}
		$this->lastMilestoneRelatedByDeletedByCriteria = $criteria;

		return $this->collMilestonesRelatedByDeletedBy;
	}

	
	public function initTasksRelatedByCreatedBy()
	{
		if ($this->collTasksRelatedByCreatedBy === null) {
			$this->collTasksRelatedByCreatedBy = array();
		}
	}

	
	public function getTasksRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasksRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collTasksRelatedByCreatedBy = array();
			} else {

				$criteria->add(TaskPeer::CREATED_BY, $this->getId());

				TaskPeer::addSelectColumns($criteria);
				$this->collTasksRelatedByCreatedBy = TaskPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TaskPeer::CREATED_BY, $this->getId());

				TaskPeer::addSelectColumns($criteria);
				if (!isset($this->lastTaskRelatedByCreatedByCriteria) || !$this->lastTaskRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collTasksRelatedByCreatedBy = TaskPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastTaskRelatedByCreatedByCriteria = $criteria;
		return $this->collTasksRelatedByCreatedBy;
	}

	
	public function countTasksRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(TaskPeer::CREATED_BY, $this->getId());

		return TaskPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTaskRelatedByCreatedBy(Task $l)
	{
		$this->collTasksRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserRelatedByCreatedBy($this);
	}


	
	public function getTasksRelatedByCreatedByJoinBudget($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasksRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collTasksRelatedByCreatedBy = array();
			} else {

				$criteria->add(TaskPeer::CREATED_BY, $this->getId());

				$this->collTasksRelatedByCreatedBy = TaskPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastTaskRelatedByCreatedByCriteria) || !$this->lastTaskRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collTasksRelatedByCreatedBy = TaskPeer::doSelectJoinBudget($criteria, $con);
			}
		}
		$this->lastTaskRelatedByCreatedByCriteria = $criteria;

		return $this->collTasksRelatedByCreatedBy;
	}


	
	public function getTasksRelatedByCreatedByJoinTaskPriority($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasksRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collTasksRelatedByCreatedBy = array();
			} else {

				$criteria->add(TaskPeer::CREATED_BY, $this->getId());

				$this->collTasksRelatedByCreatedBy = TaskPeer::doSelectJoinTaskPriority($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastTaskRelatedByCreatedByCriteria) || !$this->lastTaskRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collTasksRelatedByCreatedBy = TaskPeer::doSelectJoinTaskPriority($criteria, $con);
			}
		}
		$this->lastTaskRelatedByCreatedByCriteria = $criteria;

		return $this->collTasksRelatedByCreatedBy;
	}


	
	public function getTasksRelatedByCreatedByJoinMilestone($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasksRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collTasksRelatedByCreatedBy = array();
			} else {

				$criteria->add(TaskPeer::CREATED_BY, $this->getId());

				$this->collTasksRelatedByCreatedBy = TaskPeer::doSelectJoinMilestone($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastTaskRelatedByCreatedByCriteria) || !$this->lastTaskRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collTasksRelatedByCreatedBy = TaskPeer::doSelectJoinMilestone($criteria, $con);
			}
		}
		$this->lastTaskRelatedByCreatedByCriteria = $criteria;

		return $this->collTasksRelatedByCreatedBy;
	}


	
	public function getTasksRelatedByCreatedByJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasksRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collTasksRelatedByCreatedBy = array();
			} else {

				$criteria->add(TaskPeer::CREATED_BY, $this->getId());

				$this->collTasksRelatedByCreatedBy = TaskPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastTaskRelatedByCreatedByCriteria) || !$this->lastTaskRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collTasksRelatedByCreatedBy = TaskPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastTaskRelatedByCreatedByCriteria = $criteria;

		return $this->collTasksRelatedByCreatedBy;
	}

	
	public function initTasksRelatedByUpdatedBy()
	{
		if ($this->collTasksRelatedByUpdatedBy === null) {
			$this->collTasksRelatedByUpdatedBy = array();
		}
	}

	
	public function getTasksRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasksRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collTasksRelatedByUpdatedBy = array();
			} else {

				$criteria->add(TaskPeer::UPDATED_BY, $this->getId());

				TaskPeer::addSelectColumns($criteria);
				$this->collTasksRelatedByUpdatedBy = TaskPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TaskPeer::UPDATED_BY, $this->getId());

				TaskPeer::addSelectColumns($criteria);
				if (!isset($this->lastTaskRelatedByUpdatedByCriteria) || !$this->lastTaskRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collTasksRelatedByUpdatedBy = TaskPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastTaskRelatedByUpdatedByCriteria = $criteria;
		return $this->collTasksRelatedByUpdatedBy;
	}

	
	public function countTasksRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(TaskPeer::UPDATED_BY, $this->getId());

		return TaskPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTaskRelatedByUpdatedBy(Task $l)
	{
		$this->collTasksRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}


	
	public function getTasksRelatedByUpdatedByJoinBudget($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasksRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collTasksRelatedByUpdatedBy = array();
			} else {

				$criteria->add(TaskPeer::UPDATED_BY, $this->getId());

				$this->collTasksRelatedByUpdatedBy = TaskPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastTaskRelatedByUpdatedByCriteria) || !$this->lastTaskRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collTasksRelatedByUpdatedBy = TaskPeer::doSelectJoinBudget($criteria, $con);
			}
		}
		$this->lastTaskRelatedByUpdatedByCriteria = $criteria;

		return $this->collTasksRelatedByUpdatedBy;
	}


	
	public function getTasksRelatedByUpdatedByJoinTaskPriority($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasksRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collTasksRelatedByUpdatedBy = array();
			} else {

				$criteria->add(TaskPeer::UPDATED_BY, $this->getId());

				$this->collTasksRelatedByUpdatedBy = TaskPeer::doSelectJoinTaskPriority($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastTaskRelatedByUpdatedByCriteria) || !$this->lastTaskRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collTasksRelatedByUpdatedBy = TaskPeer::doSelectJoinTaskPriority($criteria, $con);
			}
		}
		$this->lastTaskRelatedByUpdatedByCriteria = $criteria;

		return $this->collTasksRelatedByUpdatedBy;
	}


	
	public function getTasksRelatedByUpdatedByJoinMilestone($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasksRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collTasksRelatedByUpdatedBy = array();
			} else {

				$criteria->add(TaskPeer::UPDATED_BY, $this->getId());

				$this->collTasksRelatedByUpdatedBy = TaskPeer::doSelectJoinMilestone($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastTaskRelatedByUpdatedByCriteria) || !$this->lastTaskRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collTasksRelatedByUpdatedBy = TaskPeer::doSelectJoinMilestone($criteria, $con);
			}
		}
		$this->lastTaskRelatedByUpdatedByCriteria = $criteria;

		return $this->collTasksRelatedByUpdatedBy;
	}


	
	public function getTasksRelatedByUpdatedByJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasksRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collTasksRelatedByUpdatedBy = array();
			} else {

				$criteria->add(TaskPeer::UPDATED_BY, $this->getId());

				$this->collTasksRelatedByUpdatedBy = TaskPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastTaskRelatedByUpdatedByCriteria) || !$this->lastTaskRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collTasksRelatedByUpdatedBy = TaskPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastTaskRelatedByUpdatedByCriteria = $criteria;

		return $this->collTasksRelatedByUpdatedBy;
	}

	
	public function initTasksRelatedByDeletedBy()
	{
		if ($this->collTasksRelatedByDeletedBy === null) {
			$this->collTasksRelatedByDeletedBy = array();
		}
	}

	
	public function getTasksRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasksRelatedByDeletedBy === null) {
			if ($this->isNew()) {
			   $this->collTasksRelatedByDeletedBy = array();
			} else {

				$criteria->add(TaskPeer::DELETED_BY, $this->getId());

				TaskPeer::addSelectColumns($criteria);
				$this->collTasksRelatedByDeletedBy = TaskPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TaskPeer::DELETED_BY, $this->getId());

				TaskPeer::addSelectColumns($criteria);
				if (!isset($this->lastTaskRelatedByDeletedByCriteria) || !$this->lastTaskRelatedByDeletedByCriteria->equals($criteria)) {
					$this->collTasksRelatedByDeletedBy = TaskPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastTaskRelatedByDeletedByCriteria = $criteria;
		return $this->collTasksRelatedByDeletedBy;
	}

	
	public function countTasksRelatedByDeletedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(TaskPeer::DELETED_BY, $this->getId());

		return TaskPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTaskRelatedByDeletedBy(Task $l)
	{
		$this->collTasksRelatedByDeletedBy[] = $l;
		$l->setsfGuardUserRelatedByDeletedBy($this);
	}


	
	public function getTasksRelatedByDeletedByJoinBudget($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasksRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collTasksRelatedByDeletedBy = array();
			} else {

				$criteria->add(TaskPeer::DELETED_BY, $this->getId());

				$this->collTasksRelatedByDeletedBy = TaskPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::DELETED_BY, $this->getId());

			if (!isset($this->lastTaskRelatedByDeletedByCriteria) || !$this->lastTaskRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collTasksRelatedByDeletedBy = TaskPeer::doSelectJoinBudget($criteria, $con);
			}
		}
		$this->lastTaskRelatedByDeletedByCriteria = $criteria;

		return $this->collTasksRelatedByDeletedBy;
	}


	
	public function getTasksRelatedByDeletedByJoinTaskPriority($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasksRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collTasksRelatedByDeletedBy = array();
			} else {

				$criteria->add(TaskPeer::DELETED_BY, $this->getId());

				$this->collTasksRelatedByDeletedBy = TaskPeer::doSelectJoinTaskPriority($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::DELETED_BY, $this->getId());

			if (!isset($this->lastTaskRelatedByDeletedByCriteria) || !$this->lastTaskRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collTasksRelatedByDeletedBy = TaskPeer::doSelectJoinTaskPriority($criteria, $con);
			}
		}
		$this->lastTaskRelatedByDeletedByCriteria = $criteria;

		return $this->collTasksRelatedByDeletedBy;
	}


	
	public function getTasksRelatedByDeletedByJoinMilestone($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasksRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collTasksRelatedByDeletedBy = array();
			} else {

				$criteria->add(TaskPeer::DELETED_BY, $this->getId());

				$this->collTasksRelatedByDeletedBy = TaskPeer::doSelectJoinMilestone($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::DELETED_BY, $this->getId());

			if (!isset($this->lastTaskRelatedByDeletedByCriteria) || !$this->lastTaskRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collTasksRelatedByDeletedBy = TaskPeer::doSelectJoinMilestone($criteria, $con);
			}
		}
		$this->lastTaskRelatedByDeletedByCriteria = $criteria;

		return $this->collTasksRelatedByDeletedBy;
	}


	
	public function getTasksRelatedByDeletedByJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasksRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collTasksRelatedByDeletedBy = array();
			} else {

				$criteria->add(TaskPeer::DELETED_BY, $this->getId());

				$this->collTasksRelatedByDeletedBy = TaskPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::DELETED_BY, $this->getId());

			if (!isset($this->lastTaskRelatedByDeletedByCriteria) || !$this->lastTaskRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collTasksRelatedByDeletedBy = TaskPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastTaskRelatedByDeletedByCriteria = $criteria;

		return $this->collTasksRelatedByDeletedBy;
	}

	
	public function initFrequentlyTasksRelatedByCreatedBy()
	{
		if ($this->collFrequentlyTasksRelatedByCreatedBy === null) {
			$this->collFrequentlyTasksRelatedByCreatedBy = array();
		}
	}

	
	public function getFrequentlyTasksRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFrequentlyTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFrequentlyTasksRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collFrequentlyTasksRelatedByCreatedBy = array();
			} else {

				$criteria->add(FrequentlyTaskPeer::CREATED_BY, $this->getId());

				FrequentlyTaskPeer::addSelectColumns($criteria);
				$this->collFrequentlyTasksRelatedByCreatedBy = FrequentlyTaskPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FrequentlyTaskPeer::CREATED_BY, $this->getId());

				FrequentlyTaskPeer::addSelectColumns($criteria);
				if (!isset($this->lastFrequentlyTaskRelatedByCreatedByCriteria) || !$this->lastFrequentlyTaskRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collFrequentlyTasksRelatedByCreatedBy = FrequentlyTaskPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFrequentlyTaskRelatedByCreatedByCriteria = $criteria;
		return $this->collFrequentlyTasksRelatedByCreatedBy;
	}

	
	public function countFrequentlyTasksRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFrequentlyTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FrequentlyTaskPeer::CREATED_BY, $this->getId());

		return FrequentlyTaskPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFrequentlyTaskRelatedByCreatedBy(FrequentlyTask $l)
	{
		$this->collFrequentlyTasksRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserRelatedByCreatedBy($this);
	}


	
	public function getFrequentlyTasksRelatedByCreatedByJoinTaskPriority($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFrequentlyTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFrequentlyTasksRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collFrequentlyTasksRelatedByCreatedBy = array();
			} else {

				$criteria->add(FrequentlyTaskPeer::CREATED_BY, $this->getId());

				$this->collFrequentlyTasksRelatedByCreatedBy = FrequentlyTaskPeer::doSelectJoinTaskPriority($criteria, $con);
			}
		} else {
									
			$criteria->add(FrequentlyTaskPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastFrequentlyTaskRelatedByCreatedByCriteria) || !$this->lastFrequentlyTaskRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collFrequentlyTasksRelatedByCreatedBy = FrequentlyTaskPeer::doSelectJoinTaskPriority($criteria, $con);
			}
		}
		$this->lastFrequentlyTaskRelatedByCreatedByCriteria = $criteria;

		return $this->collFrequentlyTasksRelatedByCreatedBy;
	}

	
	public function initFrequentlyTasksRelatedByUpdatedBy()
	{
		if ($this->collFrequentlyTasksRelatedByUpdatedBy === null) {
			$this->collFrequentlyTasksRelatedByUpdatedBy = array();
		}
	}

	
	public function getFrequentlyTasksRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFrequentlyTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFrequentlyTasksRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collFrequentlyTasksRelatedByUpdatedBy = array();
			} else {

				$criteria->add(FrequentlyTaskPeer::UPDATED_BY, $this->getId());

				FrequentlyTaskPeer::addSelectColumns($criteria);
				$this->collFrequentlyTasksRelatedByUpdatedBy = FrequentlyTaskPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FrequentlyTaskPeer::UPDATED_BY, $this->getId());

				FrequentlyTaskPeer::addSelectColumns($criteria);
				if (!isset($this->lastFrequentlyTaskRelatedByUpdatedByCriteria) || !$this->lastFrequentlyTaskRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collFrequentlyTasksRelatedByUpdatedBy = FrequentlyTaskPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFrequentlyTaskRelatedByUpdatedByCriteria = $criteria;
		return $this->collFrequentlyTasksRelatedByUpdatedBy;
	}

	
	public function countFrequentlyTasksRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFrequentlyTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FrequentlyTaskPeer::UPDATED_BY, $this->getId());

		return FrequentlyTaskPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFrequentlyTaskRelatedByUpdatedBy(FrequentlyTask $l)
	{
		$this->collFrequentlyTasksRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}


	
	public function getFrequentlyTasksRelatedByUpdatedByJoinTaskPriority($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFrequentlyTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFrequentlyTasksRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collFrequentlyTasksRelatedByUpdatedBy = array();
			} else {

				$criteria->add(FrequentlyTaskPeer::UPDATED_BY, $this->getId());

				$this->collFrequentlyTasksRelatedByUpdatedBy = FrequentlyTaskPeer::doSelectJoinTaskPriority($criteria, $con);
			}
		} else {
									
			$criteria->add(FrequentlyTaskPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastFrequentlyTaskRelatedByUpdatedByCriteria) || !$this->lastFrequentlyTaskRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collFrequentlyTasksRelatedByUpdatedBy = FrequentlyTaskPeer::doSelectJoinTaskPriority($criteria, $con);
			}
		}
		$this->lastFrequentlyTaskRelatedByUpdatedByCriteria = $criteria;

		return $this->collFrequentlyTasksRelatedByUpdatedBy;
	}

	
	public function initFrequentlyTasksRelatedByDeletedBy()
	{
		if ($this->collFrequentlyTasksRelatedByDeletedBy === null) {
			$this->collFrequentlyTasksRelatedByDeletedBy = array();
		}
	}

	
	public function getFrequentlyTasksRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFrequentlyTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFrequentlyTasksRelatedByDeletedBy === null) {
			if ($this->isNew()) {
			   $this->collFrequentlyTasksRelatedByDeletedBy = array();
			} else {

				$criteria->add(FrequentlyTaskPeer::DELETED_BY, $this->getId());

				FrequentlyTaskPeer::addSelectColumns($criteria);
				$this->collFrequentlyTasksRelatedByDeletedBy = FrequentlyTaskPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FrequentlyTaskPeer::DELETED_BY, $this->getId());

				FrequentlyTaskPeer::addSelectColumns($criteria);
				if (!isset($this->lastFrequentlyTaskRelatedByDeletedByCriteria) || !$this->lastFrequentlyTaskRelatedByDeletedByCriteria->equals($criteria)) {
					$this->collFrequentlyTasksRelatedByDeletedBy = FrequentlyTaskPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFrequentlyTaskRelatedByDeletedByCriteria = $criteria;
		return $this->collFrequentlyTasksRelatedByDeletedBy;
	}

	
	public function countFrequentlyTasksRelatedByDeletedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFrequentlyTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FrequentlyTaskPeer::DELETED_BY, $this->getId());

		return FrequentlyTaskPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFrequentlyTaskRelatedByDeletedBy(FrequentlyTask $l)
	{
		$this->collFrequentlyTasksRelatedByDeletedBy[] = $l;
		$l->setsfGuardUserRelatedByDeletedBy($this);
	}


	
	public function getFrequentlyTasksRelatedByDeletedByJoinTaskPriority($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFrequentlyTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFrequentlyTasksRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collFrequentlyTasksRelatedByDeletedBy = array();
			} else {

				$criteria->add(FrequentlyTaskPeer::DELETED_BY, $this->getId());

				$this->collFrequentlyTasksRelatedByDeletedBy = FrequentlyTaskPeer::doSelectJoinTaskPriority($criteria, $con);
			}
		} else {
									
			$criteria->add(FrequentlyTaskPeer::DELETED_BY, $this->getId());

			if (!isset($this->lastFrequentlyTaskRelatedByDeletedByCriteria) || !$this->lastFrequentlyTaskRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collFrequentlyTasksRelatedByDeletedBy = FrequentlyTaskPeer::doSelectJoinTaskPriority($criteria, $con);
			}
		}
		$this->lastFrequentlyTaskRelatedByDeletedByCriteria = $criteria;

		return $this->collFrequentlyTasksRelatedByDeletedBy;
	}

	
	public function initInvoicesRelatedByCreatedBy()
	{
		if ($this->collInvoicesRelatedByCreatedBy === null) {
			$this->collInvoicesRelatedByCreatedBy = array();
		}
	}

	
	public function getInvoicesRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoicesRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collInvoicesRelatedByCreatedBy = array();
			} else {

				$criteria->add(InvoicePeer::CREATED_BY, $this->getId());

				InvoicePeer::addSelectColumns($criteria);
				$this->collInvoicesRelatedByCreatedBy = InvoicePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InvoicePeer::CREATED_BY, $this->getId());

				InvoicePeer::addSelectColumns($criteria);
				if (!isset($this->lastInvoiceRelatedByCreatedByCriteria) || !$this->lastInvoiceRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collInvoicesRelatedByCreatedBy = InvoicePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastInvoiceRelatedByCreatedByCriteria = $criteria;
		return $this->collInvoicesRelatedByCreatedBy;
	}

	
	public function countInvoicesRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(InvoicePeer::CREATED_BY, $this->getId());

		return InvoicePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInvoiceRelatedByCreatedBy(Invoice $l)
	{
		$this->collInvoicesRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserRelatedByCreatedBy($this);
	}


	
	public function getInvoicesRelatedByCreatedByJoinClient($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoicesRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collInvoicesRelatedByCreatedBy = array();
			} else {

				$criteria->add(InvoicePeer::CREATED_BY, $this->getId());

				$this->collInvoicesRelatedByCreatedBy = InvoicePeer::doSelectJoinClient($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::CREATED_BY, $this->getId());

			if (!isset($this->lastInvoiceRelatedByCreatedByCriteria) || !$this->lastInvoiceRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collInvoicesRelatedByCreatedBy = InvoicePeer::doSelectJoinClient($criteria, $con);
			}
		}
		$this->lastInvoiceRelatedByCreatedByCriteria = $criteria;

		return $this->collInvoicesRelatedByCreatedBy;
	}


	
	public function getInvoicesRelatedByCreatedByJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoicesRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collInvoicesRelatedByCreatedBy = array();
			} else {

				$criteria->add(InvoicePeer::CREATED_BY, $this->getId());

				$this->collInvoicesRelatedByCreatedBy = InvoicePeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::CREATED_BY, $this->getId());

			if (!isset($this->lastInvoiceRelatedByCreatedByCriteria) || !$this->lastInvoiceRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collInvoicesRelatedByCreatedBy = InvoicePeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastInvoiceRelatedByCreatedByCriteria = $criteria;

		return $this->collInvoicesRelatedByCreatedBy;
	}


	
	public function getInvoicesRelatedByCreatedByJoinBudget($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoicesRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collInvoicesRelatedByCreatedBy = array();
			} else {

				$criteria->add(InvoicePeer::CREATED_BY, $this->getId());

				$this->collInvoicesRelatedByCreatedBy = InvoicePeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::CREATED_BY, $this->getId());

			if (!isset($this->lastInvoiceRelatedByCreatedByCriteria) || !$this->lastInvoiceRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collInvoicesRelatedByCreatedBy = InvoicePeer::doSelectJoinBudget($criteria, $con);
			}
		}
		$this->lastInvoiceRelatedByCreatedByCriteria = $criteria;

		return $this->collInvoicesRelatedByCreatedBy;
	}


	
	public function getInvoicesRelatedByCreatedByJoinInvoiceCategory($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoicesRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collInvoicesRelatedByCreatedBy = array();
			} else {

				$criteria->add(InvoicePeer::CREATED_BY, $this->getId());

				$this->collInvoicesRelatedByCreatedBy = InvoicePeer::doSelectJoinInvoiceCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::CREATED_BY, $this->getId());

			if (!isset($this->lastInvoiceRelatedByCreatedByCriteria) || !$this->lastInvoiceRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collInvoicesRelatedByCreatedBy = InvoicePeer::doSelectJoinInvoiceCategory($criteria, $con);
			}
		}
		$this->lastInvoiceRelatedByCreatedByCriteria = $criteria;

		return $this->collInvoicesRelatedByCreatedBy;
	}


	
	public function getInvoicesRelatedByCreatedByJoinKindOfInvoice($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoicesRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collInvoicesRelatedByCreatedBy = array();
			} else {

				$criteria->add(InvoicePeer::CREATED_BY, $this->getId());

				$this->collInvoicesRelatedByCreatedBy = InvoicePeer::doSelectJoinKindOfInvoice($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::CREATED_BY, $this->getId());

			if (!isset($this->lastInvoiceRelatedByCreatedByCriteria) || !$this->lastInvoiceRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collInvoicesRelatedByCreatedBy = InvoicePeer::doSelectJoinKindOfInvoice($criteria, $con);
			}
		}
		$this->lastInvoiceRelatedByCreatedByCriteria = $criteria;

		return $this->collInvoicesRelatedByCreatedBy;
	}


	
	public function getInvoicesRelatedByCreatedByJoinPaymentCondition($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoicesRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collInvoicesRelatedByCreatedBy = array();
			} else {

				$criteria->add(InvoicePeer::CREATED_BY, $this->getId());

				$this->collInvoicesRelatedByCreatedBy = InvoicePeer::doSelectJoinPaymentCondition($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::CREATED_BY, $this->getId());

			if (!isset($this->lastInvoiceRelatedByCreatedByCriteria) || !$this->lastInvoiceRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collInvoicesRelatedByCreatedBy = InvoicePeer::doSelectJoinPaymentCondition($criteria, $con);
			}
		}
		$this->lastInvoiceRelatedByCreatedByCriteria = $criteria;

		return $this->collInvoicesRelatedByCreatedBy;
	}


	
	public function getInvoicesRelatedByCreatedByJoinPaymentMethod($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoicesRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collInvoicesRelatedByCreatedBy = array();
			} else {

				$criteria->add(InvoicePeer::CREATED_BY, $this->getId());

				$this->collInvoicesRelatedByCreatedBy = InvoicePeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::CREATED_BY, $this->getId());

			if (!isset($this->lastInvoiceRelatedByCreatedByCriteria) || !$this->lastInvoiceRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collInvoicesRelatedByCreatedBy = InvoicePeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		}
		$this->lastInvoiceRelatedByCreatedByCriteria = $criteria;

		return $this->collInvoicesRelatedByCreatedBy;
	}


	
	public function getInvoicesRelatedByCreatedByJoinPaymentStatus($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoicesRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collInvoicesRelatedByCreatedBy = array();
			} else {

				$criteria->add(InvoicePeer::CREATED_BY, $this->getId());

				$this->collInvoicesRelatedByCreatedBy = InvoicePeer::doSelectJoinPaymentStatus($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::CREATED_BY, $this->getId());

			if (!isset($this->lastInvoiceRelatedByCreatedByCriteria) || !$this->lastInvoiceRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collInvoicesRelatedByCreatedBy = InvoicePeer::doSelectJoinPaymentStatus($criteria, $con);
			}
		}
		$this->lastInvoiceRelatedByCreatedByCriteria = $criteria;

		return $this->collInvoicesRelatedByCreatedBy;
	}

	
	public function initInvoicesRelatedByUpdatedBy()
	{
		if ($this->collInvoicesRelatedByUpdatedBy === null) {
			$this->collInvoicesRelatedByUpdatedBy = array();
		}
	}

	
	public function getInvoicesRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoicesRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collInvoicesRelatedByUpdatedBy = array();
			} else {

				$criteria->add(InvoicePeer::UPDATED_BY, $this->getId());

				InvoicePeer::addSelectColumns($criteria);
				$this->collInvoicesRelatedByUpdatedBy = InvoicePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InvoicePeer::UPDATED_BY, $this->getId());

				InvoicePeer::addSelectColumns($criteria);
				if (!isset($this->lastInvoiceRelatedByUpdatedByCriteria) || !$this->lastInvoiceRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collInvoicesRelatedByUpdatedBy = InvoicePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastInvoiceRelatedByUpdatedByCriteria = $criteria;
		return $this->collInvoicesRelatedByUpdatedBy;
	}

	
	public function countInvoicesRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(InvoicePeer::UPDATED_BY, $this->getId());

		return InvoicePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInvoiceRelatedByUpdatedBy(Invoice $l)
	{
		$this->collInvoicesRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}


	
	public function getInvoicesRelatedByUpdatedByJoinClient($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoicesRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collInvoicesRelatedByUpdatedBy = array();
			} else {

				$criteria->add(InvoicePeer::UPDATED_BY, $this->getId());

				$this->collInvoicesRelatedByUpdatedBy = InvoicePeer::doSelectJoinClient($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastInvoiceRelatedByUpdatedByCriteria) || !$this->lastInvoiceRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collInvoicesRelatedByUpdatedBy = InvoicePeer::doSelectJoinClient($criteria, $con);
			}
		}
		$this->lastInvoiceRelatedByUpdatedByCriteria = $criteria;

		return $this->collInvoicesRelatedByUpdatedBy;
	}


	
	public function getInvoicesRelatedByUpdatedByJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoicesRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collInvoicesRelatedByUpdatedBy = array();
			} else {

				$criteria->add(InvoicePeer::UPDATED_BY, $this->getId());

				$this->collInvoicesRelatedByUpdatedBy = InvoicePeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastInvoiceRelatedByUpdatedByCriteria) || !$this->lastInvoiceRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collInvoicesRelatedByUpdatedBy = InvoicePeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastInvoiceRelatedByUpdatedByCriteria = $criteria;

		return $this->collInvoicesRelatedByUpdatedBy;
	}


	
	public function getInvoicesRelatedByUpdatedByJoinBudget($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoicesRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collInvoicesRelatedByUpdatedBy = array();
			} else {

				$criteria->add(InvoicePeer::UPDATED_BY, $this->getId());

				$this->collInvoicesRelatedByUpdatedBy = InvoicePeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastInvoiceRelatedByUpdatedByCriteria) || !$this->lastInvoiceRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collInvoicesRelatedByUpdatedBy = InvoicePeer::doSelectJoinBudget($criteria, $con);
			}
		}
		$this->lastInvoiceRelatedByUpdatedByCriteria = $criteria;

		return $this->collInvoicesRelatedByUpdatedBy;
	}


	
	public function getInvoicesRelatedByUpdatedByJoinInvoiceCategory($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoicesRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collInvoicesRelatedByUpdatedBy = array();
			} else {

				$criteria->add(InvoicePeer::UPDATED_BY, $this->getId());

				$this->collInvoicesRelatedByUpdatedBy = InvoicePeer::doSelectJoinInvoiceCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastInvoiceRelatedByUpdatedByCriteria) || !$this->lastInvoiceRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collInvoicesRelatedByUpdatedBy = InvoicePeer::doSelectJoinInvoiceCategory($criteria, $con);
			}
		}
		$this->lastInvoiceRelatedByUpdatedByCriteria = $criteria;

		return $this->collInvoicesRelatedByUpdatedBy;
	}


	
	public function getInvoicesRelatedByUpdatedByJoinKindOfInvoice($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoicesRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collInvoicesRelatedByUpdatedBy = array();
			} else {

				$criteria->add(InvoicePeer::UPDATED_BY, $this->getId());

				$this->collInvoicesRelatedByUpdatedBy = InvoicePeer::doSelectJoinKindOfInvoice($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastInvoiceRelatedByUpdatedByCriteria) || !$this->lastInvoiceRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collInvoicesRelatedByUpdatedBy = InvoicePeer::doSelectJoinKindOfInvoice($criteria, $con);
			}
		}
		$this->lastInvoiceRelatedByUpdatedByCriteria = $criteria;

		return $this->collInvoicesRelatedByUpdatedBy;
	}


	
	public function getInvoicesRelatedByUpdatedByJoinPaymentCondition($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoicesRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collInvoicesRelatedByUpdatedBy = array();
			} else {

				$criteria->add(InvoicePeer::UPDATED_BY, $this->getId());

				$this->collInvoicesRelatedByUpdatedBy = InvoicePeer::doSelectJoinPaymentCondition($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastInvoiceRelatedByUpdatedByCriteria) || !$this->lastInvoiceRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collInvoicesRelatedByUpdatedBy = InvoicePeer::doSelectJoinPaymentCondition($criteria, $con);
			}
		}
		$this->lastInvoiceRelatedByUpdatedByCriteria = $criteria;

		return $this->collInvoicesRelatedByUpdatedBy;
	}


	
	public function getInvoicesRelatedByUpdatedByJoinPaymentMethod($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoicesRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collInvoicesRelatedByUpdatedBy = array();
			} else {

				$criteria->add(InvoicePeer::UPDATED_BY, $this->getId());

				$this->collInvoicesRelatedByUpdatedBy = InvoicePeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastInvoiceRelatedByUpdatedByCriteria) || !$this->lastInvoiceRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collInvoicesRelatedByUpdatedBy = InvoicePeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		}
		$this->lastInvoiceRelatedByUpdatedByCriteria = $criteria;

		return $this->collInvoicesRelatedByUpdatedBy;
	}


	
	public function getInvoicesRelatedByUpdatedByJoinPaymentStatus($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoicesRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collInvoicesRelatedByUpdatedBy = array();
			} else {

				$criteria->add(InvoicePeer::UPDATED_BY, $this->getId());

				$this->collInvoicesRelatedByUpdatedBy = InvoicePeer::doSelectJoinPaymentStatus($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastInvoiceRelatedByUpdatedByCriteria) || !$this->lastInvoiceRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collInvoicesRelatedByUpdatedBy = InvoicePeer::doSelectJoinPaymentStatus($criteria, $con);
			}
		}
		$this->lastInvoiceRelatedByUpdatedByCriteria = $criteria;

		return $this->collInvoicesRelatedByUpdatedBy;
	}

	
	public function initInvoicesRelatedByDeletedBy()
	{
		if ($this->collInvoicesRelatedByDeletedBy === null) {
			$this->collInvoicesRelatedByDeletedBy = array();
		}
	}

	
	public function getInvoicesRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoicesRelatedByDeletedBy === null) {
			if ($this->isNew()) {
			   $this->collInvoicesRelatedByDeletedBy = array();
			} else {

				$criteria->add(InvoicePeer::DELETED_BY, $this->getId());

				InvoicePeer::addSelectColumns($criteria);
				$this->collInvoicesRelatedByDeletedBy = InvoicePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InvoicePeer::DELETED_BY, $this->getId());

				InvoicePeer::addSelectColumns($criteria);
				if (!isset($this->lastInvoiceRelatedByDeletedByCriteria) || !$this->lastInvoiceRelatedByDeletedByCriteria->equals($criteria)) {
					$this->collInvoicesRelatedByDeletedBy = InvoicePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastInvoiceRelatedByDeletedByCriteria = $criteria;
		return $this->collInvoicesRelatedByDeletedBy;
	}

	
	public function countInvoicesRelatedByDeletedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(InvoicePeer::DELETED_BY, $this->getId());

		return InvoicePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInvoiceRelatedByDeletedBy(Invoice $l)
	{
		$this->collInvoicesRelatedByDeletedBy[] = $l;
		$l->setsfGuardUserRelatedByDeletedBy($this);
	}


	
	public function getInvoicesRelatedByDeletedByJoinClient($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoicesRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collInvoicesRelatedByDeletedBy = array();
			} else {

				$criteria->add(InvoicePeer::DELETED_BY, $this->getId());

				$this->collInvoicesRelatedByDeletedBy = InvoicePeer::doSelectJoinClient($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::DELETED_BY, $this->getId());

			if (!isset($this->lastInvoiceRelatedByDeletedByCriteria) || !$this->lastInvoiceRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collInvoicesRelatedByDeletedBy = InvoicePeer::doSelectJoinClient($criteria, $con);
			}
		}
		$this->lastInvoiceRelatedByDeletedByCriteria = $criteria;

		return $this->collInvoicesRelatedByDeletedBy;
	}


	
	public function getInvoicesRelatedByDeletedByJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoicesRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collInvoicesRelatedByDeletedBy = array();
			} else {

				$criteria->add(InvoicePeer::DELETED_BY, $this->getId());

				$this->collInvoicesRelatedByDeletedBy = InvoicePeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::DELETED_BY, $this->getId());

			if (!isset($this->lastInvoiceRelatedByDeletedByCriteria) || !$this->lastInvoiceRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collInvoicesRelatedByDeletedBy = InvoicePeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastInvoiceRelatedByDeletedByCriteria = $criteria;

		return $this->collInvoicesRelatedByDeletedBy;
	}


	
	public function getInvoicesRelatedByDeletedByJoinBudget($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoicesRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collInvoicesRelatedByDeletedBy = array();
			} else {

				$criteria->add(InvoicePeer::DELETED_BY, $this->getId());

				$this->collInvoicesRelatedByDeletedBy = InvoicePeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::DELETED_BY, $this->getId());

			if (!isset($this->lastInvoiceRelatedByDeletedByCriteria) || !$this->lastInvoiceRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collInvoicesRelatedByDeletedBy = InvoicePeer::doSelectJoinBudget($criteria, $con);
			}
		}
		$this->lastInvoiceRelatedByDeletedByCriteria = $criteria;

		return $this->collInvoicesRelatedByDeletedBy;
	}


	
	public function getInvoicesRelatedByDeletedByJoinInvoiceCategory($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoicesRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collInvoicesRelatedByDeletedBy = array();
			} else {

				$criteria->add(InvoicePeer::DELETED_BY, $this->getId());

				$this->collInvoicesRelatedByDeletedBy = InvoicePeer::doSelectJoinInvoiceCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::DELETED_BY, $this->getId());

			if (!isset($this->lastInvoiceRelatedByDeletedByCriteria) || !$this->lastInvoiceRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collInvoicesRelatedByDeletedBy = InvoicePeer::doSelectJoinInvoiceCategory($criteria, $con);
			}
		}
		$this->lastInvoiceRelatedByDeletedByCriteria = $criteria;

		return $this->collInvoicesRelatedByDeletedBy;
	}


	
	public function getInvoicesRelatedByDeletedByJoinKindOfInvoice($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoicesRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collInvoicesRelatedByDeletedBy = array();
			} else {

				$criteria->add(InvoicePeer::DELETED_BY, $this->getId());

				$this->collInvoicesRelatedByDeletedBy = InvoicePeer::doSelectJoinKindOfInvoice($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::DELETED_BY, $this->getId());

			if (!isset($this->lastInvoiceRelatedByDeletedByCriteria) || !$this->lastInvoiceRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collInvoicesRelatedByDeletedBy = InvoicePeer::doSelectJoinKindOfInvoice($criteria, $con);
			}
		}
		$this->lastInvoiceRelatedByDeletedByCriteria = $criteria;

		return $this->collInvoicesRelatedByDeletedBy;
	}


	
	public function getInvoicesRelatedByDeletedByJoinPaymentCondition($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoicesRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collInvoicesRelatedByDeletedBy = array();
			} else {

				$criteria->add(InvoicePeer::DELETED_BY, $this->getId());

				$this->collInvoicesRelatedByDeletedBy = InvoicePeer::doSelectJoinPaymentCondition($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::DELETED_BY, $this->getId());

			if (!isset($this->lastInvoiceRelatedByDeletedByCriteria) || !$this->lastInvoiceRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collInvoicesRelatedByDeletedBy = InvoicePeer::doSelectJoinPaymentCondition($criteria, $con);
			}
		}
		$this->lastInvoiceRelatedByDeletedByCriteria = $criteria;

		return $this->collInvoicesRelatedByDeletedBy;
	}


	
	public function getInvoicesRelatedByDeletedByJoinPaymentMethod($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoicesRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collInvoicesRelatedByDeletedBy = array();
			} else {

				$criteria->add(InvoicePeer::DELETED_BY, $this->getId());

				$this->collInvoicesRelatedByDeletedBy = InvoicePeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::DELETED_BY, $this->getId());

			if (!isset($this->lastInvoiceRelatedByDeletedByCriteria) || !$this->lastInvoiceRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collInvoicesRelatedByDeletedBy = InvoicePeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		}
		$this->lastInvoiceRelatedByDeletedByCriteria = $criteria;

		return $this->collInvoicesRelatedByDeletedBy;
	}


	
	public function getInvoicesRelatedByDeletedByJoinPaymentStatus($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInvoicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInvoicesRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collInvoicesRelatedByDeletedBy = array();
			} else {

				$criteria->add(InvoicePeer::DELETED_BY, $this->getId());

				$this->collInvoicesRelatedByDeletedBy = InvoicePeer::doSelectJoinPaymentStatus($criteria, $con);
			}
		} else {
									
			$criteria->add(InvoicePeer::DELETED_BY, $this->getId());

			if (!isset($this->lastInvoiceRelatedByDeletedByCriteria) || !$this->lastInvoiceRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collInvoicesRelatedByDeletedBy = InvoicePeer::doSelectJoinPaymentStatus($criteria, $con);
			}
		}
		$this->lastInvoiceRelatedByDeletedByCriteria = $criteria;

		return $this->collInvoicesRelatedByDeletedBy;
	}

	
	public function initBudgetsRelatedByCreatedBy()
	{
		if ($this->collBudgetsRelatedByCreatedBy === null) {
			$this->collBudgetsRelatedByCreatedBy = array();
		}
	}

	
	public function getBudgetsRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgetsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collBudgetsRelatedByCreatedBy = array();
			} else {

				$criteria->add(BudgetPeer::CREATED_BY, $this->getId());

				BudgetPeer::addSelectColumns($criteria);
				$this->collBudgetsRelatedByCreatedBy = BudgetPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(BudgetPeer::CREATED_BY, $this->getId());

				BudgetPeer::addSelectColumns($criteria);
				if (!isset($this->lastBudgetRelatedByCreatedByCriteria) || !$this->lastBudgetRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collBudgetsRelatedByCreatedBy = BudgetPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastBudgetRelatedByCreatedByCriteria = $criteria;
		return $this->collBudgetsRelatedByCreatedBy;
	}

	
	public function countBudgetsRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(BudgetPeer::CREATED_BY, $this->getId());

		return BudgetPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addBudgetRelatedByCreatedBy(Budget $l)
	{
		$this->collBudgetsRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserRelatedByCreatedBy($this);
	}


	
	public function getBudgetsRelatedByCreatedByJoinBudgetStatus($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgetsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collBudgetsRelatedByCreatedBy = array();
			} else {

				$criteria->add(BudgetPeer::CREATED_BY, $this->getId());

				$this->collBudgetsRelatedByCreatedBy = BudgetPeer::doSelectJoinBudgetStatus($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastBudgetRelatedByCreatedByCriteria) || !$this->lastBudgetRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collBudgetsRelatedByCreatedBy = BudgetPeer::doSelectJoinBudgetStatus($criteria, $con);
			}
		}
		$this->lastBudgetRelatedByCreatedByCriteria = $criteria;

		return $this->collBudgetsRelatedByCreatedBy;
	}


	
	public function getBudgetsRelatedByCreatedByJoinPaymentCondition($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgetsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collBudgetsRelatedByCreatedBy = array();
			} else {

				$criteria->add(BudgetPeer::CREATED_BY, $this->getId());

				$this->collBudgetsRelatedByCreatedBy = BudgetPeer::doSelectJoinPaymentCondition($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastBudgetRelatedByCreatedByCriteria) || !$this->lastBudgetRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collBudgetsRelatedByCreatedBy = BudgetPeer::doSelectJoinPaymentCondition($criteria, $con);
			}
		}
		$this->lastBudgetRelatedByCreatedByCriteria = $criteria;

		return $this->collBudgetsRelatedByCreatedBy;
	}


	
	public function getBudgetsRelatedByCreatedByJoinInvoiceCategory($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgetsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collBudgetsRelatedByCreatedBy = array();
			} else {

				$criteria->add(BudgetPeer::CREATED_BY, $this->getId());

				$this->collBudgetsRelatedByCreatedBy = BudgetPeer::doSelectJoinInvoiceCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastBudgetRelatedByCreatedByCriteria) || !$this->lastBudgetRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collBudgetsRelatedByCreatedBy = BudgetPeer::doSelectJoinInvoiceCategory($criteria, $con);
			}
		}
		$this->lastBudgetRelatedByCreatedByCriteria = $criteria;

		return $this->collBudgetsRelatedByCreatedBy;
	}


	
	public function getBudgetsRelatedByCreatedByJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgetsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collBudgetsRelatedByCreatedBy = array();
			} else {

				$criteria->add(BudgetPeer::CREATED_BY, $this->getId());

				$this->collBudgetsRelatedByCreatedBy = BudgetPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastBudgetRelatedByCreatedByCriteria) || !$this->lastBudgetRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collBudgetsRelatedByCreatedBy = BudgetPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastBudgetRelatedByCreatedByCriteria = $criteria;

		return $this->collBudgetsRelatedByCreatedBy;
	}


	
	public function getBudgetsRelatedByCreatedByJoinClient($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgetsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collBudgetsRelatedByCreatedBy = array();
			} else {

				$criteria->add(BudgetPeer::CREATED_BY, $this->getId());

				$this->collBudgetsRelatedByCreatedBy = BudgetPeer::doSelectJoinClient($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastBudgetRelatedByCreatedByCriteria) || !$this->lastBudgetRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collBudgetsRelatedByCreatedBy = BudgetPeer::doSelectJoinClient($criteria, $con);
			}
		}
		$this->lastBudgetRelatedByCreatedByCriteria = $criteria;

		return $this->collBudgetsRelatedByCreatedBy;
	}

	
	public function initBudgetsRelatedByUpdatedBy()
	{
		if ($this->collBudgetsRelatedByUpdatedBy === null) {
			$this->collBudgetsRelatedByUpdatedBy = array();
		}
	}

	
	public function getBudgetsRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgetsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collBudgetsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(BudgetPeer::UPDATED_BY, $this->getId());

				BudgetPeer::addSelectColumns($criteria);
				$this->collBudgetsRelatedByUpdatedBy = BudgetPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(BudgetPeer::UPDATED_BY, $this->getId());

				BudgetPeer::addSelectColumns($criteria);
				if (!isset($this->lastBudgetRelatedByUpdatedByCriteria) || !$this->lastBudgetRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collBudgetsRelatedByUpdatedBy = BudgetPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastBudgetRelatedByUpdatedByCriteria = $criteria;
		return $this->collBudgetsRelatedByUpdatedBy;
	}

	
	public function countBudgetsRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(BudgetPeer::UPDATED_BY, $this->getId());

		return BudgetPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addBudgetRelatedByUpdatedBy(Budget $l)
	{
		$this->collBudgetsRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}


	
	public function getBudgetsRelatedByUpdatedByJoinBudgetStatus($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgetsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collBudgetsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(BudgetPeer::UPDATED_BY, $this->getId());

				$this->collBudgetsRelatedByUpdatedBy = BudgetPeer::doSelectJoinBudgetStatus($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastBudgetRelatedByUpdatedByCriteria) || !$this->lastBudgetRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collBudgetsRelatedByUpdatedBy = BudgetPeer::doSelectJoinBudgetStatus($criteria, $con);
			}
		}
		$this->lastBudgetRelatedByUpdatedByCriteria = $criteria;

		return $this->collBudgetsRelatedByUpdatedBy;
	}


	
	public function getBudgetsRelatedByUpdatedByJoinPaymentCondition($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgetsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collBudgetsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(BudgetPeer::UPDATED_BY, $this->getId());

				$this->collBudgetsRelatedByUpdatedBy = BudgetPeer::doSelectJoinPaymentCondition($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastBudgetRelatedByUpdatedByCriteria) || !$this->lastBudgetRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collBudgetsRelatedByUpdatedBy = BudgetPeer::doSelectJoinPaymentCondition($criteria, $con);
			}
		}
		$this->lastBudgetRelatedByUpdatedByCriteria = $criteria;

		return $this->collBudgetsRelatedByUpdatedBy;
	}


	
	public function getBudgetsRelatedByUpdatedByJoinInvoiceCategory($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgetsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collBudgetsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(BudgetPeer::UPDATED_BY, $this->getId());

				$this->collBudgetsRelatedByUpdatedBy = BudgetPeer::doSelectJoinInvoiceCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastBudgetRelatedByUpdatedByCriteria) || !$this->lastBudgetRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collBudgetsRelatedByUpdatedBy = BudgetPeer::doSelectJoinInvoiceCategory($criteria, $con);
			}
		}
		$this->lastBudgetRelatedByUpdatedByCriteria = $criteria;

		return $this->collBudgetsRelatedByUpdatedBy;
	}


	
	public function getBudgetsRelatedByUpdatedByJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgetsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collBudgetsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(BudgetPeer::UPDATED_BY, $this->getId());

				$this->collBudgetsRelatedByUpdatedBy = BudgetPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastBudgetRelatedByUpdatedByCriteria) || !$this->lastBudgetRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collBudgetsRelatedByUpdatedBy = BudgetPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastBudgetRelatedByUpdatedByCriteria = $criteria;

		return $this->collBudgetsRelatedByUpdatedBy;
	}


	
	public function getBudgetsRelatedByUpdatedByJoinClient($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgetsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collBudgetsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(BudgetPeer::UPDATED_BY, $this->getId());

				$this->collBudgetsRelatedByUpdatedBy = BudgetPeer::doSelectJoinClient($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastBudgetRelatedByUpdatedByCriteria) || !$this->lastBudgetRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collBudgetsRelatedByUpdatedBy = BudgetPeer::doSelectJoinClient($criteria, $con);
			}
		}
		$this->lastBudgetRelatedByUpdatedByCriteria = $criteria;

		return $this->collBudgetsRelatedByUpdatedBy;
	}

	
	public function initBudgetsRelatedByDeletedBy()
	{
		if ($this->collBudgetsRelatedByDeletedBy === null) {
			$this->collBudgetsRelatedByDeletedBy = array();
		}
	}

	
	public function getBudgetsRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgetsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
			   $this->collBudgetsRelatedByDeletedBy = array();
			} else {

				$criteria->add(BudgetPeer::DELETED_BY, $this->getId());

				BudgetPeer::addSelectColumns($criteria);
				$this->collBudgetsRelatedByDeletedBy = BudgetPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(BudgetPeer::DELETED_BY, $this->getId());

				BudgetPeer::addSelectColumns($criteria);
				if (!isset($this->lastBudgetRelatedByDeletedByCriteria) || !$this->lastBudgetRelatedByDeletedByCriteria->equals($criteria)) {
					$this->collBudgetsRelatedByDeletedBy = BudgetPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastBudgetRelatedByDeletedByCriteria = $criteria;
		return $this->collBudgetsRelatedByDeletedBy;
	}

	
	public function countBudgetsRelatedByDeletedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(BudgetPeer::DELETED_BY, $this->getId());

		return BudgetPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addBudgetRelatedByDeletedBy(Budget $l)
	{
		$this->collBudgetsRelatedByDeletedBy[] = $l;
		$l->setsfGuardUserRelatedByDeletedBy($this);
	}


	
	public function getBudgetsRelatedByDeletedByJoinBudgetStatus($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgetsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collBudgetsRelatedByDeletedBy = array();
			} else {

				$criteria->add(BudgetPeer::DELETED_BY, $this->getId());

				$this->collBudgetsRelatedByDeletedBy = BudgetPeer::doSelectJoinBudgetStatus($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::DELETED_BY, $this->getId());

			if (!isset($this->lastBudgetRelatedByDeletedByCriteria) || !$this->lastBudgetRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collBudgetsRelatedByDeletedBy = BudgetPeer::doSelectJoinBudgetStatus($criteria, $con);
			}
		}
		$this->lastBudgetRelatedByDeletedByCriteria = $criteria;

		return $this->collBudgetsRelatedByDeletedBy;
	}


	
	public function getBudgetsRelatedByDeletedByJoinPaymentCondition($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgetsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collBudgetsRelatedByDeletedBy = array();
			} else {

				$criteria->add(BudgetPeer::DELETED_BY, $this->getId());

				$this->collBudgetsRelatedByDeletedBy = BudgetPeer::doSelectJoinPaymentCondition($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::DELETED_BY, $this->getId());

			if (!isset($this->lastBudgetRelatedByDeletedByCriteria) || !$this->lastBudgetRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collBudgetsRelatedByDeletedBy = BudgetPeer::doSelectJoinPaymentCondition($criteria, $con);
			}
		}
		$this->lastBudgetRelatedByDeletedByCriteria = $criteria;

		return $this->collBudgetsRelatedByDeletedBy;
	}


	
	public function getBudgetsRelatedByDeletedByJoinInvoiceCategory($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgetsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collBudgetsRelatedByDeletedBy = array();
			} else {

				$criteria->add(BudgetPeer::DELETED_BY, $this->getId());

				$this->collBudgetsRelatedByDeletedBy = BudgetPeer::doSelectJoinInvoiceCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::DELETED_BY, $this->getId());

			if (!isset($this->lastBudgetRelatedByDeletedByCriteria) || !$this->lastBudgetRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collBudgetsRelatedByDeletedBy = BudgetPeer::doSelectJoinInvoiceCategory($criteria, $con);
			}
		}
		$this->lastBudgetRelatedByDeletedByCriteria = $criteria;

		return $this->collBudgetsRelatedByDeletedBy;
	}


	
	public function getBudgetsRelatedByDeletedByJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgetsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collBudgetsRelatedByDeletedBy = array();
			} else {

				$criteria->add(BudgetPeer::DELETED_BY, $this->getId());

				$this->collBudgetsRelatedByDeletedBy = BudgetPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::DELETED_BY, $this->getId());

			if (!isset($this->lastBudgetRelatedByDeletedByCriteria) || !$this->lastBudgetRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collBudgetsRelatedByDeletedBy = BudgetPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastBudgetRelatedByDeletedByCriteria = $criteria;

		return $this->collBudgetsRelatedByDeletedBy;
	}


	
	public function getBudgetsRelatedByDeletedByJoinClient($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBudgetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBudgetsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collBudgetsRelatedByDeletedBy = array();
			} else {

				$criteria->add(BudgetPeer::DELETED_BY, $this->getId());

				$this->collBudgetsRelatedByDeletedBy = BudgetPeer::doSelectJoinClient($criteria, $con);
			}
		} else {
									
			$criteria->add(BudgetPeer::DELETED_BY, $this->getId());

			if (!isset($this->lastBudgetRelatedByDeletedByCriteria) || !$this->lastBudgetRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collBudgetsRelatedByDeletedBy = BudgetPeer::doSelectJoinClient($criteria, $con);
			}
		}
		$this->lastBudgetRelatedByDeletedByCriteria = $criteria;

		return $this->collBudgetsRelatedByDeletedBy;
	}

	
	public function initVendorsRelatedByCreatedBy()
	{
		if ($this->collVendorsRelatedByCreatedBy === null) {
			$this->collVendorsRelatedByCreatedBy = array();
		}
	}

	
	public function getVendorsRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseVendorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collVendorsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collVendorsRelatedByCreatedBy = array();
			} else {

				$criteria->add(VendorPeer::CREATED_BY, $this->getId());

				VendorPeer::addSelectColumns($criteria);
				$this->collVendorsRelatedByCreatedBy = VendorPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(VendorPeer::CREATED_BY, $this->getId());

				VendorPeer::addSelectColumns($criteria);
				if (!isset($this->lastVendorRelatedByCreatedByCriteria) || !$this->lastVendorRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collVendorsRelatedByCreatedBy = VendorPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastVendorRelatedByCreatedByCriteria = $criteria;
		return $this->collVendorsRelatedByCreatedBy;
	}

	
	public function countVendorsRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseVendorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(VendorPeer::CREATED_BY, $this->getId());

		return VendorPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addVendorRelatedByCreatedBy(Vendor $l)
	{
		$this->collVendorsRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserRelatedByCreatedBy($this);
	}


	
	public function getVendorsRelatedByCreatedByJoinKindOfCompany($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseVendorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collVendorsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collVendorsRelatedByCreatedBy = array();
			} else {

				$criteria->add(VendorPeer::CREATED_BY, $this->getId());

				$this->collVendorsRelatedByCreatedBy = VendorPeer::doSelectJoinKindOfCompany($criteria, $con);
			}
		} else {
									
			$criteria->add(VendorPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastVendorRelatedByCreatedByCriteria) || !$this->lastVendorRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collVendorsRelatedByCreatedBy = VendorPeer::doSelectJoinKindOfCompany($criteria, $con);
			}
		}
		$this->lastVendorRelatedByCreatedByCriteria = $criteria;

		return $this->collVendorsRelatedByCreatedBy;
	}

	
	public function initVendorsRelatedByUpdatedBy()
	{
		if ($this->collVendorsRelatedByUpdatedBy === null) {
			$this->collVendorsRelatedByUpdatedBy = array();
		}
	}

	
	public function getVendorsRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseVendorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collVendorsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collVendorsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(VendorPeer::UPDATED_BY, $this->getId());

				VendorPeer::addSelectColumns($criteria);
				$this->collVendorsRelatedByUpdatedBy = VendorPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(VendorPeer::UPDATED_BY, $this->getId());

				VendorPeer::addSelectColumns($criteria);
				if (!isset($this->lastVendorRelatedByUpdatedByCriteria) || !$this->lastVendorRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collVendorsRelatedByUpdatedBy = VendorPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastVendorRelatedByUpdatedByCriteria = $criteria;
		return $this->collVendorsRelatedByUpdatedBy;
	}

	
	public function countVendorsRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseVendorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(VendorPeer::UPDATED_BY, $this->getId());

		return VendorPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addVendorRelatedByUpdatedBy(Vendor $l)
	{
		$this->collVendorsRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}


	
	public function getVendorsRelatedByUpdatedByJoinKindOfCompany($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseVendorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collVendorsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collVendorsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(VendorPeer::UPDATED_BY, $this->getId());

				$this->collVendorsRelatedByUpdatedBy = VendorPeer::doSelectJoinKindOfCompany($criteria, $con);
			}
		} else {
									
			$criteria->add(VendorPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastVendorRelatedByUpdatedByCriteria) || !$this->lastVendorRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collVendorsRelatedByUpdatedBy = VendorPeer::doSelectJoinKindOfCompany($criteria, $con);
			}
		}
		$this->lastVendorRelatedByUpdatedByCriteria = $criteria;

		return $this->collVendorsRelatedByUpdatedBy;
	}

	
	public function initVendorsRelatedByDeletedBy()
	{
		if ($this->collVendorsRelatedByDeletedBy === null) {
			$this->collVendorsRelatedByDeletedBy = array();
		}
	}

	
	public function getVendorsRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseVendorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collVendorsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
			   $this->collVendorsRelatedByDeletedBy = array();
			} else {

				$criteria->add(VendorPeer::DELETED_BY, $this->getId());

				VendorPeer::addSelectColumns($criteria);
				$this->collVendorsRelatedByDeletedBy = VendorPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(VendorPeer::DELETED_BY, $this->getId());

				VendorPeer::addSelectColumns($criteria);
				if (!isset($this->lastVendorRelatedByDeletedByCriteria) || !$this->lastVendorRelatedByDeletedByCriteria->equals($criteria)) {
					$this->collVendorsRelatedByDeletedBy = VendorPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastVendorRelatedByDeletedByCriteria = $criteria;
		return $this->collVendorsRelatedByDeletedBy;
	}

	
	public function countVendorsRelatedByDeletedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseVendorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(VendorPeer::DELETED_BY, $this->getId());

		return VendorPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addVendorRelatedByDeletedBy(Vendor $l)
	{
		$this->collVendorsRelatedByDeletedBy[] = $l;
		$l->setsfGuardUserRelatedByDeletedBy($this);
	}


	
	public function getVendorsRelatedByDeletedByJoinKindOfCompany($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseVendorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collVendorsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collVendorsRelatedByDeletedBy = array();
			} else {

				$criteria->add(VendorPeer::DELETED_BY, $this->getId());

				$this->collVendorsRelatedByDeletedBy = VendorPeer::doSelectJoinKindOfCompany($criteria, $con);
			}
		} else {
									
			$criteria->add(VendorPeer::DELETED_BY, $this->getId());

			if (!isset($this->lastVendorRelatedByDeletedByCriteria) || !$this->lastVendorRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collVendorsRelatedByDeletedBy = VendorPeer::doSelectJoinKindOfCompany($criteria, $con);
			}
		}
		$this->lastVendorRelatedByDeletedByCriteria = $criteria;

		return $this->collVendorsRelatedByDeletedBy;
	}

	
	public function initExpenseItemsRelatedByExpensePurchaseBy()
	{
		if ($this->collExpenseItemsRelatedByExpensePurchaseBy === null) {
			$this->collExpenseItemsRelatedByExpensePurchaseBy = array();
		}
	}

	
	public function getExpenseItemsRelatedByExpensePurchaseBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByExpensePurchaseBy === null) {
			if ($this->isNew()) {
			   $this->collExpenseItemsRelatedByExpensePurchaseBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_PURCHASE_BY, $this->getId());

				ExpenseItemPeer::addSelectColumns($criteria);
				$this->collExpenseItemsRelatedByExpensePurchaseBy = ExpenseItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ExpenseItemPeer::EXPENSE_PURCHASE_BY, $this->getId());

				ExpenseItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastExpenseItemRelatedByExpensePurchaseByCriteria) || !$this->lastExpenseItemRelatedByExpensePurchaseByCriteria->equals($criteria)) {
					$this->collExpenseItemsRelatedByExpensePurchaseBy = ExpenseItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastExpenseItemRelatedByExpensePurchaseByCriteria = $criteria;
		return $this->collExpenseItemsRelatedByExpensePurchaseBy;
	}

	
	public function countExpenseItemsRelatedByExpensePurchaseBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ExpenseItemPeer::EXPENSE_PURCHASE_BY, $this->getId());

		return ExpenseItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addExpenseItemRelatedByExpensePurchaseBy(ExpenseItem $l)
	{
		$this->collExpenseItemsRelatedByExpensePurchaseBy[] = $l;
		$l->setsfGuardUserRelatedByExpensePurchaseBy($this);
	}


	
	public function getExpenseItemsRelatedByExpensePurchaseByJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByExpensePurchaseBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByExpensePurchaseBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_PURCHASE_BY, $this->getId());

				$this->collExpenseItemsRelatedByExpensePurchaseBy = ExpenseItemPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_PURCHASE_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByExpensePurchaseByCriteria) || !$this->lastExpenseItemRelatedByExpensePurchaseByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByExpensePurchaseBy = ExpenseItemPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByExpensePurchaseByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByExpensePurchaseBy;
	}


	
	public function getExpenseItemsRelatedByExpensePurchaseByJoinVendor($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByExpensePurchaseBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByExpensePurchaseBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_PURCHASE_BY, $this->getId());

				$this->collExpenseItemsRelatedByExpensePurchaseBy = ExpenseItemPeer::doSelectJoinVendor($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_PURCHASE_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByExpensePurchaseByCriteria) || !$this->lastExpenseItemRelatedByExpensePurchaseByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByExpensePurchaseBy = ExpenseItemPeer::doSelectJoinVendor($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByExpensePurchaseByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByExpensePurchaseBy;
	}


	
	public function getExpenseItemsRelatedByExpensePurchaseByJoinExpenseCategory($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByExpensePurchaseBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByExpensePurchaseBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_PURCHASE_BY, $this->getId());

				$this->collExpenseItemsRelatedByExpensePurchaseBy = ExpenseItemPeer::doSelectJoinExpenseCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_PURCHASE_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByExpensePurchaseByCriteria) || !$this->lastExpenseItemRelatedByExpensePurchaseByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByExpensePurchaseBy = ExpenseItemPeer::doSelectJoinExpenseCategory($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByExpensePurchaseByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByExpensePurchaseBy;
	}


	
	public function getExpenseItemsRelatedByExpensePurchaseByJoinPaymentMethod($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByExpensePurchaseBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByExpensePurchaseBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_PURCHASE_BY, $this->getId());

				$this->collExpenseItemsRelatedByExpensePurchaseBy = ExpenseItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_PURCHASE_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByExpensePurchaseByCriteria) || !$this->lastExpenseItemRelatedByExpensePurchaseByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByExpensePurchaseBy = ExpenseItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByExpensePurchaseByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByExpensePurchaseBy;
	}


	
	public function getExpenseItemsRelatedByExpensePurchaseByJoinReimbursement($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByExpensePurchaseBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByExpensePurchaseBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_PURCHASE_BY, $this->getId());

				$this->collExpenseItemsRelatedByExpensePurchaseBy = ExpenseItemPeer::doSelectJoinReimbursement($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_PURCHASE_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByExpensePurchaseByCriteria) || !$this->lastExpenseItemRelatedByExpensePurchaseByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByExpensePurchaseBy = ExpenseItemPeer::doSelectJoinReimbursement($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByExpensePurchaseByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByExpensePurchaseBy;
	}


	
	public function getExpenseItemsRelatedByExpensePurchaseByJoinBudget($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByExpensePurchaseBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByExpensePurchaseBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_PURCHASE_BY, $this->getId());

				$this->collExpenseItemsRelatedByExpensePurchaseBy = ExpenseItemPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_PURCHASE_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByExpensePurchaseByCriteria) || !$this->lastExpenseItemRelatedByExpensePurchaseByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByExpensePurchaseBy = ExpenseItemPeer::doSelectJoinBudget($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByExpensePurchaseByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByExpensePurchaseBy;
	}

	
	public function initExpenseItemsRelatedByExpenseValidateBy()
	{
		if ($this->collExpenseItemsRelatedByExpenseValidateBy === null) {
			$this->collExpenseItemsRelatedByExpenseValidateBy = array();
		}
	}

	
	public function getExpenseItemsRelatedByExpenseValidateBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByExpenseValidateBy === null) {
			if ($this->isNew()) {
			   $this->collExpenseItemsRelatedByExpenseValidateBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_VALIDATE_BY, $this->getId());

				ExpenseItemPeer::addSelectColumns($criteria);
				$this->collExpenseItemsRelatedByExpenseValidateBy = ExpenseItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ExpenseItemPeer::EXPENSE_VALIDATE_BY, $this->getId());

				ExpenseItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastExpenseItemRelatedByExpenseValidateByCriteria) || !$this->lastExpenseItemRelatedByExpenseValidateByCriteria->equals($criteria)) {
					$this->collExpenseItemsRelatedByExpenseValidateBy = ExpenseItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastExpenseItemRelatedByExpenseValidateByCriteria = $criteria;
		return $this->collExpenseItemsRelatedByExpenseValidateBy;
	}

	
	public function countExpenseItemsRelatedByExpenseValidateBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ExpenseItemPeer::EXPENSE_VALIDATE_BY, $this->getId());

		return ExpenseItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addExpenseItemRelatedByExpenseValidateBy(ExpenseItem $l)
	{
		$this->collExpenseItemsRelatedByExpenseValidateBy[] = $l;
		$l->setsfGuardUserRelatedByExpenseValidateBy($this);
	}


	
	public function getExpenseItemsRelatedByExpenseValidateByJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByExpenseValidateBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByExpenseValidateBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_VALIDATE_BY, $this->getId());

				$this->collExpenseItemsRelatedByExpenseValidateBy = ExpenseItemPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_VALIDATE_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByExpenseValidateByCriteria) || !$this->lastExpenseItemRelatedByExpenseValidateByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByExpenseValidateBy = ExpenseItemPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByExpenseValidateByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByExpenseValidateBy;
	}


	
	public function getExpenseItemsRelatedByExpenseValidateByJoinVendor($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByExpenseValidateBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByExpenseValidateBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_VALIDATE_BY, $this->getId());

				$this->collExpenseItemsRelatedByExpenseValidateBy = ExpenseItemPeer::doSelectJoinVendor($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_VALIDATE_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByExpenseValidateByCriteria) || !$this->lastExpenseItemRelatedByExpenseValidateByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByExpenseValidateBy = ExpenseItemPeer::doSelectJoinVendor($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByExpenseValidateByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByExpenseValidateBy;
	}


	
	public function getExpenseItemsRelatedByExpenseValidateByJoinExpenseCategory($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByExpenseValidateBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByExpenseValidateBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_VALIDATE_BY, $this->getId());

				$this->collExpenseItemsRelatedByExpenseValidateBy = ExpenseItemPeer::doSelectJoinExpenseCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_VALIDATE_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByExpenseValidateByCriteria) || !$this->lastExpenseItemRelatedByExpenseValidateByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByExpenseValidateBy = ExpenseItemPeer::doSelectJoinExpenseCategory($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByExpenseValidateByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByExpenseValidateBy;
	}


	
	public function getExpenseItemsRelatedByExpenseValidateByJoinPaymentMethod($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByExpenseValidateBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByExpenseValidateBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_VALIDATE_BY, $this->getId());

				$this->collExpenseItemsRelatedByExpenseValidateBy = ExpenseItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_VALIDATE_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByExpenseValidateByCriteria) || !$this->lastExpenseItemRelatedByExpenseValidateByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByExpenseValidateBy = ExpenseItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByExpenseValidateByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByExpenseValidateBy;
	}


	
	public function getExpenseItemsRelatedByExpenseValidateByJoinReimbursement($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByExpenseValidateBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByExpenseValidateBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_VALIDATE_BY, $this->getId());

				$this->collExpenseItemsRelatedByExpenseValidateBy = ExpenseItemPeer::doSelectJoinReimbursement($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_VALIDATE_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByExpenseValidateByCriteria) || !$this->lastExpenseItemRelatedByExpenseValidateByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByExpenseValidateBy = ExpenseItemPeer::doSelectJoinReimbursement($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByExpenseValidateByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByExpenseValidateBy;
	}


	
	public function getExpenseItemsRelatedByExpenseValidateByJoinBudget($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByExpenseValidateBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByExpenseValidateBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::EXPENSE_VALIDATE_BY, $this->getId());

				$this->collExpenseItemsRelatedByExpenseValidateBy = ExpenseItemPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::EXPENSE_VALIDATE_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByExpenseValidateByCriteria) || !$this->lastExpenseItemRelatedByExpenseValidateByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByExpenseValidateBy = ExpenseItemPeer::doSelectJoinBudget($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByExpenseValidateByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByExpenseValidateBy;
	}

	
	public function initExpenseItemsRelatedByCreatedBy()
	{
		if ($this->collExpenseItemsRelatedByCreatedBy === null) {
			$this->collExpenseItemsRelatedByCreatedBy = array();
		}
	}

	
	public function getExpenseItemsRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collExpenseItemsRelatedByCreatedBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::CREATED_BY, $this->getId());

				ExpenseItemPeer::addSelectColumns($criteria);
				$this->collExpenseItemsRelatedByCreatedBy = ExpenseItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ExpenseItemPeer::CREATED_BY, $this->getId());

				ExpenseItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastExpenseItemRelatedByCreatedByCriteria) || !$this->lastExpenseItemRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collExpenseItemsRelatedByCreatedBy = ExpenseItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastExpenseItemRelatedByCreatedByCriteria = $criteria;
		return $this->collExpenseItemsRelatedByCreatedBy;
	}

	
	public function countExpenseItemsRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ExpenseItemPeer::CREATED_BY, $this->getId());

		return ExpenseItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addExpenseItemRelatedByCreatedBy(ExpenseItem $l)
	{
		$this->collExpenseItemsRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserRelatedByCreatedBy($this);
	}


	
	public function getExpenseItemsRelatedByCreatedByJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByCreatedBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::CREATED_BY, $this->getId());

				$this->collExpenseItemsRelatedByCreatedBy = ExpenseItemPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByCreatedByCriteria) || !$this->lastExpenseItemRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByCreatedBy = ExpenseItemPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByCreatedByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByCreatedBy;
	}


	
	public function getExpenseItemsRelatedByCreatedByJoinVendor($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByCreatedBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::CREATED_BY, $this->getId());

				$this->collExpenseItemsRelatedByCreatedBy = ExpenseItemPeer::doSelectJoinVendor($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByCreatedByCriteria) || !$this->lastExpenseItemRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByCreatedBy = ExpenseItemPeer::doSelectJoinVendor($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByCreatedByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByCreatedBy;
	}


	
	public function getExpenseItemsRelatedByCreatedByJoinExpenseCategory($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByCreatedBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::CREATED_BY, $this->getId());

				$this->collExpenseItemsRelatedByCreatedBy = ExpenseItemPeer::doSelectJoinExpenseCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByCreatedByCriteria) || !$this->lastExpenseItemRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByCreatedBy = ExpenseItemPeer::doSelectJoinExpenseCategory($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByCreatedByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByCreatedBy;
	}


	
	public function getExpenseItemsRelatedByCreatedByJoinPaymentMethod($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByCreatedBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::CREATED_BY, $this->getId());

				$this->collExpenseItemsRelatedByCreatedBy = ExpenseItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByCreatedByCriteria) || !$this->lastExpenseItemRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByCreatedBy = ExpenseItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByCreatedByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByCreatedBy;
	}


	
	public function getExpenseItemsRelatedByCreatedByJoinReimbursement($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByCreatedBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::CREATED_BY, $this->getId());

				$this->collExpenseItemsRelatedByCreatedBy = ExpenseItemPeer::doSelectJoinReimbursement($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByCreatedByCriteria) || !$this->lastExpenseItemRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByCreatedBy = ExpenseItemPeer::doSelectJoinReimbursement($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByCreatedByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByCreatedBy;
	}


	
	public function getExpenseItemsRelatedByCreatedByJoinBudget($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByCreatedBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::CREATED_BY, $this->getId());

				$this->collExpenseItemsRelatedByCreatedBy = ExpenseItemPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByCreatedByCriteria) || !$this->lastExpenseItemRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByCreatedBy = ExpenseItemPeer::doSelectJoinBudget($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByCreatedByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByCreatedBy;
	}

	
	public function initExpenseItemsRelatedByUpdatedBy()
	{
		if ($this->collExpenseItemsRelatedByUpdatedBy === null) {
			$this->collExpenseItemsRelatedByUpdatedBy = array();
		}
	}

	
	public function getExpenseItemsRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collExpenseItemsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::UPDATED_BY, $this->getId());

				ExpenseItemPeer::addSelectColumns($criteria);
				$this->collExpenseItemsRelatedByUpdatedBy = ExpenseItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ExpenseItemPeer::UPDATED_BY, $this->getId());

				ExpenseItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastExpenseItemRelatedByUpdatedByCriteria) || !$this->lastExpenseItemRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collExpenseItemsRelatedByUpdatedBy = ExpenseItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastExpenseItemRelatedByUpdatedByCriteria = $criteria;
		return $this->collExpenseItemsRelatedByUpdatedBy;
	}

	
	public function countExpenseItemsRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ExpenseItemPeer::UPDATED_BY, $this->getId());

		return ExpenseItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addExpenseItemRelatedByUpdatedBy(ExpenseItem $l)
	{
		$this->collExpenseItemsRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}


	
	public function getExpenseItemsRelatedByUpdatedByJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::UPDATED_BY, $this->getId());

				$this->collExpenseItemsRelatedByUpdatedBy = ExpenseItemPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByUpdatedByCriteria) || !$this->lastExpenseItemRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByUpdatedBy = ExpenseItemPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByUpdatedByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByUpdatedBy;
	}


	
	public function getExpenseItemsRelatedByUpdatedByJoinVendor($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::UPDATED_BY, $this->getId());

				$this->collExpenseItemsRelatedByUpdatedBy = ExpenseItemPeer::doSelectJoinVendor($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByUpdatedByCriteria) || !$this->lastExpenseItemRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByUpdatedBy = ExpenseItemPeer::doSelectJoinVendor($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByUpdatedByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByUpdatedBy;
	}


	
	public function getExpenseItemsRelatedByUpdatedByJoinExpenseCategory($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::UPDATED_BY, $this->getId());

				$this->collExpenseItemsRelatedByUpdatedBy = ExpenseItemPeer::doSelectJoinExpenseCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByUpdatedByCriteria) || !$this->lastExpenseItemRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByUpdatedBy = ExpenseItemPeer::doSelectJoinExpenseCategory($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByUpdatedByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByUpdatedBy;
	}


	
	public function getExpenseItemsRelatedByUpdatedByJoinPaymentMethod($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::UPDATED_BY, $this->getId());

				$this->collExpenseItemsRelatedByUpdatedBy = ExpenseItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByUpdatedByCriteria) || !$this->lastExpenseItemRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByUpdatedBy = ExpenseItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByUpdatedByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByUpdatedBy;
	}


	
	public function getExpenseItemsRelatedByUpdatedByJoinReimbursement($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::UPDATED_BY, $this->getId());

				$this->collExpenseItemsRelatedByUpdatedBy = ExpenseItemPeer::doSelectJoinReimbursement($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByUpdatedByCriteria) || !$this->lastExpenseItemRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByUpdatedBy = ExpenseItemPeer::doSelectJoinReimbursement($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByUpdatedByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByUpdatedBy;
	}


	
	public function getExpenseItemsRelatedByUpdatedByJoinBudget($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::UPDATED_BY, $this->getId());

				$this->collExpenseItemsRelatedByUpdatedBy = ExpenseItemPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByUpdatedByCriteria) || !$this->lastExpenseItemRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByUpdatedBy = ExpenseItemPeer::doSelectJoinBudget($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByUpdatedByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByUpdatedBy;
	}

	
	public function initExpenseItemsRelatedByDeletedBy()
	{
		if ($this->collExpenseItemsRelatedByDeletedBy === null) {
			$this->collExpenseItemsRelatedByDeletedBy = array();
		}
	}

	
	public function getExpenseItemsRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
			   $this->collExpenseItemsRelatedByDeletedBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::DELETED_BY, $this->getId());

				ExpenseItemPeer::addSelectColumns($criteria);
				$this->collExpenseItemsRelatedByDeletedBy = ExpenseItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ExpenseItemPeer::DELETED_BY, $this->getId());

				ExpenseItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastExpenseItemRelatedByDeletedByCriteria) || !$this->lastExpenseItemRelatedByDeletedByCriteria->equals($criteria)) {
					$this->collExpenseItemsRelatedByDeletedBy = ExpenseItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastExpenseItemRelatedByDeletedByCriteria = $criteria;
		return $this->collExpenseItemsRelatedByDeletedBy;
	}

	
	public function countExpenseItemsRelatedByDeletedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ExpenseItemPeer::DELETED_BY, $this->getId());

		return ExpenseItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addExpenseItemRelatedByDeletedBy(ExpenseItem $l)
	{
		$this->collExpenseItemsRelatedByDeletedBy[] = $l;
		$l->setsfGuardUserRelatedByDeletedBy($this);
	}


	
	public function getExpenseItemsRelatedByDeletedByJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByDeletedBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::DELETED_BY, $this->getId());

				$this->collExpenseItemsRelatedByDeletedBy = ExpenseItemPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::DELETED_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByDeletedByCriteria) || !$this->lastExpenseItemRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByDeletedBy = ExpenseItemPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByDeletedByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByDeletedBy;
	}


	
	public function getExpenseItemsRelatedByDeletedByJoinVendor($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByDeletedBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::DELETED_BY, $this->getId());

				$this->collExpenseItemsRelatedByDeletedBy = ExpenseItemPeer::doSelectJoinVendor($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::DELETED_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByDeletedByCriteria) || !$this->lastExpenseItemRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByDeletedBy = ExpenseItemPeer::doSelectJoinVendor($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByDeletedByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByDeletedBy;
	}


	
	public function getExpenseItemsRelatedByDeletedByJoinExpenseCategory($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByDeletedBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::DELETED_BY, $this->getId());

				$this->collExpenseItemsRelatedByDeletedBy = ExpenseItemPeer::doSelectJoinExpenseCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::DELETED_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByDeletedByCriteria) || !$this->lastExpenseItemRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByDeletedBy = ExpenseItemPeer::doSelectJoinExpenseCategory($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByDeletedByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByDeletedBy;
	}


	
	public function getExpenseItemsRelatedByDeletedByJoinPaymentMethod($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByDeletedBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::DELETED_BY, $this->getId());

				$this->collExpenseItemsRelatedByDeletedBy = ExpenseItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::DELETED_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByDeletedByCriteria) || !$this->lastExpenseItemRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByDeletedBy = ExpenseItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByDeletedByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByDeletedBy;
	}


	
	public function getExpenseItemsRelatedByDeletedByJoinReimbursement($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByDeletedBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::DELETED_BY, $this->getId());

				$this->collExpenseItemsRelatedByDeletedBy = ExpenseItemPeer::doSelectJoinReimbursement($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::DELETED_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByDeletedByCriteria) || !$this->lastExpenseItemRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByDeletedBy = ExpenseItemPeer::doSelectJoinReimbursement($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByDeletedByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByDeletedBy;
	}


	
	public function getExpenseItemsRelatedByDeletedByJoinBudget($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExpenseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExpenseItemsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collExpenseItemsRelatedByDeletedBy = array();
			} else {

				$criteria->add(ExpenseItemPeer::DELETED_BY, $this->getId());

				$this->collExpenseItemsRelatedByDeletedBy = ExpenseItemPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(ExpenseItemPeer::DELETED_BY, $this->getId());

			if (!isset($this->lastExpenseItemRelatedByDeletedByCriteria) || !$this->lastExpenseItemRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collExpenseItemsRelatedByDeletedBy = ExpenseItemPeer::doSelectJoinBudget($criteria, $con);
			}
		}
		$this->lastExpenseItemRelatedByDeletedByCriteria = $criteria;

		return $this->collExpenseItemsRelatedByDeletedBy;
	}

	
	public function initIncomeItemsRelatedByCreatedBy()
	{
		if ($this->collIncomeItemsRelatedByCreatedBy === null) {
			$this->collIncomeItemsRelatedByCreatedBy = array();
		}
	}

	
	public function getIncomeItemsRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItemsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collIncomeItemsRelatedByCreatedBy = array();
			} else {

				$criteria->add(IncomeItemPeer::CREATED_BY, $this->getId());

				IncomeItemPeer::addSelectColumns($criteria);
				$this->collIncomeItemsRelatedByCreatedBy = IncomeItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(IncomeItemPeer::CREATED_BY, $this->getId());

				IncomeItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastIncomeItemRelatedByCreatedByCriteria) || !$this->lastIncomeItemRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collIncomeItemsRelatedByCreatedBy = IncomeItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastIncomeItemRelatedByCreatedByCriteria = $criteria;
		return $this->collIncomeItemsRelatedByCreatedBy;
	}

	
	public function countIncomeItemsRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(IncomeItemPeer::CREATED_BY, $this->getId());

		return IncomeItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addIncomeItemRelatedByCreatedBy(IncomeItem $l)
	{
		$this->collIncomeItemsRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserRelatedByCreatedBy($this);
	}


	
	public function getIncomeItemsRelatedByCreatedByJoinIncomeCategory($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItemsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collIncomeItemsRelatedByCreatedBy = array();
			} else {

				$criteria->add(IncomeItemPeer::CREATED_BY, $this->getId());

				$this->collIncomeItemsRelatedByCreatedBy = IncomeItemPeer::doSelectJoinIncomeCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastIncomeItemRelatedByCreatedByCriteria) || !$this->lastIncomeItemRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collIncomeItemsRelatedByCreatedBy = IncomeItemPeer::doSelectJoinIncomeCategory($criteria, $con);
			}
		}
		$this->lastIncomeItemRelatedByCreatedByCriteria = $criteria;

		return $this->collIncomeItemsRelatedByCreatedBy;
	}


	
	public function getIncomeItemsRelatedByCreatedByJoinPaymentMethod($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItemsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collIncomeItemsRelatedByCreatedBy = array();
			} else {

				$criteria->add(IncomeItemPeer::CREATED_BY, $this->getId());

				$this->collIncomeItemsRelatedByCreatedBy = IncomeItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastIncomeItemRelatedByCreatedByCriteria) || !$this->lastIncomeItemRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collIncomeItemsRelatedByCreatedBy = IncomeItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		}
		$this->lastIncomeItemRelatedByCreatedByCriteria = $criteria;

		return $this->collIncomeItemsRelatedByCreatedBy;
	}


	
	public function getIncomeItemsRelatedByCreatedByJoinReimbursement($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItemsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collIncomeItemsRelatedByCreatedBy = array();
			} else {

				$criteria->add(IncomeItemPeer::CREATED_BY, $this->getId());

				$this->collIncomeItemsRelatedByCreatedBy = IncomeItemPeer::doSelectJoinReimbursement($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastIncomeItemRelatedByCreatedByCriteria) || !$this->lastIncomeItemRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collIncomeItemsRelatedByCreatedBy = IncomeItemPeer::doSelectJoinReimbursement($criteria, $con);
			}
		}
		$this->lastIncomeItemRelatedByCreatedByCriteria = $criteria;

		return $this->collIncomeItemsRelatedByCreatedBy;
	}


	
	public function getIncomeItemsRelatedByCreatedByJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItemsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collIncomeItemsRelatedByCreatedBy = array();
			} else {

				$criteria->add(IncomeItemPeer::CREATED_BY, $this->getId());

				$this->collIncomeItemsRelatedByCreatedBy = IncomeItemPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastIncomeItemRelatedByCreatedByCriteria) || !$this->lastIncomeItemRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collIncomeItemsRelatedByCreatedBy = IncomeItemPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastIncomeItemRelatedByCreatedByCriteria = $criteria;

		return $this->collIncomeItemsRelatedByCreatedBy;
	}


	
	public function getIncomeItemsRelatedByCreatedByJoinBudget($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItemsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collIncomeItemsRelatedByCreatedBy = array();
			} else {

				$criteria->add(IncomeItemPeer::CREATED_BY, $this->getId());

				$this->collIncomeItemsRelatedByCreatedBy = IncomeItemPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastIncomeItemRelatedByCreatedByCriteria) || !$this->lastIncomeItemRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collIncomeItemsRelatedByCreatedBy = IncomeItemPeer::doSelectJoinBudget($criteria, $con);
			}
		}
		$this->lastIncomeItemRelatedByCreatedByCriteria = $criteria;

		return $this->collIncomeItemsRelatedByCreatedBy;
	}


	
	public function getIncomeItemsRelatedByCreatedByJoinVendor($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItemsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collIncomeItemsRelatedByCreatedBy = array();
			} else {

				$criteria->add(IncomeItemPeer::CREATED_BY, $this->getId());

				$this->collIncomeItemsRelatedByCreatedBy = IncomeItemPeer::doSelectJoinVendor($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastIncomeItemRelatedByCreatedByCriteria) || !$this->lastIncomeItemRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collIncomeItemsRelatedByCreatedBy = IncomeItemPeer::doSelectJoinVendor($criteria, $con);
			}
		}
		$this->lastIncomeItemRelatedByCreatedByCriteria = $criteria;

		return $this->collIncomeItemsRelatedByCreatedBy;
	}

	
	public function initIncomeItemsRelatedByUpdatedBy()
	{
		if ($this->collIncomeItemsRelatedByUpdatedBy === null) {
			$this->collIncomeItemsRelatedByUpdatedBy = array();
		}
	}

	
	public function getIncomeItemsRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItemsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collIncomeItemsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(IncomeItemPeer::UPDATED_BY, $this->getId());

				IncomeItemPeer::addSelectColumns($criteria);
				$this->collIncomeItemsRelatedByUpdatedBy = IncomeItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(IncomeItemPeer::UPDATED_BY, $this->getId());

				IncomeItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastIncomeItemRelatedByUpdatedByCriteria) || !$this->lastIncomeItemRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collIncomeItemsRelatedByUpdatedBy = IncomeItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastIncomeItemRelatedByUpdatedByCriteria = $criteria;
		return $this->collIncomeItemsRelatedByUpdatedBy;
	}

	
	public function countIncomeItemsRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(IncomeItemPeer::UPDATED_BY, $this->getId());

		return IncomeItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addIncomeItemRelatedByUpdatedBy(IncomeItem $l)
	{
		$this->collIncomeItemsRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}


	
	public function getIncomeItemsRelatedByUpdatedByJoinIncomeCategory($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItemsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collIncomeItemsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(IncomeItemPeer::UPDATED_BY, $this->getId());

				$this->collIncomeItemsRelatedByUpdatedBy = IncomeItemPeer::doSelectJoinIncomeCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastIncomeItemRelatedByUpdatedByCriteria) || !$this->lastIncomeItemRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collIncomeItemsRelatedByUpdatedBy = IncomeItemPeer::doSelectJoinIncomeCategory($criteria, $con);
			}
		}
		$this->lastIncomeItemRelatedByUpdatedByCriteria = $criteria;

		return $this->collIncomeItemsRelatedByUpdatedBy;
	}


	
	public function getIncomeItemsRelatedByUpdatedByJoinPaymentMethod($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItemsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collIncomeItemsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(IncomeItemPeer::UPDATED_BY, $this->getId());

				$this->collIncomeItemsRelatedByUpdatedBy = IncomeItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastIncomeItemRelatedByUpdatedByCriteria) || !$this->lastIncomeItemRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collIncomeItemsRelatedByUpdatedBy = IncomeItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		}
		$this->lastIncomeItemRelatedByUpdatedByCriteria = $criteria;

		return $this->collIncomeItemsRelatedByUpdatedBy;
	}


	
	public function getIncomeItemsRelatedByUpdatedByJoinReimbursement($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItemsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collIncomeItemsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(IncomeItemPeer::UPDATED_BY, $this->getId());

				$this->collIncomeItemsRelatedByUpdatedBy = IncomeItemPeer::doSelectJoinReimbursement($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastIncomeItemRelatedByUpdatedByCriteria) || !$this->lastIncomeItemRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collIncomeItemsRelatedByUpdatedBy = IncomeItemPeer::doSelectJoinReimbursement($criteria, $con);
			}
		}
		$this->lastIncomeItemRelatedByUpdatedByCriteria = $criteria;

		return $this->collIncomeItemsRelatedByUpdatedBy;
	}


	
	public function getIncomeItemsRelatedByUpdatedByJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItemsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collIncomeItemsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(IncomeItemPeer::UPDATED_BY, $this->getId());

				$this->collIncomeItemsRelatedByUpdatedBy = IncomeItemPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastIncomeItemRelatedByUpdatedByCriteria) || !$this->lastIncomeItemRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collIncomeItemsRelatedByUpdatedBy = IncomeItemPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastIncomeItemRelatedByUpdatedByCriteria = $criteria;

		return $this->collIncomeItemsRelatedByUpdatedBy;
	}


	
	public function getIncomeItemsRelatedByUpdatedByJoinBudget($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItemsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collIncomeItemsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(IncomeItemPeer::UPDATED_BY, $this->getId());

				$this->collIncomeItemsRelatedByUpdatedBy = IncomeItemPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastIncomeItemRelatedByUpdatedByCriteria) || !$this->lastIncomeItemRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collIncomeItemsRelatedByUpdatedBy = IncomeItemPeer::doSelectJoinBudget($criteria, $con);
			}
		}
		$this->lastIncomeItemRelatedByUpdatedByCriteria = $criteria;

		return $this->collIncomeItemsRelatedByUpdatedBy;
	}


	
	public function getIncomeItemsRelatedByUpdatedByJoinVendor($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItemsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collIncomeItemsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(IncomeItemPeer::UPDATED_BY, $this->getId());

				$this->collIncomeItemsRelatedByUpdatedBy = IncomeItemPeer::doSelectJoinVendor($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastIncomeItemRelatedByUpdatedByCriteria) || !$this->lastIncomeItemRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collIncomeItemsRelatedByUpdatedBy = IncomeItemPeer::doSelectJoinVendor($criteria, $con);
			}
		}
		$this->lastIncomeItemRelatedByUpdatedByCriteria = $criteria;

		return $this->collIncomeItemsRelatedByUpdatedBy;
	}

	
	public function initIncomeItemsRelatedByDeletedBy()
	{
		if ($this->collIncomeItemsRelatedByDeletedBy === null) {
			$this->collIncomeItemsRelatedByDeletedBy = array();
		}
	}

	
	public function getIncomeItemsRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItemsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
			   $this->collIncomeItemsRelatedByDeletedBy = array();
			} else {

				$criteria->add(IncomeItemPeer::DELETED_BY, $this->getId());

				IncomeItemPeer::addSelectColumns($criteria);
				$this->collIncomeItemsRelatedByDeletedBy = IncomeItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(IncomeItemPeer::DELETED_BY, $this->getId());

				IncomeItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastIncomeItemRelatedByDeletedByCriteria) || !$this->lastIncomeItemRelatedByDeletedByCriteria->equals($criteria)) {
					$this->collIncomeItemsRelatedByDeletedBy = IncomeItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastIncomeItemRelatedByDeletedByCriteria = $criteria;
		return $this->collIncomeItemsRelatedByDeletedBy;
	}

	
	public function countIncomeItemsRelatedByDeletedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(IncomeItemPeer::DELETED_BY, $this->getId());

		return IncomeItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addIncomeItemRelatedByDeletedBy(IncomeItem $l)
	{
		$this->collIncomeItemsRelatedByDeletedBy[] = $l;
		$l->setsfGuardUserRelatedByDeletedBy($this);
	}


	
	public function getIncomeItemsRelatedByDeletedByJoinIncomeCategory($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItemsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collIncomeItemsRelatedByDeletedBy = array();
			} else {

				$criteria->add(IncomeItemPeer::DELETED_BY, $this->getId());

				$this->collIncomeItemsRelatedByDeletedBy = IncomeItemPeer::doSelectJoinIncomeCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::DELETED_BY, $this->getId());

			if (!isset($this->lastIncomeItemRelatedByDeletedByCriteria) || !$this->lastIncomeItemRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collIncomeItemsRelatedByDeletedBy = IncomeItemPeer::doSelectJoinIncomeCategory($criteria, $con);
			}
		}
		$this->lastIncomeItemRelatedByDeletedByCriteria = $criteria;

		return $this->collIncomeItemsRelatedByDeletedBy;
	}


	
	public function getIncomeItemsRelatedByDeletedByJoinPaymentMethod($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItemsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collIncomeItemsRelatedByDeletedBy = array();
			} else {

				$criteria->add(IncomeItemPeer::DELETED_BY, $this->getId());

				$this->collIncomeItemsRelatedByDeletedBy = IncomeItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::DELETED_BY, $this->getId());

			if (!isset($this->lastIncomeItemRelatedByDeletedByCriteria) || !$this->lastIncomeItemRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collIncomeItemsRelatedByDeletedBy = IncomeItemPeer::doSelectJoinPaymentMethod($criteria, $con);
			}
		}
		$this->lastIncomeItemRelatedByDeletedByCriteria = $criteria;

		return $this->collIncomeItemsRelatedByDeletedBy;
	}


	
	public function getIncomeItemsRelatedByDeletedByJoinReimbursement($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItemsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collIncomeItemsRelatedByDeletedBy = array();
			} else {

				$criteria->add(IncomeItemPeer::DELETED_BY, $this->getId());

				$this->collIncomeItemsRelatedByDeletedBy = IncomeItemPeer::doSelectJoinReimbursement($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::DELETED_BY, $this->getId());

			if (!isset($this->lastIncomeItemRelatedByDeletedByCriteria) || !$this->lastIncomeItemRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collIncomeItemsRelatedByDeletedBy = IncomeItemPeer::doSelectJoinReimbursement($criteria, $con);
			}
		}
		$this->lastIncomeItemRelatedByDeletedByCriteria = $criteria;

		return $this->collIncomeItemsRelatedByDeletedBy;
	}


	
	public function getIncomeItemsRelatedByDeletedByJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItemsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collIncomeItemsRelatedByDeletedBy = array();
			} else {

				$criteria->add(IncomeItemPeer::DELETED_BY, $this->getId());

				$this->collIncomeItemsRelatedByDeletedBy = IncomeItemPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::DELETED_BY, $this->getId());

			if (!isset($this->lastIncomeItemRelatedByDeletedByCriteria) || !$this->lastIncomeItemRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collIncomeItemsRelatedByDeletedBy = IncomeItemPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastIncomeItemRelatedByDeletedByCriteria = $criteria;

		return $this->collIncomeItemsRelatedByDeletedBy;
	}


	
	public function getIncomeItemsRelatedByDeletedByJoinBudget($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItemsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collIncomeItemsRelatedByDeletedBy = array();
			} else {

				$criteria->add(IncomeItemPeer::DELETED_BY, $this->getId());

				$this->collIncomeItemsRelatedByDeletedBy = IncomeItemPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::DELETED_BY, $this->getId());

			if (!isset($this->lastIncomeItemRelatedByDeletedByCriteria) || !$this->lastIncomeItemRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collIncomeItemsRelatedByDeletedBy = IncomeItemPeer::doSelectJoinBudget($criteria, $con);
			}
		}
		$this->lastIncomeItemRelatedByDeletedByCriteria = $criteria;

		return $this->collIncomeItemsRelatedByDeletedBy;
	}


	
	public function getIncomeItemsRelatedByDeletedByJoinVendor($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIncomeItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIncomeItemsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collIncomeItemsRelatedByDeletedBy = array();
			} else {

				$criteria->add(IncomeItemPeer::DELETED_BY, $this->getId());

				$this->collIncomeItemsRelatedByDeletedBy = IncomeItemPeer::doSelectJoinVendor($criteria, $con);
			}
		} else {
									
			$criteria->add(IncomeItemPeer::DELETED_BY, $this->getId());

			if (!isset($this->lastIncomeItemRelatedByDeletedByCriteria) || !$this->lastIncomeItemRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collIncomeItemsRelatedByDeletedBy = IncomeItemPeer::doSelectJoinVendor($criteria, $con);
			}
		}
		$this->lastIncomeItemRelatedByDeletedByCriteria = $criteria;

		return $this->collIncomeItemsRelatedByDeletedBy;
	}

	
	public function initCashItemsRelatedByCreatedBy()
	{
		if ($this->collCashItemsRelatedByCreatedBy === null) {
			$this->collCashItemsRelatedByCreatedBy = array();
		}
	}

	
	public function getCashItemsRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCashItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCashItemsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collCashItemsRelatedByCreatedBy = array();
			} else {

				$criteria->add(CashItemPeer::CREATED_BY, $this->getId());

				CashItemPeer::addSelectColumns($criteria);
				$this->collCashItemsRelatedByCreatedBy = CashItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CashItemPeer::CREATED_BY, $this->getId());

				CashItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastCashItemRelatedByCreatedByCriteria) || !$this->lastCashItemRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collCashItemsRelatedByCreatedBy = CashItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCashItemRelatedByCreatedByCriteria = $criteria;
		return $this->collCashItemsRelatedByCreatedBy;
	}

	
	public function countCashItemsRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCashItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CashItemPeer::CREATED_BY, $this->getId());

		return CashItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCashItemRelatedByCreatedBy(CashItem $l)
	{
		$this->collCashItemsRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserRelatedByCreatedBy($this);
	}

	
	public function initCashItemsRelatedByUpdatedBy()
	{
		if ($this->collCashItemsRelatedByUpdatedBy === null) {
			$this->collCashItemsRelatedByUpdatedBy = array();
		}
	}

	
	public function getCashItemsRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCashItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCashItemsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collCashItemsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(CashItemPeer::UPDATED_BY, $this->getId());

				CashItemPeer::addSelectColumns($criteria);
				$this->collCashItemsRelatedByUpdatedBy = CashItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CashItemPeer::UPDATED_BY, $this->getId());

				CashItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastCashItemRelatedByUpdatedByCriteria) || !$this->lastCashItemRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collCashItemsRelatedByUpdatedBy = CashItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCashItemRelatedByUpdatedByCriteria = $criteria;
		return $this->collCashItemsRelatedByUpdatedBy;
	}

	
	public function countCashItemsRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCashItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CashItemPeer::UPDATED_BY, $this->getId());

		return CashItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCashItemRelatedByUpdatedBy(CashItem $l)
	{
		$this->collCashItemsRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}

	
	public function initCashItemsRelatedByDeletedBy()
	{
		if ($this->collCashItemsRelatedByDeletedBy === null) {
			$this->collCashItemsRelatedByDeletedBy = array();
		}
	}

	
	public function getCashItemsRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCashItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCashItemsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
			   $this->collCashItemsRelatedByDeletedBy = array();
			} else {

				$criteria->add(CashItemPeer::DELETED_BY, $this->getId());

				CashItemPeer::addSelectColumns($criteria);
				$this->collCashItemsRelatedByDeletedBy = CashItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CashItemPeer::DELETED_BY, $this->getId());

				CashItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastCashItemRelatedByDeletedByCriteria) || !$this->lastCashItemRelatedByDeletedByCriteria->equals($criteria)) {
					$this->collCashItemsRelatedByDeletedBy = CashItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCashItemRelatedByDeletedByCriteria = $criteria;
		return $this->collCashItemsRelatedByDeletedBy;
	}

	
	public function countCashItemsRelatedByDeletedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCashItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CashItemPeer::DELETED_BY, $this->getId());

		return CashItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCashItemRelatedByDeletedBy(CashItem $l)
	{
		$this->collCashItemsRelatedByDeletedBy[] = $l;
		$l->setsfGuardUserRelatedByDeletedBy($this);
	}

	
	public function initNotificationsRelatedByCreatedBy()
	{
		if ($this->collNotificationsRelatedByCreatedBy === null) {
			$this->collNotificationsRelatedByCreatedBy = array();
		}
	}

	
	public function getNotificationsRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseNotificationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collNotificationsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collNotificationsRelatedByCreatedBy = array();
			} else {

				$criteria->add(NotificationPeer::CREATED_BY, $this->getId());

				NotificationPeer::addSelectColumns($criteria);
				$this->collNotificationsRelatedByCreatedBy = NotificationPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(NotificationPeer::CREATED_BY, $this->getId());

				NotificationPeer::addSelectColumns($criteria);
				if (!isset($this->lastNotificationRelatedByCreatedByCriteria) || !$this->lastNotificationRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collNotificationsRelatedByCreatedBy = NotificationPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastNotificationRelatedByCreatedByCriteria = $criteria;
		return $this->collNotificationsRelatedByCreatedBy;
	}

	
	public function countNotificationsRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseNotificationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(NotificationPeer::CREATED_BY, $this->getId());

		return NotificationPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addNotificationRelatedByCreatedBy(Notification $l)
	{
		$this->collNotificationsRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserRelatedByCreatedBy($this);
	}


	
	public function getNotificationsRelatedByCreatedByJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseNotificationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collNotificationsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collNotificationsRelatedByCreatedBy = array();
			} else {

				$criteria->add(NotificationPeer::CREATED_BY, $this->getId());

				$this->collNotificationsRelatedByCreatedBy = NotificationPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(NotificationPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastNotificationRelatedByCreatedByCriteria) || !$this->lastNotificationRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collNotificationsRelatedByCreatedBy = NotificationPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastNotificationRelatedByCreatedByCriteria = $criteria;

		return $this->collNotificationsRelatedByCreatedBy;
	}

	
	public function initNotificationsRelatedByUpdatedBy()
	{
		if ($this->collNotificationsRelatedByUpdatedBy === null) {
			$this->collNotificationsRelatedByUpdatedBy = array();
		}
	}

	
	public function getNotificationsRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseNotificationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collNotificationsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collNotificationsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(NotificationPeer::UPDATED_BY, $this->getId());

				NotificationPeer::addSelectColumns($criteria);
				$this->collNotificationsRelatedByUpdatedBy = NotificationPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(NotificationPeer::UPDATED_BY, $this->getId());

				NotificationPeer::addSelectColumns($criteria);
				if (!isset($this->lastNotificationRelatedByUpdatedByCriteria) || !$this->lastNotificationRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collNotificationsRelatedByUpdatedBy = NotificationPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastNotificationRelatedByUpdatedByCriteria = $criteria;
		return $this->collNotificationsRelatedByUpdatedBy;
	}

	
	public function countNotificationsRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseNotificationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(NotificationPeer::UPDATED_BY, $this->getId());

		return NotificationPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addNotificationRelatedByUpdatedBy(Notification $l)
	{
		$this->collNotificationsRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}


	
	public function getNotificationsRelatedByUpdatedByJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseNotificationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collNotificationsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collNotificationsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(NotificationPeer::UPDATED_BY, $this->getId());

				$this->collNotificationsRelatedByUpdatedBy = NotificationPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(NotificationPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastNotificationRelatedByUpdatedByCriteria) || !$this->lastNotificationRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collNotificationsRelatedByUpdatedBy = NotificationPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastNotificationRelatedByUpdatedByCriteria = $criteria;

		return $this->collNotificationsRelatedByUpdatedBy;
	}

	
	public function initReportsRelatedByCreatedBy()
	{
		if ($this->collReportsRelatedByCreatedBy === null) {
			$this->collReportsRelatedByCreatedBy = array();
		}
	}

	
	public function getReportsRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseReportPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collReportsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collReportsRelatedByCreatedBy = array();
			} else {

				$criteria->add(ReportPeer::CREATED_BY, $this->getId());

				ReportPeer::addSelectColumns($criteria);
				$this->collReportsRelatedByCreatedBy = ReportPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ReportPeer::CREATED_BY, $this->getId());

				ReportPeer::addSelectColumns($criteria);
				if (!isset($this->lastReportRelatedByCreatedByCriteria) || !$this->lastReportRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collReportsRelatedByCreatedBy = ReportPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastReportRelatedByCreatedByCriteria = $criteria;
		return $this->collReportsRelatedByCreatedBy;
	}

	
	public function countReportsRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseReportPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ReportPeer::CREATED_BY, $this->getId());

		return ReportPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addReportRelatedByCreatedBy(Report $l)
	{
		$this->collReportsRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserRelatedByCreatedBy($this);
	}

	
	public function initReportsRelatedByUpdatedBy()
	{
		if ($this->collReportsRelatedByUpdatedBy === null) {
			$this->collReportsRelatedByUpdatedBy = array();
		}
	}

	
	public function getReportsRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseReportPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collReportsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collReportsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(ReportPeer::UPDATED_BY, $this->getId());

				ReportPeer::addSelectColumns($criteria);
				$this->collReportsRelatedByUpdatedBy = ReportPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ReportPeer::UPDATED_BY, $this->getId());

				ReportPeer::addSelectColumns($criteria);
				if (!isset($this->lastReportRelatedByUpdatedByCriteria) || !$this->lastReportRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collReportsRelatedByUpdatedBy = ReportPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastReportRelatedByUpdatedByCriteria = $criteria;
		return $this->collReportsRelatedByUpdatedBy;
	}

	
	public function countReportsRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseReportPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ReportPeer::UPDATED_BY, $this->getId());

		return ReportPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addReportRelatedByUpdatedBy(Report $l)
	{
		$this->collReportsRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}

	
	public function initGraphicsRelatedByCreatedBy()
	{
		if ($this->collGraphicsRelatedByCreatedBy === null) {
			$this->collGraphicsRelatedByCreatedBy = array();
		}
	}

	
	public function getGraphicsRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseGraphicPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGraphicsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collGraphicsRelatedByCreatedBy = array();
			} else {

				$criteria->add(GraphicPeer::CREATED_BY, $this->getId());

				GraphicPeer::addSelectColumns($criteria);
				$this->collGraphicsRelatedByCreatedBy = GraphicPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(GraphicPeer::CREATED_BY, $this->getId());

				GraphicPeer::addSelectColumns($criteria);
				if (!isset($this->lastGraphicRelatedByCreatedByCriteria) || !$this->lastGraphicRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collGraphicsRelatedByCreatedBy = GraphicPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastGraphicRelatedByCreatedByCriteria = $criteria;
		return $this->collGraphicsRelatedByCreatedBy;
	}

	
	public function countGraphicsRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseGraphicPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(GraphicPeer::CREATED_BY, $this->getId());

		return GraphicPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addGraphicRelatedByCreatedBy(Graphic $l)
	{
		$this->collGraphicsRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserRelatedByCreatedBy($this);
	}

	
	public function initGraphicsRelatedByUpdatedBy()
	{
		if ($this->collGraphicsRelatedByUpdatedBy === null) {
			$this->collGraphicsRelatedByUpdatedBy = array();
		}
	}

	
	public function getGraphicsRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseGraphicPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGraphicsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collGraphicsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(GraphicPeer::UPDATED_BY, $this->getId());

				GraphicPeer::addSelectColumns($criteria);
				$this->collGraphicsRelatedByUpdatedBy = GraphicPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(GraphicPeer::UPDATED_BY, $this->getId());

				GraphicPeer::addSelectColumns($criteria);
				if (!isset($this->lastGraphicRelatedByUpdatedByCriteria) || !$this->lastGraphicRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collGraphicsRelatedByUpdatedBy = GraphicPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastGraphicRelatedByUpdatedByCriteria = $criteria;
		return $this->collGraphicsRelatedByUpdatedBy;
	}

	
	public function countGraphicsRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseGraphicPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(GraphicPeer::UPDATED_BY, $this->getId());

		return GraphicPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addGraphicRelatedByUpdatedBy(Graphic $l)
	{
		$this->collGraphicsRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}

	
	public function initsfGuardUserProfilesRelatedByUserId()
	{
		if ($this->collsfGuardUserProfilesRelatedByUserId === null) {
			$this->collsfGuardUserProfilesRelatedByUserId = array();
		}
	}

	
	public function getsfGuardUserProfilesRelatedByUserId($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasesfGuardUserProfilePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUserProfilesRelatedByUserId === null) {
			if ($this->isNew()) {
			   $this->collsfGuardUserProfilesRelatedByUserId = array();
			} else {

				$criteria->add(sfGuardUserProfilePeer::USER_ID, $this->getId());

				sfGuardUserProfilePeer::addSelectColumns($criteria);
				$this->collsfGuardUserProfilesRelatedByUserId = sfGuardUserProfilePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfGuardUserProfilePeer::USER_ID, $this->getId());

				sfGuardUserProfilePeer::addSelectColumns($criteria);
				if (!isset($this->lastsfGuardUserProfileRelatedByUserIdCriteria) || !$this->lastsfGuardUserProfileRelatedByUserIdCriteria->equals($criteria)) {
					$this->collsfGuardUserProfilesRelatedByUserId = sfGuardUserProfilePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfGuardUserProfileRelatedByUserIdCriteria = $criteria;
		return $this->collsfGuardUserProfilesRelatedByUserId;
	}

	
	public function countsfGuardUserProfilesRelatedByUserId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasesfGuardUserProfilePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfGuardUserProfilePeer::USER_ID, $this->getId());

		return sfGuardUserProfilePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfGuardUserProfileRelatedByUserId(sfGuardUserProfile $l)
	{
		$this->collsfGuardUserProfilesRelatedByUserId[] = $l;
		$l->setsfGuardUserRelatedByUserId($this);
	}

	
	public function initsfGuardUserProfilesRelatedByOwnerUserId()
	{
		if ($this->collsfGuardUserProfilesRelatedByOwnerUserId === null) {
			$this->collsfGuardUserProfilesRelatedByOwnerUserId = array();
		}
	}

	
	public function getsfGuardUserProfilesRelatedByOwnerUserId($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasesfGuardUserProfilePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUserProfilesRelatedByOwnerUserId === null) {
			if ($this->isNew()) {
			   $this->collsfGuardUserProfilesRelatedByOwnerUserId = array();
			} else {

				$criteria->add(sfGuardUserProfilePeer::OWNER_USER_ID, $this->getId());

				sfGuardUserProfilePeer::addSelectColumns($criteria);
				$this->collsfGuardUserProfilesRelatedByOwnerUserId = sfGuardUserProfilePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfGuardUserProfilePeer::OWNER_USER_ID, $this->getId());

				sfGuardUserProfilePeer::addSelectColumns($criteria);
				if (!isset($this->lastsfGuardUserProfileRelatedByOwnerUserIdCriteria) || !$this->lastsfGuardUserProfileRelatedByOwnerUserIdCriteria->equals($criteria)) {
					$this->collsfGuardUserProfilesRelatedByOwnerUserId = sfGuardUserProfilePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfGuardUserProfileRelatedByOwnerUserIdCriteria = $criteria;
		return $this->collsfGuardUserProfilesRelatedByOwnerUserId;
	}

	
	public function countsfGuardUserProfilesRelatedByOwnerUserId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasesfGuardUserProfilePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfGuardUserProfilePeer::OWNER_USER_ID, $this->getId());

		return sfGuardUserProfilePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfGuardUserProfileRelatedByOwnerUserId(sfGuardUserProfile $l)
	{
		$this->collsfGuardUserProfilesRelatedByOwnerUserId[] = $l;
		$l->setsfGuardUserRelatedByOwnerUserId($this);
	}

	
	public function initsfGuardUserProfilesRelatedByCreatedBy()
	{
		if ($this->collsfGuardUserProfilesRelatedByCreatedBy === null) {
			$this->collsfGuardUserProfilesRelatedByCreatedBy = array();
		}
	}

	
	public function getsfGuardUserProfilesRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasesfGuardUserProfilePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUserProfilesRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collsfGuardUserProfilesRelatedByCreatedBy = array();
			} else {

				$criteria->add(sfGuardUserProfilePeer::CREATED_BY, $this->getId());

				sfGuardUserProfilePeer::addSelectColumns($criteria);
				$this->collsfGuardUserProfilesRelatedByCreatedBy = sfGuardUserProfilePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfGuardUserProfilePeer::CREATED_BY, $this->getId());

				sfGuardUserProfilePeer::addSelectColumns($criteria);
				if (!isset($this->lastsfGuardUserProfileRelatedByCreatedByCriteria) || !$this->lastsfGuardUserProfileRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collsfGuardUserProfilesRelatedByCreatedBy = sfGuardUserProfilePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfGuardUserProfileRelatedByCreatedByCriteria = $criteria;
		return $this->collsfGuardUserProfilesRelatedByCreatedBy;
	}

	
	public function countsfGuardUserProfilesRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasesfGuardUserProfilePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfGuardUserProfilePeer::CREATED_BY, $this->getId());

		return sfGuardUserProfilePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfGuardUserProfileRelatedByCreatedBy(sfGuardUserProfile $l)
	{
		$this->collsfGuardUserProfilesRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserRelatedByCreatedBy($this);
	}

	
	public function initsfGuardUserProfilesRelatedByUpdatedBy()
	{
		if ($this->collsfGuardUserProfilesRelatedByUpdatedBy === null) {
			$this->collsfGuardUserProfilesRelatedByUpdatedBy = array();
		}
	}

	
	public function getsfGuardUserProfilesRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasesfGuardUserProfilePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUserProfilesRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collsfGuardUserProfilesRelatedByUpdatedBy = array();
			} else {

				$criteria->add(sfGuardUserProfilePeer::UPDATED_BY, $this->getId());

				sfGuardUserProfilePeer::addSelectColumns($criteria);
				$this->collsfGuardUserProfilesRelatedByUpdatedBy = sfGuardUserProfilePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfGuardUserProfilePeer::UPDATED_BY, $this->getId());

				sfGuardUserProfilePeer::addSelectColumns($criteria);
				if (!isset($this->lastsfGuardUserProfileRelatedByUpdatedByCriteria) || !$this->lastsfGuardUserProfileRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collsfGuardUserProfilesRelatedByUpdatedBy = sfGuardUserProfilePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfGuardUserProfileRelatedByUpdatedByCriteria = $criteria;
		return $this->collsfGuardUserProfilesRelatedByUpdatedBy;
	}

	
	public function countsfGuardUserProfilesRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasesfGuardUserProfilePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfGuardUserProfilePeer::UPDATED_BY, $this->getId());

		return sfGuardUserProfilePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfGuardUserProfileRelatedByUpdatedBy(sfGuardUserProfile $l)
	{
		$this->collsfGuardUserProfilesRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}

	
	public function initsfGuardUserProfilesRelatedByDeletedBy()
	{
		if ($this->collsfGuardUserProfilesRelatedByDeletedBy === null) {
			$this->collsfGuardUserProfilesRelatedByDeletedBy = array();
		}
	}

	
	public function getsfGuardUserProfilesRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasesfGuardUserProfilePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUserProfilesRelatedByDeletedBy === null) {
			if ($this->isNew()) {
			   $this->collsfGuardUserProfilesRelatedByDeletedBy = array();
			} else {

				$criteria->add(sfGuardUserProfilePeer::DELETED_BY, $this->getId());

				sfGuardUserProfilePeer::addSelectColumns($criteria);
				$this->collsfGuardUserProfilesRelatedByDeletedBy = sfGuardUserProfilePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfGuardUserProfilePeer::DELETED_BY, $this->getId());

				sfGuardUserProfilePeer::addSelectColumns($criteria);
				if (!isset($this->lastsfGuardUserProfileRelatedByDeletedByCriteria) || !$this->lastsfGuardUserProfileRelatedByDeletedByCriteria->equals($criteria)) {
					$this->collsfGuardUserProfilesRelatedByDeletedBy = sfGuardUserProfilePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfGuardUserProfileRelatedByDeletedByCriteria = $criteria;
		return $this->collsfGuardUserProfilesRelatedByDeletedBy;
	}

	
	public function countsfGuardUserProfilesRelatedByDeletedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasesfGuardUserProfilePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfGuardUserProfilePeer::DELETED_BY, $this->getId());

		return sfGuardUserProfilePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfGuardUserProfileRelatedByDeletedBy(sfGuardUserProfile $l)
	{
		$this->collsfGuardUserProfilesRelatedByDeletedBy[] = $l;
		$l->setsfGuardUserRelatedByDeletedBy($this);
	}

	
	public function initsfGuardUsersRelatedByDeletedBy()
	{
		if ($this->collsfGuardUsersRelatedByDeletedBy === null) {
			$this->collsfGuardUsersRelatedByDeletedBy = array();
		}
	}

	
	public function getsfGuardUsersRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUsersRelatedByDeletedBy === null) {
			if ($this->isNew()) {
			   $this->collsfGuardUsersRelatedByDeletedBy = array();
			} else {

				$criteria->add(sfGuardUserPeer::DELETED_BY, $this->getId());

				sfGuardUserPeer::addSelectColumns($criteria);
				$this->collsfGuardUsersRelatedByDeletedBy = sfGuardUserPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfGuardUserPeer::DELETED_BY, $this->getId());

				sfGuardUserPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfGuardUserRelatedByDeletedByCriteria) || !$this->lastsfGuardUserRelatedByDeletedByCriteria->equals($criteria)) {
					$this->collsfGuardUsersRelatedByDeletedBy = sfGuardUserPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfGuardUserRelatedByDeletedByCriteria = $criteria;
		return $this->collsfGuardUsersRelatedByDeletedBy;
	}

	
	public function countsfGuardUsersRelatedByDeletedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfGuardUserPeer::DELETED_BY, $this->getId());

		return sfGuardUserPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfGuardUserRelatedByDeletedBy(sfGuardUser $l)
	{
		$this->collsfGuardUsersRelatedByDeletedBy[] = $l;
		$l->setsfGuardUserRelatedByDeletedBy($this);
	}

	
	public function initsfGuardUserPermissions()
	{
		if ($this->collsfGuardUserPermissions === null) {
			$this->collsfGuardUserPermissions = array();
		}
	}

	
	public function getsfGuardUserPermissions($criteria = null, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPermissionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUserPermissions === null) {
			if ($this->isNew()) {
			   $this->collsfGuardUserPermissions = array();
			} else {

				$criteria->add(sfGuardUserPermissionPeer::USER_ID, $this->getId());

				sfGuardUserPermissionPeer::addSelectColumns($criteria);
				$this->collsfGuardUserPermissions = sfGuardUserPermissionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfGuardUserPermissionPeer::USER_ID, $this->getId());

				sfGuardUserPermissionPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfGuardUserPermissionCriteria) || !$this->lastsfGuardUserPermissionCriteria->equals($criteria)) {
					$this->collsfGuardUserPermissions = sfGuardUserPermissionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfGuardUserPermissionCriteria = $criteria;
		return $this->collsfGuardUserPermissions;
	}

	
	public function countsfGuardUserPermissions($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPermissionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfGuardUserPermissionPeer::USER_ID, $this->getId());

		return sfGuardUserPermissionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfGuardUserPermission(sfGuardUserPermission $l)
	{
		$this->collsfGuardUserPermissions[] = $l;
		$l->setsfGuardUser($this);
	}


	
	public function getsfGuardUserPermissionsJoinsfGuardPermission($criteria = null, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPermissionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUserPermissions === null) {
			if ($this->isNew()) {
				$this->collsfGuardUserPermissions = array();
			} else {

				$criteria->add(sfGuardUserPermissionPeer::USER_ID, $this->getId());

				$this->collsfGuardUserPermissions = sfGuardUserPermissionPeer::doSelectJoinsfGuardPermission($criteria, $con);
			}
		} else {
									
			$criteria->add(sfGuardUserPermissionPeer::USER_ID, $this->getId());

			if (!isset($this->lastsfGuardUserPermissionCriteria) || !$this->lastsfGuardUserPermissionCriteria->equals($criteria)) {
				$this->collsfGuardUserPermissions = sfGuardUserPermissionPeer::doSelectJoinsfGuardPermission($criteria, $con);
			}
		}
		$this->lastsfGuardUserPermissionCriteria = $criteria;

		return $this->collsfGuardUserPermissions;
	}

	
	public function initsfGuardUserGroups()
	{
		if ($this->collsfGuardUserGroups === null) {
			$this->collsfGuardUserGroups = array();
		}
	}

	
	public function getsfGuardUserGroups($criteria = null, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUserGroups === null) {
			if ($this->isNew()) {
			   $this->collsfGuardUserGroups = array();
			} else {

				$criteria->add(sfGuardUserGroupPeer::USER_ID, $this->getId());

				sfGuardUserGroupPeer::addSelectColumns($criteria);
				$this->collsfGuardUserGroups = sfGuardUserGroupPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfGuardUserGroupPeer::USER_ID, $this->getId());

				sfGuardUserGroupPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfGuardUserGroupCriteria) || !$this->lastsfGuardUserGroupCriteria->equals($criteria)) {
					$this->collsfGuardUserGroups = sfGuardUserGroupPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfGuardUserGroupCriteria = $criteria;
		return $this->collsfGuardUserGroups;
	}

	
	public function countsfGuardUserGroups($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfGuardUserGroupPeer::USER_ID, $this->getId());

		return sfGuardUserGroupPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfGuardUserGroup(sfGuardUserGroup $l)
	{
		$this->collsfGuardUserGroups[] = $l;
		$l->setsfGuardUser($this);
	}


	
	public function getsfGuardUserGroupsJoinsfGuardGroup($criteria = null, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUserGroups === null) {
			if ($this->isNew()) {
				$this->collsfGuardUserGroups = array();
			} else {

				$criteria->add(sfGuardUserGroupPeer::USER_ID, $this->getId());

				$this->collsfGuardUserGroups = sfGuardUserGroupPeer::doSelectJoinsfGuardGroup($criteria, $con);
			}
		} else {
									
			$criteria->add(sfGuardUserGroupPeer::USER_ID, $this->getId());

			if (!isset($this->lastsfGuardUserGroupCriteria) || !$this->lastsfGuardUserGroupCriteria->equals($criteria)) {
				$this->collsfGuardUserGroups = sfGuardUserGroupPeer::doSelectJoinsfGuardGroup($criteria, $con);
			}
		}
		$this->lastsfGuardUserGroupCriteria = $criteria;

		return $this->collsfGuardUserGroups;
	}

	
	public function initsfGuardRememberKeys()
	{
		if ($this->collsfGuardRememberKeys === null) {
			$this->collsfGuardRememberKeys = array();
		}
	}

	
	public function getsfGuardRememberKeys($criteria = null, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardRememberKeyPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardRememberKeys === null) {
			if ($this->isNew()) {
			   $this->collsfGuardRememberKeys = array();
			} else {

				$criteria->add(sfGuardRememberKeyPeer::USER_ID, $this->getId());

				sfGuardRememberKeyPeer::addSelectColumns($criteria);
				$this->collsfGuardRememberKeys = sfGuardRememberKeyPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfGuardRememberKeyPeer::USER_ID, $this->getId());

				sfGuardRememberKeyPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfGuardRememberKeyCriteria) || !$this->lastsfGuardRememberKeyCriteria->equals($criteria)) {
					$this->collsfGuardRememberKeys = sfGuardRememberKeyPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfGuardRememberKeyCriteria = $criteria;
		return $this->collsfGuardRememberKeys;
	}

	
	public function countsfGuardRememberKeys($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardRememberKeyPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfGuardRememberKeyPeer::USER_ID, $this->getId());

		return sfGuardRememberKeyPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfGuardRememberKey(sfGuardRememberKey $l)
	{
		$this->collsfGuardRememberKeys[] = $l;
		$l->setsfGuardUser($this);
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BasesfGuardUser:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasesfGuardUser::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
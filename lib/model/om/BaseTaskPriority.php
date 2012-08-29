<?php


abstract class BaseTaskPriority extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $task_priority_title;

	
	protected $collTasks;

	
	protected $lastTaskCriteria = null;

	
	protected $collFrequentlyTasks;

	
	protected $lastFrequentlyTaskCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getTaskPriorityTitle()
	{

		return $this->task_priority_title;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TaskPriorityPeer::ID;
		}

	} 
	
	public function setTaskPriorityTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->task_priority_title !== $v) {
			$this->task_priority_title = $v;
			$this->modifiedColumns[] = TaskPriorityPeer::TASK_PRIORITY_TITLE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->task_priority_title = $rs->getString($startcol + 1);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating TaskPriority object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseTaskPriority:delete:pre') as $callable)
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
			$con = Propel::getConnection(TaskPriorityPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TaskPriorityPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseTaskPriority:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseTaskPriority:save:pre') as $callable)
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
			$con = Propel::getConnection(TaskPriorityPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseTaskPriority:save:post') as $callable)
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
					$pk = TaskPriorityPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TaskPriorityPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collTasks !== null) {
				foreach($this->collTasks as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collFrequentlyTasks !== null) {
				foreach($this->collFrequentlyTasks as $referrerFK) {
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


			if (($retval = TaskPriorityPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collTasks !== null) {
					foreach($this->collTasks as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collFrequentlyTasks !== null) {
					foreach($this->collFrequentlyTasks as $referrerFK) {
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
		$pos = TaskPriorityPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getTaskPriorityTitle();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TaskPriorityPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTaskPriorityTitle(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TaskPriorityPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setTaskPriorityTitle($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TaskPriorityPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTaskPriorityTitle($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TaskPriorityPeer::DATABASE_NAME);

		if ($this->isColumnModified(TaskPriorityPeer::ID)) $criteria->add(TaskPriorityPeer::ID, $this->id);
		if ($this->isColumnModified(TaskPriorityPeer::TASK_PRIORITY_TITLE)) $criteria->add(TaskPriorityPeer::TASK_PRIORITY_TITLE, $this->task_priority_title);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TaskPriorityPeer::DATABASE_NAME);

		$criteria->add(TaskPriorityPeer::ID, $this->id);

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

		$copyObj->setTaskPriorityTitle($this->task_priority_title);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getTasks() as $relObj) {
				$copyObj->addTask($relObj->copy($deepCopy));
			}

			foreach($this->getFrequentlyTasks() as $relObj) {
				$copyObj->addFrequentlyTask($relObj->copy($deepCopy));
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
			self::$peer = new TaskPriorityPeer();
		}
		return self::$peer;
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

				$criteria->add(TaskPeer::TASK_PRIORITY_ID, $this->getId());

				TaskPeer::addSelectColumns($criteria);
				$this->collTasks = TaskPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TaskPeer::TASK_PRIORITY_ID, $this->getId());

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

		$criteria->add(TaskPeer::TASK_PRIORITY_ID, $this->getId());

		return TaskPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTask(Task $l)
	{
		$this->collTasks[] = $l;
		$l->setTaskPriority($this);
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

				$criteria->add(TaskPeer::TASK_PRIORITY_ID, $this->getId());

				$this->collTasks = TaskPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::TASK_PRIORITY_ID, $this->getId());

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

				$criteria->add(TaskPeer::TASK_PRIORITY_ID, $this->getId());

				$this->collTasks = TaskPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::TASK_PRIORITY_ID, $this->getId());

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

				$criteria->add(TaskPeer::TASK_PRIORITY_ID, $this->getId());

				$this->collTasks = TaskPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::TASK_PRIORITY_ID, $this->getId());

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

				$criteria->add(TaskPeer::TASK_PRIORITY_ID, $this->getId());

				$this->collTasks = TaskPeer::doSelectJoinBudget($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::TASK_PRIORITY_ID, $this->getId());

			if (!isset($this->lastTaskCriteria) || !$this->lastTaskCriteria->equals($criteria)) {
				$this->collTasks = TaskPeer::doSelectJoinBudget($criteria, $con);
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

				$criteria->add(TaskPeer::TASK_PRIORITY_ID, $this->getId());

				$this->collTasks = TaskPeer::doSelectJoinMilestone($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::TASK_PRIORITY_ID, $this->getId());

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

				$criteria->add(TaskPeer::TASK_PRIORITY_ID, $this->getId());

				$this->collTasks = TaskPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::TASK_PRIORITY_ID, $this->getId());

			if (!isset($this->lastTaskCriteria) || !$this->lastTaskCriteria->equals($criteria)) {
				$this->collTasks = TaskPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastTaskCriteria = $criteria;

		return $this->collTasks;
	}

	
	public function initFrequentlyTasks()
	{
		if ($this->collFrequentlyTasks === null) {
			$this->collFrequentlyTasks = array();
		}
	}

	
	public function getFrequentlyTasks($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFrequentlyTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFrequentlyTasks === null) {
			if ($this->isNew()) {
			   $this->collFrequentlyTasks = array();
			} else {

				$criteria->add(FrequentlyTaskPeer::TASK_PRIORITY_ID, $this->getId());

				FrequentlyTaskPeer::addSelectColumns($criteria);
				$this->collFrequentlyTasks = FrequentlyTaskPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FrequentlyTaskPeer::TASK_PRIORITY_ID, $this->getId());

				FrequentlyTaskPeer::addSelectColumns($criteria);
				if (!isset($this->lastFrequentlyTaskCriteria) || !$this->lastFrequentlyTaskCriteria->equals($criteria)) {
					$this->collFrequentlyTasks = FrequentlyTaskPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFrequentlyTaskCriteria = $criteria;
		return $this->collFrequentlyTasks;
	}

	
	public function countFrequentlyTasks($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFrequentlyTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FrequentlyTaskPeer::TASK_PRIORITY_ID, $this->getId());

		return FrequentlyTaskPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFrequentlyTask(FrequentlyTask $l)
	{
		$this->collFrequentlyTasks[] = $l;
		$l->setTaskPriority($this);
	}


	
	public function getFrequentlyTasksJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFrequentlyTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFrequentlyTasks === null) {
			if ($this->isNew()) {
				$this->collFrequentlyTasks = array();
			} else {

				$criteria->add(FrequentlyTaskPeer::TASK_PRIORITY_ID, $this->getId());

				$this->collFrequentlyTasks = FrequentlyTaskPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(FrequentlyTaskPeer::TASK_PRIORITY_ID, $this->getId());

			if (!isset($this->lastFrequentlyTaskCriteria) || !$this->lastFrequentlyTaskCriteria->equals($criteria)) {
				$this->collFrequentlyTasks = FrequentlyTaskPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		}
		$this->lastFrequentlyTaskCriteria = $criteria;

		return $this->collFrequentlyTasks;
	}


	
	public function getFrequentlyTasksJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFrequentlyTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFrequentlyTasks === null) {
			if ($this->isNew()) {
				$this->collFrequentlyTasks = array();
			} else {

				$criteria->add(FrequentlyTaskPeer::TASK_PRIORITY_ID, $this->getId());

				$this->collFrequentlyTasks = FrequentlyTaskPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(FrequentlyTaskPeer::TASK_PRIORITY_ID, $this->getId());

			if (!isset($this->lastFrequentlyTaskCriteria) || !$this->lastFrequentlyTaskCriteria->equals($criteria)) {
				$this->collFrequentlyTasks = FrequentlyTaskPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		}
		$this->lastFrequentlyTaskCriteria = $criteria;

		return $this->collFrequentlyTasks;
	}


	
	public function getFrequentlyTasksJoinsfGuardUserRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFrequentlyTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFrequentlyTasks === null) {
			if ($this->isNew()) {
				$this->collFrequentlyTasks = array();
			} else {

				$criteria->add(FrequentlyTaskPeer::TASK_PRIORITY_ID, $this->getId());

				$this->collFrequentlyTasks = FrequentlyTaskPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(FrequentlyTaskPeer::TASK_PRIORITY_ID, $this->getId());

			if (!isset($this->lastFrequentlyTaskCriteria) || !$this->lastFrequentlyTaskCriteria->equals($criteria)) {
				$this->collFrequentlyTasks = FrequentlyTaskPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		}
		$this->lastFrequentlyTaskCriteria = $criteria;

		return $this->collFrequentlyTasks;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseTaskPriority:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseTaskPriority::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
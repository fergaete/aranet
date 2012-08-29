<?php


abstract class BaseProjectCategory extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $category_title;

	
	protected $collProjects;

	
	protected $lastProjectCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getCategoryTitle()
	{

		return $this->category_title;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ProjectCategoryPeer::ID;
		}

	} 
	
	public function setCategoryTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->category_title !== $v) {
			$this->category_title = $v;
			$this->modifiedColumns[] = ProjectCategoryPeer::CATEGORY_TITLE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->category_title = $rs->getString($startcol + 1);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ProjectCategory object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectCategory:delete:pre') as $callable)
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
			$con = Propel::getConnection(ProjectCategoryPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ProjectCategoryPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseProjectCategory:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectCategory:save:pre') as $callable)
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
			$con = Propel::getConnection(ProjectCategoryPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseProjectCategory:save:post') as $callable)
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
					$pk = ProjectCategoryPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ProjectCategoryPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collProjects !== null) {
				foreach($this->collProjects as $referrerFK) {
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


			if (($retval = ProjectCategoryPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collProjects !== null) {
					foreach($this->collProjects as $referrerFK) {
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
		$pos = ProjectCategoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCategoryTitle();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ProjectCategoryPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCategoryTitle(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ProjectCategoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCategoryTitle($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ProjectCategoryPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCategoryTitle($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ProjectCategoryPeer::DATABASE_NAME);

		if ($this->isColumnModified(ProjectCategoryPeer::ID)) $criteria->add(ProjectCategoryPeer::ID, $this->id);
		if ($this->isColumnModified(ProjectCategoryPeer::CATEGORY_TITLE)) $criteria->add(ProjectCategoryPeer::CATEGORY_TITLE, $this->category_title);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ProjectCategoryPeer::DATABASE_NAME);

		$criteria->add(ProjectCategoryPeer::ID, $this->id);

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

		$copyObj->setCategoryTitle($this->category_title);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getProjects() as $relObj) {
				$copyObj->addProject($relObj->copy($deepCopy));
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
			self::$peer = new ProjectCategoryPeer();
		}
		return self::$peer;
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

				$criteria->add(ProjectPeer::PROJECT_CATEGORY_ID, $this->getId());

				ProjectPeer::addSelectColumns($criteria);
				$this->collProjects = ProjectPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ProjectPeer::PROJECT_CATEGORY_ID, $this->getId());

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

		$criteria->add(ProjectPeer::PROJECT_CATEGORY_ID, $this->getId());

		return ProjectPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addProject(Project $l)
	{
		$this->collProjects[] = $l;
		$l->setProjectCategory($this);
	}


	
	public function getProjectsJoinClient($criteria = null, $con = null)
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

				$criteria->add(ProjectPeer::PROJECT_CATEGORY_ID, $this->getId());

				$this->collProjects = ProjectPeer::doSelectJoinClient($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::PROJECT_CATEGORY_ID, $this->getId());

			if (!isset($this->lastProjectCriteria) || !$this->lastProjectCriteria->equals($criteria)) {
				$this->collProjects = ProjectPeer::doSelectJoinClient($criteria, $con);
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

				$criteria->add(ProjectPeer::PROJECT_CATEGORY_ID, $this->getId());

				$this->collProjects = ProjectPeer::doSelectJoinProjectStatus($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::PROJECT_CATEGORY_ID, $this->getId());

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

				$criteria->add(ProjectPeer::PROJECT_CATEGORY_ID, $this->getId());

				$this->collProjects = ProjectPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::PROJECT_CATEGORY_ID, $this->getId());

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

				$criteria->add(ProjectPeer::PROJECT_CATEGORY_ID, $this->getId());

				$this->collProjects = ProjectPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::PROJECT_CATEGORY_ID, $this->getId());

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

				$criteria->add(ProjectPeer::PROJECT_CATEGORY_ID, $this->getId());

				$this->collProjects = ProjectPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::PROJECT_CATEGORY_ID, $this->getId());

			if (!isset($this->lastProjectCriteria) || !$this->lastProjectCriteria->equals($criteria)) {
				$this->collProjects = ProjectPeer::doSelectJoinsfGuardUserRelatedByDeletedBy($criteria, $con);
			}
		}
		$this->lastProjectCriteria = $criteria;

		return $this->collProjects;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseProjectCategory:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseProjectCategory::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
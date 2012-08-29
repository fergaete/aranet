<?php


abstract class BaseDefaultIndicator extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $indicator_name;


	
	protected $indicator_key;


	
	protected $indicator_description;


	
	protected $indicator_beautifier;


	
	protected $indicator_unit;


	
	protected $indicator_objects_class;

	
	protected $collIndicators;

	
	protected $lastIndicatorCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getIndicatorName()
	{

		return $this->indicator_name;
	}

	
	public function getIndicatorKey()
	{

		return $this->indicator_key;
	}

	
	public function getIndicatorDescription()
	{

		return $this->indicator_description;
	}

	
	public function getIndicatorBeautifier()
	{

		return $this->indicator_beautifier;
	}

	
	public function getIndicatorUnit()
	{

		return $this->indicator_unit;
	}

	
	public function getIndicatorObjectsClass()
	{

		return $this->indicator_objects_class;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DefaultIndicatorPeer::ID;
		}

	} 
	
	public function setIndicatorName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->indicator_name !== $v) {
			$this->indicator_name = $v;
			$this->modifiedColumns[] = DefaultIndicatorPeer::INDICATOR_NAME;
		}

	} 
	
	public function setIndicatorKey($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->indicator_key !== $v) {
			$this->indicator_key = $v;
			$this->modifiedColumns[] = DefaultIndicatorPeer::INDICATOR_KEY;
		}

	} 
	
	public function setIndicatorDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->indicator_description !== $v) {
			$this->indicator_description = $v;
			$this->modifiedColumns[] = DefaultIndicatorPeer::INDICATOR_DESCRIPTION;
		}

	} 
	
	public function setIndicatorBeautifier($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->indicator_beautifier !== $v) {
			$this->indicator_beautifier = $v;
			$this->modifiedColumns[] = DefaultIndicatorPeer::INDICATOR_BEAUTIFIER;
		}

	} 
	
	public function setIndicatorUnit($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->indicator_unit !== $v) {
			$this->indicator_unit = $v;
			$this->modifiedColumns[] = DefaultIndicatorPeer::INDICATOR_UNIT;
		}

	} 
	
	public function setIndicatorObjectsClass($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->indicator_objects_class !== $v) {
			$this->indicator_objects_class = $v;
			$this->modifiedColumns[] = DefaultIndicatorPeer::INDICATOR_OBJECTS_CLASS;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->indicator_name = $rs->getString($startcol + 1);

			$this->indicator_key = $rs->getString($startcol + 2);

			$this->indicator_description = $rs->getString($startcol + 3);

			$this->indicator_beautifier = $rs->getString($startcol + 4);

			$this->indicator_unit = $rs->getString($startcol + 5);

			$this->indicator_objects_class = $rs->getString($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating DefaultIndicator object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseDefaultIndicator:delete:pre') as $callable)
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
			$con = Propel::getConnection(DefaultIndicatorPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DefaultIndicatorPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseDefaultIndicator:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseDefaultIndicator:save:pre') as $callable)
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
			$con = Propel::getConnection(DefaultIndicatorPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseDefaultIndicator:save:post') as $callable)
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
					$pk = DefaultIndicatorPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DefaultIndicatorPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collIndicators !== null) {
				foreach($this->collIndicators as $referrerFK) {
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


			if (($retval = DefaultIndicatorPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collIndicators !== null) {
					foreach($this->collIndicators as $referrerFK) {
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
		$pos = DefaultIndicatorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getIndicatorName();
				break;
			case 2:
				return $this->getIndicatorKey();
				break;
			case 3:
				return $this->getIndicatorDescription();
				break;
			case 4:
				return $this->getIndicatorBeautifier();
				break;
			case 5:
				return $this->getIndicatorUnit();
				break;
			case 6:
				return $this->getIndicatorObjectsClass();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DefaultIndicatorPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getIndicatorName(),
			$keys[2] => $this->getIndicatorKey(),
			$keys[3] => $this->getIndicatorDescription(),
			$keys[4] => $this->getIndicatorBeautifier(),
			$keys[5] => $this->getIndicatorUnit(),
			$keys[6] => $this->getIndicatorObjectsClass(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DefaultIndicatorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setIndicatorName($value);
				break;
			case 2:
				$this->setIndicatorKey($value);
				break;
			case 3:
				$this->setIndicatorDescription($value);
				break;
			case 4:
				$this->setIndicatorBeautifier($value);
				break;
			case 5:
				$this->setIndicatorUnit($value);
				break;
			case 6:
				$this->setIndicatorObjectsClass($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DefaultIndicatorPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIndicatorName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIndicatorKey($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIndicatorDescription($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setIndicatorBeautifier($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setIndicatorUnit($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setIndicatorObjectsClass($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DefaultIndicatorPeer::DATABASE_NAME);

		if ($this->isColumnModified(DefaultIndicatorPeer::ID)) $criteria->add(DefaultIndicatorPeer::ID, $this->id);
		if ($this->isColumnModified(DefaultIndicatorPeer::INDICATOR_NAME)) $criteria->add(DefaultIndicatorPeer::INDICATOR_NAME, $this->indicator_name);
		if ($this->isColumnModified(DefaultIndicatorPeer::INDICATOR_KEY)) $criteria->add(DefaultIndicatorPeer::INDICATOR_KEY, $this->indicator_key);
		if ($this->isColumnModified(DefaultIndicatorPeer::INDICATOR_DESCRIPTION)) $criteria->add(DefaultIndicatorPeer::INDICATOR_DESCRIPTION, $this->indicator_description);
		if ($this->isColumnModified(DefaultIndicatorPeer::INDICATOR_BEAUTIFIER)) $criteria->add(DefaultIndicatorPeer::INDICATOR_BEAUTIFIER, $this->indicator_beautifier);
		if ($this->isColumnModified(DefaultIndicatorPeer::INDICATOR_UNIT)) $criteria->add(DefaultIndicatorPeer::INDICATOR_UNIT, $this->indicator_unit);
		if ($this->isColumnModified(DefaultIndicatorPeer::INDICATOR_OBJECTS_CLASS)) $criteria->add(DefaultIndicatorPeer::INDICATOR_OBJECTS_CLASS, $this->indicator_objects_class);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DefaultIndicatorPeer::DATABASE_NAME);

		$criteria->add(DefaultIndicatorPeer::ID, $this->id);

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

		$copyObj->setIndicatorName($this->indicator_name);

		$copyObj->setIndicatorKey($this->indicator_key);

		$copyObj->setIndicatorDescription($this->indicator_description);

		$copyObj->setIndicatorBeautifier($this->indicator_beautifier);

		$copyObj->setIndicatorUnit($this->indicator_unit);

		$copyObj->setIndicatorObjectsClass($this->indicator_objects_class);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getIndicators() as $relObj) {
				$copyObj->addIndicator($relObj->copy($deepCopy));
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
			self::$peer = new DefaultIndicatorPeer();
		}
		return self::$peer;
	}

	
	public function initIndicators()
	{
		if ($this->collIndicators === null) {
			$this->collIndicators = array();
		}
	}

	
	public function getIndicators($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIndicatorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIndicators === null) {
			if ($this->isNew()) {
			   $this->collIndicators = array();
			} else {

				$criteria->add(IndicatorPeer::INDICATOR_ID, $this->getId());

				IndicatorPeer::addSelectColumns($criteria);
				$this->collIndicators = IndicatorPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(IndicatorPeer::INDICATOR_ID, $this->getId());

				IndicatorPeer::addSelectColumns($criteria);
				if (!isset($this->lastIndicatorCriteria) || !$this->lastIndicatorCriteria->equals($criteria)) {
					$this->collIndicators = IndicatorPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastIndicatorCriteria = $criteria;
		return $this->collIndicators;
	}

	
	public function countIndicators($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseIndicatorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(IndicatorPeer::INDICATOR_ID, $this->getId());

		return IndicatorPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addIndicator(Indicator $l)
	{
		$this->collIndicators[] = $l;
		$l->setDefaultIndicator($this);
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseDefaultIndicator:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseDefaultIndicator::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
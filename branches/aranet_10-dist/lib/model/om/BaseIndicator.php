<?php


abstract class BaseIndicator extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $indicator_id;


	
	protected $indicator_value;


	
	protected $indicator_beautifier;


	
	protected $indicator_unit;


	
	protected $indicator_object_id;


	
	protected $indicator_object_class;

	
	protected $aDefaultIndicator;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getIndicatorId()
	{

		return $this->indicator_id;
	}

	
	public function getIndicatorValue()
	{

		return $this->indicator_value;
	}

	
	public function getIndicatorBeautifier()
	{

		return $this->indicator_beautifier;
	}

	
	public function getIndicatorUnit()
	{

		return $this->indicator_unit;
	}

	
	public function getIndicatorObjectId()
	{

		return $this->indicator_object_id;
	}

	
	public function getIndicatorObjectClass()
	{

		return $this->indicator_object_class;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = IndicatorPeer::ID;
		}

	} 
	
	public function setIndicatorId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->indicator_id !== $v) {
			$this->indicator_id = $v;
			$this->modifiedColumns[] = IndicatorPeer::INDICATOR_ID;
		}

		if ($this->aDefaultIndicator !== null && $this->aDefaultIndicator->getId() !== $v) {
			$this->aDefaultIndicator = null;
		}

	} 
	
	public function setIndicatorValue($v)
	{

		if ($this->indicator_value !== $v) {
			$this->indicator_value = $v;
			$this->modifiedColumns[] = IndicatorPeer::INDICATOR_VALUE;
		}

	} 
	
	public function setIndicatorBeautifier($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->indicator_beautifier !== $v) {
			$this->indicator_beautifier = $v;
			$this->modifiedColumns[] = IndicatorPeer::INDICATOR_BEAUTIFIER;
		}

	} 
	
	public function setIndicatorUnit($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->indicator_unit !== $v) {
			$this->indicator_unit = $v;
			$this->modifiedColumns[] = IndicatorPeer::INDICATOR_UNIT;
		}

	} 
	
	public function setIndicatorObjectId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->indicator_object_id !== $v) {
			$this->indicator_object_id = $v;
			$this->modifiedColumns[] = IndicatorPeer::INDICATOR_OBJECT_ID;
		}

	} 
	
	public function setIndicatorObjectClass($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->indicator_object_class !== $v) {
			$this->indicator_object_class = $v;
			$this->modifiedColumns[] = IndicatorPeer::INDICATOR_OBJECT_CLASS;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->indicator_id = $rs->getInt($startcol + 1);

			$this->indicator_value = $rs->getFloat($startcol + 2);

			$this->indicator_beautifier = $rs->getString($startcol + 3);

			$this->indicator_unit = $rs->getString($startcol + 4);

			$this->indicator_object_id = $rs->getInt($startcol + 5);

			$this->indicator_object_class = $rs->getString($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Indicator object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseIndicator:delete:pre') as $callable)
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
			$con = Propel::getConnection(IndicatorPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			IndicatorPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseIndicator:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseIndicator:save:pre') as $callable)
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
			$con = Propel::getConnection(IndicatorPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseIndicator:save:post') as $callable)
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


												
			if ($this->aDefaultIndicator !== null) {
				if ($this->aDefaultIndicator->isModified()) {
					$affectedRows += $this->aDefaultIndicator->save($con);
				}
				$this->setDefaultIndicator($this->aDefaultIndicator);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = IndicatorPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += IndicatorPeer::doUpdate($this, $con);
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


												
			if ($this->aDefaultIndicator !== null) {
				if (!$this->aDefaultIndicator->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDefaultIndicator->getValidationFailures());
				}
			}


			if (($retval = IndicatorPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = IndicatorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getIndicatorId();
				break;
			case 2:
				return $this->getIndicatorValue();
				break;
			case 3:
				return $this->getIndicatorBeautifier();
				break;
			case 4:
				return $this->getIndicatorUnit();
				break;
			case 5:
				return $this->getIndicatorObjectId();
				break;
			case 6:
				return $this->getIndicatorObjectClass();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = IndicatorPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getIndicatorId(),
			$keys[2] => $this->getIndicatorValue(),
			$keys[3] => $this->getIndicatorBeautifier(),
			$keys[4] => $this->getIndicatorUnit(),
			$keys[5] => $this->getIndicatorObjectId(),
			$keys[6] => $this->getIndicatorObjectClass(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = IndicatorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setIndicatorId($value);
				break;
			case 2:
				$this->setIndicatorValue($value);
				break;
			case 3:
				$this->setIndicatorBeautifier($value);
				break;
			case 4:
				$this->setIndicatorUnit($value);
				break;
			case 5:
				$this->setIndicatorObjectId($value);
				break;
			case 6:
				$this->setIndicatorObjectClass($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = IndicatorPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIndicatorId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIndicatorValue($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIndicatorBeautifier($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setIndicatorUnit($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setIndicatorObjectId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setIndicatorObjectClass($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(IndicatorPeer::DATABASE_NAME);

		if ($this->isColumnModified(IndicatorPeer::ID)) $criteria->add(IndicatorPeer::ID, $this->id);
		if ($this->isColumnModified(IndicatorPeer::INDICATOR_ID)) $criteria->add(IndicatorPeer::INDICATOR_ID, $this->indicator_id);
		if ($this->isColumnModified(IndicatorPeer::INDICATOR_VALUE)) $criteria->add(IndicatorPeer::INDICATOR_VALUE, $this->indicator_value);
		if ($this->isColumnModified(IndicatorPeer::INDICATOR_BEAUTIFIER)) $criteria->add(IndicatorPeer::INDICATOR_BEAUTIFIER, $this->indicator_beautifier);
		if ($this->isColumnModified(IndicatorPeer::INDICATOR_UNIT)) $criteria->add(IndicatorPeer::INDICATOR_UNIT, $this->indicator_unit);
		if ($this->isColumnModified(IndicatorPeer::INDICATOR_OBJECT_ID)) $criteria->add(IndicatorPeer::INDICATOR_OBJECT_ID, $this->indicator_object_id);
		if ($this->isColumnModified(IndicatorPeer::INDICATOR_OBJECT_CLASS)) $criteria->add(IndicatorPeer::INDICATOR_OBJECT_CLASS, $this->indicator_object_class);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(IndicatorPeer::DATABASE_NAME);

		$criteria->add(IndicatorPeer::ID, $this->id);

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

		$copyObj->setIndicatorId($this->indicator_id);

		$copyObj->setIndicatorValue($this->indicator_value);

		$copyObj->setIndicatorBeautifier($this->indicator_beautifier);

		$copyObj->setIndicatorUnit($this->indicator_unit);

		$copyObj->setIndicatorObjectId($this->indicator_object_id);

		$copyObj->setIndicatorObjectClass($this->indicator_object_class);


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
			self::$peer = new IndicatorPeer();
		}
		return self::$peer;
	}

	
	public function setDefaultIndicator($v)
	{


		if ($v === null) {
			$this->setIndicatorId(NULL);
		} else {
			$this->setIndicatorId($v->getId());
		}


		$this->aDefaultIndicator = $v;
	}


	
	public function getDefaultIndicator($con = null)
	{
		if ($this->aDefaultIndicator === null && ($this->indicator_id !== null)) {
						include_once 'lib/model/om/BaseDefaultIndicatorPeer.php';

			$this->aDefaultIndicator = DefaultIndicatorPeer::retrieveByPK($this->indicator_id, $con);

			
		}
		return $this->aDefaultIndicator;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseIndicator:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseIndicator::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
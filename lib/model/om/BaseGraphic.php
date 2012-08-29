<?php


abstract class BaseGraphic extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $graphic_name;


	
	protected $data_points;


	
	protected $start_date;


	
	protected $end_date;


	
	protected $is_default = false;


	
	protected $created_at;


	
	protected $created_by = 0;


	
	protected $updated_at;


	
	protected $updated_by = 0;

	
	protected $asfGuardUserRelatedByCreatedBy;

	
	protected $asfGuardUserRelatedByUpdatedBy;

	
	protected $collGraphicPlots;

	
	protected $lastGraphicPlotCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getGraphicName()
	{

		return $this->graphic_name;
	}

	
	public function getDataPoints()
	{

		return $this->data_points;
	}

	
	public function getStartDate($format = 'Y-m-d H:i:s')
	{

		if ($this->start_date === null || $this->start_date === '') {
			return null;
		} elseif (!is_int($this->start_date)) {
						$ts = strtotime($this->start_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [start_date] as date/time value: " . var_export($this->start_date, true));
			}
		} else {
			$ts = $this->start_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getEndDate($format = 'Y-m-d H:i:s')
	{

		if ($this->end_date === null || $this->end_date === '') {
			return null;
		} elseif (!is_int($this->end_date)) {
						$ts = strtotime($this->end_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [end_date] as date/time value: " . var_export($this->end_date, true));
			}
		} else {
			$ts = $this->end_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getIsDefault()
	{

		return $this->is_default;
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

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = GraphicPeer::ID;
		}

	} 
	
	public function setGraphicName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->graphic_name !== $v) {
			$this->graphic_name = $v;
			$this->modifiedColumns[] = GraphicPeer::GRAPHIC_NAME;
		}

	} 
	
	public function setDataPoints($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->data_points !== $v) {
			$this->data_points = $v;
			$this->modifiedColumns[] = GraphicPeer::DATA_POINTS;
		}

	} 
	
	public function setStartDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [start_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->start_date !== $ts) {
			$this->start_date = $ts;
			$this->modifiedColumns[] = GraphicPeer::START_DATE;
		}

	} 
	
	public function setEndDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [end_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->end_date !== $ts) {
			$this->end_date = $ts;
			$this->modifiedColumns[] = GraphicPeer::END_DATE;
		}

	} 
	
	public function setIsDefault($v)
	{

		if ($this->is_default !== $v || $v === false) {
			$this->is_default = $v;
			$this->modifiedColumns[] = GraphicPeer::IS_DEFAULT;
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
			$this->modifiedColumns[] = GraphicPeer::CREATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v || $v === 0) {
			$this->created_by = $v;
			$this->modifiedColumns[] = GraphicPeer::CREATED_BY;
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
			$this->modifiedColumns[] = GraphicPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v || $v === 0) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = GraphicPeer::UPDATED_BY;
		}

		if ($this->asfGuardUserRelatedByUpdatedBy !== null && $this->asfGuardUserRelatedByUpdatedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByUpdatedBy = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->graphic_name = $rs->getString($startcol + 1);

			$this->data_points = $rs->getInt($startcol + 2);

			$this->start_date = $rs->getTimestamp($startcol + 3, null);

			$this->end_date = $rs->getTimestamp($startcol + 4, null);

			$this->is_default = $rs->getBoolean($startcol + 5);

			$this->created_at = $rs->getTimestamp($startcol + 6, null);

			$this->created_by = $rs->getInt($startcol + 7);

			$this->updated_at = $rs->getTimestamp($startcol + 8, null);

			$this->updated_by = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Graphic object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseGraphic:delete:pre') as $callable)
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
			$con = Propel::getConnection(GraphicPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GraphicPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseGraphic:delete:post') as $callable)
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
                

    foreach (sfMixer::getCallables('BaseGraphic:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(GraphicPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(GraphicPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GraphicPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseGraphic:save:post') as $callable)
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = GraphicPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GraphicPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collGraphicPlots !== null) {
				foreach($this->collGraphicPlots as $referrerFK) {
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


			if (($retval = GraphicPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collGraphicPlots !== null) {
					foreach($this->collGraphicPlots as $referrerFK) {
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
		$pos = GraphicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getGraphicName();
				break;
			case 2:
				return $this->getDataPoints();
				break;
			case 3:
				return $this->getStartDate();
				break;
			case 4:
				return $this->getEndDate();
				break;
			case 5:
				return $this->getIsDefault();
				break;
			case 6:
				return $this->getCreatedAt();
				break;
			case 7:
				return $this->getCreatedBy();
				break;
			case 8:
				return $this->getUpdatedAt();
				break;
			case 9:
				return $this->getUpdatedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GraphicPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getGraphicName(),
			$keys[2] => $this->getDataPoints(),
			$keys[3] => $this->getStartDate(),
			$keys[4] => $this->getEndDate(),
			$keys[5] => $this->getIsDefault(),
			$keys[6] => $this->getCreatedAt(),
			$keys[7] => $this->getCreatedBy(),
			$keys[8] => $this->getUpdatedAt(),
			$keys[9] => $this->getUpdatedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GraphicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setGraphicName($value);
				break;
			case 2:
				$this->setDataPoints($value);
				break;
			case 3:
				$this->setStartDate($value);
				break;
			case 4:
				$this->setEndDate($value);
				break;
			case 5:
				$this->setIsDefault($value);
				break;
			case 6:
				$this->setCreatedAt($value);
				break;
			case 7:
				$this->setCreatedBy($value);
				break;
			case 8:
				$this->setUpdatedAt($value);
				break;
			case 9:
				$this->setUpdatedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GraphicPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setGraphicName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDataPoints($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStartDate($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEndDate($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setIsDefault($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedBy($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUpdatedAt($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUpdatedBy($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GraphicPeer::DATABASE_NAME);

		if ($this->isColumnModified(GraphicPeer::ID)) $criteria->add(GraphicPeer::ID, $this->id);
		if ($this->isColumnModified(GraphicPeer::GRAPHIC_NAME)) $criteria->add(GraphicPeer::GRAPHIC_NAME, $this->graphic_name);
		if ($this->isColumnModified(GraphicPeer::DATA_POINTS)) $criteria->add(GraphicPeer::DATA_POINTS, $this->data_points);
		if ($this->isColumnModified(GraphicPeer::START_DATE)) $criteria->add(GraphicPeer::START_DATE, $this->start_date);
		if ($this->isColumnModified(GraphicPeer::END_DATE)) $criteria->add(GraphicPeer::END_DATE, $this->end_date);
		if ($this->isColumnModified(GraphicPeer::IS_DEFAULT)) $criteria->add(GraphicPeer::IS_DEFAULT, $this->is_default);
		if ($this->isColumnModified(GraphicPeer::CREATED_AT)) $criteria->add(GraphicPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(GraphicPeer::CREATED_BY)) $criteria->add(GraphicPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(GraphicPeer::UPDATED_AT)) $criteria->add(GraphicPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(GraphicPeer::UPDATED_BY)) $criteria->add(GraphicPeer::UPDATED_BY, $this->updated_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GraphicPeer::DATABASE_NAME);

		$criteria->add(GraphicPeer::ID, $this->id);

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

		$copyObj->setGraphicName($this->graphic_name);

		$copyObj->setDataPoints($this->data_points);

		$copyObj->setStartDate($this->start_date);

		$copyObj->setEndDate($this->end_date);

		$copyObj->setIsDefault($this->is_default);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getGraphicPlots() as $relObj) {
				$copyObj->addGraphicPlot($relObj->copy($deepCopy));
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
			self::$peer = new GraphicPeer();
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

	
	public function initGraphicPlots()
	{
		if ($this->collGraphicPlots === null) {
			$this->collGraphicPlots = array();
		}
	}

	
	public function getGraphicPlots($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseGraphicPlotPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGraphicPlots === null) {
			if ($this->isNew()) {
			   $this->collGraphicPlots = array();
			} else {

				$criteria->add(GraphicPlotPeer::GRAPHIC_ID, $this->getId());

				GraphicPlotPeer::addSelectColumns($criteria);
				$this->collGraphicPlots = GraphicPlotPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(GraphicPlotPeer::GRAPHIC_ID, $this->getId());

				GraphicPlotPeer::addSelectColumns($criteria);
				if (!isset($this->lastGraphicPlotCriteria) || !$this->lastGraphicPlotCriteria->equals($criteria)) {
					$this->collGraphicPlots = GraphicPlotPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastGraphicPlotCriteria = $criteria;
		return $this->collGraphicPlots;
	}

	
	public function countGraphicPlots($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseGraphicPlotPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(GraphicPlotPeer::GRAPHIC_ID, $this->getId());

		return GraphicPlotPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addGraphicPlot(GraphicPlot $l)
	{
		$this->collGraphicPlots[] = $l;
		$l->setGraphic($this);
	}


	
	public function getGraphicPlotsJoinGPlot($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseGraphicPlotPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGraphicPlots === null) {
			if ($this->isNew()) {
				$this->collGraphicPlots = array();
			} else {

				$criteria->add(GraphicPlotPeer::GRAPHIC_ID, $this->getId());

				$this->collGraphicPlots = GraphicPlotPeer::doSelectJoinGPlot($criteria, $con);
			}
		} else {
									
			$criteria->add(GraphicPlotPeer::GRAPHIC_ID, $this->getId());

			if (!isset($this->lastGraphicPlotCriteria) || !$this->lastGraphicPlotCriteria->equals($criteria)) {
				$this->collGraphicPlots = GraphicPlotPeer::doSelectJoinGPlot($criteria, $con);
			}
		}
		$this->lastGraphicPlotCriteria = $criteria;

		return $this->collGraphicPlots;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseGraphic:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseGraphic::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
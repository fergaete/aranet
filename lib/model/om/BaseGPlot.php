<?php


abstract class BaseGPlot extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $plot_name;


	
	protected $plot_color;


	
	protected $plot_type;


	
	protected $plot_criteria;


	
	protected $plot_date_variable;


	
	protected $plot_class;


	
	protected $plot_function;


	
	protected $plot_callback;


	
	protected $plot_acc_function;

	
	protected $collGraphicPlots;

	
	protected $lastGraphicPlotCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getPlotName()
	{

		return $this->plot_name;
	}

	
	public function getPlotColor()
	{

		return $this->plot_color;
	}

	
	public function getPlotType()
	{

		return $this->plot_type;
	}

	
	public function getPlotCriteria()
	{

		return $this->plot_criteria;
	}

	
	public function getPlotDateVariable()
	{

		return $this->plot_date_variable;
	}

	
	public function getPlotClass()
	{

		return $this->plot_class;
	}

	
	public function getPlotFunction()
	{

		return $this->plot_function;
	}

	
	public function getPlotCallback()
	{

		return $this->plot_callback;
	}

	
	public function getPlotAccFunction()
	{

		return $this->plot_acc_function;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = GPlotPeer::ID;
		}

	} 
	
	public function setPlotName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->plot_name !== $v) {
			$this->plot_name = $v;
			$this->modifiedColumns[] = GPlotPeer::PLOT_NAME;
		}

	} 
	
	public function setPlotColor($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->plot_color !== $v) {
			$this->plot_color = $v;
			$this->modifiedColumns[] = GPlotPeer::PLOT_COLOR;
		}

	} 
	
	public function setPlotType($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->plot_type !== $v) {
			$this->plot_type = $v;
			$this->modifiedColumns[] = GPlotPeer::PLOT_TYPE;
		}

	} 
	
	public function setPlotCriteria($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->plot_criteria !== $v) {
			$this->plot_criteria = $v;
			$this->modifiedColumns[] = GPlotPeer::PLOT_CRITERIA;
		}

	} 
	
	public function setPlotDateVariable($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->plot_date_variable !== $v) {
			$this->plot_date_variable = $v;
			$this->modifiedColumns[] = GPlotPeer::PLOT_DATE_VARIABLE;
		}

	} 
	
	public function setPlotClass($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->plot_class !== $v) {
			$this->plot_class = $v;
			$this->modifiedColumns[] = GPlotPeer::PLOT_CLASS;
		}

	} 
	
	public function setPlotFunction($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->plot_function !== $v) {
			$this->plot_function = $v;
			$this->modifiedColumns[] = GPlotPeer::PLOT_FUNCTION;
		}

	} 
	
	public function setPlotCallback($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->plot_callback !== $v) {
			$this->plot_callback = $v;
			$this->modifiedColumns[] = GPlotPeer::PLOT_CALLBACK;
		}

	} 
	
	public function setPlotAccFunction($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->plot_acc_function !== $v) {
			$this->plot_acc_function = $v;
			$this->modifiedColumns[] = GPlotPeer::PLOT_ACC_FUNCTION;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->plot_name = $rs->getString($startcol + 1);

			$this->plot_color = $rs->getString($startcol + 2);

			$this->plot_type = $rs->getString($startcol + 3);

			$this->plot_criteria = $rs->getString($startcol + 4);

			$this->plot_date_variable = $rs->getString($startcol + 5);

			$this->plot_class = $rs->getString($startcol + 6);

			$this->plot_function = $rs->getString($startcol + 7);

			$this->plot_callback = $rs->getString($startcol + 8);

			$this->plot_acc_function = $rs->getString($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GPlot object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseGPlot:delete:pre') as $callable)
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
			$con = Propel::getConnection(GPlotPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GPlotPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseGPlot:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseGPlot:save:pre') as $callable)
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
			$con = Propel::getConnection(GPlotPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseGPlot:save:post') as $callable)
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
					$pk = GPlotPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GPlotPeer::doUpdate($this, $con);
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


			if (($retval = GPlotPeer::doValidate($this, $columns)) !== true) {
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
		$pos = GPlotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getPlotName();
				break;
			case 2:
				return $this->getPlotColor();
				break;
			case 3:
				return $this->getPlotType();
				break;
			case 4:
				return $this->getPlotCriteria();
				break;
			case 5:
				return $this->getPlotDateVariable();
				break;
			case 6:
				return $this->getPlotClass();
				break;
			case 7:
				return $this->getPlotFunction();
				break;
			case 8:
				return $this->getPlotCallback();
				break;
			case 9:
				return $this->getPlotAccFunction();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GPlotPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPlotName(),
			$keys[2] => $this->getPlotColor(),
			$keys[3] => $this->getPlotType(),
			$keys[4] => $this->getPlotCriteria(),
			$keys[5] => $this->getPlotDateVariable(),
			$keys[6] => $this->getPlotClass(),
			$keys[7] => $this->getPlotFunction(),
			$keys[8] => $this->getPlotCallback(),
			$keys[9] => $this->getPlotAccFunction(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GPlotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setPlotName($value);
				break;
			case 2:
				$this->setPlotColor($value);
				break;
			case 3:
				$this->setPlotType($value);
				break;
			case 4:
				$this->setPlotCriteria($value);
				break;
			case 5:
				$this->setPlotDateVariable($value);
				break;
			case 6:
				$this->setPlotClass($value);
				break;
			case 7:
				$this->setPlotFunction($value);
				break;
			case 8:
				$this->setPlotCallback($value);
				break;
			case 9:
				$this->setPlotAccFunction($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GPlotPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPlotName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPlotColor($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPlotType($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPlotCriteria($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPlotDateVariable($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPlotClass($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPlotFunction($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPlotCallback($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setPlotAccFunction($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GPlotPeer::DATABASE_NAME);

		if ($this->isColumnModified(GPlotPeer::ID)) $criteria->add(GPlotPeer::ID, $this->id);
		if ($this->isColumnModified(GPlotPeer::PLOT_NAME)) $criteria->add(GPlotPeer::PLOT_NAME, $this->plot_name);
		if ($this->isColumnModified(GPlotPeer::PLOT_COLOR)) $criteria->add(GPlotPeer::PLOT_COLOR, $this->plot_color);
		if ($this->isColumnModified(GPlotPeer::PLOT_TYPE)) $criteria->add(GPlotPeer::PLOT_TYPE, $this->plot_type);
		if ($this->isColumnModified(GPlotPeer::PLOT_CRITERIA)) $criteria->add(GPlotPeer::PLOT_CRITERIA, $this->plot_criteria);
		if ($this->isColumnModified(GPlotPeer::PLOT_DATE_VARIABLE)) $criteria->add(GPlotPeer::PLOT_DATE_VARIABLE, $this->plot_date_variable);
		if ($this->isColumnModified(GPlotPeer::PLOT_CLASS)) $criteria->add(GPlotPeer::PLOT_CLASS, $this->plot_class);
		if ($this->isColumnModified(GPlotPeer::PLOT_FUNCTION)) $criteria->add(GPlotPeer::PLOT_FUNCTION, $this->plot_function);
		if ($this->isColumnModified(GPlotPeer::PLOT_CALLBACK)) $criteria->add(GPlotPeer::PLOT_CALLBACK, $this->plot_callback);
		if ($this->isColumnModified(GPlotPeer::PLOT_ACC_FUNCTION)) $criteria->add(GPlotPeer::PLOT_ACC_FUNCTION, $this->plot_acc_function);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GPlotPeer::DATABASE_NAME);

		$criteria->add(GPlotPeer::ID, $this->id);

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

		$copyObj->setPlotName($this->plot_name);

		$copyObj->setPlotColor($this->plot_color);

		$copyObj->setPlotType($this->plot_type);

		$copyObj->setPlotCriteria($this->plot_criteria);

		$copyObj->setPlotDateVariable($this->plot_date_variable);

		$copyObj->setPlotClass($this->plot_class);

		$copyObj->setPlotFunction($this->plot_function);

		$copyObj->setPlotCallback($this->plot_callback);

		$copyObj->setPlotAccFunction($this->plot_acc_function);


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
			self::$peer = new GPlotPeer();
		}
		return self::$peer;
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

				$criteria->add(GraphicPlotPeer::PLOT_ID, $this->getId());

				GraphicPlotPeer::addSelectColumns($criteria);
				$this->collGraphicPlots = GraphicPlotPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(GraphicPlotPeer::PLOT_ID, $this->getId());

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

		$criteria->add(GraphicPlotPeer::PLOT_ID, $this->getId());

		return GraphicPlotPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addGraphicPlot(GraphicPlot $l)
	{
		$this->collGraphicPlots[] = $l;
		$l->setGPlot($this);
	}


	
	public function getGraphicPlotsJoinGraphic($criteria = null, $con = null)
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

				$criteria->add(GraphicPlotPeer::PLOT_ID, $this->getId());

				$this->collGraphicPlots = GraphicPlotPeer::doSelectJoinGraphic($criteria, $con);
			}
		} else {
									
			$criteria->add(GraphicPlotPeer::PLOT_ID, $this->getId());

			if (!isset($this->lastGraphicPlotCriteria) || !$this->lastGraphicPlotCriteria->equals($criteria)) {
				$this->collGraphicPlots = GraphicPlotPeer::doSelectJoinGraphic($criteria, $con);
			}
		}
		$this->lastGraphicPlotCriteria = $criteria;

		return $this->collGraphicPlots;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseGPlot:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseGPlot::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
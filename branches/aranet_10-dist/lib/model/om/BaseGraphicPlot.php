<?php


abstract class BaseGraphicPlot extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $graphic_id = 0;


	
	protected $plot_id = 0;

	
	protected $aGraphic;

	
	protected $aGPlot;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getGraphicId()
	{

		return $this->graphic_id;
	}

	
	public function getPlotId()
	{

		return $this->plot_id;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = GraphicPlotPeer::ID;
		}

	} 
	
	public function setGraphicId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->graphic_id !== $v || $v === 0) {
			$this->graphic_id = $v;
			$this->modifiedColumns[] = GraphicPlotPeer::GRAPHIC_ID;
		}

		if ($this->aGraphic !== null && $this->aGraphic->getId() !== $v) {
			$this->aGraphic = null;
		}

	} 
	
	public function setPlotId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->plot_id !== $v || $v === 0) {
			$this->plot_id = $v;
			$this->modifiedColumns[] = GraphicPlotPeer::PLOT_ID;
		}

		if ($this->aGPlot !== null && $this->aGPlot->getId() !== $v) {
			$this->aGPlot = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->graphic_id = $rs->getInt($startcol + 1);

			$this->plot_id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GraphicPlot object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseGraphicPlot:delete:pre') as $callable)
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
			$con = Propel::getConnection(GraphicPlotPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GraphicPlotPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseGraphicPlot:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseGraphicPlot:save:pre') as $callable)
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
			$con = Propel::getConnection(GraphicPlotPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseGraphicPlot:save:post') as $callable)
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


												
			if ($this->aGraphic !== null) {
				if ($this->aGraphic->isModified()) {
					$affectedRows += $this->aGraphic->save($con);
				}
				$this->setGraphic($this->aGraphic);
			}

			if ($this->aGPlot !== null) {
				if ($this->aGPlot->isModified()) {
					$affectedRows += $this->aGPlot->save($con);
				}
				$this->setGPlot($this->aGPlot);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = GraphicPlotPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GraphicPlotPeer::doUpdate($this, $con);
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


												
			if ($this->aGraphic !== null) {
				if (!$this->aGraphic->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aGraphic->getValidationFailures());
				}
			}

			if ($this->aGPlot !== null) {
				if (!$this->aGPlot->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aGPlot->getValidationFailures());
				}
			}


			if (($retval = GraphicPlotPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GraphicPlotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getGraphicId();
				break;
			case 2:
				return $this->getPlotId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GraphicPlotPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getGraphicId(),
			$keys[2] => $this->getPlotId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GraphicPlotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setGraphicId($value);
				break;
			case 2:
				$this->setPlotId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GraphicPlotPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setGraphicId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPlotId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GraphicPlotPeer::DATABASE_NAME);

		if ($this->isColumnModified(GraphicPlotPeer::ID)) $criteria->add(GraphicPlotPeer::ID, $this->id);
		if ($this->isColumnModified(GraphicPlotPeer::GRAPHIC_ID)) $criteria->add(GraphicPlotPeer::GRAPHIC_ID, $this->graphic_id);
		if ($this->isColumnModified(GraphicPlotPeer::PLOT_ID)) $criteria->add(GraphicPlotPeer::PLOT_ID, $this->plot_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GraphicPlotPeer::DATABASE_NAME);

		$criteria->add(GraphicPlotPeer::ID, $this->id);

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

		$copyObj->setGraphicId($this->graphic_id);

		$copyObj->setPlotId($this->plot_id);


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
			self::$peer = new GraphicPlotPeer();
		}
		return self::$peer;
	}

	
	public function setGraphic($v)
	{


		if ($v === null) {
			$this->setGraphicId('null');
		} else {
			$this->setGraphicId($v->getId());
		}


		$this->aGraphic = $v;
	}


	
	public function getGraphic($con = null)
	{
		if ($this->aGraphic === null && ($this->graphic_id !== null)) {
						include_once 'lib/model/om/BaseGraphicPeer.php';

			$this->aGraphic = GraphicPeer::retrieveByPK($this->graphic_id, $con);

			
		}
		return $this->aGraphic;
	}

	
	public function setGPlot($v)
	{


		if ($v === null) {
			$this->setPlotId('null');
		} else {
			$this->setPlotId($v->getId());
		}


		$this->aGPlot = $v;
	}


	
	public function getGPlot($con = null)
	{
		if ($this->aGPlot === null && ($this->plot_id !== null)) {
						include_once 'lib/model/om/BaseGPlotPeer.php';

			$this->aGPlot = GPlotPeer::retrieveByPK($this->plot_id, $con);

			
		}
		return $this->aGPlot;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseGraphicPlot:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseGraphicPlot::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
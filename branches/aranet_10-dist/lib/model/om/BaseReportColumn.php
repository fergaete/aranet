<?php


abstract class BaseReportColumn extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $report_id;


	
	protected $column_php_name;


	
	protected $column_name;


	
	protected $column_order;


	
	protected $column_width = 0;


	
	protected $column_eval_script;

	
	protected $aReport;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getReportId()
	{

		return $this->report_id;
	}

	
	public function getColumnPhpName()
	{

		return $this->column_php_name;
	}

	
	public function getColumnName()
	{

		return $this->column_name;
	}

	
	public function getColumnOrder()
	{

		return $this->column_order;
	}

	
	public function getColumnWidth()
	{

		return $this->column_width;
	}

	
	public function getColumnEvalScript()
	{

		return $this->column_eval_script;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ReportColumnPeer::ID;
		}

	} 
	
	public function setReportId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->report_id !== $v) {
			$this->report_id = $v;
			$this->modifiedColumns[] = ReportColumnPeer::REPORT_ID;
		}

		if ($this->aReport !== null && $this->aReport->getId() !== $v) {
			$this->aReport = null;
		}

	} 
	
	public function setColumnPhpName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->column_php_name !== $v) {
			$this->column_php_name = $v;
			$this->modifiedColumns[] = ReportColumnPeer::COLUMN_PHP_NAME;
		}

	} 
	
	public function setColumnName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->column_name !== $v) {
			$this->column_name = $v;
			$this->modifiedColumns[] = ReportColumnPeer::COLUMN_NAME;
		}

	} 
	
	public function setColumnOrder($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->column_order !== $v) {
			$this->column_order = $v;
			$this->modifiedColumns[] = ReportColumnPeer::COLUMN_ORDER;
		}

	} 
	
	public function setColumnWidth($v)
	{

		if ($this->column_width !== $v || $v === 0) {
			$this->column_width = $v;
			$this->modifiedColumns[] = ReportColumnPeer::COLUMN_WIDTH;
		}

	} 
	
	public function setColumnEvalScript($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->column_eval_script !== $v) {
			$this->column_eval_script = $v;
			$this->modifiedColumns[] = ReportColumnPeer::COLUMN_EVAL_SCRIPT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->report_id = $rs->getInt($startcol + 1);

			$this->column_php_name = $rs->getString($startcol + 2);

			$this->column_name = $rs->getString($startcol + 3);

			$this->column_order = $rs->getInt($startcol + 4);

			$this->column_width = $rs->getFloat($startcol + 5);

			$this->column_eval_script = $rs->getString($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ReportColumn object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseReportColumn:delete:pre') as $callable)
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
			$con = Propel::getConnection(ReportColumnPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ReportColumnPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseReportColumn:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseReportColumn:save:pre') as $callable)
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
			$con = Propel::getConnection(ReportColumnPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseReportColumn:save:post') as $callable)
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


												
			if ($this->aReport !== null) {
				if ($this->aReport->isModified()) {
					$affectedRows += $this->aReport->save($con);
				}
				$this->setReport($this->aReport);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ReportColumnPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ReportColumnPeer::doUpdate($this, $con);
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


												
			if ($this->aReport !== null) {
				if (!$this->aReport->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aReport->getValidationFailures());
				}
			}


			if (($retval = ReportColumnPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ReportColumnPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getReportId();
				break;
			case 2:
				return $this->getColumnPhpName();
				break;
			case 3:
				return $this->getColumnName();
				break;
			case 4:
				return $this->getColumnOrder();
				break;
			case 5:
				return $this->getColumnWidth();
				break;
			case 6:
				return $this->getColumnEvalScript();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ReportColumnPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getReportId(),
			$keys[2] => $this->getColumnPhpName(),
			$keys[3] => $this->getColumnName(),
			$keys[4] => $this->getColumnOrder(),
			$keys[5] => $this->getColumnWidth(),
			$keys[6] => $this->getColumnEvalScript(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ReportColumnPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setReportId($value);
				break;
			case 2:
				$this->setColumnPhpName($value);
				break;
			case 3:
				$this->setColumnName($value);
				break;
			case 4:
				$this->setColumnOrder($value);
				break;
			case 5:
				$this->setColumnWidth($value);
				break;
			case 6:
				$this->setColumnEvalScript($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ReportColumnPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setReportId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setColumnPhpName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setColumnName($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setColumnOrder($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setColumnWidth($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setColumnEvalScript($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ReportColumnPeer::DATABASE_NAME);

		if ($this->isColumnModified(ReportColumnPeer::ID)) $criteria->add(ReportColumnPeer::ID, $this->id);
		if ($this->isColumnModified(ReportColumnPeer::REPORT_ID)) $criteria->add(ReportColumnPeer::REPORT_ID, $this->report_id);
		if ($this->isColumnModified(ReportColumnPeer::COLUMN_PHP_NAME)) $criteria->add(ReportColumnPeer::COLUMN_PHP_NAME, $this->column_php_name);
		if ($this->isColumnModified(ReportColumnPeer::COLUMN_NAME)) $criteria->add(ReportColumnPeer::COLUMN_NAME, $this->column_name);
		if ($this->isColumnModified(ReportColumnPeer::COLUMN_ORDER)) $criteria->add(ReportColumnPeer::COLUMN_ORDER, $this->column_order);
		if ($this->isColumnModified(ReportColumnPeer::COLUMN_WIDTH)) $criteria->add(ReportColumnPeer::COLUMN_WIDTH, $this->column_width);
		if ($this->isColumnModified(ReportColumnPeer::COLUMN_EVAL_SCRIPT)) $criteria->add(ReportColumnPeer::COLUMN_EVAL_SCRIPT, $this->column_eval_script);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ReportColumnPeer::DATABASE_NAME);

		$criteria->add(ReportColumnPeer::ID, $this->id);

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

		$copyObj->setReportId($this->report_id);

		$copyObj->setColumnPhpName($this->column_php_name);

		$copyObj->setColumnName($this->column_name);

		$copyObj->setColumnOrder($this->column_order);

		$copyObj->setColumnWidth($this->column_width);

		$copyObj->setColumnEvalScript($this->column_eval_script);


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
			self::$peer = new ReportColumnPeer();
		}
		return self::$peer;
	}

	
	public function setReport($v)
	{


		if ($v === null) {
			$this->setReportId(NULL);
		} else {
			$this->setReportId($v->getId());
		}


		$this->aReport = $v;
	}


	
	public function getReport($con = null)
	{
		if ($this->aReport === null && ($this->report_id !== null)) {
						include_once 'lib/model/om/BaseReportPeer.php';

			$this->aReport = ReportPeer::retrieveByPK($this->report_id, $con);

			
		}
		return $this->aReport;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseReportColumn:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseReportColumn::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
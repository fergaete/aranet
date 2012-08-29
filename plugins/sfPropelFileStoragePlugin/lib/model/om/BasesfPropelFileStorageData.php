<?php


abstract class BasesfPropelFileStorageData extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $file_data_id;


	
	protected $file_binary_data;


	
	protected $file_info_id;

	
	protected $asfPropelFileStorageInfo;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getFileDataId()
	{

		return $this->file_data_id;
	}

	
	public function getFileBinaryData()
	{

		return $this->file_binary_data;
	}

	
	public function getFileInfoId()
	{

		return $this->file_info_id;
	}

	
	public function setFileDataId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->file_data_id !== $v) {
			$this->file_data_id = $v;
			$this->modifiedColumns[] = sfPropelFileStorageDataPeer::FILE_DATA_ID;
		}

	} 
	
	public function setFileBinaryData($v)
	{

								if ($v instanceof Lob && $v === $this->file_binary_data) {
			$changed = $v->isModified();
		} else {
			$changed = ($this->file_binary_data !== $v);
		}
		if ($changed) {
			if ( !($v instanceof Lob) ) {
				$obj = new Blob();
				$obj->setContents($v);
			} else {
				$obj = $v;
			}
			$this->file_binary_data = $obj;
			$this->modifiedColumns[] = sfPropelFileStorageDataPeer::FILE_BINARY_DATA;
		}

	} 
	
	public function setFileInfoId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->file_info_id !== $v) {
			$this->file_info_id = $v;
			$this->modifiedColumns[] = sfPropelFileStorageDataPeer::FILE_INFO_ID;
		}

		if ($this->asfPropelFileStorageInfo !== null && $this->asfPropelFileStorageInfo->getFileId() !== $v) {
			$this->asfPropelFileStorageInfo = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->file_data_id = $rs->getInt($startcol + 0);

			$this->file_binary_data = $rs->getBlob($startcol + 1);

			$this->file_info_id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating sfPropelFileStorageData object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BasesfPropelFileStorageData:delete:pre') as $callable)
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
			$con = Propel::getConnection(sfPropelFileStorageDataPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			sfPropelFileStorageDataPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasesfPropelFileStorageData:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BasesfPropelFileStorageData:save:pre') as $callable)
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
			$con = Propel::getConnection(sfPropelFileStorageDataPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasesfPropelFileStorageData:save:post') as $callable)
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


												
			if ($this->asfPropelFileStorageInfo !== null) {
				if ($this->asfPropelFileStorageInfo->isModified()) {
					$affectedRows += $this->asfPropelFileStorageInfo->save($con);
				}
				$this->setsfPropelFileStorageInfo($this->asfPropelFileStorageInfo);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = sfPropelFileStorageDataPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setFileDataId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += sfPropelFileStorageDataPeer::doUpdate($this, $con);
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


												
			if ($this->asfPropelFileStorageInfo !== null) {
				if (!$this->asfPropelFileStorageInfo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfPropelFileStorageInfo->getValidationFailures());
				}
			}


			if (($retval = sfPropelFileStorageDataPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfPropelFileStorageDataPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFileDataId();
				break;
			case 1:
				return $this->getFileBinaryData();
				break;
			case 2:
				return $this->getFileInfoId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfPropelFileStorageDataPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFileDataId(),
			$keys[1] => $this->getFileBinaryData(),
			$keys[2] => $this->getFileInfoId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfPropelFileStorageDataPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFileDataId($value);
				break;
			case 1:
				$this->setFileBinaryData($value);
				break;
			case 2:
				$this->setFileInfoId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfPropelFileStorageDataPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFileDataId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFileBinaryData($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFileInfoId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(sfPropelFileStorageDataPeer::DATABASE_NAME);

		if ($this->isColumnModified(sfPropelFileStorageDataPeer::FILE_DATA_ID)) $criteria->add(sfPropelFileStorageDataPeer::FILE_DATA_ID, $this->file_data_id);
		if ($this->isColumnModified(sfPropelFileStorageDataPeer::FILE_BINARY_DATA)) $criteria->add(sfPropelFileStorageDataPeer::FILE_BINARY_DATA, $this->file_binary_data);
		if ($this->isColumnModified(sfPropelFileStorageDataPeer::FILE_INFO_ID)) $criteria->add(sfPropelFileStorageDataPeer::FILE_INFO_ID, $this->file_info_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(sfPropelFileStorageDataPeer::DATABASE_NAME);

		$criteria->add(sfPropelFileStorageDataPeer::FILE_DATA_ID, $this->file_data_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getFileDataId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setFileDataId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setFileBinaryData($this->file_binary_data);

		$copyObj->setFileInfoId($this->file_info_id);


		$copyObj->setNew(true);

		$copyObj->setFileDataId(NULL); 
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
			self::$peer = new sfPropelFileStorageDataPeer();
		}
		return self::$peer;
	}

	
	public function setsfPropelFileStorageInfo($v)
	{


		if ($v === null) {
			$this->setFileInfoId(NULL);
		} else {
			$this->setFileInfoId($v->getFileId());
		}


		$this->asfPropelFileStorageInfo = $v;
	}


	
	public function getsfPropelFileStorageInfo($con = null)
	{
		if ($this->asfPropelFileStorageInfo === null && ($this->file_info_id !== null)) {
						include_once 'plugins/sfPropelFileStoragePlugin/lib/model/om/BasesfPropelFileStorageInfoPeer.php';

			$this->asfPropelFileStorageInfo = sfPropelFileStorageInfoPeer::retrieveByPK($this->file_info_id, $con);

			
		}
		return $this->asfPropelFileStorageInfo;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BasesfPropelFileStorageData:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasesfPropelFileStorageData::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
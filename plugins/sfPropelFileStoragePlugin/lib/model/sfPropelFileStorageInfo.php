<?php


/**
 * Skeleton subclass for representing a row from the 'file_info' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package plugins.sfPropelFileStoragePlugin.lib.model
 */	
class sfPropelFileStorageInfo extends BasesfPropelFileStorageInfo 
{
  
  public function __toString() {
      return ($this->getFileTitle()) ? $this->getFileTitle() . " (".$this->getFileName().")" : $this->getFileName();
  }
  
	public function save(PropelPDO $con = null) {
	  
	  if(sfPropelFileStorageInfoPeer::retrieveByName($this->getFileName()) && sfPropelFileStorageInfoPeer::retrieveByName($this->getFileName())->getFileId() != $this->getFileId() ) {
	    throw new Exception('A file named '.$this->getFileName().' already exists in the system. Filenames must be unique.');
	  }
	  
	  else {
	    parent::save($con);
	  }
	}
  
  public function getFileData() 
  {
    $datas = $this->getsfPropelFileStorageDatas();
    
    if(!count($datas)) {
      return null;
    }
    
    return $datas[0];
  }
  
  public function delete(PropelPDO $con = null) 
  {
    $c = new Criteria();
    $c->add(sfPropelFileStorageDataPeer::FILE_INFO_ID , $this->getFileId());
    sfPropelFileStorageDataPeer::doDelete($c);

    //make sure to remove from the cache if the file gets deleted!!
    $cache = new sfFileCache(sfConfig::get('sf_web_dir').DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."cache");

    if($cache->has($this->getFileId(), 'uploaded_files')) 
    {
      $cache->remove($this->getFileId(), 'uploaded_files');
    }    
    
    parent::delete($con);
  }
} // sfPropelFileStorageInfo

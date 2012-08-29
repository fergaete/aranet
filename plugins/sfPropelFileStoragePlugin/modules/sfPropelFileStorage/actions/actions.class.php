<?php

/**
 * file actions.
 *
 * @package    aranet
 * @subpackage file
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class sfPropelFileStorageActions extends sfActions
{
    
  public function executeCreate()
  {
    $this->file_info = new sfPropelFileStorageInfo();
    $this->setTemplate('edit');
  }

  public function executeEdit()
  {
    $this->file_info = sfPropelFileStorageInfoPeer::retrieveByPk($request->getParameter('file_id'));
    $this->forward404Unless($this->file_info);
  }
  
  public function executeList()
  {
    $this->file_infos = sfPropelFileStorageInfoPeer::doSelect(new Criteria());
    $this->forward404Unless($this->file_infos);
  }
  
    /**
     * Executes Upload action
     *
     */
    public function executeUpload()
    {
        $file_id = $request->getParameter('file_id');
        if (!$file_id)
        {
          $sf_propel_file_storage_info = new sfPropelFileStorageInfo();
        }
        else
        {
          $sf_propel_file_storage_info = sfPropelFileStorageInfoPeer::retrieveByPk($file_id);
          $this->forward404Unless($sf_propel_file_storage_info);
        }

        sfPropelFileStorageUtil::saveFromRequest($this->getRequest(), 'uploaded_file', $sf_propel_file_storage_info);
        $this->forward('sfPropelFileStorage/list');

    }

  public function executeShow ()
  {
    $file_info = sfPropelFileStorageInfoPeer::retrieveByPk($request->getParameter('file_id'));    
    $this->forward404Unless($file_info);
    
    $this->file_data = $this->serve($file_info);
  }

  public function executeDownload() 
  {
    $file_info = sfPropelFileStorageInfoPeer::retrieveByName(urldecode($request->getParameter('name')));
    $this->forward404Unless($file_info);
    
    $this->file_data = $this->serve($file_info);
    
    $this->setTemplate('show');
  }
  
  protected function serve($file_info) 
  {
    //get an instance of the file cache object. We grab the web directory, jump back one (which
    //puts us in the root of our project), then get the name of the cache folder
    
    //we don't want to use sf_cache_dir because that is application and environment specific
    
    
    $cache = new sfFileCache(sfConfig::get('sf_web_dir').DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR.sfConfig::get('sf_cache_dir_name'));
    
    //The last parameter for the cache methods is the name space. We're going to be putting our 
    //cached files in the 'uploaded_files' name space

    //Next we see if we can pull the file from the cache. This is dependent on both the sfPropelFileStorageInfo object
    //thinking that the file is cached, and on the file actually being there. Remember a large point of this
    //is to not care if we bring our flat files with us when we move our database!
    
    if($file_info->getFileIsCached() && $cache->has($file_info->getFileId(), 'uploaded_files')) 
    {
      //Ok! We have a cached copy of the file! We're going to created a throw-away FileData object to
      //store our cached file in.
      
      $file_data = new sfPropelFileStorageData();
      $file_data->setFileBinaryData($cache->get($file_info->getFileId(), 'uploaded_files'));

    }
    
    else 
    {
      //File not cached, so we have to pull from the database.
      $file_data = $file_info->getFileData();  //This is the function we added to sfPropelFileStorageInfo when we first created the model

      //Write the file data to the cache and make sure sfPropelFileStorageInfo knows its there
      $cache->set($file_info->getFileId(), 'uploaded_files', $file_data->getFileBinaryData()->getContents());
            //getContents is a method of the propel Blob oject that gives us exactly what we need
      $file_info->setFileIsCached(true);
      $file_info->save();
    }
    
    //Next we need to get our response straightened out. We can't send anything to the browser except
    //the headers and the data, so make sure that the web debugger is off
    sfConfig::set('sf_web_debug', false);

    $this->getResponse()->setHttpHeader('content-type', $file_info->getFileMimeType(), true);
    $this->getResponse()->setHttpHeader('content-length', $file_info->getFileSize(), true);
    
    return $file_data;        
  }
}
?>

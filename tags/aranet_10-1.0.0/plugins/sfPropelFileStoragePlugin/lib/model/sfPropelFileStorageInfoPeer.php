<?php


/**
 * Skeleton subclass for performing query and update operations on the 'file_info' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package plugins.sfPropelFileStoragePlugin.lib.model
 */	
class sfPropelFileStorageInfoPeer extends BasesfPropelFileStorageInfoPeer {
  public static function retrieveByName($name) {
    $c = new Criteria();
    $c->add(sfPropelFileStorageInfoPeer::FILE_NAME, $name);
    
    return sfPropelFileStorageInfoPeer::doSelectOne($c);
    
  }
  
  public static function retrieveByMimeType ($type, $text='', $c = null) {
    if(!$c) {
      $c = new Criteria();
      $c->addAscendingOrderByColumn(sfPropelFileStorageInfoPeer::NAME );
      $c->add(FileInfoPeer::FILE_MIME_TYPE, $type);
     
      if(strlen(trim($text))) {
        $c->add(sfPropelFileStorageInfoPeer::FILE_NAME, '%'.$text.'%', Criteria::LIKE);
      }
      
      return sfPropelFileStorageInfoPeer::doSelect($c);
    }
  }
} // sfPropelFileStorageInfoPeer

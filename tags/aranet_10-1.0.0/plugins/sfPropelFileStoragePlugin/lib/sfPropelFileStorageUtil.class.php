<?php 
class sfPropelFileStorageUtil {
  /* Saves the fiel and returns the sfPropelFileStorageInfo object */
  public static function saveFromRequest($request, $file = 'uploaded_file', &$file_info) {
    //Use symfony's request object to pull information from the uploaded file
    $name = $request->getFileName($file);
    $title = $request->getParameter('file_title');
    
    //path returns the temp file that our file was stored to
    $path = $request->getFilePath($file);
    $size = $request->getFileSize($file);
    $type = $request->getFileType($file);  
    
    //Record information about this file in the database
    $file_info->setFileName($name);
    $file_info->setFileTitle($title);
    $file_info->setFileSize($size);
    $file_info->setFileMimeType($type);
    //If it's a image get width and heigh and generate thumbnail
    $info = getimagesize($path);
    if ($info) {
        $file_info->setFileWidth($info[0]);
        $file_info->setFileHeight($info[1]);
    }
    else
    {
        $file_info->setFileWidth(null);
        $file_info->setFileHeight(null);
    }

    //Make sure to save the file info so $file_info gets an ID
    if (!$file_info->isNew()) {
        $c = new Criteria();
        $c->add(sfPropelFileStorageDataPeer::FILE_INFO_ID, $file_info->getFileId());
        $deletes = sfPropelFileStorageDataPeer::doDelete($c);
    }
    //Create a new object to hold our data, make sure to establish which $file_info object the data belongs to
    $file_data = new sfPropelFileStorageData();
    //Read the data off the disk from the temporary location, put it in our data object, and save it to the database.
    $data = fread(fopen($path, "r"), $size);
    $file_data->setFileBinaryData($data);
    $file_info->addsfPropelFileStorageData($file_data);
    
    //Create a new associated object
    if ($request->getParameter('class')) {
        $object_file = new sfPropelFileStorageObject();
        $object_file->setFileObjectClass($request->getParameter('class'));
        $object_file->setFileObjectId($request->getParameter('object_id'));
        $file_info->addsfPropelFileStorageObject($object_file);
    }
    
    return $file_info;   
  }
  
  public static function saveFromZip($path, $name_override = "file_") {
    $zip = zip_open($path);

    $i=0;
    $files = array();
    while ($zip_entry = zip_read($zip)) {
      $name = $name_override.'_'.$i++;
      
      $file_info = new sfPropelFileStorageInfo();
      $file_info->setFileName($name);
      $file_info->setFileSize(zip_entry_filesize($zip_entry));
      $file_info->setFileMimeType('image/jpeg');
      
      
      $file_data = new sfPropelFileStorageData();
      
      if (zip_entry_open($zip, $zip_entry, "r")) {
        $buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
        
        $file_data->setFileBinaryData($buf);      
        zip_entry_close($zip_entry);
      }
      $file_info->addsfPropelFileStorageData($file_data);
      try {
        $file_info->save();             
        $files[] = $file_info;
      }
      catch(Exception $e) {
        
      }
    }
    
    zip_close($zip);
    
    return $files;
  }
  
  
}
?>

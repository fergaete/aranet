<?php

/**
* Ruta de los archivos de configuracion
*/
sfConfig::set(
	'sf_CompressWebFiles_config',
	sfConfig::get('sf_root_dir').DIRECTORY_SEPARATOR.'plugins'.DIRECTORY_SEPARATOR.'sfCompressWebFilesPlugin'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR
);

/**
* Ruta de YUI Compressor
* SF_ROOT_DIR no funciona en los task :$
*/
sfConfig::set(
	'sf_CompressWebFiles_YUICompressor',
	sfConfig::get('sf_root_dir').DIRECTORY_SEPARATOR.'plugins'.DIRECTORY_SEPARATOR.'sfCompressWebFilesPlugin'.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'YUICompressor'.DIRECTORY_SEPARATOR
);

class RunCompressWebFiles extends CompressWebFiles
{
	public function __construct()
	{
		parent::__construct();
	}
}
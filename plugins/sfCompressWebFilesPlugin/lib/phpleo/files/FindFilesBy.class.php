<?php
/**
* compress web files
*/
class FindFilesBy
{
	// {{{ properties
	
	/**
	* Nombre de directoros ignorados a recorrer
	*/
	private $ignoreNames = array('.', '..', '_vti_cnf', 'CVS', '.svn');
	/**
	* Lista de archivos encontrados
	*/
	private $filesFound = null;
	/**
	* @desc 
	*/
	private $patterns = array(
		'css'  => '/(\.css)$/i',
		'js'   => '/(\.js)$/i',
		'min'  => '/(\.min\.)/i',
		'pack' => '/(\.pack\.)/i'
	);
	
	// }}}
	// {{{ constructor
	
	/**
	* @desc 
	*/
	public function __construct()
	{
	}
	
	/**
	* @desc 
	*/
	public function findFilesByExtension($directory, $extension)
	{
		$all_files = $this->contentDirectoryPHP4($directory);
		$this->resetFilesFound();
		
		return $this->filterAndIgnoredByMinAndPack($all_files, $extension);
	}
	
	/**
	* filtrar por patron principla e ignorar a aquellos que continen .min. y .pack.
	*/
	private function filterAndIgnoredByMinAndPack($all_files, $index_pattern)
	{
		$new_files    = array();
		$main_pattern = $this->patterns[$index_pattern];
		$min_pattern  = $this->patterns['min'];
		$pack_pattern = $this->patterns['pack'];
		
		if (isset($all_files[0]))
		{
			foreach ($all_files as $file)
			{
				if (preg_match($main_pattern, $file['name']) && !preg_match($min_pattern, $file['name']) && !preg_match($pack_pattern, $file['name']))
				{
					$new_files[] = array(
						'name'          => $file['name'],
						'min_name'      => $this->putMinExtension($file['name'], $index_pattern),
						'pack_name'     => $this->putPackExtension($file['name'], $index_pattern),
						'relative_path' => $file['relative_path'],
						'absolute_path' => $file['absolute_path']
					);
				}
			}
		}
		
		return $new_files;
	}
	
	private function putMinExtension($file, $extension)
	{
		return str_replace('.'.$extension, '.min.'.$extension, $file);
	}
	
	private function putPackExtension($file, $extension)
	{
		return str_replace('.'.$extension, '.pack.'.$extension, $file);
	}
	
	// }}}
	// {{{ contentDirectoryPHP4()
	
	/**
	* Busar archivos a la manera PHP4
	*/
	private function contentDirectoryPHP4($directory)
	{
		if (!is_dir($directory))
		{
			return false;
		}
		
		$current_dir  = opendir($directory);
		$ignore_names = $this->ignoreNames;
		$files_found  = array();
		
		while (false !== ($dof = readdir($current_dir)))
		{
			if (!in_array($dof, $ignore_names))
			{
				$new_directory = $directory.DIRECTORY_SEPARATOR.$dof;
				
				if (is_dir($new_directory))
				{
					// recursive
					$this->contentDirectoryPHP4($new_directory);
				}
				else
				{
					$files_found = array(
						'name'          => $dof,
						'relative_path' => $directory,
						'absolute_path' => realpath($directory)
					);
					
					$this->addFilesFound($files_found);
				}
			}
		}
		
		closedir($current_dir);
		
		return $this->getFilesFound();
	}
	
	/**
	* Agregar archivos econtrados
	*/
	private function addFilesFound($found)
	{
		$this->filesFound[] = $found;
	}
	
	private function getFilesFound()
	{
		return $this->filesFound;
	}
	
	private function resetFilesFound()
	{
		$this->filesFound = null;
	}

}
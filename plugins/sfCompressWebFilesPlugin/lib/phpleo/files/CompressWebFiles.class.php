<?php

/**
* @version SVN: $Id: CompressWebFiles.class.php 3 2008-08-06 07:48:19Z pablo $
*/

class CompressWebFiles extends FindFilesBy
{
	// {{{ properties
	
	private $yamlConfigFile = 'compressWebFiles.yml';
	private $extraConfig = array();
	private $YUIConfig = array();
	
	private $cssSuccess;
	private $cssSyntaxError;
	private $cssUnexpectedError;
	
	private $jsSuccess;
	private $jsSyntaxError;
	private $jsUnexpectedError;
	
	// }}}
	// {{{ constructor
	
	/**
	* @desc 
	*/
	public function __construct()
	{
		$config = $this->loadAndAssignConfig();
		
		$this->extraConfig = $config['compressWebFiles']['.extra'];
		$this->YUIConfig   = $config['compressWebFiles']['.YUICompressor'];
	}
	
	private function loadAndAssignConfig()
	{
		$ymlFile1 = sfConfig::get('sf_CompressWebFiles_config').$this->yamlConfigFile;
		$ymlFile2 = sfConfig::get('sf_config_dir').DIRECTORY_SEPARATOR.$this->yamlConfigFile;
		
		if (file_exists($ymlFile1))
		{
			$name = $ymlFile1;
		}
		elseif (file_exists($ymlFile2))
		{
			$name = $ymlFile2;
		}
		
		return sfYaml::load($name);
	}
	
	public function compress($directory, $extension, $compressorName = null)
	{
		$files = $this->findFilesByExtension($directory, $extension);
		
		/*if (is_null($compressorName))
		{
			$cssCompress = $this->extraConfig['css_compressor_by_default'];
			$jsCompress  = $this->extraConfig['js_compressor_by_default'];
		}*/
		
		$this->YUICompress($files, $extension);
	}
	
	private function YUICompress($files, $extension)
	{
		$success         = array();
		$unexpectedError = array();
		$syntaxError     = array();
		$yuic_version    = sfConfig::get('sf_CompressWebFiles_YUICompressor').$this->YUIConfig['yuic_version'];
		$yuic_charset    = $this->YUIConfig['yuic_charset'];
		
		if ($extension == 'css')
		{
			$yuic_cl = $this->YUIConfig['yuic_command_line_css'];
		}
		elseif ($extension == 'js')
		{
			$yuic_cl = $this->YUIConfig['yuic_command_line_js'];
		}
		
		// sumar y verificar que no sobrepase en 1 los compresores
		
		if (is_int($this->extraConfig['set_time_limit']))
		{
			set_time_limit($this->extraConfig['set_time_limit']);
		}
		
		foreach ($files as $file)
		{
			$outputFile = $file['absolute_path'].DIRECTORY_SEPARATOR.$file['min_name'];
			$inputFile  = $file['absolute_path'].DIRECTORY_SEPARATOR.$file['name'];
			
			$cmd = sprintf($yuic_cl, $yuic_version, $yuic_charset, $outputFile, $inputFile);
			exec($cmd, $out, $err);
			
			// YUI SUCCESS      = 0
			// YUI SYNTAX ERROR = 2
			
			if ($err === 0)
			{
				$success[] = $file['name'];
			}
			elseif ($err === 2)
			{
				$syntaxError[] = array(
					'file'    => $file['name'],
					'message' => "The YUI Compressor reported the following error(s):\n".implode("\n  - ", $out)
				);
			}
			else
			{
				$unexpectedError[] = array(
					'file'    => $file['name'],
					'message' => "An unexpected error occurred:\n".implode("\n  - ", $out)
				);
			}
		}
		
		if ($extension == 'css')
		{
			$this->setSuccess($success, 'css');
			$this->setSyntaxError($syntaxError, 'css');
			$this->setUnexpectedError($unexpectedError, 'css');
		}
		elseif ($extension == 'js')
		{
			$this->setSuccess($success, 'js');
			$this->setSyntaxError($syntaxError, 'js');
			$this->setUnexpectedError($unexpectedError, 'js');
		}
	}
	
	private function setSuccess($v, $t)
	{
		$c = "\n  $t: Compresiones exitosas:\n";
		$total = count($v);
		
		for ($i = 0; $i < $total; $i++)
		{
			$c .= "    - File: ".$v[$i]."\n";
		}
		
		if ($t == 'css')
		{
			$this->cssSuccess = $c;
		}
		elseif ($t == 'js')
		{
			$this->jsSuccess = $c;
		}
	}
	
	private function setSyntaxError($v, $t)
	{
		$seeErrorsInConsole = $this->extraConfig['see_errors_in_console'];
		$c = "\n\n  $t: error de sintaxis:\n";
		
		foreach ($v as $r)
		{
			$c .= "    - File: ".$r['file']."\n";
			
			if ($seeErrorsInConsole)
				$c .= "      Error message: ".$r['message'].'\n\n';
		}
		
		if ($t == 'css')
		{
			$this->cssSyntaxError = $c;
		}
		elseif ($t == 'js')
		{
			$this->jsSyntaxError = $c;
		}
	}
	
	private function setUnexpectedError($v, $t)
	{
		$seeErrorsInConsole = $this->extraConfig['see_errors_in_console'];
		$c = "\n\n  $t: Errores inesperados:\n";
		
		foreach ($v as $r)
		{
			$c .= "    - File: ".$r['file']."\n";
			
			if ($seeErrorsInConsole)
				$c .= "      Error message: ".$r['message']."\n\n";
		}
		
		if ($t == 'css')
		{
			$this->cssUnexpectedError = $c;
		}
		elseif ($t == 'js')
		{
			$this->jsUnexpectedError = $c;
		}
	}
	
	public function getCssSuccess()
	{
		return $this->cssSuccess;
	}
	
	public function getCssSyntaxError()
	{
		return $this->cssSyntaxError;
	}
		
	public function getCssUnexpectedError()
	{
		return $this->cssUnexpectedError;
	}
	
	public function getJsSuccess()
	{
		return $this->jsSuccess;
	}
	
	public function getJsSyntaxError()
	{
		return $this->jsSyntaxError;
	}
	
	public function getJsUnexpectedError()
	{
		return $this->jsUnexpectedError;
	}
	
}
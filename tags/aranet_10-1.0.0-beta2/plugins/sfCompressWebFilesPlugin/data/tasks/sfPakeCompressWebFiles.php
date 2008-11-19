<?php
/**
* @desc 
*/

pake_desc('Minified and Packed, CSS and JavaScript files');
pake_task('compress-web-files', 'project_exists');
pake_alias('cwf', 'compress-web-files');

/**
* Compress CSS & JavaScript files
*/
function run_compress_web_files($task, $args)
{
	$web_dir = sfConfig::get('sf_web_dir');
	$css_dir = $web_dir.DIRECTORY_SEPARATOR.'css';
	$js_dir  = $web_dir.DIRECTORY_SEPARATOR.'js';
	
	$fileType       = $args[0];
	$compressorType = $args[1];
	
	$cwf = new RunCompressWebFiles();
		
	if (empty($fileType))
	{
		$cwf->compress($css_dir, 'css');
		$cwf->compress($js_dir, 'js');
		
		echo $cwf->getCssSuccess();
		echo $cwf->getCssSyntaxError();
		echo $cwf->getCssUnexpectedError();
		
		echo $cwf->getJsSuccess();
		echo $cwf->getJsSyntaxError();
		echo $cwf->getJsUnexpectedError();
	}
	elseif ($fileType == 'css')
	{
		$cwf->compress($css_dir, 'css');
		
		echo $cwf->getCssSuccess();
		echo $cwf->getCssSyntaxError();
		echo $cwf->getCssUnexpectedError();
	}
	elseif ($fileType == 'js')
	{
		$cwf->compress($js_dir, 'js');
		
		echo $cwf->getJsSuccess();
		echo $cwf->getJsSyntaxError();
		echo $cwf->getJsUnexpectedError();
	}
	else
	{
		throw new Exception('You must provide a valid file type [css|js].');
	}
}
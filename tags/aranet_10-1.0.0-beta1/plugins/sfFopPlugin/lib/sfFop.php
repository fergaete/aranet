<?php
/**
 * @copyright     Copyright (C) 2007, CustomSoft
 * @author        Eric Bartels <e.bartels@customsoft.de>
 * @package 	  sfFop 
 * 
 * $Id: sfFop.php 3 2008-08-06 07:48:19Z pablo $
 * $LastChangedDate: 2008-08-06 09:48:19 +0200 (Wed, 06 Aug 2008) $
 * 
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

/**
 * @class       sfFop sfFop.php
 * @brief       A class for getting an easier interface for Apache's FOP
 * @package     sfFop
 * @author      Eric Bartels <e.bartels@customsoft.de>
 * @version     $Revision: 3 $
 */
class sfFop {
    /**
     * Path to the fop binary
     *
     * @var string
     */
    private $_pathToFopBinary;
    
    /**
     * Queue of commands to execute
     *
     * @var array
     */
    private $_commandQueue;
    
    /**
     * Construct the new fop object
     *
     * @throws Exception if binary cannot be found
     */
    public function __construct ($pathToFopBinary = null) {
        $this->_commandQueue = array ();
        
        if (is_null ($pathToFopBinary)) {
            $this->_pathToFopBinary = sfConfig::get ('app_fop_path');
        } else {
            $this->_pathToFopBinary = $pathToFopBinary;
        }
        
        /// Check if binary exists
	    if (!file_exists ($this->_pathToFopBinary)) {
	        throw (new sfException (
	            sprintf ('Path "%s" to FOP binary cannot be found',
	                $this->_pathToFopBinary)));
	    } // end if
    }
    
    /**
     * Get the current binary
     * 
     * @return string
     */
    public function getPathToBinary () {
        return ($this->_pathToFopBinary);
    }
    
    /**
     * Add a command to the queue
     *
     * @param sfFopCommand $cmd
     * @return sfFop (fluent interace)
     */
    public function addCommand (sfFopCommand $cmd) {
        /* @var $this->_commandQueue ArrayObject */
        $this->_commandQueue[] = $cmd;
        
        return ($this);
    }
    
    /**
     * Process the command queue
     *
     * @return int number of successful executed commands
     * @throws Exception
     */
    public function execute () {
        $passed = 0;
        
        /// Process each command
        foreach ($this->_commandQueue as &$cmd) {
        	/* @var $cmd sfFopCommand */
        	$cmdStr = escapeshellcmd ($this->_pathToFopBinary) . " -c " . sfConfig::get('app_fop_conf_file') . " " . $cmd->getCommand ();
                $status = -1;
            $return = array ();
            /// Run command and store result
            exec ($cmdStr, $return, $status);
            $cmd->setStatus ($status);
            $cmd->setReturn (implode (";", $return));
            if ($cmd->hasSucceeded ()) {
                ++$passed;
            } // end if
        } // end foreach

        return ($passed);
    }
    
    /**
     * Get the current size of the command queue
     * 
     * @return int
     */
    public function getQueueSize () {
        return (count ($this->_commandQueue));
    }
    
    /**
     * Get the current command queue
     * 
     * @return array
     */
    public function getQueue () {
        return ($this->_commandQueue);
    }
    
    /**
     * empty the queue and delete all commands
     */
    public function emptyQueue () {
        $this->_commandQueue = array ();
    }
    
    /**
     * Get a list of successfully processed files
     * 
     * @return array
     */
    public function getProcessedFiles () {
        $files = array ();
        
        foreach ($this->_commandQueue as $cmd) {
        	/* @var $cmd sfFopCommand */
            if ($cmd->hasSucceeded ()) {
                $files[] = $cmd->getOutputFilename ();
            } // end if
        } // end foreach
        
        return ($files);
    }
}
?>

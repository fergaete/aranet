<?php
/**
 * @copyright     Copyright (C) 2007, CustomSoft
 * @author        Eric Bartels <e.bartels@customsoft.de>
 * @package 	  sfFop   
 * 
 * $Id: sfFopCommand.php 3 2008-08-06 07:48:19Z pablo $
 * $LastChangedDate: 2008-08-06 09:48:19 +0200 (Wed, 06 Aug 2008) $
 * 
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

/**
 * @class       sfFopCommand sfFopCommand.php
 * @brief       A class representing a fop-call
 * @package     sfFop
 * @author      Eric Bartels <e.bartels@customsoft.de>
 * @version     $Revision: 3 $
 */
class sfFopCommand {
    /**
     * Fop options
     *
     * @var string
     */
    protected $_options = "";
    
    /**
     * The input file
     *
     * @var string
     */
    protected $_inFile;
    
    /**
     * The input options
     *
     * @var string
     */
    protected $_inOptions = "";
    
    /**
     * The output file
     *
     * @var string
     */
    protected $_outFile;
    
    /**
     * The output options
     *
     * @var string
     */
    protected $_outOptions = "";
    
    /**
     * Execution status after execution of fop
     *
     * @var int
     */
    private $_execStatus = -1;
    
    /**
     * The command.string return by the execution
     *
     * @var string
     */
    private $_execReturn = null;
    
    /**
     * Construct a new command
     *
     * @param string $inFile path to the input file
     * @param string $outFile path to the output file
     * @param string $inOpt input file options
     * @param string $outOpt output file options
     */
    public function __construct ($inFile, $outFile,
        $inOpt = "", $outOpt = "") {
        $this->_inFile = $inFile;
        $this->_outFile = $outFile;
        
        $this->_inOptions = $inOpt;
        $this->_outOptions = $outOpt;
    }
    
    /**
     * Set the options for the input file
     * 
     * @param string
     */
    public function setOptions ($options) {
        $this->_options = (string) $options;
    }
    
    /**
     * Set the options for the input file
     * 
     * @param string
     */
    public function setInputOptions ($options) {
        $this->_inOptions = (string) $options;
    }
    
    /**
     * Set the options for the input file
     * 
     * @param string
     */
    public function setOutputOptions ($options) {
        $this->_outOptions = (string) $options;
    }
    
    /**
     * Get the final command for fop
     *
     * @return string
     */
    public function getCommand () {
        $cmd = "";
        
        /// Any fop options set?
        if (!empty ($this->_options)) {
            $cmd .= escapeshellarg ($this->_options) . " ";
        }

        /// Options for the input file
        if (!empty ($this->_inOptions)) {
            $cmd .= escapeshellarg ($this->_inOptions) . " ";
        }
        $cmd .= escapeshellarg ($this->_inFile) . " ";
         
        /// Options for the output file
        if (!empty ($this->_outOptions)) {
             $cmd .= escapeshellarg ($this->_outOptions) . " ";
        }
        $cmd .= escapeshellarg ($this->_outFile);
        
        return ($cmd);
    }
    
    /**
     * Set the current status
     *
     * @param int $status
     */
    public function setStatus ($status) {
        $this->_execStatus = $status;
    }
    
    /**
     * Get the current execution status
     *
     * @return int
     */
    public function getStatus () {
        return ($this->_execStatus);
    }
    
    /**
     * Set the current status
     *
     * @param string $return
     */
    public function setReturn ($return) {
        $this->_execReturn = $return;
    }
    
    /**
     * Get the current execution status
     *
     * @return string
     */
    public function getReturn () {
        return ($this->_execReturn);
    }
    
    /**
     * Command was executed?
     *
     * @return bool
     */
    public function wasExecuted () {
        return (-1 != $this->_execStatus);
    }
    
    /**
     * Check if command was executed successfully
     *
     * @return bool
     */
    public function hasSucceeded () {
        return (0 == $this->_execStatus);
    }
    
    /**
     * Get the filename of the destination/output file
     *
     * @return string
     */
    public function getOutputFilename () {
        return ($this->_outFile);
    }
}
?>

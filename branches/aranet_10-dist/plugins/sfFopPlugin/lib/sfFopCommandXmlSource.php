<?php
/**
 * @copyright     Copyright (C) 2007, CustomSoft
 * @author        Eric Bartels <e.bartels@customsoft.de>
 * @package 	  sfFop
 * 
 * $Id: sfFopCommandXmlSource.php 3 2008-08-06 07:48:19Z pablo $
 * $LastChangedDate: 2008-08-06 09:48:19 +0200 (Wed, 06 Aug 2008) $
 * 
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

/**
 * @class       sfFopCommandXmlSource sfFopCommandXmlSource.php
 * @brief       A class for calling sfFopCommands with an xml
 *              and an xsl source file
 * @package     sfFop
 * @author      Eric Bartels <e.bartels@customsoft.de>
 * @version     $Revision: 3 $
 */
class sfFopCommandXmlSource extends sfFopCommand {
    /**
     * The xsl file for transformation
     *
     * @var string
     */
    private $_xslFile;
    
    /**
     * Build the command
     *
     * @param string $inFile xml source file
     * @param string $outFile output file
     * @param string $xslFile for transforming the xml source
     * @param string $outOpt output options
     */
    public function __construct ($inFile, $outFile, $xslFile,
        $outOpt = "") {
        parent::__construct ($inFile, $outFile, '-xml', $outOpt);
        $this->_xslFile = $xslFile;        
    }
    
    /**
     * Build the specific command for this kind if command
     *
     * @return string
     */
    public function getCommand () {
        $cmd = "";
        
        /// Any fop options set?
        if (!empty ($this->_options)) {
            $cmd .= escapeshellarg ($this->_options) . " ";
        }
        
        $cmd .= "-xml " . escapeshellarg ($this->_inFile) . " ";
        $cmd .= "-xsl " . escapeshellarg ($this->_xslFile) . " ";
         
        /// Options for the output file
        if (empty ($this->_outOptions)) {
            $this->_outOptions = '-pdf';
        }
        
        $cmd .= escapeshellarg ($this->_outOptions) . " ";
        $cmd .= escapeshellarg ($this->_outFile);
        
        return ($cmd);
    }
}
?>

<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * ContactHelper.
 *
 * @package    aranet
 * @subpackage helper
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id$
 */


/**
 * Determines if a string has only alpha/numeric characters.
 *
 * @param string the string to check as alpha/numeric
 *
 * @see is_numeric
 * @see preg_match
 */
function is_alphanumeric($string)
{
    return preg_match('/[0-9a-zA-Z]/', $string);
}

/**
 * Formats a number by injecting nonnumeric characters in a specified format
 * into the string in the positions they appear in the format.
 *
 * <strong>Example:</strong>
 * <code>
 *  echo format_string('1234567890', '(000) 000-0000');
 *  // => (123) 456-7890
 *
 *  echo format_string('1234567890', '000.000.0000');
 *  // => 123.456.7890
 * </code>
 *
 * @param string the string to format
 * @param string the format to apply
 * @return the formatted string
 */
function format_string($string, $format)
{
   if ($format == '' || $string == '') return $string;
 
   $result = '';
   $fpos = 0;
   $spos = 0;
   while ((strlen($format) - 1) >= $fpos)
   {
       if (is_alphanumeric(substr($format, $fpos, 1)))
       {
           $result .= substr($string, $spos, 1);
           $spos++;
       }
       else
       {
           $result .= substr($format, $fpos, 1);
       }
 
       $fpos++;
   }
 
   return $result;
}

/**
 * Formats a spanish CP Number.
 *
 * <strong>Example:</strong>
 * <code>
 *  echo format_code('12345');
 *  // => 12.345
 * </code>
 *
 * @param string the unformatted ssn to format
 * @param string the format to use, defaults to '00.000'
 *
 * @see format_string
 */
function format_code($string, $format = '00.000')
{
    return format_string($string, $format);
}
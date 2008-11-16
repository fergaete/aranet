<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * NumberExtendedHelper.
 *
 * @package    aranet
 * @subpackage helper
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id$
 */

//include_once('symfony/helper/NumberHelper.php');

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
 * Formats a variable length phone number, using a standard format.
 *
 * <strong>Example:</strong>
 * <code>
 *  echo smart_format_phone('1234567');
 *  // => 123-4567
 *
 *  echo smart_format_phone('123456789');
 *  // => 123 456 789
 *
 *  echo smart_format_phone('1234567890');
 *  // => (123) 456-7890
 *
 *  echo smart_format_phone('91234567890');
 *  // => 9 (123) 456-7890
 *
 *  echo smart_format_phone('+34123456789');
 *  // => 12 +34 123 456 789
 *
 *  echo smart_format_phone('123456');
 *  // => 123456
 * </code>
 *
 * @param string the unformatted phone number to format
 *
 * @see format_string
 */
function smart_format_phone($string)
{
    switch (strlen($string))
    {
        case 7:
            return format_string($string, '000-0000');
        case 9:
            return format_string($string, '000 000 000');
        case 10:
            return format_string($string, '(000) 000-0000');
        case 11:
            return format_string($string, '0 (000) 000-0000');
        case 12:
            return format_string($string, '000 000 000 000');
        default:
            return $string;
    }
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

function ext_format_number($number, $decimals = 0, $div = 1, $culture = null)
{
  if (is_null($number))
  {
    return null;
  }

  $tempd = $number/$div*pow(10,$decimals);
  $tempd1 = round($tempd);
  $number = $tempd1/pow(10,$decimals);

  $numberFormat = new sfNumberFormat(_current_language($culture));

  return $numberFormat->format($number);
}

function format_filesize($value, $unit = 'KB') {
   switch ($unit)
    {
        case 'B':
            return ext_format_number($value) . ' B';
        case 'b':
            return ext_format_number($value, 0, 1/8) . ' bits';
        case 'KB':
            return ext_format_number($value, 1, 1024) . ' KB';
        case 'Kb':
            return ext_format_number($value, 0, 128) . ' Kbs';
        case 'MB':
            return ext_format_number($value, 2, 1048576) . ' MB';
        default:
            return $value;
    }
}

function smart_format_filesize($value) {
   switch (true)
    {
        case ($value < 64):
            return ext_format_number($value, 0, 1/8) . ' bits';
        case ($value < 8192):
            return ext_format_number($value) . ' B';
        case ($value < 819200):
            return ext_format_number($value, 1, 1024) . ' KB';
        case ($value < 1048576):
            return ext_format_number($value, 2, 1048576) . ' MB' . $value;
        default:
            return ext_format_number($value, 2, 1048576) . ' MB';
    }
}

function ext_format_currency($amount, $decimals = 0, $currency = null, $culture = null)
{
  if (is_null($amount))
  {
    return null;
  }

  $numberFormat = new sfNumberFormat(_current_language($culture));

  return $numberFormat->format(to_currency($amount, $decimals), 'c', $currency);
}

/**
 * Formats a EUR currency value with two decimal places and a euro sign.
 *
 * @param string the unformatted amount to format
 * @param string the format to use, defaults to '$%0.2f'
 *
 * @see sprintf
 */
function format_eur($money, $eur = true, $format = '%0.2f')
{
    return ($eur ? '€' : '') . sprintf($format, $money);
}

/**
 * Formats a hours time value with two decimal places and a hours suffix.
 *
 * @param string the unformatted amount to format
 * @param string the format to use, defaults to '$%0.2f'
 *
 * @see sprintf
 */
function format_hour($hours, $symbol = true, $format = '%0.2f')
{
    return sprintf($format, $hours). ($symbol ? ' hrs' : '');
}

/**
 * Formats a EUR currency value with two decimal places and a dollar sign.
 *
 * @param string the unformatted amount to format
 * @param string the format to use, defaults to '$%0.2f'
 *
 * @see sprintf
 */
function format_percent($percent, $symbol = true, $format = '%0.2f')
{
    if ($percent) {
        return sprintf($format, $percent) . ($symbol ? '%' : '');
    } else {
        return '---';
    }
}

function to_currency($number, $round=2)
{
    $tempd = $number*pow(10,$round);
    $tempd1 = round($tempd);
    $number = $tempd1/pow(10,$round);
    return $number;
}

/**
 * Transforms a number by masking characters in a specified mask format,
 * and ignoring characters that should be injected into the string without
 * matching a character from the original string (defaults to space).
 *
 * <strong>Example:</strong>
 * <code>
 *  echo mask_string('1234567812345678', '************0000');
 *  // => ************5678
 *
 *  echo mask_string('1234567812345678', '**** **** **** 0000');
 *  // => **** **** **** 5678
 *
 *  echo mask_string('1234567812345678', '**** - **** - **** - 0000', ' -');
 *  // => **** - **** - **** - 5678
 * </code>
 *
 * @param string the string to transform
 * @param string the mask format
 * @param string a string (defaults to a single space) containing characters to ignore in the format
 * @return string the masked string
 */
function mask_string($string, $format, $ignore = ' ')
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
 
            if (strpos($ignore, substr($format, $fpos, 1)) === false) $spos++;
        }
 
        $fpos++;
    }
 
    return $result;
}
 
/**
 * Formats a credit card expiration string. Expects 4-digit string (MMYY).
 *
 * @param string the unformatted expiration string to format
 * @param string the format to use, defaults to '00-00'
 *
 * @see format_string
 */
function format_exp($string, $format = '00-00')
{
    return format_string($string, $format);
}
 
/**
 * Formats (masks) a credit card.
 *
 * @param string the unformatted credit card number to format
 * @param string the format to use, defaults to '**** **** **** 0000'
 *
 * @see mask_string
 */
function mask_credit_card($string, $format = '**** **** **** 0000')
{
    return mask_string($string, $format);
}
 
/**
 * Formats a USD currency value with two decimal places and a dollar sign.
 *
 * @param string the unformatted amount to format
 * @param string the format to use, defaults to '$%0.2f'
 *
 * @see sprintf
 */
function format_usd($money, $dollar = true, $format = '%0.2f')
{
    return ($dollar ? '$' : '') . sprintf($format, $money);
}
 
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

function format_indicator($indicator) {
    $script = str_replace('%1%', $indicator->getIndicatorValue(), $indicator->getDefaultIndicator()->getIndicatorBeautifier());
    $script = str_replace('%2%', "'" . $indicator->getDefaultIndicator()->getIndicatorUnit() . "'", $script);
    eval("\$str = " . $script . ";");
    return $str;
}

?>

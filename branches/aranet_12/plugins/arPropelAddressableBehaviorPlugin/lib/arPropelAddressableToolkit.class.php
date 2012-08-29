<?php
/*
 * This file is part of the sfPropelActAsTaggableBehavior package.
 *
 * (c) 2007 Xavier Lacot <xavier@lacot.org>
 * (c) 2007 Michael Nolan
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class arPropelAddressableToolkit
{

  /**
   * "Cleans" a string in order it to be used as a address. Intended for strings
   * representing a single tag
   *
   * @param      String    $address
   * @return     bool
   */
  public static function cleanAddressName($address)
  {
    return trim(rtrim(str_replace(',', ' ', $address)));
  }

  /**
   * "Cleans" a string in order it to be used as a tag
   * Intended for strings representing a single address
   *
   * @param      mixed     $addresses
   * @return     mixed
   */
  public static function explodeAddressString($address)
  {
    if (is_string($address)
        && (false !== strpos($address, ',') || preg_match('/\n/', $address)))
    {
      $address = preg_replace('/\r?\n/', ',', $address);
      $address = explode(',', $address);
      $address = array_map('trim', $address);
      $address = array_map('rtrim', $address);
    }

    return $address;
  }
}
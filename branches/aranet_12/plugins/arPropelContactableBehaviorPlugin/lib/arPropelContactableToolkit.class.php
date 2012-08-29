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

class arPropelContactableToolkit
{

  /**
   * "Cleans" a string in order it to be used as a contact. Intended for strings
   * representing a single tag
   *
   * @param      String    $contact
   * @return     bool
   */
  public static function cleanContactName($contact)
  {
    return trim(rtrim(str_replace(',', ' ', $contact)));
  }

  /**
   * "Cleans" a string in order it to be used as a tag
   * Intended for strings representing a single tag
   *
   * @param      mixed     $contacts
   * @return     mixed
   */
  public static function explodeContactString($contact)
  {
    if (is_string($contact)
        && (false !== strpos($contact, ',') || preg_match('/\n/', $contact)))
    {
      $contact = preg_replace('/\r?\n/', ',', $contact);
      $contact = explode(',', $contact);
      $contact = array_map('trim', $contact);
      $contact = array_map('rtrim', $contact);
    }

    return $contact;
  }
}
<?php

/**
 * Subclass for performing query and update operations on the 'aranet_objectaddress' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: ObjectAddressPeer.php 3 2008-08-06 07:48:19Z pablo $
 */

class ObjectAddressPeer extends BaseObjectAddressPeer
{
  public static function retrieveOrCreateByPk($pk) {
      $objectaddress = parent::retrieveByPK($pk);
      if (!$objectaddress) {
          $objectaddress = new ObjectAddress();
      }
      return $objectaddress;
  }
}

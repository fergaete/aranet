<?php

/**
 * Subclass for representing a row from the 'aranet_type_of_hour' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */

class TypeOfHour extends BaseTypeOfHour
{

  /**
   * returns a string that represent the object
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function __toString() {
    return $this->getTypeOfHourTitle() . ' (' . $this->getTypeOfHourCost() . ')';
  }
}

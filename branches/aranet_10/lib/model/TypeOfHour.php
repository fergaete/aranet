<?php

/**
 * Subclass for representing a row from the 'aranet_type_of_hour' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: TypeOfHour.php 3 2008-08-06 07:48:19Z pablo $
 */

class TypeOfHour extends BaseTypeOfHour
{
    public function __toString() {
        return $this->getTypeOfHourTitle() . ' (' . $this->getTypeOfHourCost() . ')';
    }
}

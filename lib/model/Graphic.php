<?php

/**
 * Subclass for representing a row from the 'aranet_graphic' table.
 *
 *
 *
 * @package lib.model
 */
class Graphic extends BaseGraphic
{

  /**
   * returns a string that represent the object
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function __toString() {
    return $this->getGraphicName();
  }
}

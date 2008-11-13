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
    public function __toString() {
        return $this->getGraphicName();
    }
}

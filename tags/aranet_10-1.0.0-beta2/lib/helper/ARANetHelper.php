<?php

/**
 * Asigna al título de la web el texto que se le pasa acompañado de la coletilla " | Symplan".
 *
 * @param string $text Texto para el título
 * @author Pablo Sánchez <pablo.sanchez@aranova.es>
 * @return void
 */
function aranet_title($text)
{
  sfContext::getInstance()->getResponse()->setTitle(sprintf(sfConfig::get('sf_title').' - %s', $text), false);
}

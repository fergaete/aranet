<?php

/* Estandar helpers */
ysfYUI::addComponents('reset', 'fonts', 'base', 'logger', 'calendar');

/**
 * Asigna al título de la web el texto que se le pasa acompañado de la coletilla " | Symplan".
 *
 * @param string $text Texto para el título
 *
 * @return void
 */
function aranet_title($text)
{
  sfContext::getInstance()->getResponse()->setTitle(sprintf('ARANet - %s', $text), false);
}

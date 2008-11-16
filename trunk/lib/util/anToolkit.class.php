<?php

/**
 * anToolkit tiene funciones generales de ARANet.
 *
 * @package aranet
 */
class anToolkit
{
  /**
   * Genera una contraseña de una longitud determinada.
   *
   * @param int $length Longitud de la contraseña
   *
   * @throw  Exception Si no se le pasa una longitud o no es un entero.
   * @return string    Contraseña generada
   */
  static public function generatePassword($length)
  {
    if (!$length || !is_integer($length))
    {
      throw new Exception('No se ha pasado ninguna longitud o no es un entero.');
    }

    $password = '';
    for ($i = 1; $i <= $length; $i++)
    {
      $password .= chr(mt_rand(33, 126));
    }

    return $password;
  }
  
}

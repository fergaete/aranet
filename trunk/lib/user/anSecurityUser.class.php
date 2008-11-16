<?php

/**
 * anSecurityUser personaliza el manejo de usuarios que trae por defecto symfony.
 *
 * @package ARANet
 */
class anSecurityUser extends sfGuardSecurityUser
{
  private $object;
  private $referer;

  /**
   * Establece como autenticado a un usuario.
   *
   * @param User $user
   */
  public function login(User $user)
  {
    $this->setAttribute('user_id', $user['id'], 'anSecurityUser');
    $this->setAttribute('user_username', $user['username'], 'anSecurityUser');
    $this->setAuthenticated(true);
    $this->clearCredentials();
  }
  
  /**
   * Establece como no autenticado a un usuario.
   */
  public function logout()
  {
    $this->getAttributeHolder()->removeNamespace('anSecurityUser');
    $this->clearCredentials();
    $this->setAuthenticated(false);
  }

  /**
   * Devuelve la ID del usuario si está autenticado, sino null.
   *
   * @return int|null
   */
  public function getId()
  {
    return $this->getAttribute('user_id', null, 'anSecurityUser');
  }

  /**
   * Devuelve el nombre de usuario si está autenticado, sino null.
   *
   * @return string|null
   */
  public function getUsername()
  {
    return $this->getAttribute('user_username', null, 'anSecurityUser');
  }

  /**
   * Devuelve el nombre del usuario si está autenticado, sino null.
   *
   * @return string|null
   */
  public function getFullname()
  {
    return $this->getAttribute('user_fullname', null, 'anSecurityUser');
  }

  /**
   * Devuelve el último acceso del usuario si está autenticado, sino null.
   *
   * @return string|null
   */
  public function getLastLogin()
  {
    return $this->getAttribute('user_lastlogin', null, 'anSecurityUser');
  }

  /**
   * Devuelve el objeto del usuario actual si se está autenticado.
   *
   * @return User
   */
  public function getObject()
  {
    if (!$this->object && $id = $this->getId())
    {
      $this->object = sfGuardUserPeer::retrieveByPk($id);

      if (!$this->object)
      {
        $this->logout();

        throw new Exception('El usuario no existe en la base de datos.');
      }
    }

    return $this->object;
  }
  
  /*
   * Pasarela
   */
  public function signIn($user, $remember = false, $con = null)
  {
    $this->setAttribute('user_id', $user->getId(), 'anSecurityUser');
    $this->setAttribute('user_username', $user->getUsername(), 'anSecurityUser');
    $this->setAttribute('user_fullname', $user->getProfile()->getFullname(false), 'anSecurityUser');
    $this->setAttribute('user_lastlogin', $user->getLastLogin(), 'anSecurityUser');
    parent::signIn($user, $remember, $con);
  }
  
}

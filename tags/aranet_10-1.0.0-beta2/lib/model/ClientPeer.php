<?php

/**
 * Subclass for performing query and update operations on the 'aranet_client' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: ClientPeer.php 3 2008-08-06 07:48:19Z pablo $
 */

class ClientPeer extends BaseClientPeer
{
  
  /**
   * returns clients like name
   *
   * @param string  $name
   * @param integer  $max
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public static function getClientsLike($name, $max = 10)
  {
    $c = new Criteria();
    $crit1 = $c->getNewCriterion(ClientPeer::CLIENT_COMPANY_NAME, "%${name}%", Criteria::LIKE);
    $crit2 = $c->getNewCriterion(ClientPeer::CLIENT_UNIQUE_NAME, "%${name}%", Criteria::LIKE);
    $crit1->addOr($crit2);
    $c->add($crit1);
    $c->setLimit($max);
    $clients = ClientPeer::doSelect($c);
    return $clients;
  }

  /**
   * returns the client matching given name
   *
   * @param  string $name company name
   * @return Client
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public static function getClientByCompanyName($name)
  {
    $c = new Criteria();
    $order   = array("\r\n", "\n", "\r");
    $name = str_replace($order, '', $name);
    $crit = $c->getNewCriterion(ClientPeer::CLIENT_COMPANY_NAME, $name);
    $crit2 = $c->getNewCriterion(ClientPeer::CLIENT_UNIQUE_NAME, $name);
    $crit->addOr($crit2);
    $c->add($crit);
    $client = ClientPeer::doSelectOne($c);
    if (!$client instanceof Client) {
        $c = new Criteria();
        $c->add(ClientPeer::CLIENT_UNIQUE_NAME, "${name}");
        $client = ClientPeer::doSelectOne($c);
        if (!$client instanceof Client) {
            $client = new Client();
            $client->setClientCompanyName($name);
            $client->setClientUniqueName($name);
        }
    }
    return $client;
  }
}

<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id$
 */
class sfPropelParanoidBehavior
{
  static public $paranoidFlag = true;
  protected $paranoidFlags = array();

	public static function doSelectStmt($class, Criteria $criteria, PropelPDO $con = null)
	{
    $columnName = sfConfig::get('propel_behavior_paranoid_'.$class.'_column', 'deleted_at');

    if (self::$paranoidFlag)
    {
      $criteria->add(call_user_func(array($class, 'translateFieldName'), $columnName, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME), null, Criteria::ISNULL);
    }
    else
    {
      self::$paranoidFlag = true;
    }

    return false;
	}

  	public static function doCount($class, Criteria $criteria, $distinct = false, PropelPDO $con = null)
  	{
      $columnName = sfConfig::get('propel_behavior_paranoid_'.$class.'_column', 'deleted_at');

      if (self::$paranoidFlag)
      {
        $criteria->add(call_user_func(array($class, 'translateFieldName'), $columnName, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME), null, Criteria::ISNULL);
      }
      else
      {
        self::$paranoidFlag = true;
      }
    $criteria->add(ClientPeer::ID, 3);
      return false;
  	}

  public function doSelectRS($class, $criteria, $con = null)
  {
    $columnName = sfConfig::get('propel_behavior_paranoid_'.$class.'_column', 'deleted_at');

    if (self::$paranoidFlag)
    {
      $criteria->add(call_user_func(array($class, 'translateFieldName'), $columnName, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME), null, Criteria::ISNULL);
    }
    else
    {
      self::$paranoidFlag = true;
    }

    return false;
  }

  public function preDelete($object, $con = null)
  {
    if ($this->getParanoidFlag($object) || !self::$paranoidFlag)
    {
      self::$paranoidFlag = true;
      $this->setParanoidFlag($object, false);

      return false;
    }

    $class = get_class($object);
    $peerClass = get_class($object->getPeer());
    
    $columnName = sfConfig::get('propel_behavior_paranoid_'.$class.'_column', 'deleted_at');
    $method = 'set'.call_user_func(array($peerClass, 'translateFieldName'), $columnName, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME);
    $object->$method(time());
    $object->save();

    return true;
  }

  public function forceDelete($object, $con = null)
  {
    $this->setParanoidFlag($object);
    $object->delete($con);
  }

  protected function setParanoidFlag($object)
  {
    $this->paranoidFlags[get_class($object).'_'.$object->getPrimaryKey()] = true;
  }

  protected function getParanoidFlag($object)
  {
    $key = get_class($object).'_'.$object->getPrimaryKey();

    return isset($this->paranoidFlags[$key]) ? $this->paranoidFlags[$key] : false;
  }

  public static function disable()
  {
    self::$paranoidFlag = false;
  }
}

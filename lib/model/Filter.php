<?php
/**
 * Generic filter class.
 *
 * @package    ARANet
 * @subpackage model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */
class Filter extends BaseObject
{
  private $name = '';
  
  public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
  {
    $result = array('name' => $this->name);
    return $result;
  }

  public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
  {
    sfContext::getInstance()->getConfiguration()->loadHelpers'I18N');
    $result = array('name' => isset($arr['name']) ? $arr['name'] : __('Name').'...');
    $this->name = $result['name'];
    return $result;
  }
  
  public function getName()
  {
    return $this->name;
  }
}

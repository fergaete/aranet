<?php

/**
 * cash actions.
 *
 * @package    aranet
 * @subpackage cash
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class cashActions extends myActions
{

  /**
   * returns cash item from params
   *
   * @return CashItem
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getCashItem()
  {
    if ($this->getRequestParameter('id')) {
      $cash_item = CashItemPeer::retrieveByPk($this->getRequestParameter('id'));
      $this->forward404Unless($cash_item);
    } else {
      $cash_item = new CashItem();
    }
    return $cash_item;
  }

  /**
   * executes show action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeShow()
  {
    return $this->forward('cash', 'edit');
  }
  
  /**
   * executes update action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeUpdate()
  {
    $cash_item = $this->getCashItem();
    $cash_item->setId($this->getRequestParameter('id'));
    $cash_item->setCashItemName($this->getRequestParameter('cash_item_name'));
    $cash_item->setCashItemComments($this->getRequestParameter('cash_item_comments'));
    if ($this->getRequestParameter('cash_item_date'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('cash_item_date'), $this->getUser()->getCulture());
      $cash_item->setCashItemDate("$y-$m-$d");
    }
    $cash_item->setCashItemAmount($this->getRequestParameter('cash_item_amount'));

    $cash_item->save();

    return $this->redirect('cash/list');
  }

  /**
   * adds filters criteria
   *
   * @param  Criteria  $c  the base criteria
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function addFiltersCriteria ($c)
  {
    if (isset($this->filters['cash_from_is_empty']))
    {
      $criterion = $c->getNewCriterion(CashItemPeer::CASH_ITEM_DATE, '');
      $criterion->addOr($c->getNewCriterion(CashItemPeer::CASH_ITEM_DATE, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['cash_from']) && $this->filters['cash_from'] !== '') {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->filters['cash_from'], $this->getUser()->getCulture());
      $criterion = $c->getNewCriterion(CashItemPeer::CASH_ITEM_DATE, $y.'-'.$m.'-'.$d, Criteria::GREATER_EQUAL);
    }
    if (isset($this->filters['cash_to_is_empty']))
    {
      $criterion2 = $c->getNewCriterion(CashItemPeer::CASH_ITEM_DATE, '');
      $criterion2->addOr($c->getNewCriterion(CashItemPeer::CASH_ITEM_DATE, null, Criteria::ISNULL));
      $c->add($criterion2);
    }
    else if (isset($this->filters['cash_to']) && $this->filters['cash_to'] !== '') {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->filters['cash_to'], $this->getUser()->getCulture());
      $criterion2 = $c->getNewCriterion(CashItemPeer::CASH_ITEM_DATE, $y.'-'.$m.'-'.$d, Criteria::LESS_EQUAL);
      if (isset($criterion)) {
        $criterion->addAnd($criterion2);
      }
      else
      {
        $criterion = $criterion2;
      }
    }
    if (isset($criterion))
    {
      $c->add($criterion);
    }
    if (isset($this->filters['cash_name']) && $this->filters['cash_name'] && $this->filters['cash_name'] != sfI18N::getInstance()->__('Name') . '...')
    {
      $c->add(CashItemPeer::CASH_ITEM_NAME, "%".$this->filters['cash_name']."%", Criteria::LIKE);
    }
  }
}

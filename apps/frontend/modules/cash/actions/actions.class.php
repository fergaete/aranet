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
    public function executeCreate()
    {
        $this->cash_item = new CashItem();
        $this->setTemplate('edit');
        return sfView::SUCCESS;
    }

    public function executeEdit()
    {
        if ($this->getRequestParameter('id')) {
            $this->cash_item = CashItemPeer::retrieveByPk($this->getRequestParameter('id'));
            $this->forward404Unless($this->cash_item);
        } else {
            $this->cash_item = new CashItem();
        }
        return sfView::SUCCESS;
    }

    public function handleErrorUpdate()
    {
        $this->forward('cash', 'edit');
    }

    public function executeUpdate()
    {
        if (!$this->getRequestParameter('id'))
        {
            $cash_item = new CashItem();
        }
        else
        {
            $cash_item = CashItemPeer::retrieveByPk($this->getRequestParameter('id'));
            $this->forward404Unless($cash_item);
        }

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

    public function executeDelete()
    {
        $cash_item = CashItemPeer::retrieveByPk($this->getRequestParameter('id'));

        $this->forward404Unless($cash_item);

        $cash_item->delete();

        return $this->redirect('cash/list');
    }

    public function executeDeleteall()
    {
        // TODO: borrado múltiple en una pasada
        $select = $this->getRequestParameter('select', null);
        if ($select) {
            foreach ($select as $item) {
                if ($item != 0) {
                    $cash_item = CashItemPeer::retrieveByPk($item);
                    $cash_item->delete();
                }
            }
        }
        return $this->redirect($this->getRequest()->getReferer());
    }

    protected function processFilters ()
    {
        if ($this->getRequest()->hasParameter('filter') || $this->getRequest()->hasParameter('filters'))
        {
            $filters = $this->getRequestParameter('filters');
            $this->getUser()->getAttributeHolder()->removeNamespace('cash/filters');
            $this->getUser()->getAttributeHolder()->add($filters, 'cash/filters');
        }
    }

    protected function processSort ()
    {
        if ($this->getRequestParameter('sort'))
        {
            $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'cash/sort');
            $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'cash/sort');
        }

        if (!$this->getUser()->getAttribute('sort', null, 'cash/sort'))
        {
            $this->getUser()->setAttribute('sort', 'cash_item_date', 'cash/sort');
            $this->getUser()->setAttribute('type', 'asc', 'cash/sort');
        }
    }

    protected function addSortCriteria ($c)
    {
        if ($sort_column = $this->getUser()->getAttribute('sort', null, 'cash/sort'))
        {
            $sort_column = CashItemPeer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
            if ($this->getUser()->getAttribute('type', null, 'cash/sort') == 'asc')
            {
                $c->addAscendingOrderByColumn($sort_column);
            }
            else
            {
                $c->addDescendingOrderByColumn($sort_column);
            }
        }
    }

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

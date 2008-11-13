<?php

/**
 * client actions.
 *
 * @package    aranet
 * @subpackage client
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class clientActions extends myActions
{

    public function executeShow()
    {
        $c = new Criteria();
        $c->add(ClientPeer::ID, $this->getRequestParameter('id'));
        $clients = ClientPeer::doSelect($c);
        if (isset($clients[0])) {
            $this->client = $clients[0];
        } else {
            $this->forward404();
        }
        return sfView::SUCCESS;
    }

    public function executeList()
    {
        $this->processList(new Criteria(), 'doSelect');
        return sfView::SUCCESS;
    }

    public function executeStats()
    {
        $this->client = ClientPeer::retrieveByPk($this->getRequestParameter('client_id'));
        $this->forward404Unless($this->client);
        return sfView::SUCCESS;
    }

    public function executeCreate()
    {
        $this->getUser()->setAttribute('index', 0);
        $this->client = new Client();

        $this->setTemplate('edit');
    }

    public function executeEdit()
    {
        $this->getUser()->setAttribute('index', 0);
        $c = new Criteria();
        $c->add(ClientPeer::ID, $this->getRequestParameter('id'));
        $clients = ClientPeer::doSelect($c);
        if (isset($clients[0])) {
            $this->client = $clients[0];
        } else {
            $this->client = new Client();
        }
    }

    public function handleErrorUpdate()
    {
        $this->forward('client', 'edit');
    }

    public function handleErrorEdit()
    {
        $this->executeEdit();
        return sfView::SUCCESS;
    }

    public function executeAutocomplete()
    {
        sfConfig::set('sf_web_debug', false);
        $client_name = $this->getRequestParameter('filters[client_name]', $this->getRequestParameter('client_name'));
        if (!$client_name) {
            $client_name = $this->getRequestParameter('company_name');
        }
        $this->clients = ClientPeer::getClientsLike($client_name);
        return sfView::SUCCESS;
    }

    public function executeUpdate()
    {
        if (!$this->getRequestParameter('id'))
        {
            $client = new Client();
        }
        else
        {
            $client = ClientPeer::retrieveByPk($this->getRequestParameter('id'));
            $this->forward404Unless($client);
        }

        $contacts = ContactPeer::processContact($this->getRequest()->getParameterHolder()->getAll());
        if ($contacts) {
            $i = 0;
            foreach($contacts as $contact) {
                $client->addContact($contact, ($i==0));
                $i++;
            }
        }
        $addresses = AddressPeer::processAddress($this->getRequest()->getParameterHolder()->getAll());
        if ($addresses) {
            if (count($addresses)) {
                $addresses[0]->setAddressIsDefault(true);
            }
            foreach($addresses as $address) {
                $client->addAddress($address);
            }
        }

        $client->setClientUniqueName($this->getRequestParameter('client_unique_name'));
        $client->setClientCompanyName($this->getRequestParameter('client_company_name'));
        $client->setClientCif($this->getRequestParameter('client_cif'));
        $client->setClientKindOfCompanyId($this->getRequestParameter('client_kind_of_company_id') ? $this->getRequestParameter('client_kind_of_company_id') : null);
        if ($this->getRequestParameter('client_since'))
        {
            list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('client_since'), $this->getUser()->getCulture());
            $client->setClientSince("$y-$m-$d");
        }
        $client->setClientWebsite($this->getRequestParameter('client_website'));
        $client->setClientComments($this->getRequestParameter('client_comments'));
        $client->removeAllTags();
        $client->addTag($this->getRequestParameter('tags') ? $this->getRequestParameter('tags') : null);

        $client->save();

        return $this->redirect('@show_client_by_id?id='.$client->getId());
    }

    public function executeDelete()
    {
        $client = ClientPeer::retrieveByPk($this->getRequestParameter('id'));

        $this->forward404Unless($client);

        $client->delete();

        return sfView::NONE;
    }

    public function executeDeleteall()
    {
        // TODO: borrado múltiple en una pasada
        $select = $this->getRequestParameter('select', null);
        if ($select) {
            $c = new Criteria();
            foreach ($select as $item) {
                if ($item != 0) {
                    $client = ClientPeer::retrieveByPk($item);
                    $client->delete();
                }
            }
        }
        return $this->redirect($this->getRequest()->getReferer());
    }

    public function executeEditbusiness()
    {
        $this->business = KindOfCompanyPeer::doSelect(new Criteria());

        return sfView::SUCCESS;
    }

    protected function processFilters ()
    {
        if ($this->getRequest()->hasParameter('filter') || $this->getRequest()->hasParameter('filters'))
        {
            $filters = $this->getRequestParameter('filters');
            $this->getUser()->getAttributeHolder()->removeNamespace('client/filters');
            $this->getUser()->getAttributeHolder()->add($filters, 'client/filters');
        }
    }

    protected function processSort ()
    {
        if ($this->getRequestParameter('sort'))
        {
            $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'client/sort');
            $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'client/sort');
        }

        if (!$this->getUser()->getAttribute('sort', null, 'client/sort'))
        {
            $this->getUser()->setAttribute('sort', 'id', 'client/sort');
            $this->getUser()->setAttribute('type', 'asc', 'client/sort');
        }
    }

    protected function addSortCriteria ($c)
    {
        if ($sort_column = $this->getUser()->getAttribute('sort', null, 'client/sort'))
        {
            $sort_column = ClientPeer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
            if ($this->getUser()->getAttribute('type', null, 'client/sort') == 'asc')
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
        if (isset($this->filters['client_name']) && $this->filters['client_name'] && $this->filters['client_name'] != sfI18N::getInstance()->__('Name') . '...')
        {
            $criterion = $c->getNewCriterion(ClientPeer::CLIENT_COMPANY_NAME, "%".$this->filters['client_name']."%", Criteria::LIKE);
            $crit2 = $c->getNewCriterion(ClientPeer::CLIENT_UNIQUE_NAME, "%".$this->filters['client_name']."%", Criteria::LIKE);
            $criterion->addOr($crit2);
            $c->add($criterion);
        }
        if (isset($criterion))
        {
            $c->add($criterion);
        }
    }

}

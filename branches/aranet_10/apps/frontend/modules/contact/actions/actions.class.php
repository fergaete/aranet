<?php

/**
 * contact actions.
 *
 * @package    aranet
 * @subpackage contact
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class contactActions extends myActions
{
    public function executeMinilist()
    {
        switch ($this->getRequestParameter('class')) {
            case "Vendor":
            case "vendor":
            $object = VendorPeer::retrieveByPK($this->getRequestParameter('id'));
            break;
            case "Client":
            case "client":
            $object = ClientPeer::retrieveByPK($this->getRequestParameter('id'));
            break;
            case "Project":
            case "project":
            $object = ProjectPeer::retrieveByPK($this->getRequestParameter('id'));
            break;
            case "Budget":
            case "budget":
            $object = BudgetPeer::retrieveByPK($this->getRequestParameter('id'));
            break;
        }
        $this->contacts = $object->getContacts();
        return sfView::SUCCESS;
    }

    public function executeShow()
    {
        $this->contact = ContactPeer::retrieveByPk($this->getRequestParameter('id'));
        $this->forward404Unless($this->contact);
    }

    public function executeList()
    {
        $this->processList(new Criteria(), 'doSelect');
    }

    public function executeCreate()
    {
        $this->contact = new Contact();

        $this->setTemplate('edit');
    }

    public function executeMinicreate()
    {
        $this->contact = new Contact();
        $index = $this->getUser()->getAttribute('index', -1);
        $index++;
        $this->getUser()->setAttribute('index', $index);
        $this->index = $index;
        $this->setTemplate('miniedit');
    }

    public function executeMiniedit()
    {
        $this->contact = ContactPeer::retrieveByPk($this->getRequestParameter('id'));
        $this->index = 0;
        $this->forward404Unless($this->contact);
    }

    public function executeEdit()
    {
        $this->contact = ContactPeer::retrieveByPk($this->getRequestParameter('id'));
        $this->forward404Unless($this->contact);
    }

    public function executeUpdate()
    {
        if (!$this->getRequestParameter('id'))
        {
            $contact = new Contact();
        }
        else
        {
            $contact = ContactPeer::retrieveByPk($this->getRequestParameter('id'));
            $this->forward404Unless($contact);
        }
        $addresses = AddressPeer::processAddress($this->getRequest()->getParameterHolder()->getAll());
        if ($addresses) {
            if (count($addresses)) {
                $addresses[0]->setAddressIsDefault(true);
            }
            foreach($addresses as $address) {
                $contact->addAddress($address);
            }
        }
        $class = $this->getRequestParameter('company_class');
        if (strpos($class, ' ') !== false)
            $class = substr($class, 0, strpos($class, ' '));
        // Eliminar los objectos asociados al cliente    
        if ($class == 'Client') {
            $company_id = $this->getRequestParameter('company_id');
            $company = ClientPeer::retrieveByPk($company_id);
            $contact->setClient($company);
        } elseif ($class == 'Vendor') {
            $company_id = $this->getRequestParameter('company_id');
            $company = VendorPeer::retrieveByPk($company_id);
            $contact->setVendor($company);
        } else {
            // Undefined
            $company_name = $this->getRequestParameter('company_name');
            if ($company_name && $company_name != $this->getContext()->getI18N()->__('Company') . '...') {
                $company = new Vendor();
                $company->setVendorCompanyName($this->getRequestParameter('company_name'));
                $company->setVendorUniqueName($this->getRequestParameter('company_name'));
                $company->save();
                $company_id = $company->getId();
                $contact->setVendor($company);
            } else {
                $company_id = null;
            }
            
        }

        $contact->setId($this->getRequestParameter('id'));
        $contact->setContactSalutation($this->getRequestParameter('contact_salutation'));
        $contact->setContactFirstName($this->getRequestParameter('contact_first_name'));
        $contact->setContactLastName($this->getRequestParameter('contact_last_name'));
        $contact->setContactOrgUnit($this->getRequestParameter('contact_org_unit'));
        $contact->setContactEmail($this->getRequestParameter('contact_email'));
        $contact->setContactPhone($this->getRequestParameter('contact_phone'));
        $contact->setContactFax($this->getRequestParameter('contact_fax'));
        $contact->setContactMobile($this->getRequestParameter('contact_mobile'));
        if ($this->getRequestParameter('contact_birthday'))
        {
            list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('contact_birthday'), $this->getUser()->getCulture());
            $contact->setContactBirthday("$y-$m-$d");
        }
        $contact->removeAllTags();
        $contact->addTag($this->getRequestParameter('tags') ? $this->getRequestParameter('tags') : null);
        $contact->save();
        return $this->redirect('@show_contact_by_id?id='.$contact->getId());
    }

    public function executeDeleteobject()
    {
        $c = new Criteria();
        $class = $this->getRequestParameter('class');
        switch ($class) {
            case 'Budget':
            $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, $this->getRequestParameter('oid'));
            $c->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $this->getRequestParameter('id'));
            $contacts = ObjectContactPeer::doDelete($c);
            break;
            case 'Project':
            $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, $this->getRequestParameter('oid'));
            $c->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $this->getRequestParameter('id'));
            $crit1 = $c->getNewCriterion(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, $class);
            $crit2 = $c->getNewCriterion(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, 'Client');
            $crit1->addOr($crit2);
            $c->addAnd($crit1);
            $contacts = ObjectContactPeer::doDelete($c);
            break;
            default:
            $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, $this->getRequestParameter('oid'));
            $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, $class);
            $c->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $this->getRequestParameter('id'));
            $contact = ObjectContactPeer::doDelete($c);
        }
        return sfView::SUCCESS;
    }

    public function executeDelete()
    {
        $contact = ContactPeer::retrieveByPk($this->getRequestParameter('id'));

        $this->forward404Unless($contact);

        $contact->delete();

        return sfView::SUCCESS;
    }

    public function executeDeleteall()
    {
        // TODO: borrado múltiple en una pasada
        $select = $this->getRequestParameter('select', null);
        if ($select) {
            foreach ($select as $item) {
                if ($item != 0) {
                    $contact = ContactPeer::retrieveByPk($item);
                    $contact->delete();
                }
            }
        }
        return $this->redirect($this->getRequest()->getReferer());
    }

    public function executeAutocomplete()
    {
        sfConfig::set('sf_web_debug', false);
        $contacts = $this->getRequestParameter('contact');
        $contact_name = $contacts[count($contacts)-1]['name'];
        $this->contacts = ContactPeer::getContactsLike($contact_name);
    }

    public function executeGetCompanies()
    {
        sfConfig::set('sf_web_debug', false);
        $company_name = $this->getRequestParameter('company_name');
        if ($company_name) {
            $clients = ClientPeer::getClientsLike($company_name);
            $vendors = VendorPeer::getVendorsLike($company_name);
            $this->companies = array_merge($clients, $vendors);
            return sfView::SUCCESS;
        }
        return sfView::NONE;
    }

    protected function processFilters ()
    {
        if ($this->getRequest()->hasParameter('filter'))
        {
            $filters = $this->getRequestParameter('filters');
            $this->getUser()->getAttributeHolder()->removeNamespace('contact/filters');
            $this->getUser()->getAttributeHolder()->add($filters, 'contact/filters');
        }
    }

    protected function processSort ()
    {
        if ($this->getRequestParameter('sort'))
        {
            $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'contact/sort');
            $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'contact/sort');
        }

        if (!$this->getUser()->getAttribute('sort', null, 'contact/sort'))
        {
            $this->getUser()->setAttribute('sort', 'contact_first_name', 'contact/sort');
            $this->getUser()->setAttribute('type', 'asc', 'contact/sort');
        }
    }

    protected function addSortCriteria ($c)
    {
        if ($sort_column = $this->getUser()->getAttribute('sort', null, 'contact/sort'))
        {
            $sort_column = ContactPeer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
            if ($this->getUser()->getAttribute('type', null, 'contact/sort') == 'asc')
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
        if (isset($this->filters['contact_name']) && $this->filters['contact_name'] && $this->filters['contact_name'] != sfI18N::getInstance()->__('Name') . '...')
        {
            $criterion = $c->getNewCriterion(ContactPeer::CONTACT_FIRST_NAME, "%".$this->filters['contact_name']."%", Criteria::LIKE);
            $crit2 = $c->getNewCriterion(ContactPeer::CONTACT_LAST_NAME, "%".$this->filters['contact_name']."%", Criteria::LIKE);
            $criterion->addOr($crit2);
            $c->add($criterion);
        }
        if (isset($criterion))
        {
            $c->add($criterion);
        }
    }
}

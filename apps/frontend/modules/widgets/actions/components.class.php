<?php

/**
 * widgets components.
 *
 * @package    aranet
 * @subpackage widgets
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: components.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class widgetsComponents extends sfComponents
{
    /**
     * executeSubnav function: executes Subnav action
     *
     * @access public
     * @return string
     * @author Pablo Sánchez <pablo.sanchez@aranova.es>
     **/
    public function executeSubnav()
    {
        $this->module = $this->getModuleName();
        if ($this->getUser()->isAuthenticated() && $this->getUser()->hasCredential('member') && !in_array($this->module, array('dashboard'))) {
            if (!$this->getUser()->getAttribute('fullname')) {
                $this->getUser()->setAttribute('fullname', $this->getUser()->getGuardUser()->getProfile()->getFullname(false));
            }
            $this->fullname = $this->getUser()->getAttribute('fullname');
            $this->filters = $this->getUser()->getAttributeHolder()->getAll($this->module.'/filters');
            return sfView::SUCCESS;
        }
        return sfView::NONE;
    }

    /**
     * executeTags function: executes Tags action
     *
     * @access public
     * @return string
     * @author Pablo Sánchez <pablo.sanchez@aranova.es>
     **/
    public function executeTags()
    {
        $this->module = $this->getModuleName();
        if ($this->getUser()->isAuthenticated() && $this->getUser()->hasCredential('member') && in_array($this->module, array('client', 'vendor', 'project', 'contact', 'invoice', 'budget', 'income', 'expense'))) {
            $this->model = ucfirst($this->module);
            if (in_array($this->module, array('expense', 'income'))) {
                $this->model .= 'Item';
            }
            $this->tags = TagPeer::getPopulars(null, array('model' => $this->model));
            if ($this->tags) {
                return sfView::SUCCESS;
            }
        }
        return sfView::NONE;
    }

    /**
     * Executes Calendar action
     *
     */
    public function executeCalendar()
    {
      // Initialize the event calendar with two parameters
      // 1.) The style of the calendar (day, week, month, year)
      // 2.) Any date within the specified time period. The script will automatically determine the best calendar days to return.
      //     For example, if you choose "month" and pass 1/15/2006, the calendar will return all dates and events from 01/01/2006 - 01/31/2006.
      //     If you choose "week" and pass 1/18/2006, the calender will return all dates and events from 01/16/2006 - 01/22/2006.
      $c = new sfEventCalendar('month', date('m/d/Y')); // The style of the calendar, any date within the specified time period

      // Add an event to the calendar
      // You must enter a date for the calendar event.
      // You can enter as many options as you'd like that best fit your circumstances.
      // For example, i've passed a title, and url to the calendar.
      // You can pass these, or any number of parameters you'd like to associate with the event
      //$c->addEvent('12/12/2007', array('title' => 'Fernando Blasco (IAF)', 'alt' => 'IAF', 'url' => 'a'));

      // Return an array of calendar dates with the events attached to them.
      // You can use this array to formulate a calendar in any way you'd like.
      // The array automatically breaks years into months and months into weeks, etc...
      $this->calendar = $c->getEventCalendar();
    }
}

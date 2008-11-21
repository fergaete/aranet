<?php

/**
 * dashboard actions.
 *
 * @package    aranet
 * @subpackage dashboard
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class dashboardActions extends sfActions
{

  protected $lm=50;
  protected $rm=20;

  /**
   * executes index action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeIndex()
  {
    $c = new Criteria();
    $c->add(InvoicePeer::INVOICE_PAYMENT_DATE, null, Criteria::ISNULL);
    $c->add(InvoicePeer::INVOICE_NUMBER, '', Criteria::NOT_EQUAL);
    $c->addAscendingOrderByColumn(InvoicePeer::INVOICE_NUMBER);
    $pending_invoices = InvoicePeer::doSelect($c);
    // Update invoice payment status
    foreach ($pending_invoices as $invoice) {
      if ($invoice->getInvoicePaymentConditionId() == 1) {
        $days = $invoice->getPaymentCondition()->getPaymentConditionDays();
        if ($invoice->getPaymentCondition()->getPaymentConditionPaymentDay() != -1) {
          $days += $invoice->getPaymentCondition()->getPaymentConditionPaymentDay();
        }
        if ($days > 0) {
          if ((time() - strtotime($invoice->getInvoiceDate())) / (3600 * 24) > $days) {
            // Cumplido
            $invoice->setInvoicePaymentStatusId(2);
            $invoice->save();
          }
        }
      }
    }
    $this->pending_invoices = $pending_invoices;
    $c = new Criteria();
    $c->add(InvoicePeer::INVOICE_PAYMENT_DATE, null, Criteria::ISNULL);
    $c->add(InvoicePeer::INVOICE_NUMBER, '');
    $c->addAscendingOrderByColumn(InvoicePeer::INVOICE_DATE);
    $this->next_invoices = InvoicePeer::doSelect($c);
    $c = new Criteria();
    $c->add(IndicatorPeer::INDICATOR_OBJECT_CLASS, 'Client');
    $c->add(DefaultIndicatorPeer::INDICATOR_KEY, 'total-amount-solt');
    $c->addJoin(IndicatorPeer::INDICATOR_ID, DefaultIndicatorPeer::ID);
    $c->addJoin(IndicatorPeer::INDICATOR_OBJECT_ID, ClientPeer::ID);
    $c->addDescendingOrderByColumn(IndicatorPeer::INDICATOR_VALUE);
    $c->setLimit(5);
    $inds = IndicatorPeer::doSelectJoinDefaultIndicator($c);
    $clients = ClientPeer::doSelect($c);
    for ($i = 0; $i < count ($clients); $i++) {
      $clients[$i]->setIndicator($inds[$i]);
    }
    $this->clients = $clients;
    // approved_budgets
    $this->approved_budgets = BudgetPeer::getApprovedBudgets('doSelectJoinClient');
    // active_budgets
    $this->active_budgets = BudgetPeer::getActiveBudgets('doSelectJoinClient');
    // last_caducated_budgets
    $this->last_caducated_budgets = BudgetPeer::getLastCaducatedBudgets('doSelectJoinClient', 5);
    
    $c = new Criteria();
    $c->add(GraphicPeer::IS_DEFAULT, true);
    $graphic = GraphicPeer::doSelectOne($c);
    if ($graphic) {
      $this->graphic_id = $graphic->getId();
    } else {
      $this->graphic_id = 1;
    }
    return sfView::SUCCESS;
  }

  /**
   * executes getGraphic action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeGetGraphic() {
    return sfView::SUCCESS;
  }

  /**
   * executes saveCriteria action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeSaveCriteria() {
    // Guardar los criteria
    // 1. Gastos sin IVA (eliminar impuestos mod 300)
    $c = new Criteria();
    $c->addSelectColumn('SUM(expense_item_amount) as A');
    $c->addSelectColumn(ExpenseItemPeer::EXPENSE_ITEM_AMOUNT);
    $c->addSelectColumn(ExpenseItemPeer::EXPENSE_PURCHASE_DATE);
    $c1 = $c->getNewCriterion(ExpenseItemPeer::EXPENSE_ITEM_NAME, 'I.V.A. Mod. 300', Criteria::NOT_EQUAL);
    $c2 = $c->getNewCriterion(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, 16, Criteria::NOT_EQUAL);
    $c1->addOr($c2);
    $c->addAnd($c1);
    $c->addSelectColumn(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID);
    $c->addGroupByColumn(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID);
    $crit = $c->getNewCriterion(ExpenseItemPeer::EXPENSE_PURCHASE_DATE, '2007-01-01 00:00:00', Criteria::GREATER_EQUAL);
    $crit2 = $c->getNewCriterion(ExpenseItemPeer::EXPENSE_PURCHASE_DATE, '2007-01-01 00:00:00', Criteria::LESS_THAN);
    $crit->addAnd($crit2);
    $c->add($crit);
    $plot_criteria = serialize($c);
    $c = new Criteria();
    $c->add(GPlotPeer::ID, array(1), Criteria::IN);
    $plots = GPlotPeer::doSelect($c);
    foreach ($plots as $plot) {
      $plot->setPlotCriteria($plot_criteria);
      $plot->save();
    }
    // 2. Gastos con IVA
    $c = new Criteria();
    $c->addSelectColumn('SUM(expense_item_amount*(100+expense_item_tax_rate)/100) as A');
    $c->addSelectColumn(ExpenseItemPeer::EXPENSE_ITEM_AMOUNT);
    $c->addSelectColumn(ExpenseItemPeer::EXPENSE_PURCHASE_DATE);
    $c->addSelectColumn(ExpenseItemPeer::EXPENSE_ITEM_TAX_RATE);
    $c->addSelectColumn(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID);
    $c->addGroupByColumn(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID);
    $crit = $c->getNewCriterion(ExpenseItemPeer::EXPENSE_PURCHASE_DATE, '2007-01-01 00:00:00', Criteria::GREATER_EQUAL);
    $crit2 = $c->getNewCriterion(ExpenseItemPeer::EXPENSE_PURCHASE_DATE, '2007-01-01 00:00:00', Criteria::LESS_THAN);
    $crit->addAnd($crit2);
    $c->add($crit);
    $plot_criteria = serialize($c);
    $c = new Criteria();
    $c->add(GPlotPeer::ID, array(2), Criteria::IN);
    $plots = GPlotPeer::doSelect($c);
    foreach ($plots as $plot) {
      $plot->setPlotCriteria($plot_criteria);
      $plot->save();
    }
    // 3. Ingresos sin IVA
    $c = new Criteria();
    $c->addSelectColumn('SUM(income_item_amount) as A');
    $c->addSelectColumn(IncomeItemPeer::INCOME_ITEM_AMOUNT);
    $c->addSelectColumn(IncomeItemPeer::INCOME_DATE);
    $c->addSelectColumn(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID);
    $c->addGroupByColumn(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID);
    $crit = $c->getNewCriterion(IncomeItemPeer::INCOME_DATE, '2007-01-01 00:00:00', Criteria::GREATER_EQUAL);
    $crit2 = $c->getNewCriterion(IncomeItemPeer::INCOME_DATE, '2007-01-01 00:00:00', Criteria::LESS_THAN);
    $crit->addAnd($crit2);
    $c->add($crit);
    $plot_criteria = serialize($c);
    $c = new Criteria();
    $c->add(GPlotPeer::ID, array(3,4), Criteria::IN);
    $plots = GPlotPeer::doSelect($c);
    foreach ($plots as $plot) {
      $plot->setPlotCriteria($plot_criteria);
      $plot->save();
    }
    // 4. Ingresos con IVA
    $c = new Criteria();
    $c->addSelectColumn('SUM(income_item_amount*(100+income_item_tax_rate)/100) as A');
    $c->addSelectColumn(IncomeItemPeer::INCOME_ITEM_AMOUNT);
    $c->addSelectColumn(IncomeItemPeer::INCOME_DATE);
    $c->addSelectColumn(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID);
    $c->addGroupByColumn(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID);
    $crit = $c->getNewCriterion(IncomeItemPeer::INCOME_DATE, '2007-01-01 00:00:00', Criteria::GREATER_EQUAL);
    $crit2 = $c->getNewCriterion(IncomeItemPeer::INCOME_DATE, '2007-01-01 00:00:00', Criteria::LESS_THAN);
    $crit->addAnd($crit2);
    $c->add($crit);
    $plot_criteria = serialize($c);
    $c = new Criteria();
    $c->add(GPlotPeer::ID, array(5,6), Criteria::IN);
    $plots = GPlotPeer::doSelect($c);
    foreach ($plots as $plot) {
      $plot->setPlotCriteria($plot_criteria);
      $plot->save();
    }
    // 5. Facturacion sin IVA por fecha de pago
    $c = new Criteria();
    $c->addSelectColumn('SUM(invoice_total_amount) as A');
    $c->addSelectColumn(InvoicePeer::INVOICE_TOTAL_AMOUNT);
    $c->addSelectColumn(InvoicePeer::INVOICE_PAYMENT_DATE);
    $c->addSelectColumn(InvoicePeer::INVOICE_CLIENT_ID);
    $c->addSelectColumn(InvoicePeer::INVOICE_TAX_RATE);
    $c->addGroupByColumn(InvoicePeer::INVOICE_CLIENT_ID);
    $crit = $c->getNewCriterion(InvoicePeer::INVOICE_PAYMENT_DATE, '2007-01-01 00:00:00', Criteria::GREATER_EQUAL);
    $crit2 = $c->getNewCriterion(InvoicePeer::INVOICE_PAYMENT_DATE, '2007-01-01 00:00:00', Criteria::LESS_THAN);
    $crit->addAnd($crit2);
    $c->add($crit);
    $plot_criteria = serialize($c);
    $c = new Criteria();
    $c->add(GPlotPeer::ID, array(7, 9), Criteria::IN);
    $plots = GPlotPeer::doSelect($c);
    foreach ($plots as $plot) {
      $plot->setPlotCriteria($plot_criteria);
      $plot->save();
    }
    // 6. Facturacion con IVA por fecha de pago
    $c = new Criteria();
    $c->addSelectColumn('SUM(invoice_total_amount*(100+invoice_tax_rate)/100) as A');
    $c->addSelectColumn(InvoicePeer::INVOICE_TOTAL_AMOUNT);
    $c->addSelectColumn(InvoicePeer::INVOICE_PAYMENT_DATE);
    $c->addSelectColumn(InvoicePeer::INVOICE_CLIENT_ID);
    $c->addSelectColumn(InvoicePeer::INVOICE_TAX_RATE);
    $c->addGroupByColumn(InvoicePeer::INVOICE_CLIENT_ID);
    $crit = $c->getNewCriterion(InvoicePeer::INVOICE_PAYMENT_DATE, '2007-01-01 00:00:00', Criteria::GREATER_EQUAL);
    $crit2 = $c->getNewCriterion(InvoicePeer::INVOICE_PAYMENT_DATE, '2007-01-01 00:00:00', Criteria::LESS_THAN);
    $crit->addAnd($crit2);
    $c->add($crit);
    $plot_criteria = serialize($c);
    $c = new Criteria();
    $c->add(GPlotPeer::ID, array(8, 10), Criteria::IN);
    $plots = GPlotPeer::doSelect($c);
    foreach ($plots as $plot) {
      $plot->setPlotCriteria($plot_criteria);
      $plot->save();
    }
    // 7. Facturacion sin IVA por fecha de factura
    $c = new Criteria();
    $c->addSelectColumn('SUM(invoice_total_amount) as A');
    $c->addSelectColumn(InvoicePeer::INVOICE_TOTAL_AMOUNT);
    $c->addSelectColumn(InvoicePeer::INVOICE_PAYMENT_DATE);
    $c->addSelectColumn(InvoicePeer::INVOICE_CLIENT_ID);
    $c->addSelectColumn(InvoicePeer::INVOICE_TAX_RATE);
    $c->addGroupByColumn(InvoicePeer::INVOICE_CLIENT_ID);
    $crit = $c->getNewCriterion(InvoicePeer::INVOICE_DATE, '2007-01-01 00:00:00', Criteria::GREATER_EQUAL);
    $crit2 = $c->getNewCriterion(InvoicePeer::INVOICE_DATE, '2007-01-01 00:00:00', Criteria::LESS_THAN);
    $crit->addAnd($crit2);
    $c->add($crit);
    $plot_criteria = serialize($c);
    $c = new Criteria();
    $c->add(GPlotPeer::ID, array(13,15), Criteria::IN);
    $plots = GPlotPeer::doSelect($c);
    foreach ($plots as $plot) {
      $plot->setPlotCriteria($plot_criteria);
      $plot->save();
    }
    // 8. Facturacion con IVA por fecha de facturacion
    $c = new Criteria();
    $c->addSelectColumn('SUM(invoice_total_amount*(100+invoice_tax_rate)/100) as A');
    $c->addSelectColumn(InvoicePeer::INVOICE_TOTAL_AMOUNT);
    $c->addSelectColumn(InvoicePeer::INVOICE_PAYMENT_DATE);
    $c->addSelectColumn(InvoicePeer::INVOICE_CLIENT_ID);
    $c->addSelectColumn(InvoicePeer::INVOICE_TAX_RATE);
    $c->addGroupByColumn(InvoicePeer::INVOICE_CLIENT_ID);
    $crit = $c->getNewCriterion(InvoicePeer::INVOICE_DATE, '2007-01-01 00:00:00', Criteria::GREATER_EQUAL);
    $crit2 = $c->getNewCriterion(InvoicePeer::INVOICE_DATE, '2007-01-01 00:00:00', Criteria::LESS_THAN);
    $crit->addAnd($crit2);
    $c->add($crit);
    $plot_criteria = serialize($c);
    $c = new Criteria();
    $c->add(GPlotPeer::ID, array(14), Criteria::IN);
    $plots = GPlotPeer::doSelect($c);
    foreach ($plots as $plot) {
      $plot->setPlotCriteria($plot_criteria);
      $plot->save();
    }
  }

  /**
   * executes expenses action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeExpenses()
  {
    sfConfig::set('sf_web_debug', false);

    //    In order to use fonts, you must define the location to your fonts:
    define('TTF_DIR', sfConfig::get('sf_data_dir') . '/fonts/');

    //------------------------------------------------------------------
    // Create some random data for the plot. We use the current time for the
    // first X-position
    //------------------------------------------------------------------
    $data = array(); $expenses = array();
    $categories = ExpenseCategoryPeer::doSelect(new Criteria());
    $total = 0;
    $year = date('Y');
    sfLoader::loadHelpers('Text');
    foreach ($categories as $cat) {
      $c = new Criteria();
      $c->addSelectColumn('SUM(expense_item_amount) as A');
      $c->addSelectColumn(ExpenseItemPeer::EXPENSE_PURCHASE_DATE);
      $c->addSelectColumn(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID);
      $c->addGroupByColumn(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID);
      $crit1 = $c->getNewCriterion(ExpenseItemPeer::EXPENSE_PURCHASE_DATE, $year . '-01-01 00:00:00', Criteria::GREATER_EQUAL);
      $crit1->addAnd($c->getNewCriterion(ExpenseItemPeer::EXPENSE_PURCHASE_DATE, ($year+1) . '-01-01 00:00:00', Criteria::LESS_THAN));
      $crit1->addAnd($c->getNewCriterion(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, $cat->getId()));
      $c->add($crit1);
      $rs = ExpenseItemPeer::doSelectRS($c);
      if ($rs->next()) {
        $expenses[] = $rs->getInt(1);
        $total += $rs->getInt(1);
      } else {
        $expenses[] = 0;
      }
      $leg[] = $cat->__toString();
    }
    $i = 0; $rest = 0;
    foreach ($expenses as $d) {
      if ($d/$total > 0.02) {
        $data[] = $d;
        $legends[] = utf8_decode(truncate_text($leg[$i], 33));
      } else {
        $rest += $d;
      }
      $i++;
    }
    $data[] = $rest;
    $legends[] = "Otros";
    //----------------------
    // Setup the line graph
    //----------------------
    $graph = new sfJpGraph('pie',250,500);
    $graph = $graph->getJpGraph();
    $graph->SetMargin(30,10,10,10);
    $graph->SetMarginColor('white');
    $graph->SetFrame(false);
    $graph->SetBox(true);
    $graph->SetShadow();
    $graph->img->SetAntiAliasing();
    $p1 = new PiePlot3D($data);
    $p1->SetSize(.37);
    $p1->SetCenter(0.51, .35);
    $p1->SetStartAngle(80);
    $p1->SetAngle(80);

    $p1->SetLegends($legends);
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("darkblue");
    $p1->SetLabelType(PIE_VALUE_PER);

    $a = array_search(max($data),$data); //Find the position of  maixum value.
    $p1->ExplodeSlice($a);
    $graph->Add($p1);

    // set legend details
    $graph->legend->Pos(0, 0.70, 'left');

    sfLoader::loadHelpers('I18N');
    $title = __('Expenses');
    $graph->title->Set($title);
    $graph->title->SetFont(FF_VERDANA, FS_BOLD, 13);

    $graph->Stroke();
    return sfView::NONE;
  }


  /**
   * executes showGraphic action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeShowGraphic() {
    if ($this->getRequestParameter('graphic_id') != -1) {
      $graphic = GraphicPeer::retrieveByPk($this->getRequestParameter('graphic_id'));
    } else {
      $c = new Criteria();
      $c->add(GraphicPeer::IS_DEFAULT, true);
      $graphic = GraphicPeer::doSelectOne($c);
    }
    $this->forward404Unless($graphic);
    sfConfig::set('sf_web_debug', false);

    //    In order to use fonts, you must define the location to your fonts:
    define('TTF_DIR', sfConfig::get('sf_data_dir') . '/fonts/');

    //------------------------------------------------------------------
    // Create some random data for the plot. We use the current time for the
    // first X-position
    //------------------------------------------------------------------
    $datay = array();
    $datax = array();
    $ymax=0;$ymin=0;
    $desplz_pos = -1;
    $ts = strtotime($graphic->getStartDate());
    $n = $graphic->getDataPoints(); // Number of data points
    $end = strtotime($graphic->getEndDate());
    $period =  round(($end - $ts)/3600/24/30,0); // Number of months
    $mult = ($end - $ts) / $n;  // Internal
    $c = new Criteria();
    $c->addJoin(GraphicPeer::ID, GraphicPlotPeer::GRAPHIC_ID);
    $c->addJoin(GPlotPeer::ID, GraphicPlotPeer::PLOT_ID);
    $c->add(GraphicPeer::ID, $this->getRequestParameter('graphic_id', 1));
    $plots = GPlotPeer::doSelect($c);
    for($i = 0; $i < $n; $i++ ) {
      $datax[0][$i] = $ts+$i*$mult;
      $datax[1][$i] = $ts+($i*$mult)-$mult/2.2; // Para n=12, div=3;;;; Para n=6, div=5;;; Para n=3, div=9;;; Para n=24, div=4
      foreach ($plots as $plot) {
        if ($plot->getPlotCriteria()) {
          if ($i == 0 && $plot->getPlotFunction() == '+') {
            $desplz_pos++;
          }
          $plot_criteria = unserialize($plot->getPlotCriteria());
          $plot_criteria->remove($plot->getPlotDateVariable());
          $start_date = $datax[0][$i];
          $end_date = $datax[0][$i] + $mult;
          $crit = $plot_criteria->getNewCriterion($plot->getPlotDateVariable(), date('Y-m-d H:i:s', $start_date), Criteria::GREATER_EQUAL);
          $crit2 = $plot_criteria->getNewCriterion($plot->getPlotDateVariable(), date('Y-m-d H:i:s', $end_date), Criteria::LESS_THAN);
          $crit->addAnd($crit2);
          $plot_criteria->add($crit);
          $rs = call_user_func(array($plot->getPlotClass() . 'Peer', 'doSelectRS'), $plot_criteria);
          $datay[$plot->getId()][$i] = 0;
          while($rs->next()) {
            $datay[$plot->getId()][$i] += ($plot->getPlotFunction() == '-') ? (-1*$rs->getInt(1)) : $rs->getInt(1);
          }
          if ($ymax < $datay[$plot->getId()][$i]) {
            $ymax = $datay[$plot->getId()][$i];
          }
          if ($ymin > $datay[$plot->getId()][$i]) {
            $ymin = $datay[$plot->getId()][$i];
          }
        }
      }
      $labelx[$i] = !fmod($i, 2) || true ? $i . "/" . strftime('%b', $datax[0][$i]) : '';
      $labelx2[$i] = $i;
    }

    // Now get labels at the start of each month
    $date = new DateScaleUtils();
    list($tickPositions,$minTickPositions) = $date->getTicks($datax[0],DSUTILS_MONTH1);

    // Now create the real graph
    // Combine a line and a bar graph

    // We add some grace to the end of the X-axis scale so that the first and last
    // data point isn't exactly at the very end or beginning of the scale
    $grace = $mult/2;
    $xmin = $datax[0][0]-$grace;
    $xmax = $datax[0][$n-1]+$grace;

    // Overall width of graphs
    $w = 800;

    //----------------------
    // Setup the line graph
    //----------------------
    $graph = new sfJpGraph('graph',$w,500);
    $graph = $graph->getJpGraph();
    $graph->SetScale('intint',0,0,$xmin,$xmax);
    $graph->SetMarginColor('lightyellow@0.8');
    $graph->SetFrame(true,'gray:0.5',4);
    $graph->SetMargin($this->lm,$this->rm,20,20);
    $graph->SetBox(true, 'gray', 2);
    $graph->img->SetAntiAliasing();
    $graph->xaxis->SetTickPositions($tickPositions,$minTickPositions);
    $graph->xaxis->SetLabelFormatString('My',true);
    $graph->xaxis->SetLabelMargin(5);
    $graph->xgrid->Show();
    $graph->setBackgroundImage("images/aranova_watermark.jpg");
    $desplz = 0;
    foreach ($plots as $plot) {
      if ($plot->getPlotAccFunction()) {
        $plot_acc = $plot->getPlotAccFunction();
        if (preg_match_all('/PLOT_([0-9]*)/', $plot_acc, $pls) > 1) {
          $acc = strpos($plot_acc, "ACC") !== false ? true : false;
          for ($i=0;$i<count($datay[$pls[1][0]]);$i++) {
            if ($acc && $i>0) {
              $data[$i] = $data[$i-1];
            } else {
              $data[$i] = 0;
            }
            foreach ($pls[1] as $pl) {
              $data[$i] += $datay[$pl][$i];
            }
          }
        } else {
          $data = $datay[$plot->getId()];
        }
        $plottype = $plot->getPlotType();
        if ($plottype == 'LinePlot') {
          $data = array_merge(array(0), $data);
          $datax[$desplz][] = $ts+$n*$mult-$mult*0.5;
        }
        if ($plottype == 'BarPlot' && !isset($gbplot)) {
          $gbplot = array();
          $p1 = new $plottype($data,$datax[$desplz]);
        } else {
          $p1 = new $plottype($data,$datax[$desplz]);
          if ($plot->getPlotFunction() == '+' && $desplz < $desplz_pos && $desplz < count ($datax)) {
            $desplz++;
          }
        }
        if ($plottype == 'BarPlot') {
          $p1->SetFillGradient($plot->getPlotColor(),"white",GRAD_LEFT_REFLECTION);
          $p1->SetWidth(abs(35-$n));
          $p1->value->Show();
          if ($plot->getPlotFunction() == '+') {
            $p1->value->SetAngle(45);
          } else {
            $p1->value->SetAngle(-45);
          }
        } else {
          $p1->mark->SetType(MARK_CIRCLE);
          $p1->SetWeight(3);

          //$p1->SetBarCenter();
          //$p1->SetCenter();
          $p1->SetFillColor($plot->getPlotColor() . '@0.95');
          //$p1->value->Show();
          //$p1->value->SetAngle(0);
          //$p1->value->SetAlign('left');
        }
        $p1->value->SetColor($plot->getPlotColor());
        if ($plot->getPlotCallback()) {
          $p1->value->SetFormatCallback($plot->getPlotCallback());
        }
        $p1->value->SetFont(FF_ARIAL,FS_BOLD,10);
        $p1->SetLegend($plot->getPlotName());
        $gbplot[] = $p1;
        $graph->Add($p1);
      }
    }
    if (isset($gbplot)) {
      //print_r($gbplot);die();
      $group = new GroupBarPlot($gbplot);
      //$graph->Add($group);
    }
    // set legend details
    $graph->legend->SetLayout(LEGEND_HOR);
    $graph->legend->Pos(0.75, 0.1, 'center');

    $graph->Stroke();
    return sfView::NONE;
  }

}

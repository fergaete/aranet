<?php

pake_desc('build and install ARANet');
pake_task('install-aranet', 'project_exists', 'clear-cache', 'fix-perms', 'propel-build-model', 'propel-build-sql', 'propel-insert-sql');

function run_install_aranet($task, $args)
{
  $args = array();
  $args[] = 'frontend';
  run_propel_load_data($task, $args);
  $databaseManager = new sfDatabaseManager();
  $databaseManager->initialize();
  /* Associate plots with graphics */
  $c = new Criteria();
  $c->add(GraphicPeer::GRAPHIC_NAME, '%Balance%', Criteria::NOT_LIKE);
  $graphics = GraphicPeer::doSelect($c);
  for ($i=0;$i<count($graphics);$i++) {
    _executeQuery("INSERT INTO `aranet_graphic_plot` (`graphic_id`, `plot_id`) VALUES(".$graphics[$i]->getId().",2)");
    _executeQuery("INSERT INTO `aranet_graphic_plot` (`graphic_id`, `plot_id`) VALUES(".$graphics[$i]->getId().",5)");
    _executeQuery("INSERT INTO `aranet_graphic_plot` (`graphic_id`, `plot_id`) VALUES(".$graphics[$i]->getId().",10)");
    _executeQuery("INSERT INTO `aranet_graphic_plot` (`graphic_id`, `plot_id`) VALUES(".$graphics[$i]->getId().",12)");
  }
  // Para el balance usar otros plots
  $c = new Criteria();
  $c->add(GraphicPeer::GRAPHIC_NAME, '%Balance%', Criteria::LIKE);
  $graphics = GraphicPeer::doSelect($c);
  for ($i=0;$i<count($graphics);$i++) {
    _executeQuery("INSERT INTO `aranet_graphic_plot` (`graphic_id`, `plot_id`) VALUES(".$graphics[$i]->getId().",1)");
    _executeQuery("INSERT INTO `aranet_graphic_plot` (`graphic_id`, `plot_id`) VALUES(".$graphics[$i]->getId().",4)");
    _executeQuery("INSERT INTO `aranet_graphic_plot` (`graphic_id`, `plot_id`) VALUES(".$graphics[$i]->getId().",15)");
    _executeQuery("INSERT INTO `aranet_graphic_plot` (`graphic_id`, `plot_id`) VALUES(".$graphics[$i]->getId().",16)");
  }
  _saveCriteriaPlots();
  $migrator = new sfMigrator();
  $currentVersion = $migrator->getCurrentVersion();
  _executeQuery("UPDATE `schema_info` SET `version` = '".(int)$migrator->getMaxVersion()."'");
  _executeQuery("UPDATE `sf_setting` SET `value` = '0.9.".(int)$migrator->getMaxVersion()."' WHERE NAME='VERSION'");
  $currentVersion = $migrator->getCurrentVersion();
  sfSettingsTools::clearCache();
  pake_echo_action("install_aranet", "installed schema version " . $currentVersion);
}


function _executeQuery($sql, $fetchmode = null)
{
  $connection = Propel::getConnection();

  if (version_compare(Propel::VERSION, "1.3.x", ">="))
  {
    $stmt = $connection->prepare($sql);
    $stmt->execute();

    return $stmt;
  }
  else
  {
    return $connection->executeQuery($sql, $fetchmode);
  }
}

function _saveCriteriaPlots() {
  // Guardar los criteria
  // 1. Gastos sin IVA (eliminar impuestos mod 300)
  $c = new Criteria();
  $c->addSelectColumn('SUM(expense_item_amount) as A');
  $c->addSelectColumn(ExpenseItemPeer::EXPENSE_ITEM_AMOUNT);
  $c->addSelectColumn(ExpenseItemPeer::EXPENSE_PURCHASE_DATE);
  //$c1 = $c->getNewCriterion(ExpenseItemPeer::EXPENSE_ITEM_NAME, 'I.V.A. Mod. 300', Criteria::NOT_EQUAL);
  //$c2 = $c->getNewCriterion(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, 16, Criteria::NOT_EQUAL);
  //$c1->addOr($c2);
  //$c->addAnd($c1);
  $c->add(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, 16, Criteria::NOT_EQUAL);
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

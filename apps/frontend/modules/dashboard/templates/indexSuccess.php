<?php use_helper('Javascript', 'Date', 'Number', 'NumberExtended', 'Object') ?>
<?php if_javascript(); ?>
<?php use_helper('nifty') ?>
<?php end_if_javascript(); ?>
<div id="dashboardDisplay" class="windowFrame">
<table>
  <tr>
    <td style="width:100%;text-align:center;">
    <?php echo form_tag('mainGraphic'),
        select_tag('graphic', objects_for_select(
            GraphicPeer::doSelect(new Criteria()),
            'getId',
            '__toString',
            $graphic_id), array('style' => 'font-size:14px;font-weight:700')),
        observe_field('graphic', array(
            'update'   => 'first-graph',
            'url'      => '@show_graphic?graphic_id=1',
            'with'     => "'graphic_id=' + value",
            )) ?>
        </form>
        <div id="first-graph">
            <img src="/dashboard/showGraphic?graphic_id=<?php echo $graphic_id ?>" alt="" style="width:100%" />
        </div>
    </td>
    <td style="vertical-align:top;">
        <div id="second-graph">
            <img src="/dashboard/expenses" alt="Expenses percent"/>
        </div>
    </td>
  </tr>
</table>
</div>

<?php slot('sidebar') ?>
<div class="module-invoices module">
  <h2><?php echo __('Pending invoices') ?></h2>
  <div class="module-content">
    <table class="gridTable">
      <tr>
        <th><?php echo __('Invoice') ?></th>
        <th><?php echo __('Date') ?></th>
        <th><?php echo __('Amount') ?></th>
      </tr>
<?php $total = 0; foreach ($pending_invoices as $invoice) : $total += $invoice->getInvoiceTotalAmount(); ?>
<?php
$style = 'color:#000;'; $date = '';
if ($invoice->getInvoicePaymentConditionId()) {
    $days = $invoice->getPaymentCondition()->getPaymentConditionDays();
    if ($invoice->getPaymentCondition()->getPaymentConditionPaymentDay() != -1) {
        $days += $invoice->getPaymentCondition()->getPaymentConditionPaymentDay();
    }
    if ($days > 1) {
        $style = (time() - strtotime($invoice->getInvoiceDate())) / (3600 * 24) > $days ? 'color:#f11 !important;' : 'color:#000;';
        $date = ($style == 'color:#000;') ? ' (' : ' (+';
        $date .= round((time() - strtotime($invoice->getInvoiceDate())) / (3600 * 24) - $days) . ')';
    }

}

?>
<?php $link_style = ''; if ($style != 'color:#000;')
  $link_style = 'style="color:#f11;"';
?>

      <tr>
          <td style="<?php echo $style ?>text-align:left;vertical-align:middle;"><strong><?php echo link_to($invoice, '/invoice/show?id=' . $invoice->getId(), $link_style) ?></strong></td>
          <td style="<?php echo $style ?>text-align:center;vertical-align:middle;"><?php echo format_date($invoice->getInvoiceDate()) . $date ?></td>
          <td style="<?php echo $style ?>text-align:right;vertical-align:middle;"><?php echo format_currency($invoice->getInvoiceTotalAmount(), 'EUR') ?></td>
      </tr>
<?php endforeach ?>
      <tr>
          <td colspan="2" class="total"><?php echo __('TOTAL') ?></td>
          <td class="total"><?php echo format_currency($total, 'EUR') ?></td>
      </tr>
    </table>
  </div>
  <div class="module-footer">
  </div>
</div>

<div class="module-invoices module">
  <h2><?php echo __('Next incomes') ?></h2>
  <div class="module-content">
    <table class="gridTable">
      <tr>
        <th><?php echo __('Client') ?></th>
        <th><?php echo __('Date') ?></th>
        <th><?php echo __('Amount') ?></th>
      </tr>
<?php $total = 0; foreach ($next_invoices as $invoice) : $total += $invoice->getInvoiceTotalAmount(); ?>
      <tr>
          <td class="text title"><?php echo link_to($invoice->getClient(), '@client_show_by_id?id=' . $invoice->getInvoiceClientId()) ?></td>
          <td class="text"><?php echo format_date($invoice->getInvoiceDate()) ?></td>
          <td class="currency"><?php echo format_currency($invoice->getInvoiceTotalAmount(), 'EUR') ?></td>
      </tr>
<?php endforeach ?>
      <tr>
          <td colspan="2" class="total"><?php echo __('TOTAL') ?></td>
          <td class="total"><?php echo format_currency($total, 'EUR') ?></td>
      </tr>
    </table>
  </div>
  <div class="module-footer">
  </div>
</div>
<?php end_slot('sidebar') ?>

<table style="width:100%">
    <tr>
<!--
      <td style="width:40%">
<div class="module-best-clients module">
  <h2><?php echo __('Best clients') ?></h2>
  <div class="module-content">
    <table class="gridTable">
      <tr>
        <th><?php echo __('Client') ?></th>
        <th><?php echo __('Amount') ?></th>
        <th><?php echo __('Margin') ?></th>
      </tr>
<?php foreach ($clients as $client) : ?>
      <tr>
          <td class="text title"><?php echo link_to($client, '@client_show_by_id?id=' . $client->getId()) ?></td>
          <td class="currency"><?php echo format_indicator($client->getIndicator('total-amount-solt')) ?></td>
          <td class="currency"><?php //echo format_percent($client->getClientAverageMargin()) ?></td>
      </tr>
<?php endforeach ?>
    </table>
  </div>
  <div class="module-footer">
  </div>
</div>
</td>
-->
<td style="vertical-align:top;">
  <div class="module-active-budgets module">
      <h2><?php echo __('Approved budgets (in execution)') ?></h2>
    <?php include_partial('budget_list', array('budgets' => $approved_budgets)) ?>
  </div>
  <div class="module-active-budgets module">
      <h2><?php echo __('Active budgets') ?></h2>
    <?php include_partial('budget_list', array('budgets' => $active_budgets)) ?>
  </div>
  <div class="module-active-budgets module">
      <h2><?php echo __('Last caducated budgets') ?></h2>
    <?php include_partial('cad_budget_list', array('budgets' => $last_caducated_budgets)) ?>
  </div>
</td>
</tr>
</table>
<?php if_javascript(); ?>
<?php echo javascript_tag(nifty_round_elements( "div.module-active-budgets h2.module-header", "top")) ?>
<?php echo javascript_tag(nifty_round_elements( "div.module-best-clients h2.module-header", "top")) ?>
<?php end_if_javascript(); ?>

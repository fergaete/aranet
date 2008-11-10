<?php

class Migration008 extends sfMigration {
  public function up() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("ALTER TABLE `aranet_budget` ADD COLUMN `budget_total_cost` DOUBLE default 0 AFTER `budget_status_id`");
    $this->executeSQL("ALTER TABLE `aranet_budget_item` ADD COLUMN `item_margin` DOUBLE default 0 AFTER `item_cost`");
    $this->executeSQL("ALTER TABLE `aranet_budget_item` ADD COLUMN `item_retail_price` DOUBLE default 0 AFTER `item_margin`");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
    $budget_items = BudgetItemPeer::doSelect(new Criteria());
    foreach ($budget_items as $budget_item) {
        $budget_item->setItemRetailPrice($budget_item->getItemCost());
        $budget_item->save();
    }
  }

  public function down() 
  {
    $this->executeSQL("ALTER TABLE `aranet_budget` DROP COLUMN `budget_total_cost`");
    $this->executeSQL("ALTER TABLE `aranet_budget_item` DROP COLUMN `item_margin`");
    $this->executeSQL("ALTER TABLE `aranet_budget_item` DROP COLUMN `item_retail_price`");
  }
}

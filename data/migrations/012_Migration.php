<?php

class Migration012 extends sfMigration {
  public function up() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("ALTER TABLE `aranet_budget_item` CHANGE `item_description` `item_description` TEXT NULL DEFAULT NULL");
    $this->executeSQL("ALTER TABLE `aranet_budget_item` ADD COLUMN `item_order` INTEGER NOT NULL AFTER `id`");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }

  public function down() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("ALTER TABLE `aranet_budget_item` CHANGE COLUMN `item_description` VARCHAR(255)");
    $this->executeSQL("ALTER TABLE `aranet_budget_item` DROP COLUMN `item_order`");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }
}

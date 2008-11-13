<?php

class Migration004 extends sfMigration {
  public function up() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("ALTER TABLE `aranet_invoice` DROP COLUMN `invoice_category_id`");
    $this->executeSQL("ALTER TABLE `aranet_budget` DROP COLUMN `budget_category_id`");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }

  public function down() 
  {
    $this->executeSQL("ALTER TABLE `aranet_invoice` ADD COLUMN `invoice_category_id`");
    $this->executeSQL("ALTER TABLE `aranet_budget` ADD COLUMN `budget_category_id`");
    $this->executeSQL("ALTER TABLE `aranet_invoice` ADD CONSTRAINT 
        FOREIGN KEY `invoice_category_id_idx` (`invoice_category_id`)
        REFERENCES `aranet_invoice_category` (`id`)");
    $this->executeSQL("ALTER TABLE `aranet_budget` ADD CONSTRAINT 
        FOREIGN KEY `budget_category_id_idx` (`budget_category_id`)
        REFERENCES `budget_category_id` (`id`)");
  }
}

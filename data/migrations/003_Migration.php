<?php

class Migration003 extends sfMigration {
  public function up() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("CREATE TABLE `aranet_budget_item`
    (
        `id` INTEGER  NOT NULL AUTO_INCREMENT,
        `item_type_id` INTEGER,
        `item_description` VARCHAR(255),
        `item_quantity` FLOAT default 0,
        `milestone_task_id` INTEGER default null,
        `item_task_id` INTEGER default null,
        `item_cost` DOUBLE default 0,
        `item_tax_rate` FLOAT default 0,
        `item_budget_id` INTEGER,
        `item_budget_type_id` INTEGER,
        PRIMARY KEY (`id`),
        KEY `item_type_id_idx2`(`item_type_id`),
        KEY `item_budget_id_idx2`(`item_budget_id`),
        INDEX `FI_m_budget_type_id_idx` (`item_budget_type_id`),
        CONSTRAINT `item_budget_id_idx`
            FOREIGN KEY (`item_budget_id`)
            REFERENCES `aranet_budget` (`id`)
            ON DELETE CASCADE
    )Type=InnoDB;");
    $this->executeSQL("ALTER TABLE `aranet_budget_item` ADD CONSTRAINT
        FOREIGN KEY `item_budget_type_id_idx` (`item_budget_type_id`)
        REFERENCES `aranet_type_of_hour` (`id`)");
    $this->executeSQL("ALTER TABLE `aranet_budget_item` ADD CONSTRAINT
        FOREIGN KEY `item_type_id_idx` (`item_type_id`)
        REFERENCES `aranet_type_of_invoice_item` (`id`)");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }

  public function down() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("DROP TABLE IF EXISTS `aranet_budget_item`;");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }
}

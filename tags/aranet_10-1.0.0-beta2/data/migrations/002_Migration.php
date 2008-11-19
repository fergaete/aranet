<?php

class Migration002 extends sfMigration {
  public function up() 
  {
    $this->executeSQL("ALTER TABLE `aranet_project` ADD COLUMN `project_prefix` VARCHAR(8) AFTER `project_name`");
    $this->executeSQL("ALTER TABLE `aranet_project` ADD COLUMN `project_number` VARCHAR(11) AFTER `project_name`");
    $this->executeSQL("ALTER TABLE `aranet_project` ADD UNIQUE KEY `project_fulltitle_idx` (`project_prefix`, `project_number`)");
    $this->executeSQL("ALTER TABLE `aranet_project` ADD KEY `project_number_idx`(`project_number`)");
    $this->executeSQL("ALTER TABLE `aranet_timesheet` ADD COLUMN `timesheet_budget_id` INTEGER default null AFTER `timesheet_milestone_id`");
    $this->executeSQL("ALTER TABLE `aranet_timesheet` ADD INDEX `FI_esheet_budget_id_idx` (`timesheet_budget_id`)");
    $this->executeSQL("ALTER TABLE `aranet_timesheet` ADD CONSTRAINT
        FOREIGN KEY `FI_esheet_budget_id_idx2` (`timesheet_budget_id`)
        REFERENCES `aranet_budget` (`id`)");
    $this->executeSQL("ALTER TABLE `aranet_project_milestone` ADD COLUMN `milestone_budget_id` INTEGER default null AFTER `created_at`");
    $this->executeSQL("ALTER TABLE `aranet_project_milestone` ADD INDEX `FI_estone_budget_id_idx` (`milestone_budget_id`)");
    $this->executeSQL("ALTER TABLE `aranet_project_milestone` ADD CONSTRAINT
        FOREIGN KEY `FI_estone_budget_id_idx2` (`milestone_budget_id`)
        REFERENCES `aranet_budget` (`id`)");
    $this->executeSQL("ALTER TABLE `aranet_project_task` ADD COLUMN `task_budget_id` INTEGER default null AFTER `created_at`");
    $this->executeSQL("ALTER TABLE `aranet_project_task` ADD INDEX `FI_k_budget_id_idx` (`task_budget_id`)");
    $this->executeSQL("ALTER TABLE `aranet_project_task` ADD CONSTRAINT 
        FOREIGN KEY `FI_k_budget_id_idx2` (`task_budget_id`)
        REFERENCES `aranet_budget` (`id`)");
    $this->executeSQL("ALTER TABLE `aranet_invoice` ADD COLUMN `invoice_budget_id` INTEGER default null AFTER `invoice_category_id`");
    //$this->executeSQL("ALTER TABLE `aranet_invoice` ADD UNIQUE KEY `invoice_number_idx2` (`invoice_number`)");
    $this->executeSQL("ALTER TABLE `aranet_invoice` ADD INDEX `FI_k_budget_id_idx` (`invoice_budget_id`)");
    $this->executeSQL("ALTER TABLE `aranet_invoice` ADD CONSTRAINT 
        FOREIGN KEY `FI_k_budget_id_idx2` (`invoice_budget_id`)
        REFERENCES `aranet_budget` (`id`)");
    $this->executeSQL("ALTER TABLE `aranet_budget` ADD COLUMN `budget_revision` INTEGER DEFAULT NULL AFTER `budget_date`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` ADD COLUMN `expense_item_budget_id` INTEGER default null AFTER `expense_item_amount`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` ADD INDEX `FI_ense_item_budget_id_idx` (`expense_item_budget_id`)");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` ADD CONSTRAINT 
        FOREIGN KEY `FI_ense_item_budget_id_idx2` (`expense_item_budget_id`)
        REFERENCES `aranet_budget` (`id`)");
  }

  public function down() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("ALTER TABLE `aranet_project` DROP COLUMN `project_prefix`");
    $this->executeSQL("ALTER TABLE `aranet_project` DROP COLUMN `project_number`");
    //$this->executeSQL("ALTER TABLE `aranet_project` DROP KEY `project_fulltitle_idx`");
    //$this->executeSQL("ALTER TABLE `aranet_project` DROP KEY `project_number_idx`");
    //$this->executeSQL("ALTER TABLE `aranet_timesheet` DROP INDEX `FI_esheet_budget_id_idx`");
    //$this->executeSQL("ALTER TABLE `aranet_timesheet` DROP FOREIGN KEY `FI_esheet_budget_id_idx2`");
    $this->executeSQL("ALTER TABLE `aranet_project_milestone` DROP COLUMN `milestone_budget_id`");
    //$this->executeSQL("ALTER TABLE `aranet_project_milestone` DROP INDEX `FI_estone_budget_id_idx`");
    //$this->executeSQL("ALTER TABLE `aranet_project_milestone` DROP FOREIGN KEY `FI_estone_budget_id_idx2`");
    $this->executeSQL("ALTER TABLE `aranet_project_task` DROP COLUMN `task_budget_id`");
    //$this->executeSQL("ALTER TABLE `aranet_project_task` DROP INDEX `FI_k_budget_id_idx`");
    //$this->executeSQL("ALTER TABLE `aranet_project_task` DROP FOREIGN KEY `FI_k_budget_id_idx2`");
    $this->executeSQL("ALTER TABLE `aranet_invoice` DROP COLUMN `invoice_budget_id`");
    //$this->executeSQL("ALTER TABLE `aranet_invoice` DROP KEY `invoice_number_idx2`");
    //$this->executeSQL("ALTER TABLE `aranet_invoice` DROP INDEX `FI_k_budget_id_idx`");
    //$this->executeSQL("ALTER TABLE `aranet_invoice` DROP FOREIGN KEY `FI_k_budget_id_idx2`");
    $this->executeSQL("ALTER TABLE `aranet_budget` DROP COLUMN `budget_revision`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` DROP COLUMN `expense_item_budget_id`");
    //$this->executeSQL("ALTER TABLE `aranet_expense_item` DROP INDEX `FI_ense_item_budget_id_idx`");
    //$this->executeSQL("ALTER TABLE `aranet_expense_item` DROP FOREIGN KEY `FI_ense_item_budget_id_idx2`");
    $this->executeSQL("ALTER TABLE `aranet_timesheet` DROP COLUMN `timesheet_budget_id`");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }
}

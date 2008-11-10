<?php

class Migration005 extends sfMigration {
  public function up() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("ALTER TABLE `aranet_budget` ADD COLUMN `budget_total_expenses` DOUBLE DEFAULT 0 AFTER `budget_total_amount`");
    $this->executeSQL("ALTER TABLE `aranet_budget_item` ADD COLUMN `item_is_optional` INTEGER(1) DEFAULT 0 AFTER `item_type_id`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` ADD COLUMN `expense_item_base` DOUBLE DEFAULT 0 AFTER `expense_item_amount`");
    $this->executeSQL("ALTER TABLE `aranet_project` ADD COLUMN `project_total_incomes` DOUBLE DEFAULT 0 AFTER `project_total_invoices`");
    $this->executeSQL("ALTER TABLE `aranet_vendor` ADD COLUMN `vendor_total_incomes` DOUBLE DEFAULT 0 AFTER `vendor_total_amount`");
    $this->executeSQL("ALTER TABLE `aranet_timesheet` ADD COLUMN `timesheet_date` DATE AFTER `timesheet_type_id`");
    $this->executeSQL("CREATE TABLE `aranet_income_category`
        (
            `id` INTEGER  NOT NULL AUTO_INCREMENT,
            `category_title` VARCHAR(64),
            PRIMARY KEY (`id`),
            KEY `category_title_idx`(`category_title`)
        )Type=InnoDB;");
    $this->executeSQL("CREATE TABLE `aranet_income_item`
        (
            `id` INTEGER  NOT NULL AUTO_INCREMENT,
            `income_item_name` VARCHAR(128)  NOT NULL,
            `income_item_comments` TEXT,
            `income_date` DATE  NOT NULL,
            `income_item_category_id` INTEGER,
            `income_item_payment_method_id` INTEGER,
            `income_item_payment_check` VARCHAR(64),
            `income_item_reimbursement_id` INTEGER,
            `income_item_project_id` INTEGER default null,
            `income_item_budget_id` INTEGER default null,
            `income_item_amount` DOUBLE default 0 NOT NULL,
            `income_item_base` DOUBLE default 0,
            `income_item_tax_rate` FLOAT default 0,
            `income_item_irpf` DOUBLE default 0,
            `income_item_invoice_number` VARCHAR(128),
            `income_item_vendor_id` INTEGER,
            PRIMARY KEY (`id`),
            KEY `income_item_project_id_idx2`(`income_item_project_id`),
            KEY `income_item_vendor_id_idx2`(`income_item_vendor_id`),
            KEY `income_item_name_idx`(`income_item_name`),
            INDEX `FI_ome_item_category_id_idx` (`income_item_category_id`),
            CONSTRAINT `income_item_category_id_idx`
                FOREIGN KEY (`income_item_category_id`)
                REFERENCES `aranet_income_category` (`id`),
            INDEX `FI_ome_item_payment_method_id_idx` (`income_item_payment_method_id`),
            CONSTRAINT `income_item_payment_method_id_idx`
                FOREIGN KEY (`income_item_payment_method_id`)
                REFERENCES `aranet_payment_method` (`id`),
            INDEX `FI_ome_item_reimbursement_id_idx` (`income_item_reimbursement_id`),
            CONSTRAINT `income_item_reimbursement_id_idx`
                FOREIGN KEY (`income_item_reimbursement_id`)
                REFERENCES `aranet_reimbursement` (`id`),
            CONSTRAINT `income_item_project_id_idx`
                FOREIGN KEY (`income_item_project_id`)
                REFERENCES `aranet_project` (`id`)
                ON DELETE CASCADE,
            INDEX `FI_ome_item_budget_id_idx` (`income_item_budget_id`),
            CONSTRAINT `income_item_budget_id_idx`
                FOREIGN KEY (`income_item_budget_id`)
                REFERENCES `aranet_budget` (`id`),
            CONSTRAINT `income_item_vendor_id_idx`
                FOREIGN KEY (`income_item_vendor_id`)
                REFERENCES `aranet_vendor` (`id`)
        )Type=InnoDB;");
    $this->executeSQL("CREATE TABLE `aranet_cash_item`
        (
            `id` INTEGER  NOT NULL AUTO_INCREMENT,
            `cash_item_name` VARCHAR(128)  NOT NULL,
            `cash_item_comments` TEXT,
            `cash_item_date` DATE  NOT NULL,
            `cash_item_amount` DOUBLE default 0 NOT NULL,
            PRIMARY KEY (`id`),
            KEY `cash_item_name_idx`(`cash_item_name`)
        )Type=InnoDB;");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }

  public function down() 
  {
    $this->executeSQL("ALTER TABLE `aranet_budget` DROP COLUMN `budget_total_expenses`");
    $this->executeSQL("ALTER TABLE `aranet_budget_item` DROP COLUMN `item_is_optional`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` DROP COLUMN `expense_item_base`");
    $this->executeSQL("ALTER TABLE `aranet_project` DROP COLUMN `project_total_incomes`");
    $this->executeSQL("ALTER TABLE `aranet_vendor` DROP COLUMN `vendor_total_incomes`");
    $this->executeSQL("ALTER TABLE `aranet_timesheet` DROP COLUMN `timesheet_date`");
    $this->executeSQL("DROP TABLE IF EXISTS `aranet_cash_item`;");
    $this->executeSQL("DROP TABLE IF EXISTS `aranet_income_item`;");
    $this->executeSQL("DROP TABLE IF EXISTS `aranet_income_category`;");
  }
}

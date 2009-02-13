<?php

class Migration011 extends sfMigration {
  public function up() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("ALTER TABLE `aranet_budget` ADD COLUMN `budget_total_incomes` DOUBLE DEFAULT 0 AFTER `budget_total_expenses`");
    $this->executeSQL("ALTER TABLE `aranet_budget` ADD COLUMN `budget_valid_date` DATE NOT NULL AFTER `budget_date`");
    $this->executeSQL("ALTER TABLE `aranet_budget` ADD COLUMN `budget_approved_date` DATE DEFAULT NULL AFTER `budget_valid_date`");
    $this->executeSQL("ALTER TABLE `aranet_project` ADD COLUMN `project_total_budgets` DOUBLE DEFAULT 0 AFTER `project_total_incomes`");
    $this->executeSQL("ALTER TABLE `aranet_project` ADD COLUMN `project_active_budgets` DOUBLE DEFAULT 0 AFTER `project_total_budgets`");
    $this->executeSQL("ALTER TABLE `aranet_project` ADD COLUMN `project_approved_budgets` DOUBLE DEFAULT 0 AFTER `project_active_budgets`");
    $this->executeSQL("ALTER TABLE `aranet_client` ADD COLUMN `client_total_budgets` DOUBLE DEFAULT 0 AFTER `client_nb_projects`");
    $this->executeSQL("ALTER TABLE `aranet_client` ADD COLUMN `client_active_budgets` DOUBLE DEFAULT 0 AFTER `client_total_budgets`");
    $this->executeSQL("ALTER TABLE `aranet_client` ADD COLUMN `client_approved_budgets` DOUBLE DEFAULT 0 AFTER `client_active_budgets`");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }

  public function down() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("ALTER TABLE `aranet_budget` DROP COLUMN `budget_total_incomes`");
    $this->executeSQL("ALTER TABLE `aranet_budget` DROP COLUMN `budget_valid_date`");
    $this->executeSQL("ALTER TABLE `aranet_budget` DROP COLUMN `budget_approved_date`");
    $this->executeSQL("ALTER TABLE `aranet_project` DROP COLUMN `project_total_budgets`");
    $this->executeSQL("ALTER TABLE `aranet_project` DROP COLUMN `project_active_budgets`");
    $this->executeSQL("ALTER TABLE `aranet_project` DROP COLUMN `project_approved_budgets`");
    $this->executeSQL("ALTER TABLE `aranet_client` DROP COLUMN `client_total_budgets`");
    $this->executeSQL("ALTER TABLE `aranet_client` DROP COLUMN `client_active_budgets`");
    $this->executeSQL("ALTER TABLE `aranet_client` DROP COLUMN `client_approved_budgets`");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }
}

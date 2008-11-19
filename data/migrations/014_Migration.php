<?php

class Migration014 extends sfMigration {
  public function up() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
	$this->executeSQL("ALTER TABLE `aranet_budget` CHANGE `created_by`  `created_by` INT NULL");
    $this->executeSQL("ALTER TABLE `aranet_budget` ADD INDEX `aranet_budget_FI_3` (`created_by`)");
    $this->executeSQL("ALTER TABLE `aranet_budget` ADD CONSTRAINT `aranet_budget_FK_3`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user_profile` (`user_id`)");
	$this->executeSQL("ALTER TABLE `aranet_invoice` CHANGE `created_by`  `created_by` INT NULL");
    $this->executeSQL("ALTER TABLE `aranet_invoice` ADD INDEX `aranet_invoice_FI_3` (`created_by`)");
    $this->executeSQL("ALTER TABLE `aranet_invoice` ADD CONSTRAINT `aranet_invoice_FK_3`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user_profile` (`user_id`)");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }

  public function down() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("ALTER TABLE `aranet_invoice` DROP INDEX `aranet_invoice_FI_3`");
    $this->executeSQL("ALTER TABLE `aranet_budget` DROP INDEX `aranet_budget_FI_3`");
    $this->executeSQL("ALTER TABLE `aranet_budget` CHANGE `created_by`  `created_by` VARCHAR(255)");
    $this->executeSQL("ALTER TABLE `aranet_invoice` CHANGE `created_by`  `created_by` VARCHAR(255)");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }
}

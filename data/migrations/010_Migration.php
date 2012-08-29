<?php

class Migration010 extends sfMigration {
  public function up() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("ALTER TABLE `aranet_cash_item` ADD COLUMN `created_at` DATETIME AFTER `cash_item_amount`");
    $this->executeSQL("ALTER TABLE `aranet_cash_item` ADD COLUMN `created_by` INTEGER DEFAULT NULL AFTER `created_at`");
    $this->executeSQL("ALTER TABLE `aranet_cash_item` ADD COLUMN `updated_at` DATETIME AFTER `created_by`");
    $this->executeSQL("ALTER TABLE `aranet_cash_item` ADD COLUMN `updated_by` INTEGER DEFAULT NULL AFTER `updated_at`");
    $this->executeSQL("ALTER TABLE `aranet_cash_item` ADD COLUMN `deleted_at` DATETIME AFTER `updated_by`");
    $this->executeSQL("ALTER TABLE `aranet_cash_item` ADD COLUMN `deleted_by` INTEGER DEFAULT NULL AFTER `deleted_at`");
    $this->executeSQL("ALTER TABLE `aranet_cash_item` ADD INDEX `aranet_cash_item_FI_3` (`created_by`)");
    $this->executeSQL("ALTER TABLE `aranet_cash_item` ADD CONSTRAINT `aranet_cash_item_FK_3`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user_profile` (`user_id`)");
    $this->executeSQL("ALTER TABLE `aranet_cash_item` ADD INDEX `aranet_cash_item_FI_4` (`updated_by`)");
    $this->executeSQL("ALTER TABLE `aranet_cash_item` ADD CONSTRAINT `aranet_cash_item_FK_4`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user_profile` (`user_id`)");
    $this->executeSQL("ALTER TABLE `aranet_cash_item` ADD INDEX `aranet_cash_item_FI_5` (`deleted_by`)");
    $this->executeSQL("ALTER TABLE `aranet_cash_item` ADD CONSTRAINT `aranet_cash_item_FK_5`
		FOREIGN KEY (`deleted_by`)
		REFERENCES `sf_guard_user_profile` (`user_id`)");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }

  public function down() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("ALTER TABLE `aranet_cash_item` DROP INDEX `aranet_cash_item_FI_3`");
    $this->executeSQL("ALTER TABLE `aranet_cash_item` DROP INDEX `aranet_cash_item_FI_4`");
    $this->executeSQL("ALTER TABLE `aranet_cash_item` DROP INDEX `aranet_cash_item_FI_5`");
    $this->executeSQL("ALTER TABLE `aranet_cash_item` DROP FOREIGN KEY `aranet_cash_item_FK_3`");
    $this->executeSQL("ALTER TABLE `aranet_cash_item` DROP FOREIGN KEY `aranet_cash_item_FK_4`");
    $this->executeSQL("ALTER TABLE `aranet_cash_item` DROP FOREIGN KEY `aranet_cash_item_FK_5`");
    $this->executeSQL("ALTER TABLE `aranet_cash_item` DROP COLUMN `created_at`");
    $this->executeSQL("ALTER TABLE `aranet_cash_item` DROP COLUMN `created_by`");
    $this->executeSQL("ALTER TABLE `aranet_cash_item` DROP COLUMN `updated_at`");
    $this->executeSQL("ALTER TABLE `aranet_cash_item` DROP COLUMN `updated_by`");
    $this->executeSQL("ALTER TABLE `aranet_cash_item` DROP COLUMN `deleted_at`");
    $this->executeSQL("ALTER TABLE `aranet_cash_item` DROP COLUMN `deleted_by`");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }
}

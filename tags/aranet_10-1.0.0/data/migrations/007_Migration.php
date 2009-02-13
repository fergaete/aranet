<?php

class Migration007 extends sfMigration {
  public function up() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` ADD COLUMN `expense_purchase_by` INTEGER  NOT NULL AFTER `expense_purchase_date`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` ADD COLUMN `expense_validate_date` DATE AFTER `expense_item_vendor_id`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` ADD COLUMN `expense_validate_by` INTEGER DEFAULT NULL AFTER `expense_validate_date`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` ADD COLUMN `created_at` DATETIME AFTER `expense_validate_by`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` ADD COLUMN `created_by` INTEGER DEFAULT NULL AFTER `created_at`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` ADD COLUMN `updated_at` DATETIME AFTER `created_by`");
        $this->executeSQL("ALTER TABLE `aranet_expense_item` ADD COLUMN `updated_by` INTEGER DEFAULT NULL AFTER `updated_at`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` ADD COLUMN `deleted_at` DATETIME AFTER `updated_by`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` ADD COLUMN `deleted_by` INTEGER DEFAULT NULL AFTER `deleted_at`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` ADD INDEX `aranet_expense_item_FI_1` (`expense_purchase_by`)");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` ADD CONSTRAINT `aranet_expense_item_FK_1`
		FOREIGN KEY (`expense_purchase_by`)
		REFERENCES `sf_guard_user_profile` (`user_id`)");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` ADD INDEX `aranet_expense_item_FI_2` (`expense_validate_by`)");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` ADD CONSTRAINT `aranet_expense_item_FK_2`
		FOREIGN KEY (`expense_validate_by`)
		REFERENCES `sf_guard_user_profile` (`user_id`)");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` ADD INDEX `aranet_expense_item_FI_3` (`created_by`)");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` ADD CONSTRAINT `aranet_expense_item_FK_3`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user_profile` (`user_id`)");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` ADD INDEX `aranet_expense_item_FI_4` (`updated_by`)");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` ADD CONSTRAINT `aranet_expense_item_FK_4`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user_profile` (`user_id`)");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` ADD INDEX `aranet_expense_item_FI_5` (`deleted_by`)");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` ADD CONSTRAINT `aranet_expense_item_FK_5`
		FOREIGN KEY (`deleted_by`)
		REFERENCES `sf_guard_user_profile` (`user_id`)");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
    
    // Update records from database
    $c = new Criteria();
//    $c->add(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, 1);
    $expense_items = ExpenseItemPeer::doSelect($c);
    foreach($expense_item as $expense) {
        $expense_item->setExpensePurchasedBy(2);
        $expense_item->save();
    }
  }

  public function down() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` DROP INDEX `aranet_expense_item_FI_1`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` DROP INDEX `aranet_expense_item_FI_2`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` DROP INDEX `aranet_expense_item_FI_3`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` DROP INDEX `aranet_expense_item_FI_4`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` DROP INDEX `aranet_expense_item_FI_5`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` DROP FOREIGN KEY `aranet_expense_item_FK_1`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` DROP FOREIGN KEY `aranet_expense_item_FK_2`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` DROP FOREIGN KEY `aranet_expense_item_FK_3`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` DROP FOREIGN KEY `aranet_expense_item_FK_4`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` DROP FOREIGN KEY `aranet_expense_item_FK_5`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` DROP COLUMN `expense_purchase_by`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` DROP COLUMN `expense_validate_date`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` DROP COLUMN `expense_validate_by`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` DROP COLUMN `created_at`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` DROP COLUMN `created_by`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` DROP COLUMN `updated_at`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` DROP COLUMN `updated_by`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` DROP COLUMN `deleted_at`");
    $this->executeSQL("ALTER TABLE `aranet_expense_item` DROP COLUMN `deleted_by`");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }
}

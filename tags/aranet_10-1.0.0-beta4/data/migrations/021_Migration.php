<?php

class Migration021 extends sfMigration {
  public function up() 
  {
      $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
      $this->executeSQL("CREATE TABLE `aranet_kind_of_invoice`
        (
        	`id` INTEGER  NOT NULL AUTO_INCREMENT,
        	`kind_of_invoice_title` VARCHAR(64),
        	PRIMARY KEY (`id`),
        	KEY `kind_of_invoice_title_idx`(`kind_of_invoice_title`)
        )Type=InnoDB;");
      $this->loadFixtures();
      $this->executeSQL("ALTER TABLE `aranet_invoice` ADD COLUMN `invoice_kind_of_invoice_id` INTEGER DEFAULT 1 AFTER `invoice_category_id`");
      $this->executeSQL("ALTER TABLE `aranet_invoice` ADD INDEX `aranet_invoice_FI_11` (`invoice_kind_of_invoice_id`);");
      $this->executeSQL("ALTER TABLE `aranet_invoice` ADD CONSTRAINT `aranet_invoice_FK_11`
		  FOREIGN KEY (`invoice_kind_of_invoice_id`)
		  REFERENCES `aranet_kind_of_invoice` (`id`);");
      $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }

  public function down() 
  {
      $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
      $this->executeSQL("ALTER TABLE `aranet_invoice` DROP INDEX `aranet_invoice_FI_11`;");
      $this->executeSQL("ALTER TABLE `aranet_invoice` DROP INDEX `aranet_invoice_FK_11`;");
      $this->executeSQL("ALTER TABLE `aranet_invoice` DROP COLUMN `invoice_kind_of_invoice_id`");
      $this->executeSQL("DROP TABLE IF EXISTS `aranet_kind_of_invoice`;");
      $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }
}

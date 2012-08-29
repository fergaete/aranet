<?php

class Migration016 extends sfMigration {
  public function up() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("CREATE TABLE `aranet_report`
    (
    	`id` INTEGER  NOT NULL AUTO_INCREMENT,
    	`report_name` VARCHAR(128),
    	`report_model` VARCHAR(128),
    	`created_at` DATETIME,
    	`created_by` INTEGER default null,
    	`updated_at` DATETIME,
    	`updated_by` INTEGER default null,
    	PRIMARY KEY (`id`),
    	KEY `report_model_idx`(`report_model`),
    	INDEX `aranet_report_FI_1` (`created_by`),
    	CONSTRAINT `aranet_report_FK_1`
    		FOREIGN KEY (`created_by`)
    		REFERENCES `sf_guard_user` (`id`),
    	INDEX `aranet_report_FI_2` (`updated_by`),
    	CONSTRAINT `aranet_report_FK_2`
    		FOREIGN KEY (`updated_by`)
    		REFERENCES `sf_guard_user` (`id`)
    )Type=InnoDB;
    ");
	$this->executeSQL("CREATE TABLE `aranet_report_column`
    (
    	`id` INTEGER  NOT NULL AUTO_INCREMENT,
    	`report_id` INTEGER,
    	`column_php_name` VARCHAR(255),
    	`column_name` VARCHAR(128),
    	`column_order` INTEGER,
    	`column_width` DOUBLE default 0 NOT NULL,
    	`column_eval_script` TEXT  NOT NULL,
    	PRIMARY KEY (`id`),
    	KEY `report_column_idx`(`column_php_name`, `column_order`),
    	INDEX `aranet_report_column_FI_1` (`report_id`),
    	CONSTRAINT `aranet_report_column_FK_1`
    		FOREIGN KEY (`report_id`)
    		REFERENCES `aranet_report` (`id`)
    )Type=InnoDB;
    ");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }

  public function down() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("DROP TABLE IF EXISTS `aranet_report_column`;");
    $this->executeSQL("DROP TABLE IF EXISTS `aranet_report`;");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }
}

<?php

class Migration022 extends sfMigration {
  public function up() 
  {
      $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
      $this->executeSQL("CREATE TABLE `sf_setting`
        (
        	`id` INTEGER  NOT NULL AUTO_INCREMENT,
        	`env` VARCHAR(10),
        	`name` VARCHAR(40),
        	`value` TEXT,
        	`description` VARCHAR(255),
        	`created_at` DATETIME,
        	`updated_at` DATETIME,
        	PRIMARY KEY (`id`)
        )Type=InnoDB;");
        $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
        $this->loadFixtures();
  }

  public function down() 
  {
      $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
      $this->executeSQL("DROP TABLE IF EXISTS `sf_setting`;");
      $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }
}

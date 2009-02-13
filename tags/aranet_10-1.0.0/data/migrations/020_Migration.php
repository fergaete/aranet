<?php

class Migration020 extends sfMigration {
  public function up() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("CREATE TABLE `aranet_default_indicator`
        (
        	`id` INTEGER  NOT NULL AUTO_INCREMENT,
        	`indicator_name` VARCHAR(255)  NOT NULL,
        	`indicator_key` VARCHAR(255)  NOT NULL,
        	`indicator_description` TEXT,
        	`indicator_beautifier` VARCHAR(255),
        	`indicator_unit` VARCHAR(10),
        	`indicator_objects_class` VARCHAR(255),
        	PRIMARY KEY (`id`),
        	KEY `indicator_name_idx`(`indicator_name`),
        	KEY `indicator_key_idx`(`indicator_key`)
        )Type=InnoDB;");
    $this->executeSQL("CREATE TABLE `aranet_indicator`
        (
        	`id` INTEGER  NOT NULL AUTO_INCREMENT,
        	`indicator_id` INTEGER  NOT NULL,
        	`indicator_value` DOUBLE,
        	`indicator_beautifier` VARCHAR(255),
        	`indicator_unit` VARCHAR(10),
        	`indicator_object_id` INTEGER  NOT NULL,
        	`indicator_object_class` VARCHAR(64),
        	PRIMARY KEY (`id`),
        	UNIQUE KEY `indicator_unique_idx` (`indicator_id`, `indicator_object_id`, `indicator_object_class`),
        	KEY `indicator_object_id_idx`(`indicator_object_id`),
        	KEY `indicator_id_idx`(`indicator_id`),
        	CONSTRAINT `aranet_indicator_FK_1`
        		FOREIGN KEY (`indicator_id`)
        		REFERENCES `aranet_default_indicator` (`id`)
        )Type=InnoDB;");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
    $this->loadFixtures();
  }

  public function down() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("DROP TABLE IF EXISTS `aranet_indicator`;");
    $this->executeSQL("DROP TABLE IF EXISTS `aranet_default_indicator`;");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }
}

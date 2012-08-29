<?php

class Migration017 extends sfMigration {
  public function up()
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("DROP TABLE IF EXISTS `aranet_tag`;");
    $this->executeSQL("DROP TABLE IF EXISTS `aranet_tagobject`;");
    $this->executeSQL("CREATE TABLE `aranet_graphic`
        (
                `id` INTEGER  NOT NULL AUTO_INCREMENT,
                `graphic_name` VARCHAR(128),
                `data_points` INTEGER,
                `months` INTEGER,
                `start_date` DATETIME,
                `end_date` DATETIME,
                `created_at` DATETIME,
                `created_by` INTEGER default null,
                `updated_at` DATETIME,
                `updated_by` INTEGER default null,
                PRIMARY KEY (`id`),
                INDEX `aranet_graphic_FI_1` (`created_by`),
                CONSTRAINT `aranet_graphic_FK_1`
                        FOREIGN KEY (`created_by`)
                        REFERENCES `sf_guard_user` (`id`),
                INDEX `aranet_graphic_FI_2` (`updated_by`),
                CONSTRAINT `aranet_graphic_FK_2`
                        FOREIGN KEY (`updated_by`)
                        REFERENCES `sf_guard_user` (`id`)
        )Type=InnoDB;
    ");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
    $this->loadFixtures();
  }

  public function down()
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("DROP TABLE IF EXISTS `aranet_graphic`;");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }
}

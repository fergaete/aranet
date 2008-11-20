<?php

class Migration006 extends sfMigration {
  public function up() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("ALTER TABLE `aranet_contact` ADD COLUMN `contact_org_unit` VARCHAR(128) DEFAULT NULL AFTER `contact_birthday`");
    $this->executeSQL("ALTER TABLE `aranet_budget` ADD COLUMN `budget_is_last` INTEGER(1) DEFAULT 1 AFTER `budget_contact_person_id`");
    $this->executeSQL("CREATE TABLE `aranet_objectcontact`
        (
            `id` INTEGER  NOT NULL AUTO_INCREMENT,
            `objectcontact_contact_id` INTEGER,
            `objectcontact_object_id` INTEGER,
            `objectcontact_object_class` VARCHAR(64),
            `objectcontact_rol` VARCHAR(128),
            `created_at` DATETIME,
            `created_by` INTEGER default null,
            `updated_at` DATETIME,
            `updated_by` INTEGER default null,
            `deleted_at` DATETIME,
            `deleted_by` INTEGER default null,
            PRIMARY KEY (`id`),
            UNIQUE KEY `objectcontact_unique_idx` (`objectcontact_contact_id`, `objectcontact_object_id`, `objectcontact_object_class`),
            KEY `objectcontact_contact_id_idx2`(`objectcontact_contact_id`),
            KEY `objectcontact_object_id_idx2`(`objectcontact_object_id`),
            INDEX `aranet_objectcontact_FI_1` (`created_by`),
            CONSTRAINT `aranet_objectcontact_FK_1`
                FOREIGN KEY (`created_by`)
                REFERENCES `sf_guard_user_profile` (`user_id`),
            INDEX `aranet_objectcontact_FI_2` (`updated_by`),
            CONSTRAINT `aranet_objectcontact_FK_2`
                FOREIGN KEY (`updated_by`)
                REFERENCES `sf_guard_user_profile` (`user_id`),
            INDEX `aranet_objectcontact_FI_3` (`deleted_by`),
            CONSTRAINT `aranet_objectcontact_FK_3`
                FOREIGN KEY (`deleted_by`)
                REFERENCES `sf_guard_user_profile` (`user_id`),
            CONSTRAINT `objectcontact_contact_id_idx`
                FOREIGN KEY (`objectcontact_contact_id`)
                REFERENCES `aranet_contact` (`id`)
                ON DELETE CASCADE
        )Type=InnoDB;");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }

  public function down() 
  {
    $this->executeSQL("ALTER TABLE `aranet_contact` DROP COLUMN `contact_org_unit`");
    $this->executeSQL("ALTER TABLE `aranet_budget` DROP COLUMN `bidget_contact_person_id`");
    $this->executeSQL("DROP TABLE IF EXISTS `aranet_objectcontact`;");
  }
}

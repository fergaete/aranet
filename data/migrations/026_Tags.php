<?php

class Migration026 extends sfMigration {
  public function up() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("UPDATE `sf_setting` SET `value` = '0.9.26' WHERE `name` = 'VERSION'");
    // Mover las tablas tag y tagging al nuevo modelo
    $this->executeSQL("RENAME TABLE `tag` TO `sf_tag`");
    $this->executeSQL("RENAME TABLE `tagging` TO `sf_tagging`");
    $this->executeSQL("ALTER TABLE `sf_tagging` CHANGE COLUMN `tag_id` `tag_id` INTEGER  NOT NULL");
    $this->executeSQL("ALTER TABLE `sf_tagging` ADD CONSTRAINT `sf_tagging_FK_1`
		  FOREIGN KEY (`tag_id`)
		  REFERENCES `sf_tag` (`id`)
		  ON DELETE CASCADE");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }

  public function down() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("ALTER TABLE `sf_tagging` DROP FOREIGN KEY `sf_tagging_FK_1`");
    $this->executeSQL("ALTER TABLE `sf_tagging` CHANGE COLUMN `tag_id` `tag_id` VARCHAR(100)");
    $this->executeSQL("RENAME TABLE `sf_tag` TO `tag`");
    $this->executeSQL("RENAME TABLE `sf_tagging` TO `tagging`");
    $this->executeSQL("UPDATE `sf_setting` SET `value` = '0.9.25' WHERE `name` = 'VERSION'");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }
}

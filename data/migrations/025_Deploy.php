<?php

class Migration025 extends sfMigration {
  public function up() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("UPDATE `sf_setting` SET `value` = '0.9.25' WHERE `name` = 'VERSION'");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }

  public function down() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("UPDATE `sf_setting` SET `value` = '0.9.24' WHERE `name` = 'VERSION'");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }
}

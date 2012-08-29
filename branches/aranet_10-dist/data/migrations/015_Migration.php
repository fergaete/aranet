<?php

class Migration015 extends sfMigration {
  public function up() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("ALTER TABLE `aranet_project_milestone` ADD COLUMN `milestone_estimated_hours` DOUBLE default 0 AFTER `milestone_budget_id`");
	$this->executeSQL("ALTER TABLE `aranet_project_milestone` ADD COLUMN `milestone_total_hours` DOUBLE default 0 AFTER `milestone_estimated_hours`");
	$this->executeSQL("ALTER TABLE `aranet_project_milestone` ADD COLUMN `milestone_total_hour_costs` DOUBLE default 0 AFTER `milestone_total_hours`");
	$this->executeSQL("ALTER TABLE `aranet_project_task` ADD COLUMN `task_estimated_hours` DOUBLE default 0 AFTER `task_budget_id`");
	$this->executeSQL("ALTER TABLE `aranet_project_task` ADD COLUMN `task_total_hours` DOUBLE default 0 AFTER `task_estimated_hours`");
	$this->executeSQL("ALTER TABLE `aranet_project_task` ADD COLUMN `task_total_hour_costs` DOUBLE default 0 AFTER `task_total_hours`");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }

  public function down() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("ALTER TABLE `aranet_project_milestone` DROP COLUMN `milestone_estimated_hours`");
    $this->executeSQL("ALTER TABLE `aranet_project_milestone` DROP COLUMN `milestone_total_hours`");
    $this->executeSQL("ALTER TABLE `aranet_project_milestone` DROP COLUMN `milestone_total_hour_costs`");
    $this->executeSQL("ALTER TABLE `aranet_project_task` DROP COLUMN `task_estimated_hours`");
    $this->executeSQL("ALTER TABLE `aranet_project_task` DROP COLUMN `task_total_hours`");
    $this->executeSQL("ALTER TABLE `aranet_project_task` DROP COLUMN `task_total_hour_costs`");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }
}

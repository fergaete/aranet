<?php

class Migration023 extends sfMigration {
  public function up() 
  {
      $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
      $this->executeSQL("ALTER TABLE `aranet_graphic` ADD COLUMN `is_default` INTEGER(1) default 0 AFTER `end_date`");
      $this->executeSQL("CREATE TABLE `aranet_plot`
            (
            	`id` INTEGER  NOT NULL AUTO_INCREMENT,
            	`plot_name` VARCHAR(128),
            	`plot_color` VARCHAR(64),
            	`plot_type` VARCHAR(64),
            	`plot_criteria` TEXT,
            	`plot_date_variable` VARCHAR(128),
            	`plot_class` VARCHAR(128),
            	`plot_function` VARCHAR(128),
            	`plot_callback` VARCHAR(128),
            	`plot_acc_function` VARCHAR(128),
            	PRIMARY KEY (`id`)
            )Type=InnoDB;");
        $this->executeSQL("CREATE TABLE `aranet_graphic_plot`
            (
            	`id` INTEGER  NOT NULL AUTO_INCREMENT,
            	`graphic_id` INTEGER default null,
            	`plot_id` INTEGER default null,
            	PRIMARY KEY (`id`),
            	INDEX `aranet_graphic_plot_FI_1` (`graphic_id`),
            	CONSTRAINT `aranet_graphic_plot_FK_1`
            		FOREIGN KEY (`graphic_id`)
            		REFERENCES `aranet_graphic` (`id`),
            	INDEX `aranet_graphic_plot_FI_2` (`plot_id`),
            	CONSTRAINT `aranet_graphic_plot_FK_2`
            		FOREIGN KEY (`plot_id`)
            		REFERENCES `aranet_plot` (`id`)
            )Type=InnoDB;");
        $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
        $this->loadFixtures();
        $c = new Criteria();
        $c->add(GraphicPeer::GRAPHIC_NAME, '%Balance%', Criteria::NOT_LIKE);
        $graphics = GraphicPeer::doSelect($c);
        for ($i=0;$i<count($graphics);$i++) {
            $this->executeSQL("INSERT INTO `aranet_graphic_plot` (`graphic_id`, `plot_id`) VALUES(".$graphics[$i]->getId().",2)");
            $this->executeSQL("INSERT INTO `aranet_graphic_plot` (`graphic_id`, `plot_id`) VALUES(".$graphics[$i]->getId().",5)");
            $this->executeSQL("INSERT INTO `aranet_graphic_plot` (`graphic_id`, `plot_id`) VALUES(".$graphics[$i]->getId().",10)");
            $this->executeSQL("INSERT INTO `aranet_graphic_plot` (`graphic_id`, `plot_id`) VALUES(".$graphics[$i]->getId().",12)");
        }
        // Para el balance usar otros plots
        $c = new Criteria();
        $c->add(GraphicPeer::GRAPHIC_NAME, '%Balance%', Criteria::LIKE);
        $graphics = GraphicPeer::doSelect($c);
        for ($i=0;$i<count($graphics);$i++) {
            $this->executeSQL("INSERT INTO `aranet_graphic_plot` (`graphic_id`, `plot_id`) VALUES(".$graphics[$i]->getId().",1)");
            $this->executeSQL("INSERT INTO `aranet_graphic_plot` (`graphic_id`, `plot_id`) VALUES(".$graphics[$i]->getId().",4)");
            $this->executeSQL("INSERT INTO `aranet_graphic_plot` (`graphic_id`, `plot_id`) VALUES(".$graphics[$i]->getId().",15)");
            $this->executeSQL("INSERT INTO `aranet_graphic_plot` (`graphic_id`, `plot_id`) VALUES(".$graphics[$i]->getId().",16)");
        }        
        // Actualizar version de la aplicacion
        $this->executeSQL("UPDATE `sf_setting` SET `value` = '0.9.11' WHERE `name` = 'VERSION'");
  }

  public function down() 
  {
      $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
      $this->executeSQL("ALTER TABLE `aranet_graphic` DROP COLUMN `is_default`");
      $this->executeSQL("DROP TABLE IF EXISTS `aranet_graphic_plot`;");
      $this->executeSQL("DROP TABLE IF EXISTS `aranet_plot`;");
      $this->executeSQL("UPDATE `sf_setting` SET `value` = '0.9.10' WHERE `name` = 'VERSION'");
      $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }
}

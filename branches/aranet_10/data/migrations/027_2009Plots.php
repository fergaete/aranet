<?php

class Migration027 extends sfMigration {
  public function up() 
  {
    $this->remove2009();
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("UPDATE `aranet_graphic` SET `is_default` = 0 WHERE `is_default` = 1");
    $this->executeSQL("ALTER TABLE `aranet_graphic_plot` DROP FOREIGN KEY `aranet_graphic_plot_FK_1`;");
    $this->executeSQL("ALTER TABLE `aranet_graphic_plot` ADD CONSTRAINT `aranet_graphic_plot_FK_1` FOREIGN KEY ( `graphic_id` ) REFERENCES `aranet_graphic` (`id`) ON DELETE CASCADE ;");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
    $this->loadFixtures();
    $c = new Criteria();
    $c->add(GraphicPeer::GRAPHIC_NAME, '%2009%', Criteria::LIKE);
    $graphics = GraphicPeer::doSelect($c);
    for ($i=0;$i<count($graphics);$i++) {
      if ($graphics[$i]->getGraphicName() != 'Balance 2009: Ingresos vs. Gastos') {
        $this->executeSQL("INSERT INTO `aranet_graphic_plot` (`graphic_id`, `plot_id`) VALUES(".$graphics[$i]->getId().",2)");
        $this->executeSQL("INSERT INTO `aranet_graphic_plot` (`graphic_id`, `plot_id`) VALUES(".$graphics[$i]->getId().",5)");
        $this->executeSQL("INSERT INTO `aranet_graphic_plot` (`graphic_id`, `plot_id`) VALUES(".$graphics[$i]->getId().",10)");
        $this->executeSQL("INSERT INTO `aranet_graphic_plot` (`graphic_id`, `plot_id`) VALUES(".$graphics[$i]->getId().",12)");
      } else {
        $this->executeSQL("INSERT INTO `aranet_graphic_plot` (`graphic_id`, `plot_id`) VALUES(".$graphics[$i]->getId().",1)");
        $this->executeSQL("INSERT INTO `aranet_graphic_plot` (`graphic_id`, `plot_id`) VALUES(".$graphics[$i]->getId().",4)");
        $this->executeSQL("INSERT INTO `aranet_graphic_plot` (`graphic_id`, `plot_id`) VALUES(".$graphics[$i]->getId().",15)");
        $this->executeSQL("INSERT INTO `aranet_graphic_plot` (`graphic_id`, `plot_id`) VALUES(".$graphics[$i]->getId().",16)");
      }
    }
    // Actualizar version de la aplicacion
    $this->executeSQL("UPDATE `sf_setting` SET `value` = '1.0.0' WHERE `name` = 'VERSION'");
  }

  private function remove2009()
  {
    $c = new Criteria();
    $c->add(GraphicPeer::GRAPHIC_NAME, '%2009%', Criteria::LIKE);
    $graphics = GraphicPeer::doSelect($c);
    foreach ($graphics as $g) {
      $c = new Criteria();
      $c->add(GraphicPlotPeer::GRAPHIC_ID, $g->getId());
      GraphicPlotPeer::doDelete($c);
      $g->delete();
    }
  }

  public function down() 
  {
    $this->remove2009();
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("ALTER TABLE `aranet_graphic_plot` DROP FOREIGN KEY `aranet_graphic_plot_FK_1` ;");
    $this->executeSQL(" ALTER TABLE `aranet_graphic_plot` ADD CONSTRAINT `aranet_graphic_plot_FK_1` FOREIGN KEY ( `graphic_id` ) REFERENCES `aranet_graphic` (
`id`
);");
    $this->executeSQL("UPDATE `aranet_graphic` SET `is_default` = 1 WHERE `graphic_name` = 'Balance 2008: Ingresos vs. Gastos'");
    $this->executeSQL("UPDATE `sf_setting` SET `value` = '0.9.26' WHERE `name` = 'VERSION'");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }
}

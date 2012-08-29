<?php



class GraphicPlotMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GraphicPlotMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('aranet_graphic_plot');
		$tMap->setPhpName('GraphicPlot');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('GRAPHIC_ID', 'GraphicId', 'int', CreoleTypes::INTEGER, 'aranet_graphic', 'ID', false, null);

		$tMap->addForeignKey('PLOT_ID', 'PlotId', 'int', CreoleTypes::INTEGER, 'aranet_plot', 'ID', false, null);

	} 
} 
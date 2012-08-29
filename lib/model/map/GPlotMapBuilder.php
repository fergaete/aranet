<?php



class GPlotMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GPlotMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_plot');
		$tMap->setPhpName('GPlot');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('PLOT_NAME', 'PlotName', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addColumn('PLOT_COLOR', 'PlotColor', 'string', CreoleTypes::VARCHAR, false, 64);

		$tMap->addColumn('PLOT_TYPE', 'PlotType', 'string', CreoleTypes::VARCHAR, false, 64);

		$tMap->addColumn('PLOT_CRITERIA', 'PlotCriteria', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('PLOT_DATE_VARIABLE', 'PlotDateVariable', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addColumn('PLOT_CLASS', 'PlotClass', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addColumn('PLOT_FUNCTION', 'PlotFunction', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addColumn('PLOT_CALLBACK', 'PlotCallback', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addColumn('PLOT_ACC_FUNCTION', 'PlotAccFunction', 'string', CreoleTypes::VARCHAR, false, 128);

	} 
} 
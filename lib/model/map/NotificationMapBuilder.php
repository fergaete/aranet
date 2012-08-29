<?php



class NotificationMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NotificationMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_notification');
		$tMap->setPhpName('Notification');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOTIFICATION_TYPE', 'NotificationType', 'int', CreoleTypes::INTEGER, false, 1);

		$tMap->addColumn('NOTIFICATION_APPLICATION', 'NotificationApplication', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('NOTIFICATION_MODULE', 'NotificationModule', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('NOTIFICATION_ACTION', 'NotificationAction', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('NOTIFICATION_FROM_ADDRESS', 'NotificationFromAddress', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('NOTIFICATION_TO_ADDRESS', 'NotificationToAddress', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('NOTIFICATION_SUBJECT', 'NotificationSubject', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('NOTIFICATION_CONTENT', 'NotificationContent', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('NOTIFICATION_HTML_CONTENT', 'NotificationHtmlContent', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('NOTIFICATION_RESPONSE_CODE', 'NotificationResponseCode', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NOTIFICATION_RESPONSE', 'NotificationResponse', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('NOTIFICATION_STATUS', 'NotificationStatus', 'int', CreoleTypes::INTEGER, false, 1);

		$tMap->addForeignKey('NOTIFICATION_PROJECT_ID', 'NotificationProjectId', 'int', CreoleTypes::INTEGER, 'aranet_project', 'ID', false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

	} 
} 
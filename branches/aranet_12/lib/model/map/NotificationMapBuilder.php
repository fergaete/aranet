<?php


/**
 * This class adds structure of 'aranet_notification' table to 'propel' DatabaseMap object.
 *
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class NotificationMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.NotificationMapBuilder';

	/**
	 * The database map.
	 */
	private $dbMap;

	/**
	 * Tells us if this DatabaseMapBuilder is built so that we
	 * don't have to re-build it every time.
	 *
	 * @return     boolean true if this DatabaseMapBuilder is built, false otherwise.
	 */
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	/**
	 * Gets the databasemap this map builder built.
	 *
	 * @return     the databasemap
	 */
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	/**
	 * The doBuild() method builds the DatabaseMap
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(NotificationPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(NotificationPeer::TABLE_NAME);
		$tMap->setPhpName('Notification');
		$tMap->setClassname('Notification');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOTIFICATION_TYPE', 'NotificationType', 'INTEGER', false, 1);

		$tMap->addColumn('NOTIFICATION_APPLICATION', 'NotificationApplication', 'VARCHAR', false, 255);

		$tMap->addColumn('NOTIFICATION_MODULE', 'NotificationModule', 'VARCHAR', false, 255);

		$tMap->addColumn('NOTIFICATION_ACTION', 'NotificationAction', 'VARCHAR', false, 255);

		$tMap->addColumn('NOTIFICATION_FROM_ADDRESS', 'NotificationFromAddress', 'VARCHAR', false, 255);

		$tMap->addColumn('NOTIFICATION_TO_ADDRESS', 'NotificationToAddress', 'VARCHAR', false, 255);

		$tMap->addColumn('NOTIFICATION_SUBJECT', 'NotificationSubject', 'LONGVARCHAR', false, null);

		$tMap->addColumn('NOTIFICATION_CONTENT', 'NotificationContent', 'LONGVARCHAR', false, null);

		$tMap->addColumn('NOTIFICATION_HTML_CONTENT', 'NotificationHtmlContent', 'LONGVARCHAR', false, null);

		$tMap->addColumn('NOTIFICATION_RESPONSE_CODE', 'NotificationResponseCode', 'INTEGER', false, null);

		$tMap->addColumn('NOTIFICATION_RESPONSE', 'NotificationResponse', 'LONGVARCHAR', false, null);

		$tMap->addColumn('NOTIFICATION_STATUS', 'NotificationStatus', 'INTEGER', false, 1);

		$tMap->addForeignKey('NOTIFICATION_PROJECT_ID', 'NotificationProjectId', 'INTEGER', 'aranet_project', 'ID', false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

	} // doBuild()

} // NotificationMapBuilder

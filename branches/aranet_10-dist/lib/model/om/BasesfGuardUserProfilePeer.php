<?php


abstract class BasesfGuardUserProfilePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'sf_guard_user_profile';

	
	const CLASS_DEFAULT = 'lib.model.sfGuardUserProfile';

	
	const NUM_COLUMNS = 52;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'sf_guard_user_profile.ID';

	
	const USER_ID = 'sf_guard_user_profile.USER_ID';

	
	const TITLE = 'sf_guard_user_profile.TITLE';

	
	const PUBLIC_TITLE = 'sf_guard_user_profile.PUBLIC_TITLE';

	
	const FIRST_NAME = 'sf_guard_user_profile.FIRST_NAME';

	
	const PUBLIC_FIRST_NAME = 'sf_guard_user_profile.PUBLIC_FIRST_NAME';

	
	const LAST_NAME = 'sf_guard_user_profile.LAST_NAME';

	
	const PUBLIC_LAST_NAME = 'sf_guard_user_profile.PUBLIC_LAST_NAME';

	
	const GENDER = 'sf_guard_user_profile.GENDER';

	
	const PUBLIC_GENDER = 'sf_guard_user_profile.PUBLIC_GENDER';

	
	const EMAIL = 'sf_guard_user_profile.EMAIL';

	
	const PUBLIC_EMAIL = 'sf_guard_user_profile.PUBLIC_EMAIL';

	
	const URL = 'sf_guard_user_profile.URL';

	
	const PUBLIC_URL = 'sf_guard_user_profile.PUBLIC_URL';

	
	const OPENID_URL = 'sf_guard_user_profile.OPENID_URL';

	
	const STREET = 'sf_guard_user_profile.STREET';

	
	const PUBLIC_STREET = 'sf_guard_user_profile.PUBLIC_STREET';

	
	const CITY = 'sf_guard_user_profile.CITY';

	
	const PUBLIC_CITY = 'sf_guard_user_profile.PUBLIC_CITY';

	
	const STATE = 'sf_guard_user_profile.STATE';

	
	const PUBLIC_STATE = 'sf_guard_user_profile.PUBLIC_STATE';

	
	const CODE = 'sf_guard_user_profile.CODE';

	
	const PUBLIC_CODE = 'sf_guard_user_profile.PUBLIC_CODE';

	
	const COUNTRY = 'sf_guard_user_profile.COUNTRY';

	
	const PUBLIC_COUNTRY = 'sf_guard_user_profile.PUBLIC_COUNTRY';

	
	const TIMEZONE = 'sf_guard_user_profile.TIMEZONE';

	
	const PUBLIC_TIMEZONE = 'sf_guard_user_profile.PUBLIC_TIMEZONE';

	
	const BIRTHDAY = 'sf_guard_user_profile.BIRTHDAY';

	
	const PUBLIC_BIRTHDAY = 'sf_guard_user_profile.PUBLIC_BIRTHDAY';

	
	const COMPANY = 'sf_guard_user_profile.COMPANY';

	
	const PUBLIC_COMPANY = 'sf_guard_user_profile.PUBLIC_COMPANY';

	
	const CIF = 'sf_guard_user_profile.CIF';

	
	const PUBLIC_CIF = 'sf_guard_user_profile.PUBLIC_CIF';

	
	const PHONE1 = 'sf_guard_user_profile.PHONE1';

	
	const PUBLIC_PHONE1 = 'sf_guard_user_profile.PUBLIC_PHONE1';

	
	const PHONE2 = 'sf_guard_user_profile.PHONE2';

	
	const PUBLIC_PHONE2 = 'sf_guard_user_profile.PUBLIC_PHONE2';

	
	const FAX = 'sf_guard_user_profile.FAX';

	
	const PUBLIC_FAX = 'sf_guard_user_profile.PUBLIC_FAX';

	
	const NOTES = 'sf_guard_user_profile.NOTES';

	
	const GRAVATAR = 'sf_guard_user_profile.GRAVATAR';

	
	const AVATAR = 'sf_guard_user_profile.AVATAR';

	
	const AVATAR_FILETYPE = 'sf_guard_user_profile.AVATAR_FILETYPE';

	
	const OWNER_USER_ID = 'sf_guard_user_profile.OWNER_USER_ID';

	
	const USER_NEWSLETTER = 'sf_guard_user_profile.USER_NEWSLETTER';

	
	const PREFERRED_LANGUAGE = 'sf_guard_user_profile.PREFERRED_LANGUAGE';

	
	const CREATED_AT = 'sf_guard_user_profile.CREATED_AT';

	
	const CREATED_BY = 'sf_guard_user_profile.CREATED_BY';

	
	const UPDATED_AT = 'sf_guard_user_profile.UPDATED_AT';

	
	const UPDATED_BY = 'sf_guard_user_profile.UPDATED_BY';

	
	const DELETED_AT = 'sf_guard_user_profile.DELETED_AT';

	
	const DELETED_BY = 'sf_guard_user_profile.DELETED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'UserId', 'Title', 'PublicTitle', 'FirstName', 'PublicFirstName', 'LastName', 'PublicLastName', 'Gender', 'PublicGender', 'Email', 'PublicEmail', 'Url', 'PublicUrl', 'OpenidUrl', 'Street', 'PublicStreet', 'City', 'PublicCity', 'State', 'PublicState', 'Code', 'PublicCode', 'Country', 'PublicCountry', 'Timezone', 'PublicTimezone', 'Birthday', 'PublicBirthday', 'Company', 'PublicCompany', 'Cif', 'PublicCif', 'Phone1', 'PublicPhone1', 'Phone2', 'PublicPhone2', 'Fax', 'PublicFax', 'Notes', 'Gravatar', 'Avatar', 'AvatarFiletype', 'OwnerUserId', 'UserNewsletter', 'PreferredLanguage', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'DeletedAt', 'DeletedBy', ),
		BasePeer::TYPE_COLNAME => array (sfGuardUserProfilePeer::ID, sfGuardUserProfilePeer::USER_ID, sfGuardUserProfilePeer::TITLE, sfGuardUserProfilePeer::PUBLIC_TITLE, sfGuardUserProfilePeer::FIRST_NAME, sfGuardUserProfilePeer::PUBLIC_FIRST_NAME, sfGuardUserProfilePeer::LAST_NAME, sfGuardUserProfilePeer::PUBLIC_LAST_NAME, sfGuardUserProfilePeer::GENDER, sfGuardUserProfilePeer::PUBLIC_GENDER, sfGuardUserProfilePeer::EMAIL, sfGuardUserProfilePeer::PUBLIC_EMAIL, sfGuardUserProfilePeer::URL, sfGuardUserProfilePeer::PUBLIC_URL, sfGuardUserProfilePeer::OPENID_URL, sfGuardUserProfilePeer::STREET, sfGuardUserProfilePeer::PUBLIC_STREET, sfGuardUserProfilePeer::CITY, sfGuardUserProfilePeer::PUBLIC_CITY, sfGuardUserProfilePeer::STATE, sfGuardUserProfilePeer::PUBLIC_STATE, sfGuardUserProfilePeer::CODE, sfGuardUserProfilePeer::PUBLIC_CODE, sfGuardUserProfilePeer::COUNTRY, sfGuardUserProfilePeer::PUBLIC_COUNTRY, sfGuardUserProfilePeer::TIMEZONE, sfGuardUserProfilePeer::PUBLIC_TIMEZONE, sfGuardUserProfilePeer::BIRTHDAY, sfGuardUserProfilePeer::PUBLIC_BIRTHDAY, sfGuardUserProfilePeer::COMPANY, sfGuardUserProfilePeer::PUBLIC_COMPANY, sfGuardUserProfilePeer::CIF, sfGuardUserProfilePeer::PUBLIC_CIF, sfGuardUserProfilePeer::PHONE1, sfGuardUserProfilePeer::PUBLIC_PHONE1, sfGuardUserProfilePeer::PHONE2, sfGuardUserProfilePeer::PUBLIC_PHONE2, sfGuardUserProfilePeer::FAX, sfGuardUserProfilePeer::PUBLIC_FAX, sfGuardUserProfilePeer::NOTES, sfGuardUserProfilePeer::GRAVATAR, sfGuardUserProfilePeer::AVATAR, sfGuardUserProfilePeer::AVATAR_FILETYPE, sfGuardUserProfilePeer::OWNER_USER_ID, sfGuardUserProfilePeer::USER_NEWSLETTER, sfGuardUserProfilePeer::PREFERRED_LANGUAGE, sfGuardUserProfilePeer::CREATED_AT, sfGuardUserProfilePeer::CREATED_BY, sfGuardUserProfilePeer::UPDATED_AT, sfGuardUserProfilePeer::UPDATED_BY, sfGuardUserProfilePeer::DELETED_AT, sfGuardUserProfilePeer::DELETED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'user_id', 'title', 'public_title', 'first_name', 'public_first_name', 'last_name', 'public_last_name', 'gender', 'public_gender', 'email', 'public_email', 'url', 'public_url', 'openid_url', 'street', 'public_street', 'city', 'public_city', 'state', 'public_state', 'code', 'public_code', 'country', 'public_country', 'timezone', 'public_timezone', 'birthday', 'public_birthday', 'company', 'public_company', 'cif', 'public_cif', 'phone1', 'public_phone1', 'phone2', 'public_phone2', 'fax', 'public_fax', 'notes', 'gravatar', 'avatar', 'avatar_filetype', 'owner_user_id', 'user_newsletter', 'preferred_language', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'UserId' => 1, 'Title' => 2, 'PublicTitle' => 3, 'FirstName' => 4, 'PublicFirstName' => 5, 'LastName' => 6, 'PublicLastName' => 7, 'Gender' => 8, 'PublicGender' => 9, 'Email' => 10, 'PublicEmail' => 11, 'Url' => 12, 'PublicUrl' => 13, 'OpenidUrl' => 14, 'Street' => 15, 'PublicStreet' => 16, 'City' => 17, 'PublicCity' => 18, 'State' => 19, 'PublicState' => 20, 'Code' => 21, 'PublicCode' => 22, 'Country' => 23, 'PublicCountry' => 24, 'Timezone' => 25, 'PublicTimezone' => 26, 'Birthday' => 27, 'PublicBirthday' => 28, 'Company' => 29, 'PublicCompany' => 30, 'Cif' => 31, 'PublicCif' => 32, 'Phone1' => 33, 'PublicPhone1' => 34, 'Phone2' => 35, 'PublicPhone2' => 36, 'Fax' => 37, 'PublicFax' => 38, 'Notes' => 39, 'Gravatar' => 40, 'Avatar' => 41, 'AvatarFiletype' => 42, 'OwnerUserId' => 43, 'UserNewsletter' => 44, 'PreferredLanguage' => 45, 'CreatedAt' => 46, 'CreatedBy' => 47, 'UpdatedAt' => 48, 'UpdatedBy' => 49, 'DeletedAt' => 50, 'DeletedBy' => 51, ),
		BasePeer::TYPE_COLNAME => array (sfGuardUserProfilePeer::ID => 0, sfGuardUserProfilePeer::USER_ID => 1, sfGuardUserProfilePeer::TITLE => 2, sfGuardUserProfilePeer::PUBLIC_TITLE => 3, sfGuardUserProfilePeer::FIRST_NAME => 4, sfGuardUserProfilePeer::PUBLIC_FIRST_NAME => 5, sfGuardUserProfilePeer::LAST_NAME => 6, sfGuardUserProfilePeer::PUBLIC_LAST_NAME => 7, sfGuardUserProfilePeer::GENDER => 8, sfGuardUserProfilePeer::PUBLIC_GENDER => 9, sfGuardUserProfilePeer::EMAIL => 10, sfGuardUserProfilePeer::PUBLIC_EMAIL => 11, sfGuardUserProfilePeer::URL => 12, sfGuardUserProfilePeer::PUBLIC_URL => 13, sfGuardUserProfilePeer::OPENID_URL => 14, sfGuardUserProfilePeer::STREET => 15, sfGuardUserProfilePeer::PUBLIC_STREET => 16, sfGuardUserProfilePeer::CITY => 17, sfGuardUserProfilePeer::PUBLIC_CITY => 18, sfGuardUserProfilePeer::STATE => 19, sfGuardUserProfilePeer::PUBLIC_STATE => 20, sfGuardUserProfilePeer::CODE => 21, sfGuardUserProfilePeer::PUBLIC_CODE => 22, sfGuardUserProfilePeer::COUNTRY => 23, sfGuardUserProfilePeer::PUBLIC_COUNTRY => 24, sfGuardUserProfilePeer::TIMEZONE => 25, sfGuardUserProfilePeer::PUBLIC_TIMEZONE => 26, sfGuardUserProfilePeer::BIRTHDAY => 27, sfGuardUserProfilePeer::PUBLIC_BIRTHDAY => 28, sfGuardUserProfilePeer::COMPANY => 29, sfGuardUserProfilePeer::PUBLIC_COMPANY => 30, sfGuardUserProfilePeer::CIF => 31, sfGuardUserProfilePeer::PUBLIC_CIF => 32, sfGuardUserProfilePeer::PHONE1 => 33, sfGuardUserProfilePeer::PUBLIC_PHONE1 => 34, sfGuardUserProfilePeer::PHONE2 => 35, sfGuardUserProfilePeer::PUBLIC_PHONE2 => 36, sfGuardUserProfilePeer::FAX => 37, sfGuardUserProfilePeer::PUBLIC_FAX => 38, sfGuardUserProfilePeer::NOTES => 39, sfGuardUserProfilePeer::GRAVATAR => 40, sfGuardUserProfilePeer::AVATAR => 41, sfGuardUserProfilePeer::AVATAR_FILETYPE => 42, sfGuardUserProfilePeer::OWNER_USER_ID => 43, sfGuardUserProfilePeer::USER_NEWSLETTER => 44, sfGuardUserProfilePeer::PREFERRED_LANGUAGE => 45, sfGuardUserProfilePeer::CREATED_AT => 46, sfGuardUserProfilePeer::CREATED_BY => 47, sfGuardUserProfilePeer::UPDATED_AT => 48, sfGuardUserProfilePeer::UPDATED_BY => 49, sfGuardUserProfilePeer::DELETED_AT => 50, sfGuardUserProfilePeer::DELETED_BY => 51, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'user_id' => 1, 'title' => 2, 'public_title' => 3, 'first_name' => 4, 'public_first_name' => 5, 'last_name' => 6, 'public_last_name' => 7, 'gender' => 8, 'public_gender' => 9, 'email' => 10, 'public_email' => 11, 'url' => 12, 'public_url' => 13, 'openid_url' => 14, 'street' => 15, 'public_street' => 16, 'city' => 17, 'public_city' => 18, 'state' => 19, 'public_state' => 20, 'code' => 21, 'public_code' => 22, 'country' => 23, 'public_country' => 24, 'timezone' => 25, 'public_timezone' => 26, 'birthday' => 27, 'public_birthday' => 28, 'company' => 29, 'public_company' => 30, 'cif' => 31, 'public_cif' => 32, 'phone1' => 33, 'public_phone1' => 34, 'phone2' => 35, 'public_phone2' => 36, 'fax' => 37, 'public_fax' => 38, 'notes' => 39, 'gravatar' => 40, 'avatar' => 41, 'avatar_filetype' => 42, 'owner_user_id' => 43, 'user_newsletter' => 44, 'preferred_language' => 45, 'created_at' => 46, 'created_by' => 47, 'updated_at' => 48, 'updated_by' => 49, 'deleted_at' => 50, 'deleted_by' => 51, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/sfGuardUserProfileMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.sfGuardUserProfileMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = sfGuardUserProfilePeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(sfGuardUserProfilePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(sfGuardUserProfilePeer::ID);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::USER_ID);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::TITLE);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::PUBLIC_TITLE);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::FIRST_NAME);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::PUBLIC_FIRST_NAME);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::LAST_NAME);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::PUBLIC_LAST_NAME);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::GENDER);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::PUBLIC_GENDER);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::EMAIL);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::PUBLIC_EMAIL);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::URL);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::PUBLIC_URL);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::OPENID_URL);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::STREET);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::PUBLIC_STREET);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::CITY);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::PUBLIC_CITY);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::STATE);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::PUBLIC_STATE);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::CODE);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::PUBLIC_CODE);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNTRY);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::PUBLIC_COUNTRY);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::TIMEZONE);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::PUBLIC_TIMEZONE);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::BIRTHDAY);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::PUBLIC_BIRTHDAY);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::COMPANY);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::PUBLIC_COMPANY);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::CIF);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::PUBLIC_CIF);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::PHONE1);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::PUBLIC_PHONE1);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::PHONE2);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::PUBLIC_PHONE2);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::FAX);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::PUBLIC_FAX);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::NOTES);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::GRAVATAR);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::AVATAR);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::AVATAR_FILETYPE);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::OWNER_USER_ID);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::USER_NEWSLETTER);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::PREFERRED_LANGUAGE);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::CREATED_AT);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::CREATED_BY);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::UPDATED_AT);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::UPDATED_BY);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::DELETED_AT);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::DELETED_BY);

	}

	const COUNT = 'COUNT(sf_guard_user_profile.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT sf_guard_user_profile.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = sfGuardUserProfilePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = sfGuardUserProfilePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return sfGuardUserProfilePeer::populateObjects(sfGuardUserProfilePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

        foreach (sfMixer::getCallables('BasesfGuardUserProfilePeer:doSelectRS:doSelectRS') as $callable)
        {
          call_user_func($callable, 'BasesfGuardUserProfilePeer', $criteria, $con);
        }

    

    foreach (sfMixer::getCallables('BasesfGuardUserProfilePeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BasesfGuardUserProfilePeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			sfGuardUserProfilePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = sfGuardUserProfilePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinsfGuardUserRelatedByUserId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfGuardUserProfilePeer::USER_ID, sfGuardUserPeer::ID);

		$rs = sfGuardUserProfilePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinsfGuardUserRelatedByOwnerUserId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfGuardUserProfilePeer::OWNER_USER_ID, sfGuardUserPeer::ID);

		$rs = sfGuardUserProfilePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinsfGuardUserRelatedByCreatedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfGuardUserProfilePeer::CREATED_BY, sfGuardUserPeer::ID);

		$rs = sfGuardUserProfilePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinsfGuardUserRelatedByUpdatedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfGuardUserProfilePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = sfGuardUserProfilePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinsfGuardUserRelatedByDeletedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfGuardUserProfilePeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = sfGuardUserProfilePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfGuardUserRelatedByUserId(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol = (sfGuardUserProfilePeer::NUM_COLUMNS - sfGuardUserProfilePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(sfGuardUserProfilePeer::USER_ID, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfGuardUserProfilePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByUserId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addsfGuardUserProfileRelatedByUserId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initsfGuardUserProfilesRelatedByUserId();
				$obj2->addsfGuardUserProfileRelatedByUserId($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinsfGuardUserRelatedByOwnerUserId(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol = (sfGuardUserProfilePeer::NUM_COLUMNS - sfGuardUserProfilePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(sfGuardUserProfilePeer::OWNER_USER_ID, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfGuardUserProfilePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByOwnerUserId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addsfGuardUserProfileRelatedByOwnerUserId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initsfGuardUserProfilesRelatedByOwnerUserId();
				$obj2->addsfGuardUserProfileRelatedByOwnerUserId($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinsfGuardUserRelatedByCreatedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol = (sfGuardUserProfilePeer::NUM_COLUMNS - sfGuardUserProfilePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(sfGuardUserProfilePeer::CREATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfGuardUserProfilePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addsfGuardUserProfileRelatedByCreatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initsfGuardUserProfilesRelatedByCreatedBy();
				$obj2->addsfGuardUserProfileRelatedByCreatedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinsfGuardUserRelatedByUpdatedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol = (sfGuardUserProfilePeer::NUM_COLUMNS - sfGuardUserProfilePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(sfGuardUserProfilePeer::UPDATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfGuardUserProfilePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addsfGuardUserProfileRelatedByUpdatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initsfGuardUserProfilesRelatedByUpdatedBy();
				$obj2->addsfGuardUserProfileRelatedByUpdatedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinsfGuardUserRelatedByDeletedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol = (sfGuardUserProfilePeer::NUM_COLUMNS - sfGuardUserProfilePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(sfGuardUserProfilePeer::DELETED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfGuardUserProfilePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addsfGuardUserProfileRelatedByDeletedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initsfGuardUserProfilesRelatedByDeletedBy();
				$obj2->addsfGuardUserProfileRelatedByDeletedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfGuardUserProfilePeer::USER_ID, sfGuardUserPeer::ID);

		$criteria->addJoin(sfGuardUserProfilePeer::OWNER_USER_ID, sfGuardUserPeer::ID);

		$criteria->addJoin(sfGuardUserProfilePeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(sfGuardUserProfilePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(sfGuardUserProfilePeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = sfGuardUserProfilePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol2 = (sfGuardUserProfilePeer::NUM_COLUMNS - sfGuardUserProfilePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(sfGuardUserProfilePeer::USER_ID, sfGuardUserPeer::ID);

		$c->addJoin(sfGuardUserProfilePeer::OWNER_USER_ID, sfGuardUserPeer::ID);

		$c->addJoin(sfGuardUserProfilePeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(sfGuardUserProfilePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(sfGuardUserProfilePeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfGuardUserProfilePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByUserId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addsfGuardUserProfileRelatedByUserId($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initsfGuardUserProfilesRelatedByUserId();
				$obj2->addsfGuardUserProfileRelatedByUserId($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserRelatedByOwnerUserId(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addsfGuardUserProfileRelatedByOwnerUserId($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initsfGuardUserProfilesRelatedByOwnerUserId();
				$obj3->addsfGuardUserProfileRelatedByOwnerUserId($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addsfGuardUserProfileRelatedByCreatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initsfGuardUserProfilesRelatedByCreatedBy();
				$obj4->addsfGuardUserProfileRelatedByCreatedBy($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addsfGuardUserProfileRelatedByUpdatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initsfGuardUserProfilesRelatedByUpdatedBy();
				$obj5->addsfGuardUserProfileRelatedByUpdatedBy($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addsfGuardUserProfileRelatedByDeletedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj6->initsfGuardUserProfilesRelatedByDeletedBy();
				$obj6->addsfGuardUserProfileRelatedByDeletedBy($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptsfGuardUserRelatedByUserId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = sfGuardUserProfilePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptsfGuardUserRelatedByOwnerUserId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = sfGuardUserProfilePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptsfGuardUserRelatedByCreatedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = sfGuardUserProfilePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptsfGuardUserRelatedByUpdatedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = sfGuardUserProfilePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptsfGuardUserRelatedByDeletedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = sfGuardUserProfilePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptsfGuardUserRelatedByUserId(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol2 = (sfGuardUserProfilePeer::NUM_COLUMNS - sfGuardUserProfilePeer::NUM_LAZY_LOAD_COLUMNS) + 1;


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfGuardUserProfilePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptsfGuardUserRelatedByOwnerUserId(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol2 = (sfGuardUserProfilePeer::NUM_COLUMNS - sfGuardUserProfilePeer::NUM_LAZY_LOAD_COLUMNS) + 1;


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfGuardUserProfilePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptsfGuardUserRelatedByCreatedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol2 = (sfGuardUserProfilePeer::NUM_COLUMNS - sfGuardUserProfilePeer::NUM_LAZY_LOAD_COLUMNS) + 1;


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfGuardUserProfilePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptsfGuardUserRelatedByUpdatedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol2 = (sfGuardUserProfilePeer::NUM_COLUMNS - sfGuardUserProfilePeer::NUM_LAZY_LOAD_COLUMNS) + 1;


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfGuardUserProfilePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptsfGuardUserRelatedByDeletedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol2 = (sfGuardUserProfilePeer::NUM_COLUMNS - sfGuardUserProfilePeer::NUM_LAZY_LOAD_COLUMNS) + 1;


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfGuardUserProfilePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return sfGuardUserProfilePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardUserProfilePeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfGuardUserProfilePeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(sfGuardUserProfilePeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BasesfGuardUserProfilePeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BasesfGuardUserProfilePeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardUserProfilePeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfGuardUserProfilePeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(sfGuardUserProfilePeer::ID);
			$selectCriteria->add(sfGuardUserProfilePeer::ID, $criteria->remove(sfGuardUserProfilePeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BasesfGuardUserProfilePeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BasesfGuardUserProfilePeer', $values, $con, $ret);
    }

    return $ret;
  }

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(sfGuardUserProfilePeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(sfGuardUserProfilePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof sfGuardUserProfile) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(sfGuardUserProfilePeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(sfGuardUserProfile $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(sfGuardUserProfilePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(sfGuardUserProfilePeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(sfGuardUserProfilePeer::DATABASE_NAME, sfGuardUserProfilePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = sfGuardUserProfilePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(sfGuardUserProfilePeer::DATABASE_NAME);

		$criteria->add(sfGuardUserProfilePeer::ID, $pk);


		$v = sfGuardUserProfilePeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(sfGuardUserProfilePeer::ID, $pks, Criteria::IN);
			$objs = sfGuardUserProfilePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

        
        public static function getBy($searchField, $value)
        {
            $searchField = strtolower($searchField);
            $basefieldNames = self::getFieldNames(BasePeer::TYPE_PHPNAME);
            $baseColumnNames = self::getFieldNames(BasePeer::TYPE_COLNAME);

            foreach($baseColumnNames as $key => $baseField)
            {
                if($searchField == strtolower($baseField))
                {
                    $c = new Criteria();
                    $test = $baseColumnNames[$key];
                    $c->add($baseColumnNames[$key], $value);
                    return self::doSelect($c);
                }
            }

            throw new sfException("Field name does not exist.");
        }
        
        
        public static function getOneBy($searchField, $value)
        {
            $searchField = strtolower($searchField);
            $basefieldNames = self::getFieldNames(BasePeer::TYPE_PHPNAME);
            $baseColumnNames = self::getFieldNames(BasePeer::TYPE_COLNAME);

            foreach($baseColumnNames as $key => $baseField)
            {
                if($searchField == strtolower($baseField))
                {
                    $c = new Criteria();
                    $c->add($baseColumnNames[$key], $value);
                    return self::doSelectOne($c);
                }
            }

            throw new sfException("Field name does not exist.");
        }
        
        public static function getPager($page, $max_items_per_page = null, $criteria = null)
        {

       if($criteria == null)
        $c = new Criteria();

                        if($max_items_per_page === null)
            {
                if(sfConfig::get('app_pager_default_max'))
                    $max_items_per_page =  sfConfig::get('app_pager_default_max');
                else
                    $max_items_per_page = 10;
            }

                        $pager = new sfPropelPager('sfGuardUserProfile', $max_items_per_page);
            $pager->setCriteria($c);
            $pager->setPage($page);
            $pager->init();

            return $pager;
         }
        
} 
if (Propel::isInit()) {
			try {
		BasesfGuardUserProfilePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/sfGuardUserProfileMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.sfGuardUserProfileMapBuilder');
}

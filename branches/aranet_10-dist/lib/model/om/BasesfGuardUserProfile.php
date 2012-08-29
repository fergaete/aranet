<?php


abstract class BasesfGuardUserProfile extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $user_id;


	
	protected $title;


	
	protected $public_title = true;


	
	protected $first_name;


	
	protected $public_first_name = false;


	
	protected $last_name;


	
	protected $public_last_name = false;


	
	protected $gender;


	
	protected $public_gender = false;


	
	protected $email;


	
	protected $public_email = false;


	
	protected $url;


	
	protected $public_url = false;


	
	protected $openid_url;


	
	protected $street;


	
	protected $public_street = false;


	
	protected $city;


	
	protected $public_city = false;


	
	protected $state;


	
	protected $public_state = false;


	
	protected $code;


	
	protected $public_code = false;


	
	protected $country = 'ES';


	
	protected $public_country = false;


	
	protected $timezone;


	
	protected $public_timezone = false;


	
	protected $birthday = 943916400;


	
	protected $public_birthday = false;


	
	protected $company;


	
	protected $public_company = false;


	
	protected $cif;


	
	protected $public_cif = false;


	
	protected $phone1;


	
	protected $public_phone1 = false;


	
	protected $phone2;


	
	protected $public_phone2 = false;


	
	protected $fax;


	
	protected $public_fax = false;


	
	protected $notes;


	
	protected $gravatar = false;


	
	protected $avatar;


	
	protected $avatar_filetype;


	
	protected $owner_user_id;


	
	protected $user_newsletter = false;


	
	protected $preferred_language = 'en_US';


	
	protected $created_at;


	
	protected $created_by = 0;


	
	protected $updated_at;


	
	protected $updated_by = 0;


	
	protected $deleted_at;


	
	protected $deleted_by = 0;

	
	protected $asfGuardUserRelatedByUserId;

	
	protected $asfGuardUserRelatedByOwnerUserId;

	
	protected $asfGuardUserRelatedByCreatedBy;

	
	protected $asfGuardUserRelatedByUpdatedBy;

	
	protected $asfGuardUserRelatedByDeletedBy;

	
	protected $collsfPropelFileStorageInfosRelatedByCreatedBy;

	
	protected $lastsfPropelFileStorageInfoRelatedByCreatedByCriteria = null;

	
	protected $collsfPropelFileStorageInfosRelatedByUpdatedBy;

	
	protected $lastsfPropelFileStorageInfoRelatedByUpdatedByCriteria = null;

	
	protected $collsfPropelFileStorageInfosRelatedByDeletedBy;

	
	protected $lastsfPropelFileStorageInfoRelatedByDeletedByCriteria = null;

	
	protected $collsfPropelFileStorageObjectsRelatedByCreatedBy;

	
	protected $lastsfPropelFileStorageObjectRelatedByCreatedByCriteria = null;

	
	protected $collsfPropelFileStorageObjectsRelatedByUpdatedBy;

	
	protected $lastsfPropelFileStorageObjectRelatedByUpdatedByCriteria = null;

	
	protected $collsfPropelFileStorageObjectsRelatedByDeletedBy;

	
	protected $lastsfPropelFileStorageObjectRelatedByDeletedByCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getPublicTitle()
	{

		return $this->public_title;
	}

	
	public function getFirstName()
	{

		return $this->first_name;
	}

	
	public function getPublicFirstName()
	{

		return $this->public_first_name;
	}

	
	public function getLastName()
	{

		return $this->last_name;
	}

	
	public function getPublicLastName()
	{

		return $this->public_last_name;
	}

	
	public function getGender()
	{

		return $this->gender;
	}

	
	public function getPublicGender()
	{

		return $this->public_gender;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getPublicEmail()
	{

		return $this->public_email;
	}

	
	public function getUrl()
	{

		return $this->url;
	}

	
	public function getPublicUrl()
	{

		return $this->public_url;
	}

	
	public function getOpenidUrl()
	{

		return $this->openid_url;
	}

	
	public function getStreet()
	{

		return $this->street;
	}

	
	public function getPublicStreet()
	{

		return $this->public_street;
	}

	
	public function getCity()
	{

		return $this->city;
	}

	
	public function getPublicCity()
	{

		return $this->public_city;
	}

	
	public function getState()
	{

		return $this->state;
	}

	
	public function getPublicState()
	{

		return $this->public_state;
	}

	
	public function getCode()
	{

		return $this->code;
	}

	
	public function getPublicCode()
	{

		return $this->public_code;
	}

	
	public function getCountry()
	{

		return $this->country;
	}

	
	public function getPublicCountry()
	{

		return $this->public_country;
	}

	
	public function getTimezone()
	{

		return $this->timezone;
	}

	
	public function getPublicTimezone()
	{

		return $this->public_timezone;
	}

	
	public function getBirthday($format = 'Y-m-d')
	{

		if ($this->birthday === null || $this->birthday === '') {
			return null;
		} elseif (!is_int($this->birthday)) {
						$ts = strtotime($this->birthday);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [birthday] as date/time value: " . var_export($this->birthday, true));
			}
		} else {
			$ts = $this->birthday;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getPublicBirthday()
	{

		return $this->public_birthday;
	}

	
	public function getCompany()
	{

		return $this->company;
	}

	
	public function getPublicCompany()
	{

		return $this->public_company;
	}

	
	public function getCif()
	{

		return $this->cif;
	}

	
	public function getPublicCif()
	{

		return $this->public_cif;
	}

	
	public function getPhone1()
	{

		return $this->phone1;
	}

	
	public function getPublicPhone1()
	{

		return $this->public_phone1;
	}

	
	public function getPhone2()
	{

		return $this->phone2;
	}

	
	public function getPublicPhone2()
	{

		return $this->public_phone2;
	}

	
	public function getFax()
	{

		return $this->fax;
	}

	
	public function getPublicFax()
	{

		return $this->public_fax;
	}

	
	public function getNotes()
	{

		return $this->notes;
	}

	
	public function getGravatar()
	{

		return $this->gravatar;
	}

	
	public function getAvatar()
	{

		return $this->avatar;
	}

	
	public function getAvatarFiletype()
	{

		return $this->avatar_filetype;
	}

	
	public function getOwnerUserId()
	{

		return $this->owner_user_id;
	}

	
	public function getUserNewsletter()
	{

		return $this->user_newsletter;
	}

	
	public function getPreferredLanguage()
	{

		return $this->preferred_language;
	}

	
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->created_at === null || $this->created_at === '') {
			return null;
		} elseif (!is_int($this->created_at)) {
						$ts = strtotime($this->created_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
			}
		} else {
			$ts = $this->created_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getCreatedBy()
	{

		return $this->created_by;
	}

	
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->updated_at === null || $this->updated_at === '') {
			return null;
		} elseif (!is_int($this->updated_at)) {
						$ts = strtotime($this->updated_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [updated_at] as date/time value: " . var_export($this->updated_at, true));
			}
		} else {
			$ts = $this->updated_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getUpdatedBy()
	{

		return $this->updated_by;
	}

	
	public function getDeletedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->deleted_at === null || $this->deleted_at === '') {
			return null;
		} elseif (!is_int($this->deleted_at)) {
						$ts = strtotime($this->deleted_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [deleted_at] as date/time value: " . var_export($this->deleted_at, true));
			}
		} else {
			$ts = $this->deleted_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDeletedBy()
	{

		return $this->deleted_by;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::ID;
		}

	} 
	
	public function setUserId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::USER_ID;
		}

		if ($this->asfGuardUserRelatedByUserId !== null && $this->asfGuardUserRelatedByUserId->getId() !== $v) {
			$this->asfGuardUserRelatedByUserId = null;
		}

	} 
	
	public function setTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::TITLE;
		}

	} 
	
	public function setPublicTitle($v)
	{

		if ($this->public_title !== $v || $v === true) {
			$this->public_title = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::PUBLIC_TITLE;
		}

	} 
	
	public function setFirstName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->first_name !== $v) {
			$this->first_name = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::FIRST_NAME;
		}

	} 
	
	public function setPublicFirstName($v)
	{

		if ($this->public_first_name !== $v || $v === false) {
			$this->public_first_name = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::PUBLIC_FIRST_NAME;
		}

	} 
	
	public function setLastName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->last_name !== $v) {
			$this->last_name = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::LAST_NAME;
		}

	} 
	
	public function setPublicLastName($v)
	{

		if ($this->public_last_name !== $v || $v === false) {
			$this->public_last_name = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::PUBLIC_LAST_NAME;
		}

	} 
	
	public function setGender($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->gender !== $v) {
			$this->gender = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::GENDER;
		}

	} 
	
	public function setPublicGender($v)
	{

		if ($this->public_gender !== $v || $v === false) {
			$this->public_gender = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::PUBLIC_GENDER;
		}

	} 
	
	public function setEmail($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::EMAIL;
		}

	} 
	
	public function setPublicEmail($v)
	{

		if ($this->public_email !== $v || $v === false) {
			$this->public_email = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::PUBLIC_EMAIL;
		}

	} 
	
	public function setUrl($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->url !== $v) {
			$this->url = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::URL;
		}

	} 
	
	public function setPublicUrl($v)
	{

		if ($this->public_url !== $v || $v === false) {
			$this->public_url = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::PUBLIC_URL;
		}

	} 
	
	public function setOpenidUrl($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->openid_url !== $v) {
			$this->openid_url = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::OPENID_URL;
		}

	} 
	
	public function setStreet($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->street !== $v) {
			$this->street = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::STREET;
		}

	} 
	
	public function setPublicStreet($v)
	{

		if ($this->public_street !== $v || $v === false) {
			$this->public_street = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::PUBLIC_STREET;
		}

	} 
	
	public function setCity($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->city !== $v) {
			$this->city = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::CITY;
		}

	} 
	
	public function setPublicCity($v)
	{

		if ($this->public_city !== $v || $v === false) {
			$this->public_city = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::PUBLIC_CITY;
		}

	} 
	
	public function setState($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->state !== $v) {
			$this->state = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::STATE;
		}

	} 
	
	public function setPublicState($v)
	{

		if ($this->public_state !== $v || $v === false) {
			$this->public_state = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::PUBLIC_STATE;
		}

	} 
	
	public function setCode($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->code !== $v) {
			$this->code = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::CODE;
		}

	} 
	
	public function setPublicCode($v)
	{

		if ($this->public_code !== $v || $v === false) {
			$this->public_code = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::PUBLIC_CODE;
		}

	} 
	
	public function setCountry($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->country !== $v || $v === 'ES') {
			$this->country = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::COUNTRY;
		}

	} 
	
	public function setPublicCountry($v)
	{

		if ($this->public_country !== $v || $v === false) {
			$this->public_country = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::PUBLIC_COUNTRY;
		}

	} 
	
	public function setTimezone($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->timezone !== $v) {
			$this->timezone = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::TIMEZONE;
		}

	} 
	
	public function setPublicTimezone($v)
	{

		if ($this->public_timezone !== $v || $v === false) {
			$this->public_timezone = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::PUBLIC_TIMEZONE;
		}

	} 
	
	public function setBirthday($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [birthday] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->birthday !== $ts || $ts === 943916400) {
			$this->birthday = $ts;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::BIRTHDAY;
		}

	} 
	
	public function setPublicBirthday($v)
	{

		if ($this->public_birthday !== $v || $v === false) {
			$this->public_birthday = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::PUBLIC_BIRTHDAY;
		}

	} 
	
	public function setCompany($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->company !== $v) {
			$this->company = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::COMPANY;
		}

	} 
	
	public function setPublicCompany($v)
	{

		if ($this->public_company !== $v || $v === false) {
			$this->public_company = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::PUBLIC_COMPANY;
		}

	} 
	
	public function setCif($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->cif !== $v) {
			$this->cif = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::CIF;
		}

	} 
	
	public function setPublicCif($v)
	{

		if ($this->public_cif !== $v || $v === false) {
			$this->public_cif = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::PUBLIC_CIF;
		}

	} 
	
	public function setPhone1($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->phone1 !== $v) {
			$this->phone1 = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::PHONE1;
		}

	} 
	
	public function setPublicPhone1($v)
	{

		if ($this->public_phone1 !== $v || $v === false) {
			$this->public_phone1 = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::PUBLIC_PHONE1;
		}

	} 
	
	public function setPhone2($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->phone2 !== $v) {
			$this->phone2 = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::PHONE2;
		}

	} 
	
	public function setPublicPhone2($v)
	{

		if ($this->public_phone2 !== $v || $v === false) {
			$this->public_phone2 = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::PUBLIC_PHONE2;
		}

	} 
	
	public function setFax($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->fax !== $v) {
			$this->fax = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::FAX;
		}

	} 
	
	public function setPublicFax($v)
	{

		if ($this->public_fax !== $v || $v === false) {
			$this->public_fax = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::PUBLIC_FAX;
		}

	} 
	
	public function setNotes($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->notes !== $v) {
			$this->notes = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::NOTES;
		}

	} 
	
	public function setGravatar($v)
	{

		if ($this->gravatar !== $v || $v === false) {
			$this->gravatar = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::GRAVATAR;
		}

	} 
	
	public function setAvatar($v)
	{

								if ($v instanceof Lob && $v === $this->avatar) {
			$changed = $v->isModified();
		} else {
			$changed = ($this->avatar !== $v);
		}
		if ($changed) {
			if ( !($v instanceof Lob) ) {
				$obj = new Blob();
				$obj->setContents($v);
			} else {
				$obj = $v;
			}
			$this->avatar = $obj;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::AVATAR;
		}

	} 
	
	public function setAvatarFiletype($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->avatar_filetype !== $v) {
			$this->avatar_filetype = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::AVATAR_FILETYPE;
		}

	} 
	
	public function setOwnerUserId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->owner_user_id !== $v) {
			$this->owner_user_id = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::OWNER_USER_ID;
		}

		if ($this->asfGuardUserRelatedByOwnerUserId !== null && $this->asfGuardUserRelatedByOwnerUserId->getId() !== $v) {
			$this->asfGuardUserRelatedByOwnerUserId = null;
		}

	} 
	
	public function setUserNewsletter($v)
	{

		if ($this->user_newsletter !== $v || $v === false) {
			$this->user_newsletter = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::USER_NEWSLETTER;
		}

	} 
	
	public function setPreferredLanguage($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->preferred_language !== $v || $v === 'en_US') {
			$this->preferred_language = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::PREFERRED_LANGUAGE;
		}

	} 
	
	public function setCreatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->created_at !== $ts) {
			$this->created_at = $ts;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::CREATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v || $v === 0) {
			$this->created_by = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::CREATED_BY;
		}

		if ($this->asfGuardUserRelatedByCreatedBy !== null && $this->asfGuardUserRelatedByCreatedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByCreatedBy = null;
		}

	} 
	
	public function setUpdatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [updated_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->updated_at !== $ts) {
			$this->updated_at = $ts;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v || $v === 0) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::UPDATED_BY;
		}

		if ($this->asfGuardUserRelatedByUpdatedBy !== null && $this->asfGuardUserRelatedByUpdatedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByUpdatedBy = null;
		}

	} 
	
	public function setDeletedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [deleted_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->deleted_at !== $ts) {
			$this->deleted_at = $ts;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::DELETED_AT;
		}

	} 
	
	public function setDeletedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->deleted_by !== $v || $v === 0) {
			$this->deleted_by = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::DELETED_BY;
		}

		if ($this->asfGuardUserRelatedByDeletedBy !== null && $this->asfGuardUserRelatedByDeletedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByDeletedBy = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->user_id = $rs->getInt($startcol + 1);

			$this->title = $rs->getString($startcol + 2);

			$this->public_title = $rs->getBoolean($startcol + 3);

			$this->first_name = $rs->getString($startcol + 4);

			$this->public_first_name = $rs->getBoolean($startcol + 5);

			$this->last_name = $rs->getString($startcol + 6);

			$this->public_last_name = $rs->getBoolean($startcol + 7);

			$this->gender = $rs->getInt($startcol + 8);

			$this->public_gender = $rs->getBoolean($startcol + 9);

			$this->email = $rs->getString($startcol + 10);

			$this->public_email = $rs->getBoolean($startcol + 11);

			$this->url = $rs->getString($startcol + 12);

			$this->public_url = $rs->getBoolean($startcol + 13);

			$this->openid_url = $rs->getString($startcol + 14);

			$this->street = $rs->getString($startcol + 15);

			$this->public_street = $rs->getBoolean($startcol + 16);

			$this->city = $rs->getString($startcol + 17);

			$this->public_city = $rs->getBoolean($startcol + 18);

			$this->state = $rs->getString($startcol + 19);

			$this->public_state = $rs->getBoolean($startcol + 20);

			$this->code = $rs->getInt($startcol + 21);

			$this->public_code = $rs->getBoolean($startcol + 22);

			$this->country = $rs->getString($startcol + 23);

			$this->public_country = $rs->getBoolean($startcol + 24);

			$this->timezone = $rs->getInt($startcol + 25);

			$this->public_timezone = $rs->getBoolean($startcol + 26);

			$this->birthday = $rs->getDate($startcol + 27, null);

			$this->public_birthday = $rs->getBoolean($startcol + 28);

			$this->company = $rs->getString($startcol + 29);

			$this->public_company = $rs->getBoolean($startcol + 30);

			$this->cif = $rs->getString($startcol + 31);

			$this->public_cif = $rs->getBoolean($startcol + 32);

			$this->phone1 = $rs->getString($startcol + 33);

			$this->public_phone1 = $rs->getBoolean($startcol + 34);

			$this->phone2 = $rs->getString($startcol + 35);

			$this->public_phone2 = $rs->getBoolean($startcol + 36);

			$this->fax = $rs->getString($startcol + 37);

			$this->public_fax = $rs->getBoolean($startcol + 38);

			$this->notes = $rs->getString($startcol + 39);

			$this->gravatar = $rs->getBoolean($startcol + 40);

			$this->avatar = $rs->getBlob($startcol + 41);

			$this->avatar_filetype = $rs->getString($startcol + 42);

			$this->owner_user_id = $rs->getInt($startcol + 43);

			$this->user_newsletter = $rs->getBoolean($startcol + 44);

			$this->preferred_language = $rs->getString($startcol + 45);

			$this->created_at = $rs->getTimestamp($startcol + 46, null);

			$this->created_by = $rs->getInt($startcol + 47);

			$this->updated_at = $rs->getTimestamp($startcol + 48, null);

			$this->updated_by = $rs->getInt($startcol + 49);

			$this->deleted_at = $rs->getTimestamp($startcol + 50, null);

			$this->deleted_by = $rs->getInt($startcol + 51);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 52; 
		} catch (Exception $e) {
			throw new PropelException("Error populating sfGuardUserProfile object", $e);
		}
	}

	
	public function delete($con = null)
	{
                    if (!$this->isColumnModified('deleted_by'))
                    {
                        $user = sfContext::getInstance()->getUser();
                        if ($user instanceof sfGuardSecurityUser)
                        {
                            if ($user->getGuardUser() instanceof sfGuardUser)
                                $this->setDeletedBy($user->getGuardUser()->getId());
                            else
                                $this->setDeletedBy(null);
                        }
                    }
                

    foreach (sfMixer::getCallables('BasesfGuardUserProfile:delete:pre') as $callable)
    {
      $ret = call_user_func($callable, $this, $con);
      if ($ret)
      {
        return;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(sfGuardUserProfilePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			sfGuardUserProfilePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasesfGuardUserProfile:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{
                    if ($this->isNew() && !$this->isColumnModified('created_by'))
                    {
                        $user = sfContext::getInstance()->getUser();
                        if ($user instanceof sfGuardSecurityUser)
                        {
                            if ($user->getGuardUser() instanceof sfGuardUser)
                                $this->setCreatedBy($user->getGuardUser()->getId());
                            else
                                $this->setCreatedBy(null);
                        }
                    }
                
                    if ($this->isModified() && !$this->isColumnModified('updated_by'))
                    {
                        $user = sfContext::getInstance()->getUser();
                        if ($user instanceof sfGuardSecurityUser)
                        {
                            if ($user->getGuardUser() instanceof sfGuardUser)
                                $this->setUpdatedBy($user->getGuardUser()->getId());
                            else
                                $this->setUpdatedBy(null);
                        }
                    }
                

    foreach (sfMixer::getCallables('BasesfGuardUserProfile:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(sfGuardUserProfilePeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(sfGuardUserProfilePeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(sfGuardUserProfilePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasesfGuardUserProfile:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


												
			if ($this->asfGuardUserRelatedByUserId !== null) {
				if ($this->asfGuardUserRelatedByUserId->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByUserId->save($con);
				}
				$this->setsfGuardUserRelatedByUserId($this->asfGuardUserRelatedByUserId);
			}

			if ($this->asfGuardUserRelatedByOwnerUserId !== null) {
				if ($this->asfGuardUserRelatedByOwnerUserId->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByOwnerUserId->save($con);
				}
				$this->setsfGuardUserRelatedByOwnerUserId($this->asfGuardUserRelatedByOwnerUserId);
			}

			if ($this->asfGuardUserRelatedByCreatedBy !== null) {
				if ($this->asfGuardUserRelatedByCreatedBy->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByCreatedBy->save($con);
				}
				$this->setsfGuardUserRelatedByCreatedBy($this->asfGuardUserRelatedByCreatedBy);
			}

			if ($this->asfGuardUserRelatedByUpdatedBy !== null) {
				if ($this->asfGuardUserRelatedByUpdatedBy->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByUpdatedBy->save($con);
				}
				$this->setsfGuardUserRelatedByUpdatedBy($this->asfGuardUserRelatedByUpdatedBy);
			}

			if ($this->asfGuardUserRelatedByDeletedBy !== null) {
				if ($this->asfGuardUserRelatedByDeletedBy->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByDeletedBy->save($con);
				}
				$this->setsfGuardUserRelatedByDeletedBy($this->asfGuardUserRelatedByDeletedBy);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = sfGuardUserProfilePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += sfGuardUserProfilePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collsfPropelFileStorageInfosRelatedByCreatedBy !== null) {
				foreach($this->collsfPropelFileStorageInfosRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfPropelFileStorageInfosRelatedByUpdatedBy !== null) {
				foreach($this->collsfPropelFileStorageInfosRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfPropelFileStorageInfosRelatedByDeletedBy !== null) {
				foreach($this->collsfPropelFileStorageInfosRelatedByDeletedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfPropelFileStorageObjectsRelatedByCreatedBy !== null) {
				foreach($this->collsfPropelFileStorageObjectsRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfPropelFileStorageObjectsRelatedByUpdatedBy !== null) {
				foreach($this->collsfPropelFileStorageObjectsRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfPropelFileStorageObjectsRelatedByDeletedBy !== null) {
				foreach($this->collsfPropelFileStorageObjectsRelatedByDeletedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->asfGuardUserRelatedByUserId !== null) {
				if (!$this->asfGuardUserRelatedByUserId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByUserId->getValidationFailures());
				}
			}

			if ($this->asfGuardUserRelatedByOwnerUserId !== null) {
				if (!$this->asfGuardUserRelatedByOwnerUserId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByOwnerUserId->getValidationFailures());
				}
			}

			if ($this->asfGuardUserRelatedByCreatedBy !== null) {
				if (!$this->asfGuardUserRelatedByCreatedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByCreatedBy->getValidationFailures());
				}
			}

			if ($this->asfGuardUserRelatedByUpdatedBy !== null) {
				if (!$this->asfGuardUserRelatedByUpdatedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByUpdatedBy->getValidationFailures());
				}
			}

			if ($this->asfGuardUserRelatedByDeletedBy !== null) {
				if (!$this->asfGuardUserRelatedByDeletedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByDeletedBy->getValidationFailures());
				}
			}


			if (($retval = sfGuardUserProfilePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collsfPropelFileStorageInfosRelatedByCreatedBy !== null) {
					foreach($this->collsfPropelFileStorageInfosRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfPropelFileStorageInfosRelatedByUpdatedBy !== null) {
					foreach($this->collsfPropelFileStorageInfosRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfPropelFileStorageInfosRelatedByDeletedBy !== null) {
					foreach($this->collsfPropelFileStorageInfosRelatedByDeletedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfPropelFileStorageObjectsRelatedByCreatedBy !== null) {
					foreach($this->collsfPropelFileStorageObjectsRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfPropelFileStorageObjectsRelatedByUpdatedBy !== null) {
					foreach($this->collsfPropelFileStorageObjectsRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfPropelFileStorageObjectsRelatedByDeletedBy !== null) {
					foreach($this->collsfPropelFileStorageObjectsRelatedByDeletedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfGuardUserProfilePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getUserId();
				break;
			case 2:
				return $this->getTitle();
				break;
			case 3:
				return $this->getPublicTitle();
				break;
			case 4:
				return $this->getFirstName();
				break;
			case 5:
				return $this->getPublicFirstName();
				break;
			case 6:
				return $this->getLastName();
				break;
			case 7:
				return $this->getPublicLastName();
				break;
			case 8:
				return $this->getGender();
				break;
			case 9:
				return $this->getPublicGender();
				break;
			case 10:
				return $this->getEmail();
				break;
			case 11:
				return $this->getPublicEmail();
				break;
			case 12:
				return $this->getUrl();
				break;
			case 13:
				return $this->getPublicUrl();
				break;
			case 14:
				return $this->getOpenidUrl();
				break;
			case 15:
				return $this->getStreet();
				break;
			case 16:
				return $this->getPublicStreet();
				break;
			case 17:
				return $this->getCity();
				break;
			case 18:
				return $this->getPublicCity();
				break;
			case 19:
				return $this->getState();
				break;
			case 20:
				return $this->getPublicState();
				break;
			case 21:
				return $this->getCode();
				break;
			case 22:
				return $this->getPublicCode();
				break;
			case 23:
				return $this->getCountry();
				break;
			case 24:
				return $this->getPublicCountry();
				break;
			case 25:
				return $this->getTimezone();
				break;
			case 26:
				return $this->getPublicTimezone();
				break;
			case 27:
				return $this->getBirthday();
				break;
			case 28:
				return $this->getPublicBirthday();
				break;
			case 29:
				return $this->getCompany();
				break;
			case 30:
				return $this->getPublicCompany();
				break;
			case 31:
				return $this->getCif();
				break;
			case 32:
				return $this->getPublicCif();
				break;
			case 33:
				return $this->getPhone1();
				break;
			case 34:
				return $this->getPublicPhone1();
				break;
			case 35:
				return $this->getPhone2();
				break;
			case 36:
				return $this->getPublicPhone2();
				break;
			case 37:
				return $this->getFax();
				break;
			case 38:
				return $this->getPublicFax();
				break;
			case 39:
				return $this->getNotes();
				break;
			case 40:
				return $this->getGravatar();
				break;
			case 41:
				return $this->getAvatar();
				break;
			case 42:
				return $this->getAvatarFiletype();
				break;
			case 43:
				return $this->getOwnerUserId();
				break;
			case 44:
				return $this->getUserNewsletter();
				break;
			case 45:
				return $this->getPreferredLanguage();
				break;
			case 46:
				return $this->getCreatedAt();
				break;
			case 47:
				return $this->getCreatedBy();
				break;
			case 48:
				return $this->getUpdatedAt();
				break;
			case 49:
				return $this->getUpdatedBy();
				break;
			case 50:
				return $this->getDeletedAt();
				break;
			case 51:
				return $this->getDeletedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfGuardUserProfilePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUserId(),
			$keys[2] => $this->getTitle(),
			$keys[3] => $this->getPublicTitle(),
			$keys[4] => $this->getFirstName(),
			$keys[5] => $this->getPublicFirstName(),
			$keys[6] => $this->getLastName(),
			$keys[7] => $this->getPublicLastName(),
			$keys[8] => $this->getGender(),
			$keys[9] => $this->getPublicGender(),
			$keys[10] => $this->getEmail(),
			$keys[11] => $this->getPublicEmail(),
			$keys[12] => $this->getUrl(),
			$keys[13] => $this->getPublicUrl(),
			$keys[14] => $this->getOpenidUrl(),
			$keys[15] => $this->getStreet(),
			$keys[16] => $this->getPublicStreet(),
			$keys[17] => $this->getCity(),
			$keys[18] => $this->getPublicCity(),
			$keys[19] => $this->getState(),
			$keys[20] => $this->getPublicState(),
			$keys[21] => $this->getCode(),
			$keys[22] => $this->getPublicCode(),
			$keys[23] => $this->getCountry(),
			$keys[24] => $this->getPublicCountry(),
			$keys[25] => $this->getTimezone(),
			$keys[26] => $this->getPublicTimezone(),
			$keys[27] => $this->getBirthday(),
			$keys[28] => $this->getPublicBirthday(),
			$keys[29] => $this->getCompany(),
			$keys[30] => $this->getPublicCompany(),
			$keys[31] => $this->getCif(),
			$keys[32] => $this->getPublicCif(),
			$keys[33] => $this->getPhone1(),
			$keys[34] => $this->getPublicPhone1(),
			$keys[35] => $this->getPhone2(),
			$keys[36] => $this->getPublicPhone2(),
			$keys[37] => $this->getFax(),
			$keys[38] => $this->getPublicFax(),
			$keys[39] => $this->getNotes(),
			$keys[40] => $this->getGravatar(),
			$keys[41] => $this->getAvatar(),
			$keys[42] => $this->getAvatarFiletype(),
			$keys[43] => $this->getOwnerUserId(),
			$keys[44] => $this->getUserNewsletter(),
			$keys[45] => $this->getPreferredLanguage(),
			$keys[46] => $this->getCreatedAt(),
			$keys[47] => $this->getCreatedBy(),
			$keys[48] => $this->getUpdatedAt(),
			$keys[49] => $this->getUpdatedBy(),
			$keys[50] => $this->getDeletedAt(),
			$keys[51] => $this->getDeletedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfGuardUserProfilePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setUserId($value);
				break;
			case 2:
				$this->setTitle($value);
				break;
			case 3:
				$this->setPublicTitle($value);
				break;
			case 4:
				$this->setFirstName($value);
				break;
			case 5:
				$this->setPublicFirstName($value);
				break;
			case 6:
				$this->setLastName($value);
				break;
			case 7:
				$this->setPublicLastName($value);
				break;
			case 8:
				$this->setGender($value);
				break;
			case 9:
				$this->setPublicGender($value);
				break;
			case 10:
				$this->setEmail($value);
				break;
			case 11:
				$this->setPublicEmail($value);
				break;
			case 12:
				$this->setUrl($value);
				break;
			case 13:
				$this->setPublicUrl($value);
				break;
			case 14:
				$this->setOpenidUrl($value);
				break;
			case 15:
				$this->setStreet($value);
				break;
			case 16:
				$this->setPublicStreet($value);
				break;
			case 17:
				$this->setCity($value);
				break;
			case 18:
				$this->setPublicCity($value);
				break;
			case 19:
				$this->setState($value);
				break;
			case 20:
				$this->setPublicState($value);
				break;
			case 21:
				$this->setCode($value);
				break;
			case 22:
				$this->setPublicCode($value);
				break;
			case 23:
				$this->setCountry($value);
				break;
			case 24:
				$this->setPublicCountry($value);
				break;
			case 25:
				$this->setTimezone($value);
				break;
			case 26:
				$this->setPublicTimezone($value);
				break;
			case 27:
				$this->setBirthday($value);
				break;
			case 28:
				$this->setPublicBirthday($value);
				break;
			case 29:
				$this->setCompany($value);
				break;
			case 30:
				$this->setPublicCompany($value);
				break;
			case 31:
				$this->setCif($value);
				break;
			case 32:
				$this->setPublicCif($value);
				break;
			case 33:
				$this->setPhone1($value);
				break;
			case 34:
				$this->setPublicPhone1($value);
				break;
			case 35:
				$this->setPhone2($value);
				break;
			case 36:
				$this->setPublicPhone2($value);
				break;
			case 37:
				$this->setFax($value);
				break;
			case 38:
				$this->setPublicFax($value);
				break;
			case 39:
				$this->setNotes($value);
				break;
			case 40:
				$this->setGravatar($value);
				break;
			case 41:
				$this->setAvatar($value);
				break;
			case 42:
				$this->setAvatarFiletype($value);
				break;
			case 43:
				$this->setOwnerUserId($value);
				break;
			case 44:
				$this->setUserNewsletter($value);
				break;
			case 45:
				$this->setPreferredLanguage($value);
				break;
			case 46:
				$this->setCreatedAt($value);
				break;
			case 47:
				$this->setCreatedBy($value);
				break;
			case 48:
				$this->setUpdatedAt($value);
				break;
			case 49:
				$this->setUpdatedBy($value);
				break;
			case 50:
				$this->setDeletedAt($value);
				break;
			case 51:
				$this->setDeletedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfGuardUserProfilePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUserId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTitle($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPublicTitle($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFirstName($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPublicFirstName($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setLastName($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPublicLastName($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setGender($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setPublicGender($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setEmail($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setPublicEmail($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setUrl($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setPublicUrl($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setOpenidUrl($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setStreet($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setPublicStreet($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCity($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setPublicCity($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setState($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setPublicState($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCode($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setPublicCode($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCountry($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setPublicCountry($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setTimezone($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setPublicTimezone($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setBirthday($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setPublicBirthday($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setCompany($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setPublicCompany($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setCif($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setPublicCif($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setPhone1($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setPublicPhone1($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setPhone2($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setPublicPhone2($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setFax($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setPublicFax($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setNotes($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setGravatar($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setAvatar($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setAvatarFiletype($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setOwnerUserId($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setUserNewsletter($arr[$keys[44]]);
		if (array_key_exists($keys[45], $arr)) $this->setPreferredLanguage($arr[$keys[45]]);
		if (array_key_exists($keys[46], $arr)) $this->setCreatedAt($arr[$keys[46]]);
		if (array_key_exists($keys[47], $arr)) $this->setCreatedBy($arr[$keys[47]]);
		if (array_key_exists($keys[48], $arr)) $this->setUpdatedAt($arr[$keys[48]]);
		if (array_key_exists($keys[49], $arr)) $this->setUpdatedBy($arr[$keys[49]]);
		if (array_key_exists($keys[50], $arr)) $this->setDeletedAt($arr[$keys[50]]);
		if (array_key_exists($keys[51], $arr)) $this->setDeletedBy($arr[$keys[51]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(sfGuardUserProfilePeer::DATABASE_NAME);

		if ($this->isColumnModified(sfGuardUserProfilePeer::ID)) $criteria->add(sfGuardUserProfilePeer::ID, $this->id);
		if ($this->isColumnModified(sfGuardUserProfilePeer::USER_ID)) $criteria->add(sfGuardUserProfilePeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(sfGuardUserProfilePeer::TITLE)) $criteria->add(sfGuardUserProfilePeer::TITLE, $this->title);
		if ($this->isColumnModified(sfGuardUserProfilePeer::PUBLIC_TITLE)) $criteria->add(sfGuardUserProfilePeer::PUBLIC_TITLE, $this->public_title);
		if ($this->isColumnModified(sfGuardUserProfilePeer::FIRST_NAME)) $criteria->add(sfGuardUserProfilePeer::FIRST_NAME, $this->first_name);
		if ($this->isColumnModified(sfGuardUserProfilePeer::PUBLIC_FIRST_NAME)) $criteria->add(sfGuardUserProfilePeer::PUBLIC_FIRST_NAME, $this->public_first_name);
		if ($this->isColumnModified(sfGuardUserProfilePeer::LAST_NAME)) $criteria->add(sfGuardUserProfilePeer::LAST_NAME, $this->last_name);
		if ($this->isColumnModified(sfGuardUserProfilePeer::PUBLIC_LAST_NAME)) $criteria->add(sfGuardUserProfilePeer::PUBLIC_LAST_NAME, $this->public_last_name);
		if ($this->isColumnModified(sfGuardUserProfilePeer::GENDER)) $criteria->add(sfGuardUserProfilePeer::GENDER, $this->gender);
		if ($this->isColumnModified(sfGuardUserProfilePeer::PUBLIC_GENDER)) $criteria->add(sfGuardUserProfilePeer::PUBLIC_GENDER, $this->public_gender);
		if ($this->isColumnModified(sfGuardUserProfilePeer::EMAIL)) $criteria->add(sfGuardUserProfilePeer::EMAIL, $this->email);
		if ($this->isColumnModified(sfGuardUserProfilePeer::PUBLIC_EMAIL)) $criteria->add(sfGuardUserProfilePeer::PUBLIC_EMAIL, $this->public_email);
		if ($this->isColumnModified(sfGuardUserProfilePeer::URL)) $criteria->add(sfGuardUserProfilePeer::URL, $this->url);
		if ($this->isColumnModified(sfGuardUserProfilePeer::PUBLIC_URL)) $criteria->add(sfGuardUserProfilePeer::PUBLIC_URL, $this->public_url);
		if ($this->isColumnModified(sfGuardUserProfilePeer::OPENID_URL)) $criteria->add(sfGuardUserProfilePeer::OPENID_URL, $this->openid_url);
		if ($this->isColumnModified(sfGuardUserProfilePeer::STREET)) $criteria->add(sfGuardUserProfilePeer::STREET, $this->street);
		if ($this->isColumnModified(sfGuardUserProfilePeer::PUBLIC_STREET)) $criteria->add(sfGuardUserProfilePeer::PUBLIC_STREET, $this->public_street);
		if ($this->isColumnModified(sfGuardUserProfilePeer::CITY)) $criteria->add(sfGuardUserProfilePeer::CITY, $this->city);
		if ($this->isColumnModified(sfGuardUserProfilePeer::PUBLIC_CITY)) $criteria->add(sfGuardUserProfilePeer::PUBLIC_CITY, $this->public_city);
		if ($this->isColumnModified(sfGuardUserProfilePeer::STATE)) $criteria->add(sfGuardUserProfilePeer::STATE, $this->state);
		if ($this->isColumnModified(sfGuardUserProfilePeer::PUBLIC_STATE)) $criteria->add(sfGuardUserProfilePeer::PUBLIC_STATE, $this->public_state);
		if ($this->isColumnModified(sfGuardUserProfilePeer::CODE)) $criteria->add(sfGuardUserProfilePeer::CODE, $this->code);
		if ($this->isColumnModified(sfGuardUserProfilePeer::PUBLIC_CODE)) $criteria->add(sfGuardUserProfilePeer::PUBLIC_CODE, $this->public_code);
		if ($this->isColumnModified(sfGuardUserProfilePeer::COUNTRY)) $criteria->add(sfGuardUserProfilePeer::COUNTRY, $this->country);
		if ($this->isColumnModified(sfGuardUserProfilePeer::PUBLIC_COUNTRY)) $criteria->add(sfGuardUserProfilePeer::PUBLIC_COUNTRY, $this->public_country);
		if ($this->isColumnModified(sfGuardUserProfilePeer::TIMEZONE)) $criteria->add(sfGuardUserProfilePeer::TIMEZONE, $this->timezone);
		if ($this->isColumnModified(sfGuardUserProfilePeer::PUBLIC_TIMEZONE)) $criteria->add(sfGuardUserProfilePeer::PUBLIC_TIMEZONE, $this->public_timezone);
		if ($this->isColumnModified(sfGuardUserProfilePeer::BIRTHDAY)) $criteria->add(sfGuardUserProfilePeer::BIRTHDAY, $this->birthday);
		if ($this->isColumnModified(sfGuardUserProfilePeer::PUBLIC_BIRTHDAY)) $criteria->add(sfGuardUserProfilePeer::PUBLIC_BIRTHDAY, $this->public_birthday);
		if ($this->isColumnModified(sfGuardUserProfilePeer::COMPANY)) $criteria->add(sfGuardUserProfilePeer::COMPANY, $this->company);
		if ($this->isColumnModified(sfGuardUserProfilePeer::PUBLIC_COMPANY)) $criteria->add(sfGuardUserProfilePeer::PUBLIC_COMPANY, $this->public_company);
		if ($this->isColumnModified(sfGuardUserProfilePeer::CIF)) $criteria->add(sfGuardUserProfilePeer::CIF, $this->cif);
		if ($this->isColumnModified(sfGuardUserProfilePeer::PUBLIC_CIF)) $criteria->add(sfGuardUserProfilePeer::PUBLIC_CIF, $this->public_cif);
		if ($this->isColumnModified(sfGuardUserProfilePeer::PHONE1)) $criteria->add(sfGuardUserProfilePeer::PHONE1, $this->phone1);
		if ($this->isColumnModified(sfGuardUserProfilePeer::PUBLIC_PHONE1)) $criteria->add(sfGuardUserProfilePeer::PUBLIC_PHONE1, $this->public_phone1);
		if ($this->isColumnModified(sfGuardUserProfilePeer::PHONE2)) $criteria->add(sfGuardUserProfilePeer::PHONE2, $this->phone2);
		if ($this->isColumnModified(sfGuardUserProfilePeer::PUBLIC_PHONE2)) $criteria->add(sfGuardUserProfilePeer::PUBLIC_PHONE2, $this->public_phone2);
		if ($this->isColumnModified(sfGuardUserProfilePeer::FAX)) $criteria->add(sfGuardUserProfilePeer::FAX, $this->fax);
		if ($this->isColumnModified(sfGuardUserProfilePeer::PUBLIC_FAX)) $criteria->add(sfGuardUserProfilePeer::PUBLIC_FAX, $this->public_fax);
		if ($this->isColumnModified(sfGuardUserProfilePeer::NOTES)) $criteria->add(sfGuardUserProfilePeer::NOTES, $this->notes);
		if ($this->isColumnModified(sfGuardUserProfilePeer::GRAVATAR)) $criteria->add(sfGuardUserProfilePeer::GRAVATAR, $this->gravatar);
		if ($this->isColumnModified(sfGuardUserProfilePeer::AVATAR)) $criteria->add(sfGuardUserProfilePeer::AVATAR, $this->avatar);
		if ($this->isColumnModified(sfGuardUserProfilePeer::AVATAR_FILETYPE)) $criteria->add(sfGuardUserProfilePeer::AVATAR_FILETYPE, $this->avatar_filetype);
		if ($this->isColumnModified(sfGuardUserProfilePeer::OWNER_USER_ID)) $criteria->add(sfGuardUserProfilePeer::OWNER_USER_ID, $this->owner_user_id);
		if ($this->isColumnModified(sfGuardUserProfilePeer::USER_NEWSLETTER)) $criteria->add(sfGuardUserProfilePeer::USER_NEWSLETTER, $this->user_newsletter);
		if ($this->isColumnModified(sfGuardUserProfilePeer::PREFERRED_LANGUAGE)) $criteria->add(sfGuardUserProfilePeer::PREFERRED_LANGUAGE, $this->preferred_language);
		if ($this->isColumnModified(sfGuardUserProfilePeer::CREATED_AT)) $criteria->add(sfGuardUserProfilePeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(sfGuardUserProfilePeer::CREATED_BY)) $criteria->add(sfGuardUserProfilePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(sfGuardUserProfilePeer::UPDATED_AT)) $criteria->add(sfGuardUserProfilePeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(sfGuardUserProfilePeer::UPDATED_BY)) $criteria->add(sfGuardUserProfilePeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(sfGuardUserProfilePeer::DELETED_AT)) $criteria->add(sfGuardUserProfilePeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(sfGuardUserProfilePeer::DELETED_BY)) $criteria->add(sfGuardUserProfilePeer::DELETED_BY, $this->deleted_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(sfGuardUserProfilePeer::DATABASE_NAME);

		$criteria->add(sfGuardUserProfilePeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setUserId($this->user_id);

		$copyObj->setTitle($this->title);

		$copyObj->setPublicTitle($this->public_title);

		$copyObj->setFirstName($this->first_name);

		$copyObj->setPublicFirstName($this->public_first_name);

		$copyObj->setLastName($this->last_name);

		$copyObj->setPublicLastName($this->public_last_name);

		$copyObj->setGender($this->gender);

		$copyObj->setPublicGender($this->public_gender);

		$copyObj->setEmail($this->email);

		$copyObj->setPublicEmail($this->public_email);

		$copyObj->setUrl($this->url);

		$copyObj->setPublicUrl($this->public_url);

		$copyObj->setOpenidUrl($this->openid_url);

		$copyObj->setStreet($this->street);

		$copyObj->setPublicStreet($this->public_street);

		$copyObj->setCity($this->city);

		$copyObj->setPublicCity($this->public_city);

		$copyObj->setState($this->state);

		$copyObj->setPublicState($this->public_state);

		$copyObj->setCode($this->code);

		$copyObj->setPublicCode($this->public_code);

		$copyObj->setCountry($this->country);

		$copyObj->setPublicCountry($this->public_country);

		$copyObj->setTimezone($this->timezone);

		$copyObj->setPublicTimezone($this->public_timezone);

		$copyObj->setBirthday($this->birthday);

		$copyObj->setPublicBirthday($this->public_birthday);

		$copyObj->setCompany($this->company);

		$copyObj->setPublicCompany($this->public_company);

		$copyObj->setCif($this->cif);

		$copyObj->setPublicCif($this->public_cif);

		$copyObj->setPhone1($this->phone1);

		$copyObj->setPublicPhone1($this->public_phone1);

		$copyObj->setPhone2($this->phone2);

		$copyObj->setPublicPhone2($this->public_phone2);

		$copyObj->setFax($this->fax);

		$copyObj->setPublicFax($this->public_fax);

		$copyObj->setNotes($this->notes);

		$copyObj->setGravatar($this->gravatar);

		$copyObj->setAvatar($this->avatar);

		$copyObj->setAvatarFiletype($this->avatar_filetype);

		$copyObj->setOwnerUserId($this->owner_user_id);

		$copyObj->setUserNewsletter($this->user_newsletter);

		$copyObj->setPreferredLanguage($this->preferred_language);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setDeletedAt($this->deleted_at);

		$copyObj->setDeletedBy($this->deleted_by);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getsfPropelFileStorageInfosRelatedByCreatedBy() as $relObj) {
				$copyObj->addsfPropelFileStorageInfoRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getsfPropelFileStorageInfosRelatedByUpdatedBy() as $relObj) {
				$copyObj->addsfPropelFileStorageInfoRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getsfPropelFileStorageInfosRelatedByDeletedBy() as $relObj) {
				$copyObj->addsfPropelFileStorageInfoRelatedByDeletedBy($relObj->copy($deepCopy));
			}

			foreach($this->getsfPropelFileStorageObjectsRelatedByCreatedBy() as $relObj) {
				$copyObj->addsfPropelFileStorageObjectRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getsfPropelFileStorageObjectsRelatedByUpdatedBy() as $relObj) {
				$copyObj->addsfPropelFileStorageObjectRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getsfPropelFileStorageObjectsRelatedByDeletedBy() as $relObj) {
				$copyObj->addsfPropelFileStorageObjectRelatedByDeletedBy($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new sfGuardUserProfilePeer();
		}
		return self::$peer;
	}

	
	public function setsfGuardUserRelatedByUserId($v)
	{


		if ($v === null) {
			$this->setUserId(NULL);
		} else {
			$this->setUserId($v->getId());
		}


		$this->asfGuardUserRelatedByUserId = $v;
	}


	
	public function getsfGuardUserRelatedByUserId($con = null)
	{
		if ($this->asfGuardUserRelatedByUserId === null && ($this->user_id !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUserRelatedByUserId = sfGuardUserPeer::retrieveByPK($this->user_id, $con);

			
		}
		return $this->asfGuardUserRelatedByUserId;
	}

	
	public function setsfGuardUserRelatedByOwnerUserId($v)
	{


		if ($v === null) {
			$this->setOwnerUserId(NULL);
		} else {
			$this->setOwnerUserId($v->getId());
		}


		$this->asfGuardUserRelatedByOwnerUserId = $v;
	}


	
	public function getsfGuardUserRelatedByOwnerUserId($con = null)
	{
		if ($this->asfGuardUserRelatedByOwnerUserId === null && ($this->owner_user_id !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUserRelatedByOwnerUserId = sfGuardUserPeer::retrieveByPK($this->owner_user_id, $con);

			
		}
		return $this->asfGuardUserRelatedByOwnerUserId;
	}

	
	public function setsfGuardUserRelatedByCreatedBy($v)
	{


		if ($v === null) {
			$this->setCreatedBy('null');
		} else {
			$this->setCreatedBy($v->getId());
		}


		$this->asfGuardUserRelatedByCreatedBy = $v;
	}


	
	public function getsfGuardUserRelatedByCreatedBy($con = null)
	{
		if ($this->asfGuardUserRelatedByCreatedBy === null && ($this->created_by !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUserRelatedByCreatedBy = sfGuardUserPeer::retrieveByPK($this->created_by, $con);

			
		}
		return $this->asfGuardUserRelatedByCreatedBy;
	}

	
	public function setsfGuardUserRelatedByUpdatedBy($v)
	{


		if ($v === null) {
			$this->setUpdatedBy('null');
		} else {
			$this->setUpdatedBy($v->getId());
		}


		$this->asfGuardUserRelatedByUpdatedBy = $v;
	}


	
	public function getsfGuardUserRelatedByUpdatedBy($con = null)
	{
		if ($this->asfGuardUserRelatedByUpdatedBy === null && ($this->updated_by !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUserRelatedByUpdatedBy = sfGuardUserPeer::retrieveByPK($this->updated_by, $con);

			
		}
		return $this->asfGuardUserRelatedByUpdatedBy;
	}

	
	public function setsfGuardUserRelatedByDeletedBy($v)
	{


		if ($v === null) {
			$this->setDeletedBy('null');
		} else {
			$this->setDeletedBy($v->getId());
		}


		$this->asfGuardUserRelatedByDeletedBy = $v;
	}


	
	public function getsfGuardUserRelatedByDeletedBy($con = null)
	{
		if ($this->asfGuardUserRelatedByDeletedBy === null && ($this->deleted_by !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUserRelatedByDeletedBy = sfGuardUserPeer::retrieveByPK($this->deleted_by, $con);

			
		}
		return $this->asfGuardUserRelatedByDeletedBy;
	}

	
	public function initsfPropelFileStorageInfosRelatedByCreatedBy()
	{
		if ($this->collsfPropelFileStorageInfosRelatedByCreatedBy === null) {
			$this->collsfPropelFileStorageInfosRelatedByCreatedBy = array();
		}
	}

	
	public function getsfPropelFileStorageInfosRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'plugins/sfPropelFileStoragePlugin/lib/model/om/BasesfPropelFileStorageInfoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfPropelFileStorageInfosRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collsfPropelFileStorageInfosRelatedByCreatedBy = array();
			} else {

				$criteria->add(sfPropelFileStorageInfoPeer::CREATED_BY, $this->getUserId());

				sfPropelFileStorageInfoPeer::addSelectColumns($criteria);
				$this->collsfPropelFileStorageInfosRelatedByCreatedBy = sfPropelFileStorageInfoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfPropelFileStorageInfoPeer::CREATED_BY, $this->getUserId());

				sfPropelFileStorageInfoPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfPropelFileStorageInfoRelatedByCreatedByCriteria) || !$this->lastsfPropelFileStorageInfoRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collsfPropelFileStorageInfosRelatedByCreatedBy = sfPropelFileStorageInfoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfPropelFileStorageInfoRelatedByCreatedByCriteria = $criteria;
		return $this->collsfPropelFileStorageInfosRelatedByCreatedBy;
	}

	
	public function countsfPropelFileStorageInfosRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/sfPropelFileStoragePlugin/lib/model/om/BasesfPropelFileStorageInfoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfPropelFileStorageInfoPeer::CREATED_BY, $this->getUserId());

		return sfPropelFileStorageInfoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfPropelFileStorageInfoRelatedByCreatedBy(sfPropelFileStorageInfo $l)
	{
		$this->collsfPropelFileStorageInfosRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserProfileRelatedByCreatedBy($this);
	}

	
	public function initsfPropelFileStorageInfosRelatedByUpdatedBy()
	{
		if ($this->collsfPropelFileStorageInfosRelatedByUpdatedBy === null) {
			$this->collsfPropelFileStorageInfosRelatedByUpdatedBy = array();
		}
	}

	
	public function getsfPropelFileStorageInfosRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'plugins/sfPropelFileStoragePlugin/lib/model/om/BasesfPropelFileStorageInfoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfPropelFileStorageInfosRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collsfPropelFileStorageInfosRelatedByUpdatedBy = array();
			} else {

				$criteria->add(sfPropelFileStorageInfoPeer::UPDATED_BY, $this->getUserId());

				sfPropelFileStorageInfoPeer::addSelectColumns($criteria);
				$this->collsfPropelFileStorageInfosRelatedByUpdatedBy = sfPropelFileStorageInfoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfPropelFileStorageInfoPeer::UPDATED_BY, $this->getUserId());

				sfPropelFileStorageInfoPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfPropelFileStorageInfoRelatedByUpdatedByCriteria) || !$this->lastsfPropelFileStorageInfoRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collsfPropelFileStorageInfosRelatedByUpdatedBy = sfPropelFileStorageInfoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfPropelFileStorageInfoRelatedByUpdatedByCriteria = $criteria;
		return $this->collsfPropelFileStorageInfosRelatedByUpdatedBy;
	}

	
	public function countsfPropelFileStorageInfosRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/sfPropelFileStoragePlugin/lib/model/om/BasesfPropelFileStorageInfoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfPropelFileStorageInfoPeer::UPDATED_BY, $this->getUserId());

		return sfPropelFileStorageInfoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfPropelFileStorageInfoRelatedByUpdatedBy(sfPropelFileStorageInfo $l)
	{
		$this->collsfPropelFileStorageInfosRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserProfileRelatedByUpdatedBy($this);
	}

	
	public function initsfPropelFileStorageInfosRelatedByDeletedBy()
	{
		if ($this->collsfPropelFileStorageInfosRelatedByDeletedBy === null) {
			$this->collsfPropelFileStorageInfosRelatedByDeletedBy = array();
		}
	}

	
	public function getsfPropelFileStorageInfosRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'plugins/sfPropelFileStoragePlugin/lib/model/om/BasesfPropelFileStorageInfoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfPropelFileStorageInfosRelatedByDeletedBy === null) {
			if ($this->isNew()) {
			   $this->collsfPropelFileStorageInfosRelatedByDeletedBy = array();
			} else {

				$criteria->add(sfPropelFileStorageInfoPeer::DELETED_BY, $this->getUserId());

				sfPropelFileStorageInfoPeer::addSelectColumns($criteria);
				$this->collsfPropelFileStorageInfosRelatedByDeletedBy = sfPropelFileStorageInfoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfPropelFileStorageInfoPeer::DELETED_BY, $this->getUserId());

				sfPropelFileStorageInfoPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfPropelFileStorageInfoRelatedByDeletedByCriteria) || !$this->lastsfPropelFileStorageInfoRelatedByDeletedByCriteria->equals($criteria)) {
					$this->collsfPropelFileStorageInfosRelatedByDeletedBy = sfPropelFileStorageInfoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfPropelFileStorageInfoRelatedByDeletedByCriteria = $criteria;
		return $this->collsfPropelFileStorageInfosRelatedByDeletedBy;
	}

	
	public function countsfPropelFileStorageInfosRelatedByDeletedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/sfPropelFileStoragePlugin/lib/model/om/BasesfPropelFileStorageInfoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfPropelFileStorageInfoPeer::DELETED_BY, $this->getUserId());

		return sfPropelFileStorageInfoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfPropelFileStorageInfoRelatedByDeletedBy(sfPropelFileStorageInfo $l)
	{
		$this->collsfPropelFileStorageInfosRelatedByDeletedBy[] = $l;
		$l->setsfGuardUserProfileRelatedByDeletedBy($this);
	}

	
	public function initsfPropelFileStorageObjectsRelatedByCreatedBy()
	{
		if ($this->collsfPropelFileStorageObjectsRelatedByCreatedBy === null) {
			$this->collsfPropelFileStorageObjectsRelatedByCreatedBy = array();
		}
	}

	
	public function getsfPropelFileStorageObjectsRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'plugins/sfPropelFileStoragePlugin/lib/model/om/BasesfPropelFileStorageObjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfPropelFileStorageObjectsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collsfPropelFileStorageObjectsRelatedByCreatedBy = array();
			} else {

				$criteria->add(sfPropelFileStorageObjectPeer::CREATED_BY, $this->getUserId());

				sfPropelFileStorageObjectPeer::addSelectColumns($criteria);
				$this->collsfPropelFileStorageObjectsRelatedByCreatedBy = sfPropelFileStorageObjectPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfPropelFileStorageObjectPeer::CREATED_BY, $this->getUserId());

				sfPropelFileStorageObjectPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfPropelFileStorageObjectRelatedByCreatedByCriteria) || !$this->lastsfPropelFileStorageObjectRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collsfPropelFileStorageObjectsRelatedByCreatedBy = sfPropelFileStorageObjectPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfPropelFileStorageObjectRelatedByCreatedByCriteria = $criteria;
		return $this->collsfPropelFileStorageObjectsRelatedByCreatedBy;
	}

	
	public function countsfPropelFileStorageObjectsRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/sfPropelFileStoragePlugin/lib/model/om/BasesfPropelFileStorageObjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfPropelFileStorageObjectPeer::CREATED_BY, $this->getUserId());

		return sfPropelFileStorageObjectPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfPropelFileStorageObjectRelatedByCreatedBy(sfPropelFileStorageObject $l)
	{
		$this->collsfPropelFileStorageObjectsRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserProfileRelatedByCreatedBy($this);
	}


	
	public function getsfPropelFileStorageObjectsRelatedByCreatedByJoinsfPropelFileStorageInfo($criteria = null, $con = null)
	{
				include_once 'plugins/sfPropelFileStoragePlugin/lib/model/om/BasesfPropelFileStorageObjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfPropelFileStorageObjectsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collsfPropelFileStorageObjectsRelatedByCreatedBy = array();
			} else {

				$criteria->add(sfPropelFileStorageObjectPeer::CREATED_BY, $this->getUserId());

				$this->collsfPropelFileStorageObjectsRelatedByCreatedBy = sfPropelFileStorageObjectPeer::doSelectJoinsfPropelFileStorageInfo($criteria, $con);
			}
		} else {
									
			$criteria->add(sfPropelFileStorageObjectPeer::CREATED_BY, $this->getUserId());

			if (!isset($this->lastsfPropelFileStorageObjectRelatedByCreatedByCriteria) || !$this->lastsfPropelFileStorageObjectRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collsfPropelFileStorageObjectsRelatedByCreatedBy = sfPropelFileStorageObjectPeer::doSelectJoinsfPropelFileStorageInfo($criteria, $con);
			}
		}
		$this->lastsfPropelFileStorageObjectRelatedByCreatedByCriteria = $criteria;

		return $this->collsfPropelFileStorageObjectsRelatedByCreatedBy;
	}

	
	public function initsfPropelFileStorageObjectsRelatedByUpdatedBy()
	{
		if ($this->collsfPropelFileStorageObjectsRelatedByUpdatedBy === null) {
			$this->collsfPropelFileStorageObjectsRelatedByUpdatedBy = array();
		}
	}

	
	public function getsfPropelFileStorageObjectsRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'plugins/sfPropelFileStoragePlugin/lib/model/om/BasesfPropelFileStorageObjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfPropelFileStorageObjectsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collsfPropelFileStorageObjectsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(sfPropelFileStorageObjectPeer::UPDATED_BY, $this->getUserId());

				sfPropelFileStorageObjectPeer::addSelectColumns($criteria);
				$this->collsfPropelFileStorageObjectsRelatedByUpdatedBy = sfPropelFileStorageObjectPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfPropelFileStorageObjectPeer::UPDATED_BY, $this->getUserId());

				sfPropelFileStorageObjectPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfPropelFileStorageObjectRelatedByUpdatedByCriteria) || !$this->lastsfPropelFileStorageObjectRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collsfPropelFileStorageObjectsRelatedByUpdatedBy = sfPropelFileStorageObjectPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfPropelFileStorageObjectRelatedByUpdatedByCriteria = $criteria;
		return $this->collsfPropelFileStorageObjectsRelatedByUpdatedBy;
	}

	
	public function countsfPropelFileStorageObjectsRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/sfPropelFileStoragePlugin/lib/model/om/BasesfPropelFileStorageObjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfPropelFileStorageObjectPeer::UPDATED_BY, $this->getUserId());

		return sfPropelFileStorageObjectPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfPropelFileStorageObjectRelatedByUpdatedBy(sfPropelFileStorageObject $l)
	{
		$this->collsfPropelFileStorageObjectsRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserProfileRelatedByUpdatedBy($this);
	}


	
	public function getsfPropelFileStorageObjectsRelatedByUpdatedByJoinsfPropelFileStorageInfo($criteria = null, $con = null)
	{
				include_once 'plugins/sfPropelFileStoragePlugin/lib/model/om/BasesfPropelFileStorageObjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfPropelFileStorageObjectsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collsfPropelFileStorageObjectsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(sfPropelFileStorageObjectPeer::UPDATED_BY, $this->getUserId());

				$this->collsfPropelFileStorageObjectsRelatedByUpdatedBy = sfPropelFileStorageObjectPeer::doSelectJoinsfPropelFileStorageInfo($criteria, $con);
			}
		} else {
									
			$criteria->add(sfPropelFileStorageObjectPeer::UPDATED_BY, $this->getUserId());

			if (!isset($this->lastsfPropelFileStorageObjectRelatedByUpdatedByCriteria) || !$this->lastsfPropelFileStorageObjectRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collsfPropelFileStorageObjectsRelatedByUpdatedBy = sfPropelFileStorageObjectPeer::doSelectJoinsfPropelFileStorageInfo($criteria, $con);
			}
		}
		$this->lastsfPropelFileStorageObjectRelatedByUpdatedByCriteria = $criteria;

		return $this->collsfPropelFileStorageObjectsRelatedByUpdatedBy;
	}

	
	public function initsfPropelFileStorageObjectsRelatedByDeletedBy()
	{
		if ($this->collsfPropelFileStorageObjectsRelatedByDeletedBy === null) {
			$this->collsfPropelFileStorageObjectsRelatedByDeletedBy = array();
		}
	}

	
	public function getsfPropelFileStorageObjectsRelatedByDeletedBy($criteria = null, $con = null)
	{
				include_once 'plugins/sfPropelFileStoragePlugin/lib/model/om/BasesfPropelFileStorageObjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfPropelFileStorageObjectsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
			   $this->collsfPropelFileStorageObjectsRelatedByDeletedBy = array();
			} else {

				$criteria->add(sfPropelFileStorageObjectPeer::DELETED_BY, $this->getUserId());

				sfPropelFileStorageObjectPeer::addSelectColumns($criteria);
				$this->collsfPropelFileStorageObjectsRelatedByDeletedBy = sfPropelFileStorageObjectPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfPropelFileStorageObjectPeer::DELETED_BY, $this->getUserId());

				sfPropelFileStorageObjectPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfPropelFileStorageObjectRelatedByDeletedByCriteria) || !$this->lastsfPropelFileStorageObjectRelatedByDeletedByCriteria->equals($criteria)) {
					$this->collsfPropelFileStorageObjectsRelatedByDeletedBy = sfPropelFileStorageObjectPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfPropelFileStorageObjectRelatedByDeletedByCriteria = $criteria;
		return $this->collsfPropelFileStorageObjectsRelatedByDeletedBy;
	}

	
	public function countsfPropelFileStorageObjectsRelatedByDeletedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/sfPropelFileStoragePlugin/lib/model/om/BasesfPropelFileStorageObjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfPropelFileStorageObjectPeer::DELETED_BY, $this->getUserId());

		return sfPropelFileStorageObjectPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfPropelFileStorageObjectRelatedByDeletedBy(sfPropelFileStorageObject $l)
	{
		$this->collsfPropelFileStorageObjectsRelatedByDeletedBy[] = $l;
		$l->setsfGuardUserProfileRelatedByDeletedBy($this);
	}


	
	public function getsfPropelFileStorageObjectsRelatedByDeletedByJoinsfPropelFileStorageInfo($criteria = null, $con = null)
	{
				include_once 'plugins/sfPropelFileStoragePlugin/lib/model/om/BasesfPropelFileStorageObjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfPropelFileStorageObjectsRelatedByDeletedBy === null) {
			if ($this->isNew()) {
				$this->collsfPropelFileStorageObjectsRelatedByDeletedBy = array();
			} else {

				$criteria->add(sfPropelFileStorageObjectPeer::DELETED_BY, $this->getUserId());

				$this->collsfPropelFileStorageObjectsRelatedByDeletedBy = sfPropelFileStorageObjectPeer::doSelectJoinsfPropelFileStorageInfo($criteria, $con);
			}
		} else {
									
			$criteria->add(sfPropelFileStorageObjectPeer::DELETED_BY, $this->getUserId());

			if (!isset($this->lastsfPropelFileStorageObjectRelatedByDeletedByCriteria) || !$this->lastsfPropelFileStorageObjectRelatedByDeletedByCriteria->equals($criteria)) {
				$this->collsfPropelFileStorageObjectsRelatedByDeletedBy = sfPropelFileStorageObjectPeer::doSelectJoinsfPropelFileStorageInfo($criteria, $con);
			}
		}
		$this->lastsfPropelFileStorageObjectRelatedByDeletedByCriteria = $criteria;

		return $this->collsfPropelFileStorageObjectsRelatedByDeletedBy;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BasesfGuardUserProfile:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasesfGuardUserProfile::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 
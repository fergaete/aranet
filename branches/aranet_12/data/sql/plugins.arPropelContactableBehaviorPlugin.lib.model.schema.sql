
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- aranet_contact
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_contact`;


CREATE TABLE `aranet_contact`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`contact_salutation` VARCHAR(6),
	`contact_first_name` VARCHAR(128),
	`contact_last_name` VARCHAR(128),
	`contact_email` VARCHAR(128),
	`contact_phone` VARCHAR(16),
	`contact_fax` VARCHAR(16),
	`contact_mobile` VARCHAR(16),
	`contact_birthday` DATE,
	`contact_org_unit` VARCHAR(128),
	`created_at` DATETIME,
	`created_by` INTEGER default null,
	`updated_at` DATETIME,
	`updated_by` INTEGER default null,
	`deleted_at` DATETIME,
	`deleted_by` INTEGER default null,
	PRIMARY KEY (`id`),
	KEY `contact_first_name_idx`(`contact_first_name`),
	KEY `contact_last_name_idx`(`contact_last_name`),
	INDEX `aranet_contact_FI_1` (`created_by`),
	CONSTRAINT `aranet_contact_FK_1`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_contact_FI_2` (`updated_by`),
	CONSTRAINT `aranet_contact_FK_2`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_contact_FI_3` (`deleted_by`),
	CONSTRAINT `aranet_contact_FK_3`
		FOREIGN KEY (`deleted_by`)
		REFERENCES `sf_guard_user` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_objectcontact
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_objectcontact`;


CREATE TABLE `aranet_objectcontact`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`objectcontact_contact_id` INTEGER  NOT NULL,
	`objectcontact_object_id` INTEGER  NOT NULL,
	`objectcontact_object_class` VARCHAR(64),
	`objectcontact_rol` VARCHAR(128),
	`objectcontact_is_default` TINYINT(1) default 0,
	`created_at` DATETIME,
	`created_by` INTEGER default null,
	`updated_at` DATETIME,
	`updated_by` INTEGER default null,
	PRIMARY KEY (`id`),
	UNIQUE KEY `objectcontact_unique_idx` (`objectcontact_contact_id`, `objectcontact_object_id`, `objectcontact_object_class`),
	KEY `objectcontact_contact_id_idx2`(`objectcontact_contact_id`),
	KEY `objectcontact_object_id_idx2`(`objectcontact_object_id`),
	CONSTRAINT `aranet_objectcontact_FK_1`
		FOREIGN KEY (`objectcontact_contact_id`)
		REFERENCES `aranet_contact` (`id`)
		ON DELETE CASCADE,
	INDEX `aranet_objectcontact_FI_2` (`created_by`),
	CONSTRAINT `aranet_objectcontact_FK_2`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_objectcontact_FI_3` (`updated_by`),
	CONSTRAINT `aranet_objectcontact_FK_3`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;

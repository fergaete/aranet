
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- aranet_address
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_address`;


CREATE TABLE `aranet_address`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`address_line1` VARCHAR(255),
	`address_line2` VARCHAR(255),
	`address_location` VARCHAR(128),
	`address_state` VARCHAR(64),
	`address_postal_code` VARCHAR(5),
	`address_country` VARCHAR(2),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_objectaddress
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_objectaddress`;


CREATE TABLE `aranet_objectaddress`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`objectaddress_name` VARCHAR(128),
	`objectaddress_address_id` INTEGER  NOT NULL,
	`objectaddress_object_id` INTEGER  NOT NULL,
	`objectaddress_object_class` VARCHAR(64),
	`objectaddress_type` VARCHAR(16),
	`objectaddress_is_default` TINYINT(1) default 0,
	PRIMARY KEY (`id`),
	UNIQUE KEY `objectaddress_unique_idx` (`objectaddress_address_id`, `objectaddress_object_id`, `objectaddress_object_class`),
	KEY `objectaddress_address_id_idx2`(`objectaddress_address_id`),
	KEY `objectaddress_object_id_idx2`(`objectaddress_object_id`),
	CONSTRAINT `aranet_objectaddress_FK_1`
		FOREIGN KEY (`objectaddress_address_id`)
		REFERENCES `aranet_address` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;

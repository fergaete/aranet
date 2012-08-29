
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- sf_file_info
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_file_info`;


CREATE TABLE `sf_file_info`
(
	`file_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`file_name` VARCHAR(255),
	`file_title` VARCHAR(255),
	`file_size` INTEGER,
	`file_mime_type` VARCHAR(100),
	`file_width` INTEGER,
	`file_height` INTEGER,
	`file_is_cached` TINYINT(1),
	`created_at` DATETIME,
	`created_by` INTEGER default null,
	`updated_at` DATETIME,
	`updated_by` INTEGER default null,
	`deleted_at` DATETIME,
	`deleted_by` INTEGER default null,
	PRIMARY KEY (`file_id`),
	INDEX `sf_file_info_FI_1` (`created_by`),
	CONSTRAINT `sf_file_info_FK_1`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user_profile` (`user_id`),
	INDEX `sf_file_info_FI_2` (`updated_by`),
	CONSTRAINT `sf_file_info_FK_2`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user_profile` (`user_id`),
	INDEX `sf_file_info_FI_3` (`deleted_by`),
	CONSTRAINT `sf_file_info_FK_3`
		FOREIGN KEY (`deleted_by`)
		REFERENCES `sf_guard_user_profile` (`user_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_file_data
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_file_data`;


CREATE TABLE `sf_file_data`
(
	`file_data_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`file_binary_data` LONGBLOB,
	`file_info_id` INTEGER,
	PRIMARY KEY (`file_data_id`),
	INDEX `sf_file_data_FI_1` (`file_info_id`),
	CONSTRAINT `sf_file_data_FK_1`
		FOREIGN KEY (`file_info_id`)
		REFERENCES `sf_file_info` (`file_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_file_object
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_file_object`;


CREATE TABLE `sf_file_object`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`file_object_id` INTEGER,
	`file_object_class` VARCHAR(64),
	`file_info_id` INTEGER,
	`created_at` DATETIME,
	`created_by` INTEGER default null,
	`updated_at` DATETIME,
	`updated_by` INTEGER default null,
	`deleted_at` DATETIME,
	`deleted_by` INTEGER default null,
	PRIMARY KEY (`id`),
	UNIQUE KEY `file_object_unique_idx` (`file_info_id`, `file_object_id`, `file_object_class`),
	KEY `file_info_idx2`(`file_info_id`),
	KEY `file_object_id_idx2`(`file_object_id`),
	KEY `file_object_class_idx2`(`file_object_class`),
	CONSTRAINT `sf_file_object_FK_1`
		FOREIGN KEY (`file_info_id`)
		REFERENCES `sf_file_info` (`file_id`)
		ON DELETE CASCADE,
	INDEX `sf_file_object_FI_2` (`created_by`),
	CONSTRAINT `sf_file_object_FK_2`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user_profile` (`user_id`),
	INDEX `sf_file_object_FI_3` (`updated_by`),
	CONSTRAINT `sf_file_object_FK_3`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user_profile` (`user_id`),
	INDEX `sf_file_object_FI_4` (`deleted_by`),
	CONSTRAINT `sf_file_object_FK_4`
		FOREIGN KEY (`deleted_by`)
		REFERENCES `sf_guard_user_profile` (`user_id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;

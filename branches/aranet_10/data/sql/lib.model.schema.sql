
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- aranet_client
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_client`;


CREATE TABLE `aranet_client`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`client_unique_name` VARCHAR(128)  NOT NULL,
	`client_company_name` VARCHAR(255)  NOT NULL,
	`client_cif` VARCHAR(12),
	`client_kind_of_company_id` INTEGER default null,
	`client_since` DATE,
	`client_website` VARCHAR(255),
	`client_comments` TEXT,
	`client_has_tags` INTEGER(1) default 0,
	`created_at` DATETIME,
	`created_by` INTEGER default null,
	`updated_at` DATETIME,
	`updated_by` INTEGER default null,
	`deleted_at` DATETIME,
	`deleted_by` INTEGER default null,
	PRIMARY KEY (`id`),
	UNIQUE KEY `client_unique_name_idx` (`client_unique_name`),
	KEY `client_company_name_idx`(`client_company_name`),
	INDEX `aranet_client_FI_1` (`client_kind_of_company_id`),
	CONSTRAINT `aranet_client_FK_1`
		FOREIGN KEY (`client_kind_of_company_id`)
		REFERENCES `aranet_kind_of_company` (`id`),
	INDEX `aranet_client_FI_2` (`created_by`),
	CONSTRAINT `aranet_client_FK_2`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_client_FI_3` (`updated_by`),
	CONSTRAINT `aranet_client_FK_3`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_client_FI_4` (`deleted_by`),
	CONSTRAINT `aranet_client_FK_4`
		FOREIGN KEY (`deleted_by`)
		REFERENCES `sf_guard_user` (`id`)
)Type=InnoDB;

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
	`objectcontact_is_default` INTEGER(1) default 0,
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
	`objectaddress_is_default` INTEGER(1) default 0,
	PRIMARY KEY (`id`),
	UNIQUE KEY `objectaddress_unique_idx` (`objectaddress_address_id`, `objectaddress_object_id`, `objectaddress_object_class`),
	KEY `objectaddress_address_id_idx2`(`objectaddress_address_id`),
	KEY `objectaddress_object_id_idx2`(`objectaddress_object_id`),
	CONSTRAINT `aranet_objectaddress_FK_1`
		FOREIGN KEY (`objectaddress_address_id`)
		REFERENCES `aranet_address` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_kind_of_company
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_kind_of_company`;


CREATE TABLE `aranet_kind_of_company`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`kind_of_company_title` VARCHAR(64),
	`kind_of_company_description` VARCHAR(255),
	PRIMARY KEY (`id`),
	KEY `kind_of_company_title_idx`(`kind_of_company_title`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_project
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_project`;


CREATE TABLE `aranet_project`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`project_prefix` VARCHAR(8),
	`project_number` VARCHAR(11),
	`project_name` VARCHAR(128)  NOT NULL,
	`project_url` VARCHAR(255),
	`project_client_id` INTEGER default null,
	`project_comments` TEXT,
	`project_category_id` INTEGER default null,
	`project_start_date` DATE,
	`project_finish_date` DATE,
	`project_status_id` INTEGER default null,
	`created_at` DATETIME,
	`created_by` INTEGER default null,
	`updated_at` DATETIME,
	`updated_by` INTEGER default null,
	`deleted_at` DATETIME,
	`deleted_by` INTEGER default null,
	PRIMARY KEY (`id`),
	UNIQUE KEY `project_fulltitle_idx` (`project_prefix`, `project_number`),
	KEY `project_name_idx`(`project_name`),
	KEY `project_number_idx`(`project_number`),
	INDEX `aranet_project_FI_1` (`project_client_id`),
	CONSTRAINT `aranet_project_FK_1`
		FOREIGN KEY (`project_client_id`)
		REFERENCES `aranet_client` (`id`),
	INDEX `aranet_project_FI_2` (`project_category_id`),
	CONSTRAINT `aranet_project_FK_2`
		FOREIGN KEY (`project_category_id`)
		REFERENCES `aranet_project_category` (`id`),
	INDEX `aranet_project_FI_3` (`project_status_id`),
	CONSTRAINT `aranet_project_FK_3`
		FOREIGN KEY (`project_status_id`)
		REFERENCES `aranet_project_status` (`id`),
	INDEX `aranet_project_FI_4` (`created_by`),
	CONSTRAINT `aranet_project_FK_4`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_project_FI_5` (`updated_by`),
	CONSTRAINT `aranet_project_FK_5`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_project_FI_6` (`deleted_by`),
	CONSTRAINT `aranet_project_FK_6`
		FOREIGN KEY (`deleted_by`)
		REFERENCES `sf_guard_user` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_project_status
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_project_status`;


CREATE TABLE `aranet_project_status`
(
	`id` INTEGER  NOT NULL,
	`project_status_title` VARCHAR(64),
	PRIMARY KEY (`id`),
	KEY `project_status_title_idx`(`project_status_title`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_project_category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_project_category`;


CREATE TABLE `aranet_project_category`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`category_title` VARCHAR(64),
	PRIMARY KEY (`id`),
	KEY `category_title_idx`(`category_title`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_timesheet
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_timesheet`;


CREATE TABLE `aranet_timesheet`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`timesheet_description` TEXT,
	`timesheet_hours` FLOAT default 0,
	`timesheet_user_id` INTEGER,
	`timesheet_project_id` INTEGER,
	`timesheet_budget_id` INTEGER default null,
	`timesheet_milestone_id` INTEGER default null,
	`timesheet_task_id` INTEGER default null,
	`timesheet_is_billable` INTEGER(1) default 1,
	`timesheet_type_id` INTEGER,
	`timesheet_date` DATE,
	PRIMARY KEY (`id`),
	KEY `timesheet_user_idx2`(`timesheet_user_id`),
	INDEX `FI_esheet_project_id_idx` (`timesheet_project_id`),
	CONSTRAINT `timesheet_project_id_idx`
		FOREIGN KEY (`timesheet_project_id`)
		REFERENCES `aranet_project` (`id`)
		ON DELETE CASCADE,
	INDEX `FI_esheet_milestone_id_idx` (`timesheet_milestone_id`),
	CONSTRAINT `timesheet_milestone_id_idx`
		FOREIGN KEY (`timesheet_milestone_id`)
		REFERENCES `aranet_project_milestone` (`id`),
	INDEX `FI_esheet_budget_id_idx` (`timesheet_budget_id`),
	CONSTRAINT `timesheet_budget_id_idx`
		FOREIGN KEY (`timesheet_budget_id`)
		REFERENCES `aranet_budget` (`id`),
	INDEX `FI_esheet_task_id_idx` (`timesheet_task_id`),
	CONSTRAINT `timesheet_task_id_idx`
		FOREIGN KEY (`timesheet_task_id`)
		REFERENCES `aranet_project_task` (`id`),
	CONSTRAINT `timesheet_user_id_idx`
		FOREIGN KEY (`timesheet_user_id`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `FI_esheet_type_id_idx` (`timesheet_type_id`),
	CONSTRAINT `timesheet_type_id_idx`
		FOREIGN KEY (`timesheet_type_id`)
		REFERENCES `aranet_type_of_hour` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_type_of_hour
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_type_of_hour`;


CREATE TABLE `aranet_type_of_hour`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`type_of_hour_title` VARCHAR(64),
	`type_of_hour_description` TEXT,
	`type_of_hour_cost` FLOAT default 0,
	PRIMARY KEY (`id`),
	KEY `type_of_hour_title_idx`(`type_of_hour_title`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_project_milestone
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_project_milestone`;


CREATE TABLE `aranet_project_milestone`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`milestone_title` VARCHAR(255)  NOT NULL,
	`milestone_description` TEXT,
	`milestone_start_date` DATE  NOT NULL,
	`milestone_finish_date` DATE  NOT NULL,
	`milestone_project_id` INTEGER,
	`milestone_budget_id` INTEGER default null,
	`milestone_estimated_hours` DOUBLE default 0,
	`milestone_total_hours` DOUBLE default 0,
	`milestone_total_hour_costs` DOUBLE default 0,
	`created_at` DATETIME,
	`created_by` INTEGER default null,
	`updated_at` DATETIME,
	`updated_by` INTEGER default null,
	`deleted_at` DATETIME,
	`deleted_by` INTEGER default null,
	PRIMARY KEY (`id`),
	KEY `milestone_title_idx`(`milestone_title`),
	KEY `milestone_project_id_idx2`(`milestone_project_id`),
	CONSTRAINT `aranet_project_milestone_FK_1`
		FOREIGN KEY (`milestone_project_id`)
		REFERENCES `aranet_budget` (`id`)
		ON DELETE CASCADE,
	INDEX `aranet_project_milestone_FI_2` (`milestone_budget_id`),
	CONSTRAINT `aranet_project_milestone_FK_2`
		FOREIGN KEY (`milestone_budget_id`)
		REFERENCES `aranet_budget` (`id`),
	INDEX `aranet_project_milestone_FI_3` (`created_by`),
	CONSTRAINT `aranet_project_milestone_FK_3`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_project_milestone_FI_4` (`updated_by`),
	CONSTRAINT `aranet_project_milestone_FK_4`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_project_milestone_FI_5` (`deleted_by`),
	CONSTRAINT `aranet_project_milestone_FK_5`
		FOREIGN KEY (`deleted_by`)
		REFERENCES `sf_guard_user` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_project_task
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_project_task`;


CREATE TABLE `aranet_project_task`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`task_title` VARCHAR(255)  NOT NULL,
	`task_description` TEXT,
	`task_start_date` DATE,
	`task_finish_date` DATE,
	`task_total_duration` FLOAT default 0,
	`task_priority_id` INTEGER,
	`task_project_id` INTEGER,
	`task_milestone_id` INTEGER default null,
	`task_budget_id` INTEGER default null,
	`task_estimated_hours` DOUBLE default 0,
	`task_total_hours` DOUBLE default 0,
	`task_total_hour_costs` DOUBLE default 0,
	`created_at` DATETIME,
	`created_by` INTEGER default null,
	`updated_at` DATETIME,
	`updated_by` INTEGER default null,
	`deleted_at` DATETIME,
	`deleted_by` INTEGER default null,
	PRIMARY KEY (`id`),
	KEY `task_title_idx`(`task_title`),
	KEY `task_milestone_id_idx2`(`task_milestone_id`),
	KEY `task_project_id_idx2`(`task_project_id`),
	INDEX `aranet_project_task_FI_1` (`created_by`),
	CONSTRAINT `aranet_project_task_FK_1`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_project_task_FI_2` (`updated_by`),
	CONSTRAINT `aranet_project_task_FK_2`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_project_task_FI_3` (`deleted_by`),
	CONSTRAINT `aranet_project_task_FK_3`
		FOREIGN KEY (`deleted_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `FI_k_budget_id_idx` (`task_budget_id`),
	CONSTRAINT `task_budget_id_idx`
		FOREIGN KEY (`task_budget_id`)
		REFERENCES `aranet_budget` (`id`),
	INDEX `FI_k_priority_idx` (`task_priority_id`),
	CONSTRAINT `task_priority_idx`
		FOREIGN KEY (`task_priority_id`)
		REFERENCES `aranet_task_priority` (`id`),
	CONSTRAINT `task_milestone_id_idx`
		FOREIGN KEY (`task_milestone_id`)
		REFERENCES `aranet_project_milestone` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `task_project_id_idx`
		FOREIGN KEY (`task_project_id`)
		REFERENCES `aranet_project` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_project_frequently_task
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_project_frequently_task`;


CREATE TABLE `aranet_project_frequently_task`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`task_title` VARCHAR(255)  NOT NULL,
	`task_description` TEXT,
	`task_priority_id` INTEGER,
	`created_at` DATETIME,
	`created_by` INTEGER default null,
	`updated_at` DATETIME,
	`updated_by` INTEGER default null,
	`deleted_at` DATETIME,
	`deleted_by` INTEGER default null,
	PRIMARY KEY (`id`),
	KEY `task_title_idx`(`task_title`),
	INDEX `aranet_project_frequently_task_FI_1` (`created_by`),
	CONSTRAINT `aranet_project_frequently_task_FK_1`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_project_frequently_task_FI_2` (`updated_by`),
	CONSTRAINT `aranet_project_frequently_task_FK_2`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_project_frequently_task_FI_3` (`deleted_by`),
	CONSTRAINT `aranet_project_frequently_task_FK_3`
		FOREIGN KEY (`deleted_by`)
		REFERENCES `sf_guard_user` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_task_priority
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_task_priority`;


CREATE TABLE `aranet_task_priority`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`task_priority_title` VARCHAR(64),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_invoice
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_invoice`;


CREATE TABLE `aranet_invoice`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`invoice_prefix` VARCHAR(8),
	`invoice_number` VARCHAR(11)  NOT NULL,
	`invoice_date` DATE  NOT NULL,
	`invoice_client_id` INTEGER default null,
	`invoice_project_id` INTEGER default null,
	`invoice_budget_id` INTEGER default null,
	`invoice_category_id` INTEGER default null,
	`invoice_kind_of_invoice_id` INTEGER default 1 NOT NULL,
	`invoice_title` VARCHAR(255),
	`invoice_comments` TEXT,
	`invoice_print_comments` INTEGER(1) default 0,
	`invoice_tax_rate` FLOAT default 0,
	`invoice_freight_charge` FLOAT default 0,
	`invoice_payment_condition_id` INTEGER default null,
	`invoice_payment_method_id` INTEGER default null,
	`invoice_payment_check` VARCHAR(64),
	`invoice_payment_date` DATE,
	`invoice_payment_status_id` INTEGER default null,
	`invoice_late_fee_percent` FLOAT default 0,
	`invoice_total_amount` DOUBLE default 0,
	`created_at` DATETIME,
	`created_by` INTEGER default null,
	`updated_at` DATETIME,
	`updated_by` INTEGER default null,
	`deleted_at` DATETIME,
	`deleted_by` INTEGER default null,
	PRIMARY KEY (`id`),
	KEY `invoice_number_idx`(`invoice_number`),
	KEY `invoice_client_id_index`(`invoice_client_id`),
	KEY `invoice_project_id_index`(`invoice_project_id`),
	CONSTRAINT `aranet_invoice_FK_1`
		FOREIGN KEY (`invoice_client_id`)
		REFERENCES `aranet_client` (`id`),
	CONSTRAINT `aranet_invoice_FK_2`
		FOREIGN KEY (`invoice_project_id`)
		REFERENCES `aranet_project` (`id`),
	INDEX `aranet_invoice_FI_3` (`invoice_budget_id`),
	CONSTRAINT `aranet_invoice_FK_3`
		FOREIGN KEY (`invoice_budget_id`)
		REFERENCES `aranet_budget` (`id`),
	INDEX `aranet_invoice_FI_4` (`invoice_category_id`),
	CONSTRAINT `aranet_invoice_FK_4`
		FOREIGN KEY (`invoice_category_id`)
		REFERENCES `aranet_invoice_category` (`id`),
	INDEX `aranet_invoice_FI_5` (`invoice_kind_of_invoice_id`),
	CONSTRAINT `aranet_invoice_FK_5`
		FOREIGN KEY (`invoice_kind_of_invoice_id`)
		REFERENCES `aranet_kind_of_invoice` (`id`),
	INDEX `aranet_invoice_FI_6` (`invoice_payment_condition_id`),
	CONSTRAINT `aranet_invoice_FK_6`
		FOREIGN KEY (`invoice_payment_condition_id`)
		REFERENCES `aranet_payment_condition` (`id`),
	INDEX `aranet_invoice_FI_7` (`invoice_payment_method_id`),
	CONSTRAINT `aranet_invoice_FK_7`
		FOREIGN KEY (`invoice_payment_method_id`)
		REFERENCES `aranet_payment_method` (`id`),
	INDEX `aranet_invoice_FI_8` (`invoice_payment_status_id`),
	CONSTRAINT `aranet_invoice_FK_8`
		FOREIGN KEY (`invoice_payment_status_id`)
		REFERENCES `aranet_payment_status` (`id`),
	INDEX `aranet_invoice_FI_9` (`created_by`),
	CONSTRAINT `aranet_invoice_FK_9`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_invoice_FI_10` (`updated_by`),
	CONSTRAINT `aranet_invoice_FK_10`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_invoice_FI_11` (`deleted_by`),
	CONSTRAINT `aranet_invoice_FK_11`
		FOREIGN KEY (`deleted_by`)
		REFERENCES `sf_guard_user` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_payment_status
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_payment_status`;


CREATE TABLE `aranet_payment_status`
(
	`id` INTEGER  NOT NULL,
	`payment_status_title` VARCHAR(64),
	PRIMARY KEY (`id`),
	KEY `payment_status_title_idx`(`payment_status_title`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_payment_condition
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_payment_condition`;


CREATE TABLE `aranet_payment_condition`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`payment_condition_days` INTEGER,
	`payment_condition_payment_day` INTEGER,
	`payment_condition_title` VARCHAR(64),
	PRIMARY KEY (`id`),
	KEY `payment_condition_title_idx`(`payment_condition_title`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_payment_method
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_payment_method`;


CREATE TABLE `aranet_payment_method`
(
	`id` INTEGER  NOT NULL,
	`payment_method_title` VARCHAR(128),
	PRIMARY KEY (`id`),
	KEY `payment_method_title_idx`(`payment_method_title`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_invoice_category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_invoice_category`;


CREATE TABLE `aranet_invoice_category`
(
	`id` INTEGER  NOT NULL,
	`category_title` VARCHAR(64),
	PRIMARY KEY (`id`),
	KEY `category_title_idx`(`category_title`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_kind_of_invoice
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_kind_of_invoice`;


CREATE TABLE `aranet_kind_of_invoice`
(
	`id` INTEGER  NOT NULL,
	`kind_of_invoice_title` VARCHAR(64),
	PRIMARY KEY (`id`),
	KEY `kind_of_invoice_title_idx`(`kind_of_invoice_title`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_invoice_item
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_invoice_item`;


CREATE TABLE `aranet_invoice_item`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`item_type_id` INTEGER,
	`item_description` TEXT,
	`item_quantity` FLOAT default 0,
	`item_cost` DOUBLE default 0,
	`item_tax_rate` FLOAT default 0,
	`item_invoice_id` INTEGER,
	PRIMARY KEY (`id`),
	KEY `item_type_id_idx2`(`item_type_id`),
	KEY `item_invoice_id_idx2`(`item_invoice_id`),
	CONSTRAINT `item_type_id_idx`
		FOREIGN KEY (`item_type_id`)
		REFERENCES `aranet_type_of_invoice_item` (`id`),
	CONSTRAINT `item_invoice_id_idx`
		FOREIGN KEY (`item_invoice_id`)
		REFERENCES `aranet_invoice` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_type_of_invoice_item
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_type_of_invoice_item`;


CREATE TABLE `aranet_type_of_invoice_item`
(
	`id` INTEGER  NOT NULL,
	`type_of_item_title` VARCHAR(64),
	PRIMARY KEY (`id`),
	KEY `type_of_item_title_idx`(`type_of_item_title`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_budget
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_budget`;


CREATE TABLE `aranet_budget`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`budget_prefix` VARCHAR(8),
	`budget_number` VARCHAR(11)  NOT NULL,
	`budget_revision` INTEGER default 0 NOT NULL,
	`budget_date` DATE  NOT NULL,
	`budget_valid_date` DATE  NOT NULL,
	`budget_approved_date` DATE,
	`budget_client_id` INTEGER,
	`budget_project_id` INTEGER,
	`budget_category_id` INTEGER,
	`budget_title` VARCHAR(255),
	`budget_comments` TEXT,
	`budget_print_comments` INTEGER(1) default 0,
	`budget_tax_rate` FLOAT default 0,
	`budget_freight_charge` FLOAT default 0,
	`budget_total_cost` FLOAT default 0,
	`budget_total_amount` FLOAT default 0,
	`budget_payment_condition_id` INTEGER,
	`budget_status_id` INTEGER default 0,
	`budget_is_last` INTEGER(1) default 1,
	`created_at` DATETIME,
	`created_by` INTEGER default null,
	`updated_at` DATETIME,
	`updated_by` INTEGER default null,
	`deleted_at` DATETIME,
	`deleted_by` INTEGER default null,
	PRIMARY KEY (`id`),
	KEY `budget_number_idx`(`budget_number`),
	KEY `budget_client_id_index`(`budget_client_id`),
	KEY `budget_project_id_index`(`budget_project_id`),
	INDEX `aranet_budget_FI_1` (`budget_status_id`),
	CONSTRAINT `aranet_budget_FK_1`
		FOREIGN KEY (`budget_status_id`)
		REFERENCES `aranet_budget_status` (`id`),
	INDEX `aranet_budget_FI_2` (`created_by`),
	CONSTRAINT `aranet_budget_FK_2`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_budget_FI_3` (`updated_by`),
	CONSTRAINT `aranet_budget_FK_3`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_budget_FI_4` (`deleted_by`),
	CONSTRAINT `aranet_budget_FK_4`
		FOREIGN KEY (`deleted_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `FI_get_payment_condition_id_idx` (`budget_payment_condition_id`),
	CONSTRAINT `budget_payment_condition_id_idx`
		FOREIGN KEY (`budget_payment_condition_id`)
		REFERENCES `aranet_payment_condition` (`id`),
	INDEX `FI_get_category_id_idx` (`budget_category_id`),
	CONSTRAINT `budget_category_id_idx`
		FOREIGN KEY (`budget_category_id`)
		REFERENCES `aranet_invoice_category` (`id`),
	CONSTRAINT `budget_project_id_idx`
		FOREIGN KEY (`budget_project_id`)
		REFERENCES `aranet_project` (`id`),
	CONSTRAINT `budget_client_id_idx`
		FOREIGN KEY (`budget_client_id`)
		REFERENCES `aranet_client` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_budget_status
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_budget_status`;


CREATE TABLE `aranet_budget_status`
(
	`id` INTEGER  NOT NULL,
	`budget_status_title` VARCHAR(64),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_budget_item
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_budget_item`;


CREATE TABLE `aranet_budget_item`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`item_order` INTEGER default 0 NOT NULL,
	`item_type_id` INTEGER default null,
	`item_is_optional` INTEGER(1) default 0,
	`item_description` TEXT,
	`item_quantity` FLOAT default 0,
	`milestone_task_id` INTEGER default null,
	`item_task_id` INTEGER default null,
	`item_cost` DOUBLE default 0,
	`item_margin` DOUBLE default 0,
	`item_retail_price` DOUBLE default 0,
	`item_tax_rate` FLOAT default 0,
	`item_budget_id` INTEGER,
	`item_budget_type_id` INTEGER default null,
	PRIMARY KEY (`id`),
	KEY `item_type_id_idx2`(`item_type_id`),
	KEY `item_budget_id_idx2`(`item_budget_id`),
	CONSTRAINT `aranet_budget_item_FK_1`
		FOREIGN KEY (`item_type_id`)
		REFERENCES `aranet_type_of_invoice_item` (`id`),
	CONSTRAINT `aranet_budget_item_FK_2`
		FOREIGN KEY (`item_budget_id`)
		REFERENCES `aranet_budget` (`id`)
		ON DELETE CASCADE,
	INDEX `aranet_budget_item_FI_3` (`item_budget_type_id`),
	CONSTRAINT `aranet_budget_item_FK_3`
		FOREIGN KEY (`item_budget_type_id`)
		REFERENCES `aranet_type_of_hour` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_vendor
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_vendor`;


CREATE TABLE `aranet_vendor`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`vendor_unique_name` VARCHAR(128)  NOT NULL,
	`vendor_company_name` VARCHAR(255)  NOT NULL,
	`vendor_cif` VARCHAR(12),
	`vendor_kind_of_company_id` INTEGER default null,
	`vendor_since` DATE,
	`vendor_website` VARCHAR(255),
	`vendor_comments` TEXT,
	`vendor_has_tags` INTEGER(1) default 0,
	`created_at` DATETIME,
	`created_by` INTEGER default null,
	`updated_at` DATETIME,
	`updated_by` INTEGER default null,
	`deleted_at` DATETIME,
	`deleted_by` INTEGER default null,
	PRIMARY KEY (`id`),
	UNIQUE KEY `vendor_unique_name_idx` (`vendor_unique_name`),
	KEY `vendor_company_name_idx`(`vendor_company_name`),
	INDEX `aranet_vendor_FI_1` (`vendor_kind_of_company_id`),
	CONSTRAINT `aranet_vendor_FK_1`
		FOREIGN KEY (`vendor_kind_of_company_id`)
		REFERENCES `aranet_kind_of_company` (`id`),
	INDEX `aranet_vendor_FI_2` (`created_by`),
	CONSTRAINT `aranet_vendor_FK_2`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_vendor_FI_3` (`updated_by`),
	CONSTRAINT `aranet_vendor_FK_3`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_vendor_FI_4` (`deleted_by`),
	CONSTRAINT `aranet_vendor_FK_4`
		FOREIGN KEY (`deleted_by`)
		REFERENCES `sf_guard_user` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_expense_item
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_expense_item`;


CREATE TABLE `aranet_expense_item`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`expense_item_name` VARCHAR(128)  NOT NULL,
	`expense_item_comments` TEXT,
	`expense_purchase_date` DATE  NOT NULL,
	`expense_purchase_by` INTEGER  NOT NULL,
	`expense_item_category_id` INTEGER,
	`expense_item_payment_method_id` INTEGER,
	`expense_item_payment_check` VARCHAR(64),
	`expense_item_reimbursement_id` INTEGER,
	`expense_item_project_id` INTEGER default null,
	`expense_item_budget_id` INTEGER default null,
	`expense_item_amount` DOUBLE default 0 NOT NULL,
	`expense_item_base` DOUBLE default 0,
	`expense_item_tax_rate` FLOAT default 0,
	`expense_item_irpf` DOUBLE default 0,
	`expense_item_invoice_number` VARCHAR(128),
	`expense_item_vendor_id` INTEGER default null,
	`expense_validate_date` DATE,
	`expense_validate_by` INTEGER default null,
	`created_at` DATETIME,
	`created_by` INTEGER default null,
	`updated_at` DATETIME,
	`updated_by` INTEGER default null,
	`deleted_at` DATETIME,
	`deleted_by` INTEGER default null,
	PRIMARY KEY (`id`),
	KEY `expense_item_project_id_idx2`(`expense_item_project_id`),
	KEY `expense_item_vendor_id_idx2`(`expense_item_vendor_id`),
	KEY `expense_item_name_idx`(`expense_item_name`),
	INDEX `aranet_expense_item_FI_1` (`expense_purchase_by`),
	CONSTRAINT `aranet_expense_item_FK_1`
		FOREIGN KEY (`expense_purchase_by`)
		REFERENCES `sf_guard_user` (`id`),
	CONSTRAINT `aranet_expense_item_FK_2`
		FOREIGN KEY (`expense_item_project_id`)
		REFERENCES `aranet_project` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `aranet_expense_item_FK_3`
		FOREIGN KEY (`expense_item_vendor_id`)
		REFERENCES `aranet_vendor` (`id`),
	INDEX `aranet_expense_item_FI_4` (`expense_validate_by`),
	CONSTRAINT `aranet_expense_item_FK_4`
		FOREIGN KEY (`expense_validate_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_expense_item_FI_5` (`created_by`),
	CONSTRAINT `aranet_expense_item_FK_5`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_expense_item_FI_6` (`updated_by`),
	CONSTRAINT `aranet_expense_item_FK_6`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_expense_item_FI_7` (`deleted_by`),
	CONSTRAINT `aranet_expense_item_FK_7`
		FOREIGN KEY (`deleted_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `FI_ense_item_category_id_idx` (`expense_item_category_id`),
	CONSTRAINT `expense_item_category_id_idx`
		FOREIGN KEY (`expense_item_category_id`)
		REFERENCES `aranet_expense_category` (`id`),
	INDEX `FI_ense_item_payment_method_id_idx` (`expense_item_payment_method_id`),
	CONSTRAINT `expense_item_payment_method_id_idx`
		FOREIGN KEY (`expense_item_payment_method_id`)
		REFERENCES `aranet_payment_method` (`id`),
	INDEX `FI_ense_item_reimbursement_id_idx` (`expense_item_reimbursement_id`),
	CONSTRAINT `expense_item_reimbursement_id_idx`
		FOREIGN KEY (`expense_item_reimbursement_id`)
		REFERENCES `aranet_reimbursement` (`id`),
	INDEX `FI_ense_item_budget_id_idx` (`expense_item_budget_id`),
	CONSTRAINT `expense_item_budget_id_idx`
		FOREIGN KEY (`expense_item_budget_id`)
		REFERENCES `aranet_budget` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_expense_category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_expense_category`;


CREATE TABLE `aranet_expense_category`
(
	`id` INTEGER  NOT NULL,
	`category_title` VARCHAR(64),
	PRIMARY KEY (`id`),
	KEY `category_title_idx`(`category_title`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_reimbursement
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_reimbursement`;


CREATE TABLE `aranet_reimbursement`
(
	`id` INTEGER  NOT NULL,
	`reimbursement_title` VARCHAR(64),
	PRIMARY KEY (`id`),
	KEY `reimbursement_title_idx`(`reimbursement_title`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_income_item
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_income_item`;


CREATE TABLE `aranet_income_item`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`income_item_name` VARCHAR(128)  NOT NULL,
	`income_item_comments` TEXT,
	`income_date` DATE  NOT NULL,
	`income_item_category_id` INTEGER,
	`income_item_payment_method_id` INTEGER,
	`income_item_payment_check` VARCHAR(64),
	`income_item_reimbursement_id` INTEGER,
	`income_item_project_id` INTEGER default null,
	`income_item_budget_id` INTEGER default null,
	`income_item_amount` DOUBLE default 0 NOT NULL,
	`income_item_base` DOUBLE default 0,
	`income_item_tax_rate` FLOAT default 0,
	`income_item_irpf` DOUBLE default 0,
	`income_item_invoice_number` VARCHAR(128),
	`income_item_vendor_id` INTEGER,
	`created_at` DATETIME,
	`created_by` INTEGER default null,
	`updated_at` DATETIME,
	`updated_by` INTEGER default null,
	`deleted_at` DATETIME,
	`deleted_by` INTEGER default null,
	PRIMARY KEY (`id`),
	KEY `income_item_project_id_idx2`(`income_item_project_id`),
	KEY `income_item_vendor_id_idx2`(`income_item_vendor_id`),
	KEY `income_item_name_idx`(`income_item_name`),
	INDEX `aranet_income_item_FI_1` (`created_by`),
	CONSTRAINT `aranet_income_item_FK_1`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_income_item_FI_2` (`updated_by`),
	CONSTRAINT `aranet_income_item_FK_2`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_income_item_FI_3` (`deleted_by`),
	CONSTRAINT `aranet_income_item_FK_3`
		FOREIGN KEY (`deleted_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `FI_ome_item_category_id_idx` (`income_item_category_id`),
	CONSTRAINT `income_item_category_id_idx`
		FOREIGN KEY (`income_item_category_id`)
		REFERENCES `aranet_income_category` (`id`),
	INDEX `FI_ome_item_payment_method_id_idx` (`income_item_payment_method_id`),
	CONSTRAINT `income_item_payment_method_id_idx`
		FOREIGN KEY (`income_item_payment_method_id`)
		REFERENCES `aranet_payment_method` (`id`),
	INDEX `FI_ome_item_reimbursement_id_idx` (`income_item_reimbursement_id`),
	CONSTRAINT `income_item_reimbursement_id_idx`
		FOREIGN KEY (`income_item_reimbursement_id`)
		REFERENCES `aranet_reimbursement` (`id`),
	CONSTRAINT `income_item_project_id_idx`
		FOREIGN KEY (`income_item_project_id`)
		REFERENCES `aranet_project` (`id`)
		ON DELETE CASCADE,
	INDEX `FI_ome_item_budget_id_idx` (`income_item_budget_id`),
	CONSTRAINT `income_item_budget_id_idx`
		FOREIGN KEY (`income_item_budget_id`)
		REFERENCES `aranet_budget` (`id`),
	CONSTRAINT `income_item_vendor_id_idx`
		FOREIGN KEY (`income_item_vendor_id`)
		REFERENCES `aranet_vendor` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_income_category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_income_category`;


CREATE TABLE `aranet_income_category`
(
	`id` INTEGER  NOT NULL,
	`category_title` VARCHAR(64),
	PRIMARY KEY (`id`),
	KEY `category_title_idx`(`category_title`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_cash_item
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_cash_item`;


CREATE TABLE `aranet_cash_item`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`cash_item_name` VARCHAR(128)  NOT NULL,
	`cash_item_comments` TEXT,
	`cash_item_date` DATE  NOT NULL,
	`cash_item_amount` DOUBLE default 0 NOT NULL,
	`created_at` DATETIME,
	`created_by` INTEGER default null,
	`updated_at` DATETIME,
	`updated_by` INTEGER default null,
	`deleted_at` DATETIME,
	`deleted_by` INTEGER default null,
	PRIMARY KEY (`id`),
	KEY `cash_item_name_idx`(`cash_item_name`),
	INDEX `aranet_cash_item_FI_1` (`created_by`),
	CONSTRAINT `aranet_cash_item_FK_1`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_cash_item_FI_2` (`updated_by`),
	CONSTRAINT `aranet_cash_item_FK_2`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_cash_item_FI_3` (`deleted_by`),
	CONSTRAINT `aranet_cash_item_FK_3`
		FOREIGN KEY (`deleted_by`)
		REFERENCES `sf_guard_user` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_notification
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_notification`;


CREATE TABLE `aranet_notification`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`notification_type` INTEGER(1),
	`notification_application` VARCHAR(255),
	`notification_module` VARCHAR(255),
	`notification_action` VARCHAR(255),
	`notification_from_address` VARCHAR(255),
	`notification_to_address` VARCHAR(255),
	`notification_subject` TEXT,
	`notification_content` TEXT,
	`notification_html_content` TEXT,
	`notification_response_code` INTEGER,
	`notification_response` TEXT,
	`notification_status` INTEGER(1) default 0,
	`notification_project_id` INTEGER,
	`created_at` DATETIME,
	`created_by` INTEGER default null,
	`updated_at` DATETIME,
	`updated_by` INTEGER default null,
	PRIMARY KEY (`id`),
	INDEX `aranet_notification_FI_1` (`created_by`),
	CONSTRAINT `aranet_notification_FK_1`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_notification_FI_2` (`updated_by`),
	CONSTRAINT `aranet_notification_FK_2`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `FI_ification_project_id_idx` (`notification_project_id`),
	CONSTRAINT `notification_project_id_idx`
		FOREIGN KEY (`notification_project_id`)
		REFERENCES `aranet_project` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_report
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_report`;


CREATE TABLE `aranet_report`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`report_name` VARCHAR(128),
	`report_model` VARCHAR(128),
	`created_at` DATETIME,
	`created_by` INTEGER default null,
	`updated_at` DATETIME,
	`updated_by` INTEGER default null,
	PRIMARY KEY (`id`),
	KEY `report_model_idx`(`report_model`),
	INDEX `aranet_report_FI_1` (`created_by`),
	CONSTRAINT `aranet_report_FK_1`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_report_FI_2` (`updated_by`),
	CONSTRAINT `aranet_report_FK_2`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_report_column
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_report_column`;


CREATE TABLE `aranet_report_column`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`report_id` INTEGER,
	`column_php_name` VARCHAR(255),
	`column_name` VARCHAR(128),
	`column_order` INTEGER,
	`column_width` DOUBLE default 0 NOT NULL,
	`column_eval_script` TEXT  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `report_column_idx`(`column_php_name`, `column_order`),
	INDEX `aranet_report_column_FI_1` (`report_id`),
	CONSTRAINT `aranet_report_column_FK_1`
		FOREIGN KEY (`report_id`)
		REFERENCES `aranet_report` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_graphic
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_graphic`;


CREATE TABLE `aranet_graphic`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`graphic_name` VARCHAR(128),
	`data_points` INTEGER,
	`start_date` DATETIME,
	`end_date` DATETIME,
	`is_default` INTEGER(1) default 0,
	`created_at` DATETIME,
	`created_by` INTEGER default null,
	`updated_at` DATETIME,
	`updated_by` INTEGER default null,
	PRIMARY KEY (`id`),
	INDEX `aranet_graphic_FI_1` (`created_by`),
	CONSTRAINT `aranet_graphic_FK_1`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `aranet_graphic_FI_2` (`updated_by`),
	CONSTRAINT `aranet_graphic_FK_2`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_plot
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_plot`;


CREATE TABLE `aranet_plot`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`plot_name` VARCHAR(128),
	`plot_color` VARCHAR(64),
	`plot_type` VARCHAR(64),
	`plot_criteria` TEXT,
	`plot_date_variable` VARCHAR(128),
	`plot_class` VARCHAR(128),
	`plot_function` VARCHAR(128),
	`plot_callback` VARCHAR(128),
	`plot_acc_function` VARCHAR(128),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_graphic_plot
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_graphic_plot`;


CREATE TABLE `aranet_graphic_plot`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`graphic_id` INTEGER default null,
	`plot_id` INTEGER default null,
	PRIMARY KEY (`id`),
	INDEX `aranet_graphic_plot_FI_1` (`graphic_id`),
	CONSTRAINT `aranet_graphic_plot_FK_1`
		FOREIGN KEY (`graphic_id`)
		REFERENCES `aranet_graphic` (`id`),
	INDEX `aranet_graphic_plot_FI_2` (`plot_id`),
	CONSTRAINT `aranet_graphic_plot_FK_2`
		FOREIGN KEY (`plot_id`)
		REFERENCES `aranet_plot` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_guard_user_profile
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_guard_user_profile`;


CREATE TABLE `sf_guard_user_profile`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER  NOT NULL,
	`title` VARCHAR(4),
	`public_title` INTEGER(1) default 1,
	`first_name` VARCHAR(50),
	`public_first_name` INTEGER(1) default 0,
	`last_name` VARCHAR(100),
	`public_last_name` INTEGER(1) default 0,
	`gender` INTEGER(1),
	`public_gender` INTEGER(1) default 0,
	`email` VARCHAR(128),
	`public_email` INTEGER(1) default 0,
	`url` VARCHAR(255),
	`public_url` INTEGER(1) default 0,
	`openid_url` VARCHAR(255),
	`street` VARCHAR(255),
	`public_street` INTEGER(1) default 0,
	`city` VARCHAR(50),
	`public_city` INTEGER(1) default 0,
	`state` VARCHAR(50),
	`public_state` INTEGER(1) default 0,
	`code` INTEGER(5),
	`public_code` INTEGER(1) default 0,
	`country` VARCHAR(2) default 'ES',
	`public_country` INTEGER(1) default 0,
	`timezone` INTEGER,
	`public_timezone` INTEGER(1) default 0,
	`birthday` DATE default '00/00/0000',
	`public_birthday` INTEGER(1) default 0,
	`company` VARCHAR(128),
	`public_company` INTEGER(1) default 0,
	`cif` VARCHAR(12),
	`public_cif` INTEGER(1) default 0,
	`phone1` VARCHAR(16),
	`public_phone1` INTEGER(1) default 0,
	`phone2` VARCHAR(16),
	`public_phone2` INTEGER(1) default 0,
	`fax` VARCHAR(16),
	`public_fax` INTEGER(1) default 0,
	`notes` TEXT,
	`gravatar` INTEGER default 0,
	`avatar` LONGBLOB,
	`avatar_filetype` VARCHAR(4),
	`owner_user_id` INTEGER,
	`user_newsletter` INTEGER(1) default 0,
	`preferred_language` VARCHAR(6) default 'en_US',
	`created_at` DATETIME,
	`created_by` INTEGER default null,
	`updated_at` DATETIME,
	`updated_by` INTEGER default null,
	`deleted_at` DATETIME,
	`deleted_by` INTEGER default null,
	PRIMARY KEY (`id`),
	UNIQUE KEY `user_id_idx` (`user_id`),
	CONSTRAINT `sf_guard_user_profile_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `sf_guard_user_profile_FI_2` (`owner_user_id`),
	CONSTRAINT `sf_guard_user_profile_FK_2`
		FOREIGN KEY (`owner_user_id`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `sf_guard_user_profile_FI_3` (`created_by`),
	CONSTRAINT `sf_guard_user_profile_FK_3`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `sf_guard_user_profile_FI_4` (`updated_by`),
	CONSTRAINT `sf_guard_user_profile_FK_4`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `sf_guard_user_profile_FI_5` (`deleted_by`),
	CONSTRAINT `sf_guard_user_profile_FK_5`
		FOREIGN KEY (`deleted_by`)
		REFERENCES `sf_guard_user` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_default_indicator
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_default_indicator`;


CREATE TABLE `aranet_default_indicator`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`indicator_name` VARCHAR(255)  NOT NULL,
	`indicator_key` VARCHAR(255)  NOT NULL,
	`indicator_description` TEXT,
	`indicator_beautifier` VARCHAR(255),
	`indicator_unit` VARCHAR(10),
	`indicator_objects_class` VARCHAR(255),
	PRIMARY KEY (`id`),
	KEY `indicator_name_idx`(`indicator_name`),
	KEY `indicator_key_idx`(`indicator_key`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aranet_indicator
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aranet_indicator`;


CREATE TABLE `aranet_indicator`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`indicator_id` INTEGER  NOT NULL,
	`indicator_value` DOUBLE,
	`indicator_beautifier` VARCHAR(255),
	`indicator_unit` VARCHAR(10),
	`indicator_object_id` INTEGER  NOT NULL,
	`indicator_object_class` VARCHAR(64),
	PRIMARY KEY (`id`),
	UNIQUE KEY `indicator_unique_idx` (`indicator_id`, `indicator_object_id`, `indicator_object_class`),
	KEY `indicator_object_id_idx`(`indicator_object_id`),
	KEY `indicator_id_idx`(`indicator_id`),
	CONSTRAINT `aranet_indicator_FK_1`
		FOREIGN KEY (`indicator_id`)
		REFERENCES `aranet_default_indicator` (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;

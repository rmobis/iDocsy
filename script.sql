CREATE TABLE `modules` (
	`id` INT(10) UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
	`name` VARCHAR(128) NOT NULL
);

CREATE TABLE `sections` (
	`id` INT(10) UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
	`module_id` INT (10) NOT NULL UNSIGNED,
	`name` VARCHAR(128) NOT NULL,

	INDEX (`module_id`),
	FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`)
);

CREATE TABLE `items` (
	`id` INT(10) UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
	`section_id` INT (10) NOT NULL UNSIGNED,
	`name` VARCHAR(128) NOT NULL,
	`link` VARCHAR(128) NOT NULL UNIQUE KEY,
	`html_usage` VARCHAR(1024) NOT NULL,
	`bbcd_usage` VARCHAR(1024) NOT NULL,
	`html_description` VARCHAR(2048) NOT NULL,
	`bbcd_description` VARCHAR(2048) NOT NULL,

	INDEX (`link`),
	INDEX (`section_id`),
	FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`)
);

CREATE TABLE `return_values` (
	`id` INT(10) NOT NULL UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`item_id` INT(10) NOT NULL UNSIGNED,
	`type` VARCHAR(64) NOT NULL,
	`html_description` VARCHAR(256) NOT NULL,
	`bbcd_description` VARCHAR(256) NOT NULL,

	INDEX (`item_id`),
	FOREIGN KEY (`item_id`) REFERENCES `items` (`id`)
);

CREATE TABLE `parameters` (
	`id` INT(10) NOT NULL UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`item_id` INT(10) NOT NULL UNSIGNED,
	`name` VARCHAR(128) NOT NULL,
	`optional` BOOLEAN NOT NULL,
	`type` VARCHAR(64) NOT NULL,
	`html_description` VARCHAR(256) NOT NULL,
	`bbcd_description` VARCHAR(256) NOT NULL,

	INDEX (`item_id`),
	FOREIGN KEY (`item_id`) REFERENCES `items` (`id`)
);


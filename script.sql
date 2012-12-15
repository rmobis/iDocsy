CREATE TABLE `modules` (
	`id`	INT(10)		UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
	`name`	VARCHAR(64)	NOT NULL,
	`link`	VARCHAR(64) NOT NULL,

	INDEX (`link`)
);

CREATE TABLE `items` (
	`id`		INT(10)				UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
	`module_id`	INT(10)				UNSIGNED NOT NULL,
	`type`		ENUM(
					'Variable',
					'Function',
					'Constant',
					'Type'
				)					NOT NULL,
	`name`		VARCHAR(64) 		NOT NULL,
	`link`		VARCHAR(64) 		NOT NULL,

	UNIQUE	(`link`, `module_id`),
	INDEX	(`link`, `module_id`),
	INDEX	(`module_id`),
	FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`)
);

CREATE TABLE `headings` (
	`id`			INT(10)			UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
	`item_id`		INT(10)			UNSIGNED NOT NULL,
	`order`			TINYINT(2)		UNSIGNED NOT NULL,
	`name`			VARCHAR(128)	NOT NULL,
	`html_content`	VARCHAR(1024)	NOT NULL,
	`bbcd_content`	VARCHAR(1024),

	UNIQUE (`item_id`, `order`),
	FOREIGN KEY (`item_id`) REFERENCES `items` (`id`)
);

CREATE TABLE `sub_headings` (
	`id`			INT(10)			UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
	`heading_id`	INT(10)			UNSIGNED NOT NULL,
	`order`			TINYINT(2)		UNSIGNED NOT NULL,
	`name`			VARCHAR(128)	NOT NULL,
	`html_content`	VARCHAR(512)	NOT NULL,
	`bbcd_content`	VARCHAR(512),

	UNIQUE (`heading_id`, `order`),
	FOREIGN KEY (`heading_id`) REFERENCES `headings` (`id`)
);
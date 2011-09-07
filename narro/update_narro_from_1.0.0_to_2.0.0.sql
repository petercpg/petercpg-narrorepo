ALTER TABLE `narro_context` ADD `comment` TEXT NULL AFTER `context_md5` ;
ALTER TABLE `narro_context` ADD `comment_md5` VARCHAR( 32 ) NULL AFTER `comment` ;
ALTER TABLE `narro_context` ADD UNIQUE `text_id` ( `text_id` , `context_md5` , `file_id` , `comment_md5` );
ALTER TABLE `narro_context` ADD INDEX `project_id_2` ( `project_id` , `active` );

DROP TABLE `narro_context_comment`;

ALTER TABLE `narro_context_info` DROP `has_comments`;

DROP TABLE IF EXISTS `narro_context_plural_info`;
DROP TABLE IF EXISTS `narro_context_plural`;

ALTER TABLE `narro_file` ADD `header` TEXT NULL ;

ALTER TABLE `narro_file_progress` ADD `header` TEXT NULL AFTER `language_id` ;
ALTER TABLE `narro_file_progress` ADD `export` tinyint(1) NULL DEFAULT 1 AFTER `progress_percent` ;
ALTER TABLE `narro_file_progress` ADD INDEX `file_id_3` ( `file_id` , `language_id` , `export` ) ;

DROP TABLE IF EXISTS `narro_glossary_term`;

ALTER TABLE `narro_language` CHANGE `plural_form` `plural_form` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '"Plural-Forms: nplurals=2; plural=n != 1;\\n"' ;

ALTER TABLE `narro_project` ADD `source` text NULL AFTER `project_description` ;

ALTER TABLE `narro_project_progress` ADD `active` tinyint(1) NULL DEFAULT '0' AFTER `language_id` ;
ALTER TABLE `narro_project_progress` ADD `source` TEXT NULL AFTER `progress_percent` ;

ALTER TABLE `narro_suggestion` ADD INDEX `text_id_3` ( `text_id` , `language_id` );

ALTER TABLE `narro_suggestion_vote` DROP `text_id`;

CREATE TABLE IF NOT EXISTS `zend_cache` (
  `id` varchar(255) NOT NULL,
  `content` text,
  `lastModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expire` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `zend_cache_id_expire_index` (`id`,`expire`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `zend_cache_tag` (
  `name` text,
  `id` text
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `zend_cache_version` (
  `num` int(11) NOT NULL,
  PRIMARY KEY (`num`)
) ENGINE=InnoDB;

UPDATE `narro_project_progress` SET narro_project_progress.active=(SELECT narro_project.active FROM narro_project WHERE narro_project.project_id=narro_project_progress.project_id);
UPDATE `narro_file_progress` SET export=1;


ALTER TABLE `narro_file_progress` ADD `file_md5` VARCHAR( 32 ) NULL AFTER `language_id` ;
DROP TABLE IF EXISTS `narro_user_permission`;

ALTER TABLE `narro_file_progress` CHANGE `total_text_count` `total_text_count` INT( 10 ) NOT NULL DEFAULT '0',
CHANGE `approved_text_count` `approved_text_count` INT( 10 ) NOT NULL DEFAULT '0',
CHANGE `fuzzy_text_count` `fuzzy_text_count` INT( 10 ) NOT NULL DEFAULT '0',
CHANGE `progress_percent` `progress_percent` INT( 10 ) NOT NULL DEFAULT '0';
ALTER TABLE `narro_file_progress` CHANGE `export` `export` TINYINT( 1 ) NOT NULL DEFAULT '1';

ALTER TABLE `narro_context_info` DROP FOREIGN KEY `narro_context_info_ibfk_10` ;
ALTER TABLE `narro_context_info` DROP COLUMN `text_access_key` , DROP COLUMN `popular_suggestion_id` 
, DROP INDEX `popular_suggestion_id` ;

ALTER TABLE `narro_context` ADD COLUMN `text_access_key` CHAR(1)  NULL DEFAULT NULL  AFTER `text_id`;
ALTER TABLE `narro_context_info` CHANGE COLUMN `suggestion_access_key` `suggestion_access_key` CHAR(1)  NULL DEFAULT NULL  ;

INSERT INTO `narro_file_type` (
`file_type_id` ,
`file_type`
)
VALUES (
NULL , 'Html'
);

INSERT INTO `narro_project_type` (
`project_type_id` ,
`project_type`
)
VALUES (
NULL , 'Html'
);

ALTER TABLE `narro_language` CHANGE `plural_form` `plural_form` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '"Plural-Forms: nplurals=2; plural=n != 1;\\n"';

ALTER TABLE `narro_context` CHANGE `context_md5` `context_md5` VARCHAR( 32 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE `narro_text` CHANGE `text_value_md5` `text_value_md5` VARCHAR( 32 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE `narro_suggestion` CHANGE `suggestion_value_md5` `suggestion_value_md5` VARCHAR( 32 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;








ALTER TABLE `narro_context` DROP INDEX `context_md5`;
ALTER TABLE `narro_context` DROP INDEX `project_id`;



INSERT INTO narro_context_data
SELECT NULL , `context_id` , `text_access_key` , `context` , `comment` , `created` , `modified`
FROM narro_context;

INSERT INTO narro_context_info_data
SELECT NULL , `context_info_id` , `validator_user_id` , `valid_suggestion_id` , `suggestion_access_key` , `created` , `modified`
FROM narro_context_info ;

ALTER TABLE `narro_context_info` DROP FOREIGN KEY `narro_context_info_ibfk_13` ;
ALTER TABLE `narro_context_info` DROP FOREIGN KEY `narro_context_info_ibfk_9` ;
ALTER TABLE `narro_context_info` DROP INDEX `validator_user_id`;
ALTER TABLE `narro_context_info` DROP INDEX `suggestion_id`;

ALTER TABLE `narro_context_info`
  DROP `validator_user_id`,
  DROP `valid_suggestion_id`,
  DROP `suggestion_access_key`,
  DROP `created`,
  DROP `modified`;
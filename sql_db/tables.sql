CREATE TABLE IF NOT EXISTS `Users`
(
	`user_id`					int			PRIMARY KEY NOT NULL AUTO_INCREMENT,
	`user_type`					tinyint			NOT NULL DEFAULT 1,
	`username`					varchar(60)		NOT NULL,
	`nickname`					varchar(60)		DEFAULT NULL,	
	`password`					varchar(255)		NOT NULL,
	`email`						varchar(60)		NOT NULL,
	`reg_dt`					timestamp		NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`phone`						varchar(60)		DEFAULT NULL,
	`address`					varchar(100)            DEFAULT NULL,
	`fname`						varchar(60)		DEFAULT NULL,
	`lname`						varchar(60)		DEFAULT NULL,
	`birthday`					datetime		DEFAULT NULL,
	`allow_multiple_sessions`                       tinyint			NOT NULL DEFAULT 0,
	`session_token`                                 tinyint			NOT NULL DEFAULT 0,
	`active_ip`					varchar(60)		DEFAULT NULL,
	`admin_description`                             varchar(255)            DEFAULT NULL
)

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
SELECT * FROM martin.comments;
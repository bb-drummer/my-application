SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `acl`;
CREATE TABLE IF NOT EXISTS `acl` (
  `acl_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `aclroles_id` bigint(10) NOT NULL,
  `aclresources_id` bigint(10) NOT NULL,
  `state` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'allow',
  `application_id` bigint(10) NOT NULL DEFAULT '0',
  `client_id` bigint(10) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`acl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS `aclresource`;
CREATE TABLE IF NOT EXISTS `aclresource` (
  `aclresources_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `resourceslug` varchar(255) COLLATE utf8_bin NOT NULL,
  `resourcename` varchar(255) COLLATE utf8_bin NOT NULL,
  `application_id` bigint(10) NOT NULL DEFAULT '0',
  `client_id` bigint(10) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`aclresources_id`),
  UNIQUE KEY `resourceslug` (`resourceslug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS `aclrole`;
CREATE TABLE IF NOT EXISTS `aclrole` (
  `aclroles_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `roleslug` varchar(255) COLLATE utf8_bin NOT NULL,
  `rolename` varchar(255) COLLATE utf8_bin NOT NULL,
  `application_id` bigint(10) NOT NULL DEFAULT '0',
  `client_id` bigint(10) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`aclroles_id`),
  UNIQUE KEY `roleslug` (`roleslug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `application_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_bin NOT NULL,
  `shortname` text COLLATE utf8_bin NOT NULL,
  `path` text COLLATE utf8_bin NOT NULL,
  `url` text COLLATE utf8_bin NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `client_id` bigint(10) NOT NULL,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`application_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `clients_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_bin NOT NULL,
  `extraname` text COLLATE utf8_bin NOT NULL,
  `homepage` text COLLATE utf8_bin NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `contact` text COLLATE utf8_bin NOT NULL,
  `phone` text COLLATE utf8_bin NOT NULL,
  `statistics` int(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`clients_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `settings_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `scope` varchar(255) COLLATE utf8_bin NOT NULL,
  `ref_id` bigint(10) NOT NULL,
  `type` varchar(32) COLLATE utf8_bin NOT NULL,
  `name` varchar(32) COLLATE utf8_bin NOT NULL,
  `value` text COLLATE utf8_bin NOT NULL,
  `application_id` bigint(10) NOT NULL DEFAULT '0',
  `client_id` bigint(10) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`settings_id`),
  UNIQUE KEY `type_name` (`type`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `display_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `username` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `password` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `state` smallint(5) NOT NULL DEFAULT '1',
  `aclrole` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'swimmer',
  `token` text COLLATE utf8_bin NOT NULL,
  `application_id` bigint(10) NOT NULL DEFAULT '0',
  `client_id` bigint(10) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS `userprofile`;
CREATE TABLE IF NOT EXISTS `userprofile` (
  `user_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `street` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `city` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `country` varchar(255) COLLATE utf8_bin NOT NULL,
  `phone` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `cell` varchar(255) COLLATE utf8_bin NOT NULL,
  `twitter` text COLLATE utf8_bin NOT NULL,
  `facebook` text COLLATE utf8_bin NOT NULL,
  `skype` text COLLATE utf8_bin NOT NULL,
  `icq` text COLLATE utf8_bin NOT NULL,
  `application_id` bigint(10) NOT NULL DEFAULT '0',
  `client_id` bigint(10) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS `user_provider`;
CREATE TABLE IF NOT EXISTS `user_provider` (
  `user_id` bigint(10) NOT NULL,
  `provider_id` varchar(50) COLLATE utf8_bin NOT NULL,
  `provider` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



--
-- Demo-Daten für Demo-Installation
--

--
-- Daten für Tabelle `aclresource`
--

INSERT INTO `aclresource` (`aclresources_id`, `resourceslug`, `resourcename`, `application_id`, `client_id`, `created`, `modified`) VALUES
(1, 'mvc:nouser', 'kein Benutzer', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'mvc:user', 'Benutzer', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'mvc:admin', 'Administration', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Daten für Tabelle `aclrole`
--

INSERT INTO `aclrole` (`aclroles_id`, `roleslug`, `rolename`, `application_id`, `client_id`, `created`, `modified`) VALUES
(1, 'admin', 'Administrator', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'public', 'kein Benutzer', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'user', 'Benutzer', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Daten für Tabelle `acl`
--

INSERT INTO `acl` (`acl_id`, `aclroles_id`, `aclresources_id`, `state`, `application_id`, `client_id`, `created`, `modified`) VALUES
(1, 4, 1, 'allow', 0, 0, '0000-00-00 00:00:00', '2016-02-07 20:33:35'),
(3, 1, 1, 'deny', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 4, 4, 'deny', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 1, 4, 'allow', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 1, 2, 'allow', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 4, 2, 'deny', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 6, 4, 'deny', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 6, 1, 'deny', 0, 0, '0000-00-00 00:00:00', '2016-02-26 01:46:24'),
(66, 6, 2, 'allow', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`user_id`, `display_name`, `username`, `email`, `password`, `state`, `aclrole`, `token`, `application_id`, `client_id`, `created`, `modified`) VALUES
(1, 'System-Administrator', 'sysadmin', 'webmaster@myapplication.tld', '$2y$14$aNr/FPiS.Kbw8/ZYiOaXpum/4RrX7AGMaxA5vV6OIHUi1kr.w6GgC', 1, 'admin', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Daten für Tabelle `settings`
--

INSERT INTO `settings` (`settings_id`, `scope`, `ref_id`, `type`, `name`, `value`, `application_id`, `client_id`, `created`, `modified`) VALUES
(1, '', 0, 'system', 'lang', 'de_DE', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '', 0, 'user', 'lang', 'de_DE', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'application', 0, 'app', 'var', 'value test', 0, 0, '0000-00-00 00:00:00', '2016-01-29 20:37:59');

--
-- Daten für Tabelle `clients`
--

INSERT INTO `clients` (`clients_id`, `name`, `extraname`, `homepage`, `email`, `contact`, `phone`, `statistics`, `created`, `modified`) VALUES
(1, 'Example Client Inc.', '', 'https://example.com', 'email@example.com', 'Mr. Sample Client', '', 1, '0000-00-00 00:00:00', '2016-02-08 13:32:31');

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`application_id`, `name`, `shortname`, `path`, `url`, `email`, `client_id`, `created`, `modified`) VALUES
(1, 'example-app', 'example application', '/var/www/app', 'http://app.example.com', 'app@example.com', 1, '0000-00-00 00:00:00', '2016-02-23 23:49:27');

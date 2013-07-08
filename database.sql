SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `a3m_account` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(24) NOT NULL,
  `email` varchar(160) NOT NULL,
  `password` varchar(60) DEFAULT NULL,
  `createdon` datetime NOT NULL,
  `verifiedon` datetime DEFAULT NULL,
  `lastsignedinon` datetime DEFAULT NULL,
  `resetsenton` datetime DEFAULT NULL,
  `deletedon` datetime DEFAULT NULL,
  `suspendedon` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=2 ;

CREATE TABLE IF NOT EXISTS `a3m_account_details` (
  `account_id` bigint(20) unsigned NOT NULL,
  `fullname` varchar(160) DEFAULT NULL,
  `firstname` varchar(80) DEFAULT NULL,
  `lastname` varchar(80) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `postalcode` varchar(40) DEFAULT NULL,
  `country` char(2) DEFAULT NULL,
  `language` char(2) DEFAULT NULL,
  `timezone` varchar(40) DEFAULT NULL,
  `picture` varchar(240) DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

CREATE TABLE IF NOT EXISTS `a3m_account_facebook` (
  `account_id` bigint(20) NOT NULL,
  `facebook_id` bigint(20) NOT NULL,
  `linkedon` datetime NOT NULL,
  PRIMARY KEY (`account_id`),
  UNIQUE KEY `facebook_id` (`facebook_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `a3m_account_openid` (
  `openid` varchar(240) NOT NULL,
  `account_id` bigint(20) unsigned NOT NULL,
  `linkedon` datetime NOT NULL,
  PRIMARY KEY (`openid`),
  KEY `account_id` (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

CREATE TABLE IF NOT EXISTS `a3m_account_twitter` (
  `account_id` bigint(20) NOT NULL,
  `twitter_id` bigint(20) NOT NULL,
  `oauth_token` varchar(80) NOT NULL,
  `oauth_token_secret` varchar(80) NOT NULL,
  `linkedon` datetime NOT NULL,
  PRIMARY KEY (`account_id`),
  KEY `twitter_id` (`twitter_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `activity` (
  `activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY (`activity_id`),
  KEY `activity_id` (`activity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

CREATE TABLE IF NOT EXISTS `activity_group` (
  `ig` int(11) NOT NULL AUTO_INCREMENT,
  `activity` int(11) NOT NULL,
  `group` int(11) NOT NULL,
  PRIMARY KEY (`ig`),
  KEY `activity` (`activity`,`group`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

CREATE TABLE IF NOT EXISTS `activity_location` (
  `activity_location_id` int(11) NOT NULL AUTO_INCREMENT,
  `activity` int(11) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  PRIMARY KEY (`activity_location_id`),
  KEY `activity` (`activity`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

CREATE TABLE IF NOT EXISTS `ci_session` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=8 ;

CREATE TABLE IF NOT EXISTS `ref_country` (
  `alpha2` char(2) NOT NULL,
  `alpha3` char(3) NOT NULL,
  `numeric` varchar(3) NOT NULL,
  `country` varchar(80) NOT NULL,
  PRIMARY KEY (`alpha2`),
  UNIQUE KEY `alpha3` (`alpha3`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ref_currency` (
  `alpha` char(3) NOT NULL,
  `numeric` varchar(3) DEFAULT NULL,
  `currency` varchar(80) NOT NULL,
  PRIMARY KEY (`alpha`),
  KEY `numeric` (`numeric`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

CREATE TABLE IF NOT EXISTS `ref_iptocountry` (
  `ip_from` int(10) unsigned NOT NULL,
  `ip_to` int(10) unsigned NOT NULL,
  `country_code` char(2) NOT NULL,
  KEY `country_code` (`country_code`),
  KEY `ip_to` (`ip_to`),
  KEY `ip_from` (`ip_from`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ref_language` (
  `one` char(2) NOT NULL,
  `two` char(3) NOT NULL,
  `language` varchar(120) NOT NULL,
  `native` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`one`),
  KEY `two` (`two`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ref_timezone` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `abbr` varchar(8) NOT NULL,
  `name` varchar(80) NOT NULL,
  `utc` varchar(18) NOT NULL,
  `hours` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `abbr` (`abbr`),
  KEY `utc` (`utc`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=109 ;

CREATE TABLE IF NOT EXISTS `ref_zoneinfo` (
  `zoneinfo` varchar(40) NOT NULL,
  `offset` varchar(16) DEFAULT NULL,
  `summer` varchar(16) DEFAULT NULL,
  `country` char(2) NOT NULL,
  PRIMARY KEY (`zoneinfo`),
  KEY `country` (`country`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=5 ;

CREATE TABLE IF NOT EXISTS `user_group` (
  `user_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `group` int(11) NOT NULL,
  PRIMARY KEY (`user_group_id`),
  KEY `user` (`user`),
  KEY `group` (`group`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

CREATE TABLE IF NOT EXISTS `user_location` (
  `user_location_id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  PRIMARY KEY (`user_location_id`),
  KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=7 ;


ALTER TABLE `activity_location`
  ADD CONSTRAINT `activity_location_ibfk_1` FOREIGN KEY (`activity`) REFERENCES `activity` (`activity_id`);


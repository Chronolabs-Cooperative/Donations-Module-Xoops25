CREATE TABLE `donations` (
  `din` int(13) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(12) unsigned DEFAULT '0',
  `amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `currency` varchar(3) NOT NULL DEFAULT 'USD',
  `realname` varchar(128) DEFAULT NULL,
  `state` varchar(128) DEFAULT NULL,
  `country` varchar(128) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created` int(12) NOT NULL DEFAULT '0',
  `iid` int(13) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`din`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
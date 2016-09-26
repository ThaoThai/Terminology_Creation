CREATE TABLE IF NOT EXISTS `language` (
 `code_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` char(2) NOT NULL,
  `language_name` varchar(20) NOT NULL,
  `country` varchar(20),
  PRIMARY KEY (`code_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

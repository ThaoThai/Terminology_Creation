CREATE TABLE IF NOT EXISTS translation(
 `en` varchar(255),
 `az` varchar(255),
 `ca` varchar(255),
 `es`  varchar(255),
 `fj` varchar(255),
 `fr` varchar(255),
 `ga` varchar(255),
 `gl` varchar(255),
 `haw` varchar(255),
 `id` varchar(255),
 `it` varchar(255),
 `ms` varchar(255),
 `pt` varchar(255),
 `sm` varchar(255),
 `su` varchar(255),
 `tk` varchar(255),
 `tr` varchar(255),
 `tt` varchar(255),
 `uz` varchar(255),
 `vec` varchar(255),
 `wa` varchar(255)
 )ENGINE=InnoDB DEFAULT CHARSET=utf8;

 CREATE TABLE IF NOT EXISTS users(
  `user_key` varchar(40) NOT NULL ,
  `username` varchar(40) NOT NULL ,
  `pwd` varchar(255) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(40) NOT NULL,
  `language` varchar(40) NOT NULL,
  PRIMARY KEY (`user_key`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

  CREATE TABLE IF NOT EXISTS sessions(
   `sid` varchar(40) NOT NULL ,
   `expiry` int(10) unsigned NOT NULL,
   `data` text NOT NULL,
   PRIMARY KEY (`sid`)
   )ENGINE=InnoDB DEFAULT CHARSET=latin1;

   CREATE TABLE IF NOT EXISTS admin(
    `id` INT NOT NULL AUTO_INCREMENT,
    `username` varchar(40) NOT NULL ,
    `pwd` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
  )ENGINE=InnoDB DEFAULT CHARSET=utf8;



  load data infile 'translations.txt' into table translation
  fields terminated by ';';

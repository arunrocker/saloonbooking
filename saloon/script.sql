CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
); 





CREATE TABLE `customers` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
); 



CREATE TABLE `shop` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `ratings` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `opening_time` int(255) NOT NULL,
  `closing_time` int(255) NOT NULL,
  `hair` varchar(255) NOT NULL,
  `skin` varchar(255) NOT NULL,
  `nail` varchar(255) NOT NULL,
  `massage` varchar(255) NOT NULL,
  `cost_hair` int(255) NOT NULL,
  `cost_skin` int(255) NOT NULL,
  `cost_nail` int(255) NOT NULL,
  `cost_massage` int(255) NOT NULL,
  PRIMARY KEY (`id`)
);












<!--For Create products-->
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active | 0=Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci


<!--For Create payments-->
CREATE TABLE `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` float(10,2) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `payment_amount` float(10,2) NOT NULL,
  `currency_code` varchar(5) NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `invoice_id` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `createdtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci


<!--For early access clients-->
CREATE table `earlyAccessClients` (
  `clientId` int(11) AUTO_INCREMENT PRIMARY KEY,
  `jobTitle` varchar(255),
  `category` varchar(255),
  `openToWorldwideRoles` varchar(100),
  `jobType` varchar(100),
  `name` varchar(255),
  `email` varchar(255),
  `location` varchar(255),
  `status` varchar(100),
  `joinedOn` date
);

<!--For post a job-->
CREATE TABLE `jobs` (
  `jobId` int(11) AUTO_INCREMENT PRIMARY KEY,
  `jobTitle` varchar(255),
  `category` varchar(255),
  `isThisRoleOpenWorldwide` varchar(100),
  `applicationLinkOrEmail` varchar(255),
  `jobType` varchar(100),
  `jobDescription` varchar(255),
  `companyName` varchar(100),
  `companyHQ` varchar(100),
  `companyWebsiteURL` varchar(255),
  `email` varchar(255),
  `companyDescription` varchar(255),
  `datePosted` date,
  `status` varchar(100),
  `featured` varchar(100)
);
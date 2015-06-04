DROP TABLE IF EXISTS `phpshop_modules_rees46_system`;
CREATE TABLE IF NOT EXISTS `phpshop_modules_rees46_system` (
  `id` int(11) NOT NULL auto_increment,
  `shop_key` VARCHAR(100),
  `shop_secret` VARCHAR(100),
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

INSERT INTO `phpshop_modules_rees46_system` VALUES (1,'','');

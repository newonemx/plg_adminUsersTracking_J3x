
CREATE TABLE IF NOT EXISTS `#__core_admin_user_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_modifier` text,
  `user_id_modified` text,
  `old_data` text,
  `new_data` text,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22333 DEFAULT CHARSET=latin1;

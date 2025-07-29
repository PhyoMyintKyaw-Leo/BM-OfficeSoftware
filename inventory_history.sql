CREATE TABLE `inventory_history` (
  `id` int(11) AUTO_INCREMENT primary key NOT NULL,
  `user_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `remark` varchar(225) NOT NULL,
 `count` int(25) NOT NULL,
 `total_count` int(25) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
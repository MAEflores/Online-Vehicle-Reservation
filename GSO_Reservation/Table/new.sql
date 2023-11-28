CREATE TABLE `administrative` (
  `id` int(100) AUTO_INCREMENT PRIMARY KEY,
  `date` varchar(15) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `plate_number` varchar(100) NOT NULL,
  `passenger` varchar(100) NOT NULL,
  `place` varchar(100) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `time_departure` varchar(100) NOT NULL,
  `type1` varchar(100) NOT NULL,
  `time_arrival` varchar(100) NOT NULL,
  `type2` varchar(100) NOT NULL,
  `time_depart` varchar(100) NOT NULL,
  `type3` varchar(100) NOT NULL,
  `time_arrival_back` varchar(100) NOT NULL,
  `type4` varchar(100) NOT NULL,
  `distance` varchar(100) NOT NULL,
  `gasoline` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL,
  `issued` varchar(100) NOT NULL,
  `additional_purchase` varchar(100) NOT NULL,
  `deduct` varchar(100) NOT NULL,
  `gear_oil_issued` varchar(100) NOT NULL,
  `lub_oil_issued` varchar(100) NOT NULL,
  `grease_issued` varchar(100) NOT NULL,
  `beggining` varchar(100) NOT NULL,
  `end_of_trip` varchar(100) NOT NULL,
  `distance_travelled` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `available` (
  `id` int(100) AUTO_INCREMENT PRIMARY KEY,
  `Hiace` int(100) NOT NULL,
  `Hilux` int(100) NOT NULL,
  `Isuzu` int(100) NOT NULL,
  `Multi` int(100) NOT NULL,
  `Jinbie` int(100) NOT NULL,
  `Foton` int(100) NOT NULL,
  `Tornado` int(100) NOT NULL,
  `Innova` int(100) NOT NULL,
  `Commuter` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `available` (`id`, `Hiace`, `Hilux`, `Isuzu`, `Multi`, `Jinbie`, `Foton`, `Tornado`, `Innova`, `Commuter`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0);


CREATE TABLE `login` (
  `id` int(100) AUTO_INCREMENT PRIMARY KEY,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image2` varchar(100) NOT NULL,
  `sel_id` varchar(100) NOT NULL,
  `date_arrival` varchar(100) NOT NULL,
  `time_arrival` varchar(100) NOT NULL,
  `date_departure` varchar(100) NOT NULL,
  `time_departure` varchar(100) NOT NULL,
  `passangers` varchar(100) NOT NULL,
  `visited` varchar(100) NOT NULL,
  `letter` varchar(100) NOT NULL,
  `Vehicle` varchar(100) NOT NULL,
  `Driver` varchar(100) NOT NULL,
  `request` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
INSERT INTO `login` (`id`, `email`, `password`, `status`, `usertype`, `user_id`, `name`, `age`, `address`, `phone_number`, `image`, `image2`, `sel_id`, `date_arrival`, `time_arrival`, `date_departure`, `time_departure`, `passangers`, `visited`, `letter`, `Vehicle`, `Driver`, `request`) VALUES 
('1', '', 'd3d39da0de7925be5fd05f7dfdf8e075', '1', 'admin', 'Jamaica3290', 'Jamaica Ginez', '21', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');


-- admin_Jam_3290
CREATE TABLE `used_vehicles` (
  `id` int(100) AUTO_INCREMENT PRIMARY KEY,
  `vehicle` varchar(100) NOT NULL,
  `month` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
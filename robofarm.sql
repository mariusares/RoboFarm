GRANT ALL PRIVILEGES ON *.* TO 'ceres'@'localhost' IDENTIFIED BY 'roboceres#';
CREATE DATABASE roboceres;
USE roboceres;
CREATE TABLE IF NOT EXISTS `auxiliary` (
  `enablevent` int(5) NOT NULL,
  `startVent` int(5) NOT NULL,
  `stopVent` int(5) NOT NULL,
  `enableheat` int(5) NOT NULL,
  `startHeat` int(5) NOT NULL,
  `stopHeat` varchar(5) NOT NULL,
  `enabledaynight` int(5) NOT NULL,
  `dayTemp` int(5) NOT NULL,
  `nightTemp` int(5) NOT NULL,
  `dayLux` int(15) NOT NULL,
  `nightLux` int(5) NOT NULL,
  `enablelight` int(15) NOT NULL,
  `startLightTime` int(5) NOT NULL,
  `stopLightTime` int(5) NOT NULL,
  `enableLuxIndex` varchar(5) NOT NULL,
  `optimLux` int(5) NOT NULL,
  `enableHumi` int(5) NOT NULL,
  `startHumi` int(5) NOT NULL,
  `stopHumi` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auxiliary`
--

INSERT INTO `auxiliary` (`enablevent`, `startVent`, `stopVent`, `enableheat`, `startHeat`, `stopHeat`, `enabledaynight`, `dayTemp`, `nightTemp`, `dayLux`, `nightLux`, `enablelight`, `startLightTime`, `stopLightTime`, `enableLuxIndex`, `optimLux`, `enableHumi`, `startHumi`, `stopHumi`) VALUES
(0, 25, 20, 0, 5, '6', 1, 25, 15, 7, 8, 0, 1, 2, '1', 25000, 0, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `comfort`
--

CREATE TABLE IF NOT EXISTS `comfort` (
  `id` int(5) NOT NULL,
  `name` text NOT NULL,
  `position` int(5) NOT NULL,
  `enable` int(5) NOT NULL,
  `Topen` int(5) NOT NULL,
  `Tclose` varchar(5) NOT NULL,
  `Wenable` int(5) NOT NULL,
  `Wwind` int(5) NOT NULL,
  `Wclose` int(5) NOT NULL,
  `timecycle` int(15) NOT NULL,
  `steps` int(5) NOT NULL,
  `break` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comfort`
--

INSERT INTO `comfort` (`id`, `name`, `position`, `enable`, `Topen`, `Tclose`, `Wenable`, `Wwind`, `Wclose`, `timecycle`, `steps`, `break`) VALUES

(1, 'Motor 1', 1, 0, 20, '19', 0, 10, 15, 4, 3, 10),
(2, 'Motor 2', 2, 0, 24, '23', 0, 10, 25, 4, 3, 10),
(3, 'Motor 3', 1, 0, 21, '19', 0, 10, 15, 4, 2, 10),
(4, 'Motor 4', 0, 0, 28, '26', 0, 10, 15, 20, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `irigare`
--

CREATE TABLE IF NOT EXISTS `irigare` (
  `id` int(5) NOT NULL,
  `activi1` int(5) NOT NULL,
  `OraPornireIrigare` int(5) NOT NULL,
  `MinutPornireIrigare` int(5) NOT NULL,
  `OraOprireIrigare` int(5) NOT NULL,
  `MinutOprireIrigare` int(5) NOT NULL,
  `activh1` int(5) NOT NULL,
  `OraPornireHrana` int(5) NOT NULL,
  `MinutPornireHrana` int(5) NOT NULL,
  `OraOprireHrana` int(5) NOT NULL,
  `MinutOprireHrana` int(5) NOT NULL,
  `activi2` int(5) NOT NULL,
  `OraPornireIrigare2` int(5) NOT NULL,
  `MinutPornireIrigare2` int(5) NOT NULL,
  `OraOprireIrigare2` int(5) NOT NULL,
  `MinutOprireIrigare2` int(5) NOT NULL,
  `activh2` int(5) NOT NULL,
  `OraPornireHrana2` int(5) NOT NULL,
  `MinutPornireHrana2` int(5) NOT NULL,
  `OraOprireHrana2` int(5) NOT NULL,
  `MinutOprireHrana2` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `irigare`
--

INSERT INTO `irigare` (`id`, `activi1`, `OraPornireIrigare`, `MinutPornireIrigare`, `OraOprireIrigare`, `MinutOprireIrigare`, `activh1`, `OraPornireHrana`, `MinutPornireHrana`, `OraOprireHrana`, `MinutOprireHrana`, `activi2`, `OraPornireIrigare2`, `MinutPornireIrigare2`, `OraOprireIrigare2`, `MinutOprireIrigare2`, `activh2`, `OraPornireHrana2`, `MinutPornireHrana2`, `OraOprireHrana2`, `MinutOprireHrana2`) VALUES
(1, 0, 20, 2, 20, 5, 0, 20, 3, 20, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 20, 7, 20, 10, 0, 20, 8, 20, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.ro', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
CREATE TABLE `settings` (
  `id` int(5) NOT NULL,
  `master` int(5) NOT NULL,
  `Rchannel` int(5) NOT NULL,
  `Rid` int(5) NOT NULL,
  `Rpw` int(15) NOT NULL,
  `zones` int(15) NOT NULL,
  `temp` int(5) NOT NULL,
  `geo` int(5) NOT NULL,
  `speed` int(5) NOT NULL,
  `Tsensor` int(5) NOT NULL,
  `Wsensor` int(5) NOT NULL,
  `Lsensor` int(5) NOT NULL,
  `NA` int(5) NOT NULL,
  `NA1` int(5) NOT NULL,
  `NA2` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `master`, `Rchannel`, `Rid`, `Rpw`, `zones`, `temp`, `geo`, `speed`, `Tsensor`, `Wsensor`, `Lsensor`, `NA`, `NA1`, `NA2`) VALUES
(1, 0, 1, 2, 3, 6, 1, 1, 1, 2, 2, 1, 4, 1, 1);

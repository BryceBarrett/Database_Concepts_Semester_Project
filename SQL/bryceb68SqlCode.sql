-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 23, 2018 at 01:12 PM
-- Server version: 5.6.36-82.1-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bryceb68_test`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`bryceb68`@`localhost` PROCEDURE `getAllTeams` ()  BEGIN
select * from Teams;
END$$

CREATE DEFINER=`bryceb68`@`localhost` PROCEDURE `managerLeague` (IN `mName` VARCHAR(255))  BEGIN
	select m1.name, t1.name as teamName, l1.leaguename from Managers m1
	inner join Teams t1 on m1.teamName = t1.name
	inner join League l1 on l1.leagueName = t1.league
    where m1.name = mName;
END$$

CREATE DEFINER=`bryceb68`@`localhost` PROCEDURE `playerLeague` (IN `pName` VARCHAR(255))  BEGIN
	select p1.name, t1.name as teamName, l1.leaguename from Players p1
	inner join Teams t1 on p1.teamName = t1.name
	inner join League l1 on l1.leagueName = t1.league
    where p1.name = pName;
END$$

--
-- Functions
--
CREATE DEFINER=`bryceb68`@`localhost` FUNCTION `ValidTrade` (`traded` DATE, `tradeDeadLine` DATE) RETURNS VARCHAR(255) CHARSET utf8 BEGIN
	DECLARE validTradeAns varchar(255);

	if traded > tradeDeadLine THEN
		Set validTradeAns = 'Invalid Trade';
	ELSEIF traded = tradeDeadLine THEN
		set validTradeAns = 'Valid Trade';
	ELSEIF traded < tradeDeadLine THEN
		set validTradeAns = 'Valid Trade';
	End IF;
	RETURN validTradeAns;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `isTradeValid`
-- (See below for the actual view)
--
CREATE TABLE `isTradeValid` (
`playerName` varchar(255)
,`dateTraded` date
,`validTrades` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `League`
--

CREATE TABLE `League` (
  `leagueName` varchar(255) NOT NULL,
  `numTeams` int(11) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `League`
--

INSERT INTO `League` (`leagueName`, `numTeams`, `country`) VALUES
('Bundesliga', 20, 'Germany'),
('La Liga', 20, 'Spain'),
('Ligue 1', 20, 'France'),
('Major League Soccer', 22, 'United States of America'),
('Premier League', 22, 'England');

-- --------------------------------------------------------

--
-- Table structure for table `Managers`
--

CREATE TABLE `Managers` (
  `manID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `teamName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Managers`
--

INSERT INTO `Managers` (`manID`, `name`, `age`, `country`, `teamName`) VALUES
(2, 'Bryce', 32, 'USA', 'Manchester United'),
(3, 'Nick Spain', 32, 'England', 'Manchester United'),
(5, 'Jose Mourinho', 54, 'Portugal', 'Manchester United'),
(6, 'Arsene Wenger', 68, 'France', 'Arsenal Football Club'),
(7, 'Jesse Marsch', 44, 'United States of America', 'New York Red Bulls'),
(8, 'Zinedine Zidane', 45, 'France', 'Real Madrid CLub de Futbol');

-- --------------------------------------------------------

--
-- Table structure for table `Matches`
--

CREATE TABLE `Matches` (
  `matchID` int(11) NOT NULL,
  `homeTeam` varchar(255) NOT NULL,
  `awayTeam` varchar(255) NOT NULL,
  `gameDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Matches`
--

INSERT INTO `Matches` (`matchID`, `homeTeam`, `awayTeam`, `gameDate`) VALUES
(14, 'Arsenal Football Club', 'Manchester United', '2017-12-22'),
(15, 'Bayern Munich Football Club', 'New York Red Bulls', '2018-01-23'),
(16, 'Chelsea Football Club', 'Arsenal Football Club', '2018-01-30'),
(17, 'New York Red Bulls', 'Seattle Sounders FC', '2017-12-12'),
(19, 'Arsenal Football Club', 'Manchester United', '2017-11-21');

--
-- Triggers `Matches`
--
DELIMITER $$
CREATE TRIGGER `updateMatchDate` BEFORE INSERT ON `Matches` FOR EACH ROW BEGIN
DECLARE x Date;
Set x = (SELECT CURRENT_DATE);
If new.gameDate < x THEN
	Set new.gameDate = x;
End IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `numPlayersperLeague`
-- (See below for the actual view)
--
CREATE TABLE `numPlayersperLeague` (
`leagueName` varchar(255)
,`playersCount` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `numTeamsinLeague`
-- (See below for the actual view)
--
CREATE TABLE `numTeamsinLeague` (
`leagueName` varchar(255)
,`teamsCount` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `Owners`
--

CREATE TABLE `Owners` (
  `ownerID` int(11) NOT NULL,
  `ownerName` varchar(255) NOT NULL,
  `netWorth` int(11) DEFAULT NULL,
  `teamName` varchar(255) NOT NULL,
  `yearBought` date DEFAULT NULL,
  `teamOwnedLen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Owners`
--

INSERT INTO `Owners` (`ownerID`, `ownerName`, `netWorth`, `teamName`, `yearBought`, `teamOwnedLen`) VALUES
(3, 'Uli Hoeness', 30000122, 'Bayern Munich Football Club', '2008-12-23', 8),
(4, 'Roman Abramovich', 2147483647, 'Chelsea Football Club', '2005-02-22', 12),
(5, 'Manchester United PLC', 21344670, 'Manchester United', '1883-05-12', 134),
(7, 'Arsenal Holding PLC', 200000234, 'Arsenal Football Club', '1997-10-01', 20);

-- --------------------------------------------------------

--
-- Table structure for table `Players`
--

CREATE TABLE `Players` (
  `playerID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `teamName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Players`
--

INSERT INTO `Players` (`playerID`, `name`, `age`, `position`, `country`, `teamName`) VALUES
(7, 'Manuel Neuer', 31, 'Goalkeeper', 'Germany', 'Bayern Munich Football Club'),
(8, 'Franck Ribery', 34, 'Midfielder', 'France', 'Bayern Munich Football Club'),
(10, 'Mike Grella', 30, 'Forward', 'United States of America', 'New York Red Bulls'),
(11, 'Jack Wilshere', 25, 'Midfielder', 'England', 'Arsenal Football Club'),
(12, 'Mesut Ozil', 29, 'Midfielder', 'Germany', 'Arsenal Football Club'),
(13, 'David de Gea', 27, 'Goalkeeper', 'Spain', 'Manchester United'),
(14, 'Zlatan Ibrahimovic', 36, 'Forward', 'Sweden', 'Manchester United');

--
-- Triggers `Players`
--
DELIMITER $$
CREATE TRIGGER `retirePlayer` AFTER DELETE ON `Players` FOR EACH ROW BEGIN
 insert into RetiredPlayers (playerID,playerName,position,ageRetired,country,teamName)
 VALUES( old.playerID, old.name, old.position, old.age, old.country,old.teamName);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `playersOwnedBy`
-- (See below for the actual view)
--
CREATE TABLE `playersOwnedBy` (
`playerName` varchar(255)
,`ownedBy` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `player_managers_teams`
-- (See below for the actual view)
--
CREATE TABLE `player_managers_teams` (
`name` varchar(255)
,`manName` varchar(255)
,`teamName` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `RetiredPlayers`
--

CREATE TABLE `RetiredPlayers` (
  `playerID` int(11) NOT NULL,
  `playerName` varchar(255) NOT NULL,
  `ageRetired` int(11) NOT NULL,
  `position` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `teamName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RetiredPlayers`
--

INSERT INTO `RetiredPlayers` (`playerID`, `playerName`, `ageRetired`, `position`, `country`, `teamName`) VALUES
(2, 'Bryce Barrett', 21, 'Forward', 'USA', 'Manchester United'),
(5, 'Nick West', 45, 'Defender', 'Germany', 'Manchester United'),
(9, 'Gideon Baah', 26, 'Defender', 'Ghana', 'New York Red Bulls'),
(15, 'Bryce B', 20, 'Forward', 'USA', 'Seattle Sounders FC'),
(2001, 'Bob Donaldson', 36, 'Forward', 'England', 'Manchester United'),
(2002, 'Arthur Johnson', 34, 'Forward', 'England', 'Real Madrid Club de Futbol'),
(2003, 'Gavin Crawford', 41, 'Midfielder', 'Scotland', 'Arsenal Football Club'),
(2004, 'Bjorn Andersson', 33, 'Defender', 'Sweden', 'Bayern Munich Football Club');

-- --------------------------------------------------------

--
-- Table structure for table `Teams`
--

CREATE TABLE `Teams` (
  `name` varchar(255) NOT NULL,
  `manager` varchar(255) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `league` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Teams`
--

INSERT INTO `Teams` (`name`, `manager`, `owner`, `league`, `country`) VALUES
('Arsenal Football Club', 'Arsene Wenger', 'Arsenal Holding PLC', 'Premier League', 'England'),
('Bayern Munich Football Club', 'Jupp Heynckes', 'Uli Hoeness', 'Bundesliga', 'Germany'),
('Chelsea Football Club', 'Antonio Conte', 'Roman Abramovich', 'Premier League', 'England'),
('Manchester United', 'Jose Mourinho', 'Manchester United PLC', 'Premier League', 'England'),
('New York Red Bulls', 'Jesse Marsch', 'Red Bull GmbH', 'Major League Soccer', 'United States of America'),
('Paris Saint-Germain Football Club', 'Unai Emery', 'QSi', 'Ligue 1', 'France'),
('Real Madrid Club de Futbol', 'Zinedine Zidane', 'Florentino PÃ©rez', 'La Liga', 'Spain'),
('Seattle Sounders FC', 'Garth Lagerway', 'Joe Roth', 'Major League Soccer', 'United States of America'),
('Test Team', 'Me', 'Bryce B', 'Bundesliga', 'America');

-- --------------------------------------------------------

--
-- Table structure for table `Trades`
--

CREATE TABLE `Trades` (
  `tradeNum` int(11) NOT NULL,
  `playerName` varchar(255) NOT NULL,
  `dateTraded` date DEFAULT NULL,
  `teamFrom` varchar(255) NOT NULL,
  `teamTo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Trades`
--

INSERT INTO `Trades` (`tradeNum`, `playerName`, `dateTraded`, `teamFrom`, `teamTo`) VALUES
(1234, 'Bobby Bobby', '2017-11-30', 'Manchester United', 'Chelsea Football Club'),
(1235, 'Bobby West', '2017-12-30', 'Manchester United', 'Chelsea Football Club'),
(1236, 'David Alaba', '2017-11-24', 'Bayern Munich Football Club', 'Chelsea Football Club'),
(1237, 'Alfonso Encanta', '2017-03-23', 'Bayern Munich Football Club', 'Manchester United');

-- --------------------------------------------------------

--
-- Structure for view `isTradeValid`
--
DROP TABLE IF EXISTS `isTradeValid`;

CREATE ALGORITHM=UNDEFINED DEFINER=`bryceb68`@`localhost` SQL SECURITY DEFINER VIEW `isTradeValid`  AS  select `Trades`.`playerName` AS `playerName`,`Trades`.`dateTraded` AS `dateTraded`,`ValidTrade`(`Trades`.`dateTraded`,'2017-11-15') AS `validTrades` from `Trades` order by `Trades`.`playerName` ;

-- --------------------------------------------------------

--
-- Structure for view `numPlayersperLeague`
--
DROP TABLE IF EXISTS `numPlayersperLeague`;

CREATE ALGORITHM=UNDEFINED DEFINER=`bryceb68`@`localhost` SQL SECURITY DEFINER VIEW `numPlayersperLeague`  AS  select `l1`.`leagueName` AS `leagueName`,count(`p1`.`name`) AS `playersCount` from ((`League` `l1` join `Teams` `t1` on((`t1`.`league` = `l1`.`leagueName`))) join `Players` `p1` on((`p1`.`teamName` = `t1`.`name`))) group by `l1`.`leagueName` ;

-- --------------------------------------------------------

--
-- Structure for view `numTeamsinLeague`
--
DROP TABLE IF EXISTS `numTeamsinLeague`;

CREATE ALGORITHM=UNDEFINED DEFINER=`bryceb68`@`localhost` SQL SECURITY DEFINER VIEW `numTeamsinLeague`  AS  select `l1`.`leagueName` AS `leagueName`,count(`t1`.`name`) AS `teamsCount` from (`League` `l1` join `Teams` `t1` on((`t1`.`league` = `l1`.`leagueName`))) group by `l1`.`leagueName` ;

-- --------------------------------------------------------

--
-- Structure for view `playersOwnedBy`
--
DROP TABLE IF EXISTS `playersOwnedBy`;

CREATE ALGORITHM=UNDEFINED DEFINER=`bryceb68`@`localhost` SQL SECURITY DEFINER VIEW `playersOwnedBy`  AS  select `p1`.`name` AS `playerName`,`o1`.`ownerName` AS `ownedBy` from (`Players` `p1` join `Owners` `o1` on((`p1`.`teamName` = `o1`.`teamName`))) ;

-- --------------------------------------------------------

--
-- Structure for view `player_managers_teams`
--
DROP TABLE IF EXISTS `player_managers_teams`;

CREATE ALGORITHM=UNDEFINED DEFINER=`bryceb68`@`localhost` SQL SECURITY DEFINER VIEW `player_managers_teams`  AS  select `p`.`name` AS `name`,`m`.`name` AS `manName`,`p`.`teamName` AS `teamName` from (`Players` `p` join `Managers` `m` on((`p`.`teamName` = `m`.`teamName`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `League`
--
ALTER TABLE `League`
  ADD PRIMARY KEY (`leagueName`);

--
-- Indexes for table `Managers`
--
ALTER TABLE `Managers`
  ADD PRIMARY KEY (`manID`),
  ADD KEY `teamName` (`teamName`);

--
-- Indexes for table `Matches`
--
ALTER TABLE `Matches`
  ADD PRIMARY KEY (`matchID`),
  ADD KEY `homeTeam` (`homeTeam`),
  ADD KEY `awayTeam` (`awayTeam`);

--
-- Indexes for table `Owners`
--
ALTER TABLE `Owners`
  ADD PRIMARY KEY (`ownerID`),
  ADD KEY `teamName` (`teamName`);

--
-- Indexes for table `Players`
--
ALTER TABLE `Players`
  ADD PRIMARY KEY (`playerID`),
  ADD KEY `teamName` (`teamName`);

--
-- Indexes for table `RetiredPlayers`
--
ALTER TABLE `RetiredPlayers`
  ADD PRIMARY KEY (`playerID`),
  ADD KEY `teamName` (`teamName`);

--
-- Indexes for table `Teams`
--
ALTER TABLE `Teams`
  ADD PRIMARY KEY (`name`),
  ADD KEY `league` (`league`);

--
-- Indexes for table `Trades`
--
ALTER TABLE `Trades`
  ADD PRIMARY KEY (`tradeNum`),
  ADD KEY `teamFrom` (`teamFrom`),
  ADD KEY `teamTo` (`teamTo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Managers`
--
ALTER TABLE `Managers`
  MODIFY `manID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Matches`
--
ALTER TABLE `Matches`
  MODIFY `matchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `Owners`
--
ALTER TABLE `Owners`
  MODIFY `ownerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Players`
--
ALTER TABLE `Players`
  MODIFY `playerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `RetiredPlayers`
--
ALTER TABLE `RetiredPlayers`
  MODIFY `playerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2005;
--
-- AUTO_INCREMENT for table `Trades`
--
ALTER TABLE `Trades`
  MODIFY `tradeNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1238;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Managers`
--
ALTER TABLE `Managers`
  ADD CONSTRAINT `Managers_ibfk_1` FOREIGN KEY (`teamName`) REFERENCES `Teams` (`name`);

--
-- Constraints for table `Matches`
--
ALTER TABLE `Matches`
  ADD CONSTRAINT `Matches_ibfk_1` FOREIGN KEY (`homeTeam`) REFERENCES `Teams` (`name`),
  ADD CONSTRAINT `Matches_ibfk_2` FOREIGN KEY (`awayTeam`) REFERENCES `Teams` (`name`);

--
-- Constraints for table `Owners`
--
ALTER TABLE `Owners`
  ADD CONSTRAINT `Owners_ibfk_1` FOREIGN KEY (`teamName`) REFERENCES `Teams` (`name`);

--
-- Constraints for table `Players`
--
ALTER TABLE `Players`
  ADD CONSTRAINT `Players_ibfk_1` FOREIGN KEY (`teamName`) REFERENCES `Teams` (`name`);

--
-- Constraints for table `RetiredPlayers`
--
ALTER TABLE `RetiredPlayers`
  ADD CONSTRAINT `RetiredPlayers_ibfk_1` FOREIGN KEY (`teamName`) REFERENCES `Teams` (`name`);

--
-- Constraints for table `Teams`
--
ALTER TABLE `Teams`
  ADD CONSTRAINT `Teams_ibfk_1` FOREIGN KEY (`league`) REFERENCES `League` (`leagueName`);

--
-- Constraints for table `Trades`
--
ALTER TABLE `Trades`
  ADD CONSTRAINT `Trades_ibfk_1` FOREIGN KEY (`teamFrom`) REFERENCES `Teams` (`name`),
  ADD CONSTRAINT `Trades_ibfk_2` FOREIGN KEY (`teamTo`) REFERENCES `Teams` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

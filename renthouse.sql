-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2018-11-05 12:51:09
-- 服务器版本： 5.7.23
-- PHP 版本： 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `renthouse`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Account` varchar(15) NOT NULL,
  `Password` varchar(15) NOT NULL,
  PRIMARY KEY (`Account`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`Account`, `Password`) VALUES
('123', '123');

-- --------------------------------------------------------

--
-- 表的结构 `check`
--

DROP TABLE IF EXISTS `check`;
CREATE TABLE IF NOT EXISTS `check` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Fare` float NOT NULL,
  `Date` date NOT NULL,
  `HouseID` int(11) NOT NULL,
  `TenantTel` varchar(15) NOT NULL,
  `verify` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `check_house` (`HouseID`),
  KEY `check_tenant` (`TenantTel`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `check`
--

INSERT INTO `check` (`ID`, `Fare`, `Date`, `HouseID`, `TenantTel`, `verify`) VALUES
(15, 17, '2018-01-01', 2, '15900309937', 1),
(16, 17, '2019-01-02', 2, '15900309937', 0),
(17, 600, '2018-10-26', 9, '1008688', 1),
(18, 16, '2017-10-27', 1, '15900309937', 1),
(14, 16, '2018-01-01', 1, '15900309937', 0);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `checkview`
-- （参见下面的实际视图）
--
DROP VIEW IF EXISTS `checkview`;
CREATE TABLE IF NOT EXISTS `checkview` (
`verify` int(11)
,`ID` int(11)
,`Address` varchar(100)
,`Price` decimal(10,2)
,`ownerTel` varchar(15)
,`Tel` varchar(15)
,`hostName` varchar(15)
,`tenantName` varchar(30)
,`Fare` float
,`Date` date
);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `confirmcontract`
-- （参见下面的实际视图）
--
DROP VIEW IF EXISTS `confirmcontract`;
CREATE TABLE IF NOT EXISTS `confirmcontract` (
`StartTime` date
,`EndTime` date
,`TenantTel` varchar(15)
,`varify` int(11)
,`Name` varchar(30)
,`Address` varchar(100)
,`Price` decimal(10,2)
,`Age` int(11)
,`status` int(11)
,`ID` int(11)
,`ownerTel` varchar(15)
);

-- --------------------------------------------------------

--
-- 表的结构 `contract`
--

DROP TABLE IF EXISTS `contract`;
CREATE TABLE IF NOT EXISTS `contract` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `StartTime` date NOT NULL,
  `EndTime` date NOT NULL,
  `Fare` float NOT NULL,
  `houseID` int(11) NOT NULL,
  `TenantTel` varchar(15) NOT NULL,
  `varify` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `contract_house` (`houseID`),
  KEY `contract_tenant` (`TenantTel`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `contract`
--

INSERT INTO `contract` (`ID`, `StartTime`, `EndTime`, `Fare`, `houseID`, `TenantTel`, `varify`) VALUES
(17, '2019-02-01', '2020-02-01', 40, 1, '15900309937', 0),
(15, '2019-01-01', '2020-02-01', 42.5, 2, '15900309937', 1),
(16, '2019-02-02', '2020-01-01', 40, 1, '15900309938', 0);

-- --------------------------------------------------------

--
-- 表的结构 `host`
--

DROP TABLE IF EXISTS `host`;
CREATE TABLE IF NOT EXISTS `host` (
  `Tel` varchar(15) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`Tel`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `host`
--

INSERT INTO `host` (`Tel`, `Name`, `Address`, `password`) VALUES
('15900309938', '李博', '天津理工大学29-611', '1234'),
('17703137727', '李博', '宾水西道391号天津理工大学主校区29-619', '123'),
('17703137728', '张凌峰', '宾水西道391号天津理工大学主校区29-623', '123'),
('17703137729', '张凌峰', '宾水西道391号天津理工大学主校区29-625', '123'),
('17703137730', '李博', '宾水西道391号天津理工大学主校区', '123'),
('17703137725', '李博', '宾水西道391号天津理工大学主校区29-619', '123'),
('17703137724', '李博', '宾水西道391号天津理工大学主校区29-619', '123'),
('17703137722', '李博', '宾水西道391号天津理工大学主校区', 'admin');

-- --------------------------------------------------------

--
-- 替换视图以便查看 `hoststenant`
-- （参见下面的实际视图）
--
DROP VIEW IF EXISTS `hoststenant`;
CREATE TABLE IF NOT EXISTS `hoststenant` (
`ID` int(11)
,`Address` varchar(100)
,`Name` varchar(30)
,`Tel` varchar(15)
,`Age` int(11)
,`Gender` varchar(6)
,`EndTime` date
,`StartTime` date
,`ownerTel` varchar(15)
);

-- --------------------------------------------------------

--
-- 表的结构 `house`
--

DROP TABLE IF EXISTS `house`;
CREATE TABLE IF NOT EXISTS `house` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Pattern` varchar(20) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Size` int(11) NOT NULL,
  `Features` varchar(50) DEFAULT NULL,
  `ownerTel` varchar(15) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `host_house` (`ownerTel`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `house`
--

INSERT INTO `house` (`ID`, `Pattern`, `Address`, `Price`, `Size`, `Features`, `ownerTel`, `status`) VALUES
(1, '单元楼', '天津理工大学29号楼623', '800.00', 20, '有阳台，公厕', '15900309938', 0),
(2, '单元楼', '天津理工大学29号楼611', '850.00', 20, '有阳台，阳光充足', '15900309938', 1),
(10, '商品楼', '天津市和平区城基大厦2222', '35000.00', 70, '市中心，地铁口', '15900309938', 0),
(9, '商品楼', '天津市和平区城基大厦1201', '30000.00', 50, '市中心，地铁口', '15900309938', 0);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `houserented`
-- （参见下面的实际视图）
--
DROP VIEW IF EXISTS `houserented`;
CREATE TABLE IF NOT EXISTS `houserented` (
`Address` varchar(100)
,`StartTime` date
,`EndTime` date
,`Fare` float
,`Price` decimal(10,2)
,`ownerTel` varchar(15)
,`TenantTel` varchar(15)
);

-- --------------------------------------------------------

--
-- 表的结构 `tenant`
--

DROP TABLE IF EXISTS `tenant`;
CREATE TABLE IF NOT EXISTS `tenant` (
  `Tel` varchar(15) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `ID` varchar(20) NOT NULL,
  `Age` int(11) DEFAULT NULL,
  `Password` varchar(15) NOT NULL,
  `Gender` varchar(6) NOT NULL DEFAULT '',
  PRIMARY KEY (`Tel`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tenant`
--

INSERT INTO `tenant` (`Tel`, `Name`, `ID`, `Age`, `Password`, `Gender`) VALUES
('15900309937', '凌峰', '130731199709171234', 21, '123', 'male'),
('15922344452', '李博', '130731199705237726', 21, '123', 'male'),
('17703137722', '李博', '130731199790122211', 22, '123', 'male'),
('1008688', 'Bear Grylls', '130731199790122211', 28, '123', 'male');

-- --------------------------------------------------------

--
-- 替换视图以便查看 `tenantrented`
-- （参见下面的实际视图）
--
DROP VIEW IF EXISTS `tenantrented`;
CREATE TABLE IF NOT EXISTS `tenantrented` (
`Tel` varchar(15)
,`Name` varchar(30)
,`Age` int(11)
,`Gender` varchar(6)
);

-- --------------------------------------------------------

--
-- 视图结构 `checkview`
--
DROP TABLE IF EXISTS `checkview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `checkview`  AS  select `check`.`verify` AS `verify`,`check`.`ID` AS `ID`,`house`.`Address` AS `Address`,`house`.`Price` AS `Price`,`house`.`ownerTel` AS `ownerTel`,`tenant`.`Tel` AS `Tel`,`host`.`Name` AS `hostName`,`tenant`.`Name` AS `tenantName`,`check`.`Fare` AS `Fare`,`check`.`Date` AS `Date` from (((`check` join `house`) join `tenant`) join `host`) where ((`house`.`ID` = `check`.`HouseID`) and (`tenant`.`Tel` = `check`.`TenantTel`) and (`host`.`Tel` = `house`.`ownerTel`)) ;

-- --------------------------------------------------------

--
-- 视图结构 `confirmcontract`
--
DROP TABLE IF EXISTS `confirmcontract`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `confirmcontract`  AS  select `contract`.`StartTime` AS `StartTime`,`contract`.`EndTime` AS `EndTime`,`contract`.`TenantTel` AS `TenantTel`,`contract`.`varify` AS `varify`,`tenant`.`Name` AS `Name`,`house`.`Address` AS `Address`,`house`.`Price` AS `Price`,`tenant`.`Age` AS `Age`,`house`.`status` AS `status`,`contract`.`ID` AS `ID`,`house`.`ownerTel` AS `ownerTel` from ((`contract` join `tenant`) join `house`) where ((`tenant`.`Tel` = `contract`.`TenantTel`) and (`contract`.`houseID` = `house`.`ID`)) ;

-- --------------------------------------------------------

--
-- 视图结构 `hoststenant`
--
DROP TABLE IF EXISTS `hoststenant`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hoststenant`  AS  select `house`.`ID` AS `ID`,`house`.`Address` AS `Address`,`tenant`.`Name` AS `Name`,`tenant`.`Tel` AS `Tel`,`tenant`.`Age` AS `Age`,`tenant`.`Gender` AS `Gender`,`contract`.`EndTime` AS `EndTime`,`contract`.`StartTime` AS `StartTime`,`house`.`ownerTel` AS `ownerTel` from ((`tenant` join `house`) join `contract`) where ((`house`.`status` = 1) and (`house`.`ID` = `contract`.`houseID`) and (`contract`.`TenantTel` = `tenant`.`Tel`) and (`contract`.`varify` = 1)) ;

-- --------------------------------------------------------

--
-- 视图结构 `houserented`
--
DROP TABLE IF EXISTS `houserented`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `houserented`  AS  select `house`.`Address` AS `Address`,`contract`.`StartTime` AS `StartTime`,`contract`.`EndTime` AS `EndTime`,`contract`.`Fare` AS `Fare`,`house`.`Price` AS `Price`,`house`.`ownerTel` AS `ownerTel`,`contract`.`TenantTel` AS `TenantTel` from (`house` join `contract`) where ((`house`.`ID` = `contract`.`houseID`) and (`contract`.`varify` = 1)) ;

-- --------------------------------------------------------

--
-- 视图结构 `tenantrented`
--
DROP TABLE IF EXISTS `tenantrented`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tenantrented`  AS  select `tenant`.`Tel` AS `Tel`,`tenant`.`Name` AS `Name`,`tenant`.`Age` AS `Age`,`tenant`.`Gender` AS `Gender` from (`contract` join `tenant`) where ((`tenant`.`Tel` = `contract`.`TenantTel`) and (`contract`.`varify` = 1)) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

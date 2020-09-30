
-- --------------------------------------------------------

--
-- Table structure for table `villes_belgique`
--

CREATE TABLE `villes_belgique` (
  `geonameid` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET latin1 NOT NULL,
  `asciiname` varchar(200) CHARACTER SET latin1 NOT NULL,
  `alternatenames` varchar(10000) CHARACTER SET latin1 NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `country code` char(2) CHARACTER SET latin1 NOT NULL,
  `cc2` varchar(200) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

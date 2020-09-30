
-- --------------------------------------------------------

--
-- Table structure for table `blogroll`
--

CREATE TABLE `blogroll` (
  `ref` int(11) NOT NULL,
  `url` varchar(50) DEFAULT NULL,
  `description` varchar(200) NOT NULL,
  `nom` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogroll`
--

INSERT INTO `blogroll` (`ref`, `url`, `description`, `nom`) VALUES
(1, 'http://www.genealexis.fr', 'Mon site perso de généalogie', 'Genealexis'),
(2, 'http://historesdepoilus.genealexis.fr', 'Histoires de poilus', 'Histoires de Poilus');


-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE `configuration` (
  `nom` varchar(250) NOT NULL,
  `valeur` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`nom`, `valeur`) VALUES
('export', '1'),
('nrpp', '15'),
('top', '10'),
('napp', '5');

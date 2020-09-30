
-- --------------------------------------------------------

--
-- Table structure for table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pass_md5` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `site` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membres`
--

INSERT INTO `membres` (`id`, `login`, `pass_md5`, `mail`, `adresse`, `site`) VALUES
(1, 'Alexis', '', '', '', ''),
(2, 'Machin', '', '', '', ''),
(3, 'pp', 'pp', '', '', ''),
(4, 'ppp', 'ppp', '', '', ''),
(5, 'Zorro', '$2y$10$JPAM3F97Tab1Ij.KCi9kZ.KSLkfjW9D76d..i6/5RDO', '', '', ''),
(6, 'test', '$2y$10$bwRmezn76nOFS80UlD0d3eX8T/eugR04.YOkxkT3OdR', '', '', ''),
(7, 'admin', '$2y$10$e/WZX2XLK/aqXH2Bu53JiuJdoStRSmIlIGHwGfJaLI1', '', '', '');

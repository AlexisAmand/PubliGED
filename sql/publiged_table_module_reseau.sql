
-- --------------------------------------------------------

--
-- Table structure for table `module_reseau`
--

CREATE TABLE `module_reseau` (
  `ref` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `url` varchar(50) NOT NULL,
  `actif` tinyint(1) NOT NULL,
  `icone` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module_reseau`
--

INSERT INTO `module_reseau` (`ref`, `nom`, `url`, `actif`, `icone`) VALUES
(1, 'Facebook', '', 1, 'la la-facebook-square'),
(2, 'Twitter', '', 1, 'fab fa-twitter-square'),
(3, 'Vimeo', '', 1, 'fab fa-vimeo-square'),
(4, 'LinkedIn', '', 1, 'fab fa-linkedin'),
(5, 'Flux RSS', '', 1, 'fas fa-rss-square'),
(6, 'Pinterest', '', 1, 'fab fa-pinterest-square'),
(7, 'Instagram', '', 1, 'fab fa-instagram'),
(8, 'Youtube', '', 1, 'fab fa-youtube-square');

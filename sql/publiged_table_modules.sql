
-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `ref` int(11) NOT NULL,
  `nomdumodule` varchar(250) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `position` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`ref`, `nomdumodule`, `visible`, `position`, `description`, `type`) VALUES
(1, 'g-aside-1', 1, 5, 'menu de navigation sur le site', 'genealogie'),
(2, 'g-aside-2', 1, 4, 'menu des statistiques', 'genealogie'),
(3, 'g-aside-3', 1, 3, 'menu des lieux', 'genealogie'),
(4, 'g-aside-4', 1, 2, 'menu des individus', 'genealogie'),
(5, 'g-aside-5', 1, 1, 'menu des événements', 'genealogie'),
(6, 'b-aside-1', 1, 1, 'Le blog', 'blog'),
(7, 'b-aside-2', 1, 2, 'Rubriques', 'blog'),
(8, 'b-aside-3', 1, 3, 'Derniers articles', 'blog'),
(9, 'b-aside-4', 1, 4, 'Réseaux sociaux', 'blog'),
(10, 'b-aside-5', 1, 5, 'Crédits', 'blog');

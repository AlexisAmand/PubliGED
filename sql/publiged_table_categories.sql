
-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ref` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ref`, `nom`, `description`) VALUES
(1, 'categorie_A', ''),
(2, 'categorie_B', ''),
(3, 'Nouvelle catégorie n°1', ''),
(4, 'Nouvelle catégorie n°2', ''),
(5, 'La 3 devient la 4', '');


-- --------------------------------------------------------

--
-- Table structure for table `lieux`
--

CREATE TABLE `lieux` (
  `ref` int(11) NOT NULL,
  `ville` varchar(250) NOT NULL,
  `cp` varchar(10) NOT NULL,
  `dep` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `pays` varchar(50) NOT NULL,
  `continent` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lieux`
--

INSERT INTO `lieux` (`ref`, `ville`, `cp`, `dep`, `region`, `pays`, `continent`) VALUES
(1, 'Neuville-sur-Escaut', '59293', 'Nord', 'Nord-Pas-de-Calais', 'FRANCE', '\r\n'),
(2, 'Lourches', '59156', 'Nord', 'Nord-Pas-de-Calais', 'FRANCE', '\r\n'),
(3, 'Roeulx', '59172', 'Nord', 'Nord-Pas-de-Calais', 'FRANCE', '\r\n'),
(4, 'Banteux', '59266', 'Nord', 'Nord-Pas-de-Calais', 'FRANCE', '\r\n'),
(5, 'Bouchain', '59111', 'Nord', 'Nord-Pas-de-Calais', 'FRANCE', '\r\n'),
(6, 'Chauny', '02300', 'Aisne', 'Picardie', 'FRANCE', '\r\n'),
(7, 'Clairoix', '60200', 'Oise', 'Picardie', 'FRANCE', '\r\n'),
(8, 'Flines-lès-Mortagne', '59158', 'Nord', 'Nord-Pas-de-Calais', 'FRANCE', '\r\n'),
(9, 'Fargniers', '02700', 'Aisne', 'Nord-Pas-de-Calais', 'FRANCE', '\r\n'),
(10, 'Thun-L\'Évêque', '59141', 'Nord', 'Nord-Pas-de-Calais', 'FRANCE', '\r\n'),
(11, 'Valenciennes', '59300', 'Nord', 'Nord-Pas-de-Calais', 'FRANCE', '\r\n'),
(12, 'Condé-sur-L\'Escaut', '59163', 'Nord', 'Nord-Pas-de-Calais', 'FRANCE', '\r\n'),
(13, 'Jemappes', '7012', 'Hainaut', 'Wallonie', 'BELGIQUE', '\r\n'),
(14, 'Vieux-Condé', '59690', 'Nord', 'Nord-Pas-de-Calais', 'FRANCE', '\r\n'),
(15, 'Tournai', '7500', 'Hainaut', 'Wallonie', 'BELGIQUE', '\r\n'),
(16, 'Quaregnon', '7390', 'Hainaut', 'Wallonie', 'BELGIQUE', '\r\n'),
(17, 'Fresnes-sur-Escaut', '59970', 'Nord', 'Nord-Pas-de-Calais', 'FRANCE', '\r\n'),
(18, 'Aubervilliers', '93300', 'Seine-Saint-Denis', 'Île-de-France', 'FRANCE', '\r\n'),
(19, 'Beaucaire', '30300', 'Gard', 'Languedoc-Roussillon', 'FRANCE', '\r\n'),
(20, 'Saint-Amand-les-Eaux', '59230', 'Nord', 'Nord-Pas-de-Calais', 'FRANCE', '\r\n'),
(21, 'Lille', '59000', 'Nord', 'Nord-Pas-de-Calais', 'FRANCE', '\r\n'),
(22, 'Proville', '59267', 'Nord', 'Nord-Pas-de-Calais', 'FRANCE', '\r\n'),
(23, 'Abscon', '59215', 'Nord', 'Nord-Pas-de-Calais', 'FRANCE', '\r\n'),
(24, 'Saint-Ghislain', '7330', 'Hainaut', 'Wallonie', 'BELGIQUE', '\r\n'),
(25, 'Venette', '60200', 'Oise', 'Picardie', 'FRANCE', '\r\n');

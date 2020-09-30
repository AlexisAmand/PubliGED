
-- --------------------------------------------------------

--
-- Table structure for table `sources`
--

CREATE TABLE `sources` (
  `id` int(11) NOT NULL,
  `ref` varchar(11) DEFAULT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `nom` varchar(250) DEFAULT NULL,
  `source` varchar(250) DEFAULT NULL,
  `media` varchar(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sources`
--

INSERT INTO `sources` (`id`, `ref`, `titre`, `nom`, `source`, `media`) VALUES
(1, '30S', 'Acte de naissance  (1895)\r\n', 'AMAND Hoche Gaston Blomy\r\n', 'Archives du Nord\r\n', '2'),
(2, '50S', 'Acte de décès (1906)\r\n', 'AMAND Blomy Abélard\r\n', 'Archives du Nord\r\n', '3'),
(3, '54S', 'Acte de mariage (1919)\r\n', 'AMAND x THIERY\r\n', 'Archives du Nord\r\n', '6'),
(4, '65S', 'Acte de naissance (1865)\r\n', 'AMAND Blomy\r\n', 'Archives du Nord\r\n', '8'),
(5, '83S', 'Acte de décès (1888)\r\n', 'AMAND Blomy Adolphe\r\n', 'Archives du Nord\r\n', '10'),
(6, '96S', 'Acte de décès (1832)\r\n', 'AMAND Florentin\r\n', 'Archives de l\'Aisne\r\n', '12'),
(7, '104S', 'Acte de décès (1819)\r\n', 'AMAND François\r\n', 'Archives du Nord\r\n', '13'),
(8, '145S', 'Relevés des BMS et NMD\r\n', NULL, 'A.G.F.H\r\n', NULL),
(9, '147S', 'Relevés des BMS et NMD de Quaregnon\r\n', NULL, 'ddupprez\r\n', NULL),
(10, '200S', 'Acte de mariage (1722)\r\n', 'AMAND x CHOQUET\r\n', 'Archives du Nord\r\n', '15'),
(11, '242S', 'Acte de naissance (1897)\r\n', 'AMAND Fernande\r\n', 'Archives du Nord\r\n', '16'),
(12, '273S', 'Acte de mariage (1905)\r\n', 'AMAND x TATINCLAUX\r\n', 'Archives du Nord\r\n', '19'),
(13, '281S', 'Acte de baptême (1738)\r\n', 'AMAND Catherine\r\n', 'Archives du Nord\r\n', '20'),
(14, '286S', 'Acte de naissance (1832)\r\n', 'AMAND Blomé\r\n', 'Archives de l\'Aisne\r\n', '22'),
(15, '306S', 'Acte de décès (1801)\r\n', 'AMAND Georges\r\n', 'Archives de l\'État en Belgique\r\n', '23'),
(16, '315S', 'Acte de baptême (1749)\r\n', 'AMAND François Joseph\r\n', 'Archives du Nord\r\n', '24'),
(17, '337S', 'Acte de naissance (1898)\r\n', 'THIERY Germaine\r\n', 'Archives du Nord\r\n', '25'),
(18, '349S', 'Recensement de la commune de Roeulx (1906)\r\n', 'Famille THIERY\r\n', 'Genealo\r\n', NULL),
(19, '386S', 'Acte de baptême (1697)\r\n', 'AMAND Nicolas François\r\n', 'Archives du Nord\r\n', '26'),
(20, '397S', 'Avis de décès (2017)\r\n', 'AMAND Albert\r\n', 'Voix du Nord\r\n', '27'),
(21, '410S', 'Acte de mariage (1823)\r\n', 'AMAND x CALOTTE\r\n', 'FamilySearch\r\n', '28'),
(22, '419S', 'Acte de naissance (1899)\r\n', 'AMAND Marceau\r\n', 'Archives de Seine-Saint-Denis\r\n', '29'),
(23, '429S', 'Répertoire des bateliers de nord de la France et de la Belgique (Tome 5)\r\n', 'AMAND Alexandre Joseph Fidel - naissance (1767)\r\n', 'FamilySearch\r\n', '30'),
(24, '441S', 'Répertoire des bateliers de nord de la France et de la Belgique (Tome 5)\r\n', 'AMAND x DAPSENCE - mariage (1776)\r\n', 'FamilySearch\r\n', '31'),
(25, '447S', 'Répertoire des bateliers de nord de la France et de la Belgique (Tome 5)\r\n', 'AMAND Anne Catherine - Baptême (1777)\r\n', 'FamilySearch\r\n', '32'),
(26, '458S', 'Répertoire des bateliers de nord de la France et de la Belgique (Tome 5)\r\n', 'DARTOIS x AMAND - mariage (1806)\r\n', 'FamilySearch\r\n', '33'),
(27, '477S', 'Répertoire des bateliers de nord de la France et de la Belgique (Tome 5)\r\n', 'DARTOIS Lucie - décès (1825)\r\n', 'FamilySearch\r\n', '34');


-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `ref` varchar(11) NOT NULL,
  `fichier` varchar(250) NOT NULL,
  `type` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`ref`, `fichier`, `type`) VALUES
('1', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\portraits\\alain-amand.jpg', 'jpg\r\n'),
('2', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Amand\\AMAND Hoche Gaston Blomy - naissance - 1895.jpg', 'jpg\r\n'),
('3', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Amand\\AMAND Blomy Abélard - décès - 1906.jpg', 'jpg\r\n'),
('4', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Amand\\AMAND x THIERY - mariage - 1919 (1).jpg', 'jpg\r\n'),
('5', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Amand\\AMAND x THIERY - mariage - 1919 (2).jpg', 'jpg\r\n'),
('6', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Amand\\AMAND x THIERY - mariage - 1919 (3).jpg', 'jpg\r\n'),
('7', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Amand\\AMAND Blomy - naissance - 1865 - (1).jpg', 'jpg\r\n'),
('8', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Amand\\AMAND Blomy - naissance - 1865 - (2).jpg', 'jpg\r\n'),
('9', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Amand\\AMAND Blomy - décès - 1888 (1).jpg', 'jpg\r\n'),
('10', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Amand\\AMAND Blomy - décès - 1888 (2).jpg', 'jpg\r\n'),
('11', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Amand\\AMAND Florentin - décès - 1832 (1).jpg', 'jpg\r\n'),
('12', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Amand\\AMAND Florentin - décès - 1832 (2).jpg', 'jpg\r\n'),
('13', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Amand\\AMAND François - décès -1819.jpg', 'jpg\r\n'),
('14', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Amand\\AMAND x CHOQUET - mariage - 1722 - (1).jpg', 'jpg\r\n'),
('15', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Amand\\AMAND x CHOQUET - mariage - 1722 - (2).jpg', 'jpg\r\n'),
('16', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Amand\\AMAND Fernande - naissance - 1897.jpg', 'jpg\r\n'),
('17', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Amand\\AMAND x TATINCLAUX - mariage -1905 (1).jpg', 'jpg\r\n'),
('18', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Amand\\AMAND x TATINCLAUX - mariage -1905 (2).jpg', 'jpg\r\n'),
('19', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Amand\\AMAND x TATINCLAUX - mariage -1905 (3).jpg', 'jpg\r\n'),
('20', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Amand\\AMAND Catherine - baptême - 1738.jpg', 'jpg\r\n'),
('21', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Amand\\AMAND Blomy - naissance - 1832 (1).jpg', 'jpg\r\n'),
('22', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Amand\\AMAND Blomy - naissance - 1832 (2).jpg', 'jpg\r\n'),
('23', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Amand\\AMAND Georges - décès - 1801.jpg', 'jpg\r\n'),
('24', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Amand\\AMAND François Joseph - baptême - 1749.jpg', 'jpg\r\n'),
('25', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Thiery\\THIERY Germaine - naissance - 1898.jpg', 'jpg\r\n'),
('26', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Amand\\AMAND Nicolas François -  Baptême - 1697.jpg', 'jpg\r\n'),
('27', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Amand\\AMAND Albert - décès - 2017.jpg', 'jpg\r\n'),
('28', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Amand\\AMAND x CALOTTE - 1823 - mariage.jpg', 'jpg\r\n'),
('29', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Actes\\Amand\\AMAND Marceau - naissance - 1899.jpg', 'jpg\r\n'),
('30', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Répertoire des Bateliers\\Amand\\AMAND Alexandre Joseph Fidel - baptême - 1767.jpg', 'jpg\r\n'),
('31', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Répertoire des Bateliers\\Amand\\AMAND x DAPSENCE - mariage - 1776.jpg', 'jpg\r\n'),
('32', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Répertoire des Bateliers\\Amand\\AMAND Anne Catherine - baptême - 1777.jpg', 'jpg\r\n'),
('33', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Répertoire des Bateliers\\Dartois\\DARTOIS x AMAND - mariage - 1806.jpg', 'jpg\r\n'),
('34', 'C:\\Users\\Alex\\Google Drive\\Généalogie\\Généalogies\\Alain AMAND\\sources\\Répertoire des Bateliers\\Dartois\\DARTOIS Lucie - décès - 1825.jpg', 'jpg\r\n');

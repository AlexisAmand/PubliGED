
-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `commentaires` (
  `ref` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `nom_auteur` varchar(250) CHARACTER SET latin1 NOT NULL,
  `email_auteur` varchar(250) CHARACTER SET latin1 NOT NULL,
  `url_auteur` varchar(250) CHARACTER SET latin1 NOT NULL,
  `contenu` varchar(250) CHARACTER SET latin1 NOT NULL,
  `date_com` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`ref`, `id_article`, `nom_auteur`, `email_auteur`, `url_auteur`, `contenu`, `date_com`) VALUES
(1, 12, 'Alex', 'alexis.amand@yahoo.fr', '', '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2020-09-15 13:15:21'),
(2, 10, 'Max', 'alexis.amand@yahoo.fr', '', '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti qu', '2020-09-15 15:02:24'),
(3, 9, 'Maurice', 'alexis.amand@yahoo.fr', '', '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti qu', '2020-09-15 15:03:04');

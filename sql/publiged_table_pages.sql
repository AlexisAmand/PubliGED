
-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `titre` varchar(250) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `description` varchar(250) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `module` varchar(30) NOT NULL,
  `section` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `nom`, `titre`, `description`, `module`, `section`) VALUES
(1, 'blog', 'test d\'affichage de la page blog', 'description de la page blog', '', 'blog'),
(3, 'anniversaires', 'Anniversaires du jour', '', 'g-aside-2', 'genealogie'),
(4, 'cartographie', 'Répartition géographique', '', 'g-aside-3', 'genealogie'),
(5, 'categories', '', '', '', 'blog'),
(6, 'contact', 'Contact', 'Contacter le webmaster', '', ''),
(7, 'eclair', 'Liste éclair', '', '', 'genealogie'),
(8, 'eve', 'Liste des événements', 'description de la liste des événements', 'g-aside-5', 'genealogie'),
(9, 'fiches-individuelles', '', '', '', 'genealogie'),
(10, 'images', 'Les images', '', 'g-aside-2', 'genealogie'),
(11, 'lieux', 'Liste des lieux', '', 'g-aside-3', 'genealogie'),
(12, 'lieuxpatro', '', '', '', 'genealogie'),
(13, 'liste_individu', '', '', '', 'genealogie'),
(14, 'liste_patro_lieu', '', '', '', ''),
(15, 'liste_patro', '', '', '', 'genealogie'),
(16, 'patro', 'Liste des patronymes', '', '', 'genealogie'),
(17, 'patrolieux', 'Liste des patronymes par lieux', '', 'g-aside-3', 'genealogie'),
(18, 'search', '', '', '', ''),
(19, 'see_comments', '', '', '', ''),
(20, 'sosa', '', '', '', 'genealogie'),
(21, 'sources', 'Les sources', 'Liste des sources', 'g-aside-2', 'genealogie'),
(22, 'stats', 'Statistiques', '', 'g-aside-2', 'genealogie'),
(23, 'article', '', '', '', 'blog'),
(24, 'fiche', '', '', '', 'genealogie'),
(25, 'error', 'Error 404', 'Erreur de navigation. La page n\'existe plus.', '', ''),
(26, 'credits', '', '', '', ''),
(27, 'todo', '', '', '', ''),
(28, 'pdf', '', '', '', ''),
(29, 'ajout-article', '', '', '', '');

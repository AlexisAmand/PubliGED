<?php

/* ------------------- */
/* Textes pour l'admin */
/*    (version  FR)    */
/* ------------------- */

define("DASHBOARD","Tableau de bord");
define("ADM_ONLINE_TOOLS","Ce formulaire utilise des ressources en ligne");

define("SEE_SITE","Voir le site");

/* ------------------ */
/* Accueil de l'admin */
/* ------------------ */

define("NB_ARTICLES","Nombre d'articles");
define("NB_CATEGORIES","Nombre de catégories");
define("NB_USERS","Nombre d'utilisateurs");
define("NB_COMMENTAIRES","Nombre de commentaires");

define( "LAST_ALL_ARTICLES","Mes derniers articles");
define( "ALL_ARTICLE","Voir tous les articles");

define( "LAST_ALL_COM","Mes derniers commentaires");
define( "ALL_COM","Voir tous les commentaires");

define("MY_GEDCOM","Ma généalogie");
define("MY_GEDCOM_INDIVIDUALS"," individus dans la base de données");
define("MY_GEDCOM_PLACE"," lieux dans la base de données");
define("MY_GEDCOM_FAMILIES"," familles dans la base de données");
define("MY_GEDCOM_SRC"," sources dans la base de données");
define("MY_GEDCOM_EVE"," événements dans la base de données");

/* ----------------------------------- */
/* Titres des pages + ELEMENTS DU MENU */
/* ----------------------------------- */

define("BCK_TITLE","PubliGED Administration");

define("BCK_RUB_TITLE_1","Blog");
    define("ASIDE_ADMIN_1","Articles");
        define("ADM_RUB_ADD_A","Ajouter un article");
        define("ADM_RUB_MODIF_A","Modifier les articles");
        define("ADM_RUB_ADD_C","Ajouter une catégorie");
        define("ADM_RUB_MODIF_C","Modifier une catégorie");
    define("ASIDE_ADMIN_2","Commentaires");
        define("ADM_RUB_COMM","Modérer");
    define("ASIDE_ADMIN_3","Modules");

define("BCK_RUB_TITLE_2","Généalogie");
    define("ASIDE_ADMIN_5","Gedcom");
        define("ADM_RUB_SEND_G","Envoyer un gedcom");
        define("ADM_RUB_DEL_G","Effacer un gedcom");
    define("ASIDE_ADMIN_6","Modules");

define("BCK_RUB_TITLE_3","Paramètres");
    define("ASIDE_ADMIN_7","Base de données");
        define("ADM_DB_SUPPR","Supprimer les tables");
        define("ADM_DB_CREATE","Réinitialiser les tables");
        define( "ADM_DB_SIZE","Taille de la base de données");
    define("ASIDE_ADMIN_8","Options");
        define("ADM_RUB_PARAM","Paramètres");
        define("ADM_RUB_PERSO","Personnalisation");
    define("ASIDE_ADMIN_9","Utilisateurs");
        define("ADM_RUB_USERS","Liste des utilisateurs");
        define("ADM_RUB_ADD_USER","Ajout d'un utilisateur");

define("BCK_RUB_TITLE_4", "Référencement");
    define("ASIDE_ADMIN_10","Métas et SEO");
    define("ASIDE_ADMIN_11","Statistiques");

/* -------------------- */
/* Gestion des articles */
/* -------------------- */

define("ADM_ARTICLE_LIST","Liste des articles");

define( "ADM_ARTICLE_TITLE","Titre");
define( "ADM_ARTICLE_AUTHOR","Auteur");
define( "ADM_ARTICLE_CAT","Catégorie");

define( "ADM_ART_EDIT","Editer");
define( "ADM_ART_SUPPR","Supprimer");
define( "ADM_ART_PUBLISH","Publier");

define( "ADM_ARTICLE_EDIT_TITLE","Titre de l'article");
define( "ADM_ARTICLE_EDIT_CAT","Catégorie de l'article");
define( "ADM_ARTICLE_CAT_LIST","Choisir une catégorie");
define( "ADM_ARTICLE_EDIT_CONTENT","Contenu de l'article");

define("ADM_ARTICLE_SEND","L'article a bien été enregistré !");
define("ADM_ARTICLE_NOSEND","L'article n'a pas pu être envoyé !");

define("ADM_ARTICLE_NOTITLE","Vous n'avez pas indiqué de titre pour votre article");
define("ADM_ARTICLE_NOCONTENT","Vous n'avez pas indiqué de contenu pour votre article");
define("ADM_ARTICLE_NOCAT","Vous n'avez pas indiqué de catégorie pour votre article");

define("ADM_ARTICLE_MODIF_INTRO","Cette page vous permet de modifier ou supprimer un article. Pour créer un nouvel article, rendez-vous plutôt sur <a href='ajout-article.php'>cette page</a>.");
define("ADM_ARTICLE_ADD_INTRO","Cette page vous permet de créer un article. Pour modifier ou supprimer un article, rendez-vous plutôt sur <a href='modif-article.php'>cette page</a>.");

define("ADM_ARTICLE_SAVE","Enregistrer");
define("ADM_ARTICLE_PUBLISH","Publier");

/* Suppression d'un article */

define("SUPPR_ARTICLE_TITLE","Suppression d'un article");

define("SUPPR_ARTICLE_MODAL_TITLE","Confirmation");
define("SUPPR_ARTICLE_MODAL_TEXT","Etes-vous sûr de vouloir effacer l'article n°");
define("SUPPR_ARTICLE_MODAL_YES","Oui");
define("SUPPR_ARTICLE_MODAL_NO","Non");
define("SUPPR_ARTICLE_VALID","");

/* ---- */
/* MOIS */
/* ---- */

define( "MOIS_1","janvier");
define( "MOIS_2","février");
define( "MOIS_3","mars");
define( "MOIS_4","avril");
define( "MOIS_5","mai");
define( "MOIS_6","juin");
define( "MOIS_7","juillet");
define( "MOIS_8","aout");
define( "MOIS_9","septembre");
define( "MOIS_10","octobre");
define( "MOIS_11","novembre");
define( "MOIS_12","décembre");

define( "BEF","avant");
define( "ABT","vers");
define( "AFT","après");
define( "EST","estimé");
define( "WFT","estimé par World Family Tree");

/* ---------------------- */
/* Gestion des catégories */
/* ---------------------- */

/* Ajout d'une catégorie */

define("ADM_CAT_SEND","La nouvelle catégorie a bien été enregistrée !");
define("ADM_CAT_LIST","Liste des catégories");
define("ADM_CAT_ROOL","Déroulez pour voir la liste des catégories existantes");
define("SEND","Sauvegarder");

/* Modification d'une catégorie */

define("ADM_CAT_MODIF_INTRO","Cette page vous permet de modifier ou supprimer une catégorie. Pour créer une nouvelle catégorie, rendez-vous plutôt sur <a href='ajout-cat.php'>cette page</a>.");

define("ADM_CAT_EDIT","Edition d'une catégorie");

define("ADM_CAT_NAME","Nom actuel de la catégorie");
define("ADM_CAT_NEW","Nouveau nom");
define("ADM_CAT_DES","Description de la catégorie (facultatif)");

/* ------------------- */
/* Gestion des gedcoms */
/* ------------------- */

define("ADM_GED_SELECT","Selectionez votre fichier");
define("ADM_GED_SEND","Envoyer le fichier");

define( "ADM_GED_READ","Envoyer un gedcom");
define( "BILAN_GEDCOM","Résumé de l'importation du gedcom");
define( "ADM_GED_TEXT","Vous pouvez utiliser ce formulaire pour envoyer votre gedcom. Si vous avez d&eacute;jà envoy&eacute; un gedcom sur le site, celui-ci sera effac&eacute; et remplacé par le nouveau.");

/* ----------------- */
/* Gestion des comms */
/* ----------------- */

define("ADM_COMM_INTRO","Ici, vous retrouvez l'ensemble des commentaires qui ont été publiés à la suite des articles de votre blog. Vous pouvez ainsi les publier, les dépublier ou même les supprimer.");

define("ADM_COMM_GEST","Modérer mes commentaires");

define( "ADM_COMM_TITLE","Titre");
define( "ADM_COMM_AUTHOR","Auteur");
define( "ADM_COMM_DATE","Date");
define( "ADM_COMM_TEXT","Commentaire");

define( "ADM_COMM_EDIT","Editer");
define( "ADM_COMM_SUPPR","Supprimer");
define( "ADM_COMM_PUBLISH","Publier");

/* --------------------------------- */
/* Position et affichage des modules */
/* --------------------------------- */

define("MODUL_GES","Gestion des modules");
define("MODUL_NAME","Nom du module");
define("MODUL_DES","Description");
define("MODUL_POS","Position");
define("MODUL_VIS","Visible");
define("MODUL_SAVE","Sauvegarder");

/* Modules du blog */

define( "TITRE_RUB_ADMIN_5","Modules du blog");
define( "ALERT_MODUL_BLOG","Les options des modules du blog ont bien été enregistrées");
define( "INTRO_MODUL_BLOG","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.");

/* Modules de généalogie */

define( "TITRE_RUB_ADMIN_6","Modules généalogie");
define( "ALERT_MODUL_GEN","Les options des modules de généalogie ont bien été enregistrées");
define( "INTRO_MODUL_GEN","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.");

/* ----------------------------- */
/* Gestion de la Base de données */
/* ----------------------------- */

/* reinitialisation les tables */

define( "ADM_DB_TITLE","Réinitialisation des tables");
define( "ADM_DB_TEXT","Cette partie vous permet de remettre les tables de la base de données à zéro. Si vous avez des données, elles seront perdues.");

define("ADM_DB_SUBTITLE_G","Tables de la partie généalogie");
define("ADM_DB_SUBTEXT_G","En cliquant sur le bouton 'Réinitialiser', la partie généalogie de votre site va être remise à zéro. Si vous avez mis votre généalogie en ligne en im, elle sera effacée.");
define("ADM_DB_SEND_G","Réinitialiser");

define("ADM_DB_SUBTITLE_B","Tables de la partie blog");
define("ADM_DB_SUBTEXT_B","En cliquant sur le bouton 'Réinitialiser', la partie blog de votre site va être remise à zéro. Si vous avez écrit des articles ou reçu des commentaires, ils seront effacés.");
define("ADM_DB_SEND_B","Réinitialiser");

define("ADM_DB_SUBTITLE_S","Tables du système");
define("ADM_DB_SUBTEXT_S","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.");
define("ADM_DB_SEND_S","Réinitialiser");

/* stats sur les tables */

define( "ADM_DB_STATS_TEXT","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.");
define("ADM_DB_TABLE_NAME","Table");
define("ADM_DB_TABLE_SIZE","Taille (en bytes)");
define("ADM_DB_TOTAL","Total");

/* Textes communs aux 3 modales de confirmation */

define("MDL_GEN_NO","Annuler");
define("MDL_GEN_OK","Oui");

/* Modale de confirmation de réinitialisation de la partie généalogie */

define("MDL_GEN_TITLE", "Confirmation");
define("MDL_GEN_TEXT", "Êtes-vous sûr de vouloir réinitialiser les tables de la partie généalogie ? Si vous avez un arbre en ligne, cette opération va l'effacer.");

/* Modale de confirmation de réinitialisation de la partie blog */

define("MDL_BLG_TITLE", "Confirmation");
define("MDL_BLG_TEXT", "Êtes-vous sûr de vouloir réinitialiser les tables de la partie blog ? Si vous avez un  blog en ligne, cette opération va l'effacer. Les commentaires, articles et catégories seront perdues.");

/* Modale de confirmation de réinitialisation de la partie système */

define("MDL_SYS_TITLE", "Confirmation");
define("MDL_SYS_TEXT", " ");

/* ----------- */
/* Gestion SEO */
/* ----------- */

define("ADM_SEO_TEXT","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.");

/* infos du header */

define("ADM_HD_TITLE","Informations de l'entête");
define("ADM_HD_SITE_NAME","Nom du site");
define("ADM_HD_SITE_DESC","Slogan du site");

/* ------------------- */
/* Gestion des options */
/* ------------------- */

define( "ADM_ST_SEND","Enregistrer");

/* Paramètres */

define( "ADM_ST_RUBRIC_1","Généralités");
define( "ADM_ST_ACT1","Activer le blog");
define( "ADM_ST_ACT2","Activer la partie généalogie");
define( "ADM_ST_RUBRIC_2","Partie généalogie");
define( "ADM_ST_PAGE","Nombre de resultats par page");
define( "ADM_ST_TOP","Valeurs des tops");
define( "ADM_ST_RUBRIC_3","Partie blog");
define( "ADM_ST_ACT3","Activer les commentaires");

/* Thèmes */

define("ADM_TH_TITLE","Liste des thèmes disponibles");
define("ADM_TH_TEXT_PART_1","Ces thèmes sont issus du site ");
define("ADM_TH_TEXT_PART_2"," et disponibles sous licence ");

/* Favicon */

define("FAV_TITLE","Choix du favicon");
define("FAV_TEXT","Le favicon actuel est : ");
define("FAV_SELECT","Selectionnez votre fichier si vous voulez le changer...");
define("FAV_SEND","Enregistrer les modifications");

/* ------ */
/* Profil */
/* ------ */

define("PROFIL","Profil");
define( "SETTINGS","Paramètres");
define("LOGOUT","Se déconnecter");

/* ----------------------------- */
/* Fenêtre modale de déconnexion */ 
/* ----------------------------- */

define("LOGOUT_TITLE","Prêt à quitter?");
define('LOGOUT_TEXT','Sélectionnez "Se déconnecter" ci-dessous si vous êtes prêt à mettre fin à votre session en cours.');
define("LOGOUT_OK","Se déconnecter");
define("LOGOUT_CANCEL","Annuler");

/* -------------------------------- */
/* Pied de page de l'administration */
/* -------------------------------- */

define("CREATED_BY","Site propulsé sur le web par ");
define("COPYRIGHT","Tous droits réservés.");

/* ---------- */
/* Erreur 404 */
/* ---------- */

define("ADM_404_TITLE","Erreur 404");
define("ADM_404","404");
define("ADM_404_NO_FOUND","Page non trouvée");
define("ADM_404_TEXT","Il semble que vous ayez trouvé un pépin dans la matrice...");
define("ADM_404_ROLLBACK","Retour au tableau de bord");

?>
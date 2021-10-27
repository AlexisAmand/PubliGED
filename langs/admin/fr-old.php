<?php

/* ------------------- */
/* Textes pour l'admin */
/*    (version  FR)    */
/* ------------------- */

/* ------------------ */
/* Accueil de l'admin */
/* ------------------ */

/*
 define("NB_ARTICLES","Nombre d'articles");
 define("NB_CATEGORIES","Nombre de catégories");
 define("NB_USERS","Nombre d'utilisateurs");
 define("NB_COMMENTAIRES","Nombre de commentaires");
 */

/* -------------------- */
/* Gestion des articles */
/* -------------------- */

define( "ADM_ARTICLE_EDIT_CONTENT","Contenu de l'article");
define("ADM_BR_NOSEND","L'article n'a pas pu être enregistré comme brouillon !");
define("ADM_ARTICLE_ADD_INTRO","Cette page vous permet de créer un article. Pour modifier ou supprimer un article, rendez-vous plutôt sur <a href='index.php?page=modif-article'>cette page</a>.");

/* Suppression d'un article */

define("SUPPR_ARTICLE_TITLE","Suppression d'un article");
define("SUPPR_ARTICLE_MODAL_TEXT","Etes-vous sûr de vouloir effacer l'article n°");

/* Publication ou dépublication d'un article */

define("PUB_ARTICLE_MODAL_TEXT","Etes-vous sûr de vouloir publier l'article n°");
define("UNPUB_ARTICLE_MODAL_TEXT","Etes-vous sûr de vouloir dépublier l'article n°");

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

/* Pour le fil d'ariane */
define("CAT_BREAD","Les catégories");

/* Modification d'une catégorie */

define("ADM_CAT_MODIF_INTRO","Cette page vous permet de modifier ou supprimer une catégorie. Pour créer une nouvelle catégorie, rendez-vous plutôt sur <a href='cat-add.php'>cette page</a>.");
define("ADM_CAT_DES","Description de la catégorie (facultatif)");

/* Supression d'une catégorie */

define("SUPPR_CAT_TITLE","Suppression d'une catégorie");
define("SUPPR_CAT_MODAL_TEXT","Etes-vous sûr de vouloir effacer la catégrie n°");

/* ------------------- */
/* Gestion des gedcoms */
/* ------------------- */

define("ADM_GED_SELECT","Selectionez votre fichier");

/* ----------------- */
/* Gestion des comms */
/* ----------------- */

define("ADM_COMM_INTRO","Ici, vous retrouvez l'ensemble des commentaires qui ont été publiés à la suite des articles de votre blog. Vous pouvez ainsi les publier, les dépublier ou même les supprimer.");

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

/* stats sur les tables */

define( "ADM_DB_STATS_TEXT","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.");

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

/* Paramètres */

define( "ADM_ST_RUBRIC_1","Généralités");

/* Thèmes */

define("ADM_TH_TITLE","Liste des thèmes disponibles");

/* ------ */
/* Profil */
/* ------ */

define("USER_PROFIL","Profil");

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
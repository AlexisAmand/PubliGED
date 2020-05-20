<?php

define ("DASHBOARD", "Tableau de bord");
define ("ADM_ONLINE_TOOLS" , "Ce formulaire utilise des ressources en ligne");

define ("SEE_SITE","Voir le site");

/* ------------------ */
/* Accueil de l'admin */
/* ------------------ */

define ("NB_ARTICLES", "Nombre d'articles" );
define ("NB_CATEGORIES", "Nombre de catégories" );
define ("NB_USERS", "Nombre d'utilisateurs" );
define ("NB_COMMENTAIRES", "Nombre de commentaires" );

/* ---------------- */
/* Titres des pages */
/* ---------------- */

define ("ASIDE_ADMIN_0", "PubliGED Administration" );

define ("ASIDE_ADMIN_1", "Blog" );
define ("ASIDE_ADMIN_2", "Articles" );
define ("ASIDE_ADMIN_3", "Commentaires" );
define ( "ASIDE_ADMIN_4", "Modules");
define ( "ASIDE_ADMIN_5", "Généalogie");
define ( "ASIDE_ADMIN_6", "Gedcom" );
define ( "ASIDE_ADMIN_7", "Paramètres" );
define ( "ASIDE_ADMIN_8", "Base de données" );
define ( "ASIDE_ADMIN_9", "Options" );
define ( "ASIDE_ADMIN_10", "Métas et SEO" );

define("ADM_RUB_TITRE_0", "Ajouter un article");
define("ADM_RUB_TITRE_1", "Modifier les articles" );
define("ADM_RUB_TITRE_2", "Ajouter une catégorie" );
define("ADM_RUB_TITRE_3", "Modifier une catégorie" );
define("ADM_RUB_TITRE_4", "Modérer" );
define ("ADM_RUB_TITRE_5", "Effacer un gedcom" );
define ("ADM_RUB_TITRE_6", "Envoyer un gedcom" );

/* -------------------- */
/* Gestion des articles */
/* -------------------- */

define ("ADM_ARTICLE_LIST", "Liste des articles");

define ( "ADM_ARTICLE_TITLE", "Titre" );
define ( "ADM_ARTICLE_AUTHOR", "Auteur" );
define ( "ADM_ARTICLE_CAT", "Catégorie" );

define ( "ADM_ART_EDIT", "Editer" );
define ( "ADM_ART_SUPPR", "Supprimer" );
define ( "ADM_ART_PUBLISH", "Publier" );

define ( "ADM_ARTICLE_EDIT_TITLE", "Titre de l'article" );
define ( "ADM_ARTICLE_EDIT_CAT", "Catégorie de l'article" );
define ( "ADM_ARTICLE_CAT_LIST", "Choisir une catégorie");
define ( "ADM_ARTICLE_EDIT_CONTENT", "Contenu de l'article" );

define ("ADM_ARTICLE_SEND","L'article a bien été enregistré !");
define ("ADM_ARTICLE_NOSEND","L'article n'a pas pu être envoyé !");

define ("ADM_ARTICLE_NOTITLE","Vous n'avez pas indiqué de titre pour votre article");
define ("ADM_ARTICLE_NOCONTENT","Vous n'avez pas indiqué de contenu pour votre article");
define ("ADM_ARTICLE_NOCAT","Vous n'avez pas indiqué de catégorie pour votre article");

define ("ADM_ARTICLE_MODIF_INTRO", "Cette page vous permet de modifier ou supprimer un article. Pour créer un nouvel article, rendez-vous plutôt sur <a href='ajout-article.php'>cette page</a>.");
define ("ADM_ARTICLE_ADD_INTRO", "Cette page vous permet de créer un article. Pour modifier ou supprimer un article, rendez-vous plutôt sur <a href='modif-article.php'>cette page</a>.");

define ("ADM_ARTICLE_SAVE","Enregistrer");
define ("ADM_ARTICLE_PUBLISH","Publier");

/* ---- */
/* MOIS */
/* ---- */

define ( "MOIS_1", "janvier" );
define ( "MOIS_2", "février" );
define ( "MOIS_3", "mars" );
define ( "MOIS_4", "avril" );
define ( "MOIS_5", "mai" );
define ( "MOIS_6", "juin" );
define ( "MOIS_7", "juillet" );
define ( "MOIS_8", "aout" );
define ( "MOIS_9", "septembre" );
define ( "MOIS_10", "octobre" );
define ( "MOIS_11", "novembre" );
define ( "MOIS_12", "décembre" );

define ( "BEF", "avant" );
define ( "ABT", "vers" );
define ( "AFT", "après" );
define ( "EST", "estimé" );
define ( "WFT", "estimé par World Family Tree" );

/* Modale qui confirme la suppression d'un article */

define ("SUPPR_ARTICLE_MODAL_TITLE","Confirmation");
define ("","Etes-vous sûr de vouloir effacer l'article n°");
define ("SUPPR_ARTICLE_MODAL_YES","Oui");
define ("SUPPR_ARTICLE_MODAL_NO","non");

/* ---------------------- */
/* Gestion des catégories */
/* ---------------------- */

define ("ADM_CAT_SEND","La nouvelle catégorie a bien été enregistrée !");
define ("ADM_CAT_LIST","Liste des catégories existantes");
define ("ADM_CAT_ROOL","Déroulez pour voir la liste des catégories existantes");
define ("SEND","Sauvegarder");

/* ------------------- */
/* Gestion des gedcoms */
/* ------------------- */

define ( "READ_GEDCOM", "Lecture du gedcom" );
define ( "BILAN_GEDCOM", "Résumé de l'importation du gedcom" );

/* ----------------- */
/* Gestion des comms */
/* ----------------- */

define ( "ADM_COMM_TITLE", "Titre" );
define ( "ADM_COMM_AUTHOR", "Auteur" );
define ( "ADM_COMM_DATE", "Date" );
define ( "ADM_COMM_TEXT", "Commentaire" );

define ( "ADM_COMM_EDIT", "Editer" );
define ( "ADM_COMM_SUPPR", "Supprimer" );
define ( "ADM_COMM_PUBLISH", "Publier" );

/* --------------- */
/* Modules du blog */
/* --------------- */

define ( "TITRE_RUB_ADMIN_5", "Modules du blog" );

/* --------------------- */
/* Modules de généalogie */
/* --------------------- */

define ( "TITRE_RUB_ADMIN_6", "Modules généalogie" );

/* ---------------- */
/* Gestion de la BD */
/* ---------------- */

define ( "ADM_DB_SUPPR", "Supprimer les tables" );
define ( "ADM_DB_CREATE", "Créer les tables (?)" ); /* pas sûr */
define ( "ADM_DB_SIZE", "Taille de la base" );

/* ----------- */
/* Gestion SEO */
/* ----------- */

// define ( "ADM_DB_SUPPR", "Supprimer les tables" );

/* ------------------- */
/* Gestion des options */
/* ------------------- */

define ( "ADM_ST_TITLE", "Paramètres" );
define ( "ADM_ST_RUBRIC_1", "Généralités" );
define ( "ADM_ST_ACT1", "Activer le blog" );
define ( "ADM_ST_ACT2", "Activer la partie généalogie" );
define ( "ADM_ST_RUBRIC_2","Partie généalogie");
define ( "ADM_ST_PAGE","Nombre de resultats par page");
define ( "ADM_ST_TOP","Valeurs des tops");
define ( "ADM_ST_RUBRIC_3","Partie blog");
define ( "ADM_ST_ACT3","Activer les commentaires");
define ( "ADM_ST_SEND","Enregistrer");

/* ------ */
/* Profil */
/* ------ */

define ("PROFIL","Profil");
define ( "SETTINGS", "Paramètres" );
define ("LOGOUT","Se déconnecter");

/* ----------------------------- */
/* Fênetre modale de déconnexion */ 
/* ----------------------------- */

define ("LOGOUT_TITLE","Prêt à quitter?");
define ('LOGOUT_TEXT','Sélectionnez "Se déconnecter" ci-dessous si vous êtes prêt à mettre fin à votre session en cours.');
define ("LOGOUT_OK","Se déconnecter");
define ("LOGOUT_CANCEL", "Annuler");

/* -------------------------------- */
/* Pied de page de l'administration */
/* -------------------------------- */

/* ------------ */
/* PIED DE PAGE */
/* ------------ */

define ("CREATED_BY","Site propulsé par ");
define ("COPYRIGHT","Tous droits réservés.");
?>

<?php 

/* ------------------- */
/* Textes pour l'admin */
/*    (version  FR)    */
/* ------------------- */

/* STRUCTURE DE LA PAGE */
/* -------------------- */

define("ADM_ONLINE_TOOLS","Ce formulaire utilise des ressources en ligne.");
define("HELLO","Bonjour");

/* bandeau */

define("ADM_SEE_SITE","Voir le site");

/* aside */

define("BCK_TITLE","PubliGED");
define("DASHBOARD","Tableau de bord");
define("LOG_AS","Logged in as");

/* User menu */

define("USER_SETTINGS","Paramètres");
define("USER_LOG","Activity Log");
define("LOGOUT","Se déconnecter");

/* Footer */

define("FOOTER_CREDITS","Thème par Start Bootstrap");
define("FOOTER_LICENCE","Licence");
define("CREATED_BY","Site propulsé sur le web par ");


/* MENU ASIDE / TITRES DES PAGES */
/* ----------------------------- */

define("BCK_RUB_TITLE_1","Le blog");
define("ASIDE_ADMIN_1","Articles");
define("ADM_RUB_ADD_A","Ajouter un article");
define("ADM_RUB_MODIF_A","Modifier les articles");
define("CAT_BREAD","Les catégories");
define("ADM_RUB_EDIT_A","Editer un article");
define("ADM_RUB_ADD_C","Ajouter une catégorie");
define("ADM_RUB_MODIF_C","Modifier une catégorie");
define("ASIDE_ADMIN_2","Commentaires");
define("ADM_COMM_LIST","Liste des commentaires");
define("ADM_RUB_COMM","Modérer");
define("ASIDE_ADMIN_3","Modules");
define("BCK_RUB_TITLE_2","La généalogie");
define("ASIDE_ADMIN_5","Gedcom");
define("ADM_RUB_SEND_G","Envoyer un gedcom");
define("ADM_RUB_DEL_G","Effacer un gedcom");
define("ASIDE_ADMIN_6","Modules");
define("BCK_RUB_TITLE_3","Les paramètres");
define("ASIDE_ADMIN_7","Base de données");
define("ADM_DB_SUPPR","Supprimer les tables");
define("ADM_DB_CREATE","Réinitialiser les tables");
define("ADM_DB_SIZE","Taille de la base de données");
define("ASIDE_ADMIN_8","Options");
define("ADM_RUB_PARAM","Paramètres");
define("ADM_RUB_PERSO","Personnalisation");
define("ASIDE_ADMIN_9","Utilisateurs");
define("ADM_RUB_USERS","Liste des utilisateurs");
define("ADM_RUB_ADD_USER","Ajout d'un utilisateur");
define("BCK_RUB_TITLE_4","Le référencement");
define("ASIDE_ADMIN_10","Métas et SEO");
define("ASIDE_ADMIN_11","Statistiques");

/* CONNEXION ADMIN */
/* --------------- */

/* Ecran de connexion */

define("OPEN_SESSION","Ouverture d'une session pour l'utilisateur");
define("LOG_NO_FND","Le compte n'a pas reconnu");
define("SESSION_ERROR_01","Erreur ! Plusieurs membres ont les mêmes identifiants de connexion.");
define("SESSION_ERROR_02","Les 2 champs sont obligatoires.");
define("SESSION_TTL","Login");
define("SESSION_LOGIN","Login");
define("SESSION_PWD","Mot de passe");
define("SESSION_BTN","login");
define("SESSION_FGT_PWD","mot de passe oublié");

/* Ecran de déconnexion */

define("CLOSE_SESSION","Fermeture d'une session pour l'utilisateur");

/* Mot de passe oublié */

define("PWD_FGT_TLT","Récupération du mot de passe");
define("PWD_FGT_TEXT","Saisissez votre e-mail, un lien pour réinitialiser votre mot de passe va vous être envoyé.");
define("PWD_FGT_EMAIL","Votre Email");
define("PWD_FGT_RESET","Réinitialiser le mot de passe");
define("PWD_FGT_LOGIN","Se connecter");

/* ECRAN PRINCIPAL */
/* --------------- */

define("NB_ARTICLES","Les articles");
define("NB_CATEGORIES","Les catégories");
define("NB_USERS","Les utilisateurs");
define("NB_COMMENTAIRES","Les commentaires");
define("LAST_ALL_ARTICLES","Les derniers articles");
define("ALL_ARTICLE","Voir tous les articles");
define("LAST_ALL_COM","Les derniers commentaires");
define("ALL_COM","Voir tous les commentaires");
define("MY_GEDCOM","La généalogie");
define("MY_GEDCOM_INDIVIDUALS"," individus dans la base de données");
define("MY_GEDCOM_PLACE"," lieux dans la base de données");
define("MY_GEDCOM_FAMILIES"," familles dans la base de données");
define("MY_GEDCOM_SRC"," sources dans la base de données");
define("MY_GEDCOM_EVE"," événements dans la base de données");
define("MY_GEDCOM_SEND","Envoyer mon gedcom");
define("NO_COM","Pas de commentaires pour le moment");
define("ADM_INFOSYS","Informations système");
define("SEE_LOGB_LINK","Voir le log du blog");

/* GESTION DES ARTICLES */
/* -------------------- */

/* Ajout d'un article */

define("MY_ARTICLE","Mon article");
define("MY_OPTIONS","Mes options");
define("ADM_ARTICLE_NOTITLE","Vous n'avez pas indiqué de titre pour votre article");
define("ADM_ARTICLE_NOCONTENT","Vous n'avez pas indiqué de contenu pour votre article");
define("ADM_ARTICLE_CAT_LIST","Choisir une catégorie");
define("ADM_ARTICLE_NOCAT","Vous n'avez pas indiqué de catégorie pour votre article");
define("ADM_ARTICLE_NOSEND","L'article n'a pas pu être envoyé !");
define("ADM_ARTICLE_SEND","L'article a bien été enregistré !");
define("ADM_BR_SEND","L'article a bien été enregistré comme brouillon !");
define("ADM_ARTICLE_EDIT_TITLE","Titre de l'article");
define("ADM_ARTICLE_EDIT_CAT","Catégorie de l'article");
define("ADM_ARTICLE_SAVE","Enregistrer");
define("ADM_ARTICLE_PUBLISH","Publier");

/* Options seo pour l'article */

define("ADM_ARTICLE_SEO","Qqs options seo ?");
define("ADM_ARTICLE_META_DESC","Méta description");
define("ADM_ARTICLE_META_KEY","Méta keywords");

/* Edition d'un article */

define("ADM_ARTICLE_EDIT_TXT","Edition de l'article");

/* Modification d'un article */ 

define("ARTICLE_NB","L'article n°");
define("ARTICLE_PUBLISHED"," a bien été publié !");
define("ARTICLE_UNPUBLISHED"," a bien été dépublié !");
define("ARTICLE_DELETED"," a bien été supprimé !");
define("ADM_ARTICLE_LIST","Liste des articles");
define("ADM_ARTICLE_MODIF_INTRO","Cette page vous permet de modifier ou supprimer un article. Pour créer un nouvel article, rendez-vous plutôt sur <a href='index.php?page=article-add'>cette page</a>.");
define("ADM_ARTICLE_TITLE","Titre");
define("ADM_ARTICLE_AUTHOR","Auteur");
define("ADM_ARTICLE_CAT","Catégorie");
define("ADM_ART_EDIT","Editer");
define("ADM_ART_SUPPR","Supprimer");
define("ADM_ART_PUBLISH","Publier");
define("SUPPR_ARTICLE_MODAL_TITLE","Confirmation");
define("ADM_ART_CONFIRM_01","Etes-vous sûr de vouloir supprimer l'article n°");
define("ADM_ART_CONFIRM_02","Etes-vous sûr de vouloir publier l'article n°");
define("ADM_ART_CONFIRM_03","Etes-vous sûr de vouloir dépublier l'article n°");
define("SUPPR_ARTICLE_MODAL_YES","Oui");
define("SUPPR_ARTICLE_MODAL_NO","Non");


/* GESTION DES CATEGORIES */
/* ---------------------- */

/* Ajout d'une catégorie */

define("ADM_CAT_SEND_01","La nouvelle catégorie a bien été enregistrée !");
define("ADM_CAT_SEND_02","la catégorie et sa description ont bien été ajoutés");
define("ADM_CAT_LIST","Liste des catégories");
define("ADM_CAT_ROOL","Déroulez pour voir la liste des catégories existantes");
define("SEND","Sauvegarder");

/* Edition d'une catégorie */

define("ADM_CAT_EDIT","Edition d'une catégorie");
define("ADM_CAT_NAME","Nom actuel de la catégorie");
define("ADM_CAT_NEW","Nouveau nom");
/* define("ADM_CAT_NAME","Nom de la catégorie"); */

/* Modification des catégories */

define("CAT_NB","La catégorie n°");
define("CAT_PUBLISHED"," a bien été publiée !");
define("CAT_UNPUBLISHED"," a bien été dépubliée !");
define("CAT_DELETED"," a bien été supprimé !");
define("SUPPR_CAT_MODAL_TITLE","Confirmation");
define("ADM_CAT_CONFIRM_01","Etes-vous sûr de vouloir supprimer la catégorie n°");
define("ADM_CAT_CONFIRM_02","Etes-vous sûr de vouloir publier la catégorie n°");
define("ADM_CAT_CONFIRM_03","Etes-vous sûr de vouloir dépublier la catégorie n°");
define("SUPPR_CAT_MODAL_YES","Oui");
define("SUPPR_CAT_MODAL_NO","Non");
define("CAT_MODIF_OK","La catégorie a bien été modifiée");
define("CAT_MODIF_BTN","Enregistrer");

/* GESTION DES COMMENTAIRES */
/* ------------------------ */

/* Modification d'un commentaire */

define("ADM_COMM_GEST","Modérer les commentaires");
define("ADM_COMM_TITLE","Titre");
define("ADM_COMM_AUTHOR","Auteur");
define("ADM_COMM_DATE","Date");
define("ADM_COMM_TEXT","Commentaire");
define("ADM_COMM_EDIT","Editer");
define("ADM_COMM_SUPPR","Supprimer");
define("ADM_COMM_PUBLISH","Publier");
define("SUPPR_COMM_MODAL_YES","Oui");
define("SUPPR_COMM_MODAL_NO","Non");
define("SUPPR_COMM_MODAL_TITLE","Confirmation");
define("ADM_COMM_CONFIRM_01","Etes-vous sûr de vouloir supprimer le commentaire n°");
define("ADM_COMM_CONFIRM_02","Etes-vous sûr de vouloir publier le commentaire n°");
define("ADM_COMM_CONFIRM_03","Etes-vous sûr de vouloir dépublier le commentaire n°");

/* Editer un commentaire */

define("COMM_EDIT","Editer un commentaire");

/* Publication d'un commentaire */

define("COMM_NB", "Le commentaire n°");
define("COMM_PUBLISHED"," a été publié.");
define("COMM_UNPUBLISHED"," a été dépublié.");
define("COMM_DELETED"," a été supprimé.");

/* GESTION DE LA BASE DE DONNEES */
/* ----------------------------- */

/* Réinitialisation des tables */

define("CLEAN_TABLES_G","Les tables de la partie généalogie ont bien été vidées !");
define("CLEAN_TABLES_B","Les tables de la partie blog ont bien été vidées !");
define("CLEAN_TABLES_S","Plop S");
define("ADM_DB_SUBTITLE_G","Tables de la partie généalogie");
define("ADM_DB_SUBTEXT_G","En cliquant sur le bouton 'Réinitialiser', la partie généalogie de votre site va être remise à zéro. Si vous avez mis votre généalogie en ligne en im, elle sera effacée.");
define("ADM_DB_SEND_G","Réinitialiser");
define("ADM_DB_SUBTITLE_B","Tables de la partie blog");
define("ADM_DB_SUBTEXT_B","En cliquant sur le bouton 'Réinitialiser', la partie blog de votre site va être remise à zéro. Si vous avez écrit des articles ou reçu des commentaires, ils seront effacés.");
define("ADM_DB_SEND_B","Réinitialiser");
define("ADM_DB_SUBTITLE_S","Tables du système");
define("ADM_DB_SUBTEXT_S","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.");
define("ADM_DB_SEND_S","Réinitialiser");
define("MDL_GEN_NO","Annuler");
define("MDL_GEN_OK","Oui");
define("MDL_GEN_TITLE","Confirmation");
define("MDL_GEN_TEXT","Êtes-vous sûr de vouloir réinitialiser les tables de la partie généalogie ? Si vous avez un arbre en ligne, cette opération va l'effacer.");
define("MDL_BLG_TITLE","Confirmation");
define("MDL_BLG_TEXT","Êtes-vous sûr de vouloir réinitialiser les tables de la partie blog ? Si vous avez un  blog en ligne, cette opération va l'effacer. Les commentaires, articles et catégories seront perdues.");
define("MDL_SYS_TITLE","Confirmation");
define("MDL_SYS_TEXT","Plip Plop");

/* Statistique sur la base de données */

define("ADM_DB_TABLE_NAME","Table");
define("ADM_DB_TABLE_SIZE","Taille (en bytes)");
define("ADM_DB_TOTAL","Total");

/* GESTION DES OPTIONS */
/* ------------------- */

/* Paramètres */

define("ADM_ST_ACT1","Activer le blog");
define("ADM_ST_ACT2","Activer la partie généalogie");
define("ADM_ST_ACT3","Activer la page contact");
define("ADM_ST_RUBRIC_2","Partie généalogie");
define("ADM_ST_PAGE","Nombre de resultats par page");
define("ADM_ST_TOP","Valeurs des tops");
define("ADM_ST_RUBRIC_3","Partie blog");
define("ADM_ST_SEND","Enregistrer");
define("OPT_LEFT_MENU","Menu à gauche");
define("OPT_RIGHT_MENU","Menu à droite");
define("OPT_LANGUAGE","Langue");
define("OPT_FRENCH","Français");
define("OPT_ENGLISH","English");
define("OPT_GERMAN","Deutsch");
define("OPT_SPANISH","Espagnol");

/* Templates */

define("ADM_TH_TEXT_PART_1","Ces thèmes sont issus du site ");
define("ADM_TH_TEXT_PART_2"," et disponibles sous licence ");
define("FAV_TITLE","Choix du favicon");
define("FAV_TEXT","Le favicon actuel est : ");
define("FAV_SELECT","Selectionnez votre fichier si vous voulez le changer...");
define("FAV_SELECT_SEND","Le favicon a été envoyé");
define("","Le favicon n'a pas été envoyé");
define("FAV_SEND","Enregistrer les modifications");

/* Sauvegarde des options */

define("OPT_SAVE_OK","Les options ont bien été enregistrées.");
define("OPT_SAVE_NOOK","Attention ! Certains champs n'ont pas été remplis.<br />Les options n'ont pas pu être enregistrées.");

/* GESTION DU GEDCOM */
/* ----------------- */

/* Selection du gedcom */

define("ADM_GED_READ","Envoyer un gedcom");
define("ADM_GED_TEXT","Vous pouvez utiliser ce formulaire pour envoyer votre gedcom. Si vous avez d&eacute;jà envoy&eacute; un gedcom sur le site, celui-ci sera effac&eacute; et remplacé par le nouveau.");
define("ADM_GED_SEND","Envoyer le fichier");

/* Lecture du gedcom */

define("BILAN_GEDCOM","Résumé de l'importation du gedcom");

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

/* GESTION DES UTILISATEURS */
/* ------------------------ */ 

define("USERS_PSEUDO","Pseudo");
define("USERS_EDIT","Editer");
define("USERS_DEL","Supprimer");
define("NO_ACCESS","Votre rôle ne vous permet pas d'accéder à cette page.");

/* PROFIL DE L'UTILISATEUR */
/* ----------------------- */

define("USER_PROFIL_LOGIN","Login");
define("USER_PROFIL_MAIL","Email");
define("USER_PROFIL_PSW","Mot de passe");
define("USER_PROFIL_ROLE","Rôle");
define("USER_PROFIL_SEND","Enregistrer");

/* PROFIL D'UN UTILISATEUR */
/* ----------------------- */

define("USER_PROFIL_TTL","Profil de l'utilisateur");
define("USER_LOG_TTL","Activité de l'utilisateur");
define("USER_LOG_B","Blog");
define("USER_LOG_G","Généalogie");
define("USER_LOG_BTN","Télécharger le fichier");

/* OPTIONS SEO */
/* ----------- */

define("SEO_TXT_1","Texte qui apparait dans l'entête de votre site.");
define("ADM_HD_SITE_NAME","Nom du site");
define("ADM_HD_SITE_DESC","Slogan du site");

define("ADM_SEO","SEO (Référencement)");
define("SEO_TXT_2","<p>Ces deux champs n\'apparaissent pas vraiment sur votre site, ils ont juste pour but d\'optimiser votre référencement. Pour les connaisseurs en SEO, il s\'agit de la balise \"title\" et le la meta \"description\" par défaut.</p>");
define("ADM_SEO_TITLE","Titre du site (SEO)");
define("ADM_SEO_DESC","Description (SEO)"); 

define("SEO_SAVE","Enregistrer");

/* PAGES D'ERREUR */
/* -------------- */

/* Erreur 401 */

define("ERR401_TTL","401");
define("ERR401_LEAD","Non autorisé");
define("ERR401_TXT","L'accès à cette ressource est refusé.");
define("ERR_LINK_BACK","Retour au tableau de bord");

/* Erreur 404 */

define("ERR404_LEAD","L'URL demandée n'a pas été trouvée sur ce serveur.");

/* Erreur 500 */

define("ERR500_TTL","500");
define("ERR500_LEAD","Internal Server Error.");

?>
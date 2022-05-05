<?php

/* installation */

/*

verifier si accès à sql au début de index.php du front-office si pas d'accès redirection vers l'installation

1) écran de bienvenue 
---------------------

- choix de la langue

2) accès à SQL
--------------

- serveur
- user
- mdp
- nom de la BD

3) clic sur "suivant" 
---------------------

Vérifier si l'accès fonctionne
- si ça fonctionne : on crée les tables et on les préremplies si besoin
- sinon : retour à 2)

4) compte admin
---------------

- pseudo
- mot de passe
- email

5) clic sur "suivant" 
---------------------

- on met l'user dans la base de données

6)  info du site
----------------

- nom du site : 4/5 mots en accord avec le SEO
- slogan du site (facultatif)
- checkbox pour empêcher les moteurs de parcourir le site

7) clic sur "suivant" 
---------------------

- on met les infos dans la BD
- robots.txt est généré en fonction de la checkbox

8) fin
------

- message qui indique que c'est fini et que tout s'est bien passé
- préciser que c'est mieux pour la sécurité de supprimer le dossier "installation"

*/

?>
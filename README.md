## PubliGED

PubliGED est ce que j’appelle un GMS (Genealogy Management System) par analogie avec les CMS, comme Joomla, WordPress ou Spip. Développé essentiellement en PHP et SQL, avec quelques gouttes de CSS et de HTML, PubliGED a pour but de permettre aux généalogistes de publier facilement et rapidement leurs généalogies en utilisant le gedcom, un format de fichier commun à la plupart des logiciels de généalogie.

Pour l'instant, j'aimerai éviter que d'autres personnes contribuent au projet pour le moment, j'ai un peu peur que ça parte dans tous les sens. Cependant, n'hésitez pas à me soumettre vos idées et vos suggestions, voire même à consulter les sources à titre pédagogique.

#### Remarques :

Etant encore en phase de développement, certaines fonctionnalités ne sont pas sécurisées !

* mot de passe de l'administration stocké comme une simple chaine de caractères.
* dossier node_module à la racine du projet.

#### Plus d'infos : 

* https://publiged.boitasite.com
* https://www.facebook.com/Publiged/

#### Soutenir le projet :

* https://ww.tipeee.com/genealexis

#### Fonctionnalités :

- Une partie concerne la transformation du gedcom en pages web qui permettent de consulter facilement la base d’ancêtres.
- La seconde partie est un blog qui permet de publier des articles pour parler de ses recherches ou pour raconter la vie de ses ancêtres.

#### Environement de développement

* Laragon 5.0.0
* Apache 2.4.47
* phpMyAdmin 5.1.1
* Windows 10
* Eclipse IDE for PHP Developers 2021-06 (4.20.0)
* Visual Studio Code 1.60.1

#### Langages utilisés

* HTML
* CSS
* PHP 7.4.19
* SQL (via MySQL 5.7.33)
* Javascript

### Framework (via CDN)

* Bootstrap 5.1.0
* Bootstrap icons 1.5.0
(dont templates Bootswatch 5.1.0)

#### Librairies PHP

Obtenues via https://packagist.org et Composer 2.1.3

* PHPMailer/PHPMailer 6.5.1
* egulias/EmailValidator 2.1.25
* mpdf/mpdf composer 8.0.12

#### Librairies Javascript (via CDN)

* datatables 1.11 pour Bootstrap 5
* jQuery 3.6.0
* leaflet 1.7.1

Obtenues via https://www.npmjs.com et npm 7.20.3

* char.js 3.3.2
* Jquery easing 1.4.1
* leaflet-basemaps 0.3.4

Auto-hébergées

* * tinyMCE 5.9
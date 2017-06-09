# IHM Auray Plast


La société "AurayPlast" produit essentiellement des joints de piston hydraulique pour "CaterPillar". Ces joints sont faits en matière plastique grâce à des machines à injection.

Dans le souci d'augmenter son "EMS" (environnemental Management System), cette société souhaite équiper ces machines à injection de différents capteurs permettant d'effectuer des mesures d'humidité, de pression et de tempéra tuer. Ces mesures doivent être accesible sous forme de graphique dans une page WEB.

Cette interface répond donc à un cahier des charges, mais ce projet reste public pour avoir un historique de modifications et permettre à certains de réutiliser les sources pour d'autres projets.

## Prérequis

Pour que cette interface fonctionne aurez besoin d'un serveur web tel que Apache ou Nginx avec PHP7 et MySQL et ces dépendances. 

Dans MySQL, vous devez rajouter la database auraynodcap1 permettant de stocker les mesures, et la database dbtest permetant de stocker les utilisateurs.

## Installation

Pour installer cette interface, dézipper les fichiers sur un dossier accesible via le web ( /var/www/html par exemple) 

Editer le fichier dbconnect.php et ajouter vos identifiants de connexion a la base de donnée MySQL.

Modifier les droits et le propritaire du dossier/sous dossier via la commande

`chmod -R 776 /votre/fichier/web`

`chmod -R utilisateur:groupe /votre/fichier/web`


## Historique des modifications

Ajout d'une page d'acceuil avec plan du site.

Ajout de la partie fichier script.

Correction de bug.

## Crédit

Cette interface est réalisé dans le cadre du projet de fin d'année de BTS Systèmes Numériques option Informatique et Réseaux de la Croix Rouge la Salle de Brest.

L'IHM Web et la page d'accueil a été crée par [Yoann.S](https://twitter.com/softyoda) 

Les la base de donnée et pages de génération du fichier scripte`(/script)` ont été crée par Loïc.S

## License


<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/CC-BY-SA_icon.svg/2000px-CC-BY-SA_icon.svg.png" width="48"CC BY SA>
Cette licence autorise toute utilisation de l’œuvre originale (y compris à des fins commerciales) ainsi que la création d’œuvres dérivées, à condition qu’elles soient distribuées sous une licence identique à celle qui régit l’œuvre originale.



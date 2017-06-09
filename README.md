# IHM Auray Plast


La société "**AurayPlast**" produit essentiellement des joints de piston hydraulique pour "CaterPillar". Ces joints sont faits en matière plastique grâce à des machines à injection.

Dans le souci d'augmenter son "EMS" (environnemental Management System), cette société souhaite équiper ces machines à injection de différents capteurs permettant d'effectuer des mesures d'humidité, de pression et de tempéra tuer. Ces mesures doivent être accesible sous forme de graphique dans une page WEB.

Cette interface répond donc à un cahier des charges, mais ce projet reste public pour avoir un historique de modifications et permettre à certains de réutiliser les sources pour d'autres projets.



<a href="http://aurayplast.fr/"><img src="https://raw.githubusercontent.com/softyoda/IHM_Auray_Plast/master/administration/assets/img/shema.PNG" align="middle" height="300" width=auto ></a> 















## Prérequis  :computer:


Pour que cette interface fonctionne aurez besoin d'un serveur web tel que **Apache** ou Nginx avec **PHP7** et **MySQL** et ces dépendances. 

Dans MySQL, vous devez rajouter la database *auraynodcap1* permettant de stocker les mesures, et la database *dbtest* permetant de stocker les utilisateurs.



## Installation  :inbox_tray:


Pour installer cette interface, dézipper les fichiers sur un dossier accesible via le web (`/var/www/html` par exemple) 

Editer le fichier **dbconnect.php** et ajouter vos identifiants de connexion a la base de donnée MySQL.

Modifier les droits et le propritaire du dossier/sous dossier via la commande

`chmod -R 776 /votre/fichier/web`

`chmod -R utilisateur:groupe /votre/fichier/web`

Vous pouvez attribuer des droits plus fort ou faible en fonction de la sécurité que vous souhaitez accorder a votre infrastructure. 
Vous pouvez par exemple interdir les droits en lecture a dbconnect.php car il y a les identifients de connexion a MySQL.


## Historique des modifications  :calendar:

- [x] Ajout de la Base de donnée

- [x] Ajout d'un ReadMe.md complet /play yeah

- [ ] Ajout d'une page d'acceuil avec plan du site.

- [ ] Ajout de la partie fichier script.

- [ ] Correction de bug.

- [ ] Ajout de favicon

## Crédit  :memo:

Cette interface est réalisé dans le cadre du projet de fin d'année de BTS Systèmes Numériques option Informatique et Réseaux de la Croix Rouge la Salle de Brest.

- L'IHM Web et la page d'accueil a été crée par [Yoann.S](https://twitter.com/softyoda) 

- Les la base de donnée et pages de génération du fichier scripte`(/script)` ont été crée par Loïc.S

## License  :lock:
<a href="https://creativecommons.org/licenses/by-sa/2.0/"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/CC-BY-SA_icon.svg/2000px-CC-BY-SA_icon.svg.png" align="left" height="30" width=auto ></a> 
[**CC BY SA**](https://creativecommons.org/licenses/by-sa/2.0/fr/) 

- Attribution — Vous devez créditer l'Œuvre, intégrer un lien vers la licence et indiquer si des modifications ont été effectuées à l'Oeuvre. Vous devez indiquer ces informations par tous les moyens raisonnables, sans toutefois suggérer que l'Offrant vous soutient ou soutient la façon dont vous avez utilisé son Oeuvre.

- Partage dans les Mêmes Conditions — Dans le cas où vous effectuez un remix, que vous transformez, ou créez à partir du matériel composant l'Oeuvre originale, vous devez diffuser l'Oeuvre modifiée dans les même conditions, c'est à dire avec la même licence avec laquelle l'Oeuvre originale a été diffusée.

- Pas de restrictions complémentaires — Vous n'êtes pas autorisé à appliquer des conditions légales ou des mesures techniques qui restreindraient légalement autrui à utiliser l'Oeuvre dans les conditions décrites par la licence.


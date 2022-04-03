# IDAW-projet
Projet de l'UV IDAW with Miss Gaëlle Herard

# Important

- Utilisez le compte login:mekkiki password:Kiki
- Créer une db sur localhost/phpmyadmin nommée imangermieux ou importer database.sql avec comme login="root" et password="".

# Installation
- Telecharger le zip et extraire dans le dossier www/ de wamp (ou simplement cloner le repo pour les habitués).
- Importer database.sql dans backend/doc/ sur une nouvelle db imangermieux sur phpmyadmin.
- Lancer dans le navigateur localhost/IDAW-projet/frontend/index.php (à adapter selon rennomage).
- Enjoy!

# Utilisation
## Index.php
Les différentes parties de la page sont accessibles avec la barre en haut à droite
- Il est possible soit de se connecter à un compte existant avec Connexion.
- Soit de remplir le formulaire de New Account pour créer son propre compte et se connecter automatiquement.
## Connected.php
- Il est conseillé de se déconnecter avec disconnexion pour tuer la session (entraine retour sur index.php).
- Les différents services sont disponibles dans services.

### Services
- My Profil: affiche les infos profil et permet la modif de ceux-ci.
- My Logs: journal des repas pris.
- Info Meals: **(prends du temps à charger)** affiche les valeurs nutritionnelles pour l'ensemble des aliments.
- Your Sports: gere et informe sur les sports de l'utilisateurs.
- Your Next Meal: **alpha** choisit en fonction de vos conditions physiques et sportive votre prochain repas (peut tomber pottentiellement sur 1L d'huile ou du poulet cru)
- Where To Eat: carte vous informant ou manger sain près de Douai(probleme avec marker).

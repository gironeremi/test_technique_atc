CONSIGNE
========
Re bonjour Rémi,
Comme convenu veuillez trouver ci-dessous l’exercice. Merci encore pour l’échange de ce matin
---

L’exercice consiste à créer une application web qui va permettre à un utilisateur de se connecter sur son espace de travail grâce à un login et un mot de passe.
Une fois connecté, un processus de simulation d’envoi de point gps sera alors lancé.


* Phase de connexion :

[ ] Requête REST qui retournera un token pour effectuer les futures opérations

[x] Une fois connecté un processus va faire une requête d’envoi de point gps toutes les x temps (ex :toute les  x secondes, minute…)  à définir

[x] forme:

```
{
    “location”:
    {
        “lat”:”xx.xxxxxx”,
        ”long”:”xx.xxxxxx”
    },
    
    ”date”:”xx/xx/xxxx hh: mm: ss”  
}
```

* Coté back end :

     * [x] Mise en place d’une api rest avec les fonctions requises
     * [x] Base de données 
        * Table user
        * Table points
        * (Table nécessaire à définir pour la structure de la bdd)

**Précision:**

* [x] Niveau des utilisateurs:
    * Admin
    * Manager
    * Utilisateur lambda
 
* L'admin doit avoir accès à tout.

* Le manager aux users, et les users à leur propres données eux-même.

**Dans cet exercice, il y a deux managers qui ont chacun des users différents, mais deux d'entre eux sont visibles des deux managers.**

* [x] Le serveur reçoit les requêtes toutes les 1 seconde.
* [] Tout doit être logué et le serveur doit calculer le nombre d'heures de chaque user par jour. (Réfléchir à la visualisation des données)
* [] Sortir un rapport journalier des users et par Manager.
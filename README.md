# A propos de Laravel CRUD Generator

*Version 0.2*

Créer un système de CRUD rapidement.

Idéal pour les débuts de projet Web, Laravel CRUD Generator permet de générer :
* Des fichiers de migrations
* La création des tables en base de données
* Des models
* Des controllers
* Des fichiers blade (index, show, create, edit)

# Configuration requise
> Larvel >= 5.4

> PHP >= 5.6

# Installation

Téléchargez et remplacez le dossier Console dans votre projet Laravel.
Si vous avez vos propres fichiers de commandes, dans ce cas pensez à récupérer les fichiers nécessaires.

*Note*
La génération de fichier utilise le framework css de Bootstrap 5

# Création de tous les fichiers d'un model
```
php artisan crud:migration Todo name,string,unique;slug,string,nullable
```

# Création de fichiers pour la vue

*Exemple Model Todo*

**Créer un fichier index.blade.php**

```
php artisan crud:index Todo
```

**Créer un fichier show.blade.php**

```
php artisan crud:show Todo
```

**Créer un fichier edit.blade.php**

```
php artisan crud:edit Todo
```

**Créer un fichier create.blade.php**

```
php artisan crud:create Todo
```

#  Création du controller

```
php artisan crud:controller Todo
```

### Important

Cette version permet uniquement de réaliser un crud dont le model n'a aucne dépendance

### A terminer
- [ ] le fichier create.blade.php > Pour le reste de types de champs (select, checkbox, textarea, number, email..)
- [ ] le fichier edit.blade.php > Pour le reste de types de champs (select, checkbox, textarea, number, email..)

### A faire
- [ ] Créer une nouvelle commande pour la génération d'un layout
- [ ] Générer les resources pour les routes


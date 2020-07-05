# A propos de Laravel CRUD Generator

*Version 0.1*

Créer un système de CRUD rapidement.

Idéal pour les débuts de projet Web, Laravel CRUD Generator permet de générer :
* Des fichiers de vue
* Un fichier controller

# Configuration requise
> Larvel >= 5.4

> php 5.6

# Installation

Téléchargez et remplacez le dossier Console dans votre projet Laravel.
Si vous avez vos propres fichiers de commandes, dans ce cas pensez à récupérer les fichiers nécessaires.

*Note*
La génération de fichier utilise le framework css de Bootstrap 4
Le template

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

# --- Important ---

Cette version permet uniquement de réaliser un crud dont le model n'a aucne dépendance

# --- A terminer ---
* create.blade.php

* edit.blade.php

Création des form_group pour différents types de Input (select, checkbox, textarea, number, email...) suivi des dépendances.


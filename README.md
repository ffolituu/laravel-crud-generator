# Laravel CRUD Generator
Create a crud system quickly with laravel 7

*Version 0.1*

Le reposito contient des dossiers et fichiers qui permettent d'enclancher différentes commandes pour réaliser un système de crud rapidement.

# Installation

Téléchargez et remplacez le dossier Console dans votre projet Laravel.
Si vous avez vos propres fichiers de commandes, dans ce cas pensez à récupérer les fichiers nécessaires.

# Création de fichiers pour la view

*Exemple Model Todo*

**Créer un fichier index.blade.php**
> php artisan crud:index Todo

**Créer un fichier show.blade.php**
> php artisan crud:show Todo

**Créer un fichier edit.blade.php**
> php artisan crud:edit Todo

**Créer un fichier create.blade.php**
> php artisan crud:create Todo

#  Création du controller

> php artisan crud:controller Todo

# --- Important ---

Cette version permet uniquement de réaliser un crud dont le model n'a aucne dépendance

# --- A terminer ---
-create.blade.php

-edit.blade.php

Création des form_group pour différents types de Input (select, checkbox, textarea, number, email...) suivi des dépendances.


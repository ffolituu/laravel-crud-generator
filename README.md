# laravel CRUD
Create a crud system quickly with laravel 7

**Version 0.1 :**

Le dossier Console contient des dossier et fichiers qui permettent d'enclancher différentes commandes pour réaliser un système de crud rapidement.

**Installation**

Si votre dossier Console de Laravel est vierge alors télécharger le dossier Console pour le remplacer.

**Utilisation pour la view (Exemple comme model Todo)**

- Créer un fichier index.blade.php
> php artisan crud:index Todo

- Créer un fichier show.blade.php
> php artisan crud:show Todo

- Créer un fichier edit.blade.php
> php artisan crud:edit Todo

- Créer un fichier create.blade.php
> php artisan crud:create Todo

**Utilisation pour le controller**

> php artisan crud:controller Todo

**--- Important ---**

Cette version permet uniquement de réaliser un crud dans le model n'a aucne dépedance

**--- Reste à faire ---**

Formulaire avec création de input de type :
integer | boolean | enum | foreign_key

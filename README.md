# laravel CRUD
create a crud system quickly with laravel 7

Create Crud System V0.1

Le dossier Console contient des dossier et fichiers qui permettent d'enclancher
différente commandes pour réaliser un système de crud rapidement.

// Installation
Si votre dossier Console de Laravel est vierge alors copier/coller
les dossiers Commands, Skeletons et le fichier Kernel dans votre dossier app\Console de Laravel

// Utilisation pour la view (Exemple comme model Todo)
- Créer un fichier index.blade.php
> php artisan crud:index Todo

- Créer un fichier show.blade.php
> php artisan crud:show Todo

- Créer un fichier edit.blade.php
> php artisan crud:edit Todo

- Créer un fichier create.blade.php
> php artisan crud:create Todo

// Utilisation pour le controller
> php artisan crud:controller Todo

--- Important ---

Cette version permet uniquement de réaliser un crud dans le model n'a aucne dépedance

--- Reste à faire ---

Formulaire avec création de input de type :
integer | boolean | enum | foreign_key

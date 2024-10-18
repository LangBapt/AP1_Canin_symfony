# Caninéo - Application de gestion des avis et des prestations

Table des matières

    Introduction
    Fonctionnalités
    Prérequis
    Installation
    Utilisation
    Tests

## Introduction

Canineo est une application Symfony permettant de gérer des prestations de dressage canin ainsi que les avis des clients. L'application inclut des fonctionnalités pour les utilisateurs et les administrateurs. Les utilisateurs peuvent consulter et laisser des avis, tandis que les administrateurs peuvent gérer les prestations et les avis, avec des options d'ajout, de modification, et de suppression.
Fonctionnalités

    Ajout et gestion des avis des utilisateurs.
    Envoie par un utilisateur d'un formulaire de contact
    Modification de la présentation par l'administrateur
    Ajout, Suppression et Modification des prestations par l'administrateur
    Authentification et gestion des rôles (ROLE_USER, ROLE_ADMIN).
    Interface utilisateur responsive pour consulter les prestations et laisser des avis.

## Prérequis

Avant d'installer ce projet, assurez-vous d'avoir les éléments suivants :

    PHP 8.x
    Composer
    Symfony CLI
    MySQL (ou autre base de données compatible)

## Installation

Suivez les étapes ci-dessous pour installer et configurer le projet localement :

    Clonez ce dépôt sur votre machine locale :

git clone https://github.com/username/canineo.git

Accédez au répertoire du projet :

    cd AP1_Canin_Symfony

Installez les dépendances du projet avec Composer :

    composer install

Configurez votre base de données dans le fichier .env :

    DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name"

Exécutez les migrations pour créer les tables de la base de données :

    php bin/console doctrine:migrations:migrate

Lancez le serveur de développement Symfony :

    symfony server:start

Votre application est maintenant disponible sur http://localhost:8000.
Utilisation
En tant qu'utilisateur :

    Accédez à la page des prestations pour consulter les offres de dressage canin.
    Laissez un avis après vous être inscrit et connecté.
    Laissez un formulaire de contact pour obtenir un rendez-vous pour votre compagnon canin.

En tant qu'administrateur :

    Accédez à l'interface d'administration pour ajouter, modifier ou supprimer des prestations.
    Gérez les avis laissés par les utilisateurs.
    Visualiser les demandes de contact des utilisateurs.
    Modifier la présentation de l'activité de l'entreprise.

## Contribution

Les contributions sont les bienvenues ! Pour contribuer :

    Forkez le projet.
    Créez une branche pour votre fonctionnalité (git checkout -b feature/nouvelle-fonctionnalite).
    Commitez vos modifications (git commit -am 'Ajout d'une nouvelle fonctionnalité').
    Poussez vos modifications (git push origin feature/nouvelle-fonctionnalite).
    Ouvrez une Pull Request.

## Support

Si vous avez des questions ou avez besoin de support, veuillez ouvrir une issue.

php bin/phpunit

## Licence

Le contenu et le code source de ce site sont la propriété exclusive de Caninéo. Tous droits réservés.

Aucune partie de ce site, y compris le texte, les images, les fichiers, ou le code source, ne peut être reproduite, distribuée, ou utilisée à des fins commerciales sans l'autorisation écrite préalable de Caninéo.

L'utilisation de ce site est soumise aux conditions générales définies par Caninéo. Toute tentative d'infraction aux droits de propriété intellectuelle entraînera des poursuites conformément à la législation en vigueur.

Pour toute demande concernant l'utilisation de ce site ou l'obtention de droits d'utilisation, veuillez contacter Caninéo

## Contributeurs :

@TheoL05
@MrCostaud
@LangBapt

## Accès à l'application :

Compte Admin :
    login : admin@gmail.com;
    mdp : admin123;

Compte Utilisateur :
    login : user@gmail.com
    mdp : user123;

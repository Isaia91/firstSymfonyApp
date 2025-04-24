# Avengers - First Symfony App

## Description

Bienvenue sur **Avengers**, une première application développée avec le framework Symfony. Ce projet a été conçu pour découvrir et explorer les fonctionnalités de Symfony tout en mettant en œuvre une interface utilisateur simple grâce à Bootstrap.

## Fonctionnalités

- Gestion de la langue avec un système de changement de locale.
- Utilisation des sessions pour mémoriser les préférences utilisateur.
- Architecture MVC avec Symfony.
- Intégration d'une base de données MySQL.

## Technologies utilisées

- **Symfony** : Framework PHP pour le développement web.
- **Bootstrap** : Framework CSS pour le design et la mise en page.
- **MySQL** : Base de données relationnelle.

## Base de données

L'application utilise une base de données MySQL pour stocker les données nécessaires. Assurez-vous d'avoir une instance MySQL fonctionnelle pour connecter l'application.

## Auteur

Ce projet a été réalisé dans le cadre d'une exploration du framework Symfony

## Données
Le projet utilise des données fictives pour illustrer les fonctionnalités. Vous pouvez personnaliser ces données selon vos besoins.
Vous pouvez lancer la commande suivante pour générer des données fictives :

```bash
php bin/console doctrine:fixtures:load
```
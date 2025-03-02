-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 27 fév. 2025 à 08:19
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12
DROP DATABASE IF EXISTS avengers_maperi_isaia;
CREATE DATABASE IF NOT EXISTS avengers_maperi_isaia;
USE avengers_maperi_isaia;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `avengers_maperi_isaia`
--

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `author`
--

INSERT INTO `author` (`id`, `nom`, `prenom`, `date_creation`) VALUES
(1, 'Marc ', 'Aurèle ', '2025-02-26 19:45:56'),
(2, 'Herman', 'Hess', '2025-02-26 19:46:22'),
(3, 'Fiodor ', 'Dostoïevski', '2025-02-26 19:46:40'),
(4, 'Franz ', 'Kafka', '2025-02-26 19:47:10');

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `titre` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id`, `author_id`, `titre`, `date_creation`) VALUES
(4, 4, 'La méthamorphose', '2025-02-26 19:47:39'),
(5, 1, 'Pensées pour moi même', '2025-02-26 19:48:00'),
(6, 2, 'Le loup des steppes', '2025-02-26 19:48:19'),
(7, 3, 'Le rêve d\'un homme ridicule', '2025-02-26 19:49:16');

-- --------------------------------------------------------

--
-- Structure de la table `book_mark`
--

CREATE TABLE `book_mark` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL,
  `commentaire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `book_mark`
--

INSERT INTO `book_mark` (`id`, `url`, `date_creation`, `commentaire`) VALUES
(1, 'https://www.ironman.com', '2025-02-26 09:30:00', 'Official Iron Man website'),
(2, 'https://www.hulk.com', '2025-02-26 09:35:00', 'Learn about Hulk'),
(3, 'https://www.captainamerica.com', '2025-02-26 09:40:00', 'Discover Captain America history');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `heading_id` int(11) DEFAULT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `heading_id`, `nom`) VALUES
(1, 1, 'Faunes'),
(2, 1, 'Flores');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20250226083758', '2025-02-26 08:38:04', 556);

-- --------------------------------------------------------

--
-- Structure de la table `heading`
--

CREATE TABLE `heading` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `heading`
--

INSERT INTO `heading` (`id`, `nom`, `date_creation`) VALUES
(1, 'Cailloux', '2025-02-26 19:51:56');

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `lien` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`id`, `category_id`, `nom`, `lien`, `description`) VALUES
(7, 1, 'Correlophus sarasinorum', 'faunes/gecko.jpeg', 'Un gecko de grande taille, mesurant 135 mm de long, avec une queue de longueur similaire. Ses orteils sont modérés, son dos présente un brun pâle à sombre, des marques en V claires sur la nuque et des taches pâles de chaque côté du dos.'),
(8, 1, 'Trichoglossus haematodus deplanchei', 'faunes/perruche.jpeg', 'Cet oiseau de 25 cm, à tête violette, gorge rouge et corps vert, avec un bec crochu, vit en bandes bruyantes dans les forêts. Il se nourrit de fleurs et fruits, niche dans des troncs creux et se reproduit de mai à juillet et novembre à décembre.'),
(9, 1, 'Rhynochetos jubatus', 'faunes/cagou.jpg', 'Oiseau blanc de 50-60 cm au bec jaune, inapte au vol, vivant en forêt dense. Niche de mai à décembre avec un œuf tacheté, incubation de 34-35 jours. Se nourrit de vers, insectes, reptiles. Environ 1000 individus en Nouvelle-Calédonie, classé \"En danger\".'),
(10, 1, 'Pseudanthias cooperi', 'faunes/pseudanthiasCooperi.jpeg', 'Le Pseudanthias cooperi, ou \"Anthias de Cooper\", est un poisson marin coloré de la famille des Serranidae. Il vit principalement dans les récifs coralliens tropicaux de l\'Indo-Pacifique, notamment autour de l\'Australie, et est prisé en aquariophilie.'),
(20, 2, 'Graptophyllum macrostemon', 'flores/graptophyllumMacrostemon.jpg', 'Arbuste de 1 m, peu ramifié, corolle rose, étamines de 4,5 cm, feuilles obovales, glabres, pétiole de 10-18 mm.'),
(21, 2, 'Vitex rotundifolia', 'flores/vitexRotundifolia.jpg', 'Arbrisseau avec des tiges rampantes pouvant s\'enraciner au contact du sol.'),
(22, 2, 'Stenocarpus umbelliferus', 'flores/stenocarpusUmbelliferus.jpeg', 'Arbrisseau prostré ou élancé atteignant 5 m, avec rameaux aplatis jeunes et arrondis âgés, écorce brunâtre fendue.'),
(23, 2, 'Tapeinosperma psaladense', 'flores/tapeinospermaPsaladense.jpeg', 'Arbuste buissonnant, feuilles petites à moyennes, subelliptiques à spathulées. Pétiole court, parfois distinct. Inflorescences terminales, 2 fois ramifiées, fleurs blanches, axe non verruqueux.');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tag`
--

INSERT INTO `tag` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Sci-Fi');

-- --------------------------------------------------------

--
-- Structure de la table `tag_book_mark`
--

CREATE TABLE `tag_book_mark` (
  `tag_id` int(11) NOT NULL,
  `book_mark_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tag_book_mark`
--

INSERT INTO `tag_book_mark` (`tag_id`, `book_mark_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CBE5A331F675F31B` (`author_id`);

--
-- Index pour la table `book_mark`
--
ALTER TABLE `book_mark`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_64C19C162FE64EC` (`heading_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `heading`
--
ALTER TABLE `heading`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6A2CA10C12469DE2` (`category_id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tag_book_mark`
--
ALTER TABLE `tag_book_mark`
  ADD PRIMARY KEY (`tag_id`,`book_mark_id`),
  ADD KEY `IDX_6EDE835EBAD26311` (`tag_id`),
  ADD KEY `IDX_6EDE835ED1B0D9BD` (`book_mark_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `book_mark`
--
ALTER TABLE `book_mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `heading`
--
ALTER TABLE `heading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `FK_CBE5A331F675F31B` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`);

--
-- Contraintes pour la table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `FK_64C19C162FE64EC` FOREIGN KEY (`heading_id`) REFERENCES `heading` (`id`);

--
-- Contraintes pour la table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `FK_6A2CA10C12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `tag_book_mark`
--
ALTER TABLE `tag_book_mark`
  ADD CONSTRAINT `FK_6EDE835EBAD26311` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_6EDE835ED1B0D9BD` FOREIGN KEY (`book_mark_id`) REFERENCES `book_mark` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

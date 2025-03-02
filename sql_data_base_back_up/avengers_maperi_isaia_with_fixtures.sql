-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 02 mars 2025 à 09:30
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

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
(4, 'Franz ', 'Kafka', '2025-02-26 19:47:10'),
(40, 'Pinto', 'Gabrielle', '2025-03-02 03:55:29'),
(41, 'Tanguy', 'Marcelle', '2025-03-02 03:55:29'),
(42, 'Guerin', 'Julie', '2025-03-02 03:55:29'),
(43, 'Picard', 'Daniel', '2025-03-02 03:55:29'),
(44, 'Lopez', 'Marcel', '2025-03-02 03:55:29');

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
(7, 3, 'Le rêve dun homme ridicule', '2025-02-26 19:49:16'),
(43, 1, 'Repudiandae aut omnis aut.', '2025-03-02 03:55:29'),
(44, 40, 'Non ipsum dicta et.', '2025-03-02 03:55:29'),
(45, 43, 'Est esse cum.', '2025-03-02 03:55:29'),
(46, 1, 'Voluptatum sint explicabo.', '2025-03-02 03:55:29'),
(47, 2, 'Suscipit repudiandae dolorem.', '2025-03-02 03:55:29');

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
(3, 'https://www.captainamerica.com', '2025-02-26 09:40:00', 'Discover Captain America history'),
(39, 'http://vallet.net/delectus-laudantium-id-quod-numquam-recusandae', '2025-03-02 03:55:29', 'Illum veritatis natus distinctio non qui voluptate. Officia sed provident voluptates sequi vel. Eveniet consequuntur quae delectus sit aspernatur quos eligendi maiores.'),
(40, 'http://aubert.fr/consequatur-incidunt-est-illo-laborum-minus-quos-quas-est', '2025-03-02 03:55:29', 'Voluptate assumenda magni magnam iure odio omnis beatae. Et tempora ab beatae quas. Ullam tempora aperiam veniam inventore quo blanditiis id voluptatem.'),
(41, 'http://www.bouchet.fr/aspernatur-sed-numquam-sint-est', '2025-03-02 03:55:29', 'Hic magnam voluptatum rerum perferendis tempore architecto. Eum ut minus laborum eligendi dolores in.'),
(42, 'http://www.rousset.com/laboriosam-eos-molestias-aperiam-nemo-voluptates-qui.html', '2025-03-02 03:55:29', 'Aut soluta blanditiis aliquam quam et voluptatem laudantium. Et dolorem quaerat inventore et pariatur.'),
(43, 'http://jean.fr/quia-explicabo-doloribus-ut', '2025-03-02 03:55:29', 'Vel nostrum similique et ipsum quia porro sit. Reprehenderit eos consequatur tempora debitis incidunt consequuntur labore. Consequatur animi soluta illo delectus quod illum.'),
(44, 'https://www.fontaine.org/aut-quo-eveniet-quo-harum', '2025-03-02 03:55:29', 'Perferendis dolorem nam voluptatem molestiae repudiandae qui pariatur commodi. Voluptas tenetur aut sequi exercitationem sed. Cumque nobis voluptas natus.'),
(45, 'https://www.leduc.fr/non-qui-architecto-delectus-corrupti', '2025-03-02 03:55:29', 'Architecto et quidem non ea accusantium ipsam voluptatem praesentium. Molestiae ea possimus sunt harum.'),
(46, 'http://www.clement.net/ipsam-placeat-et-quo-inventore-error.html', '2025-03-02 03:55:29', 'Veritatis et ut omnis repellendus officia totam. Sint dicta fugiat temporibus autem. Possimus tenetur voluptas sunt occaecati modi neque.'),
(47, 'http://moreno.com/rem-sed-quo-repellat-iure-saepe-dicta-molestiae-excepturi', '2025-03-02 03:55:29', 'Aperiam nihil est voluptas deleniti pariatur enim. Molestias repellendus rerum impedit deserunt sint.'),
(48, 'https://gallet.fr/ut-labore-nesciunt-sapiente-suscipit.html', '2025-03-02 03:55:29', 'Placeat voluptatem quas quam rerum. Velit dolores error odio alias. Enim inventore adipisci vitae rerum asperiores.'),
(49, 'https://www.mallet.fr/asperiores-dolores-doloribus-unde-quia-illo-cupiditate', '2025-03-02 03:55:29', 'Aut quas amet quibusdam ad. Mollitia libero natus voluptas quis enim. Explicabo architecto ut sint.'),
(50, 'http://joly.fr/quisquam-deleniti-voluptatem-quam-sint-nulla-blanditiis-natus-quidem', '2025-03-02 03:55:29', 'Velit et quia labore eaque quo. Quod quis deleniti voluptates aut.'),
(51, 'http://rodrigues.fr/in-et-quod-dolores-nisi', '2025-03-02 03:55:29', 'Velit neque quo aperiam doloremque ullam. Molestiae qui et tenetur qui et voluptatem.'),
(52, 'http://www.besson.net/aut-qui-ipsam-quasi-autem-deleniti-at.html', '2025-03-02 03:55:29', 'Dolorem nam non ut. Dolor non amet impedit nesciunt culpa architecto. Alias similique et minima incidunt adipisci quam.'),
(53, 'http://perez.com/quasi-saepe-nihil-consequatur-animi-aperiam', '2025-03-02 03:55:29', 'Ut ex deserunt dolorum sequi quis non nostrum aut. Vitae vero amet aut.'),
(54, 'http://www.grondin.fr/quia-quis-est-omnis-eius-delectus.html', '2025-03-02 03:55:29', 'Maiores voluptatibus amet quasi quo amet asperiores. Cum omnis magnam ut aut rem.'),
(55, 'http://bernier.com/distinctio-unde-sunt-et', '2025-03-02 03:55:29', 'Molestiae omnis vel dolorem quo. Repellat velit sed aspernatur est nulla eligendi et.'),
(56, 'http://www.guerin.com/voluptas-et-incidunt-corrupti', '2025-03-02 03:55:29', 'Nulla harum dolor sint quia. Beatae qui quasi quidem omnis velit ut vel. A dicta minus tenetur quia.'),
(57, 'http://olivier.net/', '2025-03-02 03:55:29', 'Et non molestiae vel est sit perferendis consequuntur. Modi at et perspiciatis consectetur officia et.'),
(58, 'http://www.besnard.com/dolorem-voluptatibus-ut-atque-similique-quia', '2025-03-02 03:55:29', 'Dicta magni est non sit repudiandae praesentium. Consequatur non molestias voluptate quia sint dicta aut.'),
(59, 'http://leblanc.com/omnis-dolor-eos-omnis-tenetur-ea-rem', '2025-03-02 03:55:29', 'Occaecati enim rerum reiciendis amet quia ratione. Quia quis cum occaecati quaerat.'),
(60, 'http://www.leroux.com/enim-rem-ipsam-ipsam-sequi-officiis.html', '2025-03-02 03:55:29', 'Nemo porro qui tenetur dolorem autem et qui. Quia et laborum quia ducimus.'),
(61, 'http://www.reynaud.org/', '2025-03-02 03:55:29', 'Veniam quis deleniti esse deserunt possimus. Quidem laudantium tempora et iusto.'),
(62, 'http://www.langlois.fr/', '2025-03-02 03:55:29', 'Vel ea molestiae quis est. Reprehenderit corporis autem illo dolore natus quo.'),
(63, 'http://morin.org/beatae-inventore-et-dolorem.html', '2025-03-02 03:55:29', 'Similique consequatur molestiae dignissimos molestiae deserunt illum atque. Deserunt exercitationem odio et et dolorem. Omnis rerum nesciunt provident sapiente aut voluptas.');

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
(2, 1, 'Flores'),
(23, 31, 'recusandae'),
(24, 29, 'qui'),
(25, 30, 'voluptatem'),
(26, 29, 'ea'),
(27, 30, 'aliquid');

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
('DoctrineMigrations\\Version20250226083758', '2025-03-01 23:06:45', 3111);

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
(1, 'Cailloux', '2025-02-26 19:51:56'),
(27, 'qui', '2025-03-02 03:55:29'),
(28, 'amet', '2025-03-02 03:55:29'),
(29, 'culpa', '2025-03-02 03:55:29'),
(30, 'nemo', '2025-03-02 03:55:29'),
(31, 'doloremque', '2025-03-02 03:55:29');

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
(23, 2, 'Tapeinosperma psaladense', 'flores/tapeinospermaPsaladense.jpeg', 'Arbuste buissonnant, feuilles petites à moyennes, subelliptiques à spathulées. Pétiole court, parfois distinct. Inflorescences terminales, 2 fois ramifiées, fleurs blanches, axe non verruqueux.'),
(44, 25, 'quia', 'http://www.duval.com/provident-qui-ad-optio-id-nihil-voluptate', 'Non qui quod eaque quia provident. Vel ex perspiciatis veniam. Aut sunt facilis a quasi.'),
(45, 24, 'delectus', 'http://fouquet.com/accusantium-ipsam-temporibus-earum-nulla-reiciendis', 'In omnis enim aut accusantium minima excepturi enim. Quaerat impedit earum praesentium esse vitae. Hic soluta quam molestiae id dicta labore dolor.'),
(46, 26, 'similique', 'http://vasseur.com/similique-et-mollitia-animi-soluta-minus-voluptas', 'Similique eaque doloribus ullam. Aliquid quidem provident autem magni dolores.'),
(47, 27, 'aut', 'http://www.fernandes.org/necessitatibus-vel-aliquid-ut-quo-quia-ut-laudantium', 'Quasi facere et ullam enim blanditiis. Vel enim quasi tempora non reiciendis similique quibusdam.'),
(48, 1, 'voluptatem', 'https://tanguy.fr/facilis-iste-laudantium-minima-pariatur-ad-sequi.html', 'Qui adipisci quis perspiciatis enim rem accusamus similique voluptatum. Officia dicta voluptatibus qui aperiam.');

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
(3, 'Sci-Fi'),
(49, 'explicabo'),
(50, 'rerum'),
(51, 'modi'),
(52, 'tempora'),
(53, 'sed');

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
(1, 39),
(1, 41),
(1, 44),
(1, 48),
(1, 49),
(1, 52),
(1, 59),
(1, 62),
(2, 39),
(2, 40),
(2, 43),
(2, 45),
(2, 48),
(2, 51),
(2, 56),
(2, 57),
(2, 60),
(3, 1),
(3, 41),
(3, 42),
(3, 47),
(3, 48),
(3, 52),
(3, 53),
(3, 55),
(3, 56),
(3, 59),
(3, 62),
(3, 63),
(49, 1),
(49, 2),
(49, 40),
(49, 44),
(49, 45),
(49, 47),
(49, 48),
(49, 49),
(49, 51),
(49, 52),
(49, 53),
(49, 54),
(49, 57),
(49, 58),
(49, 59),
(49, 62),
(50, 1),
(50, 39),
(50, 40),
(50, 41),
(50, 43),
(50, 44),
(50, 45),
(50, 49),
(50, 52),
(50, 55),
(50, 56),
(50, 57),
(50, 58),
(50, 59),
(50, 60),
(50, 62),
(51, 3),
(51, 39),
(51, 40),
(51, 41),
(51, 46),
(51, 47),
(51, 49),
(51, 50),
(51, 55),
(51, 57),
(51, 60),
(51, 61),
(52, 2),
(52, 41),
(52, 42),
(52, 43),
(52, 44),
(52, 46),
(52, 47),
(52, 48),
(52, 51),
(52, 53),
(52, 57),
(52, 58),
(52, 60),
(52, 61),
(52, 62),
(52, 63),
(53, 2),
(53, 3),
(53, 39),
(53, 40),
(53, 50),
(53, 51),
(53, 54),
(53, 56);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `book_mark`
--
ALTER TABLE `book_mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `heading`
--
ALTER TABLE `heading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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

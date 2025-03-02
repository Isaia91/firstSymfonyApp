USE avengers_maperi_isaia;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


INSERT INTO `author` (`id`, `nom`, `prenom`, `date_creation`) VALUES
                                                                  (1, 'Marc ', 'Aurèle ', '2025-02-26 19:45:56'),
                                                                  (2, 'Herman', 'Hess', '2025-02-26 19:46:22'),
                                                                  (3, 'Fiodor ', 'Dostoïevski', '2025-02-26 19:46:40'),
                                                                  (4, 'Franz ', 'Kafka', '2025-02-26 19:47:10');

INSERT INTO `book` (`id`, `author_id`, `titre`, `date_creation`) VALUES
                                                                     (4, 4, 'La méthamorphose', '2025-02-26 19:47:39'),
                                                                     (5, 1, 'Pensées pour moi même', '2025-02-26 19:48:00'),
                                                                     (6, 2, 'Le loup des steppes', '2025-02-26 19:48:19'),
                                                                     (7, 3, 'Le rêve dun homme ridicule', '2025-02-26 19:49:16');

INSERT INTO `book_mark` (`id`, `url`, `date_creation`, `commentaire`) VALUES
                                                                          (1, 'https://www.ironman.com', '2025-02-26 09:30:00', 'Official Iron Man website'),
                                                                          (2, 'https://www.hulk.com', '2025-02-26 09:35:00', 'Learn about Hulk'),
                                                                          (3, 'https://www.captainamerica.com', '2025-02-26 09:40:00', 'Discover Captain America history');

INSERT INTO `heading` (`id`, `nom`, `date_creation`) VALUES
    (1, 'Cailloux', '2025-02-26 19:51:56');

INSERT INTO `category` (`id`, `heading_id`, `nom`) VALUES
                                                       (1, 1, 'Faunes'),
                                                       (2, 1, 'Flores');

INSERT INTO `media` (`id`, `category_id`, `nom`, `lien`, `description`) VALUES
                                                                            (7, 1, 'Correlophus sarasinorum', 'faunes/gecko.jpeg', 'Un gecko de grande taille, mesurant 135 mm de long, avec une queue de longueur similaire. Ses orteils sont modérés, son dos présente un brun pâle à sombre, des marques en V claires sur la nuque et des taches pâles de chaque côté du dos.'),
                                                                            (8, 1, 'Trichoglossus haematodus deplanchei', 'faunes/perruche.jpeg', 'Cet oiseau de 25 cm, à tête violette, gorge rouge et corps vert, avec un bec crochu, vit en bandes bruyantes dans les forêts. Il se nourrit de fleurs et fruits, niche dans des troncs creux et se reproduit de mai à juillet et novembre à décembre.'),
                                                                            (9, 1, 'Rhynochetos jubatus', 'faunes/cagou.jpg', 'Oiseau blanc de 50-60 cm au bec jaune, inapte au vol, vivant en forêt dense. Niche de mai à décembre avec un œuf tacheté, incubation de 34-35 jours. Se nourrit de vers, insectes, reptiles. Environ 1000 individus en Nouvelle-Calédonie, classé \"En danger\".'),
                                                                            (10, 1, 'Pseudanthias cooperi', 'faunes/pseudanthiasCooperi.jpeg', 'Le Pseudanthias cooperi, ou \"Anthias de Cooper\", est un poisson marin coloré de la famille des Serranidae. Il vit principalement dans les récifs coralliens tropicaux de l\'Indo-Pacifique, notamment autour de l\'Australie, et est prisé en aquariophilie.'),
                                                                            (20, 2, 'Graptophyllum macrostemon', 'flores/graptophyllumMacrostemon.jpg', 'Arbuste de 1 m, peu ramifié, corolle rose, étamines de 4,5 cm, feuilles obovales, glabres, pétiole de 10-18 mm.'),
                                                                            (21, 2, 'Vitex rotundifolia', 'flores/vitexRotundifolia.jpg', 'Arbrisseau avec des tiges rampantes pouvant s\'enraciner au contact du sol.'),
                                                                            (22, 2, 'Stenocarpus umbelliferus', 'flores/stenocarpusUmbelliferus.jpeg', 'Arbrisseau prostré ou élancé atteignant 5 m, avec rameaux aplatis jeunes et arrondis âgés, écorce brunâtre fendue.'),
                                                                            (23, 2, 'Tapeinosperma psaladense', 'flores/tapeinospermaPsaladense.jpeg', 'Arbuste buissonnant, feuilles petites à moyennes, subelliptiques à spathulées. Pétiole court, parfois distinct. Inflorescences terminales, 2 fois ramifiées, fleurs blanches, axe non verruqueux.');


INSERT INTO `tag` (`id`, `name`) VALUES
                                     (1, 'Action'),
                                     (2, 'Adventure'),
                                     (3, 'Sci-Fi');

INSERT INTO `tag_book_mark` (`tag_id`, `book_mark_id`) VALUES
                                                           (1, 1),
                                                           (2, 2),
                                                           (3, 3);
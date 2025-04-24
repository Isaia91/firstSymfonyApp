DELETE FROM media;
DELETE FROM category;
DELETE FROM heading;

ALTER TABLE heading AUTO_INCREMENT = 1;
ALTER TABLE category AUTO_INCREMENT = 1;
ALTER TABLE media AUTO_INCREMENT = 1;

INSERT INTO heading (nom, date_creation) VALUES ('Cailloux', NOW());

INSERT INTO category (heading_id, nom) VALUES (1, 'Faunes');
INSERT INTO category (heading_id, nom) VALUES (1, 'Flores');

INSERT INTO media (category_id, nom, lien, description) VALUES
                                                            (1, 'Correlophus sarasinorum', 'faunes/gecko.jpeg', 'Un gecko de grande taille, mesurant 135 mm de long, avec une queue de longueur similaire. Ses orteils sont modérés, son dos présente un brun pâle à sombre, des marques en V claires sur la nuque et des taches pâles de chaque côté du dos.'),
                                                            (1, 'Trichoglossus haematodus deplanchei', 'faunes/perruche.jpeg', 'Cet oiseau de 25 cm, à tête violette, gorge rouge et corps vert, avec un bec crochu, vit en bandes bruyantes dans les forêts. Il se nourrit de fleurs et fruits, niche dans des troncs creux et se reproduit de mai à juillet et novembre à décembre.'),
                                                            (1, 'Rhynochetos jubatus', 'faunes/cagou.jpg', 'Oiseau blanc de 50-60 cm au bec jaune, inapte au vol, vivant en forêt dense. Niche de mai à décembre avec un œuf tacheté, incubation de 34-35 jours. Se nourrit de vers, insectes, reptiles. Environ 1000 individus en Nouvelle-Calédonie, classé "En danger".'),
                                                            (1, 'Pseudanthias cooperi', 'faunes/pseudanthiasCooperi.jpeg', 'Le Pseudanthias cooperi, ou "Anthias de Cooper", est un poisson marin coloré de la famille des Serranidae. Il vit principalement dans les récifs coralliens tropicaux de l\'Indo-Pacifique, notamment autour de l\'Australie, et est prisé en aquariophilie.'),
                                                            (2, 'Graptophyllum macrostemon', 'flores/graptophyllumMacrostemon.jpg', 'Arbuste de 1 m, peu ramifié, corolle rose, étamines de 4,5 cm, feuilles obovales, glabres, pétiole de 10-18 mm.'),
                                                            (2, 'Vitex rotundifolia', 'flores/vitexRotundifolia.jpg', 'Arbrisseau avec des tiges rampantes pouvant s\'enraciner au contact du sol.'),
                                                            (2, 'Stenocarpus umbelliferus', 'flores/stenocarpusUmbelliferus.jpeg', 'Arbrisseau prostré ou élancé atteignant 5 m, avec rameaux aplatis jeunes et arrondis âgés, écorce brunâtre fendue.'),
                                                            (2, 'Tapeinosperma psaladense', 'flores/tapeinospermaPsaladense.jpeg', 'Arbuste buissonnant, feuilles petites à moyennes, subelliptiques à spathulées. Pétiole court, parfois distinct. Inflorescences terminales, 2 fois ramifiées, fleurs blanches, axe non verruqueux.');
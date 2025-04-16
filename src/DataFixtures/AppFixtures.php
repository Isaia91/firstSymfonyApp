<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\BookMark;
use App\Entity\Category;
use App\Entity\Heading;
use App\Entity\Media;
use App\Entity\Tag;
use App\Repository\AuthorRepository;
use App\Repository\BookMarkRepository;
use App\Repository\CategoryRepository;
use App\Repository\HeadingRepository;
use App\Repository\TagRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    private $authorRepository;
    private $headingRepository;
    private $tagRepository;
    private $bookmarkRepository;
    private $categoryRepository;

    public function __construct(
        AuthorRepository $authorRepository,
        HeadingRepository $headingRepository,
        TagRepository $tagRepository,
        BookmarkRepository $bookmarkRepository,
        CategoryRepository $categoryRepository
    ) {
        $this->authorRepository = $authorRepository;
        $this->headingRepository = $headingRepository;
        $this->tagRepository = $tagRepository;
        $this->bookmarkRepository = $bookmarkRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        // Création des auteurs
        for ($i = 0; $i < 5; $i++) {
            $author = new Author();
            $author->setNom($faker->lastName);
            $author->setPrenom($faker->firstName);
            $author->setDateCreation(new \DateTime());

            $manager->persist($author);
        }
        $manager->flush();

        // Récupération des auteurs existants
        $authors = $this->authorRepository->findAll();

        // Création des livres
        for ($i = 0; $i < 5; $i++) {
            $book = new Book();
            $book->setTitre($faker->sentence(3));
            $book->setDateCreation(new \DateTime());

            $book->setAuthor($authors[array_rand($authors)]);
            $manager->persist($book);
        }
        $manager->flush();

        // Création des bookmarks
        for ($i = 0; $i < 25; $i++) {
            $bookmark = new Bookmark();
            $bookmark->setUrl($faker->url());
            $bookmark->setDateCreation(new \DateTime());
            $bookmark->setCommentaire($faker->paragraph(2));

            $manager->persist($bookmark);
        }
        $manager->flush();

        // Création du heading
        $heading = new Heading();
        $heading->setNom('Cailloux');
        $heading->setDateCreation(new \DateTime());
        $manager->persist($heading);
        $manager->flush();

        // Récupération des headings existants
        $headings = $this->headingRepository->findAll();

        // Création des catégories
        $faunes = new Category();
        $faunes->setNom('Faunes');
        $faunes->setHeading($heading);
        $manager->persist($faunes);
        $flores = new Category();
        $flores->setNom('Flores');
        $flores->setHeading($heading);
        $manager->persist($flores);
        $manager->flush();

        // Création des tags
        for ($i = 0; $i < 5; $i++) {
            $tag = new Tag();
            $tag->setName($faker->word());

            $manager->persist($tag);
        }
        $manager->flush();

        // Récupération des tags et bookmarks existants
        $tags = $this->tagRepository->findAll();
        $bookmarks = $this->bookmarkRepository->findAll();

        // Association Tags/BookMarks
        foreach ($bookmarks as $bookmark) {
            $randomTags = $faker->randomElements($tags, rand(2, 5)); // 2 à 5 tags par bookmark
            foreach ($randomTags as $tag) {
                $bookmark->addTag($tag);
            }
            $manager->persist($bookmark);
        }

        // Création des médias
        $categories = $this->categoryRepository->findAll();
        $mediaData = [
            [$faunes, 'Correlophus sarasinorum', 'faunes/gecko.jpeg', 'Un gecko de grande taille, mesurant 135 mm de long, avec une queue de longueur similaire. Ses orteils sont modérés, son dos présente un brun pâle à sombre, des marques en V claires sur la nuque et des taches pâles de chaque côté du dos.'],
            [$faunes, 'Trichoglossus haematodus deplanchei', 'faunes/perruche.jpeg', 'Cet oiseau de 25 cm, à tête violette, gorge rouge et corps vert, avec un bec crochu, vit en bandes bruyantes dans les forêts. Il se nourrit de fleurs et fruits, niche dans des troncs creux et se reproduit de mai à juillet et novembre à décembre.'],
            [$faunes, 'Rhynochetos jubatus', 'faunes/cagou.jpg', 'Oiseau blanc de 50-60 cm au bec jaune, inapte au vol, vivant en forêt dense. Niche de mai à décembre avec un œuf tacheté, incubation de 34-35 jours. Se nourrit de vers, insectes, reptiles. Environ 1000 individus en Nouvelle-Calédonie, classé "En danger".'],
            [$faunes, 'Pseudanthias cooperi', 'faunes/pseudanthiasCooperi.jpeg', 'Le Pseudanthias cooperi, ou "Anthias de Cooper", est un poisson marin coloré de la famille des Serranidae. Il vit principalement dans les récifs coralliens tropicaux de l\'Indo-Pacifique, notamment autour de l\'Australie, et est prisé en aquariophilie.'],

            [$flores, 'Graptophyllum macrostemon', 'flores/graptophyllumMacrostemon.jpg', 'Arbuste de 1 m, peu ramifié, corolle rose, étamines de 4,5 cm, feuilles obovales, glabres, pétiole de 10-18 mm.'],
            [$flores, 'Vitex rotundifolia', 'flores/vitexRotundifolia.jpg', 'Arbrisseau avec des tiges rampantes pouvant s\'enraciner au contact du sol.'],
            [$flores, 'Stenocarpus umbelliferus', 'flores/stenocarpusUmbelliferus.jpeg', 'Arbrisseau prostré ou élancé atteignant 5 m, avec rameaux aplatis jeunes et arrondis âgés, écorce brunâtre fendue.'],
            [$flores, 'Tapeinosperma psaladense', 'flores/tapeinospermaPsaladense.jpeg', 'Arbuste buissonnant, feuilles petites à moyennes, subelliptiques à spathulées. Pétiole court, parfois distinct. Inflorescences terminales, 2 fois ramifiées, fleurs blanches, axe non verruqueux.']
        ];

        foreach ($mediaData as [$category, $nom, $lien, $description]) {
            $media = new Media();
            $media->setCategory($category);
            $media->setNom($nom);
            $media->setLien($lien);
            $media->setDescription($description);
            $manager->persist($media);
        }
        $manager->flush();
    }
}

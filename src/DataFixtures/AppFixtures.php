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

        // Création des headings
        for ($i = 0; $i < 5; $i++) {
            $heading = new Heading();
            $heading->setNom($faker->word());
            $heading->setDateCreation(new \DateTime());

            $manager->persist($heading);
        }
        $manager->flush();

        // Récupération des headings existants
        $headings = $this->headingRepository->findAll();

        // Création des catégories
        for ($i = 0; $i < 5; $i++) {
            $category = new Category();
            $category->setNom($faker->word());
            $category->setHeading($headings[array_rand($headings)]);

            $manager->persist($category);
        }
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
        for ($i = 0; $i < 5; $i++) {
            $media = new Media();
            $media->setNom($faker->word());
            $media->setLien($faker->url());
            $media->setDescription($faker->paragraph(2));

            $media->setCategory($categories[array_rand($categories)]);
            $manager->persist($media);
        }

        $manager->flush();
    }
}

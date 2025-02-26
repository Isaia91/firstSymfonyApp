<?php

namespace App\Entity;

use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TagRepository::class)]
class Tag
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, BookMark>
     */
    #[ORM\ManyToMany(targetEntity: BookMark::class, inversedBy: 'tags')]
    private Collection $bookmark;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    public function __construct()
    {
        $this->bookmark = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, BookMark>
     */
    public function getBookmark(): Collection
    {
        return $this->bookmark;
    }

    public function addBookmark(BookMark $bookmark): static
    {
        if (!$this->bookmark->contains($bookmark)) {
            $this->bookmark->add($bookmark);
        }

        return $this;
    }

    public function removeBookmark(BookMark $bookmark): static
    {
        $this->bookmark->removeElement($bookmark);

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}

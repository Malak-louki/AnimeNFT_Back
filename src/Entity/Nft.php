<?php

namespace App\Entity;

use App\Repository\NftRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NftRepository::class)]
class Nft
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $quantity = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateDrop = null;

    #[ORM\Column]
    private ?float $initialPrice = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isForSale = null;

    #[ORM\Column]
    private ?float $actualPrice = null;

    #[ORM\ManyToOne(inversedBy: 'nft')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'nfts')]
    private ?Image $image = null;

    #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: 'nfts')]
    private Collection $categories;

    #[ORM\ManyToOne(inversedBy: 'nfts')]
    private ?Eth $eth = null;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getDateDrop(): ?\DateTimeInterface
    {
        return $this->dateDrop;
    }

    public function setDateDrop(?\DateTimeInterface $dateDrop): static
    {
        $this->dateDrop = $dateDrop;

        return $this;
    }

    public function getInitialPrice(): ?float
    {
        return $this->initialPrice;
    }

    public function setInitialPrice(float $initialPrice): static
    {
        $this->initialPrice = $initialPrice;

        return $this;
    }

    public function isIsForSale(): ?bool
    {
        return $this->isForSale;
    }

    public function setIsForSale(?bool $isForSale): static
    {
        $this->isForSale = $isForSale;

        return $this;
    }

    public function getActualPrice(): ?float
    {
        return $this->actualPrice;
    }

    public function setActualPrice(float $actualPrice): static
    {
        $this->actualPrice = $actualPrice;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage(?Image $image): static
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): static
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
        }

        return $this;
    }

    public function removeCategory(Category $category): static
    {
        $this->categories->removeElement($category);

        return $this;
    }

    public function getEth(): ?Eth
    {
        return $this->eth;
    }

    public function setEth(?Eth $eth): static
    {
        $this->eth = $eth;

        return $this;
    }
}

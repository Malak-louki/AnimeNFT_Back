<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $imgName = null;

    #[ORM\Column(length: 255)]
    private ?string $imgURL = null;

    #[ORM\OneToMany(mappedBy: 'image', targetEntity: Nft::class)]
    private ?Collection $nfts = null;

    public function __construct()
    {
        $this->nfts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImgName(): ?string
    {
        return $this->imgName;
    }

    public function setImgName(string $imgName): static
    {
        $this->imgName = $imgName;

        return $this;
    }

    public function getImgURL(): ?string
    {
        return $this->imgURL;
    }

    public function setImgURL(string $imgURL): static
    {
        $this->imgURL = $imgURL;

        return $this;
    }

    /**
     * @return Collection<int, Nft>
     */
    public function getNfts(): Collection
    {
        return $this->nfts;
    }

    public function addNft(Nft $nft): static
    {
        if (!$this->nfts->contains($nft)) {
            $this->nfts->add($nft);
            $nft->setImage($this);
        }

        return $this;
    }

    public function removeNft(Nft $nft): static
    {
        if ($this->nfts->removeElement($nft)) {
            // set the owning side to null (unless already changed)
            if ($nft->getImage() === $this) {
                $nft->setImage(null);
            }
        }

        return $this;
    }
}

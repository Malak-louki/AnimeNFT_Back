<?php

namespace App\Entity;

use App\Repository\EthRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EthRepository::class)]
class Eth
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $ethPrice = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $day = null;

    #[ORM\OneToMany(mappedBy: 'eth', targetEntity: Nft::class)]
    private Collection $nft;

    public function __construct()
    {
        $this->nft = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEthPrice(): ?float
    {
        return $this->ethPrice;
    }

    public function setEthPrice(float $ethPrice): static
    {
        $this->ethPrice = $ethPrice;

        return $this;
    }

    public function getDay(): ?\DateTimeInterface
    {
        return $this->day;
    }

    public function setDay(\DateTimeInterface $day): static
    {
        $this->day = $day;

        return $this;
    }

    /**
     * @return Collection<int, Nft>
     */
    public function getNft(): Collection
    {
        return $this->nft;
    }

    public function addNft(Nft $nft): static
    {
        if (!$this->nft->contains($nft)) {
            $this->nft->add($nft);
            $nft->setEth($this);
        }

        return $this;
    }

    public function removeNft(Nft $nft): static
    {
        if ($this->nft->removeElement($nft)) {
            // set the owning side to null (unless already changed)
            if ($nft->getEth() === $this) {
                $nft->setEth(null);
            }
        }

        return $this;
    }
}

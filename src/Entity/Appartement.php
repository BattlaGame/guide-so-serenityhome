<?php

namespace App\Entity;

use App\Repository\AppartementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppartementRepository::class)]
class Appartement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    #[ORM\OneToOne(mappedBy: 'idAppart', cascade: ['persist', 'remove'])]
    private ?Parking $parking = null;

    #[ORM\OneToOne(mappedBy: 'idAppart', cascade: ['persist', 'remove'])]
    private ?Adresse $adresse = null;

    #[ORM\OneToOne(mappedBy: 'idAppart', cascade: ['persist', 'remove'])]
    private ?Wifi $wifi = null;

    #[ORM\OneToOne(mappedBy: 'idAppart', cascade: ['persist', 'remove'])]
    private ?Poubelle $poubelle = null;

    #[ORM\OneToMany(mappedBy: 'idAppart', targetEntity: Electromenager::class)]
    private Collection $electromenagers;

    public function __construct()
    {
        $this->electromenagers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getParking(): ?Parking
    {
        return $this->parking;
    }

    public function setParking(?Parking $parking): self
    {
        // unset the owning side of the relation if necessary
        if ($parking === null && $this->parking !== null) {
            $this->parking->setIdAppart(null);
        }

        // set the owning side of the relation if necessary
        if ($parking !== null && $parking->getIdAppart() !== $this) {
            $parking->setIdAppart($this);
        }

        $this->parking = $parking;

        return $this;
    }

    public function getAdresse(): ?Adresse
    {
        return $this->adresse;
    }

    public function setAdresse(?Adresse $adresse): self
    {
        // unset the owning side of the relation if necessary
        if ($adresse === null && $this->adresse !== null) {
            $this->adresse->setIdAppart(null);
        }

        // set the owning side of the relation if necessary
        if ($adresse !== null && $adresse->getIdAppart() !== $this) {
            $adresse->setIdAppart($this);
        }

        $this->adresse = $adresse;

        return $this;
    }

    public function __toString()
    {
        return $this->getNom();
    }

    public function getWifi(): ?Wifi
    {
        return $this->wifi;
    }

    public function setWifi(?Wifi $wifi): self
    {
        // unset the owning side of the relation if necessary
        if ($wifi === null && $this->wifi !== null) {
            $this->wifi->setIdAppart(null);
        }

        // set the owning side of the relation if necessary
        if ($wifi !== null && $wifi->getIdAppart() !== $this) {
            $wifi->setIdAppart($this);
        }

        $this->wifi = $wifi;

        return $this;
    }

    public function getPoubelle(): ?Poubelle
    {
        return $this->poubelle;
    }

    public function setPoubelle(?Poubelle $poubelle): self
    {
        // unset the owning side of the relation if necessary
        if ($poubelle === null && $this->poubelle !== null) {
            $this->poubelle->setIdAppart(null);
        }

        // set the owning side of the relation if necessary
        if ($poubelle !== null && $poubelle->getIdAppart() !== $this) {
            $poubelle->setIdAppart($this);
        }

        $this->poubelle = $poubelle;

        return $this;
    }

    /**
     * @return Collection<int, Electromenager>
     */
    public function getElectromenagers(): Collection
    {
        return $this->electromenagers;
    }

    public function addElectromenager(Electromenager $electromenager): self
    {
        if (!$this->electromenagers->contains($electromenager)) {
            $this->electromenagers->add($electromenager);
            $electromenager->setIdAppart($this);
        }

        return $this;
    }

    public function removeElectromenager(Electromenager $electromenager): self
    {
        if ($this->electromenagers->removeElement($electromenager)) {
            // set the owning side to null (unless already changed)
            if ($electromenager->getIdAppart() === $this) {
                $electromenager->setIdAppart(null);
            }
        }

        return $this;
    }
}

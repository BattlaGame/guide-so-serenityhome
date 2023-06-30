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
    private ?Adresse $adresse = null;

    #[ORM\OneToOne(mappedBy: 'idAppart', cascade: ['persist', 'remove'])]
    private ?Wifi $wifi = null;

    #[ORM\OneToMany(mappedBy: 'idAppart', targetEntity: Electromenager::class)]
    private Collection $electromenagers;

    #[ORM\OneToMany(mappedBy: 'idAppart', targetEntity: Checkin::class)]
    private Collection $checkins;

    #[ORM\OneToMany(mappedBy: 'idAppart', targetEntity: Poubelle::class)]
    private Collection $poubelles;

    #[ORM\OneToMany(mappedBy: 'idAppart', targetEntity: Parking::class)]
    private Collection $parkings;

    public function __construct()
    {
        $this->electromenagers = new ArrayCollection();
        $this->checkins = new ArrayCollection();
        $this->poubelles = new ArrayCollection();
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

    /**
     * @return Collection<int, Checkin>
     */
    public function getCheckins(): Collection
    {
        return $this->checkins;
    }

    public function addCheckin(Checkin $checkin): self
    {
        if (!$this->checkins->contains($checkin)) {
            $this->checkins->add($checkin);
            $checkin->setIdAppart($this);
        }

        return $this;
    }

    public function removeCheckin(Checkin $checkin): self
    {
        if ($this->checkins->removeElement($checkin)) {
            // set the owning side to null (unless already changed)
            if ($checkin->getIdAppart() === $this) {
                $checkin->setIdAppart(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Poubelle>
     */
    public function getPoubelles(): Collection
    {
        return $this->poubelles;
    }

    public function addPoubelle(Poubelle $poubelle): self
    {
        if (!$this->poubelles->contains($poubelle)) {
            $this->poubelles->add($poubelle);
            $poubelle->setIdAppart($this);
        }

        return $this;
    }

    public function removePoubelle(Poubelle $poubelle): self
    {
        if ($this->poubelles->removeElement($poubelle)) {
            // set the owning side to null (unless already changed)
            if ($poubelle->getIdAppart() === $this) {
                $poubelle->setIdAppart(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Parking>
     */
    public function getParkings(): Collection
    {
        return $this->parkings;
    }

    public function addparking(Parking $parking): self
    {
        if (!$this->parkings->contains($parking)) {
            $this->parkings->add($parking);
            $parking->setIdAppart($this);
        }

        return $this;
    }

    public function removeParking(Parking $parking): self
    {
        if ($this->parkings->removeElement($parking)) {
            // set the owning side to null (unless already changed)
            if ($parking->getIdAppart() === $this) {
                $parking->setIdAppart(null);
            }
        }

        return $this;
    }
}

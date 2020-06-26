<?php

namespace App\Entity;

use App\Repository\VilleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VilleRepository::class)
 */
class Ville
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $code_ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $des_ville;

    /**
     * @ORM\ManyToOne(targetEntity=Destination::class, inversedBy="villes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $dest_ville;

    /**
     * @ORM\OneToMany(targetEntity=VilleEtape::class, mappedBy="ville_etape", orphanRemoval=true)
     */
    private $villeEtapes;

    public function __construct()
    {
        $this->villeEtapes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeVille(): ?string
    {
        return $this->code_ville;
    }

    public function setCodeVille(string $code_ville): self
    {
        $this->code_ville = $code_ville;

        return $this;
    }

    public function getDesVille(): ?string
    {
        return $this->des_ville;
    }

    public function setDesVille(string $des_ville): self
    {
        $this->des_ville = $des_ville;

        return $this;
    }

    public function getDestVille(): ?Destination
    {
        return $this->dest_ville;
    }

    public function setDestVille(?Destination $dest_ville): self
    {
        $this->dest_ville = $dest_ville;

        return $this;
    }

    /**
     * @return Collection|VilleEtape[]
     */
    public function getVilleEtapes(): Collection
    {
        return $this->villeEtapes;
    }

    public function addVilleEtape(VilleEtape $villeEtape): self
    {
        if (!$this->villeEtapes->contains($villeEtape)) {
            $this->villeEtapes[] = $villeEtape;
            $villeEtape->setVilleEtape($this);
        }

        return $this;
    }

    public function removeVilleEtape(VilleEtape $villeEtape): self
    {
        if ($this->villeEtapes->contains($villeEtape)) {
            $this->villeEtapes->removeElement($villeEtape);
            // set the owning side to null (unless already changed)
            if ($villeEtape->getVilleEtape() === $this) {
                $villeEtape->setVilleEtape(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\CircuitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CircuitRepository::class)
 */
class Circuit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $code_circuit;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $des_circuit;

    /**
     * @ORM\Column(type="integer")
     */
    private $duree_circuit;

    /**
     * @ORM\OneToMany(targetEntity=VilleEtape::class, mappedBy="circuit_etape", orphanRemoval=true)
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

    public function getCodeCircuit(): ?string
    {
        return $this->code_circuit;
    }

    public function setCodeCircuit(string $code_circuit): self
    {
        $this->code_circuit = $code_circuit;

        return $this;
    }

    public function getDesCircuit(): ?string
    {
        return $this->des_circuit;
    }

    public function setDesCircuit(string $des_circuit): self
    {
        $this->des_circuit = $des_circuit;

        return $this;
    }

    public function getDureeCircuit(): ?int
    {
        return $this->duree_circuit;
    }

    public function setDureeCircuit(int $duree_circuit): self
    {
        $this->duree_circuit = $duree_circuit;

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
            $villeEtape->setCircuitEtape($this);
        }

        return $this;
    }

    public function removeVilleEtape(VilleEtape $villeEtape): self
    {
        if ($this->villeEtapes->contains($villeEtape)) {
            $this->villeEtapes->removeElement($villeEtape);
            // set the owning side to null (unless already changed)
            if ($villeEtape->getCircuitEtape() === $this) {
                $villeEtape->setCircuitEtape(null);
            }
        }

        return $this;
    }
}

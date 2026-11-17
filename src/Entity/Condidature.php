<?php

namespace App\Entity;

use App\Repository\CondidatureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CondidatureRepository::class)]
class Condidature
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $condidat = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contenu = null;

    #[ORM\Column]
    private ?\DateTime $date = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?job $job = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCondidat(): ?string
    {
        return $this->condidat;
    }

    public function setCondidat(string $condidat): static
    {
        $this->condidat = $condidat;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): static
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getJob(): ?job
    {
        return $this->job;
    }

    public function setJob(?job $job): static
    {
        $this->job = $job;

        return $this;
    }
}

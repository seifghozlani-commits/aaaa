<?php

namespace App\Entity;

use App\Repository\JobG4Repository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobG4Repository::class)]
class JobG4
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}

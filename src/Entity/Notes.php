<?php

namespace App\Entity;

use App\Repository\NotesRepository;
use DateTimeImmutable;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NotesRepository::class)]
class Notes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $note = null;

    #[ORM\Column]

    private ?\DateTimeImmutable $date = null;

    #[ORM\ManyToOne]
    private ?LesMatieres $Matieres = null;


    public function __construct(){
        $this->date = new DateTimeImmutable();
        
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(float $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(\DateTimeImmutable $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getMatieres(): ?LesMatieres
    {
        return $this->Matieres;
    }

    public function setMatieres(?LesMatieres $Matieres): static
    {
        $this->Matieres = $Matieres;

        return $this;
    }
}

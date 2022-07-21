<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    /**
     * @var integer
     */
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    /**
     * @var string
     */
    private ?string $date = null;

    #[ORM\Column(type: Types::TEXT)]
    /**
     * @var string
     */
    private ?string $description = null;

    #[ORM\Column]
    /**
     * @var integer
     */
    private ?int $place = null;

    #[ORM\Column(length: 255)]
    /**
     * @var string
     */
    private ?string $location = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPlace(): ?int
    {
        return $this->place;
    }

    public function setPlace(int $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }
}

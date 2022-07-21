<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
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
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    /**
     * @var string
     */
    private ?string $description = null;

    #[ORM\Column]
    /**
     * @var float
     */
    private ?float $price = null;

    #[ORM\Column]
    /**
     * @var integer
     */
    private ?int $quantity = null;

    #[ORM\Column(type: Types::TEXT)]
    /**
     * @var string
     */
    private ?string $picture = null;

    #[ORM\Column(length: 255)]
    /**
     * @var string
     */
    private ?string $color = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    /**
     * @var object
     */
    private ?Category $category = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}

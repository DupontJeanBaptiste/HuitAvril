<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    /**
     * @var int
     */
    private ?int $id = null;

    /**
     * @var string
     */
    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    /**
     * @var string
     */
    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    /**
     * @var string
     */
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phone = null;

    /**
     * @var string
     */
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $birth = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getBirth(): ?string
    {
        return $this->birth;
    }

    public function setBirth(?string $birth): self
    {
        $this->birth = $birth;

        return $this;
    }
}

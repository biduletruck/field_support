<?php

namespace App\Entity;

use App\Repository\ChoicesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ChoicesRepository::class)
 */
class Choices
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Categories::class, inversedBy="choices")
     */
    private $Category;

    /**
     * @ORM\ManyToOne(targetEntity=SubCategories::class, inversedBy="choices")
     * @Assert\NotBlank()
     */
    private $SubCategory;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="choices")
     */
    private $User;

    /**
     * @ORM\ManyToOne(targetEntity=Advisors::class, inversedBy="choices")
     */
    private $Advisor;

    /**
     * @ORM\Column(type="datetime")
     */
    private $CreatedAt;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Comments;

    public function __construct()
    {
        $this->CreatedAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?Categories
    {
        return $this->Category;
    }

    public function setCategory(?Categories $Category): self
    {
        $this->Category = $Category;

        return $this;
    }

    public function getSubCategory(): ?SubCategories
    {
        return $this->SubCategory;
    }

    public function setSubCategory(?SubCategories $SubCategory): self
    {
        $this->SubCategory = $SubCategory;

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->User;
    }

    public function setUser(?Users $User): self
    {
        $this->User = $User;

        return $this;
    }

    public function getAdvisor(): ?Advisors
    {
        return $this->Advisor;
    }

    public function setAdvisor(?Advisors $Advisor): self
    {
        $this->Advisor = $Advisor;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(\DateTimeInterface $CreatedAt): self
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->Comments;
    }

    public function setComments(?string $Comments): self
    {
        $this->Comments = $Comments;

        return $this;
    }
}

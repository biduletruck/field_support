<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoriesRepository::class)
 */
class Categories
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $CreatedAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Active = true;

    /**
     * @ORM\OneToMany(targetEntity=SubCategories::class, mappedBy="Category")
     */
    private $SubCategories;

    /**
     * @ORM\OneToMany(targetEntity=Choices::class, mappedBy="Category")
     */
    private $choices;

    public function __construct()
    {
        $this->SubCategories = new ArrayCollection();
        $this->choices = new ArrayCollection();
        $this->CreatedAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

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

    public function getActive(): ?bool
    {
        return $this->Active;
    }

    public function setActive(bool $Active): self
    {
        $this->Active = $Active;

        return $this;
    }

    /**
     * @return Collection|SubCategories[]
     */
    public function getSubCategories(): Collection
    {
        return $this->SubCategories;
    }

    public function addSubCategory(SubCategories $subCategory): self
    {
        if (!$this->SubCategories->contains($subCategory)) {
            $this->SubCategories[] = $subCategory;
            $subCategory->setCategory($this);
        }

        return $this;
    }

    public function removeSubCategory(SubCategories $subCategory): self
    {
        if ($this->SubCategories->contains($subCategory)) {
            $this->SubCategories->removeElement($subCategory);
            // set the owning side to null (unless already changed)
            if ($subCategory->getCategory() === $this) {
                $subCategory->setCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Choices[]
     */
    public function getChoices(): Collection
    {
        return $this->choices;
    }

    public function addChoice(Choices $choice): self
    {
        if (!$this->choices->contains($choice)) {
            $this->choices[] = $choice;
            $choice->setCategory($this);
        }

        return $this;
    }

    public function removeChoice(Choices $choice): self
    {
        if ($this->choices->contains($choice)) {
            $this->choices->removeElement($choice);
            // set the owning side to null (unless already changed)
            if ($choice->getCategory() === $this) {
                $choice->setCategory(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->Name;
    }
}

<?php

namespace App\Entity;

use App\Repository\AdvisorsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\True_;

/**
 * @ORM\Entity(repositoryClass=AdvisorsRepository::class)
 */
class Advisors
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
    private $Firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Fullname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Login;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Active = true;

    /**
     * @ORM\OneToMany(targetEntity=Choices::class, mappedBy="Advisor")
     */
    private $choices;


    public function __construct()
    {
        return $this->Fullname = $this->Lastname . " " . $this->Lastname;
        $this->choices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->Firstname;
    }

    public function setFirstname(string $Firstname): self
    {
        $this->Firstname = $Firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->Lastname;
    }

    public function setLastname(string $Lastname): self
    {
        $this->Lastname = $Lastname;

        return $this;
    }

    public function getFullname(): ?string
    {
        return $this->Fullname;
    }

    public function setFullname(string $Fullname): self
    {
        $this->Fullname = $Fullname;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->Login;
    }

    public function setLogin(?string $Login): self
    {
        $this->Login = $Login;

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
            $choice->setAdvisor($this);
        }

        return $this;
    }

    public function removeChoice(Choices $choice): self
    {
        if ($this->choices->contains($choice)) {
            $this->choices->removeElement($choice);
            // set the owning side to null (unless already changed)
            if ($choice->getAdvisor() === $this) {
                $choice->setAdvisor(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->Firstname . " " . $this->Lastname;
    }
}

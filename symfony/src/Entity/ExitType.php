<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExitTypeRepository")
 */
class ExitType
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RunningOuting", mappedBy="exitType")
     */
    private $runningOutings;

    public function __construct()
    {
        $this->runningOutings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|RunningOuting[]
     */
    public function getRunningOutings(): Collection
    {
        return $this->runningOutings;
    }

    public function addRunningOuting(RunningOuting $runningOuting): self
    {
        if (!$this->runningOutings->contains($runningOuting)) {
            $this->runningOutings[] = $runningOuting;
            $runningOuting->setExitType($this);
        }

        return $this;
    }

    public function removeRunningOuting(RunningOuting $runningOuting): self
    {
        if ($this->runningOutings->contains($runningOuting)) {
            $this->runningOutings->removeElement($runningOuting);
            // set the owning side to null (unless already changed)
            if ($runningOuting->getExitType() === $this) {
                $runningOuting->setExitType(null);
            }
        }

        return $this;
    }
}

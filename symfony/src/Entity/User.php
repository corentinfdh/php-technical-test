<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RunningOuting", mappedBy="user")
     */
    private $runningOutings;

    public function __construct()
    {
        parent::__construct();
        $this->runningOutings = new ArrayCollection();
        // your own logic
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
            $runningOuting->setUser($this);
        }

        return $this;
    }

    public function removeRunningOuting(RunningOuting $runningOuting): self
    {
        if ($this->runningOutings->contains($runningOuting)) {
            $this->runningOutings->removeElement($runningOuting);
            // set the owning side to null (unless already changed)
            if ($runningOuting->getUser() === $this) {
                $runningOuting->setUser(null);
            }
        }

        return $this;
    }
}
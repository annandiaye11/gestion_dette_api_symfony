<?php

namespace App\Entity;

use App\Repository\BoutiqRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BoutiqRepository::class)]
class Boutiq
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Client>
     */
    #[ORM\OneToMany(targetEntity: Client::class, mappedBy: 'boutiq')]
    private Collection $client;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $age = null;

    public function __construct()
    {
        $this->client = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Collection<int, Client>
     */
    public function getClient(): Collection
    {
        return $this->client;
    }

    public function addClient(Client $client): static
    {
        if (!$this->client->contains($client)) {
            $this->client->add($client);
            $client->setBoutiq($this);
        }

        return $this;
    }

    public function removeClient(Client $client): static
    {
        if ($this->client->removeElement($client)) {
            // set the owning side to null (unless already changed)
            if ($client->getBoutiq() === $this) {
                $client->setBoutiq(null);
            }
        }

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

        return $this;
    }
}

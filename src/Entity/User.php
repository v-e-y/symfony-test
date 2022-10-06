<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $first_name = null;

    #[ORM\Column(length: 255)]
    private ?string $last_name = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $age = null;

    #[ORM\OneToMany(mappedBy: 'user_id', targetEntity: Product::class)]
    private Collection $getProducts;

    public function __construct()
    {
        $this->getProducts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->getProducts;
    }

    public function addProduct(Product $getProduct): self
    {
        if (!$this->getProducts->contains($getProduct)) {
            $this->getProducts->add($getProduct);
            $getProduct->setUserId($this);
        }

        return $this;
    }

    public function removeProduct(Product $getProduct): self
    {
        if ($this->getProducts->removeElement($getProduct)) {
            // set the owning side to null (unless already changed)
            if ($getProduct->getUserId() === $this) {
                $getProduct->setUserId(null);
            }
        }

        return $this;
    }
}

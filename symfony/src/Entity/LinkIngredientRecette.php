<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LinkIngredientRecetteRepository")
 */
class LinkIngredientRecette
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $quantity;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ingredient", inversedBy="linksingredientrecette")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ingredient;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Recette", inversedBy="linksingredientrecette")
     * @ORM\JoinColumn(nullable=false)
     */
    private $recette;
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
    /**
     * @return mixed
     */
    public function getIngredient()
    {
        return $this->ingredient;
    }
    /**
     * @param mixed $ingredient
     */
    public function setIngredient($ingredient)
    {
        $this->ingredient = $ingredient;
    }
    /**
     * @return mixed
     */
    public function getRecette()
    {
        return $this->recette;
    }
    /**
     * @param mixed $recette
     */
    public function setRecette($recette)
    {
        $this->recette = $recette;
    }
}

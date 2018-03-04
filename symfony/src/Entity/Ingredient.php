<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IngredientRepository")
 */
class Ingredient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=45)
     */
    private $name;
    /**
     * @ORM\Column(type="text")
     */
    private $description;
    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $unit;
    /**
     * @ORM\Column(type="decimal", scale=3, nullable=true)
     */
    private $caloriesPerUnit;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rayon;
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Please, upload the Ingredient illustration.")
     * @Assert\File(mimeTypes={ "image/jpeg","image/png" })
     */
    private $illustration;

    /**
     * @ORM\Column(type="simple_array", nullable=true)
     */
    private $tags;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LinkIngredientRecette", mappedBy="ingredient")
     */
    private $linksingredientrecette;


    public function __construct()
    {
        $this->tags= array();
        $this->linksingredientrecette = new ArrayCollection();
    }

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
    public function getName()
    {
        return $this->name;
    }
    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getUnit()
    {
        return $this->unit;
    }
    /**
     * @param mixed $unit
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
    }

    /**
     * @return mixed
     */
    public function getCaloriesPerUnit()
    {
        return $this->caloriesPerUnit;
    }
    /**
     * @param mixed $caloriesPerUnit
     */
    public function setCaloriesPerUnit($caloriesPerUnit)
    {
        $this->caloriesPerUnit = $caloriesPerUnit;
    }

    /**
     * @return mixed
     */
    public function getRayon()
    {
        return $this->rayon;
    }
    /**
     * @param mixed $rayon
     */
    public function setRayon($rayon)
    {
        $this->rayon = $rayon;
    }

    /**
     * @return mixed
     */
    public function getIllustration()
    {
        return $this->illustration;
    }
    /**
     * @param mixed $illustration
     */
    public function setIllustration($illustration)
    {
        $this->illustration = $illustration;
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    public function addTag($tag)
    {
        foreach($this->tags as $cur_tag) {
            if($cur_tag === $tag)
                return;
        }
        $this->tags[]=$tag;
    }
    public function removeTag($tag)
    {
        foreach($this->tags as $i=>$cur_tag) {
            if($cur_tag === $tag) {
                unset($this->tags[$i]);
                return;
            }
        }
    }

    /**
     * @return ArrayCollection|LinkIngredientRecette[]
     */
    public function getLinksingredientrecette()
    {
        return $this->linksingredientrecette;
    }
}

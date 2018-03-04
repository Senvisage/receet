<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\RecetteRepository")
 */
class Recette
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $timePreparation;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $timeCuisson;
    /**
     * @ORM\Column(type="text")
     */
    private $description;
    /**
     * @ORM\Column(type="text")
     */
    private $steps;
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Please, upload the Recette illustration.")
     * @Assert\File(mimeTypes={ "image/jpeg","image/png" })
     */
    private $illustration;

    /**
     * @ORM\Column(type="simple_array", nullable=true)
     */
    private $tags;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LinkIngredientRecette", mappedBy="recette")
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
    public function getTimePreparation()
    {
        return $this->timePreparation;
    }
    /**
     * @param mixed $timePreparation
     */
    public function setTimePreparation($timePreparation)
    {
        $this->timePreparation = $timePreparation;
    }

    /**
     * @return mixed
     */
    public function getTimeCuisson()
    {
        return $this->timeCuisson;
    }
    /**
     * @param mixed $timeCuisson
     */
    public function setTimeCuisson($timeCuisson)
    {
        $this->timeCuisson = $timeCuisson;
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
    public function getSteps()
    {
        return $this->steps;
    }
    /**
     * @param mixed $steps
     */
    public function setSteps($steps)
    {
        $this->steps = $steps;
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

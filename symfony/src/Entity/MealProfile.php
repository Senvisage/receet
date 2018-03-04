<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MealProfileRepository")
 */
class MealProfile
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbPersonnes;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbJours;

    /**
     * @ORM\Column(type="boolean")
     */
    private $lunch;

    /**
     * @ORM\Column(type="boolean")
     */
    private $dinner;

    /**
     * @ORM\Column(type="simple_array", nullable=true)
     */
    private $tags_mandatory;

    /**
     * @ORM\Column(type="simple_array", nullable=true)
     */
    private $tags_forbidden;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Utilisateur", inversedBy="mealProfile")
     */
    private $utilisateur;

    /**
     * @return mixed
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * @param mixed $utilisateur
     */
    public function setUtilisateur($utilisateur)
    {
        $this->utilisateur = $utilisateur;
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
    public function getNbPersonnes()
    {
        return $this->nbPersonnes;
    }

    /**
     * @param mixed $nbPersonnes
     */
    public function setNbPersonnes($nbPersonnes)
    {
        $this->nbPersonnes = $nbPersonnes;
    }

    /**
     * @return mixed
     */
    public function getNbJours()
    {
        return $this->nbJours;
    }

    /**
     * @param mixed $nbJours
     */
    public function setNbJours($nbJours)
    {
        $this->nbJours = $nbJours;
    }

    /**
     * @return mixed
     */
    public function getLunch()
    {
        return $this->lunch;
    }

    /**
     * @param mixed $lunch
     */
    public function setLunch($lunch)
    {
        $this->lunch = $lunch;
    }

    /**
     * @return mixed
     */
    public function getDinner()
    {
        return $this->dinner;
    }

    /**
     * @param mixed $dinner
     */
    public function setDinner($dinner)
    {
        $this->dinner = $dinner;
    }

    /**
     * @return mixed
     */
    public function getTagsMandatory()
    {
        return $this->tags_mandatory;
    }

    /**
     * @param mixed $tags_mandatory
     */
    public function setTagsMandatory($tags_mandatory)
    {
        $this->tags_mandatory = $tags_mandatory;
    }

    /**
     * @return mixed
     */
    public function getTagsForbidden()
    {
        return $this->tags_forbidden;
    }

    /**
     * @param mixed $tags_forbidden
     */
    public function setTagsForbidden($tags_forbidden)
    {
        $this->tags_forbidden = $tags_forbidden;
    }

}

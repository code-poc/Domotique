<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\HttpFoundation\Request;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PieceRepository")
 */
class Piece
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
    private $titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $etage;

    /**
     * @ORM\Column(type="boolean", options={"default":false})
     */
    private $favory;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $lumiere_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getSlug(): string
    {
        $slugify = new Slugify();
        return $slugify->slugify($this->titre);
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEtage(): ?int
    {
        return $this->etage;
    }

    public function getFormatEtage(): ?string
    {
        /**
         * @var $name
         */
        $name = '';

        if($this->etage == 0)
        {
              $this->name = "rez de chaussée";
        }
        else {
            $this->name = "premier étage";
        }
        return $this->name;
    }

    public function setEtage(int $etage): self
    {
        $this->etage = $etage;

        return $this;
    }

    public function getFavory(): ?bool
    {
        return $this->favory;
    }

    public function setFavory(bool $favory): self
    {
        $this->favory = $favory;

        return $this;
    }
    public function lightOn(int $lumiereId)
    {

        $request = new Request();
        $request->create("http://82.241.182.110:84/poc150481/sw/". $lumiereId . "/on", 'GET');
    }

    public function getLumiereId(): ?int
    {
        return $this->lumiere_id;
    }

    public function setLumiereId(?int $lumiere_id): self
    {
        $this->lumiere_id = $lumiere_id;

        return $this;
    }
}

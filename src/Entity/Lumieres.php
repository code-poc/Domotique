<?php

namespace App\Entity;

use App\Repository\PieceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LumieresRepository")
 */
class Lumieres
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $piece_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $homewizard_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPieceId(): ?int
    {
        return $this->piece_id;
    }

    public function setPieceId(int $piece_id): self
    {
        $this->piece_id = $piece_id;

        return $this;
    }

    public function getHomewizardId(): ?int
    {
        return $this->homewizard_id;
    }

    public function setHomewizardId(int $homewizard_id): self
    {
        $this->homewizard_id = $homewizard_id;

        return $this;
    }
}

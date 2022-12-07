<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PanelRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PanelRepository::class)
 */
class Panel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $siezX;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sizeY;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $row;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $col;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $chartType;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $payload = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSiezX(): ?int
    {
        return $this->siezX;
    }

    public function setSiezX(?int $siezX): self
    {
        $this->siezX = $siezX;

        return $this;
    }

    public function getSizeY(): ?int
    {
        return $this->sizeY;
    }

    public function setSizeY(?int $sizeY): self
    {
        $this->sizeY = $sizeY;

        return $this;
    }

    public function getRow(): ?int
    {
        return $this->row;
    }

    public function setRow(?int $row): self
    {
        $this->row = $row;

        return $this;
    }

    public function getCol(): ?int
    {
        return $this->col;
    }

    public function setCol(?int $col): self
    {
        $this->col = $col;

        return $this;
    }

    public function getChartType(): ?string
    {
        return $this->chartType;
    }

    public function setChartType(?string $chartType): self
    {
        $this->chartType = $chartType;

        return $this;
    }

    public function getPayload(): ?array
    {
        return $this->payload;
    }

    public function setPayload(?array $payload): self
    {
        $this->payload = $payload;

        return $this;
    }
}

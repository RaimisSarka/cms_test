<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MenuItemsTopRepository")
 */
class MenuItemsTop
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $path_href;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img_path;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $alt;

    /**
     * @ORM\Column(type="integer")
     */
    private $list_order_number;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPathHref(): ?string
    {
        return $this->path_href;
    }

    public function setPathHref(string $path_href): self
    {
        $this->path_href = $path_href;

        return $this;
    }

    public function getImgPath(): ?string
    {
        return $this->img_path;
    }

    public function setImgPath(?string $img_path): self
    {
        $this->img_path = $img_path;

        return $this;
    }

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(?string $alt): self
    {
        $this->alt = $alt;

        return $this;
    }

    public function getListOrderNumber(): ?int
    {
        return $this->list_order_number;
    }

    public function setListOrderNumber(int $list_order_number): self
    {
        $this->list_order_number = $list_order_number;

        return $this;
    }
}

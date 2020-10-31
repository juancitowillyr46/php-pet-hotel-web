<?php


namespace App\BackOffice\Modules\Domain\Entities;


class ModuleUserMenuDto
{
    public string $id;
    public string $name;
    public string $slug;
    public string $icon;
    public bool $isParent;
    public bool $isChildren;
    public int $order;
    public array $subMenu;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     */
    public function setIcon(string $icon): void
    {
        $this->icon = $icon;
    }

    /**
     * @return bool
     */
    public function isParent(): bool
    {
        return $this->isParent;
    }

    /**
     * @param bool $isParent
     */
    public function setIsParent(bool $isParent): void
    {
        $this->isParent = $isParent;
    }

    /**
     * @return bool
     */
    public function isChildren(): bool
    {
        return $this->isChildren;
    }

    /**
     * @param bool $isChildren
     */
    public function setIsChildren(bool $isChildren): void
    {
        $this->isChildren = $isChildren;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @param int $order
     */
    public function setOrder(int $order): void
    {
        $this->order = $order;
    }

    /**
     * @return array
     */
    public function getSubMenu(): array
    {
        return $this->subMenu;
    }

    /**
     * @param array $subMenu
     */
    public function setSubMenu(array $subMenu): void
    {
        $this->subMenu = $subMenu;
    }

}
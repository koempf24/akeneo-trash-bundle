<?php
declare(strict_types = 1);

namespace Koempf\TrashBundle\Entity;

use DateTime;

class RemovedCategory
{
    private ?int $id = null;

    private int $categoryId;

    private ?int $parentId;

    private string $code;

    private string $label;

    private int $root;

    private int $level;

    private int $left;

    private int $right;

    private array $normalized;

    private DateTime $deletedAt;

    private ?string $author;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * @param int $categoryId
     *
     * @return $this
     */
    public function setCategoryId(int $categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    /**
     * @param int|null $parentId
     *
     * @return $this
     */
    public function setParentId(?int $parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     *
     * @return $this
     */
    public function setCode(string $code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     *
     * @return $this
     */
    public function setLabel(string $label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return int
     */
    public function getRoot(): int
    {
        return $this->root;
    }

    /**
     * @param int $root
     *
     * @return $this
     */
    public function setRoot(int $root)
    {
        $this->root = $root;

        return $this;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     *
     * @return $this
     */
    public function setLevel(int $level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return int
     */
    public function getLeft(): int
    {
        return $this->left;
    }

    /**
     * @param int $left
     *
     * @return $this
     */
    public function setLeft(int $left)
    {
        $this->left = $left;

        return $this;
    }

    /**
     * @return int
     */
    public function getRight(): int
    {
        return $this->right;
    }

    /**
     * @param int $right
     *
     * @return $this
     */
    public function setRight(int $right)
    {
        $this->right = $right;

        return $this;
    }

    /**
     * @return array
     */
    public function getNormalized(): array
    {
        return $this->normalized;
    }

    /**
     * @param array $normalized
     *
     * @return $this
     */
    public function setNormalized(array $normalized)
    {
        $this->normalized = $normalized;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDeletedAt(): DateTime
    {
        return $this->deletedAt;
    }

    /**
     * @param \DateTime $deletedAt
     *
     * @return $this
     */
    public function setDeletedAt(DateTime $deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAuthor(): ?string
    {
        return $this->author;
    }

    /**
     * @param string|null $author
     *
     * @return $this
     */
    public function setAuthor(?string $author)
    {
        $this->author = $author;

        return $this;
    }
}

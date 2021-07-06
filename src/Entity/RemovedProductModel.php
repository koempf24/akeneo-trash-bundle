<?php
declare(strict_types = 1);

namespace Koempf\TrashBundle\Entity;

use DateTime;

class RemovedProductModel
{
    private ?int $id = null;

    private int $productModelId;

    private ?int $parentId;

    private ?int $familyVariantId;

    private string $code;

    private array $rawValues;

    private array $normalized;

    private DateTime $createdAt;

    private DateTime $updatedAt;

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
    public function getProductModelId(): int
    {
        return $this->productModelId;
    }

    /**
     * @param int $productModelId
     *
     * @return $this
     */
    public function setProductModelId(int $productModelId)
    {
        $this->productModelId = $productModelId;

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
     * @return int|null
     */
    public function getFamilyVariantId(): ?int
    {
        return $this->familyVariantId;
    }

    /**
     * @param int|null $familyVariantId
     *
     * @return $this
     */
    public function setFamilyVariantId(?int $familyVariantId)
    {
        $this->familyVariantId = $familyVariantId;

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
     * @return array
     */
    public function getRawValues(): array
    {
        return $this->rawValues;
    }

    /**
     * @param array $rawValues
     *
     * @return $this
     */
    public function setRawValues(array $rawValues)
    {
        $this->rawValues = $rawValues;

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
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     *
     * @return $this
     */
    public function setCreatedAt(DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     *
     * @return $this
     */
    public function setUpdatedAt(DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

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

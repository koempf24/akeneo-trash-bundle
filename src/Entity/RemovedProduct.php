<?php
declare(strict_types = 1);

namespace Koempf\TrashBundle\Entity;

use DateTime;

class RemovedProduct
{
    private ?int $id = null;

    private int $productId;

    private ?int $familyId;

    private ?int $productModelId;

    private ?int $familyVariantId;

    private bool $enabled;

    private string $identifier;

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
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     *
     * @return $this
     */
    public function setProductId(int $productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getFamilyId(): ?int
    {
        return $this->familyId;
    }

    /**
     * @param int|null $familyId
     *
     * @return $this
     */
    public function setFamilyId(?int $familyId)
    {
        $this->familyId = $familyId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getProductModelId(): ?int
    {
        return $this->productModelId;
    }

    /**
     * @param int|null $productModelId
     *
     * @return $this
     */
    public function setProductModelId(?int $productModelId)
    {
        $this->productModelId = $productModelId;

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
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     *
     * @return $this
     */
    public function setEnabled(bool $enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * @param string $identifier
     *
     * @return $this
     */
    public function setIdentifier(string $identifier)
    {
        $this->identifier = $identifier;

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

<?php
declare(strict_types = 1);

namespace Koempf\TrashBundle\EventListener;

use Akeneo\Pim\Enrichment\Component\Category\Model\CategoryInterface;
use Akeneo\Pim\Enrichment\Component\Product\Model\ProductInterface;
use Akeneo\Pim\Enrichment\Component\Product\Model\ProductModelInterface;
use Akeneo\Tool\Component\StorageUtils\StorageEvents;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Koempf\TrashBundle\Entity\RemovedCategory;
use Koempf\TrashBundle\Entity\RemovedProduct;
use Koempf\TrashBundle\Entity\RemovedProductModel;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class RemoveListener implements EventSubscriberInterface
{
    private EntityManagerInterface $entityManager;

    private TokenStorageInterface $tokenStorage;

    private NormalizerInterface $productNormalizer;

    private NormalizerInterface $categoryNormalizer;

    /**
     * @return array<array>
     */
    public static function getSubscribedEvents(): array
    {
        return [
            StorageEvents::PRE_REMOVE => ['onPreRemove', 9999],
        ];
    }

    /**
     * @param \Doctrine\ORM\EntityManagerInterface $entityManager
     * @param \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface $tokenStorage
     * @param \Symfony\Component\Serializer\Normalizer\NormalizerInterface $productNormalizer
     * @param \Symfony\Component\Serializer\Normalizer\NormalizerInterface $categoryNormalizer
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        TokenStorageInterface $tokenStorage,
        NormalizerInterface $productNormalizer,
        NormalizerInterface $categoryNormalizer
    ) {
        $this->entityManager = $entityManager;
        $this->tokenStorage = $tokenStorage;
        $this->productNormalizer = $productNormalizer;
        $this->categoryNormalizer = $categoryNormalizer;
    }

    /**
     * @param \Symfony\Component\EventDispatcher\GenericEvent $event
     *
     * @return void
     */
    public function onPreRemove(GenericEvent $event): void
    {
        $subject = $event->getSubject();

        if ($subject instanceof ProductInterface) {
            $this->saveProductInTrash($subject);

            return;
        }

        if ($subject instanceof ProductModelInterface) {
            $this->saveProductModelInTrash($subject);

            return;
        }

        if ($subject instanceof CategoryInterface) {
            $this->saveCategoryInTrash($subject);
        }
    }

    /**
     * @param \Akeneo\Pim\Enrichment\Component\Product\Model\ProductInterface $product
     *
     * @return void
     */
    private function saveProductInTrash(ProductInterface $product): void
    {
        $removedProduct = new RemovedProduct();
        $removedProduct
            ->setProductId((int)$product->getId())
            ->setFamilyId($product->getFamilyId())
            ->setProductModelId($product->getParent() ? $product->getParent()->getId() : null)
            ->setFamilyVariantId($product->getFamilyVariant() ? $product->getFamilyVariant()->getId() : null)
            ->setEnabled($product->isEnabled())
            ->setIdentifier($product->getIdentifier())
            ->setRawValues($product->getRawValues())
            ->setNormalized($this->productNormalizer->normalize($product, 'standard'))
            ->setCreatedAt($product->getCreated())
            ->setUpdatedAt($product->getUpdated())
            ->setDeletedAt(new DateTime())
            ->setAuthor($this->getUserName());

        $this->entityManager->persist($removedProduct);
    }

    /**
     * @param \Akeneo\Pim\Enrichment\Component\Product\Model\ProductModelInterface $productModel
     *
     * @return void
     */
    private function saveProductModelInTrash(ProductModelInterface $productModel): void
    {
        $subProducts = $productModel->getProducts();
        foreach ($subProducts as $subProduct) {
            $this->saveProductInTrash($subProduct);
        }

        $subModels = $productModel->getProductModels();
        foreach ($subModels as $subModel) {
            $this->saveProductModelInTrash($subModel);
        }

        $removedProductModel = new RemovedProductModel();
        $removedProductModel
            ->setProductModelId($productModel->getId())
            ->setParentId($productModel->getParent() ? $productModel->getParent()->getId() : null)
            ->setFamilyVariantId($productModel->getFamilyVariant() ? $productModel->getFamilyVariant()->getId() : null)
            ->setCode($productModel->getCode())
            ->setRawValues($productModel->getRawValues())
            ->setNormalized($this->productNormalizer->normalize($productModel, 'standard'))
            ->setCreatedAt($productModel->getCreated())
            ->setUpdatedAt($productModel->getUpdated())
            ->setDeletedAt(new DateTime())
            ->setAuthor($this->getUserName());

        $this->entityManager->persist($removedProductModel);
    }

    /**
     * @param \Akeneo\Pim\Enrichment\Component\Category\Model\CategoryInterface $category
     *
     * @return void
     */
    private function saveCategoryInTrash(CategoryInterface $category): void
    {
        $category->setLocale('de_DE');

        $subCategories = $category->getChildren();
        foreach ($subCategories as $subCategory) {
            $this->saveCategoryInTrash($subCategory);
        }

        $removedCategory = new RemovedCategory();
        $removedCategory
            ->setCategoryId($category->getId())
            ->setParentId($category->getParent() ? $category->getParent()->getId() : null)
            ->setCode($category->getCode())
            ->setLabel($category->getLabel())
            ->setNormalized($this->categoryNormalizer->normalize($category, 'external_api'))
            ->setRoot($category->getRoot())
            ->setLevel($category->getLevel())
            ->setLeft($category->getLeft())
            ->setRight($category->getRight())
            ->setDeletedAt(new DateTime())
            ->setAuthor($this->getUserName());

        $this->entityManager->persist($removedCategory);
    }

    /**
     * @return \Symfony\Component\Security\Core\User\UserInterface|null
     */
    private function getUser(): ?UserInterface
    {
        $token = $this->tokenStorage->getToken();
        if ($token === null) {
            return null;
        }

        $user = $token->getUser();
        if (!is_object($user)) {
            return null;
        }

        return $user;
    }

    /**
     * @return string|null
     */
    private function getUserName(): ?string
    {
        $user = $this->getUser();

        return $user ? $user->getUsername() : null;
    }
}

<?php
declare(strict_types = 1);

namespace Koempf\TrashBundle\Repository;

use Akeneo\Tool\Component\StorageUtils\Repository\IdentifiableObjectRepositoryInterface;
use DateTime;
use Doctrine\ORM\EntityRepository;
use Koempf\TrashBundle\Entity\RemovedProduct;

class RemovedProductRepository extends EntityRepository implements IdentifiableObjectRepositoryInterface
{
    /**
     * @return array<string>
     */
    public function getIdentifierProperties(): array
    {
        return ['id'];
    }

    /**
     * @param string $identifier
     * @phpcs:disable SprykerStrict.TypeHints.ParameterTypeHint
     * @return \Koempf\TrashBundle\Entity\RemovedProduct|null
     */
    public function findOneByIdentifier($identifier): ?RemovedProduct
    {
        // phpcs:enable SprykerStrict.TypeHints.ParameterTypeHint

        return $this->findOneBy(['id' => $identifier]);
    }

    /**
     * @param \DateTime $dateTime
     *
     * @return array<\Koempf\TrashBundle\Entity\RemovedProduct>
     */
    public function findDeletedAfter(DateTime $dateTime): array
    {
        $qb = $this->createQueryBuilder('dp');

        return $qb
            ->where($qb->expr()->gt('dp.deletedAt', ':dateTime'))
            ->setParameter('dateTime', $dateTime)
            ->orderBy('dp.deletedAt')
            ->getQuery()
            ->execute();
    }
}

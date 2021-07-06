<?php
declare(strict_types = 1);

namespace Koempf\TrashBundle\Repository;

use Akeneo\Tool\Component\StorageUtils\Repository\IdentifiableObjectRepositoryInterface;
use Doctrine\ORM\EntityRepository;
use Koempf\TrashBundle\Entity\RemovedProductModel;

class RemovedProductModelRepository extends EntityRepository implements IdentifiableObjectRepositoryInterface
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
     * @return \Koempf\TrashBundle\Entity\RemovedProductModel|null
     */
    public function findOneByIdentifier($identifier): ?RemovedProductModel
    {
        // phpcs:enable SprykerStrict.TypeHints.ParameterTypeHint

        return $this->findOneBy(['id' => $identifier]);
    }
}

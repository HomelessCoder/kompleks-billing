<?php

declare(strict_types=1);

namespace LanBilling\Vgroup\Infrastructure\Persistence;

use LanBilling\Vgroup\Domain\Model\Vgroup;
use LanBilling\Vgroup\Domain\Persistence\IVgroupRepository;
use Modular\Persistence\Repository\AbstractGenericRepository;
use Modular\Persistence\Repository\Condition;
use Override;

/**
 * @extends AbstractGenericRepository<Vgroup>
 */
final class MysqlVgroupRepository extends AbstractGenericRepository implements IVgroupRepository
{
    #[Override]
    public function getVgroups(): array
    {
        return $this->findBy();
    }

    /**
     * @param array<int> $vgIds
     * @return array<Vgroup>
     */
    #[Override]
    public function getVgroupsByIds(array $vgIds): array
    {
        $vgIds = array_values(array_unique($vgIds));

        if ($vgIds === []) {
            return [];
        }

        return $this->findBy([
            Condition::in(Schema::VgId, $vgIds),
        ]);
    }

    #[Override]
    protected function getTableName(): string
    {
        return Schema::getTableName();
    }
}

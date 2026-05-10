<?php

declare(strict_types=1);

namespace LanBilling\Vgroup\Infrastructure\Persistence;

use LanBilling\Vgroup\Domain\Model\Vgroup;
use LanBilling\Vgroup\Domain\Persistence\IVgroupRepository;
use Modular\Persistence\Repository\AbstractGenericRepository;
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

    #[Override]
    protected function getTableName(): string
    {
        return Schema::getTableName();
    }
}

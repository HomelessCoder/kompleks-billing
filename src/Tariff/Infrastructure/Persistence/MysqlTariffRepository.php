<?php

declare(strict_types=1);

namespace LanBilling\Tariff\Infrastructure\Persistence;

use LanBilling\Tariff\Domain\Model\Tariff;
use LanBilling\Tariff\Domain\Persistence\ITariffRepository;
use Modular\Persistence\Repository\AbstractGenericRepository;
use Modular\Persistence\Repository\Condition;
use Override;

/**
 * @extends AbstractGenericRepository<Tariff>
 */
final class MysqlTariffRepository extends AbstractGenericRepository implements ITariffRepository
{
    #[Override]
    public function getTariffById(int $tariffId): ?Tariff
    {
        return $this->find($tariffId);
    }

    /**
     * @return array<Tariff>
     */
    #[Override]
    public function getTariffs(int $archive = 0): array
    {
        $selectStatement = $this
            ->getSelectStatement()
            ->addOrder(Schema::TarId->value, 'asc');

        return $this->findBy([
            Condition::equals(Schema::Archive, $archive),
        ], $selectStatement);
    }

    #[Override]
    protected function getTableName(): string
    {
        return Schema::getTableName();
    }
}

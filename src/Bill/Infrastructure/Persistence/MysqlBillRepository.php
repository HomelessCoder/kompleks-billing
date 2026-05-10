<?php

declare(strict_types=1);

namespace LanBilling\Bill\Infrastructure\Persistence;

use DateTimeImmutable;
use LanBilling\Bill\Domain\Model\Bill;
use LanBilling\Bill\Domain\Persistence\IBillRepository;
use Modular\Persistence\Repository\AbstractGenericRepository;
use Modular\Persistence\Repository\Condition;
use Override;

/**
 * @extends AbstractGenericRepository<Bill>
 */
final class MysqlBillRepository extends AbstractGenericRepository implements IBillRepository
{
    #[Override]
    public function getBillsByAccountUid(int $accountUid, ?DateTimeImmutable $payDateFrom = null): array
    {
        $conditions = [
            Condition::equals(Schema::VgId, $accountUid),
        ];

        if ($payDateFrom !== null) {
            $conditions[] = Condition::greaterEquals(
                Schema::PayDate,
                $payDateFrom->format('Y-m-d H:i:s'),
            );
        }

        $selectStatement = $this
            ->getSelectStatement()
            ->addOrder(Schema::PayDate->value, 'desc')
            ->addOrder(Schema::RecordId->value, 'desc');

        return $this->findBy($conditions, $selectStatement);
    }

    #[Override]
    protected function getTableName(): string
    {
        return Schema::getTableName();
    }
}

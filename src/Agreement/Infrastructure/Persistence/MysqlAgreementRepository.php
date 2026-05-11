<?php

declare(strict_types=1);

namespace LanBilling\Agreement\Infrastructure\Persistence;

use LanBilling\Agreement\Domain\Model\Agreement;
use LanBilling\Agreement\Domain\Persistence\IAgreementRepository;
use Modular\Persistence\Repository\AbstractGenericRepository;
use Modular\Persistence\Repository\Condition;
use Override;

/**
 * @extends AbstractGenericRepository<Agreement>
 */
final class MysqlAgreementRepository extends AbstractGenericRepository implements IAgreementRepository
{
    #[Override]
    public function getAgreementsByAccountUid(int $uid, ?int $operatorId = null): array
    {
        return $this->getAgreementsByAccountUids([$uid], $operatorId);
    }

    #[Override]
    public function getAgreementsByAccountUids(array $uids, ?int $operatorId = null): array
    {
        if ($uids === []) {
            return [];
        }

        $conditions = [
            Condition::in(Schema::Uid, $uids),
        ];

        if ($operatorId !== null) {
            $conditions[] = Condition::equals(Schema::Operator, $operatorId);
        }

        $selectStatement = $this
            ->getSelectStatement()
            ->addOrder(Schema::Uid->value, 'asc')
            ->addOrder(Schema::Operator->value, 'asc');

        return $this->findBy($conditions, $selectStatement);
    }

    #[Override]
    protected function getTableName(): string
    {
        return Schema::getTableName();
    }
}

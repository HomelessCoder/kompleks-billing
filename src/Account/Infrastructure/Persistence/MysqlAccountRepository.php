<?php

declare(strict_types=1);

namespace LanBilling\Account\Infrastructure\Persistence;

use LanBilling\Account\Domain\Model\Account;
use LanBilling\Account\Domain\Persistence\IAccountRepository;
use Modular\Persistence\Repository\AbstractGenericRepository;
use Modular\Persistence\Repository\Condition;
use Override;

/**
 * @extends AbstractGenericRepository<Account>
 */
final class MysqlAccountRepository extends AbstractGenericRepository implements IAccountRepository
{
    #[Override]
    public function getAccounts(): array
    {
        return $this->findBy();
    }

    #[Override]
    public function getAccountByUid(int $uid): ?Account
    {
        return $this->find($uid);
    }

    /**
     * @param array<int> $uids
     * @return array<Account>
     */
    #[Override]
    public function getAccountsByUids(array $uids): array
    {
        $uids = array_values(array_unique(array_map(static fn (int $uid): int => $uid, $uids)));

        if ($uids === []) {
            return [];
        }

        return $this->findBy([
            Condition::in(Schema::Uid, $uids),
        ]);
    }

    #[Override]
    protected function getTableName(): string
    {
        return Schema::getTableName();
    }
}

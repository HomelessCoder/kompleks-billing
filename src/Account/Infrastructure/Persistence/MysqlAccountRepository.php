<?php

declare(strict_types=1);

namespace LanBilling\Account\Infrastructure\Persistence;

use LanBilling\Account\Domain\Model\Account;
use LanBilling\Account\Domain\Persistence\IAccountRepository;
use Modular\Persistence\Repository\AbstractGenericRepository;
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

    #[Override]
    protected function getTableName(): string
    {
        return Schema::getTableName();
    }
}

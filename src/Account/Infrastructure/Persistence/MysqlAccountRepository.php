<?php

declare(strict_types=1);

namespace LanBilling\Account\Infrastructure\Persistence;

use LanBilling\Account\Domain\Model\Account;
use Modular\Persistence\Repository\AbstractGenericRepository;
use Override;

/**
 * @extends AbstractGenericRepository<Account>
 */
final class MysqlAccountRepository extends AbstractGenericRepository
{
    #[Override]
    protected function getTableName(): string
    {
        return Schema::getTableName();
    }
}

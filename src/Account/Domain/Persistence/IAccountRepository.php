<?php

declare(strict_types=1);

namespace LanBilling\Account\Domain\Persistence;

use LanBilling\Account\Domain\Model\Account;

interface IAccountRepository
{
    /**
     * @return array<Account>
     */
    public function getAccounts(): array;

    public function getAccountByUid(int $uid): ?Account;
}

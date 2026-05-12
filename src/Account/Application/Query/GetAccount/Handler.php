<?php

declare(strict_types=1);

namespace LanBilling\Account\Application\Query\GetAccount;

use LanBilling\Account\Domain\Model\Account;
use LanBilling\Account\Domain\Persistence\IAccountRepository;

final readonly class Handler
{
    public function __construct(
        private IAccountRepository $accountRepository,
    ) {
    }

    public function __invoke(Query $query): ?Account
    {
        return $this->accountRepository->getAccountByUid($query->uid);
    }
}

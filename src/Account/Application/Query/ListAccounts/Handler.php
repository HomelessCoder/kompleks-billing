<?php

declare(strict_types=1);

namespace LanBilling\Account\Application\Query\ListAccounts;

use LanBilling\Account\Domain\Model\Account;
use LanBilling\Account\Domain\Persistence\IAccountRepository;

final readonly class Handler
{
    public function __construct(
        private IAccountRepository $accountRepository,
    ) {
    }

    /**
     * @return array<Account>
     */
    public function __invoke(Query $query): array
    {
        return $this->accountRepository->getAccounts();
    }
}

<?php

declare(strict_types=1);

namespace LanBilling\AccountRead\Application\Query\ListAccountsByUsergroupId;

use LanBilling\Account\Domain\Model\Account;
use LanBilling\Account\Domain\Persistence\IAccountRepository;
use LanBilling\AccountRead\Domain\Persistence\IAccountUsergroupLinkRepository;

final readonly class Handler
{
    public function __construct(
        private IAccountUsergroupLinkRepository $accountUsergroupLinkRepository,
        private IAccountRepository $accountRepository,
    ) {
    }

    /**
     * @return array<Account>
     */
    public function __invoke(Query $query): array
    {
        $uids = $this->accountUsergroupLinkRepository->getAccountUidsByGroupId($query->groupId);

        if ($uids === []) {
            return [];
        }

        return $this->accountRepository->getAccountsByUids($uids);
    }
}

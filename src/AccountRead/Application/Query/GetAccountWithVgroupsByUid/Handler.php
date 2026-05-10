<?php

declare(strict_types=1);

namespace LanBilling\AccountRead\Application\Query\GetAccountWithVgroupsByUid;

use LanBilling\Account\Domain\Persistence\IAccountRepository;
use LanBilling\AccountRead\Application\ReadModel\AccountWithVgroups;
use LanBilling\AccountRead\Domain\Model\AccountVgroupLink;
use LanBilling\AccountRead\Domain\Persistence\IAccountVgroupLinkRepository;
use LanBilling\Vgroup\Domain\Persistence\IVgroupRepository;

final readonly class Handler
{
    public function __construct(
        private IAccountRepository $accountRepository,
        private IAccountVgroupLinkRepository $accountVgroupLinkRepository,
        private IVgroupRepository $vgroupRepository,
    ) {
    }

    public function __invoke(Query $query): ?AccountWithVgroups
    {
        $account = $this->accountRepository->getAccountByUid($query->uid);

        if ($account === null) {
            return null;
        }

        $links = $this->accountVgroupLinkRepository->getLinksByAccountUid($query->uid);
        $vgIds = array_map(static fn (AccountVgroupLink $link): int => $link->vgId, $links);
        $vgroups = $this->vgroupRepository->getVgroupsByIds($vgIds);

        return new AccountWithVgroups($account, $vgroups);
    }
}

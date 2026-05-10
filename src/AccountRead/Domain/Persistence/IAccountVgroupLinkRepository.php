<?php

declare(strict_types=1);

namespace LanBilling\AccountRead\Domain\Persistence;

use LanBilling\AccountRead\Domain\Model\AccountVgroupLink;

interface IAccountVgroupLinkRepository
{
    /**
     * @return array<AccountVgroupLink>
     */
    public function getLinksByAccountUid(int $uid): array;
}

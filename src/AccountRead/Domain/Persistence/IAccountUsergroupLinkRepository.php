<?php

declare(strict_types=1);

namespace LanBilling\AccountRead\Domain\Persistence;

interface IAccountUsergroupLinkRepository
{
    /**
     * @return array<int>
     */
    public function getAccountUidsByGroupId(int $groupId): array;
}

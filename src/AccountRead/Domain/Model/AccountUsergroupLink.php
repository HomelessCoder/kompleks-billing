<?php

declare(strict_types=1);

namespace LanBilling\AccountRead\Domain\Model;

final readonly class AccountUsergroupLink
{
    public function __construct(
        public int $groupId,
        public int $uid,
    ) {
    }
}

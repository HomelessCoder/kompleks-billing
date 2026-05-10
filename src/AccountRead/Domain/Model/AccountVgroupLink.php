<?php

declare(strict_types=1);

namespace LanBilling\AccountRead\Domain\Model;

final readonly class AccountVgroupLink
{
    public function __construct(
        public int $uid,
        public int $vgId,
    ) {
    }
}

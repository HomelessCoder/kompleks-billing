<?php

declare(strict_types=1);

namespace LanBilling\AccountRead\Application\Query\ListVgroupsByAccountUid;

final readonly class Query
{
    public function __construct(
        public int $uid,
    ) {
    }
}

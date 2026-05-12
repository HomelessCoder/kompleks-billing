<?php

declare(strict_types=1);

namespace LanBilling\Account\Application\Query\GetAccount;

final readonly class Query
{
    public function __construct(
        public int $uid,
    ) {
    }
}

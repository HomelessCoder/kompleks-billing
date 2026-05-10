<?php

declare(strict_types=1);

namespace LanBilling\Bill\Application\Query\ListBillsByAccountUid;

use DateTimeImmutable;

final readonly class Query
{
    public function __construct(
        public int $uid,
        public ?DateTimeImmutable $payDateFrom = null,
    ) {
    }
}

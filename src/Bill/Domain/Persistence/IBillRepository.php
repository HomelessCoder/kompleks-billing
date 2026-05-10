<?php

declare(strict_types=1);

namespace LanBilling\Bill\Domain\Persistence;

use DateTimeImmutable;
use LanBilling\Bill\Domain\Model\Bill;

interface IBillRepository
{
    /**
     * @return array<Bill>
     */
    public function getBillsByAccountUid(int $accountUid, ?DateTimeImmutable $payDateFrom = null): array;
}

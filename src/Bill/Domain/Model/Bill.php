<?php

declare(strict_types=1);

namespace LanBilling\Bill\Domain\Model;

use DateTimeImmutable;

final readonly class Bill
{
    public function __construct(
        public int $recordId,
        public int $accountUid,
        public DateTimeImmutable $payDate,
        public ?float $sum,
        public ?int $modPerson,
        public ?string $billNum,
        public ?string $billDescr,
        public bool $isOrder,
        public ?int $orderId,
        public ?DateTimeImmutable $remoteDate,
        public ?DateTimeImmutable $cancelDate,
        public BillStatus $status,
        public ?string $receipt,
    ) {
    }
}

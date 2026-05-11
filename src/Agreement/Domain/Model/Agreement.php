<?php

declare(strict_types=1);

namespace LanBilling\Agreement\Domain\Model;

use DateTimeImmutable;

final readonly class Agreement
{
    public function __construct(
        public int $uid,
        public int $operatorId,
        public ?string $number,
        public ?DateTimeImmutable $date,
    ) {
    }
}

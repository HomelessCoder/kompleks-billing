<?php

declare(strict_types=1);

namespace LanBilling\Tariff\Application\Query\GetTariff;

final readonly class Query
{
    public function __construct(
        public int $tarId,
    ) {
    }
}

<?php

declare(strict_types=1);

namespace LanBilling\Tariff\Domain\Persistence;

use LanBilling\Tariff\Domain\Model\Tariff;

interface ITariffRepository
{
    public function getTariffById(int $tariffId): ?Tariff;

    /**
     * @return array<Tariff>
     */
    public function getTariffs(int $archive = 0): array;
}

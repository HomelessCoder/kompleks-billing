<?php

declare(strict_types=1);

namespace LanBilling\Tariff\Application\Query\GetTariff;

use LanBilling\Tariff\Domain\Model\Tariff;
use LanBilling\Tariff\Domain\Persistence\ITariffRepository;

final readonly class Handler
{
    public function __construct(
        private ITariffRepository $tariffRepository,
    ) {
    }

    public function __invoke(Query $query): ?Tariff
    {
        return $this->tariffRepository->getTariffById($query->tarId);
    }
}

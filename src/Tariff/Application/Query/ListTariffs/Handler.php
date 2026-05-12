<?php

declare(strict_types=1);

namespace LanBilling\Tariff\Application\Query\ListTariffs;

use LanBilling\Tariff\Domain\Model\Tariff;
use LanBilling\Tariff\Domain\Persistence\ITariffRepository;

final readonly class Handler
{
    public function __construct(
        private ITariffRepository $tariffRepository,
    ) {
    }

    /**
     * @return array<Tariff>
     */
    public function __invoke(Query $query): array
    {
        return $this->tariffRepository->getTariffs($query->archive);
    }
}

<?php

declare(strict_types=1);

namespace LanBilling\Vgroup\Application\Query\ListVgroups;

use LanBilling\Vgroup\Domain\Model\Vgroup;
use LanBilling\Vgroup\Domain\Persistence\IVgroupRepository;

final readonly class Handler
{
    public function __construct(
        private IVgroupRepository $vgroupRepository,
    ) {
    }

    /**
     * @return array<Vgroup>
     */
    public function __invoke(Query $query): array
    {
        return $this->vgroupRepository->getVgroups();
    }
}

<?php

declare(strict_types=1);

namespace LanBilling\Vgroup\Domain\Persistence;

use LanBilling\Vgroup\Domain\Model\Vgroup;

interface IVgroupRepository
{
    /**
     * @return array<Vgroup>
     */
    public function getVgroups(): array;

    /**
     * @param array<int> $vgIds
     * @return array<Vgroup>
     */
    public function getVgroupsByIds(array $vgIds): array;
}

<?php

declare(strict_types=1);

namespace LanBilling\Agreement\Domain\Persistence;

use LanBilling\Agreement\Domain\Model\Agreement;

interface IAgreementRepository
{
    /**
     * @return array<Agreement>
     */
    public function getAgreementsByAccountUid(int $uid, ?int $operatorId = null): array;

    /**
     * @param array<int> $uids
     *
     * @return array<Agreement>
     */
    public function getAgreementsByAccountUids(array $uids, ?int $operatorId = null): array;
}

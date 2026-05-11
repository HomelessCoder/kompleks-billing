<?php

declare(strict_types=1);

namespace LanBilling\AccountRead\Application\ReadModel;

use LanBilling\Account\Domain\Model\Account;
use LanBilling\Agreement\Domain\Model\Agreement;
use LanBilling\Vgroup\Domain\Model\Vgroup;

final readonly class AccountWithVgroupsAndAgreements
{
    /**
     * @param array<Vgroup> $vgroups
     * @param array<Agreement> $agreements
     */
    public function __construct(
        public Account $account,
        public array $vgroups,
        public array $agreements,
    ) {
    }
}

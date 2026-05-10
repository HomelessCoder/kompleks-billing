<?php

declare(strict_types=1);

namespace LanBilling\AccountRead\Application\ReadModel;

use LanBilling\Account\Domain\Model\Account;
use LanBilling\Vgroup\Domain\Model\Vgroup;

final readonly class AccountWithVgroups
{
    /**
     * @param array<Vgroup> $vgroups
     */
    public function __construct(
        public Account $account,
        public array $vgroups,
    ) {
    }
}

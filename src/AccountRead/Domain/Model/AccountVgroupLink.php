<?php

declare(strict_types=1);

namespace LanBilling\AccountRead\Domain\Model;

/**
 * Связка пользователя с учетной записью.
 *
 * @property-read int $uid Идентификатор пользователя (uid из accounts).
 * @property-read int $vgId Идентификатор учетной записи (vg_id из vgroups).
 */
final readonly class AccountVgroupLink
{
    public function __construct(
        public int $uid,
        public int $vgId,
    ) {
    }
}

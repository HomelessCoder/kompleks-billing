<?php

declare(strict_types=1);

namespace LanBilling\AccountRead\Domain\Model;

/**
 * Связка пользователя с группой пользователей.
 *
 * @property-read int $groupId Идентификатор группы (group_id из usergroups).
 * @property-read int $uid Идентификатор пользователя (uid из accounts).
 */
final readonly class AccountUsergroupLink
{
    public function __construct(
        public int $groupId,
        public int $uid,
    ) {
    }
}

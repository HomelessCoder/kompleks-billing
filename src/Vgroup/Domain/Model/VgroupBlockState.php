<?php

declare(strict_types=1);

namespace LanBilling\Vgroup\Domain\Model;

/**
 * Поле vgroups.blocked.
 */
enum VgroupBlockState
{
    /** 0 - разблокировано */
    case Unblocked;

    /** 1 - баланс */
    case Balance;

    /** 2 - пользователь */
    case User;

    /** 3 - администратором */
    case Administrator;

    /** 4 - активная блокировка */
    case Active;

    /** 5 - лимит трафика за период */
    case PeriodLimit;
}

<?php

declare(strict_types=1);

namespace LanBilling\Account\Domain\Model;

/**
 * Поле accounts.type.
 */
enum AccountType
{
    /** 1 - Юридическое лицо */
    case Organization;

    /** 2 - Физическое лицо */
    case Personal;
}

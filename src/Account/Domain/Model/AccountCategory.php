<?php

declare(strict_types=1);

namespace LanBilling\Account\Domain\Model;

/**
 * Поле accounts.category.
 */
enum AccountCategory
{
    /** 0-Бюджет */
    case Budget;

    /** 1-хозрасчет */
    case Commercial;

    /** 2-население */
    case Population;

    /** 3-ПБОЮЛ */
    case SoleProprietor;
}

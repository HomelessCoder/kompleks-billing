<?php

declare(strict_types=1);

namespace LanBilling\Account\Domain\Model;

enum AccountCategory
{
    case Budget;
    case Commercial;
    case Population;
    case SoleProprietor;
}

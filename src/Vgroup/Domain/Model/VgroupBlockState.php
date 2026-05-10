<?php

declare(strict_types=1);

namespace LanBilling\Vgroup\Domain\Model;

enum VgroupBlockState
{
    case Unblocked;
    case Balance;
    case User;
    case Administrator;
    case Active;
    case PeriodLimit;
}

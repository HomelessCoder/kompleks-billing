<?php

declare(strict_types=1);

namespace LanBilling\Bill\Domain\Model;

enum BillStatus
{
    case Primary;
    case Confirmed;
    case Cancelled;
}

<?php

declare(strict_types=1);

namespace LanBilling\Vgroup\Domain\Model;

enum VgroupTrafficType
{
    case Incoming;
    case Outgoing;
    case Total;
}

<?php

declare(strict_types=1);

namespace LanBilling\Vgroup\Domain\Model;

enum VgroupStatus
{
    case DoNotDisable;
    case AutoDisable;
}

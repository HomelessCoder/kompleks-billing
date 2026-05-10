<?php

declare(strict_types=1);

namespace LanBilling\Vgroup\Domain\Model;

enum VgroupChangeState
{
    case NotRequired;
    case New;
    case Changed;
    case Deleted;
}

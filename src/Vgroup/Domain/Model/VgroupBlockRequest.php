<?php

declare(strict_types=1);

namespace LanBilling\Vgroup\Domain\Model;

enum VgroupBlockRequest
{
    case None;
    case Balance;
    case User;
    case Administrator;
}

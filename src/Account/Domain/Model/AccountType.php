<?php

declare(strict_types=1);

namespace LanBilling\Account\Domain\Model;

enum AccountType
{
    case Organization;
    case Personal;
}

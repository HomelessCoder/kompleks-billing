<?php

declare(strict_types=1);

namespace LanBilling\Account\Domain\Model;

enum BillDeliveryType
{
    case Courier;
    case Mail;
    case SelfService;
    case Other;
}

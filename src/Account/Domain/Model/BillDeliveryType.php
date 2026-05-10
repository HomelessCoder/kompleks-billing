<?php

declare(strict_types=1);

namespace LanBilling\Account\Domain\Model;

/**
 * Поле accounts.bill_delivery.
 */
enum BillDeliveryType
{
    /** 0-курьер */
    case Courier;

    /** 1-почтой */
    case Mail;

    /** 2-самостоятельно */
    case SelfService;

    /** 3-другой */
    case Other;
}

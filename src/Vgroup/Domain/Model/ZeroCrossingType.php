<?php

declare(strict_types=1);

namespace LanBilling\Vgroup\Domain\Model;

enum ZeroCrossingType
{
    case UsageCharge;
    case SubscriptionFee;
    case NegativeChargeReversal;
}

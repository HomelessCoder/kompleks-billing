<?php

declare(strict_types=1);

namespace LanBilling\Vgroup\Domain\Model;

/**
 * Поле vgroups.zc_type.
 */
enum ZeroCrossingType
{
    /** 1 - списание агентом за употребление услуги */
    case UsageCharge;

    /** 2 - списание абонентской платы */
    case SubscriptionFee;

    /** 3 - зачисление отрицательной суммы (снятие платежа интерфейсом) */
    case NegativeChargeReversal;
}

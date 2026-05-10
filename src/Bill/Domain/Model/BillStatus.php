<?php

declare(strict_types=1);

namespace LanBilling\Bill\Domain\Model;

/**
 * Поле bills.status.
 */
enum BillStatus
{
    /** 0 - первичный платеж */
    case Primary;

    /** 1 - подтвержденный (после сверки) */
    case Confirmed;

    /** 2 - платеж отменен */
    case Cancelled;
}

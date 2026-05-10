<?php

declare(strict_types=1);

namespace LanBilling\Account\Domain\Model;

/**
 * Поле accounts.resident.
 */
enum ResidentStatus
{
    /** 0 - не резидент */
    case NonResident;

    /** 1 - резидент */
    case Resident;
}

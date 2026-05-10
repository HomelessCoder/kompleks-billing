<?php

declare(strict_types=1);

namespace LanBilling\Account\Domain\Model;

enum ResidentStatus
{
    case NonResident;
    case Resident;
}
